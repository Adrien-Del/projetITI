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
      
        //test de génération d'url pour afficher des images
        $imagefactory = jDao::get("post");
        $listeimage = $imagefactory->findAll();
        $rep->body->assign('IMAGES', $listeimage);
        
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       

        return $rep;
    }
    
     function afficher_commande() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="commande";
         
                 //Ajout de balise <meta> pour le responsive design
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        //test de génération d'url pour afficher des images
        $imagefactory = jDao::get("post");
        $image = $imagefactory->get(1);
        $rep->body->assign('IMAGES', $image);
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       

        return $rep;
        
     }
}