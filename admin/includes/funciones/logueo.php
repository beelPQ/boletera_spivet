<?php

function usuario_autenticado(){ //Funcion para verificar que el usuario esta logueado

    if(!revisar_usuario()){ //Si no esta logueado entra.

        header('Location:login.php');   //Es redirigido a login.php
        exit(); //Salimos del metodo

    }
}

function revisar_usuario(){ //Funcion para revisar el usuario

    return isset($_SESSION['id_logueo']);  //valida si la variable esta vacia.

}

session_start();    //Inicio de metodo de session_start();
usuario_autenticado();  //Enta al metodo usuario_autenticado();


?>