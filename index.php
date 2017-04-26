<?php
/**
 * header.php = include la classe principale tools ed avvia la funzione di routing per richiamare i vari moduli
 * ##########################
 * menu.php = include il menu. Verranno attivate solamente le sezioni necessarie e richieste dal selettore dei moduli
 * ##########################
 * routeExecute.php = utilizzando le routes, include la class del modulo e la pagina del modulo richiesto. Es:
 *      - Viene richiesta la lista degli utenti, viene quindi caricata la pagina list del modulo utenti e, precedentemente la classe "users"
 * ##########################
 * footer.php = include tutti gli script JS per il funzionamento del sito
 */
require_once "assets/header.php";
require_once "core/menu.php";
require_once "core/routeExecute.php";
require_once "assets/footer.php";
?>