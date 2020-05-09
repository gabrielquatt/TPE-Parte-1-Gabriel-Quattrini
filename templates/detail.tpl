{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}
    <div>
    <ul>
    {foreach from=$games item=game}
       <li>
            <h2> Nombre: {$game->nombre}</h2>
            <h4>Detalles: </h4> {$game->detalle}
            <h4>Calificacion: {$game->calificacion}</h4>
            <a href="../delete/{$game->id_juego}/{$game->id_categoria}"> Delete Game </a>
        </li>    
    {/foreach}
    </ul>
    <a href="../game"> Return </a>
    </div>
{include 'templates/footer.tpl'}