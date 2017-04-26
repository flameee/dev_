/**
 * Created by Atlantide on 10/04/2017.
 */
$(".user-list-clear").click(function () {

    if(confirm("Svuotare l'elenco degli utenti?")){
        window.location.href='http://localhost/dev/users/delete/all';
    }
});

$("#order-submit").click(function () {
   var orderBy = $("#order-by").val();
   var orderMethod=$("#order-method").val();
   if(orderBy && orderMethod){
       window.location.href='http://localhost/dev/users/list/'+orderBy+"/"+orderMethod;
   }
});

$(document).ready(function () {
   var dataTable = $("#users-list-ajax").DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": {
           url:"http://localhost/dev/ajax/user-list-request.php",
           type: "post"
       }
   });

    $(".quick-change-status").click(function () {
        var dataStatus=$(this).attr("data-status");
        var dataID=$(this).attr("data-id");
        var dataTable=$(this).attr("data-table");
        var dataControlField=$(this).attr("data-control-field");
        $.ajax({
            type: "post",
            url: "ajax/requests.php",
            data: "q=change-status&status="+dataStatus+"&id="+dataID+"&table="+dataTable+"&control-field="+dataControlField,
            success: function(data){
                alert("Cambiato");
            }
        });
    });
});

