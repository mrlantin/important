 __layout|public:mini_layout|layout__
<div class="mini-toolbar" style="margin:3px 3px 0;">
	<table style="width:100%;">
		<tr>
			<td style="float:right;">
			<form id="soform" method="get" action="/order/profit/download">
				<span id="searchMsg"></span>
				创建时间
				<input name="startTime" class="mini-datepicker" style="width:95px;"/> -
				<input name="endTime" class="mini-datepicker" style="width:95px;"/>
				<select name="key_type">
					<option value="name">销售员</option>
					<option value="order_sn">销售单号</option>
				</select>
				<input name="keyword" class="mini-textbox" emptyText="请输入关键字" style="width:100px;" onenter="onKeyEnter"/>
				牌号：<input name="model" class="mini-textbox" emptyText="请输入牌号" style="width:80px;" onenter="onKeyEnter"/>
				厂家：<input name="f_name" class="mini-textbox" emptyText="请输入厂家" style="width:80px;" onenter="onKeyEnter"/>
				<a class="mini-button" iconCls="icon-search" onclick="search()">查询</a>
				<!-- <a class="mini-button" class="output" onclick="download()" iconCls="icon-download" plain="true">Excel导出</a> -->
				<span id="searchMsg"></span></form>
			</td>
		</tr>
	</table>
</div>
<div class="mini-fit" style="padding:1px 3px 3px;">
	<div id="gridCell" class="mini-datagrid" style="width:100%;height:100%;"url="/order/business/init?action=grid&do=<?php echo $this->_var['doact']; ?>&p_id=<?php echo $this->_var['p_id']; ?>&o_id=<?php echo $this->_var['o_id']; ?>"  idField="id"
	sizeList="[10,20,50,100]" pageSize="20" multiSelect="true"  onrowdblclick="onRowDblClick" showFilterRow="true" allowCellSelect="true" allowCellEdit="true" allowCellWrap="true">
		<div property="columns">
			<div type="checkcolumn"></div>
			<div field="model" width="40" headerAlign="center" align="center"renderer="onClickBusiness">牌号</div>
			<div field="f_name" width="40" headerAlign="center" align="center">厂家</div>
			<div field="number" width="40" headerAlign="center" align="center" allowSort="true">数量</div>
			<div field="unit_price" width="40" headerAlign="center" align="center" allowSort="true">单价</div>
			<div field="pickup_location" width="40" headerAlign="center" align="center" allowSort="true">交货地</div>
			<div field="transport_type" width="40" headerAlign="center" align="center" allowSort="true">运输方式</div>
			<div field="is_futures" width="40" headerAlign="center" align="center" allowSort="true">是否期货</div>
			<div field="name" width="30" headerAlign="center" align="center" >销售员</div>
			<div field="order_sn" width="100" headerAlign="center" align="center" allowSort="true">销售单号</div>
			<div field="input_time" width="75" headerAlign="center" align="center" allowSort="true" dateFormat="yyyy-MM-dd HH:mm">创建时间</div>
		</div>
	</div>
</div>
<script type="text/javascript">
mini.parse();
//搜索或刷新
var grid = mini.get("gridCell");
function search() {
	grid.load($("#soform").serializeObject(),function(e){
		$("#searchMsg").html(e.msg);
	});
}
function download() {
	$("#soform").submit();
}
search();
function onKeyEnter(e) {
	search();
}

function GetData() {
	var row = grid.getSelected();
	return row;
}
function CloseWindow(action) {
	if (window.CloseOwnerWindow) return window.CloseOwnerWindow(action);
	else window.close();
}
//点击牌号事件
function onClickBusiness(e) {	
	 var record = e.record, p_id=record.p_id, model=record.model,s='';	 
     s += '<a title="查看销售成交走势图" href="javascript:BusinessGraph('+p_id+',\''+model+'\')">'+model+'</a> ';
     return s;
}
//销售成交走势图
 function BusinessGraph(p_id,model){	
    mini.open({
        url: "/order/business/graph?p_id="+p_id+"&model="+model,        
        showMaxButton:true,
        title: "销售成交走势图",
        width: 1200, height:795
    });
}
</script>