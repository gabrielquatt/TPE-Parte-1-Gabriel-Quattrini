<div class="detailgame">
    <h2>list games</h2>
    <ul>
        {foreach from=$games item=game}    
             <li><h5><a href="game-Detail/{$game->id}">{$game->name}</a><h5></li>
        {/foreach}
    </ul>
</div>