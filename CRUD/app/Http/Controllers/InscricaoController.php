<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use App\Models\Eixo;
use App\Models\User;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_eixo)
    {
        $this->authorize('index', Inscricao::class);

        $data = Inscricao::all();

        $eixo = Eixo::find($id_eixo);
        //$user = User::find($id_user);
        if(isset($eixo)){
            //if se esse usuário ainda nao estiver inscrito nesse eixo
            
            $existente = Inscricao::find($data->id);
            if(!isset($existente)){
                $inscricao = new Inscricao();
                //$inscricao->id_user = $user->id_user;
                $inscricao->id_eixo = $eixo->id_eixo;

                $inscricao->save();

                return view('index', compact(['inscricao']));
            }
            
            return "<h1>Você já está inscrito nesse Eixo!</h1>";
        }

        return "<h1>ERRO: Eixo ou Usuário NÃO ENCONTRADO!</h1>";
    }

}
