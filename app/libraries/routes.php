<?php
    require CONTROLLERS . 'error_controller.php';
    
   
    $error = new error_controller;
    $controller = $controller . "_controller";
    $controllerPath = CONTROLLERS . $controller.'.php';
    

    if (file_exists($controllerPath)) 
    {   
        require $controllerPath;
        $objController = new $controller;
        if(isset($method))
        
        {
            if(method_exists($controller, $method))
            {
                if(isset($params))
                {
                    $objController->{$method}($params);
                }
                else 
                {
                    $objController->{$method}();
                }
            }else
            {
                print($url);
                $error->error($url);
            }
        }else
        {
            $error->error($url);
        }
        
    }
    else
    {
        $error->error($url);
    }
?>