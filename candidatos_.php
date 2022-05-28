<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Curso 01</title>    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/js_candidato.js"></script>
</head>
    <body class="hold-transition sidebar-mini layout-fixed">

    <table>
        <form id="form_candidato">
        <tr>
            <input type="hidden" name="id" id="id" value="<?php  if(isset($_REQUEST["id"])){echo $_REQUEST["id"];}?>">
            <td>Nombre:<input type="text" name="txt_nom" id="txt_nom" 
            value="<?php if(isset($_REQUEST["nom"])){echo $_REQUEST["nom"];}?>"></td>
            <td>Apellido paterno:<input type="text" name="txt_ape_pat" 
            value="<?php if(isset($_REQUEST["ape_pat"])){echo $_REQUEST["ape_pat"];}?>"></td>
            <td>Apellido materno:<input type="text" name="txt_ape_mat"
             value="<?php if(isset($_REQUEST["ape_mat"])){echo $_REQUEST["ape_mat"];}?>"></td>
            <td>Telefono:<input type="number"  name="txt_tel" 
            value="<?php if(isset($_REQUEST["tel"])){echo $_REQUEST["tel"];}?>"></td>
            <td>Genero:
                <input type="hidden" id="id_gen" value="<?php if(isset($_REQUEST["gen"])){echo $_REQUEST["gen"];}?>"/>
                <select name="slt_gen" class="slt_gen"> 
                    
                </select>
            </td>
        </tr>                     
        </form>

        <tr>
            <td><button id="btn_save" >Guardar</button></td>  
            <td><a href="listado-candidatos.php">Ver Lista</a></td>
        </tr>
    </table>

    </body>
<script>
    
    combo_genero();

</script>
</html>