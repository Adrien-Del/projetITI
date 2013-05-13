<?php
/**
* Projet ITI - Mangez Moi - Adrien DELANNOY / Arthur de BONNEVILLE
* @package   ProjetITI
* @subpackage ProjetITI
* @author   Adrien DELANNOY - Arthur de BONNEVILLE
* @copyright 2013 Adrien DELANNOY - Arthur de BONNEVILLE
* @license    All rights reserved
*/
class navbarZone extends jZone {
protected $_tplname='navbar';
        
protected function _prepareTpl(){

        
        $testconnection = jAuth::isConnected();
        $user2 = jAuth::getUserSession();
        $this->_tpl->assignZone('LOGIN', 'login',array ('isLogged'=>$testconnection,'user'=>$user2));

}
}
?>
