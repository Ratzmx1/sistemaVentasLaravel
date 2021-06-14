<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(10),
            'price'=>$this->faker->numberBetween(500,15000),
            'stock'=>$this->faker->numberBetween(0,500),
            'image'=>$this->faker->randomElement([
                "https://i.picsum.photos/id/929/200/200.jpg?hmac=V-NHF1GoUllni1jU8FFUECP1jZUGTYZRxwTT-OkI9Fw",
                "https://i.picsum.photos/id/1001/200/200.jpg?hmac=J4yq_Q2Zy5CCcNlGMUf26bes2ksQBi_MzvdgW7rAcio",
                "https://i.picsum.photos/id/290/200/200.jpg?hmac=-TTlqENxUe4ZacR5I1zAWsw9xtd-MOFEPRWogmAIKsw",
                "https://i.picsum.photos/id/873/200/200.jpg?hmac=5NCxS9ue78kUMON6P-hozaU4JQF_xfkczFyh6sfHLKQ",
                "https://i.picsum.photos/id/453/200/200.jpg?hmac=IO3u3eOcKSOUCe8J1IlvctdxPKLTh5wFXvBT4O3BNs4",
                "https://i.picsum.photos/id/639/200/300.jpg?hmac=dITw9zyqi0A4tZ6lMk191HJezQPJDDKG4wyJXadYRH0",
            ])
        ];
    }
}
//
