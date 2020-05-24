{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

<div class="info">
        <div class="detail">
      <iframe class="video" src="https://www.youtube.com/embed/eARa4PZn_aE"></iframe>
          {include 'templates/gameDetail.tpl'}
        </div>
    <div class="list">
      {if isset($username)}
      {include 'templates/formEditGame.tpl'}
      {/if}
       {include 'templates/divlinks.tpl'}
    </div>
</div>
    <div class="container"> 
            <a class="btn" href="game"> Return Home </a>
    </div>
{include 'templates/footer.tpl'}


