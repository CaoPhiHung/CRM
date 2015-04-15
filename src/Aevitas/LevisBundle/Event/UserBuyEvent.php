<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserBuyEvent
 *
 * @author truongld
 */

namespace Aevitas\LevisBundle\Event;

class UserBuyEvent extends UserEvent {
    
    //override construction
    public function __construct(){
        
    }


    public function launch(){
        exit('user buy event here');
        //do something here
        
    }
}

?>
