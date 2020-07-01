{include 'templates/header.tpl'}
{include 'templates/navMenu.tpl'}

    <div class="info">

        <div class="list">
        <h2>category list</h2>
        <ul>
        {foreach from=$categorys item=category}
            <li>
            <a href="details/{$category->id}">{$category->name}</a>
            </li>
        {/foreach}
        </ul>
        <br>
        <br>
        {* {include 'templates/links.tpl'} *}
            <br> 
        </div>

            <div class="detailgame">
                    <h1>Trabajo Practico Web 2 </h1>
                    <br>
                    <p >esta pagina fue creada para completar lo requerido en el trabajo especial de web 2 (parte 1)</p>
                {if isset($admin)}
                    <br>
                    <h2>{$username}</h2>
                    <p>tendra acceso a una nueva pestaña en el nav (admin) y a los formularios:<p><br>
                    <h4 class="fond-text">new category</h4> <p>(podra agregar nueva categoria que se mostrara en el nav como en la list de home)</p><br>
                    <h4 class="fond-text">delete existing category</h4><p>(podra eliminar una categoria existente y todos los juegos relacionados)</p><br>
                    <h4 class="fond-text">add new game</h4> <p>(para agregar un nuevo juego)</p><br>
                    <h4 class="fond-text">edit existing game</h4> <p>(podra cambiar todos los datos de un juego existente)</p><br>
                    <h4 class="fond-text">edit category</h4><p> esta opcion permitira seleccionar una categoria y cambiar su nombre</p><br>
                    <h4 class="fond-text">edit portada</h4><p> esta opcion permitira cambiar portada de un juego</p><br>
                    <p class="fond-text">tendra acceso a una nueva pestaña en el nav (user) para cambiar permisos de administrador<p><br>     
                    <h4 class="fond-text">delete game</h4> <p>se habilitara delete game en la descripcion de cada juego.</p><br>
                    <h4 class="fond-text">delete portada</h4> <p>se habilitara delete portada en la descripcion de cada juego.</p><br>
                    <h4 class="fond-text">eliminar comentario</h4> <p>se habilitara eliminar comentario</p><br>
                {else if isset($username)}
                    <br>
                    <h2>videogames</h2>
                    <br>
                    <p class="fond-text" >es una pagina ficticia diseñada para tener una parte de usuario loegeado (actual) donde podra ver
                    los distintos juegos selecionando ver todos (all games) o segun su categoria, a las funciones de
                    administracion no tendra acceso alguno si no sabe contraseña y usuario de algun admin. 
                    NOTA: podra comentar y puntuar un juego</p>
                    <br>
                    <iframe class="video" src="https://www.youtube.com/embed/qG-FFTeZfZM"></iframe>
                    {else}
                    <p class="fond-text" >create una cuenta es gratis</p><br>
                    <br>
                    <iframe class="video" src="https://www.youtube.com/embed/qG-FFTeZfZM"></iframe>
                 {/if}  
            </div>
    </div>
{include 'templates/footer.tpl'}