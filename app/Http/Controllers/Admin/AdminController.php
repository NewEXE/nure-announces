<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $items = [
            'admin.users.index' => 'Управление пользователями',
            'admin.announces.index' => 'Управление объявлениями',
            'admin.pages.index' => 'Управление страницами',
        ];
        return view('admin.index', ['items'=>$items]);
    }

}
