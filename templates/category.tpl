{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}
{include 'templates/formAddGame.tpl'}
    <div class="wraped">
        <ul>
            {foreach from=$categorys item=category}
                <li>
                    <a href="details/{$category->id}">{$category->name}</a>
                </li>
            {/foreach}
        </ul>
    </div>
    <div class="container">
        {include 'templates/formAddCategory.tpl'}
        {include 'templates/formDeleteCategory.tpl'}
    </div>
{include 'templates/footer.tpl'}