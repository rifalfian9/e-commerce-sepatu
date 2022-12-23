<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting () {
        return view('include.setting', ["title" => "Settings"]);
    }

     public function tentangkami(){
        return view('include.about', ["title" => "Tentang Kami"]);
    }

    public function profil()
    {
        return view('include.profile', ["title" => "Profil"]);
    }

     public  function hubungikami () {
        return view('include.contactme', ["title" => "Hubungi Kami"]);
    }

}
