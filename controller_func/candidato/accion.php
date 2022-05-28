<?php
include_once("../../model_class/candidato.php");
$obj_can= new candidato();

if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_can->id_candidato=$_REQUEST["id"];
        $obj_can->activar();
        echo "true_activado";
        die();
       
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_can->id_candidato=$_REQUEST["id"];
        $obj_can->desactivar();
        echo "true_desactivado";
        die();
    }
}


if($_REQUEST["id"]>0){

    $obj_can->nombre=$_REQUEST["txt_nom"];
    $obj_can->apellido_paterno=$_REQUEST["txt_ape_pat"];
    $obj_can->apellido_materno=$_REQUEST["txt_ape_mat"];
    $obj_can->telefono=$_REQUEST["txt_tel"];
    $obj_can->id_genero=$_REQUEST["slt_gen"];
    $obj_can->id_candidato=$_REQUEST["id"];
    $obj_can->update();
    echo "true_update";
    die();
    
}else{
    $obj_can->nombre=$_REQUEST["txt_nom"];
    $obj_can->apellido_paterno=$_REQUEST["txt_ape_pat"];
    $obj_can->apellido_materno=$_REQUEST["txt_ape_mat"];
    $obj_can->telefono=$_REQUEST["txt_tel"];
    $obj_can->id_genero=$_REQUEST["slt_gen"];
    $obj_can->create();
    echo "true_create";
    die();
   
}



?>