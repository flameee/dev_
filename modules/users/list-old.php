<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
?>

<div class="content mt-50">
    <div class="row">
        <div class="col-md-12 mb-50">
            <div class="col-md-12">
                <a href="<?php echo $abs?>users/new" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Nuovo utente</a>
                <a class="btn btn-danger pull-right user-list-clear" data-toggle="modal" data-target="#svuota-lista"><i class="fa fa-refresh fa-spin"></i> Svuota lista</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 ">
            <div class="col-lg-12">
                <div class="block">
                    <div class="content-header">
                        <h3>Test</h3>
                    </div>
                    <div class="block-content">
                        <table id="users-list-ajax" cellpadding="0" cellspacing="0" border="0" class="display table table-hover table-bordered table-responsive" width="100%" >
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
    </div>
</div>
<div class="modal fade" id="svuota-lista" tabindex="-1" role="dialog" aria-labelledby="svuota-lista">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center tc-danger fw-black" id="elimina-utente">ATTENZIONE!</h4>
            </div>
            <div class="modal-body">
                <h3 class="fw-light ff-raleway text-center">Si è sicuri di voler svuotare la lista utenti?</h3>
                <p class="text-center ff-raleway fw-light">Procedendo tutti i dati verranno persi e non sarà più possibile recuperarli.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a href="http://localhost/dev_/users/delete/all" class="btn btn-success">Procedi con l'eliminazione</a>
            </div>
        </div>
    </div>
</div>