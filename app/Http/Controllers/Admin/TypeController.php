<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('updated_at', 'DESC')->Paginate(10);

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        $select = Type::all();
        return view('admin.types.create', compact('type', 'select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string| unique:types| min:1| max:50',
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'Il campo label é obbligatorio',
            'label.string' => 'Il label deve essere una stringa',
            'label.min' => 'Lunghezza minima consentita 1 carattere',
            'label.max' => 'Lunghezza massima consentita 50 caratteri',
            'label.unique' => "Il progetto $request->name è gia presente",
            'color.required' => 'Il campo colore é obbligatorio',
            'color.string' => 'Il colore deve essere una stringa esadecimale',
            'color.min' => 'Lunghezza minima consentita 7 caratteri',
            'color.max' => 'Lunghezza massima consentita 7 caratteri',
        ]);
        $data = $request->all();

        $type = new Type();
        $type->fill($data);
        $type->save();
        return to_route('admin.types.index')->with('type', 'success')->with('msg', 'Crezione avvenuta con successo');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'label' => ['required', 'string', Rule::unique('types')->ignore($type->id), 'min:1', 'max:50'],
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'Il campo label é obbligatorio',
            'label.string' => 'Il label deve essere una stringa',
            'label.min' => 'Lunghezza minima consentita 1 carattere',
            'label.max' => 'Lunghezza massima consentita 50 caratteri',
            'label.unique' => "Il progetto $request->name è gia presente",
            'color.required' => 'Il campo colore é obbligatorio',
            'color.string' => 'Il colore deve essere una stringa esadecimale',
            'color.min' => 'Lunghezza minima consentita 7 caratteri',
            'color.max' => 'Lunghezza massima consentita 7 caratteri',
        ]);
        $data = $request->all();
        $type->update($data);
        return to_route('admin.types.index')->with('type', 'success')->with('msg', 'Modifica avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('type', 'success')->with('msg', 'Type eliminato con successo');
    }
}
