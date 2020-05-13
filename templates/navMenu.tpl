<nav>        
    <li>
        <a href="game"> Home </a>
    </li>
        {foreach from=$categorys item=category}
                <li>
                    <a href="details/{$category->id}">{$category->name}</a>
                </li>
        {/foreach}
</nav>