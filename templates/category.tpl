{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

    <div class="container">
        {include 'templates/formAddCategory.tpl'}
        {include 'templates/formDeleteCategory.tpl'}
    </div>

    <div class="info">
        <div class="list">
            <h2>category list</h2>
            <ul>
                {foreach from=$categorys item=category}
                    <li>
                        <a href="details/{$category->id}">{$category->name}</a>
                    </li>
                {/foreach}
            </ul>
        </div>
            <div class="detail">
                <p> descripcion de sitio mas demas cosas de relleno para la pagina, tambien mostrara la busqueda de serch, mas la opcion a de editar en caso de ser administrador //a desarrollar</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qG-FFTeZfZM"></iframe>
         </div>
    </div>
{include 'templates/footer.tpl'}