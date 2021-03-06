<?php
use common\models\UrlUtils;

?>
<script type="text/javascript">
    gameApp.controller('registerCtrl', function($scope,$http) {
        $scope.scope = $scope;
        $scope.gameid = "<?=$gameId?>";
		$scope.accountid = "<?=$actorId?>";
        $scope.nickname = "";
		$scope.wxid = "";
        $scope.telephone = "";
        $scope.verfiyCode = "";
		$scope.downTips ="您的微信未绑定游戏!请先下载游戏并登录1次,将自动绑定游戏";
        $scope.init = function(){

           

        };
		$scope.goBack = function(){
			window.location = "<?=UrlUtils::createUrl(['apply/go-apply']);?>"
		};
        $scope.send = function(){

          if(!(/^1[34578]\d{9}$/.test($scope.telephone))){ 
              alert("手机号码有误，请重填");  
              return false; 
          } 
		  $scope.sending = true;
           $http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['apply/send-tel-verify']);?>",
              params: {'telephone':$scope.telephone}
           }).success(function(data) {
			  if(data.flag = 'success'){
				  alert("已发送验证码!");
				  $scope.sending = false;
			  }else{
				   alert("发送失败");
			  }
           });

        };
		$scope.submit = function(){
           $http({
              method: 'GET',
              url:"<?=UrlUtils::createUrl(['apply/register-agent']);?>",
              params: {'accountid':$scope.accountid,'gameid':$scope.gameid,'telephone':$scope.telephone,'nickname':$scope.nickname,'verifytelcode':$scope.verfiyCode,'wxid':$scope.wxid},
           }).success(function(data) {
		      if(data.retCode == 2){
				alert('注册异常');
				alert(data.retMsg);
				return;
			  }else if(data.retCode == 3){
				  alert("验证码错误");

			  }else if(data.retCode == 1){
				  alert(data.retMsg);
				  window.location = "<?=UrlUtils::createUrl(['apply/go-agent-req','gameid'=>$gameId]) ?>";

			  }else{
				  alert('未知异常!');
			  }
			 
           });

        }

      
    });
</script>
<div ng-controller="registerCtrl" ng-init="init()">

  <ion-content>
    <div class="apply_step2"></div>
    <div class="input-title">游戏信息</div>
    <div class="list list-reset" >
      <label class="item item-input item-reset">
        <span class="input-label input-label-reset">游戏ID</span>
		<input type="text"  name="gameid" ng-model="scope.gameid" ng-show="false"/>
        <?php
          if($actorId != null){
	    ?>
             <input type="text" name="actorid" value="<?=$actorId?>" style="color:red" ng-disabled="true"/>
	  </label>
    </div>
    <div class="input-title">个人信息</div>
    <div class="list list-reset" >
      <label class="item item-input item-reset item-bot10">
        <span class="input-label input-label-reset">姓&#12288;名</span>
        <input type="text" name="nickname" ng-model="scope.nickname" />
      </label>
	  <label class="item item-input item-reset item-bot10">
        <span class="input-label input-label-reset">微信号</span>
        <input type="text" name="wxid" ng-model="scope.wxid" />
      </label>
      <div class="item item-input item-reset item-bot10" style="width:75%;float:left" >
        <span class="input-label input-label-reset">手机号</span>
        <input type="text" ng-model="scope.telephone"/>
      </div>
	  <button class="button button-small" style="float:left;height:40px;background:#009393;color:white" ng-click="send()">发送验证码</button>
      <label class="item item-input item-reset item-bot10"style="clear:both">
        <span class="input-label input-label-reset">验证码</span>
        <input type="text" name="verfiyCode"  ng-disabled="scope.sending" ng-model="scope.verfiyCode" />
      </label>
    </div>
	 </ion-content>
  <ion-footer-bar  class="bar-stable">
    <div class="btn-submit" ng-click="submit()"></div>
  </ion-footer-bar> 
</div>
		<?php
          }else{
		?>
            <textarea name="actorid" style="color:green;font-size:9pt" ng-model="scope.downTips" ng-disabled="true"></textarea>
			</label>
    </div>
    <div class="input-title">个人信息</div>
    <div class="list list-reset" >
      <label class="item item-input item-reset item-bot10">
        <span class="input-label input-label-reset">姓&#12288;名</span>
        <input type="text" name="nickname" ng-model="scope.nickname" ng-disabled="true"/>
      </label>
	  <label class="item item-input item-reset item-bot10">
        <span class="input-label input-label-reset">微信号</span>
        <input type="text" name="wxid" ng-model="scope.wxid" ng-disabled="true"/>
      </label>
      <div class="item item-input item-reset item-bot10" style="width:75%;float:left" >
        <span class="input-label input-label-reset">手机号</span>
        <input type="text" ng-model="scope.telephone" ng-disabled="true"/>
      </div>
	  <button class="button button-small" ng-disabled="true" style="float:left;margin-left:5px;height:40px;background:#009393;color:white" ng-click="send()">发送验证码</button>
      <label class="item item-input item-reset item-bot10" style="clear:both">
        <span class="input-label input-label-reset">验证码</span>
        <input type="text" name="verfiyCode"  ng-disabled="true" ng-model="scope.verfiyCode" />
      </label>
    </div>
	</ion-content>
		<?php
          }
		?>        
      
 