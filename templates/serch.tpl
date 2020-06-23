{if isset($username)}
   
    <label class="user">{$username} <label>
    <a class="user" href="logout">  CERRAR SESION </a>

    {else}        
    <label class="user"><a href="logout"> ACCEDER </a><label>
    <label>|</label>
    <a href="registro"> registrarse </a>
{/if}


    {*
    *
    *//search comentado, no requerido para la 2da entrega
    *
     <form class="search" action="search" method="POST" >
        <input class="busqueda" type="text" name="nameGame" placeholder="search">
        <input type="submit" value="buscar">                      
    </form> 
    *}
