<?php

class admin_navbarZone extends jZone {
protected $_tplname='admin_navbar';
        
protected function _prepareTpl(){

        
        $testconnection = jAuth::isConnected();
        $user2 = jAuth::getUserSession();
        $this->_tpl->assignZone('LOGIN', 'login',array ('isLogged'=>$testconnection,'user'=>$user2));

}
}
?>
