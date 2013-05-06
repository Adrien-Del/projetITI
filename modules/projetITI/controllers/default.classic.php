<?php
/**
* @package   ProjetITI
* @subpackage ProjetITI
* @author    Adrien DELANNOY
* @copyright 2013 Adrien DELANNOY
* @license    All rights reserved
*/

class defaultCtrl extends jController {
    
        /*
      * Définition des accès gérés par jAuth
      */
      public $pluginParams = array(
            '*'        => array('auth.required' => false),
            'passerCommande' => array('auth.required' => true),
      );
  
    //Fonction principale, index
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
        
         $rep->body->assignZone('NAVIGATION', 'navbar');
        
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
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        

        $rep->body->assignZone('NAVIGATION', 'navbar');
       
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
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'common.v.1.js');
        
        $rep->body->assignZone('NAVIGATION', 'navbar');
        $userForm = jForms::create("projetITI~newUser");
        $rep->body->assign('NEWUSER',$userForm);
        
        return $rep;
}

  
  function AuthErrorLogin ()
{
$rep = $this->getResponse('html');
$failed = 2;
$rep->body->assignZone('LOGIN_ERREUR', 'loginerreur',array ('failed'=>2));
$rep->body->assign('failed', $failed);
return $rep;
}


  function newUser(){
      $newUser = jAuth::createUserObject($this->param('login'),$this->param('password'));
      $newUser->email = $this->param('email');
      $newUser->nom = $this->param('nom');
      $newUser->prenom = $this->param('prenom');
      $newUser->tel = $this->param('tel');
      jAuth::saveNewUser($newUser);
      return $this->index();
  }

  function envoyerMail (){
      
    $mail = new jMailer();
    $mail->Subject = 'Sujet de l\'email';
    $mail->Body = 'Contenu du message texte';
    $mail->AddAddress('adriendelannoy62@gmail.com' , 'Nom du destinataire');
    $mail->Send();
      return $this->index();
  }

  
  function supprimerImage(){
        $idImage =  $this->param('idImage');
        $imagefactory = jDao::get("post");
        $imagefactory->delete($idImage);
        return $this->index();
    }
    
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
    
    
    
    function passerCommande(){
        $maFactory = jDao::get("projetITI~commande");
        // creation d'un record correspondant au dao restaurant
        $record = jDao::createRecord("projetITI~commande");
        // on remplit le record
        $user2 = jAuth::getUserSession();
        $record->DateCommande = date('Y-m-d');
        $record->DateRetrait = $this->param('Date')." ".$this->param('Heure');
        $record->IdClient = $user2->login;
        
//        $string = explode("q",$this->Contenu);
//        $string2 = explode("menu",$string[0]);
//        $string[0] = "";
//        $string3 = array_merge($string, $string2);
//        var_dump($string3);
//        $nom = $courantcommande->IdCommande;
//        var_dump($nom);
//        $rep->body->assign($nom,$string3);
        
        
        $record->Contenu = $this->param('Contenu');
        $record->Vu= false;
        $record->Visible= true;

        // on le sauvegarde dans la base
        $maFactory->insert($record);
        
        return $this->index();
    }
    
    function supprimerMembre(){
        $idMembre =  $this->param('idMembre');
        $imagefactory = jDao::get("jlx_user");
        $imagefactory->delete($idMembre);
        return $this->index();
    }
    
     function supprimerProduit(){
        $idProduit =  $this->param('idProduit');
        var_dump($idProduit);
        $produitfactory = jDao::get("produit");
        $produitfactory->delete($idProduit);
        return $this->index();
    }
    
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
    
    
    function notification(){
        $produitFactory = jDao::get('commande');
        $record = $produitFactory->get($this->param('IdCommande'));
        $record->Vu = true;
        $produitFactory->update($record);
        return $this->gererCommande();
    }
    
    function cacherCommande(){
        $produitFactory = jDao::get('commande');
        $record = $produitFactory->get($this->param('IdCommande'));
        $record->Visible = false;
        $produitFactory->update($record);
        return $this->gererCommande();
    }
    
    
}