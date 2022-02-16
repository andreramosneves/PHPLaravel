<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kart;
use App\Products;
use App\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class KartController extends Controller
{
    //
    

    public function addItemKart(Request $request){
        $produto = Products::where('id',($request->product_id))->first();

        $kart = new Kart;
        $kart->product_id = $request->product_id;
        $kart->valor_produto = $produto->valor_produto;
        $kart->quantidade = $request->quantidade;
        $kart->user_id =  Auth::id();
        $kart->save();
        $message = "Item adicionado com sucesso!";

        $list_kart = Kart::where('user_id', Auth::id())->whereNull('order_id')->get();
        $soma = 0;
        foreach($list_kart as $k1){
            $soma += ($k1->quantidade) * ($k1->valor_produto);
        }

        return view("kart",['message'=>$message,'list_kart'=>$list_kart,'soma'=>$soma]);
    }


    public function listaKart(){
        $soma = 0;
        $list_kart = Kart::where('user_id', Auth::id())->whereNull('order_id')->get();
        foreach($list_kart as $k1){
            $soma += ($k1->quantidade) * ($k1->valor_produto);
        }
        return view("kart",['list_kart'=>$list_kart,'soma'=>$soma]);
    }

}
