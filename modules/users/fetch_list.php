<?php
/**
 * Created by Flame
 * il fiore perfetto è raro se si trascorresse la vita a cercalo non sarebbe una vita sprecata
 */
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    include("config.inc.php");  //include config file
    //Get page number from Ajax POST
    if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }
    $add_filter=$_GET["add_filter"];
    if($add_filter!=""){
        $conditions="
        WHERE nome LIKE '%$add_filter%' OR cognome LIKE '%$add_filter%' OR codice_fiscale LIKE '%$add_filter%' OR email LIKE '%$add_filter%' 
        ";
    }
    //get total number of records from database for paginatore
    $results = $mysqli->query("SELECT COUNT(*) FROM users");
    $get_total_rows = $results->fetch_row(); //hold total records in variable
    //break records into pages
    $total_pages = ceil($get_total_rows[0]/$item_per_page);

    //get starting position to fetch the records
    $page_position = (($page_number-1) * $item_per_page);


    //Limit our results within a specified range.
    $results = $mysqli->prepare("
      SELECT id, username, password
      FROM users  
      
      ORDER BY username ASC LIMIT $page_position, $item_per_page
      ");
    $results->execute(); //Execute prepared Query
    $results->bind_result($id, $username, $password); //bind variables to prepared statement

    //Display records fetched from database.
    echo "
    <table class='table table-hover table-bordered'>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Codice fiscale</th>
            <th>Email</th>
            <th>Scheda cliente</th>
            
        </tr>
        </thead>
        <tbody>        
    ";
    while($results->fetch()){ //fetch values
        echo "
            <tr>
                <td>$nome</td>
                <td>$cognome</td>
                <td>$codice_fiscale</td>            
                <td>$email</td>            
                <td class='text-center'><a href='dettagli-cliente.php?userID=$id' target='_blank'><i class='fa fa-pencil'></i></a></td>            
            </tr>
        ";
    }
    echo "
        </tbody>
    </table>
    ";
    echo '<div align="center" id="wrapper-paginatore">';
    /* We call the paginatore function here to generate paginatore link for us.
    As you can see I have passed several parameters to the function. */
    echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
    echo '</div>';
    exit;
}
################ paginatore #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $paginatore = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $paginatore .= '<ul class="paginatore">';

        $right_links    = $current_page + 3;
        $previous       = $current_page - 1; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link

        if($current_page > 1){
            $previous_link = ($previous<=0)?1:$previous;
            $paginatore .= '<li class="first" data-page="1"><a href="#" data-page="1" title="First">Inizio</a></li>'; //first link
            $paginatore .= '<li data-page="'.$previous_link.'"><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
            for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                if($i > 0){
                    $paginatore .= '<li data-page="'.$i.'"><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                }
            }
            $first_link = false; //set first link to false
        }

        if($first_link){ //if current active page is first link
            $paginatore .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $paginatore .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $paginatore .= '<li class="active">'.$current_page.'</li>';
        }

        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $paginatore .= '<li data-page="'.$i.'"><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
            $next_link = ($i > $total_pages) ? $total_pages : $i;
            $paginatore .= '<li data-page="'.$next.'"><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>'; //next link
            $paginatore .= '<li class="last" data-page="'.$total_pages.'"><a href="#" data-page="'.$total_pages.'" title="Last">Fine</a></li>'; //last link
        }

        $paginatore .= '</ul>';
    }
    return $paginatore; //return paginatore links
}