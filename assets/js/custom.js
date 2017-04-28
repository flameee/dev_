/**
 * Created by Atlantide on 10/04/2017.
 */
$(".user-list-clear").click(function () {

    if(confirm("Svuotare l'elenco degli utenti?")){
        window.location.href='http://localhost/dev_/users/delete/all';
    }
});

$("#order-submit").click(function () {
   var orderBy = $("#order-by").val();
   var orderMethod=$("#order-method").val();
   if(orderBy && orderMethod){
       window.location.href='http://localhost/dev_/users/list/'+orderBy+"/"+orderMethod;
   }
});
$(".quick-change-status").click(function () {
    var dataID=$(this).attr("data-id");
    var dataTable=$(this).attr("data-table");
    var dataControlField=$(this).attr("data-control-field");
    var dataStatus=$(this).attr("data-status");
    alert(dataStatus+" "+dataID+" "+ dataTable+" "+dataControlField);
    //quickStatusChange(dataStatus, dataID,dataTable, dataControlField);
});
function quickStatusChange(dataStatus, dataID, dataTable, dataControlField) {
    //console.log("clicked");
    var dataStatusCheck=dataStatus;
    /*var dataID=$(this).attr("data-id");
    var dataTable=$(this).attr("data-table");
    var dataControlField=$(this).attr("data-control-field");*/
    alert(dataStatus+" "+dataID+" "+ dataTable+" "+dataControlField);
    $.ajax({
        type: "post",
        url: "http://localhost/dev_/ajax/requests.php",
        data: "q=change-status&status="+dataStatus+"&id="+dataID+"&table="+dataTable+"&control-field="+dataControlField,
        success: function(data){
            alert(dataStatusCheck);
            if(data){
                if(dataStatusCheck==="1")
                    $("#"+dataID).removeClass("tc-danger").addClass("tc-main");
                else
                    $("#"+dataID).removeClass("tc-main").addClass("tc-danger");
            }
        }
    });
}
$(document).ready(function () {
   var dataTable = $("#users-list-ajax").DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": {
           url:"http://localhost/dev_/ajax/user-list-request.php",
           type: "post"
       }
   });

});

