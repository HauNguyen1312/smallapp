 if(typeof(document.asm_excl) == "undefined"){ document.asm_excl = new Array(); } document.asm_excl = document.asm_excl.concat(String("").split("|")); 

 var asm_ex = false;
 var asm_ex_all = false;
 for(var asm_i=0; asm_i<document.asm_excl.length; asm_i++) { if(document.asm_excl[asm_i] == "162"){asm_ex = true; break;}}
 for(var asm_i=0; asm_i<document.asm_excl.length; asm_i++) { if(document.asm_excl[asm_i] == "w1" || document.asm_excl[asm_i] == "p24"){asm_ex_all = true; break;}}
 if(asm_ex_all){}
 else if(!asm_ex )
 {
   document.write('<scr'+'ipt type="text/javascr'+'ipt" language="JavaScr'+'ipt">\nfunction asm_msg_rcvr_428891527066040(event)\n{\n if(event.data && typeof(event.data) == "string" && event.data.substr(0,22) == "asm:rzi:asm_24x4502332")\n {\n  var d = document.getElementById("asm_altifr_asm_24x4502332");\n  if(d)\n  {\n   var xy = event.data.substr(22,999).split("x");\n   if("width" in d && d.width != "100%"){ d.style.width = xy[0]+"px";}\n   d.style.height = xy[1]+"px";\n   \n   if(location.search.indexOf("&pmrz=")!=-1)\n   {\n    var pmrz = location.search.substr(location.search.indexOf("&pmrz=")+6,999);\n    if(pmrz.indexOf("&")!=-1){pmrz = pmrz.substr(0,pmrz.indexOf("&"));}\n    if(pmrz != "" && pmrz != "")\n    {\n     parent.postMessage("asm:rzi:"+pmrz+xy[0]+"x"+xy[1],"*")\n    }\n   }\n  }\n }\n}\nwindow.addEventListener("message", asm_msg_rcvr_428891527066040, false); \n\nfunction asm_backfill_obj(){this.queues=new Array();this.firedBack=new Array();this.getInstanceIdFromURL=function(b){var a=b.substr(b.indexOf("?id=")+4,9999);if(a.indexOf("&")!=-1){a=a.substr(0,a.indexOf("&"))}if(a.substr(0,3)!="asm"){a=""}return a};this.findCurrentScr'+'ipt=function(c,f){var g=document.getElementsByTagName("scr'+'ipt");var b=null;var a="";if(typeof(document.currentScr'+'ipt)=="object"){var e=document.currentScr'+'ipt;if(f){a=this.getInstanceIdFromURL(e.src);if(a.substr(0,3)=="asm"){b=e;g=new Array()}}}if(g.length>0){for(var d=g.length-1;d>=0;d--){var e=g[d];if(c!=""&&e.src.indexOf(c)==-1){continue}if(e.className.indexOf("asm_bkfl_done")!=-1){continue}a=this.getInstanceIdFromURL(e.src);if(a.substr(0,3)=="asm"){b=e;break}}if(a.substr(0,3)!="asm"){for(var d=g.length-1;d>=0;d--){var e=g[d];a=this.getInstanceIdFromURL(e.src);if(a.substr(0,3)=="asm"){b=e;break}}}}return b};this.addInstance=function(a,d,p,g,m,n,k,e,o,l,b,c){var h=this.queues.length;this.queues[this.queues.length]=new asm_backfill_instance(a,d,p,g,m,n,k,e,o,l,b,c);for(var f=0;f<this.firedBack.length;f++){var j=this.firedBack[f];if(!j.done&&(j.id=a||(j.id==""&&j.asm==d&&j.kid==e&&j.x==n&&j.y==k))){this.csl("instance fired before: ");this.csl(j);this.setOffline(a);if(j.type==0){this.pushBackID(a)}else{this.fireID(a)}}}};this.getLastInstance=function(){if(this.queues.length>0){return this.queues[this.queues.length-1]}else{return null}};this.pushBackID=function(c){var a=false;for(var b=0;b<this.queues.length;b++){if(this.queues[b].id==c&&this.queues[b].status==0){this.csl("instance pushBack: "+this.queues[b].id);a=true;this.queues[b].pushBack();if(this.queues[b].isOffline){this.output(this.queues[b].id,false)}break}}if(!a){this.firedBack[this.firedBack.length]={id:c,done:false,type:0};this.csl("instance pushBack NOT found: "+c)}};this.setStatusID=function(c,a){for(var b=0;b<this.queues.length;b++){if(this.queues[b].id==c){this.queues[b].status=a;break}}};this.pushBack=function(e,b,a,f){var c=false;for(var d=0;d<this.queues.length;d++){if(this.queues[d].asm==e&&this.queues[d].kid==b&&this.queues[d].status==0&&this.queues[d].x==a&&this.queues[d].y==f){this.csl("instance pushBack: "+this.queues[d].id);c=true;this.queues[d].pushBack();if(this.queues[d].isOffline){this.output(this.queues[d].id,false)}break}}if(!c){this.firedBack[this.firedBack.length]={id:"",asm:e,kid:b,x:a,y:f,done:false,type:0};this.csl("instance pushBack NOT found: "+e+" / "+b+" / "+a+" / "+f);this.csl(this)}};this.fire=function(e,b,a,f){var c=false;for(var d=0;d<this.queues.length;d++){if(this.queues[d].asm==e&&this.queues[d].kid==b&&this.queues[d].x==a&&this.queues[d].y==f){c=true;this.fireID(this.queues[d].id,!this.queues[d].isAsync&&!this.queues[d].isOffline);break}}if(!c){this.firedBack[this.firedBack.length]={id:"",asm:e,kid:b,x:a,y:f,done:false,type:1};this.csl("instance fire NOT found: "+e+" / "+b+" / "+a+" / "+f)}};this.fireID=function(d,c){var a=false;for(var b=0;b<this.queues.length;b++){if(this.queues[b].id==d){a=true;this.queues[b].fire();break}}if(!a){this.firedBack[this.firedBack.length]={id:d,done:false,type:1};this.csl("instance fire NOT found: "+d)}this.output(d,c)};this.setOffline=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b){this.csl("instance set offline: "+b);this.queues[a].isOffline=true;break}}};this.setAsync=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b&&!this.queues[a].isAsync){this.csl("instance set async: "+b);this.queues[a].isAsync=true;break}}};this.setMaxTimeOut=function(d,a,b){for(var c=0;c<this.queues.length;c++){if(this.queues[c].id==d){this.csl("instance set timeouts: "+d+" to "+a+"/"+b);this.queues[c].loadTime=a;this.queues[c].loadTimeMax=b;break}}};this.getInstanceById=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b){return this.queues[a]}}return null};this.instanceCallPushback=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b){this.queues[a].pushBack();return true}}return false};this.instanceCallFire=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b){this.queues[a].fire();return true}}return false};this.finishInstance=function(b){for(var a=0;a<this.queues.length;a++){if(this.queues[a].id==b){this.queues[a].close()}}};this.rcvMsg=function(a){this.csl("rcv msg: "+a);a=a.split(";");if(a.length==4){this.pushBack(a[0],a[1],a[2],a[3])}else{if(a.length==5){if(a[1]=="fire"){this.fire(a[1],a[2],a[3],a[4])}}}};this.setCallBack=function(d,c,a){for(var b=0;b<this.queues.length;b++){if(this.queues[b].id==d){this.queues[b].callbackUse=c;this.queues[b].callbackBackfill=a}}};this.checkInstance=function(h){var g=this.getInstanceById(h);if(g==null){g=this.getLastInstance()}if(g==null){this.csl("instance NULL: "+h)}else{if(g.status==3){this.csl("exit instance: "+h)}else{if(g.isOffline){this.csl("instance offline: "+h);return}var e=g.status;this.csl("instance status: "+e+" : "+h);if(e==1){this.output(g.id,false);this.finishInstance(g.id)}else{var a=true;var b=this.searchForIframe(g.id,g.x,g.y);var d=this.searchForScr'+'ipts(g.id);if(b!=null||g.isAsync||d!=null){var f=((new Date())-g.created);var c=g.loadTime;if(b!=null||d!=null){c=g.loadTimeMax}if(f<=c){this.csl("instance wait "+(g.isAsync?"async":(b!=null?"iframe":"scr'+'ipt"))+" ("+f+"): "+h);window.setTimeout("window.asm_bkfl_obj.checkInstance(\'"+g.id+"\')",200);a=false}else{this.csl("instance wait timeout ("+f+"): "+h)}}else{this.csl("instance NOT load iframe: "+h)}if(a){this.fireID(g.id,true)}}}}};this.output=function(g,c){var f=this.getInstanceById(g);var e=f.status;this.csl("instance output status: "+e+" : "+g);this.finishInstance(g);if(e==1){var a=this.searchForIframe(f.id);if(a!=null){this.csl("instance output iframe load : "+g);a.src=f.frm}else{if(c){this.csl("instance output scr'+'ipt: "+g);var b=f.frm.replace("adframe.php","adscr'+'ipt.php");b=b.replace("admobileframe.php","admobilescr'+'ipt.php");document.write(\'<scr'+'ipt src="\'+b+\'" type="text/javascr'+'ipt" language="JavaScr'+'ipt"><\\/scr'+'ipt>\')}else{this.csl("instance output iframe write: "+g);var d=document.getElementById("asm_callbackItm_"+g);if(typeof(d)!="object"||d==null){d=document.getElementById("asm_marker_"+g)}if(typeof(d)=="object"&&d!=null){d.innerHTML=(\'<iframe class="asm_bkfliframe" id="asm_altifr_\'+f.ifrid+\'" width="\'+f.px+\'" height="\'+f.py+\'" noresize="noresize" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" src="\'+f.frm+\'" ALLOWTRANSPARENCY="true"></iframe>\')}}}this.instanceCallPushback(g)}else{if(e!=3){if(f.pxl!=""){this.csl("instance output PXL FIRE: "+g);(new Image()).src=f.pxl}else{this.csl("instance output PXL not FIRE: "+g)}this.instanceCallFire(g)}}};this.csl=function(a){if(console){console.log(a)}};this.chkForIframe=function(c){if(c.nodeType!=1){return null}if(c.style.display=="none"||c.style.visibility=="hidden"){return null}if(c.nodeName.toUpperCase()=="NOSCR'+'IPT"){return null}if(c.nodeName.toUpperCase()=="NOFRAME"){return null}if(c.nodeName.toUpperCase()=="IFRAME"&&(c.width>=2||c.width=="100%")&&(c.height>=2||c.height=="100%")){return c}for(var b=0;b<c.childNodes.length;b++){var a=this.chkForIframe(c.childNodes[b]);if(a!=null){return a}}return null};this.searchForIframe=function(f){var c=null;var e=document.getElementsByTagName("scr'+'ipt");var d=e[e.length-1];if(document.getElementById("asm_marker_"+f)){var a=document.getElementById("asm_marker_"+f);var b=0;while(a&&b<10000){if(a==d){break}b++;c=this.chkForIframe(a);if(c==null){if(a.nextSibling){a=a.nextSibling}else{break}}else{break}}}return c};this.chkForScr'+'ipt=function(c,d){if(c.nodeType!=1){return null}if(c.style.display=="none"||c.style.visibility=="hidden"){return null}if(c.nodeName.toUpperCase()=="NOSCR'+'IPT"){return null}if(c.nodeName.toUpperCase()=="NOFRAME"){return null}if(c.nodeName.toUpperCase()=="IFRAME"){return null}if(c.nodeName.toUpperCase()=="SCR'+'IPT"){if(c.async&&c.src&&c.src!=""){this.setAsync(d)}if(c.async&&c.src&&c.src!=""){if(typeof(c.readySet)=="boolean"&&c.readySet==false){return c}else{if(!("readySet" in c)){c.readySet=false;if(c.addEventListener){c.addEventListener("load",function(){this.readySet=true},false);c.addEventListener("readystatechange",function(){if(!this.readyState||this.readyState=="complete"){this.readySet=true}},false)}else{if(c.attachEvent){c.attachEvent("onload",function(){this.readySet=true});c.attachEvent("onreadystatechange",function(){if(!this.readyState||this.readyState=="complete"){this.readySet=true}})}}}}}return null}for(var b=0;b<c.childNodes.length;b++){var a=this.chkForScr'+'ipt(c.childNodes[b]);if(a!=null){return a}}return null};this.searchForScr'+'ipts=function(f){if(document.currentScr'+'ipt&&document.currentScr'+'ipt.src.indexOf("asm_backfill")==-1){return document.currentScr'+'ipt}var d=null;var e=document.getElementsByTagName("scr'+'ipt");var c=e[e.length-1];if(document.getElementById("asm_marker_"+f)){var a=document.getElementById("asm_marker_"+f);var b=0;while(a&&b<10000){if(a==c){break}b++;d=this.chkForScr'+'ipt(a,f);if(d==null){if(a.nextSibling){a=a.nextSibling}else{break}}else{break}}}return d}}function asm_backfill_instance(id,asm,pxl,pid,frm,x,y,kid,px,py,ifrid,async){this.id=id;this.asm=asm;this.pxl=pxl;this.pid=pid;this.kid=kid;this.frm=frm;this.x=x;this.y=y;this.px=px;this.py=py;this.async=async;this.ifrid=ifrid;this.loadTime=1500;this.loadTimeMax=3000;this.isOffline=false;this.isAsync=false;this.callbackUse="";this.callbackBackfill="";this.status=0;this.created=new Date();if(console){console.log("add instance: "+id+" = "+asm+" / "+kid+" / "+x+" / "+y)}this.runCallback=function(n){if(typeof(n)=="function"){n(this.id)}else{if(n!=""&&typeof(n)=="string"){try{eval(n+"(this.id)")}catch(e){}}}};this.pushBack=function(){if(this.status!=3){this.status=1}this.runCallback(this.callbackBackfill);this.callbackBackfill=""};this.fire=function(){if(this.status!=3){this.status=2}this.runCallback(this.callbackUse);this.callbackUse=""};this.close=function(){this.status=3}}if(typeof(window.asm_bkfl_obj)!="object"){window.asm_bkfl_obj=new asm_backfill_obj();function asm_receiveMessage(a){if(a&&a.data&&a.data.substr&&a.data.substr(0,9)=="asm_bkfl:"){window.asm_bkfl_obj.rcvMsg(a.data.substr(9,9999))}}if(window.addEventListener){window.addEventListener("message",asm_receiveMessage,false)}else{if(window.attachEvent){window.attachEvent("onmessage",asm_receiveMessage)}}};\nasm_img_svr = "//cdn.adspirit.de/banner/";\nasm_instance_id = "asm24201152706604022764";\nwindow.asm_bkfl_obj.addInstance(asm_instance_id,"askfm_","https://askfm.adspirit.de/adview.php?tz=1527066040760503924tzmacro&pid=24&kid=162&wmid=201&sid=1&nvc=1&target=-",24,"https://askfm.adspirit.de/adframe.php?backfill=1&rty=1&bkflwmid=201&bkflsid=1&bkflsid2=0&bkflsid3=0&pid=24&tz=1527066040483480&wpcn=asmpvx9410491527065206&ref=https%3A%2F%2Fask.fm%2Fvothanhtruongquang123&sid=1&nrc=1&notdm=1&ex=|162&pmrz=asm_24x4502332",300,250,162,300,250,"asm_24x4502332", false );\n\nif(typeof(asm_bkfl) != "object"){asm_bkfl = new Object(); }//kompatibilit�t f�r alte scr'+'ipts\nasm_bkfl.use = 0;\ndocument.write("<span class=\\"asm_marker\\" id=\\"asm_marker_"+asm_instance_id+"\\"></span>");\n</scr'+'ipt><scr'+'ipt type="text/javascr'+'ipt" language="JavaScr'+'ipt">\r\nasm_bkfl_obj.setAsync("asm24201152706604022764");\r\n</scr'+'ipt>\r\n<scr'+'ipt type="text/javascr'+'ipt">\r\n		var pubId=156705;\r\n		var siteId=262833;\r\n		var kadId=1363513;\r\n		var kadwidth=300;\r\n		var kadheight=250;\r\n		var kadtype=1;\r\n		var kadpageurl= "https%3A%2F%2Fask.fm%2F";\r\n</scr'+'ipt>\r\n<scr'+'ipt type="text/javascr'+'ipt" src="https://ads.pubmatic.com/AdServer/js/showad.js"></scr'+'ipt>\r\n<scr'+'ipt type="text/javascr'+'ipt" language="JavaScr'+'ipt" src="//cdn.adspirit.de/banner/asm_backfill_sync.min.js?id=asm24201152706604022764"></scr'+'ipt>\r\n<scr'+'ipt type="text/javascr'+'ipt" language="JavaScr'+'ipt"><'+'!'+'-- \r\n //--'+'></scr'+'ipt>'); 
 }
 else
 {
  document.write('<scr'+'ipt type="text\/javasc'+'ript" language="JavaSc'+'ript" src="https://askfm.adspirit.de/adscript.php?pid=24&hr=1&nrc=1&&wpcn=asmpvx9410491527065206&ref=https%3A%2F%2Fask.fm%2Fvothanhtruongquang123&sid=1&ex=|162&ord='+(new Date()).getTime()+'"><\/scr'+'ipt>');
 }
 