<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;


class Episodio extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];


    public function temporadas(){
        return $this->belongsTo(Temporada::class);
    }
}
