{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

{if isset($username)}
  <div class="detailgame">
    <h1>{$username}</h1>
  </div>

  <div class="container">
    {include 'templates/formAddCategory.tpl'}
    {include 'templates/formEditCategory.tpl'}
    {include 'templates/formDeleteCategory.tpl'}
  </div>

  <div class="container">
    {include 'templates/formAddGame.tpl'}
    {include 'templates/formEditGame.tpl'}
  </div>

  <div class="info">
    <div class="detail">
        {include 'templates/gameDetail.tpl'}
      <div class="container">
        <a class="btn" href="home"> Return Home </a>
      </div>
    </div>

    <div class="list">
      {include 'templates/listgames.tpl'}
      {include 'templates/divlinks.tpl'}
    </div>
  </div>
{else}

  <div class="error">
    <br>
      <h1>acceso negado</h1>
    <br>
      <p>vista solo para administradores</p>
    <br>
      <img class="gif" src="img/confundido.gif" alt="confundido">
  </div>
{/if}

{include 'templates/footer.tpl'}