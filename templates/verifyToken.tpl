{include 'templates/header.tpl' }
<div class="index">
    <div class="login">

        <div>
            <h2>RESTABLECER CLAVE DE SEGURIDAD:{$name}</h2>
        </div>
        
        <form action="verifyToken" method="POST">
            <div>
                <label class="oculto2"> ---------------- </label>
            </div>

            <label>INGRESE CLAVE DE SEGURIDAD ENVIADA A SU MAIL</label>
            <div>
                <input type="text" name="codigo" required>
            </div>

            <label>ESCRIBA SU NUEVA CONTRASEÑA</label>
            <div>
                <input type="password" name="pass" required>
            </div>
            <label class="oculto2"> ---------------- </label>
            <div>
                <button class="btn2" value="{$name}" name="user">CONFIRMAR</button>
            </div>
        </form>
    </div>
</div>
{include 'templates/footer.tpl'}