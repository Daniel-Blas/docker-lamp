<?php
    function compruebaExtension($archivo){
        $imageFileType = strtolower(pathinfo($archivo['name'],PATHINFO_EXTENSION));
        return ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif")? false : true;
    }

    function compruebaTamanho($archivo){
        return ($archivo["size"] > 50000000? false : true);
    }
?>