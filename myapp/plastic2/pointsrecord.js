webpackJsonp([31],{28:function(module,exports){eval('"use strict";\n\nmodule.exports = {\n\tdata: function data() {\n\t\treturn {\n\t\t\trecord: []\n\t\t};\n\t},\n\tmounted: function mounted() {\n\t\tvar _this = this;\n\t\ttry {\n\t\t\tvar piwikTracker = Piwik.getTracker("http://wa.myplas.com/piwik.php", 2);\n\t\t\tpiwikTracker.trackPageView();\n\t\t} catch (err) {}\n\t\t$.ajax({\n\t\t\ttype: "get",\n\t\t\turl: "/api/qapi1/exchangeList",\n\t\t\tdata: {\n\t\t\t\ttoken: window.localStorage.getItem("token"),\n\t\t\t\tpage: 1,\n\t\t\t\tsize: 10\n\t\t\t},\n\t\t\tdataType: \'JSON\'\n\t\t}).then(function (res) {\n\t\t\tconsole.log(res);\n\t\t\tif (res.err == 0) {\n\t\t\t\t_this.record = res.info;\n\t\t\t} else if (res.err == 1) {\n\t\t\t\tmui.alert("", res.msg, function () {\n\t\t\t\t\t_this.$router.push({ path: \'login\' });\n\t\t\t\t});\n\t\t\t}\n\t\t}, function () {});\n\t}\n};//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcG9pbnRzcmVjb3JkLnZ1ZT9iZWRlIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7O0FBNkJBO3VCQUVBOztXQUdBO0FBRkE7QUFHQTs2QkFDQTtjQUNBO01BQ0E7eUVBQ0E7Z0JBQ0E7Z0JBRUEsQ0FDQTs7U0FFQTtRQUNBOzt1Q0FFQTtVQUNBO1VBRUE7QUFKQTthQUtBO0FBUkEseUJBU0E7ZUFDQTtxQkFDQTt1QkFDQTs0QkFDQTt1Q0FDQTtnQ0FDQTtBQUNBO0FBQ0E7aUJBRUEsQ0FFQTtBQUNBO0FBcENBIiwiZmlsZSI6IjI4LmpzIiwic291cmNlc0NvbnRlbnQiOlsiPHRlbXBsYXRlPlxuPGRpdj5cbjxoZWFkZXIgaWQ9XCJiaWdDdXN0b21lckhlYWRlclwiPlxuXHQ8YSBjbGFzcz1cImJhY2tcIiBocmVmPVwiamF2YXNjcmlwdDp3aW5kb3cuaGlzdG9yeS5iYWNrKCk7XCI+PC9hPlxuXHTlhZHmjaLorrDlvZVcbjwvaGVhZGVyPlxuPHVsIGlkPVwicG9pbnRzcmVjb3JkXCI+XG5cdDxsaSB2LWZvcj1cInIgaW4gcmVjb3JkXCI+XG5cdFx0PGRpdiBjbGFzcz1cInJlY29yZFwiPlxuXHRcdFx0PGgzIGNsYXNzPVwicmVjb3JkdGl0bGVcIj5cblx0XHRcdFx05YWR5o2i5Y2V5Y+377yae3tyLm9yZGVyX2lkfX08YnI+5YWR5o2i5pe26Ze077yae3tyLmNyZWF0ZV90aW1lfX1cblx0XHRcdFx0PHNwYW4+e3tyLnN0YXR1c319PC9zcGFuPlxuXHRcdFx0PC9oMz5cblx0XHQ8L2Rpdj5cblx0XHQ8ZGl2IGNsYXNzPVwicmVjb3Jkd3JhcFwiPlxuXHRcdFx0PGltZyB2LWJpbmQ6c3JjPVwici50aHVtYlwiPlxuXHRcdFx0PGRpdiBjbGFzcz1cInJlY29yZGluZm9cIj5cblx0XHRcdFx0e3tyLm5hbWV9fVxuXHRcdFx0PC9kaXY+XG5cdFx0PC9kaXY+XG5cdFx0PGRpdiBjbGFzcz1cInJlY29yZHN0YXR1c1wiPlxuXHRcdFx05pu05paw5pe26Ze0Ont7ci51cGRhdGVfdGltZX19XG5cdFx0XHQ8c3Bhbj7lhZHmjaLkvb/nlKjnp6/liIbvvJo8Yj57e3IudXNlcG9pbnRzfX08L2I+56ev5YiGPC9zcGFuPlxuXHRcdDwvZGl2PlxuXHQ8L2xpPlxuPC91bD5cbjwvZGl2PlxuPC90ZW1wbGF0ZT5cbjxzY3JpcHQ+XG5tb2R1bGUuZXhwb3J0cyA9IHtcblx0ZGF0YTogZnVuY3Rpb24oKSB7XG5cdFx0cmV0dXJuIHtcblx0XHRcdHJlY29yZDpbXVxuXHRcdH1cblx0fSxcblx0bW91bnRlZDogZnVuY3Rpb24oKSB7XG5cdFx0dmFyIF90aGlzID0gdGhpcztcblx0XHRcdHRyeSB7XG5cdCAgICB2YXIgcGl3aWtUcmFja2VyID0gUGl3aWsuZ2V0VHJhY2tlcihcImh0dHA6Ly93YS5teXBsYXMuY29tL3Bpd2lrLnBocFwiLCAyKTtcblx0ICAgIHBpd2lrVHJhY2tlci50cmFja1BhZ2VWaWV3KCk7XG5cdH0gY2F0Y2goIGVyciApIHtcblx0XHRcblx0fVxuXHRcdCQuYWpheCh7XG4gICAgXHRcdHR5cGU6XCJnZXRcIixcbiAgICBcdFx0dXJsOlwiL2FwaS9xYXBpMS9leGNoYW5nZUxpc3RcIixcbiAgICBcdFx0ZGF0YTp7XG4gICAgXHRcdFx0dG9rZW46IHdpbmRvdy5sb2NhbFN0b3JhZ2UuZ2V0SXRlbShcInRva2VuXCIpLFxuICAgIFx0XHRcdHBhZ2U6MSxcbiAgICBcdFx0XHRzaXplOjEwICAgIFx0XHRcdFxuICAgIFx0XHR9LFxuICAgIFx0XHRkYXRhVHlwZTogJ0pTT04nXG4gICAgXHR9KS50aGVuKGZ1bmN0aW9uKHJlcyl7XG4gICAgXHRcdGNvbnNvbGUubG9nKHJlcyk7XG5cdFx0ICAgIGlmKHJlcy5lcnI9PTApe1xuXHRcdCAgICBcdF90aGlzLnJlY29yZD1yZXMuaW5mbztcblx0XHRcdH1lbHNlIGlmKHJlcy5lcnI9PTEpe1xuXHRcdFx0XHRtdWkuYWxlcnQoXCJcIixyZXMubXNnLGZ1bmN0aW9uKCl7XG5cdFx0XHRcdFx0X3RoaXMuJHJvdXRlci5wdXNoKHsgcGF0aDogJ2xvZ2luJyB9KTtcblx0XHRcdFx0fSk7ICAgICAgICBcdFx0XHRcdFx0XHRcdFx0XHRcblx0XHRcdH1cbiAgICBcdH0sZnVuY3Rpb24oKXtcbiAgICBcdFx0XG4gICAgXHR9KTtcblx0XHRcblx0fVxufVxuPC9zY3JpcHQ+XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHBvaW50c3JlY29yZC52dWU/NjljZDI2NzEiXSwic291cmNlUm9vdCI6IiJ9')},69:function(module,exports,__webpack_require__){eval('var __vue_exports__, __vue_options__\nvar __vue_styles__ = {}\n\n/* script */\n__vue_exports__ = __webpack_require__(28)\n\n/* template */\nvar __vue_template__ = __webpack_require__(114)\n__vue_options__ = __vue_exports__ = __vue_exports__ || {}\nif (\n  typeof __vue_exports__.default === "object" ||\n  typeof __vue_exports__.default === "function"\n) {\n__vue_options__ = __vue_exports__ = __vue_exports__.default\n}\nif (typeof __vue_options__ === "function") {\n  __vue_options__ = __vue_options__.options\n}\n\n__vue_options__.render = __vue_template__.render\n__vue_options__.staticRenderFns = __vue_template__.staticRenderFns\n\nmodule.exports = __vue_exports__\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvdmlld3MvcG9pbnRzcmVjb3JkLnZ1ZT84MWFjIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQSIsImZpbGUiOiI2OS5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9leHBvcnRzX18sIF9fdnVlX29wdGlvbnNfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cblxuLyogc2NyaXB0ICovXG5fX3Z1ZV9leHBvcnRzX18gPSByZXF1aXJlKFwiISFiYWJlbC1sb2FkZXIhdnVlLWxvYWRlci9saWIvc2VsZWN0b3I/dHlwZT1zY3JpcHQmaW5kZXg9MCEuL3BvaW50c3JlY29yZC52dWVcIilcblxuLyogdGVtcGxhdGUgKi9cbnZhciBfX3Z1ZV90ZW1wbGF0ZV9fID0gcmVxdWlyZShcIiEhdnVlLWxvYWRlci9saWIvdGVtcGxhdGUtY29tcGlsZXI/aWQ9ZGF0YS12LTdkOWQxODhkIXZ1ZS1sb2FkZXIvbGliL3NlbGVjdG9yP3R5cGU9dGVtcGxhdGUmaW5kZXg9MCEuL3BvaW50c3JlY29yZC52dWVcIilcbl9fdnVlX29wdGlvbnNfXyA9IF9fdnVlX2V4cG9ydHNfXyA9IF9fdnVlX2V4cG9ydHNfXyB8fCB7fVxuaWYgKFxuICB0eXBlb2YgX192dWVfZXhwb3J0c19fLmRlZmF1bHQgPT09IFwib2JqZWN0XCIgfHxcbiAgdHlwZW9mIF9fdnVlX2V4cG9ydHNfXy5kZWZhdWx0ID09PSBcImZ1bmN0aW9uXCJcbikge1xuX192dWVfb3B0aW9uc19fID0gX192dWVfZXhwb3J0c19fID0gX192dWVfZXhwb3J0c19fLmRlZmF1bHRcbn1cbmlmICh0eXBlb2YgX192dWVfb3B0aW9uc19fID09PSBcImZ1bmN0aW9uXCIpIHtcbiAgX192dWVfb3B0aW9uc19fID0gX192dWVfb3B0aW9uc19fLm9wdGlvbnNcbn1cblxuX192dWVfb3B0aW9uc19fLnJlbmRlciA9IF9fdnVlX3RlbXBsYXRlX18ucmVuZGVyXG5fX3Z1ZV9vcHRpb25zX18uc3RhdGljUmVuZGVyRm5zID0gX192dWVfdGVtcGxhdGVfXy5zdGF0aWNSZW5kZXJGbnNcblxubW9kdWxlLmV4cG9ydHMgPSBfX3Z1ZV9leHBvcnRzX19cblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL3ZpZXdzL3BvaW50c3JlY29yZC52dWVcbi8vIG1vZHVsZSBpZCA9IDY5XG4vLyBtb2R1bGUgY2h1bmtzID0gMzEiXSwic291cmNlUm9vdCI6IiJ9')},114:function(module,exports){eval('module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;\n  return _h(\'div\', [_vm._m(0), " ", _h(\'ul\', {\n    attrs: {\n      "id": "pointsrecord"\n    }\n  }, [_vm._l((_vm.record), function(r) {\n    return _h(\'li\', [_h(\'div\', {\n      staticClass: "record"\n    }, [_h(\'h3\', {\n      staticClass: "recordtitle"\n    }, ["\\n\\t\\t\\t\\t兑换单号：" + _vm._s(r.order_id), _h(\'br\'), "兑换时间：" + _vm._s(r.create_time) + "\\n\\t\\t\\t\\t", _h(\'span\', [_vm._s(r.status)])])]), " ", _h(\'div\', {\n      staticClass: "recordwrap"\n    }, [_h(\'img\', {\n      attrs: {\n        "src": r.thumb\n      }\n    }), " ", _h(\'div\', {\n      staticClass: "recordinfo"\n    }, ["\\n\\t\\t\\t\\t" + _vm._s(r.name) + "\\n\\t\\t\\t"])]), " ", _h(\'div\', {\n      staticClass: "recordstatus"\n    }, ["\\n\\t\\t\\t更新时间:" + _vm._s(r.update_time) + "\\n\\t\\t\\t", _h(\'span\', ["兑换使用积分：", _h(\'b\', [_vm._s(r.usepoints)]), "积分"])])])\n  })])])\n},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;\n  return _h(\'header\', {\n    attrs: {\n      "id": "bigCustomerHeader"\n    }\n  }, [_h(\'a\', {\n    staticClass: "back",\n    attrs: {\n      "href": "javascript:window.history.back();"\n    }\n  }), "\\n\\t兑换记录\\n"])\n}]}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvdmlld3MvcG9pbnRzcmVjb3JkLnZ1ZT9lNWRjIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBLGdCQUFnQixtQkFBbUIsYUFBYTtBQUNoRDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTCxHQUFHO0FBQ0gsQ0FBQywrQkFBK0IsYUFBYTtBQUM3QztBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EsZ0RBQWdEO0FBQ2hEO0FBQ0EsR0FBRztBQUNILENBQUMiLCJmaWxlIjoiMTE0LmpzIiwic291cmNlc0NvbnRlbnQiOlsibW9kdWxlLmV4cG9ydHM9e3JlbmRlcjpmdW5jdGlvbiAoKXt2YXIgX3ZtPXRoaXM7dmFyIF9oPV92bS4kY3JlYXRlRWxlbWVudDtcbiAgcmV0dXJuIF9oKCdkaXYnLCBbX3ZtLl9tKDApLCBcIiBcIiwgX2goJ3VsJywge1xuICAgIGF0dHJzOiB7XG4gICAgICBcImlkXCI6IFwicG9pbnRzcmVjb3JkXCJcbiAgICB9XG4gIH0sIFtfdm0uX2woKF92bS5yZWNvcmQpLCBmdW5jdGlvbihyKSB7XG4gICAgcmV0dXJuIF9oKCdsaScsIFtfaCgnZGl2Jywge1xuICAgICAgc3RhdGljQ2xhc3M6IFwicmVjb3JkXCJcbiAgICB9LCBbX2goJ2gzJywge1xuICAgICAgc3RhdGljQ2xhc3M6IFwicmVjb3JkdGl0bGVcIlxuICAgIH0sIFtcIlxcblxcdFxcdFxcdFxcdOWFkeaNouWNleWPt++8mlwiICsgX3ZtLl9zKHIub3JkZXJfaWQpLCBfaCgnYnInKSwgXCLlhZHmjaLml7bpl7TvvJpcIiArIF92bS5fcyhyLmNyZWF0ZV90aW1lKSArIFwiXFxuXFx0XFx0XFx0XFx0XCIsIF9oKCdzcGFuJywgW192bS5fcyhyLnN0YXR1cyldKV0pXSksIFwiIFwiLCBfaCgnZGl2Jywge1xuICAgICAgc3RhdGljQ2xhc3M6IFwicmVjb3Jkd3JhcFwiXG4gICAgfSwgW19oKCdpbWcnLCB7XG4gICAgICBhdHRyczoge1xuICAgICAgICBcInNyY1wiOiByLnRodW1iXG4gICAgICB9XG4gICAgfSksIFwiIFwiLCBfaCgnZGl2Jywge1xuICAgICAgc3RhdGljQ2xhc3M6IFwicmVjb3JkaW5mb1wiXG4gICAgfSwgW1wiXFxuXFx0XFx0XFx0XFx0XCIgKyBfdm0uX3Moci5uYW1lKSArIFwiXFxuXFx0XFx0XFx0XCJdKV0pLCBcIiBcIiwgX2goJ2RpdicsIHtcbiAgICAgIHN0YXRpY0NsYXNzOiBcInJlY29yZHN0YXR1c1wiXG4gICAgfSwgW1wiXFxuXFx0XFx0XFx05pu05paw5pe26Ze0OlwiICsgX3ZtLl9zKHIudXBkYXRlX3RpbWUpICsgXCJcXG5cXHRcXHRcXHRcIiwgX2goJ3NwYW4nLCBbXCLlhZHmjaLkvb/nlKjnp6/liIbvvJpcIiwgX2goJ2InLCBbX3ZtLl9zKHIudXNlcG9pbnRzKV0pLCBcIuenr+WIhlwiXSldKV0pXG4gIH0pXSldKVxufSxzdGF0aWNSZW5kZXJGbnM6IFtmdW5jdGlvbiAoKXt2YXIgX3ZtPXRoaXM7dmFyIF9oPV92bS4kY3JlYXRlRWxlbWVudDtcbiAgcmV0dXJuIF9oKCdoZWFkZXInLCB7XG4gICAgYXR0cnM6IHtcbiAgICAgIFwiaWRcIjogXCJiaWdDdXN0b21lckhlYWRlclwiXG4gICAgfVxuICB9LCBbX2goJ2EnLCB7XG4gICAgc3RhdGljQ2xhc3M6IFwiYmFja1wiLFxuICAgIGF0dHJzOiB7XG4gICAgICBcImhyZWZcIjogXCJqYXZhc2NyaXB0OndpbmRvdy5oaXN0b3J5LmJhY2soKTtcIlxuICAgIH1cbiAgfSksIFwiXFxuXFx05YWR5o2i6K6w5b2VXFxuXCJdKVxufV19XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9+L3Z1ZS1sb2FkZXIvbGliL3RlbXBsYXRlLWNvbXBpbGVyLmpzP2lkPWRhdGEtdi03ZDlkMTg4ZCEuL34vdnVlLWxvYWRlci9saWIvc2VsZWN0b3IuanM/dHlwZT10ZW1wbGF0ZSZpbmRleD0wIS4vc3JjL3ZpZXdzL3BvaW50c3JlY29yZC52dWVcbi8vIG1vZHVsZSBpZCA9IDExNFxuLy8gbW9kdWxlIGNodW5rcyA9IDMxIl0sInNvdXJjZVJvb3QiOiIifQ==')}});