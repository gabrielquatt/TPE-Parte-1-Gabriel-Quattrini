<?php

include_once('Controller.php');

class LoginController extends Controller
{

    /**
     * Verificacion de usuario con la base de datos
     */
    public function verify()
    {
        if ((!empty($_POST['username'])) && (!empty($_POST['pass']))) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $this->entrar($user, $pass);
        } else {
            header('Location: ' . URLBASE . "login ");
        }
    }

    /**
     * Function para ver todos los usuarios y editar permisos
     */
    public function viewUser()
    {
        $prioridad = AuthHelper::getPriorityUser();//solo si tiene prioridad de administrador podra acceder
        if (isset($prioridad)) {
            $acces = $this->user();//consulta sobre nombre de usuario loggueado.
            $users = $this->getusermodel()->getUsers($acces['name']); //trae todos los usuarios menos el que este activo
            $categorys = $this->getmodelcategoty()->getAllCategory();
            $this->getadminview()->viewAllUser($categorys, $users, $acces);
        } else {
            $this->accessError();
        }
    }

    /**
     * Funcion para ver la vista de administrador 
     */
    public function adminActive()
    {
        $acces = $this->user();
        if (isset($acces)) {//solo de haber un ususario loggueado y con prioridad de admin se podra continuar
            $categorys = $this->getmodelcategoty()->getAllCategory();//trae todas las categorias de la db
            $games = $this->getgamemodel()->getAllGame();//trae todos los juegos de la db
            if (isset($acces['priority'])) {//consulta de la prioridad del usuario
                $users =  $this->getusermodel()->getUsers($acces['name']);
                $this->getadminview()->viewAdmin($games, $categorys, $users, $acces);//vista de administrador
            } else {
                header("Location: home");//de no tener prioridad se redireccionara al home
            }
        } else {
            $this->accessError();//ventada de seguridad + gif
        }
    }

    /** 
     * Funcion guardarn nuevo usuario en la base de datos
     */
    public function saveUser()
    {
        $userName = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $repetData = $this->getusermodel()->getAllMailAndName( $email,$userName);//verifica de que el email no este utilizado
      
        if (!empty($repetData)) {
            $this->showError('no se pudo crear el usuario porque el mail o nombre ya se encuentra en uso');
        } else {
            $passEncrypt = password_hash($pass, PASSWORD_BCRYPT);//encrypta la contraseña
            $complete = $this->getusermodel()->saveUser($userName, $email, $passEncrypt);//envia los datos + la contraseña encriptada a la base de datos
            if ($complete) {     //si esta completada la tarea se inicia session 
                $this->entrar($userName, $pass);//mando nombre y contraseña sin encryptar
            } else {
                $this->showError('no se pudo cargar ususario');//de no completarse por algun motivo se indica por pantalla
            }
        }
    }

    /**  
     * funcion para entrar al sitio (nota: se accede a esta funcion desde verificar y creando un usuario)
     */
    public function entrar($user, $pass)
    {
        $userDb = $this->getusermodel()->getUserByUsername($user);
        if (!empty($userDb) && password_verify($pass, $userDb->password)) {
            AuthHelper::login($userDb);//guardado y loggueo de usuario
            header('Location: ' . URLBASE . "adminView");
        } else {
            header('Location: ' . URLBASE . "login ");//en caso de estarmal un dato se redirecciona al login del sitio 
        }
    }

    /**
     *  Funcion que redigira a una vista cuando no se tenga acceso como administrador +gif
     */
    public function accessError()
    {
        $admin =  $this->user();
        $categorysid = $this->getmodelcategoty()->getAllCategory();
        $this->geterrorview()->accesserror($categorysid, $admin);
    }

    /**
     * Funcion que destruira cualquier session iniciada 
     */
    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . URLBASE . 'login');
    }

    /**
     * Funcion para cargar login 
     */
    public function getLogin()
    {
        $this->getloginview()->showLogin();
    }

    /**
     * Funcion para cargar Registro
     *
     */
    public function openRegister()
    {
        $this->getloginview()->showRegister();
    }
     /**
     * Funcion para cargar form de recuperacion de contraseña.
     */
    public function viewRecover()
    {
        $this->getloginview()->recoverForm();
    }

    /**
     * Funcion actualizar contraseña.
     */
    public function updatePass($user){
        $this->getloginview()->tokenForm($user);
    }
}
