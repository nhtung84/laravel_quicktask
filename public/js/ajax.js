$(document).ready(function(){
    $("#logout").click( function (e) {
        e.preventDefault();
        var dest_url = "logout";
        $.ajax({
            type:"POST",
            url:dest_url,
            async: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                if(data.success){
                    window.location.href = '/tasks';
                }
            }
        })
    });
})
