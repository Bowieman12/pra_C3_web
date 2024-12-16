<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth;
class AdminController extends Controller
{
    public function index(){
        $this->middleware(function ($request, $next) {
            if (auth()->check()) {
                view()->share('admin', auth()->user()->admin);
            }
            return $next($request);
        });

        return view('admin.index');
    }

   



}
