<?php
// Autor: Carlos Said Sanchez Dominguez

spl_autoload_register(function ($class) {
    // El prefijo del namespace principal
    $prefix = 'App\\';
    
    // Directorio base para el prefijo
    $base_dir = __DIR__ . '/';
    
    // Verifica si la clase usa el prefijo
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    // Obtiene el nombre relativo de la clase
    $relative_class = substr($class, $len);
    
    // Reemplaza los separadores de namespace por separadores de directorio
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // Si el archivo existe lo requerimos
    if (file_exists($file)) {
        require $file;
    }
});