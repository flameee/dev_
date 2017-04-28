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

echo '
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
';

require_once "core/menu.php";

echo '
    <main id="main-container">
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        Benvenuto <small></small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        
                        <li><a class="link-effect" href="">Admin</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
';

require_once "core/routeExecute.php";

echo '
        </div>
    </main>
</div><!-- #page-container -->
';

require_once "assets/footer.php";
?>