var app = angular.module("thwordPlay",[]);

app.controller("playController", function($scope) {
    $scope.pages = [
        {
            name: 'start',
            'id': 'content-start',
            active1: true
        },
        {
            name: 'main',
            'id': 'content',
            active1: false
        },
        {
            name: 'post',
            'id': 'content-post',
            active1: false
        },
        {
            name: 'main',
            'id': 'content-stats',
            active1: false
        },
    ];

    $scope.startPlay = function() {
        alert('Let the game begin!')
        $scope.showStart = false;
    };
});