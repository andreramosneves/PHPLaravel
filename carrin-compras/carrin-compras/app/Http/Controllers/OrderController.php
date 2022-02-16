<?php

namespace App\Http\Controllers;

use App\Kart;
use App\Products;
use App\User;
use App\Order;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{




  public function finalizarPedido(Request $request){
    $soma = 0;
    $list_kart = Kart::where('user_id', Auth::id())->whereNull('order_id')->get();
    foreach($list_kart as $k1){
      $soma += ($k1->quantidade) * ($k1->valor_produto);
    }

    $message = "Pedido finalizado com sucesso!";
    $order = new Order;
    $order->dt_cadastro = Carbon::now();
    $order->total = $soma;
    $order->user_id = Auth::id();
    $order->save();

    /*Limpa nosso carrinho*/
    Kart::whereNull('order_id')->update(['order_id' => $order->id]);
    
    /*Trago os pedidos do usuário*/
    return view("order",['message'=>$message]);

  }

  public function listaPedidos(){
    $listaPedidos = Order::where('user_id', Auth::id())->get();
    return view("order",['list_order' => $listaPedidos]);
  }
}
