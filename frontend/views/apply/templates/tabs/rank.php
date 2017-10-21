
<?php
use common\models\UrlUtils;

?>
<ion-tab title="Home" 
               icon-on="ion-ios7-filing" 
               icon-off="ion-ios7-filing-outline" ng-controller="HomeCtrl">
        
        <ion-header-bar class="bar-positive">
          <button class="button button-clear" ng-click="newTask()">New</button>
          <h1 class="title">Tasks</h1>
        </ion-header-bar>
        
        <ion-content has-tabs="true" on-refresh="onRefresh()">

          <ion-refresher></ion-refresher>
          <ion-list scroll="false" on-refresh="onRefresh()"
                    s-editing="isEditingItems" 
                    animation="fade-out"
                    delete-icon="icon ion-minus-circled">
            <ion-item ng-repeat="item in items"
                      item="item"
                      buttons="item.buttons"
                      can-delete="true"
                      can-swipe="true"
                      on-delete="deleteItem(item)"
                      ng-class="{completed: item.isCompleted}">
              {{item.title}}
              <i class="{{item.icon}}"></i>
            </ion-item>
          </ion-list>
        </ion-content>
      </ion-tab>