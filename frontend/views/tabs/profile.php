<ion-view>
	<ion-content ng-init="reloadProfileInfo()">
	  <!-- The content of the page -->
	        <ion-refresher pulling-text="下拉更新" on-refresh="refreshProfileInfo()"></ion-refresher>
	        <div class="avatar">
			<div><img ng-src="{{accountinfo.headimgurl}}"/></div>
			<div><span>{{accountinfo.realname}}</span></div>
			<div class="role">代理商</div>
			<div class="agentinfo" style="border-radius:5px">
				<div class="extendinfo text-pull-left">
					<div><span>推广码</span></div>
					<div><span>{{accountinfo.promotioncode}}</span></div>
				</div>
				<div class="cardinfo text-pull-right">
					<div><span>房卡数</span></div>
					<div><span>{{accountinfo.cardcount}}</span></div>
				</div>

			</div>

			</div>
			<div class="block-info">
				<div class="text-pull-left" style="font-size:10pt;font-weight:bold;padding-left:20px;height:100%">ID</div> 
				<div class="text-pull-right" style="padding-right: 20px;height:100%">
					<span style="font-size:10pt;">{{accountinfo.actorid}}</span>
			    </div>		
			</div>
			<div class="block-info">
				<div class="text-pull-left" style="font-size:10pt;font-weight:bold;padding-left:20px;height:100%">昵称</div> 
				<div class="text-pull-right" style="padding-right: 20px;height:100%">
					<span style="font-size:10pt;">{{accountinfo.realname}}</span>
			    </div>		
			</div>
			<div class="block-info">
					<div class="text-pull-left" style="font-size:10pt;font-weight:bold;padding-left: 20px;height:100%">推荐人</div> 
				<div class="text-pull-right" style="padding-right:20px;height:100%">
							<span style="font-size:10pt;">{{accountinfo.introducer}}</span>
				</div>
							
			</div>
			<div class="block-info">
						<div class="text-pull-left" style="font-size:10pt;font-weight:bold;padding-left: 20px;height:100%">手机号</div> 
				<div class="text-pull-right" style="padding-right:20px;height:100%">
							<span style="font-size:10pt;">{{accountinfo.telephone}}</span>

				</div>
			</div>
	</ion-content>
</ion-view>