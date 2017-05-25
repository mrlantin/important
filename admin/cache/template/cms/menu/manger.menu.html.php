__layout|public:main_layout|layout__
<?php echo $this->_smarty_insert_css(array('files'=>'/touch/common.css?,set_manger.css')); ?>
<div class="news_set">
    <div class="mini-toolbar" style="margin:3px 0 0;">
        <table>
            <tr>
                <td style="white-space:nowrap; width:150px;">
                    <strong>菜单模板</strong>
                    <a class="mini-button" iconCls="icon-add" plain="true" onclick="add(0,'/cms/menu/addmenu')">新增</a>
                    <a class="mini-button" iconCls="icon-remove" onclick="removeRow()" plain="true">删除</a>
                </td>
                <td style="float:left">
                </td>
           </tr>
        </table>
    </div>
    <div style="width:100%;" class="news_list mini-datagrid" id="news_list" url="/cms/sysMenu/getMenuList?action=grid"  idField="ids" sizeList="[15,30,50,100]" pageSize="30" showFilterRow="true" multiSelect="true" onrowdblclick="onRowDblClick">
        <div property="columns">
          <div type="checkcolumn"></div>
		  <div field="id" width="40" headerAlign="center" align="center">模板序号</div>
          <div field="canUse" width="50" headerAlign="center" align="center">是否有效</div>
		  <div field="create_time" width="60" headerAlign="center" align="center" allowSort="true">发布时间</div>        
          <div field="mark" width="50" headerAlign="center" align="center">菜单位置</div>
		  <div field="level_name" width="50" headerAlign="center" align="center">菜单等级</div>
		  <div field="menu_type" width="50" headerAlign="center" align="center">菜单类型</div>
		  <div field="name" width="50" headerAlign="center" align="center">菜单名</div>
          <div field="keyname" width="200" headerAlign="center" align="left">keyname/URL</div>
          <div field="menu_string" width="200" headerAlign="center" align="left">菜单详细</div>
        </div>
    </div>
</div>

<script>
mini.parse();
var grid = mini.get("news_list");
grid.load();
//查看编辑卡片信息
function add(id,url){
	var position=$("#soPosition").val();
	if(id==0 && position==''){
		alert("请选择栏目")
		return false;
	}
	
	mini.open({
		url: url+"?position="+position+"&id="+id,
		showMaxButton:true,
		title: '新增/编辑模板', width: 800, height:550,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});		
}
function onRowDblClick(e) {
	edit('/cms/menu/addmenu');
}
function edit(url) {
	var row = grid.getSelected();
	if (row) {
		add(row.id,url)
	}
}

//删除数据
function removeRow() {
    var rows = grid.getSelecteds(),_ids=new Array(),_pos=new Array();
	if(rows.length<1) return;
	for(var i=0;i<rows.length;i++){
		_ids[i]=parseInt(rows[i].id);
		_pos[i]=parseInt(rows[i].position);
	}
	var ids=_ids.join(','),pos=_pos.join(',');
	console.log(ids);
	if(ids=='') return;
	mini.confirm("确定删除内容？", "提示",	function(action){
			if(action!='ok') return;
			var callback=function(data){
	  			if(data.err!='0'){
					alert(data.msg)
					return false;
				}else{
					grid.reload();
				}
			}
			utils.ajax('/cms/sysMenu/delMenu',{ids:ids,pos:pos},callback,"POST","json");
		}
	);
}

</script>