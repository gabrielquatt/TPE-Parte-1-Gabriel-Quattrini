{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}


<div class="info">
    <div class="detail">
        <div>
            {foreach from=$games item=game}
                <div class="detailgame">
                    <h2> Nombre: {$game->name}</h2>
                    {if isset($game->image)}
                        <img class="portada" src="{$game->image}"/>
                    {/if}
                
                    <h2>Detalles:</h2>
                    <p>{$game->detail}</p>
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

        {if isset($admin)}
            <div class="container">
                {include 'templates/formEditGame.tpl'}
            </div>
        {/if}

        {* <iframe class="video" src="https://www.youtube.com/embed/eARa4PZn_aE"></iframe> *}
        <div class="container">
            <a class="btn" href="home"> Return Home </a>
        </div>
    </div>

    <div class="list">
        {include 'templates/divlinks.tpl'}
    </div>
</div>

{include 'templates/footer.tpl'}