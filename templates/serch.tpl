{if isset($username)}
    <a class="btn"  href="logout"> CERRAR SESION </a>
{else}        
    <a class="btn" href="logout"> ACCEDER </a>
{/if}
    <form class="search" action="search" method="POST" >
        <input class="busqueda" type="text" name="nameGame" placeholder="search">
        <input type="submit" value="buscar">                      
    </form>
