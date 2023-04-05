<?php
include_once('pesquisaproduto_api.php');


//$response=enviarREST($url, $data);
//$retornoDecod= json_decode($response, true);
//print_r($retornoDecod);



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pdv.css">
    <title>PDV</title>
</head>
<body>
    <div class="container">
        <header>
            <img class="logo" src="img/GFFLOG2.png" alt="logo">
            <div class="relogio">
                <div class="display">
                    <span id="horas">12</span>
                    <span>:</span>
                </div>
                <div>
                    <span id="minutos">00</span>
                    <span>:</span>
                </div>
                <div>
                    <span id="segundos">00</span>
                </div>
            </div>
            <button class="sair">Sair</button>    
        </header>
        <main>
                <span class="leg_prod">Produto:</span>
                <br>
                <input type="text" class="inp_produto" placeholder="Nome do produto ou parte dele" oninput="">
                <ul >
                    <li>
                        <div>
                            "lirio p16 rosa"
                            <small></small>
                        </div>
                    </li>
                </ul>
        </main>
        <aside>
            <div class="lista">
                <table class="tabela">
                    <thead>
                      <tr>
                        <th>QTD</th>
                        <th>Produto</th>
                        <th>VL.UNID</th>
                        <th>VL.TOTAL</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $produtos = array_column($BdProdutos['retorno']['produtos'], 'produto');
                      $nomes= array_column($produtos,'nome');
                      $valores= array_column($produtos,'preco');
                      $qtd=2;
                      
                      
                      foreach($produtos as $valor) {
                        $valorTotalitem = $valor['preco'] * $qtd;                        
                        echo "<tr>";
                        echo "<td>". $qtd ."</td>";
                        echo "<td class='des'>". $valor['nome'] ."</td>";
                        echo "<td>". $valor['preco'] ."</td>";
                        echo "<td>". $valorTotalitem ."</td>";
                                            
                      };    
                                        
                      
                      ?>
                    </tbody>
                    
                  </table>
                <div class="total">
                    <label class="total1">Total</label>
                    <label class="totalValor">R$115,00</label>
                </div>
                    <button class="BTN_cancelar" type="submit">CANCELAR(F8)</button>
                    <button class="BTN_pagamento" type="submit">PAGAMENTO(F12)</button>   
                </div>
        </aside>
    </div>
    <script src="script.js"></script>
</body>
</html>