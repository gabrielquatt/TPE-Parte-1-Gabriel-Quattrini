<article class="articleGrid">
 {foreach from=$games item=game}
    <div class="detailgam" >
        <h2><a href="game-Detail/{$game->id}">{$game->name} </a></h2>
        {if isset($game->image)}
          <a href="game-Detail/{$game->id}"><img class="portadaGrid" src="{$game->image}"/></a>
        {/if}
        {foreach from=$categorys item=category}
          {if $category->id == $game->id_category}
            <h4>Category: {$category->name}</h4>
          {/if}     
        {/foreach}
  
          {if isset($admin)}
            <button class="btn">
              <a href=" deleteGame/{$game->id}"> Delete Game </a>
            </button>
            <button class="btn">
            <a href=" deletePortada/{$game->id}"> Delete portada</a>
        </button>
          {/if}   
    </div>
  {/foreach}
</article>
