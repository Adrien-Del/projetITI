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
                      <li><a href="#">Contact</a></li>
                    </ul>
                </div>
          </div>
    </div>
</div>
    
    
  <div class="container">
    <div class="row-fluid">
    <div class="span4">1er contenu</div>
    <div class="span8"></div>
</div>
  </div>


 <!--test de génération d'url pour afficher des images -->

     {image $PATH.$IMAGES->Emplacement}

 </body>
