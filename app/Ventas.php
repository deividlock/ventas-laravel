<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public function listProduct()
    {
        $listProduct = \DB::table('products')->get();
        return $listProduct;
    }

    public function listImage($idProducto)
    {
        $imageProduct = \DB::table('product_images')->where('id_product', '=', $idProducto)->get();
        return $imageProduct;
    }

    public function saveCart($data)
    {
        return \DB::table('carts')->insertGetId($data);
    }

    public function saveProductCart($data)
    {
        \DB::table('product_carts')->insert($data);
    }

    public function listCart()
    {
        $listCartProduct = \DB::table('carts')->get();
        return $listCartProduct;
    }

    public function listCartProduct($id)
    {
        $listCartProduct = \DB::table('products')
            ->join('product_carts', 'products.id', '=', 'product_carts.product_id')
            ->select('product_carts.quantity', 'products.name', 'products.price')
            ->where('product_carts.cart_id', '=', $id)
            ->get();
        return $listCartProduct;
    }
}
