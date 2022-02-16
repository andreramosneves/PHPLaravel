<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Carbon\Carbon;

class ProductController extends Controller
{
    //


    public function inseriProdutos(Request $request){
        $produto = new Products;

        $produto->nm_produto = $request->n_product;
        $produto->valor_produto = $request->v_product;


        if($request->hasFile('i_product') && $request->file('i_product')->isValid()){
            $requestImage = $request->i_product;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('media/produtos'), $imageName);
            $produto->photo = $imageName;
        }
        
        $produto->save();

        $message = "Produto inserido com sucesso!";

        return view("products",['message'=>$message]);
    }


    public function finalizaProduto(Request $request){
        $produto = Products::where('id',$request->get("id"))->first();
        $produto->dt_termino = Carbon::now();
        $produto->update();
        $message = Carbon::now();

        return view("products",['message'=>$message]);

    }



    public function getProduto(Request $request){
        $produto = Products::where('id',$request->get("id"))->first();
        return view("products",['produto'=>$produto]);

    }

    public function atualizaProduto(Request $request){

    }

    public function listaProdutos(Request $request){
       $produto = new Products;
       $listaProdutos = $produto->whereNull('dt_termino')->orderBy('nm_produto', 'ASC')->paginate(5);

       return view("products",['listaProdutos'=>$listaProdutos]);
    }

    public function listaProdutosHome(Request $request){
       $produto = new Products;
       $listaProdutos = $produto->whereNull('dt_termino')->orderBy('nm_produto', 'ASC')->paginate(5);
       return view("home",['listaProdutos'=>$listaProdutos]);
    }

}
