<?php

/**
* @package   ProjetITI
* @subpackage ProjetITI
* @author   Adrien DELANNOY - Arthur de BONNEVILLE
* @copyright 2013 Adrien DELANNOY - Arthur de BONNEVILLE
* @license    All rights reserved
*/


/**
* defaultCtrl est la classe principale de Jelix.
* Dans cette classe sont présentes les fonctions du controller
*/

class defaultCtrl extends jController {
    
      /**
      * Définition des accès gérés par jAuth
      */
      public $pluginParams = array(
            '*'        => array('auth.required' => false),
            'passerCommande' => array('auth.required' => true),
      );
  
/**
* Fonction index() affiche la page d'acceuil du site
* Elle possède deux cas différents 1-admin 2-utilisateur
*
*/
    function index() {
        $rep = $this->getResponse('html');
        $user2 = jAuth::getUserSession();
       

        //Ajout de balise <meta> pour le responsive design
        $rep->title = "Mangez-Moi";
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'perso2.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
      
        
         if($user2->login==admin){
            $rep->bodyTpl = "admin_main";
            $rep->addJsLink(jApp::config()->urlengine['basePath'].'perso3.js');
            
            $imagefactorycaroussel=jDao::get("post");
               $conditioncaroussel = jDao::createConditions();
               $conditioncaroussel->addCondition('Type','=',caroussel);
               $conditioncaroussel->addCondition('Online','=',1);
         $listeimagecaroussel = $imagefactorycaroussel->findBy($conditioncaroussel);
         $rep->body->assign('IMGCAROUSSEL', $listeimagecaroussel);
         
        
        $menufactory = jDao::get("produit");
        $listemenu = $menufactory->findall();
        $rep->body->assign('MENU',$listemenu);
        
        $membrefactory = jDao::get("jlx_user");
        $listemembre = $membrefactory->findall();
        $rep->body->assign('MEMBRE',$listemembre);
        
        $imageForm = jForms::create("projetITI~newImage");
        $rep->body->assign('NEWIMAGE',$imageForm);

        $menuForm = jForms::create("projetITI~afficherProduit");
        $rep->body->assign('PRODUIT',$menuForm);
         $rep->body->assignZone('NAVIGATION', 'admin_navbar');
        }
        else{$rep->bodyTpl = "main";
        $rep->body->assignZone('NAVIGATION', 'navbar');
        }
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

        
         
       $testconnection = jAuth::isConnected();
      
       $rep->body->assignZone('LOGIN', 'login',array ('isLogged'=>$testconnection,'user'=>$user2));
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
        
        
        $url = $_SERVER["REQUEST_URI"];
        $urlquery = explode("failed=", parse_url($url,PHP_URL_QUERY));
        if($urlquery[1]==1){
            $rep->body->assignZone('LOGIN_ERREUR', 'loginerreur',array ('failed'=>2));
        }
        else{
        }
        
        
        return $rep;
    }
    
    
/**
* Affiche la page commande en utilisant l'API gridster
*/
    
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
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'persov1.3.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        
        
        $imagefactory = jDao::get("post");
        $image = $imagefactory->get(1);
        $rep->body->assign('IMAGES', $image);
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       
        $menufactory = jDao::get("produit");
        $listemenu = $menufactory->findall();
        $rep->body->assign('MENU',$listemenu);
        $rep->body->assign('IDMENU',"menu");
        
        $commandeForm = jForms::create("projetITI~commande");
        $rep->body->assign('COMMANDE',$commandeForm);
        
          $user2 = jAuth::getUserSession();
           if($user2->login==admin){
        $rep->body->assignZone('NAVIGATION', 'admin_navbar');}
        else{
         $rep->body->assignZone('NAVIGATION', 'navbar');}
        
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
        

        return $rep;
        
     }
     
/**
* Affiche la zone de succès lors du passage de la commande
*/
      function afficher_commande_succes() {
         $rep = $this->afficher_commande();
        $rep->body->assignZone('COMMANDE_SUCCES', 'commande_succes');
        return $rep;
        
     }
             
     
/**
* Affiche la page contact
*/ 
     function contacter() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="contact";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        

         $user2 = jAuth::getUserSession();
           if($user2->login==admin){
        $rep->body->assignZone('NAVIGATION', 'admin_navbar');}
        else{
         $rep->body->assignZone('NAVIGATION', 'navbar');}
       
        return $rep;
}

/**
* Génère la zone de formulaire de création de compte et l'envoie dans une variable 'NEWUSER'
*/
function creercompte() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="Formulairecreercompte";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        
        $rep->body->assignZone('NAVIGATION', 'navbar');
        $userForm = jForms::create("projetITI~newUser");
        $rep->body->assign('NEWUSER',$userForm);
        
        return $rep;
}

/**
* Récupère l'évènement d'échec d'authentification et génère la zone erreur qui est envoyée dans une variable 'LOGIN_ERREUR'
*/
    function AuthErrorLogin ()
  {
    $rep = $this->getResponse('html');
    $failed = 2;
    $rep->body->assignZone('LOGIN_ERREUR', 'loginerreur',array ('failed'=>2));
    $rep->body->assign('failed', $failed);
    return $rep;
  }


/**
* Génère la zone succès lors du login et l'envoie dans la variable 'LOGIN_SUCCESS' et effectue la redirection vers index
*/
   function index2(){
       $rep = $this->index();
       $rep->body->assignZone('LOGIN_SUCCES', 'login_succes');
       return $rep;
   }

/**
* Récupère les données envoyées dans le formulaire de création de compte et fait l'enregistrement en base de données
*/
  function newUser(){
      $newUser = jAuth::createUserObject($this->param('login'),$this->param('password'));
      $newUser->email = $this->param('email');
      $newUser->nom = $this->param('nom');
      $newUser->prenom = $this->param('prenom');
      $newUser->tel = $this->param('tel');
      jAuth::saveNewUser($newUser);
      return $this->index2();
  }

 /**
* Supprime en base de données l'image passée en paramètre
*/
  function supprimerImage(){
        $idImage =  $this->param('idImage');
        $imagefactory = jDao::get("post");
        $imagefactory->delete($idImage);
        return $this->index();
    }

/**
* Ajoute en base de données l'image passée en paramètre
*/
 function ajouterImage(){
      // instanciation de la factory
        $maFactory = jDao::get("projetITI~post");
        // creation d'un record correspondant au dao restaurant
        $record = jDao::createRecord("projetITI~post");
        // on remplit le record
        $record->Nom = "test";
        $record->DateCreation = date('Y-m-d');
        $record->Online = 1;
        $record->Type = "Caroussel";
        $record->Emplacement = "test";
        
        // on le sauvegarde dans la base
        $maFactory->insert($record);
        
        $record->Nom = $record->Idpost;
        $record->Emplacement = "img/Caroussel/".$record->Idpost."."."png";
        $maFactory->update($record);
        $form = jForms::fill("projetITI~newImage");
        $form->saveFile('photo', jApp::wwwPath('img/Caroussel/'),$record->Idpost.'.png');

        return $this->index();
    }
    
/**
* Modifie en base de données l'image passée en paramètre
*/
      function modifierProduit(){
          $rep = $this->getResponse('html');
          $rep->title = "Mangez-Moi";
          $rep->bodyTpl ="ModifierProduit";
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'perso2.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        
        $produitForm = jForms::create("projetITI~afficherProduit", $this->param('idProduit'));
        $imagefactory2=jDao::get("produit");
               $image = $imagefactory2->get($this->param('idProduit'));
         $rep->body->assign('IMG', $image);
        $produitForm->initFromDao("projetITI~produit");
        $rep->body->assign('PRODUIT',$produitForm);
         $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
         $rep->body->assignZone('NAVIGATION', 'navbar');
        return $rep;
    }
    
/**
* Modifie en base de données le produit passé en paramètre
*/
    function majProduit() {

        $produitFactory = jDao::get('produit');
        $record = $produitFactory->get($this->param('IdProduit'));
        $record->Prix = $this->param('Prix');
        $record->NomProduit = $this->param('NomProduit');
        $produitFactory->update($record);
        
        $record->Emplacement = "img/menu/".$record->IdProduit."."."jpg";
        
        $produitFactory->update($record);
        
         $form = jForms::get("projetITI~afficherProduit");
       
        $form->saveFile('photo', jApp::wwwPath('img/menu/'),$record->IdProduit.'.jpg');
        
        return $this->index();
        }

/**
* Ajoute en base de données le produit passé en paramètre
*/
      function addProduit() {
          
        // instanciation de la factory
        $maFactory = jDao::get("projetITI~produit");
        // creation d'un record correspondant au dao restaurant
        $record = jDao::createRecord("projetITI~produit");
        // on remplit le record
        $record->NomProduit = $this->param('NomProduit');
        $record->Prix = $this->param('Prix');
        $record->Emplacement = "test";
        
        // on le sauvegarde dans la base
        $maFactory->insert($record);
        $record->Emplacement = "img/menu/".$record->IdProduit."."."jpg";
        $maFactory->update($record);
        $form2 = jForms::get("projetITI~afficherProduit");
        $form2->saveFile('photo', jApp::wwwPath('img/menu/'),$record->IdProduit.'.jpg');
        
        return $this->index();
        
        
        }
    
    
/**
* Récupère le contenu de la commande et l'envoie en base de données
*/
    function passerCommande(){
        $maFactory = jDao::get("projetITI~commande");
        // creation d'un record correspondant au dao restaurant
        $record = jDao::createRecord("projetITI~commande");
        // on remplit le record
        $user2 = jAuth::getUserSession();
        $record->DateCommande = date('Y-m-d');
        $record->DateRetrait = $this->param('Date')." ".$this->param('Heure');
        $record->IdClient = $user2->login;   
        $record->Contenu = $this->param('Contenu');
        $record->Vu= false;
        $record->Visible= true;

        // on le sauvegarde dans la base
        $maFactory->insert($record);
        return $this->afficher_commande_succes();
    }

/**
* Supprime le membre passé en paramètre de la base de données
*/
    function supprimerMembre(){
        $idMembre =  $this->param('idMembre');
        $imagefactory = jDao::get("jlx_user");
        $imagefactory->delete($idMembre);
        return $this->index();
    }

/**
* Supprime le produit passé en paramètre de la base de données
*/
     function supprimerProduit(){
        $idProduit =  $this->param('idProduit');
        var_dump($idProduit);
        $produitfactory = jDao::get("produit");
        $produitfactory->delete($idProduit);
        return $this->index();
    }

/**
* Envoie les commandes visibles à la vue
*/
    function gererCommande(){
        $rep = $this->getResponse('html');
        $rep->title = "Mangez-Moi";
        $rep->bodyTpl ="admin_commande";
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'perso2.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        
        
        $commandefactory = jDao::get("commande");
           //Création de la condition
               $condition = jDao::createConditions();
               $condition->addCondition('Visible','=',1);
        
        $listecommande = $commandefactory->findBy($condition);
        $rep->body->assign('COMMANDE',$listecommande);
        
       $testconnection = jAuth::isConnected();
      
       $rep->body->assignZone('LOGIN', 'login',array ('isLogged'=>$testconnection,'user'=>$user2));
         $rep->body->assignZone('NAVIGATION', 'admin_navbar');
        return $rep;
    }
    
/**
* Gère les notifications de gestion des commandes pour l'interface administrateur
*/
    function notification(){
        $produitFactory = jDao::get('commande');
        $record = $produitFactory->get($this->param('IdCommande'));
        $record->Vu = true;
        $produitFactory->update($record);
        return $this->gererCommande();
    }

/**
* Gère la visibilité des commandes pour l'interface administrateur
*/
    function cacherCommande(){
        $produitFactory = jDao::get('commande');
        $record = $produitFactory->get($this->param('IdCommande'));
        $record->Visible = false;
        $produitFactory->update($record);
        return $this->gererCommande();
    }
    
    
}