<?php
namespace App\Repositories;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TemporadaRepository{

    public function list(Serie $serie){


        return  $serie->temporadas()->with('episodios')->get();



    }



}



?>
