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
</head>
<body>

        <table id="agentAuditDg" class="easyui-datagrid"  title="代理审核"
            data-options="
                url:'<?=Url::to(['sys/get-register-agent-list','gameid'=>$gameid])?>',
                method: 'get',
                fit: true,
                border: false,
                rownumbers: true,
                animate: true,
				pageSize:50,
				pageList:[50],
                collapsible: false,
                fitColumns: true,
                autoRowHeight: false,
                idField :'id',
                singleSelect: false,
                checkOnSelect:false,
                selectOnCheck: true,
                pagination:true,
                striped:true">
            <thead>
                <tr>
                    <th data-options="field:'actor_id', halign:'center',align:'center'"
                        width="220">账号ID</th>
					<th
                        data-options="field:'account',halign:'center',align:'center'"
                        width="220">账号</th>
                    <th data-options="field:'telephone', halign:'center',align:'center'"
                        width="220">手机号码</th>
                    <th
                        data-options="field:'real_name', halign:'center',align:'center'"
                        width="220">昵称</th>
                    <th
                        data-options="field:'promotion_code', halign:'center',align:'center'"
                        width="220">推广码</th>

                    <th
                        data-options="field:'introducer',halign:'center',align:'center'"
                        width="220">邀请人</th>
					<th
                        data-options="field:'register_agent_time',halign:'center',align:'center'"
                        width="220">注册时间</th>
					
                    <th
                        data-options="field:'_operate', halign:'center',align:'center',formatter:operate"
                        width="220">操作栏</th>

                </tr>
            </thead>
        </table>
<script type="text/javascript">
	function agentAudit(actorid,account){
		$.ajax({
		 url:"<?=Url::to(['sys/agent-audit'])?>",
		 data:{actorid:actorid,acct:account,gameid:"<?=$gameid?>"},
		 type : 'post',		 
		 dataType : 'json',
		 success : function(r){
			 if (r.flag == "success"){		
				 $('#agentAuditDg').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
				 $('#agentAuditDg').datagrid('reload'); 
				 $.messager.show({
					 title : '提示',
					 msg : '审核成功！'
				 });
			 }else{
				 $.messager.show({
					 title : '提示',
					 msg : r.msg
				 });
			 } 
		 }
	 });
	
	
	
	
	
	}
	function operate(val, row, index){
	    		return '<a href="javascript:void(0);" style="color:blue" onclick="agentAudit(\''
				+ row.actor_id
				+ '\',\''+row.account+'\')">通过 </a>';

	}



</script>

  
</body>
</html>