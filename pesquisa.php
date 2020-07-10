<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultado da pesquisa</title>
</head>
<body>
<header>
        <h1>Curso de PHP MySQL</h1>
    </header>
    <section>
        <div>

            <?php
                
                $procura=$_GET["procurar"];

                require ("db_conexion.php");

                $conn=mysqli_connect($db_host, $db_user, $db_password);
                //podemos acrescentar o nome da base de dados em separado
                mysqli_select_db($conn, $db_nome) or die ("Base de Dados não encontrada");

                if (mysqli_connect_errno()) {
                    echo "ERRO ligação Base de Dados";
                    exit();
                }
                
                mysqli_set_charset($conn, "utf8");

                $consulta="SELECT f.letra, f.piso, f.permilagem, c.tratamento, c.nome, c.tlm 
                FROM fracoes f join condominos c
                on f.id_condomino = c.id_condomino
                WHERE f.letra='$procura'";

                $resultado=mysqli_query($conn, $consulta);
                echo "<table>
                            <tr>
                            <th>Letra</th>
                            <th>Piso</th>
                            <th>Permialgem</th>
                            <th>Tratamento</th>
                            <th>Nome</th>
                            <th>tlm</th>
                            </tr>
                          </table>";
                    
                while (($row = mysqli_fetch_row($resultado)) == true ) {
                    echo "<table>
                            <tr>
                                <td>".$row[0]. "</td>
                                <td>".$row[1]. "</td>
                                <td>".$row[2]. "</td>
                                <td>".$row[3]. "</td>
                                <td>".$row[4]. "</td>
                                <td>".$row[5]. "</td>
                                </tr>
                         </table>";

                    /*echo $row[0]. "</td><td>";
                    echo $row[1]. "</td><td>";
                    echo $row[2]. "</td><td>";
                    echo $row[3]. "</td><td>";
                    echo $row[4]. "</td><td>";
                    echo $row[5]. "</td><td></tr></table>";

                    echo "<br>";*/
                }
                echo "<br><br><br>";

                
                
                mysqli_close($conn);


            ?>

        </div>
        
    </section>
    
    <footer>
        <p>&copy;Hugo Monteiro</p>
    </footer>
</body>
</html>