<div class="wraped">
    <form action="editImg" method="POST" enctype="multipart/form-data">
        {* seleciono juego al que deseo eliminar o cargar imegen de portada *}
       <h2>cambiar portada</h2>
       <br>
        <label>Select portada</label>
        <select name="game" id="selectPortada">
            <option class="oculto2" id="optionImg" value=""></option>
            {foreach from=$games item=game}
                <option value="{$game->id}"> {$game->name}</option>
            {/foreach}
        </select>
        <br>
        <br>
        <div id="divImg">
      
        </div>
        <br>
        <div>
            <br>
            <h2>add new portada</h2>
            <br>
            <input type="file" name="input_img" id="imageToUpload">
        </div>
        
        <button class="btn" type="submit">edit portada</button>
    </form>
</div>
  <script type="text/javascript" src="js/game.js"></script>  