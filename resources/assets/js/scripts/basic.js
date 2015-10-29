$(function(){

    $("#following-btn").hover(function(){
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-danger');
            $(this).text('Leave');
    } ,
        function(){
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
            $(this).text('Joined');
    });
});