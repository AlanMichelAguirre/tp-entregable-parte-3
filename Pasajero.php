<?php
/**
 * ENTREGABLE 3
 * La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de 
 * ticket del pasaje del viaje
 */
include_once('Persona.php');
class Pasajero extends Persona{
    private $nroAsiento;
    private $nroTicket;
    public function __construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket){
        parent::__construct($nombre,$apellido,$dni,$tel);
        $this->nroAsiento=$nroAsiento;
        $this->nroTicket=$nroTicket;
    }
    public function getNroAsiento(){
        return $this->nroAsiento;
    }
    public function getNroTicket(){
        return $this->nroTicket;
    }
    public function setNroAsiento($nroAsiento){
        $this->nroAsiento=$nroAsiento;
    }
    public function setNroTicket($nroTicket){
        $this->nroTicket=$nroTicket;
    }
    public function __toString(){
        $datoPersona="";
        $datoPersona.=parent::__toString()."\n";
        return $datoPersona."Numero de asiento: ".$this->getNroAsiento()."\nNumero de Ticket: ".$this->getNroTicket().
        "\nPorcentaje: ".$this->darPorcentajeIncremento();
    }
    public function darPorcentajeIncremento(){
        $porcentaje=1.10;
        return $porcentaje;
    }
}