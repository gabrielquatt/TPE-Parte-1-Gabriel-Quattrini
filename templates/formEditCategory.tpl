<div class="wraped">
    <form action="editCategory" method="POST"> 
            <h2>edit Category</h2>
            <br>
            <select name="category">
                {foreach from=$categorys item=category}
                    <option value='{$category->id}'> {$category->name}</option>
                {/foreach}
            </select>
            <br>
            <label>new name<label>
              <input name="tittle" type="text">
            <button class="btn" type="submit">EDIT</button>
    </form>
</div>