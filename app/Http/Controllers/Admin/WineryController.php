<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Winery;
use App\functions\helper;

class WineryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wineries = Winery::all();
        return view('admin.wineries.index', compact('wineries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $newWinery = new Winery();
        $formData['slug'] = helper::generateSlug($formData['name'], Winery::class);
        $newWinery->fill($formData);
        $newWinery->save();
        return redirect()->route('admin.wineries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Winery $winery)
    {
        $formData = $request->all();

        if ($formData['name'] === $winery->name) {
            $formData['slug'] = $winery->slug;
        } else {
            $formData['slug'] = helper::generateSlug($formData['name'], new Winery());
        }

        $winery->update($formData);

        return redirect()->route('admin.wineries.index', $winery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Winery $winery)
    {
        $winery->delete();
        return redirect()->route('admin.wineries.index');
    }
}
