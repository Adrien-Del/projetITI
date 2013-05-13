<?php
/**
* Projet ITI - Mangez Moi - Adrien DELANNOY / Arthur de BONNEVILLE
* @package   ProjetITI
* @subpackage ProjetITI
* @author   Adrien DELANNOY - Arthur de BONNEVILLE
* @copyright 2013 Adrien DELANNOY - Arthur de BONNEVILLE
* @license    All rights reserved
*/

require (realpath(__DIR__.'/../jelix/lib/jelix/').'/'.'init.php');

jApp::initPaths(
    __DIR__.'/',
    __DIR__.'/www/',
    __DIR__.'/var/',
    __DIR__.'/var/log/',
    __DIR__.'/var/config/',
    __DIR__.'/scripts/'
);
jApp::setTempBasePath(realpath(__DIR__.'/../temp/projetITI/').'/');
