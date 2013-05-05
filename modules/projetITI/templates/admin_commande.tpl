<body>

{$NAVIGATION} 
    
<div class="container-fluid">
  <div class="row-fluid">
      <table class="table table-striped"> 
<tbody>
                <tr>
                  <th>Client</th>
                  <th>Date de commande</th>
                  <th>Date de retrait</th>
                  <th>Prix total</th>
                  <th>Contenu</th>
                </tr>
     

{foreach $COMMANDE as $COURANTCOMMANDE}
    
                <tr>
                  <td>{$COURANTCOMMANDE->IdClient}</td>
                  <td>{$COURANTCOMMANDE->DateCommande}</td>
                  <td>{$COURANTCOMMANDE->DateRetrait}</td>
                  <td>{$COURANTCOMMANDE->PrixTotal}</td>
                  <td>{$COURANTCOMMANDE->Contenu}</td>
                </tr>
      
{/foreach}
</tbody>
</table>

  </div>
  </div>


 </body>
