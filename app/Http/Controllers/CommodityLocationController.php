<?php

namespace App\Http\Controllers;

use App\CommodityLocation;
use App\Http\Requests\StoreCommodityLocationRequest;
use App\Http\Requests\UpdateCommodityLocationRequest;
use Illuminate\Http\Request;

class CommodityLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commodity_locations = CommodityLocation::orderBy('name', 'ASC')->get();

        return view('commodity-locations.index', compact('commodity_locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommodityLocationRequest $request)
    {
        CommodityLocation::create($request->validated());

        return to_route('ruangan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityLocationRequest $request, CommodityLocation $commodityLocation)
    {
        $commodityLocation->update($request->all());

        return to_route('ruangan.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommodityLocation $commodityLocation)
    {
        $commodityLocation->delete();

        return to_route('ruangan.index')->with('success', 'Data berhasil dihapus!');
    }
}
