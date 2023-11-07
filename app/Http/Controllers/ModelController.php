<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return Model::all();
    }

    public function create()
    {
        // TODO: Return creation view
    }

    public function store(Request $request)
    {
        return Model::query()->create([
            // TODO: Use values from $request
        ]);
    }

    public function show(Model $model)
    {
        return $model;
    }

    public function edit(Model $model)
    {
        // TODO: Show edit view for model
    }

    public function update(Request $request, Model $model)
    {
        return $model->update([
            // TODO: Use values from $request
        ]);
    }

    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
