<nav>        
    <li>
        <a href="game"> Home </a>
    </li>

 {if isset($username)}
         <div>
         <a href="adminView"> Admin </a>
         </div>
{/if}

    <li>
        <a href="details/all"> all games </a>
    </li>
        {foreach from=$categorys item = category}
            <li>
                <a href="details/{$category->id}">{$category->name}</a>
            </li>
        {/foreach}
</nav>