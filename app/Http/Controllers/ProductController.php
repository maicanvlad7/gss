<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //

    public function index() {
        //aducem toate produsele si le afisam in view
        $data = (object)[];

        $data->products = Product::all();
        $data->units = Unit::all();

        return view('products.index',compact('data'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'um' => 'required',
            'sku' => 'required',
            'quantity' => 'required'
        ];

        if ($request->validate($rules)) {
            Redirect::back()->withErrors(session('errors'));
        }

        $prod = new Product();
        $prod->name = $request->input('name');
        $prod->sku = $request->input('sku');
        $prod->um = $request->input('um');
        $prod->quantity = $request->input('quantity');
        $prod->price = $request->input('price');

        $prod->save();

        return back();
    }

    public function delete($id_prod) {
        $product = Product::findOrFail($id_prod);
        $product->delete();

        return back();
    }

    public function show($id) {
        $product = Product::where('id','=',$id)->firstOrFail();

        return view('products.single',compact('product'));
    }



}
