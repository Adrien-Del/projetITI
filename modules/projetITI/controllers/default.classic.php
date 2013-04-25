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
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
      
        //test de génération d'url pour afficher les images du caroussel
        $imagefactory = jDao::get("post");
               //Création de la condition
               $condition = jDao::createConditions();
               $type_Caroussel= "Caroussel";
               $condition->addCondition('Type','=',$type_Caroussel);
               $condition->addCondition('Online','=',1);
        
        $listeimage = $imagefactory->findBy($condition);
        $rep->body->assign('IMAGES', $listeimage);
        
        
        $imagefactory2=jDao::get("post");
               $condition2 = jDao::createConditions();
               $type_Presentation= "presentation";
               $condition2->addCondition('Type','=',$type_Presentation);
               $condition2->addCondition('Online','=',1);
         $listeimage2 = $imagefactory2->findBy($condition2);
         $rep->body->assign('IMG', $listeimage2);

        
              
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       

        return $rep;
    }
    
     function afficher_commande() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="commande";
         
        //Ajout de balise <meta> pour le responsive design
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'gridster/jquery.gridster.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'gridster/jquery.gridster.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style1.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'persov1.1.js');
        
        //test de génération d'url pour afficher des images
        $imagefactory = jDao::get("post");
        $image = $imagefactory->get(1);
        $rep->body->assign('IMAGES', $image);
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       
        $menufactory = jDao::get("produit");
        $listemenu = $menufactory->findall();
        $rep->body->assign('MENU',$listemenu);
        
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);

        return $rep;
        
     }
     
     function contacter() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="contact";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        
        return $rep;
}

function creercompte() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="Formulairecreercompte";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        
        return $rep;
}
}