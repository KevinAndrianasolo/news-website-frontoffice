<?php
    function CheckDBErrors($dberror){
        if($dberror['code']!=0) throw new Exception($dberror['message']);
        return true;
    }
?>