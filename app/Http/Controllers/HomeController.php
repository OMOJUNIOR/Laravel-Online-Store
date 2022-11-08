<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Home:Shopping Made Easy',
            'description' => 'Online shop',
            'keywords' => 'home, page',
        ];

        return view('home.index', $viewData)->with('viewData', $viewData);
    }

    public function about()
    {
        $viewData['name'] = 'Omo Junior';
        $viewData['title'] = 'About Online Shop';
        $viewData['subtitle'] = 'About page';
        $viewData['description'] = 'This is the Shop about page';
        $viewData['dev'] = 'Developed by'.'☺️'.$viewData['name'];

        return view('home.about')->with('viewData', $viewData);
    }

    public function contact()
    {
        $viewData['email'] = 'omo@store.com';
        $viewData['address'] = 'Bursa, Turkey';
        $viewData['phone'] = '123456789';
        $viewData['phone1'] = '123456789';

        return view('home.contact')->with('viewData', $viewData);
    }
}
