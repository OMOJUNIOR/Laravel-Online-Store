<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Admin - Online Store';

        return view('admin.home.index')->with('viewData', $viewData);
    }

    public function addProduct(){

        $viewData = [];
        $viewData['title'] = 'Add Product - Admin - Online Store';

        return view('admin.products.add')->with('viewData', $viewData);
    }
}
