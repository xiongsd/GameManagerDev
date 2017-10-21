<?php

use yii\helpers\Url;
use common\models\UrlUtils;

?>
<script type="text/javascript">
gameApp.config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider,$httpProvider) {
      $httpProvider.defaults.cache = false;
      $ionicConfigProvider.tabs.position('bottom');
      $ionicConfigProvider.navBar.alignTitle('center');
      $stateProvider
        .state('tabs', {
          url: "/tab",
          abstract: true,
          templateUrl: "templates/tabs.html"
        })
        .state('tabs.home', {
          url: "/home",
          cache:false,
          views: {
            'home-tab': {
              templateUrl: "<?=Url::toRoute('test/home')?>",
              controller: 'HomeTabCtrl'
            }
          }
        })
        .state('tabs.rank', {
          url: "/rank",
          cache:false,
          views: {
            'rank-tab': {
              templateUrl: "<?=Url::toRoute('test/rank')?>",
              controller: 'RankTabCtrl'
            }
          }
        })
        .state('tabs.donate', {
          url: "/donate",
          cache:false,
          views: {
            'donate-tab': {
              templateUrl: "<?=Url::toRoute('test/donate')?>",
              controller: 'DonateTabCtrl'
            }
          }
        })
                .state('tabs.profile', {
          url: "/profile",
          cache:false,
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

    })
    .controller('DonateTabCtrl', function($scope,$ionicModal,$http) {
        $scope.formdata = {
          gameid:"",
          qty:1
        };
        $scope.isSending = false;
        $scope.donateItems = [];
        $scope.acceptItems = [];
        $ionicModal.fromTemplateUrl("<?=Url::toRoute('test/view-donate-items')?>", function(modal) {
          $scope.viewDonateItemsModel = modal;
        }, {
          scope: $scope
        });
        $scope.donate = function(){
           alert();
          
        };
        $scope.viewDonateItems = function(){
          $scope.viewDonateItemsModel.show();

        };
        $scope.closeDonateItems = function(){
          $scope.viewDonateItemsModel.hide();

        };
    })
    .controller('ProfileTabCtrl', function($scope) {

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