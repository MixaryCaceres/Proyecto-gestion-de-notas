<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index(){
        $categorias = Categoria::paginate(10);
        return view ('categorias.index')->with('categoria', $categorias);

    }
}
