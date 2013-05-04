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
                      <li><a href="{jurl 'projetITI~afficher_commande@classic'}">Commande</a></li>
                      <li><a href="{jurl 'projetITI~contacter@classic'}">Contact</a></li>
                    </ul>
                </div>
          </div>
    </div>
</div>
                    
                    
<div class="row-fluid">
 <ul class="thumbnails">
    
       <li class="span2 offset5">
           <div class="thumbnail">
                <div class="item">
                   <img style="width: 200px; height: 200px;" src="{$PATH.$IMG->Emplacement}" alt="">
                   
                </div>
           </div>
                   <div style="padding-top: 20px;">
                   {formfull $PRODUIT, 'projetITI~majProduit'} 
                   </div>
       </li>
    </ul>

     

      </div>
</div>
                    
</body>