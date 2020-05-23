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
            </br>
              {include 'templates/links.tpl'}
             </br>
             </br>
        </div>
            <div class="detail">
            <h1>Trabajo Practico Web 2 </h1>
            <br>
            <p>esta pagina fue creada para completar lo requerido en el trabajo especial de web 2 (parte 1)</p>
             {if isset($username)}
             <br>
                       <h2>{$username}</h2>
            <p>tendra acceso a una nueva pestaña en el nav (admin) y a los formularios:<p><br>
            <h4>new category</h4> <p>(podra agregar nueva categoria que se mostrara en el nav como en la list de home)</p><br>
            <h4>delete existing category</h4><p>(podra eliminar una categoria existente y todos los juegos relacionados)</p><br>
            <h4>add new game</h4> <p>(para agregar un nuevo juego)</p><br>
            <h4>edit existing game</h4> <p>(podra cambiar todos los datos de un juego existente)</p><br>
            <h4>delete</h4> <p>se habilitara delete game en la descripcion de cada juego.</p><br>
            </p>
            {else}
            <br>
            <h2>videogames</h2>
            <br>
            <p>es una pagina ficticia diseñada para tener una parte de usuario invitado (actual) donde podra ver
             los distintos juegos selecionando ver todos (all games) o segun su categoria, a las funciones de
             administracion no tendra acceso alguno si no sabe contraseña y usuario de algun admin.<p/>
            <br>
            {/if}  
            <iframe class="video" src="https://www.youtube.com/embed/qG-FFTeZfZM"></iframe>
         </div>
    </div>
{include 'templates/footer.tpl'}