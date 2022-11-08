<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Products::findMany(array_keys($productsInSession));
            $total = Products::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('product');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Request $request)
    {
        $total = 0;
        $productsInSession = $request->session()->get('products');

        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setUserName(Auth::user()->getName());
            $order->getUserName();
            $order->setTotal(0);
            $order->save();
        }
        if (! $total) {
            $productsInCart = Products::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total += ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();
        }
        if (Auth::user()->getBalance() < $total) {
            $viewData = [];
            $viewData['error'] = 'You do not have enough money to buy this product';
            $order->first()->delete();

            return view('cart.error')->with('viewData', $viewData);
            exit();
        }

        $newBalance = Auth::user()->getBalance() - $total;
        Auth::user()->setBalance($newBalance);
        Auth::user()->save();
        $request->session()->forget('products');

        $viewData = [];
        $viewData['title'] = 'Purchase - Online Store';
        $viewData['subtitle'] = 'Purchase Status';
        $viewData['order'] = $order;

        return view('cart.purchase')->with('viewData', $viewData);
    }
}
