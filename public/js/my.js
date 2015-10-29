var elem = document.querySelector('.js-switch');
var switchery = new Switchery(elem, { size: 'small' });

$(document).ready(function() {
    $(".single-university-selector").select2({
        placeholder: 'Please select your university..',
        tokenSeparators: [',', ' ','    ']
    });
    $(".single-course-selector").select2({
        placeholder: 'Please select your course...',
        tokenSeparators: [',', ' ','    ']
    });
    $(".single-year-selector").select2({
        placeholder: 'Please select the year you joined the univeristy...',
        tokenSeparators: [',', ' ','    ']
    });
    $(".single-intake-selector").select2({
        placeholder: 'Please select your intake...',
        tokenSeparators: [',', ' ','    ']
    });

    $(".single-group-selector").select2({
        placeholder: 'Select group to share to...',
        tokenSeparators: [',', ' ','    ']
    });

    $(".single-group-filter").select2({
        placeholder: 'Select group to filter by',
        tokenSeparators: [',', ' ','    ']
    });

    $(".single-institution-select").select2({
        placeholder: 'Select your institutions.',
        tokenSeparators: [',', ' ','    ']
    });

    $(".topic-selector").select2({
        placeholder: 'Select or create a topic...',
        tags: true,
        tokenSeparators: [' ']
    });
});
$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});
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
//# sourceMappingURL=my.js.map
