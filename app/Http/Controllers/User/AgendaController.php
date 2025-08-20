<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = AgendaModel::select('id', 'title', 'deskripsi', 'start', 'end')->get();
        return view('user.agenda.index', compact('agenda'));
    }
    public function detail($id)
    {
        $agenda = AgendaModel::findOrFail($id);
        return view('user.agenda.detail', compact('agenda'));
    }
    public function update(Request $request, $id)
    {
        $agenda = AgendaModel::findOrFail($id);
        $agenda->update($request->all());
        return redirect()->route('user.agenda.index')->with('success', 'Agenda updated successfully');
    }
}
