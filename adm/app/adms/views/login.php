<?php
    if(!defined("A1B2C3")){
        die("Erro: Página não encontrada!<br>");
    }

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);
?>

<form method="POST" action="">
    <label>Usuário</label>
    <input type="text" name="username" placeholder="Digite o usuário ou e-mail" autofocus required><br><br>

    <label>Senha</label>
    <input type="password" name="password" placeholder="Digite a senha" required><br><br>

    <input type="submit" name="envioLogin" value="Acessar">
</form>