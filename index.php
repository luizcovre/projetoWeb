<?php
    $path_page = "login"
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Covre</title>
    </head>
    <body>
        <?php
            if(!empty($path_page)){
                if(file_exists("app/adms/views/".$path_page.".php")){
                    include_once "app/adms/views/".$path_page.".php";
                }else{
                    include_once "app/adms/views/login.php";  
                    echo "Página $path_page não existe";
                }
            }else{
                include_once "app/adms/views/login.php";
            }
        ?>
    </body>
</html>