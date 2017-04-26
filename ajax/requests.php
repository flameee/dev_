<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
//"q=change-status&status="+dataStatus+"&id="+dataID+"&table="+dataTable+"&control-field="+dataControlField,
include "../core/tools.php";
$tool=new tools();
$request_type=$_POST["q"];

if($request_type=="change-status"){
    $status=$_POST["status"];
    $id=$_POST["id"];
    $table=$_POST["table"];
    $control_field=$_POST["control-field"];
    if($id && $table && $control_field){
        $e=$tool->quickStatusChange($id, $table, $status, $control_field);

    }
}