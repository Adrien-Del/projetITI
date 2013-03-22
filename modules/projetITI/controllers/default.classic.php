<?php
/**
* @package   ProjetITI
* @subpackage ProjetITI
* @author    Adrien DELANNOY
* @copyright 2013 Adrien DELANNOY
* @license    All rights reserved
*/

class defaultCtrl extends jController {
    
    //Fonction principale, index
    function index() {
        $rep = $this->getResponse('html');

        $rep->bodyTpl = "main";

        //Ajout de balise <meta> pour le responsive design
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
      
        $rep->body->assign('TITLE','Bienvenue sur le site de Mangez-Moi');
        $rep->body->assign('CONTENT','Nous sommes heureux de vous acceuillir');

        //factory des régions
        //$regionfactory = jDao::get("region");
        //$listeregion = $regionfactory->findAll();
        //$rep->body->assign('REGION', $listeregion);



        //$rep->body->assign('IMG',jApp::config()->urlengine['basePath'].'images/');
       

        return $rep;
    }
}