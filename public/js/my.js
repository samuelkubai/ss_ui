var elem = document.querySelector('.js-switch');
var switchery = new Switchery(elem, { size: 'small' });

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
    placeholder: 'Select your institutions.'
});

$(".topic-selector").select2({
    placeholder: 'Create or select a topic...',
    tags: true
});

$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});
//# sourceMappingURL=my.js.map
