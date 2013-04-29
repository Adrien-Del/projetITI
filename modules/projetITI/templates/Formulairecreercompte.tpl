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
                    
 <p class="lead">Bienvenue sur la page de création de compte.</p>
 
 <p>
     <small>Afin de pouvoir passer commande sur ce site vous etes <strong>obligé d'avoir au préalable créé un compte</strong></small>
     <div class="alert alert-success">
  Toutes ces informations ne seront pas utilisée à des fins commerciales
</div>
</p>
                    
                    <!-- Formulaire pour se créer un compte -->
                    
 {formfull $NEWUSER, 'projetITI~newUser@classic'}
                   
     <p><strong> En cas de problème n'hésitez pas à nous contacter</strong> </p>
                 <div class="row-fluid">
		<!-- Partie centrale -->
			<div class="span3">
        365 Rue Léon Gambetta,<br>
        59000 Lille, France<br>
        +33 9 51 56 68 02 ‎
      </div>