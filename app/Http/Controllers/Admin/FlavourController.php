<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flavour;
use App\functions\helper;

class FlavourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flavours = Flavour::all();
        return view('admin.flavours.index', compact('flavours'));
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
      $newFlavour = new Flavour();
      $formData['slug'] = helper::generateSlug($formData['name'], Flavour::class);
      $newFlavour->fill($formData);
      $newFlavour->save();
      return redirect()->route('admin.flavours.index');
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
    public function update(Request $request, Flavour $flavour)
    {
      $formData = $request->all();

      if ($formData['name'] === $flavour->name) {
          $formData['slug'] = $flavour->slug;
      } else {
          $formData['slug'] = helper::generateSlug($formData['name'], new Flavour());
      }

      $flavour->update($formData);

      return redirect()->route('admin.flavours.index', $flavour);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flavour $flavour)
    {
      $flavour->delete();
      return redirect()->route('admin.flavours.index');

    }
}
