<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\http\Requests\StoreAssetRequest;
use App\http\Requests\UpdateAssetRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\User;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get(['id', 'name']);
        $locations = Location::orderBy('name', 'asc')->get(['id', 'name']); 
        $manufacturers = Manufacturer::orderBy('name', 'asc')->get(['id', 'name']);
        $users = User::orderBy('name', 'asc')->get(['id', 'name']);

        return inertia('Asset/Index', [
            'categories' => $categories,
            'locations' => $locations,
            'manufacturers' => $manufacturers,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetRequest $request)
    {
        $validatedData = $request->validated();

        $asset = Asset::create($validatedData);

        return response()->json([
            'message' => 'Asset created successfully', 
            'asset' => $asset
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        $asset = Asset::with(['category', 'location', 'manufacturer', 'user'])->findorFail($asset->id);

        if (!$asset) {
            return redirect()->back()->with('error', 'Asset not found.');
        }

        return response()->json(new AssetResource($asset));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $validatedData = $request->validated();

        $asset->update($validatedData);

        return response()->json([
            'message' => 'Asset updated successfully', 
            'asset' => $asset->fresh()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        try {
            $asset = Asset::findOrFail($asset->id);
            $asset->delete();

            return response()->json(['message' => 'Asset deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete asset: ' . $e->getMessage()], 500);
        }
    }
}
