<style type="text/css">
  .col-content{
  background-color: #ffffff;
  padding: 7px;
  border-radius: 2px;
  text-align: center;
  border:0px;
  color:#b2b2b2;
  
}
</style>

 <div class="modal">
          <!-- Modal header bar -->
          <ion-header-bar class="bar-dark">
            <button class="button button-icon icon  ion-ios-arrow-back" ng-click="closeDonateItems()"></button>
            <h1 class="title">受赠明细</h1>
          </ion-header-bar>
        <!-- Modal content area -->
        <ion-tabs class="tabs-icon-only tabs-top tabs-positive">
            <ion-tab title="转 出" class="tabs-color-light">
                 <ion-content style="top:90px">
                      <div class="list">
                        <div class="item item-divider" style="padding:0;">
                              <div class="row" style="padding:0">
                                <div class="col col-30">时间</div>
                                <div class="col col-25">接收游戏ID</div>
                                <div class="col col-20">接收昵称</div>
                                <div class="col col-15">房卡数</div>
                                <div class="col col-10"><i class="icon ion-search"></i></div>
                              </div>
                        </div>
 
                        <div class="item item-divider" style="padding:0;">
                              <div class="row" style="padding:0;" ng-repeat="x in items">
                                <div class="col col-content col-30">2017-08-07</div>
                                <div class="col col-content col-25">342432432</div>
                                <div class="col col-content col-20">熊少弟</div>
                                <div class="col col-content col-15">3242</div>
                                <div class="col col-content col-10"></div>
                              </div>
                        </div>
                      </div>
                 </ion-content>
            </ion-tab>             
            <ion-tab title="受 赠" class="tabs-color-light" >
                 <ion-content style="top:90px">
                      <div class="list">
                        <div class="item item-divider" style="padding:0;">
                              <div class="row" style="padding:0">
                                <div class="col col-30">时间</div>
                                <div class="col col-25">接收游戏ID</div>
                                <div class="col col-20">接收昵称</div>
                                <div class="col col-15">房卡数</div>
                                <div class="col col-10"><i class="icon ion-search"></i></div>
                              </div>
                        </div>

                        <div class="item item-divider" style="padding:0;">
                              <div class="row" style="padding:0;">
                                <div class="col col-content col-30">2017-08-07</div>
                                <div class="col col-content col-25">342432432</div>
                                <div class="col col-content col-20">熊少弟</div>
                                <div class="col col-content col-15">3242</div>
                                <div class="col col-content col-10"></div>
                              </div>
                        </div>
                      </div>
                 </ion-content>
            </ion-tab>

        </ion-tabs>

        </ion-content>
        <ion-footer-bar class="bar-stable">
            <button class="button button-calm" style="margin:0 auto;"ng-click="closeDonateItems()">返回</button>
        </ion-footer-bar> 

