<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Product
{
    
    private static $products = [
            [
                "name" => "product 1",
                "slug" => "product-1",
                "harga" => 50000,
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, harum laudantium quae deserunt expedita eum cumque amet. Sapiente, et! Quas ducimus earum neque unde totam qui accusantium! Corrupti odio facere illum quibusdam deserunt quisquam suscipit ipsam cupiditate totam doloremque placeat saepe laboriosam, expedita et voluptatem voluptatum dicta dolore voluptatibus, non laborum! Aut quaerat id et distinctio? Reiciendis amet necessitatibus minus, odit sunt et. Quasi omnis et doloremque? Est qui velit blanditiis consectetur, ipsam veniam reprehenderit quisquam libero quaerat ad laborum impedit ipsum quas iste vel. Voluptatum ea sint eaque libero totam tenetur pariatur, ipsum recusandae molestiae necessitatibus asperiores ab ratione?"
            ],
            [
                "name" => "product 2",
                "slug" => "product-2",
                "harga" => 70000,
                "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus vel dolore adipisci mollitia fuga quod nihil rerum maiores expedita saepe vero voluptatibus, esse commodi autem provident obcaecati non veritatis minima! Asperiores eos aliquid quo autem quia facere at tempore numquam. Corrupti dolorum qui nihil molestias fuga in error labore eius."
            ],
            [
                "name" => "product 3",
                "slug" => "product-3",
                "harga" => 20000,
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quidem, debitis repellat delectus dolorum magni eligendi eveniet id commodi excepturi. Minus exercitationem itaque quod voluptatibus harum maiores sequi aperiam vitae tenetur quaerat molestiae consequatur reiciendis, quae excepturi asperiores, nostrum, illum laborum rerum deleniti autem veniam atque quis. Harum iure delectus libero quae maxime id cumque doloremque, doloribus assumenda qui nostrum sequi. Maiores laborum qui cum culpa omnis nihil eligendi fugit rem pariatur optio, soluta doloremque!"
            ]
        ];


        public static function all(){
            return collect(self::$products);
        }

        public static function find($slug){

                // $product = [];

                // foreach($myProducts as $p){
                //     if($p["slug"] === $slug){
                //         $product = $p;
                //     }
                // }

            // return $product;

            $myProducts = static::all();
            return $myProducts->firstWhere('slug',$slug);

        }

}
