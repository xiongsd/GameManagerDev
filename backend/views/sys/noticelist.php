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
    <script type="text/javascript" src="<?=Url::to('@web/js/sys/noticelist.js')?>"></script>

    <?= Html::csrfMetaTags() ?>

</head>
<body class="easyui-layout" fit="true">

    <script type="text/javascript">
	  $(function(){
		  $.extend($.fn.datagrid.defaults.editors, {
			  datetimebox: {
				init: function (container, options) {
				  var input = $('<input type="text" class="easyui-datetimebox">')
					.appendTo(container);
				  //编辑框延迟加载
				  window.setTimeout(function () {
					input.datetimebox($.extend({ editable: false }, options));
				  }, 10);
				  //input.datetimebox($.extend({ editable: false }, options));
				  return input;
				},
				getValue: function (target) {
				  return $(target).datetimebox('getValue');
				},
				setValue: function (target, value) {
				  $(target).val(value);
				  window.setTimeout(function () {
					$(target).datetimebox('setValue', value);
				  }, 150);
				},
				resize: function (target, width) {
				  var input = $(target);
				  if ($.boxModel == true) {
					input.width(width - (input.outerWidth() - input.width()));
				  } else {
					input.width(width);
				  }
				}
			  }
			});
		  $('#dg').datagrid({
				    url:"<?=Url::to(['notice/get-notice-data','gameid'=>$gameid])?>",
				    method: 'get',
					fit: true,
                    border: false,
                    rownumbers: true,
                    animate: true,
                    collapsible: false,
                    fitColumns: true,
                    autoRowHeight: false,
                    toolbar:'#divToolbar',
                    idField :'id',
                    singleSelect: false,
                    checkOnSelect:false,
                    selectOnCheck: true,
                    pagination:true,
                    striped:true,
					columns:[[
						{field:'time',title:'发布时间',width:70,
						   editor:{
								type:'datetimebox',
									options:{required :true}
							},     
							formatter: function (value, row, index) {
								return value;
							}
					    },
						{field:'title',title:'公告主题',editor:{type:'validatebox',options:{required :true}},width:70},
						{field:'content',title:'公告内容',editor:{type:'validatebox',options:{required :true}},width:100},
						{field:'operate',title:'操作栏',width:30,formatter:operate}

					]],
					onLoadSuccess:function (data){
						$("#save").hide();
						$("#reject").hide();
					},
					onAfterEdit: function (rowIndex, rowData, changes){
						 if(isNewRecord)
							var url = "<?=Url::to(['notice/add-notice','gameid'=>$gameid])?>";                    
						 else
							var url = "<?=Url::to(['notice/modify-notice','gameid'=>$gameid])?>";      
						if(editIndex!=undefined){
							  $.ajax({
								 url:url,
								 type : 'get',
								 data:rowData,
								 dataType : 'json',
								 success : function(r){
									 if(r.flag=='success'){
										  $('#dg').datagrid('reload');
										  $('#dg').datagrid('unselectAll').datagrid('clearSelections');

										  $.messager.show({
											 title : '提示',
											 msg : '发布成功'
										 });
									 
									 }else{
										  $.messager.show({
											 title : '提示',
											 msg : '发布异常'
										 });
									 
									 }
									
										
								  }
							  });
						}
					}
		  });
	  })
	  var editIndex = undefined;
	  var isNewRecord = true;
	  function endEditing(){
			if (editIndex == undefined){
				return true;
			}else{
				$('#dg').datagrid('rejectChanges');
			    editIndex = undefined;
				return true;
			}
		}
	  function appendRow(){
		   if(endEditing()){
			   editIndex = 0;
			   $("#dg").datagrid('insertRow', {//在指定行添加数据，appendRow是在最后一行添加数据
						index: editIndex, // 行数从0开始计算
						row: {	
							operate:''
							
						}
					});
			   $('#dg').datagrid('selectRow', editIndex)
						.datagrid('beginEdit', editIndex);
			   isNewRecord = true;
			   $("#save").show();
						$("#reject").show();
		   }
		   
		
	  }
	  function editRow(index){
		  editIndex = index;
		  $('#dg').datagrid('selectRow', editIndex)
						.datagrid('beginEdit', editIndex);
		  var ed = $('#dg').datagrid('getEditor', {index:editIndex,field:'time'});
		  var $input = ed.target; // 得到文本框对象
                    //$input.val('aaa'); // 设值
          $input.attr('disabled','disabled');
$("#save").show();
						$("#reject").show();
		  isNewRecord = false;
		
	  }
	  	  function delRow(time){
			  if(window.confirm('你确定要取消交易吗？')){
                			 $.ajax({
								 url:"<?=Url::to(['notice/del-notice','gameid'=>$gameid])?>",
								 type : 'get',
								 data:{time:time},
								 dataType : 'json',
								 success : function(r){
									 if(r.flag=='success'){
											$('#dg').datagrid('unselectAll').datagrid('clearSelections');
                                          $('#dg').datagrid('reload');
										  $.messager.show({
											 title : '提示',
											 msg : '删除成功'
										 });
									 
									 }else{
										  $.messager.show({
											 title : '提示',
											 msg : '删除失败'+r.msg
										 });
									 
									 }
									
										
								  }
							  });
              }

	  }
	  function saveRow(){

		  $("#dg").datagrid("endEdit", editIndex); 
	
		   
		
	  }
	  function rejects(){
		  $("#dg").datagrid('rejectChanges'); 
		  editIndex = undefined;
		  isNewRecord = true;
	  }
      function operate(val, row, index){
		var time = row.time;
        return '<a href="#" onclick="editRow(\''+index+'\')" style="color:red;text-decoration:underline">编辑</a>'+'&nbsp'+
               '<a href="#" onclick="delRow(\''+time+'\')" style="color:red;text-decoration:underline">删除</a>';
      }
    </script>
    <div data-options="region:'center'" style="background: #ffffff; height: 0px; padding: 0px;">
          <div id="divToolbar" class="datagrid-toolbar">
			<a id="add" href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="appendRow()">新增</a>
			<a id="save" href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveRow()">保存</a>
			<a id="reject" href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="rejects()">取消</a>

          </div>
		  <table id="dg"></table>
    </div> 


</body>
</html>