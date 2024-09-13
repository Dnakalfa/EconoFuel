<html>
    <head>
        <title>Relatório</title>
    </head>
    <body>
        <h1>Relatório dos Preços de Combustível</h1>
        <?php
            
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
                //caso a conexão falhe, ele encerra a página PHP imprimindo a mensagem de erro
                die("Falha de conexão: " . mysqli_connect_error());
            }
            
            //monta o comando SQL para consulta dos dados
            $sql = "SELECT * FROM combustivel ORDER BY data";
            //executa a string SQL e atribui o seu resultado na variável $res
            $res=mysqli_query($con,$sql);
            //imprime uma tabela em HTML
            echo "<table border='1'>";
            echo "<td>" ."DATA" ."</td>";
            echo "<td>" ."ETANOL" ."</td>";
            echo "<td>" ."GASOLINA" ."</td>";
            //faz um laço de repetição que irá durar enquanto tiverem registros na consulta
            while($row = mysqli_fetch_array($res)){ 
                //imprime os dados do registro dentro de uma tabela HTML 
                //lembre-se que <TR> é coluna e que <TD> é uma coluna da tabela
                echo "<tr>";
                    echo "<td>" . $row["data"] . "</td>";
                    echo "<td>" . number_format($row["precoEtanol"], 2, ",", ".") . "</td>";
                    echo "<td>" . number_format($row["precoGasolina"], 2, ",", ".") . "</td>";
                echo "</tr>";
            }
            //fecha a tabela do HTML
            echo "</table>";
            
            //fecha a conexão com o banco de dados
            mysqli_close($con);
        ?>

    </body>
</html>