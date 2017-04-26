<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
echo $tool->createPassword("flamenco1984");
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form method="post" action="http://localhost/dev/users/loginCheck">
                <div class="form-group">
                    <label for="username" >Username</label>
                    <input type="email" class="form-control input-lg" id="username" placeholder="Username"  name="loginUsername" required>
                </div>
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input type="password" class="form-control input-lg" id="password" placeholder="Username"  name="loginPassword" required>
                </div>
                <button type="submit" class="btn btn-primary fw-black pull-right"><i class="fa fa-sign-in"></i> LOGIN </button>
            </form>
        </div>
    </div>
</div>