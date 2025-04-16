<?php

class controllers 
{
    public $views;
    public $model;

    public function __construct()
    {
        $this->views = new views();
        $this->loadClassModels();
    }

    public function loadClassModels(){
        # Con este metodo se obtiene el nombre del controlador
        $class = get_class($this);
        $arrClassModel = explode("_controller", $class);
        

        $model = $arrClassModel[0] . '_model';
        $path = MODELS . $model .'.php';
        if(file_exists($path))
        {
            require $path;
            $this->model = new $model();
        }

    }
}



?>