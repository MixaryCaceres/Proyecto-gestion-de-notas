<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoria = new Categoria();
        $categoria->nombre = "Personal";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Trabajo";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Estudio";
        $categoria->save();
    }
}
