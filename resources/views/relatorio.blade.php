@extends('layouts.app')
@section('content')

<table  class="table table-striped">
        <thead class="thead-dark">
          <th scope="col">Número da venda</th>
          <th scope="col">Valor</th>
          <th scope="col">Data</th>
          <th scope="col">Horario</th>
        </thead>
          @foreach($vendas as $venda)
          <tr>
            <th scope="row">{{$venda->numero_venda}}</th>
            <td>{{$venda->valor}}</td>
            <td>{{$venda->data}}</td>
            <td>{{$venda->horario}}</td>
          </tr>
          
          <div></div>
          @endforeach
        </tbody>
        
      </table>
      <a href="{{action('relatorio@downloadPDF', [$vendendor])}}" class="btn btn-primary btn-block">Baixar PDF</a>
@endsection