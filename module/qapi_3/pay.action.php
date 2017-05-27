<?php
/**
 * Created by PhpStorm.
 * User: sick
 * Date: 17-5-26
 * Time: 下午2:31
 */
class payAction extends baseAction
{
    public $payment;
    public $cache;
    public function __init(){
        parent::__init();
         $this->cache = E ('RedisClusterServer', APP_LIB.'class');
         E ('multiPay', APP_LIB.'class');
    }

    /**
     * 网上支付
     * @api {post} /qapi_3/pay/getPrePayOrder 网上支付-获取预定义订单
     * @apiVersion 3.1.0
     * @apiName  getPrePayOrder
     * @apiGroup pay
     * @apiUse UAHeader
     *
     * @apiParam {String} token       token
     * @apiParam {int} type       1  weixin zhifu     2支付宝
     * @apiParam {Number} goods_id       商品id（非必填）  //  为了以后的商品，也用支付，现在我们只用来充塑豆 ，传total_fee
     * @apiParam {Number} goods_num       商品数量（非必填）
     * @apiParam {String} total_fee       总金额  单位元（必填）
     *
     *
     *
     * @apiSuccess {String}  msg   描述
     * @apiSuccess {Boolean} err   错误码
     * @apiSuccess {Array} data   信息
     *
     * @apiSuccessExample Success-Response:
     *     {
     *      "err":0
     *      "info":"xxx"
     *      }
     *
     *
     */

   public function getPrePayOrder(){

       $user_id = $this->checkAccount();
       $type = sget('type','i',1);   // 1 weixin   2  支付宝
       $goods_id = sget('goods_id','i');
       $goods_num = sget('goods_num','i');
       $total_fee = sget('total_fee','s');//  单位为元
       $total_fee = sprintf("%.2f", $total_fee);
       $total_fee = $total_fee + 0;

       if(empty($goods_id) && empty($goods_num) && empty($total_fee)){
           $this->_errCode(6);
       }
       if(empty($goods_id) && empty($goods_num) && !empty($total_fee)){
           $msg = $this->goods_name;
       }

       if($type == 1)
       {
           $order_id =$this->buildOrderId ();
           $send_amount = 0;
           $send_amount = (int)($total_fee*100);
           $this->payment = new multiPay($type);
           $res = $this->payment->getPrePayOrder($order_id, $send_amount);

           $order  = M('order:onlineOrder');

           $data = $order ->addOrder($order_id,$type,$res['prepay_id'],$total_fee,$goods_id,$goods_num,$user_id,$this->uuid,$res['appid'],$this->platform,$res['status'],$res['remark']);

           if($res['status'] == 0&&!empty($data)) {
               $x = $this->payment->getOrder($res['prepay_id']);
               $this->json_output(array('err'=>0,'msg'=>'订单生成成功','data'=>$x));
           }else{
               $this->json_output(array('err'=>1,'msg'=>'订单生成失败'));
           }
       }else{
           $this->_errCode(5);
       }
   }





}