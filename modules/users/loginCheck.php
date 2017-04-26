<?php

//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
$username=$_POST["loginUsername"];
$password=$_POST["loginPassword"];
$password=crypt($password,'$5$rounds=5000$ilfioreperfetto$');
$_SESSION["loginUsername"]=$username;
$_SESSION["loginPassword"]=$password;
header("location:".$abs."dashboard/index");