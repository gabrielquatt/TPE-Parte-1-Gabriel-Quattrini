{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}


<div class="info">
{foreach from=$games item=game}
    <div class="detail">
        {if isset($admin)}
            <button class="btn">
                <a href=" deleteGame/{$game->id}"> Delete Game </a>
            </button>
            <button class="btn">
                <a href=" deletePortada/{$game->id}"> Delete portada</a>
            </button>
        {/if}
        <div>
                <div class="detailgame">
                    <h2> Nombre: {$game->name}</h2>
                    {if isset($game->image)}
                        <img class="portada" src="{$game->image}" />
                    {/if}
    
                    {if isset($admin)}
                        {include 'templates/form-add-images.tpl'}
                    {/if}
                    <h2>Detalles:</h2>
                    <p class="fond-text">{$game->detail}</p>
                    {foreach from=$categorys item=category}
                        {if $category->id == $game->id_category}
                            <h4>Category: {$category->name}</h4>
                        {/if}
                    {/foreach}
                    <section class="detailCapturas">
                    {foreach from=$capturas item=captura}
                        <img class="captura" src="{$captura->captura}" />
                        {if isset($admin)}
                            <button class="btn">
                            <a href="deleteCaptura/{$img->id}/{$game->id}"> Delete Captura</a>
                            </button>
                        {/if}
                    {/foreach}
                    <section>
                </div>
    
                <section class="detailgame">
                    {include 'vue/porcentaje.vue'}
    
                    <div class="oculto">
                        <input value="{$game->id}" id="gameid" readonly>
                        <input value="{$admin}" id="permiso" readonly>
                        <input value="{$username}" id="user" readonly>
                    </div>
                    {if isset($username)}
                        {include 'vue/form-add-comment.vue'}
                    {/if}
                    <div class="detailgame">
                        {include 'vue/comment.vue'}
                    </div>
                    <script type="text/javascript" src="js/comentarios.js"></script>
                </section>
    
    
            {/foreach}

        </div>

        {if isset($admin)}
            <div class="container">
                {include 'templates/formEditGame.tpl'}
                {include 'templates/form-Edit-Img.tpl'}
            </div>
        {/if}

        <div class="container">
            <a class="btn" href="home"> Return Home </a>
        </div>

    </div>

    <div class="list">
        {include 'templates/listgames.tpl'}
        {* {include 'templates/divlinks.tpl'} *}
    </div>
</div>

{include 'templates/footer.tpl'}