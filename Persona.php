<?php
/**
 * ENTREGABLE 2 (clase PASAJERO)
 * la clase persona tiene los atributos nombre, apellido, numero de documento y teléfono
 */
class Persona{
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;
    public function __construct($nombre,$apellido,$dni,$telefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->telefono=$telefono;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function __toString(){
        return "Nombre: ".$this->getNombre()."\nApellido: ".$this->getApellido().
        "\nDNI: ".$this->getDni()."\nTelefono: ".$this->getTelefono();
    }
}