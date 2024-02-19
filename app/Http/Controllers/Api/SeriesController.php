<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Serie;
use App\Repositories\SerieRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SerieRepository $seriesRepository)
    {
    }

    public function index(Request $request)
    {
        // if(!$request->has('nome')){
        //     return Serie::with('temporadas.episodios')->get();

        // }

        // return Serie::whereNome($request->nome)->get();

        $query = Serie::query();

        if($request->has('nome')){
            $query->where('nome', $request->nome) ;
        }

        return $query->paginate(2);

    }

    public function store(Request $request)
    {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
        $getSerie = Serie::whereId($series)->with('temporadas.episodios')->first();
        return $getSerie;
    }

    public function update(Serie $series, Request $request)
    {

        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(int $series)
    {
        Serie::destroy($series);
        return response()->noContent();
    }
}
