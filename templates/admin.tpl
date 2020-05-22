{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

{if isset($username)}
 <div class="container">
        {include 'templates/formAddCategory.tpl'}
        {include 'templates/formDeleteCategory.tpl'}
  </div>

  <div class="container">
    {include 'templates/formAddGame.tpl'}
    {include 'templates/formEditGame.tpl'}
  </div>
    {include 'templates/gameDetail.tpl'}
{/if}

    <div class="container">
            <a class="btn" href="game"> Return Home </a>
    </div>

{include 'templates/footer.tpl'}