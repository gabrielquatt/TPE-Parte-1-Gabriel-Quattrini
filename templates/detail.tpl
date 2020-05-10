{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}
{include 'templates/formEditGame.tpl'}
    <div>
            {foreach from=$games item=game}
              <div class="detail">
                <h2> Nombre: {$game->name}</h2>
                <h4>Detalles: </h4> <p>{$game->detail}</p>
                <h4>Calificacion: {$game->qualification}</h4>
                <a href="../delete/{$game->id}"> Delete Game </a>
             </div>    
            {/foreach} 
    </div>
    <div class="container"> 
            <a class="btn" href="{$urlhome}"> Return Home </a>
    </div>
{include 'templates/footer.tpl'}