{include 'templates/header.tpl' }
    <div class="index"> 
        <div class="login">    
            <form action="saveUser" method="POST">  
                 <h2>ingrese nombre de usuario <h2>
               
                 <label>UserName</label>
               
                <div>                
                    <input type="text" name="username" id="username" required>
                </div>

                <label>Password</label>
                <div>
                    <input type="text" name="pass"  required>
                </div>

                <label>Email</label>
                <div>
                    <input type="email" name="email"  required>
                </div>

                  {* <select name="pregunta">
                   //para recuperar contraseña
                            <option value="1">nombre de mascota</option>
                            <option value="2">equipo de futbol</option>
                            <option value="3">ciudad de nacimiento</option>
                            <option value="4">comida preferida</option>
                    </select> 
                    
                    <label>respuesta</label>
                        <div>
                            <input type="text" name="respuesta"  required>
                        </div> *}
                   
                <label> </label>
                <div>
                    <input type="submit">                      
                </div>
            </form>
        </div>
    </div>
{include 'templates/footer.tpl'}