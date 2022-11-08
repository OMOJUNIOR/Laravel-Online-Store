<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Products - Admin - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Products::all();

        return view('admin.products.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Products::validate($request);

        $newProduct = new Products();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('game.png');
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().'.'.$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put($imageName, file_get_contents($request->file('image')->getRealPath()));
            $newProduct->setImage($imageName);
            $newProduct->save();

            return back()->with('success', 'Product created successfully');
        }

        return back()->with('error', 'Product created successfully, but image not uploaded');

    }

    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();

        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Products - Admin - Online Store';
        $viewData['subtitle'] = 'Edit product';
        $viewData['product'] = Products::findOrFail($id);

        return view('admin.products.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Products::validate($request);

        $product = Products::find($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setImage('game.png');
        $product->save();
        if ($request->hasFile('image')) {
            $imageName = $product->getId().'.'.$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put($imageName, file_get_contents($request->file('image')->getRealPath()));
            $product->setImage($imageName);
            $product->save();
        }

        return redirect()->route('admin.products.index');
    }
}
