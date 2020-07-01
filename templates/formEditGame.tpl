<div class="wraped">
    <form action="editGame" method="POST">
        <h2>EDIT EXISTING GAME</h2>
        <br>
        <div>
            <label>Select Game to Edit</label>
            <select name="game"  id="select">
              <option class="view" id="option"></option>
                 {foreach from=$games item=game}
                     <option value="{$game->id}"> {$game->name}</option>
                 {/foreach}
            </select>
        </div>
        
        <div>
            <br>
            <label>Name</label>
            <input name="title" type="text" id="title">
        </div>

        <div>
            <br>
            <label>category game</label>
            <select name="category">
                
                {foreach from=$categorys item=category}
                    <option value='{$category->id}'> {$category->name}</option>
                {/foreach}
            </select>
        </div>
       
        <br>
        <div>
            <br>
            <label>Description</label>
            <br>
            <textarea name="description" type="text" id="descripcion"></textarea>
        </div>
        <button class="btn" type="submit">Edit Game</button>
    </form>
</div>
