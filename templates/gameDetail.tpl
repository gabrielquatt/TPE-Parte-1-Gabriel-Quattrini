<div>
      {foreach from=$games item=game}
    <div class="detail">
          <h2> Nombre: {$game->name}</h2>
          <h2>Detalles:</h2>
          <p>{$game->detail}</p>
          <br>
          <h4> Calificacion: {$game->qualification}</h4>
          <br>
        {foreach from=$categorys item=category}
            {if $category->id == $game->id_category}
              <h4>Category: {$category->name}</h4>
            {/if}     
        {/foreach}
            {if isset($username)}
            <a href=" delete/{$game->id}/{$game->id_category}"> Delete Game </a>
            {/if}    
    </div>
      {/foreach}
         
</div>
