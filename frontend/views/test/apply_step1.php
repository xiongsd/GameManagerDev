<?php
use common\models\UrlUtils;


?>
<script type="text/javascript">
gameApp.controller('Ctrl', function($scope,$http) {
      $scope.selectedGame = '';
      $scope.prevGame = '';
      $scope.gameList = [
        {'gameid':1,'gamename':'抚州麻将','desc':'地方特色麻将','checked':false,'image':'images/ICON.png','chkimage':'images/uncheck.png'},
        {'gameid':2,'gamename':'南昌麻将','desc':'地方特色麻将','checked':false,'image':'images/ICON.png','chkimage':'images/uncheck.png'}
      ];
      $scope.onClick = function($event,game){
          if (!$scope.selectedGame){
            $scope.selectedGame = game;
            $event.target.src = "<?='images/check.png'?>";
            $scope.prevGame = $event.target;
          }else{
            if ($scope.selectedGame !== game){ 
              $scope.prevGame.src = 'images/uncheck.png';
              $scope.selectedGame = game;             
              $event.target.src = "<?='images/check.png'?>";
              $scope.prevGame = $event.target;
            } 
          }

      };
      $scope.next = function(){
        
        if (!$scope.selectedGame){
          alert("请选择一个游戏项目！")
          return;
        }
        var selectedGameId = $scope.selectedGame.gameid;
        $http({
          method: 'GET',
          url:"<?=UrlUtils::createUrl(['apply/go-apply-step2']);?>",
                    params:{gameid:selectedGameId}
        }).success(function(data, status, headers, config) {
          var json = data;
          window.location  = "<?=UrlUtils::createUrl(['apply/go-apply-step2']);?>";
        }).error(function(data, status, headers, config){
        
        });
      }
    });

</script>
<ion-header-bar align-title="center" class="bar-dark">
  <div class="buttons">
    <button class="button  ion-ios-arrow-back" ng-click="goBack()">返回</button>
  </div>
  <h1 class="title"><?='申请与查询'?></h1>
    <button class="button button-icon icon ion-navicon" ng-click="share()"></button>
  </div>
</ion-header-bar>
<ion-content ng-controller="Ctrl">
  <div class="apply_step1"></div>
  <div class="tips"><span>请选择申请以下一项游戏项目(单选)</span></div>
  <div class="list">
    <div class="item item-avatar" ng-repeat="x in gameList">
        <img  ng-src="{{ x.image }}" width="50px" height="50px">
        <h2 style="color:#49D2F9;font-size:15pt;font-weight:bold;">{{ x.gamename }}</h2>
        <p style="color:#CCC">{{ x.desc }}</p>
        <img class="selected" ng-click="onClick($event,x)" ng-src="{{ x.chkimage }}" width="25px" height="25px" style="line-height:20px;float:right;margin-top:-35px">
    </div>
  </div>

</ion-content>
<ion-footer-bar  class="bar-stable">
  <div class="btn-next" ng-click="next()"></div>
</ion-footer-bar> 