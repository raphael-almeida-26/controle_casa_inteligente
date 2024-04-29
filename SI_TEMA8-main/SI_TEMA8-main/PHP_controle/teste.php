<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Casa Inteligente</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Casa Inteligente</h1>
    <?php
    // Função para verificar se o sensor de temperatura foi acionado (simulação)
    function verificarSensorIncendio() {
        // Implemente a lógica real para verificar o sensor de temperatura aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para verificar se o sensor de fumaça foi acionado (simulação)
    function verificarSensorInvasão() {
        // Implemente a lógica real para verificar o sensor de fumaça aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para verificar se o sensor de movimento foi acionado (simulação)
    function verificarSensorfalta_De_energia() {
        // Implemente a lógica real para verificar o sensor de movimento aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para verificar se o sensor de porta aberta foi acionado (simulação)
    function verificarSensorvazamento_gases() {
        // Implemente a lógica real para verificar o sensor de porta aberta aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

	//ATIVIDADE
	 function verificarSensorVazamentoAgua() {
        // Implemente a lógica real para verificar o sensor de porta aberta aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para ler as regras do arquivo
    function lerRegras() {
        $regras = [];

        // Abre o arquivo de regras
        $arquivo = fopen("rules.txt", "r");
        if ($arquivo) {
            // Lê cada linha do arquivo
            while (($linha = fgets($arquivo)) !== false) {
                // Divide a linha em sensor e atuador
                $partes = explode("=", $linha);
                $sensor = trim($partes[0]);
                $atuador = trim($partes[1]);

                // Adiciona a regra ao array de regras
                $regras[$sensor] = $atuador;
            }

            // Fecha o arquivo
            fclose($arquivo);
        } else {
            echo "<p>Erro ao abrir o arquivo de regras.</p>";
        }

        return $regras;
    }

    // Função para acionar o atuador correspondente
    function acionarAtuador($atuador) {
        // Implemente o código para acionar o atuador aqui
        // Neste exemplo, vamos apenas imprimir uma mensagem
        echo "<p>Atuador acionado: $atuador</p>";
    }

    // Inicializa um array para armazenar quais sensores foram acionados
    $sensores_acionados = [];

    // Verifica se o sensor de Incendio foi acionado
    if (verificarSensorIncendio()) {
        $sensores_acionados[] = 'Incendio';
    }

    // Verifica se o sensor de Invasão foi acionado
    if (verificarSensorInvasão()) {
        $sensores_acionados[] = 'Invasão';
    }

    // Verifica se o sensor de movimento foi acionado
    if (verificarSensorfalta_De_energia()) {
        $sensores_acionados[] = 'falta_De_energia';
    }

    // Verifica se o sensor de porta aberta foi acionado
    if (verificarSensorvazamento_gases()) {
        $sensores_acionados[] = 'vazamento_gases';
    }
	
	// ATIVIDADE
    if (verificarSensorVazamentoAgua()) {
        $sensores_acionados[] = 'vazamento_agua';
    }

    // Se algum sensor foi acionado, exibe a mensagem
    if (!empty($sensores_acionados)) {
        echo "<p>Sensores acionados: " . implode(', ', $sensores_acionados) . "</p>";
    } else {
        echo "<p>Nenhum sensor foi acionado.</p>";
    }

    // Lê as regras do arquivo
    $regras = lerRegras();

    // Percorre os sensores acionados e executa os atuadores correspondentes
    foreach ($sensores_acionados as $sensor) {
        // Verifica se existe uma regra para o sensor atual
        if (isset($regras[$sensor])) {
            // Aciona o atuador correspondente à regra
            acionarAtuador($regras[$sensor]);
        } else {
            echo "<p>Nenhuma regra encontrada para o sensor $sensor.</p>";
        }
    }
    ?>
</div>

</body>
</html>
