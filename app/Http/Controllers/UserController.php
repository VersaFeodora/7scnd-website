<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->search;
        $users = DB::table('users')
                ->select('users.*')
                ->where('username', 'like', '%'.$keyword.'%')
                ->orderBy('id', 'asc')->get();
        $count = $users->count();
        return view('admin.users', [
            'users' => $users,
            'count' => $count
        ]);
    }
    public function create()
    {
        return view('products.productadd');
    }
    public function store(Request $request){

    }
}
