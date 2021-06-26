<?php

namespace Foostart\Filemanager\Handlers;

class ConfigHandler
{
    public function userField()
    {
        
        $auth = \App::make('authenticator'); 
        $user = $auth->getLoggedUser(); 
        if (empty($user)) 
        { 
            return NULL; 
            
        } 
        return $user->id; 
        
        } 
        
}
