<?php
include_once("cn.php");
class genero extends cn{

    var $id_genero;
    var $descripcion;

    public function combo()
    {
        $query="select * from genero";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}
?>