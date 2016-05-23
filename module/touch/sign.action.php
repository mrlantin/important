<?php
/**
*签到控制器
*/
class signAction extends homeBaseAction{
{
	protected $pointsSingModel,$signDay,$today,$weekStart;

	public function __init(){
		$this->pointsSingModel = M('points:pointsSign');
        $this->signDay = array('1'=>0, '2'=>0, '3'=>0, '4'=>0, '5'=>0, );
        $this->today = date('w');
        //每周签到开始的时间
        $this->weekStart = strtotime(date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600)));
	}
	// 签到
	public function signon(){

		$this->is_ajax = true;
		if(!$_SESSION['uid'])
			{
				$this->json_output(array('err'=>1,'msg'=>'请求超时,请重新登录!'));
			}
		$uid = $_SESSION['uid'];
        if($uid>0){
            // 周末不支持签到
            if( $this->today == 0 || $this->today == 6 ){
                exit(json_encode(array('status'=> 0, 'msg' => '周一到周五可以签到')));
            }
            // 随机积分
            $points = 50;
            if($data = $this->pointsSingModel->where('uid='.$uid)->getRow()){
                //最后签到时间小于今天的凌晨时间戳可以签到,每天一次
                if( $data['sing_time'] < strtotime(date('Y-m-d', time())) ){
                    //上周最后签到时间小于本周开始时间 重置本周签到状态
                    if( $data['sing_time'] < $this->weekStart ){
                        $statusData = $this->signDay;
                    }else{
                        $statusData = json_decode($data['sing_status'], true);
                    }
                    $statusData[$this->today] = 1;
                    $data['sing_status'] = json_encode($statusData);
                    $data['sing_time'] = time();
                    // 增加积分，先改变了签到的状态=1
                    if( array_sum($statusData) ==5 ){
                        $points = intval($points)*2;
                    }
                    $billModel=M('points:pointsBill');
                    $billModel->startTrans();
                    try {
                        if(!$this->pointsSingModel->where('uid='.$uid)->update($data)) throw new Exception('系统错误。code:201');
                        if(!$billModel->addPoints($points, $uid, 1)) throw new Exception('系统错误。code:202');
                    } catch (Exception $e) {
                        $billModel->rollback();
                        exit(json_encode(array('status' => 0, 'msg' => $e->getMessage())));
                    }
                    $billModel->commit();
                    exit(json_encode( array('status' => 1, 'msg' => '签到成功', 'points' => $points)) );
                }else{
                    exit(json_encode(array('status'=> 0, 'msg' => '今天已经签到过了')));
                }
            }else{
                $this->signDay[$this->today] = 1;
                $data = array('uid' =>$uid, 'sing_status' => json_encode($this->signDay), 'sing_time' => time());
                $billModel=M('points:pointsBill');
                $billModel->startTrans();
                try {
                    if(!$this->pointsSingModel->add($data)) throw new Exception('系统错误。code:201');
                    if(!$billModel->addPoints($points, $uid, 1)) throw new Exception('系统错误。code:202');
                } catch (Exception $e) {
                    $billModel->rollback();
                    exit(json_encode(array('status' => 0, 'msg' => $e->getMessage())));
                }
                $billModel->commit();
                exit(json_encode(array('status' => 1, 'msg' => '签到成功', 'points' => $points)));
            }

        }else{
            exit(json_encode(array('status' => 0, 'msg' => '签到失败')));
        }
	}
}