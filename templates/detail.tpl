{include 'templates/header.tpl'}
    <div>
    <ul>
    {foreach from=$games item=game}
       <li>
            <h2> Nombre: {$game->nombre}</h2>
            <h4>Detalles: </h4> {$game->detalle}
            <h4>Calificacion: {$game->calificacion}</h4>
        </li>    
    {/foreach}
    </ul>
    </div>
{include 'templates/footer.tpl'}