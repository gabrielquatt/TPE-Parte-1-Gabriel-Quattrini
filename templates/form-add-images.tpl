<form action="addCapturas" method="POST" enctype="multipart/form-data">
    
{* seleciono juego al que deseo cargar imegenes *}
<input class="oculto" value="{$game->id}" name="gameId">
<h2>add catch</h2>

    <input type="file" id="imagenes" name="imagenes[]" multiple>

<button class="btn" type="submit">add</button>
</form>
