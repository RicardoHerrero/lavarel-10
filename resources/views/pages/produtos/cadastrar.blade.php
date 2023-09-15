@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro de Novo Produto</h1>
    <a type="button" href="{{ route('produto.index') }}" class="btn btn-primary float-end">Voltar</a>
</div>
    
<form class="row g-3" method="POST" action="{{ route('produto.cadastro') }}">
    @csrf
    <div class="col-12">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" value="{{ @old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" placeholder="Nome do Produto">
      @if ($errors->has('nome'))
          <div class="invalid-feedback">{{$errors->first('nome')}}</div>
      @endif
    </div>
    <div class="col-12">
      <label for="valor" class="form-label">Valor</label>
      <input type="text" value="{{ @old('valor') }}" class="form-control @error('valor') is-invalid @enderror" name="valor" id="valor" placeholder="Valor do Produto. Ex. 100,00">
      @if ($errors->has('valor'))
          <div class="invalid-feedback">{{$errors->first('valor')}}</div>
      @endif
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>

@endsection