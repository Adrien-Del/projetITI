<body>

<!-- Création de la barre de navigation responsive -->

{$NAVIGATION} 


<div class="container">
<div>{$LOGIN_ERREUR}</div>
  <!-- Mise en place du carousel -->
  <div class="hero-unit">
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
            </ul>
          </div>
            <li class="offset4">
                  <p> Ajouter une image </p>
                        {formfull $NEWIMAGE, 'projetITI~ajouterImage@classic'}
                
              </li>
</div>
         
    <!-- Mise en place des images des commandes -->
    <div class="hero-unit">
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
<a class="btn" href="{jurl 'projetITI~supprimerProduit@classic',array('idProduit'=>$COURANTMENU->IdProduit)}"> Supprimer </a>
{/foreach}
<li>{formfull $PRODUIT, 'projetITI~addProduit'} </li>
</ul>
</div>
</div>

<div class="hero-unit">
<h2> Gérer les membres </h2>
<div class="row-fluid">
    
 <table class="table table-striped"> 
<tbody>
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Login</th>
                  <th>E-mail</th>
                  <th>Telephone</th>
                  <th>Gérer</th>
                </tr>
     

{foreach $MEMBRE as $COURANTMEMBRE}
    {if $COURANTMEMBRE->login != admin}
                <tr>
                  <td>{$COURANTMEMBRE->nom}</td>
                  <td>{$COURANTMEMBRE->prenom}</td>
                  <td>{$COURANTMEMBRE->login}</td>
                  <td><a href="mailto:#">{$COURANTMEMBRE->email}</a></td>
                  <td>{$COURANTMEMBRE->tel}</td>
                  <td><a onclick="return confirm('Voulez vous supprimer définitivement le membre : {$COURANTMEMBRE->login}?');" class="btn" href="{jurl 'projetITI~supprimerMembre@classic', array('idMembre'=>$COURANTMEMBRE->login)}">Supprimer</a></td>
                </tr>
      {/if}
{/foreach}
</tbody>
</table>
</div>
</div>

</div> 

 </body>
