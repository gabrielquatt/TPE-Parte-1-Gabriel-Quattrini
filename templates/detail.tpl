{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

{if (isset($admin)) }
    <div class="container">
        {include 'templates/formAddGame.tpl'}
        {include 'templates/formEditGame.tpl'}
    </div>
{/if}

<div class="info">
    <div class="detail">
        {include 'templates/gameDetail.tpl'}
        <iframe class="video" src="https://www.youtube.com/embed/eARa4PZn_aE"></iframe>
        <div class="container">
            <a class="btn" href="home"> Return Home </a>
        </div>
    </div>

    <div class="list">
        {include 'templates/listgames.tpl'}
        {include 'templates/divlinks.tpl'}
    </div>
</div>

{include 'templates/footer.tpl'}