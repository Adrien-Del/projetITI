{if ! $isLogged}
    <li>
   <form class="form-inline" action="{formurl 'jauth~login:in'}" method="post" id="loginForm">
       <input type="text" name="login" id="login" size="9" value="{$login|eschtml}" class="input-small" placeholder="Pseudo" />
       <input type="password" name="password" id="password" size="9" class="input-small" placeholder="Mot de passe"/>
  <label class="checkbox"  id="123" style="color:white;">
    <input type="checkbox" name="rememberMe" id="rememberMe" value="1" > Se Souvenir de moi </input>
   </label>
       {if !empty($auth_url_return)}
       <input type="hidden" name="auth_url_return" value="{$auth_url_return|eschtml}" />
       {/if}
       <button class="btn" type="submit" value="{@jauth~auth.buttons.login@}">Se connecter</button>
       <a class="btn" href="{jurl 'projetITI~creercompte@classic'}">S'inscrire</a>
       
   </form>
       </li>
{else}
    <li style="color: grey;margin-top:10%;">{$user->login} </li> <li> <a href="{jurl 'jauth~login:out'}" >{@jauth~auth.buttons.logout@}</a></li>
{/if}