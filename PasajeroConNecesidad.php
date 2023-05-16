<?php
include_once('Pasajero.php');
/**
 * La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden 
 * requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque,
 *  o comidas especiales para personas con alergias o restricciones alimentarias.
 */
class PasajeroConNecesidad extends Pasajero{
    private $sillaDeRuedas;
    private $asistencia;
    private $restriccionesAlimentarias;
    public function __construct($nombre,$apellido,$dni,$tel,$nroAsiento,
                                $nroTicket,$sillaDeRuedas,$asistencia,$restriccionesAlimentarias){
        parent::__construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket);
        $this->sillaDeRuedas=$sillaDeRuedas;
        $this->asistencia=$asistencia;
        $this->restriccionesAlimentarias=$restriccionesAlimentarias;
    }
    public function getSillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getRestriccionesAlimentarias(){
        return $this->restriccionesAlimentarias;
    }
    public function setSillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas=$sillaDeRuedas;
    }
    public function setAsistencia($asistencia){
        $this->asistencia=$asistencia;
    }
    public function setRestriccionesAlimentarias($restriccionesAlimentarias){
        $this->restriccionesAlimentarias=$restriccionesAlimentarias;
    }
    public function __toString(){
        $datoPasajero="";
        $datoPasajero.=parent::__toString()."\n";
        return "\n|||||||||||||- PASAJERO CON NECESIDAD -|||||||||||||\n".$datoPasajero."Silla de Ruedas: ".$this->getSillaDeRuedas()."\nAsistencia para el embarque o desembarque: ".$this->getAsistencia().
        "\nComidas especiales para personas con alergias o restricciones alimentarias: ".$this->getRestriccionesAlimentarias();
    }
    public function darPorcentajeIncremento(){
        $porcentaje=1.10;
        $sillaDeRuedas=$this->getSillaDeRuedas();
        $asistencia=$this->getAsistencia();
        $restriccionesAlimentarias=$this->getRestriccionesAlimentarias();
        if($sillaDeRuedas && $asistencia && $restriccionesAlimentarias){
            $porcentaje+=0.20;
            parent::darPorcentajeIncremento();
        }else{
            $porcentaje+=0.05;
            parent::darPorcentajeIncremento();
        }
        return $porcentaje;
    }
}