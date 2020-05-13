
        {if {$user} == 0}
            <a class="btn" href="login"> ACEDER </a>
        {else}
            <a class="btn" href="login"> CERRAR SESION </a>
        {/if}
    <form class="search" action="search" method="POST">
        <input type="text" name="search" placeholder="search">
        <input type="submit" value="send">                      
    </form>
