<div class="wraped">
    <form action="addGame" method="POST" enctype="multipart/form-data">
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
        <label>añadir portada</label>
            <input type="file" name="input_name" id="imageToUpload">
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