<?php
error_reporting(0);
session_start();
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
$abs="http://localhost/dev_/";

define("_ASSETS_", "/assets/");
define("_CORE_", "/core/");
define("_MODULES_", "/modules/");
require_once "core/tools.php";

//Funzione per lettura delle routes
function getCurrentUri(){
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}
$base_url = getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);
foreach($routes as $route){
    if(trim($route) != '')
        array_push($routes, $route);
}
//Fine funzione lettura routes

$tool=new tools();
if(isset($_SESSION["loginUsername"]) && isset($_SESSION["loginPassword"]))
    $login=$tool->checkLogin($_SESSION["loginUsername"], $_SESSION["loginPassword"]);
//echo $login["password"];
//echo $_SESSION["loginUsername"]." ".$_SESSION["loginPassword"];
//echo "1:".$routes[1]."<bR>2:".$routes[2]."<br>3:".$routes[3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Basic Admin Template</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo $abs?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $abs?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo $abs?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $abs?>assets/DataTables-1.10.13/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php
if($routes[2]!="loginCheck"){
    if (!isset($login) && $routes[2]!="login") {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 mt-50 text-center">
                <div class="alert alert-danger">Prima di poter accedere a questa sezione, effettua il login.</div>
                <a href="<?php echo $abs."users/login";?>" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $abs?>assets/js/bootstrap.min.js"></script>
    </body>
    </html>
        <?php
        exit;
    }
}

