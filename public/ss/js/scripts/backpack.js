$(function(){
    $('.file-box').each(function() {
        animationHover(this, 'pulse');
    });

    $("#bp-showFileCreatorBtn").click(function(){
        $("#bp-showFileCreatorBtn").hide();
        $("#uploadFilesForm").fadeIn("normal");
    });
    $("#hideFileCreatorBtn").click(function(){
        $("#uploadFilesForm").hide();
        $("#bp-showFileCreatorBtn").fadeIn("normal");
    });
});