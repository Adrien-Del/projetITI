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
                      <li><a href="{jurl 'projetITI~index@classic'}">Accueil</a></li>
                      <li class="active"><a href="{jurl 'projetITI~afficher_commande@classic'}">Commande</a></li>
                      <li><a href="{jurl 'projetITI~contacter@classic'}">Contact</a></li>
                      <li><div id="auth_login_zone">
                              {$LOGIN}
                          </div></li>
                    </ul>
                </div>
          </div>
    </div>
</div>  
    
    <div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    </div>
    <div class="span10">
      <!--Body content-->
    </div>
  </div>
        
</div>
  <div class="container-fluid">
    
        <!-- Colonne total de la commande -->
        <div class="row-fluid">
        <div class="span2 center" id="total">
        <h4> Résumé de votre commande</h4>
        <p id="resume"></p>
       
        
        
        
        <!-- Bouton asser la commande -->
    <a href="#myModal" role="button" class="btn" data-toggle="modal" onclick="passerCommande()">Passer la commande</a>
 
    <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Résumé de la commande</h3>
          </div>
          <div class="modal-body">
              <div  id="modalhtml"></div>
              <h3> Date et horaire de passage : </h3>
              <input type="date"></input>
              <input type="time"></input>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
            <button class="btn btn-primary">Passer la commande</button>
          </div>
        </div>
        
        
        </div>
        <!-- Gridster -->
        <div class="span10" id="colonne_commande">
            <div class="span6" style="padding-left: 30px;"><h4>Commande</h4></div>
            <div class="span6"><h4>Elements du menu</h4></div>

               <section class="demo">
            <div class="gridster">
               
                <ul>
                    {foreach $MENU as $COURANTMENU}
                     <li onclick="getElements()" nom-produit="{$COURANTMENU->NomProduit}" prix="{$COURANTMENU->Prix}" data-row="1" data-col="2" data-sizex="1" data-sizey="1" baseid="{$IDMENU.$COURANTMENU->IdProduit}">
                     <p class="image_menu">{$COURANTMENU->NomProduit}</p>
                         <img src="{$PATH.$COURANTMENU->Emplacement}" alt="">
                     <p class="image_menu">Quantité : <input type="number" name="quantity" min="1" max="10" placeholder="1"  class="input_number"  id="{$IDMENU.$COURANTMENU->IdProduit}"></p>
                     
                     </li>
                    {/foreach}
                </ul>
                
            </div>
                </section>
        </div>
    </div>
</div>
                      


 </body>
