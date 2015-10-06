angular.module('skoolspace', ['noticeModule', 'groupModule'])

    .config([function(){
        console.log('skoolspace configured');
    }])

    .run([function(){
        console.log('skoolspace running');
    }]);