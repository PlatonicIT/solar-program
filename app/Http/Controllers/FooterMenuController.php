<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterMenuPage;

class FooterMenuController extends Controller
{
    public function view_menu_page($page,$id=null){
       $menu =  FooterMenuPage::findOrFail($id);
        return view('public.menu.menu_page',compact('menu'));
    }
}
