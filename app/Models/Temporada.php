<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Episodio;

class Temporada extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];
    protected $with =  ['episodios'];


    public function series(){
        return $this->belongsTo(Serie::class);
    }


    public function episodios(){
        return $this->hasMany(Episodio::class);
    }
}
