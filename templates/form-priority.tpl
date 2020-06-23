<div class="wraped">
    <form action="editPriority" method="POST">

        <h2>edit permiso de usuario</h2>
        <br>
        <label>Selecione Usuario<label>
                <select name="userId">
                    {foreach from=$users item=user}
                        <option value='{$user->id}'> {$user->username}</option>
                    {/foreach}
                </select>
                <br>
                <br>
                <label>permisos de edicion<label>
                        <select name="priority">
                            <option value='0'> NEGAR PERMISO</option>
                            <option value='1'> PERMITIR EDITAR </option>
                        </select>
                        <br>
                        <br>
                        <button class="btn" type="submit">EDIT PERMISO</button>
    </form>
    <ul>
        <label>ususarios con permiso</label>
        {foreach from=$users item=user}
            {if {$user->priority}==1}
                <li>
                    <h5>{$user->username}</h5>
                </li>
            {/if}
        {/foreach}
    </ul>
    <br>
    <br>
    <label>prueba de array</label>
        {$array}
        {$priority}
</div>