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
    <div style="text-align:center;"><h1>{{$vendendor->nome}}<h1></div>
    <h3>{{$mes}}</h3>
        <table style="width:100%">
                <tr>
                  <th>Número da venda</th>
                  <th>Cliente</th>
                  <th>Total</th>
                  <th>Data</th>
                  <th>Horario</th>
                </tr>
                @foreach($vendas as $venda)
                <tr>
                    <td width="100"></td>
                    <td ></td>
                    <td width="100"></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                </tr>

              </table>
                  <h4>Total: <span> R$</span></h4>
  </body>
</html>