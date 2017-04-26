<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»

/**
 * $routes[1] = Azione da eseguire
 * $routes[2] = Modulo da richiamare
 * $routes[3] = Parametri aggiuntivi da passare al modulo richiamato
 */

/** @noinspection PhpUndefinedVariableInspection */
/*if($routes[1] == "list"){
    if($routes[2]=="news"){
        include "modules/$routes[2]/$routes[2].php";
        include "modules/$routes[2]/$routes[1].php";

    }
}*/

include "modules/$routes[1]/$routes[1].php"; //Includo la classe per il modulo
include "modules/$routes[1]/$routes[2].php"; //includo il file del modulo

//echo $routes[1]."<bR>".$routes[2]."<br>".$routes[3];
/*echo "modules/$routes[1]/$routes[1].php Classe<bR>";
echo "modules/$routes[1]/$routes[2].php File<bR>";*/