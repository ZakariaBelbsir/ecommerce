$(document).ready(function(){
    $("#searchbox").keyup(function () {
        $("#searchresult").css("display" , "block");
        var query = $(this).val();
        $.ajax({
            url: 'index.php',
            method: 'POST',
            data:{
                search: 1,
                q: query
            },
            success: function(data){
                $("#searchresult").html(data);
            },
            dataType: "text"
        });
        if(query.length == 0 ){
            $("#searchresult").css("display", "none");
        }
    });
    $(document).on("click", "#searched > li" ,function(){
        $("#searchbox").val($(this).text());
        $("#searchresult").html("");
    });
    // $("#searchresult > li").mouseleave(function () {
    //     var searchedProd = $(this).text();
    // alert("a");
    // });
})
