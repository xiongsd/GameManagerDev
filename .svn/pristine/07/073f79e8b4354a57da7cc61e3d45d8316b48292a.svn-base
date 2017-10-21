<?php
use common\models\UrlUtils;


?>
<script type="text/javascript">
gameApp.controller('Ctrl', function($scope,$http) {
      $scope.selectedGame = '';
      $scope.prevGame = '';
      $scope.gameList = [
        {'gameid':1,'gamename':'宜黄麻将','desc':'抚州地方特色麻将','checked':false,'image':'images/ICON.png','chkimage':'images/uncheck.png'},
		  {'gameid':2,'gamename':'涡阳麻将','desc':'安微地方特色麻将','checked':false,'image':'images/ICON.png','chkimage':'images/uncheck.png'}
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
        var url = "<?=UrlUtils::createUrl(['apply/go-apply-step2']);?>"+"&gameid="+$scope.selectedGame.gameid;
        window.location  = url;

      };
    });

</script>
<div ng-controller="Ctrl">

<ion-content> 
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
</div>