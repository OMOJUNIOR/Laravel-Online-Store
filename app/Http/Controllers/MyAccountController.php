<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData['title'] = 'My Orders - Online Store';
        $viewData['subtitle'] = 'My Orders';

        $viewData['orders'] = Order::with(['items.product'])->where('user_id', Auth::user()->id)->get();

        if ($viewData['orders']->isEmpty()) {
            $viewData['message'] = 'You have no orders yet.';
        }

        return view('myaccount.myAccount')->with('viewData', $viewData);
    }
}
