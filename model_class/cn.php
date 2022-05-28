<?php

class cn{


    public function f_cn()
    {
        $hostname_cn="localhost";
        $database_cn="bd_curso";
        $user_cn="root";
        $pass_cn="";
        
        return $cn=mysqli_connect($hostname_cn,$user_cn,$pass_cn,$database_cn);
    }

}

?>