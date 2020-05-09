{include 'templates/header.tpl'}
{include 'templates/formAddGame.tpl'}
<div>
    <div>
        <ul>
            {foreach from=$categorys item=category}
                <li>
                    <a href="details/{$category->id_categoria}">{$category->nombre}</a>
                </li>
            {/foreach}
        </ul>
    </div>
</div>
{include 'templates/formAddCategory.tpl'}

{include 'templates/footer.tpl'}