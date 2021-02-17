<?php

class Controller
{
    /***
     * Affichage de la vue
     */
    public function render($vue, array $params = [])
    {
       
       if(!empty($params))
       {
            foreach($params as $key => $value)
            {
                ${$key} = $value;
    
            }
       }
        require "views/$vue.php";
    }

    /***
     * Redirection 
     */
    public function redirectTo($class, $action = "index", array $params = [])
    {
        
        $attributes = "";
        if(!empty($params))
       {
            foreach($params as $key => $value)
            {
                $attributes = $attributes."&".$key."=".$value;    
                
            }
       }
        header("Location: index.php?class=$class&action=$action".$attributes);
    }
}