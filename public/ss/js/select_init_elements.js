$(document).ready(function() {


    /* Configuration for the notice group filtering */
    function formatState (state) {
        if (state.id == 0) { return  state.text; }
        var $state = $(
            '<span><img src="/ss/img/' + state.pic + '" class="notice-group-pic" /> ' + state.text + '</span>'
        );
        return $state;
    }
    function formatInsitutions (state) {
        if (state.id == 0) { return  state.text; }
        var $state = $(
            '<span>' + state.name + ' <small class="muted"> - ' + state.slug + '</small></span>'
        );
        return $state;
    }
    var data = [
        { id: 0, text: 'Select a group to share to', value: 1, pic: 'p1.jpg'},
        { id: 1, text: 'bug' , value: 1, pic: 'p3.jpg'},
        { id: 2, text: 'duplicate' , value: 1, pic: 'p2.jpg'},
        { id: 3, text: 'invalid' , value: 1, pic: 'p1.jpg' },
        { id: 4, text: 'wontfix' , value: 1, pic: 'p3.jpg' }
    ];

    var groupFilter = [
        { id: 0, text: 'All groups', value: 1, pic: 'p1.jpg'},
        { id: 1, text: 'bug' , value: 1, pic: 'p3.jpg'},
        { id: 2, text: 'duplicate' , value: 1, pic: 'p2.jpg'},
        { id: 3, text: 'invalid' , value: 1, pic: 'p1.jpg' },
        { id: 4, text: 'wontfix' , value: 1, pic: 'p3.jpg' }
    ];

    $(".modal-group-selector").select2({
        placeholder: 'Select groups to share to...',
        data: data,
        templateResult: formatState
    });

    $(".notice-group-select").select2({
        data: groupFilter,
        templateResult: formatState
    });

    $(".single-institution-select").select2();
});