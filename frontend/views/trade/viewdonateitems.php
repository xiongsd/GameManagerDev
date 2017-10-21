<style type="text/css">
  .col-content{
  background-color: #ffffff;
  padding: 13px;
  border-radius: 2px;
  text-align: center;
  border:0px;
  color:#657180;
  font-size: 12px; 
}
 .activeBtn{
    background-color: #33cd5f !important;
        box-shadow: none;
        color: #fff !important;
  }
</style>

<ion-view>
  <ion-content ng-init="initTradeItems()">
    <div class="row" style="font-size:15pt;padding:0px">
        <div class="button-bar">
          <a class="button button-balanced button-outline" ng-class="{activeBtn:$index == btnIdx}" ng-click="btnClick($index)" ng-repeat="data in btnGroup">{{data.name}}</a>
        </div>
    </div>
    <div ng-show="isRollOut" class="list" style="margin-bottom: 0px">
        <div class="item item-divider" style="padding:2px;">
              <div class="row" style="padding:5px">
                <div class="col col-22">时间</div>
                <div class="col col-28">接收ID</div>
                <div class="col col-30">名称</div>
                <div class="col col-20">房卡数</div>
              </div>
        </div>

        <ion-scroll zooming="true" direction="y"  style="height: 400px">
       
          <div class="item item-divider" style="padding:0;" ng-repeat="data in sendItems">
                <div class="row" style="padding:0;" >
                  <div class="col col-content col-22">
				  {{data.time | date:'MM-dd HH:mm'}}
                  </div>
                  <div class="col col-content col-28">{{data.actorid}}</div>
                  <div class="col col-content col-28">{{data.nickname}}</div>
                  <div class="col col-content col-20">{{data.cardcount}}</div>
                  
                </div>
          </div>
          <ion-infinite-scroll  ng-if="hasMoreData" on-infinite="loadSendMore()" distance="1%"></ion-infinite-scroll>
        </ion-scroll>           

   </div>
   <div ng-show="isRollIn" class="list" style="margin-bottom:0px">
        <div class="item item-divider" style="padding:2px;">
              <div class="row" style="padding:5px">
                <div class="col col-22">时间</div>
                <div class="col col-30">赠送ID</div>
                <div class="col col-28">名称</div>
                <div class="col col-20">房卡数</div>
              </div>
        </div>
		<ion-scroll zooming="true" direction="y"  style="height: 400px">
       <div class="item item-divider" style="padding:0;" ng-repeat="data1 in receviceItems">
              <div class="row" style="padding:0;" >
                <div class="col col-content col-22">
                 {{data1.time | date:'MM-dd HH:mm'}}
                </div>
                <div class="col col-content col-30">{{data1.actorid}}</div>
                <div class="col col-content col-28">{{data1.nickname}}</div>
                <div class="col col-content col-20">{{data1.cardcount}}</div>

              </div>
        </div>
        <ion-infinite-scroll  ng-if="hasMoreData2" on-infinite="loadReceviceMore()" distance="1%"></ion-infinite-scroll>
		</ion-scroll>   
  </div>


  </ion-content>
</ion-view>




