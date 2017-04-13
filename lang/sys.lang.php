<?php
/**
 * 项目语言项
*/
return array(
	//登录渠道:1web,2app,3wap,4微信(保留)
	'user_chanel'=>array(
		1=>'WEB',
		2=>'APP',
		6=>'塑料圈',
	),
	//物流公司
	'ship_company'=>array(
		1=>'企辉物流',
		2=>'拓桥物流',
		3=>'凤莲物流',
		5=>'灏泰物流',
		6=>'厦门优创斯特',
		7=>'宁波江川达',
		8=>'宁波兴禹',
		9=>'浙江道达通',
		10=>'浙江百富',
		11=>'无锡夏氏',
		12=>'常州飞鸿',
		13=>'常州货运组',
		14=>'其他',

	),
	//性别
	'sex'=>array(
		0=>'男',
		1=>'女',
	),
	//是否默认联系人
	'is_default'=>array(
		0 => '否',
		1 => '是'
	),
	//客户类型
	'company_type'=>array(
		1=>'工厂',
		2=>'贸易',
		3=>'工贸一体',
	),
    //供应商类型
    'supplier_type'=>array(
        1=>'物流公司',
        2=>'仓储公司',
        3=>'综合',
        10=>'其它'
    ),
    //供应商联系人状态
    'supplier_contact_type'=>array(
        1=>'有效',
        2=>'无效',

    ),
	//客户级别
	'company_level'=>array(
		1=>'A级100万以上',
		2=>'B级30-100万',
		3=>'C级10-30万',
		4=>'D级10万以下',
	),
	//客户来源渠道
	'company_chanel'=>array(
		0=>'电话',
		1=>'我的塑料网',
		2=>'网络',
		3=>'客户介绍',
		4=>'朋友介绍',
		5=>'地面推广',
		6=>'塑料圈',
		7=>'其它',
	),

	//客户信用等级
	'credit_level'=>array(
		1=>'A级',
		2=>'B级',
		3=>'C级',
		4=>'D级',
		5=>'E级',
	),

	//客户状态
	'status'=>array(
		1=>'待审核',
		2=>'已审核',
		3=>'不通过',
		4=>'已作废',
	),
	//客户认证
	'identification'=>array(
		1=>'待认证',
		2=>'已认证',
	),
	//产品分类
	'product_type'=>array(
		1=>'HDPE',
		2=>'LDPE',
		3=>'LLDPE',
		4=>'均聚PP',
		5=>'PVC',
		6=>'共聚PP',
		7=>'ABS',
		8=>'PC',
		9=>'MABS',
		10=>'HIPS',
		11=>'GPPS',
		12=>'EVA',
		13=>'EAA',
		14=>'AS',
		15=>'EPDM',
		16=>'POE',
	),

	//财务要求的产品分类
	//聚乙烯：HDPE、LDPE、LLDPE、EVA，聚丙烯：均聚PP、共聚PP，塑料ABS：ABS、MABS，塑料PC:PC,聚苯乙烯:HIPS、GPPS

	'finance_p_type'=>array(
		1=>'聚乙烯',
		2=>'聚丙烯',
		3=>'塑料ABS',
		4=>'塑料PC',
		5=>'聚苯乙烯',
		6=>'其他',
	),
	//加工级别
	'process_level'=>array(
		1=>'重包',
		2=>'涂覆',
		3=>'薄膜',
		4=>'滚塑',
		5=>'注塑',
		6=>'中空',
		7=>'管材',
		8=>'拉丝',
		9=>'纤维',
		10=>'茂金属',
		11=>'其他',
	),
	//期货周期
	'period'=>array(
		1=>'10天以内',
		2=>'10-20天',
		3=>'20-30天',
		4=>'30天以上',
	),
	//货物类型
	'cargo_type'=>array(
		1=>'现货',
		2=>'期货',
	),
	//价格单位
	'price_type'=>array(
		1=>'RMB',
		2=>'USD',
	),
	//归属区域 1华东 2华南 3华北
	'belong_area'=>array(
		1=>'华东',
		2=>'华南',
		3=>'华北',
		4=>'华中',
		5=>'东北',
		6=>'西北',
		7=>'西南',
		8=>'青藏',
	),
	//货物状态
	'product_status'=>array(
		1=>'上架',
		2=>'下架',
		3=>'待审核',
		4=>'审核不通过',
	),
	//采购信息审核状态
	'purchase_status'=>array(
		1=>'待审核',
		2=>'审核通过',
		3=>'洽谈中',
		4=>'交易成功',
		5=>'无效',
		6=>'过期',
	),
	//是否是vip客户
	'is_vip'=>array(
		1=>'是',
		2=>'否',
	),
	//是否可以议价
	'bargain'=>array(
		1=>'可议价',
		2=>'实价',
	),

	//订单来源
	'order_source'=>array(
		1=>'网站',
		2=>'ERP',
		3=>'APP',
		4=>'接口',
		5=>'其他',
	),
	//付款方式
	'pay_method'=>array(
		1=>'银行电汇',
		2=>'现金',
		3=>'支票',
		4=>'转账',
		5=>'托收',
		6=>'东方付通',
	),
	//运输方式
	'transport_type'=>array(
		1=>'乙方自提',
		2=>'甲方送货',
		3=>'甲方代托运',
	),
	//业务模式
	'business_model'=>array(
		1=>'利润',
		2=>'撮合',
	),
	//财务记录
	'financial_records'=>array(
		1=>'是',
		2=>'否',
	),
	//订单审核状态
	'order_status'=>array(
		1=>'待审核',
		2=>'已审核',
		3=>'已取消',
		4=>'已完成',
	),
	//订单物流审核
	'transport_status'=>array(
		1=>'待审核',
		2=>'已审核',
		3=>'已关闭',
	),
	//发货状态
	'goods_status'=>array(
		1=>'待发货',
		2=>'部分发货',
		3=>'全部发货',
	),

	//数量单位
	'unit'=>array(
		1=>'吨',
	),
	//入库状态
	'in_storage_status'=>array(
		1=>'待入库',
		2=>'部分入库',
		3=>'已入库',
	),
	//出库状态
	'out_storage_status'=>array(
		1=>'待出库',
		2=>'部分出库',
		3=>'已出库',
	),
	//销售类型
	'sales_type'=>array(
		1=>'先采后销',
		2=>'先销后采',
	),
	//采购类型
	'purchase_type'=>array(
		1=>'销售采购',
		2=>'备货采购',
	),
	//出库类型
	'out_type'=>array(
		1=>'销售出库',
		2=>'直接出库',
	),
	//入库类型
	'in_type'=>array(
		1=>'采购入库',
		2=>'直接入库',
	),
	//订单类型
	'order_type'=>array(
		1=>'销售订单',
		2=>'采购订单',
	),
	//订单开票类型
	'billing_type'=>array(
		1=>'销售订单开票',
		2=>'采购订单开票',
	),

	//交货方式
	'ship_type'=>array(
		1=>'自提',
		2=>'送货上门',
		3=>'其他',
	),
	//积分订单状态
	'points_status'=>array(
		1=>'待确认',
		2=>'待发货',
		3=>'已发货',
		4=>'订单取消',
		5=>'订单完成',
	),

	//快递公司
	'express_company'=>array(
		1=>'顺丰',
		2=>'EMS',
		3=>'圆通',
		4=>'中通',
		5=>'汇通',
		6=>'申通',
		7=>'韵达',
		8=>'天天',
		9=>'宅急送',
	),
	//关注状态
	'attention_status'=>array(
		1=>'关注中',
		2=>'已取消',
		),
	//操作
	'operate'=>array(
		1=>'取消关注',
		2=>'重新关注',
		),

	//商品分类
	'goods_category'=>array(
		1=>'家居',
		2=>'数码',
		3=>'母婴',
		4=>'玩具',
		5=>'食品',
		6=>'美容',
		7=>'现金红包',
		8=>'京东购物卡',
		9=>'置顶',

	),

	//站内信消息类型
	'msg_type'=>array(
		1=>'系统消息',
		2=>'报价信息',
		3=>'采购信息',
		4=>'自营订单',
		5=>'联营订单',


	),
	//站内信消息状态
	'msg_status'=>array(
		1=>'未读',
		2=>'已读',
	),

	//交易公司账户
	'company_account'=>array(
		1=>'中晨',
		2=>'梓辰',
		3=>'嘉兴鼎辉',
	),

	//报价上架下状态
	'shelve_type'=>array(
		'1'=>'上架',
		'2'=>'下架',
	),

	//管理员审批日志
	'operation_type'=>array(
		'recharge'=>'充值',
		'credit_level'=>'借贷等级',
		'paypasswd_modify'=>'支付密码修改',
		'passwd_modify'=>'登录密码修改',
		'passwd_find'=>'找回登录密码',
		'phone_modify'=>'手机修改',
		'paypasswd_find'=>'找回交易密码',
		'idcard_verify'=>'身份证认证',
		'bank_verify'=>'银行卡认证',
		'paypasswd_set'=>'设置交易密码',
		'withdraw'=>'提现',
		'questions'=>'设置安全问题',
		'email_verify'=>'验证邮箱',
		'email_modify'=>'修改邮箱',
		'riskrating'=>'风险评估',
		'bank_amount'=>'修改银行认证金额',
		'incharge_amount'=>'给会员充值',
		'transfer_amount'=>'会员间转账',
		'edit_whitelist'=>'设置用户提现白名单',
		'edit_rfwhitelist'=>'设置用户推荐白名单',
		'set_customer_manager'=>'设置客户经理',
		'unlock_user'=>'解除登录锁定用户',
		'reset_passwd'=>'重置用户密码',
		'reset_paypasswd'=>'重置用户交易密码',
	),
	//单笔订单付款状态
	'payment_status'=>array(
		'1'=>'待付款',
		'2'=>'已完成',
		'3'=>'已取消',
	),
	//单笔订单收款状态
	'gatheringt_status'=>array(
		'1'=>'待收款',
		'2'=>'已完成',
		'3'=>'已取消',
	),
	//订单付款状态
	'collection_p_status'=>array(
		1=>'待付款',
		2=>'部分付款',
		3=>'全部付款',
	),
	//订单收款状态
	'collection_g_status'=>array(
		1=>'待收款',
		2=>'部分收款',
		3=>'全部收款',
	),
	//单笔订单开票状态
	'invoice_one_status'=>array(
		'1'=>'待开票',
		'2'=>'已完成',
		'3'=>'已取消',
	),

	//订单开票状态
	'invoice_status'=>array(
		1=>'待开票',
		2=>'部分开票',
		3=>'全部开票',
	),
	//调价动态涨跌状态
	'dynamic_status'=>array(
		1=>'涨',
		2=>'跌',
		3=>'平',
	),
	//原油类型
	'oil_type'=>array(
		0=>'WTI',
		1=>'布油',
	),
	//公司联系传真
	'c_fax'=>array(
		0=>'021-60295186',
		1=>'021-61437520',
		2=>'021-60949905',
		3=>'021-60949918',
		4=>'021-61673516',
		5=>'021-61486180',
	),
	//短信发送类型
	'ui_sms_type' => array(
		'1' => '注册',
		'2' => '更新密码',
		'3' => '交易密码',
		'4' => '交易类',
		'5' => '银行卡认证',
		'6' => '绑定账号',
		'7' => '找回密码',
		'8' => '提醒',
		'10' => '促销类',
		'11' => '修改手机号码',
		'99' => '后台登录',
	),
	//塑料圈会员等级
	'member_level'=> array(
		1=>'列兵',
		2=>'班长',
		3=>'排长',
		4=>'连长',
		5=>'营长',
		6=>'团长',
		7=>'旅长',
		8=>'师长',
		9=>'军长',
		10=>'司令',
	),
	//塑料金融客户申请
	'dispose_status'=>array(
		1=>'待审核',
		2=>'已转风控',
		3=>'已拒绝',
	),
	//塑料金融客户准入审核状态
	'riskin_status'=>array(
		1=>'待交易员审核',
		2=>'待销售总监审核',
		3=>'待金融主管审核',
		4=>'通过',
		5=>'拒绝',
	),
	//塑料金融预警级别
	'warning_type'=>array(
		1=>'安全区域',
		2=>'预警区域',
		3=>'弃货风险',
		4=>'危险预警',
	),
	//塑料圈注册渠道
	'quan_type'=>array(
		1=>'塑料圈 ',
		2=>'塑料圈APP',
		3=>'塑料圈PC'
	),
	//节目表
	'show_name'=>array(
		1=>'临沂 舞蹈<<屯儿>>',
		2=>'淄博 舞蹈串烧',
		3=>'赤焰战队+超人战队 <<中晨演员之武侠剧>>',
		4=>'财务部 <<激光舞>>',
		5=>'雄狮战队 合唱<<好兄弟>>',
		6=>'雷霆战队 舞蹈<<社会摇>>',
		7=>'常州 独唱<<老男孩>>',
		8=>'人事+物流 舞蹈<<浪漫樱花>>',
		9=>'木塑部 小品<<人才难得>>',
		10=>'余姚 舞蹈<<黑白舞>>',
		11=>'战狼战队 徐胜 独唱<<分继续吹>>',
		12=>'电商部 歌舞<<青春修炼手册>>',
		13=>'电商部 李厂 独唱<<海阔天空>>',
		14=>'敢死队 相声<<歪批山海经>>',
		15=>'盘锦 <<大王叫我来巡山>>',
		16=>'孙伟+甘沛文<<如此照心>>',
		),
	//塑料头条会员免费天数
	'free_time'=>array(
		1=>7,
	),
	//塑料头条布局模块分类
	'cate_type'=>array(
		1=>'pe',
		2=>'pp',
		3=>'pvc',
		4=>'vip',
		5=>'public',
	),
	//塑料头条广告位识别读取
	'headline_ads'=>array(
		'pe'=>array(16,17,18,19,20),
		'pp'=>array(21,22,23,24,25),
		'pvc'=>array(26,29,30,31,32),
		'detail_public'=>array(33,34),
		'detail_pe'=>array(33,34),
		'detail_pp'=>array(35,36),
		'detail_pvc'=>array(37,38),
		'detail_vip'=>array(39,40),
	),
	//积分增减来源
	'points_type'=>array(
		1=>'签到',
		2=>'登录',
		3=>'发布报价',
		4=>'订单取消，积分返还',
		5=>'兑换礼品',
		6=>'发布采购',
		7=>'注册完善信息',
		8=>'app注册',
		9=>'资源库发布',
		10=>'资源库搜索',
		11=>'塑料圈',
		12=>'塑料圈引荐',
		13=>'塑料圈分享',
		14=>'查看通讯录',
		15=>'查看文章',
		16=>'现金充值',
	),
	//塑料圈分享渠道
	'share_type'=>array(
		1=>'求购分享',
		2=>'供给分享',
		3=>'文章分享',
		4=>'引荐分享',
	)
	
);