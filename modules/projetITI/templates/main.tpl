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
                    </ul>
                </div>
                    
                    <!-- demande de connection-->
   <form class="form-inline">
        <input type="text" class="input-small" placeholder="Pseudo">
        <input type="password" class="input-small" placeholder="Mot de passe">
  <label class="checkbox"  id="123" style="color:white;">
    <input type="checkbox" > Se Souvenir de moi </input>
   </label>
    <button type="submit" class="btn">Se connecter</button>
    <a href="{jurl 'projetITI~index2@classic'}" class="btn">S'inscrire</a>
    <a href="{jurl 'jauth~login:form'}" class="btn">S'inscrire</a>
</form>
          </div>
                    
    </div>  
      </div>
    
  <!-- Mise en place du carousel -->
  <div class="container">
    <div class="row-fluid">
               <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    
                     {foreach $IMAGES as $COURANTIMAGE}
                         <div class="item">
                             <img src="{$PATH.$COURANTIMAGE->Emplacement}" alt="" width=" 100%">
                            <div class="carousel-caption">
                              <h4>First Thumbnail label</h4>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                          </div>
                      {/foreach}
                      
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
              </div>
    </div>
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
       
                      
<!-- test user -->
<div> {foreach $USER as $COURANTUSER}

<p>{$COURANTUSER->login}</p>
{/foreach}
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
