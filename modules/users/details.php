<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
$id= $routes[3];
$id_edit=$id;
?>

<div class="container ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
            $users=new users();
            if(isset($_POST["username"])){
                $edit=$users->userUpdate($id_edit);
            }
            $details=$users->userDetails($id_edit);
            ?>
            <div class="panel panel-default">
                <div class="panel-heading fw-black">
                    <i class="fa fa-user" aria-hidden="true"></i> Dettagli utente
                    <?php
                    if($edit===false){
                        ?>
                        <span class="label label-danger">C'è stato un errore. Riprovare.</span>
                        <?php
                    }
                    elseif($edit===true){
                        ?>
                        <span class="label label-success">Utente modificato con successo.</span>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-body">

                    <form method="post">
                        <div class="form-group">
                            <label for="nome" >Nome</label>
                            <input type="text" class="form-control input-lg" id="nome" placeholder="Nome" value="<?php echo $details["nome"];?>" name="nome">
                        </div>

                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" class="form-control input-lg" id="cognome" placeholder="Cognome" value="<?php echo $details["cognome"];?>" name="cognome">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $details["email"];?>" name="email">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" class="form-control input-lg" id="username" placeholder="Username" value="<?php echo $details["username"];?>" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="user-level">Livello utente</label>
                            <select class="form-control input-lg" id="user-level" name="user-level">
                                <option value="0" <?php if ($details["user_level"] == 0){echo "selected";}?>>Amministratore</option>
                                <option value="1"  <?php if ($details["user_level"] == 1){echo "selected";}?>>Standard</option>
                                <option value="2" <?php if ($details["user_level"] == 2){echo "selected";}?>>Guest</option>
                            </select>
                        </div>

                        <?php
                        if($details["last_access"]!="0000-00-00 00:00:00"){
                            $data_accesso = "Il ".date("d/m/Y",strtotime($details["last_access"]));
                            $ora_accesso = " alle ore ".date("H:i:s", strtotime($details["last_access"]));
                        }
                        else{
                            $data_accesso = "Mai loggato fino ad oggi";
                            $ora_accesso="";
                        }
                        ?>
                        <span class="fw-light">Ultimo accesso: </span> <?php echo $data_accesso . $ora_accesso ?><bR>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="user-status" <?php if ($details["user_status"] == 1){echo "checked";}?>> Attivo
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salva</button>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#elimina-utente"><i class="fa fa-trash"></i> Elimina</a>
                        <a href="<?php echo $abs?>users/list/" class="btn btn-primary pull-right" ><i class="fa fa-users"></i> Elenco utenti</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- modale eliminazione -->
<div class="modal fade" id="elimina-utente" tabindex="-1" role="dialog" aria-labelledby="elimina-utente">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center tc-danger fw-black" id="elimina-utente">ATTENZIONE!</h4>
            </div>
            <div class="modal-body">
                <h3 class="fw-light ff-raleway text-center">Si è sicuri di voler eliminare questo utente?</h3>
                <p class="text-center ff-raleway fw-light">Procedendo tutti i dati verranno persi e non sarà possibile recuperarli.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a href="<?php echo $abs?>users/delete/<?php echo $id;?>" class="btn btn-success">Procedi con l'eliminazione</a>
            </div>
        </div>
    </div>
</div>