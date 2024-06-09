<?php

// app/Helpers/info_helper.php
use CodeIgniter\CodeIgniter;

/**
 * Returns CodeIgniter's version.
 */
function ci_version(): string
{
    return CodeIgniter::CI_VERSION;
}

function upload_file($file, $uploadDir)
    {
        if (!$file->hasMoved()) {
            // Move the file to the desired directory
            $newName = $file->getRandomName();

            // Ensure the upload directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $file->move($uploadDir, $newName);

            // Retorna la nueva url de la imagen para ser guardada en la base de datos
            return $uploadDir.$newName;

        }else{
            $data = ['errors' => 'Este archivo ya ha sido movido.'];
            echo json_encode(var_dump($data));
        }
    }