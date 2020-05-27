<div class="wraped">
    <form action="deleteCategory" method="POST"> 
            <h2>DELETE EXISTING CATEGORY</h2>
            <p>NOTA: Al eliminar Categoria se eliminaran todos los Juegos relacionados.</p>
            <select name="category">
                {foreach from=$categorys item=category}
                    <option value='{$category->id}'> {$category->name}</option>
                {/foreach}
            </select>
            <button class="btn" type="submit">DELETE</button>
    </form>
</div>