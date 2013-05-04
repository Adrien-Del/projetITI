<body>

<!-- Création de la barre de navigation responsive -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
             </a>
             <a class="brand" href="{jurl 'projetITI~index@classic'}">Mangez-moi</a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="{jurl 'projetITI~index@classic'}">Accueil</a></li>
                      <li><a href="{jurl 'projetITI~afficher_commande@classic'}">Commande</a></li>
                      <li><a href="{jurl 'projetITI~contacter@classic'}">Contact</a></li>

                    <!-- demande de connection-->
                    <li  style="max-height: 40px;">
<div id="auth_login_zone">
{$LOGIN}

          </div>
</li>
                </ul>
                </div>
          </div>          
    </div>  
      </div>
<div>{$LOGIN_ERREUR}</div>
  <!-- Mise en place du carousel -->
  <h2> Gérer les photos du caroussel </h2>
  <h4> Cliquez sur les images pour les supprimer </h4>
  <div class="row-fluid">
            <ul class="thumbnails">
                {foreach $IMGCAROUSSEL as $COURANTIMGCAROUSSEL}
              <li class="span3">
                <a onclick="return confirm('Voulez vous supprimer l\'image?');"href="{jurl 'projetITI~supprimerImage@classic', array('idImage'=>$COURANTIMGCAROUSSEL->Idpost)}" class="thumbnail">
                  <img  alt="260x180" style="width: 400px; height: 200px;" src="{$PATH.$COURANTIMGCAROUSSEL->Emplacement}" id="{$COURANTIMGCAROUSSEL->Idpost}"></a>
              </li>
              {/foreach}
              <li class="span2">
                
                        {formfull $NEWIMAGE, 'projetITI~ajouterImage@classic'}
                
              </li>
            </ul>
          </div>
   
      <!-- Mise en place de la présentation en bas -->
  <div class="row-fluid">
      <div class="span10 offset1 hero-unit">
         
    <ul class="thumbnails">
    {foreach $IMG as $COURANTIMG}
       <li class="span4">
           <div class="thumbnail">
                <div class="item">
                    <img src="{$PATH.$COURANTIMG->Emplacement}" alt="">
                       <div class="caption">
                        <h3>{$COURANTIMG->Nom}</h3>
                        <p>{$COURANTIMG->Contenu}</p>
                        <p><a href="{jurl 'projetITI~afficher_commande@classic'}" class="btn btn-primary">Commander</a></p>
                       </div>

                 </div>
             </div>
           </li>
       {/foreach}
       </ul>
   </div>
   </div>
       
                    
                      
               


                      
 <script type="text/javascript">
   {literal}
     $('.carousel').carousel('next');
         
     $('.carousel').carousel({

        interval: 4000
  
      })
   {/literal}
  </script>
 <!--test de génération d'url pour afficher des images -->
 

 </body>
