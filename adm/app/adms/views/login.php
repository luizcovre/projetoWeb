<?php
    if(!defined("A1B2C3")){
        die("Erro: Página não encontrada!<br>");
    }

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!$dados) {
        die("Erro: Dados do formulário não recebidos!<br>");
    }

    $username = mysqli_real_escape_string($conn, $dados['username']);
    $sql_user = "SELECT X.id, X.name, X.email, X.password, X.adms_sits_users_id
                FROM adms_users X
                WHERE X.email = '$username' OR X.username = '$username'
                LIMIT 1";

    $result_user = mysqli_query($conn, $sql_user);

    if(($result_user) and ($result_user->num_rows != 0)){
        $row_user = mysqli_fetch_assoc($result_user);

        if($row_user['adms_sits_users_id'] != 1){
            echo "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
        } elseif(password_verify($dados['password'], $row_user['password'])){
            unset($dados);
            $url_destino = URLADM . "/dashboard";
            header("Location: $url_destino");
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário ou senha inválida!</p>";
        }
    } else {
        echo "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
    }
?>

<form method="POST" action="">
    <?php
        $username = "";
        if(isset($dados['username'])){
            $username = $dados['username'];
        }
    ?>
    <label>Usuário</label>
    <input type="text" name="username" placeholder="Digite o usuário ou e-mail" value="<?php echo $username; ?>"
    autofocus required><br><br>

    <?php
        $password = "";
        if(isset($dados['password'])){
            $password = $dados['password'];
        }
    ?>
    <label>Senha</label>
    <input type="password" name="password" placeholder="Digite a senha" value="<?php echo $password; ?>"
    required><br><br>

    <input type="submit" name="envioLogin" value="Acessar">
</form>