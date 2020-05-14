<div class="wraped">
    <form action="editGame" method="POST"> 
    <h2>EDIT EXISTING GAME</h2>
        <div>
            <label>Select Game to Edit</label>
            <select name="game">
                {foreach from=$games item=game}
                    <option value="{$game->id}"> {$game->name}</option>
                {/foreach}
            </select>
        </div>

        <div>
            <label>Name</label>
            <input name="title" type="text">
        </div>
    
        <div>
            <label>category game</label>
            <select name="category">
                {foreach from=$categorys item=category}
                    <option value='{$category->id}'> {$category->name}</option>
                {/foreach}
            </select>
        </div>

        <div>
            <label>califacion</label>
            <select name="qualification">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
            </select>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" type="text"></textarea>
        </div>
            <button class="btn" type="submit">Edit Game</button>
    </form>
</div>