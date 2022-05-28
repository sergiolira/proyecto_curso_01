<?php
include_once("cn.php");
class candidato extends cn{

    var $id_candidato;
    var $nombre;
    var $apellido_paterno;
    var $apellido_materno;
    var $telefono;
    var $id_genero;
    var $estado;


    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO candidato VALUES(0,'$this->nombre','$this->apellido_paterno','$this->apellido_materno',
        '$this->telefono','$this->id_genero',1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function read()
    {
        $query="select c.*,g.descripcion from candidato c inner join genero g on c.id_genero=g.id_genero";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update candidato set nombre='$this->nombre',apellido_paterno='$this->apellido_paterno',
        apellido_materno='$this->apellido_materno',telefono='$this->telefono',id_genero='$this->id_genero' where
        id_candidato='$this->id_candidato'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function delete(){
        $query="delete from candidato  where  id_candidato='$this->id_candidato'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    
    public  function activar()
    {
        $query="update candidato set estado='1' where id_candidato='$this->id_candidato'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update candidato set estado='0' where id_candidato='$this->id_candidato'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    /**Consult */
    public function consult()
    {
        $query="select * from candidato where id_candidato='$this->id_candidato'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_candidato=$fila["id_candidato"];
            $this->nombre=$fila["nombre"];
            $this->apellido_paterno=$fila["apellido_paterno"];
            $this->apellido_materno=$fila["apellido_materno"];
            $this->telefono=$fila["telefono"];
            $this->id_genero=$fila["id_genero"];
        }
        mysqli_close($this->f_cn());        
    }

}

?>