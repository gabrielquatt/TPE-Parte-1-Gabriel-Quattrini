{include 'templates/header.tpl' }
<div class="index">
    <div class="login">

        <form action="home" method="POST">
            <button class="btn2">ACCEDER COMO INVITADO</button>
        </form>

        <div>
            <h2>acceder como administrador</h2>
        </div>

        <form action="verify" method="POST">
            <div>
                <label class="oculto2"> ---------------- </label>
            </div>

            <label>UserName</label>
            <div>
                <input type="text" name="username" required>
            </div>

            <label>Password</label>
            <div>
                <input type="Password" name="pass" required>
            </div>
            <label class="oculto2"> ---------------- </label>
            <div>
                <input type="submit" value="login">
            </div>
        </form>
        <br>
        <form action="viewRecover" method="POST">
            <button class="btn2">OLVIDE MI CONTRASEÑA</button>
        </form>
    </div>
</div>
{include 'templates/footer.tpl'}