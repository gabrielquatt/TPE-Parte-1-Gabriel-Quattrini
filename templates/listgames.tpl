<div class="detailgame">
    <h2>list games</h2>
    <ul>
        {foreach from=$games item=game}    
             <li><h5>{$game->name}<h5></li>
        {/foreach}
    </ul>
</div>