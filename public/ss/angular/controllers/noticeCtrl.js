var noticeModule = angular.module('noticeModule', []);

    noticeModule.controller('NoticeCtrl', ['$scope', function($scope){

        $scope.creating = false;

        $scope.notices = [
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            },
            {
                date: '12:03:28 12-04-2014',
                title: 'Long established fact',
                body: 'The years, sometimes by accident, sometimes on purpose (injected humour and the like).'
            }



        ];

        $scope.toggleCreationForm = function()
        {
          $scope.creating = !$scope.creating;
        }

    }]);
