<form action="deleteCategory" method="POST"> 
    <div>
        <label>DELETE EXISTING CATEGORY</label>
        <select name="category">
            {foreach from=$categorys item=category}
                <option value='{$category->id_categoria}'> {$category->nombre}</option>
            {/foreach}
        </select>
    </div>
        <button type="submit">DELETE</button>
</form>