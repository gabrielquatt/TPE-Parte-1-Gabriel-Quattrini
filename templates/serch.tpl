{if isset($username)}
   
    <label class="user">{$username} <label>
    <a class="user" href="logout">  CERRAR SESION </a>

    {else}        
    <label class="user"><a href="logout"> ACCEDER </a><label>
    <label>|</label>
    <a href="registro"> registrarse </a>
{/if}
