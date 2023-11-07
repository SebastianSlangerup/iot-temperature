<?php

namespace App\Http\Controllers;

use App\Models\DataType;
use Illuminate\Http\Request;

class DataTypeController extends Controller
{
    public function index()
    {
        return DataType::all();
    }

    public function create()
    {
        // TODO: Show DataType creation view
    }

    public function store(Request $request)
    {
        return DataType::create([
            // TODO: Use values from $request
        ]);
    }

    public function show(DataType $dataType)
    {
        return $dataType;
    }

    public function edit(DataType $dataType)
    {
        // TODO: Show DataType update view
    }

    public function update(Request $request, DataType $dataType)
    {
        return $dataType->update([
            // TODO: Use values from $request
        ]);
    }

    public function destroy(DataType $dataType)
    {
        return $dataType->delete();
    }
}
