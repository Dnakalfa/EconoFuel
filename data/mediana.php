<html>
    <head>
        <title>Relatório Mediana</title>
    </head>
    <body>
        <?php
        //declara as variáveis de configuração da conexão ao banco de dados
        //define as variáveis de configuração da conexão
        $host="localhost";
        $port=3306;
        $socket="";
        $user="root";
        $password="145145145";
        $dbname="meubd";
    
        //abre a conexão com o banco
        $con = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Could not connect to the database server' . mysqli_connect_error());
        if (!$con) {
            die("Falha de conexão: " . mysqli_connect_error());
        }
        
        //instrução SQL para consulta de dados
        $sql = "SELECT AVG(precoEtanol) as mediaEtanol,
        AVG(precoGasolina) as mediaGasolina,
        MAX(precoEtanol) as maiorEtanol,
        MAX(precoGasolina) as maiorGasolina,
        MIN(precoEtanol) as menorEtanol,
        MIN(precoGasolina) as menorGasolina
        FROM combustivel";
        //executa a instrução SQL
        $res=mysqli_query($con,$sql);
        //retorna os dados da consulta
        //não há necessidade de estrutura de repetição, pois a instrução SQL irá retornar apenas um registro
        $row = mysqli_fetch_array($res);
        //imprime os resultados
        echo "<br/>Média de preço do Etanol: " . number_format($row["mediaEtanol"], 2, ",", ".");
        echo "<br/>Média de preço da Gasolina: " . number_format($row["mediaGasolina"], 2, ",", ".");
        echo "<br/>Maior preço do Etanol: " . number_format($row["maiorEtanol"], 2, ",", ".");
        echo "<br/>Maior preço da Gasolina: " . number_format($row["maiorGasolina"], 2, ",", ".");
        echo "<br/>Menor preço do Etanol: " . number_format($row["menorEtanol"], 2, ",", ".");
        echo "<br/>Menor preço da Gasolina: " . number_format($row["menorGasolina"], 2, ",", ".");
        
        //fecha a conexão com o banco de dados
        mysqli_close($con);
        
        ?>
    </body>
</html>