<?php
include_once("../../model_class/candidato.php");
include_once("../../model_class/genero.php");
$obj_c= new candidato();
$obj_g= new genero();

$obj_c->id_candidato=$_REQUEST["id"];
$obj_c->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_c->id_candidato;?>">
    <div class="col-4">
    <label for="txt_nom">Ingrese nombre <i class="text-danger" title="Ingrese nombre">*</i> 
    <label class="text-danger msj-txt_nom"></label></label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter" id="txt_nom" name="txt_nom" value="<?php echo $obj_c->nombre;?>"/>
    </div>
    </div>

    <div class="col-4">
    <label for="txt_ape_pat">Ingrese apellido paterno <i class="text-danger" title="Ingrese nombre">*</i> 
    <label class="text-danger msj-txt_nombre"></label></label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter" id="txt_ape_pat" name="txt_ape_pat" value="<?php echo $obj_c->apellido_paterno;?>"/>
    </div>
    </div>

    <div class="col-4">
    <label for="txt_ape_mat">Ingrese apellido materno <i class="text-danger" title="Ingrese nombre">*</i> 
    <label class="text-danger msj-txt_nombre"></label></label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter" id="txt_ape_mat" name="txt_ape_mat" value="<?php echo $obj_c->apellido_materno;?>"/>
    </div>
    </div>

    <div class="col-4">
    <label for="txt_tel">Telefono <i class="text-danger" title="Ingrese nombre">*</i> 
    <label class="text-danger msj-txt_nombre"></label></label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter" id="txt_tel" name="txt_tel" value="<?php echo $obj_c->telefono;?>"/>
    </div>
    </div>


    <div class="col-4">
        <label for="slt_gen">Genero <i class="text-danger" title="Ingrese nombre">*</i> 
        <label class="text-danger msj-txt_nombre"></label></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <select class="form-control select_gen" name="slt_gen" id="slt_gen">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_g->combo();
                while($fila_g=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_c->id_genero==$fila_g["id_genero"]){ echo "selected";}?> value="<?php echo $fila_g["id_genero"]?>"><?php echo $fila_g["descripcion"]?></option>
            <?php }?>
        </select>
        </div>
    </div>
</div>

<script>
$('.select_gen').select2({
    theme: 'bootstrap4'
})
</script>