<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
if(isset($routes[3])){
    $users=new users();
    $delete=$users->userDelete($routes[3]);
    if ($delete==true){
        echo "
        <div class='container mt-50'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <div class='alert alert-success fw-black'>Utente eliminato con successo.</div>
                </div>
                <div class='col-md-12 text-center'>
                    <a href='".$abs."users/list' class='btn btn-primary'><i class='fa fa-users'></i> Elenco utenti</a>
                </div>
            </div>
        </div>        
        ";
    }
    else{
        echo "
        <div class='container mt-50'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <div class='alert alert-danger fw-black'>Errore nell'eliminazione.</div>
                </div>
                <div class='col-md-12 text-center'>
                    <a href='".$abs."users/list' class='btn btn-primary'><i class='fa fa-users'></i> Elenco utenti</a>
                </div>
            </div>
        </div>        
        ";
    }
}
?>

<!--<div class="container mt-50">
    <div class="row">
        <div class="col-md-12 mb-50">
            <a href="<?php /*echo $abs*/?>users/new" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Nuovo utente</a>
            <a class="btn btn-danger pull-right"><i class="fa fa-refresh fa-spin"></i> Svuota lista</a>
        </div>
        <div class="col-md-12 ">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th class="text-center">#id</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nome e cognome</th>
                    <th class="text-center">Dettagli utente</th>
                    <th class="text-center">Stato utente</th>
                </tr>
                </thead>

                <tbody>
                <?php
/*                $users=new users();
                $list=$users->listUsers();
                */?>
                </tbody>
            </table>
        </div>
    </div>
</div>-->
