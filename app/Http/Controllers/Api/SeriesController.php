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

    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(Serie $series)
    {
        return $series;
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
