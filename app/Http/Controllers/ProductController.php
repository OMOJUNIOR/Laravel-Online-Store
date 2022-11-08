<?php

namespace App\Http\Controllers;

use App\Models\products;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Products::orderBy('id','desc')->paginate(4);    //where('id','>',3)->simplePaginate(4);

        return view('product.index')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Products::find($id);
        $viewData['title'] = $product->getName().' - Online Store';
        $viewData['subtitle'] = $product->getName().' - Online StoreProduct information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function featureList($id)
    {
        $viewData = [];
        $product = Products::find($id);
        $viewData['product'] = $product;
        if ($viewData === 4) {
            return view('product.featureList')->with('viewData', $viewData);
        }
    }
}
