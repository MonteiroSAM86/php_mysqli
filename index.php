<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de PHP MySQL</title>
    <link rel="stylesheet" href="_css/estilo.css">

</head>
<body>
    <header>
        <h1>Curso de PHP MySQL</h1>
    </header>
    <section>
        <div>

            <?php
                              
                $db_host="localhost";
                $db_nome="condominio";
                $db_user="root";
                $db_password="";

                $conn=mysqli_connect($db_host, $db_user, $db_password);
                //podemos acrescentar o nome da base de dados em separado
                mysqli_select_db($conn, $db_nome) or die ("Base de Dados não encontrada");

                if (mysqli_connect_errno()) {
                    echo "ERRO ligação Base de Dados";
                    exit();
                }
                
                mysqli_set_charset($conn, "utf8");

                $consulta="SELECT data, descricao, valor FROM banco";

                $resultado=mysqli_query($conn, $consulta);

                while (($row = mysqli_fetch_row($resultado)) == true ) {
                    echo $row[0] ." | ".$row[1]." | ".$row[2]."<br>";
                }

                



            ?>

        </div>
        
    </section>
    
    <footer>
        <p>&copy;Hugo Monteiro</p>
    </footer>

</body>
</html>