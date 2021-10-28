<?php

namespace App\Http\Controllers;
use App\Models\TemplateMou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(){
        $mou = TemplateMou::get()->last();
        $auth = Auth::user();
        if ($auth) {
            return view('dashboard_petani',['title' => 'Homepage', 'mou' => $mou, 'auth' => $auth]);
        }
        else {
            return view('dashboard_petani',['title' => 'Homepage', 'mou' => $mou, 'auth' => 'guest']);
        }
    }
}
