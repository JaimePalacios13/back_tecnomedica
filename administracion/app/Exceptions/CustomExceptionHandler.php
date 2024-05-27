<?php

namespace App\Exceptions;

class CustomExceptionHandler {
    public static function handleException(\Throwable $exception) {
        // Log the exception details for debugging
        log_message('error', $exception->getMessage());
        log_message('debug', $exception->getTraceAsString());

        // Display a user-friendly error view
        http_response_code(500); // Set the HTTP response code to 500

        // Calculate the absolute path to the error view
        $errorViewPath = __DIR__ . '/../Views/error_view.php';

        // Check if the error view file exists
        if (file_exists($errorViewPath)) {
            include $errorViewPath;
        } else {
            // Fallback if the error view file is not found
            echo "Ha ocurrido un error, pero la vista del error no pudo ser cargada.";
        }
        exit();
    }
}

// Register the custom exception handler
set_exception_handler([CustomExceptionHandler::class, 'handleException']);
?>