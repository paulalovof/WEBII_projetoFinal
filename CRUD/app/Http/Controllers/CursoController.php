<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Curso::class);

        $cursos = Curso::all();

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Curso::class);

        $eixos = Eixo::all();

        return view('curso.create', compact('eixos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Curso::class);

        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->sigla = $request->sigla;
        $curso->eixo_id = $request->eixo_id;
        $curso->save();

        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('show', Curso::class);

        $curso = Curso::find($id);
        $eixo = Eixo::find($curso->eixo_id);
        if(isset($eixo)){
            return view('curso.show', compact(['curso', 'eixo']));
        }

        return "<h1>ERRO: CURSO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Curso::class);

        $curso = Curso::find($id);
        $eixos = Eixo::all();

        if(isset($curso)){
            return view('curso.edit', compact('curso', 'eixos'));
        }

        return "<h1>ERRO: CURSO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('create', Curso::class);

        $curso = Curso::find($id);
        $curso->nome = $request->nome;
        $curso->sigla = $request->sigla;
        $curso->eixo_id = $request->eixo_id;
        $curso->save();

        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('destroy', Curso::class);

        $curso = Curso::find($id);
        if(isset($curso)){
            $curso->delete();
            return redirect()->route('curso.index');
        }

        return "<h1>ERRO: CURSO NÃO ENCONTRADO!</h1>";
    }
}
