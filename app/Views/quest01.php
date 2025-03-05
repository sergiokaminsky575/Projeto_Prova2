<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão da Prova</title>
    <!-- favicon -->
 <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
<!-- Bootstrap -->
 <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/bootstrap.min.css') ?>">
<!-- fontawesome -->
<link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/all.min.css') ?>">
<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">

<!-- css -->
<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>
<body>
    <!-- top bar -->
  <?= view('partials/top_bar') ?>

<!-- main -->
<section class="d-flex">
<nav class="main-menu p-2">
    <?= view('partials/main_menu.php')?> 
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="content-box">
                <h2>Questão Prova</h2>

 
    <div>1) Observe o trecho de código abaixo: int INDICE = 13, SOMA = 0, K = 0;
Enquanto K < INDICE faça { K = K + 1; SOMA = SOMA + K; }
Imprimir(SOMA);
Ao final do processamento, qual será o valor da variável SOMA?</div>


<div><?php
$INDICE = 13;
$SOMA = 0;
$K = 0;

while ($K < $INDICE) {
    $K = $K + 1;
    $SOMA = $SOMA + $K;
}



?>
<div>Resposta = <?php echo $SOMA; ?></div>
</div><br>

<div>2) Dado a sequência de Fibonacci, onde se inicia por 0 e 1 e o próximo valor sempre será a soma dos 2 valores anteriores (exemplo: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...), escreva um programa na linguagem que desejar onde, informado um número, ele calcule a sequência de Fibonacci e retorne uma mensagem avisando se o número informado pertence ou não a sequência.</div>
        
<div>
    Resposta = 
<?php
// Função para gerar a sequência de Fibonacci até um número
function fibonacci($numero) {
    $fibonacci = [0, 1];  // Inicia a sequência com os dois primeiros números

    // Gera a sequência até o número informado
    while ($fibonacci[count($fibonacci) - 1] < $numero) {
        $fibonacci[] = $fibonacci[count($fibonacci) - 1] + $fibonacci[count($fibonacci) - 2];
    }

    // Retorna se o número informado pertence à sequência
    return in_array($numero, $fibonacci);
}

// Função para obter o número informado
function verificaFibonacci($numero) {
    if (fibonacci($numero)) {
        echo "O número $numero pertence à sequência de Fibonacci!";
    } else {
        echo "O número $numero NÃO pertence à sequência de Fibonacci.";
    }
}

// Exemplo de uso
$numero = 21; // Altere esse número para testar com outro valor
verificaFibonacci($numero);
?>
</div><br>

<div>3) Dado um vetor que guarda o valor de faturamento diário de uma distribuidora, faça um programa, na linguagem que desejar, que calcule e retorne:
• O menor valor de faturamento ocorrido em um dia do mês;
• O maior valor de faturamento ocorrido em um dia do mês;
• Número de dias no mês em que o valor de faturamento diário foi superior à média mensal.
</div>
<div>
Resposta = 

<?php
// Função para calcular o menor, maior valor e o número de dias com faturamento superior à média
function calcularFaturamento($faturamentoDiario) {
    // Filtra os valores que não são zero
    $faturamentoDiario = array_filter($faturamentoDiario, function($item) {
        return $item['valor'] > 0;
    });

    // Extrai os valores de faturamento
    $valores = array_column($faturamentoDiario, 'valor');
    
    // Menor valor de faturamento
    $menorValor = min($valores); 

    // Maior valor de faturamento
    $maiorValor = max($valores); 

    // Média mensal
    $mediaMensal = array_sum($valores) / count($valores); 

    // Contar quantos dias têm faturamento superior à média mensal
    $diasAcimaDaMedia = 0;
    foreach ($valores as $valor) {
        if ($valor > $mediaMensal) {
            $diasAcimaDaMedia++;
        }
    }
    
    // Exibir os resultados
    echo "Menor valor de faturamento: " . $menorValor . "\n";
    echo "Maior valor de faturamento: " . $maiorValor . "\n";
    echo "Número de dias com faturamento superior à média mensal: " . $diasAcimaDaMedia . "\n";
}

// Carregar os dados do arquivo JSON
$jsonData = file_get_contents('dados.json');

// Decodificar o JSON para um array
$faturamentoDiario = json_decode($jsonData, true);

// Chama a função para calcular os dados
calcularFaturamento($faturamentoDiario);
?>
</div><br>

<div>
4) Dado o valor de faturamento mensal de uma distribuidora, detalhado por estado:
• SP – R$67.836,43
• RJ – R$36.678,66
• MG – R$29.229,88
• ES – R$27.165,48
• Outros – R$19.849,53
</div>
<div>
    Resposta = 

    <?php
// Faturamento mensal detalhado por estado
$faturamentoPorEstado = [
    "SP" => 67836.43,
    "RJ" => 36678.66,
    "MG" => 29229.88,
    "ES" => 27165.48,
    "Outros" => 19849.53
];

// Calculando o faturamento total
$faturamentoTotal = array_sum($faturamentoPorEstado);

// Exibindo o faturamento total
echo "Faturamento total da distribuidora: R$ " . number_format($faturamentoTotal, 2, ',', '.') . "\n";

// Calculando e exibindo o percentual de cada estado
echo "\nPercentual de faturamento por estado:\n";
foreach ($faturamentoPorEstado as $estado => $valor) {
    $percentual = ($valor / $faturamentoTotal) * 100;
    echo "$estado: " . number_format($percentual, 2, ',', '.') . "%\n";
}
?>


</div>

<div>
5) Escreva um programa que inverta os caracteres de um string.

IMPORTANTE:
a) Essa string pode ser informada através de qualquer entrada de sua preferência ou pode ser previamente definida no código;
b) Evite usar funções prontas, como, por exemplo, reverse;

</div>
<div>
Resposta = -
<?php
// Função para inverter a string considerando caracteres multibyte
function inverterString($str) {
    $tamanho = mb_strlen($str, 'UTF-8'); // Usando mb_strlen para considerar UTF-8
    $strInvertida = ""; // Variável para armazenar a string invertida

    // Loop para percorrer a string de trás para frente
    for ($i = $tamanho - 1; $i >= 0; $i--) {
        $strInvertida .= mb_substr($str, $i, 1, 'UTF-8'); // Usando mb_substr para pegar o caractere corretamente
    }

    return $strInvertida;
}

// Exemplo de uso

// Definindo uma string
$minhaString = "Olá Mundo";

// Chama a função para inverter a string e exibe o resultado
echo "String original: " . $minhaString . "\n";
echo "String invertida: " . inverterString($minhaString) . "\n";
?>



</div>


</div>
</div>
        </div>
    </div>
</div>








</body>
</html>