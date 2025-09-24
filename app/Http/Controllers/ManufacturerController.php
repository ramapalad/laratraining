<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\http\Request\StoreManufacturerRequest;
use App\http\Request\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Manufacturer/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManufacturerRequest $request)
    {
        $validatedData = $request->validated();

        $manufacturer = Manufacturer::create($validatedData);

        return response()->json([
            'message' => 'Manufacturer created successfully', 
            'manufacturer' => $manufacturer
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        $manufacturer = Manufacturer::findorFail($manufacturer->id);

        if (!$manufacturer) {
            return redirect()->back()->with('error', 'Manufacturer not found.');
        }
        
        return response()->json($manufacturer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $validatedData = $request->validated();

        $manufacturer->update($validatedData);

        return response()->json([
            'message' => 'Manufacturer updated successfully', 
            'manufacturer' => $manufacturer->fresh()
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        try {
            $manufacturer = Manufacturer::findOrFail($manufacturer->id);
            $manufacturer->delete();

            return response()->json(['message' => 'Manufacturer deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete manufacturer: ' . $e->getMessage()], 500);
        }
    }
}
