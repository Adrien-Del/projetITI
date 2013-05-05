<body>

<!-- Création de la barre de navigation responsive -->

{$NAVIGATION} 

<div class="container">
<div>{$LOGIN_ERREUR}</div>
  <!-- Mise en place du carousel -->
  <h2> Gérer les photos du caroussel </h2>
  <h4> Cliquez sur les images pour les supprimer </h4>
  <div class="row-fluid">
            <ul class="thumbnails">
                {foreach $IMGCAROUSSEL as $COURANTIMGCAROUSSEL}
              <li class="span3">
                <a onclick="return confirm('Voulez vous supprimer l\'image?');"href="{jurl 'projetITI~supprimerImage@classic', array('idImage'=>$COURANTIMGCAROUSSEL->Idpost)}" class="thumbnail">
                  <img  alt="260x180" style="width: 400px; height: auto;" src="{$PATH.$COURANTIMGCAROUSSEL->Emplacement}" id="{$COURANTIMGCAROUSSEL->Idpost}"></a>
              </li>
              {/foreach}
              <li class="span2">
                
                        {formfull $NEWIMAGE, 'projetITI~ajouterImage@classic'}
                
              </li>
            </ul>
          </div>

         
    <!-- Mise en place des images des commandes -->
<h2> Gérer les produits dans la page "commande" </h2>
<div class="row-fluid">

<ul class="thumbnails">

{foreach $MENU as $COURANTMENU}
<li class="span2">
<a href="{jurl  'projetITI~modifierProduit@classic', array('idProduit'=>$COURANTMENU->IdProduit)}" class="thumbnail">
<img alt="260x180" style="width: 200px; height: auto;" src="{$PATH.$COURANTMENU->Emplacement}" id="{$COURANTMENU->IdProduit}">
<p style="text-align: center;">{$COURANTMENU->NomProduit}</p>
<p style="text-align: center;">{$COURANTMENU->Prix} €</p>
</a>

{/foreach}
<li>{formfull $PRODUIT, 'projetITI~addProduit'} </li>
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
