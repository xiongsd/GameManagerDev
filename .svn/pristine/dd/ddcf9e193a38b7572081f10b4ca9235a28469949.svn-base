<ion-header-bar class="bar bar-header bar-dark">
 <ion-title>申请与查询</ion-title>
</ion-header-bar>
<ion-view>
	<ion-content ng-init="reloadProfileInfo()">
	  <!-- The content of the page -->
	        <ion-refresher pulling-text="下拉更新" on-refresh="refreshProfileInfo()"></ion-refresher>
	        <div class="avatar">
			<div><img ng-src="{{accountinfo.headimgurl}}"/></div>
			<div><span>{{accountinfo.realname}}</span></div>
			<div class="role">代理商</div>
			<div class="agentinfo">
				<div class="extendinfo text-pull-left">
					<div><span style="font-size: 16pt">推广码</span></div>
					<div><span>{{accountinfo.promotioncode}}</span></div>
				</div>
				<div class="cardinfo text-pull-right">
					<div><span style="font-size: 16pt">房卡数</span></div>
					<div><span>{{accountinfo.cardcount}}</span></div>
				</div>

			</div>

			</div>
			<div class="block-info">
				<div class="text-pull-left" style="padding-left: 20px;height:100%">ID/昵称</div> 
				<div class="text-pull-right" style="padding-right: 20px;height:100%">
							<ul>
								<li>{{accountinfo.realname}}</li>
								<li>{{accountinfo.actorid}}</li>

							</ul>
			    </div>		
			</div>
			<div class="block-info">
					<div class="text-pull-left" style="padding-left: 20px;height:100%">推荐人</div> 
				<div class="text-pull-right" style="padding-right: 20px;height:100%">
							<strong>{{accountinfo.introducer}}</strong>
				</div>
							
			</div>
			<div class="block-info">
						<div class="text-pull-left" style="padding-left: 20px;height:100%">手机号</div> 
				<div class="text-pull-right" style="padding-right: 20px;height:100%">
							<strong>{{accountinfo.telephone}}</strong>

				</div>
			</div>
	</ion-content>
</ion-view>