<?php


/**
 * Description of Usuario
 *
 * @author Jonathan Antonio Cruz Araiza
 */
class Usuario {
     private $usuarioKey;
     private $nombre;
     private $apellidos;
     private $email;
     private $password;
     private $tipoUsuario;
     
     
     
     function getUsuarioKey() {
         return $this->usuarioKey;
     }

     function getNombre() {
         return $this->nombre;
     }

     function getApellidos() {
         return $this->apellidos;
     }

     function getEmail() {
         return $this->email;
     }

     function getPassword() {
         return sha1($this->password);
     }

     function getTipoUsuario() {
         return $this->tipoUsuario;
     }

     function setUsuarioKey($usuarioKey) {
         $this->usuarioKey = $usuarioKey;
     }

     function setNombre($nombre) {
         $this->nombre = $nombre;
     }

     function setApellidos($apellidos) {
         $this->apellidos = $apellidos;
     }

     function setEmail($email) {
         $this->email = $email;
     }

     function setPassword($password) {
         $this->password = $password;
     }

     function setTipoUsuario($tipoUsuario) {
         $this->tipoUsuario = $tipoUsuario;
     }


}
