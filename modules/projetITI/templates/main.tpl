<body>


{$NAVIGATION} 
    
<div>{$LOGIN_ERREUR}{$LOGIN_SUCCES}</div>
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
                              <h4>Voici les photos du restaurant</h4>
                              <p>Le restaurant se trouve rue Léon Gambetta, au 365. Pour plus d'information allez dans l'onglet "contact"</p>
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
