<div class="wraped">
    <form action="addGame" method="POST"> 
  <br>
    <h2>ADD NEW GAME</h2>
        <div>
            <label>Name</label>
            <input name="title" type="text">
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

        <div>
        <br>
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
            <br>
            <label>Description</label>
            <br>
            <textarea name="description" type="text"></textarea>
        </div>
            <button class="btn" type="submit">Save Game</button>
    </form>
</div>
   