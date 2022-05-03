<?php

namespace App\Http\Controllers\Patrimony;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTowerRequest;
use App\Http\Requests\UpdateTowerRequest;
use App\Models\Patrimony\Tower;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class TowerController extends Controller
{
    private Tower $tower;

    public function __construct(Tower $tower)
    {
        $this->middleware(['role_or_permission:super_admin|administrator']);
        $this->tower = $tower;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(): View|Factory|Application|Response
    {
        $tower = $this->tower;
        return view('tower.index', compact('tower'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTowerRequest  $request
     * @return Response
     */
    public function store(StoreTowerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patrimony\Tower  $tower
     * @return Response
     */
    public function show(Tower $tower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patrimony\Tower  $tower
     * @return Response
     */
    public function edit(Tower $tower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTowerRequest  $request
     * @param  \App\Models\Patrimony\Tower  $tower
     * @return Response
     */
    public function update(UpdateTowerRequest $request, Tower $tower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patrimony\Tower  $tower
     * @return Response
     */
    public function destroy(Tower $tower)
    {
        //
    }
}
