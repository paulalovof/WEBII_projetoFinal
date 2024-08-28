<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Eixo;
use App\Models\Inscricao;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class EixoController extends Controller
{
    public function index()
    {   
        $this->authorize('index', Eixo::class);

        $data = Eixo::all();
        
        $cont = 0;
        foreach($data as $item) {
            $item->flag = false; 
            $inscricaoExistente = Inscricao::where('user_id', Auth::user()->id)->where('eixo_id', $item->id)->first();
            if(isset($inscricaoExistente)) $item->flag = true; 
            $data[$cont] = $item;
            $cont++;
        }

        //dd($inscricaoExistente);
        Storage::disk('local')->put('example.txt', 'Contents');
        return view('eixo.index', compact(['data']));
    }

    public function create()
    {
        $this->authorize('create', Eixo::class);
        
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Eixo::class);

        if($request->hasFile('documento')){
            $eixo = new Eixo();
            $eixo->nome = $request->nome;
            $eixo->descricao = $request->descricao;

            $eixo->save();
            $ext = $request->file('documento')->getClientOriginalExtension();
            $nome_arq = $eixo->id . "_" . time() . "." . $ext;
            $request->file('documento')->storeAs("public/", $nome_arq);
            
            $eixo->url =  $nome_arq;
            $eixo->save();

            return redirect()->route('eixo.index');
        }

        $eixo = new Eixo();
        $eixo->nome = $request->nome;
        $eixo->descricao = $request->descricao;

        $eixo->save();

        return redirect()->route('eixo.index');
        //dd($request);   
    }

    public function show($id){
        $this->authorize('show', Eixo::class);

        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.show', compact(['eixo']));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function edit($id){
        $this->authorize('edit', Eixo::class);

        $eixo = Eixo::find($id);
        //dd($eixo);
        if(isset($eixo)){
            return view('eixo.edit', compact('eixo'));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function update(Request $request, $id){
        $this->authorize('edit', Eixo::class);

        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->nome = $request->nome;
            $eixo->descricao = $request->descricao;
            $eixo->save();

            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";

    }

    public function destroy($id){
        $this->authorize('destroy', Eixo::class);

        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->delete();
            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function report(){
        $data = Eixo::all();

        // Instancia um Objeto da Classe Dompdf
        $dompdf = new Dompdf();
        // Carrega o HTML
        $dompdf->loadHtml(view('eixo.pdf', compact('data')));
        // (Opcional) Configura o Tamanho e Orientação da Página
        //$dompdf->setPaper('A4', 'landscape');
        // Converte o HTML em PDF
        $dompdf->render();
        // Serializa o PDF para Navegador
        $dompdf->stream("eixo.pdf", array("Attachment" => false));
    }

    public function graph(){
        $data = json_encode([
            ["NOME", "TOTAL"],
            ["Eduardo", 100],
            ["Paula", 150],
            ["Betinho", 130],
            ["Maria", 200],
            ["Gil", 90]
        ]);

        return view('eixo.graph', compact('data'));
    }
}
