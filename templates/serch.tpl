
        {if {$user} == 0}
            <a class="btn" href="login"> ACCEDER </a>
        {else}
            <a class="btn" href="login"> CERRAR SESION </a>
        {/if}
    <form class="search" action="search" method="POST">
        <input type="text" name="nameGame" placeholder="search">
        <input type="submit" value="send">                      
    </form>
