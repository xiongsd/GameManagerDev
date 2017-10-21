<style type="text/css">
  .activeBtn{
    background-color: #33cd5f !important;
        box-shadow: none;
        color: #fff !important;
  }

  .col-content{
    background-color: #ffffff;
    padding: 13px;
    border-radius: 2px;
    text-align: center;
    border:0px;
    color:#a2a2a2; 
  }
</style>


  
}
</style>
<ion-view>
  <ion-content ng-init="init()">
  <div class="row" style="font-size:15pt;">
    <div class="col col-5"></div>
    <div class="col col-90">
      <div class="button-bar">
        <a class="button button-balanced button-outline" ng-click='btnClick($index,data)' ng-repeat="data in btnGroup" ng-class="{activeBtn:$index == btnIdx}">
        {{data.name}}
        </a>
      <!--   <a class="button button-balanced button-outline activated">本月</a>
        <a class="button button-balanced button-outline">上月</a>
        <a class="button button-balanced button-outline">累计</a> -->
      </div>
    </div>
    <div class="col col-5 col-center"></div>    
  </div>
  <div class="light-bg text-center" style="font-color:#ddd;font-size:16px;height:30px;width:100%">
    <span>游戏用户</span>
  </div>
   <div class="list">
      <div class="item item-divider" style="padding:0;">
            <div class="row" style="padding:0">
              <div class="col col-15">排名</div>
              <div class="col col-30">游戏ID</div>
              <div class="col col-30">房卡数</div>
              <div class="col col-25">充值</div>
            </div>
      </div>
      <ion-scroll zooming="true" direction="y"  style="height: 300px">
                       
          <div class="item item-divider" style="padding:0;" ng-repeat="data in rankRows">
                <div class="row" style="padding:0;" >
                  <div class="col col-content col-15">
                  {{data.rank}}
                  </div>
                  <div class="col col-content col-30">{{data.getactorid}}</div>
                  <div class="col col-content col-30">{{data.cardcount}}</div>
                  <div class="col col-content col-25">{{data.money}}</div>
                  
                </div>
          </div>
          <ion-infinite-scroll  ng-if="hasMoreData" on-infinite="loadMoreRank()" distance="1%"></ion-infinite-scroll>
       </ion-scroll>           
    </div>
  </ion-content>
</ion-view>