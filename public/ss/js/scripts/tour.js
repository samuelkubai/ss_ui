var tour = {
    id: "welcome_tour",
    steps: [
        {
            title: "Welcome to skoolspace",
            content: "We have a lot of  awesome features, and would like to show you some of them, Let's start?",
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
            content: "You can upload files to skoolspace by selecting a file or multiple files, then create or select a topic for the file(s) and if" +
            " you would like to share the files in the process, you would just select the group to share the file to.",
            target: "#uploadFilesForm",
            placement: "right",
            onNext: function() {
                $("#uploadFilesForm").hide();
                $("#createNoticeForm").fadeIn("normal");
            },
            showPrevButton: 'true',
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
            showPrevButton: 'true',
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
                window.location = "groups"
            },
            showPrevButton: 'true',
            showNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "skoolspace Groups",
            content: "You can manage all your groups here and browse through other skoolspace groups from here. " +
            "Feel free to join more groups and contribute with more documents and information.",
            target: "#groupsPage",
            placement: "bottom",
            showPrevButton: 'true',
            wNextButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Create new groups",
            content: "You can create new groups in skoolspace and have your friends join and share documents and information from.",
            target: "#groupCreateButton",
            placement: "left",
            multipage: true,
            onNext: function() {
                window.location = "backpack"
            },
            showNextButton: 'true',
            showPrevButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Backpack",
            content: "The backpack is your own personal storage where all your files are stored." +
            " You can add files from various groups to your backpack for safe keeping and share files from your backpack to other groups.",
            target: "#backpackNav",
            placement: "right",
            multipage: true,
            onNext: function() {
                window.location = "noticeboard"
            },
            showNextButton: 'true',
            showPrevButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "Noticeboard",
            content: "This is your noticeboard where notices for all your groups are pinned. " +
            "From here you can view all your notices and pin new ones to your groups.",
            target: "#noticeboardNav",
            placement: "right",
            multipage: true,
            onNext: function() {
                window.location = "/"
            },
            showNextButton: 'true',
            showPrevButton: 'true',
            showCloseButton: 'true'
        },
        {
            title: "...lastly",
            content: "...those were only some of the skoolspace features, enjoy skoolspace and take part in its activities." +
            " We would appreciate your feedback through info@skoolspace.com",
            target: "#navbar-brand",
            placement: "bottom",
            showNextButton: 'true',
            showPrevButton: 'true',
            showCloseButton: 'true'
        }
    ],
    onEnd: function() {
        $.get("/api/ss/mark/user/old");
    },
    onClose: function() {
        $.get("/api/ss/mark/user/old");
    }
};

//Start Tour
hopscotch.startTour(tour);
