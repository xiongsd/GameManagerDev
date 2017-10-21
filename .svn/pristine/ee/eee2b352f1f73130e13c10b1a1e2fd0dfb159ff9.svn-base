<style type="text/css">
  .selectItem{
    border:2px solid #00ff00;
  }

  .mallItem{
    border:2px solid #e0e0e0;
  
  }

</style>

<ion-view>
	<ion-content ng-init="init()">
	    <div style="height:60px;font-size:16pt;border-bottom:2px solid green;line-height:60px;text-align:center;background:#f6f6f6">
			<span>微信支付</span>
		</div>

		<div class="row" ng-repeat="data in mallItems">      
			<div class="col">
				<div ng-click="selectMallItem(data,$index)" style="background:#e4e4e4;width:100%;height:50px;line-height:50px;color:gray"  ng-class="{selectItem:$index == selectIndex,mallItem:$index != selectIndex}">
					    <div style="float:left;padding-left:20px"><span>房卡×{{data.cardcount}}</span></div>
						<div style="width:130px;height:44px;float:right;background:#33cd5f;color:#000000">
							<span>价格:{{data.money/100}}RMB</span>
							<span style="color:yellow">{{data.desc}}</span>
						</div>

				</div>
			</div>  
		</div>
		<div class="text-center">		
			<button class="button button-balanced" ng-click="pay()">支      付</button>			
		</div>
	</ion-content>
</ion-view>
