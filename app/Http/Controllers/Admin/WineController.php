<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wine;
use App\functions\helper;
use App\Http\Requests\WineRequest;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wines = Wine::paginate(9);
        return view('admin.wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method = 'POST';
        $route = route('admin.wines.store');
        $wine = null;

        return view('admin.wines.edit-create', compact('method', 'route', 'wine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WineRequest $request)
    {
        $formData = $request->all();

        $formData['slug'] = helper::generateSlug($formData['wine'], Wine::class);
        $newWine = new Wine();
        $newWine->fill($formData);
        $newWine->save();

        return redirect()->route('admin.wines.show', $newWine);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {

        return view('admin.wines.show', compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {

        $method = 'PUT';
        $route = route('admin.wines.update', $wine);

        return view('admin.wines.edit-create', compact('method', 'route', 'wine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WineRequest $request, Wine $wine)
    {

        $formData = $request->all();

        if ($formData['wine'] === $wine->wine) {
            $formData['slug'] = $wine->slug;
        } else {
            $formData['slug'] = Helper::generateSlug($formData['wine'], new Wine());
        }

        $wine->update($formData);

        return redirect()->route('admin.wines.show', $wine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        $wine->delete();
        return redirect()->route('admin.wines.index')->with('deleted', 'Il vino ' . $wine->wine . 'è stato eliminato!');
    }
}
