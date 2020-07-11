{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}


<div class="info">
    <div class="detail">
        {foreach from=$games item=game}
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
                    {include 'vue/porcentaje-game.vue'}
    
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
                                    <a href="deleteCaptura/{$captura->id}/{$game->id}"> Delete Captura</a>
                                </button>
                            {/if}
                        {/foreach}
                        <section>
                </div>
    
                <section class="detailgame" id="data_user" data-game="{$game->id}" data-admin="{$admin}" data-user="{$username}">
                    {if isset($username)}
                        {include 'vue/form-add-comment.vue'}
                    {/if}
                    {include 'vue/porcentaje.vue'}
                    <div class="detailgame">
                        {include 'vue/comment.vue'}
                    </div>
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
        {include 'templates/divlinks.tpl'}
    </div>
</div>
{* <script type="text/javascript" src="js/comments-view.js"></script> *}
<script type="text/javascript" src="js/comments.js"></script>
{include 'templates/footer.tpl'}