<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::all();
        return view('barbers.index', compact('barbers'));
    }

    public function create()
    {
        return view('barbers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Barber::create($request->all());

        return redirect()->route('barbers.index');
    }

    public function edit(Barber $barber)
    {
        return view('barbers.edit', compact('barber'));
    }

    public function update(Request $request, Barber $barber)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $barber->update($request->all());

        return redirect()->route('barbers.index');
    }

    public function destroy(Barber $barber)
    {
        $barber->delete();

        return redirect()->route('barbers.index');
    }
}
