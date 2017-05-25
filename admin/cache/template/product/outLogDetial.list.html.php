__layout|public:mini_layout|layout__
<div class="mini-toolbar" style="margin:3px 3px 0;">
	<table style="width:100%;">
		<tr>
			<td style="float:left;">
				<a class="mini-button" iconCls="icon-undo" plain="true" onclick="release()">撤销</a>
				<span class="separator"></span>
				<span id="searchMsg"></span>
			</td>
			<td style="float:right;">
			<form id="soform">
				<select name="sTime">
					<option value="input_time">操作时间</option>
					<option value="out_time">出库时间</option>
				</select>
				<input name="startTime" class="mini-datepicker" style="width:95px;"/> -
				<input name="endTime" class="mini-datepicker" style="width:95px;"/>
				<select name="key_type">
					<option value="p_id">牌号</option>
					<option value="store_id">仓库</option>
					<option value="store_aid">入库人</option>
				</select>
				<input name="keyword" class="mini-textbox" emptyText="" style="width:100px;" onenter="onKeyEnter"/>
				<a class="mini-button" iconCls="icon-search" onclick="search()">查询</a>
			</form>
			</td>
		</tr>
	</table>
</div>
<div class="mini-fit" style="padding:1px 3px 3px;">
	<div id="gridCell" class="mini-datagrid" style="width:100%;height:100%;"url="/product/storeOutLog/logDetail?action=grid&do=<?php echo $this->_var['doact']; ?>&id=<?php echo $this->_var['id']; ?>"  idField="id"
	sizeList="[10,20,50,100]" pageSize="20" multiSelect="true" showFilterRow="true" allowCellSelect="true" allowCellEdit="true" >
		<div property="columns">
			<div type="checkcolumn"></div>
			<div field="id" width="20" headerAlign="center" align="center" allowSort="true" >ID</div>
			<div field="model" width="60" headerAlign="center" align="center">牌号</div>
			<div field="f_name" width="60" headerAlign="center" align="center">厂家</div>
			<div field="sale_id" width="60" headerAlign="center" align="center" renderer="onLoadHandle">销售明细</div>
			<div field="number" width="55" headerAlign="center" align="center"  renderer=>单次出库数</div>
			<div field="inlogs_id" width="55" headerAlign="center" align="center" >所扣库存明细</div>
			<div field="store_name" width="55" headerAlign="center" align="center">仓库</div>
			<div field="admin_name" width="55" headerAlign="center" align="center" >仓库管理</div>
			<div field="input_time" width="55" headerAlign="center" align="center" allowSort="true" dateFormat="yyyy-MM-dd HH:mm">操作时间</div>
		</div>
	</div>
</div></div>
	<?php if ($this->_var['doact'] == 'search'): ?>
	<div class="mini-toolbar" style="text-align:center;padding-top:8px;padding-bottom:8px; border:1px solid #000;" borderStyle="border:0;">
			<a class="mini-button" style="width:60px;" onClick="onComfirm()">确定</a>
			<span style="display:inline-block;width:25px;"></span>
			<a class="mini-button" style="width:60px;" onClick="onCancel()">取消</a>
	</div>
	<?php endif; ?>

<script type="text/javascript">
mini.parse();
//搜索或刷新
var grid = mini.get("gridCell");
function search() {
	grid.load($("#soform").serializeObject(),function(e){
		$("#searchMsg").html(e.msg);
	});
}
search();
function onKeyEnter(e) {
	search();
}
//追加操作按钮
function onLoadHandle(e) {
	var record = e.record,s='',sale_id = record.sale_id;
	s += '<a href="javascript:viewOrdInfo('+sale_id+')">'+sale_id+'</a> ';
	return s;
}
//查看订单相关信息
function viewOrdInfo(id){
	mini.open({
		url: "/product/saleLog/info?id="+id,
		showMaxButton:true,
		title: "查看明细相关信息", 
		width: 450, height:320
	});		
}
//撤销
function release() {
    var rows = grid.getSelecteds(),_ids=new Array();
	if(rows.length<1) return;
	for(var i=0;i<rows.length;i++){
		_ids[i]=parseInt(rows[i].id);
	}
	var ids=_ids.join(',');
	if(ids=='') return;
	mini.confirm("确定撤销该出库流水吗？</br>1：设置后该记录会被标记无效</br>2：产生的库存记录会被返还</br>3：订单相关的内容会被撤销", "提示",	function(action){
			if(action!='ok') return;
			var callback=function(data){
	  			if(data.err!='0'){
					alert(data.msg)
					return false;
				}else{
					grid.reload();
				}
			}
			utils.ajax('/product/storeOutLog/outstoreBack',{ids:ids},callback,"POST","json");
		}
	);
}
function GetData() {
	var row = grid.getSelected();
	return row;
}
function CloseWindow(action) {
	if (window.CloseOwnerWindow) return window.CloseOwnerWindow(action);
	else window.close();
}
//确定并获取数据
function onComfirm() {
	CloseWindow("ok");
}
//取消
function onCancel() {
	CloseWindow("cancel");
}
</script>