<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
?>

<div class="container ">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
            $users=new users();
            if($_POST){
                $add=$users->userAdd();
                if(isset($add))
                    header("location:".$abs."users/details/$add");
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading fw-black"><i class="fa fa-user" aria-hidden="true"></i> Dettagli utente</div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="nome" >Nome</label>
                            <input type="text" class="form-control input-lg" id="nome" placeholder="Nome"  name="nome">
                        </div>

                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" class="form-control input-lg" id="cognome" placeholder="Cognome"  name="cognome">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-lg" id="email" placeholder="Email"  name="email">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" class="form-control input-lg" id="username" placeholder="Username"  name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="user-level">Livello utente</label>
                            <select class="form-control input-lg" id="user-level" name="user-level"required>
                                <option value="">Scegliere un livello...</option>
                                <option value="0" >Amministratore</option>
                                <option value="1"  >Standard</option>
                                <option value="2" >Guest</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="user-status" value="1" > Attivo
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
