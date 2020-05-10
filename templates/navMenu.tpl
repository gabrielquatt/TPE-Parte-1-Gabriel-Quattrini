<nav>
    <li>
        <a href="{$urlhome}"> Home </a>
    </li>
        {foreach from=$categorys item=category}
                <li>
                    <a href="{$urlnav}{$category->id}">{$category->name}</a>
                </li>
        {/foreach}
</nav>