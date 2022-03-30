<?php

if($_SESSION['role'] !=null){
    if(!($_SESSION['role'] == 'admin')){
        header("location:$_SERVER[HTTP_REFERER]");
    }
}


?>