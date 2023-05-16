<?php
//PasajeroVIP ES UN pasajero
include_once('Pasajero.php');
class PasajeroVIP extends Pasajero{
    /**
     * La clase "PasajeroVIP" tiene 
     * como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.
     */
    private $nroViajeroFrecuente;
    private $cantMillaDePasajero;

    public function __construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillaDePasajero){
        parent::__construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantMillaDePasajero=$cantMillaDePasajero;
    }
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function getCantMillaDePasajero(){
        return $this->cantMillaDePasajero;
    }
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
    }
    public function setCantMillaDePasajero($cantMillaDePasajero){
        $this->cantMillaDePasajero=$cantMillaDePasajero;
    }
    public function __toString(){
        $datoDelPasajero="";
        $datoDelPasajero.=parent::__toString()."\n";
        return "\n|||||||||||||- PASAJERO VIP -|||||||||||||\n".$datoDelPasajero."Número de viajero frecuente: ".$this->getNroViajeroFrecuente().
        "\nCantidad de millas de pasajero: ".$this->getCantMillaDePasajero();
    }
    public function darPorcentajeIncremento(){
        $porcentaje=1.10;
        $cantMillaDePasajero=$this->getCantMillaDePasajero();
        if($cantMillaDePasajero>300){
            $porcentaje+=0.20;
            parent::darPorcentajeIncremento();
        }else{
            $porcentaje+=0.25;
            parent::darPorcentajeIncremento();
        }
        return $porcentaje;
    }
}