<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 引入样式表 -->
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/easyui/default/easyui.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/wu.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=Url::to('@web/css/icon.css')?>" />
    <!-- 引入js文件 -->
    <script type="text/javascript" src="<?=Url::to('@web/js/jquery-1.8.0.min.js')?>"></script>
    <script type="text/javascript" src="<?=Url::to('@web/js/easyui/jquery.easyui.min.js')?>"></script>
    <script type="text/javascript" src="<?=Url::to('@web/js/easyui/locale/easyui-lang-zh_CN.js')?>"></script>
    <?= Html::csrfMetaTags() ?>
    <title>后台管理系统</title>
</head>
<body class="easyui-layout">
    <div class="wu-header" data-options="region:'north',border:false,split:true">
        <div class="wu-header-left">
            <h1>深圳市晓游网络游戏后台管理系统</h1>
        </div>
        <div class="wu-header-right">
            <p><strong><?=Yii::$app->user->identity->getUserName()?></strong>，欢迎您！</p>
            <p><a href="http://www.xiaoyougames.com/xiaoyougames">网站首页</a>|<a href="<?=Url::to(['site/logout'])?>">安全退出</a></p>
        </div>
    </div>
    <div class="wu-sidebar" data-options="region:'west',split:true,border:true,title:'导航菜单'" style="width:230px"> 
        <ul id="wu-side-tree">数据加载中</ul>
    </div>  
    <!-- end of sidebar -->    
    <!-- begin of main -->
    <div class="wu-main" data-options="region:'center'">
        <div id="wu-tabs" class="easyui-tabs" data-options="border:false,fit:true">  
            <div title="首页" data-options="method:'get',href:'<?=Url::to(["sys/welcome"])?>',closable:false,iconCls:'icon-tip',cls:'pd3'"></div>
        </div>
    </div>
    <!-- begin of footer -->
    <div class="wu-footer" data-options="region:'south',border:true,split:true">
        &copy; 2017 深圳晓游网络科技有限公司 保留版权所有
    </div>
    <!-- end of footer -->  
    <script type="text/javascript">

        
        /**
        * Name 载入树形菜单 
        */
        $('#wu-side-tree').tree({
            url:'<?=Url::to(['utils/build-menu-tree'])?>',
            method: 'get',
            cache:false,
            onClick:function(node){
				if($('wu-side-tree').tree('isLeaf', node.target)){
					addTab(node.text, '<?=Url::to("@web/")?>'+node.attributes.url, '', true);
				}else{
					return;
				}
            }
        });
        //刷新当前标签Tabs
        function RefreshTab(currentTab) {
            var url = $(currentTab.panel('options')).attr('href');
            $('#tabs').tabs('update', {
                tab: currentTab,
                options: {
                    href: url
                }
            });
            currentTab.panel('refresh');
        }
        
        /**
        * Name 选项卡初始化
        */
        $('#wu-tabs').tabs({
            tools:[{
                iconCls:'icon-reload',
                border:false,
                handler:function(){
                    var currentTab = $('#wu-tabs').tabs('getSelected');
                    RefreshTab(currentTab);
                }
            }]
        });
            
        /**
        * Name 添加菜单选项
        * Param title 名称
        * Param href 链接
        * Param iconCls 图标样式
        * Param iframe 链接跳转方式（true为iframe，false为href）
        */  
        function addTab(title, href, iconCls, iframe){
            var tabPanel = $('#wu-tabs');
            if(!tabPanel.tabs('exists',title)){
                var content = '<iframe scrolling="auto" frameborder="0"  src="'+ href +'" style="width:100%;height:100%;"></iframe>';
                if(iframe){
                    tabPanel.tabs('add',{
                        title:title,
                        content:content,
                        iconCls:iconCls,
                        fit:true,
                        cls:'pd3',
                        closable:true
                    });
                }
                else{
                    tabPanel.tabs('add',{
                        title:title,
                        href:href,
                        iconCls:iconCls,
                        fit:true,
                        cls:'pd3',
                        closable:true
                    });
                }
            }
            else
            {
                tabPanel.tabs('select',title);
            }
        }
        /**
        * Name 移除菜单选项
        */
        function removeTab(){
            var tabPanel = $('#wu-tabs');
            var tab = tabPanel.tabs('getSelected');
            if (tab){
                var index = tabPanel.tabs('getTabIndex', tab);
                tabPanel.tabs('close', index);
            }
        }
    </script>

</body>
</html>