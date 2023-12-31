@extends('index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="{{ route('produto.index') }}" method="get" class="form-inline">
            <input type="text" class="form-control-plaintext form-control-lg input-busca" name="pesquisar" placeholder="Digite o nome para buscar" />
            <button class="btn btn-secondary">Pesquisar</button>
            <a type="button" href="{{ route('produto.cadastro') }}" class="btn btn-primary float-end">Cadastrar Produto</a>
        </form>
    </div>
    <div>
        <hr/>
        <h2>Listagem dos Produtos</h2>
        <div class="table-responsive mt-4">

            @if ( $findProduto->isEmpty() )
              <div class="alert alert-warning" role="alert">
                Não localizado nenhum dado!
              </div>
            @else
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($findProduto as $produto)
                  <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ 'R$ ' . number_format($produto->valor, 2, ',' ,'.') }}</td>
                    <td>
                      <a href="" class="btn btn-primary btn-sm">Editar</a>
                      
                      <meta name="csrf-token" content="{{ csrf_token() }}"/>
                      <a 
                        onclick="deleteRegistroPaginacao('{{ route('produto.delete') }}', {{ $produto->id }} )" 
                        class="btn btn-danger btn-sm">
                        Excluir
                      </a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>

              </table>
            @endif
          </div>
    </div>

@endsection