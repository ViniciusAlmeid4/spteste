<?php

if (isset($_POST["entrar"]))
{

    session_start();

    include 'conecta.php';

    if(valida_form_login())
    {
        $nome_usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $res = verifica_login($conn, $nome_usuario, $senha);

        if ($res["verifica_qtde_linhas"]) 
        {
            while ($usuario = mysqli_fetch_assoc($res["result"]))
            {
                $_SESSION["user"] = $usuario["nome"];
                $_SESSION["id"] = $usuario['id'];
            }

            header("Location: ./professor.php");
        }
        else 
        {
            ?>
            <script>
                window.location.href = "index.php";
                alert("Usuário ou senha incorreto");
            </script>
            <?php        
        }
    }
    else
    {
        ?>
        <script>
            window.location.href = "index.php";
            alert("Preencha os dados");
        </script>
        <?php
    }
}

function valida_form_login()
{
    if (empty($_POST["usuario"]) || empty($_POST["senha"]))
    {
        return false;
    }
    else
    {
        return true;
    } 
}

function verifica_login($conn, $nome_usuario, $senha)
{
    $sql = "SELECT id, nome FROM usuario WHERE email = '{$nome_usuario}' AND senha = '{$senha}'";
    $query = mysqli_query($conn, $sql);

    $verifica_qtde_linhas = mysqli_num_rows($query) > 0 ? true : false;

    $response["verifica_qtde_linhas"] = $verifica_qtde_linhas;
    $response["result"] = $query;

    return $response;
}
?>
