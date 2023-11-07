<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return Location::all();
    }

    public function create()
    {
        // TODO: Show Location creation view
    }

    public function store(Request $request)
    {
        return Location::create([
            // TODO: Use values from $request
        ]);
    }

    public function show(Location $location)
    {
        return $location;
    }

    public function edit(Location $location)
    {
        // TODO: Show Location update view
    }

    public function update(Request $request, Location $location)
    {
    }

    public function destroy(Location $location)
    {
    }
}
