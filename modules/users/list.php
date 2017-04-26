<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
?>

<div class="container mt-50">
    <div class="row">
        <div class="col-md-12 mb-50">
            <div class="col-md-12">
                <a href="<?php echo $abs?>users/new" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Nuovo utente</a>
                <a class="btn btn-danger pull-right user-list-clear"><i class="fa fa-refresh fa-spin"></i> Svuota lista</a>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-12">
                <table id="users-list-ajax" cellpadding="0" cellspacing="0" border="0" class="display table table-hover table-bordered" width="100%" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Email</th>
                        <th>Ultimo accesso</th>
                        <th class="text-center">Livello utente</th>
                        <th class="text-center">Stato utente</th>
                        <th class="text-center">Scheda utente</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
