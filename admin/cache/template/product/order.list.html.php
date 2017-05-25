 __layout|public:mini_layout|layout__
<div class="mini-toolbar" style="margin:3px 3px 0;">
	<table style="width:100%;">
		<tr>
		<?php if ($this->_var['doact'] != 'search'): ?>
			<td style="white-space:nowrap;">
			<?php if ($this->_var['order_type'] == 1): ?>
				<a class="mini-button" iconCls="icon-add" onclick="addSale()">销售</a>
				<a class="mini-button" iconCls="icon-split" onclick="compact()">合</a>
			<?php else: ?>
				<a class="mini-button" iconCls="icon-add" onclick="addPur()">采购</a>
			<?php endif; ?>
			<a class="mini-button" iconCls="icon-remove" onclick="del()">废</a>
			</td>
		<?php endif; ?>
			<td style="float:right;">
			<form id="soform">
				<span id="searchMsg"></span>
				<select name="sTime">
					<option value="input_time">创建时间</option>
					<option value="update_tim出e">更新时间</option>
					<option value="sign_time">签订日期</option>
					<option value="pickup_time">提货日期</option>
					<option value="delivery_time">送货日期</option>
					<option value="payment_time">付款日期</option>

				</select>
				<input name="startTime" class="mini-datepicker" style="width:95px;"/> -
				<input name="endTime" class="mini-datepicker" style="width:95px;"/>
				<select name="order_name">
					<option value="" selected="selected">抬头</option>
					<?php echo $this->html_options(array('options'=>$this->_var['company_account'])); ?>
				</select>
				<select name="financial_records">
					<option value="" selected="selected">=财务=</option>
					<option value="1">是</option>
					<option value="2">否</option>
				</select>
				<select name="collection_status">
					<option value="" selected="selected">=收付款=</option>
					<option value="1">待收付款</option>
					<option value="2">部分收付款</option>
					<option value="3">已完成</option>
				</select>
				<select name="invoice_status">
					<option value="" selected="selected">=开票=</option>
					<option value="1">待开票</option>
					<option value="2">部分开票</option>
					<option value="3">全部开票</option>
				</select>
				<select name="pay_method" >
					<option value="" selected="selected">=付款=</option>
					<?php echo $this->html_options(array('options'=>$this->_var['pay_method'])); ?>
				</select>
				<select name="business_model" >
					<option value="" selected="selected">=业务=</option>
					<?php echo $this->html_options(array('options'=>$this->_var['business_model'])); ?>
				</select>
				<select name="order_status" id="soStatus2">
					<option value="" selected="selected"  >=订单=</option>
					<?php echo $this->html_options(array('options'=>$this->_var['order_status'])); ?>
				</select>
				<select name="transport_status" id="soStatus3">
					<option value="" selected="selected" >=物流=</option>
					<?php echo $this->html_options(array('options'=>$this->_var['transport_status'])); ?>
				</select>
				<select <?php if ($this->_var['order_type'] == 1): ?>name="out_storage_status"<?php else: ?>name="in_storage_status"<?php endif; ?> >
					<option value="" selected="selected">=发货=</option>
					<?php echo $this->html_options(array('options'=>$this->_var['out_storage_status'])); ?>
				</select>
				<select name="team">
					<option value="" selected="selected">=战队=</option>
					<?php $_from = $this->_var['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->_push_vars('', 'v');if (count($_from)):
    foreach ($_from AS $this->_var['v']):
?>
					<option value="<?php echo $this->_var['v']['id']; ?>"><?php echo $this->_var['v']['name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->_pop_vars();; ?>
				</select>

				<select name="key_type">
					<option value="order_sn">订单号</option>
					<option value="c_id">客户名称</option>
					<option value="input_admin">交易员</option>
				</select>
				<input name="keyword" class="mini-textbox" emptyText="" style="width:100px;" onenter="onKeyEnter"/>
				<a class="mini-button" iconCls="icon-search" onclick="search()">查询</a>
				<span id="searchMsg"></span></form>
			</td>
		</tr>
	</table>
</div>
<div class="mini-fit" style="padding:1px 3px 3px;">
	<div id="gridCell" class="mini-datagrid" style="width:100%;height:100%;"url="/product/order/init?action=grid&do=<?php echo $this->_var['doact']; ?>&type=<?php echo $this->_var['order_type']; ?>&order_sn=<?php echo $this->_var['order_sn']; ?>&o_ids=<?php echo $this->_var['o_ids']; ?>&moreChoice=<?php echo $this->_var['moreChoice']; ?><?php if ($this->_var['unid']): ?>&unid=<?php echo $this->_var['unid']; ?><?php endif; ?><?php if ($this->_var['finance']): ?>&finance=<?php echo $this->_var['finance']; ?><?php endif; ?>"  idField="id"
	sizeList="[10,20,50,100]" pageSize="20" multiSelect="true"  onrowdblclick="onRowDblClick" showFilterRow="true" allowCellSelect="true" allowCellEdit="true" allowCellWrap="true">
		<div property="columns">
			<div type="checkcolumn"></div>
			<div field="order_sn" width="120" headerAlign="center" align="center" allowSort="true" renderer="onLoadHandle">订单号</div>
			<div field="order_name" width="30" headerAlign="center" align="center">抬头</div>
			<div field="order_source" width="25" headerAlign="center" align="center">来源</div>
			<div field="c_name" width="90" headerAlign="center" align="center" renderer="tips">客户名称</div>
			<div field="total_num" width="40" headerAlign="center" align="center" allowSort="true">总数</div>
			<div field="total_price" width="60" headerAlign="center" align="center" allowSort="true">总金额</div>
			<!-- <div field="pay_method" width="40" headerAlign="center" align="center" >付款</div> -->
			<?php if ($this->_var['order_type'] == 2): ?>
			<div field="in_storage_status" width="45" headerAlign="center" align="center" >入库状态</div>
			<?php else: ?>
			<div field="partner" width="40" headerAlign="center" align="center" >协助者</div>
			<div field="out_storage_status" width="45" headerAlign="center" align="center">出库状态</div>
			<?php endif; ?>
			<div field="payments_status" width="45" headerAlign="center" align="center" ><?php if ($this->_var['order_type'] == 1): ?>收款<?php else: ?>付款<?php endif; ?>状态</div>
			<div field="invoice_status" width="45" headerAlign="center" align="center" >开票状态</div>
			<div field="remark" width="45" headerAlign="center" align="center" >备注</div>
			<div field="type_status" width="70" headerAlign="center" align="center"><?php if ($this->_var['order_type'] == 1): ?>销售<?php else: ?>采购<?php endif; ?>|物流</div>
			<div field="financial_records" width="40" headerAlign="center" align="center">财务记录</div>
			<div field="input_time" width="75" headerAlign="center" align="center" allowSort="true" dateFormat="yyyy-MM-dd HH:mm">创建时间</div>
			<div field="update_time" width="75" headerAlign="center" align="center" allowSort="true" dateFormat="yyyy-MM-dd HH:mm">更新时间</div>
			<div field="cmanager" width="40" headerAlign="center" align="center">交易员</div>
			 <div name="action" width="35" headerAlign="center" align="center" cellStyle="padding:0;" renderer="onJoin">关联</div>
			 <div name="action" width="50" headerAlign="center" align="center" cellStyle="padding:0;" renderer="oncheckDetail">审核</div>
			<div name="action" width="80" headerAlign="center" align="center" cellStyle="padding:0;" renderer="onLoadDetail">操作</div>
			<div field="pay_remark" width="40" headerAlign="center" >来款标记</div>
			<div name="action" width="30" headerAlign="center" renderer="seeflow">可视化</div>
		</div>
	</div>
</div>
<div id="ordercheck" class="mini-window" title="订单审核" style="width:175px;" showModal="true" allowResize="true" allowDrag="true">
	<div id="replaceForm" class="form" >
		<table style="width:100%;">
			<tr>
				<td   style="border-bottom:solid 1px #a5acb5;text-align:right;" id="sn"></td>
			</tr>
			<tr>
				<td>
					<input name="order_status" class="mini-radiobuttonlist" textfield="text" value="2"  valuefield="id"  data="[{id: 2, text: '审核通过'}, {id: 3, text: '已取消'}]"/>
					<input name="o_id"  class="mini-hidden" id="o_id1" value="">
					<input name="s_or_p"  class="mini-hidden" id="s_or_p" value="">
					<input name="sales_type"  class="mini-hidden" id="sales_type" value="">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input id='order_remark' name="order_remark" class="mini-textarea" style="width:100%; height:70px" emptyText="请输入您的备注"/>
				</td>
			</tr>
			<tr>
			<td style="text-align:right;padding-top:5px;padding-right:20px;" colspan="2">
				<a class="mini-button" iconCls="icon-save" plain="true" href="javascript:submitcheck('ordercheck')">提交</a>
			</td>
			</tr>
		</table>
	</div>
</div>
<div id="transportcheck" class="mini-window" title="物流审核" style="width:175px;" showModal="true" allowResize="true" allowDrag="true">
	<div id="replaceForm" class="form" >
		<table style="width:100%;">
			<tr>
				<td   style="border-bottom:solid 1px #a5acb5;text-align:right;"  id="sn1"></td>
			</tr>
			<tr>
				<td>
					<input name="transport_status" class="mini-radiobuttonlist"  textfield="text" value="2"  valuefield="id"  data="[{id: 2, text: '审核通过'}, {id: 3, text: '已取消'}]"/>
					<input name="o_id"  class="mini-hidden" id="o_id2" value="">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="transport_remark" id="transport_remark" class="mini-textarea" style="width:100%; height:70px" emptyText="请输入您的备注"/>
				</td>
			</tr>
			<tr>
			<td style="text-align:right;padding-top:5px;padding-right:20px;" colspan="2">
				<a class="mini-button" iconCls="icon-save" plain="true" href="javascript:submitcheck('transportcheck')">提交</a>
			</td>
			</tr>
		</table>
	</div>
</div>
<div id="financialCheck" class="mini-window" title="财务记录" style="width:170px;height:100px;" showModal="true" allowResize="true" allowDrag="true">
	<div id="replaceForm" class="form" >
		<table style="width:100%;">
			<tr>
				<td>确定要进行财务记录吗 ?</td>
				<input name="o_id"  class="mini-hidden" id="o_id3" value="">
				<input name="financial_records"  class="mini-hidden" id="financial_records" value="">
			</tr>
			<tr>
				<td style="text-align:right;padding-top:5px;padding-right:20px;" colspan="2">
				<a class="mini-button" iconCls="icon-ok" href="javascript:submitFinancial()">是</a>
			</td>
			</tr>

		</table>
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
//搜索或刷新
var grid = mini.get("gridCell");
grid.on("drawcell", function (e) {
	var record = e.record,
		column = e.column,
		field = e.field,
		value = e.value;


	//将性别文本替换成图片
	if (column.field == "pay_remark") {
		if (!(e.value == ""||e.value==null)) {
			e.rowStyle = "background:#00FFF5";
		} else {
			e.rowStyle = "";
		}
	}


});
function search() {
	grid.load($("#soform").serializeObject(),function(e){
		$("#searchMsg").html(e.msg);
	});
}
//追加操作按钮
function onLoadHandle(e) {
	var record = e.record,s='',o_id = record.o_id,s='',order_sn = record.order_sn;
	var order_type = <?php echo $this->_var['order_type']; ?>;
	s += '<a href="javascript:viewOrdInfo('+o_id+','+order_type+')">'+order_sn+'</a> ';
	return s;
}
function tips(e) {
	var record = e.record,s='',c_name = record.c_name,c_status = record.c_status;
	if(c_status==8){
		return '<span style="color:red;">'+c_name+'</span>';
	}
	return c_name;
}
//获取订单状态
function onOrderStatus(e) {
	var record = e.record.order_status; //record.id
	return $("#soStatus2").find("option[value="+record+"]").text();
}
//获取物流状态
function onTransportStatus(e) {
	var record = e.record.transport_status; //record.id
	return $("#soStatus3").find("option[value="+record+"]").text();
}
//追加关联
function onJoin(e) {
	var record = e.record,s='',o_id = record.o_id,s='',join_id = record.join_id,store_o_id=record.store_o_id,sales_type=record.sales_type,more=record.more;
		if(store_o_id > 0 && join_id == 0){
			s += '<a href="javascript:viewOrdInfo('+store_o_id+')">关联</a> ';
		}else if(store_o_id == 0 && join_id > 0 && more > 1){
			s += '<a href="javascript:viewUniInfo('+o_id+')">关联(多)</a> ';
		}else if(store_o_id == 0 && join_id > 0){
			s += '<a href="javascript:viewOrdInfo('+join_id+')">关联</a> ';
		}else if(o_id == join_id && join_id>0 && store_o_id>0){
			s += '<a href="javascript:viewOrdInfo('+store_o_id+')">关联</a> ';
		}else if(o_id == store_o_id && join_id>0 && store_o_id>0){
			s += '<a href="javascript:viewOrdInfo('+join_id+')">关联</a> ';
		}
	return s;
}
search();
function onKeyEnter(e) {
	search();
}

function LoadOrderType(e) {
	var record = e.record.order_type;
	return $("#soStatus").find("option[value="+record+"]").text();
}
//审核
function oncheckDetail(e){
	var record = e.record,s='',oid = record.o_id,order_status=record.order_status,transport_status=record.transport_status,order_type = record.order_type,sales_type = record.sales_type,node_flow = record.node_flow;
	if(order_status =='3' || transport_status =='3'){
		s +='已取消';
	}else if(order_status =='2' && transport_status =='2'){
		s +='审核通过';
	}else{
		order_type = (order_type=='销售订单' ? '1' : '2');
		if(order_type=='1'){	//销售
			if(order_status != '2' && node_flow==true) s += '<a href="javascript:orderSaCheck('+oid+','+sales_type+')">销售审</a>&nbsp;&nbsp;';
			if(transport_status != '2' && node_flow==true) s += '</br><a href="javascript:transportCheck('+oid+')"> 物流审</a>';
		}else{
			if(order_status != '2' && node_flow==true) s += '<a href="javascript:orderPuCheck('+oid+')">采购审</a>&nbsp;&nbsp;';
			if(transport_status != '2' && node_flow==true) s += '</br><a href="javascript:transportCheck('+oid+')"> 物流审</a>';
		}
	}
	return s;
}
//销售审核
var ordInfo = mini.get("ordercheck");
function orderSaCheck(oid,sales_type){
	$('#sn').html("查：<a href='javascript:viewOrdInfo("+oid+",<?php echo $this->_var['order_type']; ?>)'>"+grid.getSelected().order_sn+"</a>");
	mini.get('o_id1').setValue(oid);
	mini.get('sales_type').setValue(sales_type);
	ordInfo.show();
}
//采购审核
function orderPuCheck(oid){
	$('#sn').html("查：<a href='javascript:viewOrdInfo("+oid+",<?php echo $this->_var['order_type']; ?>)'>"+grid.getSelected().order_sn+"</a>");
	mini.get('o_id1').setValue(oid);
	mini.get('s_or_p').setValue(1); //销售or采购
	ordInfo.show();
}
//物流审核
var tranInfo = mini.get("transportcheck");
function transportCheck(oid){
	$('#sn1').html("查：<a href='javascript:viewOrdInfo("+oid+",<?php echo $this->_var['order_type']; ?>)'>"+grid.getSelected().order_sn+"</a>");
	mini.get('o_id2').setValue(oid);
	tranInfo.show();
}
//提交审核结果
function submitcheck(type) {
	var form1 = new mini.Form(type);
	form1.validate();
	if (form1.isValid() == false) return;
	var o = form1.getData();
	grid.loading("数据提交中，请稍后......");
	var json = mini.encode(o);

	var callback=function(data){
		if(data.err!='0'){
			grid.unmask();
			alert(data.msg);
			return false;
		}else{
			mini.get("order_remark").setValue("");
			mini.get("transport_remark").setValue("");
			grid.reload();
			ordInfo.hide();
			tranInfo.hide();
		}
	}
	var str = '/product/order/'+type;
	utils.ajax(str,{data:json},callback,"POST","json");
}
//财务记录
var financial = mini.get("financialCheck");
function financialInfo(oid){
	mini.get('o_id3').setValue(oid);
	mini.get('financial_records').setValue(1);
	financial.show();
}

function submitFinancial(){
	var form = new mini.Form('financialCheck');
	form.validate();
	if (form.isValid() == false) return;
	var o = form.getData();
	grid.loading("数据提交中，请稍后......");
	var json = mini.encode(o);
	var callback=function(data){
		if(data.err!='0'){
			grid.unmask();
			alert(data.msg);
			return false;
		}else{
			grid.reload();
			financial.hide();
		}
	}
	utils.ajax('/product/order/financialCheck',{data:json},callback,"POST","json");
}
//新增产品详情
function onLoadDetail(e){
	var record = e.record,s='',oid = record.o_id,see = record.see,order_type = record.order_type,order_status=record.order_status,transport_status=record.transport_status,c_status=record.collection_status,i_status=record.invoice_status,sales_type=record.sales_type,join_id=record.join_id,is_join_in=record.is_join_in,out_storage_status=record.out_storage_status,in_storage_status=record.in_storage_status,purstatus=record.pur_status,is_super=record.is_supper,one_c_status=record.one_c_status,one_b_status=record.one_b_status,financial_records=record.financial_records,is_join_check=record.is_join_check,ship_status=record.ship_status;
	order_type = (order_type=='销售订单' ? '1' : '2');
	if(order_type=='1'){	//销售
		if(is_super==1 && i_status !=='全部开票' && ship_status==1){
			s+='<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>|';
		}else if (purstatus==1 && is_super !=1 &&ship_status==1) {
			s+='<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>|';
		}

		// s+='<a href="javascript:salecompact('+oid+')">合同</a>&nbsp;|&nbsp;';
		if(order_status =='3' || transport_status =='3') return;

		//向辉修改财务按钮出现位置，销售物流审核通过后既可以出现
		if( order_status =='2' && transport_status =='2' ){
			if(financial_records == '否'){
				s+='<a href="javascript:financialInfo('+oid+')">财务</a>';
			}
		}


			var where1= sales_type == '1' ? (order_status =='2' && transport_status=='2') : (order_status =='2') ;
			if(where1){   //先采后销和先销后采审核条件不同
				if( (sales_type == '1' && join_id == '0') || (sales_type == '2' && join_id != '0') ){ //先采后销
					if( join_id != '0' && is_join_check == '0' ){ //关联的采购未审核
						s +='(采购单审核中...)';
						if(see=='1'){
							s+='&nbsp;|&nbsp;<a href="javascript:salecompact('+oid+')">合同</a>';
						}
						return s;
					}else if( join_id != '0' && is_join_check == '2' ){ //关联的采购审核不通过
						s +='(采购单审核不通过...)';
						return s;
					}else{

						if( out_storage_status != '已出库'){ //没有全部发货时可见发货按钮
							if( order_status =='2' && transport_status =='2' ){
								// if(financial_records == '否'){
								// 	s+='<a href="javascript:financialInfo('+oid+')">财务</a>';
								// }
								if(sales_type == '1'){
									s+='&nbsp;|&nbsp;<a href="javascript:outStorage('+oid+')">发货</a>';
								}else{ //先销后采
									if(is_join_in == '1'){
										s+='&nbsp;|&nbsp;<a href="javascript:outStorage('+oid+')">发货</a>';
									}
								}

							}
						}

						if (c_status !='3' && one_c_status !='1'  && transport_status =='2') {
						s+='&nbsp;|&nbsp;<a href="javascript:transaction('+oid+','+order_type+')">收款</a>';
						}
						//purstatus为对应采购订单开票状态
						/*
						if (i_status !='全部开票' && purstatus == '3' && c_status =='3' && !one_b_status) {
							s+='&nbsp;|&nbsp;<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>';
						}*/

						// if (i_status !='全部开票'  && c_status =='3' && !one_b_status) {
						// 	s+='&nbsp;|&nbsp;<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>';
						// }

						if (c_status =='3' && i_status =='全部开票') {
							s+='&nbsp;|&nbsp;<a href="javascript:viewOrdInfo('+oid+','+order_type+')">查看</a>';
						}

						/*
						if (purstatus==1) {
							s+='&nbsp;|&nbsp;<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>';
						}*/
						/*
						if (purstatus != '3' && c_status =='3') {
								s +='&nbsp;|&nbsp;(采购未开票...)';
						}*/

					}
				}else if(join_id == '0'){ //先销后采->下采购单虚拟入库->发货
					s+='&nbsp;|&nbsp;<a href="javascript:changePurchase('+oid+')">生成采购</a>';
				}
			}
		if(see=='1'){
			s+='&nbsp;|&nbsp;<a href="javascript:salecompact('+oid+')">合同</a>';
		}

	}else{   //采购
		if(order_status =='3' || transport_status =='3')  return;
		if(order_status =='2' && transport_status=='2'){
			if(in_storage_status != '已入库'){ //没有全部入库时可见入库按钮
				s+='<a href="javascript:inStorage('+oid+','+join_id+')">入库</a>&nbsp;|&nbsp;';
			}

			if (c_status !='3' && one_c_status !='1') {
				s+='<a href="javascript:transaction('+oid+','+order_type+')">付款</a>&nbsp;|&nbsp;';
			}

			if (i_status !='全部开票' && c_status =='3' && !one_b_status && is_super !=1) {
				s+='<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>&nbsp;|&nbsp;';
			}
			if(is_super==1 && i_status !='全部开票' && !one_b_status){
				s+='<a href="javascript:addInvoice('+oid+','+order_type+')">开票</a>|';
			}
			if (c_status =='3' && i_status =='全部开票') {
				s+='<a href="javascript:viewOrdInfo('+oid+','+order_type+')">查看</a>&nbsp;|&nbsp;';
			}
			if(financial_records == '否'){
				s+='<a href="javascript:financialInfo('+oid+')">财务</a>&nbsp;|&nbsp;';
			}

		}
		if(see=='1'){
			s+='&nbsp;|&nbsp;<a href="javascript:salecompact('+oid+')">合同</a>';
		}
	}
	return s;
}
//添加流程可视化
function seeflow(e){
	var record = e.record,s='',oid = record.o_id,order_type = record.order_type;
	order_type = (order_type=='销售订单' ? '1' : '2');
	return s = '<a href="javascript:orderflow('+oid+','+order_type+')">可视化</a>';
}
//展示可视化页面
function orderflow(oid,order_type){
	mini.open({
		url: "/product/order/getFlow?o_id="+oid+"&type="+order_type,
		width: 830, height:620,
	});
}
//申请付款收款
function transaction(oid,order_type){
	var width=430, height=420,type=order_type;
	if(type=='1'){
		title="新增收款申请";
	}else{
		title="新增付款申请";
	}
	mini.open({
		url: "/product/collection/transactionInfo?o_id="+oid+"&order_type="+type,
		showMaxButton:true,
		 title: title, width: width, height:height,
		ondestroy: function (action) {
			/*if(action=='save'){ //重新加载
				grid.reload();
			}
			if(action=='cancel'){ //重新加载
				grid.reload();
			}*/
			grid.reload();
		}
	});
}

//申请开票
function addInvoice(oid,order_type){
	var width=800, height=680,type=order_type;title="新增开票申请";
	$.post("/product/billing/chkaddInvoice",{
		o_id:oid,
		order_type:type,
		is_head:1
	},function(data){
		//成功
		if(data.err==0){
			mini.open({
				//有invoice表示是开票
				url: "/product/billing/transactionInfo?o_id="+oid+"&order_type="+type+"&is_head=1",
				showMaxButton:true,
				 title: title, width: width, height:height,
				ondestroy: function (action) {
					if(action=='save'){ //重新加载
						grid.reload();
					}
				}
			});
		}else{
			mini.alert(data.msg);
			grid.reload();
		}
		//console.log(data);
	},'json');
}
//先销后采 生成采购单
function changePurchase(o_id){
	var width=845, height=650;
	title="生成采购订单";
	mini.open({
		url: "/product/order/changePurchase?o_id="+o_id,
		showMaxButton:true,
		 title: title, width: width, height:height,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}

// //追加销售明细
// function addSaleLog(oid){
// 	mini.open({
// 		url: "/product/saleLog/info?o_id="+oid,
// 		showMaxButton:true,
// 		title: '订单明细', width: 750, height:550,
// 		ondestroy: function (action) {
// 			if(action=='save'){ //重新加载
// 				grid.reload();
// 			}
// 		}
// 	});
// }
// //追加采购明细
// function addPurchaseLog(oid){
// 	mini.open({
// 		url: "/product/purchaseLog/info?o_id="+oid,
// 		showMaxButton:true,
// 		title: '订单明细', width: 280, height:380,
// 		ondestroy: function (action) {
// 			if(action=='save'){ //重新加载
// 				grid.reload();
// 			}
// 		}
// 	});
// }
//发货弹窗
function outStorage(oid){
	mini.open({
		url:"/product/outStorage/info?o_id="+oid,
		showMaxButton:true,
		title:'发货记录新增',width:850,height:420,
		ondestroy: function(action){
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//入库弹窗
function inStorage(oid,join_id){
	mini.open({
	url:"/product/inStorage/info?o_id="+oid+"&join_id="+join_id,
	showMaxButton:true,
	title:'入库记录新增',width:850,height:450,
	ondestroy: function(action){
		if(action=='save'){ //重新加载
			grid.reload();
		}
	}
	});
}
//查看订单相关信息
function viewOrdInfo(oid,o_type){
	mini.open({
		url: "/application/order/info?oid="+oid+'&o_type='+o_type,
		showMaxButton:true,
		title: "查看订单相关信息",
		width: 800, height:500,
		ondestroy: function(action){
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//查看多笔关联订单的信息
function viewUniInfo(oid){
	mini.open({
		url: "/product/order/init?unid="+oid,
		showMaxButton:true,
		title: "查看订单相关信息",
		width: 1200, height:500,
		ondestroy: function(action){
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//行内编辑后保存数据
function saveData() {
  var data = grid.getChanges();
  var json = mini.encode(data);
  if(json.length<0) return false;

  grid.loading("保存中，请稍后......");
  var callback=function(data){
	grid.unmask();
	if(data.err=='0'){
	  grid.reload();
	}else{
	  alert(data.msg);
	  grid.reload();
	  return false;
	}
  }
  utils.ajax('/product/order/save',{data:json},callback,"POST","json");
}
//新增销售订单
function addSale(){
	mini.open({
		url: "/product/order/info?order_type=1",
		showMaxButton:true,
		title: '新增销售订单', width: 900, height: 650,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//新增采购订单
function addPur(){
	mini.open({
		url: "/product/order/info?order_type=2",
		showMaxButton:true,
		title: '新增采购订单', width: 845, height: 650,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
//删除
// function remove() {
// 	var rows = grid.getSelecteds(),_ids=new Array();
// 	if(rows.length<1) return;
// 		for(var i=0;i<rows.length;i++){
// 	var _id=parseInt(rows[i].o_id);
// 	if(_id<1){
// 		grid.removeRow(rows[i],false);
// 	}else{
// 		_ids.push(_id);
// 	}
//   }
// 	var ids=_ids.join(',');
// 	if(ids=='') return;
// 	mini.confirm("确定删除？", "提示", function(action){
// 	if(action!='ok') return;
// 	var callback=function(data){
// 	if(data.err=='0'){
// 		grid.reload();
// 	}else{
// 		alert(data.msg)
// 		return false;
// 	}
// 	}
// 	utils.ajax('/product/order/remove',{ids:ids},callback,"POST","json");
//   });
// }
//双击弹出
function onRowDblClick(e) {
	var record = e.record, status=record.status,order_status=record.order_status,transport_status=record.transport_status;
	console.log(record);
	if(order_status=='1' && transport_status=='1'){ //未审核的允许编辑
		onEdit(e.row);
	}
}
function onEdit(obj) {
	order_type = (obj.order_type=='销售订单' ? '1' : '2');
	if (obj) {
		var width=845,height=650,title='产品信息';
		urlStr="/product/order/editOrder?o_id="+obj.o_id+"&order_type="+order_type;
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



//强制选择归属公司
function usrChoose(e){
	var btn = this;
		mini.open({
		url: "product/factory/init?do=search",
		title: "选择公司",
		width: 1200,
		height: 550,
		onload: function () {
			var iframe = this.getIFrameEl();
			iframe.contentWindow.SetData();
		},
		ondestroy: function (action) {
			if (action == "ok") {
				var iframe = this.getIFrameEl();
				var data = iframe.contentWindow.GetData();
				data = mini.clone(data);    //必须
				if (data) {
					btn.setValue(data.fid);
					btn.setText(data.f_name);
					$("#"+btn.id+"\\$value").val(data.fid);
				}
			}
		}
	});
}


//生成pdf文件
function salecompact(o_id){
	var width=845, height=650;
	title="生成合同";
	mini.open({
		url: "/product/pdf/pdf?oid="+o_id,
		showMaxButton:true,
		 title: title, width: width, height:height,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}

//废除订单
function del() {
	var rows = grid.getSelecteds(),_ids=new Array();
	if(rows.length<1) return;
	for(var i=0;i<rows.length;i++){
		_ids[i]=parseInt(rows[i].o_id);
	}
	var ids=_ids.join(',');
	if(ids=='') return;
	mini.confirm("确定撤销该订单吗？</br>1：设置无效需先撤销牵连的流水</br>2：产生的库存记录会被返还</br>3：订单相关的内容会被撤销</br>4：订单会被标记为无效", "提示",function(action){
			if(action!='ok') return;
			var callback=function(data){
				if(data.err!='0'){
					alert(data.msg)
					return false;
				}else{
					grid.reload();
				}
			}
			utils.ajax('/product/order/orderBack',{ids:ids},callback,"POST","json");
		}
	);
}

//合并生成pdf文件
function compact(){
	var rows = grid.getSelecteds(),_ids=new Array();
	if(rows.length<1) return;
	for(var i=0;i<rows.length;i++){
		_ids[i]=parseInt(rows[i].o_id);
	}
	var ids=_ids.join(',');
	if(ids=='') return;
	mini.open({
		url: "/product/pdf/pdf?oid="+ids,
		showMaxButton:true,
		 title: '生成合同', width: 845, height:650,
		ondestroy: function (action) {
			if(action=='save'){ //重新加载
				grid.reload();
			}
		}
	});
}
</script>