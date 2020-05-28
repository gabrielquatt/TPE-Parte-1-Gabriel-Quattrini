{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

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

{include 'templates/footer.tpl'}