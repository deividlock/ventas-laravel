<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Ventas;

class AppServiceProvider extends ServiceProvider
{
    public function __construct()
    {
        $this->ventas = new Ventas();
    }

    public function listImage($listProduct)
    {
        $listAll = array();
        $i = 0;
        foreach ($listProduct as $listProduct) {
            $listImage = $this->ventas->listImage($listProduct->id);
            $image = [];
            foreach($listImage as $list) {
                $rutaImagen = 'public/storage/'.$listProduct->id.'/'.$list->name;
                $contenidoBinario = file_get_contents(base_path($rutaImagen));
                $image[] = base64_encode($contenidoBinario);
            }
            $i++;
            $listAll[] = array(
                'id' => $listProduct->id,
                'name' => $listProduct->name,
                'price' => $listProduct->price,
                'sku' => $listProduct->sku,
                'description' => $listProduct->description,
                'image' => $image
            );

        }
        return $listAll;
    }

    public function addCart($dataInit)
    {
       $total = 0;
       foreach($dataInit as $data) {
           $total = $total + $data['price'];
       }

        $data = array(
            'status' => 'Completado',
            'total' => $total,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        );

       $idCart = $this->ventas->saveCart($data);
       $data = $this->save($dataInit, $idCart);
       $this->ventas->saveProductCart($data);
       return $idCart;
    }

    public function save($dataInit, $idCart)
    {
        $arrayData = array();
        $temp = array();
        foreach ($dataInit as $item) {
            $product = array_count_values(array_column($dataInit, 'id'))[$item['id']];
            if(!in_array($item['id'], $temp)) {
                $temp[] = $item['id'];
                $arrayData[] = array(
                    'product_id' => $item['id'],
                    'cart_id' => $idCart,
                    'quantity' => $product,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                );
            }
        }
        return $arrayData;
    }

    public function listCart()
    {
        $listCart = $this->ventas->listCart();
        $data = array();
        foreach ($listCart as $cart) {
            $listProduct = $this->ventas->listCartProduct($cart->id);
            $data[] = array(
                'id_cart' => $cart->id,
                'total' => $cart->total,
                'status' => $cart->status,
                'listProduct' => $listProduct
            );
        }
        return $data;
    }


}
