<?php

class navbarZone extends jZone {
protected $_tplname='navbar';
        
protected function _prepareTpl(){

        
        $testconnection = jAuth::isConnected();
        $user2 = jAuth::getUserSession();
        $this->_tpl->assignZone('LOGIN', 'login',array ('isLogged'=>$testconnection,'user'=>$user2));

}
}
?>
