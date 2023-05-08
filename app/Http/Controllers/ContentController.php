<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modesl\Content as Contenu;

class ContentController extends Controller
{
    public function list(){
        $za=new Contenu();
        return $za->all();
    }
}
