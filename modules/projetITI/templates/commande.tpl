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
             <a class="brand" href="#">Mangez-moi</a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li><a href="{jurl 'projetITI~index@classic'}">Accueil</a></li>
                      <li class="active"><a href="{jurl 'projetITI~afficher_commande@classic'}">Commande</a></li>
                      <li><a href="{jurl 'projetITI~contacter@classic'}">Contact</a></li>
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
    <div class="row-fluid">
        <!-- Colonne total de la commande -->
        <div class="span2" id="total">
        <h4> Résumé de votre commande </h4>
        <p id="resume">Résumé à afficher ici</p>
       
        <button type="button" class="btn" data-toggle="button">Lancer commande</button>
        </div>
        <!-- Gridster -->
           <div class="span10">
               <section class="demo">   
            <div class="gridster">

                <ul>
                    {foreach $MENU as $COURANTMENU}
                     <li onclick="getElements()" nom-produit="{$COURANTMENU->NomProduit}" prix="{$COURANTMENU->Prix}" data-row="1" data-col="2" data-sizex="1" data-sizey="1">
                     <img src="{$PATH.$COURANTMENU->Emplacement}" alt="">
                     </li>
                        
                    {/foreach}
                </ul>
            </div>
                </section>
        </div>
    </div>
</div>
                      


 </body>
