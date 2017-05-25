__layout|public:mini_layout|layout__
<div style="margin:3px 3px 0;">
  <table width="90%" align="center">
      <form id="soform">
        <tr>
            <td colspan="0">&nbsp;</td>
        </tr>
        <tr>
            <td width="60px">公司名字：</td>
            <td align="left">
                <input type="text" style="width:200px;" name="c_name" id = "c_name" value="" />
                <a class="mini-button" style="width:60px;" iconCls="icon-search" onclick="search()">确定</a>
                <a class="mini-button" style="width:60px;" onClick="onCancel()">取消</a>
            </td>
        </tr>
        <tr>
            <td height="24">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><span id="searchMsg"></span></td>
        </tr>
      </form>
  </table>
</div>
<?php if ($this->_var['doact'] != 'search'): ?>
<div class="mini-fit" style="padding:1px 3px 3px;">
    <div id="gridCell" class="mini-datagrid" style="width:100%;height:100%;"  sizeList="[10,20,50,100]" pageSize="20" allowCellWrap="true" url="/user/customercheck/init?action=grid&do=<?php echo $this->_var['doact']; ?>" idField="c_id">
        <div property="columns">
            <div field="c_id" width="100" headerAlign="center">ID</div>
            <div field="c_name" width="200" headerAlign="center">公司名字</div>
            <div field="status" width="60" headerAlign="center" align="center">状态</div>
            <div field="chanel" width="60" headerAlign="center" align="center">渠道</div>
            <div field="type" width="60" headerAlign="center" align="center">客户类型</div>
            <div field="customer_manager" width="60" headerAlign="center" align="center">交易员</div>
        </div>
    </div>
</div>
<?php endif; ?>
<script type="text/javascript">
mini.parse();
var grid = mini.get("gridCell");
grid.load();
function search() {
    grid.load($("#soform").serializeObject(),function(e){
        $("#searchMsg").html(e.msg);
    });
}
function onKeyEnter(e) {
    search();
}

function CloseWindow(action) {
    if (window.CloseOwnerWindow) return window.CloseOwnerWindow(action);
    else window.close();
}
function onComfirm() {
    CloseWindow("ok");
}
function onCancel() {
    CloseWindow("cancel");
}
function GetData() {
    var row = grid.getSelected();
    return row;
}

</script>