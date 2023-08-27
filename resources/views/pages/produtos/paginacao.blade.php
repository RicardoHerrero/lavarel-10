@extends('index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="" method="get" class="form-inline">
            <input type="text" class="form-control-plaintext form-control-lg input-busca" name="pesquisar" placeholder="Digite o nome para buscar" />
            <button class="btn btn-secondary">Pesquisar</button>
            <a type="button" href="" class="btn btn-primary float-end">Cadastrar Produto</a>
        </form>
    </div>
    <div>
        <hr/>
        <h2>Listagem dos Produtos</h2>
        <div class="table-responsive mt-4">
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
                    <a href="" class="btn btn-danger btn-sm">Excluir</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
    </div>

@endsection