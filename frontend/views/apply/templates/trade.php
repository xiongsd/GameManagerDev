<ion-header-bar class="bar bar-header bar-dark" align-title="center">
    <button class="button button-icon icon  ion-ios-arrow-back" ng-click="goBack()"></button>
 	<ion-title>房卡赠送</ion-title>
</ion-header-bar>
<ion-view>
	<ion-content ng-init="init()">
		<div class="row info_box_list">
		      <div class="col col-25 info_box">
		        <strong>代理姓名</strong>
		        <span>{{accountInfo.realname}}</span>
		      </div>
		      <div class="col col-25 info_box">
		        <strong>游戏ID</strong>
		        <span>{{accountInfo.actorid}}</span>
		      </div>
		      <div class="col col-25 info_box">
		        <strong>现有房卡</strong>
		        <span>{{accountInfo.cardcount}}</span>
		      </div>
		      <div class="col col-25 info_box">
		      </div>
		</div>
		<div style="height:200px;background:#eeeeee">
            <div style="float:right;padding-right:30px;padding-top: 100px">
            	<span><a ng-click="viewTradeItems()" style="color:#a05252">查看明细</a></span>
            </div>
		</div>
		<div class="list list-reset" >
		<label class="item item-input item-reset">
		  <span class="input-label input-label-reset">游戏ID</span>
		  <input type="text" name="target_actor_id" ng-model="sendData.target_actor_id" />
		</label>
		</div>
		<div class="list list-reset" >
			<label class="item item-input item-reset">
			  <span class="input-label input-label-reset">赠送数</span>
			  <input type="text" name="card_count" ng-mouseenter="sendData.card_count = ''" ng-model="sendData.card_count" />
			</label>
		</div>
		<div class="text-center">		
			<button class="button  button-balanced" ng-click="send()">赠   送</button>
		</div>
		<div class="toast" ng-if="sendToast.show"><span>{{sendToast.info}}</span></div>
	</ion-content>
</ion-view>