<nav>        
        <li>
            <h5><a href="home"> Home </a></h5>
        </li>
    {if  isset($admin) }
        <li>
            <h5><a href="adminView"> Admin </a></h5>
        </li>
        <li>
        <h5><a href="viewUser"> USERS </a></h5>
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