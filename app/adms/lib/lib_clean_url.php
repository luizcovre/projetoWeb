<?php
    function cleanUrl($url) {
        // Caracteres não aceitos
        $nao_aceitos = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';

        // Caracteres aceitos
        $aceitos = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr________________________________________________________________________________________________';

        // Converter a URL para a codificação ISO-8859-1
        $url_encoded = mb_convert_encoding($url, 'ISO-8859-1', 'UTF-8');
        
        // Converter os caracteres não aceitos para aceitos
        $content_strtr = strtr($url_encoded, mb_convert_encoding($nao_aceitos, 'ISO-8859-1', 'UTF-8'), $aceitos);
        
        // Retirar os espaços em branco
        $content_replace = str_ireplace(" ", "", $content_strtr);
        
        // Retirar as tags
        $url = strip_tags($content_replace);
        
        // Adicionar uma verificação para garantir que o URL esteja no formato correto
        $url = strtolower($url); // Normalizar para minúsculas

        return $url;
    }
?>