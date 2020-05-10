<nav>
<a href="../game"> Home </a>
{foreach from=$categorys item=category}
                <li>
                    <a href="../details/{$category->nombre}">{$category->nombre}</a>
                </li>
            {/foreach}
</nav>