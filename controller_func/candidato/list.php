<?php
include_once("../../model_class/candidato.php");
$obj_can= new candidato();

/**cabecera */
$html='
<table id="tbl_can" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido pat</th>
                                    <th>Apellido mat</th>
                                    <th>Telefono</th>
                                    <th>Genero</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
';

$rs_lista=$obj_can->read();
$c=1;$estado="";$estado_style="";$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){

   $estado="Activo";$estado_style="class='text-success'";
   $button_del='<button data-id="'.$fila["id_candidato"].'"     
   title="Inactivar" class="btn btn-sm btn-danger desactivar-can" id="btn_can'.$fila["id_candidato"].'">
   <i class="far fa-trash-alt" id="icon_can'.$fila["id_candidato"].'"></i></button></td>';

  }else{

    $estado="Inactivo";$estado_style="class='text-danger'";
    $button_del="";
    $button_del='<button data-id="'.$fila["id_candidato"].'"     
   title="Activar" class="btn btn-sm btn-success activar-can" id="btn_can'.$fila["id_candidato"].'">
   <i class="fas fa-user-check" id="icon_can'.$fila["id_candidato"].'"></i></button></td>';

  }
$html.='<tr><td>'.$c.'</td>
        <td>'.$fila["id_candidato"].'</td>
        <td>'.$fila["nombre"].'</td>
        <td>'.$fila["apellido_paterno"].'</td>
        <td>'.$fila["apellido_materno"].'</td>
        <td>'.$fila["telefono"].'</td>
        <td>'.$fila["descripcion"].'</td>
        <td '.$estado_style.' id="td_estado'.$fila["id_candidato"].'">'.$estado.'</td>
        <td>
        <button data-id="'.$fila["id_candidato"].'" title="Modificar" class="btn btn-sm btn-warning nuevo_can_modal">
        <i class="far fa-edit"></i></button>
        
        '.$button_del.'

        </tr>';
        $c++;
}

$html.="</tbody> </table>";

$html.='<script>  
$(function () {  
    $("#tbl_can").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>';
echo $html;
die();
?>
