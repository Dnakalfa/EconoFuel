<html>
    <head>
        <title>Resposta</title>
        <link rel="stylesheet" type="text/css" href="/assets/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Resposta</h1>
            <?php
                $distancia = $_POST["distancia"];
                $precoEtanol = $_POST["precoEtanol"];
                $precoGasolina = $_POST["precoGasolina"];
                $gastoEtanol = $distancia / 9 * $precoEtanol;
                $gastoGasolina = $distancia / 11 * $precoGasolina;
                
                echo "<p>O valor gasto com etanol é: " . number_format($gastoEtanol, 2, ',', '.') . "</p>";
                echo "<p>O valor gasto com gasolina é: " . number_format($gastoGasolina, 2, ',', '.') . "</p>";
                
                if ($gastoEtanol < $gastoGasolina) {
                    echo "<p>Abasteça com Etanol</p>";
                } else {
                    echo "<p>Abasteça com Gasolina</p>";
                }

                // Exibe uma mensagem de sucesso após a inserção no banco
                $data = date('Y-m-d');
                $host="localhost";
                $port=3306;
                $socket="";
                $user="root";
                $password="145145145";
                $dbname="meubd";

                $con = new mysqli($host, $user, $password, $dbname, $port, $socket);
                if (!$con) {
                    die("<p class='error'>Falha de conexão: " . mysqli_connect_error() . "</p>");
                }

                $sql = "INSERT INTO combustivel (registro, data, precoEtanol, precoGasolina) VALUES (NULL, '$data', $precoEtanol, $precoGasolina)";
                if (mysqli_query($con, $sql)) {
                    echo "<p class='message'>Novo registro inserido com sucesso!</p>";
                } else {
                    echo "<p class='error'>Erro: " . $sql . "<br>" . mysqli_error($con) . "</p>";
                }
                mysqli_close($con);
            ?>
            <br/>
            <a href="index.php">Voltar para o formulário</a>
            <br/>
            <a href="/data/relatorio.php">Abrir Relatório</a>
            <br/>
            <a href="/data/mediana.php">Abrir Relatorio de Medias</a>
        </div>
    </body>
</html>

