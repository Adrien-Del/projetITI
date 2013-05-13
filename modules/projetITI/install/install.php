<?php
/**
* Projet ITI - Mangez Moi - Adrien DELANNOY / Arthur de BONNEVILLE
* @package   ProjetITI
* @subpackage ProjetITI
* @author   Adrien DELANNOY - Arthur de BONNEVILLE
* @copyright 2013 Adrien DELANNOY - Arthur de BONNEVILLE
* @license    All rights reserved
*/


class projetITIModuleInstaller extends jInstallerModule {

    function install() {
        //if ($this->firstDbExec())
        //    $this->execSQLScript('sql/install');

        /*if ($this->firstExec('acl2')) {
            jAcl2DbManager::addSubject('my.subject', 'projetITI~acl.my.subject', 'subject.group.id');
            jAcl2DbManager::addRight('admins', 'my.subject'); // for admin group
        }
        */
    }
}