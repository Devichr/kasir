<?php
     if (!isset($_SESSION)) {
        session_start();
    }
    include __DIR__ .'/./function/functions.php';

     
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
             
        if ($act == "add") {
            $add = addtocart();
            $update = updatestokadd();
        } elseif ($act == "plus") {
            $plus = plus();
            $update = updatestokadd();
        } elseif ($act == "min") {
            foreach ($_SESSION['items'] as $key => $val){
            if ($val <= 1) {
                $update = updatestokdel();
                $del = delete();
            }else{
                $update = updatestokmin();
                $min = minus();
            }
        }
        } elseif ($act == "del") {
        $update = updatestokdel();
           $del = delete();
        } elseif ($act == "clear") {
            if (isset($_SESSION['items']))
            
            {
                foreach ($_SESSION['items'] as $key => $val) {
                    $update = updatestokclear();
                    unset($_SESSION['items'][$key]);
                    
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location: index.php");
    }   
     
?>