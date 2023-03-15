<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::orderBy('updated_at', 'DESC')->Paginate(10);

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();
        $select = Technology::all();
        return view('admin.technologies.create', compact('technology', 'select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'label' => 'required|string| unique:technologies| min:1| max:50',
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'Il campo label é obbligatorio',
            'label.string' => 'Il label deve essere una stringa',
            'label.min' => 'Lunghezza minima consentita 1 carattere',
            'label.max' => 'Lunghezza massima consentita 50 caratteri',
            'label.unique' => "La technologia $request->name è gia presente",
            'color.required' => 'Il campo colore é obbligatorio',
            'color.string' => 'Il colore deve essere una stringa esadecimale',
            'color.min' => 'Lunghezza minima consentita 7 caratteri',
            'color.max' => 'Lunghezza massima consentita 7 caratteri',
        ]);
        $data = $request->all();

        $technology = new Technology();
        $technology->fill($data);
        $technology->save();
        return to_route('admin.technologies.index')->with('type', 'success')->with('msg', 'Crezione avvenuta con successo');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('technologies')->ignore($technology->id), 'min:1', 'max:50'],
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'Il campo label é obbligatorio',
            'label.string' => 'Il label deve essere una stringa',
            'label.min' => 'Lunghezza minima consentita 1 carattere',
            'label.max' => 'Lunghezza massima consentita 50 caratteri',
            'label.unique' => "la technologia $request->name è gia presente",
            'color.required' => 'Il campo colore é obbligatorio',
            'color.string' => 'Il colore deve essere una stringa esadecimale',
            'color.min' => 'Lunghezza minima consentita 7 caratteri',
            'color.max' => 'Lunghezza massima consentita 7 caratteri',
        ]);
        $data = $request->all();
        $technology->update($data);
        return to_route('admin.technologies.index')->with('type', 'success')->with('msg', 'Modifica avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologies.index')->with('type', 'success')->with('msg', 'Technology deleted whit success');
    }
}
