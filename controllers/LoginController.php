<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
          $alertas =[];
          $auth= new Usuario;

        if($_SERVER['REQUEST_METHOD'] === "POST"){
          $auth = new Usuario($_POST);
         $alertas = $auth->validarLogin();
              if(empty($alertas)){
                  $usuario = Usuario::where('email',$auth->email);
                 //veriificar el password
                  if($usuario){
                     if ( $usuario->comprobarPassword_verificado($auth->password)) {
                      //autenticar al usuario
                      session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre ." ". $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                      
                        if($usuario->_admin === '1'){
                          $_SESSION['_admin'] = $usuario->_admin ?? '0' ;
                          header('Location: /admin');
                        }else{
                          header('Location: /cita');
                        }
                     }
                  }else{
                    Usuario::setAlerta('error','Usuario no encontrado');
                  }
              }
        }
    
        $alertas = Usuario::getAlertas();
        $router->render('auth/login',[
      'alertas' => $alertas,
      'auth'=> $auth
        ]);

    }
    public static function logout(){
      session_start();
      $_SESSION =[];
     // debuguear($_SESSION);
      header('Location: /'); 
    }
    public static function olvide(Router $router){

        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $auth = new Usuario($_POST);
         $alertas =  $auth->validarEmail();
          
          if(empty($alertas)){
            $usuario = Usuario::where('email', $auth->email);
              if($usuario && $usuario->confirmado === "1" ){
                //generar token de un solo uso
                $usuario->crearToken();
                $usuario->guardar();
                //  enviar el email
                  $email = new Email($usuario->email , $usuario->nombre, $usuario->token);
                  $email->enviarInstrucciones();

                //ALERTA DE QUE SALIO BIEN
                $usuario::setAlerta('exito','Revisa tu email');
               

              }else{
                Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado' );
   
              }
          }

        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/olvide-password',[
            'alertas' => $alertas
        ]);
    }





    public static function recuperar(Router $router){
      $alertas = []; 
      $error = false;
      $token = s($_GET['token']);
      //buscar usuario por token
      $usuario = Usuario::where('token',$token);
     
      if(empty($usuario)){
        Usuario::setAlerta('error','Token no valido');
        $error = true;
      }
      if($_SERVER['REQUEST_METHOD']==='POST'){
        //leer el nuevo passsword y guardarlo
        $password = new Usuario($_POST);
       $alertas = $password->validarPassword();

       if(empty($alertas)){
        $usuario->password=null;
        //el pasword del usuario es igual al password nuevo instanciado
        $usuario->password  = $password->password;
        $usuario->hashPassword();
        $usuario->token = null;
       $resultado = $usuario->guardar();
       if($resultado){
        header('Location: /');
       }
       }
      }

      //debuguear($usuario);
      $alertas = Usuario::getAlertas();
      $router->render('auth/recuperar-password',[
        'alertas' => $alertas,
        'error'=> $error
        ] );
    }







    public static function crear(Router $router){
        $usuario = new Usuario;
        //alertas vacias
        $alertas= [];
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario->sincronizar($_POST);
      $alertas= $usuario->validarNuevaCuenta();

        //revisar que alertas este vacio
        if(empty($alertas)){
                //verificar que el usuario no este registrado
               $resultado = $usuario->existeUsuario();
               if($resultado->num_rows){
                $alertas = Usuario::getAlertas();
               }else{
                    //hashear el password
                    $usuario->hashPassword();


                    //Generar un toen unico

                    $usuario->crearToken();

                    //enviar el email
                      $email = new Email($usuario->email, $usuario->nombre, $usuario->token);

                   $email->enviarConfirmacion();
                   $resultado = $usuario->guardar();
                  if($resultado){
                    header('Location: /mensaje');
                  }
                   //Crear el usuario



                    //debuguear($usuario);
                  }
            }
       }  
    
        $router->render('auth/crear-cuenta',[
          'usuario' => $usuario,
          'alertas' =>$alertas
        ]);

    }

    public static function mensaje(Router $router){
      $router->render('auth/mensaje');
    }



    public static function confirmar(Router $router){
      $alertas = [];
 
      //sanitizar y leer token desde la url
      $token = s($_GET['token']);

      $usuario = Usuario::where('token', $token);

      if(empty($usuario)) {

          //mostrar mensaje de error
          Usuario::setAlerta('error', 'Token no válido...');

      }else {

          //cambiar valor de columna confirmado
          $usuario->confirmado = '1';
          //eliminar token
          $usuario->token = null;
          //Guardar y Actualizar 
          $usuario->guardar();
          //mostrar mensaje de exito
          Usuario::setAlerta('exito', 'Cuenta verificada exitosamente...');
      }

      $alertas = Usuario::getAlertas();
      $router->render('auth/confirmar-cuenta', [
          'alertas'=>$alertas
      ]);
    }

}