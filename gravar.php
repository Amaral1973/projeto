<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
    }
    $emails = $_SESSION['emails'];
    $id = array_search($_SESSION['usuario'], $emails);
    $nomes = $_SESSION['nomes'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1">
        <meta http-equiv="content-language" content="pt-br">
        <title>PHP / Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
            background-color: #4682B4;
        }
        .user {
            float: right;
        }
    </style>
    <body>
        <center><h1><b>PHP/ARRAY</b></h1></center>
        <hr/>
        <nav>
           &nbsp;&nbsp;<a href="inicial.php" style="color: white; text-decoration: none">HOME |</a><a href="listagem.php" style="color: white; text-decoration: none"> LISTAGEM |</a><a href="gravar.php" style="color: white; text-decoration: none"> SALVAR DADOS</a>
           <div class="user">
                <b style="color: white"><?php echo $nomes[$id]; ?> |</b> <a href="sair.php" style="color: white; text-decoration: none">SAIR</a>&nbsp;&nbsp;
           </div>
        </nav>
        <br/><br/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 text-center">
            <div class="cols">
                <div class="card mb-2 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="gray" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                            <path d="M12 2h-2v3h2z"/>
                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"/>
                            </svg>&nbsp;<b>SALVAMENTO DE DADOS</b></h3>
                    </div>
                    <div class="card-body">
                        <?php
                            $porc = 0;
                            $dados = $_SESSION['nomes'];
                            $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                            file_put_contents("nome.json", $conteudo);
                            $porc = 25;
                            $dados = $_SESSION['emails'];
                            $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                            file_put_contents("email.json", $conteudo);
                            $porc = 50;
                            $dados = $_SESSION['generos'];
                            $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                            file_put_contents("genero.json", $conteudo);
                            $porc = 75;
                            $dados = $_SESSION['senhas'];
                            $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                            file_put_contents("senha.json", $conteudo);
                            $porc = 100;
                            echo "<div class='progress'>";
                                echo "<div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: $porc%'></div>";
                            echo "</div>";
                            if ($porc == 100) {
                                    echo "<br/><h4 style='color: #696969;'>DADOS SALVOS COM SUCESSO!</h4>";
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>