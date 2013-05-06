<body>

{$NAVIGATION} 
    
<div class="container-fluid">
  <div class="row-fluid">
      <table class="table"> 
<tbody>
                <tr>
                  <th>Client</th>
                  <th>Date de commande</th>
                  <th>Date de retrait</th>
                  <th>Contenu</th>
                  <th>Notification</th>
                  <th>Supprimer</th>
                </tr>
     

{foreach $COMMANDE as $COURANTCOMMANDE}
 
                {if $COURANTCOMMANDE->Vu == false}<tr  style="background-color: rgb(214, 0, 0);" >{else}<tr>{/if}
                  <td>{$COURANTCOMMANDE->IdClient}</td>
                  <td>{$COURANTCOMMANDE->DateCommande}</td>
                  <td>{$COURANTCOMMANDE->DateRetrait}</td>
                  <td>
                      <div class="accordion" id="{$COURANTCOMMANDE->IdCommande}">
                         <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#{$COURANTCOMMANDE->IdCommande}" href="#{$COURANTCOMMANDE->IdCommande}2">
                            Contenu
                            </a>
                         </div>
                        <div id="{$COURANTCOMMANDE->IdCommande}2" class="accordion-body collapse in">
                         <div class="accordion-inner">
                        {$COURANTCOMMANDE->Contenu}
                         </div>
                        </div>
                        </div>
                      </td>
                      <td><a class="btn" href="{jurl 'projetITI~notification@classic',array('IdCommande'=>$COURANTCOMMANDE->IdCommande)}">Commande prise en compte</a></td>
                      <td><a class="btn" href="{jurl 'projetITI~cacherCommande@classic',array('IdCommande'=>$COURANTCOMMANDE->IdCommande)}">Supprimer</a></td>
                </tr>
    
{/foreach}
</tbody>
</table>

  </div>
  </div>


<script>
    {literal}
    $(".collapse").collapse()
    
    setTimeout(function(){
   window.location.reload(1);
}, 500000);
    {/literal}
</script>
 </body>
