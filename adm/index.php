<?php
    //limpa o buffer
    ob_start();

    define("A1B2C3", true);

    include_once "./config/config.php";
    include_once "./app/adms/lib/lib_clean_url.php";
    include_once "./config/connection.php";

    // Recebe a url
    $url = filter_input(INPUT_GET, "url", FILTER_SANITIZE_SPECIAL_CHARS);

    if($url == null){
        $url = "";
    }

    $url_clear = cleanUrl($url);

    // Converte a string em array
    $url_path = $url_clear ? preg_split("/\//", $url_clear) : [];

    if ((isset($url_path[0])) && (!empty($url_path[0]))) {
        $path_page = $url_path[0];
    } else {
        $path_page = "login";
    }

    if ((isset($url_path[1])) && (!empty($url_path[1]))) {
        $path_detail = $url_path[1];
    } else {
        $path_detail = "";
    }
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
                    include_once "app/adms/views/404.php";  
                    echo "Página $path_page não existe";
                }
            }else{
                include_once "app/adms/views/login.php";
            }
        ?>
    </body>
</html>