<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use App\Ventas;

class VentasController extends Controller
{
    public function __construct(AppServiceProvider $AppServiceProvider)
    {
        $this->ventas = new Ventas();
        $this->appServiceProvider = $AppServiceProvider;
    }

    public function listProduct()
    {
        $listProduct = $this->ventas->listProduct();
        $list = $this->listImage($listProduct);
        return json_encode($list);
    }

    public function listImage($listProduct)
    {
        $listAll = $this->appServiceProvider->listImage($listProduct);
        return $listAll;
    }

    public function addCart(Request $request) {
        $data = $request->json()->all();
        $this->appServiceProvider->addCart($data);
    }

    public function listCart()
    {
        $listCart = $this->appServiceProvider->listCart();
        return json_encode($listCart);
    }
}
