<?php
include_once('Pasajero.php');
class PasajeroEstandar extends Pasajero{
    /**
     * ENTREGABLE 3
     * los pasajeros comunes el porcentaje de incremento es del 10 %
     */
    public function __construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket){
        parent::__construct($nombre,$apellido,$dni,$tel,$nroAsiento,$nroTicket);
    }
    public function __toString(){
        $datoPasajero="";
        $datoPasajero.=$datoPasajero.parent::__toString();
        return "\n|||||||||||||- PASAJERO COMUN -|||||||||||||\n".$datoPasajero;
    }
    public function darPorcentajeIncremento(){
        $porcentaje=1.10;
        parent::darPorcentajeIncremento();
        return $porcentaje;
    }
}