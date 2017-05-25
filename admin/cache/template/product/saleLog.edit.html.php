__layout|public:mini_layout|layout__
<div class="mini-toolbar" style="margin:3px 3px 0;">
	<table style="width:100%;">
		<tr>
			<td style="float:right;">
			<form id="soform">
				<select name="company_account" >
					<option value="" selected="selected">抬头</option>
					<?php echo $this->html_options(array('options'=>$this->_var['company_account'])); ?>
				</select>
				<select name="key_type">
					<option value="p_id">牌号</option>
					<option value="store_id">仓库</option>
					<option value="customer_manager">交易员</option>
					<option value="unit_price">采购价</option>	
				</select>
				<input name="keyword" class="mini-textbox" emptyText="" style="width:100px;" onenter="onKeyEnter"/>
				<a class="mini-button" iconCls="icon-search" onclick="search()">查询</a>
				<span id="searchMsg"></span></form>
			</td>
		</tr>
	</table>
</div>
<div class="" style="padding:1px 3px 3px;">
	<div id="gridCell2" class="mini-datagrid" style="width:100%;height:150px;" url="/product/storeDetail/init?action=grid&do=<?php echo $this->_var['doact']; ?>&isAddSale=1"  idField="id"
		sizeList="[10,20,50,100]" pageSize="20" multiSelect="false"  showFilterRow="true"  onrowclick="setsupport" onlyCheckSelection="true" allowCellSelect="true" allowRowSelect="true" allowCellEdit="true" >
		<div property="columns">
			<div type="checkcolumn"  width="15"></div>
			<div field="order_name" width="40" headerAlign="center" align="center" allowSort="true">抬头</div>
			<div field="store_name" width="50" headerAlign="center" align="center" allowSort="true">仓库</div>
			<div field="order_sn" width="45" headerAlign="center" align="center" allowSort="true" renderer="onLoadHandle">订单号</div>
			<div field="model" width="50" headerAlign="center" align="center" allowSort="true" renderer="onLoadProduct">牌号</div>
			<div field="f_name" width="55" headerAlign="center" align="center" allowSort="true">厂家</div>
			<div field="customer_manager" width="35" headerAlign="center" align="center" allowSort="true">交易员</div>
			<div field="unit_price" width="40"  headerAlign="center" align="center" allowSort="true">采购价</div>
			<div field="expect_price" width="40"  headerAlign="center" align="center" allowSort="true">期望售价</div>
			<div field="number" width="40" headerAlign="center" align="center" allowSort="true">进货数量</div>
			<div field="remainder" width="40" headerAlign="center" align="center" allowSort="true">剩余数量</div>
			<div field="controlled_number" width="40" headerAlign="center" align="center" allowSort="true">可用数量</div>
			<div field="lock_number" width="40" headerAlign="center" align="center" allowSort="true">锁定数量</div>
			<div field="admin_name" width="35" headerAlign="center" align="center">管理员</div>
		</div>
	</div>
</div>
<div title="订单明细" class="form" id="editForm">
		<fieldset style="border:solid 1px #aaa;margin-top:8px;position:relative;">
			<legend>库存产品选择</legend>
			<table width="100%" border="0" cellpadding="1" cellspacing="2">
				<tr>
					<td>牌号<font style="color:red;"> * </font></td>
					<td><input name="model" id="model" value="<?php echo $this->_var['model']; ?>" textField="text" valueField="id" class="mini-textbox"   allowInput="false"  emptyText="请从库存中选择" required="true" style="width:150px"/>
					</td>
					<td>仓库<font style="color:red;"> * </font></td>
					<td><input name="store_name" id="store" value="<?php echo $this->_var['info']['store_name']; ?>" textField="text" valueField="id" class="mini-textbox"   allowInput="false"  required="true" style="width:150px"/>
					</td>	
								
				</tr>
				<tr>	
					<td>批次</td>
					<td><input name="lot_num" id="lot" value="<?php echo $this->_var['info']['lot_num']; ?>" textField="text" valueField="id" class="mini-textbox"    allowInput="false"  style="width:150px"/>
					</td>
					<td>采购价<font style="color:red;"> * </font></td>
					<td><input name="purchase_price" id="p_price" value="<?php echo $this->_var['info']['purchase_price']; ?>" textField="text" valueField="id" class="mini-textbox"   allowInput="false"  required="true" style="width:150px"/>
					</td>
					
				</tr>
				<tr>
					<td><font style="color:blue;">需求数量<font style="color:red;"> * </font></font></td>
					<td id="num"><input name="require_number" id="require_number" value="<?php echo $this->_var['info']['number']; ?>" textField="text" valueField="id" class="mini-textbox"  onvaluechanged="onValidation"  required="true" style="width:150px"/><span id="returnError" style="padding-left:5px; color:#F00;"></span>
					</td>
					<td><font style="color:blue;">销售价<font style="color:red;"> * </font></font></td>
					<td>
					<input name="unit_price" id="u_price" value="<?php echo $this->_var['info']['unit_price']; ?>" textField="text" valueField="id" class="mini-textbox"   allowInput="true"  required="true" style="width:150px"/>
					</td>
				</tr>
				<tr>
					<td>备注 : </td>
					<td><input name="remark" class="mini-textarea" style="width:200px"  value="<?php echo $this->_var['info']['remark']; ?>"></td>
					<td id="s_title" style="display:none;"><font style="color:blue;">历史价：</font></td>
					<td id="s_val" style="display:none;"><font style="color:red;" id="s_price"> 0</font>&nbsp;元 <a href="javascript:proHistory()">查看</a></td>
				</tr>
				<input class="mini-hidden" id="m_o_id" name="o_id" value=""/>
				<input class="mini-hidden" id="m_p_id" name="p_id" value=""/>
				<input class="mini-hidden" id="m_p_price" name="m_p_price" value=""/>
				<input class="mini-hidden" id="m_o_name" name="o_name" value=""/>
				<input class="mini-hidden" id="m_f_name" name="f_name" value=""/>
				<input class="mini-hidden" id="m_store_id" name="store_id" value=""/>
				<input class="mini-hidden" id="hidden_remainder" name="remainder" value=""/>
				<input class="mini-hidden" id="m_lock_number" name="lock_number" value=""/>
				<input class="mini-hidden" id="inlog_id" name="inlog_id" value=""/>
				<input class="mini-hidden" id="history_price" name="history_price" value=""/>
				<input class="mini-hidden" id="purchase_id" name="purchase_id" value=""/>
				<input class="mini-hidden" id="controlled_number" name="controlled_number" value=""/>
			</table>
		</fieldset>
	</div>
		<?php if ($this->_var['choose'] == 1): ?>
			<div class="mini-toolbar" style="text-align:center;padding-top:8px;padding-bottom:8px; border:1px solid #000;" borderStyle="border:0;">
				<a class="mini-button" style="width:60px;" onClick="onComfirm()">确定</a>
			<span style="display:inline-block;width:25px;"></span>
				<a class="mini-button" style="width:60px;" onClick="onCancel()">取消</a>
			</div>
		<?php else: ?>
			<div align="center" style="margin-top:10px;margin-bottom:10px;">
				<a class="mini-button" iconcls="icon-ok" onclick="submitForm">提交</a>
				<a class="mini-button" iconcls="icon-cancel" onclick="onCancel">关闭</a><span id="returnMsg" style="padding-left:5px; color:#F00;"></span>
			</div>
		<?php endif; ?>
			
	
<script type="text/javascript">
mini.parse();
var grid = mini.get("gridCell2");
function search() {
	grid.load($("#soform").serializeObject(),function(e){
		$("#searchMsg").html(e.msg);
	});

}
search();	
function onKeyEnter(e) {
	search();
}
function submitForm() {
	var form = new mini.Form("#editForm");
	form.validate();
	// if(form.isValid() == false) return;
	//提交数据
	var o = form.getData();
	var json = mini.encode(o);
	$("#returnMsg").text('');
	form.loading("数据提交中，请稍后......");
	var urlstr = '/product/saleLog/addSubmit';
	$.post(urlstr,{data:json},function(data){
		form.unmask();
		$("#returnMsg").text(data.msg);
		if(data.err=='0'){
			CloseWindow("save");
			// window.location.reload();
		}else{
			return false;
		}
	},'json');
}
//追加操作按钮
function onLoadHandle(e) {
	var record = e.record,s='',o_id = record.o_id,s='',order_sn = record.order_sn;
	s += '<a href="javascript:viewOrdInfo('+o_id+')">'+order_sn+'</a> ';
	return s;
}
//查看订单相关信息
function viewOrdInfo(oid){
	mini.open({
		url: "/product/order/info?oid="+oid,
		showMaxButton:true,
		title: "查看订单相关信息", 
		width: 800, height:450
	});		
}
//追加查看产品按钮
function onLoadProduct(e){
	var record = e.record,s='',p_id = record.p_id,model=record.model;
	s += '<a href="javascript:viewProInfo('+p_id+')">'+model+'</a> ';
	return s;
}
//查看产品相关信息
function viewProInfo(pid){
	mini.open({
		url: "/product/product/info?pid="+pid,
		showMaxButton:true,
		title: "产品相关信息", 
		width: 250, height:250
	});		
}
function setsupport(e){
	"<?php if ($this->_var['type'] == 'edit'): ?>"
	return false;
	"<?php endif; ?>"
	var record = e.record, id=record.id, purchase_id=record.purchase_id, model=record.model, store=record.store_name, lot=record.lot_num, unit_price=record.unit_price, remainder=record.remainder, p_id=record.p_id, store_id=record.store_id,locknum=record.lock_number,controlled_number=record.controlled_number,o_id = record.o_id,f_name=record.f_name,price_s=record.price_s,o_name=record.order_name_id;
	mini.get("model").setValue(model);
	mini.get("m_f_name").setValue(f_name);
	mini.get("store").setValue(store);
	mini.get("lot").setValue(lot);
	mini.get("p_price").setValue(unit_price); //仓库的采购价
	mini.get("hidden_remainder").setValue(remainder);
	mini.get("m_p_id").setValue(p_id);
	mini.get("m_p_price").setValue(unit_price);
	mini.get("m_store_id").setValue(store_id);
	mini.get("m_o_id").setValue(o_id);
	mini.get("inlog_id").setValue(id);
	mini.get("purchase_id").setValue(purchase_id);
	mini.get("m_lock_number").setValue(locknum);
	mini.get("history_price").setValue(price_s);
	mini.get("controlled_number").setValue(controlled_number);
	mini.get("m_o_name").setValue(o_name);
	$('#s_price').html(price_s);
	$('#s_title').show();
	$('#s_val').show();

}
function onValidation(e) {
	var controlled_number = mini.get("controlled_number");
	var require_number = mini.get("require_number");
	var controlled = controlled_number.getValue();
	var require = require_number.getValue();
	if(parseInt(controlled)<parseInt(require)){
		require_number.setValue('0');
		$("#returnError").text('超出现有库存!');
		mini.parse();
	}else{
		$("#returnError").text('');
		mini.parse();
	}
}
//新增明细
function addPur(){
	mini.open({
		url: "/product/purchaseLog/info",
		showMaxButton:true,
		title: '采购明细新增', width: 450, height:270,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//展示10条历史成交价
function proHistory(){
	var product_id = $('#m_p_id').val();
		mini.open({
		url: " /order/business/init?p_id="+product_id,
		title: "产品历史成交价",
		width: 1250,
		height: 550,
	});
}
//强制选择归属订单
function ordChoose(e){
	var btn = this;
		mini.open({
		url: "/product/order/init?do=search&order_type=1",
		title: "选择订单",
		width: 1250,
		height: 550,
		onload: function () {
			var data=e.sender.getValue();
			top['win'].setDvalue(data);  //去调用子页面的方法。
		},
		ondestroy: function (action) {
			if (action == "ok") {
				var iframe = this.getIFrameEl();
				var data = iframe.contentWindow.GetData();
				data = mini.clone(data);    //必须
				if (data) {
					btn.setValue(data.o_id);
					btn.setText(data.order_name);
				}
			}
		}
	});
}
function CloseWindow(action) {
  if (window.CloseOwnerWindow) return window.CloseOwnerWindow(action);
  else window.close();
}
//确定并获取数据
function onComfirm() {
	var form = new mini.Form("#editForm");
	form.validate();
	if(form.isValid() == false) return;
	//提交数据
	CloseWindow("ok");
}
function onCancel(e) {
  CloseWindow("cancel");
}
function GetData() {
	var form = new mini.Form("#editForm");
	//提交数据
	var o = form.getData();
	var json = mini.encode(o);
	$("#returnMsg").text('');
	return json;
}
</script>