webpackJsonp([17],{13:function(e,t,i){var n=i(46)(i(75),i(146),null,null);e.exports=n.exports},146:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"buyWrap",staticStyle:{padding:"45px 0 70px 0"}},[e._m(0),e._v(" "),i("ul",{staticClass:"supplyUl"},[e._l(e.name,function(t){return i("li",{directives:[{name:"show",rawName:"v-show",value:e.condition,expression:"condition"}]},[i("div",{staticClass:"supplytitle"},[i("h3",[e._v(e._s(t.input_time)),i("span",{on:{click:function(i){e.del(t.id)}}},[e._v("删除")]),e._v(" "),i("router-link",{staticStyle:{float:"right",margin:"0 10px 0 0",color:"#62759e"},attrs:{to:{name:"supplybuy",params:{id:t.id}}}},[e._v("分享")])],1),e._v(" "),i("p",[i("i",{staticClass:"myicon iconSupply4"}),e._v("我的求购:"+e._s(t.contents))])]),e._v(" "),i("div",{staticClass:"supplycontent"},[e._m(1,!0),e._v(" "),i("p",[e._v("在信息库中，没有找到在卖（买）此牌号的商家！")]),e._v(" "),e._m(2,!0),e._v(" "),0!==t.says.length?i("h3",[i("i",{staticClass:"myicon iconSupply3"}),e._v("塑料圈友")]):e._e(),e._v(" "),0!==t.says.length?i("div",{staticClass:"triangle-up"}):e._e(),e._v(" "),0!==t.says.length?i("div",{staticClass:"replyRelease2"},[e._l(t.says,function(n){return t.user_id==n.rev_id?i("p",[i("router-link",{attrs:{to:{name:"personinfo",params:{id:n.user_id}}}},[e._v(e._s(n.user_name))]),e._v("说:"),i("i",{on:{click:function(i){e.reply(t.id,n.user_id,n.id)}}},[e._v(e._s(n.content))])],1):e._e()}),e._v(" "),e._l(t.says,function(n){return t.user_id!==n.rev_id?i("p",[i("router-link",{attrs:{to:{name:"personinfo",params:{id:n.user_id}}}},[e._v(e._s(n.user_name))]),e._v("回复\n\t\t\t\t\t\t"),i("router-link",{attrs:{to:{name:"personinfo",params:{id:n.rev_id}}}},[e._v(e._s(n.rev_name))]),e._v(":"),i("i",{on:{click:function(i){e.reply(t.id,n.user_id,n.id)}}},[e._v(e._s(n.content))])],1):e._e()})],2):e._e()])])}),e._v(" "),i("li",{directives:[{name:"show",rawName:"v-show",value:!e.condition,expression:"!condition"}],staticStyle:{"text-align":"center",height:"60px","line-height":"60px"}},[e._v("\n\t\t\t没有相关数据\n\t\t")])],2),e._v(" "),i("footerbar")],1)},staticRenderFns:[function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticStyle:{position:"fixed",top:"0",left:"0",width:"100%","z-index":"10"}},[i("header",{attrs:{id:"bigCustomerHeader"}},[i("a",{staticClass:"back",attrs:{href:"javascript:window.history.back();"}}),e._v("\n\t\t\t我的求购\n\t\t")])])},function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("h3",[i("i",{staticClass:"myicon iconSupply2"}),e._v("系统消息")])},function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("p",[e._v("参考价："),i("span",[e._v("塑料圈查无此价格")])])}]}},46:function(e,t){e.exports=function(e,t,i,n){var a,s=e=e||{},o=typeof e.default;"object"!==o&&"function"!==o||(a=e,s=e.default);var r="function"==typeof s?s.options:s;if(t&&(r.render=t.render,r.staticRenderFns=t.staticRenderFns),i&&(r._scopeId=i),n){var l=Object.create(r.computed||null);Object.keys(n).forEach(function(e){var t=n[e];l[e]=function(){return t}}),r.computed=l}return{esModule:a,exports:s,options:r}}},47:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={data:function(){return{isIndex:!1,isRelease:!1,isMyzone:!1,isHeadline:!1}},methods:{toQuickRelease:function(){var e=this;window.localStorage.getItem("token")?e.$router.push({name:"quickrelease"}):weui.alert("您未登录塑料圈,无法查看企业及个人信息",{title:"塑料圈通讯录",buttons:[{label:"确定",type:"parimary",onClick:function(){e.$router.push({name:"login"})}}]})},toRelease:function(){var e=this;window.localStorage.getItem("token")?e.$router.push({name:"release"}):weui.alert("您未登录塑料圈,无法查看企业及个人信息",{title:"塑料圈通讯录",buttons:[{label:"确定",type:"parimary",onClick:function(){e.$router.push({name:"login"})}}]})},toMyzone:function(){var e=this;window.localStorage.getItem("token")?e.$router.push({name:"myzone"}):weui.alert("您未登录塑料圈,无法查看企业及个人信息",{title:"塑料圈通讯录",buttons:[{label:"确定",type:"parimary",onClick:function(){e.$router.push({name:"login"})}}]})},toHeadline:function(){var e=this;window.localStorage.getItem("token")?e.$router.push({name:"headline"}):weui.alert("您未登录塑料圈,无法查看企业及个人信息",{title:"塑料圈通讯录",buttons:[{label:"确定",type:"parimary",onClick:function(){e.$router.push({name:"login"})}}]})}},mounted:function(){switch(this.$route.name){case"index":this.isIndex=!0,this.isRelease=!1,this.isMyzone=!1,this.isHeadline=!1;break;case"release":this.isIndex=!1,this.isRelease=!0,this.isMyzone=!1,this.isHeadline=!1;break;case"myzone":case"mysupply":case"mybuy":case"myinvite":case"myfans":case"mypay":case"mymsg":case"mymsg2":case"myinfo":this.isIndex=!1,this.isRelease=!1,this.isMyzone=!0,this.isHeadline=!1;break;case"headline":case"headlinedetail":case"headlinelist":this.isIndex=!1,this.isRelease=!1,this.isMyzone=!1,this.isHeadline=!0}}}},48:function(e,t,i){var n=i(46)(i(47),i(49),null,null);e.exports=n.exports},49:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",[i("footer",{attrs:{id:"footer"}},[i("ul",[i("li",[i("a",{class:{footerOn:e.isRelease},attrs:{href:"javascript:;"},on:{click:e.toRelease}},[i("i",{staticClass:"foot3"}),i("br"),e._v("供求")])]),e._v(" "),i("li",[i("router-link",{class:{footerOn:e.isIndex},attrs:{to:{name:"index"}}},[i("i",{staticClass:"foot2"}),i("br"),e._v("通讯录")])],1),e._v(" "),i("li",[i("i",{staticClass:"releaseicon",on:{click:e.toQuickRelease}})]),e._v(" "),i("li",[i("a",{class:{footerOn:e.isHeadline},attrs:{href:"javascript:;"},on:{click:e.toHeadline}},[i("i",{staticClass:"foot5"}),i("br"),e._v("发现")])]),e._v(" "),i("li",[i("a",{class:{footerOn:e.isMyzone},attrs:{href:"javascript:;"},on:{click:e.toMyzone}},[i("i",{staticClass:"foot4"}),i("br"),e._v("我的")])])])])])},staticRenderFns:[]}},75:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=i(48),a=i.n(n);t.default={components:{footerbar:a.a},data:function(){return{name:[],page:1,condition:!0,countShow:!1,count:"",id:"",user_id:""}},methods:{del:function(e){weui.confirm("确定删除此条信息",{title:"塑料圈通讯录",buttons:[{label:"取消",type:"default",onClick:function(){}},{label:"确定",type:"primary",onClick:function(){$.ajax({url:version+"/releaseMsg/deleteMyMsg",type:"post",data:{id:e,token:window.localStorage.getItem("token")},headers:{"X-UA":window.localStorage.getItem("XUA")},dataType:"JSON"}).then(function(e){0==e.err?weui.alert(e.msg,{title:"塑料圈通讯录",buttons:[{label:"确定",type:"primary",onClick:function(){location.reload()}}]}):weui.alert("删除失败",{title:"塑料圈通讯录",buttons:[{label:"确定",type:"primary",onClick:function(){location.reload()}}]})},function(){})}}]})}},mounted:function(){var e=this;try{Piwik.getTracker("http://wa.myplas.com/piwik.php",2).trackPageView()}catch(e){}$.ajax({url:version+"/releaseMsg/getMyMsg",type:"post",data:{type:1,page:e.page,token:window.localStorage.getItem("token"),size:50},headers:{"X-UA":window.localStorage.getItem("XUA")},dataType:"JSON"}).done(function(t){2==t.err?e.condition=!1:1==t.err?weui.alert(t.msg,{title:"塑料圈通讯录",buttons:[{label:"确定",type:"parimary",onClick:function(){e.$router.push({name:"login"})}}]}):(e.condition=!0,e.name=t.data)}).fail(function(){}).always(function(){})}}}});