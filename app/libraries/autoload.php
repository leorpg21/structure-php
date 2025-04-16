<?php 
# Con este procedimiento vamos a cargar todas las clases que estemos agregando en la carpeta libreria.
    spl_autoload_register(function($class){
        #Verific si existe el archivo
        if(file_exists(LIBRARIES .$class.".php")) require LIBRARIES . $class . ".php";
    });

?>
