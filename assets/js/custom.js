/**
 * Created by Atlantide on 10/04/2017.
 */


$("#order-submit").click(function () {
   var orderBy = $("#order-by").val();
   var orderMethod=$("#order-method").val();
   if(orderBy && orderMethod){
       window.location.href='http://localhost/dev_/users/list/'+orderBy+"/"+orderMethod;
   }
});

function quickStatusChange(dataStatus, dataID, dataTable, dataControlField) {
    $.ajax({
        type: "post",
        url: "http://localhost/dev_/ajax/requests.php",
        data: "q=change-status&status="+dataStatus+"&id="+dataID+"&table="+dataTable+"&control-field="+dataControlField,
        success: function(data){
            //alert(dataStatus);
            if(data){
                if(dataStatus==true){
                    $("#"+dataID).removeClass("tc-danger").addClass("tc-main");
                }

                else{
                    $("#"+dataID).removeClass("tc-main").addClass("tc-danger");
                }

            }
        }
    });
}

$(document).ready(function () {

    /*$(".user-list-clear").click(function () {

        if(confirm("Svuotare l'elenco degli utenti?")){
            window.location.href='http://localhost/dev_/users/delete/all';
        }
    });*/

   var dataTable = $("#users-list-ajax").DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": {
           url:"http://localhost/dev_/ajax/user-list-request.php",
           type: "post"
       }
   });

});

$(document).on("click", ".quickChangeStatus",function (e) {
    //console.log("Test");
    var dataID=$(this).attr("data-id");
    var dataTable=$(this).attr("data-table");
    var dataControlField=$(this).attr("data-control-field");
    var dataStatus=$(this).attr("data-status");
    //alert(dataStatus+" "+dataID+" "+ dataTable+" "+dataControlField);
    //quickStatusChange(dataStatus, dataID,dataTable, dataControlField);
    $.ajax({
        type: "post",
        url: "http://localhost/dev_/ajax/requests.php",
        data: "q=change-status&status="+dataStatus+"&id="+dataID+"&table="+dataTable+"&control-field="+dataControlField,
        success: function(data){
            //alert(dataStatus);
            if(data){
                if(dataStatus==true){
                    $("#"+dataID).removeClass("tc-danger").addClass("tc-main");
                    $(".quickChangeStatus-"+dataID).attr("data-status", "0");
                }

                else{
                    $("#"+dataID).removeClass("tc-main").addClass("tc-danger");
                    $(".quickChangeStatus-"+dataID).attr("data-status", "1");
                }

            }
        }
    });
});