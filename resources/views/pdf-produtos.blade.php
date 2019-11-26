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
        <div style="text-align:center;"><h2>Relatório do total de vendas de produtos<h2></div>
        <table style="width:100%">
                <tr>
                        <th>ID do produto</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Total de vendas</th>
                        <th>Data criado</th>
                        <th>Última alteração em</th>
                </tr>
                @foreach($produtos as $produto)
                <tr>
                        <th>{{$produto['id_produto']}}</th>
                        <td>{{$produto['nome']}}</td>
                        <td>{{$produto['preco']}}</td>
                        <td>{{$produto['total']}}</td>
                        <td>{{$produto['created_at']}}</td>
                        <td>{{$produto['updated_at']}}</td>
                </tr>
                @endforeach
                <tr>
                </tr>

              </table>
  </body>
</html>