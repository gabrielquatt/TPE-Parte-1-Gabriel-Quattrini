<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('Controller.php');

class UserController extends Controller
{

    /** 
     * Funcion para editar parametro de prioridad en la base de datos 
     *
     */
    public function editPriority()
    {
        $userId = $_POST['userId'];
        $priority = $_POST['priority'];
        $complete = $this->getusermodel()->editPriorityDB($priority, $userId);
        if ($complete) {
            header("Location: viewUser");
        } else {
            $this->showError('no se pudo editar los permisos del usuario');
        };
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
     * Funcion para Chequear Usuario antes de enviar email para recuperar contraseña.
     */
    public function checkUser()
    {
        $user = $_POST['username']; //nombre ingresado
        $email = $_POST['email'];   //mail ingrezado
        $userData = $this->getusermodel()->getAllMailAndName($email, $user);   //funcion creada para verificacio de mail y name
        if (empty($userData)) {   //verificacion de que los datos ingresados sean correctos
            $this->showError('Nombre de Usuario o Email son Incorrectos');
        } else {
            $codigo = $this->generateRandomString(); //codigo random 
            $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours')); //a la hora actual le sumo 2hr que sera el tiempo de validacion del codigo
            $accestoEdit = $this->getusermodel()->accesToEdit($fechaRecuperacion, $codigo, $email); //edito valores del usuario para poder realizar el cambio de contraseña.
            if ($accestoEdit) {
                $message  = "<html><body>";
                $message .= " <div width='600px'; style='background-color:#000000; text-align:center;'>
                <h1 style='color:#FF0000' ;>VideoGames</h1>
                <h2 style='color:#FF0000'>el codigo para cambiar su contraseña es: </h2>
                <br>
                <h1 style='color:#FFF300'>$codigo</h1>
                <br>
                <h4 style='color:#FF0000'> esta contraseña estara disponible por 24hs, recuerde que no debe cerrar la pestaña de ingreso o debera solicitar una nuevo codigo</h4>
                <br>
                </div>";
                $message .= "</body></html>";
                // si se guardan los daton envio mail al usuario con los datos para comparar
                $this->recover($user, $email, $message);
            } else {
                //en caso contrario muestro pantalla de error + msj
                $this->showError('Nombre de Usuario o Email son Incorrectos');
            };
        }
    }

    /**
     * funcion para generar un string random de 16 caracteres
     */
    public function generateRandomString()
    {
        $length = 16;
        $codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        return $codigo;
    }

    /**
     * funcion para mandar mail de recuperacion de cuenta
     */
    public function recover($user, $email, $message)
    {
        require('phpmailer/Exception.php');
        require('phpmailer/PHPMailer.php');
        require('phpmailer/SMTP.php');

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'videogamesweb2@gmail.com';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail->setFrom('videogamesweb2@gmail.com', 'ADMINISTRADOR');
            $mail->addAddress('videogamesweb2@gmail.com');     // $email   Add a recipient
            // Content
            $mail->Subject = "VIDEOGAMES";
            $mail->Body  = $message;
            $mail->isHTML(true);  // Set email format to HTML
            $mail->send(); //envio del mail
            $this->getloginview()->tokenForm($user); //cargo vista para ingrezar codigo y nueva contraseña
        } catch (Exception $e) {
            $this->showError("hubo un error: {$mail->ErrorInfo}"); //erroral enviar el email
        }
    }
    /**
     * Funcion para verificar el Token o clave generada aleatoriamente para la edicion de contraseña
     */
    public function verifyToken()
    {
        $password = $_POST['pass']; //selecciono contraseña
        $codigo = $_POST['codigo']; //selecciono codigo
        $user = $_POST['user'];     //selecciono usuario
        $data = $this->getusermodel()->getUserByUsername($user); //funcion reutilizad para traer datos del usuario
        $current = date("Y-m-d H:i:s"); //hora actual 
        if (strtotime($current) > strtotime($data->date)) { //verificacion de que el tiempo transcurrido no sea mayor al limite permitido (24hs)
            $this->showError("codigo invalido"); //alerta de codiga ya invalidado 
        } else if ($data->token != $codigo) { //verificacion de que el codigo de acceso no se alla solicitado nuevamente
            $this->showError("error de codigo"); //alerta de codigo sea porque fue cambiado o mal ingresado por el ususario 
        } else {
            $email = $data->email;
            $codigo = $this->generateRandomString(); //codigo random para que sirva una sola vez para cambiar la contraseña
            $pass = password_hash($password, PASSWORD_BCRYPT); //encriptada la nueva contraseña
            $complete = $this->getusermodel()->updatePassword($pass, $codigo, $user); //guardado los cambios en la db

            if ($complete) { //de estar guardados se manda al login para iniciar contraseña
                $message  = "<html><body>";
                $message .= " <div width='600px'; style='background-color:#000000; text-align:center;'>
                <h1 style='color:#FF0000' ;>VideoGames</h1>
                <h2 style='color:#FF0000'>su contraseña a sido cambiada con exito</h2>
                <br>
                <h4 style='color:#FF0000'> recuerde guardar bien su contraseña.</h4>
                <br>
                </div>";
                $message .= "</body></html>";
                $this->recover($user, $email, $message);
                header("Location: login");
            } else { //en caso de error se informara
                $this->showError('Cambios no guardados');
            }
        }
    }
}
