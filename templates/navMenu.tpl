<nav>        
        <li>
            <h5><a href="game"> Home </a></h5>
        </li>
    {if isset($username)}
        <li>
            <h5><a href="adminView"> Admin </a></h5>
        </li>
    {/if}
        <li>
            <h5><a href="details/all"> all games </a></h5>
        </li>
    {foreach from=$categorys item = category}
        <li>
            <h5><a href="details/{$category->id}">{$category->name}</a></h5>
        </li>
    {/foreach}
</nav>