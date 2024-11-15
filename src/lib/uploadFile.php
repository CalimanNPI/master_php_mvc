<?php

namespace Web\Gym\lib;

class UploadFile
{

    function __construct()
    {
    }

    /**
     * Carga archivos el la carpeta de fotos
     * 
     * Nota: Hay que crear la carpeta donde se quieren subir los archivos
     *       con el comando mkdir de php o manualmente 
     */
    public static function  uploads($target, $fileName, $filesType)
    {
        $target_dir = "\\\\s\\fotos" . $target;
        $target_file = $target_dir . $fileName . "." . getimagesize($_FILES["file"]["tmp_name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $errors = [];
        error_log($target_file);
        exit;
        // Check if image file is a actual image or fake image
        //if (isset($_POST["submit"])) {
        //    $check = getimagesize($_FILES["file"]["tmp_name"]);
        //    if ($check !== false) {
        //        echo "File is an image - " . $check["mime"] . ".  <br>";
        //        $uploadOk = 1;
        //    } else {
        //        echo "File is not an image.";
        //        $uploadOk = 0;
        //    }
        //}

        // Check if file already exists
        if (file_exists($target_file)) {
            array_push($errors,  "Sorry, file already exists.");
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 1000000000) {
            array_push($errors,  "Sorry, your file is too large.");
            $uploadOk = 0;
        }

        // Allow certain file formats

        /*if (!in_array($fileType, $filesType)) {
            array_push($errors,  "Sorry, only JPG, JPEG, PNG, GIF, MP4 & AVI files are allowed.");
            $uploadOk = 0;
        }*/


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($errors,   "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            } else {
                array_push($errors,  "Sorry, there was an error uploading your file.");
            }
        }
        return $errors;
    }
}
