<?php

use yii\helpers\Url;
use common\models\UrlUtils;

?>
<script type="text/javascript">
  angular.module('GameApp', ['ionic'])
 .config(function($stateProvider, $urlRouterProvider) {

      $stateProvider
        .state('tabs', {
          url: "/tab",
          abstract: true,
          templateUrl: "templates/tabs.html"
        })
        .state('tabs.home', {
          url: "/home",
          views: {
            'home-tab': {
              templateUrl: "<?=Url::toRoute('test/home')?>",
              controller: 'HomeTabCtrl'
            }
          }
        })
        .state('tabs.rank', {
          url: "/rank",
          views: {
            'rank-tab': {
              templateUrl: "<?=Url::toRoute('test/rank')?>",
              controller: 'RankTabCtrl'
            }
          }
        })
        .state('tabs.donate', {
          url: "/donate",
          views: {
            'donate-tab': {
              templateUrl: "<?=Url::toRoute('test/donate')?>",
              controller: 'DonateTabCtrl'
            }
          }
        })
                .state('tabs.profile', {
          url: "/profile",
          views: {
            'profile-tab': {
              templateUrl: "<?=Url::toRoute('test/profile')?>",
              controller: 'ProfileTabCtrl'
            }
          }
        });


       $urlRouterProvider.otherwise("/tab/home");

    })

    .controller('HomeTabCtrl', function($scope) {
        $scope.avatar = "images/ICON.PNG"
    })
    .controller('RankTabCtrl', function($scope) {
        $scope.avatar = "images/ICON.PNG"
    })
     .controller('DonateTabCtrl', function($scope) {
        $scope.avatar = "images/ICON.PNG"
    })
          .controller('ProfileTabCtrl', function($scope) {
        $scope.avatar = "images/ICON.PNG"
    });
    </script>
  
    <ion-nav-bar class="bar-dark">
      <ion-nav-back-button>
      </ion-nav-back-button>
    </ion-nav-bar>
             
    <ion-nav-view></ion-nav-view>


    <script id="templates/tabs.html" type="text/ng-template">
      <ion-tabs class="tabs-icon-top tabs-stable ">

        <ion-tab title="主页" icon="ion-home" href="#/tab/home">
          <ion-nav-view name="home-tab"></ion-nav-view>
        </ion-tab>
        <ion-tab title="业绩排名" icon="ion-home" href="#/tab/rank">
          <ion-nav-view name="rank-tab"></ion-nav-view>
        </ion-tab>
        <ion-tab title="房卡受赠" icon="ion-home" href="#/tab/donate">
          <ion-nav-view name="donate-tab"></ion-nav-view>
        </ion-tab>
        <ion-tab title="我的" icon="ion-home" href="#/tab/profile">
          <ion-nav-view name="profile-tab"></ion-nav-view>
        </ion-tab>
      </ion-tabs>
    </script>

