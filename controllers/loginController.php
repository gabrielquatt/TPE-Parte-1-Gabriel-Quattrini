<?php

include_once('Controller.php');

class LoginController extends Controller
{

    /**
     * Verificacion de usuario con la base de datos
     * 
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
     * Function para ver tofos los ususarios y editar permisos
     * 
     */
    public function viewUser()
    {
        $prioridad = AuthHelper::getPriorityUser();
        if (isset($prioridad)) {
            $acces = $this->user();
            $users = $this->getusermodel()->getUsers($acces['name']); //trae todos los usuarios menos el que este activo
            $categorys = $this->getmodelcategoty()->getAllCategory();
            $this->getadminview()->viewAllUser($categorys, $users, $acces);
        } else {
            $this->accessError();
        }
    }

    /**
     * Funcion para ver la vista de administrador
     * 
     */
    public function adminActive()
    {
        $acces = $this->user();
        if (isset($acces)) {
            $categorys = $this->getmodelcategoty()->getAllCategory();
            $games = $this->getgamemodel()->getAllGame();
            if (isset($acces['priority'])) {
                $users =  $this->getusermodel()->getUsers($acces['name']);
                $this->getadminview()->viewAdmin($games, $categorys, $users, $acces);
            } else {
                header("Location: home");
            }
        } else {
            $this->accessError();
        }
    }

    /** 
     * Funcion guardarn nuevo usuario en la base de datos
     *
     */
    public function saveUser()
    {
        $userName = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $repetname = $this->getusermodel()->getUserByUsername($userName);
        $repetemail = $this->getusermodel()->getAllEmail($email);
        if (!empty($repetname)) {
            echo '<script type="text/javascript" >alert("NOMBRE YA UTILIZADO");window.location.href="registro";</script>';
        } else if (!empty($repetemail)) {
            echo '<script type="text/javascript">alert("EMAIL YA REGISTRADO");window.location.href="registro";</script>';
        } else {
            $passEncrypt = password_hash($pass, PASSWORD_BCRYPT);
            $complete = $this->getusermodel()->saveUser($userName, $email, $passEncrypt);
            if ($complete) {
                $this->entrar($userName, $pass);
            } else {
                $this->showError('no se pudo cargar ususario');
            }
        }
    }

    /**  
     * funcion para entrar al sitio (nota: se acede a esta funcion desde verificar y creando un usuario)
     * 
     */
    public function entrar($user, $pass)
    {
        $userDb = $this->getusermodel()->getUserByUsername($user);
        if (!empty($userDb) && password_verify($pass, $userDb->password)) {
            AuthHelper::login($userDb);
            header('Location: ' . URLBASE . "adminView");
        } else {
            header('Location: ' . URLBASE . "login ");
            var_dump($userDb );
        }
    }

    /**
     *  Funcion que redigira a una vista cuando no se tenga acceso como administrador 
     * 
     */
    public function accessError()
    {
        $admin =  $this->user();
        $categorysid = $this->getmodelcategoty()->getAllCategory();
        $this->geterrorview()->accesserror($categorysid, $admin);
    }

    /** 
     * Funcion para editar parametro de prioridad en la base de datos 
     *
     */
    public function editPriority()
    {
        $userId = $_POST['userId'];
        $priority = $_POST['priority'];
        $this->getusermodel()->editPriorityDB($priority, $userId);
        header("Location: viewUser");
    }

    /**
     * Funcion para eliminar un usuario.
     * 
     */
    public function deleteUser($idUser)
    {
        $this->getusermodel()->userDelete($idUser);
        header("Location: ../viewUser");
    }
    
    /**
     * Funcion que destruira cualquier session iniciada
     * 
     */
    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . URLBASE . 'login');
    }
    
    /**
     * Funcion para cargar login 
     * 
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
}
