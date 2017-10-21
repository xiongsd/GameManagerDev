<?php
use common\models\UrlUtils;

?>
<ion-view view-title="房卡受赠">
	<ion-content ng-controller="DonateTabCtrl">
		<div class="row info_box_list">
		      <div class="col col-25 info_box">
		        <strong>代理姓名</strong>
		        <span>熊少弟</span>
		      </div>
		      <div class="col col-25 info_box">
		        <strong>游戏ID</strong>
		        <span>34234242</span>
		      </div>
		      <div class="col col-25 info_box">
		        <strong>现有房卡</strong>
		        <span>205</span>
		      </div>
		      <div class="col col-25 info_box">
		      </div>
		</div>
		<div style="height:100px;background:#ffffff">
		    <a ng-click="viewDonateItems()">查看明细</a>
		</div>
		<div class="list list-reset" >
		<label class="item item-input item-reset">
		  <span class="input-label input-label-reset">游戏ID</span>
		  <input type="text" name="gameid" ng-model="formdata.gameid"/>
		</label>
		</div>
		<div class="list list-reset" >
			<label class="item item-input item-reset">
			  <span class="input-label input-label-reset">赠送数</span>
			  <input type="number" min="1" name="qty" ng-model="formdata.qty" />
			</label>
		</div>
		<button class="button button-full button-game" ng-click="donate()">赠送</button>
	</ion-content>
</ion-view>