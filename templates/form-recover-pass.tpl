{include 'templates/header.tpl' }
<div class="index">
    <div class="login">

        
        <div>
            <h2>INGRESE LOS DATOS DE SU CUENTA</h2>
        </div>

        <form action="check-user" method="POST">
            <div>
                <label class="oculto2"> ---------------- </label>
            </div>

            <label>USER NAME</label>
            <div>
                <input type="text" name="username" required>
            </div>

            <label>EMAIL ASOCIADO A LA CUENTA</label>
            <div>
                <input type="email" name="email" required>
            </div>
            <label class="oculto2"> ---------------- </label>
            <div>
                <button class="btn2">check</button>
            </div>
        </form>
        
    </div>
</div>
{include 'templates/footer.tpl'}