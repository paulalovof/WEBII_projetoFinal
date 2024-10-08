<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use App\Models\Eixo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $this->authorize('index', Inscricao::class);

        $data = Inscricao::all();

        $eixo = Eixo::find($id);
        $user = Auth::user()->id;
        if(isset($eixo)){
            
            // Criar uma nova inscrição se o usuário ainda não estiver inscrito
            $inscricao = new Inscricao();
            $inscricao->user_id = $user; // Aqui usamos $user_id diretamente
            $inscricao->eixo_id = $eixo->id; // Aqui usamos $eixo->id diretamente

            $inscricao->save();

            return redirect()->route('eixo.index');
            
        }

        return "<h1>ERRO: Eixo NÃO ENCONTRADO!</h1>";
    }

    public function cancel($id)
    {
        // Lógica para cancelar a inscrição
        //$inscricao = Inscricao::findOrFail($id);
        
        $data = Inscricao::all();

        $eixo = Eixo::find($id);
        foreach($data as $item) {
            $inscricaoExistente = Inscricao::where('user_id', Auth::user()->id)->where('eixo_id', $id)->first();
            if(isset($inscricaoExistente)){
                $eixo->flag = false; 
                $inscricaoExistente->delete();
            } 
        }
        
        return redirect()->route('eixo.index');
    }

}
