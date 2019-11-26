@extends('layouts.app')
@section('content')
<div class="container">
<table  class="table table-striped">
        <thead class="thead-dark">
          <th scope="col">ID do produto</th>
          <th scope="col">Produto</th>
          <th scope="col">Preço</th>
          <th scope="col">Total de vendas</th>
          <th scope="col">Data criado</th>
          <th scope="col">Última alteração em</th> 
        </thead>
          @foreach($produtos as $produto)
          <tr>
            <th scope="row">{{$produto['id_produto']}}</th>
            <td>{{$produto['nome']}}</td>
            <td>{{$produto['preco']}}</td>
            <td>{{$produto['total']}}</td>
            <td>{{$produto['created_at']}}</td>
            <td>{{$produto['updated_at']}}</td>
          </tr>
          
          <div></div>
          @endforeach
        </tbody>
        
      </table>
    <a href='{{action('produtos@generate',['produtos'=>$produtos])}}' class="btn btn-primary btn-block">Baixar PDF</a>
    </div>
      
@endsection