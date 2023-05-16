<?php
/**
 * El viaje ahora contiene una referencia a una colección de objetos de la clase
 * La clase Viaje debe hacer referencia al responsable de realizar el viaje.;
 * 
 */
include_once('PasajeroVIP.php');
include_once('PasajeroEstandar.php');
include_once('PasajeroConNecesidad.php');
include_once('Viaje.php');
include_once('ResponsableV.php');
$objPasajeroEstandar=new PasajeroEstandar("alan","aguirre","41436311",2994249341,1,01);
$objPasajeroConNecesidad=new PasajeroConNecesidad("jose","gonzalez",12345678,2994893211,2,02,true,true,false);
$objPasajeroVIP=new PasajeroVIP("denisse","gonzalez",67890098,299876456,3,03,12,400);
$pasajero=[$objPasajeroEstandar,$objPasajeroConNecesidad,$objPasajeroVIP];
$objResponsable1=new ResponsableV(123,8943,"mirko gael","aguirre");
$responsable=[$objResponsable1];
$objViaje=new Viaje(123,"cipolletti",5,[],$responsable,1200,0);
$costo1=$objViaje->venderPasaje($objPasajeroEstandar);
$costo2=$objViaje->venderPasaje($objPasajeroConNecesidad);
$costo3=$objViaje->venderPasaje($objPasajeroVIP);
//$costoPagar=[$costo1,$costo2,$costo3];
do{
echo "\n".$objViaje->menu();
$opc=trim(fgets(STDIN));
switch($opc){
    case 1:
        echo $objViaje->__toString();
        break;
    case 2:echo $objViaje->verInformacionViaje();break;
    case 3:echo $objViaje->recorrerPasajero();break;
    case 4:
        echo $objViaje->recorrerReponsable();break;
    case 5:
        echo "Ingrese DNI del pasajero\n";
        $dni=trim(fgets(STDIN));
        $posicion=$objViaje->buscarPasajero($dni);
        if($posicion>-1){
            echo "El pasajero que vas a modificar es el siguiente:\n".$objViaje->mostrarPasajeroX($posicion);
            echo "\nQue quieres modificar?\n1-NOMBRE\n2-APELLIDO\n3-DNI\n4-TELEFONO\n";
            $opcModificacion=trim(fgets(STDIN));
            switch($opcModificacion){
                case 1:
                    echo "Ingrese nuevo nombre: ";
                    $nombre=trim(fgets(STDIN));
                    $objViaje->modificarNombrePasajero($nombre,$posicion);
                    echo "\nSe han realizado modificaciones\n";
                    break;
                case 2:
                    echo "Ingrese nuevo apellido: ";
                    $apellido=trim(fgets(STDIN));
                    $objViaje->modificarApellidoPasajero($apellido,$posicion);
                    echo "\nSe han realizado modificaciones\n";
                    break;
                case 3:
                    echo "Ingrese nuevo DNI: ";
                    $dni=trim(fgets(STDIN));
                    $objViaje->modificarDniPasajero($dni,$posicion);
                    echo "\nSe han realizado modificaciones\n";
                    break;
                case 4:
                    echo "Ingrese nuevo Nro telefono: ";
                    $telefono=trim(fgets(STDIN));
                    $objViaje->modificarTelefonoPasajero($telefono,$posicion);
                    echo "\nSe han realizado modificaciones\n";
                    break;
                default:
                    echo "Opcion incorrecto\n";
            }
        }else{
            echo "El pasajero no existe\n";
        }
        ;break;
    case 6:
        echo "Los datos de viajes que vas a modificar es el siguiente:\n".$objViaje->verInformacionViaje();
        echo "\nQue quieres modificar?\n1-CODIGO\n2-DESTINO\n3-CAPACIDAD MAXIMA\n";
        $opcModificacion=trim(fgets(STDIN));
        switch($opcModificacion){
            case 1:
                echo "Ingrese nuevo codigo: ";
                $codigo=trim(fgets(STDIN));
                $objViaje->modificarCodigo($codigo,);
                echo "\nSe han realizado modificaciones\n";
                break;
            case 2:
                echo "Ingrese nuevo destino: ";
                $destino=trim(fgets(STDIN));
                $objViaje->modificarDestino($destino);
                echo "\nSe han realizado modificaciones\n";
                break;
            case 3:
                echo "Ingrese nueva capacidad maxima: ";
                $capacidadMax=trim(fgets(STDIN));
                if($objViaje->evaluarCapacidadMax($capacidadMax)){
                    $objViaje->modificarCapacidadMax($capacidadMax);
                    echo "\nSe han realizado modificaciones\n";
                }else{
                    echo "\nLa capacidad que quieres ingresar no es posible,es inferior a la cantidad de pasajero que hay cargados.\n";
                }
                break;
            default:
                echo "Opcion incorrecto\n";
        }
        break;
        case 7:
            echo "Ingrese NRO del empleado\n";
            $nroEmpleado=trim(fgets(STDIN));
            $posicion=$objViaje->buscarReponsable($nroEmpleado);
            if($posicion>-1){
                echo "El responsable que vas a modificar es el siguiente:\n".$objViaje->mostrarResponsableX($posicion);
                echo "\nQue quieres modificar?\n1-NOMBRE\n2-APELLIDO\n3-NRO EMPLEADO\n4-NRO LICENCIA\n";
                $opcModificacion=trim(fgets(STDIN));
                switch($opcModificacion){
                    case 1:
                        echo "Ingrese nuevo nombre: ";
                        $nombre=trim(fgets(STDIN));
                        $objViaje->modificarNombreResponsable($nombre,$posicion);
                        echo "\nSe han realizado modificaciones\n";
                        break;
                    case 2:
                        echo "Ingrese nuevo apellido: ";
                        $apellido=trim(fgets(STDIN));
                        $objViaje->modificarApellidoResponsable($apellido,$posicion);
                        echo "\nSe han realizado modificaciones\n";
                        break;
                    case 3:
                        echo "Ingrese nuevo NRO empleado: ";
                        $nroEmpleado=trim(fgets(STDIN));
                        $objViaje->modificarNroEmpleado($nroEmpleado,$posicion);
                        echo "\nSe han realizado modificaciones\n";
                        break;
                    case 4:
                        echo "Ingrese nuevo Nro de licencia: ";
                        $nroLicencia=trim(fgets(STDIN));
                        $objViaje->modificarNroLicencia($nroLicencia,$posicion);
                        echo "\nSe han realizado modificaciones\n";
                        break;
                    default:
                        echo "Opcion incorrecto\n";
                }
            }else{
                echo "El reponsable no existe\n";
            }
           break;
        case 8:
            echo "Ingrese nuevo nombre: ";
            $nombre=trim(fgets(STDIN));
            echo "\nIngrese nuevo apellido: ";
            $apellido=trim(fgets(STDIN));
            echo "\nIngrese nuevo DNI: ";
            $dni=trim(fgets(STDIN));
            echo "\nIngrese nuevo Telefono: ";
            $telefono=trim(fgets(STDIN));
            echo "\nCATEGORIA DEL PASAJERO:\n1-PASAJERO VIP\n2-PASAJERO ESTANDAR\n3-PASAJERO CON NECESIDAD\n";
            $opcCategoria=trim(fgets(STDIN));
            switch($opcCategoria){
                case 1:
                    echo "\nNro de viajero Frecuente: ";
                    $nroViajeroFrecuente=trim(fgets(STDIN));
                    echo "\nCantidad de millas de pasajero: ";
                    $cantMillas=trim(fgets(STDIN));
                    echo "\nNro de ticket: ";
                    $nroTicket=trim(fgets(STDIN));
                    $objPasajeroNuevo=new PasajeroVIP($nombre,$apellido,$dni,$telefono,count($objViaje->getPasajero())+1,$nroTicket,$nroViajeroFrecuente,$cantMillas);
                    $noExistePasajero=$objViaje->buscarSiExiste($objPasajeroNuevo);
            if(!$noExistePasajero){
                $costo=$objViaje->venderPasaje($objPasajeroNuevo);
                if($objViaje->hayPasajesDisponible()){
                    echo "Se agrego el pasajero\nTotal a pagar: $".$costo." pesos\n";
                }else{
                    echo "No hay lugar para agregar pasajero\n";
                }
            }else{
                echo "El pasajero que quieres agregar ya existe en el listado";
            }break;
                case 2:
                    echo "Nro de ticket: ";
                    $nroTicket=trim(fgets(STDIN));
                    $objPasajeroNuevo=new PasajeroEstandar($nombre,$apellido,$dni,$telefono,count($objViaje->getPasajero())+1,$nroTicket);
                    $noExistePasajero=$objViaje->buscarSiExiste($objPasajeroNuevo);
            if(!$noExistePasajero){
                $costo=$objViaje->venderPasaje($objPasajeroNuevo);
                if($objViaje->hayPasajesDisponible()){
                    echo "Se agrego el pasajero\nTotal a pagar: $".$costo." pesos\n";
                }else{
                    echo "No hay lugar para agregar pasajero\n";
                }
            }else{
                echo "El pasajero que quieres agregar ya existe en el listado";
            }break;
            case 3:
                echo "Necesita sillas de ruedas?\n1-SI\n2-NO\n";
                $sillaDeRuedas=trim(fgets(STDIN));
                echo "Necesita asistencia?\n1-SI\n2-NO\n";
                $asistencia=trim(fgets(STDIN));
                echo "Tiene restriccion en alimentos?\n1-SI\n2-NO\n";
                $restriccionesAlimentarias=trim(fgets(STDIN));
                echo "\nNro de ticket: ";
                $nroTicket=trim(fgets(STDIN));
                $objPasajeroNuevo=new PasajeroConNecesidad($nombre,$apellido,$dni,$telefono,count($objViaje->getPasajero())+1,$nroTicket,$sillaDeRuedas==1,$asistencia==1,$restriccionesAlimentarias==1);
                $noExistePasajero=$objViaje->buscarSiExiste($objPasajeroNuevo);
            if(!$noExistePasajero){
                $costo=$objViaje->venderPasaje($objPasajeroNuevo);
                if($objViaje->hayPasajesDisponible()){
                    echo "Se agrego el pasajero\nTotal a pagar: $".$costo." pesos\n";
                }else{
                    echo "No hay lugar para agregar pasajero\n";
                }
            }else{
                echo "El pasajero que quieres agregar ya existe en el listado";
            }
            default:
            echo "\nopcion incorrecto";
            }
            break;
            case 9:
                echo "Ingrese nro empleado: ";
                $nroEmpleado=trim(fgets(STDIN));
                echo "\nIngrese nro licencia: ";
                $nroLicencia=trim(fgets(STDIN));
                echo "\nIngrese nombre: ";
                $nombre=trim(fgets(STDIN));
                echo "\nIngrese apellido: ";
                $apellido=trim(fgets(STDIN));
                $objResponsableNuevo=new ResponsableV($nroEmpleado,$nroLicencia,$nombre,$apellido);
                $noExisteReponsable=$objViaje->buscarSiExisteResponsable($objResponsableNuevo);
                if(!$noExisteReponsable){
                    $objViaje->agregarResponsable($objResponsableNuevo);
                    echo "Se agrego el nuevo responsable\n";
                }else{
                    echo "El responsable que quieres agregar ya existe en el listado";
                }break;
        case 0:
            echo "Fin del programa...\n";break;
        default:
            echo "opcion incorrecto";
}
}while($opc!=0);