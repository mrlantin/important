<?php
/**
 * IP白名单 
 */
class whiteIpModel extends model{
	public function __construct() {
		parent::__construct(C('db_default'), 'white_ip');
	}
	
	/*
	 * 检查ip白名单
	 * @access public
	 * @param string ip 用户IP
     * @return bool
	 */
	public function checkIp($ip=''){
		$white=$this->whiteIp();
		if(empty($white)){
			return false;	
		}
		return preg_match("/^(".$white.")$/", $ip);
	}
	
	/*
	 * 获取ip白名单
	 * @access private
     * @return string
	 */
	private function whiteIp(){
		$_key='whiteIp';
		$cache=cache::startMemcache();
		$data=$cache->get($_key);
		if(empty($data)){
			$arr=$this->model('white_ip')->where('expiration>'.CORE_TIME)->getAll();
			$vip=array();
			foreach($arr as $k=>$v){
				for($i==1;$i<=4;$i++){
					if($v['ip'.$i]==-1){
						$v['ip'.$i]='\d+';
					}
				}	
				$vip[]="$v[ip1]\.$v[ip2]\.$v[ip3]\.$v[ip4]";
			}
			$data=implode('|',$vip);
			$cache->set($_key,$data,86400); //加入缓存
		}
		return $data;
	}
}
?>