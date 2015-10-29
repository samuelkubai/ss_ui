var tour = {
    id: "welcome_tour",
    steps: [
        {
            title: "Welcome to skoolspace",
            content: "We have a few awesome features I would like to show you, Let's start?",
            target: "#navbar-brand",
            placement: "bottom",
            onNext: function() {
                $("#creatorSpace").fadeIn("normal");
                $("#createNoticeForm").hide();
                $("#uploadFilesForm").fadeIn("normal");
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "File sharing",
            content: "You can upload files to skoolspace by selecting the file(s), creating a topic for the file(s) and selecting the group the file(s)" +
            " should be shared to.",
            target: "#uploadFilesForm",
            placement: "right",
            onNext: function() {
                $("#uploadFilesForm").hide();
                $("#createNoticeForm").fadeIn("normal");
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Pin Notice",
            content: "You can pin a notice to a specific group, by filling in the notice title and message and selecting the group the notice is for, " +
            "after which every member will be notified accordingly of it.",
            target: "#createNoticeForm",
            placement: "right",
            onNext: function() {
                $("#createNoticeForm").fadeOut("normal");
                $("#creatorSpace").hide();
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Activity feed",
            content: "From here you can view all the activities of all the groups you have joined.",
            target: "#homeActivities",
            placement: "top",
            multipage: true,
            onNext: function() {
                window.location = "backpack"
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Backpack",
            content: "The backpack is your own personal storage where all your files " +
            "are stored for future use or to share to other groups.",
            target: "#backpackNav",
            placement: "right",
            multipage: true,
            onNext: function() {
                window.location = "noticeboard"
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Noticeboard",
            content: "Here you can view your notices and pin new ones to other groups of your choice.",
            target: "#noticeboardNav",
            placement: "right",
            multipage: true,
            onNext: function() {
                window.location = "/"
            },
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "...lastly",
            content: "...those were only some of the skoolspace features, enjoy skoolspace and take part in its activities." +
            " We would appreciate your feedback through info@skoolspace.com",
            target: "#navbar-brand",
            placement: "bottom",
            showNextButton: 'true',
            showCloseButton: 'true'
        }
    ],
    onEnd: function() {
        setCookie("toured", "toured");

    },
    onClose: function() {
        setCookie("toured", "toured");

    }
};

function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';path=/' + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}



// Initialize tour if it's the user's first time
if (!getCookie("toured")) {
    hopscotch.startTour(tour);
}
