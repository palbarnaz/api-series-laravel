<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Temporada;


class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];
    protected $with =  ['temporadas'];


    public function temporadas(){
        return $this->hasMany(Temporada::class, 'serie_id');
    }
}
