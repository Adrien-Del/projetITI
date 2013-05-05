<body>

<!-- Création de la barre de navigation responsive -->

{$NAVIGATION} 
                    
                    
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