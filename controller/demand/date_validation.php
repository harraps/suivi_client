<?php
$RootDir = "../../"; // we set the Root directory relatively to this file
require_once('../Controller.php');

// we check that all the necessary fields are filled
if( 
    isset($_GET['demand_id']) &&
    isset($_GET['validation'])
){
    if(
        !empty($_GET['demand_id']) &&
        !empty($_GET['validation'])
    ){
        $demand = $_controller->getDemandManager()->get($_GET['demand_id']);
        
        if( $_GET['validation'] == 'test' ){
            
            $demand->setDateTestValidation(date("Y-m-d"));
            $_controller->getDemandManager()->update($demand);
            header('Location: ../../?page=demand_view&demand_id='.$_GET['demand_id']);
        
        }elseif( $_GET['validation'] == 'production' ){

            $demand->setDateProductionValidation(date("Y-m-d"));
            $_controller->getDemandManager()->update($demand);
            header('Location: ../../?page=demand_view&demand_id='.$_GET['demand_id']);

        }else{
            header('Location: ../../?page=demand_view&error=unknown&demand_id='.$_GET['demand_id']);
        }
    }else{
        header('Location: ../../?error=invalid_id');
    }
}else{
    header('Location: ../../?error=unknown');
}