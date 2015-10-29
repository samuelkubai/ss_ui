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