<option value="0">Seleccionar</option>
<?php
include_once("../../model_class/genero.php");
$obj_gen=new genero();

$rs_list=$obj_gen->combo();

while($fila=mysqli_fetch_assoc($rs_list)){
?>

<option  <?php if($_REQUEST["id_gen"]==$fila["id_genero"]){ echo "selected";}?>  value="<?php echo $fila["id_genero"]?>"><?php echo $fila["descripcion"]?></option>

<?php
}
die();
?>