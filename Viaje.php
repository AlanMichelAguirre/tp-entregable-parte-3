<?php
/**
 * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus 
 * viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros 
 * y los pasajeros del viaje.

 * ENTREGABLE 1
 * Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los
 * atributos de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la 
 * información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves 
 * “nombre”, “apellido” y “numero de documento”.
 * -----------------------------------------------------------
 * 
 * ENTREGABLE 2
 * El viaje ahora contiene una referencia a una colección de objetos de la clase
 * La clase Viaje debe hacer referencia al responsable de realizar el viaje
 * ----------------------------------------------------
 * ENTREGABLE 3
 * 
 * Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados 
 * por los pasajeros e implementar el método venderPasaje($objPasajero)
 */
class Viaje{
    private $codViaje;
    private $destino;
    private $cantMaxPasajero;
    private $pasajero;
    private $responsableV;
    private $costoViaje;
    private $sumaCostos;
    public function __construct($codViaje,$destino,$cantMaxPasajero,
                                $pasajero,$responsableV,$costoViaje,$sumaCostos){
        $this->codViaje=$codViaje;
        $this->destino=$destino;
        $this->cantMaxPasajero=$cantMaxPasajero;
        $this->pasajero=$pasajero;
        $this->responsableV=$responsableV;
        $this->costoViaje=$costoViaje;
        $this->sumaCostos=$sumaCostos;
    }
    public function getCodigo(){
        return $this->codViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajero(){
        return $this->cantMaxPasajero;
    }
    public function getPasajero(){
        return $this->pasajero;
    }
    public function getResponsableV(){
        return $this->responsableV;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    public function getSumaCostos(){
        return $this->sumaCostos;
    }

    public function setCodigo($codViaje){
        $this->codViaje=$codViaje;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }
    public function setCantMaxPasajero($cantMaxPasajero){
        $this->cantMaxPasajero=$cantMaxPasajero;
    }
    public function setPasajero($pasajero){
        $this->pasajero=$pasajero;
    }
    public function setReponsableV($responsableV){
        $this->responsableV=$responsableV;
    }
    public function setCostoViaje($costoViaje){
        $this->costoViaje=$costoViaje;
    }
    public function setSumaCostos($sumaCostos){
        $this->sumaCostos=$sumaCostos;
    }

    public function __toString(){
        return "Codigo de Viaje: ".$this->getCodigo()."\nDestino: ".$this->getDestino()."\nCantidad Maxima de pasajeros: ".$this->getCantMaxPasajero().
        "\nCosto del Viaje: ".$this->getCostoViaje()."\nRecaudacion: ".$this->getSumaCostos().
        "\nPASAJEROS\n".$this->recorrerPasajero()."\nRESPONSABLE\n".$this->recorrerReponsable();
    }
    /**
     * La funcion recorrerPasajero lo que hace es realizar un
     * recorrido exautivo de todos los pasajero que hay y concatenarlo
     * en un string
     * @return String $cadena
     */
    public function recorrerPasajero(){
        $objPasajero=$this->getPasajero();
        $cadena="";
        for($i=0;$i<count($objPasajero);$i++){
            $cadena=$cadena.$objPasajero[$i]."\n-------------------\n";
        }
        return $cadena;
    }
    /**
     * La funcion recorrerReponsable lo que hace es realizar un
     * recorrido exautivo de todos los reponsable que hay y concatenarlo
     * en un string
     * @return String $cadena
     */
    public function recorrerReponsable(){
        $objReponsable=$this->getResponsableV();
        $cadena="";
        for($i=0;$i<count($objReponsable);$i++){
            $cadena=$cadena.$objReponsable[$i]."\n-------------------\n";
        }
        return $cadena;
    }
    /**
     * La funcion agregarPasajero lo que hace es agregar en
     * el arreglo asociativo un nuevo pasajero siempre y cuando
     * halla lugar
     * @param String $nombre,$apellido
     * @param int $dni
     * @return boolean $nuevoPasajero
     */
    public function agregarPasajero($objPasajeroNuevo){
        $objPasajero=$this->getPasajero();
        $nuevoPasajero=false;
        $pasajeDisponible=$this->hayPasajesDisponible();
        if($pasajeDisponible){
            array_push($objPasajero,$objPasajeroNuevo);
            $this->setPasajero($objPasajero);
            $nuevoPasajero=true;
        }
        return $nuevoPasajero;
    }
    public function hayPasajesDisponible(){
        $objPasajero=$this->getPasajero();
        $capacidadMaxPasajero=$this->getCantMaxPasajero();
        $pasajeDisponible=count($objPasajero)<=$capacidadMaxPasajero;
        return $pasajeDisponible;
    }
    public function agregarResponsable($objReponsableNuevo){
        $objReponsable=$this->getResponsableV();
        array_push($objReponsable,$objReponsableNuevo);
        $this->setReponsableV($objReponsable);
    }
    public function buscarSiExiste($objPasajeroNuevo){
        $objPasajero=$this->getPasajero();
        //pasajero a agregar
        $estaCargado=false;
        $nombre=$objPasajeroNuevo->getNombre();
        $apellido=$objPasajeroNuevo->getApellido();
        $dni=$objPasajeroNuevo->getDni();
        $i=$this->buscarPasajero($dni);
        //Pasajero en el listado si existe
        if($i>-1){
            $nombrePasajero=$objPasajero[$i]->getNombre();
            $apellidoPasajero=$objPasajero[$i]->getApellido();
            $dniPasajero=$objPasajero[$i]->getDni();
            $estaCargado=($nombre==$nombrePasajero)&&($apellido==$apellidoPasajero)&&($dni==$dniPasajero);
        }
        return $estaCargado;
    }
    /**
     * La funcion buscarSiExisteResponsable verifica si existe un reponsable con los mismo
     * datos ,en caso que sea cierto ,devuelve verdadero
     * @param obj $objReponsableNuevo
     * @return boolean $estaCargado
     */
    public function buscarSiExisteResponsable($objReponsableNuevo){
        $objReponsable=$this->getResponsableV();
        //reponsable a agregar
        $estaCargado=false;
        $nombre=$objReponsableNuevo->getNombre();
        $apellido=$objReponsableNuevo->getApellido();
        $nroEmpleado=$objReponsableNuevo->getNroEmpleado();
        $nroLicencia=$objReponsableNuevo->getNroLicencia();
        $i=$this->buscarReponsable($nroEmpleado);
        //reponsable en el listado si existe
        if($i>-1){
            $nombreReponsable=$objReponsable[$i]->getNombre();
            $apellidoReponsable=$objReponsable[$i]->getApellido();
            $nroEmpleadoReponsable=$objReponsable[$i]->getDni();
            $nroLicenciaReponsable=$objReponsable[$i]->getNroLicencia();
            $estaCargado=($nombre==$nombreReponsable)&&($apellido==$apellidoReponsable)&&($nroEmpleadoReponsable==$nroEmpleado)&&($nroLicenciaReponsable==$nroLicencia);
        }
        return $estaCargado;
    }
    /**
     * La funcion buscarPasajero lo que hace es realizar un recorrido parcial del arreglo
     * asociativo pasajero,si lo encuentra devolvera la posicion donde esta el pasajero
     * @param int $dni
     * @return int $posicion
     */
    public function buscarPasajero($dni){
        $objPasajero=$this->getPasajero();
        $encontro=false;
        $posicion=-1;
        $i=0;
        while($i<count($objPasajero) && !$encontro){
            if($objPasajero[$i]->getDni()==$dni){
                $encontro=true;
                $posicion=$i;
            }
            $i++;
        }
        return $posicion;
    }
    /**
     * La funcion buscarReponsable realiza un recorrido parcial
     * en caso de encontrar o exista el nro de empleado
     * nos devolvera la posicion donde se encuentra
     * @param int $nroEmpleado
     * @return int $posicion
     */
    public function buscarReponsable($nroEmpleado){
        $objReponsable=$this->getResponsableV();
        $encontro=false;
        $posicion=-1;
        $i=0;
        while($i<count($objReponsable) && !$encontro){
            if($objReponsable[$i]->getNroEmpleado()==$nroEmpleado){
                $encontro=true;
                $posicion=$i;
            }
            $i++;
        }
        return $posicion;
    }
    /**
     * la funcion modificarNombrePasajero es modificar nombre de dicho pasajero que
     * esta ubicado en dicha posicion
     * @param String $nombre
     * @param int $i
     */
    public function modificarNombrePasajero($nombre,$i){
        $objPasajero=$this->getPasajero();
        $objPasajero[$i]->setNombre($nombre);
        $this->setPasajero($objPasajero);
    }
    /**
     * la funcion modificarApellidoPasajero es modificar apellido de dicho pasajero que
     * esta ubicado en dicha posicion
     * @param String $apellido
     * @param int $i
     */
    public function modificarApellidoPasajero($apellido,$i){
        $objPasajero=$this->getPasajero();
        $objPasajero[$i]->setApellido($apellido);
        $this->setPasajero($objPasajero);
    }
    /**
     * la funcion modificarDniPasajero es modificar DNI de dicho pasajero que
     * esta ubicado en dicha posicion
     * @param int $dni,$i
     */
    public function modificarDniPasajero($dni,$i){
        $objPasajero=$this->getPasajero();
        $objPasajero[$i]->setDni($dni);
        $this->setPasajero($objPasajero);
    }
    /**
     * la funcion modificarTelefonoPasajero es modificar telefono de dicho pasajero que
     * esta ubicado en dicha posicion
     * @param int $telefono,$i
     */
    public function modificarTelefonoPasajero($telefono,$i){
        $objPasajero=$this->getPasajero();
        $objPasajero[$i]->setTelefono($telefono);
        $this->setPasajero($objPasajero);
    }
    /**
     * La funcion modificarCodigo es setear el codigo recibido por parametro
     * @param int $codigo
     */
    public function modificarCodigo($codigo){
        $this->setCodigo($codigo);
    }
    /**
     * La funcion modificarDestino es setear el destino recibido por parametro
     * @param String $destino
     */
    public function modificarDestino($destino){
        $this->setDestino($destino);
    }
    /**
     * La funcion modificarCapacidadMax es setear la capacidad Maxima de pasajero recibido por parametro
     * @param int $capacidadMax
     */
    public function modificarCapacidadMax($capacidadMax){
        $this->setCantMaxPasajero($capacidadMax);
    }
    /**
     * La function modificarNombreResponsable su tarea es setear el nombre del responsable
     * recibido por parametro
     * @param String $nombre
     */
    public function modificarNombreResponsable($nombre,$i){
        $objReponsable=$this->getResponsableV();
        $objReponsable[$i]->setNombre($nombre);
    }
    /**
     * La function modificarApellidoResponsable su tarea es setear el apellido del responsable
     * recibido por parametro
     * @param String $apellido
     */
    public function modificarApellidoResponsable($apellido,$i){
        $objReponsable=$this->getResponsableV();
        $objReponsable[$i]->setApellido($apellido);
    }
    /**
     * La function modificarNroEmpleado su tarea es setear el nro de empleado del responsable
     * recibido por parametro
     * @param int $nroEmpleado
     */
    public function modificarNroEmpleado($nroEmpleado,$i){
        $objReponsable=$this->getResponsableV();
        $objReponsable[$i]->setNroEmpleado($nroEmpleado);
    }
    /**
     * La function modificarNroLicencia su tarea es setear el nro de licencia del responsable
     * recibido por parametro
     * @param int $nroLicencia
     */
    public function modificarNroLicencia($nroLicencia,$i){
        $objReponsable=$this->getResponsableV();
        $objReponsable[$i]->setNroLicencia($nroLicencia);
    }
    public function evaluarCapacidadMax($nuevaCapacidadMax){
        $cantidadPasajero=count($this->getPasajero());
        $modificar=false;
        if($nuevaCapacidadMax>$cantidadPasajero){
            $modificar=true;
        }
        return $modificar;
    }
    /**
     * La funcion mostrarPasajeroX lo que hace es concatenar los datos del pasajero y
     * devolver la informacion del pasajero de dicha posicion
     * @param int $posicion
     * @return String $pasajeroX
     */
    public function mostrarPasajeroX($posicion){
        $objPasajero=$this->getPasajero();
        $pasajeroX="".$objPasajero[$posicion];
        return $pasajeroX;
    }
    public function mostrarResponsableX($posicion){
        $objReponsable=$this->getResponsableV();
        $reponsableX="".$objReponsable[$posicion];
        return $reponsableX;
    }
    /**
     * La funcion verInformacionViaje es concatenar la informacion del viaje y devolver dicha informacion
     * @return String
     */
    public function verInformacionViaje(){
        return "Codigo de Viaje: ".$this->getCodigo()."\nDestino: ".$this->getDestino()."\nCantidad Maxima de pasajeros: ".$this->getCantMaxPasajero().
        "\nCosto del Viaje: ".$this->getCostoViaje()."\nRecaudacion: ".$this->getSumaCostos();
    }
    /**
     * debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), 
     * actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero
     */
    public function venderPasaje($objPasajero){
        $seAgrego=$this->agregarPasajero($objPasajero);
        $costoViaje=$this->getCostoViaje();
        if($seAgrego){
            $costoTotal=$this->getSumaCostos();
            $porcentaje=$objPasajero->darPorcentajeIncremento();
            $costoViaje*=$porcentaje;
            $costoTotal+=$costoViaje;
            $this->setSumaCostos($costoTotal);
        }
        return $costoViaje;
    }
    /**
     * La funcion menu lo que hace es mostrar un menu con una serie de opciones que el usuario puede hacer en el programa
     * @return String
     */
    public function menu(){
        return "-------------------MENU---------------------\n"
        . "Elije algunas de las siguientes opciones\n"
        . "1_Ver los datos del viaje\n"
        . "2_Ver informacion del viaje\n"
        ."3_Ver informacion de los Pasajeros\n"
        ."4_Ver informacion de los Responsable\n"
        . "5_Modificar informacion del pasajero\n"
        . "6_Modificar informacion del viaje\n"
        . "7_Modificar informacion del responsable\n"
        . "8_Agregar Pasajero\n"
        . "9_Agregar Reponsable\n"
        . "0_Salir\n"
        . "--------------------------------------------\n"
        . "--> ";
    }
}