{include 'templates/header.tpl'}
    <div>
    <ul>
    {foreach from=$categorys item=category}
       <li>
       <a href="details/{$category->id_categoria}">{$category->nombre}</a>
       </li>
    {/foreach}
    </ul>
    </div>
{include 'templates/footer.tpl'}