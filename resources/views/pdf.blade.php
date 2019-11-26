<!DOCTYPE html>
<html>
  <head>
        <style>
                table, th, td {
                  border: 1px solid black;
                }
                th, td {
                  padding: 5px;
                  text-align: left;    
                }
            </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div style="text-align:center;"><h2>{{$vendendor->nome}}<h2></div>
    <h3>{{$mes}}</h3>
        <table style="width:100%">
                <tr>
                  <th>Número da venda</th>
                  <th>Cliente</th>
                  <th>Valor</th>
                  <th>Data</th>
                  <th>Horario</th>
                </tr>
                @foreach($vendas as $venda)
                <tr>
                    <td width="100">{{$venda->numero_venda}}</td>
                    <td >{{$venda->cliente}}</td>
                    <td width="100">{{$venda->valor}}</td>
                    <td>{{$venda->data}}</td>
                    <td>{{$venda->horario}}</td>
                </tr>
                @endforeach
                <tr>
                </tr>

              </table>
                  <h4>Total das vendas: <span>{{$total}} R$</span></h4>
  </body>
</html>