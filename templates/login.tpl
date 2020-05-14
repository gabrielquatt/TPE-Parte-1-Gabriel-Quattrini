{include 'templates/header.tpl' }
    <div class="index"> 
        <div class="login">                    
            <form action="game" method="POST">
                <input type="submit" value="acceder como invitado">  
            </form>                   

            <div>
                <h2>acceder como administrador</h2>
            </div>
        
            <form action="verify" method="POST">  
                <div>   
                    <label> ---------------- </label>
                </div>

                <label>UserName</label>
                <div>                
                    <input type="email" name="email">
                </div>

                <label>Password</label>
                <div>
                    <input type="Password" name="pass">
                </div>
                <label> ---------------- </label>
                <div>
                    <input type="submit" value="login">                      
                </div>
            </form>
        </div>
    </div>
{include 'templates/footer.tpl'}