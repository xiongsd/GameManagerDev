<?php

use yii\helpers\Url;
use common\models\UrlUtils;

?>
<script type="text/javascript">
  gameApp.config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider,$httpProvider) {
      $httpProvider.defaults.cache = false;
      $ionicConfigProvider.tabs.position('bottom');
      $stateProvider
        .state('tabs', {
          url: "/tab",
          abstract: true,
          templateUrl: "<?=Url::toRoute('tabs/create-tabs')?>",
        })
        .state('tabs.pay', {
          url: "/pay",
          views: {
            'pay-tab': {
              templateUrl: "<?=Url::toRoute('tabs/pay')?>",
		      controller: 'PayTabCtrl'
            }
          }
        })
		.state('tabs.home', {
          url: "/home",
          views: {
            'home-tab': {
              templateUrl: "<?=Url::toRoute('tabs/home')?>",
		      controller: 'HomeTabCtrl'
            }
          }
        })
        .state('tabs.rank', {
          url: "/rank",
          views: {
            'rank-tab': {
              templateUrl: "<?=Url::toRoute('tabs/rank')?>",
              controller: 'RankTabCtrl'
            }
          }
        })
        .state('tabs.trade', {
          url: "/trade",
          views: {
            'trade-tab': {
              templateUrl: "<?=Url::toRoute('tabs/trade')?>",
              controller: 'TradeTabCtrl'
            }
          }
        })
        .state('tabs.tradeitems', {
          url: "/tradeitems",
          views: {
            'trade-tab': {
              templateUrl: "<?=Url::toRoute('trade/view-trade-items')?>",
              controller: 'TradeItemsCtrl'
            }
          }
        })
        .state('tabs.profile', {
          url: "/profile",
          views: {
            'profile-tab': {
              templateUrl: "<?=Url::toRoute('tabs/profile')?>",
              controller: 'ProfileTabCtrl'
            }
          }
        });
        $urlRouterProvider.otherwise("/tab/profile");
    })
	.controller('HomeTabCtrl', function($scope,$http) {


		$scope.init = function(){
			
          $scope.loadAgentCnt();
        };

		$scope.loadAgentCnt = function(){
			$http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['utils/get-agent-count']);?>",
            }).success(function(data) {
                   if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }else{

					   $scope.agentCnt = data;
				   
				   
				   }
            });
          
        };

		$scope.reloadAgentCnt = function(){
			$scope.loadAgentCnt();
			$scope.$broadcast("scroll.refreshComplete");



		};








	})
    .controller('ProfileTabCtrl', function($scope,$http) {
        $scope.accountinfo = {};
        $scope.loadProfileInfo = function(){
            $http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['user/get-account-info']);?>",
            }).success(function(data) {
                   if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }
				   
                   $scope.accountinfo = data;           
            });
        };
        $scope.reloadProfileInfo = function(){
           $scope.loadProfileInfo();
        }
        $scope.refreshProfileInfo = function(){
           $scope.loadProfileInfo();
           $scope.$broadcast("scroll.refreshComplete");

        }
    })
    .controller('RankTabCtrl', function($scope,$http,$state,$ionicLoading) {

        $scope.btnGroup = [
          {'name':'本日','url':'<?=UrlUtils::createUrl(['utils/get-today-rechange'])?>'},
          {'name':'本月','url':'<?=UrlUtils::createUrl(['utils/get-month-rechange'])?>'},
          {'name':'上月','url':'<?=UrlUtils::createUrl(['utils/get-prevmonth-rechange'])?>'},
          {'name':'累计','url':'<?=UrlUtils::createUrl(['utils/get-all-rechange'])?>'},
        ];
        $scope.page = 1;
        $scope.rankRows = [];
        $scope.btnIdx = 0;
        $scope.currentUrl = '<?=UrlUtils::createUrl(['utils/get-today-rechange'])?>';
        $scope.btnClick = function(i,data){
          $scope.btnIdx = i;
          if(data.url == $scope.currentUrl)
            return;
          $scope.rankRows = [];
          $scope.page = 1;
          $scope.currentUrl = data.url;
          $scope.loadRankList();

        };
		 $scope.init = function(){
          $scope.loadRankList();
        };
        $scope.loadMoreRank = function(){
          $scope.page++;
          $scope.loadRankList();


        };
        $scope.loadRankList = function(){
			$ionicLoading.show({
			  template: '加载...'
			});
          $http({
              method: 'GET',
              url:$scope.currentUrl,
              params: {'page':$scope.page},
          }).success(function(data) {
				  
				  $ionicLoading.hide();
				  $scope.rankRows = [];

          	                             if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }
            for(var i=0,l=data.length;i<l;i++){
                $scope.rankRows.push(data[i]);
            }
			
            if(data.length<10){
                $scope.hasMoreData = false;
              }else{
                $scope.hasMoreData = true;
              }
			   
            $scope.$broadcast('scroll.infiniteScrollComplete');  

          });


        };
        $scope.goBack = function(){       
          $state.go('tabs.profile');
        };


    })
    .controller('TradeTabCtrl',function($scope,$state,$ionicLoading,$http,$ionicPopup,$ionicModal,$timeout,ionicDatePicker) {
        $scope.accountInfo = {};
       
        $scope.sendData = {
          'target_actor_id' : '',
          'card_count'      : 0
        };

        $scope.sendToast = {
          'show' : false,
          'info' : '赠送成功'
        };   
        $scope.loadAccountInfo = function(){
          $http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['user/get-account-info']);?>",
          }).success(function(data) {
				 
                   if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }
              $scope.accountInfo = data;
            // console.log(data);
          });
        };
        $scope.init = function(){
          $scope.loadAccountInfo();
        };
        $scope.goBack = function(){       
          $state.go('tabs.profile');
        };
       
        $scope.send = function(){
			var target_actor_id = $scope.sendData.target_actor_id;
			  var card_count = $scope.sendData.card_count;
			  if(target_actor_id.length == 0){
				  $scope.sendToast.show = true;
				  $scope.sendToast.info = '游戏ID不能为空';
				  $timeout(function(){
					$scope.sendToast.show = false;
				   },500);
				  return;
			  }
			  var reg = /^[0-9]*[1-9][0-9]*$/;
			  if(!reg.test(card_count)){
				  $scope.sendToast.show = true;
				  $scope.sendToast.info = '数量不合法';
				  $timeout(function(){
					$scope.sendToast.show = false;
				   },500);
				  return;
			  };
          
          var confirmPopup = $ionicPopup.confirm({
			   title: '确认框',
			   template: '您是否确认赠送给'+$scope.sendData.target_actor_id+'玩家?',
				 buttons: [
				  { text: '取消' },
				  {
					text: '<b>确定</b>',
					type: 'button-balanced',
					onTap: function(e) {
						$http({
				  method: 'GET',
				  params: {'target_actor_id':target_actor_id,'card_count':card_count},
				  url:"<?=UrlUtils::createUrl(['trade/card-rollout']);?>"
			  }).success(function(data) {
					  if(data.retCode == 1){
							alert("请求超时");
							return;
					   }else if(data.retCode == 2){
							alert(data.retMsg);
							return;
					   }
				  $scope.accountInfo.cardcount = data.cardcount;
				  $scope.sendToast.show = true;
				  $scope.sendToast.info = '赠送成功';
				  $timeout(function(){
					$scope.sendToast.show = false;
				   },3000);
			  });
					  
					}
				  }
				]
			 });



          

        };


    })
    .controller('PayTabCtrl', function($scope,$http) {

		$scope.mallItems = [];
		$scope.selMallItem = {};
		$scope.init = function(){
			$http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['trade/get-mall-items']);?>",
          }).success(function(data) {				 
                   if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }else{
					   for(var i=0,l=data.length;i<l;i++){
							$scope.mallItems.push(data[i]);
					   }

				   }

          });
		 
        };
		$scope.selectMallItem = {};
		$scope.selectMallItem = function(data,index){
			$scope.selMallItem.id = data.id;
			$scope.selMallItem.cardcount = data.cardcount;
			$scope.selMallItem.money = data.money;
			$scope.selMallItem.desc = data.desc;
			$scope.selectIndex = index;
		}
		$scope.pay = function(){

			$http({
			  method: 'GET',
			  params: {'id':$scope.selMallItem.id,'cardcount':$scope.selMallItem.cardcount,'money':$scope.selMallItem.money,'desc':$scope.selMallItem.desc},
			  url:"<?=UrlUtils::createUrl(['trade/pay-handler']);?>"
		    }).success(function(r) {
				if(r.retCode == 1){
                        alert("请求超时");
                        return;
                }else if(r.retCode == 2){
					    alert(r.msg);

                        return;
              }

			  if(typeof(r) === 'string'){
					r = JSON.parse(r);
				}
				
				if(r.status === 500){
				   alert(r.msg);

				}else{

					window.location.href = 'https://pay.swiftpass.cn/pay/jspay?token_id='+r.token_id+'&showwxtitle=1';
				}

          	   
          }).error(function(data,status,headers,config){

			  alert(data);

		  
		  
		  });					  
		};
    })
    .controller('TradeItemsCtrl', function($scope,$state,$http) {
              //转出
        $scope.pageNum = 1;
        $scope.sendItems = [];
        $scope.hasMoreData = true;
        //转入
        $scope.pageNum2 = 1;
        $scope.receviceItems = [];
        $scope.hasMoreData2 = true; 
        $scope.init = function(){
           $scope.loadReceviceItems();
           $scope.loadSendItems();
        };
        $scope.btnIdx =0;
        $scope.isRollOut = true;
        $scope.isRollIn = false;

        $scope.initTradeItems = function(){
          $scope.loadReceviceItems();
          $scope.loadSendItems();

        }

        $scope.btnGroup = [
          {'name':'转出'},
          {'name':'转入'}
        ];

        $scope.goTrade = function(){
          $state.go('tabs.trade');
        };
        $scope.goBack = function(){       
          $state.go('tabs.profile');
        };
        $scope.btnClick = function(i){
          $scope.btnIdx = i;
          if(i==0){
            $scope.isRollOut = true;
            $scope.isRollIn = false;
          }else{
            $scope.isRollOut = false;
            $scope.isRollIn = true;
          }
        };
        $scope.loadReceviceItems = function(){
          $http({
              method: 'GET',
              params: {'page':$scope.pageNum2},
              url:"<?=UrlUtils::createUrl(['trade/retrive-receive-card-record']);?>"
          }).success(function(data) {
                  alert(JSON.Stringify(data));
          	       if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }
              for(var i=0,l=data.length;i<l;i++){
                $scope.receviceItems.push(data[i]);
              }
              if(data.length<10){
                $scope.hasMoreData2 = false;
              }else{
                $scope.hasMoreData2 = true;
              }
              $scope.$broadcast('scroll.infiniteScrollComplete');  

          });


        };
        $scope.loadSendItems = function(){

          $http({
              method: 'GET',
              params: {'page':$scope.pageNum},
              url:"<?=UrlUtils::createUrl(['trade/retrive-sendcard-record']);?>"
          }).success(function(data) {

          	 if(data.retCode == 1){
                        alert("请求超时");
                        return;
                   }else if(data.retCode == 2){
                   		alert(data.retMsg);
                        return;
                   }
            for(var i=0,l=data.length;i<l;i++){
              $scope.sendItems.push(data[i]);
            }
            if(data.length<10){
              $scope.hasMoreData = false;
            }else{
              $scope.hasMoreData = true;
            }
           $scope.$broadcast('scroll.infiniteScrollComplete');  

          });
        $scope.loadSendMore = function(){
          $scope.pageNum++;
          $scope.loadSendItems();
        };
        $scope.loadReceviceMore = function(){
          $scope.pageNum2++;
          $scope.loadReceviceItems();
        };

        };
  

    });
  </script>                        
  <ion-nav-view></ion-nav-view>



