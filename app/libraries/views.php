<?php

    class views
    {
        public function getViews($controllers, $views, $data)
        {
            $arrClass = explode("_controller",get_class($controllers));
            $controller = $arrClass[0];
            require  VIEWS . "default/header.php";
            require  VIEWS . $controller . "/" . $views . ".php";
            require  VIEWS . "default/footer.php";
            
        }

        
    }
    
   
?>