<div>
 {foreach from=$games item=game}
    <div class="detailgame" >
        <h2> Nombre: <a href="game-Detail/{$game->id}">{$game->name}</a></h2>
        {if isset($game->image)}
          <img class="portada" src="{$game->image}"/>
        {/if}
        {foreach from=$categorys item=category}
          {if $category->id == $game->id_category}
            <h4>Category: {$category->name}</h4>
          {/if}     
        {/foreach}
  
          {if isset($username)}
            <button class="btn">
              <a href=" deleteGame/{$game->id}"> Delete Game </a>
            </button>
          {/if}   
    </div>
  {/foreach}
</div>
