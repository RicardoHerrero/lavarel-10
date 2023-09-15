<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProdutos;
use App\Models\Componentes;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produtos $produto)
    {
        $this->produto = $produto;
    }
    public function index (Request $request) {
        //dd($request);
        $pesquisar = $request->pesquisar;
        //$findProduto = $this->produto::all();
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view('pages.produtos.paginacao', compact('findProduto'));
    }
    public function delete (Request $request){
        $id = $request->id;
        $buscaRegistro = Produtos::find($id);
        $buscaRegistro->delete();
        return response()->json(['success'=>true]);
    }
    public function cadastrarProduto(FormRequestProdutos $request){
        if($request->method() == "POST"){
            //CRIA OS DADOS
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produtos::create($data);

            return redirect()->route('produto.index');
        }
        
        //ELSE TIPO==GET
        return view('pages.produtos.cadastrar');
    }
}
