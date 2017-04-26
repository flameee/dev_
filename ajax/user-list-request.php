<?php
//«il fiore perfetto è una cosa rara, se si trascorresse la vita a cercarne uno, non sarebbe una vita sprecata»
$servername = "localhost";
$username = "root";
$password = "flamenco1984";
$dbname = "dev_";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* Database connection end */
// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;
$columns = array(
// datatable column index  => database column name
    0 =>'id',
    1 => 'username',
    2=> "nome",
    3=> "cognome",
    4=> "email",
    5=> "last_access",
    6=> "user_level",
    7=> "user_status",
    8=> "id"
);
// getting total number records without any search
$sql = "SELECT id, username,  nome, cognome, email, last_access, user_level, user_status ";
$sql.=" FROM users WHERE user_level!='666'";
$query=mysqli_query($conn, $sql) or die("user-list-request.php: get users");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT id, username, password, nome, cognome, email, last_access, user_level, user_status ";
    $sql.=" FROM users";
    $sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nome LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cognome LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR last_access LIKE '".$requestData['search']['value']."%' ";


    $query=mysqli_query($conn, $sql) or die("user-list-request.php: get users");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("user-list-request.php: get employees"); // again run query with limit

} else {
    $sql = "SELECT id, username,  nome, cognome, email, last_access, user_level, user_status ";
    $sql.=" FROM users WHERE user_level!='666'";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get users");

}
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $user_level=$row["user_level"];
    if($user_level==0){
        $user_level="Amministratore";
    }
    elseif($user_level==1){
        $user_level="Standard";
    }
    elseif($user_level==2){
        $user_level="Guest";
    }

    if($row["user_status"]===1){
        $user_status="<i class='fa fa-check-circle-o tc-main quick-change-status' data-status='1' data-id='".$row['id']."' data-table='users' data-control-field='user_status'></i>";
    }
    else{
        $user_status="<i class='fa fa-times-circle-o tc-danger quick-change-status' data-status='0' data-id='".$row['id']."' data-table='users' data-control-field='user_status'></i>";
    }
    $nestedData=array();
    $nestedData[] = $row["id"];
    $nestedData[] = $row["username"];

    $nestedData[] = $row["nome"];
    $nestedData[] = $row["cognome"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["last_access"];
    $nestedData[] = $user_level;
    $nestedData[] = $user_status;
    $nestedData[] = "<a href='".$abs."/users/details/".$row['id']."' target='_blank'><i class='fa fa-search'></i> </a>";

    $data[] = $nestedData;
}
$json_data = array(
    "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
    "recordsTotal"    => intval( $totalData ),  // total number of records
    "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data"            => $data   // total data array
);
echo json_encode($json_data);  // send data as json format