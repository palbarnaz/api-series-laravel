<?php
namespace App\Repositories;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SerieRepository{




    public function add(Request $request): Serie{
        return DB::transaction(function () use ($request, &$serie){
          $serie = Serie::create($request->all());


          for($i = 1; $i <= $request->temporadas; $i++) {
            $temporada = $serie->temporadas()->create([
              'numero'=>$i
            ]);


            for($j=1; $j <= $request->episodios; $j++)
            $temporada->episodios()->create([
                    'numero' => $j
            ]);
          }
             return $serie;
        });
    }

    public function edit(Request $request, Serie $series){
         Serie::where('id', $series->id)->update([
            'nome' => $request->nome,
        ]);
    }

    public function delete( Serie $series){
        $series->delete();
   }
}



?>
