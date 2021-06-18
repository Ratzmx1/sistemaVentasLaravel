<?php

namespace App\Http\Controllers;



use App\Models\Detail;
use App\Models\Product;
use App\Models\Ticket;
use Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Transbank\Utils\InteractsWithWebpayApi;
use Transbank\Webpay\WebpayPlus\Transaction;
use Transbank\Webpay\WebpayPlus\Responses;

class paymentController extends Controller
{
    public  function create(Request $request){
        if (!$request->get("token_ws")){
            // Creo Boleta y aagrego detalle
            $prods = [];
            $total = 0;
            $data = collect(unserialize(Auth::user()->cart));
            foreach ($data as $dat){
                $prod = Product::find($dat);
                array_push($prods, $prod);
                $total += $prod['price'];
            }
            Auth::user()->cart = '';
            Auth::user()->save();

            $ticket = new Ticket();
            $ticket->total = $total;
            $ticket->user_id = Auth::id();
            $ticket->save();

            foreach ($prods as $prod){
                $detail = new Detail();
                $detail->ticket_id = $ticket->id;
                $detail->product_id = $prod->id;
                $detail->quantity = 1;
                $detail->save();
            }
            $id = $ticket->id;
        }else{
            $token = $request->get("token_ws");
            $transaction = new Transaction();
            $res = $transaction->status($token);
            $total = $res->amount;
            $id = $res->buyOrder;
            $ticket = Ticket::find(intval($id));
        }


        $transaction = new Transaction();

        try {
            $response = $transaction->create($id, uniqid(), $total,"http://ventas.test/payment1");
            $ticket->token_ws = $response->getToken();
            $ticket->save();
            return redirect($response->getUrl().'?token_ws='.$response->getToken());
        }catch (Exception $e){
            dd($e);
        }
    }

    public static function validateToken($token){
        $transaction = new Transaction();
        try {
            $res = $transaction->commit($token);
//            dd($res);
            if ($res->isApproved()) {
                //dd($res);
                $order = intval($res->buyOrder);
                $ticket = Ticket::find($order);
                $ticket->state = 'PAGADO';
                $ticket->save();
                return $res;

            }else{
                return null;
            }
        }catch (Exception $e){
            return null;
        }
    }

    public  function reciv(Request $request){
        $token = $request->query("token_ws");
        if (!$token){
            return redirect("/home");
        }
        $data = self::validateToken($token);

        if (!! $data){
//            dd($data);
            return view("acepted",compact('data'));
        }

        return view("rejected",compact("token"));
    }
}
