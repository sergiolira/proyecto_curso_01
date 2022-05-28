$(document).on('click', '#btn_guardar', function() {
    var data=$('#form_can').serialize();
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_create"){               
                $("#form_can").empty();
                $("#modal-form-can").modal("hide");
                toastr.success("Se creo el candidato");
                list_candidatos();
                
            }else if(data=="true_update"){
                $("#form_can").empty();
                $("#modal-form-can").modal("hide");
                toastr.success("Se actualizo el candidato");
                list_candidatos();                
            }else{
                toastr.error("No se grabo los datos correctamente");
            }
        }
    })
});


function list_candidatos()
{
    $.ajax({
        url:"controller_func/candidato/list.php"
    }).done(function(data){
        $('.table_candidatos').empty();
        $('.table_candidatos').append(data);        
    })
}



$(document).on('click', '.nuevo_can_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/candidato/create.php?id="+id;
    $.get(url, function(data){
        $("#form_can").empty();
        $("#form_can").append(data);
        if(id>0){
            $(".title_can").empty();
            $(".title_can").append("Modificar candidato");
        }else{
            $(".title_can").empty();
            $(".title_can").append("Nuevo candidato");
        }
        $("#modal-form-can").modal("show");
    })
});
/*$(document).on('click', '.update-can', function() {
    var id=$(this).data("id");
    var nom=$(this).data("nom");
    var ape_pat=$(this).data("apepat");
    var ape_mat=$(this).data("apemat");
    var tel=$(this).data("tel");
    var gen=$(this).data("gen");
    window.location.href="index.php?id="+id+"&nom="+nom+"&ape_pat="+ape_pat+"&ape_mat="+ape_mat+"&tel="+tel+"&gen="+gen;
});*/


$(document).on('click', '.delete-can', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"delete"};
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_delete"){
                toastr.success("Se elimino el item correctamente");
                list_candidatos();
            }
        }
    })
});


$(document).on('click', '.activar-can', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_can"+id).removeClass('btn btn-sm btn-success activar-can').addClass('btn btn-sm btn-danger desactivar-can');
                $("#icon_can"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});


$(document).on('click', '.desactivar-can', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_can"+id).removeClass('btn btn-sm btn-danger desactivar-can').addClass('btn btn-sm btn-success activar-can');
                $("#icon_can"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});


function combo_genero(){
    id_gen=$("#id_gen").val();
    //alert(id_gen);
    var data={"id_gen":id_gen};
    $.ajax({
        type:'POST',
        url:"controller_func/genero/combo.php",
        data:data
    }).done(function(data){
        $('.slt_gen').empty();
        $('.slt_gen').append(data);        
    })
}