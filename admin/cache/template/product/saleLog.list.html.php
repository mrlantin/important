__layout|public:mini_layout|layout__
<div class="mini-toolbar" style="margin:3px 3px 0;">
	<table style="width:100%;">
		<tr>
			<?php if ($this->_var['doact'] != 'search'): ?>
			<td style="white-space:nowrap;">
				<a class="mini-button" iconCls="icon-tip">价格红色 表示本订单较最近一次该牌号成交价的差价大于1%</a>
				<!-- <span class="separator"></span>
				<a class="mini-button" iconCls="icon-remove" plain="true" onclick="remove()">删除</a> -->
			</td>
			<?php endif; ?>
			<td style="float:right;">
			<form id="soform">
				<span id="searchMsg"></span>
				<select name="sTime">
					<option value="input_time">创建时间</option>
					<option value="update_time">更新时间</option>
				</select>
				<input name="startTime" class="mini-datepicker" style="width:95px;"/> -
				<input name="endTime" class="mini-datepicker" style="width:95px;"/>
				<select name="out_storage_status">
					<option value="">出库状态</option>
					<?php echo $this->html_options(array('options'=>$this->_var['out_storage_status'])); ?>
				</select>
				<select name="key_type">
					<option value="o_sn">订单号</option>
					<option value="o_id">订单名称</option>
					<option value="p_id">牌号</option>
					<option value="remark">备注</option>
					<option value="c_id">客户名称</option>
					<option value="input_admin">交易员</option>
				</select> 
				<input name="keyword" class="mini-textbox" emptyText="请输入关键词" style="width:140px;" onenter="onKeyEnter"/>   
				<a class="mini-button" iconCls="icon-search" onclick="search()">查询</a>
				<span id="searchMsg"></span></form>
			</td>
		</tr>
	</table>           
</div>

<div class="mini-fit" style="padding:1px 3px 3px;">
	<div id="gridCell" class="mini-datagrid" style="width:100%;height:100%;"  sizeList="[10,20,50,100]" pageSize="20"
		url="/product/saleLog/init?action=grid&oid=<?php echo $this->_var['oid']; ?>" onrowdblclick="onRowDblClick"
		showFilterRow="true" idField="id" multiSelect="true" allowCellSelect="true" allowCellEdit="true"
		 allowCellWrap="true">
		<div property="columns">    
			<div type="checkcolumn"></div>
			<div field="order_sn" width="120" headerAlign="center" align="center" allowSort="true" renderer="onLoadHandle">订单号</div>
			<div field="c_name" width="80" headerAlign="center" allowSort="true" align="center">客户</div>
			<div field="order_name" width="50" headerAlign="center" align="center">抬头</div>
			<div field="model" width="80" headerAlign="center" align="center">牌号</div>
			<div field="f_name" width="80" headerAlign="center" align="center">厂家</div>
			<div field="number" width="80" headerAlign="center" allowSort="true" align="center">数量【吨】</div>  
			<div field="remainder" width="80" headerAlign="center" allowSort="true" align="center">未发数量】</div>   
			<div field="unit_price" width="50" headerAlign="center" allowSort="true" align="center" renderer="tips">单价</div>
			<div action="h_price" width="30" headerAlign="center" allowSort="true" align="center" renderer="do_s">历史价</div>
			<div field="total" width="70" headerAlign="center" allowSort="true" align="center">小计</div>
			<!-- <div field="lot_num" width="50" headerAlign="center" allowSort="true" align="center">批次号</div> -->
			<div field="store_name" width="50" headerAlign="center" allowSort="true" align="center">仓库</div>
			<div field="out_storage_status" width="80" headerAlign="center" allowSort="true" align="center">出库状态</div>
			<div field="remark" width="50" headerAlign="center" allowSort="true" align="center">备注</div>
			<div field="cmanager" width="40" headerAlign="center" align="center">交易员</div>
			<div field="input_time" width="80" headerAlign="center" dateFormat="yyyy-MM-dd HH:mm" allowSort="true" align="center">创建时间</div>
			<div field="cmanager" width="45" headerAlign="center" align="center">创建人</div>
		</div>
	</div>
</div>
	<?php if ($this->_var['doact'] == 'search'): ?>
	<div class="mini-toolbar" style="text-align:center;padding-top:8px;padding-bottom:8px; border:1px solid #000;" borderStyle="border:0;">
			<a class="mini-button" style="width:60px;" onClick="onComfirm()">确定</a>
			<span style="display:inline-block;width:25px;"></span>
			<a class="mini-button" style="width:60px;" onClick="onCancel()">取消</a>
	</div>
	<?php endif; ?>
<script type="text/javascript">
mini.parse();
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
	var record = e.record,s='',id= record.id,order_sn=record.order_sn;
	
		s += '<a href="javascript:viewOrdInfo('+id+')">'+order_sn+'</a> ';
	return s;	
}
function addPurOrd(id){
	mini.open({
		url: "/product/purchaseLog/info?sale_id="+id,
		showMaxButton:true,
		title: '采购明细新增', width: 550, height:530,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//查看明细相关信息
function viewOrdInfo(id){
	mini.open({
		url: "/product/saleLog/info?id="+id,
		showMaxButton:true,
		title: "查看明细相关信息", 
		width: 600, height:450
	});		
}
//新增明细
function add(){
	mini.open({
		url: "/product/saleLog/info",
		showMaxButton:true,
		title: '新增销售订单', width: 750, height:530,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});	
}
function onEdit(e) {
	var row = grid.getSelected();
	if (row) {
		var width=750,height=530,title='修改销售订单';
		urlStr="/product/saleLog/info?type=edit&id="+row.id;
		mini.open({
			url: urlStr,
			title: title,
			width: width,
			height:height,
			ondestroy: function (action) {
				if(action=='save'){ //重新加载
					grid.reload();
				}
			}
		});
	}
}
function do_s(e){
	var record = e.record,id=record.p_id,o_id=record.o_id;
	var s='<a href="javascript:History_s('+id+","+o_id+');">查看</a>';
	return s;
}
//展示10条历史成交价
function History_s(id,o_id){
		mini.open({
		url: " /order/business/init?p_id="+id+"&o_id="+o_id,
		title: "产品历史成交价",
		width: 1250,
		height: 550,
	});
}
function tips(e) {
	var record = e.record,s='',unit_price = record.unit_price,min_price = record.min_price;
	if(parseFloat(min_price*0.99) > unit_price){
		return '<span style="color:red;">'+unit_price+'</span>';
	}
	return unit_price;
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