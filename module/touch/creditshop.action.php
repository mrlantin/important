<?php
/**
*积分商城
*/
class creditshopAction extends homeBaseAction
{
	public function __init() {
		$this->debug = false;
		$this->db=M('public:common')->model('points_bill');
    }
    //返回积分明细
    public function get_creditshop(){
    	//获取用户
		$uid=sget('uid','i',0);
		$result = array();
		if($uid>0){
			//$personalBill = M('touch:creditdetail')->getCreditDetail($uid);
			$result = M('touch:creditshop')->getCreditShop($uid);
		}
		$this->json_output($result);
	}
}