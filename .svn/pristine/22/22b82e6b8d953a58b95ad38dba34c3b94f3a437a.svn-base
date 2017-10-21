<style type="text/css">
#circle{
	font-size:16pt;
	font-weight:bold;
	width: 150px;
	height: 150px;
	line-height:150px;
	background-color: white;
	color: #000000;
	text-align: center;
	border-radius: 75px;
	/*-webkit-border-radius: 100px;*/
	-moz-border-radius: 75px;
	margin: auto;  
    position: absolute;  
    top: 0; left: 0; bottom: 0; right: 0; 
}

</style>


<ion-view>
	<ion-content ng-init="init()">
	<ion-refresher pulling-text="更新数据" on-refresh="reloadAgentCnt()"></ion-refresher>
		<div style="height:40%;background:#cafddb;text-align:center;position:relative;">
			<div id="circle">
				<div style="height:30px;color:gray">业绩累计</div>
				<div  style="height:10px;color:gray;font-weight:normal"></div>
			</div>

		</div>
		<div class="row">      
			<div class="col col-50">
				<div style="margin:0 auto;height:40px;text-align:center;line-height:40px;background:#cafddb;width:80%;border-radius:5px">
					<span style="font-size:15pt;font-weight:bold;color:#bbbbbb">推广</span>
					
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">今日推广</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d1}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">昨日推广</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d2}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">本周推广</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d7}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">累计推广</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.all}}</div>
				</div>
			</div>  
						<div class="col col-50">
				<div style="margin:0 auto;height:40px;text-align:center;line-height:40px;background:#cafddb;width:80%;border-radius:5px">
					<span style="font-size:15pt;font-weight:bold;color:#bbbbbb">销售</span>
					
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">今日销售</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d1}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">昨日销售</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d2}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">本周销售</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.d7}}</div>
				</div>
				<div style="margin:0 auto;height:60px;line-height:50px;width:80%;border-bottom:1px solid #bbbbbb;">
				  <div style="color:#00cc00;height:20px;padding:0">累计销售</div>
				  <div style="color:#acacac;height:20px;">{{agentCnt.all}}</div>
				</div>
			</div>  

		</div>
	</ion-content>
</ion-view>