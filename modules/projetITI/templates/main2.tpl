<h2>Tutoriel pour la jAuth</h2>
<p>Liste des users dans la DB<br />
user10/user10 ou user10/jelix<br />
user20/user20<br />
user100/user100<br /></p>
<hr />
{$MAIN}
<hr />
<ul>
  <li><a href="{jurl 'jauth~login:form'}">login</a></li>   
  <li><a href="{jurl 'jauth~login:out'}">logout</a></li>  
</ul>
<hr />
<ul>
  <li><a href="{jurl 'projetITI~default:index'}">Page d'accueil</a></li>
  <li><a href="{jurl 'projetITI~default:affiche1'}">Affichage privé</a></li>
  <li><a href="{jurl 'projetITI~default:affiche2'}">Interdit si connecté!</a></li> 
</ul>
<hr />
<ul>  
  <li><a href="{jurl 'projetITI~default:listusers'}">Affiche les users</a></li> 
  <li><a href="{jurl 'projetITI~default:getCurrentUser'}">Le user courant</a></li> 
  <li><a href="{jurl 'projetITI~default:getUser'}">Recherche le user100</a></li> 
  <li><a href="{jurl 'projetITI~default:verifiePwd'}">Vérifie le pwd de "user100"</a></> 
  <li><a href="{jurl 'projetITI~default:changePwd'}">Modifie un pwd</a></>
</ul>
<hr />
<ul>  
  <li><a href="{jurl 'projetITI~default:createUser'}">Crée "tempuser"</a></li>
  <li><a href="{jurl 'projetITI~default:updateUser'}">Update "tempuser" vers "jelix"</a></li>
  <li><a href="{jurl 'projetITI~default:deleteUser'}">Efface le user "jelix"</a></li>
</ul>