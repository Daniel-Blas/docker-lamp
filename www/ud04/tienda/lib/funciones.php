<?php
    function compruebaExtension($archivo){
        $imageFileType = strtolower(pathinfo($archivo['name'],PATHINFO_EXTENSION));
        return ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif")? false : true;
    }

    function compruebaTamanho($archivo){
        return ($archivo["size"] > 50000000? false : true);
    }

    function compruebaArchivo($archivo){
        $tipoArchivo = strtolower(pathinfo($archivo['name'],PATHINFO_EXTENSION));
        if ($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" || $tipoArchivo == "gif"){
            $target_dir = "imagen/";
        } else if ($tipoArchivo == "txt") {
            $target_dir = "texto/";
            
        } else if ($tipoArchivo == "pdf"){
            $target_dir = "pdf/";
        } else {
            $target_dir = "otros/";
        }

        return $target_dir;

    }
?>