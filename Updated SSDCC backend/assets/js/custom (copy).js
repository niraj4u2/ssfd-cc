 
 $(document).ready( function () {
     var table = $('#dataTable').DataTable({
        pageLength : 20,
        searchable: true,
        lengthMenu: [[5, 10, 20,50, -1], [5, 10, 20,50, 'Todos']]
      })
} );

// brand methods
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
})

function addCity(id = 0){
    $.get(BASE_URL+'/city/add/'+id , {} , function(html){
        $("#commonModalBody").html(html);
        $("#commonModal").modal('show');
    });
}

$(document).on('submit' , '#cityForm' , function(){
    var formdata = $(this).serialize();
    $.ajax({
        type:"post",
        data:formdata,
        url:BASE_URL+'/city/save',
        success:function(res){
            if(res.status=="success"){
                swal({
                    title: "Success!",
                    text: "Data Saved!",
                    icon: "success"
                }).then(function() {
                    window.location = BASE_URL+"/city";
                });
            }
            else{
                swal('Error' , res.msg , 'error');
            }
        },

        error: function (reject) {
            if( reject.status === 422 ) {
                var error = $.parseJSON(reject.responseText);
                $.each(error.errors , (key , val)=>{
                    $("#"+key+"_error").html(val[0]);
                });
            }
        }
    });
});

function addService(id = 0){
    $.get(BASE_URL+'/service/add/'+id , {} , function(html){
        $("#commonModalBody").html(html);
        $("#commonModal").modal('show');
    });
}

$(document).on('submit' , '#serviceForm' , function(){
    var formdata = $(this).serialize();
    $.ajax({
        type:"post",
        data:formdata,
        url:BASE_URL+'/service/save',
        success:function(res){
            if(res.status=="success"){
                swal({
                    title: "Success!",
                    text: "Data Saved!",
                    icon: "success"
                }).then(function() {
                    window.location = BASE_URL+"/service";
                });
            }
            else{
                swal('Error' , res.msg , 'error');
            }
        },

        error: function (reject) {
            if( reject.status === 422 ) {
                var error = $.parseJSON(reject.responseText);
                $.each(error.errors , (key , val)=>{
                    $("#"+key+"_error").html(val[0]);
                });
            }
        }
    });
});

function viewMessage(id = 0){
    $.get(BASE_URL+'/lead/message/'+id , {} , function(html){
        $("#commonModalBody").html(html);
        $("#commonModal").modal('show');
    });
}
 
$(document).on('submit' , '#leadMessage' , function(){
    var formdata = $(this).serialize();
    $.ajax({
        type:"post",
        data:formdata,
        url:BASE_URL+'/lead/messagesave',
        success:function(res){
            if(res.status=="success"){
                swal({
                    title: "Success!",
                    text: "Data Saved!",
                    icon: "success"
                }).then(function() {
                    window.location = BASE_URL+"/lead";
                });
            }
            else{
                swal('Error' , res.msg , 'error');
            }
        },

        error: function (reject) {
            if( reject.status === 422 ) {
                var error = $.parseJSON(reject.responseText);
                $.each(error.errors , (key , val)=>{
                    $("#"+key+"_error").html(val[0]);
                });
            }
        }
    });
});

