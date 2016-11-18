	function rdt(){
    	var str=Math.random() + new Date().getTime()+'';
    	str = str.replace('.', '');
        return str;
    };
	var FN = {};
	FN.hasClass = function(ele,cname){
		var reg = new RegExp('(^| )' + cname + '( |$)'),
			ename = ele.className;
		return reg.test(ename);
	};
	FN.addClass = function(ele,cname){
		if(!FN.hasClass(ele,cname)){
			ele.className += ' ' + cname;
		}
	};
	FN.removeClass = function(ele,cname){
		var re = new RegExp('(^| )' + cname + '( |$)');
		if(cname){
			ele.className = ele.className.replace(re,' ').replace(/^\s+|\s+$/g,'');
		}else{
			ele.className = '';
		}
	};
	FN.getByClass = function(searchClass,node,tag){
		if(node == null){node = document;}
		if(tag == null){tag = '*';}
		var classElements = [],
			els = node.getElementsByTagName(tag),
			elsLen = els.length;
			for(i = 0; i < elsLen; i++){
				if(FN.hasClass(els[i],searchClass)){
					classElements.push(els[i]);
				}
			}
		return classElements;
	};
	FN.getByAttr = function(aname,avalue,node,tag){
		if(!node){node = document;}
		if(!tag){tag = '*';}
		var ret = [],
			eles = node.getElementsByTagName(tag),
			l = eles.length;
		for(var i = 0; i < l; i++){
			var d = eles[i],
				a = d.getAttribute(aname);
			if(a === null || a === '' || (typeof a === 'undefined') || (avalue && a !== avalue)){continue;}
			ret.push(d);
		}
		return ret;
	};
	FN.getParByTag = function(t,tag,node){
		if(!t || !t.nodeName || !tag){return null;}
		var d = document,b = document.body, db = document.documentElement;
		node = node || d;
		do{
			t = t.parentNode;
			if(t.nodeName.toLowerCase() === tag){return t;}
		}while(t !== node && t !== b && t !== db)
		return null;
	};
	FN.addEvent = function(ele,etype,fn){
		if(ele.addEventListener){
			ele.addEventListener(etype,fn,false);
		}else if(ele.attachEvent){
			ele.attachEvent('on' + etype,fn);
		}else{
			ele['on' + etype] = fn;
		}
	};
	FN.removeEvent = function(ele,etype,fn){
		if(ele.removeEventListener){
			ele.removeEventListener(etype,fn,false);
		}else if(ele.detachEvent){
			ele.detachEvent('on' + etype,fn);
		}else{
			ele['on' + etype] = null;
		}
	};
	FN.preventDefault = function(e){
		e.preventDefault && e.preventDefault();
		e.returnValue = false;
	};
	FN.stopPropagation = function(e){
		e.stopPropagation && e.stopPropagation();
		e.cancelBubble = true;
	};
	FN.delegate = function(ele,cname,etype,fn){
		FN.addEvent(ele,etype,function(e){
			var e = e || window.event,
				t = e.target || e.srcElement;
			if(!t.nodeName){t = t.parentNode;}
			do{
				if(FN.hasClass(t,cname)){
					fn(e,t);
					return;
				}
				t = t.parentNode;
			}while(t != ele && t.parentNode)
		})
	};
	FN.getScript = function(url,callback,charset){
		var njs = document.createElement('script');
		njs.onload = njs.onreadystatechange = function(){
			if(!this.readyState || this.readyState === 'complete' || this.readyState === 'loaded'){
				njs.onload = njs.onreadystatechange = null;
				if(typeof callback === 'function'){callback();}
				njs.parentNode.removeChild(njs);
			}
		};
		njs.setAttribute('src',url);
		njs.setAttribute('charset',charset || '');
		document.getElementsByTagName('head')[0].appendChild(njs);
	};
	FN.arrToObj = function(arr){
		var ret = {};
		for(var i = 0, l = arr.length; i < l; i++){
			var d = arr[i].toString();
			if(typeof ret[d] === 'undefined'){
				ret[d] = 1;
			}
		}
		return ret;
	};
	FN.kNum = function(num,f){
		var b,e,s = [],k = false;
			num = num - 0;
		if(num < 0){k = true;}
		num = (Math.abs(num) + '').split('.');
		b = num[0];
		e = num[1] || '';
		while(b.length > 0){
			s.unshift(b.slice(-3));
			b = b.slice(0,-3);
		}
		if(typeof f === 'number'){
			e = e.slice(0,f);
		}
		if(e !== ''){e = '.' + e;}
		return k ? ('-' + s.join(',') + e) : s.join(',') + e;
	};
	FN.gEleDocPos = function(ele){
		var left = 0, top = 0, b = document.body, d = document, dd = document.documentElement;
		do{
			left += ele.offsetLeft;
			top += ele.offsetTop;
			ele = ele.offsetParent;
		}
		while(ele != b && ele != d && ele != dd);
		return {
			x : left,
			y : top
		}
	};
	FN.gEleParPos = function(ele){
		var p = ele.parentNode,
			op = FN.gEleDocPos(ele),
			pp = FN.gEleDocPos(p);
		return {
			x : op.x - pp.x,
			y : op.y - pp.y
		}
	};
	FN.gMouseDocPos = function(e){
		return 'pageX' in e ? {
			x : e.pageX,
			y : e.pageY
		} : {
			x : Math.max(document.body.scrollTop,document.documentElement.scrollTop) + e.clientX,
			y : Math.max(document.body.scrollLeft,document.documentElement.scrollLeft) + e.clientY
		}
	};
	FN.gMouseElePos = function(e,d){
		var ep = FN.gMouseDocPos(e),
			dp = FN.gEleDocPos(d);
		return {
			x : ep.x - dp.x,
			y : ep.y - dp.y
		}
	};
	FN.cookie = {
		set : function(k,v,h,d){
			var hour = h || 24,
				now = new Date(),
				domain = d || documant.domain,
				exp = new Date(now.getTime() + hour * 3600 * 1000);
				expires = exp.toGMTString();
			document.cookie = k + '=' + v + ';path=/;expires=' + expires + ';domain=' + domain;
		},
		get : function(k){
			var coo = unescape(document.cookie),
				s = coo.indexOf(k + '='),
				kl = s + k.length + 1,
				e = coo.indexOf(';',kl);
			if(s == -1){return '';}
			if(e == -1){return coo.substr(kl);}
			return coo.slice(kl,e);
		},
		remove : function(k){
			var now = new Date(),
				exp = new Date(now.getTime() - 3600 * 1000);
				expires = exp.toGMTString();
			document.cookie = k + '=' + ';expires=' + expires + '';
		}
	};
	function jsonp(json) {
    var str = 'Global_lbw' + Math.random() + new Date().getTime();
    str = str.replace('.', '');
    if (json.type == 'jsonp') {

      window[str] = function (okData) {
        oHead.removeChild(oS);
        window[str] = null;
        clearTimeout(timer);
        json.success && json.success(okData);
      };

    }
    if (json.type == 'script') {
      window[str] = function () {
        oHead.removeChild(oS);
        window[str] = null;
        clearTimeout(timer);
        json.success && json.success();
      };
    }
    if (json.type == 'hqscript') {
    	var solid = true;
    	setTimeout(function(){solid = false;},500)
    	function hqapiSuccess(){
    		 var param = json.data.list.split(',')[0];
		      if('hq_str_'+param in window&&!solid)
		      {
		      	oHead.removeChild(oS);
		        window[str] = null;
		        clearTimeout(timer);
		        json.success && json.success();
		      }
		      else
		      {
		      	if(solid)
		      	{
		           setTimeout(hqapiSuccess,30);
		      	}
		      	else
		      	{
		      		console.log('hq gameover');
		      	}

		      }
    	}
    	hqapiSuccess();
    }
    var arr = [];
    for (var i in json.data)//将json.data拼接成str
    {
      arr.push(i + '=' + encodeURIComponent(json.data[i]));

    };
    var oS = document.createElement('script');
    if (json.type == 'jsonp') {
      if (json.data) {
        oS.src = json.url + '/' + json.cbName + '=' + str + '/' + json.title + '?' + decodeURIComponent(arr.join('&'));
      } else {
        oS.src = json.url + '/' + json.cbName + '=' + str + '/' + json.title;
      }
    }
    else {
      if (json.data) {
        oS.src = json.url + '/?' + json.cbName + '=' + str + '&' + decodeURIComponent(arr.join('&'));
      }
    }
    var oHead = document.getElementsByTagName('head')[0];
    oHead.appendChild(oS);
    if (json.timeout) {
      var timer = setTimeout(function () {//失败
        oHead.removeChild(oS);
        window[str] = null;
        json.error && json.error(0);
      }, json.timeout);
    };
};
function script_stock(param_str, fn, format)  //\u8c03\u884c\u60c5\u4e32\u63a5\u53e3\u51fd\u6570
	{
		var self = this;
		var param_str = param_str || '';
		if (!param_str)
			return;
		if (format) {
			$.ajax({
		              url: 'http://bd-hq.sinajs.cn/ran=' + rdt() + '&format=' + format + '&list=' + param_str,
		              dataType: "script",
		              cache: true,
		              success: function (data) {

					fn && fn.call(self);
		              }
			});
		}
		else {
			$.ajax({
		              url: 'http://bd-hq.sinajs.cn/list=' + param_str,
		              dataType: "script",
		              cache: true,
		              success: function (data) {

					fn && fn.call(self);
		              }
			});
		}
	};