
<?php
use common\models\UrlUtils;

?>
<ion-view view-title="业绩排名">
	<ion-content ng-controller="RankTabCtrl">
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
		        <span>200</span>
		      </div>
		      <div class="col col-25 info_box">
		      </div>
		</div>
		<div style="height:300px;background:#eeeeee">
		</div>
		<div class="list list-reset" >
		<label class="item item-input item-reset">
		  <span class="input-label input-label-reset">游戏ID</span>
		  <input type="text" name="gameid">
		</label>
		</div>
		<div class="list list-reset" >
			<label class="item item-input item-reset">
			  <span class="input-label input-label-reset">赠送数</span>
			  <input type="text" name="qty">
			</label>
		</div>
		<button class="button button-full button-game">赠送</button>
	</ion-content>
</ion-view>