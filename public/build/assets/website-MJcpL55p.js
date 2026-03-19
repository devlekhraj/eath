import{a as Oo}from"./index-Dq7h7Pqt.js";/* empty css              */function Dh(a){return a&&a.__esModule&&Object.prototype.hasOwnProperty.call(a,"default")?a.default:a}var P1={exports:{}};/*!
 * jQuery JavaScript Library v3.7.1
 * https://jquery.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2023-08-28T13:37Z
 */var Oh=P1.exports,rn;function kh(){return rn||(rn=1,function(a){(function(t,e){a.exports=t.document?e(t,!0):function(n){if(!n.document)throw new Error("jQuery requires a window with a document");return e(n)}})(typeof window<"u"?window:Oh,function(t,e){var n=[],s=Object.getPrototypeOf,o=n.slice,c=n.flat?function(i){return n.flat.call(i)}:function(i){return n.concat.apply([],i)},p=n.push,m=n.indexOf,M={},g=M.toString,w=M.hasOwnProperty,A=w.toString,b=A.call(Object),u={},f=function(r){return typeof r=="function"&&typeof r.nodeType!="number"&&typeof r.item!="function"},T=function(r){return r!=null&&r===r.window},S=t.document,C={type:!0,src:!0,nonce:!0,noModule:!0};function E(i,r,h){h=h||S;var d,v,y=h.createElement("script");if(y.text=i,r)for(d in C)v=r[d]||r.getAttribute&&r.getAttribute(d),v&&y.setAttribute(d,v);h.head.appendChild(y).parentNode.removeChild(y)}function L(i){return i==null?i+"":typeof i=="object"||typeof i=="function"?M[g.call(i)]||"object":typeof i}var O="3.7.1",q=/HTML$/i,l=function(i,r){return new l.fn.init(i,r)};l.fn=l.prototype={jquery:O,constructor:l,length:0,toArray:function(){return o.call(this)},get:function(i){return i==null?o.call(this):i<0?this[i+this.length]:this[i]},pushStack:function(i){var r=l.merge(this.constructor(),i);return r.prevObject=this,r},each:function(i){return l.each(this,i)},map:function(i){return this.pushStack(l.map(this,function(r,h){return i.call(r,h,r)}))},slice:function(){return this.pushStack(o.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},even:function(){return this.pushStack(l.grep(this,function(i,r){return(r+1)%2}))},odd:function(){return this.pushStack(l.grep(this,function(i,r){return r%2}))},eq:function(i){var r=this.length,h=+i+(i<0?r:0);return this.pushStack(h>=0&&h<r?[this[h]]:[])},end:function(){return this.prevObject||this.constructor()},push:p,sort:n.sort,splice:n.splice},l.extend=l.fn.extend=function(){var i,r,h,d,v,y,x=arguments[0]||{},V=1,H=arguments.length,D=!1;for(typeof x=="boolean"&&(D=x,x=arguments[V]||{},V++),typeof x!="object"&&!f(x)&&(x={}),V===H&&(x=this,V--);V<H;V++)if((i=arguments[V])!=null)for(r in i)d=i[r],!(r==="__proto__"||x===d)&&(D&&d&&(l.isPlainObject(d)||(v=Array.isArray(d)))?(h=x[r],v&&!Array.isArray(h)?y=[]:!v&&!l.isPlainObject(h)?y={}:y=h,v=!1,x[r]=l.extend(D,y,d)):d!==void 0&&(x[r]=d));return x},l.extend({expando:"jQuery"+(O+Math.random()).replace(/\D/g,""),isReady:!0,error:function(i){throw new Error(i)},noop:function(){},isPlainObject:function(i){var r,h;return!i||g.call(i)!=="[object Object]"?!1:(r=s(i),r?(h=w.call(r,"constructor")&&r.constructor,typeof h=="function"&&A.call(h)===b):!0)},isEmptyObject:function(i){var r;for(r in i)return!1;return!0},globalEval:function(i,r,h){E(i,{nonce:r&&r.nonce},h)},each:function(i,r){var h,d=0;if(W(i))for(h=i.length;d<h&&r.call(i[d],d,i[d])!==!1;d++);else for(d in i)if(r.call(i[d],d,i[d])===!1)break;return i},text:function(i){var r,h="",d=0,v=i.nodeType;if(!v)for(;r=i[d++];)h+=l.text(r);return v===1||v===11?i.textContent:v===9?i.documentElement.textContent:v===3||v===4?i.nodeValue:h},makeArray:function(i,r){var h=r||[];return i!=null&&(W(Object(i))?l.merge(h,typeof i=="string"?[i]:i):p.call(h,i)),h},inArray:function(i,r,h){return r==null?-1:m.call(r,i,h)},isXMLDoc:function(i){var r=i&&i.namespaceURI,h=i&&(i.ownerDocument||i).documentElement;return!q.test(r||h&&h.nodeName||"HTML")},merge:function(i,r){for(var h=+r.length,d=0,v=i.length;d<h;d++)i[v++]=r[d];return i.length=v,i},grep:function(i,r,h){for(var d,v=[],y=0,x=i.length,V=!h;y<x;y++)d=!r(i[y],y),d!==V&&v.push(i[y]);return v},map:function(i,r,h){var d,v,y=0,x=[];if(W(i))for(d=i.length;y<d;y++)v=r(i[y],y,h),v!=null&&x.push(v);else for(y in i)v=r(i[y],y,h),v!=null&&x.push(v);return c(x)},guid:1,support:u}),typeof Symbol=="function"&&(l.fn[Symbol.iterator]=n[Symbol.iterator]),l.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(i,r){M["[object "+r+"]"]=r.toLowerCase()});function W(i){var r=!!i&&"length"in i&&i.length,h=L(i);return f(i)||T(i)?!1:h==="array"||r===0||typeof r=="number"&&r>0&&r-1 in i}function k(i,r){return i.nodeName&&i.nodeName.toLowerCase()===r.toLowerCase()}var z=n.pop,G=n.sort,j=n.splice,I="[\\x20\\t\\r\\n\\f]",X=new RegExp("^"+I+"+|((?:^|[^\\\\])(?:\\\\.)*)"+I+"+$","g");l.contains=function(i,r){var h=r&&r.parentNode;return i===h||!!(h&&h.nodeType===1&&(i.contains?i.contains(h):i.compareDocumentPosition&&i.compareDocumentPosition(h)&16))};var J=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g;function Q(i,r){return r?i==="\0"?"�":i.slice(0,-1)+"\\"+i.charCodeAt(i.length-1).toString(16)+" ":"\\"+i}l.escapeSelector=function(i){return(i+"").replace(J,Q)};var N=S,B=p;(function(){var i,r,h,d,v,y=B,x,V,H,D,Z,Y=l.expando,R=0,it=0,ft=x1(),bt=x1(),vt=x1(),Rt=x1(),kt=function(_,P){return _===P&&(v=!0),0},Ae="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",Te="(?:\\\\[\\da-fA-F]{1,6}"+I+"?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",wt="\\["+I+"*("+Te+")(?:"+I+"*([*^$|!~]?=)"+I+`*(?:'((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)"|(`+Te+"))|)"+I+"*\\]",oa=":("+Te+`)(?:\\((('((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)")|((?:\\\\.|[^\\\\()[\\]]|`+wt+")*)|.*)\\)|)",Et=new RegExp(I+"+","g"),Lt=new RegExp("^"+I+"*,"+I+"*"),Ka=new RegExp("^"+I+"*([>+~]|"+I+")"+I+"*"),ui=new RegExp(I+"|>"),_e=new RegExp(oa),Qa=new RegExp("^"+Te+"$"),He={ID:new RegExp("^#("+Te+")"),CLASS:new RegExp("^\\.("+Te+")"),TAG:new RegExp("^("+Te+"|[*])"),ATTR:new RegExp("^"+wt),PSEUDO:new RegExp("^"+oa),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+I+"*(even|odd|(([+-]|)(\\d*)n|)"+I+"*(?:([+-]|)"+I+"*(\\d+)|))"+I+"*\\)|)","i"),bool:new RegExp("^(?:"+Ae+")$","i"),needsContext:new RegExp("^"+I+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+I+"*((?:-\\d)?\\d*)"+I+"*\\)|)(?=[^-]|$)","i")},qe=/^(?:input|select|textarea|button)$/i,We=/^h\d$/i,ue=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,fi=/[+~]/,ke=new RegExp("\\\\[\\da-fA-F]{1,6}"+I+"?|\\\\([^\\r\\n\\f])","g"),Ie=function(_,P){var $="0x"+_.slice(1)-65536;return P||($<0?String.fromCharCode($+65536):String.fromCharCode($>>10|55296,$&1023|56320))},Ah=function(){je()},Th=b1(function(_){return _.disabled===!0&&k(_,"fieldset")},{dir:"parentNode",next:"legend"});function _h(){try{return x.activeElement}catch{}}try{y.apply(n=o.call(N.childNodes),N.childNodes),n[N.childNodes.length].nodeType}catch{y={apply:function(P,$){B.apply(P,o.call($))},call:function(P){B.apply(P,o.call(arguments,1))}}}function Ct(_,P,$,F){var U,rt,st,ht,ot,gt,ut,Mt=P&&P.ownerDocument,yt=P?P.nodeType:9;if($=$||[],typeof _!="string"||!_||yt!==1&&yt!==9&&yt!==11)return $;if(!F&&(je(P),P=P||x,H)){if(yt!==11&&(ot=ue.exec(_)))if(U=ot[1]){if(yt===9)if(st=P.getElementById(U)){if(st.id===U)return y.call($,st),$}else return $;else if(Mt&&(st=Mt.getElementById(U))&&Ct.contains(P,st)&&st.id===U)return y.call($,st),$}else{if(ot[2])return y.apply($,P.getElementsByTagName(_)),$;if((U=ot[3])&&P.getElementsByClassName)return y.apply($,P.getElementsByClassName(U)),$}if(!Rt[_+" "]&&(!D||!D.test(_))){if(ut=_,Mt=P,yt===1&&(ui.test(_)||Ka.test(_))){for(Mt=fi.test(_)&&Mi(P.parentNode)||P,(Mt!=P||!u.scope)&&((ht=P.getAttribute("id"))?ht=l.escapeSelector(ht):P.setAttribute("id",ht=Y)),gt=Ja(_),rt=gt.length;rt--;)gt[rt]=(ht?"#"+ht:":scope")+" "+w1(gt[rt]);ut=gt.join(",")}try{return y.apply($,Mt.querySelectorAll(ut)),$}catch{Rt(_,!0)}finally{ht===Y&&P.removeAttribute("id")}}}return nn(_.replace(X,"$1"),P,$,F)}function x1(){var _=[];function P($,F){return _.push($+" ")>r.cacheLength&&delete P[_.shift()],P[$+" "]=F}return P}function Ee(_){return _[Y]=!0,_}function Sa(_){var P=x.createElement("fieldset");try{return!!_(P)}catch{return!1}finally{P.parentNode&&P.parentNode.removeChild(P),P=null}}function Hh(_){return function(P){return k(P,"input")&&P.type===_}}function Lh(_){return function(P){return(k(P,"input")||k(P,"button"))&&P.type===_}}function en(_){return function(P){return"form"in P?P.parentNode&&P.disabled===!1?"label"in P?"label"in P.parentNode?P.parentNode.disabled===_:P.disabled===_:P.isDisabled===_||P.isDisabled!==!_&&Th(P)===_:P.disabled===_:"label"in P?P.disabled===_:!1}}function la(_){return Ee(function(P){return P=+P,Ee(function($,F){for(var U,rt=_([],$.length,P),st=rt.length;st--;)$[U=rt[st]]&&($[U]=!(F[U]=$[U]))})})}function Mi(_){return _&&typeof _.getElementsByTagName<"u"&&_}function je(_){var P,$=_?_.ownerDocument||_:N;return $==x||$.nodeType!==9||!$.documentElement||(x=$,V=x.documentElement,H=!l.isXMLDoc(x),Z=V.matches||V.webkitMatchesSelector||V.msMatchesSelector,V.msMatchesSelector&&N!=x&&(P=x.defaultView)&&P.top!==P&&P.addEventListener("unload",Ah),u.getById=Sa(function(F){return V.appendChild(F).id=l.expando,!x.getElementsByName||!x.getElementsByName(l.expando).length}),u.disconnectedMatch=Sa(function(F){return Z.call(F,"*")}),u.scope=Sa(function(){return x.querySelectorAll(":scope")}),u.cssHas=Sa(function(){try{return x.querySelector(":has(*,:jqfake)"),!1}catch{return!0}}),u.getById?(r.filter.ID=function(F){var U=F.replace(ke,Ie);return function(rt){return rt.getAttribute("id")===U}},r.find.ID=function(F,U){if(typeof U.getElementById<"u"&&H){var rt=U.getElementById(F);return rt?[rt]:[]}}):(r.filter.ID=function(F){var U=F.replace(ke,Ie);return function(rt){var st=typeof rt.getAttributeNode<"u"&&rt.getAttributeNode("id");return st&&st.value===U}},r.find.ID=function(F,U){if(typeof U.getElementById<"u"&&H){var rt,st,ht,ot=U.getElementById(F);if(ot){if(rt=ot.getAttributeNode("id"),rt&&rt.value===F)return[ot];for(ht=U.getElementsByName(F),st=0;ot=ht[st++];)if(rt=ot.getAttributeNode("id"),rt&&rt.value===F)return[ot]}return[]}}),r.find.TAG=function(F,U){return typeof U.getElementsByTagName<"u"?U.getElementsByTagName(F):U.querySelectorAll(F)},r.find.CLASS=function(F,U){if(typeof U.getElementsByClassName<"u"&&H)return U.getElementsByClassName(F)},D=[],Sa(function(F){var U;V.appendChild(F).innerHTML="<a id='"+Y+"' href='' disabled='disabled'></a><select id='"+Y+"-\r\\' disabled='disabled'><option selected=''></option></select>",F.querySelectorAll("[selected]").length||D.push("\\["+I+"*(?:value|"+Ae+")"),F.querySelectorAll("[id~="+Y+"-]").length||D.push("~="),F.querySelectorAll("a#"+Y+"+*").length||D.push(".#.+[+~]"),F.querySelectorAll(":checked").length||D.push(":checked"),U=x.createElement("input"),U.setAttribute("type","hidden"),F.appendChild(U).setAttribute("name","D"),V.appendChild(F).disabled=!0,F.querySelectorAll(":disabled").length!==2&&D.push(":enabled",":disabled"),U=x.createElement("input"),U.setAttribute("name",""),F.appendChild(U),F.querySelectorAll("[name='']").length||D.push("\\["+I+"*name"+I+"*="+I+`*(?:''|"")`)}),u.cssHas||D.push(":has"),D=D.length&&new RegExp(D.join("|")),kt=function(F,U){if(F===U)return v=!0,0;var rt=!F.compareDocumentPosition-!U.compareDocumentPosition;return rt||(rt=(F.ownerDocument||F)==(U.ownerDocument||U)?F.compareDocumentPosition(U):1,rt&1||!u.sortDetached&&U.compareDocumentPosition(F)===rt?F===x||F.ownerDocument==N&&Ct.contains(N,F)?-1:U===x||U.ownerDocument==N&&Ct.contains(N,U)?1:d?m.call(d,F)-m.call(d,U):0:rt&4?-1:1)}),x}Ct.matches=function(_,P){return Ct(_,null,null,P)},Ct.matchesSelector=function(_,P){if(je(_),H&&!Rt[P+" "]&&(!D||!D.test(P)))try{var $=Z.call(_,P);if($||u.disconnectedMatch||_.document&&_.document.nodeType!==11)return $}catch{Rt(P,!0)}return Ct(P,x,null,[_]).length>0},Ct.contains=function(_,P){return(_.ownerDocument||_)!=x&&je(_),l.contains(_,P)},Ct.attr=function(_,P){(_.ownerDocument||_)!=x&&je(_);var $=r.attrHandle[P.toLowerCase()],F=$&&w.call(r.attrHandle,P.toLowerCase())?$(_,P,!H):void 0;return F!==void 0?F:_.getAttribute(P)},Ct.error=function(_){throw new Error("Syntax error, unrecognized expression: "+_)},l.uniqueSort=function(_){var P,$=[],F=0,U=0;if(v=!u.sortStable,d=!u.sortStable&&o.call(_,0),G.call(_,kt),v){for(;P=_[U++];)P===_[U]&&(F=$.push(U));for(;F--;)j.call(_,$[F],1)}return d=null,_},l.fn.uniqueSort=function(){return this.pushStack(l.uniqueSort(o.apply(this)))},r=l.expr={cacheLength:50,createPseudo:Ee,match:He,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(_){return _[1]=_[1].replace(ke,Ie),_[3]=(_[3]||_[4]||_[5]||"").replace(ke,Ie),_[2]==="~="&&(_[3]=" "+_[3]+" "),_.slice(0,4)},CHILD:function(_){return _[1]=_[1].toLowerCase(),_[1].slice(0,3)==="nth"?(_[3]||Ct.error(_[0]),_[4]=+(_[4]?_[5]+(_[6]||1):2*(_[3]==="even"||_[3]==="odd")),_[5]=+(_[7]+_[8]||_[3]==="odd")):_[3]&&Ct.error(_[0]),_},PSEUDO:function(_){var P,$=!_[6]&&_[2];return He.CHILD.test(_[0])?null:(_[3]?_[2]=_[4]||_[5]||"":$&&_e.test($)&&(P=Ja($,!0))&&(P=$.indexOf(")",$.length-P)-$.length)&&(_[0]=_[0].slice(0,P),_[2]=$.slice(0,P)),_.slice(0,3))}},filter:{TAG:function(_){var P=_.replace(ke,Ie).toLowerCase();return _==="*"?function(){return!0}:function($){return k($,P)}},CLASS:function(_){var P=ft[_+" "];return P||(P=new RegExp("(^|"+I+")"+_+"("+I+"|$)"))&&ft(_,function($){return P.test(typeof $.className=="string"&&$.className||typeof $.getAttribute<"u"&&$.getAttribute("class")||"")})},ATTR:function(_,P,$){return function(F){var U=Ct.attr(F,_);return U==null?P==="!=":P?(U+="",P==="="?U===$:P==="!="?U!==$:P==="^="?$&&U.indexOf($)===0:P==="*="?$&&U.indexOf($)>-1:P==="$="?$&&U.slice(-$.length)===$:P==="~="?(" "+U.replace(Et," ")+" ").indexOf($)>-1:P==="|="?U===$||U.slice(0,$.length+1)===$+"-":!1):!0}},CHILD:function(_,P,$,F,U){var rt=_.slice(0,3)!=="nth",st=_.slice(-4)!=="last",ht=P==="of-type";return F===1&&U===0?function(ot){return!!ot.parentNode}:function(ot,gt,ut){var Mt,yt,ct,Tt,te,qt=rt!==st?"nextSibling":"previousSibling",fe=ot.parentNode,Le=ht&&ot.nodeName.toLowerCase(),Ca=!ut&&!ht,Zt=!1;if(fe){if(rt){for(;qt;){for(ct=ot;ct=ct[qt];)if(ht?k(ct,Le):ct.nodeType===1)return!1;te=qt=_==="only"&&!te&&"nextSibling"}return!0}if(te=[st?fe.firstChild:fe.lastChild],st&&Ca){for(yt=fe[Y]||(fe[Y]={}),Mt=yt[_]||[],Tt=Mt[0]===R&&Mt[1],Zt=Tt&&Mt[2],ct=Tt&&fe.childNodes[Tt];ct=++Tt&&ct&&ct[qt]||(Zt=Tt=0)||te.pop();)if(ct.nodeType===1&&++Zt&&ct===ot){yt[_]=[R,Tt,Zt];break}}else if(Ca&&(yt=ot[Y]||(ot[Y]={}),Mt=yt[_]||[],Tt=Mt[0]===R&&Mt[1],Zt=Tt),Zt===!1)for(;(ct=++Tt&&ct&&ct[qt]||(Zt=Tt=0)||te.pop())&&!((ht?k(ct,Le):ct.nodeType===1)&&++Zt&&(Ca&&(yt=ct[Y]||(ct[Y]={}),yt[_]=[R,Zt]),ct===ot)););return Zt-=U,Zt===F||Zt%F===0&&Zt/F>=0}}},PSEUDO:function(_,P){var $,F=r.pseudos[_]||r.setFilters[_.toLowerCase()]||Ct.error("unsupported pseudo: "+_);return F[Y]?F(P):F.length>1?($=[_,_,"",P],r.setFilters.hasOwnProperty(_.toLowerCase())?Ee(function(U,rt){for(var st,ht=F(U,P),ot=ht.length;ot--;)st=m.call(U,ht[ot]),U[st]=!(rt[st]=ht[ot])}):function(U){return F(U,0,$)}):F}},pseudos:{not:Ee(function(_){var P=[],$=[],F=yi(_.replace(X,"$1"));return F[Y]?Ee(function(U,rt,st,ht){for(var ot,gt=F(U,null,ht,[]),ut=U.length;ut--;)(ot=gt[ut])&&(U[ut]=!(rt[ut]=ot))}):function(U,rt,st){return P[0]=U,F(P,null,st,$),P[0]=null,!$.pop()}}),has:Ee(function(_){return function(P){return Ct(_,P).length>0}}),contains:Ee(function(_){return _=_.replace(ke,Ie),function(P){return(P.textContent||l.text(P)).indexOf(_)>-1}}),lang:Ee(function(_){return Qa.test(_||"")||Ct.error("unsupported lang: "+_),_=_.replace(ke,Ie).toLowerCase(),function(P){var $;do if($=H?P.lang:P.getAttribute("xml:lang")||P.getAttribute("lang"))return $=$.toLowerCase(),$===_||$.indexOf(_+"-")===0;while((P=P.parentNode)&&P.nodeType===1);return!1}}),target:function(_){var P=t.location&&t.location.hash;return P&&P.slice(1)===_.id},root:function(_){return _===V},focus:function(_){return _===_h()&&x.hasFocus()&&!!(_.type||_.href||~_.tabIndex)},enabled:en(!1),disabled:en(!0),checked:function(_){return k(_,"input")&&!!_.checked||k(_,"option")&&!!_.selected},selected:function(_){return _.parentNode&&_.parentNode.selectedIndex,_.selected===!0},empty:function(_){for(_=_.firstChild;_;_=_.nextSibling)if(_.nodeType<6)return!1;return!0},parent:function(_){return!r.pseudos.empty(_)},header:function(_){return We.test(_.nodeName)},input:function(_){return qe.test(_.nodeName)},button:function(_){return k(_,"input")&&_.type==="button"||k(_,"button")},text:function(_){var P;return k(_,"input")&&_.type==="text"&&((P=_.getAttribute("type"))==null||P.toLowerCase()==="text")},first:la(function(){return[0]}),last:la(function(_,P){return[P-1]}),eq:la(function(_,P,$){return[$<0?$+P:$]}),even:la(function(_,P){for(var $=0;$<P;$+=2)_.push($);return _}),odd:la(function(_,P){for(var $=1;$<P;$+=2)_.push($);return _}),lt:la(function(_,P,$){var F;for($<0?F=$+P:$>P?F=P:F=$;--F>=0;)_.push(F);return _}),gt:la(function(_,P,$){for(var F=$<0?$+P:$;++F<P;)_.push(F);return _})}},r.pseudos.nth=r.pseudos.eq;for(i in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})r.pseudos[i]=Hh(i);for(i in{submit:!0,reset:!0})r.pseudos[i]=Lh(i);function an(){}an.prototype=r.filters=r.pseudos,r.setFilters=new an;function Ja(_,P){var $,F,U,rt,st,ht,ot,gt=bt[_+" "];if(gt)return P?0:gt.slice(0);for(st=_,ht=[],ot=r.preFilter;st;){(!$||(F=Lt.exec(st)))&&(F&&(st=st.slice(F[0].length)||st),ht.push(U=[])),$=!1,(F=Ka.exec(st))&&($=F.shift(),U.push({value:$,type:F[0].replace(X," ")}),st=st.slice($.length));for(rt in r.filter)(F=He[rt].exec(st))&&(!ot[rt]||(F=ot[rt](F)))&&($=F.shift(),U.push({value:$,type:rt,matches:F}),st=st.slice($.length));if(!$)break}return P?st.length:st?Ct.error(_):bt(_,ht).slice(0)}function w1(_){for(var P=0,$=_.length,F="";P<$;P++)F+=_[P].value;return F}function b1(_,P,$){var F=P.dir,U=P.next,rt=U||F,st=$&&rt==="parentNode",ht=it++;return P.first?function(ot,gt,ut){for(;ot=ot[F];)if(ot.nodeType===1||st)return _(ot,gt,ut);return!1}:function(ot,gt,ut){var Mt,yt,ct=[R,ht];if(ut){for(;ot=ot[F];)if((ot.nodeType===1||st)&&_(ot,gt,ut))return!0}else for(;ot=ot[F];)if(ot.nodeType===1||st)if(yt=ot[Y]||(ot[Y]={}),U&&k(ot,U))ot=ot[F]||ot;else{if((Mt=yt[rt])&&Mt[0]===R&&Mt[1]===ht)return ct[2]=Mt[2];if(yt[rt]=ct,ct[2]=_(ot,gt,ut))return!0}return!1}}function mi(_){return _.length>1?function(P,$,F){for(var U=_.length;U--;)if(!_[U](P,$,F))return!1;return!0}:_[0]}function Vh(_,P,$){for(var F=0,U=P.length;F<U;F++)Ct(_,P[F],$);return $}function E1(_,P,$,F,U){for(var rt,st=[],ht=0,ot=_.length,gt=P!=null;ht<ot;ht++)(rt=_[ht])&&(!$||$(rt,F,U))&&(st.push(rt),gt&&P.push(ht));return st}function vi(_,P,$,F,U,rt){return F&&!F[Y]&&(F=vi(F)),U&&!U[Y]&&(U=vi(U,rt)),Ee(function(st,ht,ot,gt){var ut,Mt,yt,ct,Tt=[],te=[],qt=ht.length,fe=st||Vh(P||"*",ot.nodeType?[ot]:ot,[]),Le=_&&(st||!P)?E1(fe,Tt,_,ot,gt):fe;if($?(ct=U||(st?_:qt||F)?[]:ht,$(Le,ct,ot,gt)):ct=Le,F)for(ut=E1(ct,te),F(ut,[],ot,gt),Mt=ut.length;Mt--;)(yt=ut[Mt])&&(ct[te[Mt]]=!(Le[te[Mt]]=yt));if(st){if(U||_){if(U){for(ut=[],Mt=ct.length;Mt--;)(yt=ct[Mt])&&ut.push(Le[Mt]=yt);U(null,ct=[],ut,gt)}for(Mt=ct.length;Mt--;)(yt=ct[Mt])&&(ut=U?m.call(st,yt):Tt[Mt])>-1&&(st[ut]=!(ht[ut]=yt))}}else ct=E1(ct===ht?ct.splice(qt,ct.length):ct),U?U(null,ht,ct,gt):y.apply(ht,ct)})}function gi(_){for(var P,$,F,U=_.length,rt=r.relative[_[0].type],st=rt||r.relative[" "],ht=rt?1:0,ot=b1(function(Mt){return Mt===P},st,!0),gt=b1(function(Mt){return m.call(P,Mt)>-1},st,!0),ut=[function(Mt,yt,ct){var Tt=!rt&&(ct||yt!=h)||((P=yt).nodeType?ot(Mt,yt,ct):gt(Mt,yt,ct));return P=null,Tt}];ht<U;ht++)if($=r.relative[_[ht].type])ut=[b1(mi(ut),$)];else{if($=r.filter[_[ht].type].apply(null,_[ht].matches),$[Y]){for(F=++ht;F<U&&!r.relative[_[F].type];F++);return vi(ht>1&&mi(ut),ht>1&&w1(_.slice(0,ht-1).concat({value:_[ht-2].type===" "?"*":""})).replace(X,"$1"),$,ht<F&&gi(_.slice(ht,F)),F<U&&gi(_=_.slice(F)),F<U&&w1(_))}ut.push($)}return mi(ut)}function Ph(_,P){var $=P.length>0,F=_.length>0,U=function(rt,st,ht,ot,gt){var ut,Mt,yt,ct=0,Tt="0",te=rt&&[],qt=[],fe=h,Le=rt||F&&r.find.TAG("*",gt),Ca=R+=fe==null?1:Math.random()||.1,Zt=Le.length;for(gt&&(h=st==x||st||gt);Tt!==Zt&&(ut=Le[Tt])!=null;Tt++){if(F&&ut){for(Mt=0,!st&&ut.ownerDocument!=x&&(je(ut),ht=!H);yt=_[Mt++];)if(yt(ut,st||x,ht)){y.call(ot,ut);break}gt&&(R=Ca)}$&&((ut=!yt&&ut)&&ct--,rt&&te.push(ut))}if(ct+=Tt,$&&Tt!==ct){for(Mt=0;yt=P[Mt++];)yt(te,qt,st,ht);if(rt){if(ct>0)for(;Tt--;)te[Tt]||qt[Tt]||(qt[Tt]=z.call(ot));qt=E1(qt)}y.apply(ot,qt),gt&&!rt&&qt.length>0&&ct+P.length>1&&l.uniqueSort(ot)}return gt&&(R=Ca,h=fe),te};return $?Ee(U):U}function yi(_,P){var $,F=[],U=[],rt=vt[_+" "];if(!rt){for(P||(P=Ja(_)),$=P.length;$--;)rt=gi(P[$]),rt[Y]?F.push(rt):U.push(rt);rt=vt(_,Ph(U,F)),rt.selector=_}return rt}function nn(_,P,$,F){var U,rt,st,ht,ot,gt=typeof _=="function"&&_,ut=!F&&Ja(_=gt.selector||_);if($=$||[],ut.length===1){if(rt=ut[0]=ut[0].slice(0),rt.length>2&&(st=rt[0]).type==="ID"&&P.nodeType===9&&H&&r.relative[rt[1].type]){if(P=(r.find.ID(st.matches[0].replace(ke,Ie),P)||[])[0],P)gt&&(P=P.parentNode);else return $;_=_.slice(rt.shift().value.length)}for(U=He.needsContext.test(_)?0:rt.length;U--&&(st=rt[U],!r.relative[ht=st.type]);)if((ot=r.find[ht])&&(F=ot(st.matches[0].replace(ke,Ie),fi.test(rt[0].type)&&Mi(P.parentNode)||P))){if(rt.splice(U,1),_=F.length&&w1(rt),!_)return y.apply($,F),$;break}}return(gt||yi(_,ut))(F,P,!H,$,!P||fi.test(_)&&Mi(P.parentNode)||P),$}u.sortStable=Y.split("").sort(kt).join("")===Y,je(),u.sortDetached=Sa(function(_){return _.compareDocumentPosition(x.createElement("fieldset"))&1}),l.find=Ct,l.expr[":"]=l.expr.pseudos,l.unique=l.uniqueSort,Ct.compile=yi,Ct.select=nn,Ct.setDocument=je,Ct.tokenize=Ja,Ct.escape=l.escapeSelector,Ct.getText=l.text,Ct.isXML=l.isXMLDoc,Ct.selectors=l.expr,Ct.support=l.support,Ct.uniqueSort=l.uniqueSort})();var at=function(i,r,h){for(var d=[],v=h!==void 0;(i=i[r])&&i.nodeType!==9;)if(i.nodeType===1){if(v&&l(i).is(h))break;d.push(i)}return d},pt=function(i,r){for(var h=[];i;i=i.nextSibling)i.nodeType===1&&i!==r&&h.push(i);return h},St=l.expr.match.needsContext,At=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function Ot(i,r,h){return f(r)?l.grep(i,function(d,v){return!!r.call(d,v,d)!==h}):r.nodeType?l.grep(i,function(d){return d===r!==h}):typeof r!="string"?l.grep(i,function(d){return m.call(r,d)>-1!==h}):l.filter(r,i,h)}l.filter=function(i,r,h){var d=r[0];return h&&(i=":not("+i+")"),r.length===1&&d.nodeType===1?l.find.matchesSelector(d,i)?[d]:[]:l.find.matches(i,l.grep(r,function(v){return v.nodeType===1}))},l.fn.extend({find:function(i){var r,h,d=this.length,v=this;if(typeof i!="string")return this.pushStack(l(i).filter(function(){for(r=0;r<d;r++)if(l.contains(v[r],this))return!0}));for(h=this.pushStack([]),r=0;r<d;r++)l.find(i,v[r],h);return d>1?l.uniqueSort(h):h},filter:function(i){return this.pushStack(Ot(this,i||[],!1))},not:function(i){return this.pushStack(Ot(this,i||[],!0))},is:function(i){return!!Ot(this,typeof i=="string"&&St.test(i)?l(i):i||[],!1).length}});var jt,tt=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,K=l.fn.init=function(i,r,h){var d,v;if(!i)return this;if(h=h||jt,typeof i=="string")if(i[0]==="<"&&i[i.length-1]===">"&&i.length>=3?d=[null,i,null]:d=tt.exec(i),d&&(d[1]||!r))if(d[1]){if(r=r instanceof l?r[0]:r,l.merge(this,l.parseHTML(d[1],r&&r.nodeType?r.ownerDocument||r:S,!0)),At.test(d[1])&&l.isPlainObject(r))for(d in r)f(this[d])?this[d](r[d]):this.attr(d,r[d]);return this}else return v=S.getElementById(d[2]),v&&(this[0]=v,this.length=1),this;else return!r||r.jquery?(r||h).find(i):this.constructor(r).find(i);else{if(i.nodeType)return this[0]=i,this.length=1,this;if(f(i))return h.ready!==void 0?h.ready(i):i(l)}return l.makeArray(i,this)};K.prototype=l.fn,jt=l(S);var nt=/^(?:parents|prev(?:Until|All))/,mt={children:!0,contents:!0,next:!0,prev:!0};l.fn.extend({has:function(i){var r=l(i,this),h=r.length;return this.filter(function(){for(var d=0;d<h;d++)if(l.contains(this,r[d]))return!0})},closest:function(i,r){var h,d=0,v=this.length,y=[],x=typeof i!="string"&&l(i);if(!St.test(i)){for(;d<v;d++)for(h=this[d];h&&h!==r;h=h.parentNode)if(h.nodeType<11&&(x?x.index(h)>-1:h.nodeType===1&&l.find.matchesSelector(h,i))){y.push(h);break}}return this.pushStack(y.length>1?l.uniqueSort(y):y)},index:function(i){return i?typeof i=="string"?m.call(l(i),this[0]):m.call(this,i.jquery?i[0]:i):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(i,r){return this.pushStack(l.uniqueSort(l.merge(this.get(),l(i,r))))},addBack:function(i){return this.add(i==null?this.prevObject:this.prevObject.filter(i))}});function Ht(i,r){for(;(i=i[r])&&i.nodeType!==1;);return i}l.each({parent:function(i){var r=i.parentNode;return r&&r.nodeType!==11?r:null},parents:function(i){return at(i,"parentNode")},parentsUntil:function(i,r,h){return at(i,"parentNode",h)},next:function(i){return Ht(i,"nextSibling")},prev:function(i){return Ht(i,"previousSibling")},nextAll:function(i){return at(i,"nextSibling")},prevAll:function(i){return at(i,"previousSibling")},nextUntil:function(i,r,h){return at(i,"nextSibling",h)},prevUntil:function(i,r,h){return at(i,"previousSibling",h)},siblings:function(i){return pt((i.parentNode||{}).firstChild,i)},children:function(i){return pt(i.firstChild)},contents:function(i){return i.contentDocument!=null&&s(i.contentDocument)?i.contentDocument:(k(i,"template")&&(i=i.content||i),l.merge([],i.childNodes))}},function(i,r){l.fn[i]=function(h,d){var v=l.map(this,r,h);return i.slice(-5)!=="Until"&&(d=h),d&&typeof d=="string"&&(v=l.filter(d,v)),this.length>1&&(mt[i]||l.uniqueSort(v),nt.test(i)&&v.reverse()),this.pushStack(v)}});var Vt=/[^\x20\t\r\n\f]+/g;function Yt(i){var r={};return l.each(i.match(Vt)||[],function(h,d){r[d]=!0}),r}l.Callbacks=function(i){i=typeof i=="string"?Yt(i):l.extend({},i);var r,h,d,v,y=[],x=[],V=-1,H=function(){for(v=v||i.once,d=r=!0;x.length;V=-1)for(h=x.shift();++V<y.length;)y[V].apply(h[0],h[1])===!1&&i.stopOnFalse&&(V=y.length,h=!1);i.memory||(h=!1),r=!1,v&&(h?y=[]:y="")},D={add:function(){return y&&(h&&!r&&(V=y.length-1,x.push(h)),function Z(Y){l.each(Y,function(R,it){f(it)?(!i.unique||!D.has(it))&&y.push(it):it&&it.length&&L(it)!=="string"&&Z(it)})}(arguments),h&&!r&&H()),this},remove:function(){return l.each(arguments,function(Z,Y){for(var R;(R=l.inArray(Y,y,R))>-1;)y.splice(R,1),R<=V&&V--}),this},has:function(Z){return Z?l.inArray(Z,y)>-1:y.length>0},empty:function(){return y&&(y=[]),this},disable:function(){return v=x=[],y=h="",this},disabled:function(){return!y},lock:function(){return v=x=[],!h&&!r&&(y=h=""),this},locked:function(){return!!v},fireWith:function(Z,Y){return v||(Y=Y||[],Y=[Z,Y.slice?Y.slice():Y],x.push(Y),r||H()),this},fire:function(){return D.fireWith(this,arguments),this},fired:function(){return!!d}};return D};function It(i){return i}function Ft(i){throw i}function Pt(i,r,h,d){var v;try{i&&f(v=i.promise)?v.call(i).done(r).fail(h):i&&f(v=i.then)?v.call(i,r,h):r.apply(void 0,[i].slice(d))}catch(y){h.apply(void 0,[y])}}l.extend({Deferred:function(i){var r=[["notify","progress",l.Callbacks("memory"),l.Callbacks("memory"),2],["resolve","done",l.Callbacks("once memory"),l.Callbacks("once memory"),0,"resolved"],["reject","fail",l.Callbacks("once memory"),l.Callbacks("once memory"),1,"rejected"]],h="pending",d={state:function(){return h},always:function(){return v.done(arguments).fail(arguments),this},catch:function(y){return d.then(null,y)},pipe:function(){var y=arguments;return l.Deferred(function(x){l.each(r,function(V,H){var D=f(y[H[4]])&&y[H[4]];v[H[1]](function(){var Z=D&&D.apply(this,arguments);Z&&f(Z.promise)?Z.promise().progress(x.notify).done(x.resolve).fail(x.reject):x[H[0]+"With"](this,D?[Z]:arguments)})}),y=null}).promise()},then:function(y,x,V){var H=0;function D(Z,Y,R,it){return function(){var ft=this,bt=arguments,vt=function(){var kt,Ae;if(!(Z<H)){if(kt=R.apply(ft,bt),kt===Y.promise())throw new TypeError("Thenable self-resolution");Ae=kt&&(typeof kt=="object"||typeof kt=="function")&&kt.then,f(Ae)?it?Ae.call(kt,D(H,Y,It,it),D(H,Y,Ft,it)):(H++,Ae.call(kt,D(H,Y,It,it),D(H,Y,Ft,it),D(H,Y,It,Y.notifyWith))):(R!==It&&(ft=void 0,bt=[kt]),(it||Y.resolveWith)(ft,bt))}},Rt=it?vt:function(){try{vt()}catch(kt){l.Deferred.exceptionHook&&l.Deferred.exceptionHook(kt,Rt.error),Z+1>=H&&(R!==Ft&&(ft=void 0,bt=[kt]),Y.rejectWith(ft,bt))}};Z?Rt():(l.Deferred.getErrorHook?Rt.error=l.Deferred.getErrorHook():l.Deferred.getStackHook&&(Rt.error=l.Deferred.getStackHook()),t.setTimeout(Rt))}}return l.Deferred(function(Z){r[0][3].add(D(0,Z,f(V)?V:It,Z.notifyWith)),r[1][3].add(D(0,Z,f(y)?y:It)),r[2][3].add(D(0,Z,f(x)?x:Ft))}).promise()},promise:function(y){return y!=null?l.extend(y,d):d}},v={};return l.each(r,function(y,x){var V=x[2],H=x[5];d[x[1]]=V.add,H&&V.add(function(){h=H},r[3-y][2].disable,r[3-y][3].disable,r[0][2].lock,r[0][3].lock),V.add(x[3].fire),v[x[0]]=function(){return v[x[0]+"With"](this===v?void 0:this,arguments),this},v[x[0]+"With"]=V.fireWith}),d.promise(v),i&&i.call(v,v),v},when:function(i){var r=arguments.length,h=r,d=Array(h),v=o.call(arguments),y=l.Deferred(),x=function(V){return function(H){d[V]=this,v[V]=arguments.length>1?o.call(arguments):H,--r||y.resolveWith(d,v)}};if(r<=1&&(Pt(i,y.done(x(h)).resolve,y.reject,!r),y.state()==="pending"||f(v[h]&&v[h].then)))return y.then();for(;h--;)Pt(v[h],x(h),y.reject);return y.promise()}});var Gt=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;l.Deferred.exceptionHook=function(i,r){t.console&&t.console.warn&&i&&Gt.test(i.name)&&t.console.warn("jQuery.Deferred exception: "+i.message,i.stack,r)},l.readyException=function(i){t.setTimeout(function(){throw i})};var he=l.Deferred();l.fn.ready=function(i){return he.then(i).catch(function(r){l.readyException(r)}),this},l.extend({isReady:!1,readyWait:1,ready:function(i){(i===!0?--l.readyWait:l.isReady)||(l.isReady=!0,!(i!==!0&&--l.readyWait>0)&&he.resolveWith(S,[l]))}}),l.ready.then=he.then;function de(){S.removeEventListener("DOMContentLoaded",de),t.removeEventListener("load",de),l.ready()}S.readyState==="complete"||S.readyState!=="loading"&&!S.documentElement.doScroll?t.setTimeout(l.ready):(S.addEventListener("DOMContentLoaded",de),t.addEventListener("load",de));var Nt=function(i,r,h,d,v,y,x){var V=0,H=i.length,D=h==null;if(L(h)==="object"){v=!0;for(V in h)Nt(i,r,V,h[V],!0,y,x)}else if(d!==void 0&&(v=!0,f(d)||(x=!0),D&&(x?(r.call(i,d),r=null):(D=r,r=function(Z,Y,R){return D.call(l(Z),R)})),r))for(;V<H;V++)r(i[V],h,x?d:d.call(i[V],V,r(i[V],h)));return v?i:D?r.call(i):H?r(i[0],h):y},Ce=/^-ms-/,Kt=/-([a-z])/g;function xe(i,r){return r.toUpperCase()}function $t(i){return i.replace(Ce,"ms-").replace(Kt,xe)}var ce=function(i){return i.nodeType===1||i.nodeType===9||!+i.nodeType};function ie(){this.expando=l.expando+ie.uid++}ie.uid=1,ie.prototype={cache:function(i){var r=i[this.expando];return r||(r={},ce(i)&&(i.nodeType?i[this.expando]=r:Object.defineProperty(i,this.expando,{value:r,configurable:!0}))),r},set:function(i,r,h){var d,v=this.cache(i);if(typeof r=="string")v[$t(r)]=h;else for(d in r)v[$t(d)]=r[d];return v},get:function(i,r){return r===void 0?this.cache(i):i[this.expando]&&i[this.expando][$t(r)]},access:function(i,r,h){return r===void 0||r&&typeof r=="string"&&h===void 0?this.get(i,r):(this.set(i,r,h),h!==void 0?h:r)},remove:function(i,r){var h,d=i[this.expando];if(d!==void 0){if(r!==void 0)for(Array.isArray(r)?r=r.map($t):(r=$t(r),r=r in d?[r]:r.match(Vt)||[]),h=r.length;h--;)delete d[r[h]];(r===void 0||l.isEmptyObject(d))&&(i.nodeType?i[this.expando]=void 0:delete i[this.expando])}},hasData:function(i){var r=i[this.expando];return r!==void 0&&!l.isEmptyObject(r)}};var lt=new ie,Dt=new ie,we=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,aa=/[A-Z]/g;function ia(i){return i==="true"?!0:i==="false"?!1:i==="null"?null:i===+i+""?+i:we.test(i)?JSON.parse(i):i}function S2(i,r,h){var d;if(h===void 0&&i.nodeType===1)if(d="data-"+r.replace(aa,"-$&").toLowerCase(),h=i.getAttribute(d),typeof h=="string"){try{h=ia(h)}catch{}Dt.set(i,r,h)}else h=void 0;return h}l.extend({hasData:function(i){return Dt.hasData(i)||lt.hasData(i)},data:function(i,r,h){return Dt.access(i,r,h)},removeData:function(i,r){Dt.remove(i,r)},_data:function(i,r,h){return lt.access(i,r,h)},_removeData:function(i,r){lt.remove(i,r)}}),l.fn.extend({data:function(i,r){var h,d,v,y=this[0],x=y&&y.attributes;if(i===void 0){if(this.length&&(v=Dt.get(y),y.nodeType===1&&!lt.get(y,"hasDataAttrs"))){for(h=x.length;h--;)x[h]&&(d=x[h].name,d.indexOf("data-")===0&&(d=$t(d.slice(5)),S2(y,d,v[d])));lt.set(y,"hasDataAttrs",!0)}return v}return typeof i=="object"?this.each(function(){Dt.set(this,i)}):Nt(this,function(V){var H;if(y&&V===void 0)return H=Dt.get(y,i),H!==void 0||(H=S2(y,i),H!==void 0)?H:void 0;this.each(function(){Dt.set(this,i,V)})},null,r,arguments.length>1,null,!0)},removeData:function(i){return this.each(function(){Dt.remove(this,i)})}}),l.extend({queue:function(i,r,h){var d;if(i)return r=(r||"fx")+"queue",d=lt.get(i,r),h&&(!d||Array.isArray(h)?d=lt.access(i,r,l.makeArray(h)):d.push(h)),d||[]},dequeue:function(i,r){r=r||"fx";var h=l.queue(i,r),d=h.length,v=h.shift(),y=l._queueHooks(i,r),x=function(){l.dequeue(i,r)};v==="inprogress"&&(v=h.shift(),d--),v&&(r==="fx"&&h.unshift("inprogress"),delete y.stop,v.call(i,x,y)),!d&&y&&y.empty.fire()},_queueHooks:function(i,r){var h=r+"queueHooks";return lt.get(i,h)||lt.access(i,h,{empty:l.Callbacks("once memory").add(function(){lt.remove(i,[r+"queue",h])})})}}),l.fn.extend({queue:function(i,r){var h=2;return typeof i!="string"&&(r=i,i="fx",h--),arguments.length<h?l.queue(this[0],i):r===void 0?this:this.each(function(){var d=l.queue(this,i,r);l._queueHooks(this,i),i==="fx"&&d[0]!=="inprogress"&&l.dequeue(this,i)})},dequeue:function(i){return this.each(function(){l.dequeue(this,i)})},clearQueue:function(i){return this.queue(i||"fx",[])},promise:function(i,r){var h,d=1,v=l.Deferred(),y=this,x=this.length,V=function(){--d||v.resolveWith(y,[y])};for(typeof i!="string"&&(r=i,i=void 0),i=i||"fx";x--;)h=lt.get(y[x],i+"queueHooks"),h&&h.empty&&(d++,h.empty.add(V));return V(),v.promise(r)}});var C2=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ja=new RegExp("^(?:([+-])=|)("+C2+")([a-z%]*)$","i"),Oe=["Top","Right","Bottom","Left"],na=S.documentElement,ga=function(i){return l.contains(i.ownerDocument,i)},Wl={composed:!0};na.getRootNode&&(ga=function(i){return l.contains(i.ownerDocument,i)||i.getRootNode(Wl)===i.ownerDocument});var M1=function(i,r){return i=r||i,i.style.display==="none"||i.style.display===""&&ga(i)&&l.css(i,"display")==="none"};function A2(i,r,h,d){var v,y,x=20,V=d?function(){return d.cur()}:function(){return l.css(i,r,"")},H=V(),D=h&&h[3]||(l.cssNumber[r]?"":"px"),Z=i.nodeType&&(l.cssNumber[r]||D!=="px"&&+H)&&ja.exec(l.css(i,r));if(Z&&Z[3]!==D){for(H=H/2,D=D||Z[3],Z=+H||1;x--;)l.style(i,r,Z+D),(1-y)*(1-(y=V()/H||.5))<=0&&(x=0),Z=Z/y;Z=Z*2,l.style(i,r,Z+D),h=h||[]}return h&&(Z=+Z||+H||0,v=h[1]?Z+(h[1]+1)*h[2]:+h[2],d&&(d.unit=D,d.start=Z,d.end=v)),v}var T2={};function jl(i){var r,h=i.ownerDocument,d=i.nodeName,v=T2[d];return v||(r=h.body.appendChild(h.createElement(d)),v=l.css(r,"display"),r.parentNode.removeChild(r),v==="none"&&(v="block"),T2[d]=v,v)}function ya(i,r){for(var h,d,v=[],y=0,x=i.length;y<x;y++)d=i[y],d.style&&(h=d.style.display,r?(h==="none"&&(v[y]=lt.get(d,"display")||null,v[y]||(d.style.display="")),d.style.display===""&&M1(d)&&(v[y]=jl(d))):h!=="none"&&(v[y]="none",lt.set(d,"display",h)));for(y=0;y<x;y++)v[y]!=null&&(i[y].style.display=v[y]);return i}l.fn.extend({show:function(){return ya(this,!0)},hide:function(){return ya(this)},toggle:function(i){return typeof i=="boolean"?i?this.show():this.hide():this.each(function(){M1(this)?l(this).show():l(this).hide()})}});var Ga=/^(?:checkbox|radio)$/i,_2=/<([a-z][^\/\0>\x20\t\r\n\f]*)/i,H2=/^$|^module$|\/(?:java|ecma)script/i;(function(){var i=S.createDocumentFragment(),r=i.appendChild(S.createElement("div")),h=S.createElement("input");h.setAttribute("type","radio"),h.setAttribute("checked","checked"),h.setAttribute("name","t"),r.appendChild(h),u.checkClone=r.cloneNode(!0).cloneNode(!0).lastChild.checked,r.innerHTML="<textarea>x</textarea>",u.noCloneChecked=!!r.cloneNode(!0).lastChild.defaultValue,r.innerHTML="<option></option>",u.option=!!r.lastChild})();var pe={thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};pe.tbody=pe.tfoot=pe.colgroup=pe.caption=pe.thead,pe.th=pe.td,u.option||(pe.optgroup=pe.option=[1,"<select multiple='multiple'>","</select>"]);function Qt(i,r){var h;return typeof i.getElementsByTagName<"u"?h=i.getElementsByTagName(r||"*"):typeof i.querySelectorAll<"u"?h=i.querySelectorAll(r||"*"):h=[],r===void 0||r&&k(i,r)?l.merge([i],h):h}function J1(i,r){for(var h=0,d=i.length;h<d;h++)lt.set(i[h],"globalEval",!r||lt.get(r[h],"globalEval"))}var Gl=/<|&#?\w+;/;function L2(i,r,h,d,v){for(var y,x,V,H,D,Z,Y=r.createDocumentFragment(),R=[],it=0,ft=i.length;it<ft;it++)if(y=i[it],y||y===0)if(L(y)==="object")l.merge(R,y.nodeType?[y]:y);else if(!Gl.test(y))R.push(r.createTextNode(y));else{for(x=x||Y.appendChild(r.createElement("div")),V=(_2.exec(y)||["",""])[1].toLowerCase(),H=pe[V]||pe._default,x.innerHTML=H[1]+l.htmlPrefilter(y)+H[2],Z=H[0];Z--;)x=x.lastChild;l.merge(R,x.childNodes),x=Y.firstChild,x.textContent=""}for(Y.textContent="",it=0;y=R[it++];){if(d&&l.inArray(y,d)>-1){v&&v.push(y);continue}if(D=ga(y),x=Qt(Y.appendChild(y),"script"),D&&J1(x),h)for(Z=0;y=x[Z++];)H2.test(y.type||"")&&h.push(y)}return Y}var V2=/^([^.]*)(?:\.(.+)|)/;function xa(){return!0}function wa(){return!1}function ti(i,r,h,d,v,y){var x,V;if(typeof r=="object"){typeof h!="string"&&(d=d||h,h=void 0);for(V in r)ti(i,V,h,d,r[V],y);return i}if(d==null&&v==null?(v=h,d=h=void 0):v==null&&(typeof h=="string"?(v=d,d=void 0):(v=d,d=h,h=void 0)),v===!1)v=wa;else if(!v)return i;return y===1&&(x=v,v=function(H){return l().off(H),x.apply(this,arguments)},v.guid=x.guid||(x.guid=l.guid++)),i.each(function(){l.event.add(this,r,v,d,h)})}l.event={global:{},add:function(i,r,h,d,v){var y,x,V,H,D,Z,Y,R,it,ft,bt,vt=lt.get(i);if(ce(i))for(h.handler&&(y=h,h=y.handler,v=y.selector),v&&l.find.matchesSelector(na,v),h.guid||(h.guid=l.guid++),(H=vt.events)||(H=vt.events=Object.create(null)),(x=vt.handle)||(x=vt.handle=function(Rt){return typeof l<"u"&&l.event.triggered!==Rt.type?l.event.dispatch.apply(i,arguments):void 0}),r=(r||"").match(Vt)||[""],D=r.length;D--;)V=V2.exec(r[D])||[],it=bt=V[1],ft=(V[2]||"").split(".").sort(),it&&(Y=l.event.special[it]||{},it=(v?Y.delegateType:Y.bindType)||it,Y=l.event.special[it]||{},Z=l.extend({type:it,origType:bt,data:d,handler:h,guid:h.guid,selector:v,needsContext:v&&l.expr.match.needsContext.test(v),namespace:ft.join(".")},y),(R=H[it])||(R=H[it]=[],R.delegateCount=0,(!Y.setup||Y.setup.call(i,d,ft,x)===!1)&&i.addEventListener&&i.addEventListener(it,x)),Y.add&&(Y.add.call(i,Z),Z.handler.guid||(Z.handler.guid=h.guid)),v?R.splice(R.delegateCount++,0,Z):R.push(Z),l.event.global[it]=!0)},remove:function(i,r,h,d,v){var y,x,V,H,D,Z,Y,R,it,ft,bt,vt=lt.hasData(i)&&lt.get(i);if(!(!vt||!(H=vt.events))){for(r=(r||"").match(Vt)||[""],D=r.length;D--;){if(V=V2.exec(r[D])||[],it=bt=V[1],ft=(V[2]||"").split(".").sort(),!it){for(it in H)l.event.remove(i,it+r[D],h,d,!0);continue}for(Y=l.event.special[it]||{},it=(d?Y.delegateType:Y.bindType)||it,R=H[it]||[],V=V[2]&&new RegExp("(^|\\.)"+ft.join("\\.(?:.*\\.|)")+"(\\.|$)"),x=y=R.length;y--;)Z=R[y],(v||bt===Z.origType)&&(!h||h.guid===Z.guid)&&(!V||V.test(Z.namespace))&&(!d||d===Z.selector||d==="**"&&Z.selector)&&(R.splice(y,1),Z.selector&&R.delegateCount--,Y.remove&&Y.remove.call(i,Z));x&&!R.length&&((!Y.teardown||Y.teardown.call(i,ft,vt.handle)===!1)&&l.removeEvent(i,it,vt.handle),delete H[it])}l.isEmptyObject(H)&&lt.remove(i,"handle events")}},dispatch:function(i){var r,h,d,v,y,x,V=new Array(arguments.length),H=l.event.fix(i),D=(lt.get(this,"events")||Object.create(null))[H.type]||[],Z=l.event.special[H.type]||{};for(V[0]=H,r=1;r<arguments.length;r++)V[r]=arguments[r];if(H.delegateTarget=this,!(Z.preDispatch&&Z.preDispatch.call(this,H)===!1)){for(x=l.event.handlers.call(this,H,D),r=0;(v=x[r++])&&!H.isPropagationStopped();)for(H.currentTarget=v.elem,h=0;(y=v.handlers[h++])&&!H.isImmediatePropagationStopped();)(!H.rnamespace||y.namespace===!1||H.rnamespace.test(y.namespace))&&(H.handleObj=y,H.data=y.data,d=((l.event.special[y.origType]||{}).handle||y.handler).apply(v.elem,V),d!==void 0&&(H.result=d)===!1&&(H.preventDefault(),H.stopPropagation()));return Z.postDispatch&&Z.postDispatch.call(this,H),H.result}},handlers:function(i,r){var h,d,v,y,x,V=[],H=r.delegateCount,D=i.target;if(H&&D.nodeType&&!(i.type==="click"&&i.button>=1)){for(;D!==this;D=D.parentNode||this)if(D.nodeType===1&&!(i.type==="click"&&D.disabled===!0)){for(y=[],x={},h=0;h<H;h++)d=r[h],v=d.selector+" ",x[v]===void 0&&(x[v]=d.needsContext?l(v,this).index(D)>-1:l.find(v,this,null,[D]).length),x[v]&&y.push(d);y.length&&V.push({elem:D,handlers:y})}}return D=this,H<r.length&&V.push({elem:D,handlers:r.slice(H)}),V},addProp:function(i,r){Object.defineProperty(l.Event.prototype,i,{enumerable:!0,configurable:!0,get:f(r)?function(){if(this.originalEvent)return r(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[i]},set:function(h){Object.defineProperty(this,i,{enumerable:!0,configurable:!0,writable:!0,value:h})}})},fix:function(i){return i[l.expando]?i:new l.Event(i)},special:{load:{noBubble:!0},click:{setup:function(i){var r=this||i;return Ga.test(r.type)&&r.click&&k(r,"input")&&m1(r,"click",!0),!1},trigger:function(i){var r=this||i;return Ga.test(r.type)&&r.click&&k(r,"input")&&m1(r,"click"),!0},_default:function(i){var r=i.target;return Ga.test(r.type)&&r.click&&k(r,"input")&&lt.get(r,"click")||k(r,"a")}},beforeunload:{postDispatch:function(i){i.result!==void 0&&i.originalEvent&&(i.originalEvent.returnValue=i.result)}}}};function m1(i,r,h){if(!h){lt.get(i,r)===void 0&&l.event.add(i,r,xa);return}lt.set(i,r,!1),l.event.add(i,r,{namespace:!1,handler:function(d){var v,y=lt.get(this,r);if(d.isTrigger&1&&this[r]){if(y)(l.event.special[r]||{}).delegateType&&d.stopPropagation();else if(y=o.call(arguments),lt.set(this,r,y),this[r](),v=lt.get(this,r),lt.set(this,r,!1),y!==v)return d.stopImmediatePropagation(),d.preventDefault(),v}else y&&(lt.set(this,r,l.event.trigger(y[0],y.slice(1),this)),d.stopPropagation(),d.isImmediatePropagationStopped=xa)}})}l.removeEvent=function(i,r,h){i.removeEventListener&&i.removeEventListener(r,h)},l.Event=function(i,r){if(!(this instanceof l.Event))return new l.Event(i,r);i&&i.type?(this.originalEvent=i,this.type=i.type,this.isDefaultPrevented=i.defaultPrevented||i.defaultPrevented===void 0&&i.returnValue===!1?xa:wa,this.target=i.target&&i.target.nodeType===3?i.target.parentNode:i.target,this.currentTarget=i.currentTarget,this.relatedTarget=i.relatedTarget):this.type=i,r&&l.extend(this,r),this.timeStamp=i&&i.timeStamp||Date.now(),this[l.expando]=!0},l.Event.prototype={constructor:l.Event,isDefaultPrevented:wa,isPropagationStopped:wa,isImmediatePropagationStopped:wa,isSimulated:!1,preventDefault:function(){var i=this.originalEvent;this.isDefaultPrevented=xa,i&&!this.isSimulated&&i.preventDefault()},stopPropagation:function(){var i=this.originalEvent;this.isPropagationStopped=xa,i&&!this.isSimulated&&i.stopPropagation()},stopImmediatePropagation:function(){var i=this.originalEvent;this.isImmediatePropagationStopped=xa,i&&!this.isSimulated&&i.stopImmediatePropagation(),this.stopPropagation()}},l.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,char:!0,code:!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:!0},l.event.addProp),l.each({focus:"focusin",blur:"focusout"},function(i,r){function h(d){if(S.documentMode){var v=lt.get(this,"handle"),y=l.event.fix(d);y.type=d.type==="focusin"?"focus":"blur",y.isSimulated=!0,v(d),y.target===y.currentTarget&&v(y)}else l.event.simulate(r,d.target,l.event.fix(d))}l.event.special[i]={setup:function(){var d;if(m1(this,i,!0),S.documentMode)d=lt.get(this,r),d||this.addEventListener(r,h),lt.set(this,r,(d||0)+1);else return!1},trigger:function(){return m1(this,i),!0},teardown:function(){var d;if(S.documentMode)d=lt.get(this,r)-1,d?lt.set(this,r,d):(this.removeEventListener(r,h),lt.remove(this,r));else return!1},_default:function(d){return lt.get(d.target,i)},delegateType:r},l.event.special[r]={setup:function(){var d=this.ownerDocument||this.document||this,v=S.documentMode?this:d,y=lt.get(v,r);y||(S.documentMode?this.addEventListener(r,h):d.addEventListener(i,h,!0)),lt.set(v,r,(y||0)+1)},teardown:function(){var d=this.ownerDocument||this.document||this,v=S.documentMode?this:d,y=lt.get(v,r)-1;y?lt.set(v,r,y):(S.documentMode?this.removeEventListener(r,h):d.removeEventListener(i,h,!0),lt.remove(v,r))}}}),l.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(i,r){l.event.special[i]={delegateType:r,bindType:r,handle:function(h){var d,v=this,y=h.relatedTarget,x=h.handleObj;return(!y||y!==v&&!l.contains(v,y))&&(h.type=x.origType,d=x.handler.apply(this,arguments),h.type=r),d}}}),l.fn.extend({on:function(i,r,h,d){return ti(this,i,r,h,d)},one:function(i,r,h,d){return ti(this,i,r,h,d,1)},off:function(i,r,h){var d,v;if(i&&i.preventDefault&&i.handleObj)return d=i.handleObj,l(i.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if(typeof i=="object"){for(v in i)this.off(v,r,i[v]);return this}return(r===!1||typeof r=="function")&&(h=r,r=void 0),h===!1&&(h=wa),this.each(function(){l.event.remove(this,i,h,r)})}});var Zl=/<script|<style|<link/i,Xl=/checked\s*(?:[^=]|=\s*.checked.)/i,Ul=/^\s*<!\[CDATA\[|\]\]>\s*$/g;function P2(i,r){return k(i,"table")&&k(r.nodeType!==11?r:r.firstChild,"tr")&&l(i).children("tbody")[0]||i}function Yl(i){return i.type=(i.getAttribute("type")!==null)+"/"+i.type,i}function Kl(i){return(i.type||"").slice(0,5)==="true/"?i.type=i.type.slice(5):i.removeAttribute("type"),i}function D2(i,r){var h,d,v,y,x,V,H;if(r.nodeType===1){if(lt.hasData(i)&&(y=lt.get(i),H=y.events,H)){lt.remove(r,"handle events");for(v in H)for(h=0,d=H[v].length;h<d;h++)l.event.add(r,v,H[v][h])}Dt.hasData(i)&&(x=Dt.access(i),V=l.extend({},x),Dt.set(r,V))}}function Ql(i,r){var h=r.nodeName.toLowerCase();h==="input"&&Ga.test(i.type)?r.checked=i.checked:(h==="input"||h==="textarea")&&(r.defaultValue=i.defaultValue)}function ba(i,r,h,d){r=c(r);var v,y,x,V,H,D,Z=0,Y=i.length,R=Y-1,it=r[0],ft=f(it);if(ft||Y>1&&typeof it=="string"&&!u.checkClone&&Xl.test(it))return i.each(function(bt){var vt=i.eq(bt);ft&&(r[0]=it.call(this,bt,vt.html())),ba(vt,r,h,d)});if(Y&&(v=L2(r,i[0].ownerDocument,!1,i,d),y=v.firstChild,v.childNodes.length===1&&(v=y),y||d)){for(x=l.map(Qt(v,"script"),Yl),V=x.length;Z<Y;Z++)H=v,Z!==R&&(H=l.clone(H,!0,!0),V&&l.merge(x,Qt(H,"script"))),h.call(i[Z],H,Z);if(V)for(D=x[x.length-1].ownerDocument,l.map(x,Kl),Z=0;Z<V;Z++)H=x[Z],H2.test(H.type||"")&&!lt.access(H,"globalEval")&&l.contains(D,H)&&(H.src&&(H.type||"").toLowerCase()!=="module"?l._evalUrl&&!H.noModule&&l._evalUrl(H.src,{nonce:H.nonce||H.getAttribute("nonce")},D):E(H.textContent.replace(Ul,""),H,D))}return i}function O2(i,r,h){for(var d,v=r?l.filter(r,i):i,y=0;(d=v[y])!=null;y++)!h&&d.nodeType===1&&l.cleanData(Qt(d)),d.parentNode&&(h&&ga(d)&&J1(Qt(d,"script")),d.parentNode.removeChild(d));return i}l.extend({htmlPrefilter:function(i){return i},clone:function(i,r,h){var d,v,y,x,V=i.cloneNode(!0),H=ga(i);if(!u.noCloneChecked&&(i.nodeType===1||i.nodeType===11)&&!l.isXMLDoc(i))for(x=Qt(V),y=Qt(i),d=0,v=y.length;d<v;d++)Ql(y[d],x[d]);if(r)if(h)for(y=y||Qt(i),x=x||Qt(V),d=0,v=y.length;d<v;d++)D2(y[d],x[d]);else D2(i,V);return x=Qt(V,"script"),x.length>0&&J1(x,!H&&Qt(i,"script")),V},cleanData:function(i){for(var r,h,d,v=l.event.special,y=0;(h=i[y])!==void 0;y++)if(ce(h)){if(r=h[lt.expando]){if(r.events)for(d in r.events)v[d]?l.event.remove(h,d):l.removeEvent(h,d,r.handle);h[lt.expando]=void 0}h[Dt.expando]&&(h[Dt.expando]=void 0)}}}),l.fn.extend({detach:function(i){return O2(this,i,!0)},remove:function(i){return O2(this,i)},text:function(i){return Nt(this,function(r){return r===void 0?l.text(this):this.empty().each(function(){(this.nodeType===1||this.nodeType===11||this.nodeType===9)&&(this.textContent=r)})},null,i,arguments.length)},append:function(){return ba(this,arguments,function(i){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){var r=P2(this,i);r.appendChild(i)}})},prepend:function(){return ba(this,arguments,function(i){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){var r=P2(this,i);r.insertBefore(i,r.firstChild)}})},before:function(){return ba(this,arguments,function(i){this.parentNode&&this.parentNode.insertBefore(i,this)})},after:function(){return ba(this,arguments,function(i){this.parentNode&&this.parentNode.insertBefore(i,this.nextSibling)})},empty:function(){for(var i,r=0;(i=this[r])!=null;r++)i.nodeType===1&&(l.cleanData(Qt(i,!1)),i.textContent="");return this},clone:function(i,r){return i=i??!1,r=r??i,this.map(function(){return l.clone(this,i,r)})},html:function(i){return Nt(this,function(r){var h=this[0]||{},d=0,v=this.length;if(r===void 0&&h.nodeType===1)return h.innerHTML;if(typeof r=="string"&&!Zl.test(r)&&!pe[(_2.exec(r)||["",""])[1].toLowerCase()]){r=l.htmlPrefilter(r);try{for(;d<v;d++)h=this[d]||{},h.nodeType===1&&(l.cleanData(Qt(h,!1)),h.innerHTML=r);h=0}catch{}}h&&this.empty().append(r)},null,i,arguments.length)},replaceWith:function(){var i=[];return ba(this,arguments,function(r){var h=this.parentNode;l.inArray(this,i)<0&&(l.cleanData(Qt(this)),h&&h.replaceChild(r,this))},i)}}),l.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(i,r){l.fn[i]=function(h){for(var d,v=[],y=l(h),x=y.length-1,V=0;V<=x;V++)d=V===x?this:this.clone(!0),l(y[V])[r](d),p.apply(v,d.get());return this.pushStack(v)}});var ei=new RegExp("^("+C2+")(?!px)[a-z%]+$","i"),ai=/^--/,v1=function(i){var r=i.ownerDocument.defaultView;return(!r||!r.opener)&&(r=t),r.getComputedStyle(i)},k2=function(i,r,h){var d,v,y={};for(v in r)y[v]=i.style[v],i.style[v]=r[v];d=h.call(i);for(v in r)i.style[v]=y[v];return d},Jl=new RegExp(Oe.join("|"),"i");(function(){function i(){if(D){H.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",D.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",na.appendChild(H).appendChild(D);var Z=t.getComputedStyle(D);h=Z.top!=="1%",V=r(Z.marginLeft)===12,D.style.right="60%",y=r(Z.right)===36,d=r(Z.width)===36,D.style.position="absolute",v=r(D.offsetWidth/3)===12,na.removeChild(H),D=null}}function r(Z){return Math.round(parseFloat(Z))}var h,d,v,y,x,V,H=S.createElement("div"),D=S.createElement("div");D.style&&(D.style.backgroundClip="content-box",D.cloneNode(!0).style.backgroundClip="",u.clearCloneStyle=D.style.backgroundClip==="content-box",l.extend(u,{boxSizingReliable:function(){return i(),d},pixelBoxStyles:function(){return i(),y},pixelPosition:function(){return i(),h},reliableMarginLeft:function(){return i(),V},scrollboxSize:function(){return i(),v},reliableTrDimensions:function(){var Z,Y,R,it;return x==null&&(Z=S.createElement("table"),Y=S.createElement("tr"),R=S.createElement("div"),Z.style.cssText="position:absolute;left:-11111px;border-collapse:separate",Y.style.cssText="box-sizing:content-box;border:1px solid",Y.style.height="1px",R.style.height="9px",R.style.display="block",na.appendChild(Z).appendChild(Y).appendChild(R),it=t.getComputedStyle(Y),x=parseInt(it.height,10)+parseInt(it.borderTopWidth,10)+parseInt(it.borderBottomWidth,10)===Y.offsetHeight,na.removeChild(Z)),x}}))})();function Za(i,r,h){var d,v,y,x,V=ai.test(r),H=i.style;return h=h||v1(i),h&&(x=h.getPropertyValue(r)||h[r],V&&x&&(x=x.replace(X,"$1")||void 0),x===""&&!ga(i)&&(x=l.style(i,r)),!u.pixelBoxStyles()&&ei.test(x)&&Jl.test(r)&&(d=H.width,v=H.minWidth,y=H.maxWidth,H.minWidth=H.maxWidth=H.width=x,x=h.width,H.width=d,H.minWidth=v,H.maxWidth=y)),x!==void 0?x+"":x}function I2(i,r){return{get:function(){if(i()){delete this.get;return}return(this.get=r).apply(this,arguments)}}}var N2=["Webkit","Moz","ms"],z2=S.createElement("div").style,$2={};function th(i){for(var r=i[0].toUpperCase()+i.slice(1),h=N2.length;h--;)if(i=N2[h]+r,i in z2)return i}function ii(i){var r=l.cssProps[i]||$2[i];return r||(i in z2?i:$2[i]=th(i)||i)}var eh=/^(none|table(?!-c[ea]).+)/,ah={position:"absolute",visibility:"hidden",display:"block"},R2={letterSpacing:"0",fontWeight:"400"};function B2(i,r,h){var d=ja.exec(r);return d?Math.max(0,d[2]-(h||0))+(d[3]||"px"):r}function ni(i,r,h,d,v,y){var x=r==="width"?1:0,V=0,H=0,D=0;if(h===(d?"border":"content"))return 0;for(;x<4;x+=2)h==="margin"&&(D+=l.css(i,h+Oe[x],!0,v)),d?(h==="content"&&(H-=l.css(i,"padding"+Oe[x],!0,v)),h!=="margin"&&(H-=l.css(i,"border"+Oe[x]+"Width",!0,v))):(H+=l.css(i,"padding"+Oe[x],!0,v),h!=="padding"?H+=l.css(i,"border"+Oe[x]+"Width",!0,v):V+=l.css(i,"border"+Oe[x]+"Width",!0,v));return!d&&y>=0&&(H+=Math.max(0,Math.ceil(i["offset"+r[0].toUpperCase()+r.slice(1)]-y-H-V-.5))||0),H+D}function F2(i,r,h){var d=v1(i),v=!u.boxSizingReliable()||h,y=v&&l.css(i,"boxSizing",!1,d)==="border-box",x=y,V=Za(i,r,d),H="offset"+r[0].toUpperCase()+r.slice(1);if(ei.test(V)){if(!h)return V;V="auto"}return(!u.boxSizingReliable()&&y||!u.reliableTrDimensions()&&k(i,"tr")||V==="auto"||!parseFloat(V)&&l.css(i,"display",!1,d)==="inline")&&i.getClientRects().length&&(y=l.css(i,"boxSizing",!1,d)==="border-box",x=H in i,x&&(V=i[H])),V=parseFloat(V)||0,V+ni(i,r,h||(y?"border":"content"),x,d,V)+"px"}l.extend({cssHooks:{opacity:{get:function(i,r){if(r){var h=Za(i,"opacity");return h===""?"1":h}}}},cssNumber:{animationIterationCount:!0,aspectRatio:!0,borderImageSlice:!0,columnCount:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,gridArea:!0,gridColumn:!0,gridColumnEnd:!0,gridColumnStart:!0,gridRow:!0,gridRowEnd:!0,gridRowStart:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,scale:!0,widows:!0,zIndex:!0,zoom:!0,fillOpacity:!0,floodOpacity:!0,stopOpacity:!0,strokeMiterlimit:!0,strokeOpacity:!0},cssProps:{},style:function(i,r,h,d){if(!(!i||i.nodeType===3||i.nodeType===8||!i.style)){var v,y,x,V=$t(r),H=ai.test(r),D=i.style;if(H||(r=ii(V)),x=l.cssHooks[r]||l.cssHooks[V],h!==void 0){if(y=typeof h,y==="string"&&(v=ja.exec(h))&&v[1]&&(h=A2(i,r,v),y="number"),h==null||h!==h)return;y==="number"&&!H&&(h+=v&&v[3]||(l.cssNumber[V]?"":"px")),!u.clearCloneStyle&&h===""&&r.indexOf("background")===0&&(D[r]="inherit"),(!x||!("set"in x)||(h=x.set(i,h,d))!==void 0)&&(H?D.setProperty(r,h):D[r]=h)}else return x&&"get"in x&&(v=x.get(i,!1,d))!==void 0?v:D[r]}},css:function(i,r,h,d){var v,y,x,V=$t(r),H=ai.test(r);return H||(r=ii(V)),x=l.cssHooks[r]||l.cssHooks[V],x&&"get"in x&&(v=x.get(i,!0,h)),v===void 0&&(v=Za(i,r,d)),v==="normal"&&r in R2&&(v=R2[r]),h===""||h?(y=parseFloat(v),h===!0||isFinite(y)?y||0:v):v}}),l.each(["height","width"],function(i,r){l.cssHooks[r]={get:function(h,d,v){if(d)return eh.test(l.css(h,"display"))&&(!h.getClientRects().length||!h.getBoundingClientRect().width)?k2(h,ah,function(){return F2(h,r,v)}):F2(h,r,v)},set:function(h,d,v){var y,x=v1(h),V=!u.scrollboxSize()&&x.position==="absolute",H=V||v,D=H&&l.css(h,"boxSizing",!1,x)==="border-box",Z=v?ni(h,r,v,D,x):0;return D&&V&&(Z-=Math.ceil(h["offset"+r[0].toUpperCase()+r.slice(1)]-parseFloat(x[r])-ni(h,r,"border",!1,x)-.5)),Z&&(y=ja.exec(d))&&(y[3]||"px")!=="px"&&(h.style[r]=d,d=l.css(h,r)),B2(h,d,Z)}}}),l.cssHooks.marginLeft=I2(u.reliableMarginLeft,function(i,r){if(r)return(parseFloat(Za(i,"marginLeft"))||i.getBoundingClientRect().left-k2(i,{marginLeft:0},function(){return i.getBoundingClientRect().left}))+"px"}),l.each({margin:"",padding:"",border:"Width"},function(i,r){l.cssHooks[i+r]={expand:function(h){for(var d=0,v={},y=typeof h=="string"?h.split(" "):[h];d<4;d++)v[i+Oe[d]+r]=y[d]||y[d-2]||y[0];return v}},i!=="margin"&&(l.cssHooks[i+r].set=B2)}),l.fn.extend({css:function(i,r){return Nt(this,function(h,d,v){var y,x,V={},H=0;if(Array.isArray(d)){for(y=v1(h),x=d.length;H<x;H++)V[d[H]]=l.css(h,d[H],!1,y);return V}return v!==void 0?l.style(h,d,v):l.css(h,d)},i,r,arguments.length>1)}});function Jt(i,r,h,d,v){return new Jt.prototype.init(i,r,h,d,v)}l.Tween=Jt,Jt.prototype={constructor:Jt,init:function(i,r,h,d,v,y){this.elem=i,this.prop=h,this.easing=v||l.easing._default,this.options=r,this.start=this.now=this.cur(),this.end=d,this.unit=y||(l.cssNumber[h]?"":"px")},cur:function(){var i=Jt.propHooks[this.prop];return i&&i.get?i.get(this):Jt.propHooks._default.get(this)},run:function(i){var r,h=Jt.propHooks[this.prop];return this.options.duration?this.pos=r=l.easing[this.easing](i,this.options.duration*i,0,1,this.options.duration):this.pos=r=i,this.now=(this.end-this.start)*r+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),h&&h.set?h.set(this):Jt.propHooks._default.set(this),this}},Jt.prototype.init.prototype=Jt.prototype,Jt.propHooks={_default:{get:function(i){var r;return i.elem.nodeType!==1||i.elem[i.prop]!=null&&i.elem.style[i.prop]==null?i.elem[i.prop]:(r=l.css(i.elem,i.prop,""),!r||r==="auto"?0:r)},set:function(i){l.fx.step[i.prop]?l.fx.step[i.prop](i):i.elem.nodeType===1&&(l.cssHooks[i.prop]||i.elem.style[ii(i.prop)]!=null)?l.style(i.elem,i.prop,i.now+i.unit):i.elem[i.prop]=i.now}}},Jt.propHooks.scrollTop=Jt.propHooks.scrollLeft={set:function(i){i.elem.nodeType&&i.elem.parentNode&&(i.elem[i.prop]=i.now)}},l.easing={linear:function(i){return i},swing:function(i){return .5-Math.cos(i*Math.PI)/2},_default:"swing"},l.fx=Jt.prototype.init,l.fx.step={};var Ea,g1,ih=/^(?:toggle|show|hide)$/,nh=/queueHooks$/;function ri(){g1&&(S.hidden===!1&&t.requestAnimationFrame?t.requestAnimationFrame(ri):t.setTimeout(ri,l.fx.interval),l.fx.tick())}function q2(){return t.setTimeout(function(){Ea=void 0}),Ea=Date.now()}function y1(i,r){var h,d=0,v={height:i};for(r=r?1:0;d<4;d+=2-r)h=Oe[d],v["margin"+h]=v["padding"+h]=i;return r&&(v.opacity=v.width=i),v}function W2(i,r,h){for(var d,v=(be.tweeners[r]||[]).concat(be.tweeners["*"]),y=0,x=v.length;y<x;y++)if(d=v[y].call(h,r,i))return d}function rh(i,r,h){var d,v,y,x,V,H,D,Z,Y="width"in r||"height"in r,R=this,it={},ft=i.style,bt=i.nodeType&&M1(i),vt=lt.get(i,"fxshow");h.queue||(x=l._queueHooks(i,"fx"),x.unqueued==null&&(x.unqueued=0,V=x.empty.fire,x.empty.fire=function(){x.unqueued||V()}),x.unqueued++,R.always(function(){R.always(function(){x.unqueued--,l.queue(i,"fx").length||x.empty.fire()})}));for(d in r)if(v=r[d],ih.test(v)){if(delete r[d],y=y||v==="toggle",v===(bt?"hide":"show"))if(v==="show"&&vt&&vt[d]!==void 0)bt=!0;else continue;it[d]=vt&&vt[d]||l.style(i,d)}if(H=!l.isEmptyObject(r),!(!H&&l.isEmptyObject(it))){Y&&i.nodeType===1&&(h.overflow=[ft.overflow,ft.overflowX,ft.overflowY],D=vt&&vt.display,D==null&&(D=lt.get(i,"display")),Z=l.css(i,"display"),Z==="none"&&(D?Z=D:(ya([i],!0),D=i.style.display||D,Z=l.css(i,"display"),ya([i]))),(Z==="inline"||Z==="inline-block"&&D!=null)&&l.css(i,"float")==="none"&&(H||(R.done(function(){ft.display=D}),D==null&&(Z=ft.display,D=Z==="none"?"":Z)),ft.display="inline-block")),h.overflow&&(ft.overflow="hidden",R.always(function(){ft.overflow=h.overflow[0],ft.overflowX=h.overflow[1],ft.overflowY=h.overflow[2]})),H=!1;for(d in it)H||(vt?"hidden"in vt&&(bt=vt.hidden):vt=lt.access(i,"fxshow",{display:D}),y&&(vt.hidden=!bt),bt&&ya([i],!0),R.done(function(){bt||ya([i]),lt.remove(i,"fxshow");for(d in it)l.style(i,d,it[d])})),H=W2(bt?vt[d]:0,d,R),d in vt||(vt[d]=H.start,bt&&(H.end=H.start,H.start=0))}}function sh(i,r){var h,d,v,y,x;for(h in i)if(d=$t(h),v=r[d],y=i[h],Array.isArray(y)&&(v=y[1],y=i[h]=y[0]),h!==d&&(i[d]=y,delete i[h]),x=l.cssHooks[d],x&&"expand"in x){y=x.expand(y),delete i[d];for(h in y)h in i||(i[h]=y[h],r[h]=v)}else r[d]=v}function be(i,r,h){var d,v,y=0,x=be.prefilters.length,V=l.Deferred().always(function(){delete H.elem}),H=function(){if(v)return!1;for(var Y=Ea||q2(),R=Math.max(0,D.startTime+D.duration-Y),it=R/D.duration||0,ft=1-it,bt=0,vt=D.tweens.length;bt<vt;bt++)D.tweens[bt].run(ft);return V.notifyWith(i,[D,ft,R]),ft<1&&vt?R:(vt||V.notifyWith(i,[D,1,0]),V.resolveWith(i,[D]),!1)},D=V.promise({elem:i,props:l.extend({},r),opts:l.extend(!0,{specialEasing:{},easing:l.easing._default},h),originalProperties:r,originalOptions:h,startTime:Ea||q2(),duration:h.duration,tweens:[],createTween:function(Y,R){var it=l.Tween(i,D.opts,Y,R,D.opts.specialEasing[Y]||D.opts.easing);return D.tweens.push(it),it},stop:function(Y){var R=0,it=Y?D.tweens.length:0;if(v)return this;for(v=!0;R<it;R++)D.tweens[R].run(1);return Y?(V.notifyWith(i,[D,1,0]),V.resolveWith(i,[D,Y])):V.rejectWith(i,[D,Y]),this}}),Z=D.props;for(sh(Z,D.opts.specialEasing);y<x;y++)if(d=be.prefilters[y].call(D,i,Z,D.opts),d)return f(d.stop)&&(l._queueHooks(D.elem,D.opts.queue).stop=d.stop.bind(d)),d;return l.map(Z,W2,D),f(D.opts.start)&&D.opts.start.call(i,D),D.progress(D.opts.progress).done(D.opts.done,D.opts.complete).fail(D.opts.fail).always(D.opts.always),l.fx.timer(l.extend(H,{elem:i,anim:D,queue:D.opts.queue})),D}l.Animation=l.extend(be,{tweeners:{"*":[function(i,r){var h=this.createTween(i,r);return A2(h.elem,i,ja.exec(r),h),h}]},tweener:function(i,r){f(i)?(r=i,i=["*"]):i=i.match(Vt);for(var h,d=0,v=i.length;d<v;d++)h=i[d],be.tweeners[h]=be.tweeners[h]||[],be.tweeners[h].unshift(r)},prefilters:[rh],prefilter:function(i,r){r?be.prefilters.unshift(i):be.prefilters.push(i)}}),l.speed=function(i,r,h){var d=i&&typeof i=="object"?l.extend({},i):{complete:h||!h&&r||f(i)&&i,duration:i,easing:h&&r||r&&!f(r)&&r};return l.fx.off?d.duration=0:typeof d.duration!="number"&&(d.duration in l.fx.speeds?d.duration=l.fx.speeds[d.duration]:d.duration=l.fx.speeds._default),(d.queue==null||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){f(d.old)&&d.old.call(this),d.queue&&l.dequeue(this,d.queue)},d},l.fn.extend({fadeTo:function(i,r,h,d){return this.filter(M1).css("opacity",0).show().end().animate({opacity:r},i,h,d)},animate:function(i,r,h,d){var v=l.isEmptyObject(i),y=l.speed(r,h,d),x=function(){var V=be(this,l.extend({},i),y);(v||lt.get(this,"finish"))&&V.stop(!0)};return x.finish=x,v||y.queue===!1?this.each(x):this.queue(y.queue,x)},stop:function(i,r,h){var d=function(v){var y=v.stop;delete v.stop,y(h)};return typeof i!="string"&&(h=r,r=i,i=void 0),r&&this.queue(i||"fx",[]),this.each(function(){var v=!0,y=i!=null&&i+"queueHooks",x=l.timers,V=lt.get(this);if(y)V[y]&&V[y].stop&&d(V[y]);else for(y in V)V[y]&&V[y].stop&&nh.test(y)&&d(V[y]);for(y=x.length;y--;)x[y].elem===this&&(i==null||x[y].queue===i)&&(x[y].anim.stop(h),v=!1,x.splice(y,1));(v||!h)&&l.dequeue(this,i)})},finish:function(i){return i!==!1&&(i=i||"fx"),this.each(function(){var r,h=lt.get(this),d=h[i+"queue"],v=h[i+"queueHooks"],y=l.timers,x=d?d.length:0;for(h.finish=!0,l.queue(this,i,[]),v&&v.stop&&v.stop.call(this,!0),r=y.length;r--;)y[r].elem===this&&y[r].queue===i&&(y[r].anim.stop(!0),y.splice(r,1));for(r=0;r<x;r++)d[r]&&d[r].finish&&d[r].finish.call(this);delete h.finish})}}),l.each(["toggle","show","hide"],function(i,r){var h=l.fn[r];l.fn[r]=function(d,v,y){return d==null||typeof d=="boolean"?h.apply(this,arguments):this.animate(y1(r,!0),d,v,y)}}),l.each({slideDown:y1("show"),slideUp:y1("hide"),slideToggle:y1("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(i,r){l.fn[i]=function(h,d,v){return this.animate(r,h,d,v)}}),l.timers=[],l.fx.tick=function(){var i,r=0,h=l.timers;for(Ea=Date.now();r<h.length;r++)i=h[r],!i()&&h[r]===i&&h.splice(r--,1);h.length||l.fx.stop(),Ea=void 0},l.fx.timer=function(i){l.timers.push(i),l.fx.start()},l.fx.interval=13,l.fx.start=function(){g1||(g1=!0,ri())},l.fx.stop=function(){g1=null},l.fx.speeds={slow:600,fast:200,_default:400},l.fn.delay=function(i,r){return i=l.fx&&l.fx.speeds[i]||i,r=r||"fx",this.queue(r,function(h,d){var v=t.setTimeout(h,i);d.stop=function(){t.clearTimeout(v)}})},function(){var i=S.createElement("input"),r=S.createElement("select"),h=r.appendChild(S.createElement("option"));i.type="checkbox",u.checkOn=i.value!=="",u.optSelected=h.selected,i=S.createElement("input"),i.value="t",i.type="radio",u.radioValue=i.value==="t"}();var j2,Xa=l.expr.attrHandle;l.fn.extend({attr:function(i,r){return Nt(this,l.attr,i,r,arguments.length>1)},removeAttr:function(i){return this.each(function(){l.removeAttr(this,i)})}}),l.extend({attr:function(i,r,h){var d,v,y=i.nodeType;if(!(y===3||y===8||y===2)){if(typeof i.getAttribute>"u")return l.prop(i,r,h);if((y!==1||!l.isXMLDoc(i))&&(v=l.attrHooks[r.toLowerCase()]||(l.expr.match.bool.test(r)?j2:void 0)),h!==void 0){if(h===null){l.removeAttr(i,r);return}return v&&"set"in v&&(d=v.set(i,h,r))!==void 0?d:(i.setAttribute(r,h+""),h)}return v&&"get"in v&&(d=v.get(i,r))!==null?d:(d=l.find.attr(i,r),d??void 0)}},attrHooks:{type:{set:function(i,r){if(!u.radioValue&&r==="radio"&&k(i,"input")){var h=i.value;return i.setAttribute("type",r),h&&(i.value=h),r}}}},removeAttr:function(i,r){var h,d=0,v=r&&r.match(Vt);if(v&&i.nodeType===1)for(;h=v[d++];)i.removeAttribute(h)}}),j2={set:function(i,r,h){return r===!1?l.removeAttr(i,h):i.setAttribute(h,h),h}},l.each(l.expr.match.bool.source.match(/\w+/g),function(i,r){var h=Xa[r]||l.find.attr;Xa[r]=function(d,v,y){var x,V,H=v.toLowerCase();return y||(V=Xa[H],Xa[H]=x,x=h(d,v,y)!=null?H:null,Xa[H]=V),x}});var oh=/^(?:input|select|textarea|button)$/i,lh=/^(?:a|area)$/i;l.fn.extend({prop:function(i,r){return Nt(this,l.prop,i,r,arguments.length>1)},removeProp:function(i){return this.each(function(){delete this[l.propFix[i]||i]})}}),l.extend({prop:function(i,r,h){var d,v,y=i.nodeType;if(!(y===3||y===8||y===2))return(y!==1||!l.isXMLDoc(i))&&(r=l.propFix[r]||r,v=l.propHooks[r]),h!==void 0?v&&"set"in v&&(d=v.set(i,h,r))!==void 0?d:i[r]=h:v&&"get"in v&&(d=v.get(i,r))!==null?d:i[r]},propHooks:{tabIndex:{get:function(i){var r=l.find.attr(i,"tabindex");return r?parseInt(r,10):oh.test(i.nodeName)||lh.test(i.nodeName)&&i.href?0:-1}}},propFix:{for:"htmlFor",class:"className"}}),u.optSelected||(l.propHooks.selected={get:function(i){var r=i.parentNode;return r&&r.parentNode&&r.parentNode.selectedIndex,null},set:function(i){var r=i.parentNode;r&&(r.selectedIndex,r.parentNode&&r.parentNode.selectedIndex)}}),l.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){l.propFix[this.toLowerCase()]=this});function ra(i){var r=i.match(Vt)||[];return r.join(" ")}function sa(i){return i.getAttribute&&i.getAttribute("class")||""}function si(i){return Array.isArray(i)?i:typeof i=="string"?i.match(Vt)||[]:[]}l.fn.extend({addClass:function(i){var r,h,d,v,y,x;return f(i)?this.each(function(V){l(this).addClass(i.call(this,V,sa(this)))}):(r=si(i),r.length?this.each(function(){if(d=sa(this),h=this.nodeType===1&&" "+ra(d)+" ",h){for(y=0;y<r.length;y++)v=r[y],h.indexOf(" "+v+" ")<0&&(h+=v+" ");x=ra(h),d!==x&&this.setAttribute("class",x)}}):this)},removeClass:function(i){var r,h,d,v,y,x;return f(i)?this.each(function(V){l(this).removeClass(i.call(this,V,sa(this)))}):arguments.length?(r=si(i),r.length?this.each(function(){if(d=sa(this),h=this.nodeType===1&&" "+ra(d)+" ",h){for(y=0;y<r.length;y++)for(v=r[y];h.indexOf(" "+v+" ")>-1;)h=h.replace(" "+v+" "," ");x=ra(h),d!==x&&this.setAttribute("class",x)}}):this):this.attr("class","")},toggleClass:function(i,r){var h,d,v,y,x=typeof i,V=x==="string"||Array.isArray(i);return f(i)?this.each(function(H){l(this).toggleClass(i.call(this,H,sa(this),r),r)}):typeof r=="boolean"&&V?r?this.addClass(i):this.removeClass(i):(h=si(i),this.each(function(){if(V)for(y=l(this),v=0;v<h.length;v++)d=h[v],y.hasClass(d)?y.removeClass(d):y.addClass(d);else(i===void 0||x==="boolean")&&(d=sa(this),d&&lt.set(this,"__className__",d),this.setAttribute&&this.setAttribute("class",d||i===!1?"":lt.get(this,"__className__")||""))}))},hasClass:function(i){var r,h,d=0;for(r=" "+i+" ";h=this[d++];)if(h.nodeType===1&&(" "+ra(sa(h))+" ").indexOf(r)>-1)return!0;return!1}});var hh=/\r/g;l.fn.extend({val:function(i){var r,h,d,v=this[0];return arguments.length?(d=f(i),this.each(function(y){var x;this.nodeType===1&&(d?x=i.call(this,y,l(this).val()):x=i,x==null?x="":typeof x=="number"?x+="":Array.isArray(x)&&(x=l.map(x,function(V){return V==null?"":V+""})),r=l.valHooks[this.type]||l.valHooks[this.nodeName.toLowerCase()],(!r||!("set"in r)||r.set(this,x,"value")===void 0)&&(this.value=x))})):v?(r=l.valHooks[v.type]||l.valHooks[v.nodeName.toLowerCase()],r&&"get"in r&&(h=r.get(v,"value"))!==void 0?h:(h=v.value,typeof h=="string"?h.replace(hh,""):h??"")):void 0}}),l.extend({valHooks:{option:{get:function(i){var r=l.find.attr(i,"value");return r??ra(l.text(i))}},select:{get:function(i){var r,h,d,v=i.options,y=i.selectedIndex,x=i.type==="select-one",V=x?null:[],H=x?y+1:v.length;for(y<0?d=H:d=x?y:0;d<H;d++)if(h=v[d],(h.selected||d===y)&&!h.disabled&&(!h.parentNode.disabled||!k(h.parentNode,"optgroup"))){if(r=l(h).val(),x)return r;V.push(r)}return V},set:function(i,r){for(var h,d,v=i.options,y=l.makeArray(r),x=v.length;x--;)d=v[x],(d.selected=l.inArray(l.valHooks.option.get(d),y)>-1)&&(h=!0);return h||(i.selectedIndex=-1),y}}}}),l.each(["radio","checkbox"],function(){l.valHooks[this]={set:function(i,r){if(Array.isArray(r))return i.checked=l.inArray(l(i).val(),r)>-1}},u.checkOn||(l.valHooks[this].get=function(i){return i.getAttribute("value")===null?"on":i.value})});var Ua=t.location,G2={guid:Date.now()},oi=/\?/;l.parseXML=function(i){var r,h;if(!i||typeof i!="string")return null;try{r=new t.DOMParser().parseFromString(i,"text/xml")}catch{}return h=r&&r.getElementsByTagName("parsererror")[0],(!r||h)&&l.error("Invalid XML: "+(h?l.map(h.childNodes,function(d){return d.textContent}).join(`
`):i)),r};var Z2=/^(?:focusinfocus|focusoutblur)$/,X2=function(i){i.stopPropagation()};l.extend(l.event,{trigger:function(i,r,h,d){var v,y,x,V,H,D,Z,Y,R=[h||S],it=w.call(i,"type")?i.type:i,ft=w.call(i,"namespace")?i.namespace.split("."):[];if(y=Y=x=h=h||S,!(h.nodeType===3||h.nodeType===8)&&!Z2.test(it+l.event.triggered)&&(it.indexOf(".")>-1&&(ft=it.split("."),it=ft.shift(),ft.sort()),H=it.indexOf(":")<0&&"on"+it,i=i[l.expando]?i:new l.Event(it,typeof i=="object"&&i),i.isTrigger=d?2:3,i.namespace=ft.join("."),i.rnamespace=i.namespace?new RegExp("(^|\\.)"+ft.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,i.result=void 0,i.target||(i.target=h),r=r==null?[i]:l.makeArray(r,[i]),Z=l.event.special[it]||{},!(!d&&Z.trigger&&Z.trigger.apply(h,r)===!1))){if(!d&&!Z.noBubble&&!T(h)){for(V=Z.delegateType||it,Z2.test(V+it)||(y=y.parentNode);y;y=y.parentNode)R.push(y),x=y;x===(h.ownerDocument||S)&&R.push(x.defaultView||x.parentWindow||t)}for(v=0;(y=R[v++])&&!i.isPropagationStopped();)Y=y,i.type=v>1?V:Z.bindType||it,D=(lt.get(y,"events")||Object.create(null))[i.type]&&lt.get(y,"handle"),D&&D.apply(y,r),D=H&&y[H],D&&D.apply&&ce(y)&&(i.result=D.apply(y,r),i.result===!1&&i.preventDefault());return i.type=it,!d&&!i.isDefaultPrevented()&&(!Z._default||Z._default.apply(R.pop(),r)===!1)&&ce(h)&&H&&f(h[it])&&!T(h)&&(x=h[H],x&&(h[H]=null),l.event.triggered=it,i.isPropagationStopped()&&Y.addEventListener(it,X2),h[it](),i.isPropagationStopped()&&Y.removeEventListener(it,X2),l.event.triggered=void 0,x&&(h[H]=x)),i.result}},simulate:function(i,r,h){var d=l.extend(new l.Event,h,{type:i,isSimulated:!0});l.event.trigger(d,null,r)}}),l.fn.extend({trigger:function(i,r){return this.each(function(){l.event.trigger(i,r,this)})},triggerHandler:function(i,r){var h=this[0];if(h)return l.event.trigger(i,r,h,!0)}});var dh=/\[\]$/,U2=/\r?\n/g,ch=/^(?:submit|button|image|reset|file)$/i,ph=/^(?:input|select|textarea|keygen)/i;function li(i,r,h,d){var v;if(Array.isArray(r))l.each(r,function(y,x){h||dh.test(i)?d(i,x):li(i+"["+(typeof x=="object"&&x!=null?y:"")+"]",x,h,d)});else if(!h&&L(r)==="object")for(v in r)li(i+"["+v+"]",r[v],h,d);else d(i,r)}l.param=function(i,r){var h,d=[],v=function(y,x){var V=f(x)?x():x;d[d.length]=encodeURIComponent(y)+"="+encodeURIComponent(V??"")};if(i==null)return"";if(Array.isArray(i)||i.jquery&&!l.isPlainObject(i))l.each(i,function(){v(this.name,this.value)});else for(h in i)li(h,i[h],r,v);return d.join("&")},l.fn.extend({serialize:function(){return l.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var i=l.prop(this,"elements");return i?l.makeArray(i):this}).filter(function(){var i=this.type;return this.name&&!l(this).is(":disabled")&&ph.test(this.nodeName)&&!ch.test(i)&&(this.checked||!Ga.test(i))}).map(function(i,r){var h=l(this).val();return h==null?null:Array.isArray(h)?l.map(h,function(d){return{name:r.name,value:d.replace(U2,`\r
`)}}):{name:r.name,value:h.replace(U2,`\r
`)}}).get()}});var uh=/%20/g,fh=/#.*$/,Mh=/([?&])_=[^&]*/,mh=/^(.*?):[ \t]*([^\r\n]*)$/mg,vh=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,gh=/^(?:GET|HEAD)$/,yh=/^\/\//,Y2={},hi={},K2="*/".concat("*"),di=S.createElement("a");di.href=Ua.href;function Q2(i){return function(r,h){typeof r!="string"&&(h=r,r="*");var d,v=0,y=r.toLowerCase().match(Vt)||[];if(f(h))for(;d=y[v++];)d[0]==="+"?(d=d.slice(1)||"*",(i[d]=i[d]||[]).unshift(h)):(i[d]=i[d]||[]).push(h)}}function J2(i,r,h,d){var v={},y=i===hi;function x(V){var H;return v[V]=!0,l.each(i[V]||[],function(D,Z){var Y=Z(r,h,d);if(typeof Y=="string"&&!y&&!v[Y])return r.dataTypes.unshift(Y),x(Y),!1;if(y)return!(H=Y)}),H}return x(r.dataTypes[0])||!v["*"]&&x("*")}function ci(i,r){var h,d,v=l.ajaxSettings.flatOptions||{};for(h in r)r[h]!==void 0&&((v[h]?i:d||(d={}))[h]=r[h]);return d&&l.extend(!0,i,d),i}function xh(i,r,h){for(var d,v,y,x,V=i.contents,H=i.dataTypes;H[0]==="*";)H.shift(),d===void 0&&(d=i.mimeType||r.getResponseHeader("Content-Type"));if(d){for(v in V)if(V[v]&&V[v].test(d)){H.unshift(v);break}}if(H[0]in h)y=H[0];else{for(v in h){if(!H[0]||i.converters[v+" "+H[0]]){y=v;break}x||(x=v)}y=y||x}if(y)return y!==H[0]&&H.unshift(y),h[y]}function wh(i,r,h,d){var v,y,x,V,H,D={},Z=i.dataTypes.slice();if(Z[1])for(x in i.converters)D[x.toLowerCase()]=i.converters[x];for(y=Z.shift();y;)if(i.responseFields[y]&&(h[i.responseFields[y]]=r),!H&&d&&i.dataFilter&&(r=i.dataFilter(r,i.dataType)),H=y,y=Z.shift(),y){if(y==="*")y=H;else if(H!=="*"&&H!==y){if(x=D[H+" "+y]||D["* "+y],!x){for(v in D)if(V=v.split(" "),V[1]===y&&(x=D[H+" "+V[0]]||D["* "+V[0]],x)){x===!0?x=D[v]:D[v]!==!0&&(y=V[0],Z.unshift(V[1]));break}}if(x!==!0)if(x&&i.throws)r=x(r);else try{r=x(r)}catch(Y){return{state:"parsererror",error:x?Y:"No conversion from "+H+" to "+y}}}}return{state:"success",data:r}}l.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Ua.href,type:"GET",isLocal:vh.test(Ua.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":K2,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":l.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(i,r){return r?ci(ci(i,l.ajaxSettings),r):ci(l.ajaxSettings,i)},ajaxPrefilter:Q2(Y2),ajaxTransport:Q2(hi),ajax:function(i,r){typeof i=="object"&&(r=i,i=void 0),r=r||{};var h,d,v,y,x,V,H,D,Z,Y,R=l.ajaxSetup({},r),it=R.context||R,ft=R.context&&(it.nodeType||it.jquery)?l(it):l.event,bt=l.Deferred(),vt=l.Callbacks("once memory"),Rt=R.statusCode||{},kt={},Ae={},Te="canceled",wt={readyState:0,getResponseHeader:function(Et){var Lt;if(H){if(!y)for(y={};Lt=mh.exec(v);)y[Lt[1].toLowerCase()+" "]=(y[Lt[1].toLowerCase()+" "]||[]).concat(Lt[2]);Lt=y[Et.toLowerCase()+" "]}return Lt==null?null:Lt.join(", ")},getAllResponseHeaders:function(){return H?v:null},setRequestHeader:function(Et,Lt){return H==null&&(Et=Ae[Et.toLowerCase()]=Ae[Et.toLowerCase()]||Et,kt[Et]=Lt),this},overrideMimeType:function(Et){return H==null&&(R.mimeType=Et),this},statusCode:function(Et){var Lt;if(Et)if(H)wt.always(Et[wt.status]);else for(Lt in Et)Rt[Lt]=[Rt[Lt],Et[Lt]];return this},abort:function(Et){var Lt=Et||Te;return h&&h.abort(Lt),oa(0,Lt),this}};if(bt.promise(wt),R.url=((i||R.url||Ua.href)+"").replace(yh,Ua.protocol+"//"),R.type=r.method||r.type||R.method||R.type,R.dataTypes=(R.dataType||"*").toLowerCase().match(Vt)||[""],R.crossDomain==null){V=S.createElement("a");try{V.href=R.url,V.href=V.href,R.crossDomain=di.protocol+"//"+di.host!=V.protocol+"//"+V.host}catch{R.crossDomain=!0}}if(R.data&&R.processData&&typeof R.data!="string"&&(R.data=l.param(R.data,R.traditional)),J2(Y2,R,r,wt),H)return wt;D=l.event&&R.global,D&&l.active++===0&&l.event.trigger("ajaxStart"),R.type=R.type.toUpperCase(),R.hasContent=!gh.test(R.type),d=R.url.replace(fh,""),R.hasContent?R.data&&R.processData&&(R.contentType||"").indexOf("application/x-www-form-urlencoded")===0&&(R.data=R.data.replace(uh,"+")):(Y=R.url.slice(d.length),R.data&&(R.processData||typeof R.data=="string")&&(d+=(oi.test(d)?"&":"?")+R.data,delete R.data),R.cache===!1&&(d=d.replace(Mh,"$1"),Y=(oi.test(d)?"&":"?")+"_="+G2.guid+++Y),R.url=d+Y),R.ifModified&&(l.lastModified[d]&&wt.setRequestHeader("If-Modified-Since",l.lastModified[d]),l.etag[d]&&wt.setRequestHeader("If-None-Match",l.etag[d])),(R.data&&R.hasContent&&R.contentType!==!1||r.contentType)&&wt.setRequestHeader("Content-Type",R.contentType),wt.setRequestHeader("Accept",R.dataTypes[0]&&R.accepts[R.dataTypes[0]]?R.accepts[R.dataTypes[0]]+(R.dataTypes[0]!=="*"?", "+K2+"; q=0.01":""):R.accepts["*"]);for(Z in R.headers)wt.setRequestHeader(Z,R.headers[Z]);if(R.beforeSend&&(R.beforeSend.call(it,wt,R)===!1||H))return wt.abort();if(Te="abort",vt.add(R.complete),wt.done(R.success),wt.fail(R.error),h=J2(hi,R,r,wt),!h)oa(-1,"No Transport");else{if(wt.readyState=1,D&&ft.trigger("ajaxSend",[wt,R]),H)return wt;R.async&&R.timeout>0&&(x=t.setTimeout(function(){wt.abort("timeout")},R.timeout));try{H=!1,h.send(kt,oa)}catch(Et){if(H)throw Et;oa(-1,Et)}}function oa(Et,Lt,Ka,ui){var _e,Qa,He,qe,We,ue=Lt;H||(H=!0,x&&t.clearTimeout(x),h=void 0,v=ui||"",wt.readyState=Et>0?4:0,_e=Et>=200&&Et<300||Et===304,Ka&&(qe=xh(R,wt,Ka)),!_e&&l.inArray("script",R.dataTypes)>-1&&l.inArray("json",R.dataTypes)<0&&(R.converters["text script"]=function(){}),qe=wh(R,qe,wt,_e),_e?(R.ifModified&&(We=wt.getResponseHeader("Last-Modified"),We&&(l.lastModified[d]=We),We=wt.getResponseHeader("etag"),We&&(l.etag[d]=We)),Et===204||R.type==="HEAD"?ue="nocontent":Et===304?ue="notmodified":(ue=qe.state,Qa=qe.data,He=qe.error,_e=!He)):(He=ue,(Et||!ue)&&(ue="error",Et<0&&(Et=0))),wt.status=Et,wt.statusText=(Lt||ue)+"",_e?bt.resolveWith(it,[Qa,ue,wt]):bt.rejectWith(it,[wt,ue,He]),wt.statusCode(Rt),Rt=void 0,D&&ft.trigger(_e?"ajaxSuccess":"ajaxError",[wt,R,_e?Qa:He]),vt.fireWith(it,[wt,ue]),D&&(ft.trigger("ajaxComplete",[wt,R]),--l.active||l.event.trigger("ajaxStop")))}return wt},getJSON:function(i,r,h){return l.get(i,r,h,"json")},getScript:function(i,r){return l.get(i,void 0,r,"script")}}),l.each(["get","post"],function(i,r){l[r]=function(h,d,v,y){return f(d)&&(y=y||v,v=d,d=void 0),l.ajax(l.extend({url:h,type:r,dataType:y,data:d,success:v},l.isPlainObject(h)&&h))}}),l.ajaxPrefilter(function(i){var r;for(r in i.headers)r.toLowerCase()==="content-type"&&(i.contentType=i.headers[r]||"")}),l._evalUrl=function(i,r,h){return l.ajax({url:i,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,converters:{"text script":function(){}},dataFilter:function(d){l.globalEval(d,r,h)}})},l.fn.extend({wrapAll:function(i){var r;return this[0]&&(f(i)&&(i=i.call(this[0])),r=l(i,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&r.insertBefore(this[0]),r.map(function(){for(var h=this;h.firstElementChild;)h=h.firstElementChild;return h}).append(this)),this},wrapInner:function(i){return f(i)?this.each(function(r){l(this).wrapInner(i.call(this,r))}):this.each(function(){var r=l(this),h=r.contents();h.length?h.wrapAll(i):r.append(i)})},wrap:function(i){var r=f(i);return this.each(function(h){l(this).wrapAll(r?i.call(this,h):i)})},unwrap:function(i){return this.parent(i).not("body").each(function(){l(this).replaceWith(this.childNodes)}),this}}),l.expr.pseudos.hidden=function(i){return!l.expr.pseudos.visible(i)},l.expr.pseudos.visible=function(i){return!!(i.offsetWidth||i.offsetHeight||i.getClientRects().length)},l.ajaxSettings.xhr=function(){try{return new t.XMLHttpRequest}catch{}};var bh={0:200,1223:204},Ya=l.ajaxSettings.xhr();u.cors=!!Ya&&"withCredentials"in Ya,u.ajax=Ya=!!Ya,l.ajaxTransport(function(i){var r,h;if(u.cors||Ya&&!i.crossDomain)return{send:function(d,v){var y,x=i.xhr();if(x.open(i.type,i.url,i.async,i.username,i.password),i.xhrFields)for(y in i.xhrFields)x[y]=i.xhrFields[y];i.mimeType&&x.overrideMimeType&&x.overrideMimeType(i.mimeType),!i.crossDomain&&!d["X-Requested-With"]&&(d["X-Requested-With"]="XMLHttpRequest");for(y in d)x.setRequestHeader(y,d[y]);r=function(V){return function(){r&&(r=h=x.onload=x.onerror=x.onabort=x.ontimeout=x.onreadystatechange=null,V==="abort"?x.abort():V==="error"?typeof x.status!="number"?v(0,"error"):v(x.status,x.statusText):v(bh[x.status]||x.status,x.statusText,(x.responseType||"text")!=="text"||typeof x.responseText!="string"?{binary:x.response}:{text:x.responseText},x.getAllResponseHeaders()))}},x.onload=r(),h=x.onerror=x.ontimeout=r("error"),x.onabort!==void 0?x.onabort=h:x.onreadystatechange=function(){x.readyState===4&&t.setTimeout(function(){r&&h()})},r=r("abort");try{x.send(i.hasContent&&i.data||null)}catch(V){if(r)throw V}},abort:function(){r&&r()}}}),l.ajaxPrefilter(function(i){i.crossDomain&&(i.contents.script=!1)}),l.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(i){return l.globalEval(i),i}}}),l.ajaxPrefilter("script",function(i){i.cache===void 0&&(i.cache=!1),i.crossDomain&&(i.type="GET")}),l.ajaxTransport("script",function(i){if(i.crossDomain||i.scriptAttrs){var r,h;return{send:function(d,v){r=l("<script>").attr(i.scriptAttrs||{}).prop({charset:i.scriptCharset,src:i.url}).on("load error",h=function(y){r.remove(),h=null,y&&v(y.type==="error"?404:200,y.type)}),S.head.appendChild(r[0])},abort:function(){h&&h()}}}});var tn=[],pi=/(=)\?(?=&|$)|\?\?/;l.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var i=tn.pop()||l.expando+"_"+G2.guid++;return this[i]=!0,i}}),l.ajaxPrefilter("json jsonp",function(i,r,h){var d,v,y,x=i.jsonp!==!1&&(pi.test(i.url)?"url":typeof i.data=="string"&&(i.contentType||"").indexOf("application/x-www-form-urlencoded")===0&&pi.test(i.data)&&"data");if(x||i.dataTypes[0]==="jsonp")return d=i.jsonpCallback=f(i.jsonpCallback)?i.jsonpCallback():i.jsonpCallback,x?i[x]=i[x].replace(pi,"$1"+d):i.jsonp!==!1&&(i.url+=(oi.test(i.url)?"&":"?")+i.jsonp+"="+d),i.converters["script json"]=function(){return y||l.error(d+" was not called"),y[0]},i.dataTypes[0]="json",v=t[d],t[d]=function(){y=arguments},h.always(function(){v===void 0?l(t).removeProp(d):t[d]=v,i[d]&&(i.jsonpCallback=r.jsonpCallback,tn.push(d)),y&&f(v)&&v(y[0]),y=v=void 0}),"script"}),u.createHTMLDocument=function(){var i=S.implementation.createHTMLDocument("").body;return i.innerHTML="<form></form><form></form>",i.childNodes.length===2}(),l.parseHTML=function(i,r,h){if(typeof i!="string")return[];typeof r=="boolean"&&(h=r,r=!1);var d,v,y;return r||(u.createHTMLDocument?(r=S.implementation.createHTMLDocument(""),d=r.createElement("base"),d.href=S.location.href,r.head.appendChild(d)):r=S),v=At.exec(i),y=!h&&[],v?[r.createElement(v[1])]:(v=L2([i],r,y),y&&y.length&&l(y).remove(),l.merge([],v.childNodes))},l.fn.load=function(i,r,h){var d,v,y,x=this,V=i.indexOf(" ");return V>-1&&(d=ra(i.slice(V)),i=i.slice(0,V)),f(r)?(h=r,r=void 0):r&&typeof r=="object"&&(v="POST"),x.length>0&&l.ajax({url:i,type:v||"GET",dataType:"html",data:r}).done(function(H){y=arguments,x.html(d?l("<div>").append(l.parseHTML(H)).find(d):H)}).always(h&&function(H,D){x.each(function(){h.apply(this,y||[H.responseText,D,H])})}),this},l.expr.pseudos.animated=function(i){return l.grep(l.timers,function(r){return i===r.elem}).length},l.offset={setOffset:function(i,r,h){var d,v,y,x,V,H,D,Z=l.css(i,"position"),Y=l(i),R={};Z==="static"&&(i.style.position="relative"),V=Y.offset(),y=l.css(i,"top"),H=l.css(i,"left"),D=(Z==="absolute"||Z==="fixed")&&(y+H).indexOf("auto")>-1,D?(d=Y.position(),x=d.top,v=d.left):(x=parseFloat(y)||0,v=parseFloat(H)||0),f(r)&&(r=r.call(i,h,l.extend({},V))),r.top!=null&&(R.top=r.top-V.top+x),r.left!=null&&(R.left=r.left-V.left+v),"using"in r?r.using.call(i,R):Y.css(R)}},l.fn.extend({offset:function(i){if(arguments.length)return i===void 0?this:this.each(function(v){l.offset.setOffset(this,i,v)});var r,h,d=this[0];if(d)return d.getClientRects().length?(r=d.getBoundingClientRect(),h=d.ownerDocument.defaultView,{top:r.top+h.pageYOffset,left:r.left+h.pageXOffset}):{top:0,left:0}},position:function(){if(this[0]){var i,r,h,d=this[0],v={top:0,left:0};if(l.css(d,"position")==="fixed")r=d.getBoundingClientRect();else{for(r=this.offset(),h=d.ownerDocument,i=d.offsetParent||h.documentElement;i&&(i===h.body||i===h.documentElement)&&l.css(i,"position")==="static";)i=i.parentNode;i&&i!==d&&i.nodeType===1&&(v=l(i).offset(),v.top+=l.css(i,"borderTopWidth",!0),v.left+=l.css(i,"borderLeftWidth",!0))}return{top:r.top-v.top-l.css(d,"marginTop",!0),left:r.left-v.left-l.css(d,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){for(var i=this.offsetParent;i&&l.css(i,"position")==="static";)i=i.offsetParent;return i||na})}}),l.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(i,r){var h=r==="pageYOffset";l.fn[i]=function(d){return Nt(this,function(v,y,x){var V;if(T(v)?V=v:v.nodeType===9&&(V=v.defaultView),x===void 0)return V?V[r]:v[y];V?V.scrollTo(h?V.pageXOffset:x,h?x:V.pageYOffset):v[y]=x},i,d,arguments.length)}}),l.each(["top","left"],function(i,r){l.cssHooks[r]=I2(u.pixelPosition,function(h,d){if(d)return d=Za(h,r),ei.test(d)?l(h).position()[r]+"px":d})}),l.each({Height:"height",Width:"width"},function(i,r){l.each({padding:"inner"+i,content:r,"":"outer"+i},function(h,d){l.fn[d]=function(v,y){var x=arguments.length&&(h||typeof v!="boolean"),V=h||(v===!0||y===!0?"margin":"border");return Nt(this,function(H,D,Z){var Y;return T(H)?d.indexOf("outer")===0?H["inner"+i]:H.document.documentElement["client"+i]:H.nodeType===9?(Y=H.documentElement,Math.max(H.body["scroll"+i],Y["scroll"+i],H.body["offset"+i],Y["offset"+i],Y["client"+i])):Z===void 0?l.css(H,D,V):l.style(H,D,Z,V)},r,x?v:void 0,x)}})}),l.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(i,r){l.fn[r]=function(h){return this.on(r,h)}}),l.fn.extend({bind:function(i,r,h){return this.on(i,null,r,h)},unbind:function(i,r){return this.off(i,null,r)},delegate:function(i,r,h,d){return this.on(r,i,h,d)},undelegate:function(i,r,h){return arguments.length===1?this.off(i,"**"):this.off(r,i||"**",h)},hover:function(i,r){return this.on("mouseenter",i).on("mouseleave",r||i)}}),l.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(i,r){l.fn[r]=function(h,d){return arguments.length>0?this.on(r,null,h,d):this.trigger(r)}});var Eh=/^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;l.proxy=function(i,r){var h,d,v;if(typeof r=="string"&&(h=i[r],r=i,i=h),!!f(i))return d=o.call(arguments,2),v=function(){return i.apply(r||this,d.concat(o.call(arguments)))},v.guid=i.guid=i.guid||l.guid++,v},l.holdReady=function(i){i?l.readyWait++:l.ready(!0)},l.isArray=Array.isArray,l.parseJSON=JSON.parse,l.nodeName=k,l.isFunction=f,l.isWindow=T,l.camelCase=$t,l.type=L,l.now=Date.now,l.isNumeric=function(i){var r=l.type(i);return(r==="number"||r==="string")&&!isNaN(i-parseFloat(i))},l.trim=function(i){return i==null?"":(i+"").replace(Eh,"$1")};var Sh=t.jQuery,Ch=t.$;return l.noConflict=function(i){return t.$===l&&(t.$=Ch),i&&t.jQuery===l&&(t.jQuery=Sh),l},typeof e>"u"&&(t.jQuery=t.$=l),l})}(P1)),P1.exports}var Ih=kh();const ee=Dh(Ih);function sn(a){return a!==null&&typeof a=="object"&&"constructor"in a&&a.constructor===Object}function n2(a,t){a===void 0&&(a={}),t===void 0&&(t={});const e=["__proto__","constructor","prototype"];Object.keys(t).filter(n=>e.indexOf(n)<0).forEach(n=>{typeof a[n]>"u"?a[n]=t[n]:sn(t[n])&&sn(a[n])&&Object.keys(t[n]).length>0&&n2(a[n],t[n])})}const ko={body:{},addEventListener(){},removeEventListener(){},activeElement:{blur(){},nodeName:""},querySelector(){return null},querySelectorAll(){return[]},getElementById(){return null},createEvent(){return{initEvent(){}}},createElement(){return{children:[],childNodes:[],style:{},setAttribute(){},getElementsByTagName(){return[]}}},createElementNS(){return{}},importNode(){return null},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""}};function zt(){const a=typeof document<"u"?document:{};return n2(a,ko),a}const Nh={document:ko,navigator:{userAgent:""},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""},history:{replaceState(){},pushState(){},go(){},back(){}},CustomEvent:function(){return this},addEventListener(){},removeEventListener(){},getComputedStyle(){return{getPropertyValue(){return""}}},Image(){},Date(){},screen:{},setTimeout(){},clearTimeout(){},matchMedia(){return{}},requestAnimationFrame(a){return typeof setTimeout>"u"?(a(),null):setTimeout(a,0)},cancelAnimationFrame(a){typeof setTimeout>"u"||clearTimeout(a)}};function _t(){const a=typeof window<"u"?window:{};return n2(a,Nh),a}function Ze(a){return a===void 0&&(a=""),a.trim().split(" ").filter(t=>!!t.trim())}function zh(a){const t=a;Object.keys(t).forEach(e=>{try{t[e]=null}catch{}try{delete t[e]}catch{}})}function Pa(a,t){return t===void 0&&(t=0),setTimeout(a,t)}function Me(){return Date.now()}function $h(a){const t=_t();let e;return t.getComputedStyle&&(e=t.getComputedStyle(a,null)),!e&&a.currentStyle&&(e=a.currentStyle),e||(e=a.style),e}function Xi(a,t){t===void 0&&(t="x");const e=_t();let n,s,o;const c=$h(a);return e.WebKitCSSMatrix?(s=c.transform||c.webkitTransform,s.split(",").length>6&&(s=s.split(", ").map(p=>p.replace(",",".")).join(", ")),o=new e.WebKitCSSMatrix(s==="none"?"":s)):(o=c.MozTransform||c.OTransform||c.MsTransform||c.msTransform||c.transform||c.getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,"),n=o.toString().split(",")),t==="x"&&(e.WebKitCSSMatrix?s=o.m41:n.length===16?s=parseFloat(n[12]):s=parseFloat(n[4])),t==="y"&&(e.WebKitCSSMatrix?s=o.m42:n.length===16?s=parseFloat(n[13]):s=parseFloat(n[5])),s||0}function a1(a){return typeof a=="object"&&a!==null&&a.constructor&&Object.prototype.toString.call(a).slice(8,-1)==="Object"}function Rh(a){return typeof window<"u"&&typeof window.HTMLElement<"u"?a instanceof HTMLElement:a&&(a.nodeType===1||a.nodeType===11)}function ne(){const a=Object(arguments.length<=0?void 0:arguments[0]),t=["__proto__","constructor","prototype"];for(let e=1;e<arguments.length;e+=1){const n=e<0||arguments.length<=e?void 0:arguments[e];if(n!=null&&!Rh(n)){const s=Object.keys(Object(n)).filter(o=>t.indexOf(o)<0);for(let o=0,c=s.length;o<c;o+=1){const p=s[o],m=Object.getOwnPropertyDescriptor(n,p);m!==void 0&&m.enumerable&&(a1(a[p])&&a1(n[p])?n[p].__swiper__?a[p]=n[p]:ne(a[p],n[p]):!a1(a[p])&&a1(n[p])?(a[p]={},n[p].__swiper__?a[p]=n[p]:ne(a[p],n[p])):a[p]=n[p])}}}return a}function i1(a,t,e){a.style.setProperty(t,e)}function Io(a){let{swiper:t,targetPosition:e,side:n}=a;const s=_t(),o=-t.translate;let c=null,p;const m=t.params.speed;t.wrapperEl.style.scrollSnapType="none",s.cancelAnimationFrame(t.cssModeFrameID);const M=e>o?"next":"prev",g=(A,b)=>M==="next"&&A>=b||M==="prev"&&A<=b,w=()=>{p=new Date().getTime(),c===null&&(c=p);const A=Math.max(Math.min((p-c)/m,1),0),b=.5-Math.cos(A*Math.PI)/2;let u=o+b*(e-o);if(g(u,e)&&(u=e),t.wrapperEl.scrollTo({[n]:u}),g(u,e)){t.wrapperEl.style.overflow="hidden",t.wrapperEl.style.scrollSnapType="",setTimeout(()=>{t.wrapperEl.style.overflow="",t.wrapperEl.scrollTo({[n]:u})}),s.cancelAnimationFrame(t.cssModeFrameID);return}t.cssModeFrameID=s.requestAnimationFrame(w)};w()}function Ma(a){return a.querySelector(".swiper-slide-transform")||a.shadowRoot&&a.shadowRoot.querySelector(".swiper-slide-transform")||a}function Bt(a,t){t===void 0&&(t="");const e=_t(),n=[...a.children];return e.HTMLSlotElement&&a instanceof HTMLSlotElement&&n.push(...a.assignedElements()),t?n.filter(s=>s.matches(t)):n}function Bh(a,t){const e=[t];for(;e.length>0;){const n=e.shift();if(a===n)return!0;e.push(...n.children,...n.shadowRoot?n.shadowRoot.children:[],...n.assignedElements?n.assignedElements():[])}}function Fh(a,t){const e=_t();let n=t.contains(a);return!n&&e.HTMLSlotElement&&t instanceof HTMLSlotElement&&(n=[...t.assignedElements()].includes(a),n||(n=Bh(a,t))),n}function N1(a){try{console.warn(a);return}catch{}}function re(a,t){t===void 0&&(t=[]);const e=document.createElement(a);return e.classList.add(...Array.isArray(t)?t:Ze(t)),e}function z1(a){const t=_t(),e=zt(),n=a.getBoundingClientRect(),s=e.body,o=a.clientTop||s.clientTop||0,c=a.clientLeft||s.clientLeft||0,p=a===t?t.scrollY:a.scrollTop,m=a===t?t.scrollX:a.scrollLeft;return{top:n.top+p-o,left:n.left+m-c}}function qh(a,t){const e=[];for(;a.previousElementSibling;){const n=a.previousElementSibling;t?n.matches(t)&&e.push(n):e.push(n),a=n}return e}function Wh(a,t){const e=[];for(;a.nextElementSibling;){const n=a.nextElementSibling;t?n.matches(t)&&e.push(n):e.push(n),a=n}return e}function Xe(a,t){return _t().getComputedStyle(a,null).getPropertyValue(t)}function o1(a){let t=a,e;if(t){for(e=0;(t=t.previousSibling)!==null;)t.nodeType===1&&(e+=1);return e}}function ca(a,t){const e=[];let n=a.parentElement;for(;n;)t?n.matches(t)&&e.push(n):e.push(n),n=n.parentElement;return e}function n1(a,t){function e(n){n.target===a&&(t.call(a,n),a.removeEventListener("transitionend",e))}t&&a.addEventListener("transitionend",e)}function Ui(a,t,e){const n=_t();return a[t==="width"?"offsetWidth":"offsetHeight"]+parseFloat(n.getComputedStyle(a,null).getPropertyValue(t==="width"?"margin-right":"margin-top"))+parseFloat(n.getComputedStyle(a,null).getPropertyValue(t==="width"?"margin-left":"margin-bottom"))}function xt(a){return(Array.isArray(a)?a:[a]).filter(t=>!!t)}function q1(a){return t=>Math.abs(t)>0&&a.browser&&a.browser.need3dFix&&Math.abs(t)%90===0?t+.001:t}function Re(a,t){t===void 0&&(t=""),typeof trustedTypes<"u"?a.innerHTML=trustedTypes.createPolicy("html",{createHTML:e=>e}).createHTML(t):a.innerHTML=t}let xi;function jh(){const a=_t(),t=zt();return{smoothScroll:t.documentElement&&t.documentElement.style&&"scrollBehavior"in t.documentElement.style,touch:!!("ontouchstart"in a||a.DocumentTouch&&t instanceof a.DocumentTouch)}}function No(){return xi||(xi=jh()),xi}let wi;function Gh(a){let{userAgent:t}=a===void 0?{}:a;const e=No(),n=_t(),s=n.navigator.platform,o=t||n.navigator.userAgent,c={ios:!1,android:!1},p=n.screen.width,m=n.screen.height,M=o.match(/(Android);?[\s\/]+([\d.]+)?/);let g=o.match(/(iPad).*OS\s([\d_]+)/);const w=o.match(/(iPod)(.*OS\s([\d_]+))?/),A=!g&&o.match(/(iPhone\sOS|iOS)\s([\d_]+)/),b=s==="Win32";let u=s==="MacIntel";const f=["1024x1366","1366x1024","834x1194","1194x834","834x1112","1112x834","768x1024","1024x768","820x1180","1180x820","810x1080","1080x810"];return!g&&u&&e.touch&&f.indexOf(`${p}x${m}`)>=0&&(g=o.match(/(Version)\/([\d.]+)/),g||(g=[0,1,"13_0_0"]),u=!1),M&&!b&&(c.os="android",c.android=!0),(g||A||w)&&(c.os="ios",c.ios=!0),c}function zo(a){return a===void 0&&(a={}),wi||(wi=Gh(a)),wi}let bi;function Zh(){const a=_t(),t=zo();let e=!1;function n(){const p=a.navigator.userAgent.toLowerCase();return p.indexOf("safari")>=0&&p.indexOf("chrome")<0&&p.indexOf("android")<0}if(n()){const p=String(a.navigator.userAgent);if(p.includes("Version/")){const[m,M]=p.split("Version/")[1].split(" ")[0].split(".").map(g=>Number(g));e=m<16||m===16&&M<2}}const s=/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(a.navigator.userAgent),o=n(),c=o||s&&t.ios;return{isSafari:e||o,needPerspectiveFix:e,need3dFix:c,isWebView:s}}function $o(){return bi||(bi=Zh()),bi}function Xh(a){let{swiper:t,on:e,emit:n}=a;const s=_t();let o=null,c=null;const p=()=>{!t||t.destroyed||!t.initialized||(n("beforeResize"),n("resize"))},m=()=>{!t||t.destroyed||!t.initialized||(o=new ResizeObserver(w=>{c=s.requestAnimationFrame(()=>{const{width:A,height:b}=t;let u=A,f=b;w.forEach(T=>{let{contentBoxSize:S,contentRect:C,target:E}=T;E&&E!==t.el||(u=C?C.width:(S[0]||S).inlineSize,f=C?C.height:(S[0]||S).blockSize)}),(u!==A||f!==b)&&p()})}),o.observe(t.el))},M=()=>{c&&s.cancelAnimationFrame(c),o&&o.unobserve&&t.el&&(o.unobserve(t.el),o=null)},g=()=>{!t||t.destroyed||!t.initialized||n("orientationchange")};e("init",()=>{if(t.params.resizeObserver&&typeof s.ResizeObserver<"u"){m();return}s.addEventListener("resize",p),s.addEventListener("orientationchange",g)}),e("destroy",()=>{M(),s.removeEventListener("resize",p),s.removeEventListener("orientationchange",g)})}function Uh(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o=[],c=_t(),p=function(g,w){w===void 0&&(w={});const A=c.MutationObserver||c.WebkitMutationObserver,b=new A(u=>{if(t.__preventObserver__)return;if(u.length===1){s("observerUpdate",u[0]);return}const f=function(){s("observerUpdate",u[0])};c.requestAnimationFrame?c.requestAnimationFrame(f):c.setTimeout(f,0)});b.observe(g,{attributes:typeof w.attributes>"u"?!0:w.attributes,childList:t.isElement||(typeof w.childList>"u"?!0:w).childList,characterData:typeof w.characterData>"u"?!0:w.characterData}),o.push(b)},m=()=>{if(t.params.observer){if(t.params.observeParents){const g=ca(t.hostEl);for(let w=0;w<g.length;w+=1)p(g[w])}p(t.hostEl,{childList:t.params.observeSlideChildren}),p(t.wrapperEl,{attributes:!1})}},M=()=>{o.forEach(g=>{g.disconnect()}),o.splice(0,o.length)};e({observer:!1,observeParents:!1,observeSlideChildren:!1}),n("init",m),n("destroy",M)}var Yh={on(a,t,e){const n=this;if(!n.eventsListeners||n.destroyed||typeof t!="function")return n;const s=e?"unshift":"push";return a.split(" ").forEach(o=>{n.eventsListeners[o]||(n.eventsListeners[o]=[]),n.eventsListeners[o][s](t)}),n},once(a,t,e){const n=this;if(!n.eventsListeners||n.destroyed||typeof t!="function")return n;function s(){n.off(a,s),s.__emitterProxy&&delete s.__emitterProxy;for(var o=arguments.length,c=new Array(o),p=0;p<o;p++)c[p]=arguments[p];t.apply(n,c)}return s.__emitterProxy=t,n.on(a,s,e)},onAny(a,t){const e=this;if(!e.eventsListeners||e.destroyed||typeof a!="function")return e;const n=t?"unshift":"push";return e.eventsAnyListeners.indexOf(a)<0&&e.eventsAnyListeners[n](a),e},offAny(a){const t=this;if(!t.eventsListeners||t.destroyed||!t.eventsAnyListeners)return t;const e=t.eventsAnyListeners.indexOf(a);return e>=0&&t.eventsAnyListeners.splice(e,1),t},off(a,t){const e=this;return!e.eventsListeners||e.destroyed||!e.eventsListeners||a.split(" ").forEach(n=>{typeof t>"u"?e.eventsListeners[n]=[]:e.eventsListeners[n]&&e.eventsListeners[n].forEach((s,o)=>{(s===t||s.__emitterProxy&&s.__emitterProxy===t)&&e.eventsListeners[n].splice(o,1)})}),e},emit(){const a=this;if(!a.eventsListeners||a.destroyed||!a.eventsListeners)return a;let t,e,n;for(var s=arguments.length,o=new Array(s),c=0;c<s;c++)o[c]=arguments[c];return typeof o[0]=="string"||Array.isArray(o[0])?(t=o[0],e=o.slice(1,o.length),n=a):(t=o[0].events,e=o[0].data,n=o[0].context||a),e.unshift(n),(Array.isArray(t)?t:t.split(" ")).forEach(m=>{a.eventsAnyListeners&&a.eventsAnyListeners.length&&a.eventsAnyListeners.forEach(M=>{M.apply(n,[m,...e])}),a.eventsListeners&&a.eventsListeners[m]&&a.eventsListeners[m].forEach(M=>{M.apply(n,e)})}),a}};function Kh(){const a=this;let t,e;const n=a.el;typeof a.params.width<"u"&&a.params.width!==null?t=a.params.width:t=n.clientWidth,typeof a.params.height<"u"&&a.params.height!==null?e=a.params.height:e=n.clientHeight,!(t===0&&a.isHorizontal()||e===0&&a.isVertical())&&(t=t-parseInt(Xe(n,"padding-left")||0,10)-parseInt(Xe(n,"padding-right")||0,10),e=e-parseInt(Xe(n,"padding-top")||0,10)-parseInt(Xe(n,"padding-bottom")||0,10),Number.isNaN(t)&&(t=0),Number.isNaN(e)&&(e=0),Object.assign(a,{width:t,height:e,size:a.isHorizontal()?t:e}))}function Qh(){const a=this;function t(z,G){return parseFloat(z.getPropertyValue(a.getDirectionLabel(G))||0)}const e=a.params,{wrapperEl:n,slidesEl:s,size:o,rtlTranslate:c,wrongRTL:p}=a,m=a.virtual&&e.virtual.enabled,M=m?a.virtual.slides.length:a.slides.length,g=Bt(s,`.${a.params.slideClass}, swiper-slide`),w=m?a.virtual.slides.length:g.length;let A=[];const b=[],u=[];let f=e.slidesOffsetBefore;typeof f=="function"&&(f=e.slidesOffsetBefore.call(a));let T=e.slidesOffsetAfter;typeof T=="function"&&(T=e.slidesOffsetAfter.call(a));const S=a.snapGrid.length,C=a.slidesGrid.length;let E=e.spaceBetween,L=-f,O=0,q=0;if(typeof o>"u")return;typeof E=="string"&&E.indexOf("%")>=0?E=parseFloat(E.replace("%",""))/100*o:typeof E=="string"&&(E=parseFloat(E)),a.virtualSize=-E,g.forEach(z=>{c?z.style.marginLeft="":z.style.marginRight="",z.style.marginBottom="",z.style.marginTop=""}),e.centeredSlides&&e.cssMode&&(i1(n,"--swiper-centered-offset-before",""),i1(n,"--swiper-centered-offset-after",""));const l=e.grid&&e.grid.rows>1&&a.grid;l?a.grid.initSlides(g):a.grid&&a.grid.unsetSlides();let W;const k=e.slidesPerView==="auto"&&e.breakpoints&&Object.keys(e.breakpoints).filter(z=>typeof e.breakpoints[z].slidesPerView<"u").length>0;for(let z=0;z<w;z+=1){W=0;let G;if(g[z]&&(G=g[z]),l&&a.grid.updateSlide(z,G,g),!(g[z]&&Xe(G,"display")==="none")){if(e.slidesPerView==="auto"){k&&(g[z].style[a.getDirectionLabel("width")]="");const j=getComputedStyle(G),I=G.style.transform,X=G.style.webkitTransform;if(I&&(G.style.transform="none"),X&&(G.style.webkitTransform="none"),e.roundLengths)W=a.isHorizontal()?Ui(G,"width"):Ui(G,"height");else{const J=t(j,"width"),Q=t(j,"padding-left"),N=t(j,"padding-right"),B=t(j,"margin-left"),at=t(j,"margin-right"),pt=j.getPropertyValue("box-sizing");if(pt&&pt==="border-box")W=J+B+at;else{const{clientWidth:St,offsetWidth:At}=G;W=J+Q+N+B+at+(At-St)}}I&&(G.style.transform=I),X&&(G.style.webkitTransform=X),e.roundLengths&&(W=Math.floor(W))}else W=(o-(e.slidesPerView-1)*E)/e.slidesPerView,e.roundLengths&&(W=Math.floor(W)),g[z]&&(g[z].style[a.getDirectionLabel("width")]=`${W}px`);g[z]&&(g[z].swiperSlideSize=W),u.push(W),e.centeredSlides?(L=L+W/2+O/2+E,O===0&&z!==0&&(L=L-o/2-E),z===0&&(L=L-o/2-E),Math.abs(L)<1/1e3&&(L=0),e.roundLengths&&(L=Math.floor(L)),q%e.slidesPerGroup===0&&A.push(L),b.push(L)):(e.roundLengths&&(L=Math.floor(L)),(q-Math.min(a.params.slidesPerGroupSkip,q))%a.params.slidesPerGroup===0&&A.push(L),b.push(L),L=L+W+E),a.virtualSize+=W+E,O=W,q+=1}}if(a.virtualSize=Math.max(a.virtualSize,o)+T,c&&p&&(e.effect==="slide"||e.effect==="coverflow")&&(n.style.width=`${a.virtualSize+E}px`),e.setWrapperSize&&(n.style[a.getDirectionLabel("width")]=`${a.virtualSize+E}px`),l&&a.grid.updateWrapperSize(W,A),!e.centeredSlides){const z=[];for(let G=0;G<A.length;G+=1){let j=A[G];e.roundLengths&&(j=Math.floor(j)),A[G]<=a.virtualSize-o&&z.push(j)}A=z,Math.floor(a.virtualSize-o)-Math.floor(A[A.length-1])>1&&A.push(a.virtualSize-o)}if(m&&e.loop){const z=u[0]+E;if(e.slidesPerGroup>1){const G=Math.ceil((a.virtual.slidesBefore+a.virtual.slidesAfter)/e.slidesPerGroup),j=z*e.slidesPerGroup;for(let I=0;I<G;I+=1)A.push(A[A.length-1]+j)}for(let G=0;G<a.virtual.slidesBefore+a.virtual.slidesAfter;G+=1)e.slidesPerGroup===1&&A.push(A[A.length-1]+z),b.push(b[b.length-1]+z),a.virtualSize+=z}if(A.length===0&&(A=[0]),E!==0){const z=a.isHorizontal()&&c?"marginLeft":a.getDirectionLabel("marginRight");g.filter((G,j)=>!e.cssMode||e.loop?!0:j!==g.length-1).forEach(G=>{G.style[z]=`${E}px`})}if(e.centeredSlides&&e.centeredSlidesBounds){let z=0;u.forEach(j=>{z+=j+(E||0)}),z-=E;const G=z>o?z-o:0;A=A.map(j=>j<=0?-f:j>G?G+T:j)}if(e.centerInsufficientSlides){let z=0;u.forEach(j=>{z+=j+(E||0)}),z-=E;const G=(e.slidesOffsetBefore||0)+(e.slidesOffsetAfter||0);if(z+G<o){const j=(o-z-G)/2;A.forEach((I,X)=>{A[X]=I-j}),b.forEach((I,X)=>{b[X]=I+j})}}if(Object.assign(a,{slides:g,snapGrid:A,slidesGrid:b,slidesSizesGrid:u}),e.centeredSlides&&e.cssMode&&!e.centeredSlidesBounds){i1(n,"--swiper-centered-offset-before",`${-A[0]}px`),i1(n,"--swiper-centered-offset-after",`${a.size/2-u[u.length-1]/2}px`);const z=-a.snapGrid[0],G=-a.slidesGrid[0];a.snapGrid=a.snapGrid.map(j=>j+z),a.slidesGrid=a.slidesGrid.map(j=>j+G)}if(w!==M&&a.emit("slidesLengthChange"),A.length!==S&&(a.params.watchOverflow&&a.checkOverflow(),a.emit("snapGridLengthChange")),b.length!==C&&a.emit("slidesGridLengthChange"),e.watchSlidesProgress&&a.updateSlidesOffset(),a.emit("slidesUpdated"),!m&&!e.cssMode&&(e.effect==="slide"||e.effect==="fade")){const z=`${e.containerModifierClass}backface-hidden`,G=a.el.classList.contains(z);w<=e.maxBackfaceHiddenSlides?G||a.el.classList.add(z):G&&a.el.classList.remove(z)}}function Jh(a){const t=this,e=[],n=t.virtual&&t.params.virtual.enabled;let s=0,o;typeof a=="number"?t.setTransition(a):a===!0&&t.setTransition(t.params.speed);const c=p=>n?t.slides[t.getSlideIndexByData(p)]:t.slides[p];if(t.params.slidesPerView!=="auto"&&t.params.slidesPerView>1)if(t.params.centeredSlides)(t.visibleSlides||[]).forEach(p=>{e.push(p)});else for(o=0;o<Math.ceil(t.params.slidesPerView);o+=1){const p=t.activeIndex+o;if(p>t.slides.length&&!n)break;e.push(c(p))}else e.push(c(t.activeIndex));for(o=0;o<e.length;o+=1)if(typeof e[o]<"u"){const p=e[o].offsetHeight;s=p>s?p:s}(s||s===0)&&(t.wrapperEl.style.height=`${s}px`)}function td(){const a=this,t=a.slides,e=a.isElement?a.isHorizontal()?a.wrapperEl.offsetLeft:a.wrapperEl.offsetTop:0;for(let n=0;n<t.length;n+=1)t[n].swiperSlideOffset=(a.isHorizontal()?t[n].offsetLeft:t[n].offsetTop)-e-a.cssOverflowAdjustment()}const on=(a,t,e)=>{t&&!a.classList.contains(e)?a.classList.add(e):!t&&a.classList.contains(e)&&a.classList.remove(e)};function ed(a){a===void 0&&(a=this&&this.translate||0);const t=this,e=t.params,{slides:n,rtlTranslate:s,snapGrid:o}=t;if(n.length===0)return;typeof n[0].swiperSlideOffset>"u"&&t.updateSlidesOffset();let c=-a;s&&(c=a),t.visibleSlidesIndexes=[],t.visibleSlides=[];let p=e.spaceBetween;typeof p=="string"&&p.indexOf("%")>=0?p=parseFloat(p.replace("%",""))/100*t.size:typeof p=="string"&&(p=parseFloat(p));for(let m=0;m<n.length;m+=1){const M=n[m];let g=M.swiperSlideOffset;e.cssMode&&e.centeredSlides&&(g-=n[0].swiperSlideOffset);const w=(c+(e.centeredSlides?t.minTranslate():0)-g)/(M.swiperSlideSize+p),A=(c-o[0]+(e.centeredSlides?t.minTranslate():0)-g)/(M.swiperSlideSize+p),b=-(c-g),u=b+t.slidesSizesGrid[m],f=b>=0&&b<=t.size-t.slidesSizesGrid[m],T=b>=0&&b<t.size-1||u>1&&u<=t.size||b<=0&&u>=t.size;T&&(t.visibleSlides.push(M),t.visibleSlidesIndexes.push(m)),on(M,T,e.slideVisibleClass),on(M,f,e.slideFullyVisibleClass),M.progress=s?-w:w,M.originalProgress=s?-A:A}}function ad(a){const t=this;if(typeof a>"u"){const g=t.rtlTranslate?-1:1;a=t&&t.translate&&t.translate*g||0}const e=t.params,n=t.maxTranslate()-t.minTranslate();let{progress:s,isBeginning:o,isEnd:c,progressLoop:p}=t;const m=o,M=c;if(n===0)s=0,o=!0,c=!0;else{s=(a-t.minTranslate())/n;const g=Math.abs(a-t.minTranslate())<1,w=Math.abs(a-t.maxTranslate())<1;o=g||s<=0,c=w||s>=1,g&&(s=0),w&&(s=1)}if(e.loop){const g=t.getSlideIndexByData(0),w=t.getSlideIndexByData(t.slides.length-1),A=t.slidesGrid[g],b=t.slidesGrid[w],u=t.slidesGrid[t.slidesGrid.length-1],f=Math.abs(a);f>=A?p=(f-A)/u:p=(f+u-b)/u,p>1&&(p-=1)}Object.assign(t,{progress:s,progressLoop:p,isBeginning:o,isEnd:c}),(e.watchSlidesProgress||e.centeredSlides&&e.autoHeight)&&t.updateSlidesProgress(a),o&&!m&&t.emit("reachBeginning toEdge"),c&&!M&&t.emit("reachEnd toEdge"),(m&&!o||M&&!c)&&t.emit("fromEdge"),t.emit("progress",s)}const Ei=(a,t,e)=>{t&&!a.classList.contains(e)?a.classList.add(e):!t&&a.classList.contains(e)&&a.classList.remove(e)};function id(){const a=this,{slides:t,params:e,slidesEl:n,activeIndex:s}=a,o=a.virtual&&e.virtual.enabled,c=a.grid&&e.grid&&e.grid.rows>1,p=w=>Bt(n,`.${e.slideClass}${w}, swiper-slide${w}`)[0];let m,M,g;if(o)if(e.loop){let w=s-a.virtual.slidesBefore;w<0&&(w=a.virtual.slides.length+w),w>=a.virtual.slides.length&&(w-=a.virtual.slides.length),m=p(`[data-swiper-slide-index="${w}"]`)}else m=p(`[data-swiper-slide-index="${s}"]`);else c?(m=t.find(w=>w.column===s),g=t.find(w=>w.column===s+1),M=t.find(w=>w.column===s-1)):m=t[s];m&&(c||(g=Wh(m,`.${e.slideClass}, swiper-slide`)[0],e.loop&&!g&&(g=t[0]),M=qh(m,`.${e.slideClass}, swiper-slide`)[0],e.loop&&!M===0&&(M=t[t.length-1]))),t.forEach(w=>{Ei(w,w===m,e.slideActiveClass),Ei(w,w===g,e.slideNextClass),Ei(w,w===M,e.slidePrevClass)}),a.emitSlidesClasses()}const D1=(a,t)=>{if(!a||a.destroyed||!a.params)return;const e=()=>a.isElement?"swiper-slide":`.${a.params.slideClass}`,n=t.closest(e());if(n){let s=n.querySelector(`.${a.params.lazyPreloaderClass}`);!s&&a.isElement&&(n.shadowRoot?s=n.shadowRoot.querySelector(`.${a.params.lazyPreloaderClass}`):requestAnimationFrame(()=>{n.shadowRoot&&(s=n.shadowRoot.querySelector(`.${a.params.lazyPreloaderClass}`),s&&s.remove())})),s&&s.remove()}},Si=(a,t)=>{if(!a.slides[t])return;const e=a.slides[t].querySelector('[loading="lazy"]');e&&e.removeAttribute("loading")},Yi=a=>{if(!a||a.destroyed||!a.params)return;let t=a.params.lazyPreloadPrevNext;const e=a.slides.length;if(!e||!t||t<0)return;t=Math.min(t,e);const n=a.params.slidesPerView==="auto"?a.slidesPerViewDynamic():Math.ceil(a.params.slidesPerView),s=a.activeIndex;if(a.params.grid&&a.params.grid.rows>1){const c=s,p=[c-t];p.push(...Array.from({length:t}).map((m,M)=>c+n+M)),a.slides.forEach((m,M)=>{p.includes(m.column)&&Si(a,M)});return}const o=s+n-1;if(a.params.rewind||a.params.loop)for(let c=s-t;c<=o+t;c+=1){const p=(c%e+e)%e;(p<s||p>o)&&Si(a,p)}else for(let c=Math.max(s-t,0);c<=Math.min(o+t,e-1);c+=1)c!==s&&(c>o||c<s)&&Si(a,c)};function nd(a){const{slidesGrid:t,params:e}=a,n=a.rtlTranslate?a.translate:-a.translate;let s;for(let o=0;o<t.length;o+=1)typeof t[o+1]<"u"?n>=t[o]&&n<t[o+1]-(t[o+1]-t[o])/2?s=o:n>=t[o]&&n<t[o+1]&&(s=o+1):n>=t[o]&&(s=o);return e.normalizeSlideIndex&&(s<0||typeof s>"u")&&(s=0),s}function rd(a){const t=this,e=t.rtlTranslate?t.translate:-t.translate,{snapGrid:n,params:s,activeIndex:o,realIndex:c,snapIndex:p}=t;let m=a,M;const g=b=>{let u=b-t.virtual.slidesBefore;return u<0&&(u=t.virtual.slides.length+u),u>=t.virtual.slides.length&&(u-=t.virtual.slides.length),u};if(typeof m>"u"&&(m=nd(t)),n.indexOf(e)>=0)M=n.indexOf(e);else{const b=Math.min(s.slidesPerGroupSkip,m);M=b+Math.floor((m-b)/s.slidesPerGroup)}if(M>=n.length&&(M=n.length-1),m===o&&!t.params.loop){M!==p&&(t.snapIndex=M,t.emit("snapIndexChange"));return}if(m===o&&t.params.loop&&t.virtual&&t.params.virtual.enabled){t.realIndex=g(m);return}const w=t.grid&&s.grid&&s.grid.rows>1;let A;if(t.virtual&&s.virtual.enabled&&s.loop)A=g(m);else if(w){const b=t.slides.find(f=>f.column===m);let u=parseInt(b.getAttribute("data-swiper-slide-index"),10);Number.isNaN(u)&&(u=Math.max(t.slides.indexOf(b),0)),A=Math.floor(u/s.grid.rows)}else if(t.slides[m]){const b=t.slides[m].getAttribute("data-swiper-slide-index");b?A=parseInt(b,10):A=m}else A=m;Object.assign(t,{previousSnapIndex:p,snapIndex:M,previousRealIndex:c,realIndex:A,previousIndex:o,activeIndex:m}),t.initialized&&Yi(t),t.emit("activeIndexChange"),t.emit("snapIndexChange"),(t.initialized||t.params.runCallbacksOnInit)&&(c!==A&&t.emit("realIndexChange"),t.emit("slideChange"))}function sd(a,t){const e=this,n=e.params;let s=a.closest(`.${n.slideClass}, swiper-slide`);!s&&e.isElement&&t&&t.length>1&&t.includes(a)&&[...t.slice(t.indexOf(a)+1,t.length)].forEach(p=>{!s&&p.matches&&p.matches(`.${n.slideClass}, swiper-slide`)&&(s=p)});let o=!1,c;if(s){for(let p=0;p<e.slides.length;p+=1)if(e.slides[p]===s){o=!0,c=p;break}}if(s&&o)e.clickedSlide=s,e.virtual&&e.params.virtual.enabled?e.clickedIndex=parseInt(s.getAttribute("data-swiper-slide-index"),10):e.clickedIndex=c;else{e.clickedSlide=void 0,e.clickedIndex=void 0;return}n.slideToClickedSlide&&e.clickedIndex!==void 0&&e.clickedIndex!==e.activeIndex&&e.slideToClickedSlide()}var od={updateSize:Kh,updateSlides:Qh,updateAutoHeight:Jh,updateSlidesOffset:td,updateSlidesProgress:ed,updateProgress:ad,updateSlidesClasses:id,updateActiveIndex:rd,updateClickedSlide:sd};function ld(a){a===void 0&&(a=this.isHorizontal()?"x":"y");const t=this,{params:e,rtlTranslate:n,translate:s,wrapperEl:o}=t;if(e.virtualTranslate)return n?-s:s;if(e.cssMode)return s;let c=Xi(o,a);return c+=t.cssOverflowAdjustment(),n&&(c=-c),c||0}function hd(a,t){const e=this,{rtlTranslate:n,params:s,wrapperEl:o,progress:c}=e;let p=0,m=0;const M=0;e.isHorizontal()?p=n?-a:a:m=a,s.roundLengths&&(p=Math.floor(p),m=Math.floor(m)),e.previousTranslate=e.translate,e.translate=e.isHorizontal()?p:m,s.cssMode?o[e.isHorizontal()?"scrollLeft":"scrollTop"]=e.isHorizontal()?-p:-m:s.virtualTranslate||(e.isHorizontal()?p-=e.cssOverflowAdjustment():m-=e.cssOverflowAdjustment(),o.style.transform=`translate3d(${p}px, ${m}px, ${M}px)`);let g;const w=e.maxTranslate()-e.minTranslate();w===0?g=0:g=(a-e.minTranslate())/w,g!==c&&e.updateProgress(a),e.emit("setTranslate",e.translate,t)}function dd(){return-this.snapGrid[0]}function cd(){return-this.snapGrid[this.snapGrid.length-1]}function pd(a,t,e,n,s){a===void 0&&(a=0),t===void 0&&(t=this.params.speed),e===void 0&&(e=!0),n===void 0&&(n=!0);const o=this,{params:c,wrapperEl:p}=o;if(o.animating&&c.preventInteractionOnTransition)return!1;const m=o.minTranslate(),M=o.maxTranslate();let g;if(n&&a>m?g=m:n&&a<M?g=M:g=a,o.updateProgress(g),c.cssMode){const w=o.isHorizontal();if(t===0)p[w?"scrollLeft":"scrollTop"]=-g;else{if(!o.support.smoothScroll)return Io({swiper:o,targetPosition:-g,side:w?"left":"top"}),!0;p.scrollTo({[w?"left":"top"]:-g,behavior:"smooth"})}return!0}return t===0?(o.setTransition(0),o.setTranslate(g),e&&(o.emit("beforeTransitionStart",t,s),o.emit("transitionEnd"))):(o.setTransition(t),o.setTranslate(g),e&&(o.emit("beforeTransitionStart",t,s),o.emit("transitionStart")),o.animating||(o.animating=!0,o.onTranslateToWrapperTransitionEnd||(o.onTranslateToWrapperTransitionEnd=function(A){!o||o.destroyed||A.target===this&&(o.wrapperEl.removeEventListener("transitionend",o.onTranslateToWrapperTransitionEnd),o.onTranslateToWrapperTransitionEnd=null,delete o.onTranslateToWrapperTransitionEnd,o.animating=!1,e&&o.emit("transitionEnd"))}),o.wrapperEl.addEventListener("transitionend",o.onTranslateToWrapperTransitionEnd))),!0}var ud={getTranslate:ld,setTranslate:hd,minTranslate:dd,maxTranslate:cd,translateTo:pd};function fd(a,t){const e=this;e.params.cssMode||(e.wrapperEl.style.transitionDuration=`${a}ms`,e.wrapperEl.style.transitionDelay=a===0?"0ms":""),e.emit("setTransition",a,t)}function Ro(a){let{swiper:t,runCallbacks:e,direction:n,step:s}=a;const{activeIndex:o,previousIndex:c}=t;let p=n;p||(o>c?p="next":o<c?p="prev":p="reset"),t.emit(`transition${s}`),e&&p==="reset"?t.emit(`slideResetTransition${s}`):e&&o!==c&&(t.emit(`slideChangeTransition${s}`),p==="next"?t.emit(`slideNextTransition${s}`):t.emit(`slidePrevTransition${s}`))}function Md(a,t){a===void 0&&(a=!0);const e=this,{params:n}=e;n.cssMode||(n.autoHeight&&e.updateAutoHeight(),Ro({swiper:e,runCallbacks:a,direction:t,step:"Start"}))}function md(a,t){a===void 0&&(a=!0);const e=this,{params:n}=e;e.animating=!1,!n.cssMode&&(e.setTransition(0),Ro({swiper:e,runCallbacks:a,direction:t,step:"End"}))}var vd={setTransition:fd,transitionStart:Md,transitionEnd:md};function gd(a,t,e,n,s){a===void 0&&(a=0),e===void 0&&(e=!0),typeof a=="string"&&(a=parseInt(a,10));const o=this;let c=a;c<0&&(c=0);const{params:p,snapGrid:m,slidesGrid:M,previousIndex:g,activeIndex:w,rtlTranslate:A,wrapperEl:b,enabled:u}=o;if(!u&&!n&&!s||o.destroyed||o.animating&&p.preventInteractionOnTransition)return!1;typeof t>"u"&&(t=o.params.speed);const f=Math.min(o.params.slidesPerGroupSkip,c);let T=f+Math.floor((c-f)/o.params.slidesPerGroup);T>=m.length&&(T=m.length-1);const S=-m[T];if(p.normalizeSlideIndex)for(let l=0;l<M.length;l+=1){const W=-Math.floor(S*100),k=Math.floor(M[l]*100),z=Math.floor(M[l+1]*100);typeof M[l+1]<"u"?W>=k&&W<z-(z-k)/2?c=l:W>=k&&W<z&&(c=l+1):W>=k&&(c=l)}if(o.initialized&&c!==w&&(!o.allowSlideNext&&(A?S>o.translate&&S>o.minTranslate():S<o.translate&&S<o.minTranslate())||!o.allowSlidePrev&&S>o.translate&&S>o.maxTranslate()&&(w||0)!==c))return!1;c!==(g||0)&&e&&o.emit("beforeSlideChangeStart"),o.updateProgress(S);let C;c>w?C="next":c<w?C="prev":C="reset";const E=o.virtual&&o.params.virtual.enabled;if(!(E&&s)&&(A&&-S===o.translate||!A&&S===o.translate))return o.updateActiveIndex(c),p.autoHeight&&o.updateAutoHeight(),o.updateSlidesClasses(),p.effect!=="slide"&&o.setTranslate(S),C!=="reset"&&(o.transitionStart(e,C),o.transitionEnd(e,C)),!1;if(p.cssMode){const l=o.isHorizontal(),W=A?S:-S;if(t===0)E&&(o.wrapperEl.style.scrollSnapType="none",o._immediateVirtual=!0),E&&!o._cssModeVirtualInitialSet&&o.params.initialSlide>0?(o._cssModeVirtualInitialSet=!0,requestAnimationFrame(()=>{b[l?"scrollLeft":"scrollTop"]=W})):b[l?"scrollLeft":"scrollTop"]=W,E&&requestAnimationFrame(()=>{o.wrapperEl.style.scrollSnapType="",o._immediateVirtual=!1});else{if(!o.support.smoothScroll)return Io({swiper:o,targetPosition:W,side:l?"left":"top"}),!0;b.scrollTo({[l?"left":"top"]:W,behavior:"smooth"})}return!0}const q=$o().isSafari;return E&&!s&&q&&o.isElement&&o.virtual.update(!1,!1,c),o.setTransition(t),o.setTranslate(S),o.updateActiveIndex(c),o.updateSlidesClasses(),o.emit("beforeTransitionStart",t,n),o.transitionStart(e,C),t===0?o.transitionEnd(e,C):o.animating||(o.animating=!0,o.onSlideToWrapperTransitionEnd||(o.onSlideToWrapperTransitionEnd=function(W){!o||o.destroyed||W.target===this&&(o.wrapperEl.removeEventListener("transitionend",o.onSlideToWrapperTransitionEnd),o.onSlideToWrapperTransitionEnd=null,delete o.onSlideToWrapperTransitionEnd,o.transitionEnd(e,C))}),o.wrapperEl.addEventListener("transitionend",o.onSlideToWrapperTransitionEnd)),!0}function yd(a,t,e,n){a===void 0&&(a=0),e===void 0&&(e=!0),typeof a=="string"&&(a=parseInt(a,10));const s=this;if(s.destroyed)return;typeof t>"u"&&(t=s.params.speed);const o=s.grid&&s.params.grid&&s.params.grid.rows>1;let c=a;if(s.params.loop)if(s.virtual&&s.params.virtual.enabled)c=c+s.virtual.slidesBefore;else{let p;if(o){const A=c*s.params.grid.rows;p=s.slides.find(b=>b.getAttribute("data-swiper-slide-index")*1===A).column}else p=s.getSlideIndexByData(c);const m=o?Math.ceil(s.slides.length/s.params.grid.rows):s.slides.length,{centeredSlides:M}=s.params;let g=s.params.slidesPerView;g==="auto"?g=s.slidesPerViewDynamic():(g=Math.ceil(parseFloat(s.params.slidesPerView,10)),M&&g%2===0&&(g=g+1));let w=m-p<g;if(M&&(w=w||p<Math.ceil(g/2)),n&&M&&s.params.slidesPerView!=="auto"&&!o&&(w=!1),w){const A=M?p<s.activeIndex?"prev":"next":p-s.activeIndex-1<s.params.slidesPerView?"next":"prev";s.loopFix({direction:A,slideTo:!0,activeSlideIndex:A==="next"?p+1:p-m+1,slideRealIndex:A==="next"?s.realIndex:void 0})}if(o){const A=c*s.params.grid.rows;c=s.slides.find(b=>b.getAttribute("data-swiper-slide-index")*1===A).column}else c=s.getSlideIndexByData(c)}return requestAnimationFrame(()=>{s.slideTo(c,t,e,n)}),s}function xd(a,t,e){t===void 0&&(t=!0);const n=this,{enabled:s,params:o,animating:c}=n;if(!s||n.destroyed)return n;typeof a>"u"&&(a=n.params.speed);let p=o.slidesPerGroup;o.slidesPerView==="auto"&&o.slidesPerGroup===1&&o.slidesPerGroupAuto&&(p=Math.max(n.slidesPerViewDynamic("current",!0),1));const m=n.activeIndex<o.slidesPerGroupSkip?1:p,M=n.virtual&&o.virtual.enabled;if(o.loop){if(c&&!M&&o.loopPreventsSliding)return!1;if(n.loopFix({direction:"next"}),n._clientLeft=n.wrapperEl.clientLeft,n.activeIndex===n.slides.length-1&&o.cssMode)return requestAnimationFrame(()=>{n.slideTo(n.activeIndex+m,a,t,e)}),!0}return o.rewind&&n.isEnd?n.slideTo(0,a,t,e):n.slideTo(n.activeIndex+m,a,t,e)}function wd(a,t,e){t===void 0&&(t=!0);const n=this,{params:s,snapGrid:o,slidesGrid:c,rtlTranslate:p,enabled:m,animating:M}=n;if(!m||n.destroyed)return n;typeof a>"u"&&(a=n.params.speed);const g=n.virtual&&s.virtual.enabled;if(s.loop){if(M&&!g&&s.loopPreventsSliding)return!1;n.loopFix({direction:"prev"}),n._clientLeft=n.wrapperEl.clientLeft}const w=p?n.translate:-n.translate;function A(C){return C<0?-Math.floor(Math.abs(C)):Math.floor(C)}const b=A(w),u=o.map(C=>A(C)),f=s.freeMode&&s.freeMode.enabled;let T=o[u.indexOf(b)-1];if(typeof T>"u"&&(s.cssMode||f)){let C;o.forEach((E,L)=>{b>=E&&(C=L)}),typeof C<"u"&&(T=f?o[C]:o[C>0?C-1:C])}let S=0;if(typeof T<"u"&&(S=c.indexOf(T),S<0&&(S=n.activeIndex-1),s.slidesPerView==="auto"&&s.slidesPerGroup===1&&s.slidesPerGroupAuto&&(S=S-n.slidesPerViewDynamic("previous",!0)+1,S=Math.max(S,0))),s.rewind&&n.isBeginning){const C=n.params.virtual&&n.params.virtual.enabled&&n.virtual?n.virtual.slides.length-1:n.slides.length-1;return n.slideTo(C,a,t,e)}else if(s.loop&&n.activeIndex===0&&s.cssMode)return requestAnimationFrame(()=>{n.slideTo(S,a,t,e)}),!0;return n.slideTo(S,a,t,e)}function bd(a,t,e){t===void 0&&(t=!0);const n=this;if(!n.destroyed)return typeof a>"u"&&(a=n.params.speed),n.slideTo(n.activeIndex,a,t,e)}function Ed(a,t,e,n){t===void 0&&(t=!0),n===void 0&&(n=.5);const s=this;if(s.destroyed)return;typeof a>"u"&&(a=s.params.speed);let o=s.activeIndex;const c=Math.min(s.params.slidesPerGroupSkip,o),p=c+Math.floor((o-c)/s.params.slidesPerGroup),m=s.rtlTranslate?s.translate:-s.translate;if(m>=s.snapGrid[p]){const M=s.snapGrid[p],g=s.snapGrid[p+1];m-M>(g-M)*n&&(o+=s.params.slidesPerGroup)}else{const M=s.snapGrid[p-1],g=s.snapGrid[p];m-M<=(g-M)*n&&(o-=s.params.slidesPerGroup)}return o=Math.max(o,0),o=Math.min(o,s.slidesGrid.length-1),s.slideTo(o,a,t,e)}function Sd(){const a=this;if(a.destroyed)return;const{params:t,slidesEl:e}=a,n=t.slidesPerView==="auto"?a.slidesPerViewDynamic():t.slidesPerView;let s=a.getSlideIndexWhenGrid(a.clickedIndex),o;const c=a.isElement?"swiper-slide":`.${t.slideClass}`,p=a.grid&&a.params.grid&&a.params.grid.rows>1;if(t.loop){if(a.animating)return;o=parseInt(a.clickedSlide.getAttribute("data-swiper-slide-index"),10),t.centeredSlides?a.slideToLoop(o):s>(p?(a.slides.length-n)/2-(a.params.grid.rows-1):a.slides.length-n)?(a.loopFix(),s=a.getSlideIndex(Bt(e,`${c}[data-swiper-slide-index="${o}"]`)[0]),Pa(()=>{a.slideTo(s)})):a.slideTo(s)}else a.slideTo(s)}var Cd={slideTo:gd,slideToLoop:yd,slideNext:xd,slidePrev:wd,slideReset:bd,slideToClosest:Ed,slideToClickedSlide:Sd};function Ad(a,t){const e=this,{params:n,slidesEl:s}=e;if(!n.loop||e.virtual&&e.params.virtual.enabled)return;const o=()=>{Bt(s,`.${n.slideClass}, swiper-slide`).forEach((b,u)=>{b.setAttribute("data-swiper-slide-index",u)})},c=()=>{const A=Bt(s,`.${n.slideBlankClass}`);A.forEach(b=>{b.remove()}),A.length>0&&(e.recalcSlides(),e.updateSlides())},p=e.grid&&n.grid&&n.grid.rows>1;n.loopAddBlankSlides&&(n.slidesPerGroup>1||p)&&c();const m=n.slidesPerGroup*(p?n.grid.rows:1),M=e.slides.length%m!==0,g=p&&e.slides.length%n.grid.rows!==0,w=A=>{for(let b=0;b<A;b+=1){const u=e.isElement?re("swiper-slide",[n.slideBlankClass]):re("div",[n.slideClass,n.slideBlankClass]);e.slidesEl.append(u)}};if(M){if(n.loopAddBlankSlides){const A=m-e.slides.length%m;w(A),e.recalcSlides(),e.updateSlides()}else N1("Swiper Loop Warning: The number of slides is not even to slidesPerGroup, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");o()}else if(g){if(n.loopAddBlankSlides){const A=n.grid.rows-e.slides.length%n.grid.rows;w(A),e.recalcSlides(),e.updateSlides()}else N1("Swiper Loop Warning: The number of slides is not even to grid.rows, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");o()}else o();e.loopFix({slideRealIndex:a,direction:n.centeredSlides?void 0:"next",initial:t})}function Td(a){let{slideRealIndex:t,slideTo:e=!0,direction:n,setTranslate:s,activeSlideIndex:o,initial:c,byController:p,byMousewheel:m}=a===void 0?{}:a;const M=this;if(!M.params.loop)return;M.emit("beforeLoopFix");const{slides:g,allowSlidePrev:w,allowSlideNext:A,slidesEl:b,params:u}=M,{centeredSlides:f,initialSlide:T}=u;if(M.allowSlidePrev=!0,M.allowSlideNext=!0,M.virtual&&u.virtual.enabled){e&&(!u.centeredSlides&&M.snapIndex===0?M.slideTo(M.virtual.slides.length,0,!1,!0):u.centeredSlides&&M.snapIndex<u.slidesPerView?M.slideTo(M.virtual.slides.length+M.snapIndex,0,!1,!0):M.snapIndex===M.snapGrid.length-1&&M.slideTo(M.virtual.slidesBefore,0,!1,!0)),M.allowSlidePrev=w,M.allowSlideNext=A,M.emit("loopFix");return}let S=u.slidesPerView;S==="auto"?S=M.slidesPerViewDynamic():(S=Math.ceil(parseFloat(u.slidesPerView,10)),f&&S%2===0&&(S=S+1));const C=u.slidesPerGroupAuto?S:u.slidesPerGroup;let E=f?Math.max(C,Math.ceil(S/2)):C;E%C!==0&&(E+=C-E%C),E+=u.loopAdditionalSlides,M.loopedSlides=E;const L=M.grid&&u.grid&&u.grid.rows>1;g.length<S+E||M.params.effect==="cards"&&g.length<S+E*2?N1("Swiper Loop Warning: The number of slides is not enough for loop mode, it will be disabled or not function properly. You need to add more slides (or make duplicates) or lower the values of slidesPerView and slidesPerGroup parameters"):L&&u.grid.fill==="row"&&N1("Swiper Loop Warning: Loop mode is not compatible with grid.fill = `row`");const O=[],q=[],l=L?Math.ceil(g.length/u.grid.rows):g.length,W=c&&l-T<S&&!f;let k=W?T:M.activeIndex;typeof o>"u"?o=M.getSlideIndex(g.find(Q=>Q.classList.contains(u.slideActiveClass))):k=o;const z=n==="next"||!n,G=n==="prev"||!n;let j=0,I=0;const J=(L?g[o].column:o)+(f&&typeof s>"u"?-S/2+.5:0);if(J<E){j=Math.max(E-J,C);for(let Q=0;Q<E-J;Q+=1){const N=Q-Math.floor(Q/l)*l;if(L){const B=l-N-1;for(let at=g.length-1;at>=0;at-=1)g[at].column===B&&O.push(at)}else O.push(l-N-1)}}else if(J+S>l-E){I=Math.max(J-(l-E*2),C),W&&(I=Math.max(I,S-l+T+1));for(let Q=0;Q<I;Q+=1){const N=Q-Math.floor(Q/l)*l;L?g.forEach((B,at)=>{B.column===N&&q.push(at)}):q.push(N)}}if(M.__preventObserver__=!0,requestAnimationFrame(()=>{M.__preventObserver__=!1}),M.params.effect==="cards"&&g.length<S+E*2&&(q.includes(o)&&q.splice(q.indexOf(o),1),O.includes(o)&&O.splice(O.indexOf(o),1)),G&&O.forEach(Q=>{g[Q].swiperLoopMoveDOM=!0,b.prepend(g[Q]),g[Q].swiperLoopMoveDOM=!1}),z&&q.forEach(Q=>{g[Q].swiperLoopMoveDOM=!0,b.append(g[Q]),g[Q].swiperLoopMoveDOM=!1}),M.recalcSlides(),u.slidesPerView==="auto"?M.updateSlides():L&&(O.length>0&&G||q.length>0&&z)&&M.slides.forEach((Q,N)=>{M.grid.updateSlide(N,Q,M.slides)}),u.watchSlidesProgress&&M.updateSlidesOffset(),e){if(O.length>0&&G){if(typeof t>"u"){const Q=M.slidesGrid[k],B=M.slidesGrid[k+j]-Q;m?M.setTranslate(M.translate-B):(M.slideTo(k+Math.ceil(j),0,!1,!0),s&&(M.touchEventsData.startTranslate=M.touchEventsData.startTranslate-B,M.touchEventsData.currentTranslate=M.touchEventsData.currentTranslate-B))}else if(s){const Q=L?O.length/u.grid.rows:O.length;M.slideTo(M.activeIndex+Q,0,!1,!0),M.touchEventsData.currentTranslate=M.translate}}else if(q.length>0&&z)if(typeof t>"u"){const Q=M.slidesGrid[k],B=M.slidesGrid[k-I]-Q;m?M.setTranslate(M.translate-B):(M.slideTo(k-I,0,!1,!0),s&&(M.touchEventsData.startTranslate=M.touchEventsData.startTranslate-B,M.touchEventsData.currentTranslate=M.touchEventsData.currentTranslate-B))}else{const Q=L?q.length/u.grid.rows:q.length;M.slideTo(M.activeIndex-Q,0,!1,!0)}}if(M.allowSlidePrev=w,M.allowSlideNext=A,M.controller&&M.controller.control&&!p){const Q={slideRealIndex:t,direction:n,setTranslate:s,activeSlideIndex:o,byController:!0};Array.isArray(M.controller.control)?M.controller.control.forEach(N=>{!N.destroyed&&N.params.loop&&N.loopFix({...Q,slideTo:N.params.slidesPerView===u.slidesPerView?e:!1})}):M.controller.control instanceof M.constructor&&M.controller.control.params.loop&&M.controller.control.loopFix({...Q,slideTo:M.controller.control.params.slidesPerView===u.slidesPerView?e:!1})}M.emit("loopFix")}function _d(){const a=this,{params:t,slidesEl:e}=a;if(!t.loop||!e||a.virtual&&a.params.virtual.enabled)return;a.recalcSlides();const n=[];a.slides.forEach(s=>{const o=typeof s.swiperSlideIndex>"u"?s.getAttribute("data-swiper-slide-index")*1:s.swiperSlideIndex;n[o]=s}),a.slides.forEach(s=>{s.removeAttribute("data-swiper-slide-index")}),n.forEach(s=>{e.append(s)}),a.recalcSlides(),a.slideTo(a.realIndex,0)}var Hd={loopCreate:Ad,loopFix:Td,loopDestroy:_d};function Ld(a){const t=this;if(!t.params.simulateTouch||t.params.watchOverflow&&t.isLocked||t.params.cssMode)return;const e=t.params.touchEventsTarget==="container"?t.el:t.wrapperEl;t.isElement&&(t.__preventObserver__=!0),e.style.cursor="move",e.style.cursor=a?"grabbing":"grab",t.isElement&&requestAnimationFrame(()=>{t.__preventObserver__=!1})}function Vd(){const a=this;a.params.watchOverflow&&a.isLocked||a.params.cssMode||(a.isElement&&(a.__preventObserver__=!0),a[a.params.touchEventsTarget==="container"?"el":"wrapperEl"].style.cursor="",a.isElement&&requestAnimationFrame(()=>{a.__preventObserver__=!1}))}var Pd={setGrabCursor:Ld,unsetGrabCursor:Vd};function Dd(a,t){t===void 0&&(t=this);function e(n){if(!n||n===zt()||n===_t())return null;n.assignedSlot&&(n=n.assignedSlot);const s=n.closest(a);return!s&&!n.getRootNode?null:s||e(n.getRootNode().host)}return e(t)}function ln(a,t,e){const n=_t(),{params:s}=a,o=s.edgeSwipeDetection,c=s.edgeSwipeThreshold;return o&&(e<=c||e>=n.innerWidth-c)?o==="prevent"?(t.preventDefault(),!0):!1:!0}function Od(a){const t=this,e=zt();let n=a;n.originalEvent&&(n=n.originalEvent);const s=t.touchEventsData;if(n.type==="pointerdown"){if(s.pointerId!==null&&s.pointerId!==n.pointerId)return;s.pointerId=n.pointerId}else n.type==="touchstart"&&n.targetTouches.length===1&&(s.touchId=n.targetTouches[0].identifier);if(n.type==="touchstart"){ln(t,n,n.targetTouches[0].pageX);return}const{params:o,touches:c,enabled:p}=t;if(!p||!o.simulateTouch&&n.pointerType==="mouse"||t.animating&&o.preventInteractionOnTransition)return;!t.animating&&o.cssMode&&o.loop&&t.loopFix();let m=n.target;if(o.touchEventsTarget==="wrapper"&&!Fh(m,t.wrapperEl)||"which"in n&&n.which===3||"button"in n&&n.button>0||s.isTouched&&s.isMoved)return;const M=!!o.noSwipingClass&&o.noSwipingClass!=="",g=n.composedPath?n.composedPath():n.path;M&&n.target&&n.target.shadowRoot&&g&&(m=g[0]);const w=o.noSwipingSelector?o.noSwipingSelector:`.${o.noSwipingClass}`,A=!!(n.target&&n.target.shadowRoot);if(o.noSwiping&&(A?Dd(w,m):m.closest(w))){t.allowClick=!0;return}if(o.swipeHandler&&!m.closest(o.swipeHandler))return;c.currentX=n.pageX,c.currentY=n.pageY;const b=c.currentX,u=c.currentY;if(!ln(t,n,b))return;Object.assign(s,{isTouched:!0,isMoved:!1,allowTouchCallbacks:!0,isScrolling:void 0,startMoving:void 0}),c.startX=b,c.startY=u,s.touchStartTime=Me(),t.allowClick=!0,t.updateSize(),t.swipeDirection=void 0,o.threshold>0&&(s.allowThresholdMove=!1);let f=!0;m.matches(s.focusableElements)&&(f=!1,m.nodeName==="SELECT"&&(s.isTouched=!1)),e.activeElement&&e.activeElement.matches(s.focusableElements)&&e.activeElement!==m&&(n.pointerType==="mouse"||n.pointerType!=="mouse"&&!m.matches(s.focusableElements))&&e.activeElement.blur();const T=f&&t.allowTouchMove&&o.touchStartPreventDefault;(o.touchStartForcePreventDefault||T)&&!m.isContentEditable&&n.preventDefault(),o.freeMode&&o.freeMode.enabled&&t.freeMode&&t.animating&&!o.cssMode&&t.freeMode.onTouchStart(),t.emit("touchStart",n)}function kd(a){const t=zt(),e=this,n=e.touchEventsData,{params:s,touches:o,rtlTranslate:c,enabled:p}=e;if(!p||!s.simulateTouch&&a.pointerType==="mouse")return;let m=a;if(m.originalEvent&&(m=m.originalEvent),m.type==="pointermove"&&(n.touchId!==null||m.pointerId!==n.pointerId))return;let M;if(m.type==="touchmove"){if(M=[...m.changedTouches].find(O=>O.identifier===n.touchId),!M||M.identifier!==n.touchId)return}else M=m;if(!n.isTouched){n.startMoving&&n.isScrolling&&e.emit("touchMoveOpposite",m);return}const g=M.pageX,w=M.pageY;if(m.preventedByNestedSwiper){o.startX=g,o.startY=w;return}if(!e.allowTouchMove){m.target.matches(n.focusableElements)||(e.allowClick=!1),n.isTouched&&(Object.assign(o,{startX:g,startY:w,currentX:g,currentY:w}),n.touchStartTime=Me());return}if(s.touchReleaseOnEdges&&!s.loop)if(e.isVertical()){if(w<o.startY&&e.translate<=e.maxTranslate()||w>o.startY&&e.translate>=e.minTranslate()){n.isTouched=!1,n.isMoved=!1;return}}else{if(c&&(g>o.startX&&-e.translate<=e.maxTranslate()||g<o.startX&&-e.translate>=e.minTranslate()))return;if(!c&&(g<o.startX&&e.translate<=e.maxTranslate()||g>o.startX&&e.translate>=e.minTranslate()))return}if(t.activeElement&&t.activeElement.matches(n.focusableElements)&&t.activeElement!==m.target&&m.pointerType!=="mouse"&&t.activeElement.blur(),t.activeElement&&m.target===t.activeElement&&m.target.matches(n.focusableElements)){n.isMoved=!0,e.allowClick=!1;return}n.allowTouchCallbacks&&e.emit("touchMove",m),o.previousX=o.currentX,o.previousY=o.currentY,o.currentX=g,o.currentY=w;const A=o.currentX-o.startX,b=o.currentY-o.startY;if(e.params.threshold&&Math.sqrt(A**2+b**2)<e.params.threshold)return;if(typeof n.isScrolling>"u"){let O;e.isHorizontal()&&o.currentY===o.startY||e.isVertical()&&o.currentX===o.startX?n.isScrolling=!1:A*A+b*b>=25&&(O=Math.atan2(Math.abs(b),Math.abs(A))*180/Math.PI,n.isScrolling=e.isHorizontal()?O>s.touchAngle:90-O>s.touchAngle)}if(n.isScrolling&&e.emit("touchMoveOpposite",m),typeof n.startMoving>"u"&&(o.currentX!==o.startX||o.currentY!==o.startY)&&(n.startMoving=!0),n.isScrolling||m.type==="touchmove"&&n.preventTouchMoveFromPointerMove){n.isTouched=!1;return}if(!n.startMoving)return;e.allowClick=!1,!s.cssMode&&m.cancelable&&m.preventDefault(),s.touchMoveStopPropagation&&!s.nested&&m.stopPropagation();let u=e.isHorizontal()?A:b,f=e.isHorizontal()?o.currentX-o.previousX:o.currentY-o.previousY;s.oneWayMovement&&(u=Math.abs(u)*(c?1:-1),f=Math.abs(f)*(c?1:-1)),o.diff=u,u*=s.touchRatio,c&&(u=-u,f=-f);const T=e.touchesDirection;e.swipeDirection=u>0?"prev":"next",e.touchesDirection=f>0?"prev":"next";const S=e.params.loop&&!s.cssMode,C=e.touchesDirection==="next"&&e.allowSlideNext||e.touchesDirection==="prev"&&e.allowSlidePrev;if(!n.isMoved){if(S&&C&&e.loopFix({direction:e.swipeDirection}),n.startTranslate=e.getTranslate(),e.setTransition(0),e.animating){const O=new window.CustomEvent("transitionend",{bubbles:!0,cancelable:!0,detail:{bySwiperTouchMove:!0}});e.wrapperEl.dispatchEvent(O)}n.allowMomentumBounce=!1,s.grabCursor&&(e.allowSlideNext===!0||e.allowSlidePrev===!0)&&e.setGrabCursor(!0),e.emit("sliderFirstMove",m)}if(new Date().getTime(),s._loopSwapReset!==!1&&n.isMoved&&n.allowThresholdMove&&T!==e.touchesDirection&&S&&C&&Math.abs(u)>=1){Object.assign(o,{startX:g,startY:w,currentX:g,currentY:w,startTranslate:n.currentTranslate}),n.loopSwapReset=!0,n.startTranslate=n.currentTranslate;return}e.emit("sliderMove",m),n.isMoved=!0,n.currentTranslate=u+n.startTranslate;let E=!0,L=s.resistanceRatio;if(s.touchReleaseOnEdges&&(L=0),u>0?(S&&C&&n.allowThresholdMove&&n.currentTranslate>(s.centeredSlides?e.minTranslate()-e.slidesSizesGrid[e.activeIndex+1]-(s.slidesPerView!=="auto"&&e.slides.length-s.slidesPerView>=2?e.slidesSizesGrid[e.activeIndex+1]+e.params.spaceBetween:0)-e.params.spaceBetween:e.minTranslate())&&e.loopFix({direction:"prev",setTranslate:!0,activeSlideIndex:0}),n.currentTranslate>e.minTranslate()&&(E=!1,s.resistance&&(n.currentTranslate=e.minTranslate()-1+(-e.minTranslate()+n.startTranslate+u)**L))):u<0&&(S&&C&&n.allowThresholdMove&&n.currentTranslate<(s.centeredSlides?e.maxTranslate()+e.slidesSizesGrid[e.slidesSizesGrid.length-1]+e.params.spaceBetween+(s.slidesPerView!=="auto"&&e.slides.length-s.slidesPerView>=2?e.slidesSizesGrid[e.slidesSizesGrid.length-1]+e.params.spaceBetween:0):e.maxTranslate())&&e.loopFix({direction:"next",setTranslate:!0,activeSlideIndex:e.slides.length-(s.slidesPerView==="auto"?e.slidesPerViewDynamic():Math.ceil(parseFloat(s.slidesPerView,10)))}),n.currentTranslate<e.maxTranslate()&&(E=!1,s.resistance&&(n.currentTranslate=e.maxTranslate()+1-(e.maxTranslate()-n.startTranslate-u)**L))),E&&(m.preventedByNestedSwiper=!0),!e.allowSlideNext&&e.swipeDirection==="next"&&n.currentTranslate<n.startTranslate&&(n.currentTranslate=n.startTranslate),!e.allowSlidePrev&&e.swipeDirection==="prev"&&n.currentTranslate>n.startTranslate&&(n.currentTranslate=n.startTranslate),!e.allowSlidePrev&&!e.allowSlideNext&&(n.currentTranslate=n.startTranslate),s.threshold>0)if(Math.abs(u)>s.threshold||n.allowThresholdMove){if(!n.allowThresholdMove){n.allowThresholdMove=!0,o.startX=o.currentX,o.startY=o.currentY,n.currentTranslate=n.startTranslate,o.diff=e.isHorizontal()?o.currentX-o.startX:o.currentY-o.startY;return}}else{n.currentTranslate=n.startTranslate;return}!s.followFinger||s.cssMode||((s.freeMode&&s.freeMode.enabled&&e.freeMode||s.watchSlidesProgress)&&(e.updateActiveIndex(),e.updateSlidesClasses()),s.freeMode&&s.freeMode.enabled&&e.freeMode&&e.freeMode.onTouchMove(),e.updateProgress(n.currentTranslate),e.setTranslate(n.currentTranslate))}function Id(a){const t=this,e=t.touchEventsData;let n=a;n.originalEvent&&(n=n.originalEvent);let s;if(n.type==="touchend"||n.type==="touchcancel"){if(s=[...n.changedTouches].find(O=>O.identifier===e.touchId),!s||s.identifier!==e.touchId)return}else{if(e.touchId!==null||n.pointerId!==e.pointerId)return;s=n}if(["pointercancel","pointerout","pointerleave","contextmenu"].includes(n.type)&&!(["pointercancel","contextmenu"].includes(n.type)&&(t.browser.isSafari||t.browser.isWebView)))return;e.pointerId=null,e.touchId=null;const{params:c,touches:p,rtlTranslate:m,slidesGrid:M,enabled:g}=t;if(!g||!c.simulateTouch&&n.pointerType==="mouse")return;if(e.allowTouchCallbacks&&t.emit("touchEnd",n),e.allowTouchCallbacks=!1,!e.isTouched){e.isMoved&&c.grabCursor&&t.setGrabCursor(!1),e.isMoved=!1,e.startMoving=!1;return}c.grabCursor&&e.isMoved&&e.isTouched&&(t.allowSlideNext===!0||t.allowSlidePrev===!0)&&t.setGrabCursor(!1);const w=Me(),A=w-e.touchStartTime;if(t.allowClick){const O=n.path||n.composedPath&&n.composedPath();t.updateClickedSlide(O&&O[0]||n.target,O),t.emit("tap click",n),A<300&&w-e.lastClickTime<300&&t.emit("doubleTap doubleClick",n)}if(e.lastClickTime=Me(),Pa(()=>{t.destroyed||(t.allowClick=!0)}),!e.isTouched||!e.isMoved||!t.swipeDirection||p.diff===0&&!e.loopSwapReset||e.currentTranslate===e.startTranslate&&!e.loopSwapReset){e.isTouched=!1,e.isMoved=!1,e.startMoving=!1;return}e.isTouched=!1,e.isMoved=!1,e.startMoving=!1;let b;if(c.followFinger?b=m?t.translate:-t.translate:b=-e.currentTranslate,c.cssMode)return;if(c.freeMode&&c.freeMode.enabled){t.freeMode.onTouchEnd({currentPos:b});return}const u=b>=-t.maxTranslate()&&!t.params.loop;let f=0,T=t.slidesSizesGrid[0];for(let O=0;O<M.length;O+=O<c.slidesPerGroupSkip?1:c.slidesPerGroup){const q=O<c.slidesPerGroupSkip-1?1:c.slidesPerGroup;typeof M[O+q]<"u"?(u||b>=M[O]&&b<M[O+q])&&(f=O,T=M[O+q]-M[O]):(u||b>=M[O])&&(f=O,T=M[M.length-1]-M[M.length-2])}let S=null,C=null;c.rewind&&(t.isBeginning?C=c.virtual&&c.virtual.enabled&&t.virtual?t.virtual.slides.length-1:t.slides.length-1:t.isEnd&&(S=0));const E=(b-M[f])/T,L=f<c.slidesPerGroupSkip-1?1:c.slidesPerGroup;if(A>c.longSwipesMs){if(!c.longSwipes){t.slideTo(t.activeIndex);return}t.swipeDirection==="next"&&(E>=c.longSwipesRatio?t.slideTo(c.rewind&&t.isEnd?S:f+L):t.slideTo(f)),t.swipeDirection==="prev"&&(E>1-c.longSwipesRatio?t.slideTo(f+L):C!==null&&E<0&&Math.abs(E)>c.longSwipesRatio?t.slideTo(C):t.slideTo(f))}else{if(!c.shortSwipes){t.slideTo(t.activeIndex);return}t.navigation&&(n.target===t.navigation.nextEl||n.target===t.navigation.prevEl)?n.target===t.navigation.nextEl?t.slideTo(f+L):t.slideTo(f):(t.swipeDirection==="next"&&t.slideTo(S!==null?S:f+L),t.swipeDirection==="prev"&&t.slideTo(C!==null?C:f))}}function hn(){const a=this,{params:t,el:e}=a;if(e&&e.offsetWidth===0)return;t.breakpoints&&a.setBreakpoint();const{allowSlideNext:n,allowSlidePrev:s,snapGrid:o}=a,c=a.virtual&&a.params.virtual.enabled;a.allowSlideNext=!0,a.allowSlidePrev=!0,a.updateSize(),a.updateSlides(),a.updateSlidesClasses();const p=c&&t.loop;(t.slidesPerView==="auto"||t.slidesPerView>1)&&a.isEnd&&!a.isBeginning&&!a.params.centeredSlides&&!p?a.slideTo(a.slides.length-1,0,!1,!0):a.params.loop&&!c?a.slideToLoop(a.realIndex,0,!1,!0):a.slideTo(a.activeIndex,0,!1,!0),a.autoplay&&a.autoplay.running&&a.autoplay.paused&&(clearTimeout(a.autoplay.resizeTimeout),a.autoplay.resizeTimeout=setTimeout(()=>{a.autoplay&&a.autoplay.running&&a.autoplay.paused&&a.autoplay.resume()},500)),a.allowSlidePrev=s,a.allowSlideNext=n,a.params.watchOverflow&&o!==a.snapGrid&&a.checkOverflow()}function Nd(a){const t=this;t.enabled&&(t.allowClick||(t.params.preventClicks&&a.preventDefault(),t.params.preventClicksPropagation&&t.animating&&(a.stopPropagation(),a.stopImmediatePropagation())))}function zd(){const a=this,{wrapperEl:t,rtlTranslate:e,enabled:n}=a;if(!n)return;a.previousTranslate=a.translate,a.isHorizontal()?a.translate=-t.scrollLeft:a.translate=-t.scrollTop,a.translate===0&&(a.translate=0),a.updateActiveIndex(),a.updateSlidesClasses();let s;const o=a.maxTranslate()-a.minTranslate();o===0?s=0:s=(a.translate-a.minTranslate())/o,s!==a.progress&&a.updateProgress(e?-a.translate:a.translate),a.emit("setTranslate",a.translate,!1)}function $d(a){const t=this;D1(t,a.target),!(t.params.cssMode||t.params.slidesPerView!=="auto"&&!t.params.autoHeight)&&t.update()}function Rd(){const a=this;a.documentTouchHandlerProceeded||(a.documentTouchHandlerProceeded=!0,a.params.touchReleaseOnEdges&&(a.el.style.touchAction="auto"))}const Bo=(a,t)=>{const e=zt(),{params:n,el:s,wrapperEl:o,device:c}=a,p=!!n.nested,m=t==="on"?"addEventListener":"removeEventListener",M=t;!s||typeof s=="string"||(e[m]("touchstart",a.onDocumentTouchStart,{passive:!1,capture:p}),s[m]("touchstart",a.onTouchStart,{passive:!1}),s[m]("pointerdown",a.onTouchStart,{passive:!1}),e[m]("touchmove",a.onTouchMove,{passive:!1,capture:p}),e[m]("pointermove",a.onTouchMove,{passive:!1,capture:p}),e[m]("touchend",a.onTouchEnd,{passive:!0}),e[m]("pointerup",a.onTouchEnd,{passive:!0}),e[m]("pointercancel",a.onTouchEnd,{passive:!0}),e[m]("touchcancel",a.onTouchEnd,{passive:!0}),e[m]("pointerout",a.onTouchEnd,{passive:!0}),e[m]("pointerleave",a.onTouchEnd,{passive:!0}),e[m]("contextmenu",a.onTouchEnd,{passive:!0}),(n.preventClicks||n.preventClicksPropagation)&&s[m]("click",a.onClick,!0),n.cssMode&&o[m]("scroll",a.onScroll),n.updateOnWindowResize?a[M](c.ios||c.android?"resize orientationchange observerUpdate":"resize observerUpdate",hn,!0):a[M]("observerUpdate",hn,!0),s[m]("load",a.onLoad,{capture:!0}))};function Bd(){const a=this,{params:t}=a;a.onTouchStart=Od.bind(a),a.onTouchMove=kd.bind(a),a.onTouchEnd=Id.bind(a),a.onDocumentTouchStart=Rd.bind(a),t.cssMode&&(a.onScroll=zd.bind(a)),a.onClick=Nd.bind(a),a.onLoad=$d.bind(a),Bo(a,"on")}function Fd(){Bo(this,"off")}var qd={attachEvents:Bd,detachEvents:Fd};const dn=(a,t)=>a.grid&&t.grid&&t.grid.rows>1;function Wd(){const a=this,{realIndex:t,initialized:e,params:n,el:s}=a,o=n.breakpoints;if(!o||o&&Object.keys(o).length===0)return;const c=zt(),p=n.breakpointsBase==="window"||!n.breakpointsBase?n.breakpointsBase:"container",m=["window","container"].includes(n.breakpointsBase)||!n.breakpointsBase?a.el:c.querySelector(n.breakpointsBase),M=a.getBreakpoint(o,p,m);if(!M||a.currentBreakpoint===M)return;const w=(M in o?o[M]:void 0)||a.originalParams,A=dn(a,n),b=dn(a,w),u=a.params.grabCursor,f=w.grabCursor,T=n.enabled;A&&!b?(s.classList.remove(`${n.containerModifierClass}grid`,`${n.containerModifierClass}grid-column`),a.emitContainerClasses()):!A&&b&&(s.classList.add(`${n.containerModifierClass}grid`),(w.grid.fill&&w.grid.fill==="column"||!w.grid.fill&&n.grid.fill==="column")&&s.classList.add(`${n.containerModifierClass}grid-column`),a.emitContainerClasses()),u&&!f?a.unsetGrabCursor():!u&&f&&a.setGrabCursor(),["navigation","pagination","scrollbar"].forEach(q=>{if(typeof w[q]>"u")return;const l=n[q]&&n[q].enabled,W=w[q]&&w[q].enabled;l&&!W&&a[q].disable(),!l&&W&&a[q].enable()});const S=w.direction&&w.direction!==n.direction,C=n.loop&&(w.slidesPerView!==n.slidesPerView||S),E=n.loop;S&&e&&a.changeDirection(),ne(a.params,w);const L=a.params.enabled,O=a.params.loop;Object.assign(a,{allowTouchMove:a.params.allowTouchMove,allowSlideNext:a.params.allowSlideNext,allowSlidePrev:a.params.allowSlidePrev}),T&&!L?a.disable():!T&&L&&a.enable(),a.currentBreakpoint=M,a.emit("_beforeBreakpoint",w),e&&(C?(a.loopDestroy(),a.loopCreate(t),a.updateSlides()):!E&&O?(a.loopCreate(t),a.updateSlides()):E&&!O&&a.loopDestroy()),a.emit("breakpoint",w)}function jd(a,t,e){if(t===void 0&&(t="window"),!a||t==="container"&&!e)return;let n=!1;const s=_t(),o=t==="window"?s.innerHeight:e.clientHeight,c=Object.keys(a).map(p=>{if(typeof p=="string"&&p.indexOf("@")===0){const m=parseFloat(p.substr(1));return{value:o*m,point:p}}return{value:p,point:p}});c.sort((p,m)=>parseInt(p.value,10)-parseInt(m.value,10));for(let p=0;p<c.length;p+=1){const{point:m,value:M}=c[p];t==="window"?s.matchMedia(`(min-width: ${M}px)`).matches&&(n=m):M<=e.clientWidth&&(n=m)}return n||"max"}var Gd={setBreakpoint:Wd,getBreakpoint:jd};function Zd(a,t){const e=[];return a.forEach(n=>{typeof n=="object"?Object.keys(n).forEach(s=>{n[s]&&e.push(t+s)}):typeof n=="string"&&e.push(t+n)}),e}function Xd(){const a=this,{classNames:t,params:e,rtl:n,el:s,device:o}=a,c=Zd(["initialized",e.direction,{"free-mode":a.params.freeMode&&e.freeMode.enabled},{autoheight:e.autoHeight},{rtl:n},{grid:e.grid&&e.grid.rows>1},{"grid-column":e.grid&&e.grid.rows>1&&e.grid.fill==="column"},{android:o.android},{ios:o.ios},{"css-mode":e.cssMode},{centered:e.cssMode&&e.centeredSlides},{"watch-progress":e.watchSlidesProgress}],e.containerModifierClass);t.push(...c),s.classList.add(...t),a.emitContainerClasses()}function Ud(){const a=this,{el:t,classNames:e}=a;!t||typeof t=="string"||(t.classList.remove(...e),a.emitContainerClasses())}var Yd={addClasses:Xd,removeClasses:Ud};function Kd(){const a=this,{isLocked:t,params:e}=a,{slidesOffsetBefore:n}=e;if(n){const s=a.slides.length-1,o=a.slidesGrid[s]+a.slidesSizesGrid[s]+n*2;a.isLocked=a.size>o}else a.isLocked=a.snapGrid.length===1;e.allowSlideNext===!0&&(a.allowSlideNext=!a.isLocked),e.allowSlidePrev===!0&&(a.allowSlidePrev=!a.isLocked),t&&t!==a.isLocked&&(a.isEnd=!1),t!==a.isLocked&&a.emit(a.isLocked?"lock":"unlock")}var Qd={checkOverflow:Kd},cn={init:!0,direction:"horizontal",oneWayMovement:!1,swiperElementNodeName:"SWIPER-CONTAINER",touchEventsTarget:"wrapper",initialSlide:0,speed:300,cssMode:!1,updateOnWindowResize:!0,resizeObserver:!0,nested:!1,createElements:!1,eventsPrefix:"swiper",enabled:!0,focusableElements:"input, select, option, textarea, button, video, label",width:null,height:null,preventInteractionOnTransition:!1,userAgent:null,url:null,edgeSwipeDetection:!1,edgeSwipeThreshold:20,autoHeight:!1,setWrapperSize:!1,virtualTranslate:!1,effect:"slide",breakpoints:void 0,breakpointsBase:"window",spaceBetween:0,slidesPerView:1,slidesPerGroup:1,slidesPerGroupSkip:0,slidesPerGroupAuto:!1,centeredSlides:!1,centeredSlidesBounds:!1,slidesOffsetBefore:0,slidesOffsetAfter:0,normalizeSlideIndex:!0,centerInsufficientSlides:!1,watchOverflow:!0,roundLengths:!1,touchRatio:1,touchAngle:45,simulateTouch:!0,shortSwipes:!0,longSwipes:!0,longSwipesRatio:.5,longSwipesMs:300,followFinger:!0,allowTouchMove:!0,threshold:5,touchMoveStopPropagation:!1,touchStartPreventDefault:!0,touchStartForcePreventDefault:!1,touchReleaseOnEdges:!1,uniqueNavElements:!0,resistance:!0,resistanceRatio:.85,watchSlidesProgress:!1,grabCursor:!1,preventClicks:!0,preventClicksPropagation:!0,slideToClickedSlide:!1,loop:!1,loopAddBlankSlides:!0,loopAdditionalSlides:0,loopPreventsSliding:!0,rewind:!1,allowSlidePrev:!0,allowSlideNext:!0,swipeHandler:null,noSwiping:!0,noSwipingClass:"swiper-no-swiping",noSwipingSelector:null,passiveListeners:!0,maxBackfaceHiddenSlides:10,containerModifierClass:"swiper-",slideClass:"swiper-slide",slideBlankClass:"swiper-slide-blank",slideActiveClass:"swiper-slide-active",slideVisibleClass:"swiper-slide-visible",slideFullyVisibleClass:"swiper-slide-fully-visible",slideNextClass:"swiper-slide-next",slidePrevClass:"swiper-slide-prev",wrapperClass:"swiper-wrapper",lazyPreloaderClass:"swiper-lazy-preloader",lazyPreloadPrevNext:0,runCallbacksOnInit:!0,_emitClasses:!1};function Jd(a,t){return function(n){n===void 0&&(n={});const s=Object.keys(n)[0],o=n[s];if(typeof o!="object"||o===null){ne(t,n);return}if(a[s]===!0&&(a[s]={enabled:!0}),s==="navigation"&&a[s]&&a[s].enabled&&!a[s].prevEl&&!a[s].nextEl&&(a[s].auto=!0),["pagination","scrollbar"].indexOf(s)>=0&&a[s]&&a[s].enabled&&!a[s].el&&(a[s].auto=!0),!(s in a&&"enabled"in o)){ne(t,n);return}typeof a[s]=="object"&&!("enabled"in a[s])&&(a[s].enabled=!0),a[s]||(a[s]={enabled:!1}),ne(t,n)}}const Ci={eventsEmitter:Yh,update:od,translate:ud,transition:vd,slide:Cd,loop:Hd,grabCursor:Pd,events:qd,breakpoints:Gd,checkOverflow:Qd,classes:Yd},Ai={};class Wt{constructor(){let t,e;for(var n=arguments.length,s=new Array(n),o=0;o<n;o++)s[o]=arguments[o];s.length===1&&s[0].constructor&&Object.prototype.toString.call(s[0]).slice(8,-1)==="Object"?e=s[0]:[t,e]=s,e||(e={}),e=ne({},e),t&&!e.el&&(e.el=t);const c=zt();if(e.el&&typeof e.el=="string"&&c.querySelectorAll(e.el).length>1){const g=[];return c.querySelectorAll(e.el).forEach(w=>{const A=ne({},e,{el:w});g.push(new Wt(A))}),g}const p=this;p.__swiper__=!0,p.support=No(),p.device=zo({userAgent:e.userAgent}),p.browser=$o(),p.eventsListeners={},p.eventsAnyListeners=[],p.modules=[...p.__modules__],e.modules&&Array.isArray(e.modules)&&p.modules.push(...e.modules);const m={};p.modules.forEach(g=>{g({params:e,swiper:p,extendParams:Jd(e,m),on:p.on.bind(p),once:p.once.bind(p),off:p.off.bind(p),emit:p.emit.bind(p)})});const M=ne({},cn,m);return p.params=ne({},M,Ai,e),p.originalParams=ne({},p.params),p.passedParams=ne({},e),p.params&&p.params.on&&Object.keys(p.params.on).forEach(g=>{p.on(g,p.params.on[g])}),p.params&&p.params.onAny&&p.onAny(p.params.onAny),Object.assign(p,{enabled:p.params.enabled,el:t,classNames:[],slides:[],slidesGrid:[],snapGrid:[],slidesSizesGrid:[],isHorizontal(){return p.params.direction==="horizontal"},isVertical(){return p.params.direction==="vertical"},activeIndex:0,realIndex:0,isBeginning:!0,isEnd:!1,translate:0,previousTranslate:0,progress:0,velocity:0,animating:!1,cssOverflowAdjustment(){return Math.trunc(this.translate/2**23)*2**23},allowSlideNext:p.params.allowSlideNext,allowSlidePrev:p.params.allowSlidePrev,touchEventsData:{isTouched:void 0,isMoved:void 0,allowTouchCallbacks:void 0,touchStartTime:void 0,isScrolling:void 0,currentTranslate:void 0,startTranslate:void 0,allowThresholdMove:void 0,focusableElements:p.params.focusableElements,lastClickTime:0,clickTimeout:void 0,velocities:[],allowMomentumBounce:void 0,startMoving:void 0,pointerId:null,touchId:null},allowClick:!0,allowTouchMove:p.params.allowTouchMove,touches:{startX:0,startY:0,currentX:0,currentY:0,diff:0},imagesToLoad:[],imagesLoaded:0}),p.emit("_swiper"),p.params.init&&p.init(),p}getDirectionLabel(t){return this.isHorizontal()?t:{width:"height","margin-top":"margin-left","margin-bottom ":"margin-right","margin-left":"margin-top","margin-right":"margin-bottom","padding-left":"padding-top","padding-right":"padding-bottom",marginRight:"marginBottom"}[t]}getSlideIndex(t){const{slidesEl:e,params:n}=this,s=Bt(e,`.${n.slideClass}, swiper-slide`),o=o1(s[0]);return o1(t)-o}getSlideIndexByData(t){return this.getSlideIndex(this.slides.find(e=>e.getAttribute("data-swiper-slide-index")*1===t))}getSlideIndexWhenGrid(t){return this.grid&&this.params.grid&&this.params.grid.rows>1&&(this.params.grid.fill==="column"?t=Math.floor(t/this.params.grid.rows):this.params.grid.fill==="row"&&(t=t%Math.ceil(this.slides.length/this.params.grid.rows))),t}recalcSlides(){const t=this,{slidesEl:e,params:n}=t;t.slides=Bt(e,`.${n.slideClass}, swiper-slide`)}enable(){const t=this;t.enabled||(t.enabled=!0,t.params.grabCursor&&t.setGrabCursor(),t.emit("enable"))}disable(){const t=this;t.enabled&&(t.enabled=!1,t.params.grabCursor&&t.unsetGrabCursor(),t.emit("disable"))}setProgress(t,e){const n=this;t=Math.min(Math.max(t,0),1);const s=n.minTranslate(),c=(n.maxTranslate()-s)*t+s;n.translateTo(c,typeof e>"u"?0:e),n.updateActiveIndex(),n.updateSlidesClasses()}emitContainerClasses(){const t=this;if(!t.params._emitClasses||!t.el)return;const e=t.el.className.split(" ").filter(n=>n.indexOf("swiper")===0||n.indexOf(t.params.containerModifierClass)===0);t.emit("_containerClasses",e.join(" "))}getSlideClasses(t){const e=this;return e.destroyed?"":t.className.split(" ").filter(n=>n.indexOf("swiper-slide")===0||n.indexOf(e.params.slideClass)===0).join(" ")}emitSlidesClasses(){const t=this;if(!t.params._emitClasses||!t.el)return;const e=[];t.slides.forEach(n=>{const s=t.getSlideClasses(n);e.push({slideEl:n,classNames:s}),t.emit("_slideClass",n,s)}),t.emit("_slideClasses",e)}slidesPerViewDynamic(t,e){t===void 0&&(t="current"),e===void 0&&(e=!1);const n=this,{params:s,slides:o,slidesGrid:c,slidesSizesGrid:p,size:m,activeIndex:M}=n;let g=1;if(typeof s.slidesPerView=="number")return s.slidesPerView;if(s.centeredSlides){let w=o[M]?Math.ceil(o[M].swiperSlideSize):0,A;for(let b=M+1;b<o.length;b+=1)o[b]&&!A&&(w+=Math.ceil(o[b].swiperSlideSize),g+=1,w>m&&(A=!0));for(let b=M-1;b>=0;b-=1)o[b]&&!A&&(w+=o[b].swiperSlideSize,g+=1,w>m&&(A=!0))}else if(t==="current")for(let w=M+1;w<o.length;w+=1)(e?c[w]+p[w]-c[M]<m:c[w]-c[M]<m)&&(g+=1);else for(let w=M-1;w>=0;w-=1)c[M]-c[w]<m&&(g+=1);return g}update(){const t=this;if(!t||t.destroyed)return;const{snapGrid:e,params:n}=t;n.breakpoints&&t.setBreakpoint(),[...t.el.querySelectorAll('[loading="lazy"]')].forEach(c=>{c.complete&&D1(t,c)}),t.updateSize(),t.updateSlides(),t.updateProgress(),t.updateSlidesClasses();function s(){const c=t.rtlTranslate?t.translate*-1:t.translate,p=Math.min(Math.max(c,t.maxTranslate()),t.minTranslate());t.setTranslate(p),t.updateActiveIndex(),t.updateSlidesClasses()}let o;if(n.freeMode&&n.freeMode.enabled&&!n.cssMode)s(),n.autoHeight&&t.updateAutoHeight();else{if((n.slidesPerView==="auto"||n.slidesPerView>1)&&t.isEnd&&!n.centeredSlides){const c=t.virtual&&n.virtual.enabled?t.virtual.slides:t.slides;o=t.slideTo(c.length-1,0,!1,!0)}else o=t.slideTo(t.activeIndex,0,!1,!0);o||s()}n.watchOverflow&&e!==t.snapGrid&&t.checkOverflow(),t.emit("update")}changeDirection(t,e){e===void 0&&(e=!0);const n=this,s=n.params.direction;return t||(t=s==="horizontal"?"vertical":"horizontal"),t===s||t!=="horizontal"&&t!=="vertical"||(n.el.classList.remove(`${n.params.containerModifierClass}${s}`),n.el.classList.add(`${n.params.containerModifierClass}${t}`),n.emitContainerClasses(),n.params.direction=t,n.slides.forEach(o=>{t==="vertical"?o.style.width="":o.style.height=""}),n.emit("changeDirection"),e&&n.update()),n}changeLanguageDirection(t){const e=this;e.rtl&&t==="rtl"||!e.rtl&&t==="ltr"||(e.rtl=t==="rtl",e.rtlTranslate=e.params.direction==="horizontal"&&e.rtl,e.rtl?(e.el.classList.add(`${e.params.containerModifierClass}rtl`),e.el.dir="rtl"):(e.el.classList.remove(`${e.params.containerModifierClass}rtl`),e.el.dir="ltr"),e.update())}mount(t){const e=this;if(e.mounted)return!0;let n=t||e.params.el;if(typeof n=="string"&&(n=document.querySelector(n)),!n)return!1;n.swiper=e,n.parentNode&&n.parentNode.host&&n.parentNode.host.nodeName===e.params.swiperElementNodeName.toUpperCase()&&(e.isElement=!0);const s=()=>`.${(e.params.wrapperClass||"").trim().split(" ").join(".")}`;let c=n&&n.shadowRoot&&n.shadowRoot.querySelector?n.shadowRoot.querySelector(s()):Bt(n,s())[0];return!c&&e.params.createElements&&(c=re("div",e.params.wrapperClass),n.append(c),Bt(n,`.${e.params.slideClass}`).forEach(p=>{c.append(p)})),Object.assign(e,{el:n,wrapperEl:c,slidesEl:e.isElement&&!n.parentNode.host.slideSlots?n.parentNode.host:c,hostEl:e.isElement?n.parentNode.host:n,mounted:!0,rtl:n.dir.toLowerCase()==="rtl"||Xe(n,"direction")==="rtl",rtlTranslate:e.params.direction==="horizontal"&&(n.dir.toLowerCase()==="rtl"||Xe(n,"direction")==="rtl"),wrongRTL:Xe(c,"display")==="-webkit-box"}),!0}init(t){const e=this;if(e.initialized||e.mount(t)===!1)return e;e.emit("beforeInit"),e.params.breakpoints&&e.setBreakpoint(),e.addClasses(),e.updateSize(),e.updateSlides(),e.params.watchOverflow&&e.checkOverflow(),e.params.grabCursor&&e.enabled&&e.setGrabCursor(),e.params.loop&&e.virtual&&e.params.virtual.enabled?e.slideTo(e.params.initialSlide+e.virtual.slidesBefore,0,e.params.runCallbacksOnInit,!1,!0):e.slideTo(e.params.initialSlide,0,e.params.runCallbacksOnInit,!1,!0),e.params.loop&&e.loopCreate(void 0,!0),e.attachEvents();const s=[...e.el.querySelectorAll('[loading="lazy"]')];return e.isElement&&s.push(...e.hostEl.querySelectorAll('[loading="lazy"]')),s.forEach(o=>{o.complete?D1(e,o):o.addEventListener("load",c=>{D1(e,c.target)})}),Yi(e),e.initialized=!0,Yi(e),e.emit("init"),e.emit("afterInit"),e}destroy(t,e){t===void 0&&(t=!0),e===void 0&&(e=!0);const n=this,{params:s,el:o,wrapperEl:c,slides:p}=n;return typeof n.params>"u"||n.destroyed||(n.emit("beforeDestroy"),n.initialized=!1,n.detachEvents(),s.loop&&n.loopDestroy(),e&&(n.removeClasses(),o&&typeof o!="string"&&o.removeAttribute("style"),c&&c.removeAttribute("style"),p&&p.length&&p.forEach(m=>{m.classList.remove(s.slideVisibleClass,s.slideFullyVisibleClass,s.slideActiveClass,s.slideNextClass,s.slidePrevClass),m.removeAttribute("style"),m.removeAttribute("data-swiper-slide-index")})),n.emit("destroy"),Object.keys(n.eventsListeners).forEach(m=>{n.off(m)}),t!==!1&&(n.el&&typeof n.el!="string"&&(n.el.swiper=null),zh(n)),n.destroyed=!0),null}static extendDefaults(t){ne(Ai,t)}static get extendedDefaults(){return Ai}static get defaults(){return cn}static installModule(t){Wt.prototype.__modules__||(Wt.prototype.__modules__=[]);const e=Wt.prototype.__modules__;typeof t=="function"&&e.indexOf(t)<0&&e.push(t)}static use(t){return Array.isArray(t)?(t.forEach(e=>Wt.installModule(e)),Wt):(Wt.installModule(t),Wt)}}Object.keys(Ci).forEach(a=>{Object.keys(Ci[a]).forEach(t=>{Wt.prototype[t]=Ci[a][t]})});Wt.use([Xh,Uh]);function tc(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;e({virtual:{enabled:!1,slides:[],cache:!0,renderSlide:null,renderExternal:null,renderExternalUpdate:!0,addSlidesBefore:0,addSlidesAfter:0}});let o;const c=zt();t.virtual={cache:{},from:void 0,to:void 0,slides:[],offset:0,slidesGrid:[]};const p=c.createElement("div");function m(u,f){const T=t.params.virtual;if(T.cache&&t.virtual.cache[f])return t.virtual.cache[f];let S;return T.renderSlide?(S=T.renderSlide.call(t,u,f),typeof S=="string"&&(Re(p,S),S=p.children[0])):t.isElement?S=re("swiper-slide"):S=re("div",t.params.slideClass),S.setAttribute("data-swiper-slide-index",f),T.renderSlide||Re(S,u),T.cache&&(t.virtual.cache[f]=S),S}function M(u,f,T){const{slidesPerView:S,slidesPerGroup:C,centeredSlides:E,loop:L,initialSlide:O}=t.params;if(f&&!L&&O>0)return;const{addSlidesBefore:q,addSlidesAfter:l}=t.params.virtual,{from:W,to:k,slides:z,slidesGrid:G,offset:j}=t.virtual;t.params.cssMode||t.updateActiveIndex();const I=typeof T>"u"?t.activeIndex||0:T;let X;t.rtlTranslate?X="right":X=t.isHorizontal()?"left":"top";let J,Q;E?(J=Math.floor(S/2)+C+l,Q=Math.floor(S/2)+C+q):(J=S+(C-1)+l,Q=(L?S:C)+q);let N=I-Q,B=I+J;L||(N=Math.max(N,0),B=Math.min(B,z.length-1));let at=(t.slidesGrid[N]||0)-(t.slidesGrid[0]||0);L&&I>=Q?(N-=Q,E||(at+=t.slidesGrid[0])):L&&I<Q&&(N=-Q,E&&(at+=t.slidesGrid[0])),Object.assign(t.virtual,{from:N,to:B,offset:at,slidesGrid:t.slidesGrid,slidesBefore:Q,slidesAfter:J});function pt(){t.updateSlides(),t.updateProgress(),t.updateSlidesClasses(),s("virtualUpdate")}if(W===N&&k===B&&!u){t.slidesGrid!==G&&at!==j&&t.slides.forEach(K=>{K.style[X]=`${at-Math.abs(t.cssOverflowAdjustment())}px`}),t.updateProgress(),s("virtualUpdate");return}if(t.params.virtual.renderExternal){t.params.virtual.renderExternal.call(t,{offset:at,from:N,to:B,slides:function(){const nt=[];for(let mt=N;mt<=B;mt+=1)nt.push(z[mt]);return nt}()}),t.params.virtual.renderExternalUpdate?pt():s("virtualUpdate");return}const St=[],At=[],Ot=K=>{let nt=K;return K<0?nt=z.length+K:nt>=z.length&&(nt=nt-z.length),nt};if(u)t.slides.filter(K=>K.matches(`.${t.params.slideClass}, swiper-slide`)).forEach(K=>{K.remove()});else for(let K=W;K<=k;K+=1)if(K<N||K>B){const nt=Ot(K);t.slides.filter(mt=>mt.matches(`.${t.params.slideClass}[data-swiper-slide-index="${nt}"], swiper-slide[data-swiper-slide-index="${nt}"]`)).forEach(mt=>{mt.remove()})}const jt=L?-z.length:0,tt=L?z.length*2:z.length;for(let K=jt;K<tt;K+=1)if(K>=N&&K<=B){const nt=Ot(K);typeof k>"u"||u?At.push(nt):(K>k&&At.push(nt),K<W&&St.push(nt))}if(At.forEach(K=>{t.slidesEl.append(m(z[K],K))}),L)for(let K=St.length-1;K>=0;K-=1){const nt=St[K];t.slidesEl.prepend(m(z[nt],nt))}else St.sort((K,nt)=>nt-K),St.forEach(K=>{t.slidesEl.prepend(m(z[K],K))});Bt(t.slidesEl,".swiper-slide, swiper-slide").forEach(K=>{K.style[X]=`${at-Math.abs(t.cssOverflowAdjustment())}px`}),pt()}function g(u){if(typeof u=="object"&&"length"in u)for(let f=0;f<u.length;f+=1)u[f]&&t.virtual.slides.push(u[f]);else t.virtual.slides.push(u);M(!0)}function w(u){const f=t.activeIndex;let T=f+1,S=1;if(Array.isArray(u)){for(let C=0;C<u.length;C+=1)u[C]&&t.virtual.slides.unshift(u[C]);T=f+u.length,S=u.length}else t.virtual.slides.unshift(u);if(t.params.virtual.cache){const C=t.virtual.cache,E={};Object.keys(C).forEach(L=>{const O=C[L],q=O.getAttribute("data-swiper-slide-index");q&&O.setAttribute("data-swiper-slide-index",parseInt(q,10)+S),E[parseInt(L,10)+S]=O}),t.virtual.cache=E}M(!0),t.slideTo(T,0)}function A(u){if(typeof u>"u"||u===null)return;let f=t.activeIndex;if(Array.isArray(u))for(let T=u.length-1;T>=0;T-=1)t.params.virtual.cache&&(delete t.virtual.cache[u[T]],Object.keys(t.virtual.cache).forEach(S=>{S>u&&(t.virtual.cache[S-1]=t.virtual.cache[S],t.virtual.cache[S-1].setAttribute("data-swiper-slide-index",S-1),delete t.virtual.cache[S])})),t.virtual.slides.splice(u[T],1),u[T]<f&&(f-=1),f=Math.max(f,0);else t.params.virtual.cache&&(delete t.virtual.cache[u],Object.keys(t.virtual.cache).forEach(T=>{T>u&&(t.virtual.cache[T-1]=t.virtual.cache[T],t.virtual.cache[T-1].setAttribute("data-swiper-slide-index",T-1),delete t.virtual.cache[T])})),t.virtual.slides.splice(u,1),u<f&&(f-=1),f=Math.max(f,0);M(!0),t.slideTo(f,0)}function b(){t.virtual.slides=[],t.params.virtual.cache&&(t.virtual.cache={}),M(!0),t.slideTo(0,0)}n("beforeInit",()=>{if(!t.params.virtual.enabled)return;let u;if(typeof t.passedParams.virtual.slides>"u"){const f=[...t.slidesEl.children].filter(T=>T.matches(`.${t.params.slideClass}, swiper-slide`));f&&f.length&&(t.virtual.slides=[...f],u=!0,f.forEach((T,S)=>{T.setAttribute("data-swiper-slide-index",S),t.virtual.cache[S]=T,T.remove()}))}u||(t.virtual.slides=t.params.virtual.slides),t.classNames.push(`${t.params.containerModifierClass}virtual`),t.params.watchSlidesProgress=!0,t.originalParams.watchSlidesProgress=!0,M(!1,!0)}),n("setTranslate",()=>{t.params.virtual.enabled&&(t.params.cssMode&&!t._immediateVirtual?(clearTimeout(o),o=setTimeout(()=>{M()},100)):M())}),n("init update resize",()=>{t.params.virtual.enabled&&t.params.cssMode&&i1(t.wrapperEl,"--swiper-virtual-size",`${t.virtualSize}px`)}),Object.assign(t.virtual,{appendSlide:g,prependSlide:w,removeSlide:A,removeAllSlides:b,update:M})}function ec(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o=zt(),c=_t();t.keyboard={enabled:!1},e({keyboard:{enabled:!1,onlyInViewport:!0,pageUpDown:!0}});function p(g){if(!t.enabled)return;const{rtlTranslate:w}=t;let A=g;A.originalEvent&&(A=A.originalEvent);const b=A.keyCode||A.charCode,u=t.params.keyboard.pageUpDown,f=u&&b===33,T=u&&b===34,S=b===37,C=b===39,E=b===38,L=b===40;if(!t.allowSlideNext&&(t.isHorizontal()&&C||t.isVertical()&&L||T)||!t.allowSlidePrev&&(t.isHorizontal()&&S||t.isVertical()&&E||f))return!1;if(!(A.shiftKey||A.altKey||A.ctrlKey||A.metaKey)&&!(o.activeElement&&(o.activeElement.isContentEditable||o.activeElement.nodeName&&(o.activeElement.nodeName.toLowerCase()==="input"||o.activeElement.nodeName.toLowerCase()==="textarea")))){if(t.params.keyboard.onlyInViewport&&(f||T||S||C||E||L)){let O=!1;if(ca(t.el,`.${t.params.slideClass}, swiper-slide`).length>0&&ca(t.el,`.${t.params.slideActiveClass}`).length===0)return;const q=t.el,l=q.clientWidth,W=q.clientHeight,k=c.innerWidth,z=c.innerHeight,G=z1(q);w&&(G.left-=q.scrollLeft);const j=[[G.left,G.top],[G.left+l,G.top],[G.left,G.top+W],[G.left+l,G.top+W]];for(let I=0;I<j.length;I+=1){const X=j[I];if(X[0]>=0&&X[0]<=k&&X[1]>=0&&X[1]<=z){if(X[0]===0&&X[1]===0)continue;O=!0}}if(!O)return}t.isHorizontal()?((f||T||S||C)&&(A.preventDefault?A.preventDefault():A.returnValue=!1),((T||C)&&!w||(f||S)&&w)&&t.slideNext(),((f||S)&&!w||(T||C)&&w)&&t.slidePrev()):((f||T||E||L)&&(A.preventDefault?A.preventDefault():A.returnValue=!1),(T||L)&&t.slideNext(),(f||E)&&t.slidePrev()),s("keyPress",b)}}function m(){t.keyboard.enabled||(o.addEventListener("keydown",p),t.keyboard.enabled=!0)}function M(){t.keyboard.enabled&&(o.removeEventListener("keydown",p),t.keyboard.enabled=!1)}n("init",()=>{t.params.keyboard.enabled&&m()}),n("destroy",()=>{t.keyboard.enabled&&M()}),Object.assign(t.keyboard,{enable:m,disable:M})}function ac(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o=_t();e({mousewheel:{enabled:!1,releaseOnEdges:!1,invert:!1,forceToAxis:!1,sensitivity:1,eventsTarget:"container",thresholdDelta:null,thresholdTime:null,noMousewheelClass:"swiper-no-mousewheel"}}),t.mousewheel={enabled:!1};let c,p=Me(),m;const M=[];function g(E){let l=0,W=0,k=0,z=0;return"detail"in E&&(W=E.detail),"wheelDelta"in E&&(W=-E.wheelDelta/120),"wheelDeltaY"in E&&(W=-E.wheelDeltaY/120),"wheelDeltaX"in E&&(l=-E.wheelDeltaX/120),"axis"in E&&E.axis===E.HORIZONTAL_AXIS&&(l=W,W=0),k=l*10,z=W*10,"deltaY"in E&&(z=E.deltaY),"deltaX"in E&&(k=E.deltaX),E.shiftKey&&!k&&(k=z,z=0),(k||z)&&E.deltaMode&&(E.deltaMode===1?(k*=40,z*=40):(k*=800,z*=800)),k&&!l&&(l=k<1?-1:1),z&&!W&&(W=z<1?-1:1),{spinX:l,spinY:W,pixelX:k,pixelY:z}}function w(){t.enabled&&(t.mouseEntered=!0)}function A(){t.enabled&&(t.mouseEntered=!1)}function b(E){return t.params.mousewheel.thresholdDelta&&E.delta<t.params.mousewheel.thresholdDelta||t.params.mousewheel.thresholdTime&&Me()-p<t.params.mousewheel.thresholdTime?!1:E.delta>=6&&Me()-p<60?!0:(E.direction<0?(!t.isEnd||t.params.loop)&&!t.animating&&(t.slideNext(),s("scroll",E.raw)):(!t.isBeginning||t.params.loop)&&!t.animating&&(t.slidePrev(),s("scroll",E.raw)),p=new o.Date().getTime(),!1)}function u(E){const L=t.params.mousewheel;if(E.direction<0){if(t.isEnd&&!t.params.loop&&L.releaseOnEdges)return!0}else if(t.isBeginning&&!t.params.loop&&L.releaseOnEdges)return!0;return!1}function f(E){let L=E,O=!0;if(!t.enabled||E.target.closest(`.${t.params.mousewheel.noMousewheelClass}`))return;const q=t.params.mousewheel;t.params.cssMode&&L.preventDefault();let l=t.el;t.params.mousewheel.eventsTarget!=="container"&&(l=document.querySelector(t.params.mousewheel.eventsTarget));const W=l&&l.contains(L.target);if(!t.mouseEntered&&!W&&!q.releaseOnEdges)return!0;L.originalEvent&&(L=L.originalEvent);let k=0;const z=t.rtlTranslate?-1:1,G=g(L);if(q.forceToAxis)if(t.isHorizontal())if(Math.abs(G.pixelX)>Math.abs(G.pixelY))k=-G.pixelX*z;else return!0;else if(Math.abs(G.pixelY)>Math.abs(G.pixelX))k=-G.pixelY;else return!0;else k=Math.abs(G.pixelX)>Math.abs(G.pixelY)?-G.pixelX*z:-G.pixelY;if(k===0)return!0;q.invert&&(k=-k);let j=t.getTranslate()+k*q.sensitivity;if(j>=t.minTranslate()&&(j=t.minTranslate()),j<=t.maxTranslate()&&(j=t.maxTranslate()),O=t.params.loop?!0:!(j===t.minTranslate()||j===t.maxTranslate()),O&&t.params.nested&&L.stopPropagation(),!t.params.freeMode||!t.params.freeMode.enabled){const I={time:Me(),delta:Math.abs(k),direction:Math.sign(k),raw:E};M.length>=2&&M.shift();const X=M.length?M[M.length-1]:void 0;if(M.push(I),X?(I.direction!==X.direction||I.delta>X.delta||I.time>X.time+150)&&b(I):b(I),u(I))return!0}else{const I={time:Me(),delta:Math.abs(k),direction:Math.sign(k)},X=m&&I.time<m.time+500&&I.delta<=m.delta&&I.direction===m.direction;if(!X){m=void 0;let J=t.getTranslate()+k*q.sensitivity;const Q=t.isBeginning,N=t.isEnd;if(J>=t.minTranslate()&&(J=t.minTranslate()),J<=t.maxTranslate()&&(J=t.maxTranslate()),t.setTransition(0),t.setTranslate(J),t.updateProgress(),t.updateActiveIndex(),t.updateSlidesClasses(),(!Q&&t.isBeginning||!N&&t.isEnd)&&t.updateSlidesClasses(),t.params.loop&&t.loopFix({direction:I.direction<0?"next":"prev",byMousewheel:!0}),t.params.freeMode.sticky){clearTimeout(c),c=void 0,M.length>=15&&M.shift();const B=M.length?M[M.length-1]:void 0,at=M[0];if(M.push(I),B&&(I.delta>B.delta||I.direction!==B.direction))M.splice(0);else if(M.length>=15&&I.time-at.time<500&&at.delta-I.delta>=1&&I.delta<=6){const pt=k>0?.8:.2;m=I,M.splice(0),c=Pa(()=>{t.destroyed||!t.params||t.slideToClosest(t.params.speed,!0,void 0,pt)},0)}c||(c=Pa(()=>{if(t.destroyed||!t.params)return;const pt=.5;m=I,M.splice(0),t.slideToClosest(t.params.speed,!0,void 0,pt)},500))}if(X||s("scroll",L),t.params.autoplay&&t.params.autoplay.disableOnInteraction&&t.autoplay.stop(),q.releaseOnEdges&&(J===t.minTranslate()||J===t.maxTranslate()))return!0}}return L.preventDefault?L.preventDefault():L.returnValue=!1,!1}function T(E){let L=t.el;t.params.mousewheel.eventsTarget!=="container"&&(L=document.querySelector(t.params.mousewheel.eventsTarget)),L[E]("mouseenter",w),L[E]("mouseleave",A),L[E]("wheel",f)}function S(){return t.params.cssMode?(t.wrapperEl.removeEventListener("wheel",f),!0):t.mousewheel.enabled?!1:(T("addEventListener"),t.mousewheel.enabled=!0,!0)}function C(){return t.params.cssMode?(t.wrapperEl.addEventListener(event,f),!0):t.mousewheel.enabled?(T("removeEventListener"),t.mousewheel.enabled=!1,!0):!1}n("init",()=>{!t.params.mousewheel.enabled&&t.params.cssMode&&C(),t.params.mousewheel.enabled&&S()}),n("destroy",()=>{t.params.cssMode&&S(),t.mousewheel.enabled&&C()}),Object.assign(t.mousewheel,{enable:S,disable:C})}function r2(a,t,e,n){return a.params.createElements&&Object.keys(n).forEach(s=>{if(!e[s]&&e.auto===!0){let o=Bt(a.el,`.${n[s]}`)[0];o||(o=re("div",n[s]),o.className=n[s],a.el.append(o)),e[s]=o,t[s]=o}}),e}function ic(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;e({navigation:{nextEl:null,prevEl:null,hideOnClick:!1,disabledClass:"swiper-button-disabled",hiddenClass:"swiper-button-hidden",lockClass:"swiper-button-lock",navigationDisabledClass:"swiper-navigation-disabled"}}),t.navigation={nextEl:null,prevEl:null};function o(u){let f;return u&&typeof u=="string"&&t.isElement&&(f=t.el.querySelector(u)||t.hostEl.querySelector(u),f)?f:(u&&(typeof u=="string"&&(f=[...document.querySelectorAll(u)]),t.params.uniqueNavElements&&typeof u=="string"&&f&&f.length>1&&t.el.querySelectorAll(u).length===1?f=t.el.querySelector(u):f&&f.length===1&&(f=f[0])),u&&!f?u:f)}function c(u,f){const T=t.params.navigation;u=xt(u),u.forEach(S=>{S&&(S.classList[f?"add":"remove"](...T.disabledClass.split(" ")),S.tagName==="BUTTON"&&(S.disabled=f),t.params.watchOverflow&&t.enabled&&S.classList[t.isLocked?"add":"remove"](T.lockClass))})}function p(){const{nextEl:u,prevEl:f}=t.navigation;if(t.params.loop){c(f,!1),c(u,!1);return}c(f,t.isBeginning&&!t.params.rewind),c(u,t.isEnd&&!t.params.rewind)}function m(u){u.preventDefault(),!(t.isBeginning&&!t.params.loop&&!t.params.rewind)&&(t.slidePrev(),s("navigationPrev"))}function M(u){u.preventDefault(),!(t.isEnd&&!t.params.loop&&!t.params.rewind)&&(t.slideNext(),s("navigationNext"))}function g(){const u=t.params.navigation;if(t.params.navigation=r2(t,t.originalParams.navigation,t.params.navigation,{nextEl:"swiper-button-next",prevEl:"swiper-button-prev"}),!(u.nextEl||u.prevEl))return;let f=o(u.nextEl),T=o(u.prevEl);Object.assign(t.navigation,{nextEl:f,prevEl:T}),f=xt(f),T=xt(T);const S=(C,E)=>{C&&C.addEventListener("click",E==="next"?M:m),!t.enabled&&C&&C.classList.add(...u.lockClass.split(" "))};f.forEach(C=>S(C,"next")),T.forEach(C=>S(C,"prev"))}function w(){let{nextEl:u,prevEl:f}=t.navigation;u=xt(u),f=xt(f);const T=(S,C)=>{S.removeEventListener("click",C==="next"?M:m),S.classList.remove(...t.params.navigation.disabledClass.split(" "))};u.forEach(S=>T(S,"next")),f.forEach(S=>T(S,"prev"))}n("init",()=>{t.params.navigation.enabled===!1?b():(g(),p())}),n("toEdge fromEdge lock unlock",()=>{p()}),n("destroy",()=>{w()}),n("enable disable",()=>{let{nextEl:u,prevEl:f}=t.navigation;if(u=xt(u),f=xt(f),t.enabled){p();return}[...u,...f].filter(T=>!!T).forEach(T=>T.classList.add(t.params.navigation.lockClass))}),n("click",(u,f)=>{let{nextEl:T,prevEl:S}=t.navigation;T=xt(T),S=xt(S);const C=f.target;let E=S.includes(C)||T.includes(C);if(t.isElement&&!E){const L=f.path||f.composedPath&&f.composedPath();L&&(E=L.find(O=>T.includes(O)||S.includes(O)))}if(t.params.navigation.hideOnClick&&!E){if(t.pagination&&t.params.pagination&&t.params.pagination.clickable&&(t.pagination.el===C||t.pagination.el.contains(C)))return;let L;T.length?L=T[0].classList.contains(t.params.navigation.hiddenClass):S.length&&(L=S[0].classList.contains(t.params.navigation.hiddenClass)),s(L===!0?"navigationShow":"navigationHide"),[...T,...S].filter(O=>!!O).forEach(O=>O.classList.toggle(t.params.navigation.hiddenClass))}});const A=()=>{t.el.classList.remove(...t.params.navigation.navigationDisabledClass.split(" ")),g(),p()},b=()=>{t.el.classList.add(...t.params.navigation.navigationDisabledClass.split(" ")),w()};Object.assign(t.navigation,{enable:A,disable:b,update:p,init:g,destroy:w})}function Ne(a){return a===void 0&&(a=""),`.${a.trim().replace(/([\.:!+\/()[\]])/g,"\\$1").replace(/ /g,".")}`}function nc(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o="swiper-pagination";e({pagination:{el:null,bulletElement:"span",clickable:!1,hideOnClick:!1,renderBullet:null,renderProgressbar:null,renderFraction:null,renderCustom:null,progressbarOpposite:!1,type:"bullets",dynamicBullets:!1,dynamicMainBullets:1,formatFractionCurrent:C=>C,formatFractionTotal:C=>C,bulletClass:`${o}-bullet`,bulletActiveClass:`${o}-bullet-active`,modifierClass:`${o}-`,currentClass:`${o}-current`,totalClass:`${o}-total`,hiddenClass:`${o}-hidden`,progressbarFillClass:`${o}-progressbar-fill`,progressbarOppositeClass:`${o}-progressbar-opposite`,clickableClass:`${o}-clickable`,lockClass:`${o}-lock`,horizontalClass:`${o}-horizontal`,verticalClass:`${o}-vertical`,paginationDisabledClass:`${o}-disabled`}}),t.pagination={el:null,bullets:[]};let c,p=0;function m(){return!t.params.pagination.el||!t.pagination.el||Array.isArray(t.pagination.el)&&t.pagination.el.length===0}function M(C,E){const{bulletActiveClass:L}=t.params.pagination;C&&(C=C[`${E==="prev"?"previous":"next"}ElementSibling`],C&&(C.classList.add(`${L}-${E}`),C=C[`${E==="prev"?"previous":"next"}ElementSibling`],C&&C.classList.add(`${L}-${E}-${E}`)))}function g(C,E,L){if(C=C%L,E=E%L,E===C+1)return"next";if(E===C-1)return"previous"}function w(C){const E=C.target.closest(Ne(t.params.pagination.bulletClass));if(!E)return;C.preventDefault();const L=o1(E)*t.params.slidesPerGroup;if(t.params.loop){if(t.realIndex===L)return;const O=g(t.realIndex,L,t.slides.length);O==="next"?t.slideNext():O==="previous"?t.slidePrev():t.slideToLoop(L)}else t.slideTo(L)}function A(){const C=t.rtl,E=t.params.pagination;if(m())return;let L=t.pagination.el;L=xt(L);let O,q;const l=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:t.slides.length,W=t.params.loop?Math.ceil(l/t.params.slidesPerGroup):t.snapGrid.length;if(t.params.loop?(q=t.previousRealIndex||0,O=t.params.slidesPerGroup>1?Math.floor(t.realIndex/t.params.slidesPerGroup):t.realIndex):typeof t.snapIndex<"u"?(O=t.snapIndex,q=t.previousSnapIndex):(q=t.previousIndex||0,O=t.activeIndex||0),E.type==="bullets"&&t.pagination.bullets&&t.pagination.bullets.length>0){const k=t.pagination.bullets;let z,G,j;if(E.dynamicBullets&&(c=Ui(k[0],t.isHorizontal()?"width":"height"),L.forEach(I=>{I.style[t.isHorizontal()?"width":"height"]=`${c*(E.dynamicMainBullets+4)}px`}),E.dynamicMainBullets>1&&q!==void 0&&(p+=O-(q||0),p>E.dynamicMainBullets-1?p=E.dynamicMainBullets-1:p<0&&(p=0)),z=Math.max(O-p,0),G=z+(Math.min(k.length,E.dynamicMainBullets)-1),j=(G+z)/2),k.forEach(I=>{const X=[...["","-next","-next-next","-prev","-prev-prev","-main"].map(J=>`${E.bulletActiveClass}${J}`)].map(J=>typeof J=="string"&&J.includes(" ")?J.split(" "):J).flat();I.classList.remove(...X)}),L.length>1)k.forEach(I=>{const X=o1(I);X===O?I.classList.add(...E.bulletActiveClass.split(" ")):t.isElement&&I.setAttribute("part","bullet"),E.dynamicBullets&&(X>=z&&X<=G&&I.classList.add(...`${E.bulletActiveClass}-main`.split(" ")),X===z&&M(I,"prev"),X===G&&M(I,"next"))});else{const I=k[O];if(I&&I.classList.add(...E.bulletActiveClass.split(" ")),t.isElement&&k.forEach((X,J)=>{X.setAttribute("part",J===O?"bullet-active":"bullet")}),E.dynamicBullets){const X=k[z],J=k[G];for(let Q=z;Q<=G;Q+=1)k[Q]&&k[Q].classList.add(...`${E.bulletActiveClass}-main`.split(" "));M(X,"prev"),M(J,"next")}}if(E.dynamicBullets){const I=Math.min(k.length,E.dynamicMainBullets+4),X=(c*I-c)/2-j*c,J=C?"right":"left";k.forEach(Q=>{Q.style[t.isHorizontal()?J:"top"]=`${X}px`})}}L.forEach((k,z)=>{if(E.type==="fraction"&&(k.querySelectorAll(Ne(E.currentClass)).forEach(G=>{G.textContent=E.formatFractionCurrent(O+1)}),k.querySelectorAll(Ne(E.totalClass)).forEach(G=>{G.textContent=E.formatFractionTotal(W)})),E.type==="progressbar"){let G;E.progressbarOpposite?G=t.isHorizontal()?"vertical":"horizontal":G=t.isHorizontal()?"horizontal":"vertical";const j=(O+1)/W;let I=1,X=1;G==="horizontal"?I=j:X=j,k.querySelectorAll(Ne(E.progressbarFillClass)).forEach(J=>{J.style.transform=`translate3d(0,0,0) scaleX(${I}) scaleY(${X})`,J.style.transitionDuration=`${t.params.speed}ms`})}E.type==="custom"&&E.renderCustom?(Re(k,E.renderCustom(t,O+1,W)),z===0&&s("paginationRender",k)):(z===0&&s("paginationRender",k),s("paginationUpdate",k)),t.params.watchOverflow&&t.enabled&&k.classList[t.isLocked?"add":"remove"](E.lockClass)})}function b(){const C=t.params.pagination;if(m())return;const E=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:t.grid&&t.params.grid.rows>1?t.slides.length/Math.ceil(t.params.grid.rows):t.slides.length;let L=t.pagination.el;L=xt(L);let O="";if(C.type==="bullets"){let q=t.params.loop?Math.ceil(E/t.params.slidesPerGroup):t.snapGrid.length;t.params.freeMode&&t.params.freeMode.enabled&&q>E&&(q=E);for(let l=0;l<q;l+=1)C.renderBullet?O+=C.renderBullet.call(t,l,C.bulletClass):O+=`<${C.bulletElement} ${t.isElement?'part="bullet"':""} class="${C.bulletClass}"></${C.bulletElement}>`}C.type==="fraction"&&(C.renderFraction?O=C.renderFraction.call(t,C.currentClass,C.totalClass):O=`<span class="${C.currentClass}"></span> / <span class="${C.totalClass}"></span>`),C.type==="progressbar"&&(C.renderProgressbar?O=C.renderProgressbar.call(t,C.progressbarFillClass):O=`<span class="${C.progressbarFillClass}"></span>`),t.pagination.bullets=[],L.forEach(q=>{C.type!=="custom"&&Re(q,O||""),C.type==="bullets"&&t.pagination.bullets.push(...q.querySelectorAll(Ne(C.bulletClass)))}),C.type!=="custom"&&s("paginationRender",L[0])}function u(){t.params.pagination=r2(t,t.originalParams.pagination,t.params.pagination,{el:"swiper-pagination"});const C=t.params.pagination;if(!C.el)return;let E;typeof C.el=="string"&&t.isElement&&(E=t.el.querySelector(C.el)),!E&&typeof C.el=="string"&&(E=[...document.querySelectorAll(C.el)]),E||(E=C.el),!(!E||E.length===0)&&(t.params.uniqueNavElements&&typeof C.el=="string"&&Array.isArray(E)&&E.length>1&&(E=[...t.el.querySelectorAll(C.el)],E.length>1&&(E=E.find(L=>ca(L,".swiper")[0]===t.el))),Array.isArray(E)&&E.length===1&&(E=E[0]),Object.assign(t.pagination,{el:E}),E=xt(E),E.forEach(L=>{C.type==="bullets"&&C.clickable&&L.classList.add(...(C.clickableClass||"").split(" ")),L.classList.add(C.modifierClass+C.type),L.classList.add(t.isHorizontal()?C.horizontalClass:C.verticalClass),C.type==="bullets"&&C.dynamicBullets&&(L.classList.add(`${C.modifierClass}${C.type}-dynamic`),p=0,C.dynamicMainBullets<1&&(C.dynamicMainBullets=1)),C.type==="progressbar"&&C.progressbarOpposite&&L.classList.add(C.progressbarOppositeClass),C.clickable&&L.addEventListener("click",w),t.enabled||L.classList.add(C.lockClass)}))}function f(){const C=t.params.pagination;if(m())return;let E=t.pagination.el;E&&(E=xt(E),E.forEach(L=>{L.classList.remove(C.hiddenClass),L.classList.remove(C.modifierClass+C.type),L.classList.remove(t.isHorizontal()?C.horizontalClass:C.verticalClass),C.clickable&&(L.classList.remove(...(C.clickableClass||"").split(" ")),L.removeEventListener("click",w))})),t.pagination.bullets&&t.pagination.bullets.forEach(L=>L.classList.remove(...C.bulletActiveClass.split(" ")))}n("changeDirection",()=>{if(!t.pagination||!t.pagination.el)return;const C=t.params.pagination;let{el:E}=t.pagination;E=xt(E),E.forEach(L=>{L.classList.remove(C.horizontalClass,C.verticalClass),L.classList.add(t.isHorizontal()?C.horizontalClass:C.verticalClass)})}),n("init",()=>{t.params.pagination.enabled===!1?S():(u(),b(),A())}),n("activeIndexChange",()=>{typeof t.snapIndex>"u"&&A()}),n("snapIndexChange",()=>{A()}),n("snapGridLengthChange",()=>{b(),A()}),n("destroy",()=>{f()}),n("enable disable",()=>{let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList[t.enabled?"remove":"add"](t.params.pagination.lockClass)))}),n("lock unlock",()=>{A()}),n("click",(C,E)=>{const L=E.target,O=xt(t.pagination.el);if(t.params.pagination.el&&t.params.pagination.hideOnClick&&O&&O.length>0&&!L.classList.contains(t.params.pagination.bulletClass)){if(t.navigation&&(t.navigation.nextEl&&L===t.navigation.nextEl||t.navigation.prevEl&&L===t.navigation.prevEl))return;const q=O[0].classList.contains(t.params.pagination.hiddenClass);s(q===!0?"paginationShow":"paginationHide"),O.forEach(l=>l.classList.toggle(t.params.pagination.hiddenClass))}});const T=()=>{t.el.classList.remove(t.params.pagination.paginationDisabledClass);let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList.remove(t.params.pagination.paginationDisabledClass))),u(),b(),A()},S=()=>{t.el.classList.add(t.params.pagination.paginationDisabledClass);let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList.add(t.params.pagination.paginationDisabledClass))),f()};Object.assign(t.pagination,{enable:T,disable:S,render:b,update:A,init:u,destroy:f})}function rc(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o=zt();let c=!1,p=null,m=null,M,g,w,A;e({scrollbar:{el:null,dragSize:"auto",hide:!1,draggable:!1,snapOnRelease:!0,lockClass:"swiper-scrollbar-lock",dragClass:"swiper-scrollbar-drag",scrollbarDisabledClass:"swiper-scrollbar-disabled",horizontalClass:"swiper-scrollbar-horizontal",verticalClass:"swiper-scrollbar-vertical"}}),t.scrollbar={el:null,dragEl:null};function b(){if(!t.params.scrollbar.el||!t.scrollbar.el)return;const{scrollbar:j,rtlTranslate:I}=t,{dragEl:X,el:J}=j,Q=t.params.scrollbar,N=t.params.loop?t.progressLoop:t.progress;let B=g,at=(w-g)*N;I?(at=-at,at>0?(B=g-at,at=0):-at+g>w&&(B=w+at)):at<0?(B=g+at,at=0):at+g>w&&(B=w-at),t.isHorizontal()?(X.style.transform=`translate3d(${at}px, 0, 0)`,X.style.width=`${B}px`):(X.style.transform=`translate3d(0px, ${at}px, 0)`,X.style.height=`${B}px`),Q.hide&&(clearTimeout(p),J.style.opacity=1,p=setTimeout(()=>{J.style.opacity=0,J.style.transitionDuration="400ms"},1e3))}function u(j){!t.params.scrollbar.el||!t.scrollbar.el||(t.scrollbar.dragEl.style.transitionDuration=`${j}ms`)}function f(){if(!t.params.scrollbar.el||!t.scrollbar.el)return;const{scrollbar:j}=t,{dragEl:I,el:X}=j;I.style.width="",I.style.height="",w=t.isHorizontal()?X.offsetWidth:X.offsetHeight,A=t.size/(t.virtualSize+t.params.slidesOffsetBefore-(t.params.centeredSlides?t.snapGrid[0]:0)),t.params.scrollbar.dragSize==="auto"?g=w*A:g=parseInt(t.params.scrollbar.dragSize,10),t.isHorizontal()?I.style.width=`${g}px`:I.style.height=`${g}px`,A>=1?X.style.display="none":X.style.display="",t.params.scrollbar.hide&&(X.style.opacity=0),t.params.watchOverflow&&t.enabled&&j.el.classList[t.isLocked?"add":"remove"](t.params.scrollbar.lockClass)}function T(j){return t.isHorizontal()?j.clientX:j.clientY}function S(j){const{scrollbar:I,rtlTranslate:X}=t,{el:J}=I;let Q;Q=(T(j)-z1(J)[t.isHorizontal()?"left":"top"]-(M!==null?M:g/2))/(w-g),Q=Math.max(Math.min(Q,1),0),X&&(Q=1-Q);const N=t.minTranslate()+(t.maxTranslate()-t.minTranslate())*Q;t.updateProgress(N),t.setTranslate(N),t.updateActiveIndex(),t.updateSlidesClasses()}function C(j){const I=t.params.scrollbar,{scrollbar:X,wrapperEl:J}=t,{el:Q,dragEl:N}=X;c=!0,M=j.target===N?T(j)-j.target.getBoundingClientRect()[t.isHorizontal()?"left":"top"]:null,j.preventDefault(),j.stopPropagation(),J.style.transitionDuration="100ms",N.style.transitionDuration="100ms",S(j),clearTimeout(m),Q.style.transitionDuration="0ms",I.hide&&(Q.style.opacity=1),t.params.cssMode&&(t.wrapperEl.style["scroll-snap-type"]="none"),s("scrollbarDragStart",j)}function E(j){const{scrollbar:I,wrapperEl:X}=t,{el:J,dragEl:Q}=I;c&&(j.preventDefault&&j.cancelable?j.preventDefault():j.returnValue=!1,S(j),X.style.transitionDuration="0ms",J.style.transitionDuration="0ms",Q.style.transitionDuration="0ms",s("scrollbarDragMove",j))}function L(j){const I=t.params.scrollbar,{scrollbar:X,wrapperEl:J}=t,{el:Q}=X;c&&(c=!1,t.params.cssMode&&(t.wrapperEl.style["scroll-snap-type"]="",J.style.transitionDuration=""),I.hide&&(clearTimeout(m),m=Pa(()=>{Q.style.opacity=0,Q.style.transitionDuration="400ms"},1e3)),s("scrollbarDragEnd",j),I.snapOnRelease&&t.slideToClosest())}function O(j){const{scrollbar:I,params:X}=t,J=I.el;if(!J)return;const Q=J,N=X.passiveListeners?{passive:!1,capture:!1}:!1,B=X.passiveListeners?{passive:!0,capture:!1}:!1;if(!Q)return;const at=j==="on"?"addEventListener":"removeEventListener";Q[at]("pointerdown",C,N),o[at]("pointermove",E,N),o[at]("pointerup",L,B)}function q(){!t.params.scrollbar.el||!t.scrollbar.el||O("on")}function l(){!t.params.scrollbar.el||!t.scrollbar.el||O("off")}function W(){const{scrollbar:j,el:I}=t;t.params.scrollbar=r2(t,t.originalParams.scrollbar,t.params.scrollbar,{el:"swiper-scrollbar"});const X=t.params.scrollbar;if(!X.el)return;let J;if(typeof X.el=="string"&&t.isElement&&(J=t.el.querySelector(X.el)),!J&&typeof X.el=="string"){if(J=o.querySelectorAll(X.el),!J.length)return}else J||(J=X.el);t.params.uniqueNavElements&&typeof X.el=="string"&&J.length>1&&I.querySelectorAll(X.el).length===1&&(J=I.querySelector(X.el)),J.length>0&&(J=J[0]),J.classList.add(t.isHorizontal()?X.horizontalClass:X.verticalClass);let Q;J&&(Q=J.querySelector(Ne(t.params.scrollbar.dragClass)),Q||(Q=re("div",t.params.scrollbar.dragClass),J.append(Q))),Object.assign(j,{el:J,dragEl:Q}),X.draggable&&q(),J&&J.classList[t.enabled?"remove":"add"](...Ze(t.params.scrollbar.lockClass))}function k(){const j=t.params.scrollbar,I=t.scrollbar.el;I&&I.classList.remove(...Ze(t.isHorizontal()?j.horizontalClass:j.verticalClass)),l()}n("changeDirection",()=>{if(!t.scrollbar||!t.scrollbar.el)return;const j=t.params.scrollbar;let{el:I}=t.scrollbar;I=xt(I),I.forEach(X=>{X.classList.remove(j.horizontalClass,j.verticalClass),X.classList.add(t.isHorizontal()?j.horizontalClass:j.verticalClass)})}),n("init",()=>{t.params.scrollbar.enabled===!1?G():(W(),f(),b())}),n("update resize observerUpdate lock unlock changeDirection",()=>{f()}),n("setTranslate",()=>{b()}),n("setTransition",(j,I)=>{u(I)}),n("enable disable",()=>{const{el:j}=t.scrollbar;j&&j.classList[t.enabled?"remove":"add"](...Ze(t.params.scrollbar.lockClass))}),n("destroy",()=>{k()});const z=()=>{t.el.classList.remove(...Ze(t.params.scrollbar.scrollbarDisabledClass)),t.scrollbar.el&&t.scrollbar.el.classList.remove(...Ze(t.params.scrollbar.scrollbarDisabledClass)),W(),f(),b()},G=()=>{t.el.classList.add(...Ze(t.params.scrollbar.scrollbarDisabledClass)),t.scrollbar.el&&t.scrollbar.el.classList.add(...Ze(t.params.scrollbar.scrollbarDisabledClass)),k()};Object.assign(t.scrollbar,{enable:z,disable:G,updateSize:f,setTranslate:b,init:W,destroy:k})}function sc(a){let{swiper:t,extendParams:e,on:n}=a;e({parallax:{enabled:!1}});const s="[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]",o=(m,M)=>{const{rtl:g}=t,w=g?-1:1,A=m.getAttribute("data-swiper-parallax")||"0";let b=m.getAttribute("data-swiper-parallax-x"),u=m.getAttribute("data-swiper-parallax-y");const f=m.getAttribute("data-swiper-parallax-scale"),T=m.getAttribute("data-swiper-parallax-opacity"),S=m.getAttribute("data-swiper-parallax-rotate");if(b||u?(b=b||"0",u=u||"0"):t.isHorizontal()?(b=A,u="0"):(u=A,b="0"),b.indexOf("%")>=0?b=`${parseInt(b,10)*M*w}%`:b=`${b*M*w}px`,u.indexOf("%")>=0?u=`${parseInt(u,10)*M}%`:u=`${u*M}px`,typeof T<"u"&&T!==null){const E=T-(T-1)*(1-Math.abs(M));m.style.opacity=E}let C=`translate3d(${b}, ${u}, 0px)`;if(typeof f<"u"&&f!==null){const E=f-(f-1)*(1-Math.abs(M));C+=` scale(${E})`}if(S&&typeof S<"u"&&S!==null){const E=S*M*-1;C+=` rotate(${E}deg)`}m.style.transform=C},c=()=>{const{el:m,slides:M,progress:g,snapGrid:w,isElement:A}=t,b=Bt(m,s);t.isElement&&b.push(...Bt(t.hostEl,s)),b.forEach(u=>{o(u,g)}),M.forEach((u,f)=>{let T=u.progress;t.params.slidesPerGroup>1&&t.params.slidesPerView!=="auto"&&(T+=Math.ceil(f/2)-g*(w.length-1)),T=Math.min(Math.max(T,-1),1),u.querySelectorAll(`${s}, [data-swiper-parallax-rotate]`).forEach(S=>{o(S,T)})})},p=function(m){m===void 0&&(m=t.params.speed);const{el:M,hostEl:g}=t,w=[...M.querySelectorAll(s)];t.isElement&&w.push(...g.querySelectorAll(s)),w.forEach(A=>{let b=parseInt(A.getAttribute("data-swiper-parallax-duration"),10)||m;m===0&&(b=0),A.style.transitionDuration=`${b}ms`})};n("beforeInit",()=>{t.params.parallax.enabled&&(t.params.watchSlidesProgress=!0,t.originalParams.watchSlidesProgress=!0)}),n("init",()=>{t.params.parallax.enabled&&c()}),n("setTranslate",()=>{t.params.parallax.enabled&&c()}),n("setTransition",(m,M)=>{t.params.parallax.enabled&&p(M)})}function oc(a){let{swiper:t,extendParams:e,on:n,emit:s}=a;const o=_t();e({zoom:{enabled:!1,limitToOriginalSize:!1,maxRatio:3,minRatio:1,panOnMouseMove:!1,toggle:!0,containerClass:"swiper-zoom-container",zoomedSlideClass:"swiper-slide-zoomed"}}),t.zoom={enabled:!1};let c=1,p=!1,m=!1,M={x:0,y:0};const g=-3;let w,A;const b=[],u={originX:0,originY:0,slideEl:void 0,slideWidth:void 0,slideHeight:void 0,imageEl:void 0,imageWrapEl:void 0,maxRatio:3},f={isTouched:void 0,isMoved:void 0,currentX:void 0,currentY:void 0,minX:void 0,minY:void 0,maxX:void 0,maxY:void 0,width:void 0,height:void 0,startX:void 0,startY:void 0,touchesStart:{},touchesCurrent:{}},T={x:void 0,y:void 0,prevPositionX:void 0,prevPositionY:void 0,prevTime:void 0};let S=1;Object.defineProperty(t.zoom,"scale",{get(){return S},set(tt){if(S!==tt){const K=u.imageEl,nt=u.slideEl;s("zoomChange",tt,K,nt)}S=tt}});function C(){if(b.length<2)return 1;const tt=b[0].pageX,K=b[0].pageY,nt=b[1].pageX,mt=b[1].pageY;return Math.sqrt((nt-tt)**2+(mt-K)**2)}function E(){const tt=t.params.zoom,K=u.imageWrapEl.getAttribute("data-swiper-zoom")||tt.maxRatio;if(tt.limitToOriginalSize&&u.imageEl&&u.imageEl.naturalWidth){const nt=u.imageEl.naturalWidth/u.imageEl.offsetWidth;return Math.min(nt,K)}return K}function L(){if(b.length<2)return{x:null,y:null};const tt=u.imageEl.getBoundingClientRect();return[(b[0].pageX+(b[1].pageX-b[0].pageX)/2-tt.x-o.scrollX)/c,(b[0].pageY+(b[1].pageY-b[0].pageY)/2-tt.y-o.scrollY)/c]}function O(){return t.isElement?"swiper-slide":`.${t.params.slideClass}`}function q(tt){const K=O();return!!(tt.target.matches(K)||t.slides.filter(nt=>nt.contains(tt.target)).length>0)}function l(tt){const K=`.${t.params.zoom.containerClass}`;return!!(tt.target.matches(K)||[...t.hostEl.querySelectorAll(K)].filter(nt=>nt.contains(tt.target)).length>0)}function W(tt){if(tt.pointerType==="mouse"&&b.splice(0,b.length),!q(tt))return;const K=t.params.zoom;if(w=!1,A=!1,b.push(tt),!(b.length<2)){if(w=!0,u.scaleStart=C(),!u.slideEl){u.slideEl=tt.target.closest(`.${t.params.slideClass}, swiper-slide`),u.slideEl||(u.slideEl=t.slides[t.activeIndex]);let nt=u.slideEl.querySelector(`.${K.containerClass}`);if(nt&&(nt=nt.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),u.imageEl=nt,nt?u.imageWrapEl=ca(u.imageEl,`.${K.containerClass}`)[0]:u.imageWrapEl=void 0,!u.imageWrapEl){u.imageEl=void 0;return}u.maxRatio=E()}if(u.imageEl){const[nt,mt]=L();u.originX=nt,u.originY=mt,u.imageEl.style.transitionDuration="0ms"}p=!0}}function k(tt){if(!q(tt))return;const K=t.params.zoom,nt=t.zoom,mt=b.findIndex(Ht=>Ht.pointerId===tt.pointerId);mt>=0&&(b[mt]=tt),!(b.length<2)&&(A=!0,u.scaleMove=C(),u.imageEl&&(nt.scale=u.scaleMove/u.scaleStart*c,nt.scale>u.maxRatio&&(nt.scale=u.maxRatio-1+(nt.scale-u.maxRatio+1)**.5),nt.scale<K.minRatio&&(nt.scale=K.minRatio+1-(K.minRatio-nt.scale+1)**.5),u.imageEl.style.transform=`translate3d(0,0,0) scale(${nt.scale})`))}function z(tt){if(!q(tt)||tt.pointerType==="mouse"&&tt.type==="pointerout")return;const K=t.params.zoom,nt=t.zoom,mt=b.findIndex(Ht=>Ht.pointerId===tt.pointerId);mt>=0&&b.splice(mt,1),!(!w||!A)&&(w=!1,A=!1,u.imageEl&&(nt.scale=Math.max(Math.min(nt.scale,u.maxRatio),K.minRatio),u.imageEl.style.transitionDuration=`${t.params.speed}ms`,u.imageEl.style.transform=`translate3d(0,0,0) scale(${nt.scale})`,c=nt.scale,p=!1,nt.scale>1&&u.slideEl?u.slideEl.classList.add(`${K.zoomedSlideClass}`):nt.scale<=1&&u.slideEl&&u.slideEl.classList.remove(`${K.zoomedSlideClass}`),nt.scale===1&&(u.originX=0,u.originY=0,u.slideEl=void 0)))}let G;function j(){t.touchEventsData.preventTouchMoveFromPointerMove=!1}function I(){clearTimeout(G),t.touchEventsData.preventTouchMoveFromPointerMove=!0,G=setTimeout(()=>{t.destroyed||j()})}function X(tt){const K=t.device;if(!u.imageEl||f.isTouched)return;K.android&&tt.cancelable&&tt.preventDefault(),f.isTouched=!0;const nt=b.length>0?b[0]:tt;f.touchesStart.x=nt.pageX,f.touchesStart.y=nt.pageY}function J(tt){const nt=tt.pointerType==="mouse"&&t.params.zoom.panOnMouseMove;if(!q(tt)||!l(tt))return;const mt=t.zoom;if(!u.imageEl)return;if(!f.isTouched||!u.slideEl){nt&&B(tt);return}if(nt){B(tt);return}f.isMoved||(f.width=u.imageEl.offsetWidth||u.imageEl.clientWidth,f.height=u.imageEl.offsetHeight||u.imageEl.clientHeight,f.startX=Xi(u.imageWrapEl,"x")||0,f.startY=Xi(u.imageWrapEl,"y")||0,u.slideWidth=u.slideEl.offsetWidth,u.slideHeight=u.slideEl.offsetHeight,u.imageWrapEl.style.transitionDuration="0ms");const Ht=f.width*mt.scale,Vt=f.height*mt.scale;if(f.minX=Math.min(u.slideWidth/2-Ht/2,0),f.maxX=-f.minX,f.minY=Math.min(u.slideHeight/2-Vt/2,0),f.maxY=-f.minY,f.touchesCurrent.x=b.length>0?b[0].pageX:tt.pageX,f.touchesCurrent.y=b.length>0?b[0].pageY:tt.pageY,Math.max(Math.abs(f.touchesCurrent.x-f.touchesStart.x),Math.abs(f.touchesCurrent.y-f.touchesStart.y))>5&&(t.allowClick=!1),!f.isMoved&&!p){if(t.isHorizontal()&&(Math.floor(f.minX)===Math.floor(f.startX)&&f.touchesCurrent.x<f.touchesStart.x||Math.floor(f.maxX)===Math.floor(f.startX)&&f.touchesCurrent.x>f.touchesStart.x)){f.isTouched=!1,j();return}if(!t.isHorizontal()&&(Math.floor(f.minY)===Math.floor(f.startY)&&f.touchesCurrent.y<f.touchesStart.y||Math.floor(f.maxY)===Math.floor(f.startY)&&f.touchesCurrent.y>f.touchesStart.y)){f.isTouched=!1,j();return}}tt.cancelable&&tt.preventDefault(),tt.stopPropagation(),I(),f.isMoved=!0;const It=(mt.scale-c)/(u.maxRatio-t.params.zoom.minRatio),{originX:Ft,originY:Pt}=u;f.currentX=f.touchesCurrent.x-f.touchesStart.x+f.startX+It*(f.width-Ft*2),f.currentY=f.touchesCurrent.y-f.touchesStart.y+f.startY+It*(f.height-Pt*2),f.currentX<f.minX&&(f.currentX=f.minX+1-(f.minX-f.currentX+1)**.8),f.currentX>f.maxX&&(f.currentX=f.maxX-1+(f.currentX-f.maxX+1)**.8),f.currentY<f.minY&&(f.currentY=f.minY+1-(f.minY-f.currentY+1)**.8),f.currentY>f.maxY&&(f.currentY=f.maxY-1+(f.currentY-f.maxY+1)**.8),T.prevPositionX||(T.prevPositionX=f.touchesCurrent.x),T.prevPositionY||(T.prevPositionY=f.touchesCurrent.y),T.prevTime||(T.prevTime=Date.now()),T.x=(f.touchesCurrent.x-T.prevPositionX)/(Date.now()-T.prevTime)/2,T.y=(f.touchesCurrent.y-T.prevPositionY)/(Date.now()-T.prevTime)/2,Math.abs(f.touchesCurrent.x-T.prevPositionX)<2&&(T.x=0),Math.abs(f.touchesCurrent.y-T.prevPositionY)<2&&(T.y=0),T.prevPositionX=f.touchesCurrent.x,T.prevPositionY=f.touchesCurrent.y,T.prevTime=Date.now(),u.imageWrapEl.style.transform=`translate3d(${f.currentX}px, ${f.currentY}px,0)`}function Q(){const tt=t.zoom;if(b.length=0,!u.imageEl)return;if(!f.isTouched||!f.isMoved){f.isTouched=!1,f.isMoved=!1;return}f.isTouched=!1,f.isMoved=!1;let K=300,nt=300;const mt=T.x*K,Ht=f.currentX+mt,Vt=T.y*nt,Yt=f.currentY+Vt;T.x!==0&&(K=Math.abs((Ht-f.currentX)/T.x)),T.y!==0&&(nt=Math.abs((Yt-f.currentY)/T.y));const It=Math.max(K,nt);f.currentX=Ht,f.currentY=Yt;const Ft=f.width*tt.scale,Pt=f.height*tt.scale;f.minX=Math.min(u.slideWidth/2-Ft/2,0),f.maxX=-f.minX,f.minY=Math.min(u.slideHeight/2-Pt/2,0),f.maxY=-f.minY,f.currentX=Math.max(Math.min(f.currentX,f.maxX),f.minX),f.currentY=Math.max(Math.min(f.currentY,f.maxY),f.minY),u.imageWrapEl.style.transitionDuration=`${It}ms`,u.imageWrapEl.style.transform=`translate3d(${f.currentX}px, ${f.currentY}px,0)`}function N(){const tt=t.zoom;u.slideEl&&t.activeIndex!==t.slides.indexOf(u.slideEl)&&(u.imageEl&&(u.imageEl.style.transform="translate3d(0,0,0) scale(1)"),u.imageWrapEl&&(u.imageWrapEl.style.transform="translate3d(0,0,0)"),u.slideEl.classList.remove(`${t.params.zoom.zoomedSlideClass}`),tt.scale=1,c=1,u.slideEl=void 0,u.imageEl=void 0,u.imageWrapEl=void 0,u.originX=0,u.originY=0)}function B(tt){if(c<=1||!u.imageWrapEl||!q(tt)||!l(tt))return;const K=o.getComputedStyle(u.imageWrapEl).transform,nt=new o.DOMMatrix(K);if(!m){m=!0,M.x=tt.clientX,M.y=tt.clientY,f.startX=nt.e,f.startY=nt.f,f.width=u.imageEl.offsetWidth||u.imageEl.clientWidth,f.height=u.imageEl.offsetHeight||u.imageEl.clientHeight,u.slideWidth=u.slideEl.offsetWidth,u.slideHeight=u.slideEl.offsetHeight;return}const mt=(tt.clientX-M.x)*g,Ht=(tt.clientY-M.y)*g,Vt=f.width*c,Yt=f.height*c,It=u.slideWidth,Ft=u.slideHeight,Pt=Math.min(It/2-Vt/2,0),Gt=-Pt,he=Math.min(Ft/2-Yt/2,0),de=-he,Nt=Math.max(Math.min(f.startX+mt,Gt),Pt),Ce=Math.max(Math.min(f.startY+Ht,de),he);u.imageWrapEl.style.transitionDuration="0ms",u.imageWrapEl.style.transform=`translate3d(${Nt}px, ${Ce}px, 0)`,M.x=tt.clientX,M.y=tt.clientY,f.startX=Nt,f.startY=Ce,f.currentX=Nt,f.currentY=Ce}function at(tt){const K=t.zoom,nt=t.params.zoom;if(!u.slideEl){tt&&tt.target&&(u.slideEl=tt.target.closest(`.${t.params.slideClass}, swiper-slide`)),u.slideEl||(t.params.virtual&&t.params.virtual.enabled&&t.virtual?u.slideEl=Bt(t.slidesEl,`.${t.params.slideActiveClass}`)[0]:u.slideEl=t.slides[t.activeIndex]);let ia=u.slideEl.querySelector(`.${nt.containerClass}`);ia&&(ia=ia.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),u.imageEl=ia,ia?u.imageWrapEl=ca(u.imageEl,`.${nt.containerClass}`)[0]:u.imageWrapEl=void 0}if(!u.imageEl||!u.imageWrapEl)return;t.params.cssMode&&(t.wrapperEl.style.overflow="hidden",t.wrapperEl.style.touchAction="none"),u.slideEl.classList.add(`${nt.zoomedSlideClass}`);let mt,Ht,Vt,Yt,It,Ft,Pt,Gt,he,de,Nt,Ce,Kt,xe,$t,ce,ie,lt;typeof f.touchesStart.x>"u"&&tt?(mt=tt.pageX,Ht=tt.pageY):(mt=f.touchesStart.x,Ht=f.touchesStart.y);const Dt=c,we=typeof tt=="number"?tt:null;c===1&&we&&(mt=void 0,Ht=void 0,f.touchesStart.x=void 0,f.touchesStart.y=void 0);const aa=E();K.scale=we||aa,c=we||aa,tt&&!(c===1&&we)?(ie=u.slideEl.offsetWidth,lt=u.slideEl.offsetHeight,Vt=z1(u.slideEl).left+o.scrollX,Yt=z1(u.slideEl).top+o.scrollY,It=Vt+ie/2-mt,Ft=Yt+lt/2-Ht,he=u.imageEl.offsetWidth||u.imageEl.clientWidth,de=u.imageEl.offsetHeight||u.imageEl.clientHeight,Nt=he*K.scale,Ce=de*K.scale,Kt=Math.min(ie/2-Nt/2,0),xe=Math.min(lt/2-Ce/2,0),$t=-Kt,ce=-xe,Dt>0&&we&&typeof f.currentX=="number"&&typeof f.currentY=="number"?(Pt=f.currentX*K.scale/Dt,Gt=f.currentY*K.scale/Dt):(Pt=It*K.scale,Gt=Ft*K.scale),Pt<Kt&&(Pt=Kt),Pt>$t&&(Pt=$t),Gt<xe&&(Gt=xe),Gt>ce&&(Gt=ce)):(Pt=0,Gt=0),we&&K.scale===1&&(u.originX=0,u.originY=0),f.currentX=Pt,f.currentY=Gt,u.imageWrapEl.style.transitionDuration="300ms",u.imageWrapEl.style.transform=`translate3d(${Pt}px, ${Gt}px,0)`,u.imageEl.style.transitionDuration="300ms",u.imageEl.style.transform=`translate3d(0,0,0) scale(${K.scale})`}function pt(){const tt=t.zoom,K=t.params.zoom;if(!u.slideEl){t.params.virtual&&t.params.virtual.enabled&&t.virtual?u.slideEl=Bt(t.slidesEl,`.${t.params.slideActiveClass}`)[0]:u.slideEl=t.slides[t.activeIndex];let nt=u.slideEl.querySelector(`.${K.containerClass}`);nt&&(nt=nt.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),u.imageEl=nt,nt?u.imageWrapEl=ca(u.imageEl,`.${K.containerClass}`)[0]:u.imageWrapEl=void 0}!u.imageEl||!u.imageWrapEl||(t.params.cssMode&&(t.wrapperEl.style.overflow="",t.wrapperEl.style.touchAction=""),tt.scale=1,c=1,f.currentX=void 0,f.currentY=void 0,f.touchesStart.x=void 0,f.touchesStart.y=void 0,u.imageWrapEl.style.transitionDuration="300ms",u.imageWrapEl.style.transform="translate3d(0,0,0)",u.imageEl.style.transitionDuration="300ms",u.imageEl.style.transform="translate3d(0,0,0) scale(1)",u.slideEl.classList.remove(`${K.zoomedSlideClass}`),u.slideEl=void 0,u.originX=0,u.originY=0,t.params.zoom.panOnMouseMove&&(M={x:0,y:0},m&&(m=!1,f.startX=0,f.startY=0)))}function St(tt){const K=t.zoom;K.scale&&K.scale!==1?pt():at(tt)}function At(){const tt=t.params.passiveListeners?{passive:!0,capture:!1}:!1,K=t.params.passiveListeners?{passive:!1,capture:!0}:!0;return{passiveListener:tt,activeListenerWithCapture:K}}function Ot(){const tt=t.zoom;if(tt.enabled)return;tt.enabled=!0;const{passiveListener:K,activeListenerWithCapture:nt}=At();t.wrapperEl.addEventListener("pointerdown",W,K),t.wrapperEl.addEventListener("pointermove",k,nt),["pointerup","pointercancel","pointerout"].forEach(mt=>{t.wrapperEl.addEventListener(mt,z,K)}),t.wrapperEl.addEventListener("pointermove",J,nt)}function jt(){const tt=t.zoom;if(!tt.enabled)return;tt.enabled=!1;const{passiveListener:K,activeListenerWithCapture:nt}=At();t.wrapperEl.removeEventListener("pointerdown",W,K),t.wrapperEl.removeEventListener("pointermove",k,nt),["pointerup","pointercancel","pointerout"].forEach(mt=>{t.wrapperEl.removeEventListener(mt,z,K)}),t.wrapperEl.removeEventListener("pointermove",J,nt)}n("init",()=>{t.params.zoom.enabled&&Ot()}),n("destroy",()=>{jt()}),n("touchStart",(tt,K)=>{t.zoom.enabled&&X(K)}),n("touchEnd",(tt,K)=>{t.zoom.enabled&&Q()}),n("doubleTap",(tt,K)=>{!t.animating&&t.params.zoom.enabled&&t.zoom.enabled&&t.params.zoom.toggle&&St(K)}),n("transitionEnd",()=>{t.zoom.enabled&&t.params.zoom.enabled&&N()}),n("slideChange",()=>{t.zoom.enabled&&t.params.zoom.enabled&&t.params.cssMode&&N()}),Object.assign(t.zoom,{enable:Ot,disable:jt,in:at,out:pt,toggle:St})}function lc(a){let{swiper:t,extendParams:e,on:n}=a;e({controller:{control:void 0,inverse:!1,by:"slide"}}),t.controller={control:void 0};function s(M,g){const w=function(){let f,T,S;return(C,E)=>{for(T=-1,f=C.length;f-T>1;)S=f+T>>1,C[S]<=E?T=S:f=S;return f}}();this.x=M,this.y=g,this.lastIndex=M.length-1;let A,b;return this.interpolate=function(f){return f?(b=w(this.x,f),A=b-1,(f-this.x[A])*(this.y[b]-this.y[A])/(this.x[b]-this.x[A])+this.y[A]):0},this}function o(M){t.controller.spline=t.params.loop?new s(t.slidesGrid,M.slidesGrid):new s(t.snapGrid,M.snapGrid)}function c(M,g){const w=t.controller.control;let A,b;const u=t.constructor;function f(T){if(T.destroyed)return;const S=t.rtlTranslate?-t.translate:t.translate;t.params.controller.by==="slide"&&(o(T),b=-t.controller.spline.interpolate(-S)),(!b||t.params.controller.by==="container")&&(A=(T.maxTranslate()-T.minTranslate())/(t.maxTranslate()-t.minTranslate()),(Number.isNaN(A)||!Number.isFinite(A))&&(A=1),b=(S-t.minTranslate())*A+T.minTranslate()),t.params.controller.inverse&&(b=T.maxTranslate()-b),T.updateProgress(b),T.setTranslate(b,t),T.updateActiveIndex(),T.updateSlidesClasses()}if(Array.isArray(w))for(let T=0;T<w.length;T+=1)w[T]!==g&&w[T]instanceof u&&f(w[T]);else w instanceof u&&g!==w&&f(w)}function p(M,g){const w=t.constructor,A=t.controller.control;let b;function u(f){f.destroyed||(f.setTransition(M,t),M!==0&&(f.transitionStart(),f.params.autoHeight&&Pa(()=>{f.updateAutoHeight()}),n1(f.wrapperEl,()=>{A&&f.transitionEnd()})))}if(Array.isArray(A))for(b=0;b<A.length;b+=1)A[b]!==g&&A[b]instanceof w&&u(A[b]);else A instanceof w&&g!==A&&u(A)}function m(){t.controller.control&&t.controller.spline&&(t.controller.spline=void 0,delete t.controller.spline)}n("beforeInit",()=>{if(typeof window<"u"&&(typeof t.params.controller.control=="string"||t.params.controller.control instanceof HTMLElement)){(typeof t.params.controller.control=="string"?[...document.querySelectorAll(t.params.controller.control)]:[t.params.controller.control]).forEach(g=>{if(t.controller.control||(t.controller.control=[]),g&&g.swiper)t.controller.control.push(g.swiper);else if(g){const w=`${t.params.eventsPrefix}init`,A=b=>{t.controller.control.push(b.detail[0]),t.update(),g.removeEventListener(w,A)};g.addEventListener(w,A)}});return}t.controller.control=t.params.controller.control}),n("update",()=>{m()}),n("resize",()=>{m()}),n("observerUpdate",()=>{m()}),n("setTranslate",(M,g,w)=>{!t.controller.control||t.controller.control.destroyed||t.controller.setTranslate(g,w)}),n("setTransition",(M,g,w)=>{!t.controller.control||t.controller.control.destroyed||t.controller.setTransition(g,w)}),Object.assign(t.controller,{setTranslate:c,setTransition:p})}function hc(a){let{swiper:t,extendParams:e,on:n}=a;e({a11y:{enabled:!0,notificationClass:"swiper-notification",prevSlideMessage:"Previous slide",nextSlideMessage:"Next slide",firstSlideMessage:"This is the first slide",lastSlideMessage:"This is the last slide",paginationBulletMessage:"Go to slide {{index}}",slideLabelMessage:"{{index}} / {{slidesLength}}",containerMessage:null,containerRoleDescriptionMessage:null,containerRole:null,itemRoleDescriptionMessage:null,slideRole:"group",id:null,scrollOnFocus:!0}}),t.a11y={clicked:!1};let s=null,o,c,p=new Date().getTime();function m(N){const B=s;B.length!==0&&Re(B,N)}function M(N){const B=()=>Math.round(16*Math.random()).toString(16);return"x".repeat(N).replace(/x/g,B)}function g(N){N=xt(N),N.forEach(B=>{B.setAttribute("tabIndex","0")})}function w(N){N=xt(N),N.forEach(B=>{B.setAttribute("tabIndex","-1")})}function A(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("role",B)})}function b(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-roledescription",B)})}function u(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-controls",B)})}function f(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-label",B)})}function T(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("id",B)})}function S(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-live",B)})}function C(N){N=xt(N),N.forEach(B=>{B.setAttribute("aria-disabled",!0)})}function E(N){N=xt(N),N.forEach(B=>{B.setAttribute("aria-disabled",!1)})}function L(N){if(N.keyCode!==13&&N.keyCode!==32)return;const B=t.params.a11y,at=N.target;if(!(t.pagination&&t.pagination.el&&(at===t.pagination.el||t.pagination.el.contains(N.target))&&!N.target.matches(Ne(t.params.pagination.bulletClass)))){if(t.navigation&&t.navigation.prevEl&&t.navigation.nextEl){const pt=xt(t.navigation.prevEl);xt(t.navigation.nextEl).includes(at)&&(t.isEnd&&!t.params.loop||t.slideNext(),t.isEnd?m(B.lastSlideMessage):m(B.nextSlideMessage)),pt.includes(at)&&(t.isBeginning&&!t.params.loop||t.slidePrev(),t.isBeginning?m(B.firstSlideMessage):m(B.prevSlideMessage))}t.pagination&&at.matches(Ne(t.params.pagination.bulletClass))&&at.click()}}function O(){if(t.params.loop||t.params.rewind||!t.navigation)return;const{nextEl:N,prevEl:B}=t.navigation;B&&(t.isBeginning?(C(B),w(B)):(E(B),g(B))),N&&(t.isEnd?(C(N),w(N)):(E(N),g(N)))}function q(){return t.pagination&&t.pagination.bullets&&t.pagination.bullets.length}function l(){return q()&&t.params.pagination.clickable}function W(){const N=t.params.a11y;q()&&t.pagination.bullets.forEach(B=>{t.params.pagination.clickable&&(g(B),t.params.pagination.renderBullet||(A(B,"button"),f(B,N.paginationBulletMessage.replace(/\{\{index\}\}/,o1(B)+1)))),B.matches(Ne(t.params.pagination.bulletActiveClass))?B.setAttribute("aria-current","true"):B.removeAttribute("aria-current")})}const k=(N,B,at)=>{g(N),N.tagName!=="BUTTON"&&(A(N,"button"),N.addEventListener("keydown",L)),f(N,at),u(N,B)},z=N=>{c&&c!==N.target&&!c.contains(N.target)&&(o=!0),t.a11y.clicked=!0},G=()=>{o=!1,requestAnimationFrame(()=>{requestAnimationFrame(()=>{t.destroyed||(t.a11y.clicked=!1)})})},j=N=>{p=new Date().getTime()},I=N=>{if(t.a11y.clicked||!t.params.a11y.scrollOnFocus||new Date().getTime()-p<100)return;const B=N.target.closest(`.${t.params.slideClass}, swiper-slide`);if(!B||!t.slides.includes(B))return;c=B;const at=t.slides.indexOf(B)===t.activeIndex,pt=t.params.watchSlidesProgress&&t.visibleSlides&&t.visibleSlides.includes(B);at||pt||N.sourceCapabilities&&N.sourceCapabilities.firesTouchEvents||(t.isHorizontal()?t.el.scrollLeft=0:t.el.scrollTop=0,requestAnimationFrame(()=>{o||(t.params.loop?t.slideToLoop(t.getSlideIndexWhenGrid(parseInt(B.getAttribute("data-swiper-slide-index"))),0):t.slideTo(t.getSlideIndexWhenGrid(t.slides.indexOf(B)),0),o=!1)}))},X=()=>{const N=t.params.a11y;N.itemRoleDescriptionMessage&&b(t.slides,N.itemRoleDescriptionMessage),N.slideRole&&A(t.slides,N.slideRole);const B=t.slides.length;N.slideLabelMessage&&t.slides.forEach((at,pt)=>{const St=t.params.loop?parseInt(at.getAttribute("data-swiper-slide-index"),10):pt,At=N.slideLabelMessage.replace(/\{\{index\}\}/,St+1).replace(/\{\{slidesLength\}\}/,B);f(at,At)})},J=()=>{const N=t.params.a11y;t.el.append(s);const B=t.el;N.containerRoleDescriptionMessage&&b(B,N.containerRoleDescriptionMessage),N.containerMessage&&f(B,N.containerMessage),N.containerRole&&A(B,N.containerRole);const at=t.wrapperEl,pt=N.id||at.getAttribute("id")||`swiper-wrapper-${M(16)}`,St=t.params.autoplay&&t.params.autoplay.enabled?"off":"polite";T(at,pt),S(at,St),X();let{nextEl:At,prevEl:Ot}=t.navigation?t.navigation:{};At=xt(At),Ot=xt(Ot),At&&At.forEach(tt=>k(tt,pt,N.nextSlideMessage)),Ot&&Ot.forEach(tt=>k(tt,pt,N.prevSlideMessage)),l()&&xt(t.pagination.el).forEach(K=>{K.addEventListener("keydown",L)}),zt().addEventListener("visibilitychange",j),t.el.addEventListener("focus",I,!0),t.el.addEventListener("focus",I,!0),t.el.addEventListener("pointerdown",z,!0),t.el.addEventListener("pointerup",G,!0)};function Q(){s&&s.remove();let{nextEl:N,prevEl:B}=t.navigation?t.navigation:{};N=xt(N),B=xt(B),N&&N.forEach(pt=>pt.removeEventListener("keydown",L)),B&&B.forEach(pt=>pt.removeEventListener("keydown",L)),l()&&xt(t.pagination.el).forEach(St=>{St.removeEventListener("keydown",L)}),zt().removeEventListener("visibilitychange",j),t.el&&typeof t.el!="string"&&(t.el.removeEventListener("focus",I,!0),t.el.removeEventListener("pointerdown",z,!0),t.el.removeEventListener("pointerup",G,!0))}n("beforeInit",()=>{s=re("span",t.params.a11y.notificationClass),s.setAttribute("aria-live","assertive"),s.setAttribute("aria-atomic","true")}),n("afterInit",()=>{t.params.a11y.enabled&&J()}),n("slidesLengthChange snapGridLengthChange slidesGridLengthChange",()=>{t.params.a11y.enabled&&X()}),n("fromEdge toEdge afterInit lock unlock",()=>{t.params.a11y.enabled&&O()}),n("paginationUpdate",()=>{t.params.a11y.enabled&&W()}),n("destroy",()=>{t.params.a11y.enabled&&Q()})}function dc(a){let{swiper:t,extendParams:e,on:n}=a;e({history:{enabled:!1,root:"",replaceState:!1,key:"slides",keepQuery:!1}});let s=!1,o={};const c=b=>b.toString().replace(/\s+/g,"-").replace(/[^\w-]+/g,"").replace(/--+/g,"-").replace(/^-+/,"").replace(/-+$/,""),p=b=>{const u=_t();let f;b?f=new URL(b):f=u.location;const T=f.pathname.slice(1).split("/").filter(L=>L!==""),S=T.length,C=T[S-2],E=T[S-1];return{key:C,value:E}},m=(b,u)=>{const f=_t();if(!s||!t.params.history.enabled)return;let T;t.params.url?T=new URL(t.params.url):T=f.location;const S=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${u}"]`):t.slides[u];let C=c(S.getAttribute("data-history"));if(t.params.history.root.length>0){let L=t.params.history.root;L[L.length-1]==="/"&&(L=L.slice(0,L.length-1)),C=`${L}/${b?`${b}/`:""}${C}`}else T.pathname.includes(b)||(C=`${b?`${b}/`:""}${C}`);t.params.history.keepQuery&&(C+=T.search);const E=f.history.state;E&&E.value===C||(t.params.history.replaceState?f.history.replaceState({value:C},null,C):f.history.pushState({value:C},null,C))},M=(b,u,f)=>{if(u)for(let T=0,S=t.slides.length;T<S;T+=1){const C=t.slides[T];if(c(C.getAttribute("data-history"))===u){const L=t.getSlideIndex(C);t.slideTo(L,b,f)}}else t.slideTo(0,b,f)},g=()=>{o=p(t.params.url),M(t.params.speed,o.value,!1)},w=()=>{const b=_t();if(t.params.history){if(!b.history||!b.history.pushState){t.params.history.enabled=!1,t.params.hashNavigation.enabled=!0;return}if(s=!0,o=p(t.params.url),!o.key&&!o.value){t.params.history.replaceState||b.addEventListener("popstate",g);return}M(0,o.value,t.params.runCallbacksOnInit),t.params.history.replaceState||b.addEventListener("popstate",g)}},A=()=>{const b=_t();t.params.history.replaceState||b.removeEventListener("popstate",g)};n("init",()=>{t.params.history.enabled&&w()}),n("destroy",()=>{t.params.history.enabled&&A()}),n("transitionEnd _freeModeNoMomentumRelease",()=>{s&&m(t.params.history.key,t.activeIndex)}),n("slideChange",()=>{s&&t.params.cssMode&&m(t.params.history.key,t.activeIndex)})}function cc(a){let{swiper:t,extendParams:e,emit:n,on:s}=a,o=!1;const c=zt(),p=_t();e({hashNavigation:{enabled:!1,replaceState:!1,watchState:!1,getSlideIndex(A,b){if(t.virtual&&t.params.virtual.enabled){const u=t.slides.find(T=>T.getAttribute("data-hash")===b);return u?parseInt(u.getAttribute("data-swiper-slide-index"),10):0}return t.getSlideIndex(Bt(t.slidesEl,`.${t.params.slideClass}[data-hash="${b}"], swiper-slide[data-hash="${b}"]`)[0])}}});const m=()=>{n("hashChange");const A=c.location.hash.replace("#",""),b=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${t.activeIndex}"]`):t.slides[t.activeIndex],u=b?b.getAttribute("data-hash"):"";if(A!==u){const f=t.params.hashNavigation.getSlideIndex(t,A);if(typeof f>"u"||Number.isNaN(f))return;t.slideTo(f)}},M=()=>{if(!o||!t.params.hashNavigation.enabled)return;const A=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${t.activeIndex}"]`):t.slides[t.activeIndex],b=A?A.getAttribute("data-hash")||A.getAttribute("data-history"):"";t.params.hashNavigation.replaceState&&p.history&&p.history.replaceState?(p.history.replaceState(null,null,`#${b}`||""),n("hashSet")):(c.location.hash=b||"",n("hashSet"))},g=()=>{if(!t.params.hashNavigation.enabled||t.params.history&&t.params.history.enabled)return;o=!0;const A=c.location.hash.replace("#","");if(A){const u=t.params.hashNavigation.getSlideIndex(t,A);t.slideTo(u||0,0,t.params.runCallbacksOnInit,!0)}t.params.hashNavigation.watchState&&p.addEventListener("hashchange",m)},w=()=>{t.params.hashNavigation.watchState&&p.removeEventListener("hashchange",m)};s("init",()=>{t.params.hashNavigation.enabled&&g()}),s("destroy",()=>{t.params.hashNavigation.enabled&&w()}),s("transitionEnd _freeModeNoMomentumRelease",()=>{o&&M()}),s("slideChange",()=>{o&&t.params.cssMode&&M()})}function pc(a){let{swiper:t,extendParams:e,on:n,emit:s,params:o}=a;t.autoplay={running:!1,paused:!1,timeLeft:0},e({autoplay:{enabled:!1,delay:3e3,waitForTransition:!0,disableOnInteraction:!1,stopOnLastSlide:!1,reverseDirection:!1,pauseOnMouseEnter:!1}});let c,p,m=o&&o.autoplay?o.autoplay.delay:3e3,M=o&&o.autoplay?o.autoplay.delay:3e3,g,w=new Date().getTime(),A,b,u,f,T,S,C;function E(B){!t||t.destroyed||!t.wrapperEl||B.target===t.wrapperEl&&(t.wrapperEl.removeEventListener("transitionend",E),!(C||B.detail&&B.detail.bySwiperTouchMove)&&z())}const L=()=>{if(t.destroyed||!t.autoplay.running)return;t.autoplay.paused?A=!0:A&&(M=g,A=!1);const B=t.autoplay.paused?g:w+M-new Date().getTime();t.autoplay.timeLeft=B,s("autoplayTimeLeft",B,B/m),p=requestAnimationFrame(()=>{L()})},O=()=>{let B;return t.virtual&&t.params.virtual.enabled?B=t.slides.find(pt=>pt.classList.contains("swiper-slide-active")):B=t.slides[t.activeIndex],B?parseInt(B.getAttribute("data-swiper-autoplay"),10):void 0},q=B=>{if(t.destroyed||!t.autoplay.running)return;cancelAnimationFrame(p),L();let at=typeof B>"u"?t.params.autoplay.delay:B;m=t.params.autoplay.delay,M=t.params.autoplay.delay;const pt=O();!Number.isNaN(pt)&&pt>0&&typeof B>"u"&&(at=pt,m=pt,M=pt),g=at;const St=t.params.speed,At=()=>{!t||t.destroyed||(t.params.autoplay.reverseDirection?!t.isBeginning||t.params.loop||t.params.rewind?(t.slidePrev(St,!0,!0),s("autoplay")):t.params.autoplay.stopOnLastSlide||(t.slideTo(t.slides.length-1,St,!0,!0),s("autoplay")):!t.isEnd||t.params.loop||t.params.rewind?(t.slideNext(St,!0,!0),s("autoplay")):t.params.autoplay.stopOnLastSlide||(t.slideTo(0,St,!0,!0),s("autoplay")),t.params.cssMode&&(w=new Date().getTime(),requestAnimationFrame(()=>{q()})))};return at>0?(clearTimeout(c),c=setTimeout(()=>{At()},at)):requestAnimationFrame(()=>{At()}),at},l=()=>{w=new Date().getTime(),t.autoplay.running=!0,q(),s("autoplayStart")},W=()=>{t.autoplay.running=!1,clearTimeout(c),cancelAnimationFrame(p),s("autoplayStop")},k=(B,at)=>{if(t.destroyed||!t.autoplay.running)return;clearTimeout(c),B||(S=!0);const pt=()=>{s("autoplayPause"),t.params.autoplay.waitForTransition?t.wrapperEl.addEventListener("transitionend",E):z()};if(t.autoplay.paused=!0,at){T&&(g=t.params.autoplay.delay),T=!1,pt();return}g=(g||t.params.autoplay.delay)-(new Date().getTime()-w),!(t.isEnd&&g<0&&!t.params.loop)&&(g<0&&(g=0),pt())},z=()=>{t.isEnd&&g<0&&!t.params.loop||t.destroyed||!t.autoplay.running||(w=new Date().getTime(),S?(S=!1,q(g)):q(),t.autoplay.paused=!1,s("autoplayResume"))},G=()=>{if(t.destroyed||!t.autoplay.running)return;const B=zt();B.visibilityState==="hidden"&&(S=!0,k(!0)),B.visibilityState==="visible"&&z()},j=B=>{B.pointerType==="mouse"&&(S=!0,C=!0,!(t.animating||t.autoplay.paused)&&k(!0))},I=B=>{B.pointerType==="mouse"&&(C=!1,t.autoplay.paused&&z())},X=()=>{t.params.autoplay.pauseOnMouseEnter&&(t.el.addEventListener("pointerenter",j),t.el.addEventListener("pointerleave",I))},J=()=>{t.el&&typeof t.el!="string"&&(t.el.removeEventListener("pointerenter",j),t.el.removeEventListener("pointerleave",I))},Q=()=>{zt().addEventListener("visibilitychange",G)},N=()=>{zt().removeEventListener("visibilitychange",G)};n("init",()=>{t.params.autoplay.enabled&&(X(),Q(),l())}),n("destroy",()=>{J(),N(),t.autoplay.running&&W()}),n("_freeModeStaticRelease",()=>{(u||S)&&z()}),n("_freeModeNoMomentumRelease",()=>{t.params.autoplay.disableOnInteraction?W():k(!0,!0)}),n("beforeTransitionStart",(B,at,pt)=>{t.destroyed||!t.autoplay.running||(pt||!t.params.autoplay.disableOnInteraction?k(!0,!0):W())}),n("sliderFirstMove",()=>{if(!(t.destroyed||!t.autoplay.running)){if(t.params.autoplay.disableOnInteraction){W();return}b=!0,u=!1,S=!1,f=setTimeout(()=>{S=!0,u=!0,k(!0)},200)}}),n("touchEnd",()=>{if(!(t.destroyed||!t.autoplay.running||!b)){if(clearTimeout(f),clearTimeout(c),t.params.autoplay.disableOnInteraction){u=!1,b=!1;return}u&&t.params.cssMode&&z(),u=!1,b=!1}}),n("slideChange",()=>{t.destroyed||!t.autoplay.running||(T=!0)}),Object.assign(t.autoplay,{start:l,stop:W,pause:k,resume:z})}function uc(a){let{swiper:t,extendParams:e,on:n}=a;e({thumbs:{swiper:null,multipleActiveThumbs:!0,autoScrollOffset:0,slideThumbActiveClass:"swiper-slide-thumb-active",thumbsContainerClass:"swiper-thumbs"}});let s=!1,o=!1;t.thumbs={swiper:null};function c(){const M=t.thumbs.swiper;if(!M||M.destroyed)return;const g=M.clickedIndex,w=M.clickedSlide;if(w&&w.classList.contains(t.params.thumbs.slideThumbActiveClass)||typeof g>"u"||g===null)return;let A;M.params.loop?A=parseInt(M.clickedSlide.getAttribute("data-swiper-slide-index"),10):A=g,t.params.loop?t.slideToLoop(A):t.slideTo(A)}function p(){const{thumbs:M}=t.params;if(s)return!1;s=!0;const g=t.constructor;if(M.swiper instanceof g){if(M.swiper.destroyed)return s=!1,!1;t.thumbs.swiper=M.swiper,Object.assign(t.thumbs.swiper.originalParams,{watchSlidesProgress:!0,slideToClickedSlide:!1}),Object.assign(t.thumbs.swiper.params,{watchSlidesProgress:!0,slideToClickedSlide:!1}),t.thumbs.swiper.update()}else if(a1(M.swiper)){const w=Object.assign({},M.swiper);Object.assign(w,{watchSlidesProgress:!0,slideToClickedSlide:!1}),t.thumbs.swiper=new g(w),o=!0}return t.thumbs.swiper.el.classList.add(t.params.thumbs.thumbsContainerClass),t.thumbs.swiper.on("tap",c),!0}function m(M){const g=t.thumbs.swiper;if(!g||g.destroyed)return;const w=g.params.slidesPerView==="auto"?g.slidesPerViewDynamic():g.params.slidesPerView;let A=1;const b=t.params.thumbs.slideThumbActiveClass;if(t.params.slidesPerView>1&&!t.params.centeredSlides&&(A=t.params.slidesPerView),t.params.thumbs.multipleActiveThumbs||(A=1),A=Math.floor(A),g.slides.forEach(T=>T.classList.remove(b)),g.params.loop||g.params.virtual&&g.params.virtual.enabled)for(let T=0;T<A;T+=1)Bt(g.slidesEl,`[data-swiper-slide-index="${t.realIndex+T}"]`).forEach(S=>{S.classList.add(b)});else for(let T=0;T<A;T+=1)g.slides[t.realIndex+T]&&g.slides[t.realIndex+T].classList.add(b);const u=t.params.thumbs.autoScrollOffset,f=u&&!g.params.loop;if(t.realIndex!==g.realIndex||f){const T=g.activeIndex;let S,C;if(g.params.loop){const E=g.slides.find(L=>L.getAttribute("data-swiper-slide-index")===`${t.realIndex}`);S=g.slides.indexOf(E),C=t.activeIndex>t.previousIndex?"next":"prev"}else S=t.realIndex,C=S>t.previousIndex?"next":"prev";f&&(S+=C==="next"?u:-1*u),g.visibleSlidesIndexes&&g.visibleSlidesIndexes.indexOf(S)<0&&(g.params.centeredSlides?S>T?S=S-Math.floor(w/2)+1:S=S+Math.floor(w/2)-1:S>T&&g.params.slidesPerGroup,g.slideTo(S,M?0:void 0))}}n("beforeInit",()=>{const{thumbs:M}=t.params;if(!(!M||!M.swiper))if(typeof M.swiper=="string"||M.swiper instanceof HTMLElement){const g=zt(),w=()=>{const b=typeof M.swiper=="string"?g.querySelector(M.swiper):M.swiper;if(b&&b.swiper)M.swiper=b.swiper,p(),m(!0);else if(b){const u=`${t.params.eventsPrefix}init`,f=T=>{M.swiper=T.detail[0],b.removeEventListener(u,f),p(),m(!0),M.swiper.update(),t.update()};b.addEventListener(u,f)}return b},A=()=>{if(t.destroyed)return;w()||requestAnimationFrame(A)};requestAnimationFrame(A)}else p(),m(!0)}),n("slideChange update resize observerUpdate",()=>{m()}),n("setTransition",(M,g)=>{const w=t.thumbs.swiper;!w||w.destroyed||w.setTransition(g)}),n("beforeDestroy",()=>{const M=t.thumbs.swiper;!M||M.destroyed||o&&M.destroy()}),Object.assign(t.thumbs,{init:p,update:m})}function fc(a){let{swiper:t,extendParams:e,emit:n,once:s}=a;e({freeMode:{enabled:!1,momentum:!0,momentumRatio:1,momentumBounce:!0,momentumBounceRatio:1,momentumVelocityRatio:1,sticky:!1,minimumVelocity:.02}});function o(){if(t.params.cssMode)return;const m=t.getTranslate();t.setTranslate(m),t.setTransition(0),t.touchEventsData.velocities.length=0,t.freeMode.onTouchEnd({currentPos:t.rtl?t.translate:-t.translate})}function c(){if(t.params.cssMode)return;const{touchEventsData:m,touches:M}=t;m.velocities.length===0&&m.velocities.push({position:M[t.isHorizontal()?"startX":"startY"],time:m.touchStartTime}),m.velocities.push({position:M[t.isHorizontal()?"currentX":"currentY"],time:Me()})}function p(m){let{currentPos:M}=m;if(t.params.cssMode)return;const{params:g,wrapperEl:w,rtlTranslate:A,snapGrid:b,touchEventsData:u}=t,T=Me()-u.touchStartTime;if(M<-t.minTranslate()){t.slideTo(t.activeIndex);return}if(M>-t.maxTranslate()){t.slides.length<b.length?t.slideTo(b.length-1):t.slideTo(t.slides.length-1);return}if(g.freeMode.momentum){if(u.velocities.length>1){const W=u.velocities.pop(),k=u.velocities.pop(),z=W.position-k.position,G=W.time-k.time;t.velocity=z/G,t.velocity/=2,Math.abs(t.velocity)<g.freeMode.minimumVelocity&&(t.velocity=0),(G>150||Me()-W.time>300)&&(t.velocity=0)}else t.velocity=0;t.velocity*=g.freeMode.momentumVelocityRatio,u.velocities.length=0;let S=1e3*g.freeMode.momentumRatio;const C=t.velocity*S;let E=t.translate+C;A&&(E=-E);let L=!1,O;const q=Math.abs(t.velocity)*20*g.freeMode.momentumBounceRatio;let l;if(E<t.maxTranslate())g.freeMode.momentumBounce?(E+t.maxTranslate()<-q&&(E=t.maxTranslate()-q),O=t.maxTranslate(),L=!0,u.allowMomentumBounce=!0):E=t.maxTranslate(),g.loop&&g.centeredSlides&&(l=!0);else if(E>t.minTranslate())g.freeMode.momentumBounce?(E-t.minTranslate()>q&&(E=t.minTranslate()+q),O=t.minTranslate(),L=!0,u.allowMomentumBounce=!0):E=t.minTranslate(),g.loop&&g.centeredSlides&&(l=!0);else if(g.freeMode.sticky){let W;for(let k=0;k<b.length;k+=1)if(b[k]>-E){W=k;break}Math.abs(b[W]-E)<Math.abs(b[W-1]-E)||t.swipeDirection==="next"?E=b[W]:E=b[W-1],E=-E}if(l&&s("transitionEnd",()=>{t.loopFix()}),t.velocity!==0){if(A?S=Math.abs((-E-t.translate)/t.velocity):S=Math.abs((E-t.translate)/t.velocity),g.freeMode.sticky){const W=Math.abs((A?-E:E)-t.translate),k=t.slidesSizesGrid[t.activeIndex];W<k?S=g.speed:W<2*k?S=g.speed*1.5:S=g.speed*2.5}}else if(g.freeMode.sticky){t.slideToClosest();return}g.freeMode.momentumBounce&&L?(t.updateProgress(O),t.setTransition(S),t.setTranslate(E),t.transitionStart(!0,t.swipeDirection),t.animating=!0,n1(w,()=>{!t||t.destroyed||!u.allowMomentumBounce||(n("momentumBounce"),t.setTransition(g.speed),setTimeout(()=>{t.setTranslate(O),n1(w,()=>{!t||t.destroyed||t.transitionEnd()})},0))})):t.velocity?(n("_freeModeNoMomentumRelease"),t.updateProgress(E),t.setTransition(S),t.setTranslate(E),t.transitionStart(!0,t.swipeDirection),t.animating||(t.animating=!0,n1(w,()=>{!t||t.destroyed||t.transitionEnd()}))):t.updateProgress(E),t.updateActiveIndex(),t.updateSlidesClasses()}else if(g.freeMode.sticky){t.slideToClosest();return}else g.freeMode&&n("_freeModeNoMomentumRelease");(!g.freeMode.momentum||T>=g.longSwipesMs)&&(n("_freeModeStaticRelease"),t.updateProgress(),t.updateActiveIndex(),t.updateSlidesClasses())}Object.assign(t,{freeMode:{onTouchStart:o,onTouchMove:c,onTouchEnd:p}})}function Mc(a){let{swiper:t,extendParams:e,on:n}=a;e({grid:{rows:1,fill:"column"}});let s,o,c,p;const m=()=>{let f=t.params.spaceBetween;return typeof f=="string"&&f.indexOf("%")>=0?f=parseFloat(f.replace("%",""))/100*t.size:typeof f=="string"&&(f=parseFloat(f)),f},M=f=>{const{slidesPerView:T}=t.params,{rows:S,fill:C}=t.params.grid,E=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:f.length;c=Math.floor(E/S),Math.floor(E/S)===E/S?s=E:s=Math.ceil(E/S)*S,T!=="auto"&&C==="row"&&(s=Math.max(s,T*S)),o=s/S},g=()=>{t.slides&&t.slides.forEach(f=>{f.swiperSlideGridSet&&(f.style.height="",f.style[t.getDirectionLabel("margin-top")]="")})},w=(f,T,S)=>{const{slidesPerGroup:C}=t.params,E=m(),{rows:L,fill:O}=t.params.grid,q=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:S.length;let l,W,k;if(O==="row"&&C>1){const z=Math.floor(f/(C*L)),G=f-L*C*z,j=z===0?C:Math.min(Math.ceil((q-z*L*C)/L),C);k=Math.floor(G/j),W=G-k*j+z*C,l=W+k*s/L,T.style.order=l}else O==="column"?(W=Math.floor(f/L),k=f-W*L,(W>c||W===c&&k===L-1)&&(k+=1,k>=L&&(k=0,W+=1))):(k=Math.floor(f/o),W=f-k*o);T.row=k,T.column=W,T.style.height=`calc((100% - ${(L-1)*E}px) / ${L})`,T.style[t.getDirectionLabel("margin-top")]=k!==0?E&&`${E}px`:"",T.swiperSlideGridSet=!0},A=(f,T)=>{const{centeredSlides:S,roundLengths:C}=t.params,E=m(),{rows:L}=t.params.grid;if(t.virtualSize=(f+E)*s,t.virtualSize=Math.ceil(t.virtualSize/L)-E,t.params.cssMode||(t.wrapperEl.style[t.getDirectionLabel("width")]=`${t.virtualSize+E}px`),S){const O=[];for(let q=0;q<T.length;q+=1){let l=T[q];C&&(l=Math.floor(l)),T[q]<t.virtualSize+T[0]&&O.push(l)}T.splice(0,T.length),T.push(...O)}},b=()=>{p=t.params.grid&&t.params.grid.rows>1},u=()=>{const{params:f,el:T}=t,S=f.grid&&f.grid.rows>1;p&&!S?(T.classList.remove(`${f.containerModifierClass}grid`,`${f.containerModifierClass}grid-column`),c=1,t.emitContainerClasses()):!p&&S&&(T.classList.add(`${f.containerModifierClass}grid`),f.grid.fill==="column"&&T.classList.add(`${f.containerModifierClass}grid-column`),t.emitContainerClasses()),p=S};n("init",b),n("update",u),t.grid={initSlides:M,unsetSlides:g,updateSlide:w,updateWrapperSize:A}}function mc(a){const t=this,{params:e,slidesEl:n}=t;e.loop&&t.loopDestroy();const s=o=>{if(typeof o=="string"){const c=document.createElement("div");Re(c,o),n.append(c.children[0]),Re(c,"")}else n.append(o)};if(typeof a=="object"&&"length"in a)for(let o=0;o<a.length;o+=1)a[o]&&s(a[o]);else s(a);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update()}function vc(a){const t=this,{params:e,activeIndex:n,slidesEl:s}=t;e.loop&&t.loopDestroy();let o=n+1;const c=p=>{if(typeof p=="string"){const m=document.createElement("div");Re(m,p),s.prepend(m.children[0]),Re(m,"")}else s.prepend(p)};if(typeof a=="object"&&"length"in a){for(let p=0;p<a.length;p+=1)a[p]&&c(a[p]);o=n+a.length}else c(a);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update(),t.slideTo(o,0,!1)}function gc(a,t){const e=this,{params:n,activeIndex:s,slidesEl:o}=e;let c=s;n.loop&&(c-=e.loopedSlides,e.loopDestroy(),e.recalcSlides());const p=e.slides.length;if(a<=0){e.prependSlide(t);return}if(a>=p){e.appendSlide(t);return}let m=c>a?c+1:c;const M=[];for(let g=p-1;g>=a;g-=1){const w=e.slides[g];w.remove(),M.unshift(w)}if(typeof t=="object"&&"length"in t){for(let g=0;g<t.length;g+=1)t[g]&&o.append(t[g]);m=c>a?c+t.length:c}else o.append(t);for(let g=0;g<M.length;g+=1)o.append(M[g]);e.recalcSlides(),n.loop&&e.loopCreate(),(!n.observer||e.isElement)&&e.update(),n.loop?e.slideTo(m+e.loopedSlides,0,!1):e.slideTo(m,0,!1)}function yc(a){const t=this,{params:e,activeIndex:n}=t;let s=n;e.loop&&(s-=t.loopedSlides,t.loopDestroy());let o=s,c;if(typeof a=="object"&&"length"in a){for(let p=0;p<a.length;p+=1)c=a[p],t.slides[c]&&t.slides[c].remove(),c<o&&(o-=1);o=Math.max(o,0)}else c=a,t.slides[c]&&t.slides[c].remove(),c<o&&(o-=1),o=Math.max(o,0);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update(),e.loop?t.slideTo(o+t.loopedSlides,0,!1):t.slideTo(o,0,!1)}function xc(){const a=this,t=[];for(let e=0;e<a.slides.length;e+=1)t.push(e);a.removeSlide(t)}function wc(a){let{swiper:t}=a;Object.assign(t,{appendSlide:mc.bind(t),prependSlide:vc.bind(t),addSlide:gc.bind(t),removeSlide:yc.bind(t),removeAllSlides:xc.bind(t)})}function Ra(a){const{effect:t,swiper:e,on:n,setTranslate:s,setTransition:o,overwriteParams:c,perspective:p,recreateShadows:m,getEffectParams:M}=a;n("beforeInit",()=>{if(e.params.effect!==t)return;e.classNames.push(`${e.params.containerModifierClass}${t}`),p&&p()&&e.classNames.push(`${e.params.containerModifierClass}3d`);const w=c?c():{};Object.assign(e.params,w),Object.assign(e.originalParams,w)}),n("setTranslate _virtualUpdated",()=>{e.params.effect===t&&s()}),n("setTransition",(w,A)=>{e.params.effect===t&&o(A)}),n("transitionEnd",()=>{if(e.params.effect===t&&m){if(!M||!M().slideShadows)return;e.slides.forEach(w=>{w.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(A=>A.remove())}),m()}});let g;n("virtualUpdate",()=>{e.params.effect===t&&(e.slides.length||(g=!0),requestAnimationFrame(()=>{g&&e.slides&&e.slides.length&&(s(),g=!1)}))})}function h1(a,t){const e=Ma(t);return e!==t&&(e.style.backfaceVisibility="hidden",e.style["-webkit-backface-visibility"]="hidden"),e}function W1(a){let{swiper:t,duration:e,transformElements:n,allSlides:s}=a;const{activeIndex:o}=t,c=p=>p.parentElement?p.parentElement:t.slides.find(M=>M.shadowRoot&&M.shadowRoot===p.parentNode);if(t.params.virtualTranslate&&e!==0){let p=!1,m;s?m=n:m=n.filter(M=>{const g=M.classList.contains("swiper-slide-transform")?c(M):M;return t.getSlideIndex(g)===o}),m.forEach(M=>{n1(M,()=>{if(p||!t||t.destroyed)return;p=!0,t.animating=!1;const g=new window.CustomEvent("transitionend",{bubbles:!0,cancelable:!0});t.wrapperEl.dispatchEvent(g)})})}}function bc(a){let{swiper:t,extendParams:e,on:n}=a;e({fadeEffect:{crossFade:!1}}),Ra({effect:"fade",swiper:t,on:n,setTranslate:()=>{const{slides:c}=t,p=t.params.fadeEffect;for(let m=0;m<c.length;m+=1){const M=t.slides[m];let w=-M.swiperSlideOffset;t.params.virtualTranslate||(w-=t.translate);let A=0;t.isHorizontal()||(A=w,w=0);const b=t.params.fadeEffect.crossFade?Math.max(1-Math.abs(M.progress),0):1+Math.min(Math.max(M.progress,-1),0),u=h1(p,M);u.style.opacity=b,u.style.transform=`translate3d(${w}px, ${A}px, 0px)`}},setTransition:c=>{const p=t.slides.map(m=>Ma(m));p.forEach(m=>{m.style.transitionDuration=`${c}ms`}),W1({swiper:t,duration:c,transformElements:p,allSlides:!0})},overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!t.params.cssMode})})}function Ec(a){let{swiper:t,extendParams:e,on:n}=a;e({cubeEffect:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94}});const s=(m,M,g)=>{let w=g?m.querySelector(".swiper-slide-shadow-left"):m.querySelector(".swiper-slide-shadow-top"),A=g?m.querySelector(".swiper-slide-shadow-right"):m.querySelector(".swiper-slide-shadow-bottom");w||(w=re("div",`swiper-slide-shadow-cube swiper-slide-shadow-${g?"left":"top"}`.split(" ")),m.append(w)),A||(A=re("div",`swiper-slide-shadow-cube swiper-slide-shadow-${g?"right":"bottom"}`.split(" ")),m.append(A)),w&&(w.style.opacity=Math.max(-M,0)),A&&(A.style.opacity=Math.max(M,0))};Ra({effect:"cube",swiper:t,on:n,setTranslate:()=>{const{el:m,wrapperEl:M,slides:g,width:w,height:A,rtlTranslate:b,size:u,browser:f}=t,T=q1(t),S=t.params.cubeEffect,C=t.isHorizontal(),E=t.virtual&&t.params.virtual.enabled;let L=0,O;S.shadow&&(C?(O=t.wrapperEl.querySelector(".swiper-cube-shadow"),O||(O=re("div","swiper-cube-shadow"),t.wrapperEl.append(O)),O.style.height=`${w}px`):(O=m.querySelector(".swiper-cube-shadow"),O||(O=re("div","swiper-cube-shadow"),m.append(O))));for(let l=0;l<g.length;l+=1){const W=g[l];let k=l;E&&(k=parseInt(W.getAttribute("data-swiper-slide-index"),10));let z=k*90,G=Math.floor(z/360);b&&(z=-z,G=Math.floor(-z/360));const j=Math.max(Math.min(W.progress,1),-1);let I=0,X=0,J=0;k%4===0?(I=-G*4*u,J=0):(k-1)%4===0?(I=0,J=-G*4*u):(k-2)%4===0?(I=u+G*4*u,J=u):(k-3)%4===0&&(I=-u,J=3*u+u*4*G),b&&(I=-I),C||(X=I,I=0);const Q=`rotateX(${T(C?0:-z)}deg) rotateY(${T(C?z:0)}deg) translate3d(${I}px, ${X}px, ${J}px)`;j<=1&&j>-1&&(L=k*90+j*90,b&&(L=-k*90-j*90)),W.style.transform=Q,S.slideShadows&&s(W,j,C)}if(M.style.transformOrigin=`50% 50% -${u/2}px`,M.style["-webkit-transform-origin"]=`50% 50% -${u/2}px`,S.shadow)if(C)O.style.transform=`translate3d(0px, ${w/2+S.shadowOffset}px, ${-w/2}px) rotateX(89.99deg) rotateZ(0deg) scale(${S.shadowScale})`;else{const l=Math.abs(L)-Math.floor(Math.abs(L)/90)*90,W=1.5-(Math.sin(l*2*Math.PI/360)/2+Math.cos(l*2*Math.PI/360)/2),k=S.shadowScale,z=S.shadowScale/W,G=S.shadowOffset;O.style.transform=`scale3d(${k}, 1, ${z}) translate3d(0px, ${A/2+G}px, ${-A/2/z}px) rotateX(-89.99deg)`}const q=(f.isSafari||f.isWebView)&&f.needPerspectiveFix?-u/2:0;M.style.transform=`translate3d(0px,0,${q}px) rotateX(${T(t.isHorizontal()?0:L)}deg) rotateY(${T(t.isHorizontal()?-L:0)}deg)`,M.style.setProperty("--swiper-cube-translate-z",`${q}px`)},setTransition:m=>{const{el:M,slides:g}=t;if(g.forEach(w=>{w.style.transitionDuration=`${m}ms`,w.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(A=>{A.style.transitionDuration=`${m}ms`})}),t.params.cubeEffect.shadow&&!t.isHorizontal()){const w=M.querySelector(".swiper-cube-shadow");w&&(w.style.transitionDuration=`${m}ms`)}},recreateShadows:()=>{const m=t.isHorizontal();t.slides.forEach(M=>{const g=Math.max(Math.min(M.progress,1),-1);s(M,g,m)})},getEffectParams:()=>t.params.cubeEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,resistanceRatio:0,spaceBetween:0,centeredSlides:!1,virtualTranslate:!0})})}function Da(a,t,e){const n=`swiper-slide-shadow${e?`-${e}`:""}${a?` swiper-slide-shadow-${a}`:""}`,s=Ma(t);let o=s.querySelector(`.${n.split(" ").join(".")}`);return o||(o=re("div",n.split(" ")),s.append(o)),o}function Sc(a){let{swiper:t,extendParams:e,on:n}=a;e({flipEffect:{slideShadows:!0,limitRotation:!0}});const s=(m,M)=>{let g=t.isHorizontal()?m.querySelector(".swiper-slide-shadow-left"):m.querySelector(".swiper-slide-shadow-top"),w=t.isHorizontal()?m.querySelector(".swiper-slide-shadow-right"):m.querySelector(".swiper-slide-shadow-bottom");g||(g=Da("flip",m,t.isHorizontal()?"left":"top")),w||(w=Da("flip",m,t.isHorizontal()?"right":"bottom")),g&&(g.style.opacity=Math.max(-M,0)),w&&(w.style.opacity=Math.max(M,0))};Ra({effect:"flip",swiper:t,on:n,setTranslate:()=>{const{slides:m,rtlTranslate:M}=t,g=t.params.flipEffect,w=q1(t);for(let A=0;A<m.length;A+=1){const b=m[A];let u=b.progress;t.params.flipEffect.limitRotation&&(u=Math.max(Math.min(b.progress,1),-1));const f=b.swiperSlideOffset;let S=-180*u,C=0,E=t.params.cssMode?-f-t.translate:-f,L=0;t.isHorizontal()?M&&(S=-S):(L=E,E=0,C=-S,S=0),b.style.zIndex=-Math.abs(Math.round(u))+m.length,g.slideShadows&&s(b,u);const O=`translate3d(${E}px, ${L}px, 0px) rotateX(${w(C)}deg) rotateY(${w(S)}deg)`,q=h1(g,b);q.style.transform=O}},setTransition:m=>{const M=t.slides.map(g=>Ma(g));M.forEach(g=>{g.style.transitionDuration=`${m}ms`,g.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(w=>{w.style.transitionDuration=`${m}ms`})}),W1({swiper:t,duration:m,transformElements:M})},recreateShadows:()=>{t.params.flipEffect,t.slides.forEach(m=>{let M=m.progress;t.params.flipEffect.limitRotation&&(M=Math.max(Math.min(m.progress,1),-1)),s(m,M)})},getEffectParams:()=>t.params.flipEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!t.params.cssMode})})}function Cc(a){let{swiper:t,extendParams:e,on:n}=a;e({coverflowEffect:{rotate:50,stretch:0,depth:100,scale:1,modifier:1,slideShadows:!0}}),Ra({effect:"coverflow",swiper:t,on:n,setTranslate:()=>{const{width:c,height:p,slides:m,slidesSizesGrid:M}=t,g=t.params.coverflowEffect,w=t.isHorizontal(),A=t.translate,b=w?-A+c/2:-A+p/2,u=w?g.rotate:-g.rotate,f=g.depth,T=q1(t);for(let S=0,C=m.length;S<C;S+=1){const E=m[S],L=M[S],O=E.swiperSlideOffset,q=(b-O-L/2)/L,l=typeof g.modifier=="function"?g.modifier(q):q*g.modifier;let W=w?u*l:0,k=w?0:u*l,z=-f*Math.abs(l),G=g.stretch;typeof G=="string"&&G.indexOf("%")!==-1&&(G=parseFloat(g.stretch)/100*L);let j=w?0:G*l,I=w?G*l:0,X=1-(1-g.scale)*Math.abs(l);Math.abs(I)<.001&&(I=0),Math.abs(j)<.001&&(j=0),Math.abs(z)<.001&&(z=0),Math.abs(W)<.001&&(W=0),Math.abs(k)<.001&&(k=0),Math.abs(X)<.001&&(X=0);const J=`translate3d(${I}px,${j}px,${z}px)  rotateX(${T(k)}deg) rotateY(${T(W)}deg) scale(${X})`,Q=h1(g,E);if(Q.style.transform=J,E.style.zIndex=-Math.abs(Math.round(l))+1,g.slideShadows){let N=w?E.querySelector(".swiper-slide-shadow-left"):E.querySelector(".swiper-slide-shadow-top"),B=w?E.querySelector(".swiper-slide-shadow-right"):E.querySelector(".swiper-slide-shadow-bottom");N||(N=Da("coverflow",E,w?"left":"top")),B||(B=Da("coverflow",E,w?"right":"bottom")),N&&(N.style.opacity=l>0?l:0),B&&(B.style.opacity=-l>0?-l:0)}}},setTransition:c=>{t.slides.map(m=>Ma(m)).forEach(m=>{m.style.transitionDuration=`${c}ms`,m.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(M=>{M.style.transitionDuration=`${c}ms`})})},perspective:()=>!0,overwriteParams:()=>({watchSlidesProgress:!0})})}function Ac(a){let{swiper:t,extendParams:e,on:n}=a;e({creativeEffect:{limitProgress:1,shadowPerProgress:!1,progressMultiplier:1,perspective:!0,prev:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1},next:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1}}});const s=p=>typeof p=="string"?p:`${p}px`;Ra({effect:"creative",swiper:t,on:n,setTranslate:()=>{const{slides:p,wrapperEl:m,slidesSizesGrid:M}=t,g=t.params.creativeEffect,{progressMultiplier:w}=g,A=t.params.centeredSlides,b=q1(t);if(A){const u=M[0]/2-t.params.slidesOffsetBefore||0;m.style.transform=`translateX(calc(50% - ${u}px))`}for(let u=0;u<p.length;u+=1){const f=p[u],T=f.progress,S=Math.min(Math.max(f.progress,-g.limitProgress),g.limitProgress);let C=S;A||(C=Math.min(Math.max(f.originalProgress,-g.limitProgress),g.limitProgress));const E=f.swiperSlideOffset,L=[t.params.cssMode?-E-t.translate:-E,0,0],O=[0,0,0];let q=!1;t.isHorizontal()||(L[1]=L[0],L[0]=0);let l={translate:[0,0,0],rotate:[0,0,0],scale:1,opacity:1};S<0?(l=g.next,q=!0):S>0&&(l=g.prev,q=!0),L.forEach((X,J)=>{L[J]=`calc(${X}px + (${s(l.translate[J])} * ${Math.abs(S*w)}))`}),O.forEach((X,J)=>{let Q=l.rotate[J]*Math.abs(S*w);O[J]=Q}),f.style.zIndex=-Math.abs(Math.round(T))+p.length;const W=L.join(", "),k=`rotateX(${b(O[0])}deg) rotateY(${b(O[1])}deg) rotateZ(${b(O[2])}deg)`,z=C<0?`scale(${1+(1-l.scale)*C*w})`:`scale(${1-(1-l.scale)*C*w})`,G=C<0?1+(1-l.opacity)*C*w:1-(1-l.opacity)*C*w,j=`translate3d(${W}) ${k} ${z}`;if(q&&l.shadow||!q){let X=f.querySelector(".swiper-slide-shadow");if(!X&&l.shadow&&(X=Da("creative",f)),X){const J=g.shadowPerProgress?S*(1/g.limitProgress):S;X.style.opacity=Math.min(Math.max(Math.abs(J),0),1)}}const I=h1(g,f);I.style.transform=j,I.style.opacity=G,l.origin&&(I.style.transformOrigin=l.origin)}},setTransition:p=>{const m=t.slides.map(M=>Ma(M));m.forEach(M=>{M.style.transitionDuration=`${p}ms`,M.querySelectorAll(".swiper-slide-shadow").forEach(g=>{g.style.transitionDuration=`${p}ms`})}),W1({swiper:t,duration:p,transformElements:m,allSlides:!0})},perspective:()=>t.params.creativeEffect.perspective,overwriteParams:()=>({watchSlidesProgress:!0,virtualTranslate:!t.params.cssMode})})}function Tc(a){let{swiper:t,extendParams:e,on:n}=a;e({cardsEffect:{slideShadows:!0,rotate:!0,perSlideRotate:2,perSlideOffset:8}}),Ra({effect:"cards",swiper:t,on:n,setTranslate:()=>{const{slides:c,activeIndex:p,rtlTranslate:m}=t,M=t.params.cardsEffect,{startTranslate:g,isTouched:w}=t.touchEventsData,A=m?-t.translate:t.translate;for(let b=0;b<c.length;b+=1){const u=c[b],f=u.progress,T=Math.min(Math.max(f,-4),4);let S=u.swiperSlideOffset;t.params.centeredSlides&&!t.params.cssMode&&(t.wrapperEl.style.transform=`translateX(${t.minTranslate()}px)`),t.params.centeredSlides&&t.params.cssMode&&(S-=c[0].swiperSlideOffset);let C=t.params.cssMode?-S-t.translate:-S,E=0;const L=-100*Math.abs(T);let O=1,q=-M.perSlideRotate*T,l=M.perSlideOffset-Math.abs(T)*.75;const W=t.virtual&&t.params.virtual.enabled?t.virtual.from+b:b,k=(W===p||W===p-1)&&T>0&&T<1&&(w||t.params.cssMode)&&A<g,z=(W===p||W===p+1)&&T<0&&T>-1&&(w||t.params.cssMode)&&A>g;if(k||z){const X=(1-Math.abs((Math.abs(T)-.5)/.5))**.5;q+=-28*T*X,O+=-.5*X,l+=96*X,E=`${-25*X*Math.abs(T)}%`}if(T<0?C=`calc(${C}px ${m?"-":"+"} (${l*Math.abs(T)}%))`:T>0?C=`calc(${C}px ${m?"-":"+"} (-${l*Math.abs(T)}%))`:C=`${C}px`,!t.isHorizontal()){const X=E;E=C,C=X}const G=T<0?`${1+(1-O)*T}`:`${1-(1-O)*T}`,j=`
        translate3d(${C}, ${E}, ${L}px)
        rotateZ(${M.rotate?m?-q:q:0}deg)
        scale(${G})
      `;if(M.slideShadows){let X=u.querySelector(".swiper-slide-shadow");X||(X=Da("cards",u)),X&&(X.style.opacity=Math.min(Math.max((Math.abs(T)-.5)/.5,0),1))}u.style.zIndex=-Math.abs(Math.round(f))+c.length;const I=h1(M,u);I.style.transform=j}},setTransition:c=>{const p=t.slides.map(m=>Ma(m));p.forEach(m=>{m.style.transitionDuration=`${c}ms`,m.querySelectorAll(".swiper-slide-shadow").forEach(M=>{M.style.transitionDuration=`${c}ms`})}),W1({swiper:t,duration:c,transformElements:p})},perspective:()=>!0,overwriteParams:()=>({_loopSwapReset:!1,watchSlidesProgress:!0,loopAdditionalSlides:t.params.cardsEffect.rotate?3:2,centeredSlides:!0,virtualTranslate:!t.params.cssMode})})}const _c=[tc,ec,ac,ic,nc,rc,sc,oc,lc,hc,dc,cc,pc,uc,fc,Mc,wc,bc,Ec,Sc,Cc,Ac,Tc];Wt.use(_c);var Xt="top",se="bottom",oe="right",Ut="left",j1="auto",Ba=[Xt,se,oe,Ut],ua="start",Oa="end",Fo="clippingParents",s2="viewport",_a="popper",qo="reference",Ki=Ba.reduce(function(a,t){return a.concat([t+"-"+ua,t+"-"+Oa])},[]),o2=[].concat(Ba,[j1]).reduce(function(a,t){return a.concat([t,t+"-"+ua,t+"-"+Oa])},[]),Wo="beforeRead",jo="read",Go="afterRead",Zo="beforeMain",Xo="main",Uo="afterMain",Yo="beforeWrite",Ko="write",Qo="afterWrite",Jo=[Wo,jo,Go,Zo,Xo,Uo,Yo,Ko,Qo];function De(a){return a?(a.nodeName||"").toLowerCase():null}function le(a){if(a==null)return window;if(a.toString()!=="[object Window]"){var t=a.ownerDocument;return t&&t.defaultView||window}return a}function fa(a){var t=le(a).Element;return a instanceof t||a instanceof Element}function me(a){var t=le(a).HTMLElement;return a instanceof t||a instanceof HTMLElement}function l2(a){if(typeof ShadowRoot>"u")return!1;var t=le(a).ShadowRoot;return a instanceof t||a instanceof ShadowRoot}function Hc(a){var t=a.state;Object.keys(t.elements).forEach(function(e){var n=t.styles[e]||{},s=t.attributes[e]||{},o=t.elements[e];!me(o)||!De(o)||(Object.assign(o.style,n),Object.keys(s).forEach(function(c){var p=s[c];p===!1?o.removeAttribute(c):o.setAttribute(c,p===!0?"":p)}))})}function Lc(a){var t=a.state,e={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,e.popper),t.styles=e,t.elements.arrow&&Object.assign(t.elements.arrow.style,e.arrow),function(){Object.keys(t.elements).forEach(function(n){var s=t.elements[n],o=t.attributes[n]||{},c=Object.keys(t.styles.hasOwnProperty(n)?t.styles[n]:e[n]),p=c.reduce(function(m,M){return m[M]="",m},{});!me(s)||!De(s)||(Object.assign(s.style,p),Object.keys(o).forEach(function(m){s.removeAttribute(m)}))})}}const h2={name:"applyStyles",enabled:!0,phase:"write",fn:Hc,effect:Lc,requires:["computeStyles"]};function Ve(a){return a.split("-")[0]}var pa=Math.max,$1=Math.min,ka=Math.round;function Qi(){var a=navigator.userAgentData;return a!=null&&a.brands&&Array.isArray(a.brands)?a.brands.map(function(t){return t.brand+"/"+t.version}).join(" "):navigator.userAgent}function tl(){return!/^((?!chrome|android).)*safari/i.test(Qi())}function Ia(a,t,e){t===void 0&&(t=!1),e===void 0&&(e=!1);var n=a.getBoundingClientRect(),s=1,o=1;t&&me(a)&&(s=a.offsetWidth>0&&ka(n.width)/a.offsetWidth||1,o=a.offsetHeight>0&&ka(n.height)/a.offsetHeight||1);var c=fa(a)?le(a):window,p=c.visualViewport,m=!tl()&&e,M=(n.left+(m&&p?p.offsetLeft:0))/s,g=(n.top+(m&&p?p.offsetTop:0))/o,w=n.width/s,A=n.height/o;return{width:w,height:A,top:g,right:M+w,bottom:g+A,left:M,x:M,y:g}}function d2(a){var t=Ia(a),e=a.offsetWidth,n=a.offsetHeight;return Math.abs(t.width-e)<=1&&(e=t.width),Math.abs(t.height-n)<=1&&(n=t.height),{x:a.offsetLeft,y:a.offsetTop,width:e,height:n}}function el(a,t){var e=t.getRootNode&&t.getRootNode();if(a.contains(t))return!0;if(e&&l2(e)){var n=t;do{if(n&&a.isSameNode(n))return!0;n=n.parentNode||n.host}while(n)}return!1}function Be(a){return le(a).getComputedStyle(a)}function Vc(a){return["table","td","th"].indexOf(De(a))>=0}function Je(a){return((fa(a)?a.ownerDocument:a.document)||window.document).documentElement}function G1(a){return De(a)==="html"?a:a.assignedSlot||a.parentNode||(l2(a)?a.host:null)||Je(a)}function pn(a){return!me(a)||Be(a).position==="fixed"?null:a.offsetParent}function Pc(a){var t=/firefox/i.test(Qi()),e=/Trident/i.test(Qi());if(e&&me(a)){var n=Be(a);if(n.position==="fixed")return null}var s=G1(a);for(l2(s)&&(s=s.host);me(s)&&["html","body"].indexOf(De(s))<0;){var o=Be(s);if(o.transform!=="none"||o.perspective!=="none"||o.contain==="paint"||["transform","perspective"].indexOf(o.willChange)!==-1||t&&o.willChange==="filter"||t&&o.filter&&o.filter!=="none")return s;s=s.parentNode}return null}function d1(a){for(var t=le(a),e=pn(a);e&&Vc(e)&&Be(e).position==="static";)e=pn(e);return e&&(De(e)==="html"||De(e)==="body"&&Be(e).position==="static")?t:e||Pc(a)||t}function c2(a){return["top","bottom"].indexOf(a)>=0?"x":"y"}function r1(a,t,e){return pa(a,$1(t,e))}function Dc(a,t,e){var n=r1(a,t,e);return n>e?e:n}function al(){return{top:0,right:0,bottom:0,left:0}}function il(a){return Object.assign({},al(),a)}function nl(a,t){return t.reduce(function(e,n){return e[n]=a,e},{})}var Oc=function(t,e){return t=typeof t=="function"?t(Object.assign({},e.rects,{placement:e.placement})):t,il(typeof t!="number"?t:nl(t,Ba))};function kc(a){var t,e=a.state,n=a.name,s=a.options,o=e.elements.arrow,c=e.modifiersData.popperOffsets,p=Ve(e.placement),m=c2(p),M=[Ut,oe].indexOf(p)>=0,g=M?"height":"width";if(!(!o||!c)){var w=Oc(s.padding,e),A=d2(o),b=m==="y"?Xt:Ut,u=m==="y"?se:oe,f=e.rects.reference[g]+e.rects.reference[m]-c[m]-e.rects.popper[g],T=c[m]-e.rects.reference[m],S=d1(o),C=S?m==="y"?S.clientHeight||0:S.clientWidth||0:0,E=f/2-T/2,L=w[b],O=C-A[g]-w[u],q=C/2-A[g]/2+E,l=r1(L,q,O),W=m;e.modifiersData[n]=(t={},t[W]=l,t.centerOffset=l-q,t)}}function Ic(a){var t=a.state,e=a.options,n=e.element,s=n===void 0?"[data-popper-arrow]":n;s!=null&&(typeof s=="string"&&(s=t.elements.popper.querySelector(s),!s)||el(t.elements.popper,s)&&(t.elements.arrow=s))}const rl={name:"arrow",enabled:!0,phase:"main",fn:kc,effect:Ic,requires:["popperOffsets"],requiresIfExists:["preventOverflow"]};function Na(a){return a.split("-")[1]}var Nc={top:"auto",right:"auto",bottom:"auto",left:"auto"};function zc(a,t){var e=a.x,n=a.y,s=t.devicePixelRatio||1;return{x:ka(e*s)/s||0,y:ka(n*s)/s||0}}function un(a){var t,e=a.popper,n=a.popperRect,s=a.placement,o=a.variation,c=a.offsets,p=a.position,m=a.gpuAcceleration,M=a.adaptive,g=a.roundOffsets,w=a.isFixed,A=c.x,b=A===void 0?0:A,u=c.y,f=u===void 0?0:u,T=typeof g=="function"?g({x:b,y:f}):{x:b,y:f};b=T.x,f=T.y;var S=c.hasOwnProperty("x"),C=c.hasOwnProperty("y"),E=Ut,L=Xt,O=window;if(M){var q=d1(e),l="clientHeight",W="clientWidth";if(q===le(e)&&(q=Je(e),Be(q).position!=="static"&&p==="absolute"&&(l="scrollHeight",W="scrollWidth")),q=q,s===Xt||(s===Ut||s===oe)&&o===Oa){L=se;var k=w&&q===O&&O.visualViewport?O.visualViewport.height:q[l];f-=k-n.height,f*=m?1:-1}if(s===Ut||(s===Xt||s===se)&&o===Oa){E=oe;var z=w&&q===O&&O.visualViewport?O.visualViewport.width:q[W];b-=z-n.width,b*=m?1:-1}}var G=Object.assign({position:p},M&&Nc),j=g===!0?zc({x:b,y:f},le(e)):{x:b,y:f};if(b=j.x,f=j.y,m){var I;return Object.assign({},G,(I={},I[L]=C?"0":"",I[E]=S?"0":"",I.transform=(O.devicePixelRatio||1)<=1?"translate("+b+"px, "+f+"px)":"translate3d("+b+"px, "+f+"px, 0)",I))}return Object.assign({},G,(t={},t[L]=C?f+"px":"",t[E]=S?b+"px":"",t.transform="",t))}function $c(a){var t=a.state,e=a.options,n=e.gpuAcceleration,s=n===void 0?!0:n,o=e.adaptive,c=o===void 0?!0:o,p=e.roundOffsets,m=p===void 0?!0:p,M={placement:Ve(t.placement),variation:Na(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:s,isFixed:t.options.strategy==="fixed"};t.modifiersData.popperOffsets!=null&&(t.styles.popper=Object.assign({},t.styles.popper,un(Object.assign({},M,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:c,roundOffsets:m})))),t.modifiersData.arrow!=null&&(t.styles.arrow=Object.assign({},t.styles.arrow,un(Object.assign({},M,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:m})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})}const p2={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:$c,data:{}};var S1={passive:!0};function Rc(a){var t=a.state,e=a.instance,n=a.options,s=n.scroll,o=s===void 0?!0:s,c=n.resize,p=c===void 0?!0:c,m=le(t.elements.popper),M=[].concat(t.scrollParents.reference,t.scrollParents.popper);return o&&M.forEach(function(g){g.addEventListener("scroll",e.update,S1)}),p&&m.addEventListener("resize",e.update,S1),function(){o&&M.forEach(function(g){g.removeEventListener("scroll",e.update,S1)}),p&&m.removeEventListener("resize",e.update,S1)}}const u2={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:Rc,data:{}};var Bc={left:"right",right:"left",bottom:"top",top:"bottom"};function O1(a){return a.replace(/left|right|bottom|top/g,function(t){return Bc[t]})}var Fc={start:"end",end:"start"};function fn(a){return a.replace(/start|end/g,function(t){return Fc[t]})}function f2(a){var t=le(a),e=t.pageXOffset,n=t.pageYOffset;return{scrollLeft:e,scrollTop:n}}function M2(a){return Ia(Je(a)).left+f2(a).scrollLeft}function qc(a,t){var e=le(a),n=Je(a),s=e.visualViewport,o=n.clientWidth,c=n.clientHeight,p=0,m=0;if(s){o=s.width,c=s.height;var M=tl();(M||!M&&t==="fixed")&&(p=s.offsetLeft,m=s.offsetTop)}return{width:o,height:c,x:p+M2(a),y:m}}function Wc(a){var t,e=Je(a),n=f2(a),s=(t=a.ownerDocument)==null?void 0:t.body,o=pa(e.scrollWidth,e.clientWidth,s?s.scrollWidth:0,s?s.clientWidth:0),c=pa(e.scrollHeight,e.clientHeight,s?s.scrollHeight:0,s?s.clientHeight:0),p=-n.scrollLeft+M2(a),m=-n.scrollTop;return Be(s||e).direction==="rtl"&&(p+=pa(e.clientWidth,s?s.clientWidth:0)-o),{width:o,height:c,x:p,y:m}}function m2(a){var t=Be(a),e=t.overflow,n=t.overflowX,s=t.overflowY;return/auto|scroll|overlay|hidden/.test(e+s+n)}function sl(a){return["html","body","#document"].indexOf(De(a))>=0?a.ownerDocument.body:me(a)&&m2(a)?a:sl(G1(a))}function s1(a,t){var e;t===void 0&&(t=[]);var n=sl(a),s=n===((e=a.ownerDocument)==null?void 0:e.body),o=le(n),c=s?[o].concat(o.visualViewport||[],m2(n)?n:[]):n,p=t.concat(c);return s?p:p.concat(s1(G1(c)))}function Ji(a){return Object.assign({},a,{left:a.x,top:a.y,right:a.x+a.width,bottom:a.y+a.height})}function jc(a,t){var e=Ia(a,!1,t==="fixed");return e.top=e.top+a.clientTop,e.left=e.left+a.clientLeft,e.bottom=e.top+a.clientHeight,e.right=e.left+a.clientWidth,e.width=a.clientWidth,e.height=a.clientHeight,e.x=e.left,e.y=e.top,e}function Mn(a,t,e){return t===s2?Ji(qc(a,e)):fa(t)?jc(t,e):Ji(Wc(Je(a)))}function Gc(a){var t=s1(G1(a)),e=["absolute","fixed"].indexOf(Be(a).position)>=0,n=e&&me(a)?d1(a):a;return fa(n)?t.filter(function(s){return fa(s)&&el(s,n)&&De(s)!=="body"}):[]}function Zc(a,t,e,n){var s=t==="clippingParents"?Gc(a):[].concat(t),o=[].concat(s,[e]),c=o[0],p=o.reduce(function(m,M){var g=Mn(a,M,n);return m.top=pa(g.top,m.top),m.right=$1(g.right,m.right),m.bottom=$1(g.bottom,m.bottom),m.left=pa(g.left,m.left),m},Mn(a,c,n));return p.width=p.right-p.left,p.height=p.bottom-p.top,p.x=p.left,p.y=p.top,p}function ol(a){var t=a.reference,e=a.element,n=a.placement,s=n?Ve(n):null,o=n?Na(n):null,c=t.x+t.width/2-e.width/2,p=t.y+t.height/2-e.height/2,m;switch(s){case Xt:m={x:c,y:t.y-e.height};break;case se:m={x:c,y:t.y+t.height};break;case oe:m={x:t.x+t.width,y:p};break;case Ut:m={x:t.x-e.width,y:p};break;default:m={x:t.x,y:t.y}}var M=s?c2(s):null;if(M!=null){var g=M==="y"?"height":"width";switch(o){case ua:m[M]=m[M]-(t[g]/2-e[g]/2);break;case Oa:m[M]=m[M]+(t[g]/2-e[g]/2);break}}return m}function za(a,t){t===void 0&&(t={});var e=t,n=e.placement,s=n===void 0?a.placement:n,o=e.strategy,c=o===void 0?a.strategy:o,p=e.boundary,m=p===void 0?Fo:p,M=e.rootBoundary,g=M===void 0?s2:M,w=e.elementContext,A=w===void 0?_a:w,b=e.altBoundary,u=b===void 0?!1:b,f=e.padding,T=f===void 0?0:f,S=il(typeof T!="number"?T:nl(T,Ba)),C=A===_a?qo:_a,E=a.rects.popper,L=a.elements[u?C:A],O=Zc(fa(L)?L:L.contextElement||Je(a.elements.popper),m,g,c),q=Ia(a.elements.reference),l=ol({reference:q,element:E,placement:s}),W=Ji(Object.assign({},E,l)),k=A===_a?W:q,z={top:O.top-k.top+S.top,bottom:k.bottom-O.bottom+S.bottom,left:O.left-k.left+S.left,right:k.right-O.right+S.right},G=a.modifiersData.offset;if(A===_a&&G){var j=G[s];Object.keys(z).forEach(function(I){var X=[oe,se].indexOf(I)>=0?1:-1,J=[Xt,se].indexOf(I)>=0?"y":"x";z[I]+=j[J]*X})}return z}function Xc(a,t){t===void 0&&(t={});var e=t,n=e.placement,s=e.boundary,o=e.rootBoundary,c=e.padding,p=e.flipVariations,m=e.allowedAutoPlacements,M=m===void 0?o2:m,g=Na(n),w=g?p?Ki:Ki.filter(function(u){return Na(u)===g}):Ba,A=w.filter(function(u){return M.indexOf(u)>=0});A.length===0&&(A=w);var b=A.reduce(function(u,f){return u[f]=za(a,{placement:f,boundary:s,rootBoundary:o,padding:c})[Ve(f)],u},{});return Object.keys(b).sort(function(u,f){return b[u]-b[f]})}function Uc(a){if(Ve(a)===j1)return[];var t=O1(a);return[fn(a),t,fn(t)]}function Yc(a){var t=a.state,e=a.options,n=a.name;if(!t.modifiersData[n]._skip){for(var s=e.mainAxis,o=s===void 0?!0:s,c=e.altAxis,p=c===void 0?!0:c,m=e.fallbackPlacements,M=e.padding,g=e.boundary,w=e.rootBoundary,A=e.altBoundary,b=e.flipVariations,u=b===void 0?!0:b,f=e.allowedAutoPlacements,T=t.options.placement,S=Ve(T),C=S===T,E=m||(C||!u?[O1(T)]:Uc(T)),L=[T].concat(E).reduce(function(jt,tt){return jt.concat(Ve(tt)===j1?Xc(t,{placement:tt,boundary:g,rootBoundary:w,padding:M,flipVariations:u,allowedAutoPlacements:f}):tt)},[]),O=t.rects.reference,q=t.rects.popper,l=new Map,W=!0,k=L[0],z=0;z<L.length;z++){var G=L[z],j=Ve(G),I=Na(G)===ua,X=[Xt,se].indexOf(j)>=0,J=X?"width":"height",Q=za(t,{placement:G,boundary:g,rootBoundary:w,altBoundary:A,padding:M}),N=X?I?oe:Ut:I?se:Xt;O[J]>q[J]&&(N=O1(N));var B=O1(N),at=[];if(o&&at.push(Q[j]<=0),p&&at.push(Q[N]<=0,Q[B]<=0),at.every(function(jt){return jt})){k=G,W=!1;break}l.set(G,at)}if(W)for(var pt=u?3:1,St=function(tt){var K=L.find(function(nt){var mt=l.get(nt);if(mt)return mt.slice(0,tt).every(function(Ht){return Ht})});if(K)return k=K,"break"},At=pt;At>0;At--){var Ot=St(At);if(Ot==="break")break}t.placement!==k&&(t.modifiersData[n]._skip=!0,t.placement=k,t.reset=!0)}}const ll={name:"flip",enabled:!0,phase:"main",fn:Yc,requiresIfExists:["offset"],data:{_skip:!1}};function mn(a,t,e){return e===void 0&&(e={x:0,y:0}),{top:a.top-t.height-e.y,right:a.right-t.width+e.x,bottom:a.bottom-t.height+e.y,left:a.left-t.width-e.x}}function vn(a){return[Xt,oe,se,Ut].some(function(t){return a[t]>=0})}function Kc(a){var t=a.state,e=a.name,n=t.rects.reference,s=t.rects.popper,o=t.modifiersData.preventOverflow,c=za(t,{elementContext:"reference"}),p=za(t,{altBoundary:!0}),m=mn(c,n),M=mn(p,s,o),g=vn(m),w=vn(M);t.modifiersData[e]={referenceClippingOffsets:m,popperEscapeOffsets:M,isReferenceHidden:g,hasPopperEscaped:w},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":g,"data-popper-escaped":w})}const hl={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:Kc};function Qc(a,t,e){var n=Ve(a),s=[Ut,Xt].indexOf(n)>=0?-1:1,o=typeof e=="function"?e(Object.assign({},t,{placement:a})):e,c=o[0],p=o[1];return c=c||0,p=(p||0)*s,[Ut,oe].indexOf(n)>=0?{x:p,y:c}:{x:c,y:p}}function Jc(a){var t=a.state,e=a.options,n=a.name,s=e.offset,o=s===void 0?[0,0]:s,c=o2.reduce(function(g,w){return g[w]=Qc(w,t.rects,o),g},{}),p=c[t.placement],m=p.x,M=p.y;t.modifiersData.popperOffsets!=null&&(t.modifiersData.popperOffsets.x+=m,t.modifiersData.popperOffsets.y+=M),t.modifiersData[n]=c}const dl={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:Jc};function tp(a){var t=a.state,e=a.name;t.modifiersData[e]=ol({reference:t.rects.reference,element:t.rects.popper,placement:t.placement})}const v2={name:"popperOffsets",enabled:!0,phase:"read",fn:tp,data:{}};function ep(a){return a==="x"?"y":"x"}function ap(a){var t=a.state,e=a.options,n=a.name,s=e.mainAxis,o=s===void 0?!0:s,c=e.altAxis,p=c===void 0?!1:c,m=e.boundary,M=e.rootBoundary,g=e.altBoundary,w=e.padding,A=e.tether,b=A===void 0?!0:A,u=e.tetherOffset,f=u===void 0?0:u,T=za(t,{boundary:m,rootBoundary:M,padding:w,altBoundary:g}),S=Ve(t.placement),C=Na(t.placement),E=!C,L=c2(S),O=ep(L),q=t.modifiersData.popperOffsets,l=t.rects.reference,W=t.rects.popper,k=typeof f=="function"?f(Object.assign({},t.rects,{placement:t.placement})):f,z=typeof k=="number"?{mainAxis:k,altAxis:k}:Object.assign({mainAxis:0,altAxis:0},k),G=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,j={x:0,y:0};if(q){if(o){var I,X=L==="y"?Xt:Ut,J=L==="y"?se:oe,Q=L==="y"?"height":"width",N=q[L],B=N+T[X],at=N-T[J],pt=b?-W[Q]/2:0,St=C===ua?l[Q]:W[Q],At=C===ua?-W[Q]:-l[Q],Ot=t.elements.arrow,jt=b&&Ot?d2(Ot):{width:0,height:0},tt=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:al(),K=tt[X],nt=tt[J],mt=r1(0,l[Q],jt[Q]),Ht=E?l[Q]/2-pt-mt-K-z.mainAxis:St-mt-K-z.mainAxis,Vt=E?-l[Q]/2+pt+mt+nt+z.mainAxis:At+mt+nt+z.mainAxis,Yt=t.elements.arrow&&d1(t.elements.arrow),It=Yt?L==="y"?Yt.clientTop||0:Yt.clientLeft||0:0,Ft=(I=G==null?void 0:G[L])!=null?I:0,Pt=N+Ht-Ft-It,Gt=N+Vt-Ft,he=r1(b?$1(B,Pt):B,N,b?pa(at,Gt):at);q[L]=he,j[L]=he-N}if(p){var de,Nt=L==="x"?Xt:Ut,Ce=L==="x"?se:oe,Kt=q[O],xe=O==="y"?"height":"width",$t=Kt+T[Nt],ce=Kt-T[Ce],ie=[Xt,Ut].indexOf(S)!==-1,lt=(de=G==null?void 0:G[O])!=null?de:0,Dt=ie?$t:Kt-l[xe]-W[xe]-lt+z.altAxis,we=ie?Kt+l[xe]+W[xe]-lt-z.altAxis:ce,aa=b&&ie?Dc(Dt,Kt,we):r1(b?Dt:$t,Kt,b?we:ce);q[O]=aa,j[O]=aa-Kt}t.modifiersData[n]=j}}const cl={name:"preventOverflow",enabled:!0,phase:"main",fn:ap,requiresIfExists:["offset"]};function ip(a){return{scrollLeft:a.scrollLeft,scrollTop:a.scrollTop}}function np(a){return a===le(a)||!me(a)?f2(a):ip(a)}function rp(a){var t=a.getBoundingClientRect(),e=ka(t.width)/a.offsetWidth||1,n=ka(t.height)/a.offsetHeight||1;return e!==1||n!==1}function sp(a,t,e){e===void 0&&(e=!1);var n=me(t),s=me(t)&&rp(t),o=Je(t),c=Ia(a,s,e),p={scrollLeft:0,scrollTop:0},m={x:0,y:0};return(n||!n&&!e)&&((De(t)!=="body"||m2(o))&&(p=np(t)),me(t)?(m=Ia(t,!0),m.x+=t.clientLeft,m.y+=t.clientTop):o&&(m.x=M2(o))),{x:c.left+p.scrollLeft-m.x,y:c.top+p.scrollTop-m.y,width:c.width,height:c.height}}function op(a){var t=new Map,e=new Set,n=[];a.forEach(function(o){t.set(o.name,o)});function s(o){e.add(o.name);var c=[].concat(o.requires||[],o.requiresIfExists||[]);c.forEach(function(p){if(!e.has(p)){var m=t.get(p);m&&s(m)}}),n.push(o)}return a.forEach(function(o){e.has(o.name)||s(o)}),n}function lp(a){var t=op(a);return Jo.reduce(function(e,n){return e.concat(t.filter(function(s){return s.phase===n}))},[])}function hp(a){var t;return function(){return t||(t=new Promise(function(e){Promise.resolve().then(function(){t=void 0,e(a())})})),t}}function dp(a){var t=a.reduce(function(e,n){var s=e[n.name];return e[n.name]=s?Object.assign({},s,n,{options:Object.assign({},s.options,n.options),data:Object.assign({},s.data,n.data)}):n,e},{});return Object.keys(t).map(function(e){return t[e]})}var gn={placement:"bottom",modifiers:[],strategy:"absolute"};function yn(){for(var a=arguments.length,t=new Array(a),e=0;e<a;e++)t[e]=arguments[e];return!t.some(function(n){return!(n&&typeof n.getBoundingClientRect=="function")})}function Z1(a){a===void 0&&(a={});var t=a,e=t.defaultModifiers,n=e===void 0?[]:e,s=t.defaultOptions,o=s===void 0?gn:s;return function(p,m,M){M===void 0&&(M=o);var g={placement:"bottom",orderedModifiers:[],options:Object.assign({},gn,o),modifiersData:{},elements:{reference:p,popper:m},attributes:{},styles:{}},w=[],A=!1,b={state:g,setOptions:function(S){var C=typeof S=="function"?S(g.options):S;f(),g.options=Object.assign({},o,g.options,C),g.scrollParents={reference:fa(p)?s1(p):p.contextElement?s1(p.contextElement):[],popper:s1(m)};var E=lp(dp([].concat(n,g.options.modifiers)));return g.orderedModifiers=E.filter(function(L){return L.enabled}),u(),b.update()},forceUpdate:function(){if(!A){var S=g.elements,C=S.reference,E=S.popper;if(yn(C,E)){g.rects={reference:sp(C,d1(E),g.options.strategy==="fixed"),popper:d2(E)},g.reset=!1,g.placement=g.options.placement,g.orderedModifiers.forEach(function(z){return g.modifiersData[z.name]=Object.assign({},z.data)});for(var L=0;L<g.orderedModifiers.length;L++){if(g.reset===!0){g.reset=!1,L=-1;continue}var O=g.orderedModifiers[L],q=O.fn,l=O.options,W=l===void 0?{}:l,k=O.name;typeof q=="function"&&(g=q({state:g,options:W,name:k,instance:b})||g)}}}},update:hp(function(){return new Promise(function(T){b.forceUpdate(),T(g)})}),destroy:function(){f(),A=!0}};if(!yn(p,m))return b;b.setOptions(M).then(function(T){!A&&M.onFirstUpdate&&M.onFirstUpdate(T)});function u(){g.orderedModifiers.forEach(function(T){var S=T.name,C=T.options,E=C===void 0?{}:C,L=T.effect;if(typeof L=="function"){var O=L({state:g,name:S,instance:b,options:E}),q=function(){};w.push(O||q)}})}function f(){w.forEach(function(T){return T()}),w=[]}return b}}var cp=Z1(),pp=[u2,v2,p2,h2],up=Z1({defaultModifiers:pp}),fp=[u2,v2,p2,h2,dl,ll,cl,rl,hl],g2=Z1({defaultModifiers:fp});const pl=Object.freeze(Object.defineProperty({__proto__:null,afterMain:Uo,afterRead:Go,afterWrite:Qo,applyStyles:h2,arrow:rl,auto:j1,basePlacements:Ba,beforeMain:Zo,beforeRead:Wo,beforeWrite:Yo,bottom:se,clippingParents:Fo,computeStyles:p2,createPopper:g2,createPopperBase:cp,createPopperLite:up,detectOverflow:za,end:Oa,eventListeners:u2,flip:ll,hide:hl,left:Ut,main:Xo,modifierPhases:Jo,offset:dl,placements:o2,popper:_a,popperGenerator:Z1,popperOffsets:v2,preventOverflow:cl,read:jo,reference:qo,right:oe,start:ua,top:Xt,variationPlacements:Ki,viewport:s2,write:Ko},Symbol.toStringTag,{value:"Module"}));/*!
  * Bootstrap v5.3.7 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */const Ge=new Map,Ti={set(a,t,e){Ge.has(a)||Ge.set(a,new Map);const n=Ge.get(a);if(!n.has(t)&&n.size!==0){console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(n.keys())[0]}.`);return}n.set(t,e)},get(a,t){return Ge.has(a)&&Ge.get(a).get(t)||null},remove(a,t){if(!Ge.has(a))return;const e=Ge.get(a);e.delete(t),e.size===0&&Ge.delete(a)}},Mp=1e6,mp=1e3,t2="transitionend",ul=a=>(a&&window.CSS&&window.CSS.escape&&(a=a.replace(/#([^\s"#']+)/g,(t,e)=>`#${CSS.escape(e)}`)),a),vp=a=>a==null?`${a}`:Object.prototype.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase(),gp=a=>{do a+=Math.floor(Math.random()*Mp);while(document.getElementById(a));return a},yp=a=>{if(!a)return 0;let{transitionDuration:t,transitionDelay:e}=window.getComputedStyle(a);const n=Number.parseFloat(t),s=Number.parseFloat(e);return!n&&!s?0:(t=t.split(",")[0],e=e.split(",")[0],(Number.parseFloat(t)+Number.parseFloat(e))*mp)},fl=a=>{a.dispatchEvent(new Event(t2))},ze=a=>!a||typeof a!="object"?!1:(typeof a.jquery<"u"&&(a=a[0]),typeof a.nodeType<"u"),Ue=a=>ze(a)?a.jquery?a[0]:a:typeof a=="string"&&a.length>0?document.querySelector(ul(a)):null,Fa=a=>{if(!ze(a)||a.getClientRects().length===0)return!1;const t=getComputedStyle(a).getPropertyValue("visibility")==="visible",e=a.closest("details:not([open])");if(!e)return t;if(e!==a){const n=a.closest("summary");if(n&&n.parentNode!==e||n===null)return!1}return t},Ye=a=>!a||a.nodeType!==Node.ELEMENT_NODE||a.classList.contains("disabled")?!0:typeof a.disabled<"u"?a.disabled:a.hasAttribute("disabled")&&a.getAttribute("disabled")!=="false",Ml=a=>{if(!document.documentElement.attachShadow)return null;if(typeof a.getRootNode=="function"){const t=a.getRootNode();return t instanceof ShadowRoot?t:null}return a instanceof ShadowRoot?a:a.parentNode?Ml(a.parentNode):null},R1=()=>{},c1=a=>{a.offsetHeight},ml=()=>window.jQuery&&!document.body.hasAttribute("data-bs-no-jquery")?window.jQuery:null,_i=[],xp=a=>{document.readyState==="loading"?(_i.length||document.addEventListener("DOMContentLoaded",()=>{for(const t of _i)t()}),_i.push(a)):a()},ve=()=>document.documentElement.dir==="rtl",ye=a=>{xp(()=>{const t=ml();if(t){const e=a.NAME,n=t.fn[e];t.fn[e]=a.jQueryInterface,t.fn[e].Constructor=a,t.fn[e].noConflict=()=>(t.fn[e]=n,a.jQueryInterface)}})},ae=(a,t=[],e=a)=>typeof a=="function"?a.call(...t):e,vl=(a,t,e=!0)=>{if(!e){ae(a);return}const s=yp(t)+5;let o=!1;const c=({target:p})=>{p===t&&(o=!0,t.removeEventListener(t2,c),ae(a))};t.addEventListener(t2,c),setTimeout(()=>{o||fl(t)},s)},y2=(a,t,e,n)=>{const s=a.length;let o=a.indexOf(t);return o===-1?!e&&n?a[s-1]:a[0]:(o+=e?1:-1,n&&(o=(o+s)%s),a[Math.max(0,Math.min(o,s-1))])},wp=/[^.]*(?=\..*)\.|.*/,bp=/\..*/,Ep=/::\d+$/,Hi={};let xn=1;const gl={mouseenter:"mouseover",mouseleave:"mouseout"},Sp=new Set(["click","dblclick","mouseup","mousedown","contextmenu","mousewheel","DOMMouseScroll","mouseover","mouseout","mousemove","selectstart","selectend","keydown","keypress","keyup","orientationchange","touchstart","touchmove","touchend","touchcancel","pointerdown","pointermove","pointerup","pointerleave","pointercancel","gesturestart","gesturechange","gestureend","focus","blur","change","reset","select","submit","focusin","focusout","load","unload","beforeunload","resize","move","DOMContentLoaded","readystatechange","error","abort","scroll"]);function yl(a,t){return t&&`${t}::${xn++}`||a.uidEvent||xn++}function xl(a){const t=yl(a);return a.uidEvent=t,Hi[t]=Hi[t]||{},Hi[t]}function Cp(a,t){return function e(n){return x2(n,{delegateTarget:a}),e.oneOff&&et.off(a,n.type,t),t.apply(a,[n])}}function Ap(a,t,e){return function n(s){const o=a.querySelectorAll(t);for(let{target:c}=s;c&&c!==this;c=c.parentNode)for(const p of o)if(p===c)return x2(s,{delegateTarget:c}),n.oneOff&&et.off(a,s.type,t,e),e.apply(c,[s])}}function wl(a,t,e=null){return Object.values(a).find(n=>n.callable===t&&n.delegationSelector===e)}function bl(a,t,e){const n=typeof t=="string",s=n?e:t||e;let o=El(a);return Sp.has(o)||(o=a),[n,s,o]}function wn(a,t,e,n,s){if(typeof t!="string"||!a)return;let[o,c,p]=bl(t,e,n);t in gl&&(c=(u=>function(f){if(!f.relatedTarget||f.relatedTarget!==f.delegateTarget&&!f.delegateTarget.contains(f.relatedTarget))return u.call(this,f)})(c));const m=xl(a),M=m[p]||(m[p]={}),g=wl(M,c,o?e:null);if(g){g.oneOff=g.oneOff&&s;return}const w=yl(c,t.replace(wp,"")),A=o?Ap(a,e,c):Cp(a,c);A.delegationSelector=o?e:null,A.callable=c,A.oneOff=s,A.uidEvent=w,M[w]=A,a.addEventListener(p,A,o)}function e2(a,t,e,n,s){const o=wl(t[e],n,s);o&&(a.removeEventListener(e,o,!!s),delete t[e][o.uidEvent])}function Tp(a,t,e,n){const s=t[e]||{};for(const[o,c]of Object.entries(s))o.includes(n)&&e2(a,t,e,c.callable,c.delegationSelector)}function El(a){return a=a.replace(bp,""),gl[a]||a}const et={on(a,t,e,n){wn(a,t,e,n,!1)},one(a,t,e,n){wn(a,t,e,n,!0)},off(a,t,e,n){if(typeof t!="string"||!a)return;const[s,o,c]=bl(t,e,n),p=c!==t,m=xl(a),M=m[c]||{},g=t.startsWith(".");if(typeof o<"u"){if(!Object.keys(M).length)return;e2(a,m,c,o,s?e:null);return}if(g)for(const w of Object.keys(m))Tp(a,m,w,t.slice(1));for(const[w,A]of Object.entries(M)){const b=w.replace(Ep,"");(!p||t.includes(b))&&e2(a,m,c,A.callable,A.delegationSelector)}},trigger(a,t,e){if(typeof t!="string"||!a)return null;const n=ml(),s=El(t),o=t!==s;let c=null,p=!0,m=!0,M=!1;o&&n&&(c=n.Event(t,e),n(a).trigger(c),p=!c.isPropagationStopped(),m=!c.isImmediatePropagationStopped(),M=c.isDefaultPrevented());const g=x2(new Event(t,{bubbles:p,cancelable:!0}),e);return M&&g.preventDefault(),m&&a.dispatchEvent(g),g.defaultPrevented&&c&&c.preventDefault(),g}};function x2(a,t={}){for(const[e,n]of Object.entries(t))try{a[e]=n}catch{Object.defineProperty(a,e,{configurable:!0,get(){return n}})}return a}function bn(a){if(a==="true")return!0;if(a==="false")return!1;if(a===Number(a).toString())return Number(a);if(a===""||a==="null")return null;if(typeof a!="string")return a;try{return JSON.parse(decodeURIComponent(a))}catch{return a}}function Li(a){return a.replace(/[A-Z]/g,t=>`-${t.toLowerCase()}`)}const $e={setDataAttribute(a,t,e){a.setAttribute(`data-bs-${Li(t)}`,e)},removeDataAttribute(a,t){a.removeAttribute(`data-bs-${Li(t)}`)},getDataAttributes(a){if(!a)return{};const t={},e=Object.keys(a.dataset).filter(n=>n.startsWith("bs")&&!n.startsWith("bsConfig"));for(const n of e){let s=n.replace(/^bs/,"");s=s.charAt(0).toLowerCase()+s.slice(1),t[s]=bn(a.dataset[n])}return t},getDataAttribute(a,t){return bn(a.getAttribute(`data-bs-${Li(t)}`))}};class p1{static get Default(){return{}}static get DefaultType(){return{}}static get NAME(){throw new Error('You have to implement the static method "NAME", for each component!')}_getConfig(t){return t=this._mergeConfigObj(t),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}_configAfterMerge(t){return t}_mergeConfigObj(t,e){const n=ze(e)?$e.getDataAttribute(e,"config"):{};return{...this.constructor.Default,...typeof n=="object"?n:{},...ze(e)?$e.getDataAttributes(e):{},...typeof t=="object"?t:{}}}_typeCheckConfig(t,e=this.constructor.DefaultType){for(const[n,s]of Object.entries(e)){const o=t[n],c=ze(o)?"element":vp(o);if(!new RegExp(s).test(c))throw new TypeError(`${this.constructor.NAME.toUpperCase()}: Option "${n}" provided type "${c}" but expected type "${s}".`)}}}const _p="5.3.7";class Se extends p1{constructor(t,e){super(),t=Ue(t),t&&(this._element=t,this._config=this._getConfig(e),Ti.set(this._element,this.constructor.DATA_KEY,this))}dispose(){Ti.remove(this._element,this.constructor.DATA_KEY),et.off(this._element,this.constructor.EVENT_KEY);for(const t of Object.getOwnPropertyNames(this))this[t]=null}_queueCallback(t,e,n=!0){vl(t,e,n)}_getConfig(t){return t=this._mergeConfigObj(t,this._element),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}static getInstance(t){return Ti.get(Ue(t),this.DATA_KEY)}static getOrCreateInstance(t,e={}){return this.getInstance(t)||new this(t,typeof e=="object"?e:null)}static get VERSION(){return _p}static get DATA_KEY(){return`bs.${this.NAME}`}static get EVENT_KEY(){return`.${this.DATA_KEY}`}static eventName(t){return`${t}${this.EVENT_KEY}`}}const Vi=a=>{let t=a.getAttribute("data-bs-target");if(!t||t==="#"){let e=a.getAttribute("href");if(!e||!e.includes("#")&&!e.startsWith("."))return null;e.includes("#")&&!e.startsWith("#")&&(e=`#${e.split("#")[1]}`),t=e&&e!=="#"?e.trim():null}return t?t.split(",").map(e=>ul(e)).join(","):null},dt={find(a,t=document.documentElement){return[].concat(...Element.prototype.querySelectorAll.call(t,a))},findOne(a,t=document.documentElement){return Element.prototype.querySelector.call(t,a)},children(a,t){return[].concat(...a.children).filter(e=>e.matches(t))},parents(a,t){const e=[];let n=a.parentNode.closest(t);for(;n;)e.push(n),n=n.parentNode.closest(t);return e},prev(a,t){let e=a.previousElementSibling;for(;e;){if(e.matches(t))return[e];e=e.previousElementSibling}return[]},next(a,t){let e=a.nextElementSibling;for(;e;){if(e.matches(t))return[e];e=e.nextElementSibling}return[]},focusableChildren(a){const t=["a","button","input","textarea","select","details","[tabindex]",'[contenteditable="true"]'].map(e=>`${e}:not([tabindex^="-"])`).join(",");return this.find(t,a).filter(e=>!Ye(e)&&Fa(e))},getSelectorFromElement(a){const t=Vi(a);return t&&dt.findOne(t)?t:null},getElementFromSelector(a){const t=Vi(a);return t?dt.findOne(t):null},getMultipleElementsFromSelector(a){const t=Vi(a);return t?dt.find(t):[]}},X1=(a,t="hide")=>{const e=`click.dismiss${a.EVENT_KEY}`,n=a.NAME;et.on(document,e,`[data-bs-dismiss="${n}"]`,function(s){if(["A","AREA"].includes(this.tagName)&&s.preventDefault(),Ye(this))return;const o=dt.getElementFromSelector(this)||this.closest(`.${n}`);a.getOrCreateInstance(o)[t]()})},Hp="alert",Lp="bs.alert",Sl=`.${Lp}`,Vp=`close${Sl}`,Pp=`closed${Sl}`,Dp="fade",Op="show";class U1 extends Se{static get NAME(){return Hp}close(){if(et.trigger(this._element,Vp).defaultPrevented)return;this._element.classList.remove(Op);const e=this._element.classList.contains(Dp);this._queueCallback(()=>this._destroyElement(),this._element,e)}_destroyElement(){this._element.remove(),et.trigger(this._element,Pp),this.dispose()}static jQueryInterface(t){return this.each(function(){const e=U1.getOrCreateInstance(this);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}X1(U1,"close");ye(U1);const kp="button",Ip="bs.button",Np=`.${Ip}`,zp=".data-api",$p="active",En='[data-bs-toggle="button"]',Rp=`click${Np}${zp}`;class Y1 extends Se{static get NAME(){return kp}toggle(){this._element.setAttribute("aria-pressed",this._element.classList.toggle($p))}static jQueryInterface(t){return this.each(function(){const e=Y1.getOrCreateInstance(this);t==="toggle"&&e[t]()})}}et.on(document,Rp,En,a=>{a.preventDefault();const t=a.target.closest(En);Y1.getOrCreateInstance(t).toggle()});ye(Y1);const Bp="swipe",qa=".bs.swipe",Fp=`touchstart${qa}`,qp=`touchmove${qa}`,Wp=`touchend${qa}`,jp=`pointerdown${qa}`,Gp=`pointerup${qa}`,Zp="touch",Xp="pen",Up="pointer-event",Yp=40,Kp={endCallback:null,leftCallback:null,rightCallback:null},Qp={endCallback:"(function|null)",leftCallback:"(function|null)",rightCallback:"(function|null)"};class B1 extends p1{constructor(t,e){super(),this._element=t,!(!t||!B1.isSupported())&&(this._config=this._getConfig(e),this._deltaX=0,this._supportPointerEvents=!!window.PointerEvent,this._initEvents())}static get Default(){return Kp}static get DefaultType(){return Qp}static get NAME(){return Bp}dispose(){et.off(this._element,qa)}_start(t){if(!this._supportPointerEvents){this._deltaX=t.touches[0].clientX;return}this._eventIsPointerPenTouch(t)&&(this._deltaX=t.clientX)}_end(t){this._eventIsPointerPenTouch(t)&&(this._deltaX=t.clientX-this._deltaX),this._handleSwipe(),ae(this._config.endCallback)}_move(t){this._deltaX=t.touches&&t.touches.length>1?0:t.touches[0].clientX-this._deltaX}_handleSwipe(){const t=Math.abs(this._deltaX);if(t<=Yp)return;const e=t/this._deltaX;this._deltaX=0,e&&ae(e>0?this._config.rightCallback:this._config.leftCallback)}_initEvents(){this._supportPointerEvents?(et.on(this._element,jp,t=>this._start(t)),et.on(this._element,Gp,t=>this._end(t)),this._element.classList.add(Up)):(et.on(this._element,Fp,t=>this._start(t)),et.on(this._element,qp,t=>this._move(t)),et.on(this._element,Wp,t=>this._end(t)))}_eventIsPointerPenTouch(t){return this._supportPointerEvents&&(t.pointerType===Xp||t.pointerType===Zp)}static isSupported(){return"ontouchstart"in document.documentElement||navigator.maxTouchPoints>0}}const Jp="carousel",tu="bs.carousel",ta=`.${tu}`,Cl=".data-api",eu="ArrowLeft",au="ArrowRight",iu=500,t1="next",Aa="prev",Ha="left",k1="right",nu=`slide${ta}`,Pi=`slid${ta}`,ru=`keydown${ta}`,su=`mouseenter${ta}`,ou=`mouseleave${ta}`,lu=`dragstart${ta}`,hu=`load${ta}${Cl}`,du=`click${ta}${Cl}`,Al="carousel",C1="active",cu="slide",pu="carousel-item-end",uu="carousel-item-start",fu="carousel-item-next",Mu="carousel-item-prev",Tl=".active",_l=".carousel-item",mu=Tl+_l,vu=".carousel-item img",gu=".carousel-indicators",yu="[data-bs-slide], [data-bs-slide-to]",xu='[data-bs-ride="carousel"]',wu={[eu]:k1,[au]:Ha},bu={interval:5e3,keyboard:!0,pause:"hover",ride:!1,touch:!0,wrap:!0},Eu={interval:"(number|boolean)",keyboard:"boolean",pause:"(string|boolean)",ride:"(boolean|string)",touch:"boolean",wrap:"boolean"};class u1 extends Se{constructor(t,e){super(t,e),this._interval=null,this._activeElement=null,this._isSliding=!1,this.touchTimeout=null,this._swipeHelper=null,this._indicatorsElement=dt.findOne(gu,this._element),this._addEventListeners(),this._config.ride===Al&&this.cycle()}static get Default(){return bu}static get DefaultType(){return Eu}static get NAME(){return Jp}next(){this._slide(t1)}nextWhenVisible(){!document.hidden&&Fa(this._element)&&this.next()}prev(){this._slide(Aa)}pause(){this._isSliding&&fl(this._element),this._clearInterval()}cycle(){this._clearInterval(),this._updateInterval(),this._interval=setInterval(()=>this.nextWhenVisible(),this._config.interval)}_maybeEnableCycle(){if(this._config.ride){if(this._isSliding){et.one(this._element,Pi,()=>this.cycle());return}this.cycle()}}to(t){const e=this._getItems();if(t>e.length-1||t<0)return;if(this._isSliding){et.one(this._element,Pi,()=>this.to(t));return}const n=this._getItemIndex(this._getActive());if(n===t)return;const s=t>n?t1:Aa;this._slide(s,e[t])}dispose(){this._swipeHelper&&this._swipeHelper.dispose(),super.dispose()}_configAfterMerge(t){return t.defaultInterval=t.interval,t}_addEventListeners(){this._config.keyboard&&et.on(this._element,ru,t=>this._keydown(t)),this._config.pause==="hover"&&(et.on(this._element,su,()=>this.pause()),et.on(this._element,ou,()=>this._maybeEnableCycle())),this._config.touch&&B1.isSupported()&&this._addTouchEventListeners()}_addTouchEventListeners(){for(const n of dt.find(vu,this._element))et.on(n,lu,s=>s.preventDefault());const e={leftCallback:()=>this._slide(this._directionToOrder(Ha)),rightCallback:()=>this._slide(this._directionToOrder(k1)),endCallback:()=>{this._config.pause==="hover"&&(this.pause(),this.touchTimeout&&clearTimeout(this.touchTimeout),this.touchTimeout=setTimeout(()=>this._maybeEnableCycle(),iu+this._config.interval))}};this._swipeHelper=new B1(this._element,e)}_keydown(t){if(/input|textarea/i.test(t.target.tagName))return;const e=wu[t.key];e&&(t.preventDefault(),this._slide(this._directionToOrder(e)))}_getItemIndex(t){return this._getItems().indexOf(t)}_setActiveIndicatorElement(t){if(!this._indicatorsElement)return;const e=dt.findOne(Tl,this._indicatorsElement);e.classList.remove(C1),e.removeAttribute("aria-current");const n=dt.findOne(`[data-bs-slide-to="${t}"]`,this._indicatorsElement);n&&(n.classList.add(C1),n.setAttribute("aria-current","true"))}_updateInterval(){const t=this._activeElement||this._getActive();if(!t)return;const e=Number.parseInt(t.getAttribute("data-bs-interval"),10);this._config.interval=e||this._config.defaultInterval}_slide(t,e=null){if(this._isSliding)return;const n=this._getActive(),s=t===t1,o=e||y2(this._getItems(),n,s,this._config.wrap);if(o===n)return;const c=this._getItemIndex(o),p=b=>et.trigger(this._element,b,{relatedTarget:o,direction:this._orderToDirection(t),from:this._getItemIndex(n),to:c});if(p(nu).defaultPrevented||!n||!o)return;const M=!!this._interval;this.pause(),this._isSliding=!0,this._setActiveIndicatorElement(c),this._activeElement=o;const g=s?uu:pu,w=s?fu:Mu;o.classList.add(w),c1(o),n.classList.add(g),o.classList.add(g);const A=()=>{o.classList.remove(g,w),o.classList.add(C1),n.classList.remove(C1,w,g),this._isSliding=!1,p(Pi)};this._queueCallback(A,n,this._isAnimated()),M&&this.cycle()}_isAnimated(){return this._element.classList.contains(cu)}_getActive(){return dt.findOne(mu,this._element)}_getItems(){return dt.find(_l,this._element)}_clearInterval(){this._interval&&(clearInterval(this._interval),this._interval=null)}_directionToOrder(t){return ve()?t===Ha?Aa:t1:t===Ha?t1:Aa}_orderToDirection(t){return ve()?t===Aa?Ha:k1:t===Aa?k1:Ha}static jQueryInterface(t){return this.each(function(){const e=u1.getOrCreateInstance(this,t);if(typeof t=="number"){e.to(t);return}if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(document,du,yu,function(a){const t=dt.getElementFromSelector(this);if(!t||!t.classList.contains(Al))return;a.preventDefault();const e=u1.getOrCreateInstance(t),n=this.getAttribute("data-bs-slide-to");if(n){e.to(n),e._maybeEnableCycle();return}if($e.getDataAttribute(this,"slide")==="next"){e.next(),e._maybeEnableCycle();return}e.prev(),e._maybeEnableCycle()});et.on(window,hu,()=>{const a=dt.find(xu);for(const t of a)u1.getOrCreateInstance(t)});ye(u1);const Su="collapse",Cu="bs.collapse",f1=`.${Cu}`,Au=".data-api",Tu=`show${f1}`,_u=`shown${f1}`,Hu=`hide${f1}`,Lu=`hidden${f1}`,Vu=`click${f1}${Au}`,Di="show",Va="collapse",A1="collapsing",Pu="collapsed",Du=`:scope .${Va} .${Va}`,Ou="collapse-horizontal",ku="width",Iu="height",Nu=".collapse.show, .collapse.collapsing",a2='[data-bs-toggle="collapse"]',zu={parent:null,toggle:!0},$u={parent:"(null|element)",toggle:"boolean"};class l1 extends Se{constructor(t,e){super(t,e),this._isTransitioning=!1,this._triggerArray=[];const n=dt.find(a2);for(const s of n){const o=dt.getSelectorFromElement(s),c=dt.find(o).filter(p=>p===this._element);o!==null&&c.length&&this._triggerArray.push(s)}this._initializeChildren(),this._config.parent||this._addAriaAndCollapsedClass(this._triggerArray,this._isShown()),this._config.toggle&&this.toggle()}static get Default(){return zu}static get DefaultType(){return $u}static get NAME(){return Su}toggle(){this._isShown()?this.hide():this.show()}show(){if(this._isTransitioning||this._isShown())return;let t=[];if(this._config.parent&&(t=this._getFirstLevelChildren(Nu).filter(p=>p!==this._element).map(p=>l1.getOrCreateInstance(p,{toggle:!1}))),t.length&&t[0]._isTransitioning||et.trigger(this._element,Tu).defaultPrevented)return;for(const p of t)p.hide();const n=this._getDimension();this._element.classList.remove(Va),this._element.classList.add(A1),this._element.style[n]=0,this._addAriaAndCollapsedClass(this._triggerArray,!0),this._isTransitioning=!0;const s=()=>{this._isTransitioning=!1,this._element.classList.remove(A1),this._element.classList.add(Va,Di),this._element.style[n]="",et.trigger(this._element,_u)},c=`scroll${n[0].toUpperCase()+n.slice(1)}`;this._queueCallback(s,this._element,!0),this._element.style[n]=`${this._element[c]}px`}hide(){if(this._isTransitioning||!this._isShown()||et.trigger(this._element,Hu).defaultPrevented)return;const e=this._getDimension();this._element.style[e]=`${this._element.getBoundingClientRect()[e]}px`,c1(this._element),this._element.classList.add(A1),this._element.classList.remove(Va,Di);for(const s of this._triggerArray){const o=dt.getElementFromSelector(s);o&&!this._isShown(o)&&this._addAriaAndCollapsedClass([s],!1)}this._isTransitioning=!0;const n=()=>{this._isTransitioning=!1,this._element.classList.remove(A1),this._element.classList.add(Va),et.trigger(this._element,Lu)};this._element.style[e]="",this._queueCallback(n,this._element,!0)}_isShown(t=this._element){return t.classList.contains(Di)}_configAfterMerge(t){return t.toggle=!!t.toggle,t.parent=Ue(t.parent),t}_getDimension(){return this._element.classList.contains(Ou)?ku:Iu}_initializeChildren(){if(!this._config.parent)return;const t=this._getFirstLevelChildren(a2);for(const e of t){const n=dt.getElementFromSelector(e);n&&this._addAriaAndCollapsedClass([e],this._isShown(n))}}_getFirstLevelChildren(t){const e=dt.find(Du,this._config.parent);return dt.find(t,this._config.parent).filter(n=>!e.includes(n))}_addAriaAndCollapsedClass(t,e){if(t.length)for(const n of t)n.classList.toggle(Pu,!e),n.setAttribute("aria-expanded",e)}static jQueryInterface(t){const e={};return typeof t=="string"&&/show|hide/.test(t)&&(e.toggle=!1),this.each(function(){const n=l1.getOrCreateInstance(this,e);if(typeof t=="string"){if(typeof n[t]>"u")throw new TypeError(`No method named "${t}"`);n[t]()}})}}et.on(document,Vu,a2,function(a){(a.target.tagName==="A"||a.delegateTarget&&a.delegateTarget.tagName==="A")&&a.preventDefault();for(const t of dt.getMultipleElementsFromSelector(this))l1.getOrCreateInstance(t,{toggle:!1}).toggle()});ye(l1);const Sn="dropdown",Ru="bs.dropdown",ma=`.${Ru}`,w2=".data-api",Bu="Escape",Cn="Tab",Fu="ArrowUp",An="ArrowDown",qu=2,Wu=`hide${ma}`,ju=`hidden${ma}`,Gu=`show${ma}`,Zu=`shown${ma}`,Hl=`click${ma}${w2}`,Ll=`keydown${ma}${w2}`,Xu=`keyup${ma}${w2}`,La="show",Uu="dropup",Yu="dropend",Ku="dropstart",Qu="dropup-center",Ju="dropdown-center",ha='[data-bs-toggle="dropdown"]:not(.disabled):not(:disabled)',t4=`${ha}.${La}`,I1=".dropdown-menu",e4=".navbar",a4=".navbar-nav",i4=".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",n4=ve()?"top-end":"top-start",r4=ve()?"top-start":"top-end",s4=ve()?"bottom-end":"bottom-start",o4=ve()?"bottom-start":"bottom-end",l4=ve()?"left-start":"right-start",h4=ve()?"right-start":"left-start",d4="top",c4="bottom",p4={autoClose:!0,boundary:"clippingParents",display:"dynamic",offset:[0,2],popperConfig:null,reference:"toggle"},u4={autoClose:"(boolean|string)",boundary:"(string|element)",display:"string",offset:"(array|string|function)",popperConfig:"(null|object|function)",reference:"(string|element|object)"};class Pe extends Se{constructor(t,e){super(t,e),this._popper=null,this._parent=this._element.parentNode,this._menu=dt.next(this._element,I1)[0]||dt.prev(this._element,I1)[0]||dt.findOne(I1,this._parent),this._inNavbar=this._detectNavbar()}static get Default(){return p4}static get DefaultType(){return u4}static get NAME(){return Sn}toggle(){return this._isShown()?this.hide():this.show()}show(){if(Ye(this._element)||this._isShown())return;const t={relatedTarget:this._element};if(!et.trigger(this._element,Gu,t).defaultPrevented){if(this._createPopper(),"ontouchstart"in document.documentElement&&!this._parent.closest(a4))for(const n of[].concat(...document.body.children))et.on(n,"mouseover",R1);this._element.focus(),this._element.setAttribute("aria-expanded",!0),this._menu.classList.add(La),this._element.classList.add(La),et.trigger(this._element,Zu,t)}}hide(){if(Ye(this._element)||!this._isShown())return;const t={relatedTarget:this._element};this._completeHide(t)}dispose(){this._popper&&this._popper.destroy(),super.dispose()}update(){this._inNavbar=this._detectNavbar(),this._popper&&this._popper.update()}_completeHide(t){if(!et.trigger(this._element,Wu,t).defaultPrevented){if("ontouchstart"in document.documentElement)for(const n of[].concat(...document.body.children))et.off(n,"mouseover",R1);this._popper&&this._popper.destroy(),this._menu.classList.remove(La),this._element.classList.remove(La),this._element.setAttribute("aria-expanded","false"),$e.removeDataAttribute(this._menu,"popper"),et.trigger(this._element,ju,t),this._element.focus()}}_getConfig(t){if(t=super._getConfig(t),typeof t.reference=="object"&&!ze(t.reference)&&typeof t.reference.getBoundingClientRect!="function")throw new TypeError(`${Sn.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);return t}_createPopper(){if(typeof pl>"u")throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org/docs/v2/)");let t=this._element;this._config.reference==="parent"?t=this._parent:ze(this._config.reference)?t=Ue(this._config.reference):typeof this._config.reference=="object"&&(t=this._config.reference);const e=this._getPopperConfig();this._popper=g2(t,this._menu,e)}_isShown(){return this._menu.classList.contains(La)}_getPlacement(){const t=this._parent;if(t.classList.contains(Yu))return l4;if(t.classList.contains(Ku))return h4;if(t.classList.contains(Qu))return d4;if(t.classList.contains(Ju))return c4;const e=getComputedStyle(this._menu).getPropertyValue("--bs-position").trim()==="end";return t.classList.contains(Uu)?e?r4:n4:e?o4:s4}_detectNavbar(){return this._element.closest(e4)!==null}_getOffset(){const{offset:t}=this._config;return typeof t=="string"?t.split(",").map(e=>Number.parseInt(e,10)):typeof t=="function"?e=>t(e,this._element):t}_getPopperConfig(){const t={placement:this._getPlacement(),modifiers:[{name:"preventOverflow",options:{boundary:this._config.boundary}},{name:"offset",options:{offset:this._getOffset()}}]};return(this._inNavbar||this._config.display==="static")&&($e.setDataAttribute(this._menu,"popper","static"),t.modifiers=[{name:"applyStyles",enabled:!1}]),{...t,...ae(this._config.popperConfig,[void 0,t])}}_selectMenuItem({key:t,target:e}){const n=dt.find(i4,this._menu).filter(s=>Fa(s));n.length&&y2(n,e,t===An,!n.includes(e)).focus()}static jQueryInterface(t){return this.each(function(){const e=Pe.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}static clearMenus(t){if(t.button===qu||t.type==="keyup"&&t.key!==Cn)return;const e=dt.find(t4);for(const n of e){const s=Pe.getInstance(n);if(!s||s._config.autoClose===!1)continue;const o=t.composedPath(),c=o.includes(s._menu);if(o.includes(s._element)||s._config.autoClose==="inside"&&!c||s._config.autoClose==="outside"&&c||s._menu.contains(t.target)&&(t.type==="keyup"&&t.key===Cn||/input|select|option|textarea|form/i.test(t.target.tagName)))continue;const p={relatedTarget:s._element};t.type==="click"&&(p.clickEvent=t),s._completeHide(p)}}static dataApiKeydownHandler(t){const e=/input|textarea/i.test(t.target.tagName),n=t.key===Bu,s=[Fu,An].includes(t.key);if(!s&&!n||e&&!n)return;t.preventDefault();const o=this.matches(ha)?this:dt.prev(this,ha)[0]||dt.next(this,ha)[0]||dt.findOne(ha,t.delegateTarget.parentNode),c=Pe.getOrCreateInstance(o);if(s){t.stopPropagation(),c.show(),c._selectMenuItem(t);return}c._isShown()&&(t.stopPropagation(),c.hide(),o.focus())}}et.on(document,Ll,ha,Pe.dataApiKeydownHandler);et.on(document,Ll,I1,Pe.dataApiKeydownHandler);et.on(document,Hl,Pe.clearMenus);et.on(document,Xu,Pe.clearMenus);et.on(document,Hl,ha,function(a){a.preventDefault(),Pe.getOrCreateInstance(this).toggle()});ye(Pe);const Vl="backdrop",f4="fade",Tn="show",_n=`mousedown.bs.${Vl}`,M4={className:"modal-backdrop",clickCallback:null,isAnimated:!1,isVisible:!0,rootElement:"body"},m4={className:"string",clickCallback:"(function|null)",isAnimated:"boolean",isVisible:"boolean",rootElement:"(element|string)"};class Pl extends p1{constructor(t){super(),this._config=this._getConfig(t),this._isAppended=!1,this._element=null}static get Default(){return M4}static get DefaultType(){return m4}static get NAME(){return Vl}show(t){if(!this._config.isVisible){ae(t);return}this._append();const e=this._getElement();this._config.isAnimated&&c1(e),e.classList.add(Tn),this._emulateAnimation(()=>{ae(t)})}hide(t){if(!this._config.isVisible){ae(t);return}this._getElement().classList.remove(Tn),this._emulateAnimation(()=>{this.dispose(),ae(t)})}dispose(){this._isAppended&&(et.off(this._element,_n),this._element.remove(),this._isAppended=!1)}_getElement(){if(!this._element){const t=document.createElement("div");t.className=this._config.className,this._config.isAnimated&&t.classList.add(f4),this._element=t}return this._element}_configAfterMerge(t){return t.rootElement=Ue(t.rootElement),t}_append(){if(this._isAppended)return;const t=this._getElement();this._config.rootElement.append(t),et.on(t,_n,()=>{ae(this._config.clickCallback)}),this._isAppended=!0}_emulateAnimation(t){vl(t,this._getElement(),this._config.isAnimated)}}const v4="focustrap",g4="bs.focustrap",F1=`.${g4}`,y4=`focusin${F1}`,x4=`keydown.tab${F1}`,w4="Tab",b4="forward",Hn="backward",E4={autofocus:!0,trapElement:null},S4={autofocus:"boolean",trapElement:"element"};class Dl extends p1{constructor(t){super(),this._config=this._getConfig(t),this._isActive=!1,this._lastTabNavDirection=null}static get Default(){return E4}static get DefaultType(){return S4}static get NAME(){return v4}activate(){this._isActive||(this._config.autofocus&&this._config.trapElement.focus(),et.off(document,F1),et.on(document,y4,t=>this._handleFocusin(t)),et.on(document,x4,t=>this._handleKeydown(t)),this._isActive=!0)}deactivate(){this._isActive&&(this._isActive=!1,et.off(document,F1))}_handleFocusin(t){const{trapElement:e}=this._config;if(t.target===document||t.target===e||e.contains(t.target))return;const n=dt.focusableChildren(e);n.length===0?e.focus():this._lastTabNavDirection===Hn?n[n.length-1].focus():n[0].focus()}_handleKeydown(t){t.key===w4&&(this._lastTabNavDirection=t.shiftKey?Hn:b4)}}const Ln=".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",Vn=".sticky-top",T1="padding-right",Pn="margin-right";class i2{constructor(){this._element=document.body}getWidth(){const t=document.documentElement.clientWidth;return Math.abs(window.innerWidth-t)}hide(){const t=this.getWidth();this._disableOverFlow(),this._setElementAttributes(this._element,T1,e=>e+t),this._setElementAttributes(Ln,T1,e=>e+t),this._setElementAttributes(Vn,Pn,e=>e-t)}reset(){this._resetElementAttributes(this._element,"overflow"),this._resetElementAttributes(this._element,T1),this._resetElementAttributes(Ln,T1),this._resetElementAttributes(Vn,Pn)}isOverflowing(){return this.getWidth()>0}_disableOverFlow(){this._saveInitialAttribute(this._element,"overflow"),this._element.style.overflow="hidden"}_setElementAttributes(t,e,n){const s=this.getWidth(),o=c=>{if(c!==this._element&&window.innerWidth>c.clientWidth+s)return;this._saveInitialAttribute(c,e);const p=window.getComputedStyle(c).getPropertyValue(e);c.style.setProperty(e,`${n(Number.parseFloat(p))}px`)};this._applyManipulationCallback(t,o)}_saveInitialAttribute(t,e){const n=t.style.getPropertyValue(e);n&&$e.setDataAttribute(t,e,n)}_resetElementAttributes(t,e){const n=s=>{const o=$e.getDataAttribute(s,e);if(o===null){s.style.removeProperty(e);return}$e.removeDataAttribute(s,e),s.style.setProperty(e,o)};this._applyManipulationCallback(t,n)}_applyManipulationCallback(t,e){if(ze(t)){e(t);return}for(const n of dt.find(t,this._element))e(n)}}const C4="modal",A4="bs.modal",ge=`.${A4}`,T4=".data-api",_4="Escape",H4=`hide${ge}`,L4=`hidePrevented${ge}`,Ol=`hidden${ge}`,kl=`show${ge}`,V4=`shown${ge}`,P4=`resize${ge}`,D4=`click.dismiss${ge}`,O4=`mousedown.dismiss${ge}`,k4=`keydown.dismiss${ge}`,I4=`click${ge}${T4}`,Dn="modal-open",N4="fade",On="show",Oi="modal-static",z4=".modal.show",$4=".modal-dialog",R4=".modal-body",B4='[data-bs-toggle="modal"]',F4={backdrop:!0,focus:!0,keyboard:!0},q4={backdrop:"(boolean|string)",focus:"boolean",keyboard:"boolean"};class Ke extends Se{constructor(t,e){super(t,e),this._dialog=dt.findOne($4,this._element),this._backdrop=this._initializeBackDrop(),this._focustrap=this._initializeFocusTrap(),this._isShown=!1,this._isTransitioning=!1,this._scrollBar=new i2,this._addEventListeners()}static get Default(){return F4}static get DefaultType(){return q4}static get NAME(){return C4}toggle(t){return this._isShown?this.hide():this.show(t)}show(t){this._isShown||this._isTransitioning||et.trigger(this._element,kl,{relatedTarget:t}).defaultPrevented||(this._isShown=!0,this._isTransitioning=!0,this._scrollBar.hide(),document.body.classList.add(Dn),this._adjustDialog(),this._backdrop.show(()=>this._showElement(t)))}hide(){!this._isShown||this._isTransitioning||et.trigger(this._element,H4).defaultPrevented||(this._isShown=!1,this._isTransitioning=!0,this._focustrap.deactivate(),this._element.classList.remove(On),this._queueCallback(()=>this._hideModal(),this._element,this._isAnimated()))}dispose(){et.off(window,ge),et.off(this._dialog,ge),this._backdrop.dispose(),this._focustrap.deactivate(),super.dispose()}handleUpdate(){this._adjustDialog()}_initializeBackDrop(){return new Pl({isVisible:!!this._config.backdrop,isAnimated:this._isAnimated()})}_initializeFocusTrap(){return new Dl({trapElement:this._element})}_showElement(t){document.body.contains(this._element)||document.body.append(this._element),this._element.style.display="block",this._element.removeAttribute("aria-hidden"),this._element.setAttribute("aria-modal",!0),this._element.setAttribute("role","dialog"),this._element.scrollTop=0;const e=dt.findOne(R4,this._dialog);e&&(e.scrollTop=0),c1(this._element),this._element.classList.add(On);const n=()=>{this._config.focus&&this._focustrap.activate(),this._isTransitioning=!1,et.trigger(this._element,V4,{relatedTarget:t})};this._queueCallback(n,this._dialog,this._isAnimated())}_addEventListeners(){et.on(this._element,k4,t=>{if(t.key===_4){if(this._config.keyboard){this.hide();return}this._triggerBackdropTransition()}}),et.on(window,P4,()=>{this._isShown&&!this._isTransitioning&&this._adjustDialog()}),et.on(this._element,O4,t=>{et.one(this._element,D4,e=>{if(!(this._element!==t.target||this._element!==e.target)){if(this._config.backdrop==="static"){this._triggerBackdropTransition();return}this._config.backdrop&&this.hide()}})})}_hideModal(){this._element.style.display="none",this._element.setAttribute("aria-hidden",!0),this._element.removeAttribute("aria-modal"),this._element.removeAttribute("role"),this._isTransitioning=!1,this._backdrop.hide(()=>{document.body.classList.remove(Dn),this._resetAdjustments(),this._scrollBar.reset(),et.trigger(this._element,Ol)})}_isAnimated(){return this._element.classList.contains(N4)}_triggerBackdropTransition(){if(et.trigger(this._element,L4).defaultPrevented)return;const e=this._element.scrollHeight>document.documentElement.clientHeight,n=this._element.style.overflowY;n==="hidden"||this._element.classList.contains(Oi)||(e||(this._element.style.overflowY="hidden"),this._element.classList.add(Oi),this._queueCallback(()=>{this._element.classList.remove(Oi),this._queueCallback(()=>{this._element.style.overflowY=n},this._dialog)},this._dialog),this._element.focus())}_adjustDialog(){const t=this._element.scrollHeight>document.documentElement.clientHeight,e=this._scrollBar.getWidth(),n=e>0;if(n&&!t){const s=ve()?"paddingLeft":"paddingRight";this._element.style[s]=`${e}px`}if(!n&&t){const s=ve()?"paddingRight":"paddingLeft";this._element.style[s]=`${e}px`}}_resetAdjustments(){this._element.style.paddingLeft="",this._element.style.paddingRight=""}static jQueryInterface(t,e){return this.each(function(){const n=Ke.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof n[t]>"u")throw new TypeError(`No method named "${t}"`);n[t](e)}})}}et.on(document,I4,B4,function(a){const t=dt.getElementFromSelector(this);["A","AREA"].includes(this.tagName)&&a.preventDefault(),et.one(t,kl,s=>{s.defaultPrevented||et.one(t,Ol,()=>{Fa(this)&&this.focus()})});const e=dt.findOne(z4);e&&Ke.getInstance(e).hide(),Ke.getOrCreateInstance(t).toggle(this)});X1(Ke);ye(Ke);const W4="offcanvas",j4="bs.offcanvas",Fe=`.${j4}`,Il=".data-api",G4=`load${Fe}${Il}`,Z4="Escape",kn="show",In="showing",Nn="hiding",X4="offcanvas-backdrop",Nl=".offcanvas.show",U4=`show${Fe}`,Y4=`shown${Fe}`,K4=`hide${Fe}`,zn=`hidePrevented${Fe}`,zl=`hidden${Fe}`,Q4=`resize${Fe}`,J4=`click${Fe}${Il}`,tf=`keydown.dismiss${Fe}`,ef='[data-bs-toggle="offcanvas"]',af={backdrop:!0,keyboard:!0,scroll:!1},nf={backdrop:"(boolean|string)",keyboard:"boolean",scroll:"boolean"};class Qe extends Se{constructor(t,e){super(t,e),this._isShown=!1,this._backdrop=this._initializeBackDrop(),this._focustrap=this._initializeFocusTrap(),this._addEventListeners()}static get Default(){return af}static get DefaultType(){return nf}static get NAME(){return W4}toggle(t){return this._isShown?this.hide():this.show(t)}show(t){if(this._isShown||et.trigger(this._element,U4,{relatedTarget:t}).defaultPrevented)return;this._isShown=!0,this._backdrop.show(),this._config.scroll||new i2().hide(),this._element.setAttribute("aria-modal",!0),this._element.setAttribute("role","dialog"),this._element.classList.add(In);const n=()=>{(!this._config.scroll||this._config.backdrop)&&this._focustrap.activate(),this._element.classList.add(kn),this._element.classList.remove(In),et.trigger(this._element,Y4,{relatedTarget:t})};this._queueCallback(n,this._element,!0)}hide(){if(!this._isShown||et.trigger(this._element,K4).defaultPrevented)return;this._focustrap.deactivate(),this._element.blur(),this._isShown=!1,this._element.classList.add(Nn),this._backdrop.hide();const e=()=>{this._element.classList.remove(kn,Nn),this._element.removeAttribute("aria-modal"),this._element.removeAttribute("role"),this._config.scroll||new i2().reset(),et.trigger(this._element,zl)};this._queueCallback(e,this._element,!0)}dispose(){this._backdrop.dispose(),this._focustrap.deactivate(),super.dispose()}_initializeBackDrop(){const t=()=>{if(this._config.backdrop==="static"){et.trigger(this._element,zn);return}this.hide()},e=!!this._config.backdrop;return new Pl({className:X4,isVisible:e,isAnimated:!0,rootElement:this._element.parentNode,clickCallback:e?t:null})}_initializeFocusTrap(){return new Dl({trapElement:this._element})}_addEventListeners(){et.on(this._element,tf,t=>{if(t.key===Z4){if(this._config.keyboard){this.hide();return}et.trigger(this._element,zn)}})}static jQueryInterface(t){return this.each(function(){const e=Qe.getOrCreateInstance(this,t);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}et.on(document,J4,ef,function(a){const t=dt.getElementFromSelector(this);if(["A","AREA"].includes(this.tagName)&&a.preventDefault(),Ye(this))return;et.one(t,zl,()=>{Fa(this)&&this.focus()});const e=dt.findOne(Nl);e&&e!==t&&Qe.getInstance(e).hide(),Qe.getOrCreateInstance(t).toggle(this)});et.on(window,G4,()=>{for(const a of dt.find(Nl))Qe.getOrCreateInstance(a).show()});et.on(window,Q4,()=>{for(const a of dt.find("[aria-modal][class*=show][class*=offcanvas-]"))getComputedStyle(a).position!=="fixed"&&Qe.getOrCreateInstance(a).hide()});X1(Qe);ye(Qe);const rf=/^aria-[\w-]*$/i,$l={"*":["class","dir","id","lang","role",rf],a:["target","href","title","rel"],area:[],b:[],br:[],col:[],code:[],dd:[],div:[],dl:[],dt:[],em:[],hr:[],h1:[],h2:[],h3:[],h4:[],h5:[],h6:[],i:[],img:["src","srcset","alt","title","width","height"],li:[],ol:[],p:[],pre:[],s:[],small:[],span:[],sub:[],sup:[],strong:[],u:[],ul:[]},sf=new Set(["background","cite","href","itemtype","longdesc","poster","src","xlink:href"]),of=/^(?!javascript:)(?:[a-z0-9+.-]+:|[^&:/?#]*(?:[/?#]|$))/i,lf=(a,t)=>{const e=a.nodeName.toLowerCase();return t.includes(e)?sf.has(e)?!!of.test(a.nodeValue):!0:t.filter(n=>n instanceof RegExp).some(n=>n.test(e))};function hf(a,t,e){if(!a.length)return a;if(e&&typeof e=="function")return e(a);const s=new window.DOMParser().parseFromString(a,"text/html"),o=[].concat(...s.body.querySelectorAll("*"));for(const c of o){const p=c.nodeName.toLowerCase();if(!Object.keys(t).includes(p)){c.remove();continue}const m=[].concat(...c.attributes),M=[].concat(t["*"]||[],t[p]||[]);for(const g of m)lf(g,M)||c.removeAttribute(g.nodeName)}return s.body.innerHTML}const df="TemplateFactory",cf={allowList:$l,content:{},extraClass:"",html:!1,sanitize:!0,sanitizeFn:null,template:"<div></div>"},pf={allowList:"object",content:"object",extraClass:"(string|function)",html:"boolean",sanitize:"boolean",sanitizeFn:"(null|function)",template:"string"},uf={entry:"(string|element|function|null)",selector:"(string|element)"};class ff extends p1{constructor(t){super(),this._config=this._getConfig(t)}static get Default(){return cf}static get DefaultType(){return pf}static get NAME(){return df}getContent(){return Object.values(this._config.content).map(t=>this._resolvePossibleFunction(t)).filter(Boolean)}hasContent(){return this.getContent().length>0}changeContent(t){return this._checkContent(t),this._config.content={...this._config.content,...t},this}toHtml(){const t=document.createElement("div");t.innerHTML=this._maybeSanitize(this._config.template);for(const[s,o]of Object.entries(this._config.content))this._setContent(t,o,s);const e=t.children[0],n=this._resolvePossibleFunction(this._config.extraClass);return n&&e.classList.add(...n.split(" ")),e}_typeCheckConfig(t){super._typeCheckConfig(t),this._checkContent(t.content)}_checkContent(t){for(const[e,n]of Object.entries(t))super._typeCheckConfig({selector:e,entry:n},uf)}_setContent(t,e,n){const s=dt.findOne(n,t);if(s){if(e=this._resolvePossibleFunction(e),!e){s.remove();return}if(ze(e)){this._putElementInTemplate(Ue(e),s);return}if(this._config.html){s.innerHTML=this._maybeSanitize(e);return}s.textContent=e}}_maybeSanitize(t){return this._config.sanitize?hf(t,this._config.allowList,this._config.sanitizeFn):t}_resolvePossibleFunction(t){return ae(t,[void 0,this])}_putElementInTemplate(t,e){if(this._config.html){e.innerHTML="",e.append(t);return}e.textContent=t.textContent}}const Mf="tooltip",mf=new Set(["sanitize","allowList","sanitizeFn"]),ki="fade",vf="modal",_1="show",gf=".tooltip-inner",$n=`.${vf}`,Rn="hide.bs.modal",e1="hover",Ii="focus",Ni="click",yf="manual",xf="hide",wf="hidden",bf="show",Ef="shown",Sf="inserted",Cf="click",Af="focusin",Tf="focusout",_f="mouseenter",Hf="mouseleave",Lf={AUTO:"auto",TOP:"top",RIGHT:ve()?"left":"right",BOTTOM:"bottom",LEFT:ve()?"right":"left"},Vf={allowList:$l,animation:!0,boundary:"clippingParents",container:!1,customClass:"",delay:0,fallbackPlacements:["top","right","bottom","left"],html:!1,offset:[0,6],placement:"top",popperConfig:null,sanitize:!0,sanitizeFn:null,selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',title:"",trigger:"hover focus"},Pf={allowList:"object",animation:"boolean",boundary:"(string|element)",container:"(string|element|boolean)",customClass:"(string|function)",delay:"(number|object)",fallbackPlacements:"array",html:"boolean",offset:"(array|string|function)",placement:"(string|function)",popperConfig:"(null|object|function)",sanitize:"boolean",sanitizeFn:"(null|function)",selector:"(string|boolean)",template:"string",title:"(string|element|function)",trigger:"string"};class Wa extends Se{constructor(t,e){if(typeof pl>"u")throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org/docs/v2/)");super(t,e),this._isEnabled=!0,this._timeout=0,this._isHovered=null,this._activeTrigger={},this._popper=null,this._templateFactory=null,this._newContent=null,this.tip=null,this._setListeners(),this._config.selector||this._fixTitle()}static get Default(){return Vf}static get DefaultType(){return Pf}static get NAME(){return Mf}enable(){this._isEnabled=!0}disable(){this._isEnabled=!1}toggleEnabled(){this._isEnabled=!this._isEnabled}toggle(){if(this._isEnabled){if(this._isShown()){this._leave();return}this._enter()}}dispose(){clearTimeout(this._timeout),et.off(this._element.closest($n),Rn,this._hideModalHandler),this._element.getAttribute("data-bs-original-title")&&this._element.setAttribute("title",this._element.getAttribute("data-bs-original-title")),this._disposePopper(),super.dispose()}show(){if(this._element.style.display==="none")throw new Error("Please use show on visible elements");if(!(this._isWithContent()&&this._isEnabled))return;const t=et.trigger(this._element,this.constructor.eventName(bf)),n=(Ml(this._element)||this._element.ownerDocument.documentElement).contains(this._element);if(t.defaultPrevented||!n)return;this._disposePopper();const s=this._getTipElement();this._element.setAttribute("aria-describedby",s.getAttribute("id"));const{container:o}=this._config;if(this._element.ownerDocument.documentElement.contains(this.tip)||(o.append(s),et.trigger(this._element,this.constructor.eventName(Sf))),this._popper=this._createPopper(s),s.classList.add(_1),"ontouchstart"in document.documentElement)for(const p of[].concat(...document.body.children))et.on(p,"mouseover",R1);const c=()=>{et.trigger(this._element,this.constructor.eventName(Ef)),this._isHovered===!1&&this._leave(),this._isHovered=!1};this._queueCallback(c,this.tip,this._isAnimated())}hide(){if(!this._isShown()||et.trigger(this._element,this.constructor.eventName(xf)).defaultPrevented)return;if(this._getTipElement().classList.remove(_1),"ontouchstart"in document.documentElement)for(const s of[].concat(...document.body.children))et.off(s,"mouseover",R1);this._activeTrigger[Ni]=!1,this._activeTrigger[Ii]=!1,this._activeTrigger[e1]=!1,this._isHovered=null;const n=()=>{this._isWithActiveTrigger()||(this._isHovered||this._disposePopper(),this._element.removeAttribute("aria-describedby"),et.trigger(this._element,this.constructor.eventName(wf)))};this._queueCallback(n,this.tip,this._isAnimated())}update(){this._popper&&this._popper.update()}_isWithContent(){return!!this._getTitle()}_getTipElement(){return this.tip||(this.tip=this._createTipElement(this._newContent||this._getContentForTemplate())),this.tip}_createTipElement(t){const e=this._getTemplateFactory(t).toHtml();if(!e)return null;e.classList.remove(ki,_1),e.classList.add(`bs-${this.constructor.NAME}-auto`);const n=gp(this.constructor.NAME).toString();return e.setAttribute("id",n),this._isAnimated()&&e.classList.add(ki),e}setContent(t){this._newContent=t,this._isShown()&&(this._disposePopper(),this.show())}_getTemplateFactory(t){return this._templateFactory?this._templateFactory.changeContent(t):this._templateFactory=new ff({...this._config,content:t,extraClass:this._resolvePossibleFunction(this._config.customClass)}),this._templateFactory}_getContentForTemplate(){return{[gf]:this._getTitle()}}_getTitle(){return this._resolvePossibleFunction(this._config.title)||this._element.getAttribute("data-bs-original-title")}_initializeOnDelegatedTarget(t){return this.constructor.getOrCreateInstance(t.delegateTarget,this._getDelegateConfig())}_isAnimated(){return this._config.animation||this.tip&&this.tip.classList.contains(ki)}_isShown(){return this.tip&&this.tip.classList.contains(_1)}_createPopper(t){const e=ae(this._config.placement,[this,t,this._element]),n=Lf[e.toUpperCase()];return g2(this._element,t,this._getPopperConfig(n))}_getOffset(){const{offset:t}=this._config;return typeof t=="string"?t.split(",").map(e=>Number.parseInt(e,10)):typeof t=="function"?e=>t(e,this._element):t}_resolvePossibleFunction(t){return ae(t,[this._element,this._element])}_getPopperConfig(t){const e={placement:t,modifiers:[{name:"flip",options:{fallbackPlacements:this._config.fallbackPlacements}},{name:"offset",options:{offset:this._getOffset()}},{name:"preventOverflow",options:{boundary:this._config.boundary}},{name:"arrow",options:{element:`.${this.constructor.NAME}-arrow`}},{name:"preSetPlacement",enabled:!0,phase:"beforeMain",fn:n=>{this._getTipElement().setAttribute("data-popper-placement",n.state.placement)}}]};return{...e,...ae(this._config.popperConfig,[void 0,e])}}_setListeners(){const t=this._config.trigger.split(" ");for(const e of t)if(e==="click")et.on(this._element,this.constructor.eventName(Cf),this._config.selector,n=>{const s=this._initializeOnDelegatedTarget(n);s._activeTrigger[Ni]=!(s._isShown()&&s._activeTrigger[Ni]),s.toggle()});else if(e!==yf){const n=e===e1?this.constructor.eventName(_f):this.constructor.eventName(Af),s=e===e1?this.constructor.eventName(Hf):this.constructor.eventName(Tf);et.on(this._element,n,this._config.selector,o=>{const c=this._initializeOnDelegatedTarget(o);c._activeTrigger[o.type==="focusin"?Ii:e1]=!0,c._enter()}),et.on(this._element,s,this._config.selector,o=>{const c=this._initializeOnDelegatedTarget(o);c._activeTrigger[o.type==="focusout"?Ii:e1]=c._element.contains(o.relatedTarget),c._leave()})}this._hideModalHandler=()=>{this._element&&this.hide()},et.on(this._element.closest($n),Rn,this._hideModalHandler)}_fixTitle(){const t=this._element.getAttribute("title");t&&(!this._element.getAttribute("aria-label")&&!this._element.textContent.trim()&&this._element.setAttribute("aria-label",t),this._element.setAttribute("data-bs-original-title",t),this._element.removeAttribute("title"))}_enter(){if(this._isShown()||this._isHovered){this._isHovered=!0;return}this._isHovered=!0,this._setTimeout(()=>{this._isHovered&&this.show()},this._config.delay.show)}_leave(){this._isWithActiveTrigger()||(this._isHovered=!1,this._setTimeout(()=>{this._isHovered||this.hide()},this._config.delay.hide))}_setTimeout(t,e){clearTimeout(this._timeout),this._timeout=setTimeout(t,e)}_isWithActiveTrigger(){return Object.values(this._activeTrigger).includes(!0)}_getConfig(t){const e=$e.getDataAttributes(this._element);for(const n of Object.keys(e))mf.has(n)&&delete e[n];return t={...e,...typeof t=="object"&&t?t:{}},t=this._mergeConfigObj(t),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}_configAfterMerge(t){return t.container=t.container===!1?document.body:Ue(t.container),typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),typeof t.title=="number"&&(t.title=t.title.toString()),typeof t.content=="number"&&(t.content=t.content.toString()),t}_getDelegateConfig(){const t={};for(const[e,n]of Object.entries(this._config))this.constructor.Default[e]!==n&&(t[e]=n);return t.selector=!1,t.trigger="manual",t}_disposePopper(){this._popper&&(this._popper.destroy(),this._popper=null),this.tip&&(this.tip.remove(),this.tip=null)}static jQueryInterface(t){return this.each(function(){const e=Wa.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}}ye(Wa);const Df="popover",Of=".popover-header",kf=".popover-body",If={...Wa.Default,content:"",offset:[0,8],placement:"right",template:'<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',trigger:"click"},Nf={...Wa.DefaultType,content:"(null|string|element|function)"};class b2 extends Wa{static get Default(){return If}static get DefaultType(){return Nf}static get NAME(){return Df}_isWithContent(){return this._getTitle()||this._getContent()}_getContentForTemplate(){return{[Of]:this._getTitle(),[kf]:this._getContent()}}_getContent(){return this._resolvePossibleFunction(this._config.content)}static jQueryInterface(t){return this.each(function(){const e=b2.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}}ye(b2);const zf="scrollspy",$f="bs.scrollspy",E2=`.${$f}`,Rf=".data-api",Bf=`activate${E2}`,Bn=`click${E2}`,Ff=`load${E2}${Rf}`,qf="dropdown-item",Ta="active",Wf='[data-bs-spy="scroll"]',zi="[href]",jf=".nav, .list-group",Fn=".nav-link",Gf=".nav-item",Zf=".list-group-item",Xf=`${Fn}, ${Gf} > ${Fn}, ${Zf}`,Uf=".dropdown",Yf=".dropdown-toggle",Kf={offset:null,rootMargin:"0px 0px -25%",smoothScroll:!1,target:null,threshold:[.1,.5,1]},Qf={offset:"(number|null)",rootMargin:"string",smoothScroll:"boolean",target:"element",threshold:"array"};class K1 extends Se{constructor(t,e){super(t,e),this._targetLinks=new Map,this._observableSections=new Map,this._rootElement=getComputedStyle(this._element).overflowY==="visible"?null:this._element,this._activeTarget=null,this._observer=null,this._previousScrollData={visibleEntryTop:0,parentScrollTop:0},this.refresh()}static get Default(){return Kf}static get DefaultType(){return Qf}static get NAME(){return zf}refresh(){this._initializeTargetsAndObservables(),this._maybeEnableSmoothScroll(),this._observer?this._observer.disconnect():this._observer=this._getNewObserver();for(const t of this._observableSections.values())this._observer.observe(t)}dispose(){this._observer.disconnect(),super.dispose()}_configAfterMerge(t){return t.target=Ue(t.target)||document.body,t.rootMargin=t.offset?`${t.offset}px 0px -30%`:t.rootMargin,typeof t.threshold=="string"&&(t.threshold=t.threshold.split(",").map(e=>Number.parseFloat(e))),t}_maybeEnableSmoothScroll(){this._config.smoothScroll&&(et.off(this._config.target,Bn),et.on(this._config.target,Bn,zi,t=>{const e=this._observableSections.get(t.target.hash);if(e){t.preventDefault();const n=this._rootElement||window,s=e.offsetTop-this._element.offsetTop;if(n.scrollTo){n.scrollTo({top:s,behavior:"smooth"});return}n.scrollTop=s}}))}_getNewObserver(){const t={root:this._rootElement,threshold:this._config.threshold,rootMargin:this._config.rootMargin};return new IntersectionObserver(e=>this._observerCallback(e),t)}_observerCallback(t){const e=c=>this._targetLinks.get(`#${c.target.id}`),n=c=>{this._previousScrollData.visibleEntryTop=c.target.offsetTop,this._process(e(c))},s=(this._rootElement||document.documentElement).scrollTop,o=s>=this._previousScrollData.parentScrollTop;this._previousScrollData.parentScrollTop=s;for(const c of t){if(!c.isIntersecting){this._activeTarget=null,this._clearActiveClass(e(c));continue}const p=c.target.offsetTop>=this._previousScrollData.visibleEntryTop;if(o&&p){if(n(c),!s)return;continue}!o&&!p&&n(c)}}_initializeTargetsAndObservables(){this._targetLinks=new Map,this._observableSections=new Map;const t=dt.find(zi,this._config.target);for(const e of t){if(!e.hash||Ye(e))continue;const n=dt.findOne(decodeURI(e.hash),this._element);Fa(n)&&(this._targetLinks.set(decodeURI(e.hash),e),this._observableSections.set(e.hash,n))}}_process(t){this._activeTarget!==t&&(this._clearActiveClass(this._config.target),this._activeTarget=t,t.classList.add(Ta),this._activateParents(t),et.trigger(this._element,Bf,{relatedTarget:t}))}_activateParents(t){if(t.classList.contains(qf)){dt.findOne(Yf,t.closest(Uf)).classList.add(Ta);return}for(const e of dt.parents(t,jf))for(const n of dt.prev(e,Xf))n.classList.add(Ta)}_clearActiveClass(t){t.classList.remove(Ta);const e=dt.find(`${zi}.${Ta}`,t);for(const n of e)n.classList.remove(Ta)}static jQueryInterface(t){return this.each(function(){const e=K1.getOrCreateInstance(this,t);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(window,Ff,()=>{for(const a of dt.find(Wf))K1.getOrCreateInstance(a)});ye(K1);const Jf="tab",t5="bs.tab",va=`.${t5}`,e5=`hide${va}`,a5=`hidden${va}`,i5=`show${va}`,n5=`shown${va}`,r5=`click${va}`,s5=`keydown${va}`,o5=`load${va}`,l5="ArrowLeft",qn="ArrowRight",h5="ArrowUp",Wn="ArrowDown",$i="Home",jn="End",da="active",Gn="fade",Ri="show",d5="dropdown",Rl=".dropdown-toggle",c5=".dropdown-menu",Bi=`:not(${Rl})`,p5='.list-group, .nav, [role="tablist"]',u5=".nav-item, .list-group-item",f5=`.nav-link${Bi}, .list-group-item${Bi}, [role="tab"]${Bi}`,Bl='[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]',Fi=`${f5}, ${Bl}`,M5=`.${da}[data-bs-toggle="tab"], .${da}[data-bs-toggle="pill"], .${da}[data-bs-toggle="list"]`;class $a extends Se{constructor(t){super(t),this._parent=this._element.closest(p5),this._parent&&(this._setInitialAttributes(this._parent,this._getChildren()),et.on(this._element,s5,e=>this._keydown(e)))}static get NAME(){return Jf}show(){const t=this._element;if(this._elemIsActive(t))return;const e=this._getActiveElem(),n=e?et.trigger(e,e5,{relatedTarget:t}):null;et.trigger(t,i5,{relatedTarget:e}).defaultPrevented||n&&n.defaultPrevented||(this._deactivate(e,t),this._activate(t,e))}_activate(t,e){if(!t)return;t.classList.add(da),this._activate(dt.getElementFromSelector(t));const n=()=>{if(t.getAttribute("role")!=="tab"){t.classList.add(Ri);return}t.removeAttribute("tabindex"),t.setAttribute("aria-selected",!0),this._toggleDropDown(t,!0),et.trigger(t,n5,{relatedTarget:e})};this._queueCallback(n,t,t.classList.contains(Gn))}_deactivate(t,e){if(!t)return;t.classList.remove(da),t.blur(),this._deactivate(dt.getElementFromSelector(t));const n=()=>{if(t.getAttribute("role")!=="tab"){t.classList.remove(Ri);return}t.setAttribute("aria-selected",!1),t.setAttribute("tabindex","-1"),this._toggleDropDown(t,!1),et.trigger(t,a5,{relatedTarget:e})};this._queueCallback(n,t,t.classList.contains(Gn))}_keydown(t){if(![l5,qn,h5,Wn,$i,jn].includes(t.key))return;t.stopPropagation(),t.preventDefault();const e=this._getChildren().filter(s=>!Ye(s));let n;if([$i,jn].includes(t.key))n=e[t.key===$i?0:e.length-1];else{const s=[qn,Wn].includes(t.key);n=y2(e,t.target,s,!0)}n&&(n.focus({preventScroll:!0}),$a.getOrCreateInstance(n).show())}_getChildren(){return dt.find(Fi,this._parent)}_getActiveElem(){return this._getChildren().find(t=>this._elemIsActive(t))||null}_setInitialAttributes(t,e){this._setAttributeIfNotExists(t,"role","tablist");for(const n of e)this._setInitialAttributesOnChild(n)}_setInitialAttributesOnChild(t){t=this._getInnerElement(t);const e=this._elemIsActive(t),n=this._getOuterElement(t);t.setAttribute("aria-selected",e),n!==t&&this._setAttributeIfNotExists(n,"role","presentation"),e||t.setAttribute("tabindex","-1"),this._setAttributeIfNotExists(t,"role","tab"),this._setInitialAttributesOnTargetPanel(t)}_setInitialAttributesOnTargetPanel(t){const e=dt.getElementFromSelector(t);e&&(this._setAttributeIfNotExists(e,"role","tabpanel"),t.id&&this._setAttributeIfNotExists(e,"aria-labelledby",`${t.id}`))}_toggleDropDown(t,e){const n=this._getOuterElement(t);if(!n.classList.contains(d5))return;const s=(o,c)=>{const p=dt.findOne(o,n);p&&p.classList.toggle(c,e)};s(Rl,da),s(c5,Ri),n.setAttribute("aria-expanded",e)}_setAttributeIfNotExists(t,e,n){t.hasAttribute(e)||t.setAttribute(e,n)}_elemIsActive(t){return t.classList.contains(da)}_getInnerElement(t){return t.matches(Fi)?t:dt.findOne(Fi,t)}_getOuterElement(t){return t.closest(u5)||t}static jQueryInterface(t){return this.each(function(){const e=$a.getOrCreateInstance(this);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(document,r5,Bl,function(a){["A","AREA"].includes(this.tagName)&&a.preventDefault(),!Ye(this)&&$a.getOrCreateInstance(this).show()});et.on(window,o5,()=>{for(const a of dt.find(M5))$a.getOrCreateInstance(a)});ye($a);const m5="toast",v5="bs.toast",ea=`.${v5}`,g5=`mouseover${ea}`,y5=`mouseout${ea}`,x5=`focusin${ea}`,w5=`focusout${ea}`,b5=`hide${ea}`,E5=`hidden${ea}`,S5=`show${ea}`,C5=`shown${ea}`,A5="fade",Zn="hide",H1="show",L1="showing",T5={animation:"boolean",autohide:"boolean",delay:"number"},_5={animation:!0,autohide:!0,delay:5e3};class Q1 extends Se{constructor(t,e){super(t,e),this._timeout=null,this._hasMouseInteraction=!1,this._hasKeyboardInteraction=!1,this._setListeners()}static get Default(){return _5}static get DefaultType(){return T5}static get NAME(){return m5}show(){if(et.trigger(this._element,S5).defaultPrevented)return;this._clearTimeout(),this._config.animation&&this._element.classList.add(A5);const e=()=>{this._element.classList.remove(L1),et.trigger(this._element,C5),this._maybeScheduleHide()};this._element.classList.remove(Zn),c1(this._element),this._element.classList.add(H1,L1),this._queueCallback(e,this._element,this._config.animation)}hide(){if(!this.isShown()||et.trigger(this._element,b5).defaultPrevented)return;const e=()=>{this._element.classList.add(Zn),this._element.classList.remove(L1,H1),et.trigger(this._element,E5)};this._element.classList.add(L1),this._queueCallback(e,this._element,this._config.animation)}dispose(){this._clearTimeout(),this.isShown()&&this._element.classList.remove(H1),super.dispose()}isShown(){return this._element.classList.contains(H1)}_maybeScheduleHide(){this._config.autohide&&(this._hasMouseInteraction||this._hasKeyboardInteraction||(this._timeout=setTimeout(()=>{this.hide()},this._config.delay)))}_onInteraction(t,e){switch(t.type){case"mouseover":case"mouseout":{this._hasMouseInteraction=e;break}case"focusin":case"focusout":{this._hasKeyboardInteraction=e;break}}if(e){this._clearTimeout();return}const n=t.relatedTarget;this._element===n||this._element.contains(n)||this._maybeScheduleHide()}_setListeners(){et.on(this._element,g5,t=>this._onInteraction(t,!0)),et.on(this._element,y5,t=>this._onInteraction(t,!1)),et.on(this._element,x5,t=>this._onInteraction(t,!0)),et.on(this._element,w5,t=>this._onInteraction(t,!1))}_clearTimeout(){clearTimeout(this._timeout),this._timeout=null}static jQueryInterface(t){return this.each(function(){const e=Q1.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}X1(Q1);ye(Q1);/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fl={xmlns:"http://www.w3.org/2000/svg",width:24,height:24,viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":2,"stroke-linecap":"round","stroke-linejoin":"round"};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ql=([a,t,e])=>{const n=document.createElementNS("http://www.w3.org/2000/svg",a);return Object.keys(t).forEach(s=>{n.setAttribute(s,String(t[s]))}),e!=null&&e.length&&e.forEach(s=>{const o=ql(s);n.appendChild(o)}),n},H5=(a,t={})=>{const e="svg",n={...Fl,...t};return ql([e,n,a])};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L5=a=>Array.from(a.attributes).reduce((t,e)=>(t[e.name]=e.value,t),{}),V5=a=>typeof a=="string"?a:!a||!a.class?"":a.class&&typeof a.class=="string"?a.class.split(" "):a.class&&Array.isArray(a.class)?a.class:"",P5=a=>a.flatMap(V5).map(e=>e.trim()).filter(Boolean).filter((e,n,s)=>s.indexOf(e)===n).join(" "),D5=a=>a.replace(/(\w)(\w*)(_|-|\s*)/g,(t,e,n)=>e.toUpperCase()+n.toLowerCase()),Xn=(a,{nameAttr:t,icons:e,attrs:n})=>{var w;const s=a.getAttribute(t);if(s==null)return;const o=D5(s),c=e[o];if(!c)return console.warn(`${a.outerHTML} icon name was not found in the provided icons object.`);const p=L5(a),m={...Fl,"data-lucide":s,...n,...p},M=P5(["lucide",`lucide-${s}`,p,n]);M&&Object.assign(m,{class:M});const g=H5(c,m);return(w=a.parentNode)==null?void 0:w.replaceChild(g,a)};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O5=[["path",{d:"M3.5 13h6"}],["path",{d:"m2 16 4.5-9 4.5 9"}],["path",{d:"M18 7v9"}],["path",{d:"m14 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k5=[["path",{d:"M21 14h-5"}],["path",{d:"M16 16v-3.5a2.5 2.5 0 0 1 5 0V16"}],["path",{d:"M4.5 13h6"}],["path",{d:"m3 16 4.5-9 4.5 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I5=[["path",{d:"M3.5 13h6"}],["path",{d:"m2 16 4.5-9 4.5 9"}],["path",{d:"M18 16V7"}],["path",{d:"m14 11 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N5=[["circle",{cx:"16",cy:"4",r:"1"}],["path",{d:"m18 19 1-7-6 1"}],["path",{d:"m5 8 3-3 5.5 3-2.36 3.5"}],["path",{d:"M4.24 14.5a5 5 0 0 0 6.88 6"}],["path",{d:"M13.76 17.5a5 5 0 0 0-6.88-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z5=[["path",{d:"M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $5=[["path",{d:"M18 17.5a2.5 2.5 0 1 1-4 2.03V12"}],["path",{d:"M6 12H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 8h12"}],["path",{d:"M6.6 15.572A2 2 0 1 0 10 17v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R5=[["path",{d:"M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"}],["path",{d:"m12 15 5 6H7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Un=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"m9 13 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yn=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"M9 13h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B5=[["path",{d:"M6.87 6.87a8 8 0 1 0 11.26 11.26"}],["path",{d:"M19.9 14.25a8 8 0 0 0-9.15-9.15"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.26 18.67 4 21"}],["path",{d:"m2 2 20 20"}],["path",{d:"M4 4 2 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kn=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"M12 10v6"}],["path",{d:"M9 13h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F5=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M12 9v4l2 2"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q5=[["path",{d:"M11 21c0-2.5 2-2.5 2-5"}],["path",{d:"M16 21c0-2.5 2-2.5 2-5"}],["path",{d:"m19 8-.8 3a1.25 1.25 0 0 1-1.2 1H7a1.25 1.25 0 0 1-1.2-1L5 8"}],["path",{d:"M21 3a1 1 0 0 1 1 1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a1 1 0 0 1 1-1z"}],["path",{d:"M6 21c0-2.5 2-2.5 2-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W5=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["polyline",{points:"11 3 11 11 14 8 17 11 17 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j5=[["path",{d:"M2 12h20"}],["path",{d:"M10 16v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4"}],["path",{d:"M10 8V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v4"}],["path",{d:"M20 16v1a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-1"}],["path",{d:"M14 8V7c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G5=[["path",{d:"M12 2v20"}],["path",{d:"M8 10H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h4"}],["path",{d:"M16 10h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-4"}],["path",{d:"M8 20H7a2 2 0 0 1-2-2v-2c0-1.1.9-2 2-2h1"}],["path",{d:"M16 14h1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z5=[["path",{d:"M17 12H7"}],["path",{d:"M19 18H5"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X5=[["rect",{width:"6",height:"16",x:"4",y:"2",rx:"2"}],["rect",{width:"6",height:"9",x:"14",y:"9",rx:"2"}],["path",{d:"M22 22H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U5=[["rect",{width:"16",height:"6",x:"2",y:"4",rx:"2"}],["rect",{width:"9",height:"6",x:"9",y:"14",rx:"2"}],["path",{d:"M22 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y5=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M17 22v-5"}],["path",{d:"M17 7V2"}],["path",{d:"M7 22v-3"}],["path",{d:"M7 5V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K5=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M4 2v20"}],["path",{d:"M14 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q5=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M10 2v20"}],["path",{d:"M20 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J5=[["rect",{width:"6",height:"14",x:"2",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"16",y:"7",rx:"2"}],["path",{d:"M12 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t3=[["rect",{width:"6",height:"14",x:"6",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"16",y:"7",rx:"2"}],["path",{d:"M2 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e3=[["rect",{width:"6",height:"14",x:"2",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"12",y:"7",rx:"2"}],["path",{d:"M22 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a3=[["rect",{width:"6",height:"10",x:"9",y:"7",rx:"2"}],["path",{d:"M4 22V2"}],["path",{d:"M20 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i3=[["rect",{width:"6",height:"14",x:"3",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"15",y:"7",rx:"2"}],["path",{d:"M3 2v20"}],["path",{d:"M21 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n3=[["path",{d:"M3 12h18"}],["path",{d:"M3 18h18"}],["path",{d:"M3 6h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r3=[["path",{d:"M15 12H3"}],["path",{d:"M17 18H3"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s3=[["path",{d:"M21 12H9"}],["path",{d:"M21 18H7"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o3=[["rect",{width:"6",height:"16",x:"4",y:"6",rx:"2"}],["rect",{width:"6",height:"9",x:"14",y:"6",rx:"2"}],["path",{d:"M22 2H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l3=[["rect",{width:"9",height:"6",x:"6",y:"14",rx:"2"}],["rect",{width:"16",height:"6",x:"6",y:"4",rx:"2"}],["path",{d:"M2 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h3=[["path",{d:"M22 17h-3"}],["path",{d:"M22 7h-5"}],["path",{d:"M5 17H2"}],["path",{d:"M7 7H2"}],["rect",{x:"5",y:"14",width:"14",height:"6",rx:"2"}],["rect",{x:"7",y:"4",width:"10",height:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d3=[["rect",{width:"14",height:"6",x:"5",y:"14",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"4",rx:"2"}],["path",{d:"M2 20h20"}],["path",{d:"M2 10h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c3=[["rect",{width:"14",height:"6",x:"5",y:"14",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"4",rx:"2"}],["path",{d:"M2 14h20"}],["path",{d:"M2 4h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p3=[["rect",{width:"14",height:"6",x:"5",y:"16",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"2",rx:"2"}],["path",{d:"M2 12h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u3=[["rect",{width:"14",height:"6",x:"5",y:"12",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"2",rx:"2"}],["path",{d:"M2 22h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f3=[["rect",{width:"14",height:"6",x:"5",y:"16",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"6",rx:"2"}],["path",{d:"M2 2h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M3=[["rect",{width:"10",height:"6",x:"7",y:"9",rx:"2"}],["path",{d:"M22 20H2"}],["path",{d:"M22 4H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m3=[["rect",{width:"14",height:"6",x:"5",y:"15",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"3",rx:"2"}],["path",{d:"M2 21h20"}],["path",{d:"M2 3h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v3=[["path",{d:"M10 10H6"}],["path",{d:"M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"}],["path",{d:"M19 18h2a1 1 0 0 0 1-1v-3.28a1 1 0 0 0-.684-.948l-1.923-.641a1 1 0 0 1-.578-.502l-1.539-3.076A1 1 0 0 0 16.382 8H14"}],["path",{d:"M8 8v4"}],["path",{d:"M9 18h6"}],["circle",{cx:"17",cy:"18",r:"2"}],["circle",{cx:"7",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g3=[["path",{d:"M17.5 12c0 4.4-3.6 8-8 8A4.5 4.5 0 0 1 5 15.5c0-6 8-4 8-8.5a3 3 0 1 0-6 0c0 3 2.5 8.5 12 13"}],["path",{d:"M16 12h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y3=[["path",{d:"M10 17c-5-3-7-7-7-9a2 2 0 0 1 4 0c0 2.5-5 2.5-5 6 0 1.7 1.3 3 3 3 2.8 0 5-2.2 5-5"}],["path",{d:"M22 17c-5-3-7-7-7-9a2 2 0 0 1 4 0c0 2.5-5 2.5-5 6 0 1.7 1.3 3 3 3 2.8 0 5-2.2 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x3=[["path",{d:"M10 2v5.632c0 .424-.272.795-.653.982A6 6 0 0 0 6 14c.006 4 3 7 5 8"}],["path",{d:"M10 5H8a2 2 0 0 0 0 4h.68"}],["path",{d:"M14 2v5.632c0 .424.272.795.652.982A6 6 0 0 1 18 14c0 4-3 7-5 8"}],["path",{d:"M14 5h2a2 2 0 0 1 0 4h-.68"}],["path",{d:"M18 22H6"}],["path",{d:"M9 2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w3=[["path",{d:"M12 22V8"}],["path",{d:"M5 12H2a10 10 0 0 0 20 0h-3"}],["circle",{cx:"12",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 16s-1.5-2-4-2-4 2-4 2"}],["path",{d:"M7.5 8 10 9"}],["path",{d:"m14 9 2.5-1"}],["path",{d:"M9 10h.01"}],["path",{d:"M15 10h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 15h8"}],["path",{d:"M8 9h2"}],["path",{d:"M14 9h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S3=[["path",{d:"M2 12 7 2"}],["path",{d:"m7 12 5-10"}],["path",{d:"m12 12 5-10"}],["path",{d:"m17 12 5-10"}],["path",{d:"M4.5 7h15"}],["path",{d:"M12 16v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C3=[["path",{d:"M7 10H6a4 4 0 0 1-4-4 1 1 0 0 1 1-1h4"}],["path",{d:"M7 5a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1 7 7 0 0 1-7 7H8a1 1 0 0 1-1-1z"}],["path",{d:"M9 12v5"}],["path",{d:"M15 12v5"}],["path",{d:"M5 20a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3 1 1 0 0 1-1 1H6a1 1 0 0 1-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m14.31 8 5.74 9.94"}],["path",{d:"M9.69 8h11.48"}],["path",{d:"m7.38 12 5.74-9.94"}],["path",{d:"M9.69 16 3.95 6.06"}],["path",{d:"M14.31 16H2.83"}],["path",{d:"m16.62 12-5.74 9.94"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T3=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 8h.01"}],["path",{d:"M10 8h.01"}],["path",{d:"M14 8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _3=[["rect",{x:"2",y:"4",width:"20",height:"16",rx:"2"}],["path",{d:"M10 4v4"}],["path",{d:"M2 8h20"}],["path",{d:"M6 4v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H3=[["path",{d:"M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"}],["path",{d:"M10 2c1 .5 2 2 2 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L3=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h2"}],["path",{d:"M20 8v11a2 2 0 0 1-2 2h-2"}],["path",{d:"m9 15 3-3 3 3"}],["path",{d:"M12 12v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V3=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"}],["path",{d:"M10 12h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P3=[["path",{d:"M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"}],["path",{d:"M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D3=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"}],["path",{d:"m9.5 17 5-5"}],["path",{d:"m9.5 12 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O3=[["path",{d:"M15 5H9"}],["path",{d:"M15 9v3h4l-7 7-7-7h4V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k3=[["path",{d:"M15 6v6h4l-7 7-7-7h4V6h6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I3=[["path",{d:"M19 15V9"}],["path",{d:"M15 15h-3v4l-7-7 7-7v4h3v6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N3=[["path",{d:"M18 15h-6v4l-7-7 7-7v4h6v6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z3=[["path",{d:"M5 9v6"}],["path",{d:"M9 9h3V5l7 7-7 7v-4H9V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $3=[["path",{d:"M9 19h6"}],["path",{d:"M9 15v-3H5l7-7 7 7h-4v3H9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R3=[["path",{d:"M6 9h6V5l7 7-7 7v-4H6V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B3=[["path",{d:"M9 18v-6H5l7-7 7 7h-4v6H9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F3=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["rect",{x:"15",y:"4",width:"4",height:"6",ry:"2"}],["path",{d:"M17 20v-6h-2"}],["path",{d:"M15 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q3=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M17 10V4h-2"}],["path",{d:"M15 10h4"}],["rect",{x:"15",y:"14",width:"4",height:"6",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qn=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M20 8h-5"}],["path",{d:"M15 10V6.5a2.5 2.5 0 0 1 5 0V10"}],["path",{d:"M15 14h5l-5 6h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W3=[["path",{d:"M19 3H5"}],["path",{d:"M12 21V7"}],["path",{d:"m6 15 6 6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j3=[["path",{d:"M17 7 7 17"}],["path",{d:"M17 17H7V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G3=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M11 4h4"}],["path",{d:"M11 8h7"}],["path",{d:"M11 12h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z3=[["path",{d:"m7 7 10 10"}],["path",{d:"M17 7v10H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X3=[["path",{d:"M12 2v14"}],["path",{d:"m19 9-7 7-7-7"}],["circle",{cx:"12",cy:"21",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U3=[["path",{d:"M12 17V3"}],["path",{d:"m6 11 6 6 6-6"}],["path",{d:"M19 21H5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y3=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"m21 8-4-4-4 4"}],["path",{d:"M17 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jn=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M11 4h10"}],["path",{d:"M11 8h7"}],["path",{d:"M11 12h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tr=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 4v16"}],["path",{d:"M15 4h5l-5 6h5"}],["path",{d:"M15 20v-3.5a2.5 2.5 0 0 1 5 0V20"}],["path",{d:"M20 18h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K3=[["path",{d:"M12 5v14"}],["path",{d:"m19 12-7 7-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q3=[["path",{d:"m9 6-6 6 6 6"}],["path",{d:"M3 12h14"}],["path",{d:"M21 19V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J3=[["path",{d:"M8 3 4 7l4 4"}],["path",{d:"M4 7h16"}],["path",{d:"m16 21 4-4-4-4"}],["path",{d:"M20 17H4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t6=[["path",{d:"M3 19V5"}],["path",{d:"m13 6-6 6 6 6"}],["path",{d:"M7 12h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e6=[["path",{d:"m12 19-7-7 7-7"}],["path",{d:"M19 12H5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a6=[["path",{d:"M3 5v14"}],["path",{d:"M21 12H7"}],["path",{d:"m15 18 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i6=[["path",{d:"m16 3 4 4-4 4"}],["path",{d:"M20 7H4"}],["path",{d:"m8 21-4-4 4-4"}],["path",{d:"M4 17h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n6=[["path",{d:"M17 12H3"}],["path",{d:"m11 18 6-6-6-6"}],["path",{d:"M21 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r6=[["path",{d:"M5 12h14"}],["path",{d:"m12 5 7 7-7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s6=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["rect",{x:"15",y:"4",width:"4",height:"6",ry:"2"}],["path",{d:"M17 20v-6h-2"}],["path",{d:"M15 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o6=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M17 10V4h-2"}],["path",{d:"M15 10h4"}],["rect",{x:"15",y:"14",width:"4",height:"6",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const er=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M20 8h-5"}],["path",{d:"M15 10V6.5a2.5 2.5 0 0 1 5 0V10"}],["path",{d:"M15 14h5l-5 6h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l6=[["path",{d:"m21 16-4 4-4-4"}],["path",{d:"M17 20V4"}],["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h6=[["path",{d:"m5 9 7-7 7 7"}],["path",{d:"M12 16V2"}],["circle",{cx:"12",cy:"21",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d6=[["path",{d:"m18 9-6-6-6 6"}],["path",{d:"M12 3v14"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c6=[["path",{d:"M7 17V7h10"}],["path",{d:"M17 17 7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ar=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M11 12h4"}],["path",{d:"M11 16h7"}],["path",{d:"M11 20h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p6=[["path",{d:"M7 7h10v10"}],["path",{d:"M7 17 17 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u6=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M11 12h10"}],["path",{d:"M11 16h7"}],["path",{d:"M11 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f6=[["path",{d:"M5 3h14"}],["path",{d:"m18 13-6-6-6 6"}],["path",{d:"M12 7v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ir=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M15 4h5l-5 6h5"}],["path",{d:"M15 20v-3.5a2.5 2.5 0 0 1 5 0V20"}],["path",{d:"M20 18h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M6=[["path",{d:"m5 12 7-7 7 7"}],["path",{d:"M12 19V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m6=[["path",{d:"M12 6v12"}],["path",{d:"M17.196 9 6.804 15"}],["path",{d:"m6.804 9 10.392 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v6=[["path",{d:"m4 6 3-3 3 3"}],["path",{d:"M7 17V3"}],["path",{d:"m14 6 3-3 3 3"}],["path",{d:"M17 17V3"}],["path",{d:"M4 21h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g6=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y6=[["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M20.2 20.2c2.04-2.03.02-7.36-4.5-11.9-4.54-4.52-9.87-6.54-11.9-4.5-2.04 2.03-.02 7.36 4.5 11.9 4.54 4.52 9.87 6.54 11.9 4.5Z"}],["path",{d:"M15.7 15.7c4.52-4.54 6.54-9.87 4.5-11.9-2.03-2.04-7.36-.02-11.9 4.5-4.52 4.54-6.54 9.87-4.5 11.9 2.03 2.04 7.36.02 11.9-4.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x6=[["path",{d:"M2 10v3"}],["path",{d:"M6 6v11"}],["path",{d:"M10 3v18"}],["path",{d:"M14 8v7"}],["path",{d:"M18 5v13"}],["path",{d:"M22 10v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w6=[["path",{d:"M2 13a2 2 0 0 0 2-2V7a2 2 0 0 1 4 0v13a2 2 0 0 0 4 0V4a2 2 0 0 1 4 0v13a2 2 0 0 0 4 0v-4a2 2 0 0 1 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b6=[["path",{d:"m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"}],["circle",{cx:"12",cy:"8",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E6=[["path",{d:"m14 12-8.381 8.38a1 1 0 0 1-3.001-3L11 9"}],["path",{d:"M15 15.5a.5.5 0 0 0 .5.5A6.5 6.5 0 0 0 22 9.5a.5.5 0 0 0-.5-.5h-1.672a2 2 0 0 1-1.414-.586l-5.062-5.062a1.205 1.205 0 0 0-1.704 0L9.352 5.648a1.205 1.205 0 0 0 0 1.704l5.062 5.062A2 2 0 0 1 15 13.828z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nr=[["path",{d:"M13.5 10.5 15 9"}],["path",{d:"M4 4v15a1 1 0 0 0 1 1h15"}],["path",{d:"M4.293 19.707 6 18"}],["path",{d:"m9 15 1.5-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S6=[["path",{d:"M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"}],["path",{d:"M15 12h.01"}],["path",{d:"M19.38 6.813A9 9 0 0 1 20.8 10.2a2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1"}],["path",{d:"M9 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C6=[["path",{d:"M4 10a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"}],["path",{d:"M8 10h8"}],["path",{d:"M8 18h8"}],["path",{d:"M8 22v-6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v6"}],["path",{d:"M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"8",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rr=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M12 7v10"}],["path",{d:"M15.4 10a4 4 0 1 0 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M7 12h5"}],["path",{d:"M15 9.4a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M8 8h8"}],["path",{d:"M8 12h8"}],["path",{d:"m13 17-5-1h1a4 4 0 0 0 0-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"16",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"8",y2:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m9 8 3 3v7"}],["path",{d:"m12 11 3-3"}],["path",{d:"M9 12h6"}],["path",{d:"M9 16h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M8 12h4"}],["path",{d:"M10 16V9.5a2.5 2.5 0 0 1 5 0"}],["path",{d:"M8 16h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"8",y2:"16"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sr=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["line",{x1:"12",x2:"12.01",y1:"17",y2:"17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M9 16h5"}],["path",{d:"M9 12h5a2 2 0 1 0 0-4h-3v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M11 17V8h4"}],["path",{d:"M11 12h3"}],["path",{d:"M9 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"15",x2:"9",y1:"9",y2:"15"}],["line",{x1:"9",x2:"15",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R6=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B6=[["path",{d:"M22 18H6a2 2 0 0 1-2-2V7a2 2 0 0 0-2-2"}],["path",{d:"M17 14V4a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v10"}],["rect",{width:"13",height:"8",x:"8",y:"6",rx:"1"}],["circle",{cx:"18",cy:"20",r:"2"}],["circle",{cx:"9",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F6=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m4.9 4.9 14.2 14.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q6=[["path",{d:"M4 13c3.5-2 8-2 10 2a5.5 5.5 0 0 1 8 5"}],["path",{d:"M5.15 17.89c5.52-1.52 8.65-6.89 7-12C11.55 4 11.5 2 13 2c3.22 0 5 5.5 5 8 0 6.5-4.2 12-10.49 12C5.11 22 2 22 2 20c0-1.5 1.14-1.55 3.15-2.11Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W6=[["path",{d:"M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"m16 19 3 3 3-3"}],["path",{d:"M18 12h.01"}],["path",{d:"M19 16v6"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j6=[["path",{d:"M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"M18 12h.01"}],["path",{d:"M19 22v-6"}],["path",{d:"m22 19-3-3-3 3"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G6=[["path",{d:"M10 10.01h.01"}],["path",{d:"M10 14.01h.01"}],["path",{d:"M14 10.01h.01"}],["path",{d:"M14 14.01h.01"}],["path",{d:"M18 6v11.5"}],["path",{d:"M6 6v12"}],["rect",{x:"2",y:"6",width:"20",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z6=[["path",{d:"M13 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"m17 17 5 5"}],["path",{d:"M18 12h.01"}],["path",{d:"m22 17-5 5"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X6=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M6 12h.01M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U6=[["path",{d:"M3 5v14"}],["path",{d:"M8 5v14"}],["path",{d:"M12 5v14"}],["path",{d:"M17 5v14"}],["path",{d:"M21 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y6=[["path",{d:"M10 3a41 41 0 0 0 0 18"}],["path",{d:"M14 3a41 41 0 0 1 0 18"}],["path",{d:"M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"}],["path",{d:"M3.84 17h16.32"}],["path",{d:"M3.84 7h16.32"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K6=[["path",{d:"M4 20h16"}],["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q6=[["path",{d:"M10 4 8 6"}],["path",{d:"M17 19v2"}],["path",{d:"M2 12h20"}],["path",{d:"M7 19v2"}],["path",{d:"M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J6=[["path",{d:"m11 7-3 5h4l-3 5"}],["path",{d:"M14.856 6H16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.935"}],["path",{d:"M22 14v-4"}],["path",{d:"M5.14 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2.936"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t8=[["path",{d:"M10 10v4"}],["path",{d:"M14 10v4"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 10v4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e8=[["path",{d:"M22 14v-4"}],["path",{d:"M6 14v-4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a8=[["path",{d:"M10 14v-4"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 14v-4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i8=[["path",{d:"M10 9v6"}],["path",{d:"M12.543 6H16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.605"}],["path",{d:"M22 14v-4"}],["path",{d:"M7 12h6"}],["path",{d:"M7.606 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.606"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n8=[["path",{d:"M10 17h.01"}],["path",{d:"M10 7v6"}],["path",{d:"M14 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r8=[["path",{d:"M 22 14 L 22 10"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s8=[["path",{d:"M4.5 3h15"}],["path",{d:"M6 3v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V3"}],["path",{d:"M6 14h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o8=[["path",{d:"M9 9c-.64.64-1.521.954-2.402 1.165A6 6 0 0 0 8 22a13.96 13.96 0 0 0 9.9-4.1"}],["path",{d:"M10.75 5.093A6 6 0 0 1 22 8c0 2.411-.61 4.68-1.683 6.66"}],["path",{d:"M5.341 10.62a4 4 0 0 0 6.487 1.208M10.62 5.341a4.015 4.015 0 0 1 2.039 2.04"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l8=[["path",{d:"M10.165 6.598C9.954 7.478 9.64 8.36 9 9c-.64.64-1.521.954-2.402 1.165A6 6 0 0 0 8 22c7.732 0 14-6.268 14-14a6 6 0 0 0-11.835-1.402Z"}],["path",{d:"M5.341 10.62a4 4 0 1 0 5.279-5.28"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h8=[["path",{d:"M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"}],["path",{d:"M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"}],["path",{d:"M12 4v6"}],["path",{d:"M2 18h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d8=[["path",{d:"M3 20v-8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8"}],["path",{d:"M5 10V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4"}],["path",{d:"M3 18h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c8=[["path",{d:"M2 4v16"}],["path",{d:"M2 8h18a2 2 0 0 1 2 2v10"}],["path",{d:"M2 17h20"}],["path",{d:"M6 8v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p8=[["path",{d:"M16.4 13.7A6.5 6.5 0 1 0 6.28 6.6c-1.1 3.13-.78 3.9-3.18 6.08A3 3 0 0 0 5 18c4 0 8.4-1.8 11.4-4.3"}],["path",{d:"m18.5 6 2.19 4.5a6.48 6.48 0 0 1-2.29 7.2C15.4 20.2 11 22 7 22a3 3 0 0 1-2.68-1.66L2.4 16.5"}],["circle",{cx:"12.5",cy:"8.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u8=[["path",{d:"M13 13v5"}],["path",{d:"M17 11.47V8"}],["path",{d:"M17 11h1a3 3 0 0 1 2.745 4.211"}],["path",{d:"m2 2 20 20"}],["path",{d:"M5 8v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-3"}],["path",{d:"M7.536 7.535C6.766 7.649 6.154 8 5.5 8a2.5 2.5 0 0 1-1.768-4.268"}],["path",{d:"M8.727 3.204C9.306 2.767 9.885 2 11 2c1.56 0 2 1.5 3 1.5s1.72-.5 2.5-.5a1 1 0 1 1 0 5c-.78 0-1.5-.5-2.5-.5a3.149 3.149 0 0 0-.842.12"}],["path",{d:"M9 14.6V18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f8=[["path",{d:"M17 11h1a3 3 0 0 1 0 6h-1"}],["path",{d:"M9 12v6"}],["path",{d:"M13 12v6"}],["path",{d:"M14 7.5c-1 0-1.44.5-3 .5s-2-.5-3-.5-1.72.5-2.5.5a2.5 2.5 0 0 1 0-5c.78 0 1.57.5 2.5.5S9.44 2 11 2s2 1.5 3 1.5 1.72-.5 2.5-.5a2.5 2.5 0 0 1 0 5c-.78 0-1.5-.5-2.5-.5Z"}],["path",{d:"M5 8v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M13.916 2.314A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.74 7.327A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673 9 9 0 0 1-.585-.665"}],["circle",{cx:"18",cy:"8",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m8=[["path",{d:"M18.518 17.347A7 7 0 0 1 14 19"}],["path",{d:"M18.8 4A11 11 0 0 1 20 9"}],["path",{d:"M9 9h.01"}],["circle",{cx:"20",cy:"16",r:"2"}],["circle",{cx:"9",cy:"9",r:"7"}],["rect",{x:"4",y:"16",width:"10",height:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M15 8h6"}],["path",{d:"M16.243 3.757A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673A9.4 9.4 0 0 1 18.667 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M17 17H4a1 1 0 0 1-.74-1.673C4.59 13.956 6 12.499 6 8a6 6 0 0 1 .258-1.742"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.668 3.01A6 6 0 0 1 18 8c0 2.687.77 4.653 1.707 6.05"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M15 8h6"}],["path",{d:"M18 5v6"}],["path",{d:"M20.002 14.464a9 9 0 0 0 .738.863A1 1 0 0 1 20 17H4a1 1 0 0 1-.74-1.673C4.59 13.956 6 12.499 6 8a6 6 0 0 1 8.75-5.332"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M22 8c0-2.3-.8-4.3-2-6"}],["path",{d:"M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"}],["path",{d:"M4 2C2.8 3.7 2 5.7 2 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w8=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const or=[["rect",{width:"13",height:"7",x:"3",y:"3",rx:"1"}],["path",{d:"m22 15-3-3 3-3"}],["rect",{width:"13",height:"7",x:"3",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lr=[["rect",{width:"13",height:"7",x:"8",y:"3",rx:"1"}],["path",{d:"m2 9 3 3-3 3"}],["rect",{width:"13",height:"7",x:"8",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b8=[["rect",{width:"7",height:"13",x:"3",y:"3",rx:"1"}],["path",{d:"m9 22 3-3 3 3"}],["rect",{width:"7",height:"13",x:"14",y:"3",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E8=[["rect",{width:"7",height:"13",x:"3",y:"8",rx:"1"}],["path",{d:"m15 2-3 3-3-3"}],["rect",{width:"7",height:"13",x:"14",y:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S8=[["path",{d:"M12.409 13.017A5 5 0 0 1 22 15c0 3.866-4 7-9 7-4.077 0-8.153-.82-10.371-2.462-.426-.316-.631-.832-.62-1.362C2.118 12.723 2.627 2 10 2a3 3 0 0 1 3 3 2 2 0 0 1-2 2c-1.105 0-1.64-.444-2-1"}],["path",{d:"M15 14a5 5 0 0 0-7.584 2"}],["path",{d:"M9.964 6.825C8.019 7.977 9.5 13 8 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C8=[["rect",{x:"14",y:"14",width:"4",height:"6",rx:"2"}],["rect",{x:"6",y:"4",width:"4",height:"6",rx:"2"}],["path",{d:"M6 20h4"}],["path",{d:"M14 10h4"}],["path",{d:"M6 14h2v6"}],["path",{d:"M14 4h2v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A8=[["circle",{cx:"18.5",cy:"17.5",r:"3.5"}],["circle",{cx:"5.5",cy:"17.5",r:"3.5"}],["circle",{cx:"15",cy:"5",r:"1"}],["path",{d:"M12 17.5V14l-3-3 4-3 2 3h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T8=[["path",{d:"M10 10h4"}],["path",{d:"M19 7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3"}],["path",{d:"M20 21a2 2 0 0 0 2-2v-3.851c0-1.39-2-2.962-2-4.829V8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2z"}],["path",{d:"M 22 16 L 2 16"}],["path",{d:"M4 21a2 2 0 0 1-2-2v-3.851c0-1.39 2-2.962 2-4.829V8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v11a2 2 0 0 1-2 2z"}],["path",{d:"M9 7V4a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _8=[["circle",{cx:"12",cy:"11.9",r:"2"}],["path",{d:"M6.7 3.4c-.9 2.5 0 5.2 2.2 6.7C6.5 9 3.7 9.6 2 11.6"}],["path",{d:"m8.9 10.1 1.4.8"}],["path",{d:"M17.3 3.4c.9 2.5 0 5.2-2.2 6.7 2.4-1.2 5.2-.6 6.9 1.5"}],["path",{d:"m15.1 10.1-1.4.8"}],["path",{d:"M16.7 20.8c-2.6-.4-4.6-2.6-4.7-5.3-.2 2.6-2.1 4.8-4.7 5.2"}],["path",{d:"M12 13.9v1.6"}],["path",{d:"M13.5 5.4c-1-.2-2-.2-3 0"}],["path",{d:"M17 16.4c.7-.7 1.2-1.6 1.5-2.5"}],["path",{d:"M5.5 13.9c.3.9.8 1.8 1.5 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H8=[["path",{d:"M16 7h.01"}],["path",{d:"M3.4 18H12a8 8 0 0 0 8-8V7a4 4 0 0 0-7.28-2.3L2 20"}],["path",{d:"m20 7 2 .5-2 .5"}],["path",{d:"M10 18v3"}],["path",{d:"M14 17.75V21"}],["path",{d:"M7 18a6 6 0 0 0 3.84-10.61"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L8=[["circle",{cx:"9",cy:"9",r:"7"}],["circle",{cx:"15",cy:"15",r:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V8=[["path",{d:"M11.767 19.089c4.924.868 6.14-6.025 1.216-6.894m-1.216 6.894L5.86 18.047m5.908 1.042-.347 1.97m1.563-8.864c4.924.869 6.14-6.025 1.215-6.893m-1.215 6.893-3.94-.694m5.155-6.2L8.29 4.26m5.908 1.042.348-1.97M7.48 20.364l3.126-17.727"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P8=[["path",{d:"M3 3h18"}],["path",{d:"M20 7H8"}],["path",{d:"M20 11H8"}],["path",{d:"M10 19h10"}],["path",{d:"M8 15h12"}],["path",{d:"M4 3v14"}],["circle",{cx:"4",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D8=[["path",{d:"M10 22V7a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a1 1 0 0 0-1-1H2"}],["rect",{x:"14",y:"2",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O8=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}],["line",{x1:"18",x2:"21",y1:"12",y2:"12"}],["line",{x1:"3",x2:"6",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k8=[["path",{d:"m17 17-5 5V12l-5 5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M14.5 9.5 17 7l-5-5v4.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I8=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}],["path",{d:"M20.83 14.83a4 4 0 0 0 0-5.66"}],["path",{d:"M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N8=[["path",{d:"M6 12h9a4 4 0 0 1 0 8H7a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h7a4 4 0 0 1 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z8=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $8=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R8=[["circle",{cx:"11",cy:"13",r:"9"}],["path",{d:"M14.35 4.65 16.3 2.7a2.41 2.41 0 0 1 3.4 0l1.6 1.6a2.4 2.4 0 0 1 0 3.4l-1.95 1.95"}],["path",{d:"m22 2-1.5 1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B8=[["path",{d:"M17 10c.7-.7 1.69 0 2.5 0a2.5 2.5 0 1 0 0-5 .5.5 0 0 1-.5-.5 2.5 2.5 0 1 0-5 0c0 .81.7 1.8 0 2.5l-7 7c-.7.7-1.69 0-2.5 0a2.5 2.5 0 0 0 0 5c.28 0 .5.22.5.5a2.5 2.5 0 1 0 5 0c0-.81-.7-1.8 0-2.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F8=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m8 13 4-7 4 7"}],["path",{d:"M9.1 11h5.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q8=[["path",{d:"M12 13h.01"}],["path",{d:"M12 6v3"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W8=[["path",{d:"M12 6v7"}],["path",{d:"M16 8v3"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 8v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j8=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 9.5 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G8=[["path",{d:"M2 16V4a2 2 0 0 1 2-2h11"}],["path",{d:"M22 18H11a2 2 0 1 0 0 4h10.5a.5.5 0 0 0 .5-.5v-15a.5.5 0 0 0-.5-.5H11a2 2 0 0 0-2 2v12"}],["path",{d:"M5 14H4a2 2 0 1 0 0 4h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z8=[["path",{d:"M12 13V7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 10 3 3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hr=[["path",{d:"M12 17h1.5"}],["path",{d:"M12 22h1.5"}],["path",{d:"M12 2h1.5"}],["path",{d:"M17.5 22H19a1 1 0 0 0 1-1"}],["path",{d:"M17.5 2H19a1 1 0 0 1 1 1v1.5"}],["path",{d:"M20 14v3h-2.5"}],["path",{d:"M20 8.5V10"}],["path",{d:"M4 10V8.5"}],["path",{d:"M4 19.5V14"}],["path",{d:"M4 4.5A2.5 2.5 0 0 1 6.5 2H8"}],["path",{d:"M8 22H6.5a1 1 0 0 1 0-5H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X8=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 12v-2a4 4 0 0 1 8 0v2"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"9",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U8=[["path",{d:"M16 8.2A2.22 2.22 0 0 0 13.8 6c-.8 0-1.4.3-1.8.9-.4-.6-1-.9-1.8-.9A2.22 2.22 0 0 0 8 8.2c0 .6.3 1.2.7 1.6A226.652 226.652 0 0 0 12 13a404 404 0 0 0 3.3-3.1 2.413 2.413 0 0 0 .7-1.7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y8=[["path",{d:"m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["circle",{cx:"10",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K8=[["path",{d:"m19 3 1 1"}],["path",{d:"m20 2-4.5 4.5"}],["path",{d:"M20 7.898V21a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2h7.844"}],["circle",{cx:"14",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q8=[["path",{d:"M18 6V4a2 2 0 1 0-4 0v2"}],["path",{d:"M20 15v6a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H10"}],["rect",{x:"12",y:"6",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J8=[["path",{d:"M10 2v8l3-3 3 3V2"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tM=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eM=[["path",{d:"M12 7v14"}],["path",{d:"M16 12h2"}],["path",{d:"M16 8h2"}],["path",{d:"M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"}],["path",{d:"M6 12h2"}],["path",{d:"M6 8h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aM=[["path",{d:"M12 21V7"}],["path",{d:"m16 12 2 2 4-4"}],["path",{d:"M22 6V4a1 1 0 0 0-1-1h-5a4 4 0 0 0-4 4 4 4 0 0 0-4-4H3a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h6a3 3 0 0 1 3 3 3 3 0 0 1 3-3h6a1 1 0 0 0 1-1v-1.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iM=[["path",{d:"M12 7v14"}],["path",{d:"M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nM=[["path",{d:"M12 7v6"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rM=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 11h8"}],["path",{d:"M8 7h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sM=[["path",{d:"M10 13h4"}],["path",{d:"M12 6v7"}],["path",{d:"M16 8V6H8v2"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oM=[["path",{d:"M12 13V7"}],["path",{d:"M18 2h1a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2"}],["path",{d:"m9 10 3-3 3 3"}],["path",{d:"m9 5 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lM=[["path",{d:"M15 13a3 3 0 1 0-6 0"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["circle",{cx:"12",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hM=[["path",{d:"M12 13V7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 10 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dM=[["path",{d:"m14.5 7-5 5"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9.5 7 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cM=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pM=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2Z"}],["path",{d:"m9 10 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uM=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}],["line",{x1:"15",x2:"9",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fM=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}],["line",{x1:"12",x2:"12",y1:"7",y2:"13"}],["line",{x1:"15",x2:"9",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MM=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2Z"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mM=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vM=[["path",{d:"M4 9V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"}],["path",{d:"M8 8v1"}],["path",{d:"M12 8v1"}],["path",{d:"M16 8v1"}],["rect",{width:"20",height:"12",x:"2",y:"9",rx:"2"}],["circle",{cx:"8",cy:"15",r:"2"}],["circle",{cx:"16",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gM=[["path",{d:"M13.67 8H18a2 2 0 0 1 2 2v4.33"}],["path",{d:"M2 14h2"}],["path",{d:"M20 14h2"}],["path",{d:"M22 22 2 2"}],["path",{d:"M8 8H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 1.414-.586"}],["path",{d:"M9 13v2"}],["path",{d:"M9.67 4H12v2.33"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yM=[["path",{d:"M12 8V4H8"}],["rect",{width:"16",height:"12",x:"4",y:"8",rx:"2"}],["path",{d:"M2 14h2"}],["path",{d:"M20 14h2"}],["path",{d:"M15 13v2"}],["path",{d:"M9 13v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xM=[["path",{d:"M12 6V2H8"}],["path",{d:"m8 18-4 4V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z"}],["path",{d:"M2 12h2"}],["path",{d:"M9 11v2"}],["path",{d:"M15 11v2"}],["path",{d:"M20 12h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wM=[["path",{d:"M10 3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a6 6 0 0 0 1.2 3.6l.6.8A6 6 0 0 1 17 13v8a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-8a6 6 0 0 1 1.2-3.6l.6-.8A6 6 0 0 0 10 5z"}],["path",{d:"M17 13h-4a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bM=[["path",{d:"M17 3h4v4"}],["path",{d:"M18.575 11.082a13 13 0 0 1 1.048 9.027 1.17 1.17 0 0 1-1.914.597L14 17"}],["path",{d:"M7 10 3.29 6.29a1.17 1.17 0 0 1 .6-1.91 13 13 0 0 1 9.03 1.05"}],["path",{d:"M7 14a1.7 1.7 0 0 0-1.207.5l-2.646 2.646A.5.5 0 0 0 3.5 18H5a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .854.354L9.5 18.207A1.7 1.7 0 0 0 10 17v-2a1 1 0 0 0-1-1z"}],["path",{d:"M9.707 14.293 21 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EM=[["path",{d:"M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"}],["path",{d:"m3.3 7 8.7 5 8.7-5"}],["path",{d:"M12 22V12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SM=[["path",{d:"M2.97 12.92A2 2 0 0 0 2 14.63v3.24a2 2 0 0 0 .97 1.71l3 1.8a2 2 0 0 0 2.06 0L12 19v-5.5l-5-3-4.03 2.42Z"}],["path",{d:"m7 16.5-4.74-2.85"}],["path",{d:"m7 16.5 5-3"}],["path",{d:"M7 16.5v5.17"}],["path",{d:"M12 13.5V19l3.97 2.38a2 2 0 0 0 2.06 0l3-1.8a2 2 0 0 0 .97-1.71v-3.24a2 2 0 0 0-.97-1.71L17 10.5l-5 3Z"}],["path",{d:"m17 16.5-5-3"}],["path",{d:"m17 16.5 4.74-2.85"}],["path",{d:"M17 16.5v5.17"}],["path",{d:"M7.97 4.42A2 2 0 0 0 7 6.13v4.37l5 3 5-3V6.13a2 2 0 0 0-.97-1.71l-3-1.8a2 2 0 0 0-2.06 0l-3 1.8Z"}],["path",{d:"M12 8 7.26 5.15"}],["path",{d:"m12 8 4.74-2.85"}],["path",{d:"M12 13.5V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dr=[["path",{d:"M8 3H7a2 2 0 0 0-2 2v5a2 2 0 0 1-2 2 2 2 0 0 1 2 2v5c0 1.1.9 2 2 2h1"}],["path",{d:"M16 21h1a2 2 0 0 0 2-2v-5c0-1.1.9-2 2-2a2 2 0 0 1-2-2V5a2 2 0 0 0-2-2h-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CM=[["path",{d:"M16 3h3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-3"}],["path",{d:"M8 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AM=[["path",{d:"M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"}],["path",{d:"M9 13a4.5 4.5 0 0 0 3-4"}],["path",{d:"M6.003 5.125A3 3 0 0 0 6.401 6.5"}],["path",{d:"M3.477 10.896a4 4 0 0 1 .585-.396"}],["path",{d:"M6 18a4 4 0 0 1-1.967-.516"}],["path",{d:"M12 13h4"}],["path",{d:"M12 18h6a2 2 0 0 1 2 2v1"}],["path",{d:"M12 8h8"}],["path",{d:"M16 8V5a2 2 0 0 1 2-2"}],["circle",{cx:"16",cy:"13",r:".5"}],["circle",{cx:"18",cy:"3",r:".5"}],["circle",{cx:"20",cy:"21",r:".5"}],["circle",{cx:"20",cy:"8",r:".5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TM=[["path",{d:"m10.852 14.772-.383.923"}],["path",{d:"m10.852 9.228-.383-.923"}],["path",{d:"m13.148 14.772.382.924"}],["path",{d:"m13.531 8.305-.383.923"}],["path",{d:"m14.772 10.852.923-.383"}],["path",{d:"m14.772 13.148.923.383"}],["path",{d:"M17.598 6.5A3 3 0 1 0 12 5a3 3 0 0 0-5.63-1.446 3 3 0 0 0-.368 1.571 4 4 0 0 0-2.525 5.771"}],["path",{d:"M17.998 5.125a4 4 0 0 1 2.525 5.771"}],["path",{d:"M19.505 10.294a4 4 0 0 1-1.5 7.706"}],["path",{d:"M4.032 17.483A4 4 0 0 0 11.464 20c.18-.311.892-.311 1.072 0a4 4 0 0 0 7.432-2.516"}],["path",{d:"M4.5 10.291A4 4 0 0 0 6 18"}],["path",{d:"M6.002 5.125a3 3 0 0 0 .4 1.375"}],["path",{d:"m9.228 10.852-.923-.383"}],["path",{d:"m9.228 13.148-.923.383"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _M=[["path",{d:"M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"}],["path",{d:"M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"}],["path",{d:"M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"}],["path",{d:"M17.599 6.5a3 3 0 0 0 .399-1.375"}],["path",{d:"M6.003 5.125A3 3 0 0 0 6.401 6.5"}],["path",{d:"M3.477 10.896a4 4 0 0 1 .585-.396"}],["path",{d:"M19.938 10.5a4 4 0 0 1 .585.396"}],["path",{d:"M6 18a4 4 0 0 1-1.967-.516"}],["path",{d:"M19.967 17.484A4 4 0 0 1 18 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HM=[["path",{d:"M16 3v2.107"}],["path",{d:"M17 9c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 22 17a5 5 0 0 1-10 0c0-.3 0-.6.1-.9a2 2 0 1 0 3.3-2C13 11.5 16 9 17 9"}],["path",{d:"M21 8.274V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.938"}],["path",{d:"M3 15h5.253"}],["path",{d:"M3 9h8.228"}],["path",{d:"M8 15v6"}],["path",{d:"M8 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LM=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 9v6"}],["path",{d:"M16 15v6"}],["path",{d:"M16 3v6"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["path",{d:"M8 15v6"}],["path",{d:"M8 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VM=[["path",{d:"M12 12h.01"}],["path",{d:"M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"}],["path",{d:"M22 13a18.15 18.15 0 0 1-20 0"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PM=[["path",{d:"M10 20v2"}],["path",{d:"M14 20v2"}],["path",{d:"M18 20v2"}],["path",{d:"M21 20H3"}],["path",{d:"M6 20v2"}],["path",{d:"M8 16V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v12"}],["rect",{x:"4",y:"6",width:"16",height:"10",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DM=[["path",{d:"M12 11v4"}],["path",{d:"M14 13h-4"}],["path",{d:"M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"}],["path",{d:"M18 6v14"}],["path",{d:"M6 6v14"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OM=[["path",{d:"M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kM=[["rect",{x:"8",y:"8",width:"8",height:"8",rx:"2"}],["path",{d:"M4 10a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2"}],["path",{d:"M14 20a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IM=[["path",{d:"m16 22-1-4"}],["path",{d:"M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1"}],["path",{d:"M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z"}],["path",{d:"m8 22 1-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NM=[["path",{d:"m11 10 3 3"}],["path",{d:"M6.5 21A3.5 3.5 0 1 0 3 17.5a2.62 2.62 0 0 1-.708 1.792A1 1 0 0 0 3 21z"}],["path",{d:"M9.969 17.031 21.378 5.624a1 1 0 0 0-3.002-3.002L6.967 14.031"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zM=[["path",{d:"M7.2 14.8a2 2 0 0 1 2 2"}],["circle",{cx:"18.5",cy:"8.5",r:"3.5"}],["circle",{cx:"7.5",cy:"16.5",r:"5.5"}],["circle",{cx:"7.5",cy:"4.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $M=[["path",{d:"M15 7.13V6a3 3 0 0 0-5.14-2.1L8 2"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M22 13h-4v-2a4 4 0 0 0-4-4h-1.3"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7.7 7.7A4 4 0 0 0 6 11v3a6 6 0 0 0 11.13 3.13"}],["path",{d:"M12 20v-8"}],["path",{d:"M6 13H2"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RM=[["path",{d:"M12.765 21.522a.5.5 0 0 1-.765-.424v-8.196a.5.5 0 0 1 .765-.424l5.878 3.674a1 1 0 0 1 0 1.696z"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M18 11a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v3a6.1 6.1 0 0 0 2 4.5"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}],["path",{d:"M6 13H2"}],["path",{d:"M6.53 9C4.6 8.8 3 7.1 3 5"}],["path",{d:"m8 2 1.88 1.88"}],["path",{d:"M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BM=[["path",{d:"m8 2 1.88 1.88"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"}],["path",{d:"M12 20c-3.3 0-6-2.7-6-6v-3a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v3c0 3.3-2.7 6-6 6"}],["path",{d:"M12 20v-9"}],["path",{d:"M6.53 9C4.6 8.8 3 7.1 3 5"}],["path",{d:"M6 13H2"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"M22 13h-4"}],["path",{d:"M17.2 17c2.1.1 3.8 1.9 3.8 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FM=[["path",{d:"M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"}],["path",{d:"M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"}],["path",{d:"M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"}],["path",{d:"M10 6h4"}],["path",{d:"M10 10h4"}],["path",{d:"M10 14h4"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qM=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2",ry:"2"}],["path",{d:"M9 22v-4h6v4"}],["path",{d:"M8 6h.01"}],["path",{d:"M16 6h.01"}],["path",{d:"M12 6h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M16 10h.01"}],["path",{d:"M16 14h.01"}],["path",{d:"M8 10h.01"}],["path",{d:"M8 14h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WM=[["path",{d:"M4 6 2 7"}],["path",{d:"M10 6h4"}],["path",{d:"m22 7-2-1"}],["rect",{width:"16",height:"16",x:"4",y:"3",rx:"2"}],["path",{d:"M4 11h16"}],["path",{d:"M8 15h.01"}],["path",{d:"M16 15h.01"}],["path",{d:"M6 19v2"}],["path",{d:"M18 21v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jM=[["path",{d:"M8 6v6"}],["path",{d:"M15 6v6"}],["path",{d:"M2 12h19.6"}],["path",{d:"M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2l-1.4-5C20.1 6.8 19.1 6 18 6H4a2 2 0 0 0-2 2v10h3"}],["circle",{cx:"7",cy:"18",r:"2"}],["path",{d:"M9 18h5"}],["circle",{cx:"16",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GM=[["path",{d:"M10 3h.01"}],["path",{d:"M14 2h.01"}],["path",{d:"m2 9 20-5"}],["path",{d:"M12 12V6.5"}],["rect",{width:"16",height:"10",x:"4",y:"12",rx:"3"}],["path",{d:"M9 12v5"}],["path",{d:"M15 12v5"}],["path",{d:"M4 17h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZM=[["path",{d:"M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1"}],["path",{d:"M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9"}],["path",{d:"M21 21v-2h-4"}],["path",{d:"M3 5h4V3"}],["path",{d:"M7 5a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1V3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XM=[["circle",{cx:"9",cy:"7",r:"2"}],["path",{d:"M7.2 7.9 3 11v9c0 .6.4 1 1 1h16c.6 0 1-.4 1-1v-9c0-2-3-6-7-8l-3.6 2.6"}],["path",{d:"M16 13H3"}],["path",{d:"M16 17H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UM=[["path",{d:"M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"}],["path",{d:"M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1"}],["path",{d:"M2 21h20"}],["path",{d:"M7 8v3"}],["path",{d:"M12 8v3"}],["path",{d:"M17 8v3"}],["path",{d:"M7 4h.01"}],["path",{d:"M12 4h.01"}],["path",{d:"M17 4h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YM=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["line",{x1:"8",x2:"16",y1:"6",y2:"6"}],["line",{x1:"16",x2:"16",y1:"14",y2:"18"}],["path",{d:"M16 10h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M8 10h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M8 14h.01"}],["path",{d:"M12 18h.01"}],["path",{d:"M8 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KM=[["path",{d:"M11 14h1v4"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QM=[["path",{d:"m14 18 4 4 4-4"}],["path",{d:"M16 2v4"}],["path",{d:"M18 14v8"}],["path",{d:"M21 11.354V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.343"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JM=[["path",{d:"m14 18 4-4 4 4"}],["path",{d:"M16 2v4"}],["path",{d:"M18 22v-8"}],["path",{d:"M21 11.343V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h9"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"}],["path",{d:"M3 10h18"}],["path",{d:"m16 20 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const em=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"m9 16 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const am=[["path",{d:"M16 14v2.2l1.6 1"}],["path",{d:"M16 2v4"}],["path",{d:"M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"}],["path",{d:"M3 10h5"}],["path",{d:"M8 2v4"}],["circle",{cx:"16",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const im=[["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m15.228 19.148-.923.383"}],["path",{d:"M16 2v4"}],["path",{d:"m16.47 14.305.382.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["path",{d:"M21 11V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M8 14h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M16 14h.01"}],["path",{d:"M8 18h.01"}],["path",{d:"M12 18h.01"}],["path",{d:"M16 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M10 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z"}],["path",{d:"M3 10h18"}],["path",{d:"M15 22v-4a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const om=[["path",{d:"M3 10h18V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7"}],["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21.29 14.7a2.43 2.43 0 0 0-2.65-.52c-.3.12-.57.3-.8.53l-.34.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L17.5 22l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lm=[["path",{d:"M16 19h6"}],["path",{d:"M16 2v4"}],["path",{d:"M21 15V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8.5"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hm=[["path",{d:"M4.2 4.2A2 2 0 0 0 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 1.82-1.18"}],["path",{d:"M21 15.5V6a2 2 0 0 0-2-2H9.5"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h7"}],["path",{d:"M21 10h-5.5"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M10 16h4"}],["path",{d:"M12 14v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cm=[["path",{d:"M16 19h6"}],["path",{d:"M16 2v4"}],["path",{d:"M19 16v6"}],["path",{d:"M21 12.598V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8.5"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pm=[["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["path",{d:"M17 14h-6"}],["path",{d:"M13 18H7"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const um=[["path",{d:"M16 2v4"}],["path",{d:"M21 11.75V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.25"}],["path",{d:"m22 22-1.875-1.875"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fm=[["path",{d:"M11 10v4h4"}],["path",{d:"m11 14 1.535-1.605a5 5 0 0 1 8 1.5"}],["path",{d:"M16 2v4"}],["path",{d:"m21 18-1.535 1.605a5 5 0 0 1-8-1.5"}],["path",{d:"M21 22v-4h-4"}],["path",{d:"M21 8.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h4.3"}],["path",{d:"M3 10h4"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"}],["path",{d:"M3 10h18"}],["path",{d:"m17 22 5-5"}],["path",{d:"m17 17 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"m14 14-4 4"}],["path",{d:"m10 14 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vm=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gm=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16"}],["path",{d:"M9.5 4h5L17 7h3a2 2 0 0 1 2 2v7.5"}],["path",{d:"M14.121 15.121A3 3 0 1 1 9.88 10.88"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ym=[["path",{d:"M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"}],["circle",{cx:"12",cy:"13",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xm=[["path",{d:"M5.7 21a2 2 0 0 1-3.5-2l8.6-14a6 6 0 0 1 10.4 6 2 2 0 1 1-3.464-2 2 2 0 1 0-3.464-2Z"}],["path",{d:"M17.75 7 15 2.1"}],["path",{d:"M10.9 4.8 13 9"}],["path",{d:"m7.9 9.7 2 4.4"}],["path",{d:"M4.9 14.7 7 18.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wm=[["path",{d:"M10 10v7.9"}],["path",{d:"M11.802 6.145a5 5 0 0 1 6.053 6.053"}],["path",{d:"M14 6.1v2.243"}],["path",{d:"m15.5 15.571-.964.964a5 5 0 0 1-7.071 0 5 5 0 0 1 0-7.07l.964-.965"}],["path",{d:"M16 7V3a1 1 0 0 1 1.707-.707 2.5 2.5 0 0 0 2.152.717 1 1 0 0 1 1.131 1.131 2.5 2.5 0 0 0 .717 2.152A1 1 0 0 1 21 8h-4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8 17v4a1 1 0 0 1-1.707.707 2.5 2.5 0 0 0-2.152-.717 1 1 0 0 1-1.131-1.131 2.5 2.5 0 0 0-.717-2.152A1 1 0 0 1 3 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bm=[["path",{d:"M10 7v10.9"}],["path",{d:"M14 6.1V17"}],["path",{d:"M16 7V3a1 1 0 0 1 1.707-.707 2.5 2.5 0 0 0 2.152.717 1 1 0 0 1 1.131 1.131 2.5 2.5 0 0 0 .717 2.152A1 1 0 0 1 21 8h-4"}],["path",{d:"M16.536 7.465a5 5 0 0 0-7.072 0l-2 2a5 5 0 0 0 0 7.07 5 5 0 0 0 7.072 0l2-2a5 5 0 0 0 0-7.07"}],["path",{d:"M8 17v4a1 1 0 0 1-1.707.707 2.5 2.5 0 0 0-2.152-.717 1 1 0 0 1-1.131-1.131 2.5 2.5 0 0 0-.717-2.152A1 1 0 0 1 3 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Em=[["path",{d:"M12 22v-4"}],["path",{d:"M7 12c-1.5 0-4.5 1.5-5 3 3.5 1.5 6 1 6 1-1.5 1.5-2 3.5-2 5 2.5 0 4.5-1.5 6-3 1.5 1.5 3.5 3 6 3 0-1.5-.5-3.5-2-5 0 0 2.5.5 6-1-.5-1.5-3.5-3-5-3 1.5-1 4-4 4-6-2.5 0-5.5 1.5-7 3 0-2.5-.5-5-2-7-1.5 2-2 4.5-2 7-1.5-1.5-4.5-3-7-3 0 2 2.5 5 4 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sm=[["path",{d:"M10.5 5H19a2 2 0 0 1 2 2v8.5"}],["path",{d:"M17 11h-.5"}],["path",{d:"M19 19H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7 11h4"}],["path",{d:"M7 15h2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cr=[["rect",{width:"18",height:"14",x:"3",y:"5",rx:"2",ry:"2"}],["path",{d:"M7 15h4M15 15h2M7 11h2M13 11h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cm=[["path",{d:"m21 8-2 2-1.5-3.7A2 2 0 0 0 15.646 5H8.4a2 2 0 0 0-1.903 1.257L5 10 3 8"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 14h.01"}],["rect",{width:"18",height:"8",x:"3",y:"10",rx:"2"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Am=[["path",{d:"M10 2h4"}],["path",{d:"m21 8-2 2-1.5-3.7A2 2 0 0 0 15.646 5H8.4a2 2 0 0 0-1.903 1.257L5 10 3 8"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 14h.01"}],["rect",{width:"18",height:"8",x:"3",y:"10",rx:"2"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tm=[["path",{d:"M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"}],["circle",{cx:"7",cy:"17",r:"2"}],["path",{d:"M9 17h6"}],["circle",{cx:"17",cy:"17",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _m=[["path",{d:"M18 19V9a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v8a2 2 0 0 0 2 2h2"}],["path",{d:"M2 9h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2"}],["path",{d:"M22 17v1a1 1 0 0 1-1 1H10v-9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v9"}],["circle",{cx:"8",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hm=[["path",{d:"M12 14v4"}],["path",{d:"M14.172 2a2 2 0 0 1 1.414.586l3.828 3.828A2 2 0 0 1 20 7.828V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"}],["path",{d:"M8 14h8"}],["rect",{x:"8",y:"10",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lm=[["path",{d:"M2.27 21.7s9.87-3.5 12.73-6.36a4.5 4.5 0 0 0-6.36-6.37C5.77 11.84 2.27 21.7 2.27 21.7zM8.64 14l-2.05-2.04M15.34 15l-2.46-2.46"}],["path",{d:"M22 9s-1.33-2-3.5-2C16.86 7 15 9 15 9s1.33 2 3.5 2S22 9 22 9z"}],["path",{d:"M15 2s-2 1.33-2 3.5S15 9 15 9s2-1.84 2-3.5C17 3.33 15 2 15 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vm=[["circle",{cx:"7",cy:"12",r:"3"}],["path",{d:"M10 9v6"}],["circle",{cx:"17",cy:"12",r:"3"}],["path",{d:"M14 7v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pm=[["path",{d:"m3 15 4-8 4 8"}],["path",{d:"M4 13h6"}],["circle",{cx:"18",cy:"12",r:"3"}],["path",{d:"M21 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dm=[["path",{d:"m3 15 4-8 4 8"}],["path",{d:"M4 13h6"}],["path",{d:"M15 11h4.5a2 2 0 0 1 0 4H15V7h4a2 2 0 0 1 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Om=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["circle",{cx:"8",cy:"10",r:"2"}],["path",{d:"M8 12h8"}],["circle",{cx:"16",cy:"10",r:"2"}],["path",{d:"m6 20 .7-2.9A1.4 1.4 0 0 1 8.1 16h7.8a1.4 1.4 0 0 1 1.4 1l.7 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const km=[["path",{d:"M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"}],["path",{d:"M2 12a9 9 0 0 1 8 8"}],["path",{d:"M2 16a5 5 0 0 1 4 4"}],["line",{x1:"2",x2:"2.01",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Im=[["path",{d:"M22 20v-9H2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2Z"}],["path",{d:"M18 11V4H6v7"}],["path",{d:"M15 22v-4a3 3 0 0 0-3-3a3 3 0 0 0-3 3v4"}],["path",{d:"M22 11V9"}],["path",{d:"M2 11V9"}],["path",{d:"M6 4V2"}],["path",{d:"M18 4V2"}],["path",{d:"M10 4V2"}],["path",{d:"M14 4V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nm=[["path",{d:"M12 5c.67 0 1.35.09 2 .26 1.78-2 5.03-2.84 6.42-2.26 1.4.58-.42 7-.42 7 .57 1.07 1 2.24 1 3.44C21 17.9 16.97 21 12 21s-9-3-9-7.56c0-1.25.5-2.4 1-3.44 0 0-1.89-6.42-.5-7 1.39-.58 4.72.23 6.5 2.23A9.04 9.04 0 0 1 12 5Z"}],["path",{d:"M8 14v.5"}],["path",{d:"M16 14v.5"}],["path",{d:"M11.25 16.25h1.5L12 17l-.75-.75Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11.207a.5.5 0 0 1 .146-.353l2-2a.5.5 0 0 1 .708 0l3.292 3.292a.5.5 0 0 0 .708 0l4.292-4.292a.5.5 0 0 1 .854.353V16a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zm=[["path",{d:"M16.75 12h3.632a1 1 0 0 1 .894 1.447l-2.034 4.069a1 1 0 0 1-1.708.134l-2.124-2.97"}],["path",{d:"M17.106 9.053a1 1 0 0 1 .447 1.341l-3.106 6.211a1 1 0 0 1-1.342.447L3.61 12.3a2.92 2.92 0 0 1-1.3-3.91L3.69 5.6a2.92 2.92 0 0 1 3.92-1.3z"}],["path",{d:"M2 19h3.76a2 2 0 0 0 1.8-1.1L9 15"}],["path",{d:"M2 21v-4"}],["path",{d:"M7 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ur=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"7",y:"13",width:"9",height:"4",rx:"1"}],["rect",{x:"7",y:"5",width:"12",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $m=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11h8"}],["path",{d:"M7 16h3"}],["path",{d:"M7 6h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rm=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11h8"}],["path",{d:"M7 16h12"}],["path",{d:"M7 6h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bm=[["path",{d:"M11 13v4"}],["path",{d:"M15 5v4"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"7",y:"13",width:"9",height:"4",rx:"1"}],["rect",{x:"7",y:"5",width:"12",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 16h8"}],["path",{d:"M7 11h12"}],["path",{d:"M7 6h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mr=[["path",{d:"M9 5v4"}],["rect",{width:"4",height:"6",x:"7",y:"9",rx:"1"}],["path",{d:"M9 15v2"}],["path",{d:"M17 3v2"}],["rect",{width:"4",height:"8",x:"15",y:"5",rx:"1"}],["path",{d:"M17 13v3"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"15",y:"5",width:"4",height:"12",rx:"1"}],["rect",{x:"7",y:"8",width:"4",height:"9",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fm=[["path",{d:"M13 17V9"}],["path",{d:"M18 17v-3"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 17V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vr=[["path",{d:"M13 17V9"}],["path",{d:"M18 17V5"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 17v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qm=[["path",{d:"M11 13H7"}],["path",{d:"M19 9h-4"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"15",y:"5",width:"4",height:"12",rx:"1"}],["rect",{x:"7",y:"8",width:"4",height:"9",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M18 17V9"}],["path",{d:"M13 17V5"}],["path",{d:"M8 17v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wm=[["path",{d:"M10 6h8"}],["path",{d:"M12 16h6"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 11h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"m19 9-5 5-4-4-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jm=[["path",{d:"M12 20V10"}],["path",{d:"M18 20v-4"}],["path",{d:"M6 20V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xr=[["line",{x1:"12",x2:"12",y1:"20",y2:"10"}],["line",{x1:"18",x2:"18",y1:"20",y2:"4"}],["line",{x1:"6",x2:"6",y1:"20",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gm=[["path",{d:"m13.11 7.664 1.78 2.672"}],["path",{d:"m14.162 12.788-3.324 1.424"}],["path",{d:"m20 4-6.06 1.515"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["circle",{cx:"12",cy:"6",r:"2"}],["circle",{cx:"16",cy:"12",r:"2"}],["circle",{cx:"9",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wr=[["line",{x1:"18",x2:"18",y1:"20",y2:"10"}],["line",{x1:"12",x2:"12",y1:"20",y2:"4"}],["line",{x1:"6",x2:"6",y1:"20",y2:"14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zm=[["path",{d:"M12 16v5"}],["path",{d:"M16 14v7"}],["path",{d:"M20 10v11"}],["path",{d:"m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"}],["path",{d:"M4 18v3"}],["path",{d:"M8 14v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const br=[["path",{d:"M8 6h10"}],["path",{d:"M6 12h9"}],["path",{d:"M11 18h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Er=[["path",{d:"M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"}],["path",{d:"M21.21 15.89A10 10 0 1 1 8 2.83"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sr=[["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}],["circle",{cx:"18.5",cy:"5.5",r:".5",fill:"currentColor"}],["circle",{cx:"11.5",cy:"11.5",r:".5",fill:"currentColor"}],["circle",{cx:"7.5",cy:"16.5",r:".5",fill:"currentColor"}],["circle",{cx:"17.5",cy:"14.5",r:".5",fill:"currentColor"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xm=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 16c.5-2 1.5-7 4-7 2 0 2 3 4 3 2.5 0 4.5-5 5-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Um=[["path",{d:"M18 6 7 17l-5-5"}],["path",{d:"m22 10-7.5 7.5L13 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ym=[["path",{d:"M20 4L9 15"}],["path",{d:"M21 19L3 19"}],["path",{d:"M9 15L4 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Km=[["path",{d:"M20 6 9 17l-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qm=[["path",{d:"M2 17a5 5 0 0 0 10 0c0-2.76-2.5-5-5-3-2.5-2-5 .24-5 3Z"}],["path",{d:"M12 17a5 5 0 0 0 10 0c0-2.76-2.5-5-5-3-2.5-2-5 .24-5 3Z"}],["path",{d:"M7 14c3.22-2.91 4.29-8.75 5-12 1.66 2.38 4.94 9 5 12"}],["path",{d:"M22 9c-4.29 0-7.14-2.33-10-7 5.71 0 10 4.67 10 7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jm=[["path",{d:"M17 21a1 1 0 0 0 1-1v-5.35c0-.457.316-.844.727-1.041a4 4 0 0 0-2.134-7.589 5 5 0 0 0-9.186 0 4 4 0 0 0-2.134 7.588c.411.198.727.585.727 1.041V20a1 1 0 0 0 1 1Z"}],["path",{d:"M6 17h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t7=[["path",{d:"m6 9 6 6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e7=[["path",{d:"m17 18-6-6 6-6"}],["path",{d:"M7 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a7=[["path",{d:"m15 18-6-6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i7=[["path",{d:"m7 18 6-6-6-6"}],["path",{d:"M17 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n7=[["path",{d:"m9 18 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r7=[["path",{d:"m18 15-6-6-6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s7=[["path",{d:"m7 20 5-5 5 5"}],["path",{d:"m7 4 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o7=[["path",{d:"m7 6 5 5 5-5"}],["path",{d:"m7 13 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l7=[["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"m17 7 5 5-5 5"}],["path",{d:"m7 7-5 5 5 5"}],["path",{d:"M8 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h7=[["path",{d:"m9 7-5 5 5 5"}],["path",{d:"m15 7 5 5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d7=[["path",{d:"m11 17-5-5 5-5"}],["path",{d:"m18 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c7=[["path",{d:"m20 17-5-5 5-5"}],["path",{d:"m4 17 5-5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p7=[["path",{d:"m6 17 5-5-5-5"}],["path",{d:"m13 17 5-5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u7=[["path",{d:"m7 15 5 5 5-5"}],["path",{d:"m7 9 5-5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f7=[["path",{d:"m17 11-5-5-5 5"}],["path",{d:"m17 18-5-5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M7=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"4"}],["line",{x1:"21.17",x2:"12",y1:"8",y2:"8"}],["line",{x1:"3.95",x2:"8.54",y1:"6.06",y2:"14"}],["line",{x1:"10.88",x2:"15.46",y1:"21.94",y2:"14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m7=[["path",{d:"M10 9h4"}],["path",{d:"M12 7v5"}],["path",{d:"M14 22v-4a2 2 0 0 0-4 0v4"}],["path",{d:"M18 22V5.618a1 1 0 0 0-.553-.894l-4.553-2.277a2 2 0 0 0-1.788 0L6.553 4.724A1 1 0 0 0 6 5.618V22"}],["path",{d:"m18 7 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.618a1 1 0 0 1 .553-.894L6 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v7=[["path",{d:"M12 12H3a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h13"}],["path",{d:"M18 8c0-2.5-2-2.5-2-5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M21 12a1 1 0 0 1 1 1v2a1 1 0 0 1-.5.866"}],["path",{d:"M22 8c0-2.5-2-2.5-2-5"}],["path",{d:"M7 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g7=[["path",{d:"M17 12H3a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14"}],["path",{d:"M18 8c0-2.5-2-2.5-2-5"}],["path",{d:"M21 16a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"}],["path",{d:"M22 8c0-2.5-2-2.5-2-5"}],["path",{d:"M7 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 8v8"}],["path",{d:"m8 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ar=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"12",x2:"12",y1:"8",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m12 8-4 4 4 4"}],["path",{d:"M16 12H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _r=[["path",{d:"M2 12a10 10 0 1 1 10 10"}],["path",{d:"m2 22 10-10"}],["path",{d:"M8 22H2v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hr=[["path",{d:"M2 8V2h6"}],["path",{d:"m2 2 10 10"}],["path",{d:"M12 2A10 10 0 1 1 2 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lr=[["path",{d:"M22 12A10 10 0 1 1 12 2"}],["path",{d:"M22 2 12 12"}],["path",{d:"M16 2h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m12 16 4-4-4-4"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pr=[["path",{d:"M12 22a10 10 0 1 1 10-10"}],["path",{d:"M22 22 12 12"}],["path",{d:"M22 16v6h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Or=[["path",{d:"M21.801 10A10 10 0 1 1 17 3.335"}],["path",{d:"m9 11 3 3L22 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ir=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m16 10-4 4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m14 16-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m10 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $r=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m8 14 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y7=[["path",{d:"M10.1 2.182a10 10 0 0 1 3.8 0"}],["path",{d:"M13.9 21.818a10 10 0 0 1-3.8 0"}],["path",{d:"M17.609 3.721a10 10 0 0 1 2.69 2.7"}],["path",{d:"M2.182 13.9a10 10 0 0 1 0-3.8"}],["path",{d:"M20.279 17.609a10 10 0 0 1-2.7 2.69"}],["path",{d:"M21.818 10.1a10 10 0 0 1 0 3.8"}],["path",{d:"M3.721 6.391a10 10 0 0 1 2.7-2.69"}],["path",{d:"M6.391 20.279a10 10 0 0 1-2.69-2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rr=[["line",{x1:"8",x2:"16",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"16",y2:"16"}],["line",{x1:"12",x2:"12",y1:"8",y2:"8"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x7=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w7=[["path",{d:"M10.1 2.18a9.93 9.93 0 0 1 3.8 0"}],["path",{d:"M17.6 3.71a9.95 9.95 0 0 1 2.69 2.7"}],["path",{d:"M21.82 10.1a9.93 9.93 0 0 1 0 3.8"}],["path",{d:"M20.29 17.6a9.95 9.95 0 0 1-2.7 2.69"}],["path",{d:"M13.9 21.82a9.94 9.94 0 0 1-3.8 0"}],["path",{d:"M6.4 20.29a9.95 9.95 0 0 1-2.69-2.7"}],["path",{d:"M2.18 13.9a9.93 9.93 0 0 1 0-3.8"}],["path",{d:"M3.71 6.4a9.95 9.95 0 0 1 2.7-2.69"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b7=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E7=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M17 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M7 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S7=[["path",{d:"M7 10h10"}],["path",{d:"M7 14h10"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C7=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A7=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"M12 8v8"}],["path",{d:"M16 12H8"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Br=[["path",{d:"M15.6 2.7a10 10 0 1 0 5.7 5.7"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M13.4 10.6 19 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T7=[["path",{d:"m2 2 20 20"}],["path",{d:"M8.35 2.69A10 10 0 0 1 21.3 15.65"}],["path",{d:"M19.08 19.08A10 10 0 1 1 4.92 4.92"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m5 5 14 14"}],["path",{d:"M13 13a3 3 0 1 0 0-6H9v2"}],["path",{d:"M9 17v-2.34"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9 17V7h4a3 3 0 0 1 0 6H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gr=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"10",x2:"10",y1:"15",y2:"9"}],["line",{x1:"14",x2:"14",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zr=[["circle",{cx:"12",cy:"12",r:"10"}],["polygon",{points:"10 8 16 12 10 16 10 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _7=[["path",{d:"M10 16V9.5a1 1 0 0 1 5 0"}],["path",{d:"M8 12h4"}],["path",{d:"M8 16h7"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qi=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ur=[["path",{d:"M12 7v4"}],["path",{d:"M7.998 9.003a5 5 0 1 0 8-.005"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yr=[["path",{d:"M22 2 2 22"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H7=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"9",x2:"15",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L7=[["circle",{cx:"12",cy:"12",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kr=[["circle",{cx:"12",cy:"12",r:"10"}],["rect",{x:"9",y:"9",width:"6",height:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qr=[["path",{d:"M18 20a6 6 0 0 0-12 0"}],["circle",{cx:"12",cy:"10",r:"4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jr=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V7=[["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ts=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P7=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M11 9h4a2 2 0 0 0 2-2V3"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"M7 21v-4a2 2 0 0 1 2-2h4"}],["circle",{cx:"15",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D7=[["path",{d:"M21.66 17.67a1.08 1.08 0 0 1-.04 1.6A12 12 0 0 1 4.73 2.38a1.1 1.1 0 0 1 1.61-.04z"}],["path",{d:"M19.65 15.66A8 8 0 0 1 8.35 4.34"}],["path",{d:"m14 10-5.5 5.5"}],["path",{d:"M14 17.85V10H6.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O7=[["path",{d:"M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"}],["path",{d:"m6.2 5.3 3.1 3.9"}],["path",{d:"m12.4 3.4 3.1 4"}],["path",{d:"M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v4"}],["path",{d:"M21 14H11"}],["path",{d:"m15 10-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"m9 14 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M12 11h4"}],["path",{d:"M12 16h4"}],["path",{d:"M8 11h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 14h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $7=[["path",{d:"M11 14h10"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v1.344"}],["path",{d:"m17 18 4-4-4-4"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 1.793-1.113"}],["rect",{x:"8",y:"2",width:"8",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const es=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5"}],["path",{d:"M16 4h2a2 2 0 0 1 1.73 1"}],["path",{d:"M8 18h1"}],["path",{d:"M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 14h6"}],["path",{d:"M12 17v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const as=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5.5"}],["path",{d:"M4 13.5V6a2 2 0 0 1 2-2h2"}],["path",{d:"M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 12v-1h6v1"}],["path",{d:"M11 17h2"}],["path",{d:"M12 11v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"m15 11-6 6"}],["path",{d:"m9 11 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q7=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W7=[["path",{d:"M12 6v6l2-4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j7=[["path",{d:"M12 6v6l-4-2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G7=[["path",{d:"M12 6v6l-2-4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z7=[["path",{d:"M12 6v6"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X7=[["path",{d:"M12 6v6l4-2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U7=[["path",{d:"M12 6v6l4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y7=[["path",{d:"M12 6v6h4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K7=[["path",{d:"M12 6v6l2 4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q7=[["path",{d:"M12 6v10"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J7=[["path",{d:"M12 6v6l-2 4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tv=[["path",{d:"M12 6v6H8"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ev=[["path",{d:"M12 6v6l-4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const av=[["path",{d:"M12 6v6l4 2"}],["path",{d:"M20 12v5"}],["path",{d:"M20 21h.01"}],["path",{d:"M21.25 8.2A10 10 0 1 0 16 21.16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iv=[["path",{d:"M12 6v6l2 1"}],["path",{d:"M12.337 21.994a10 10 0 1 1 9.588-8.767"}],["path",{d:"m14 18 4 4 4-4"}],["path",{d:"M18 14v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nv=[["path",{d:"M12 6v6l1.56.78"}],["path",{d:"M13.227 21.925a10 10 0 1 1 8.767-9.588"}],["path",{d:"m14 18 4-4 4 4"}],["path",{d:"M18 22v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rv=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"M12 6v6l4 2"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sv=[["path",{d:"M12 6v6l3.644 1.822"}],["path",{d:"M16 19h6"}],["path",{d:"M19 16v6"}],["path",{d:"M21.92 13.267a10 10 0 1 0-8.653 8.653"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ov=[["path",{d:"M12 6v6l4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lv=[["path",{d:"M12 12v4"}],["path",{d:"M12 20h.01"}],["path",{d:"M17 18h.5a1 1 0 0 0 0-9h-1.79A7 7 0 1 0 7 17.708"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hv=[["path",{d:"m17 15-5.5 5.5L9 18"}],["path",{d:"M5 17.743A7 7 0 1 1 15.71 10h1.79a4.5 4.5 0 0 1 1.5 8.742"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dv=[["path",{d:"m10.852 19.772-.383.924"}],["path",{d:"m13.148 14.228.383-.923"}],["path",{d:"M13.148 19.772a3 3 0 1 0-2.296-5.544l-.383-.923"}],["path",{d:"m13.53 20.696-.382-.924a3 3 0 1 1-2.296-5.544"}],["path",{d:"m14.772 15.852.923-.383"}],["path",{d:"m14.772 18.148.923.383"}],["path",{d:"M4.2 15.1a7 7 0 1 1 9.93-9.858A7 7 0 0 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.2"}],["path",{d:"m9.228 15.852-.923-.383"}],["path",{d:"m9.228 18.148-.923.383"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const is=[["path",{d:"M12 13v8l-4-4"}],["path",{d:"m12 21 4-4"}],["path",{d:"M4.393 15.269A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.436 8.284"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M8 19v1"}],["path",{d:"M8 14v1"}],["path",{d:"M16 19v1"}],["path",{d:"M16 14v1"}],["path",{d:"M12 21v1"}],["path",{d:"M12 16v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 17H7"}],["path",{d:"M17 21H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 14v2"}],["path",{d:"M8 14v2"}],["path",{d:"M16 20h.01"}],["path",{d:"M8 20h.01"}],["path",{d:"M12 16v2"}],["path",{d:"M12 22h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fv=[["path",{d:"M6 16.326A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 .5 8.973"}],["path",{d:"m13 12-3 5h4l-3 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mv=[["path",{d:"M10.188 8.5A6 6 0 0 1 16 4a1 1 0 0 0 6 6 6 6 0 0 1-3 5.197"}],["path",{d:"M11 20v2"}],["path",{d:"M3 20a5 5 0 1 1 8.9-4H13a3 3 0 0 1 2 5.24"}],["path",{d:"M7 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mv=[["path",{d:"m2 2 20 20"}],["path",{d:"M5.782 5.782A7 7 0 0 0 9 19h8.5a4.5 4.5 0 0 0 1.307-.193"}],["path",{d:"M21.532 16.5A4.5 4.5 0 0 0 17.5 10h-1.79A7.008 7.008 0 0 0 10 5.07"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vv=[["path",{d:"M10.188 8.5A6 6 0 0 1 16 4a1 1 0 0 0 6 6 6 6 0 0 1-3 5.197"}],["path",{d:"M13 16a3 3 0 1 1 0 6H7a5 5 0 1 1 4.9-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"m9.2 22 3-7"}],["path",{d:"m9 13-3 7"}],["path",{d:"m17 13-3 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 14v6"}],["path",{d:"M8 14v6"}],["path",{d:"M12 16v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xv=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M8 15h.01"}],["path",{d:"M8 19h.01"}],["path",{d:"M12 17h.01"}],["path",{d:"M12 21h.01"}],["path",{d:"M16 15h.01"}],["path",{d:"M16 19h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wv=[["path",{d:"M12 2v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"M20 12h2"}],["path",{d:"m19.07 4.93-1.41 1.41"}],["path",{d:"M15.947 12.65a4 4 0 0 0-5.925-4.128"}],["path",{d:"M3 20a5 5 0 1 1 8.9-4H13a3 3 0 0 1 2 5.24"}],["path",{d:"M11 20v2"}],["path",{d:"M7 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bv=[["path",{d:"M12 2v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"M20 12h2"}],["path",{d:"m19.07 4.93-1.41 1.41"}],["path",{d:"M15.947 12.65a4 4 0 0 0-5.925-4.128"}],["path",{d:"M13 22H7a5 5 0 1 1 4.9-6H13a3 3 0 0 1 0 6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ns=[["path",{d:"M12 13v8"}],["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"m8 17 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ev=[["path",{d:"M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sv=[["path",{d:"M17.5 21H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"}],["path",{d:"M22 10a3 3 0 0 0-3-3h-2.207a5.502 5.502 0 0 0-10.702.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cv=[["path",{d:"M16.17 7.83 2 22"}],["path",{d:"M4.02 12a2.827 2.827 0 1 1 3.81-4.17A2.827 2.827 0 1 1 12 4.02a2.827 2.827 0 1 1 4.17 3.81A2.827 2.827 0 1 1 19.98 12a2.827 2.827 0 1 1-3.81 4.17A2.827 2.827 0 1 1 12 19.98a2.827 2.827 0 1 1-4.17-3.81A1 1 0 1 1 4 12"}],["path",{d:"m7.83 7.83 8.34 8.34"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Av=[["path",{d:"M17.28 9.05a5.5 5.5 0 1 0-10.56 0A5.5 5.5 0 1 0 12 17.66a5.5 5.5 0 1 0 5.28-8.6Z"}],["path",{d:"M12 17.66L12 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rs=[["path",{d:"m18 16 4-4-4-4"}],["path",{d:"m6 8-4 4 4 4"}],["path",{d:"m14.5 4-5 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tv=[["path",{d:"m16 18 6-6-6-6"}],["path",{d:"m8 6-6 6 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _v=[["polygon",{points:"12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"}],["line",{x1:"12",x2:"12",y1:"22",y2:"15.5"}],["polyline",{points:"22 8.5 12 15.5 2 8.5"}],["polyline",{points:"2 15.5 12 8.5 22 15.5"}],["line",{x1:"12",x2:"12",y1:"2",y2:"8.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hv=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}],["polyline",{points:"7.5 4.21 12 6.81 16.5 4.21"}],["polyline",{points:"7.5 19.79 7.5 14.6 3 12"}],["polyline",{points:"21 12 16.5 14.6 16.5 19.79"}],["polyline",{points:"3.27 6.96 12 12.01 20.73 6.96"}],["line",{x1:"12",x2:"12",y1:"22.08",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lv=[["path",{d:"M10 2v2"}],["path",{d:"M14 2v2"}],["path",{d:"M16 8a1 1 0 0 1 1 1v8a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V9a1 1 0 0 1 1-1h14a4 4 0 1 1 0 8h-1"}],["path",{d:"M6 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vv=[["path",{d:"M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"}],["path",{d:"M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"}],["path",{d:"M12 2v2"}],["path",{d:"M12 22v-2"}],["path",{d:"m17 20.66-1-1.73"}],["path",{d:"M11 10.27 7 3.34"}],["path",{d:"m20.66 17-1.73-1"}],["path",{d:"m3.34 7 1.73 1"}],["path",{d:"M14 12h8"}],["path",{d:"M2 12h2"}],["path",{d:"m20.66 7-1.73 1"}],["path",{d:"m3.34 17 1.73-1"}],["path",{d:"m17 3.34-1 1.73"}],["path",{d:"m11 13.73-4 6.93"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pv=[["circle",{cx:"8",cy:"8",r:"6"}],["path",{d:"M18.09 10.37A6 6 0 1 1 10.34 18"}],["path",{d:"M7 6h1v4"}],["path",{d:"m16.71 13.88.7.71-2.82 2.82"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ss=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wi=[["path",{d:"M10.5 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5.5"}],["path",{d:"m14.3 19.6 1-.4"}],["path",{d:"M15 3v7.5"}],["path",{d:"m15.2 16.9-.9-.3"}],["path",{d:"m16.6 21.7.3-.9"}],["path",{d:"m16.8 15.3-.4-1"}],["path",{d:"m19.1 15.2.3-.9"}],["path",{d:"m19.6 21.7-.4-1"}],["path",{d:"m20.7 16.8 1-.4"}],["path",{d:"m21.7 19.4-.9-.3"}],["path",{d:"M9 3v18"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const os=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dv=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7.5 3v18"}],["path",{d:"M12 3v18"}],["path",{d:"M16.5 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ov=[["path",{d:"M10 18H5a3 3 0 0 1-3-3v-1"}],["path",{d:"M14 2a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M20 2a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"m7 21 3-3-3-3"}],["rect",{x:"14",y:"14",width:"8",height:"8",rx:"2"}],["rect",{x:"2",y:"2",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kv=[["path",{d:"M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iv=[["path",{d:"m16.24 7.76-1.804 5.411a2 2 0 0 1-1.265 1.265L7.76 16.24l1.804-5.411a2 2 0 0 1 1.265-1.265z"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nv=[["path",{d:"M15.536 11.293a1 1 0 0 0 0 1.414l2.376 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"}],["path",{d:"M2.297 11.293a1 1 0 0 0 0 1.414l2.377 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414L6.088 8.916a1 1 0 0 0-1.414 0z"}],["path",{d:"M8.916 17.912a1 1 0 0 0 0 1.415l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.415l-2.377-2.376a1 1 0 0 0-1.414 0z"}],["path",{d:"M8.916 4.674a1 1 0 0 0 0 1.414l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zv=[["rect",{width:"14",height:"8",x:"5",y:"2",rx:"2"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h2"}],["path",{d:"M12 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $v=[["path",{d:"M3 20a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1Z"}],["path",{d:"M20 16a8 8 0 1 0-16 0"}],["path",{d:"M12 4v4"}],["path",{d:"M10 4h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rv=[["path",{d:"m20.9 18.55-8-15.98a1 1 0 0 0-1.8 0l-8 15.98"}],["ellipse",{cx:"12",cy:"19",rx:"9",ry:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bv=[["rect",{x:"2",y:"6",width:"20",height:"8",rx:"1"}],["path",{d:"M17 14v7"}],["path",{d:"M7 14v7"}],["path",{d:"M17 3v3"}],["path",{d:"M7 3v3"}],["path",{d:"M10 14 2.3 6.3"}],["path",{d:"m14 6 7.7 7.7"}],["path",{d:"m8 6 8 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fv=[["path",{d:"M16 2v2"}],["path",{d:"M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"}],["path",{d:"M8 2v2"}],["circle",{cx:"12",cy:"11",r:"3"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ls=[["path",{d:"M16 2v2"}],["path",{d:"M17.915 22a6 6 0 0 0-12 0"}],["path",{d:"M8 2v2"}],["circle",{cx:"12",cy:"12",r:"4"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qv=[["path",{d:"M22 7.7c0-.6-.4-1.2-.8-1.5l-6.3-3.9a1.72 1.72 0 0 0-1.7 0l-10.3 6c-.5.2-.9.8-.9 1.4v6.6c0 .5.4 1.2.8 1.5l6.3 3.9a1.72 1.72 0 0 0 1.7 0l10.3-6c.5-.3.9-1 .9-1.5Z"}],["path",{d:"M10 21.9V14L2.1 9.1"}],["path",{d:"m10 14 11.9-6.9"}],["path",{d:"M14 19.8v-8.1"}],["path",{d:"M18 17.5V9.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wv=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 18a6 6 0 0 0 0-12v12z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jv=[["path",{d:"M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"}],["path",{d:"M8.5 8.5v.01"}],["path",{d:"M16 15.5v.01"}],["path",{d:"M12 12v.01"}],["path",{d:"M11 17v.01"}],["path",{d:"M7 14v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gv=[["path",{d:"M2 12h20"}],["path",{d:"M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"}],["path",{d:"m4 8 16-4"}],["path",{d:"m8.86 6.78-.45-1.81a2 2 0 0 1 1.45-2.43l1.94-.48a2 2 0 0 1 2.43 1.46l.45 1.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zv=[["path",{d:"m12 15 2 2 4-4"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xv=[["line",{x1:"15",x2:"15",y1:"12",y2:"18"}],["line",{x1:"12",x2:"18",y1:"15",y2:"15"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uv=[["line",{x1:"12",x2:"18",y1:"15",y2:"15"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yv=[["line",{x1:"12",x2:"18",y1:"18",y2:"12"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kv=[["line",{x1:"12",x2:"18",y1:"12",y2:"18"}],["line",{x1:"12",x2:"18",y1:"18",y2:"12"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qv=[["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jv=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9.17 14.83a4 4 0 1 0 0-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tg=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M14.83 14.83a4 4 0 1 1 0-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eg=[["path",{d:"M20 4v7a4 4 0 0 1-4 4H4"}],["path",{d:"m9 10-5 5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ag=[["path",{d:"m15 10 5 5-5 5"}],["path",{d:"M4 4v7a4 4 0 0 0 4 4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ig=[["path",{d:"m14 15-5 5-5-5"}],["path",{d:"M20 4h-7a4 4 0 0 0-4 4v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ng=[["path",{d:"M14 9 9 4 4 9"}],["path",{d:"M20 20h-7a4 4 0 0 1-4-4V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rg=[["path",{d:"m10 15 5 5 5-5"}],["path",{d:"M4 4h7a4 4 0 0 1 4 4v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sg=[["path",{d:"m10 9 5-5 5 5"}],["path",{d:"M4 20h7a4 4 0 0 0 4-4V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const og=[["path",{d:"M20 20v-7a4 4 0 0 0-4-4H4"}],["path",{d:"M9 14 4 9l5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lg=[["path",{d:"m15 14 5-5-5-5"}],["path",{d:"M4 20v-7a4 4 0 0 1 4-4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hg=[["path",{d:"M12 20v2"}],["path",{d:"M12 2v2"}],["path",{d:"M17 20v2"}],["path",{d:"M17 2v2"}],["path",{d:"M2 12h2"}],["path",{d:"M2 17h2"}],["path",{d:"M2 7h2"}],["path",{d:"M20 12h2"}],["path",{d:"M20 17h2"}],["path",{d:"M20 7h2"}],["path",{d:"M7 20v2"}],["path",{d:"M7 2v2"}],["rect",{x:"4",y:"4",width:"16",height:"16",rx:"2"}],["rect",{x:"8",y:"8",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dg=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M10 9.3a2.8 2.8 0 0 0-3.5 1 3.1 3.1 0 0 0 0 3.4 2.7 2.7 0 0 0 3.5 1"}],["path",{d:"M17 9.3a2.8 2.8 0 0 0-3.5 1 3.1 3.1 0 0 0 0 3.4 2.7 2.7 0 0 0 3.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cg=[["rect",{width:"20",height:"14",x:"2",y:"5",rx:"2"}],["line",{x1:"2",x2:"22",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pg=[["path",{d:"m4.6 13.11 5.79-3.21c1.89-1.05 4.79 1.78 3.71 3.71l-3.22 5.81C8.8 23.16.79 15.23 4.6 13.11Z"}],["path",{d:"m10.5 9.5-1-2.29C9.2 6.48 8.8 6 8 6H4.5C2.79 6 2 6.5 2 8.5a7.71 7.71 0 0 0 2 4.83"}],["path",{d:"M8 6c0-1.55.24-4-2-4-2 0-2.5 2.17-2.5 4"}],["path",{d:"m14.5 13.5 2.29 1c.73.3 1.21.7 1.21 1.5v3.5c0 1.71-.5 2.5-2.5 2.5a7.71 7.71 0 0 1-4.83-2"}],["path",{d:"M18 16c1.55 0 4-.24 4 2 0 2-2.17 2.5-4 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ug=[["path",{d:"M6 2v14a2 2 0 0 0 2 2h14"}],["path",{d:"M18 22V8a2 2 0 0 0-2-2H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fg=[["path",{d:"M4 9a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a1 1 0 0 1 1 1v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-4a1 1 0 0 1 1-1h4a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a1 1 0 0 1-1-1V4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4a1 1 0 0 1-1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mg=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"22",x2:"18",y1:"12",y2:"12"}],["line",{x1:"6",x2:"2",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"6",y2:"2"}],["line",{x1:"12",x2:"12",y1:"22",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mg=[["path",{d:"M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vg=[["path",{d:"m21.12 6.4-6.05-4.06a2 2 0 0 0-2.17-.05L2.95 8.41a2 2 0 0 0-.95 1.7v5.82a2 2 0 0 0 .88 1.66l6.05 4.07a2 2 0 0 0 2.17.05l9.95-6.12a2 2 0 0 0 .95-1.7V8.06a2 2 0 0 0-.88-1.66Z"}],["path",{d:"M10 22v-8L2.25 9.15"}],["path",{d:"m10 14 11.77-6.87"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gg=[["path",{d:"m6 8 1.75 12.28a2 2 0 0 0 2 1.72h4.54a2 2 0 0 0 2-1.72L18 8"}],["path",{d:"M5 8h14"}],["path",{d:"M7 15a6.47 6.47 0 0 1 5 0 6.47 6.47 0 0 0 5 0"}],["path",{d:"m12 8 1-6h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yg=[["circle",{cx:"12",cy:"12",r:"8"}],["line",{x1:"3",x2:"6",y1:"3",y2:"6"}],["line",{x1:"21",x2:"18",y1:"3",y2:"6"}],["line",{x1:"3",x2:"6",y1:"21",y2:"18"}],["line",{x1:"21",x2:"18",y1:"21",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xg=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5v14a9 3 0 0 0 18 0V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wg=[["path",{d:"M11 11.31c1.17.56 1.54 1.69 3.5 1.69 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M11.75 18c.35.5 1.45 1 2.75 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["path",{d:"M2 6h4"}],["path",{d:"M7 3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1L10 4a1 1 0 0 0-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bg=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 12a9 3 0 0 0 5 2.69"}],["path",{d:"M21 9.3V5"}],["path",{d:"M3 5v14a9 3 0 0 0 6.47 2.88"}],["path",{d:"M12 12v4h4"}],["path",{d:"M13 20a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L12 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eg=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5V19A9 3 0 0 0 15 21.84"}],["path",{d:"M21 5V8"}],["path",{d:"M21 12L18 17H22L19 22"}],["path",{d:"M3 12A9 3 0 0 0 14.59 14.87"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sg=[["path",{d:"m13 21-3-3 3-3"}],["path",{d:"M20 18H10"}],["path",{d:"M3 11h.01"}],["rect",{x:"6",y:"3",width:"5",height:"8",rx:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cg=[["path",{d:"M10 18h10"}],["path",{d:"m17 21 3-3-3-3"}],["path",{d:"M3 11h.01"}],["rect",{x:"15",y:"3",width:"5",height:"8",rx:"2.5"}],["rect",{x:"6",y:"3",width:"5",height:"8",rx:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ag=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5V19A9 3 0 0 0 21 19V5"}],["path",{d:"M3 12A9 3 0 0 0 21 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tg=[["path",{d:"M10 5a2 2 0 0 0-1.344.519l-6.328 5.74a1 1 0 0 0 0 1.481l6.328 5.741A2 2 0 0 0 10 19h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z"}],["path",{d:"m12 9 6 6"}],["path",{d:"m18 9-6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _g=[["path",{d:"M10.162 3.167A10 10 0 0 0 2 13a2 2 0 0 0 4 0v-1a2 2 0 0 1 4 0v4a2 2 0 0 0 4 0v-4a2 2 0 0 1 4 0v1a2 2 0 0 0 4-.006 10 10 0 0 0-8.161-9.826"}],["path",{d:"M20.804 14.869a9 9 0 0 1-17.608 0"}],["circle",{cx:"12",cy:"4",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hg=[["circle",{cx:"19",cy:"19",r:"2"}],["circle",{cx:"5",cy:"5",r:"2"}],["path",{d:"M6.48 3.66a10 10 0 0 1 13.86 13.86"}],["path",{d:"m6.41 6.41 11.18 11.18"}],["path",{d:"M3.66 6.48a10 10 0 0 0 13.86 13.86"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hs=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0Z"}],["path",{d:"M9.2 9.2h.01"}],["path",{d:"m14.5 9.5-5 5"}],["path",{d:"M14.7 14.8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lg=[["path",{d:"M12 8v8"}],["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vg=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pg=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41l-7.59-7.59a2.41 2.41 0 0 0-3.41 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dg=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Og=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M15 9h.01"}],["path",{d:"M9 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kg=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ig=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 16h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ng=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 16h.01"}],["path",{d:"M16 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zg=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 12h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $g=[["rect",{width:"12",height:"12",x:"2",y:"10",rx:"2",ry:"2"}],["path",{d:"m17.92 14 3.5-3.5a2.24 2.24 0 0 0 0-3l-5-4.92a2.24 2.24 0 0 0-3 0L10 6"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 14h.01"}],["path",{d:"M15 6h.01"}],["path",{d:"M18 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rg=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bg=[["path",{d:"M12 3v14"}],["path",{d:"M5 10h14"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fg=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M6 12c0-1.7.7-3.2 1.8-4.2"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M18 12c0 1.7-.7 3.2-1.8 4.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qg=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"12",r:"5"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wg=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jg=[["circle",{cx:"12",cy:"6",r:"1"}],["line",{x1:"5",x2:"19",y1:"12",y2:"12"}],["circle",{cx:"12",cy:"18",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gg=[["path",{d:"M15 2c-1.35 1.5-2.092 3-2.5 4.5L14 8"}],["path",{d:"m17 6-2.891-2.891"}],["path",{d:"M2 15c3.333-3 6.667-3 10-3"}],["path",{d:"m2 2 20 20"}],["path",{d:"m20 9 .891.891"}],["path",{d:"M22 9c-1.5 1.35-3 2.092-4.5 2.5l-1-1"}],["path",{d:"M3.109 14.109 4 15"}],["path",{d:"m6.5 12.5 1 1"}],["path",{d:"m7 18 2.891 2.891"}],["path",{d:"M9 22c1.35-1.5 2.092-3 2.5-4.5L10 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zg=[["path",{d:"m10 16 1.5 1.5"}],["path",{d:"m14 8-1.5-1.5"}],["path",{d:"M15 2c-1.798 1.998-2.518 3.995-2.807 5.993"}],["path",{d:"m16.5 10.5 1 1"}],["path",{d:"m17 6-2.891-2.891"}],["path",{d:"M2 15c6.667-6 13.333 0 20-6"}],["path",{d:"m20 9 .891.891"}],["path",{d:"M3.109 14.109 4 15"}],["path",{d:"m6.5 12.5 1 1"}],["path",{d:"m7 18 2.891 2.891"}],["path",{d:"M9 22c1.798-1.998 2.518-3.995 2.807-5.993"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xg=[["path",{d:"M2 8h20"}],["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 16h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ug=[["path",{d:"M11.25 16.25h1.5L12 17z"}],["path",{d:"M16 14v.5"}],["path",{d:"M4.42 11.247A13.152 13.152 0 0 0 4 14.556C4 18.728 7.582 21 12 21s8-2.272 8-6.444a11.702 11.702 0 0 0-.493-3.309"}],["path",{d:"M8 14v.5"}],["path",{d:"M8.5 8.5c-.384 1.05-1.083 2.028-2.344 2.5-1.931.722-3.576-.297-3.656-1-.113-.994 1.177-6.53 4-7 1.923-.321 3.651.845 3.651 2.235A7.497 7.497 0 0 1 14 5.277c0-1.39 1.844-2.598 3.767-2.277 2.823.47 4.113 6.006 4 7-.08.703-1.725 1.722-3.656 1-1.261-.472-1.855-1.45-2.239-2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yg=[["line",{x1:"12",x2:"12",y1:"2",y2:"22"}],["path",{d:"M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kg=[["path",{d:"M20.5 10a2.5 2.5 0 0 1-2.4-3H18a2.95 2.95 0 0 1-2.6-4.4 10 10 0 1 0 6.3 7.1c-.3.2-.8.3-1.2.3"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qg=[["path",{d:"M10 12h.01"}],["path",{d:"M18 9V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"}],["path",{d:"M2 20h8"}],["path",{d:"M20 17v-2a2 2 0 1 0-4 0v2"}],["rect",{x:"14",y:"17",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jg=[["path",{d:"M10 12h.01"}],["path",{d:"M18 20V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"}],["path",{d:"M2 20h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t9=[["path",{d:"M11 20H2"}],["path",{d:"M11 4.562v16.157a1 1 0 0 0 1.242.97L19 20V5.562a2 2 0 0 0-1.515-1.94l-4-1A2 2 0 0 0 11 4.561z"}],["path",{d:"M11 4H8a2 2 0 0 0-2 2v14"}],["path",{d:"M14 12h.01"}],["path",{d:"M22 20h-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e9=[["circle",{cx:"12.1",cy:"12.1",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a9=[["path",{d:"M12 15V3"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}],["path",{d:"m7 10 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i9=[["path",{d:"m12.99 6.74 1.93 3.44"}],["path",{d:"M19.136 12a10 10 0 0 1-14.271 0"}],["path",{d:"m21 21-2.16-3.84"}],["path",{d:"m3 21 8.02-14.26"}],["circle",{cx:"12",cy:"5",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n9=[["path",{d:"M10 11h.01"}],["path",{d:"M14 6h.01"}],["path",{d:"M18 6h.01"}],["path",{d:"M6.5 13.1h.01"}],["path",{d:"M22 5c0 9-4 12-6 12s-6-3-6-12c0-2 2-3 6-3s6 1 6 3"}],["path",{d:"M17.4 9.9c-.8.8-2 .8-2.8 0"}],["path",{d:"M10.1 7.1C9 7.2 7.7 7.7 6 8.6c-3.5 2-4.7 3.9-3.7 5.6 4.5 7.8 9.5 8.4 11.2 7.4.9-.5 1.9-2.1 1.9-4.7"}],["path",{d:"M9.1 16.5c.3-1.1 1.4-1.7 2.4-1.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r9=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"}],["path",{d:"M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"}],["path",{d:"M8.56 2.75c4.37 6 6 9.42 8 17.72"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s9=[["path",{d:"M10 18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3 1 1 0 0 1 1-1z"}],["path",{d:"M13 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1l-.81 3.242a1 1 0 0 1-.97.758H8"}],["path",{d:"M14 4h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3"}],["path",{d:"M18 6h4"}],["path",{d:"m5 10-2 8"}],["path",{d:"m7 18 2-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o9=[["path",{d:"M10 10 7 7"}],["path",{d:"m10 14-3 3"}],["path",{d:"m14 10 3-3"}],["path",{d:"m14 14 3 3"}],["path",{d:"M14.205 4.139a4 4 0 1 1 5.439 5.863"}],["path",{d:"M19.637 14a4 4 0 1 1-5.432 5.868"}],["path",{d:"M4.367 10a4 4 0 1 1 5.438-5.862"}],["path",{d:"M9.795 19.862a4 4 0 1 1-5.429-5.873"}],["rect",{x:"10",y:"8",width:"4",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l9=[["path",{d:"M18.715 13.186C18.29 11.858 17.384 10.607 16 9.5c-2-1.6-3.5-4-4-6.5a10.7 10.7 0 0 1-.884 2.586"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.795 8.797A11 11 0 0 1 8 9.5C6 11.1 5 13 5 15a7 7 0 0 0 13.222 3.208"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h9=[["path",{d:"M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d9=[["path",{d:"m2 2 8 8"}],["path",{d:"m22 2-8 8"}],["ellipse",{cx:"12",cy:"9",rx:"10",ry:"5"}],["path",{d:"M7 13.4v7.9"}],["path",{d:"M12 14v8"}],["path",{d:"M17 13.4v7.9"}],["path",{d:"M2 9v8a10 5 0 0 0 20 0V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c9=[["path",{d:"M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"}],["path",{d:"M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p9=[["path",{d:"M15.4 15.63a7.875 6 135 1 1 6.23-6.23 4.5 3.43 135 0 0-6.23 6.23"}],["path",{d:"m8.29 12.71-2.6 2.6a2.5 2.5 0 1 0-1.65 4.65A2.5 2.5 0 1 0 8.7 18.3l2.59-2.59"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u9=[["path",{d:"M17.596 12.768a2 2 0 1 0 2.829-2.829l-1.768-1.767a2 2 0 0 0 2.828-2.829l-2.828-2.828a2 2 0 0 0-2.829 2.828l-1.767-1.768a2 2 0 1 0-2.829 2.829z"}],["path",{d:"m2.5 21.5 1.4-1.4"}],["path",{d:"m20.1 3.9 1.4-1.4"}],["path",{d:"M5.343 21.485a2 2 0 1 0 2.829-2.828l1.767 1.768a2 2 0 1 0 2.829-2.829l-6.364-6.364a2 2 0 1 0-2.829 2.829l1.768 1.767a2 2 0 0 0-2.828 2.829z"}],["path",{d:"m9.6 14.4 4.8-4.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f9=[["path",{d:"M6 8.5a6.5 6.5 0 1 1 13 0c0 6-6 6-6 10a3.5 3.5 0 1 1-7 0"}],["path",{d:"M15 8.5a2.5 2.5 0 0 0-5 0v1a2 2 0 1 1 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M9=[["path",{d:"M6 18.5a3.5 3.5 0 1 0 7 0c0-1.57.92-2.52 2.04-3.46"}],["path",{d:"M6 8.5c0-.75.13-1.47.36-2.14"}],["path",{d:"M8.8 3.15A6.5 6.5 0 0 1 19 8.5c0 1.63-.44 2.81-1.09 3.76"}],["path",{d:"M12.5 6A2.5 2.5 0 0 1 15 8.5M10 13a2 2 0 0 0 1.82-1.18"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m9=[["path",{d:"M7 3.34V5a3 3 0 0 0 3 3"}],["path",{d:"M11 21.95V18a2 2 0 0 0-2-2 2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"}],["path",{d:"M21.54 15H17a2 2 0 0 0-2 2v4.54"}],["path",{d:"M12 2a10 10 0 1 0 9.54 13"}],["path",{d:"M20 6V4a2 2 0 1 0-4 0v2"}],["rect",{width:"8",height:"5",x:"14",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ds=[["path",{d:"M21.54 15H17a2 2 0 0 0-2 2v4.54"}],["path",{d:"M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"}],["path",{d:"M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v9=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 2a7 7 0 1 0 10 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g9=[["circle",{cx:"11.5",cy:"12.5",r:"3.5"}],["path",{d:"M3 8c0-3.5 2.5-6 6.5-6 5 0 4.83 3 7.5 5s5 2 5 6c0 4.5-2.5 6.5-7 6.5-2.5 0-2.5 2.5-6 2.5s-7-2-7-5.5c0-3 1.5-3 1.5-5C3.5 10 3 9 3 8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y9=[["path",{d:"m2 2 20 20"}],["path",{d:"M20 14.347V14c0-6-4-12-8-12-1.078 0-2.157.436-3.157 1.19"}],["path",{d:"M6.206 6.21C4.871 8.4 4 11.2 4 14a8 8 0 0 0 14.568 4.568"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x9=[["path",{d:"M12 2C8 2 4 8 4 14a8 8 0 0 0 16 0c0-6-4-12-8-12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cs=[["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"12",cy:"5",r:"1"}],["circle",{cx:"12",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ps=[["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"19",cy:"12",r:"1"}],["circle",{cx:"5",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w9=[["path",{d:"M5 15a6.5 6.5 0 0 1 7 0 6.5 6.5 0 0 0 7 0"}],["path",{d:"M5 9a6.5 6.5 0 0 1 7 0 6.5 6.5 0 0 0 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b9=[["line",{x1:"5",x2:"19",y1:"9",y2:"9"}],["line",{x1:"5",x2:"19",y1:"15",y2:"15"}],["line",{x1:"19",x2:"5",y1:"5",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E9=[["line",{x1:"5",x2:"19",y1:"9",y2:"9"}],["line",{x1:"5",x2:"19",y1:"15",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S9=[["path",{d:"M21 21H8a2 2 0 0 1-1.42-.587l-3.994-3.999a2 2 0 0 1 0-2.828l10-10a2 2 0 0 1 2.829 0l5.999 6a2 2 0 0 1 0 2.828L12.834 21"}],["path",{d:"m5.082 11.09 8.828 8.828"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C9=[["path",{d:"m15 20 3-3h2a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2l3 3z"}],["path",{d:"M6 8v1"}],["path",{d:"M10 8v1"}],["path",{d:"M14 8v1"}],["path",{d:"M18 8v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A9=[["path",{d:"M4 10h12"}],["path",{d:"M4 14h9"}],["path",{d:"M19 6a7.7 7.7 0 0 0-5.2-2A7.9 7.9 0 0 0 6 12c0 4.4 3.5 8 7.8 8 2 0 3.8-.8 5.2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T9=[["path",{d:"m15 15 6 6"}],["path",{d:"m15 9 6-6"}],["path",{d:"M21 16v5h-5"}],["path",{d:"M21 8V3h-5"}],["path",{d:"M3 16v5h5"}],["path",{d:"m3 21 6-6"}],["path",{d:"M3 8V3h5"}],["path",{d:"M9 9 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _9=[["path",{d:"M15 3h6v6"}],["path",{d:"M10 14 21 3"}],["path",{d:"M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H9=[["path",{d:"m15 18-.722-3.25"}],["path",{d:"M2 8a10.645 10.645 0 0 0 20 0"}],["path",{d:"m20 15-1.726-2.05"}],["path",{d:"m4 15 1.726-2.05"}],["path",{d:"m9 18 .722-3.25"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L9=[["path",{d:"M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"}],["path",{d:"M14.084 14.158a3 3 0 0 1-4.242-4.242"}],["path",{d:"M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V9=[["path",{d:"M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P9=[["path",{d:"M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D9=[["path",{d:"M12 16h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M3 19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.5a.5.5 0 0 0-.769-.422l-4.462 2.844A.5.5 0 0 1 15 10.5v-2a.5.5 0 0 0-.769-.422L9.77 10.922A.5.5 0 0 1 9 10.5V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O9=[["path",{d:"M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"}],["path",{d:"M12 12v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k9=[["polygon",{points:"13 19 22 12 13 5 13 19"}],["polygon",{points:"2 19 11 12 2 5 2 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I9=[["path",{d:"M12.67 19a2 2 0 0 0 1.416-.588l6.154-6.172a6 6 0 0 0-8.49-8.49L5.586 9.914A2 2 0 0 0 5 11.328V18a1 1 0 0 0 1 1z"}],["path",{d:"M16 8 2 22"}],["path",{d:"M17.5 15H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N9=[["path",{d:"M4 3 2 5v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}],["path",{d:"M6 8h4"}],["path",{d:"M6 18h4"}],["path",{d:"m12 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}],["path",{d:"M14 8h4"}],["path",{d:"M14 18h4"}],["path",{d:"m20 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z9=[["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M12 2v4"}],["path",{d:"m6.8 15-3.5 2"}],["path",{d:"m20.7 7-3.5 2"}],["path",{d:"M6.8 9 3.3 7"}],["path",{d:"m20.7 17-3.5-2"}],["path",{d:"m9 22 3-8 3 8"}],["path",{d:"M8 22h8"}],["path",{d:"M18 18.7a9 9 0 1 0-12 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $9=[["path",{d:"M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"}],["path",{d:"M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"}],["path",{d:"M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"}],["path",{d:"M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"}],["path",{d:"M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R9=[["path",{d:"M10 12v-1"}],["path",{d:"M10 18v-2"}],["path",{d:"M10 7V6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 .274 1.01"}],["circle",{cx:"10",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B9=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"3",cy:"17",r:"1"}],["path",{d:"M2 17v-3a4 4 0 0 1 8 0v3"}],["circle",{cx:"9",cy:"17",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F9=[["path",{d:"M17.5 22h.5a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 19a2 2 0 1 1 4 0v1a2 2 0 1 1-4 0v-4a6 6 0 0 1 12 0v4a2 2 0 1 1-4 0v-1a2 2 0 1 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q9=[["path",{d:"m13.69 12.479 1.29 4.88a.5.5 0 0 1-.697.591l-1.844-.849a1 1 0 0 0-.88.001l-1.846.85a.5.5 0 0 1-.693-.593l1.29-4.88"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["circle",{cx:"12",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const us=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 18 4-4"}],["path",{d:"M8 10v8h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W9=[["path",{d:"M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3.072"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m6.69 16.479 1.29 4.88a.5.5 0 0 1-.698.591l-1.843-.849a1 1 0 0 0-.88.001l-1.846.85a.5.5 0 0 1-.693-.593l1.29-4.88"}],["circle",{cx:"5",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j9=[["path",{d:"M14.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 13.1a2 2 0 0 0-1 1.76v3.24a2 2 0 0 0 .97 1.78L6 21.7a2 2 0 0 0 2.03.01L11 19.9a2 2 0 0 0 1-1.76V14.9a2 2 0 0 0-.97-1.78L8 11.3a2 2 0 0 0-2.03-.01Z"}],["path",{d:"M7 17v5"}],["path",{d:"M11.7 14.2 7 17l-4.7-2.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fs=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 18v-1"}],["path",{d:"M12 18v-6"}],["path",{d:"M16 18v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ms=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 18v-2"}],["path",{d:"M12 18v-4"}],["path",{d:"M16 18v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ms=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3.5"}],["path",{d:"M4.017 11.512a6 6 0 1 0 8.466 8.475"}],["path",{d:"M9 16a1 1 0 0 1-1-1v-4c0-.552.45-1.008.995-.917a6 6 0 0 1 4.922 4.922c.091.544-.365.995-.917.995z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G9=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m3 15 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vs=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m16 13-3.5 3.5-2-2L8 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z9=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m9 15 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X9=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"M8 14v2.2l1.6 1"}],["circle",{cx:"8",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U9=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m5 12-3 3 3 3"}],["path",{d:"m9 18 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y9=[["path",{d:"M10 12.5 8 15l2 2.5"}],["path",{d:"m14 12.5 2 2.5-2 2.5"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gs=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m2.305 15.53.923-.382"}],["path",{d:"m3.228 12.852-.924-.383"}],["path",{d:"M4.677 21.5a2 2 0 0 0 1.313.5H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2.5"}],["path",{d:"m4.852 11.228-.383-.923"}],["path",{d:"m4.852 16.772-.383.924"}],["path",{d:"m7.148 11.228.383-.923"}],["path",{d:"m7.53 17.696-.382-.924"}],["path",{d:"m8.772 12.852.923-.383"}],["path",{d:"m8.772 15.148.923.383"}],["circle",{cx:"6",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K9=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M9 10h6"}],["path",{d:"M12 13V7"}],["path",{d:"M9 17h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q9=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"4",height:"6",x:"2",y:"12",rx:"2"}],["path",{d:"M10 12h2v6"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J9=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M12 18v-6"}],["path",{d:"m9 15 3 3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ty=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10.29 10.7a2.43 2.43 0 0 0-2.66-.52c-.29.12-.56.3-.78.53l-.35.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L6.5 18l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ey=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"10",cy:"12",r:"2"}],["path",{d:"m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ay=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 15h10"}],["path",{d:"m9 18 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 12a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1 1 1 0 0 1 1 1v1a1 1 0 0 0 1 1"}],["path",{d:"M8 18a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1 1 1 0 0 1-1-1v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ny=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10 12a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1 1 1 0 0 1 1 1v1a1 1 0 0 0 1 1"}],["path",{d:"M14 18a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1 1 1 0 0 1-1-1v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ry=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"4",cy:"16",r:"2"}],["path",{d:"m10 10-4.5 4.5"}],["path",{d:"m9 11 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["circle",{cx:"10",cy:"16",r:"2"}],["path",{d:"m16 10-4.5 4.5"}],["path",{d:"m15 11 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v1"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"5",x:"2",y:"13",rx:"1"}],["path",{d:"M8 13v-2a2 2 0 1 0-4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ly=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["rect",{width:"8",height:"6",x:"8",y:"12",rx:"1"}],["path",{d:"M10 12v-2a2 2 0 1 1 4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cy=[["path",{d:"M10.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v8.4"}],["path",{d:"M8 18v-7.7L16 9v7"}],["circle",{cx:"14",cy:"16",r:"2"}],["circle",{cx:"6",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const py=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 7V4a2 2 0 0 1 2-2 2 2 0 0 0-2 2"}],["path",{d:"M4.063 20.999a2 2 0 0 0 2 1L18 22a2 2 0 0 0 2-2V7l-5-5H6"}],["path",{d:"m5 11-3 3"}],["path",{d:"m5 17-3-3h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ys=[["path",{d:"m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"}],["path",{d:"M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["path",{d:"M8 18h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xs=[["path",{d:"M12.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v9.5"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 15h6"}],["path",{d:"M6 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 15h6"}],["path",{d:"M12 18v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ws=[["path",{d:"M12 17h.01"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["path",{d:"M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const My=[["path",{d:"M20 10V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 14a2 2 0 0 0-2 2"}],["path",{d:"M20 14a2 2 0 0 1 2 2"}],["path",{d:"M20 22a2 2 0 0 0 2-2"}],["path",{d:"M16 22a2 2 0 0 1-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const my=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"11.5",cy:"14.5",r:"2.5"}],["path",{d:"M13.3 16.3 15 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vy=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4.268 21a2 2 0 0 0 1.727 1H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"m9 18-1.5-1.5"}],["circle",{cx:"5",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 12h8"}],["path",{d:"M10 11v2"}],["path",{d:"M8 17h8"}],["path",{d:"M14 16v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 13h2"}],["path",{d:"M14 13h2"}],["path",{d:"M8 17h2"}],["path",{d:"M14 17h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xy=[["path",{d:"M21 7h-3a2 2 0 0 1-2-2V2"}],["path",{d:"M21 6v6.5c0 .8-.7 1.5-1.5 1.5h-7c-.8 0-1.5-.7-1.5-1.5v-9c0-.8.7-1.5 1.5-1.5H17Z"}],["path",{d:"M7 8v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H15"}],["path",{d:"M3 12v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wy=[["path",{d:"m10 18 3-3-3-3"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 11V4a2 2 0 0 1 2-2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const by=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 16 2-2-2-2"}],["path",{d:"M12 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ey=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10 9H8"}],["path",{d:"M16 13H8"}],["path",{d:"M16 17H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 13v-1h6v1"}],["path",{d:"M5 12v6"}],["path",{d:"M4 18h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 13v-1h6v1"}],["path",{d:"M12 12v6"}],["path",{d:"M11 18h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ay=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M12 12v6"}],["path",{d:"m15 15-3-3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ty=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"6",x:"2",y:"12",rx:"1"}],["path",{d:"m10 15.5 4 2.5v-6l-4 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _y=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15 18a3 3 0 1 0-6 0"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["circle",{cx:"12",cy:"13",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m10 11 5 3-5 3v-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ly=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 15h.01"}],["path",{d:"M11.5 13.5a2.5 2.5 0 0 1 0 3"}],["path",{d:"M15 12a5 5 0 0 1 0 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vy=[["path",{d:"M11 11a5 5 0 0 1 0 6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 6.765V4a2 2 0 0 1 2-2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-.93-.23"}],["path",{d:"M7 10.51a.5.5 0 0 0-.826-.38l-1.893 1.628A1 1 0 0 1 3.63 12H2.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1.129a1 1 0 0 1 .652.242l1.893 1.63a.5.5 0 0 0 .826-.38z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Py=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M12 9v4"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dy=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 12.5-5 5"}],["path",{d:"m3 12.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Oy=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m14.5 12.5-5 5"}],["path",{d:"m9.5 12.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ky=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iy=[["path",{d:"M20 7h-3a2 2 0 0 1-2-2V2"}],["path",{d:"M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"}],["path",{d:"M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ny=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 3v18"}],["path",{d:"M3 7.5h4"}],["path",{d:"M3 12h18"}],["path",{d:"M3 16.5h4"}],["path",{d:"M17 3v18"}],["path",{d:"M17 7.5h4"}],["path",{d:"M17 16.5h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zy=[["path",{d:"M12 10a2 2 0 0 0-2 2c0 1.02-.1 2.51-.26 4"}],["path",{d:"M14 13.12c0 2.38 0 6.38-1 8.88"}],["path",{d:"M17.29 21.02c.12-.6.43-2.3.5-3.02"}],["path",{d:"M2 12a10 10 0 0 1 18-6"}],["path",{d:"M2 16h.01"}],["path",{d:"M21.8 16c.2-2 .131-5.354 0-6"}],["path",{d:"M5 19.5C5.5 18 6 15 6 12a6 6 0 0 1 .34-2"}],["path",{d:"M8.65 22c.21-.66.45-1.32.57-2"}],["path",{d:"M9 6.8a6 6 0 0 1 9 5.2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $y=[["path",{d:"M15 6.5V3a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3.5"}],["path",{d:"M9 18h8"}],["path",{d:"M18 3h-3"}],["path",{d:"M11 3a6 6 0 0 0-6 6v11"}],["path",{d:"M5 13h4"}],["path",{d:"M17 10a4 4 0 0 0-8 0v10a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ry=[["path",{d:"M18 12.47v.03m0-.5v.47m-.475 5.056A6.744 6.744 0 0 1 15 18c-3.56 0-7.56-2.53-8.5-6 .348-1.28 1.114-2.433 2.121-3.38m3.444-2.088A8.802 8.802 0 0 1 15 6c3.56 0 6.06 2.54 7 6-.309 1.14-.786 2.177-1.413 3.058"}],["path",{d:"M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33m7.48-4.372A9.77 9.77 0 0 1 16 6.07m0 11.86a9.77 9.77 0 0 1-1.728-3.618"}],["path",{d:"m16.01 17.93-.23 1.4A2 2 0 0 1 13.8 21H9.5a5.96 5.96 0 0 0 1.49-3.98M8.53 3h5.27a2 2 0 0 1 1.98 1.67l.23 1.4M2 2l20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const By=[["path",{d:"M2 16s9-15 20-4C11 23 2 8 2 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fy=[["path",{d:"M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6-.94 3.47-3.44 6-7 6s-7.56-2.53-8.5-6Z"}],["path",{d:"M18 12v.5"}],["path",{d:"M16 17.93a9.77 9.77 0 0 1 0-11.86"}],["path",{d:"M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33"}],["path",{d:"M10.46 7.26C10.2 5.88 9.17 4.24 8 3h5.8a2 2 0 0 1 1.98 1.67l.23 1.4"}],["path",{d:"m16.01 17.93-.23 1.4A2 2 0 0 1 13.8 21H9.5a5.96 5.96 0 0 0 1.49-3.98"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qy=[["path",{d:"M16 16c-3 0-5-2-8-2a6 6 0 0 0-4 1.528"}],["path",{d:"m2 2 20 20"}],["path",{d:"M4 22V4"}],["path",{d:"M7.656 2H8c3 0 5 2 7.333 2q2 0 3.067-.8A1 1 0 0 1 20 4v10.347"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wy=[["path",{d:"M17 22V2L7 7l10 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jy=[["path",{d:"M7 22V2l10 5-10 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gy=[["path",{d:"M4 22V4a1 1 0 0 1 .4-.8A6 6 0 0 1 8 2c3 0 5 2 7.333 2q2 0 3.067-.8A1 1 0 0 1 20 4v10a1 1 0 0 1-.4.8A6 6 0 0 1 16 16c-3 0-5-2-8-2a6 6 0 0 0-4 1.528"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zy=[["path",{d:"M12 2c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 17 10a5 5 0 1 1-10 0c0-.3 0-.6.1-.9a2 2 0 1 0 3.3-2C8 4.5 11 2 12 2Z"}],["path",{d:"m5 22 14-4"}],["path",{d:"m5 18 14 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xy=[["path",{d:"M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uy=[["path",{d:"M16 16v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V10c0-2-2-2-2-4"}],["path",{d:"M7 2h11v4c0 2-2 2-2 4v1"}],["line",{x1:"11",x2:"18",y1:"6",y2:"6"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yy=[["path",{d:"M18 6c0 2-2 2-2 4v10a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V10c0-2-2-2-2-4V2h12z"}],["line",{x1:"6",x2:"18",y1:"6",y2:"6"}],["line",{x1:"12",x2:"12",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ky=[["path",{d:"M14 2v6a2 2 0 0 0 .245.96l5.51 10.08A2 2 0 0 1 18 22H6a2 2 0 0 1-1.755-2.96l5.51-10.08A2 2 0 0 0 10 8V2"}],["path",{d:"M6.453 15h11.094"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qy=[["path",{d:"M10 2v2.343"}],["path",{d:"M14 2v6.343"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20a2 2 0 0 1-2 2H6a2 2 0 0 1-1.755-2.96l5.227-9.563"}],["path",{d:"M6.453 15H15"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jy=[["path",{d:"M10 2v6.292a7 7 0 1 0 4 0V2"}],["path",{d:"M5 15h14"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tx=[["path",{d:"m3 7 5 5-5 5V7"}],["path",{d:"m21 7-5 5 5 5V7"}],["path",{d:"M12 20v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ex=[["path",{d:"m17 3-5 5-5-5h10"}],["path",{d:"m17 21-5-5-5 5h10"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ax=[["path",{d:"M8 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h3"}],["path",{d:"M16 3h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-3"}],["path",{d:"M12 20v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ix=[["path",{d:"M21 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3"}],["path",{d:"M21 16v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nx=[["path",{d:"M12 5a3 3 0 1 1 3 3m-3-3a3 3 0 1 0-3 3m3-3v1M9 8a3 3 0 1 0 3 3M9 8h1m5 0a3 3 0 1 1-3 3m3-3h-1m-2 3v-1"}],["circle",{cx:"12",cy:"8",r:"2"}],["path",{d:"M12 10v12"}],["path",{d:"M12 22c4.2 0 7-1.667 7-5-4.2 0-7 1.667-7 5Z"}],["path",{d:"M12 22c-4.2 0-7-1.667-7-5 4.2 0 7 1.667 7 5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rx=[["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M12 16.5A4.5 4.5 0 1 1 7.5 12 4.5 4.5 0 1 1 12 7.5a4.5 4.5 0 1 1 4.5 4.5 4.5 4.5 0 1 1-4.5 4.5"}],["path",{d:"M12 7.5V9"}],["path",{d:"M7.5 12H9"}],["path",{d:"M16.5 12H15"}],["path",{d:"M12 16.5V15"}],["path",{d:"m8 8 1.88 1.88"}],["path",{d:"M14.12 9.88 16 8"}],["path",{d:"m8 16 1.88-1.88"}],["path",{d:"M14.12 14.12 16 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sx=[["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ox=[["path",{d:"M2 12h6"}],["path",{d:"M22 12h-6"}],["path",{d:"M12 2v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 20v2"}],["path",{d:"m19 9-3 3 3 3"}],["path",{d:"m5 15 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lx=[["path",{d:"M12 22v-6"}],["path",{d:"M12 8V2"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}],["path",{d:"m15 19-3-3-3 3"}],["path",{d:"m15 5-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hx=[["circle",{cx:"15",cy:"19",r:"2"}],["path",{d:"M20.9 19.8A2 2 0 0 0 22 18V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h5.1"}],["path",{d:"M15 11v-1"}],["path",{d:"M15 17v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dx=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"m9 13 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cx=[["path",{d:"M16 14v2.2l1.6 1"}],["path",{d:"M7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2"}],["circle",{cx:"16",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const px=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M2 10h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ux=[["path",{d:"M10 10.5 8 13l2 2.5"}],["path",{d:"m14 10.5 2 2.5-2 2.5"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bs=[["path",{d:"M10.3 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.98a2 2 0 0 1 1.69.9l.66 1.2A2 2 0 0 0 12 6h8a2 2 0 0 1 2 2v3.3"}],["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fx=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["circle",{cx:"12",cy:"13",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mx=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M12 10v6"}],["path",{d:"m15 13-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mx=[["path",{d:"M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v5"}],["circle",{cx:"13",cy:"12",r:"2"}],["path",{d:"M18 19c-2.8 0-5-2.2-5-5v8"}],["circle",{cx:"20",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vx=[["circle",{cx:"12",cy:"13",r:"2"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M14 13h3"}],["path",{d:"M7 13h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gx=[["path",{d:"M11 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v1.5"}],["path",{d:"M13.9 17.45c-1.2-1.2-1.14-2.8-.2-3.73a2.43 2.43 0 0 1 3.44 0l.36.34.34-.34a2.43 2.43 0 0 1 3.45-.01c.95.95 1 2.53-.2 3.74L17.5 21Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yx=[["path",{d:"M2 9V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-1"}],["path",{d:"M2 13h10"}],["path",{d:"m9 16 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xx=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["path",{d:"M8 10v4"}],["path",{d:"M12 10v2"}],["path",{d:"M16 10v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wx=[["circle",{cx:"16",cy:"20",r:"2"}],["path",{d:"M10 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v2"}],["path",{d:"m22 14-4.5 4.5"}],["path",{d:"m21 15 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bx=[["rect",{width:"8",height:"5",x:"14",y:"17",rx:"1"}],["path",{d:"M10 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v2.5"}],["path",{d:"M20 17v-2a2 2 0 1 0-4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ex=[["path",{d:"M9 13h6"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sx=[["path",{d:"m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.54 6a2 2 0 0 1-1.95 1.5H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H18a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cx=[["path",{d:"m6 14 1.45-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.55 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"}],["circle",{cx:"14",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ax=[["path",{d:"M2 7.5V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-1.5"}],["path",{d:"M2 13h10"}],["path",{d:"m5 10-3 3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Es=[["path",{d:"M2 11.5V5a2 2 0 0 1 2-2h3.9c.7 0 1.3.3 1.7.9l.8 1.2c.4.6 1 .9 1.7.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-9.5"}],["path",{d:"M11.378 13.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tx=[["path",{d:"M12 10v6"}],["path",{d:"M9 13h6"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _x=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["circle",{cx:"12",cy:"13",r:"2"}],["path",{d:"M12 15v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hx=[["circle",{cx:"11.5",cy:"12.5",r:"2.5"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M13.3 14.3 15 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lx=[["path",{d:"M10.7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v4.1"}],["path",{d:"m21 21-1.9-1.9"}],["circle",{cx:"17",cy:"17",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vx=[["path",{d:"M2 9V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h7"}],["path",{d:"m8 16 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Px=[["path",{d:"M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v.5"}],["path",{d:"M12 10v4h4"}],["path",{d:"m12 14 1.535-1.605a5 5 0 0 1 8 1.5"}],["path",{d:"M22 22v-4h-4"}],["path",{d:"m22 18-1.535 1.605a5 5 0 0 1-8-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dx=[["path",{d:"M20 10a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2.5a1 1 0 0 1-.8-.4l-.9-1.2A1 1 0 0 0 15 3h-2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1Z"}],["path",{d:"M20 21a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-2.9a1 1 0 0 1-.88-.55l-.42-.85a1 1 0 0 0-.92-.6H13a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1Z"}],["path",{d:"M3 5a2 2 0 0 0 2 2h3"}],["path",{d:"M3 3v13a2 2 0 0 0 2 2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ox=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M12 10v6"}],["path",{d:"m9 13 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kx=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"m9.5 10.5 5 5"}],["path",{d:"m14.5 10.5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ix=[["path",{d:"M20 17a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3.9a2 2 0 0 1-1.69-.9l-.81-1.2a2 2 0 0 0-1.67-.9H8a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2Z"}],["path",{d:"M2 8v11a2 2 0 0 0 2 2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nx=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zx=[["path",{d:"M4 16v-2.38C4 11.5 2.97 10.5 3 8c.03-2.72 1.49-6 4.5-6C9.37 2 10 3.8 10 5.5c0 3.11-2 5.66-2 8.68V16a2 2 0 1 1-4 0Z"}],["path",{d:"M20 20v-2.38c0-2.12 1.03-3.12 1-5.62-.03-2.72-1.49-6-4.5-6C14.63 6 14 7.8 14 9.5c0 3.11 2 5.66 2 8.68V20a2 2 0 1 0 4 0Z"}],["path",{d:"M16 17h4"}],["path",{d:"M4 13h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $x=[["path",{d:"M12 12H5a2 2 0 0 0-2 2v5"}],["circle",{cx:"13",cy:"19",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}],["path",{d:"M8 19h3m5-17v17h6M6 12V7c0-1.1.9-2 2-2h3l5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rx=[["path",{d:"m15 17 5-5-5-5"}],["path",{d:"M4 18v-2a4 4 0 0 1 4-4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bx=[["line",{x1:"22",x2:"2",y1:"6",y2:"6"}],["line",{x1:"22",x2:"2",y1:"18",y2:"18"}],["line",{x1:"6",x2:"6",y1:"2",y2:"22"}],["line",{x1:"18",x2:"18",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fx=[["path",{d:"M5 16V9h14V2H5l14 14h-7m-7 0 7 7v-7m-7 0h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qx=[["line",{x1:"3",x2:"15",y1:"22",y2:"22"}],["line",{x1:"4",x2:"14",y1:"9",y2:"9"}],["path",{d:"M14 22V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v18"}],["path",{d:"M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 2 2a2 2 0 0 0 2-2V9.83a2 2 0 0 0-.59-1.42L18 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wx=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 16s-1.5-2-4-2-4 2-4 2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jx=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["rect",{width:"10",height:"8",x:"7",y:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gx=[["path",{d:"M13.354 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14v6a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341l1.218-1.348"}],["path",{d:"M16 6h6"}],["path",{d:"M19 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ss=[["path",{d:"M12.531 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14v6a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341l.427-.473"}],["path",{d:"m16.5 3.5 5 5"}],["path",{d:"m21.5 3.5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cs=[["path",{d:"M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zx=[["path",{d:"M2 7v10"}],["path",{d:"M6 5v14"}],["rect",{width:"12",height:"18",x:"10",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xx=[["path",{d:"M2 3v18"}],["rect",{width:"12",height:"18",x:"6",y:"3",rx:"2"}],["path",{d:"M22 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ux=[["rect",{width:"18",height:"14",x:"3",y:"3",rx:"2"}],["path",{d:"M4 21h1"}],["path",{d:"M9 21h1"}],["path",{d:"M14 21h1"}],["path",{d:"M19 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yx=[["path",{d:"M7 2h10"}],["path",{d:"M5 6h14"}],["rect",{width:"18",height:"12",x:"3",y:"10",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kx=[["path",{d:"M3 2h18"}],["rect",{width:"18",height:"12",x:"3",y:"6",rx:"2"}],["path",{d:"M3 22h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qx=[["line",{x1:"6",x2:"10",y1:"11",y2:"11"}],["line",{x1:"8",x2:"8",y1:"9",y2:"13"}],["line",{x1:"15",x2:"15.01",y1:"12",y2:"12"}],["line",{x1:"18",x2:"18.01",y1:"10",y2:"10"}],["path",{d:"M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jx=[["line",{x1:"6",x2:"10",y1:"12",y2:"12"}],["line",{x1:"8",x2:"8",y1:"10",y2:"14"}],["line",{x1:"15",x2:"15.01",y1:"13",y2:"13"}],["line",{x1:"18",x2:"18.01",y1:"11",y2:"11"}],["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tw=[["path",{d:"m12 14 4-4"}],["path",{d:"M3.34 19a10 10 0 1 1 17.32 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ew=[["path",{d:"m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8"}],["path",{d:"m16 16 6-6"}],["path",{d:"m8 8 6-6"}],["path",{d:"m9 7 8 8"}],["path",{d:"m21 11-8-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aw=[["path",{d:"M6 3h12l4 6-10 13L2 9Z"}],["path",{d:"M11 3 8 9l4 13 4-13-3-6"}],["path",{d:"M2 9h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iw=[["path",{d:"M11.5 21a7.5 7.5 0 1 1 7.35-9"}],["path",{d:"M13 12V3"}],["path",{d:"M4 21h16"}],["path",{d:"M9 12V3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nw=[["path",{d:"M9 10h.01"}],["path",{d:"M15 10h.01"}],["path",{d:"M12 2a8 8 0 0 0-8 8v12l3-3 2.5 2.5L12 19l2.5 2.5L17 19l3 3V10a8 8 0 0 0-8-8z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rw=[["rect",{x:"3",y:"8",width:"18",height:"4",rx:"1"}],["path",{d:"M12 8v13"}],["path",{d:"M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"}],["path",{d:"M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sw=[["path",{d:"M6 3v12"}],["path",{d:"M18 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"}],["path",{d:"M6 21a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"}],["path",{d:"M15 6a9 9 0 0 0-9 9"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ow=[["line",{x1:"6",x2:"6",y1:"3",y2:"15"}],["circle",{cx:"18",cy:"6",r:"3"}],["circle",{cx:"6",cy:"18",r:"3"}],["path",{d:"M18 9a9 9 0 0 1-9 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lw=[["path",{d:"M12 3v6"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M12 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hw=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v7"}],["path",{d:"m15 9-3-3 3-3"}],["circle",{cx:"19",cy:"18",r:"3"}],["path",{d:"M12 18H7a2 2 0 0 1-2-2V9"}],["path",{d:"m9 15 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const As=[["circle",{cx:"12",cy:"12",r:"3"}],["line",{x1:"3",x2:"9",y1:"12",y2:"12"}],["line",{x1:"15",x2:"21",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dw=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v7"}],["path",{d:"M11 18H8a2 2 0 0 1-2-2V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cw=[["circle",{cx:"12",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["circle",{cx:"18",cy:"6",r:"3"}],["path",{d:"M18 9v2c0 .6-.4 1-1 1H7c-.6 0-1-.4-1-1V9"}],["path",{d:"M12 12v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pw=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v6"}],["circle",{cx:"5",cy:"18",r:"3"}],["path",{d:"M12 3v18"}],["circle",{cx:"19",cy:"6",r:"3"}],["path",{d:"M16 15.7A9 9 0 0 0 19 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uw=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 21V9a9 9 0 0 0 9 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fw=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v12"}],["circle",{cx:"19",cy:"18",r:"3"}],["path",{d:"m15 9-3-3 3-3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mw=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 9v12"}],["path",{d:"m21 3-6 6"}],["path",{d:"m21 9-6-6"}],["path",{d:"M18 11.5V15"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mw=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v12"}],["path",{d:"m15 9-3-3 3-3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v3"}],["path",{d:"M19 15v6"}],["path",{d:"M22 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vw=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 9v12"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v3"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gw=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M18 6V5"}],["path",{d:"M18 11v-1"}],["line",{x1:"6",x2:"6",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yw=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v7"}],["line",{x1:"6",x2:"6",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xw=[["path",{d:"M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"}],["path",{d:"M9 18c-4.51 2-5-2-7-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ww=[["path",{d:"m22 13.29-3.33-10a.42.42 0 0 0-.14-.18.38.38 0 0 0-.22-.11.39.39 0 0 0-.23.07.42.42 0 0 0-.14.18l-2.26 6.67H8.32L6.1 3.26a.42.42 0 0 0-.1-.18.38.38 0 0 0-.26-.08.39.39 0 0 0-.23.07.42.42 0 0 0-.14.18L2 13.29a.74.74 0 0 0 .27.83L12 21l9.69-6.88a.71.71 0 0 0 .31-.83Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bw=[["path",{d:"M5.116 4.104A1 1 0 0 1 6.11 3h11.78a1 1 0 0 1 .994 1.105L17.19 20.21A2 2 0 0 1 15.2 22H8.8a2 2 0 0 1-2-1.79z"}],["path",{d:"M6 12a5 5 0 0 1 6 0 5 5 0 0 0 6 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ew=[["circle",{cx:"6",cy:"15",r:"4"}],["circle",{cx:"18",cy:"15",r:"4"}],["path",{d:"M14 15a2 2 0 0 0-2-2 2 2 0 0 0-2 2"}],["path",{d:"M2.5 13 5 7c.7-1.3 1.4-2 3-2"}],["path",{d:"M21.5 13 19 7c-.7-1.3-1.5-2-3-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sw=[["path",{d:"M15.686 15A14.5 14.5 0 0 1 12 22a14.5 14.5 0 0 1 0-20 10 10 0 1 0 9.542 13"}],["path",{d:"M2 12h8.5"}],["path",{d:"M20 6V4a2 2 0 1 0-4 0v2"}],["rect",{width:"8",height:"5",x:"14",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cw=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"}],["path",{d:"M2 12h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Aw=[["path",{d:"M12 13V2l8 4-8 4"}],["path",{d:"M20.561 10.222a9 9 0 1 1-12.55-5.29"}],["path",{d:"M8.002 9.997a5 5 0 1 0 8.9 2.02"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tw=[["path",{d:"M18 11.5V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1.4"}],["path",{d:"M14 10V8a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"}],["path",{d:"M10 9.9V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v5"}],["path",{d:"M6 14a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M18 11a2 2 0 1 1 4 0v3a8 8 0 0 1-8 8h-4a8 8 0 0 1-8-8 2 2 0 1 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _w=[["path",{d:"M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"}],["path",{d:"M22 10v6"}],["path",{d:"M6 12.5V16a6 3 0 0 0 12 0v-3.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hw=[["path",{d:"M2 21V3"}],["path",{d:"M2 5h18a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2.26"}],["path",{d:"M7 17v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3"}],["circle",{cx:"16",cy:"11",r:"2"}],["circle",{cx:"8",cy:"11",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lw=[["path",{d:"M22 5V2l-5.89 5.89"}],["circle",{cx:"16.6",cy:"15.89",r:"3"}],["circle",{cx:"8.11",cy:"7.4",r:"3"}],["circle",{cx:"12.35",cy:"11.65",r:"3"}],["circle",{cx:"13.91",cy:"5.85",r:"3"}],["circle",{cx:"18.15",cy:"10.09",r:"3"}],["circle",{cx:"6.56",cy:"13.2",r:"3"}],["circle",{cx:"10.8",cy:"17.44",r:"3"}],["circle",{cx:"5",cy:"19",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ts=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _s=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"m16 16 5 5"}],["path",{d:"m16 21 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hs=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"M16 19h6"}],["path",{d:"M19 22v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ls=[["path",{d:"M12 3v18"}],["path",{d:"M3 12h18"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vw=[["path",{d:"M15 3v18"}],["path",{d:"M3 12h18"}],["path",{d:"M9 3v18"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ji=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M3 15h18"}],["path",{d:"M9 3v18"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pw=[["circle",{cx:"12",cy:"9",r:"1"}],["circle",{cx:"19",cy:"9",r:"1"}],["circle",{cx:"5",cy:"9",r:"1"}],["circle",{cx:"12",cy:"15",r:"1"}],["circle",{cx:"19",cy:"15",r:"1"}],["circle",{cx:"5",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dw=[["circle",{cx:"12",cy:"5",r:"1"}],["circle",{cx:"19",cy:"5",r:"1"}],["circle",{cx:"5",cy:"5",r:"1"}],["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"19",cy:"12",r:"1"}],["circle",{cx:"5",cy:"12",r:"1"}],["circle",{cx:"12",cy:"19",r:"1"}],["circle",{cx:"19",cy:"19",r:"1"}],["circle",{cx:"5",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ow=[["circle",{cx:"9",cy:"12",r:"1"}],["circle",{cx:"9",cy:"5",r:"1"}],["circle",{cx:"9",cy:"19",r:"1"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"15",cy:"5",r:"1"}],["circle",{cx:"15",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kw=[["path",{d:"M3 7V5c0-1.1.9-2 2-2h2"}],["path",{d:"M17 3h2c1.1 0 2 .9 2 2v2"}],["path",{d:"M21 17v2c0 1.1-.9 2-2 2h-2"}],["path",{d:"M7 21H5c-1.1 0-2-.9-2-2v-2"}],["rect",{width:"7",height:"5",x:"7",y:"7",rx:"1"}],["rect",{width:"7",height:"5",x:"10",y:"12",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iw=[["path",{d:"m11.9 12.1 4.514-4.514"}],["path",{d:"M20.1 2.3a1 1 0 0 0-1.4 0l-1.114 1.114A2 2 0 0 0 17 4.828v1.344a2 2 0 0 1-.586 1.414A2 2 0 0 1 17.828 7h1.344a2 2 0 0 0 1.414-.586L21.7 5.3a1 1 0 0 0 0-1.4z"}],["path",{d:"m6 16 2 2"}],["path",{d:"M8.23 9.85A3 3 0 0 1 11 8a5 5 0 0 1 5 5 3 3 0 0 1-1.85 2.77l-.92.38A2 2 0 0 0 12 18a4 4 0 0 1-4 4 6 6 0 0 1-6-6 4 4 0 0 1 4-4 2 2 0 0 0 1.85-1.23z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nw=[["path",{d:"M13.144 21.144A7.274 10.445 45 1 0 2.856 10.856"}],["path",{d:"M13.144 21.144A7.274 4.365 45 0 0 2.856 10.856a7.274 4.365 45 0 0 10.288 10.288"}],["path",{d:"M16.565 10.435 18.6 8.4a2.501 2.501 0 1 0 1.65-4.65 2.5 2.5 0 1 0-4.66 1.66l-2.024 2.025"}],["path",{d:"m8.5 16.5-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zw=[["path",{d:"M12 16H4a2 2 0 1 1 0-4h16a2 2 0 1 1 0 4h-4.25"}],["path",{d:"M5 12a2 2 0 0 1-2-2 9 7 0 0 1 18 0 2 2 0 0 1-2 2"}],["path",{d:"M5 16a2 2 0 0 0-2 2 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 2 2 0 0 0-2-2q0 0 0 0"}],["path",{d:"m6.67 12 6.13 4.6a2 2 0 0 0 2.8-.4l3.15-4.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $w=[["path",{d:"m15 12-8.373 8.373a1 1 0 1 1-3-3L12 9"}],["path",{d:"m18 15 4-4"}],["path",{d:"m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172V7l-2.26-2.26a6 6 0 0 0-4.202-1.756L9 2.96l.92.82A6.18 6.18 0 0 1 12 8.4V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rw=[["path",{d:"M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"}],["path",{d:"m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 16 6 6"}],["circle",{cx:"16",cy:"9",r:"2.9"}],["circle",{cx:"6",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bw=[["path",{d:"M11 14h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 16"}],["path",{d:"m7 20 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 15 6 6"}],["path",{d:"M19.5 8.5c.7-.7 1.5-1.6 1.5-2.7A2.73 2.73 0 0 0 16 4a2.78 2.78 0 0 0-5 1.8c0 1.2.8 2 1.5 2.8L16 12Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vs=[["path",{d:"M11 12h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 14"}],["path",{d:"m7 18 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 13 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fw=[["path",{d:"M18 12.5V10a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1.4"}],["path",{d:"M14 11V9a2 2 0 1 0-4 0v2"}],["path",{d:"M10 10.5V5a2 2 0 1 0-4 0v9"}],["path",{d:"m7 15-1.76-1.76a2 2 0 0 0-2.83 2.82l3.6 3.6C7.5 21.14 9.2 22 12 22h2a8 8 0 0 0 8-8V7a2 2 0 1 0-4 0v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qw=[["path",{d:"M12 3V2"}],["path",{d:"m15.4 17.4 3.2-2.8a2 2 0 1 1 2.8 2.9l-3.6 3.3c-.7.8-1.7 1.2-2.8 1.2h-4c-1.1 0-2.1-.4-2.8-1.2l-1.302-1.464A1 1 0 0 0 6.151 19H5"}],["path",{d:"M2 14h12a2 2 0 0 1 0 4h-2"}],["path",{d:"M4 10h16"}],["path",{d:"M5 10a7 7 0 0 1 14 0"}],["path",{d:"M5 14v6a1 1 0 0 1-1 1H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ww=[["path",{d:"M18 11V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M14 10V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"}],["path",{d:"M10 10.5V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2v8"}],["path",{d:"M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jw=[["path",{d:"m11 17 2 2a1 1 0 1 0 3-3"}],["path",{d:"m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"}],["path",{d:"m21 3 1 11h-2"}],["path",{d:"M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"}],["path",{d:"M3 4h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gw=[["path",{d:"M12 2v8"}],["path",{d:"m16 6-4 4-4-4"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zw=[["path",{d:"m16 6-4-4-4 4"}],["path",{d:"M12 2v8"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xw=[["line",{x1:"22",x2:"2",y1:"12",y2:"12"}],["path",{d:"M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"}],["line",{x1:"6",x2:"6.01",y1:"16",y2:"16"}],["line",{x1:"10",x2:"10.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uw=[["path",{d:"M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5"}],["path",{d:"M14 6a6 6 0 0 1 6 6v3"}],["path",{d:"M4 15v-3a6 6 0 0 1 6-6"}],["rect",{x:"2",y:"15",width:"20",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yw=[["line",{x1:"4",x2:"20",y1:"9",y2:"9"}],["line",{x1:"4",x2:"20",y1:"15",y2:"15"}],["line",{x1:"10",x2:"8",y1:"3",y2:"21"}],["line",{x1:"16",x2:"14",y1:"3",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kw=[["path",{d:"m5.2 6.2 1.4 1.4"}],["path",{d:"M2 13h2"}],["path",{d:"M20 13h2"}],["path",{d:"m17.4 7.6 1.4-1.4"}],["path",{d:"M22 17H2"}],["path",{d:"M22 21H2"}],["path",{d:"M16 13a4 4 0 0 0-8 0"}],["path",{d:"M12 5V2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qw=[["path",{d:"M22 9a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1l2 2h12l2-2h1a1 1 0 0 0 1-1Z"}],["path",{d:"M7.5 12h9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jw=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"m17 12 3-2v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tb=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M21 18h-4c0-4 4-3 4-6 0-1.5-2-2.5-4-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eb=[["path",{d:"M12 18V6"}],["path",{d:"M17 10v3a1 1 0 0 0 1 1h3"}],["path",{d:"M21 10v8"}],["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ab=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M17.5 10.5c1.7-1 3.5 0 3.5 1.5a2 2 0 0 1-2 2"}],["path",{d:"M17 17.5c2 1.5 4 .3 4-1.5a2 2 0 0 0-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ib=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M17 13v-3h4"}],["path",{d:"M17 17.7c.4.2.8.3 1.3.3 1.5 0 2.7-1.1 2.7-2.5S19.8 13 18.3 13H17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nb=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["circle",{cx:"19",cy:"16",r:"2"}],["path",{d:"M20 10c-2 2-3 3.5-3 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rb=[["path",{d:"M6 12h12"}],["path",{d:"M6 20V4"}],["path",{d:"M18 20V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sb=[["path",{d:"M21 14h-1.343"}],["path",{d:"M9.128 3.47A9 9 0 0 1 21 12v3.343"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20.414 20.414A2 2 0 0 1 19 21h-1a2 2 0 0 1-2-2v-3"}],["path",{d:"M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 2.636-6.364"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ob=[["path",{d:"M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lb=[["path",{d:"M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z"}],["path",{d:"M21 16v2a4 4 0 0 1-4 4h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hb=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"m12 13-1-1 2-2-3-3 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const db=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"}],["path",{d:"m18 15-2-2"}],["path",{d:"m15 18-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cb=[["path",{d:"M13.5 19.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5A5.5 5.5 0 0 1 7.5 3c1.76 0 3 .5 4.5 2 1.5-1.5 2.74-2 4.5-2a5.5 5.5 0 0 1 5.402 6.5"}],["path",{d:"M15 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pb=[["line",{x1:"2",y1:"2",x2:"22",y2:"22"}],["path",{d:"M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"}],["path",{d:"M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ub=[["path",{d:"M13.5 19.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5A5.5 5.5 0 0 1 7.5 3c1.76 0 3 .5 4.5 2 1.5-1.5 2.74-2 4.5-2a5.5 5.5 0 0 1 5.402 6.5"}],["path",{d:"M15 15h6"}],["path",{d:"M18 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fb=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mb=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mb=[["path",{d:"M11 8c2-3-2-3 0-6"}],["path",{d:"M15.5 8c2-3-2-3 0-6"}],["path",{d:"M6 10h.01"}],["path",{d:"M6 14h.01"}],["path",{d:"M10 16v-4"}],["path",{d:"M14 16v-4"}],["path",{d:"M18 16v-4"}],["path",{d:"M20 6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3"}],["path",{d:"M5 20v2"}],["path",{d:"M19 20v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vb=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gb=[["path",{d:"m9 11-6 6v3h9l3-3"}],["path",{d:"m22 12-4.6 4.6a2 2 0 0 1-2.8 0l-5.2-5.2a2 2 0 0 1 0-2.8L14 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yb=[["path",{d:"M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["path",{d:"M12 7v5l4 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xb=[["path",{d:"M10.82 16.12c1.69.6 3.91.79 5.18.85.28.01.53-.09.7-.27"}],["path",{d:"M11.14 20.57c.52.24 2.44 1.12 4.08 1.37.46.06.86-.25.9-.71.12-1.52-.3-3.43-.5-4.28"}],["path",{d:"M16.13 21.05c1.65.63 3.68.84 4.87.91a.9.9 0 0 0 .7-.26"}],["path",{d:"M17.99 5.52a20.83 20.83 0 0 1 3.15 4.5.8.8 0 0 1-.68 1.13c-1.17.1-2.5.02-3.9-.25"}],["path",{d:"M20.57 11.14c.24.52 1.12 2.44 1.37 4.08.04.3-.08.59-.31.75"}],["path",{d:"M4.93 4.93a10 10 0 0 0-.67 13.4c.35.43.96.4 1.17-.12.69-1.71 1.07-5.07 1.07-6.71 1.34.45 3.1.9 4.88.62a.85.85 0 0 0 .48-.24"}],["path",{d:"M5.52 17.99c1.05.95 2.91 2.42 4.5 3.15a.8.8 0 0 0 1.13-.68c.2-2.34-.33-5.3-1.57-8.28"}],["path",{d:"M8.35 2.68a10 10 0 0 1 9.98 1.58c.43.35.4.96-.12 1.17-1.5.6-4.3.98-6.07 1.05"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wb=[["path",{d:"M10.82 16.12c1.69.6 3.91.79 5.18.85.55.03 1-.42.97-.97-.06-1.27-.26-3.5-.85-5.18"}],["path",{d:"M11.5 6.5c1.64 0 5-.38 6.71-1.07.52-.2.55-.82.12-1.17A10 10 0 0 0 4.26 18.33c.35.43.96.4 1.17-.12.69-1.71 1.07-5.07 1.07-6.71 1.34.45 3.1.9 4.88.62a.88.88 0 0 0 .73-.74c.3-2.14-.15-3.5-.61-4.88"}],["path",{d:"M15.62 16.95c.2.85.62 2.76.5 4.28a.77.77 0 0 1-.9.7 16.64 16.64 0 0 1-4.08-1.36"}],["path",{d:"M16.13 21.05c1.65.63 3.68.84 4.87.91a.9.9 0 0 0 .96-.96 17.68 17.68 0 0 0-.9-4.87"}],["path",{d:"M16.94 15.62c.86.2 2.77.62 4.29.5a.77.77 0 0 0 .7-.9 16.64 16.64 0 0 0-1.36-4.08"}],["path",{d:"M17.99 5.52a20.82 20.82 0 0 1 3.15 4.5.8.8 0 0 1-.68 1.13c-2.33.2-5.3-.32-8.27-1.57"}],["path",{d:"M4.93 4.93 3 3a.7.7 0 0 1 0-1"}],["path",{d:"M9.58 12.18c1.24 2.98 1.77 5.95 1.57 8.28a.8.8 0 0 1-1.13.68 20.82 20.82 0 0 1-4.5-3.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bb=[["path",{d:"M12 6v4"}],["path",{d:"M14 14h-4"}],["path",{d:"M14 18h-4"}],["path",{d:"M14 8h-4"}],["path",{d:"M18 12h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h2"}],["path",{d:"M18 22V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eb=[["path",{d:"M10 22v-6.57"}],["path",{d:"M12 11h.01"}],["path",{d:"M12 7h.01"}],["path",{d:"M14 15.43V22"}],["path",{d:"M15 16a5 5 0 0 0-6 0"}],["path",{d:"M16 11h.01"}],["path",{d:"M16 7h.01"}],["path",{d:"M8 11h.01"}],["path",{d:"M8 7h.01"}],["rect",{x:"4",y:"2",width:"16",height:"20",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sb=[["path",{d:"M5 22h14"}],["path",{d:"M5 2h14"}],["path",{d:"M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"}],["path",{d:"M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cb=[["path",{d:"M10 12V8.964"}],["path",{d:"M14 12V8.964"}],["path",{d:"M15 12a1 1 0 0 1 1 1v2a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-2a1 1 0 0 1 1-1z"}],["path",{d:"M8.5 21H5a2 2 0 0 1-2-2v-9a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ab=[["path",{d:"M12.662 21H5a2 2 0 0 1-2-2v-9a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v2.475"}],["path",{d:"M14.959 12.717A1 1 0 0 0 14 12h-4a1 1 0 0 0-1 1v8"}],["path",{d:"M15 18h6"}],["path",{d:"M18 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tb=[["path",{d:"M9.5 13.866a4 4 0 0 1 5 .01"}],["path",{d:"M12 17h.01"}],["path",{d:"M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}],["path",{d:"M7 10.754a8 8 0 0 1 10 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ps=[["path",{d:"M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"}],["path",{d:"M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ds=[["path",{d:"M12 17c5 0 8-2.69 8-6H4c0 3.31 3 6 8 6m-4 4h8m-4-3v3M5.14 11a3.5 3.5 0 1 1 6.71 0"}],["path",{d:"M12.14 11a3.5 3.5 0 1 1 6.71 0"}],["path",{d:"M15.5 6.5a3.5 3.5 0 1 0-7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Os=[["path",{d:"m7 11 4.08 10.35a1 1 0 0 0 1.84 0L17 11"}],["path",{d:"M17 7A5 5 0 0 0 7 7"}],["path",{d:"M17 7a2 2 0 0 1 0 4H7a2 2 0 0 1 0-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _b=[["path",{d:"M13.5 8h-3"}],["path",{d:"m15 2-1 2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h3"}],["path",{d:"M16.899 22A5 5 0 0 0 7.1 22"}],["path",{d:"m9 2 3 6"}],["circle",{cx:"12",cy:"15",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hb=[["path",{d:"M16 10h2"}],["path",{d:"M16 14h2"}],["path",{d:"M6.17 15a3 3 0 0 1 5.66 0"}],["circle",{cx:"9",cy:"11",r:"2"}],["rect",{x:"2",y:"5",width:"20",height:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lb=[["path",{d:"M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21"}],["path",{d:"m14 19 3 3v-5.5"}],["path",{d:"m17 22 3-3"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vb=[["path",{d:"M21 9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"}],["line",{x1:"16",x2:"22",y1:"5",y2:"5"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pb=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M10.41 10.41a2 2 0 1 1-2.83-2.83"}],["line",{x1:"13.5",x2:"6",y1:"13.5",y2:"21"}],["line",{x1:"18",x2:"21",y1:"12",y2:"15"}],["path",{d:"M3.59 3.59A1.99 1.99 0 0 0 3 5v14a2 2 0 0 0 2 2h14c.55 0 1.052-.22 1.41-.59"}],["path",{d:"M21 15V5a2 2 0 0 0-2-2H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Db=[["path",{d:"m11 16-5 5"}],["path",{d:"M11 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6.5"}],["path",{d:"M15.765 22a.5.5 0 0 1-.765-.424V13.38a.5.5 0 0 1 .765-.424l5.878 3.674a1 1 0 0 1 0 1.696z"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ob=[["path",{d:"M16 5h6"}],["path",{d:"M19 2v6"}],["path",{d:"M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kb=[["path",{d:"M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21"}],["path",{d:"m14 19.5 3-3 3 3"}],["path",{d:"M17 22v-5.5"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ib=[["path",{d:"M16 3h5v5"}],["path",{d:"M17 21h2a2 2 0 0 0 2-2"}],["path",{d:"M21 12v3"}],["path",{d:"m21 3-5 5"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2"}],["path",{d:"m5 21 4.144-4.144a1.21 1.21 0 0 1 1.712 0L13 19"}],["path",{d:"M9 3h3"}],["rect",{x:"3",y:"11",width:"10",height:"10",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nb=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zb=[["path",{d:"M18 22H4a2 2 0 0 1-2-2V6"}],["path",{d:"m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"}],["circle",{cx:"12",cy:"8",r:"2"}],["rect",{width:"16",height:"16",x:"6",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $b=[["path",{d:"M12 3v12"}],["path",{d:"m8 11 4 4 4-4"}],["path",{d:"M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rb=[["polyline",{points:"22 12 16 12 14 15 10 15 8 12 2 12"}],["path",{d:"M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ks=[["path",{d:"M21 12H11"}],["path",{d:"M21 18H11"}],["path",{d:"M21 6H11"}],["path",{d:"m7 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Is=[["path",{d:"M21 12H11"}],["path",{d:"M21 18H11"}],["path",{d:"M21 6H11"}],["path",{d:"m3 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bb=[["path",{d:"M6 3h12"}],["path",{d:"M6 8h12"}],["path",{d:"m6 13 8.5 8"}],["path",{d:"M6 13h3"}],["path",{d:"M9 13c6.667 0 6.667-10 0-10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fb=[["path",{d:"M6 16c5 0 7-8 12-8a4 4 0 0 1 0 8c-5 0-7-8-12-8a4 4 0 1 0 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qb=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 16v-4"}],["path",{d:"M12 8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wb=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7h.01"}],["path",{d:"M17 7h.01"}],["path",{d:"M7 17h.01"}],["path",{d:"M17 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jb=[["rect",{width:"20",height:"20",x:"2",y:"2",rx:"5",ry:"5"}],["path",{d:"M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"}],["line",{x1:"17.5",x2:"17.51",y1:"6.5",y2:"6.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gb=[["line",{x1:"19",x2:"10",y1:"4",y2:"4"}],["line",{x1:"14",x2:"5",y1:"20",y2:"20"}],["line",{x1:"15",x2:"9",y1:"4",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zb=[["path",{d:"m16 14 4 4-4 4"}],["path",{d:"M20 10a8 8 0 1 0-8 8h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xb=[["path",{d:"M4 10a8 8 0 1 1 8 8H4"}],["path",{d:"m8 22-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ub=[["path",{d:"M12 9.5V21m0-11.5L6 3m6 6.5L18 3"}],["path",{d:"M6 15h12"}],["path",{d:"M6 11h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yb=[["path",{d:"M6 5v11"}],["path",{d:"M12 5v6"}],["path",{d:"M18 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kb=[["path",{d:"M21 17a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2Z"}],["path",{d:"M6 15v-2"}],["path",{d:"M12 15V9"}],["circle",{cx:"12",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qb=[["path",{d:"M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"}],["circle",{cx:"16.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jb=[["path",{d:"M12.4 2.7a2.5 2.5 0 0 1 3.4 0l5.5 5.5a2.5 2.5 0 0 1 0 3.4l-3.7 3.7a2.5 2.5 0 0 1-3.4 0L8.7 9.8a2.5 2.5 0 0 1 0-3.4z"}],["path",{d:"m14 7 3 3"}],["path",{d:"m9.4 10.6-6.814 6.814A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tE=[["path",{d:"m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 1 0 0 0 0-1.4L19 4"}],["path",{d:"m21 2-9.6 9.6"}],["circle",{cx:"7.5",cy:"15.5",r:"5.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eE=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 8h4"}],["path",{d:"M14 8h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"M2 12h20"}],["path",{d:"M6 12v4"}],["path",{d:"M10 12v4"}],["path",{d:"M14 12v4"}],["path",{d:"M18 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aE=[["path",{d:"M 20 4 A2 2 0 0 1 22 6"}],["path",{d:"M 22 6 L 22 16.41"}],["path",{d:"M 7 16 L 16 16"}],["path",{d:"M 9.69 4 L 20 4"}],["path",{d:"M14 8h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"}],["path",{d:"M6 8h.01"}],["path",{d:"M8 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iE=[["path",{d:"M10 8h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M14 8h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"M6 8h.01"}],["path",{d:"M7 16h10"}],["path",{d:"M8 12h.01"}],["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nE=[["path",{d:"M12 2v5"}],["path",{d:"M14.829 15.998a3 3 0 1 1-5.658 0"}],["path",{d:"M20.92 14.606A1 1 0 0 1 20 16H4a1 1 0 0 1-.92-1.394l3-7A1 1 0 0 1 7 7h10a1 1 0 0 1 .92.606z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rE=[["path",{d:"M10.293 2.293a1 1 0 0 1 1.414 0l2.5 2.5 5.994 1.227a1 1 0 0 1 .506 1.687l-7 7a1 1 0 0 1-1.687-.506l-1.227-5.994-2.5-2.5a1 1 0 0 1 0-1.414z"}],["path",{d:"m14.207 4.793-3.414 3.414"}],["path",{d:"M3 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"}],["path",{d:"m9.086 6.5-4.793 4.793a1 1 0 0 0-.18 1.17L7 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sE=[["path",{d:"M12 10v12"}],["path",{d:"M17.929 7.629A1 1 0 0 1 17 9H7a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 9 2h6a1 1 0 0 1 .928.629z"}],["path",{d:"M9 22h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oE=[["path",{d:"M19.929 18.629A1 1 0 0 1 19 20H9a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 11 13h6a1 1 0 0 1 .928.629z"}],["path",{d:"M6 3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"}],["path",{d:"M8 6h4a2 2 0 0 1 2 2v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lE=[["path",{d:"M19.929 9.629A1 1 0 0 1 19 11H9a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 11 4h6a1 1 0 0 1 .928.629z"}],["path",{d:"M6 15a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1z"}],["path",{d:"M8 18h4a2 2 0 0 0 2-2v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hE=[["path",{d:"M12 12v6"}],["path",{d:"M4.077 10.615A1 1 0 0 0 5 12h14a1 1 0 0 0 .923-1.385l-3.077-7.384A2 2 0 0 0 15 2H9a2 2 0 0 0-1.846 1.23Z"}],["path",{d:"M8 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dE=[["path",{d:"m12 8 6-3-6-3v10"}],["path",{d:"m8 11.99-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12"}],["path",{d:"m6.49 12.85 11.02 6.3"}],["path",{d:"M17.51 12.85 6.5 19.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cE=[["path",{d:"M10 18v-7"}],["path",{d:"M11.12 2.198a2 2 0 0 1 1.76.006l7.866 3.847c.476.233.31.949-.22.949H3.474c-.53 0-.695-.716-.22-.949z"}],["path",{d:"M14 18v-7"}],["path",{d:"M18 18v-7"}],["path",{d:"M3 22h18"}],["path",{d:"M6 18v-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pE=[["path",{d:"m5 8 6 6"}],["path",{d:"m4 14 6-6 2-3"}],["path",{d:"M2 5h12"}],["path",{d:"M7 2h1"}],["path",{d:"m22 22-5-10-5 10"}],["path",{d:"M14 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uE=[["path",{d:"M2 20h20"}],["path",{d:"m9 10 2 2 4-4"}],["rect",{x:"3",y:"4",width:"18",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ns=[["rect",{width:"18",height:"12",x:"3",y:"4",rx:"2",ry:"2"}],["line",{x1:"2",x2:"22",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fE=[["path",{d:"M18 5a2 2 0 0 1 2 2v8.526a2 2 0 0 0 .212.897l1.068 2.127a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45l1.068-2.127A2 2 0 0 0 4 15.526V7a2 2 0 0 1 2-2z"}],["path",{d:"M20.054 15.987H3.946"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ME=[["path",{d:"M7 22a5 5 0 0 1-2-4"}],["path",{d:"M7 16.93c.96.43 1.96.74 2.99.91"}],["path",{d:"M3.34 14A6.8 6.8 0 0 1 2 10c0-4.42 4.48-8 10-8s10 3.58 10 8a7.19 7.19 0 0 1-.33 2"}],["path",{d:"M5 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"}],["path",{d:"M14.33 22h-.09a.35.35 0 0 1-.24-.32v-10a.34.34 0 0 1 .33-.34c.08 0 .15.03.21.08l7.34 6a.33.33 0 0 1-.21.59h-4.49l-2.57 3.85a.35.35 0 0 1-.28.14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mE=[["path",{d:"M7 22a5 5 0 0 1-2-4"}],["path",{d:"M3.3 14A6.8 6.8 0 0 1 2 10c0-4.4 4.5-8 10-8s10 3.6 10 8-4.5 8-10 8a12 12 0 0 1-5-1"}],["path",{d:"M5 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vE=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M18 13a6 6 0 0 1-6 5 6 6 0 0 1-6-5h12Z"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gE=[["path",{d:"M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74z"}],["path",{d:"m20 14.285 1.5.845a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74l1.5-.845"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zs=[["path",{d:"M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"}],["path",{d:"M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"}],["path",{d:"M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yE=[["rect",{width:"7",height:"9",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"5",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"9",x:"14",y:"12",rx:"1"}],["rect",{width:"7",height:"5",x:"3",y:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xE=[["rect",{width:"7",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wE=[["rect",{width:"7",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}],["path",{d:"M14 4h7"}],["path",{d:"M14 9h7"}],["path",{d:"M14 15h7"}],["path",{d:"M14 20h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bE=[["rect",{width:"7",height:"18",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EE=[["rect",{width:"18",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"9",height:"7",x:"3",y:"14",rx:"1"}],["rect",{width:"5",height:"7",x:"16",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SE=[["rect",{width:"18",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CE=[["path",{d:"M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"}],["path",{d:"M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AE=[["path",{d:"M2 22c1.25-.987 2.27-1.975 3.9-2.2a5.56 5.56 0 0 1 3.8 1.5 4 4 0 0 0 6.187-2.353 3.5 3.5 0 0 0 3.69-5.116A3.5 3.5 0 0 0 20.95 8 3.5 3.5 0 1 0 16 3.05a3.5 3.5 0 0 0-5.831 1.373 3.5 3.5 0 0 0-5.116 3.69 4 4 0 0 0-2.348 6.155C3.499 15.42 4.409 16.712 4.2 18.1 3.926 19.743 3.014 20.732 2 22"}],["path",{d:"M2 22 17 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TE=[["path",{d:"M16 12h3a2 2 0 0 0 1.902-1.38l1.056-3.333A1 1 0 0 0 21 6H3a1 1 0 0 0-.958 1.287l1.056 3.334A2 2 0 0 0 5 12h3"}],["path",{d:"M18 6V3a1 1 0 0 0-1-1h-3"}],["rect",{width:"8",height:"12",x:"8",y:"10",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _E=[["path",{d:"M15 12h6"}],["path",{d:"M15 6h6"}],["path",{d:"m3 13 3.553-7.724a.5.5 0 0 1 .894 0L11 13"}],["path",{d:"M3 18h18"}],["path",{d:"M3.92 11h6.16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HE=[["rect",{width:"8",height:"18",x:"3",y:"3",rx:"1"}],["path",{d:"M7 3v18"}],["path",{d:"M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LE=[["path",{d:"m16 6 4 14"}],["path",{d:"M12 6v14"}],["path",{d:"M8 8v12"}],["path",{d:"M4 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VE=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m4.93 4.93 4.24 4.24"}],["path",{d:"m14.83 9.17 4.24-4.24"}],["path",{d:"m14.83 14.83 4.24 4.24"}],["path",{d:"m9.17 14.83-4.24 4.24"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PE=[["path",{d:"M14 12h2v8"}],["path",{d:"M14 20h4"}],["path",{d:"M6 12h4"}],["path",{d:"M6 20h4"}],["path",{d:"M8 20V8a4 4 0 0 1 7.464-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DE=[["path",{d:"M16.8 11.2c.8-.9 1.2-2 1.2-3.2a6 6 0 0 0-9.3-5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M6.3 6.3a4.67 4.67 0 0 0 1.2 5.2c.7.7 1.3 1.5 1.5 2.5"}],["path",{d:"M9 18h6"}],["path",{d:"M10 22h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OE=[["path",{d:"M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"}],["path",{d:"M9 18h6"}],["path",{d:"M10 22h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kE=[["path",{d:"M7 3.5c5-2 7 2.5 3 4C1.5 10 2 15 5 16c5 2 9-10 14-7s.5 13.5-4 12c-5-2.5.5-11 6-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IE=[["path",{d:"M9 17H7A5 5 0 0 1 7 7"}],["path",{d:"M15 7h2a5 5 0 0 1 4 8"}],["line",{x1:"8",x2:"12",y1:"12",y2:"12"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NE=[["path",{d:"M9 17H7A5 5 0 0 1 7 7h2"}],["path",{d:"M15 7h2a5 5 0 1 1 0 10h-2"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zE=[["path",{d:"M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"}],["path",{d:"M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $E=[["path",{d:"M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"}],["rect",{width:"4",height:"12",x:"2",y:"9"}],["circle",{cx:"4",cy:"4",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RE=[["path",{d:"M11 18H3"}],["path",{d:"m15 18 2 2 4-4"}],["path",{d:"M16 12H3"}],["path",{d:"M16 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BE=[["path",{d:"m3 17 2 2 4-4"}],["path",{d:"m3 7 2 2 4-4"}],["path",{d:"M13 6h8"}],["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FE=[["path",{d:"M10 12h11"}],["path",{d:"M10 18h11"}],["path",{d:"M10 6h11"}],["path",{d:"m3 10 3-3-3-3"}],["path",{d:"m3 20 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qE=[["path",{d:"M16 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M10 18H3"}],["path",{d:"M21 6v10a2 2 0 0 1-2 2h-5"}],["path",{d:"m16 16-2 2 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WE=[["path",{d:"M10 18h4"}],["path",{d:"M11 6H3"}],["path",{d:"M15 6h6"}],["path",{d:"M18 9V3"}],["path",{d:"M7 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jE=[["path",{d:"M3 6h18"}],["path",{d:"M7 12h10"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GE=[["path",{d:"M21 15V6"}],["path",{d:"M18.5 18a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"}],["path",{d:"M12 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M12 18H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZE=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"M21 12h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XE=[["path",{d:"M10 12h11"}],["path",{d:"M10 18h11"}],["path",{d:"M10 6h11"}],["path",{d:"M4 10h2"}],["path",{d:"M4 6h1v4"}],["path",{d:"M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UE=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"M18 9v6"}],["path",{d:"M21 12h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YE=[["path",{d:"M21 6H3"}],["path",{d:"M7 12H3"}],["path",{d:"M7 18H3"}],["path",{d:"M12 18a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L11 14"}],["path",{d:"M11 10v4h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KE=[["path",{d:"M16 12H3"}],["path",{d:"M16 18H3"}],["path",{d:"M10 6H3"}],["path",{d:"M21 18V8a2 2 0 0 0-2-2h-5"}],["path",{d:"m16 8-2-2 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QE=[["path",{d:"M12 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M12 18H3"}],["path",{d:"m16 12 5 3-5 3v-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JE=[["rect",{x:"3",y:"5",width:"6",height:"6",rx:"1"}],["path",{d:"m3 17 2 2 4-4"}],["path",{d:"M13 6h8"}],["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tS=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"m19 10-4 4"}],["path",{d:"m15 10 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eS=[["path",{d:"M21 12h-8"}],["path",{d:"M21 6H8"}],["path",{d:"M21 18h-8"}],["path",{d:"M3 6v4c0 1.1.9 2 2 2h3"}],["path",{d:"M3 10v6c0 1.1.9 2 2 2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aS=[["path",{d:"M3 12h.01"}],["path",{d:"M3 18h.01"}],["path",{d:"M3 6h.01"}],["path",{d:"M8 12h13"}],["path",{d:"M8 18h13"}],["path",{d:"M8 6h13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $s=[["path",{d:"M21 12a9 9 0 1 1-6.219-8.56"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iS=[["path",{d:"M22 12a1 1 0 0 1-10 0 1 1 0 0 0-10 0"}],["path",{d:"M7 20.7a1 1 0 1 1 5-8.7 1 1 0 1 0 5-8.6"}],["path",{d:"M7 3.3a1 1 0 1 1 5 8.6 1 1 0 1 0 5 8.6"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nS=[["path",{d:"M12 2v4"}],["path",{d:"m16.2 7.8 2.9-2.9"}],["path",{d:"M18 12h4"}],["path",{d:"m16.2 16.2 2.9 2.9"}],["path",{d:"M12 18v4"}],["path",{d:"m4.9 19.1 2.9-2.9"}],["path",{d:"M2 12h4"}],["path",{d:"m4.9 4.9 2.9 2.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rS=[["line",{x1:"2",x2:"5",y1:"12",y2:"12"}],["line",{x1:"19",x2:"22",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"2",y2:"5"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}],["circle",{cx:"12",cy:"12",r:"7"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sS=[["path",{d:"M12 19v3"}],["path",{d:"M12 2v3"}],["path",{d:"M18.89 13.24a7 7 0 0 0-8.13-8.13"}],["path",{d:"M19 12h3"}],["path",{d:"M2 12h3"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7.05 7.05a7 7 0 0 0 9.9 9.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oS=[["path",{d:"M17.97 9.304A8 8 0 0 0 2 10c0 4.69 4.887 9.562 7.022 11.468"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lS=[["line",{x1:"2",x2:"5",y1:"12",y2:"12"}],["line",{x1:"19",x2:"22",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"2",y2:"5"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}],["circle",{cx:"12",cy:"12",r:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rs=[["circle",{cx:"12",cy:"16",r:"1"}],["rect",{width:"18",height:"12",x:"3",y:"10",rx:"2"}],["path",{d:"M7 10V7a5 5 0 0 1 9.33-2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hS=[["circle",{cx:"12",cy:"16",r:"1"}],["rect",{x:"3",y:"10",width:"18",height:"12",rx:"2"}],["path",{d:"M7 10V7a5 5 0 0 1 10 0v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bs=[["rect",{width:"18",height:"11",x:"3",y:"11",rx:"2",ry:"2"}],["path",{d:"M7 11V7a5 5 0 0 1 9.9-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dS=[["rect",{width:"18",height:"11",x:"3",y:"11",rx:"2",ry:"2"}],["path",{d:"M7 11V7a5 5 0 0 1 10 0v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cS=[["path",{d:"m10 17 5-5-5-5"}],["path",{d:"M15 12H3"}],["path",{d:"M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pS=[["path",{d:"m16 17 5-5-5-5"}],["path",{d:"M21 12H9"}],["path",{d:"M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uS=[["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}],["path",{d:"M13 6h8"}],["path",{d:"M3 12h1"}],["path",{d:"M3 18h1"}],["path",{d:"M3 6h1"}],["path",{d:"M8 12h1"}],["path",{d:"M8 18h1"}],["path",{d:"M8 6h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fS=[["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}],["path",{d:"M11 11a2 2 0 0 0 4 0 4 4 0 0 0-8 0 6 6 0 0 0 12 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MS=[["path",{d:"M6 20a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"}],["path",{d:"M8 18V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v14"}],["path",{d:"M10 20h4"}],["circle",{cx:"16",cy:"20",r:"2"}],["circle",{cx:"8",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mS=[["path",{d:"m6 15-4-4 6.75-6.77a7.79 7.79 0 0 1 11 11L13 22l-4-4 6.39-6.36a2.14 2.14 0 0 0-3-3L6 15"}],["path",{d:"m5 8 4 4"}],["path",{d:"m12 15 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vS=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gS=[["path",{d:"M22 15V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M16 19h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yS=[["path",{d:"M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"}],["path",{d:"m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xS=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M19 16v6"}],["path",{d:"M16 19h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fs=[["path",{d:"M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M18 15.28c.2-.4.5-.8.9-1a2.1 2.1 0 0 1 2.6.4c.3.4.5.8.5 1.3 0 1.3-2 2-2 2"}],["path",{d:"M20 22v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wS=[["path",{d:"M22 12.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h7.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M18 21a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"}],["circle",{cx:"18",cy:"18",r:"3"}],["path",{d:"m22 22-1.5-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bS=[["path",{d:"M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M20 14v4"}],["path",{d:"M20 22v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ES=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h9"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"m17 17 4 4"}],["path",{d:"m21 17-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SS=[["path",{d:"m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"}],["rect",{x:"2",y:"4",width:"20",height:"16",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CS=[["path",{d:"M22 17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5C2 7 4 5 6.5 5H18c2.2 0 4 1.8 4 4v8Z"}],["polyline",{points:"15,9 18,9 18,11"}],["path",{d:"M6.5 5C9 5 11 7 11 9.5V17a2 2 0 0 1-2 2"}],["line",{x1:"6",x2:"7",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AS=[["rect",{width:"16",height:"13",x:"6",y:"4",rx:"2"}],["path",{d:"m22 7-7.1 3.78c-.57.3-1.23.3-1.8 0L6 7"}],["path",{d:"M2 8v11c0 1.1.9 2 2 2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TS=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"m9 10 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _S=[["path",{d:"M19.43 12.935c.357-.967.57-1.955.57-2.935a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32.197 32.197 0 0 0 .813-.728"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"m16 18 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HS=[["path",{d:"M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z"}],["path",{d:"M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2"}],["path",{d:"M18 22v-3"}],["circle",{cx:"10",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LS=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VS=[["path",{d:"M18.977 14C19.6 12.701 20 11.343 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M16 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PS=[["path",{d:"M12.75 7.09a3 3 0 0 1 2.16 2.16"}],["path",{d:"M17.072 17.072c-1.634 2.17-3.527 3.912-4.471 4.727a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 1.432-4.568"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.475 2.818A8 8 0 0 1 20 10c0 1.183-.31 2.377-.81 3.533"}],["path",{d:"M9.13 9.13a3 3 0 0 0 3.74 3.74"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DS=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"M12 7v6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OS=[["path",{d:"M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M16 18h6"}],["path",{d:"M19 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kS=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IS=[["path",{d:"M19.752 11.901A7.78 7.78 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 19 19 0 0 0 .09-.077"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"m21.5 15.5-5 5"}],["path",{d:"m21.5 20.5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NS=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["circle",{cx:"12",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zS=[["path",{d:"M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0"}],["circle",{cx:"12",cy:"8",r:"2"}],["path",{d:"M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $S=[["path",{d:"m11 19-1.106-.552a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0l4.212 2.106a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619V12"}],["path",{d:"M15 5.764V12"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}],["path",{d:"M9 3.236v15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RS=[["path",{d:"M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"}],["path",{d:"M15 5.764v15"}],["path",{d:"M9 3.236v15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BS=[["path",{d:"m14 6 4 4"}],["path",{d:"M17 3h4v4"}],["path",{d:"m21 3-7.75 7.75"}],["circle",{cx:"9",cy:"15",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FS=[["path",{d:"M16 3h5v5"}],["path",{d:"m21 3-6.75 6.75"}],["circle",{cx:"10",cy:"14",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qS=[["path",{d:"M8 22h8"}],["path",{d:"M12 11v11"}],["path",{d:"m19 3-7 8-7-8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WS=[["path",{d:"M15 3h6v6"}],["path",{d:"m21 3-7 7"}],["path",{d:"m3 21 7-7"}],["path",{d:"M9 21H3v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jS=[["path",{d:"M8 3H5a2 2 0 0 0-2 2v3"}],["path",{d:"M21 8V5a2 2 0 0 0-2-2h-3"}],["path",{d:"M3 16v3a2 2 0 0 0 2 2h3"}],["path",{d:"M16 21h3a2 2 0 0 0 2-2v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GS=[["path",{d:"M7.21 15 2.66 7.14a2 2 0 0 1 .13-2.2L4.4 2.8A2 2 0 0 1 6 2h12a2 2 0 0 1 1.6.8l1.6 2.14a2 2 0 0 1 .14 2.2L16.79 15"}],["path",{d:"M11 12 5.12 2.2"}],["path",{d:"m13 12 5.88-9.8"}],["path",{d:"M8 7h8"}],["circle",{cx:"12",cy:"17",r:"5"}],["path",{d:"M12 18v-2h-.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZS=[["path",{d:"M11.636 6A13 13 0 0 0 19.4 3.2 1 1 0 0 1 21 4v11.344"}],["path",{d:"M14.378 14.357A13 13 0 0 0 11 14H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1"}],["path",{d:"m2 2 20 20"}],["path",{d:"M6 14a12 12 0 0 0 2.4 7.2 2 2 0 0 0 3.2-2.4A8 8 0 0 1 10 14"}],["path",{d:"M8 8v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XS=[["path",{d:"M11 6a13 13 0 0 0 8.4-2.8A1 1 0 0 1 21 4v12a1 1 0 0 1-1.6.8A13 13 0 0 0 11 14H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"}],["path",{d:"M6 14a12 12 0 0 0 2.4 7.2 2 2 0 0 0 3.2-2.4A8 8 0 0 1 10 14"}],["path",{d:"M8 6v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const US=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"8",x2:"16",y1:"15",y2:"15"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YS=[["path",{d:"M6 19v-3"}],["path",{d:"M10 19v-3"}],["path",{d:"M14 19v-3"}],["path",{d:"M18 19v-3"}],["path",{d:"M8 11V9"}],["path",{d:"M16 11V9"}],["path",{d:"M12 11V9"}],["path",{d:"M2 15h20"}],["path",{d:"M2 7a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1.1a2 2 0 0 0 0 3.837V17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5.1a2 2 0 0 0 0-3.837Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KS=[["path",{d:"M4 12h16"}],["path",{d:"M4 18h16"}],["path",{d:"M4 6h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QS=[["path",{d:"m8 6 4-4 4 4"}],["path",{d:"M12 2v10.3a4 4 0 0 1-1.172 2.872L4 22"}],["path",{d:"m20 22-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JS=[["path",{d:"M10 9.5 8 12l2 2.5"}],["path",{d:"m14 9.5 2 2.5-2 2.5"}],["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tC=[["path",{d:"M13.5 3.1c-.5 0-1-.1-1.5-.1s-1 .1-1.5.1"}],["path",{d:"M19.3 6.8a10.45 10.45 0 0 0-2.1-2.1"}],["path",{d:"M20.9 13.5c.1-.5.1-1 .1-1.5s-.1-1-.1-1.5"}],["path",{d:"M17.2 19.3a10.45 10.45 0 0 0 2.1-2.1"}],["path",{d:"M10.5 20.9c.5.1 1 .1 1.5.1s1-.1 1.5-.1"}],["path",{d:"M3.5 17.5 2 22l4.5-1.5"}],["path",{d:"M3.1 10.5c0 .5-.1 1-.1 1.5s.1 1 .1 1.5"}],["path",{d:"M6.8 4.7a10.45 10.45 0 0 0-2.1 2.1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M15.8 9.2a2.5 2.5 0 0 0-3.5 0l-.3.4-.35-.3a2.42 2.42 0 1 0-3.2 3.6l3.6 3.5 3.6-3.5c1.2-1.2 1.1-2.7.2-3.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M8 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nC=[["path",{d:"M20.5 14.9A9 9 0 0 0 9.1 3.5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M5.6 5.6C3 8.3 2.2 12.5 4 16l-2 6 6-2c3.4 1.8 7.6 1.1 10.3-1.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qs=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"m10 15-3-3 3-3"}],["path",{d:"M7 12h7a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M12 8v4"}],["path",{d:"M12 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lC=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hC=[["path",{d:"M10 7.5 8 10l2 2.5"}],["path",{d:"m14 7.5 2 2.5-2 2.5"}],["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dC=[["path",{d:"M10 17H7l-4 4v-7"}],["path",{d:"M14 17h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 14v1a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 9v1"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M9 3h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cC=[["path",{d:"m5 19-2 2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"}],["path",{d:"M9 10h6"}],["path",{d:"M12 7v6"}],["path",{d:"M9 17h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pC=[["path",{d:"M11.7 3H5a2 2 0 0 0-2 2v16l4-4h12a2 2 0 0 0 2-2v-2.7"}],["circle",{cx:"18",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M14.8 7.5a1.84 1.84 0 0 0-2.6 0l-.2.3-.3-.3a1.84 1.84 0 1 0-2.4 2.8L12 13l2.7-2.7c.9-.9.8-2.1.1-2.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fC=[["path",{d:"M19 15v-2a2 2 0 1 0-4 0v2"}],["path",{d:"M9 17H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v3.5"}],["rect",{x:"13",y:"15",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M8 10h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M16 10h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mC=[["path",{d:"M21 15V5a2 2 0 0 0-2-2H9"}],["path",{d:"m2 2 20 20"}],["path",{d:"M3.6 3.6c-.4.3-.6.8-.6 1.4v16l4-4h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M12 7v6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M8 12a2 2 0 0 0 2-2V8H8"}],["path",{d:"M14 12a2 2 0 0 0 2-2V8h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"m10 7-3 3 3 3"}],["path",{d:"M17 13v-1a2 2 0 0 0-2-2H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xC=[["path",{d:"M21 12v3a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h7"}],["path",{d:"M16 3h5v5"}],["path",{d:"m16 8 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M13 8H7"}],["path",{d:"M17 12H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M12 7v2"}],["path",{d:"M12 13h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SC=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CC=[["path",{d:"M14 9a2 2 0 0 1-2 2H6l-4 4V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2z"}],["path",{d:"M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AC=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M18.89 13.23A7.12 7.12 0 0 0 19 12v-2"}],["path",{d:"M5 10v2a7 7 0 0 0 12 5"}],["path",{d:"M15 9.34V5a3 3 0 0 0-5.68-1.33"}],["path",{d:"M9 9v3a3 3 0 0 0 5.12 2.12"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ws=[["path",{d:"m11 7.601-5.994 8.19a1 1 0 0 0 .1 1.298l.817.818a1 1 0 0 0 1.314.087L15.09 12"}],["path",{d:"M16.5 21.174C15.5 20.5 14.372 20 13 20c-2.058 0-3.928 2.356-6 2-2.072-.356-2.775-3.369-1.5-4.5"}],["circle",{cx:"16",cy:"7",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TC=[["path",{d:"M12 19v3"}],["path",{d:"M19 10v2a7 7 0 0 1-14 0v-2"}],["rect",{x:"9",y:"2",width:"6",height:"13",rx:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _C=[["path",{d:"M18 12h2"}],["path",{d:"M18 16h2"}],["path",{d:"M18 20h2"}],["path",{d:"M18 4h2"}],["path",{d:"M18 8h2"}],["path",{d:"M4 12h2"}],["path",{d:"M4 16h2"}],["path",{d:"M4 20h2"}],["path",{d:"M4 4h2"}],["path",{d:"M4 8h2"}],["path",{d:"M8 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-1.5c-.276 0-.494.227-.562.495a2 2 0 0 1-3.876 0C9.994 2.227 9.776 2 9.5 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HC=[["path",{d:"M6 18h8"}],["path",{d:"M3 22h18"}],["path",{d:"M14 22a7 7 0 1 0 0-14h-1"}],["path",{d:"M9 14h2"}],["path",{d:"M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"}],["path",{d:"M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LC=[["rect",{width:"20",height:"15",x:"2",y:"4",rx:"2"}],["rect",{width:"8",height:"7",x:"6",y:"8",rx:"1"}],["path",{d:"M18 8v7"}],["path",{d:"M6 19v2"}],["path",{d:"M18 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VC=[["path",{d:"M12 13v8"}],["path",{d:"M12 3v3"}],["path",{d:"M4 6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h13a2 2 0 0 0 1.152-.365l3.424-2.317a1 1 0 0 0 0-1.635l-3.424-2.318A2 2 0 0 0 17 6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PC=[["path",{d:"M8 2h8"}],["path",{d:"M9 2v1.343M15 2v2.789a4 4 0 0 0 .672 2.219l.656.984a4 4 0 0 1 .672 2.22v1.131M7.8 7.8l-.128.192A4 4 0 0 0 7 10.212V20a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3"}],["path",{d:"M7 15a6.47 6.47 0 0 1 5 0 6.472 6.472 0 0 0 3.435.435"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DC=[["path",{d:"M8 2h8"}],["path",{d:"M9 2v2.789a4 4 0 0 1-.672 2.219l-.656.984A4 4 0 0 0 7 10.212V20a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-9.789a4 4 0 0 0-.672-2.219l-.656-.984A4 4 0 0 1 15 4.788V2"}],["path",{d:"M7 15a6.472 6.472 0 0 1 5 0 6.47 6.47 0 0 0 5 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OC=[["path",{d:"m14 10 7-7"}],["path",{d:"M20 10h-6V4"}],["path",{d:"m3 21 7-7"}],["path",{d:"M4 14h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kC=[["path",{d:"M8 3v3a2 2 0 0 1-2 2H3"}],["path",{d:"M21 8h-3a2 2 0 0 1-2-2V3"}],["path",{d:"M3 16h3a2 2 0 0 1 2 2v3"}],["path",{d:"M16 21v-3a2 2 0 0 1 2-2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IC=[["path",{d:"M5 12h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NC=[["path",{d:"m9 10 2 2 4-4"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zC=[["path",{d:"M12 17v4"}],["path",{d:"m14.305 7.53.923-.382"}],["path",{d:"m15.228 4.852-.923-.383"}],["path",{d:"m16.852 3.228-.383-.924"}],["path",{d:"m16.852 8.772-.383.923"}],["path",{d:"m19.148 3.228.383-.924"}],["path",{d:"m19.53 9.696-.382-.924"}],["path",{d:"m20.772 4.852.924-.383"}],["path",{d:"m20.772 7.148.924.383"}],["path",{d:"M22 13v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"}],["path",{d:"M8 21h8"}],["circle",{cx:"18",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $C=[["circle",{cx:"19",cy:"6",r:"3"}],["path",{d:"M22 12v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RC=[["path",{d:"M12 13V7"}],["path",{d:"m15 10-3 3-3-3"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BC=[["path",{d:"M17 17H4a2 2 0 0 1-2-2V5c0-1.5 1-2 1-2"}],["path",{d:"M22 15V5a2 2 0 0 0-2-2H9"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FC=[["path",{d:"M10 13V7"}],["path",{d:"M14 13V7"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qC=[["path",{d:"M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}],["rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WC=[["path",{d:"M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8"}],["path",{d:"M10 19v-3.96 3.15"}],["path",{d:"M7 19h5"}],["rect",{width:"6",height:"10",x:"16",y:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jC=[["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}],["rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}],["rect",{x:"9",y:"7",width:"6",height:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GC=[["path",{d:"m9 10 3-3 3 3"}],["path",{d:"M12 13V7"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZC=[["path",{d:"M5.5 20H8"}],["path",{d:"M17 9h.01"}],["rect",{width:"10",height:"16",x:"12",y:"4",rx:"2"}],["path",{d:"M8 6H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4"}],["circle",{cx:"17",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XC=[["path",{d:"m14.5 12.5-5-5"}],["path",{d:"m9.5 12.5 5-5"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UC=[["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["line",{x1:"8",x2:"16",y1:"21",y2:"21"}],["line",{x1:"12",x2:"12",y1:"17",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YC=[["path",{d:"M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9"}],["path",{d:"M20 3v4"}],["path",{d:"M22 5h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KC=[["path",{d:"M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QC=[["path",{d:"m8 3 4 8 5-5 5 15H2L8 3z"}],["path",{d:"M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JC=[["path",{d:"M12 6v.343"}],["path",{d:"M18.218 18.218A7 7 0 0 1 5 15V9a7 7 0 0 1 .782-3.218"}],["path",{d:"M19 13.343V9A7 7 0 0 0 8.56 2.902"}],["path",{d:"M22 22 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tA=[["path",{d:"m8 3 4 8 5-5 5 15H2L8 3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eA=[["path",{d:"M4.037 4.688a.495.495 0 0 1 .651-.651l16 6.5a.5.5 0 0 1-.063.947l-6.124 1.58a2 2 0 0 0-1.438 1.435l-1.579 6.126a.5.5 0 0 1-.947.063z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aA=[["path",{d:"M2.034 2.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.944L8.204 7.545a1 1 0 0 0-.66.66l-1.066 3.443a.5.5 0 0 1-.944.033z"}],["circle",{cx:"16",cy:"16",r:"6"}],["path",{d:"m11.8 11.8 8.4 8.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iA=[["path",{d:"M14 4.1 12 6"}],["path",{d:"m5.1 8-2.9-.8"}],["path",{d:"m6 12-1.9 2"}],["path",{d:"M7.2 2.2 8 5.1"}],["path",{d:"M9.037 9.69a.498.498 0 0 1 .653-.653l11 4.5a.5.5 0 0 1-.074.949l-4.349 1.041a1 1 0 0 0-.74.739l-1.04 4.35a.5.5 0 0 1-.95.074z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nA=[["rect",{x:"5",y:"2",width:"14",height:"20",rx:"7"}],["path",{d:"M12 6v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rA=[["path",{d:"M12.586 12.586 19 19"}],["path",{d:"M3.688 3.037a.497.497 0 0 0-.651.651l6.5 15.999a.501.501 0 0 0 .947-.062l1.569-6.083a2 2 0 0 1 1.448-1.479l6.124-1.579a.5.5 0 0 0 .063-.947z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const js=[["path",{d:"M5 3v16h16"}],["path",{d:"m5 19 6-6"}],["path",{d:"m2 6 3-3 3 3"}],["path",{d:"m18 16 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sA=[["path",{d:"M19 13v6h-6"}],["path",{d:"M5 11V5h6"}],["path",{d:"m5 5 14 14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oA=[["path",{d:"M11 19H5v-6"}],["path",{d:"M13 5h6v6"}],["path",{d:"M19 5 5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lA=[["path",{d:"M11 19H5V13"}],["path",{d:"M19 5L5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hA=[["path",{d:"M19 13V19H13"}],["path",{d:"M5 5L19 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dA=[["path",{d:"M8 18L12 22L16 18"}],["path",{d:"M12 2V22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cA=[["path",{d:"m18 8 4 4-4 4"}],["path",{d:"M2 12h20"}],["path",{d:"m6 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pA=[["path",{d:"M6 8L2 12L6 16"}],["path",{d:"M2 12H22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uA=[["path",{d:"M18 8L22 12L18 16"}],["path",{d:"M2 12H22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fA=[["path",{d:"M5 11V5H11"}],["path",{d:"M5 5L19 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MA=[["path",{d:"M13 5H19V11"}],["path",{d:"M19 5L5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mA=[["path",{d:"M8 6L12 2L16 6"}],["path",{d:"M12 2V22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vA=[["path",{d:"M12 2v20"}],["path",{d:"m8 18 4 4 4-4"}],["path",{d:"m8 6 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gA=[["path",{d:"M12 2v20"}],["path",{d:"m15 19-3 3-3-3"}],["path",{d:"m19 9 3 3-3 3"}],["path",{d:"M2 12h20"}],["path",{d:"m5 9-3 3 3 3"}],["path",{d:"m9 5 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yA=[["circle",{cx:"8",cy:"18",r:"4"}],["path",{d:"M12 18V2l7 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xA=[["circle",{cx:"12",cy:"18",r:"4"}],["path",{d:"M16 18V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wA=[["path",{d:"M9 18V5l12-2v13"}],["path",{d:"m9 9 12-2"}],["circle",{cx:"6",cy:"18",r:"3"}],["circle",{cx:"18",cy:"16",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bA=[["path",{d:"M9 18V5l12-2v13"}],["circle",{cx:"6",cy:"18",r:"3"}],["circle",{cx:"18",cy:"16",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EA=[["path",{d:"M9.31 9.31 5 21l7-4 7 4-1.17-3.17"}],["path",{d:"M14.53 8.88 12 2l-1.17 3.17"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SA=[["polygon",{points:"12 2 19 21 12 17 5 21 12 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CA=[["path",{d:"M8.43 8.43 3 11l8 2 2 8 2.57-5.43"}],["path",{d:"M17.39 11.73 22 2l-9.73 4.61"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AA=[["polygon",{points:"3 11 22 2 13 21 11 13 3 11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TA=[["rect",{x:"16",y:"16",width:"6",height:"6",rx:"1"}],["rect",{x:"2",y:"16",width:"6",height:"6",rx:"1"}],["rect",{x:"9",y:"2",width:"6",height:"6",rx:"1"}],["path",{d:"M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"}],["path",{d:"M12 12V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _A=[["path",{d:"M15 18h-5"}],["path",{d:"M18 14h-8"}],["path",{d:"M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2"}],["rect",{width:"8",height:"4",x:"10",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HA=[["path",{d:"M6 8.32a7.43 7.43 0 0 1 0 7.36"}],["path",{d:"M9.46 6.21a11.76 11.76 0 0 1 0 11.58"}],["path",{d:"M12.91 4.1a15.91 15.91 0 0 1 .01 15.8"}],["path",{d:"M16.37 2a20.16 20.16 0 0 1 0 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LA=[["path",{d:"M12 2v10"}],["path",{d:"m8.5 4 7 4"}],["path",{d:"m8.5 8 7-4"}],["circle",{cx:"12",cy:"17",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VA=[["path",{d:"M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"}],["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["path",{d:"M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PA=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M9.5 8h5"}],["path",{d:"M9.5 12H16"}],["path",{d:"M9.5 16H14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DA=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M15 2v20"}],["path",{d:"M15 7h5"}],["path",{d:"M15 12h5"}],["path",{d:"M15 17h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OA=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M16 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kA=[["path",{d:"M8 2v4"}],["path",{d:"M12 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v2"}],["path",{d:"M20 12v2"}],["path",{d:"M20 18v2a2 2 0 0 1-2 2h-1"}],["path",{d:"M13 22h-2"}],["path",{d:"M7 22H6a2 2 0 0 1-2-2v-2"}],["path",{d:"M4 14v-2"}],["path",{d:"M4 8V6a2 2 0 0 1 2-2h2"}],["path",{d:"M8 10h6"}],["path",{d:"M8 14h8"}],["path",{d:"M8 18h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IA=[["path",{d:"M8 2v4"}],["path",{d:"M12 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"16",height:"18",x:"4",y:"4",rx:"2"}],["path",{d:"M8 10h6"}],["path",{d:"M8 14h8"}],["path",{d:"M8 18h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NA=[["path",{d:"M12 4V2"}],["path",{d:"M5 10v4a7.004 7.004 0 0 0 5.277 6.787c.412.104.802.292 1.102.592L12 22l.621-.621c.3-.3.69-.488 1.102-.592a7.01 7.01 0 0 0 4.125-2.939"}],["path",{d:"M19 10v3.343"}],["path",{d:"M12 12c-1.349-.573-1.905-1.005-2.5-2-.546.902-1.048 1.353-2.5 2-1.018-.644-1.46-1.08-2-2-1.028.71-1.69.918-3 1 1.081-1.048 1.757-2.03 2-3 .194-.776.84-1.551 1.79-2.21m11.654 5.997c.887-.457 1.28-.891 1.556-1.787 1.032.916 1.683 1.157 3 1-1.297-1.036-1.758-2.03-2-3-.5-2-4-4-8-4-.74 0-1.461.068-2.15.192"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zA=[["path",{d:"M12 4V2"}],["path",{d:"M5 10v4a7.004 7.004 0 0 0 5.277 6.787c.412.104.802.292 1.102.592L12 22l.621-.621c.3-.3.69-.488 1.102-.592A7.003 7.003 0 0 0 19 14v-4"}],["path",{d:"M12 4C8 4 4.5 6 4 8c-.243.97-.919 1.952-2 3 1.31-.082 1.972-.29 3-1 .54.92.982 1.356 2 2 1.452-.647 1.954-1.098 2.5-2 .595.995 1.151 1.427 2.5 2 1.31-.621 1.862-1.058 2.5-2 .629.977 1.162 1.423 2.5 2 1.209-.548 1.68-.967 2-2 1.032.916 1.683 1.157 3 1-1.297-1.036-1.758-2.03-2-3-.5-2-4-4-8-4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gs=[["path",{d:"M12 16h.01"}],["path",{d:"M12 8v4"}],["path",{d:"M15.312 2a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586l-4.688-4.688A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $A=[["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zs=[["path",{d:"M10 15V9"}],["path",{d:"M14 15V9"}],["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xs=[["path",{d:"m15 9-6 6"}],["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RA=[["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BA=[["path",{d:"M3 20h4.5a.5.5 0 0 0 .5-.5v-.282a.52.52 0 0 0-.247-.437 8 8 0 1 1 8.494-.001.52.52 0 0 0-.247.438v.282a.5.5 0 0 0 .5.5H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FA=[["path",{d:"M3 3h6l6 18h6"}],["path",{d:"M14 3h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qA=[["path",{d:"M20.341 6.484A10 10 0 0 1 10.266 21.85"}],["path",{d:"M3.659 17.516A10 10 0 0 1 13.74 2.152"}],["circle",{cx:"12",cy:"12",r:"3"}],["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WA=[["path",{d:"M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"}],["path",{d:"m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"}],["path",{d:"m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jA=[["path",{d:"M12 3v6"}],["path",{d:"M16.76 3a2 2 0 0 1 1.8 1.1l2.23 4.479a2 2 0 0 1 .21.891V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9.472a2 2 0 0 1 .211-.894L5.45 4.1A2 2 0 0 1 7.24 3z"}],["path",{d:"M3.054 9.013h17.893"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GA=[["path",{d:"m16 16 2 2 4-4"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZA=[["path",{d:"M16 16h6"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XA=[["path",{d:"M12 22v-9"}],["path",{d:"M15.17 2.21a1.67 1.67 0 0 1 1.63 0L21 4.57a1.93 1.93 0 0 1 0 3.36L8.82 14.79a1.655 1.655 0 0 1-1.64 0L3 12.43a1.93 1.93 0 0 1 0-3.36z"}],["path",{d:"M20 13v3.87a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13"}],["path",{d:"M21 12.43a1.93 1.93 0 0 0 0-3.36L8.83 2.2a1.64 1.64 0 0 0-1.63 0L3 4.57a1.93 1.93 0 0 0 0 3.36l12.18 6.86a1.636 1.636 0 0 0 1.63 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UA=[["path",{d:"M16 16h6"}],["path",{d:"M19 13v6"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YA=[["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}],["circle",{cx:"18.5",cy:"15.5",r:"2.5"}],["path",{d:"M20.27 17.27 22 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KA=[["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}],["path",{d:"m17 13 5 5m-5 0 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QA=[["path",{d:"M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"}],["path",{d:"M12 22V12"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["path",{d:"m7.5 4.27 9 5.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JA=[["path",{d:"m19 11-8-8-8.6 8.6a2 2 0 0 0 0 2.8l5.2 5.2c.8.8 2 .8 2.8 0L19 11Z"}],["path",{d:"m5 2 5 5"}],["path",{d:"M2 13h15"}],["path",{d:"M22 20a2 2 0 1 1-4 0c0-1.6 1.7-2.4 2-4 .3 1.6 2 2.4 2 4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tT=[["rect",{width:"16",height:"6",x:"2",y:"2",rx:"2"}],["path",{d:"M10 16v-2a2 2 0 0 1 2-2h8a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"}],["rect",{width:"4",height:"6",x:"8",y:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Us=[["path",{d:"M10 2v2"}],["path",{d:"M14 2v4"}],["path",{d:"M17 2a1 1 0 0 1 1 1v9H6V3a1 1 0 0 1 1-1z"}],["path",{d:"M6 12a1 1 0 0 0-1 1v1a2 2 0 0 0 2 2h2a1 1 0 0 1 1 1v2.9a2 2 0 1 0 4 0V17a1 1 0 0 1 1-1h2a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eT=[["path",{d:"m14.622 17.897-10.68-2.913"}],["path",{d:"M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"}],["path",{d:"M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aT=[["path",{d:"M11.25 17.25h1.5L12 18z"}],["path",{d:"m15 12 2 2"}],["path",{d:"M18 6.5a.5.5 0 0 0-.5-.5"}],["path",{d:"M20.69 9.67a4.5 4.5 0 1 0-7.04-5.5 8.35 8.35 0 0 0-3.3 0 4.5 4.5 0 1 0-7.04 5.5C2.49 11.2 2 12.88 2 14.5 2 19.47 6.48 22 12 22s10-2.53 10-7.5c0-1.62-.48-3.3-1.3-4.83"}],["path",{d:"M6 6.5a.495.495 0 0 1 .5-.5"}],["path",{d:"m9 12-2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iT=[["path",{d:"M12 22a1 1 0 0 1 0-20 10 9 0 0 1 10 9 5 5 0 0 1-5 5h-2.25a1.75 1.75 0 0 0-1.4 2.8l.3.4a1.75 1.75 0 0 1-1.4 2.8z"}],["circle",{cx:"13.5",cy:"6.5",r:".5",fill:"currentColor"}],["circle",{cx:"17.5",cy:"10.5",r:".5",fill:"currentColor"}],["circle",{cx:"6.5",cy:"12.5",r:".5",fill:"currentColor"}],["circle",{cx:"8.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}],["path",{d:"m15 8-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ys=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M14 15h1"}],["path",{d:"M19 15h2"}],["path",{d:"M3 15h2"}],["path",{d:"M9 15h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}],["path",{d:"m9 10 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ks=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"m16 15-3-3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 14v1"}],["path",{d:"M9 19v2"}],["path",{d:"M9 3v2"}],["path",{d:"M9 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Js=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"m14 9 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}],["path",{d:"m8 9 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 14v1"}],["path",{d:"M15 19v2"}],["path",{d:"M15 3v2"}],["path",{d:"M15 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}],["path",{d:"m10 15-3-3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"m9 16 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M14 9h1"}],["path",{d:"M19 9h2"}],["path",{d:"M3 9h2"}],["path",{d:"M9 9h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"m15 14-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"M9 15h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fT=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h12"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M9 21V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MT=[["path",{d:"m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mT=[["path",{d:"M8 21s-4-3-4-9 4-9 4-9"}],["path",{d:"M16 3s4 3 4 9-4 9-4 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vT=[["path",{d:"M11 15h2"}],["path",{d:"M12 12v3"}],["path",{d:"M12 19v3"}],["path",{d:"M15.282 19a1 1 0 0 0 .948-.68l2.37-6.988a7 7 0 1 0-13.2 0l2.37 6.988a1 1 0 0 0 .948.68z"}],["path",{d:"M9 9a3 3 0 1 1 6 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gT=[["path",{d:"M5.8 11.3 2 22l10.7-3.79"}],["path",{d:"M4 3h.01"}],["path",{d:"M22 8h.01"}],["path",{d:"M15 2h.01"}],["path",{d:"M22 20h.01"}],["path",{d:"m22 2-2.24.75a2.9 2.9 0 0 0-1.96 3.12c.1.86-.57 1.63-1.45 1.63h-.38c-.86 0-1.6.6-1.76 1.44L14 10"}],["path",{d:"m22 13-.82-.33c-.86-.34-1.82.2-1.98 1.11c-.11.7-.72 1.22-1.43 1.22H17"}],["path",{d:"m11 2 .33.82c.34.86-.2 1.82-1.11 1.98C9.52 4.9 9 5.52 9 6.23V7"}],["path",{d:"M11 13c1.93 1.93 2.83 4.17 2 5-.83.83-3.07-.07-5-2-1.93-1.93-2.83-4.17-2-5 .83-.83 3.07.07 5 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yT=[["rect",{x:"14",y:"4",width:"4",height:"16",rx:"1"}],["rect",{x:"6",y:"4",width:"4",height:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xT=[["circle",{cx:"11",cy:"4",r:"2"}],["circle",{cx:"18",cy:"8",r:"2"}],["circle",{cx:"20",cy:"16",r:"2"}],["path",{d:"M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wT=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2"}],["path",{d:"M15 14h.01"}],["path",{d:"M9 6h6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n0=[["path",{d:"M12 20h9"}],["path",{d:"M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bT=[["path",{d:"m10 10-6.157 6.162a2 2 0 0 0-.5.833l-1.322 4.36a.5.5 0 0 0 .622.624l4.358-1.323a2 2 0 0 0 .83-.5L14 13.982"}],["path",{d:"m12.829 7.172 4.359-4.346a1 1 0 1 1 3.986 3.986l-4.353 4.353"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ET=[["path",{d:"M15.707 21.293a1 1 0 0 1-1.414 0l-1.586-1.586a1 1 0 0 1 0-1.414l5.586-5.586a1 1 0 0 1 1.414 0l1.586 1.586a1 1 0 0 1 0 1.414z"}],["path",{d:"m18 13-1.375-6.874a1 1 0 0 0-.746-.776L3.235 2.028a1 1 0 0 0-1.207 1.207L5.35 15.879a1 1 0 0 0 .776.746L13 18"}],["path",{d:"m2.3 2.3 7.286 7.286"}],["circle",{cx:"11",cy:"11",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r0=[["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ST=[["path",{d:"M12 20h9"}],["path",{d:"M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"}],["path",{d:"m15 5 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CT=[["path",{d:"m10 10-6.157 6.162a2 2 0 0 0-.5.833l-1.322 4.36a.5.5 0 0 0 .622.624l4.358-1.323a2 2 0 0 0 .83-.5L14 13.982"}],["path",{d:"m12.829 7.172 4.359-4.346a1 1 0 1 1 3.986 3.986l-4.353 4.353"}],["path",{d:"m15 5 4 4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AT=[["path",{d:"M13 7 8.7 2.7a2.41 2.41 0 0 0-3.4 0L2.7 5.3a2.41 2.41 0 0 0 0 3.4L7 13"}],["path",{d:"m8 6 2-2"}],["path",{d:"m18 16 2-2"}],["path",{d:"m17 11 4.3 4.3c.94.94.94 2.46 0 3.4l-2.6 2.6c-.94.94-2.46.94-3.4 0L11 17"}],["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}],["path",{d:"m15 5 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TT=[["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}],["path",{d:"m15 5 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _T=[["path",{d:"M10.83 2.38a2 2 0 0 1 2.34 0l8 5.74a2 2 0 0 1 .73 2.25l-3.04 9.26a2 2 0 0 1-1.9 1.37H7.04a2 2 0 0 1-1.9-1.37L2.1 10.37a2 2 0 0 1 .73-2.25z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HT=[["line",{x1:"19",x2:"5",y1:"5",y2:"19"}],["circle",{cx:"6.5",cy:"6.5",r:"2.5"}],["circle",{cx:"17.5",cy:"17.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LT=[["circle",{cx:"12",cy:"5",r:"1"}],["path",{d:"m9 20 3-6 3 6"}],["path",{d:"m6 8 6 2 6-2"}],["path",{d:"M12 10v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VT=[["path",{d:"M20 11H4"}],["path",{d:"M20 7H4"}],["path",{d:"M7 21V4a1 1 0 0 1 1-1h4a1 1 0 0 1 0 12H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PT=[["path",{d:"M13 2a9 9 0 0 1 9 9"}],["path",{d:"M13 6a5 5 0 0 1 5 5"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DT=[["path",{d:"M14 6h8"}],["path",{d:"m18 2 4 4-4 4"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OT=[["path",{d:"M16 2v6h6"}],["path",{d:"m22 2-6 6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kT=[["path",{d:"m16 2 6 6"}],["path",{d:"m22 2-6 6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IT=[["path",{d:"M10.1 13.9a14 14 0 0 0 3.732 2.668 1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2 18 18 0 0 1-12.728-5.272"}],["path",{d:"M22 2 2 22"}],["path",{d:"M4.76 13.582A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 .244.473"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NT=[["path",{d:"m16 8 6-6"}],["path",{d:"M22 8V2h-6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zT=[["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $T=[["line",{x1:"9",x2:"9",y1:"4",y2:"20"}],["path",{d:"M4 7c0-1.7 1.3-3 3-3h13"}],["path",{d:"M18 20c-1.7 0-3-1.3-3-3V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RT=[["path",{d:"M18.5 8c-1.4 0-2.6-.8-3.2-2A6.87 6.87 0 0 0 2 9v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8.5C22 9.6 20.4 8 18.5 8"}],["path",{d:"M2 14h20"}],["path",{d:"M6 14v4"}],["path",{d:"M10 14v4"}],["path",{d:"M14 14v4"}],["path",{d:"M18 14v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BT=[["path",{d:"M14.531 12.469 6.619 20.38a1 1 0 1 1-3-3l7.912-7.912"}],["path",{d:"M15.686 4.314A12.5 12.5 0 0 0 5.461 2.958 1 1 0 0 0 5.58 4.71a22 22 0 0 1 6.318 3.393"}],["path",{d:"M17.7 3.7a1 1 0 0 0-1.4 0l-4.6 4.6a1 1 0 0 0 0 1.4l2.6 2.6a1 1 0 0 0 1.4 0l4.6-4.6a1 1 0 0 0 0-1.4z"}],["path",{d:"M19.686 8.314a12.501 12.501 0 0 1 1.356 10.225 1 1 0 0 1-1.751-.119 22 22 0 0 0-3.393-6.319"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FT=[["path",{d:"M21 9V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2h4"}],["rect",{width:"10",height:"7",x:"12",y:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qT=[["path",{d:"M2 10h6V4"}],["path",{d:"m2 4 6 6"}],["path",{d:"M21 10V7a2 2 0 0 0-2-2h-7"}],["path",{d:"M3 14v2a2 2 0 0 0 2 2h3"}],["rect",{x:"12",y:"14",width:"10",height:"7",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WT=[["path",{d:"M11 17h3v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3a3.16 3.16 0 0 0 2-2h1a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1a5 5 0 0 0-2-4V3a4 4 0 0 0-3.2 1.6l-.3.4H11a6 6 0 0 0-6 6v1a5 5 0 0 0 2 4v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1z"}],["path",{d:"M16 10h.01"}],["path",{d:"M2 8v1a2 2 0 0 0 2 2h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jT=[["path",{d:"M14 3v11"}],["path",{d:"M14 9h-3a3 3 0 0 1 0-6h9"}],["path",{d:"M18 3v11"}],["path",{d:"M22 18H2l4-4"}],["path",{d:"m6 22-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GT=[["path",{d:"M10 3v11"}],["path",{d:"M10 9H7a1 1 0 0 1 0-6h8"}],["path",{d:"M14 3v11"}],["path",{d:"m18 14 4 4H2"}],["path",{d:"m22 18-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZT=[["path",{d:"M13 4v16"}],["path",{d:"M17 4v16"}],["path",{d:"M19 4H9.5a4.5 4.5 0 0 0 0 9H13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XT=[["path",{d:"M18 11h-4a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h4"}],["path",{d:"M6 7v13a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7"}],["rect",{width:"16",height:"5",x:"4",y:"2",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UT=[["path",{d:"m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"}],["path",{d:"m8.5 8.5 7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YT=[["path",{d:"M12 17v5"}],["path",{d:"M15 9.34V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H7.89"}],["path",{d:"m2 2 20 20"}],["path",{d:"M9 9v1.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KT=[["path",{d:"M12 17v5"}],["path",{d:"M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QT=[["path",{d:"m12 9-8.414 8.414A2 2 0 0 0 3 18.828v1.344a2 2 0 0 1-.586 1.414A2 2 0 0 1 3.828 21h1.344a2 2 0 0 0 1.414-.586L15 12"}],["path",{d:"m18 9 .4.4a1 1 0 1 1-3 3l-3.8-3.8a1 1 0 1 1 3-3l.4.4 3.4-3.4a1 1 0 1 1 3 3z"}],["path",{d:"m2 22 .414-.414"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JT=[["path",{d:"m12 14-1 1"}],["path",{d:"m13.75 18.25-1.25 1.42"}],["path",{d:"M17.775 5.654a15.68 15.68 0 0 0-12.121 12.12"}],["path",{d:"M18.8 9.3a1 1 0 0 0 2.1 7.7"}],["path",{d:"M21.964 20.732a1 1 0 0 1-1.232 1.232l-18-5a1 1 0 0 1-.695-1.232A19.68 19.68 0 0 1 15.732 2.037a1 1 0 0 1 1.232.695z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t_=[["path",{d:"M2 22h20"}],["path",{d:"M3.77 10.77 2 9l2-4.5 1.1.55c.55.28.9.84.9 1.45s.35 1.17.9 1.45L8 8.5l3-6 1.05.53a2 2 0 0 1 1.09 1.52l.72 5.4a2 2 0 0 0 1.09 1.52l4.4 2.2c.42.22.78.55 1.01.96l.6 1.03c.49.88-.06 1.98-1.06 2.1l-1.18.15c-.47.06-.95-.02-1.37-.24L4.29 11.15a2 2 0 0 1-.52-.38Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e_=[["path",{d:"M2 22h20"}],["path",{d:"M6.36 17.4 4 17l-2-4 1.1-.55a2 2 0 0 1 1.8 0l.17.1a2 2 0 0 0 1.8 0L8 12 5 6l.9-.45a2 2 0 0 1 2.09.2l4.02 3a2 2 0 0 0 2.1.2l4.19-2.06a2.41 2.41 0 0 1 1.73-.17L21 7a1.4 1.4 0 0 1 .87 1.99l-.38.76c-.23.46-.6.84-1.07 1.08L7.58 17.2a2 2 0 0 1-1.22.18Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a_=[["path",{d:"M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i_=[["polygon",{points:"6 3 20 12 6 21 6 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n_=[["path",{d:"M9 2v6"}],["path",{d:"M15 2v6"}],["path",{d:"M12 17v5"}],["path",{d:"M5 8h14"}],["path",{d:"M6 11V8h12v3a6 6 0 1 1-12 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s0=[["path",{d:"M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z"}],["path",{d:"m2 22 3-3"}],["path",{d:"M7.5 13.5 10 11"}],["path",{d:"M10.5 16.5 13 14"}],["path",{d:"m18 3-4 4h6l-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r_=[["path",{d:"M12 22v-5"}],["path",{d:"M9 8V2"}],["path",{d:"M15 8V2"}],["path",{d:"M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s_=[["path",{d:"M5 12h14"}],["path",{d:"M12 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o_=[["path",{d:"M20 3a2 2 0 0 1 2 2v6a1 1 0 0 1-20 0V5a2 2 0 0 1 2-2z"}],["path",{d:"m8 10 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l_=[["path",{d:"M3 2v1c0 1 2 1 2 2S3 6 3 7s2 1 2 2-2 1-2 2 2 1 2 2"}],["path",{d:"M18 6h.01"}],["path",{d:"M6 18h.01"}],["path",{d:"M20.83 8.83a4 4 0 0 0-5.66-5.66l-12 12a4 4 0 1 0 5.66 5.66Z"}],["path",{d:"M18 11.66V22a4 4 0 0 0 4-4V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h_=[["path",{d:"M16.85 18.58a9 9 0 1 0-9.7 0"}],["path",{d:"M8 14a5 5 0 1 1 8 0"}],["circle",{cx:"12",cy:"11",r:"1"}],["path",{d:"M13 17a1 1 0 1 0-2 0l.5 4.5a.5.5 0 1 0 1 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d_=[["path",{d:"M10 4.5V4a2 2 0 0 0-2.41-1.957"}],["path",{d:"M13.9 8.4a2 2 0 0 0-1.26-1.295"}],["path",{d:"M21.7 16.2A8 8 0 0 0 22 14v-3a2 2 0 1 0-4 0v-1a2 2 0 0 0-3.63-1.158"}],["path",{d:"m7 15-1.8-1.8a2 2 0 0 0-2.79 2.86L6 19.7a7.74 7.74 0 0 0 6 2.3h2a8 8 0 0 0 5.657-2.343"}],["path",{d:"M6 6v8"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c_=[["path",{d:"M18 8a2 2 0 0 0 0-4 2 2 0 0 0-4 0 2 2 0 0 0-4 0 2 2 0 0 0-4 0 2 2 0 0 0 0 4"}],["path",{d:"M10 22 9 8"}],["path",{d:"m14 22 1-14"}],["path",{d:"M20 8c.5 0 .9.4.8 1l-2.6 12c-.1.5-.7 1-1.2 1H7c-.6 0-1.1-.4-1.2-1L3.2 9c-.1-.6.3-1 .8-1Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p_=[["path",{d:"M22 14a8 8 0 0 1-8 8"}],["path",{d:"M18 11v-1a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M14 10V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1"}],["path",{d:"M10 9.5V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v10"}],["path",{d:"M18 11a2 2 0 1 1 4 0v3a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u_=[["path",{d:"M18.6 14.4c.8-.8.8-2 0-2.8l-8.1-8.1a4.95 4.95 0 1 0-7.1 7.1l8.1 8.1c.9.7 2.1.7 2.9-.1Z"}],["path",{d:"m22 22-5.5-5.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f_=[["path",{d:"M18 7c0-5.333-8-5.333-8 0"}],["path",{d:"M10 7v14"}],["path",{d:"M6 21h12"}],["path",{d:"M6 13h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M_=[["path",{d:"M18.36 6.64A9 9 0 0 1 20.77 15"}],["path",{d:"M6.16 6.16a9 9 0 1 0 12.68 12.68"}],["path",{d:"M12 2v4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m_=[["path",{d:"M12 2v10"}],["path",{d:"M18.4 6.6a9 9 0 1 1-12.77.04"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v_=[["path",{d:"M2 3h20"}],["path",{d:"M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"}],["path",{d:"m7 21 5-5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g_=[["path",{d:"M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5"}],["path",{d:"m16 19 2 2 4-4"}],["path",{d:"M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2"}],["path",{d:"M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y_=[["path",{d:"M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"}],["rect",{x:"6",y:"14",width:"12",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x_=[["path",{d:"M5 7 3 5"}],["path",{d:"M9 6V3"}],["path",{d:"m13 7 2-2"}],["circle",{cx:"9",cy:"13",r:"3"}],["path",{d:"M11.83 12H20a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h2.17"}],["path",{d:"M16 16h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w_=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M12 9v11"}],["path",{d:"M2 9h13a2 2 0 0 1 2 2v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b_=[["path",{d:"M15.39 4.39a1 1 0 0 0 1.68-.474 2.5 2.5 0 1 1 3.014 3.015 1 1 0 0 0-.474 1.68l1.683 1.682a2.414 2.414 0 0 1 0 3.414L19.61 15.39a1 1 0 0 1-1.68-.474 2.5 2.5 0 1 0-3.014 3.015 1 1 0 0 1 .474 1.68l-1.683 1.682a2.414 2.414 0 0 1-3.414 0L8.61 19.61a1 1 0 0 0-1.68.474 2.5 2.5 0 1 1-3.014-3.015 1 1 0 0 0 .474-1.68l-1.683-1.682a2.414 2.414 0 0 1 0-3.414L4.39 8.61a1 1 0 0 1 1.68.474 2.5 2.5 0 1 0 3.014-3.015 1 1 0 0 1-.474-1.68l1.683-1.682a2.414 2.414 0 0 1 3.414 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E_=[["path",{d:"M2.5 16.88a1 1 0 0 1-.32-1.43l9-13.02a1 1 0 0 1 1.64 0l9 13.01a1 1 0 0 1-.32 1.44l-8.51 4.86a2 2 0 0 1-1.98 0Z"}],["path",{d:"M12 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S_=[["rect",{width:"5",height:"5",x:"3",y:"3",rx:"1"}],["rect",{width:"5",height:"5",x:"16",y:"3",rx:"1"}],["rect",{width:"5",height:"5",x:"3",y:"16",rx:"1"}],["path",{d:"M21 16h-3a2 2 0 0 0-2 2v3"}],["path",{d:"M21 21v.01"}],["path",{d:"M12 7v3a2 2 0 0 1-2 2H7"}],["path",{d:"M3 12h.01"}],["path",{d:"M12 3h.01"}],["path",{d:"M12 16v.01"}],["path",{d:"M16 12h1"}],["path",{d:"M21 12v.01"}],["path",{d:"M12 21v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C_=[["path",{d:"M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"}],["path",{d:"M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A_=[["path",{d:"M13 16a3 3 0 0 1 2.24 5"}],["path",{d:"M18 12h.01"}],["path",{d:"M18 21h-8a4 4 0 0 1-4-4 7 7 0 0 1 7-7h.2L9.6 6.4a1 1 0 1 1 2.8-2.8L15.8 7h.2c3.3 0 6 2.7 6 6v1a2 2 0 0 1-2 2h-1a3 3 0 0 0-3 3"}],["path",{d:"M20 8.54V4a2 2 0 1 0-4 0v3"}],["path",{d:"M7.612 12.524a3 3 0 1 0-1.6 4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T_=[["path",{d:"M19.07 4.93A10 10 0 0 0 6.99 3.34"}],["path",{d:"M4 6h.01"}],["path",{d:"M2.29 9.62A10 10 0 1 0 21.31 8.35"}],["path",{d:"M16.24 7.76A6 6 0 1 0 8.23 16.67"}],["path",{d:"M12 18h.01"}],["path",{d:"M17.99 11.66A6 6 0 0 1 15.77 16.67"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"m13.41 10.59 5.66-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const __=[["path",{d:"M12 12h.01"}],["path",{d:"M14 15.4641a4 4 0 0 1-4 0L7.52786 19.74597 A 1 1 0 0 0 7.99303 21.16211 10 10 0 0 0 16.00697 21.16211 1 1 0 0 0 16.47214 19.74597z"}],["path",{d:"M16 12a4 4 0 0 0-2-3.464l2.472-4.282a1 1 0 0 1 1.46-.305 10 10 0 0 1 4.006 6.94A1 1 0 0 1 21 12z"}],["path",{d:"M8 12a4 4 0 0 1 2-3.464L7.528 4.254a1 1 0 0 0-1.46-.305 10 10 0 0 0-4.006 6.94A1 1 0 0 0 3 12z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H_=[["path",{d:"M3 12h3.28a1 1 0 0 1 .948.684l2.298 7.934a.5.5 0 0 0 .96-.044L13.82 4.771A1 1 0 0 1 14.792 4H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L_=[["path",{d:"M5 16v2"}],["path",{d:"M19 16v2"}],["rect",{width:"20",height:"8",x:"2",y:"8",rx:"2"}],["path",{d:"M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V_=[["path",{d:"M16.247 7.761a6 6 0 0 1 0 8.478"}],["path",{d:"M19.075 4.933a10 10 0 0 1 0 14.134"}],["path",{d:"M4.925 19.067a10 10 0 0 1 0-14.134"}],["path",{d:"M7.753 16.239a6 6 0 0 1 0-8.478"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P_=[["path",{d:"M4.9 16.1C1 12.2 1 5.8 4.9 1.9"}],["path",{d:"M7.8 4.7a6.14 6.14 0 0 0-.8 7.5"}],["circle",{cx:"12",cy:"9",r:"2"}],["path",{d:"M16.2 4.8c2 2 2.26 5.11.8 7.47"}],["path",{d:"M19.1 1.9a9.96 9.96 0 0 1 0 14.1"}],["path",{d:"M9.5 18h5"}],["path",{d:"m8 22 4-11 4 11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D_=[["path",{d:"M20.34 17.52a10 10 0 1 0-2.82 2.82"}],["circle",{cx:"19",cy:"19",r:"2"}],["path",{d:"m13.41 13.41 4.18 4.18"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O_=[["path",{d:"M5 15h14"}],["path",{d:"M5 9h14"}],["path",{d:"m14 20-5-5 6-6-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k_=[["path",{d:"M22 17a10 10 0 0 0-20 0"}],["path",{d:"M6 17a6 6 0 0 1 12 0"}],["path",{d:"M10 17a2 2 0 0 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I_=[["path",{d:"M13 22H4a2 2 0 0 1 0-4h12"}],["path",{d:"M13.236 18a3 3 0 0 0-2.2-5"}],["path",{d:"M16 9h.01"}],["path",{d:"M16.82 3.94a3 3 0 1 1 3.237 4.868l1.815 2.587a1.5 1.5 0 0 1-1.5 2.1l-2.872-.453a3 3 0 0 0-3.5 3"}],["path",{d:"M17 4.988a3 3 0 1 0-5.2 2.052A7 7 0 0 0 4 14.015 4 4 0 0 0 8 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N_=[["rect",{width:"12",height:"20",x:"6",y:"2",rx:"2"}],["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M12 6.5v11"}],["path",{d:"M15 9.4a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 12h5"}],["path",{d:"M16 9.5a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 7h8"}],["path",{d:"M12 17.5 8 15h1a4 4 0 0 0 0-8"}],["path",{d:"M8 11h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"m12 10 3-3"}],["path",{d:"m9 7 3 3v7.5"}],["path",{d:"M9 11h6"}],["path",{d:"M9 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 13h5"}],["path",{d:"M10 17V9.5a2.5 2.5 0 0 1 5 0"}],["path",{d:"M8 17h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 15h5"}],["path",{d:"M8 11h5a2 2 0 1 0 0-4h-3v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M10 17V7h5"}],["path",{d:"M10 11h4"}],["path",{d:"M8 15h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M14 8H8"}],["path",{d:"M16 12H8"}],["path",{d:"M13 16H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G_=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 17.5v-11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o0=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}],["path",{d:"M12 12h.01"}],["path",{d:"M17 12h.01"}],["path",{d:"M7 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z_=[["path",{d:"M14 4v16H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"}],["circle",{cx:"14",cy:"12",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X_=[["path",{d:"M20 6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4a2 2 0 0 1-1.6-.8l-1.6-2.13a1 1 0 0 0-1.6 0L9.6 17.2A2 2 0 0 1 8 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U_=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y_=[["rect",{width:"12",height:"20",x:"6",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K_=[["path",{d:"M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"}],["path",{d:"M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"}],["path",{d:"m14 16-3 3 3 3"}],["path",{d:"M8.293 13.596 7.196 9.5 3.1 10.598"}],["path",{d:"m9.344 5.811 1.093-1.892A1.83 1.83 0 0 1 11.985 3a1.784 1.784 0 0 1 1.546.888l3.943 6.843"}],["path",{d:"m13.378 9.633 4.096 1.098 1.097-4.096"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q_=[["path",{d:"m15 14 5-5-5-5"}],["path",{d:"M20 9H9.5A5.5 5.5 0 0 0 4 14.5A5.5 5.5 0 0 0 9.5 20H13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J_=[["path",{d:"M21 7v6h-6"}],["path",{d:"M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3l3 2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tH=[["circle",{cx:"12",cy:"17",r:"1"}],["path",{d:"M21 7v6h-6"}],["path",{d:"M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3l3 2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eH=[["path",{d:"M3 2v6h6"}],["path",{d:"M21 12A9 9 0 0 0 6 5.3L3 8"}],["path",{d:"M21 22v-6h-6"}],["path",{d:"M3 12a9 9 0 0 0 15 6.7l3-2.7"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aH=[["path",{d:"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["path",{d:"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"}],["path",{d:"M16 16h5v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iH=[["path",{d:"M21 8L18.74 5.74A9.75 9.75 0 0 0 12 3C11 3 10.03 3.16 9.13 3.47"}],["path",{d:"M8 16H3v5"}],["path",{d:"M3 12C3 9.51 4 7.26 5.64 5.64"}],["path",{d:"m3 16 2.26 2.26A9.75 9.75 0 0 0 12 21c2.49 0 4.74-1 6.36-2.64"}],["path",{d:"M21 12c0 1-.16 1.97-.47 2.87"}],["path",{d:"M21 3v5h-5"}],["path",{d:"M22 22 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nH=[["path",{d:"M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"}],["path",{d:"M21 3v5h-5"}],["path",{d:"M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"}],["path",{d:"M8 16H3v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rH=[["path",{d:"M5 6a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6Z"}],["path",{d:"M5 10h14"}],["path",{d:"M15 7v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sH=[["path",{d:"M17 3v10"}],["path",{d:"m12.67 5.5 8.66 5"}],["path",{d:"m12.67 10.5 8.66-5"}],["path",{d:"M9 17a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oH=[["path",{d:"M4 7V4h16v3"}],["path",{d:"M5 20h6"}],["path",{d:"M13 4 8 20"}],["path",{d:"m15 15 5 5"}],["path",{d:"m20 15-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lH=[["path",{d:"m17 2 4 4-4 4"}],["path",{d:"M3 11v-1a4 4 0 0 1 4-4h14"}],["path",{d:"m7 22-4-4 4-4"}],["path",{d:"M21 13v1a4 4 0 0 1-4 4H3"}],["path",{d:"M11 10h1v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hH=[["path",{d:"m2 9 3-3 3 3"}],["path",{d:"M13 18H7a2 2 0 0 1-2-2V6"}],["path",{d:"m22 15-3 3-3-3"}],["path",{d:"M11 6h6a2 2 0 0 1 2 2v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dH=[["path",{d:"m17 2 4 4-4 4"}],["path",{d:"M3 11v-1a4 4 0 0 1 4-4h14"}],["path",{d:"m7 22-4-4 4-4"}],["path",{d:"M21 13v1a4 4 0 0 1-4 4H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cH=[["path",{d:"M14 14a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M14 4a2 2 0 0 1 2-2"}],["path",{d:"M16 10a2 2 0 0 1-2-2"}],["path",{d:"M20 14a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M20 2a2 2 0 0 1 2 2"}],["path",{d:"M22 8a2 2 0 0 1-2 2"}],["path",{d:"m3 7 3 3 3-3"}],["path",{d:"M6 10V5a 3 3 0 0 1 3-3h1"}],["rect",{x:"2",y:"14",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pH=[["path",{d:"M14 4a2 2 0 0 1 2-2"}],["path",{d:"M16 10a2 2 0 0 1-2-2"}],["path",{d:"M20 2a2 2 0 0 1 2 2"}],["path",{d:"M22 8a2 2 0 0 1-2 2"}],["path",{d:"m3 7 3 3 3-3"}],["path",{d:"M6 10V5a3 3 0 0 1 3-3h1"}],["rect",{x:"2",y:"14",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uH=[["path",{d:"m12 17-5-5 5-5"}],["path",{d:"M22 18v-2a4 4 0 0 0-4-4H7"}],["path",{d:"m7 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fH=[["path",{d:"M20 18v-2a4 4 0 0 0-4-4H4"}],["path",{d:"m9 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MH=[["polygon",{points:"11 19 2 12 11 5 11 19"}],["polygon",{points:"22 19 13 12 22 5 22 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mH=[["path",{d:"M12 11.22C11 9.997 10 9 10 8a2 2 0 0 1 4 0c0 1-.998 2.002-2.01 3.22"}],["path",{d:"m12 18 2.57-3.5"}],["path",{d:"M6.243 9.016a7 7 0 0 1 11.507-.009"}],["path",{d:"M9.35 14.53 12 11.22"}],["path",{d:"M9.35 14.53C7.728 12.246 6 10.221 6 7a6 5 0 0 1 12 0c-.005 3.22-1.778 5.235-3.43 7.5l3.557 4.527a1 1 0 0 1-.203 1.43l-1.894 1.36a1 1 0 0 1-1.384-.215L12 18l-2.679 3.593a1 1 0 0 1-1.39.213l-1.865-1.353a1 1 0 0 1-.203-1.422z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vH=[["path",{d:"M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"}],["path",{d:"m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"}],["path",{d:"M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"}],["path",{d:"M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gH=[["polyline",{points:"3.5 2 6.5 12.5 18 12.5"}],["line",{x1:"9.5",x2:"5.5",y1:"12.5",y2:"20"}],["line",{x1:"15",x2:"18.5",y1:"12.5",y2:"20"}],["path",{d:"M2.75 18a13 13 0 0 0 18.5 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l0=[["path",{d:"M16.466 7.5C15.643 4.237 13.952 2 12 2 9.239 2 7 6.477 7 12s2.239 10 5 10c.342 0 .677-.069 1-.2"}],["path",{d:"m15.194 13.707 3.814 1.86-1.86 3.814"}],["path",{d:"M19 15.57c-1.804.885-4.274 1.43-7 1.43-5.523 0-10-2.239-10-5s4.477-5 10-5c4.838 0 8.873 1.718 9.8 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yH=[["path",{d:"M6 19V5"}],["path",{d:"M10 19V6.8"}],["path",{d:"M14 19v-7.8"}],["path",{d:"M18 5v4"}],["path",{d:"M18 19v-6"}],["path",{d:"M22 19V9"}],["path",{d:"M2 19V9a4 4 0 0 1 4-4c2 0 4 1.33 6 4s4 4 6 4a4 4 0 1 0-3-6.65"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xH=[["path",{d:"M20 9V7a2 2 0 0 0-2-2h-6"}],["path",{d:"m15 2-3 3 3 3"}],["path",{d:"M20 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wH=[["path",{d:"m14.5 9.5 1 1"}],["path",{d:"m15.5 8.5-4 4"}],["path",{d:"M3 12a9 9 0 1 0 9-9 9.74 9.74 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["circle",{cx:"10",cy:"14",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bH=[["path",{d:"M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EH=[["path",{d:"M12 5H6a2 2 0 0 0-2 2v3"}],["path",{d:"m9 8 3-3-3-3"}],["path",{d:"M4 14v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SH=[["path",{d:"M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"}],["path",{d:"M21 3v5h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CH=[["circle",{cx:"6",cy:"19",r:"3"}],["path",{d:"M9 19h8.5c.4 0 .9-.1 1.3-.2"}],["path",{d:"M5.2 5.2A3.5 3.53 0 0 0 6.5 12H12"}],["path",{d:"m2 2 20 20"}],["path",{d:"M21 15.3a3.5 3.5 0 0 0-3.3-3.3"}],["path",{d:"M15 5h-4.3"}],["circle",{cx:"18",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AH=[["circle",{cx:"6",cy:"19",r:"3"}],["path",{d:"M9 19h8.5a3.5 3.5 0 0 0 0-7h-11a3.5 3.5 0 0 1 0-7H15"}],["circle",{cx:"18",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TH=[["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6.01 18H6"}],["path",{d:"M10.01 18H10"}],["path",{d:"M15 10v4"}],["path",{d:"M17.84 7.17a4 4 0 0 0-5.66 0"}],["path",{d:"M20.66 4.34a8 8 0 0 0-11.31 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 12h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 9H3"}],["path",{d:"M21 15H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _H=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 7.5H3"}],["path",{d:"M21 12H3"}],["path",{d:"M21 16.5H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HH=[["path",{d:"M4 11a9 9 0 0 1 9 9"}],["path",{d:"M4 4a16 16 0 0 1 16 16"}],["circle",{cx:"5",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LH=[["path",{d:"M12 15v-3.014"}],["path",{d:"M16 15v-3.014"}],["path",{d:"M20 6H4"}],["path",{d:"M20 8V4"}],["path",{d:"M4 8V4"}],["path",{d:"M8 15v-3.014"}],["rect",{x:"3",y:"12",width:"18",height:"7",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VH=[["path",{d:"M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"}],["path",{d:"m14.5 12.5 2-2"}],["path",{d:"m11.5 9.5 2-2"}],["path",{d:"m8.5 6.5 2-2"}],["path",{d:"m17.5 15.5 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PH=[["path",{d:"M6 11h8a4 4 0 0 0 0-8H9v18"}],["path",{d:"M6 15h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DH=[["path",{d:"M22 18H2a4 4 0 0 0 4 4h12a4 4 0 0 0 4-4Z"}],["path",{d:"M21 14 10 2 3 14h18Z"}],["path",{d:"M10 2v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OH=[["path",{d:"M7 21h10"}],["path",{d:"M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"}],["path",{d:"M11.38 12a2.4 2.4 0 0 1-.4-4.77 2.4 2.4 0 0 1 3.2-2.77 2.4 2.4 0 0 1 3.47-.63 2.4 2.4 0 0 1 3.37 3.37 2.4 2.4 0 0 1-1.1 3.7 2.51 2.51 0 0 1 .03 1.1"}],["path",{d:"m13 12 4-4"}],["path",{d:"M10.9 7.25A3.99 3.99 0 0 0 4 10c0 .73.2 1.41.54 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kH=[["path",{d:"m2.37 11.223 8.372-6.777a2 2 0 0 1 2.516 0l8.371 6.777"}],["path",{d:"M21 15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-5.25"}],["path",{d:"M3 15a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h9"}],["path",{d:"m6.67 15 6.13 4.6a2 2 0 0 0 2.8-.4l3.15-4.2"}],["rect",{width:"20",height:"4",x:"2",y:"11",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IH=[["path",{d:"M4 10a7.31 7.31 0 0 0 10 10Z"}],["path",{d:"m9 15 3-3"}],["path",{d:"M17 13a6 6 0 0 0-6-6"}],["path",{d:"M21 13A10 10 0 0 0 11 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NH=[["path",{d:"m13.5 6.5-3.148-3.148a1.205 1.205 0 0 0-1.704 0L6.352 5.648a1.205 1.205 0 0 0 0 1.704L9.5 10.5"}],["path",{d:"M16.5 7.5 19 5"}],["path",{d:"m17.5 10.5 3.148 3.148a1.205 1.205 0 0 1 0 1.704l-2.296 2.296a1.205 1.205 0 0 1-1.704 0L13.5 14.5"}],["path",{d:"M9 21a6 6 0 0 0-6-6"}],["path",{d:"M9.352 10.648a1.205 1.205 0 0 0 0 1.704l2.296 2.296a1.205 1.205 0 0 0 1.704 0l4.296-4.296a1.205 1.205 0 0 0 0-1.704l-2.296-2.296a1.205 1.205 0 0 0-1.704 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zH=[["path",{d:"m20 19.5-5.5 1.2"}],["path",{d:"M14.5 4v11.22a1 1 0 0 0 1.242.97L20 15.2"}],["path",{d:"m2.978 19.351 5.549-1.363A2 2 0 0 0 10 16V2"}],["path",{d:"M20 10 4 13.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $H=[["path",{d:"M10 2v3a1 1 0 0 0 1 1h5"}],["path",{d:"M18 18v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6"}],["path",{d:"M18 22H4a2 2 0 0 1-2-2V6"}],["path",{d:"M8 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9.172a2 2 0 0 1 1.414.586l2.828 2.828A2 2 0 0 1 22 6.828V16a2 2 0 0 1-2.01 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RH=[["path",{d:"M13 13H8a1 1 0 0 0-1 1v7"}],["path",{d:"M14 8h1"}],["path",{d:"M17 21v-4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20.41 20.41A2 2 0 0 1 19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 .59-1.41"}],["path",{d:"M29.5 11.5s5 5 4 5"}],["path",{d:"M9 3h6.2a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BH=[["path",{d:"M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"}],["path",{d:"M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"}],["path",{d:"M7 3v4a1 1 0 0 0 1 1h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c0=[["path",{d:"M5 7v11a1 1 0 0 0 1 1h11"}],["path",{d:"M5.293 18.707 11 13"}],["circle",{cx:"19",cy:"19",r:"2"}],["circle",{cx:"5",cy:"5",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FH=[["path",{d:"m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"}],["path",{d:"m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"}],["path",{d:"M7 21h10"}],["path",{d:"M12 3v18"}],["path",{d:"M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qH=[["path",{d:"M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"}],["path",{d:"M14 15H9v-5"}],["path",{d:"M16 3h5v5"}],["path",{d:"M21 3 9 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M8 7v10"}],["path",{d:"M12 7v10"}],["path",{d:"M17 7v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZH=[["path",{d:"M11.246 16.657a1 1 0 0 0 1.508 0l3.57-4.101A2.75 2.75 0 1 0 12 9.168a2.75 2.75 0 1 0-4.324 3.388z"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M7 12h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UH=[["path",{d:"M17 12v4a1 1 0 0 1-1 1h-4"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M17 8V7"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M7 17h.01"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["rect",{x:"7",y:"7",width:"5",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"m16 16-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QH=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M7 8h8"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JH=[["path",{d:"M14 22v-4a2 2 0 1 0-4 0v4"}],["path",{d:"m18 10 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7.382a1 1 0 0 1 .553-.894L6 10"}],["path",{d:"M18 5v17"}],["path",{d:"m4 6 7.106-3.553a2 2 0 0 1 1.788 0L20 6"}],["path",{d:"M6 5v17"}],["circle",{cx:"12",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tL=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M8.12 8.12 12 12"}],["path",{d:"M20 4 8.12 15.88"}],["circle",{cx:"6",cy:"18",r:"3"}],["path",{d:"M14.8 14.8 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eL=[["path",{d:"M5.42 9.42 8 12"}],["circle",{cx:"4",cy:"8",r:"2"}],["path",{d:"m14 6-8.58 8.58"}],["circle",{cx:"4",cy:"16",r:"2"}],["path",{d:"M10.8 14.8 14 18"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aL=[["path",{d:"M13 3H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m22 3-5 5"}],["path",{d:"m17 3 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iL=[["path",{d:"M15 12h-5"}],["path",{d:"M15 8h-5"}],["path",{d:"M19 17V5a2 2 0 0 0-2-2H4"}],["path",{d:"M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nL=[["path",{d:"M13 3H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m17 8 5-5"}],["path",{d:"M17 3h5v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rL=[["path",{d:"M19 17V5a2 2 0 0 0-2-2H4"}],["path",{d:"M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sL=[["path",{d:"m8 11 2 2 4-4"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oL=[["path",{d:"m13 13.5 2-2.5-2-2.5"}],["path",{d:"m21 21-4.3-4.3"}],["path",{d:"M9 8.5 7 11l2 2.5"}],["circle",{cx:"11",cy:"11",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lL=[["path",{d:"m13.5 8.5-5 5"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hL=[["path",{d:"m13.5 8.5-5 5"}],["path",{d:"m8.5 8.5 5 5"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dL=[["path",{d:"M16 5a4 3 0 0 0-8 0c0 4 8 3 8 7a4 3 0 0 1-8 0"}],["path",{d:"M8 19a4 3 0 0 0 8 0c0-4-8-3-8-7a4 3 0 0 1 8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cL=[["path",{d:"m21 21-4.34-4.34"}],["circle",{cx:"11",cy:"11",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p0=[["path",{d:"M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"}],["path",{d:"M6 12h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pL=[["rect",{x:"14",y:"14",width:"8",height:"8",rx:"2"}],["rect",{x:"2",y:"2",width:"8",height:"8",rx:"2"}],["path",{d:"M7 14v1a2 2 0 0 0 2 2h1"}],["path",{d:"M14 7h1a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uL=[["path",{d:"M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"}],["path",{d:"m21.854 2.147-10.94 10.939"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fL=[["path",{d:"m16 16-4 4-4-4"}],["path",{d:"M3 12h18"}],["path",{d:"m8 8 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ML=[["path",{d:"M12 3v18"}],["path",{d:"m16 16 4-4-4-4"}],["path",{d:"m8 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mL=[["path",{d:"m10.852 14.772-.383.923"}],["path",{d:"M13.148 14.772a3 3 0 1 0-2.296-5.544l-.383-.923"}],["path",{d:"m13.148 9.228.383-.923"}],["path",{d:"m13.53 15.696-.382-.924a3 3 0 1 1-2.296-5.544"}],["path",{d:"m14.772 10.852.923-.383"}],["path",{d:"m14.772 13.148.923.383"}],["path",{d:"M4.5 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-.5"}],["path",{d:"M4.5 14H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-.5"}],["path",{d:"M6 18h.01"}],["path",{d:"M6 6h.01"}],["path",{d:"m9.228 10.852-.923-.383"}],["path",{d:"m9.228 13.148-.923.383"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vL=[["path",{d:"M6 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 14H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2"}],["path",{d:"M6 6h.01"}],["path",{d:"M6 18h.01"}],["path",{d:"m13 6-4 6h6l-4 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gL=[["path",{d:"M7 2h13a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-5"}],["path",{d:"M10 10 2.5 2.5C2 2 2 2.5 2 5v3a2 2 0 0 0 2 2h6z"}],["path",{d:"M22 17v-1a2 2 0 0 0-2-2h-1"}],["path",{d:"M4 14a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16.5l1-.5.5.5-8-8H4z"}],["path",{d:"M6 18h.01"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yL=[["rect",{width:"20",height:"8",x:"2",y:"2",rx:"2",ry:"2"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2",ry:"2"}],["line",{x1:"6",x2:"6.01",y1:"6",y2:"6"}],["line",{x1:"6",x2:"6.01",y1:"18",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xL=[["path",{d:"M14 17H5"}],["path",{d:"M19 7h-9"}],["circle",{cx:"17",cy:"17",r:"3"}],["circle",{cx:"7",cy:"7",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wL=[["path",{d:"M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z"}],["rect",{x:"3",y:"14",width:"7",height:"7",rx:"1"}],["circle",{cx:"17.5",cy:"17.5",r:"3.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bL=[["path",{d:"M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EL=[["circle",{cx:"18",cy:"5",r:"3"}],["circle",{cx:"6",cy:"12",r:"3"}],["circle",{cx:"18",cy:"19",r:"3"}],["line",{x1:"8.59",x2:"15.42",y1:"13.51",y2:"17.49"}],["line",{x1:"15.41",x2:"8.59",y1:"6.51",y2:"10.49"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SL=[["path",{d:"M12 2v13"}],["path",{d:"m16 6-4-4-4 4"}],["path",{d:"M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CL=[["path",{d:"M14 11a2 2 0 1 1-4 0 4 4 0 0 1 8 0 6 6 0 0 1-12 0 8 8 0 0 1 16 0 10 10 0 1 1-20 0 11.93 11.93 0 0 1 2.42-7.22 2 2 0 1 1 3.16 2.44"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AL=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["line",{x1:"3",x2:"21",y1:"9",y2:"9"}],["line",{x1:"3",x2:"21",y1:"15",y2:"15"}],["line",{x1:"9",x2:"9",y1:"9",y2:"21"}],["line",{x1:"15",x2:"15",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M12 8v4"}],["path",{d:"M12 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _L=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m4.243 5.21 14.39 12.472"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M8 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M12 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9 12h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DL=[["path",{d:"m2 2 20 20"}],["path",{d:"M5 5a1 1 0 0 0-1 1v7c0 5 3.5 7.5 7.67 8.94a1 1 0 0 0 .67.01c2.35-.82 4.48-1.97 5.9-3.71"}],["path",{d:"M9.309 3.652A12.252 12.252 0 0 0 11.24 2.28a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1v7a9.784 9.784 0 0 1-.08 1.264"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9 12h6"}],["path",{d:"M12 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u0=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M6.376 18.91a6 6 0 0 1 11.249.003"}],["circle",{cx:"12",cy:"11",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f0=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m14.5 9.5-5 5"}],["path",{d:"m9.5 9.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IL=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NL=[["circle",{cx:"12",cy:"12",r:"8"}],["path",{d:"M12 2v7.5"}],["path",{d:"m19 5-5.23 5.23"}],["path",{d:"M22 12h-7.5"}],["path",{d:"m19 19-5.23-5.23"}],["path",{d:"M12 14.5V22"}],["path",{d:"M10.23 13.77 5 19"}],["path",{d:"M9.5 12H2"}],["path",{d:"M10.23 10.23 5 5"}],["circle",{cx:"12",cy:"12",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zL=[["path",{d:"M12 10.189V14"}],["path",{d:"M12 2v3"}],["path",{d:"M19 13V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v6"}],["path",{d:"M19.38 20A11.6 11.6 0 0 0 21 14l-8.188-3.639a2 2 0 0 0-1.624 0L3 14a11.6 11.6 0 0 0 2.81 7.76"}],["path",{d:"M2 21c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1s1.2 1 2.5 1c2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $L=[["path",{d:"M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RL=[["path",{d:"M16 10a4 4 0 0 1-8 0"}],["path",{d:"M3.103 6.034h17.794"}],["path",{d:"M3.4 5.467a2 2 0 0 0-.4 1.2V20a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6.667a2 2 0 0 0-.4-1.2l-2-2.667A2 2 0 0 0 17 2H7a2 2 0 0 0-1.6.8z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BL=[["path",{d:"m15 11-1 9"}],["path",{d:"m19 11-4-7"}],["path",{d:"M2 11h20"}],["path",{d:"m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4"}],["path",{d:"M4.5 15.5h15"}],["path",{d:"m5 11 4-7"}],["path",{d:"m9 11 1 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FL=[["circle",{cx:"8",cy:"21",r:"1"}],["circle",{cx:"19",cy:"21",r:"1"}],["path",{d:"M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qL=[["path",{d:"M2 22v-5l5-5 5 5-5 5z"}],["path",{d:"M9.5 14.5 16 8"}],["path",{d:"m17 2 5 5-.5.5a3.53 3.53 0 0 1-5 0s0 0 0 0a3.53 3.53 0 0 1 0-5L17 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WL=[["path",{d:"m4 4 2.5 2.5"}],["path",{d:"M13.5 6.5a4.95 4.95 0 0 0-7 7"}],["path",{d:"M15 5 5 15"}],["path",{d:"M14 17v.01"}],["path",{d:"M10 16v.01"}],["path",{d:"M13 13v.01"}],["path",{d:"M16 10v.01"}],["path",{d:"M11 20v.01"}],["path",{d:"M17 14v.01"}],["path",{d:"M20 11v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jL=[["path",{d:"M10 22v-5"}],["path",{d:"M14 19v-2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M18 20v-3"}],["path",{d:"M2 13h20"}],["path",{d:"M20 13V7l-5-5H6a2 2 0 0 0-2 2v9"}],["path",{d:"M6 20v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GL=[["path",{d:"M11 12h.01"}],["path",{d:"M13 22c.5-.5 1.12-1 2.5-1-1.38 0-2-.5-2.5-1"}],["path",{d:"M14 2a3.28 3.28 0 0 1-3.227 1.798l-6.17-.561A2.387 2.387 0 1 0 4.387 8H15.5a1 1 0 0 1 0 13 1 1 0 0 0 0-5H12a7 7 0 0 1-7-7V8"}],["path",{d:"M14 8a8.5 8.5 0 0 1 0 8"}],["path",{d:"M16 16c2 0 4.5-4 4-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZL=[["path",{d:"m15 15 6 6m-6-6v4.8m0-4.8h4.8"}],["path",{d:"M9 19.8V15m0 0H4.2M9 15l-6 6"}],["path",{d:"M15 4.2V9m0 0h4.8M15 9l6-6"}],["path",{d:"M9 4.2V9m0 0H4.2M9 9 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XL=[["path",{d:"M12 22v-5.172a2 2 0 0 0-.586-1.414L9.5 13.5"}],["path",{d:"M14.5 14.5 12 17"}],["path",{d:"M17 8.8A6 6 0 0 1 13.8 20H10A6.5 6.5 0 0 1 7 8a5 5 0 0 1 10 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UL=[["path",{d:"m18 14 4 4-4 4"}],["path",{d:"m18 2 4 4-4 4"}],["path",{d:"M2 18h1.973a4 4 0 0 0 3.3-1.7l5.454-8.6a4 4 0 0 1 3.3-1.7H22"}],["path",{d:"M2 6h1.972a4 4 0 0 1 3.6 2.2"}],["path",{d:"M22 18h-6.041a4 4 0 0 1-3.3-1.8l-.359-.45"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YL=[["path",{d:"M18 7V5a1 1 0 0 0-1-1H6.5a.5.5 0 0 0-.4.8l4.5 6a2 2 0 0 1 0 2.4l-4.5 6a.5.5 0 0 0 .4.8H17a1 1 0 0 0 1-1v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KL=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}],["path",{d:"M17 20V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QL=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JL=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tV=[["path",{d:"M2 20h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eV=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}],["path",{d:"M17 20V8"}],["path",{d:"M22 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aV=[["path",{d:"m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"}],["path",{d:"M3 21h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iV=[["path",{d:"M12 13v8"}],["path",{d:"M12 3v3"}],["path",{d:"M18 6a2 2 0 0 1 1.387.56l2.307 2.22a1 1 0 0 1 0 1.44l-2.307 2.22A2 2 0 0 1 18 13H6a2 2 0 0 1-1.387-.56l-2.306-2.22a1 1 0 0 1 0-1.44l2.306-2.22A2 2 0 0 1 6 6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nV=[["path",{d:"M10 9H4L2 7l2-2h6"}],["path",{d:"M14 5h6l2 2-2 2h-6"}],["path",{d:"M10 22V4a2 2 0 1 1 4 0v18"}],["path",{d:"M8 22h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rV=[["path",{d:"M7 18v-6a5 5 0 1 1 10 0v6"}],["path",{d:"M5 21a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2z"}],["path",{d:"M21 12h1"}],["path",{d:"M18.5 4.5 18 5"}],["path",{d:"M2 12h1"}],["path",{d:"M12 2v1"}],["path",{d:"m4.929 4.929.707.707"}],["path",{d:"M12 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sV=[["polygon",{points:"19 20 9 12 19 4 19 20"}],["line",{x1:"5",x2:"5",y1:"19",y2:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oV=[["polygon",{points:"5 4 15 12 5 20 5 4"}],["line",{x1:"19",x2:"19",y1:"5",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lV=[["path",{d:"m12.5 17-.5-1-.5 1h1z"}],["path",{d:"M15 22a1 1 0 0 0 1-1v-1a2 2 0 0 0 1.56-3.25 8 8 0 1 0-11.12 0A2 2 0 0 0 8 20v1a1 1 0 0 0 1 1z"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"9",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hV=[["rect",{width:"3",height:"8",x:"13",y:"2",rx:"1.5"}],["path",{d:"M19 8.5V10h1.5A1.5 1.5 0 1 0 19 8.5"}],["rect",{width:"3",height:"8",x:"8",y:"14",rx:"1.5"}],["path",{d:"M5 15.5V14H3.5A1.5 1.5 0 1 0 5 15.5"}],["rect",{width:"8",height:"3",x:"14",y:"13",rx:"1.5"}],["path",{d:"M15.5 19H14v1.5a1.5 1.5 0 1 0 1.5-1.5"}],["rect",{width:"8",height:"3",x:"2",y:"8",rx:"1.5"}],["path",{d:"M8.5 5H10V3.5A1.5 1.5 0 1 0 8.5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dV=[["path",{d:"M22 2 2 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cV=[["path",{d:"M11 16.586V19a1 1 0 0 1-1 1H2L18.37 3.63a1 1 0 1 1 3 3l-9.663 9.663a1 1 0 0 1-1.414 0L8 14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pV=[["line",{x1:"21",x2:"14",y1:"4",y2:"4"}],["line",{x1:"10",x2:"3",y1:"4",y2:"4"}],["line",{x1:"21",x2:"12",y1:"12",y2:"12"}],["line",{x1:"8",x2:"3",y1:"12",y2:"12"}],["line",{x1:"21",x2:"16",y1:"20",y2:"20"}],["line",{x1:"12",x2:"3",y1:"20",y2:"20"}],["line",{x1:"14",x2:"14",y1:"2",y2:"6"}],["line",{x1:"8",x2:"8",y1:"10",y2:"14"}],["line",{x1:"16",x2:"16",y1:"18",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M0=[["line",{x1:"4",x2:"4",y1:"21",y2:"14"}],["line",{x1:"4",x2:"4",y1:"10",y2:"3"}],["line",{x1:"12",x2:"12",y1:"21",y2:"12"}],["line",{x1:"12",x2:"12",y1:"8",y2:"3"}],["line",{x1:"20",x2:"20",y1:"21",y2:"16"}],["line",{x1:"20",x2:"20",y1:"12",y2:"3"}],["line",{x1:"2",x2:"6",y1:"14",y2:"14"}],["line",{x1:"10",x2:"14",y1:"8",y2:"8"}],["line",{x1:"18",x2:"22",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uV=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2",ry:"2"}],["path",{d:"M12.667 8 10 12h4l-2.667 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fV=[["rect",{width:"7",height:"12",x:"2",y:"6",rx:"1"}],["path",{d:"M13 8.32a7.43 7.43 0 0 1 0 7.36"}],["path",{d:"M16.46 6.21a11.76 11.76 0 0 1 0 11.58"}],["path",{d:"M19.91 4.1a15.91 15.91 0 0 1 .01 15.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MV=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2",ry:"2"}],["path",{d:"M12 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mV=[["path",{d:"M22 11v1a10 10 0 1 1-9-10"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}],["path",{d:"M16 5h6"}],["path",{d:"M19 2v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vV=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gV=[["path",{d:"M2 13a6 6 0 1 0 12 0 4 4 0 1 0-8 0 2 2 0 0 0 4 0"}],["circle",{cx:"10",cy:"13",r:"8"}],["path",{d:"M2 21h12c4.4 0 8-3.6 8-8V7a2 2 0 1 0-4 0v6"}],["path",{d:"M18 3 19.1 5.2"}],["path",{d:"M22 3 20.9 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yV=[["path",{d:"m10 20-1.25-2.5L6 18"}],["path",{d:"M10 4 8.75 6.5 6 6"}],["path",{d:"m14 20 1.25-2.5L18 18"}],["path",{d:"m14 4 1.25 2.5L18 6"}],["path",{d:"m17 21-3-6h-4"}],["path",{d:"m17 3-3 6 1.5 3"}],["path",{d:"M2 12h6.5L10 9"}],["path",{d:"m20 10-1.5 2 1.5 2"}],["path",{d:"M22 12h-6.5L14 15"}],["path",{d:"m4 10 1.5 2L4 14"}],["path",{d:"m7 21 3-6-1.5-3"}],["path",{d:"m7 3 3 6h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xV=[["path",{d:"M10.5 2v4"}],["path",{d:"M14 2H7a2 2 0 0 0-2 2"}],["path",{d:"M19.29 14.76A6.67 6.67 0 0 1 17 11a6.6 6.6 0 0 1-2.29 3.76c-1.15.92-1.71 2.04-1.71 3.19 0 2.22 1.8 4.05 4 4.05s4-1.83 4-4.05c0-1.16-.57-2.26-1.71-3.19"}],["path",{d:"M9.607 21H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h7V7a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wV=[["path",{d:"M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"}],["path",{d:"M2 16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"}],["path",{d:"M4 18v2"}],["path",{d:"M20 18v2"}],["path",{d:"M12 4v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bV=[["path",{d:"M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"}],["path",{d:"M7 21h10"}],["path",{d:"M19.5 12 22 6"}],["path",{d:"M16.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.73 1.62"}],["path",{d:"M11.25 3c.27.1.8.53.74 1.36-.05.83-.93 1.2-.98 2.02-.06.78.33 1.24.72 1.62"}],["path",{d:"M6.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.74 1.62"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EV=[["path",{d:"M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SV=[["path",{d:"M5 9c-1.5 1.5-3 3.2-3 5.5A5.5 5.5 0 0 0 7.5 20c1.8 0 3-.5 4.5-2 1.5 1.5 2.7 2 4.5 2a5.5 5.5 0 0 0 5.5-5.5c0-2.3-1.5-4-3-5.5l-7-7-7 7Z"}],["path",{d:"M12 18v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CV=[["path",{d:"M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m0=[["path",{d:"M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"}],["path",{d:"M20 3v4"}],["path",{d:"M22 5h-4"}],["path",{d:"M4 17v2"}],["path",{d:"M5 18H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AV=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M12 6h.01"}],["circle",{cx:"12",cy:"14",r:"4"}],["path",{d:"M12 14h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TV=[["path",{d:"M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.054 1 4.55a5.77 5.77 0 0 1 .029 2.758L2 20"}],["path",{d:"M19.8 17.8a7.5 7.5 0 0 0 .003-10.603"}],["path",{d:"M17 15a3.5 3.5 0 0 0-.025-4.975"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _V=[["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}],["path",{d:"M4 21c1.1 0 1.1-1 2.3-1s1.1 1 2.3 1c1.1 0 1.1-1 2.3-1 1.1 0 1.1 1 2.3 1 1.1 0 1.1-1 2.3-1 1.1 0 1.1 1 2.3 1 1.1 0 1.1-1 2.3-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HV=[["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}],["path",{d:"m16 20 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LV=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M5 17A12 12 0 0 1 17 5"}],["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VV=[["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}],["path",{d:"M5 17A12 12 0 0 1 17 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PV=[["path",{d:"M16 3h5v5"}],["path",{d:"M8 3H3v5"}],["path",{d:"M12 22v-8.3a4 4 0 0 0-1.172-2.872L3 3"}],["path",{d:"m15 9 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DV=[["path",{d:"M17 13.44 4.442 17.082A2 2 0 0 0 4.982 21H19a2 2 0 0 0 .558-3.921l-1.115-.32A2 2 0 0 1 17 14.837V7.66"}],["path",{d:"m7 10.56 12.558-3.642A2 2 0 0 0 19.018 3H5a2 2 0 0 0-.558 3.921l1.115.32A2 2 0 0 1 7 9.163v7.178"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OV=[["path",{d:"M3 3h.01"}],["path",{d:"M7 5h.01"}],["path",{d:"M11 7h.01"}],["path",{d:"M3 7h.01"}],["path",{d:"M7 9h.01"}],["path",{d:"M3 11h.01"}],["rect",{width:"4",height:"4",x:"15",y:"5"}],["path",{d:"m19 9 2 2v10c0 .6-.4 1-1 1h-6c-.6 0-1-.4-1-1V11l2-2"}],["path",{d:"m13 14 8-2"}],["path",{d:"m13 19 8-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kV=[["path",{d:"M7 20h10"}],["path",{d:"M10 20c5.5-2.5.8-6.4 3-10"}],["path",{d:"M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"}],["path",{d:"M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M17 12h-2l-2 5-2-10-2 5H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 8-8 8"}],["path",{d:"M16 16H8V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m8 8 8 8"}],["path",{d:"M16 8v8H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m12 8-4 4 4 4"}],["path",{d:"M16 12H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 8v8"}],["path",{d:"m8 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b0=[["path",{d:"M13 21h6a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6"}],["path",{d:"m3 21 9-9"}],["path",{d:"M9 21H3v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E0=[["path",{d:"M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"}],["path",{d:"m3 3 9 9"}],["path",{d:"M3 9V3h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S0=[["path",{d:"M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}],["path",{d:"m21 21-9-9"}],["path",{d:"M21 15v6h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C0=[["path",{d:"M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"}],["path",{d:"m21 3-9 9"}],["path",{d:"M15 3h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}],["path",{d:"m12 16 4-4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 16V8h8"}],["path",{d:"M16 16 8 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 8h8v8"}],["path",{d:"m8 16 8-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 8v8"}],["path",{d:"m8.5 14 7-4"}],["path",{d:"m8.5 10 7 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V0=[["path",{d:"M4 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2"}],["path",{d:"M10 22H8"}],["path",{d:"M16 22h-2"}],["circle",{cx:"8",cy:"8",r:"2"}],["path",{d:"M9.414 9.414 12 12"}],["path",{d:"M14.8 14.8 18 18"}],["circle",{cx:"8",cy:"16",r:"2"}],["path",{d:"m18 6-8.586 8.586"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gi=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 8h7"}],["path",{d:"M8 12h6"}],["path",{d:"M11 16h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P0=[["path",{d:"M21 10.656V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.344"}],["path",{d:"m9 11 3 3L22 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 10-4 4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m14 16-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m10 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m8 14 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z0=[["path",{d:"m10 9-3 3 3 3"}],["path",{d:"m14 15 3-3-3-3"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IV=[["path",{d:"M10 9.5 8 12l2 2.5"}],["path",{d:"M14 21h1"}],["path",{d:"m14 9.5 2 2.5-2 2.5"}],["path",{d:"M5 21a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2"}],["path",{d:"M9 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NV=[["path",{d:"M5 21a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2"}],["path",{d:"M9 21h1"}],["path",{d:"M14 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $0=[["path",{d:"M8 7v7"}],["path",{d:"M12 7v4"}],["path",{d:"M16 7v9"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M9 3h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M14 21h1"}],["path",{d:"M9 21h1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M3 14v1"}],["path",{d:"M3 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R0=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 3h1"}],["path",{d:"M9 21h2"}],["path",{d:"M14 3h1"}],["path",{d:"M3 9v1"}],["path",{d:"M21 9v2"}],["path",{d:"M3 14v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zV=[["path",{d:"M14 21h1"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M3 5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2"}],["path",{d:"M3 9v1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B0=[["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 3h1"}],["path",{d:"M9 21h1"}],["path",{d:"M14 3h1"}],["path",{d:"M14 21h1"}],["path",{d:"M3 9v1"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M21 14v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"16",y2:"16"}],["line",{x1:"12",x2:"12",y1:"8",y2:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 10h10"}],["path",{d:"M7 14h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M9 17c2 0 2.8-1 2.8-2.8V10c0-2 1-3.3 3.2-3"}],["path",{d:"M9 11.2h5.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7v10"}],["path",{d:"M11 7v10"}],["path",{d:"m15 7 2 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 7v7"}],["path",{d:"M12 7v4"}],["path",{d:"M16 7v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 16V8l4 4 4-4v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 8h10"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y0=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q0=[["path",{d:"M3.6 3.6A2 2 0 0 1 5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-.59 1.41"}],["path",{d:"M3 8.7V19a2 2 0 0 0 2 2h10.3"}],["path",{d:"m2 2 20 20"}],["path",{d:"M13 13a3 3 0 1 0 0-6H9v2"}],["path",{d:"M9 17v-2.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 17V7h4a3 3 0 0 1 0 6H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V1=[["path",{d:"M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"}],["path",{d:"M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const to=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eo=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7h10"}],["path",{d:"M10 7v10"}],["path",{d:"M16 17a2 2 0 0 1-2-2V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ao=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 12H9.5a2.5 2.5 0 0 1 0-5H17"}],["path",{d:"M12 7v10"}],["path",{d:"M16 7v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const io=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const no=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m9 8 6 4-6 4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ro=[["path",{d:"M12 7v4"}],["path",{d:"M7.998 9.003a5 5 0 1 0 8-.005"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $V=[["path",{d:"M7 12h2l2 5 2-10h4"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RV=[["path",{d:"M21 11a8 8 0 0 0-8-8"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const so=[["rect",{width:"20",height:"20",x:"2",y:"2",rx:"2"}],["circle",{cx:"8",cy:"8",r:"2"}],["path",{d:"M9.414 9.414 12 12"}],["path",{d:"M14.8 14.8 18 18"}],["circle",{cx:"8",cy:"16",r:"2"}],["path",{d:"m18 6-8.586 8.586"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oo=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M16 8.9V7H8l4 5-4 5h8v-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lo=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["line",{x1:"9",x2:"15",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ho=[["path",{d:"M8 19H5c-1 0-2-1-2-2V7c0-1 1-2 2-2h3"}],["path",{d:"M16 5h3c1 0 2 1 2 2v10c0 1-1 2-2 2h-3"}],["line",{x1:"12",x2:"12",y1:"4",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const co=[["path",{d:"M5 8V5c0-1 1-2 2-2h10c1 0 2 1 2 2v3"}],["path",{d:"M19 16v3c0 1-1 2-2 2H7c-1 0-2-1-2-2v-3"}],["line",{x1:"4",x2:"20",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BV=[["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}],["rect",{x:"8",y:"8",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FV=[["path",{d:"M4 10c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2"}],["path",{d:"M10 16c-1.1 0-2-.9-2-2v-4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2"}],["rect",{width:"8",height:"8",x:"14",y:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const po=[["path",{d:"m7 11 2-2-2-2"}],["path",{d:"M11 13h4"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uo=[["path",{d:"M18 21a6 6 0 0 0-12 0"}],["circle",{cx:"12",cy:"11",r:"4"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fo=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mo=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qV=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WV=[["path",{d:"M16 12v2a2 2 0 0 1-2 2H9a1 1 0 0 0-1 1v3a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2h0"}],["path",{d:"M4 16a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v3a1 1 0 0 1-1 1h-5a2 2 0 0 0-2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jV=[["path",{d:"M10 22a2 2 0 0 1-2-2"}],["path",{d:"M14 2a2 2 0 0 1 2 2"}],["path",{d:"M16 22h-2"}],["path",{d:"M2 10V8"}],["path",{d:"M2 4a2 2 0 0 1 2-2"}],["path",{d:"M20 8a2 2 0 0 1 2 2"}],["path",{d:"M22 14v2"}],["path",{d:"M22 20a2 2 0 0 1-2 2"}],["path",{d:"M4 16a2 2 0 0 1-2-2"}],["path",{d:"M8 10a2 2 0 0 1 2-2h5a1 1 0 0 1 1 1v5a2 2 0 0 1-2 2H9a1 1 0 0 1-1-1z"}],["path",{d:"M8 2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GV=[["path",{d:"M10 22a2 2 0 0 1-2-2"}],["path",{d:"M16 22h-2"}],["path",{d:"M16 4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-5a2 2 0 0 1 2-2h5a1 1 0 0 0 1-1z"}],["path",{d:"M20 8a2 2 0 0 1 2 2"}],["path",{d:"M22 14v2"}],["path",{d:"M22 20a2 2 0 0 1-2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZV=[["path",{d:"M4 16a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v3a1 1 0 0 0 1 1h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-3a1 1 0 0 0-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XV=[["path",{d:"M13.77 3.043a34 34 0 0 0-3.54 0"}],["path",{d:"M13.771 20.956a33 33 0 0 1-3.541.001"}],["path",{d:"M20.18 17.74c-.51 1.15-1.29 1.93-2.439 2.44"}],["path",{d:"M20.18 6.259c-.51-1.148-1.291-1.929-2.44-2.438"}],["path",{d:"M20.957 10.23a33 33 0 0 1 0 3.54"}],["path",{d:"M3.043 10.23a34 34 0 0 0 .001 3.541"}],["path",{d:"M6.26 20.179c-1.15-.508-1.93-1.29-2.44-2.438"}],["path",{d:"M6.26 3.82c-1.149.51-1.93 1.291-2.44 2.44"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UV=[["path",{d:"M12 3c7.2 0 9 1.8 9 9s-1.8 9-9 9-9-1.8-9-9 1.8-9 9-9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YV=[["path",{d:"M15.236 22a3 3 0 0 0-2.2-5"}],["path",{d:"M16 20a3 3 0 0 1 3-3h1a2 2 0 0 0 2-2v-2a4 4 0 0 0-4-4V4"}],["path",{d:"M18 13h.01"}],["path",{d:"M18 6a4 4 0 0 0-4 4 7 7 0 0 0-7 7c0-5 4-5 4-10.5a4.5 4.5 0 1 0-9 0 2.5 2.5 0 0 0 5 0C7 10 3 11 3 17c0 2.8 2.2 5 5 5h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KV=[["path",{d:"M14 13V8.5C14 7 15 7 15 5a3 3 0 0 0-6 0c0 2 1 2 1 3.5V13"}],["path",{d:"M20 15.5a2.5 2.5 0 0 0-2.5-2.5h-11A2.5 2.5 0 0 0 4 15.5V17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1z"}],["path",{d:"M5 22h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QV=[["path",{d:"M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JV=[["path",{d:"M8.34 8.34 2 9.27l5 4.87L5.82 21 12 17.77 18.18 21l-.59-3.43"}],["path",{d:"M18.42 12.76 22 9.27l-6.91-1L12 2l-1.44 2.91"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tP=[["path",{d:"M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eP=[["line",{x1:"18",x2:"18",y1:"20",y2:"4"}],["polygon",{points:"14,20 4,12 14,4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aP=[["line",{x1:"6",x2:"6",y1:"4",y2:"20"}],["polygon",{points:"10,4 20,12 10,20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iP=[["path",{d:"M15.5 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V8.5L15.5 3Z"}],["path",{d:"M14 3v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 13h.01"}],["path",{d:"M16 13h.01"}],["path",{d:"M10 16s.8 1 2 1c1.3 0 2-1 2-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nP=[["path",{d:"M11 2v2"}],["path",{d:"M5 2v2"}],["path",{d:"M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"}],["path",{d:"M8 15a6 6 0 0 0 12 0v-3"}],["circle",{cx:"20",cy:"10",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rP=[["path",{d:"M16 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8Z"}],["path",{d:"M15 3v4a2 2 0 0 0 2 2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sP=[["path",{d:"m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"}],["path",{d:"M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"}],["path",{d:"M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"}],["path",{d:"M2 7h20"}],["path",{d:"M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oP=[["rect",{width:"20",height:"6",x:"2",y:"4",rx:"2"}],["rect",{width:"20",height:"6",x:"2",y:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lP=[["rect",{width:"6",height:"20",x:"4",y:"2",rx:"2"}],["rect",{width:"6",height:"20",x:"14",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hP=[["path",{d:"M16 4H9a3 3 0 0 0-2.83 4"}],["path",{d:"M14 12a4 4 0 0 1 0 8H6"}],["line",{x1:"4",x2:"20",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dP=[["path",{d:"m4 5 8 8"}],["path",{d:"m12 5-8 8"}],["path",{d:"M20 19h-4c0-1.5.44-2 1.5-2.5S20 15.33 20 14c0-.47-.17-.93-.48-1.29a2.11 2.11 0 0 0-2.62-.44c-.42.24-.74.62-.9 1.07"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cP=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 4h.01"}],["path",{d:"M20 12h.01"}],["path",{d:"M12 20h.01"}],["path",{d:"M4 12h.01"}],["path",{d:"M17.657 6.343h.01"}],["path",{d:"M17.657 17.657h.01"}],["path",{d:"M6.343 17.657h.01"}],["path",{d:"M6.343 6.343h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pP=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 3v1"}],["path",{d:"M12 20v1"}],["path",{d:"M3 12h1"}],["path",{d:"M20 12h1"}],["path",{d:"m18.364 5.636-.707.707"}],["path",{d:"m6.343 17.657-.707.707"}],["path",{d:"m5.636 5.636.707.707"}],["path",{d:"m17.657 17.657.707.707"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uP=[["path",{d:"M12 2v2"}],["path",{d:"M13 8.129A4 4 0 0 1 15.873 11"}],["path",{d:"m19 5-1.256 1.256"}],["path",{d:"M20 12h2"}],["path",{d:"M9 8a5 5 0 1 0 7 7 7 7 0 1 1-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fP=[["path",{d:"M10 21v-1"}],["path",{d:"M10 4V3"}],["path",{d:"M10 9a3 3 0 0 0 0 6"}],["path",{d:"m14 20 1.25-2.5L18 18"}],["path",{d:"m14 4 1.25 2.5L18 6"}],["path",{d:"m17 21-3-6 1.5-3H22"}],["path",{d:"m17 3-3 6 1.5 3"}],["path",{d:"M2 12h1"}],["path",{d:"m20 10-1.5 2 1.5 2"}],["path",{d:"m3.64 18.36.7-.7"}],["path",{d:"m4.34 6.34-.7-.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MP=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 2v2"}],["path",{d:"M12 20v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"m17.66 17.66 1.41 1.41"}],["path",{d:"M2 12h2"}],["path",{d:"M20 12h2"}],["path",{d:"m6.34 17.66-1.41 1.41"}],["path",{d:"m19.07 4.93-1.41 1.41"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mP=[["path",{d:"M12 2v8"}],["path",{d:"m4.93 10.93 1.41 1.41"}],["path",{d:"M2 18h2"}],["path",{d:"M20 18h2"}],["path",{d:"m19.07 10.93-1.41 1.41"}],["path",{d:"M22 22H2"}],["path",{d:"m8 6 4-4 4 4"}],["path",{d:"M16 18a4 4 0 0 0-8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vP=[["path",{d:"M12 10V2"}],["path",{d:"m4.93 10.93 1.41 1.41"}],["path",{d:"M2 18h2"}],["path",{d:"M20 18h2"}],["path",{d:"m19.07 10.93-1.41 1.41"}],["path",{d:"M22 22H2"}],["path",{d:"m16 6-4 4-4-4"}],["path",{d:"M16 18a4 4 0 0 0-8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gP=[["path",{d:"m4 19 8-8"}],["path",{d:"m12 19-8-8"}],["path",{d:"M20 12h-4c0-1.5.442-2 1.5-2.5S20 8.334 20 7.002c0-.472-.17-.93-.484-1.29a2.105 2.105 0 0 0-2.617-.436c-.42.239-.738.614-.899 1.06"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yP=[["path",{d:"M11 17a4 4 0 0 1-8 0V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2Z"}],["path",{d:"M16.7 13H19a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H7"}],["path",{d:"M 7 17h.01"}],["path",{d:"m11 8 2.3-2.3a2.4 2.4 0 0 1 3.404.004L18.6 7.6a2.4 2.4 0 0 1 .026 3.434L9.9 19.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xP=[["path",{d:"M10 21V3h8"}],["path",{d:"M6 16h9"}],["path",{d:"M10 9.5h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wP=[["path",{d:"M11 19H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5"}],["path",{d:"M13 5h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-5"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"m18 22-3-3 3-3"}],["path",{d:"m6 2 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bP=[["polyline",{points:"14.5 17.5 3 6 3 3 6 3 17.5 14.5"}],["line",{x1:"13",x2:"19",y1:"19",y2:"13"}],["line",{x1:"16",x2:"20",y1:"16",y2:"20"}],["line",{x1:"19",x2:"21",y1:"21",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EP=[["polyline",{points:"14.5 17.5 3 6 3 3 6 3 17.5 14.5"}],["line",{x1:"13",x2:"19",y1:"19",y2:"13"}],["line",{x1:"16",x2:"20",y1:"16",y2:"20"}],["line",{x1:"19",x2:"21",y1:"21",y2:"19"}],["polyline",{points:"14.5 6.5 18 3 21 3 21 6 17.5 9.5"}],["line",{x1:"5",x2:"9",y1:"14",y2:"18"}],["line",{x1:"7",x2:"4",y1:"17",y2:"20"}],["line",{x1:"3",x2:"5",y1:"19",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SP=[["path",{d:"m18 2 4 4"}],["path",{d:"m17 7 3-3"}],["path",{d:"M19 9 8.7 19.3c-1 1-2.5 1-3.4 0l-.6-.6c-1-1-1-2.5 0-3.4L15 5"}],["path",{d:"m9 11 4 4"}],["path",{d:"m5 19-3 3"}],["path",{d:"m14 4 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CP=[["path",{d:"M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AP=[["path",{d:"M12 21v-6"}],["path",{d:"M12 9V3"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TP=[["path",{d:"M12 15V9"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _P=[["path",{d:"M14 14v2"}],["path",{d:"M14 20v2"}],["path",{d:"M14 2v2"}],["path",{d:"M14 8v2"}],["path",{d:"M2 15h8"}],["path",{d:"M2 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H2"}],["path",{d:"M2 9h8"}],["path",{d:"M22 15h-4"}],["path",{d:"M22 3h-2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h2"}],["path",{d:"M22 9h-4"}],["path",{d:"M5 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HP=[["path",{d:"M16 12H3"}],["path",{d:"M16 18H3"}],["path",{d:"M16 6H3"}],["path",{d:"M21 12h.01"}],["path",{d:"M21 18h.01"}],["path",{d:"M21 6h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LP=[["path",{d:"M15 3v18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 9H3"}],["path",{d:"M21 15H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VP=[["path",{d:"M14 10h2"}],["path",{d:"M15 22v-8"}],["path",{d:"M15 2v4"}],["path",{d:"M2 10h2"}],["path",{d:"M20 10h2"}],["path",{d:"M3 19h18"}],["path",{d:"M3 22v-6a2 2 135 0 1 2-2h14a2 2 45 0 1 2 2v6"}],["path",{d:"M3 2v2a2 2 45 0 0 2 2h14a2 2 135 0 0 2-2V2"}],["path",{d:"M8 10h2"}],["path",{d:"M9 22v-8"}],["path",{d:"M9 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PP=[["path",{d:"M12 3v18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M3 15h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DP=[["rect",{width:"10",height:"14",x:"3",y:"8",rx:"2"}],["path",{d:"M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"}],["path",{d:"M8 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OP=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2",ry:"2"}],["line",{x1:"12",x2:"12.01",y1:"18",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kP=[["circle",{cx:"7",cy:"7",r:"5"}],["circle",{cx:"17",cy:"17",r:"5"}],["path",{d:"M12 17h10"}],["path",{d:"m3.46 10.54 7.08-7.08"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IP=[["path",{d:"M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"}],["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NP=[["path",{d:"m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19"}],["path",{d:"M9.586 5.586A2 2 0 0 0 8.172 5H3a1 1 0 0 0-1 1v5.172a2 2 0 0 0 .586 1.414L8.29 18.29a2.426 2.426 0 0 0 3.42 0l3.58-3.58a2.426 2.426 0 0 0 0-3.42z"}],["circle",{cx:"6.5",cy:"9.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zP=[["path",{d:"M4 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $P=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RP=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BP=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}],["path",{d:"M19 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FP=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}],["path",{d:"M19 4v16"}],["path",{d:"M22 6 2 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qP=[["circle",{cx:"17",cy:"4",r:"2"}],["path",{d:"M15.59 5.41 5.41 15.59"}],["circle",{cx:"4",cy:"17",r:"2"}],["path",{d:"M12 22s-4-9-1.5-11.5S22 12 22 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WP=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"6"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jP=[["path",{d:"m10.065 12.493-6.18 1.318a.934.934 0 0 1-1.108-.702l-.537-2.15a1.07 1.07 0 0 1 .691-1.265l13.504-4.44"}],["path",{d:"m13.56 11.747 4.332-.924"}],["path",{d:"m16 21-3.105-6.21"}],["path",{d:"M16.485 5.94a2 2 0 0 1 1.455-2.425l1.09-.272a1 1 0 0 1 1.212.727l1.515 6.06a1 1 0 0 1-.727 1.213l-1.09.272a2 2 0 0 1-2.425-1.455z"}],["path",{d:"m6.158 8.633 1.114 4.456"}],["path",{d:"m8 21 3.105-6.21"}],["circle",{cx:"12",cy:"13",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GP=[["circle",{cx:"4",cy:"4",r:"2"}],["path",{d:"m14 5 3-3 3 3"}],["path",{d:"m14 10 3-3 3 3"}],["path",{d:"M17 14V2"}],["path",{d:"M17 14H7l-5 8h20Z"}],["path",{d:"M8 14v8"}],["path",{d:"m9 14 5 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZP=[["path",{d:"M3.5 21 14 3"}],["path",{d:"M20.5 21 10 3"}],["path",{d:"M15.5 21 12 15l-3.5 6"}],["path",{d:"M2 21h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XP=[["path",{d:"M12 19h8"}],["path",{d:"m4 17 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UP=[["path",{d:"M14.5 2v17.5c0 1.4-1.1 2.5-2.5 2.5c-1.4 0-2.5-1.1-2.5-2.5V2"}],["path",{d:"M8.5 2h7"}],["path",{d:"M14.5 16h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YP=[["path",{d:"M9 2v17.5A2.5 2.5 0 0 1 6.5 22A2.5 2.5 0 0 1 4 19.5V2"}],["path",{d:"M20 2v17.5a2.5 2.5 0 0 1-2.5 2.5a2.5 2.5 0 0 1-2.5-2.5V2"}],["path",{d:"M3 2h7"}],["path",{d:"M14 2h7"}],["path",{d:"M9 16H4"}],["path",{d:"M20 16h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mo=[["path",{d:"M21 7 6.82 21.18a2.83 2.83 0 0 1-3.99-.01a2.83 2.83 0 0 1 0-4L17 3"}],["path",{d:"m16 2 6 6"}],["path",{d:"M12 16H4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KP=[["path",{d:"M12 20h-1a2 2 0 0 1-2-2 2 2 0 0 1-2 2H6"}],["path",{d:"M13 8h7a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-7"}],["path",{d:"M5 16H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1"}],["path",{d:"M6 4h1a2 2 0 0 1 2 2 2 2 0 0 1 2-2h1"}],["path",{d:"M9 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QP=[["path",{d:"M17 22h-1a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h1"}],["path",{d:"M7 22h1a4 4 0 0 0 4-4v-1"}],["path",{d:"M7 2h1a4 4 0 0 1 4 4v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JP=[["path",{d:"M17 6H3"}],["path",{d:"M21 12H8"}],["path",{d:"M21 18H8"}],["path",{d:"M3 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tD=[["path",{d:"M21 6H3"}],["path",{d:"M10 12H3"}],["path",{d:"M10 18H3"}],["circle",{cx:"17",cy:"15",r:"3"}],["path",{d:"m21 19-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vo=[["path",{d:"M14 21h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M3 9v1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h6"}],["path",{d:"M7 8h8"}],["path",{d:"M9 21h1"}],["path",{d:"M9 3h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eD=[["path",{d:"M15 18H3"}],["path",{d:"M17 6H3"}],["path",{d:"M21 12H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aD=[["path",{d:"m10 20-1.25-2.5L6 18"}],["path",{d:"M10 4 8.75 6.5 6 6"}],["path",{d:"M10.585 15H10"}],["path",{d:"M2 12h6.5L10 9"}],["path",{d:"M20 14.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0z"}],["path",{d:"m4 10 1.5 2L4 14"}],["path",{d:"m7 21 3-6-1.5-3"}],["path",{d:"m7 3 3 6h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iD=[["path",{d:"M12 9a4 4 0 0 0-2 7.5"}],["path",{d:"M12 3v2"}],["path",{d:"m6.6 18.4-1.4 1.4"}],["path",{d:"M20 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"}],["path",{d:"M4 13H2"}],["path",{d:"M6.34 7.34 4.93 5.93"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nD=[["path",{d:"M2 10s3-3 3-8"}],["path",{d:"M22 10s-3-3-3-8"}],["path",{d:"M10 2c0 4.4-3.6 8-8 8"}],["path",{d:"M14 2c0 4.4 3.6 8 8 8"}],["path",{d:"M2 10s2 2 2 5"}],["path",{d:"M22 10s-2 2-2 5"}],["path",{d:"M8 15h8"}],["path",{d:"M2 22v-1a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1"}],["path",{d:"M14 22v-1a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rD=[["path",{d:"M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sD=[["path",{d:"M17 14V2"}],["path",{d:"M9 18.12 10 14H4.17a2 2 0 0 1-1.92-2.56l2.33-8A2 2 0 0 1 6.5 2H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.76a2 2 0 0 0-1.79 1.11L12 22a3.13 3.13 0 0 1-3-3.88Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oD=[["path",{d:"M7 10v12"}],["path",{d:"M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 12h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dD=[["path",{d:"M2 9a3 3 0 1 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 1 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 9h.01"}],["path",{d:"m15 9-6 6"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 12h6"}],["path",{d:"M12 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9.5 14.5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9.5 14.5 5-5"}],["path",{d:"m9.5 9.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fD=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M13 5v2"}],["path",{d:"M13 17v2"}],["path",{d:"M13 11v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MD=[["path",{d:"M10.5 17h1.227a2 2 0 0 0 1.345-.52L18 12"}],["path",{d:"m12 13.5 3.75.5"}],["path",{d:"m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"}],["path",{d:"M6 10V8"}],["path",{d:"M6 14v1"}],["path",{d:"M6 19v2"}],["rect",{x:"2",y:"8",width:"20",height:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mD=[["path",{d:"m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"}],["path",{d:"M6 10V8"}],["path",{d:"M6 14v1"}],["path",{d:"M6 19v2"}],["rect",{x:"2",y:"8",width:"20",height:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vD=[["path",{d:"M10 2h4"}],["path",{d:"M4.6 11a8 8 0 0 0 1.7 8.7 8 8 0 0 0 8.7 1.7"}],["path",{d:"M7.4 7.4a8 8 0 0 1 10.3 1 8 8 0 0 1 .9 10.2"}],["path",{d:"m2 2 20 20"}],["path",{d:"M12 12v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gD=[["path",{d:"M10 2h4"}],["path",{d:"M12 14v-4"}],["path",{d:"M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17.6"}],["path",{d:"M9 17H4v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yD=[["line",{x1:"10",x2:"14",y1:"2",y2:"2"}],["line",{x1:"12",x2:"15",y1:"14",y2:"11"}],["circle",{cx:"12",cy:"14",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xD=[["circle",{cx:"9",cy:"12",r:"3"}],["rect",{width:"20",height:"14",x:"2",y:"5",rx:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wD=[["circle",{cx:"15",cy:"12",r:"3"}],["rect",{width:"20",height:"14",x:"2",y:"5",rx:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bD=[["path",{d:"M7 12h13a1 1 0 0 1 1 1 5 5 0 0 1-5 5h-.598a.5.5 0 0 0-.424.765l1.544 2.47a.5.5 0 0 1-.424.765H5.402a.5.5 0 0 1-.424-.765L7 18"}],["path",{d:"M8 18a5 5 0 0 1-5-5V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ED=[["path",{d:"M21 4H3"}],["path",{d:"M18 8H6"}],["path",{d:"M19 12H9"}],["path",{d:"M16 16h-6"}],["path",{d:"M11 20H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SD=[["path",{d:"M10 15h4"}],["path",{d:"m14.817 10.995-.971-1.45 1.034-1.232a2 2 0 0 0-2.025-3.238l-1.82.364L9.91 3.885a2 2 0 0 0-3.625.748L6.141 6.55l-1.725.426a2 2 0 0 0-.19 3.756l.657.27"}],["path",{d:"m18.822 10.995 2.26-5.38a1 1 0 0 0-.557-1.318L16.954 2.9a1 1 0 0 0-1.281.533l-.924 2.122"}],["path",{d:"M4 12.006A1 1 0 0 1 4.994 11H19a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CD=[["ellipse",{cx:"12",cy:"11",rx:"3",ry:"2"}],["ellipse",{cx:"12",cy:"12.5",rx:"10",ry:"8.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AD=[["path",{d:"M12 20v-6"}],["path",{d:"M19.656 14H22"}],["path",{d:"M2 14h12"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"}],["path",{d:"M9.656 4H20a2 2 0 0 1 2 2v10.344"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TD=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M2 14h20"}],["path",{d:"M12 20v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _D=[["path",{d:"M18.2 12.27 20 6H4l1.8 6.27a1 1 0 0 0 .95.73h10.5a1 1 0 0 0 .96-.73Z"}],["path",{d:"M8 13v9"}],["path",{d:"M16 22v-9"}],["path",{d:"m9 6 1 7"}],["path",{d:"m15 6-1 7"}],["path",{d:"M12 6V2"}],["path",{d:"M13 2h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HD=[["rect",{width:"18",height:"12",x:"3",y:"8",rx:"1"}],["path",{d:"M10 8V5c0-.6-.4-1-1-1H6a1 1 0 0 0-1 1v3"}],["path",{d:"M19 8V5c0-.6-.4-1-1-1h-3a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LD=[["path",{d:"m10 11 11 .9a1 1 0 0 1 .8 1.1l-.665 4.158a1 1 0 0 1-.988.842H20"}],["path",{d:"M16 18h-5"}],["path",{d:"M18 5a1 1 0 0 0-1 1v5.573"}],["path",{d:"M3 4h8.129a1 1 0 0 1 .99.863L13 11.246"}],["path",{d:"M4 11V4"}],["path",{d:"M7 15h.01"}],["path",{d:"M8 10.1V4"}],["circle",{cx:"18",cy:"18",r:"2"}],["circle",{cx:"7",cy:"15",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VD=[["path",{d:"M16.05 10.966a5 2.5 0 0 1-8.1 0"}],["path",{d:"m16.923 14.049 4.48 2.04a1 1 0 0 1 .001 1.831l-8.574 3.9a2 2 0 0 1-1.66 0l-8.574-3.91a1 1 0 0 1 0-1.83l4.484-2.04"}],["path",{d:"M16.949 14.14a5 2.5 0 1 1-9.9 0L10.063 3.5a2 2 0 0 1 3.874 0z"}],["path",{d:"M9.194 6.57a5 2.5 0 0 0 5.61 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PD=[["path",{d:"M2 22V12a10 10 0 1 1 20 0v10"}],["path",{d:"M15 6.8v1.4a3 2.8 0 1 1-6 0V6.8"}],["path",{d:"M10 15h.01"}],["path",{d:"M14 15h.01"}],["path",{d:"M10 19a4 4 0 0 1-4-4v-3a6 6 0 1 1 12 0v3a4 4 0 0 1-4 4Z"}],["path",{d:"m9 19-2 3"}],["path",{d:"m15 19 2 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DD=[["path",{d:"M8 3.1V7a4 4 0 0 0 8 0V3.1"}],["path",{d:"m9 15-1-1"}],["path",{d:"m15 15 1-1"}],["path",{d:"M9 19c-2.8 0-5-2.2-5-5v-4a8 8 0 0 1 16 0v4c0 2.8-2.2 5-5 5Z"}],["path",{d:"m8 19-2 3"}],["path",{d:"m16 19 2 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const go=[["rect",{width:"16",height:"16",x:"4",y:"3",rx:"2"}],["path",{d:"M4 11h16"}],["path",{d:"M12 3v8"}],["path",{d:"m8 19-2 3"}],["path",{d:"m18 22-2-3"}],["path",{d:"M8 15h.01"}],["path",{d:"M16 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OD=[["path",{d:"M2 17 17 2"}],["path",{d:"m2 14 8 8"}],["path",{d:"m5 11 8 8"}],["path",{d:"m8 8 8 8"}],["path",{d:"m11 5 8 8"}],["path",{d:"m14 2 8 8"}],["path",{d:"M7 22 22 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kD=[["path",{d:"M12 16v6"}],["path",{d:"M14 20h-4"}],["path",{d:"M18 2h4v4"}],["path",{d:"m2 2 7.17 7.17"}],["path",{d:"M2 5.355V2h3.357"}],["path",{d:"m22 2-7.17 7.17"}],["path",{d:"M8 5 5 8"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ID=[["path",{d:"M3 6h18"}],["path",{d:"M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"}],["path",{d:"M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"}],["line",{x1:"10",x2:"10",y1:"11",y2:"17"}],["line",{x1:"14",x2:"14",y1:"11",y2:"17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ND=[["path",{d:"M3 6h18"}],["path",{d:"M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"}],["path",{d:"M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zD=[["path",{d:"M8 19a4 4 0 0 1-2.24-7.32A3.5 3.5 0 0 1 9 6.03V6a3 3 0 1 1 6 0v.04a3.5 3.5 0 0 1 3.24 5.65A4 4 0 0 1 16 19Z"}],["path",{d:"M12 19v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yo=[["path",{d:"M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"}],["path",{d:"M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"}],["path",{d:"M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35"}],["path",{d:"M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $D=[["path",{d:"m17 14 3 3.3a1 1 0 0 1-.7 1.7H4.7a1 1 0 0 1-.7-1.7L7 14h-.3a1 1 0 0 1-.7-1.7L9 9h-.2A1 1 0 0 1 8 7.3L12 3l4 4.3a1 1 0 0 1-.8 1.7H15l3 3.3a1 1 0 0 1-.7 1.7H17Z"}],["path",{d:"M12 22v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RD=[["path",{d:"M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z"}],["path",{d:"M7 16v6"}],["path",{d:"M13 19v3"}],["path",{d:"M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BD=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["rect",{width:"3",height:"9",x:"7",y:"7"}],["rect",{width:"3",height:"5",x:"14",y:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FD=[["path",{d:"M16 17h6v-6"}],["path",{d:"m22 17-8.5-8.5-5 5L2 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qD=[["path",{d:"M14.828 14.828 21 21"}],["path",{d:"M21 16v5h-5"}],["path",{d:"m21 3-9 9-4-4-6 6"}],["path",{d:"M21 8V3h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WD=[["path",{d:"M16 7h6v6"}],["path",{d:"m22 7-8.5 8.5-5-5L2 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xo=[["path",{d:"m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"}],["path",{d:"M12 9v4"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jD=[["path",{d:"M10.17 4.193a2 2 0 0 1 3.666.013"}],["path",{d:"M14 21h2"}],["path",{d:"m15.874 7.743 1 1.732"}],["path",{d:"m18.849 12.952 1 1.732"}],["path",{d:"M21.824 18.18a2 2 0 0 1-1.835 2.824"}],["path",{d:"M4.024 21a2 2 0 0 1-1.839-2.839"}],["path",{d:"m5.136 12.952-1 1.732"}],["path",{d:"M8 21h2"}],["path",{d:"m8.102 7.743-1 1.732"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GD=[["path",{d:"M22 18a2 2 0 0 1-2 2H3c-1.1 0-1.3-.6-.4-1.3L20.4 4.3c.9-.7 1.6-.4 1.6.7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZD=[["path",{d:"M13.73 4a2 2 0 0 0-3.46 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XD=[["path",{d:"M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"}],["path",{d:"M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"}],["path",{d:"M18 9h1.5a1 1 0 0 0 0-5H18"}],["path",{d:"M4 22h16"}],["path",{d:"M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"}],["path",{d:"M6 9H4.5a1 1 0 0 1 0-5H6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UD=[["path",{d:"M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"}],["path",{d:"M15 18H9"}],["path",{d:"M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"}],["circle",{cx:"17",cy:"18",r:"2"}],["circle",{cx:"7",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YD=[["path",{d:"M14 19V7a2 2 0 0 0-2-2H9"}],["path",{d:"M15 19H9"}],["path",{d:"M19 19h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L18.3 9.38a1 1 0 0 0-.78-.38H14"}],["path",{d:"M2 13v5a1 1 0 0 0 1 1h2"}],["path",{d:"M4 3 2.15 5.15a.495.495 0 0 0 .35.86h2.15a.47.47 0 0 1 .35.86L3 9.02"}],["circle",{cx:"17",cy:"19",r:"2"}],["circle",{cx:"7",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KD=[["path",{d:"m12 10 2 4v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3a8 8 0 1 0-16 0v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3l2-4h4Z"}],["path",{d:"M4.82 7.9 8 10"}],["path",{d:"M15.18 7.9 12 10"}],["path",{d:"M16.93 10H20a2 2 0 0 1 0 4H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QD=[["path",{d:"M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z"}],["path",{d:"M7 21h10"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wo=[["path",{d:"M7 21h10"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JD=[["path",{d:"m17 2-5 5-5-5"}],["rect",{width:"20",height:"15",x:"2",y:"7",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tO=[["path",{d:"M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eO=[["path",{d:"M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aO=[["path",{d:"M12 4v16"}],["path",{d:"M4 7V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2"}],["path",{d:"M9 20h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iO=[["path",{d:"M14 16.5a.5.5 0 0 0 .5.5h.5a2 2 0 0 1 0 4H9a2 2 0 0 1 0-4h.5a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V8a2 2 0 0 1-4 0V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-4 0v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nO=[["path",{d:"M12 2v1"}],["path",{d:"M15.5 21a1.85 1.85 0 0 1-3.5-1v-8H2a10 10 0 0 1 3.428-6.575"}],["path",{d:"M17.5 12H22A10 10 0 0 0 9.004 3.455"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rO=[["path",{d:"M22 12a10.06 10.06 1 0 0-20 0Z"}],["path",{d:"M12 12v8a2 2 0 0 0 4 0"}],["path",{d:"M12 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sO=[["path",{d:"M6 4v6a6 6 0 0 0 12 0V4"}],["line",{x1:"4",x2:"20",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oO=[["path",{d:"M9 14 4 9l5-5"}],["path",{d:"M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5a5.5 5.5 0 0 1-5.5 5.5H11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lO=[["path",{d:"M21 17a9 9 0 0 0-15-6.7L3 13"}],["path",{d:"M3 7v6h6"}],["circle",{cx:"12",cy:"17",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hO=[["path",{d:"M3 7v6h6"}],["path",{d:"M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dO=[["path",{d:"M16 12h6"}],["path",{d:"M8 12H2"}],["path",{d:"M12 2v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 20v2"}],["path",{d:"m19 15 3-3-3-3"}],["path",{d:"m5 9-3 3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cO=[["path",{d:"M12 22v-6"}],["path",{d:"M12 8V2"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}],["path",{d:"m15 19-3 3-3-3"}],["path",{d:"m15 5-3-3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pO=[["rect",{width:"8",height:"6",x:"5",y:"4",rx:"1"}],["rect",{width:"8",height:"6",x:"11",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bo=[["path",{d:"M14 21v-3a2 2 0 0 0-4 0v3"}],["path",{d:"M18 12h.01"}],["path",{d:"M18 16h.01"}],["path",{d:"M22 7a1 1 0 0 0-1-1h-2a2 2 0 0 1-1.143-.359L13.143 2.36a2 2 0 0 0-2.286-.001L6.143 5.64A2 2 0 0 1 5 6H3a1 1 0 0 0-1 1v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2z"}],["path",{d:"M6 12h.01"}],["path",{d:"M6 16h.01"}],["circle",{cx:"12",cy:"10",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uO=[["path",{d:"M15 7h2a5 5 0 0 1 0 10h-2m-6 0H7A5 5 0 0 1 7 7h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fO=[["path",{d:"m18.84 12.25 1.72-1.71h-.02a5.004 5.004 0 0 0-.12-7.07 5.006 5.006 0 0 0-6.95 0l-1.72 1.71"}],["path",{d:"m5.17 11.75-1.71 1.71a5.004 5.004 0 0 0 .12 7.07 5.006 5.006 0 0 0 6.95 0l1.71-1.71"}],["line",{x1:"8",x2:"8",y1:"2",y2:"5"}],["line",{x1:"2",x2:"5",y1:"8",y2:"8"}],["line",{x1:"16",x2:"16",y1:"19",y2:"22"}],["line",{x1:"19",x2:"22",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MO=[["path",{d:"m19 5 3-3"}],["path",{d:"m2 22 3-3"}],["path",{d:"M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z"}],["path",{d:"M7.5 13.5 10 11"}],["path",{d:"M10.5 16.5 13 14"}],["path",{d:"m12 6 6 6 2.3-2.3a2.4 2.4 0 0 0 0-3.4l-2.6-2.6a2.4 2.4 0 0 0-3.4 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mO=[["path",{d:"M12 3v12"}],["path",{d:"m17 8-5-5-5 5"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vO=[["circle",{cx:"10",cy:"7",r:"1"}],["circle",{cx:"4",cy:"20",r:"1"}],["path",{d:"M4.7 19.3 19 5"}],["path",{d:"m21 3-3 1 2 2Z"}],["path",{d:"M9.26 7.68 5 12l2 5"}],["path",{d:"m10 14 5 2 3.5-3.5"}],["path",{d:"m18 12 1-1 1 1-1 1Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gO=[["path",{d:"m16 11 2 2 4-4"}],["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yO=[["circle",{cx:"10",cy:"7",r:"4"}],["path",{d:"M10.3 15H7a4 4 0 0 0-4 4v2"}],["path",{d:"M15 15.5V14a2 2 0 0 1 4 0v1.5"}],["rect",{width:"8",height:"5",x:"13",y:"16",rx:".899"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xO=[["path",{d:"M10 15H6a4 4 0 0 0-4 4v2"}],["path",{d:"m14.305 16.53.923-.382"}],["path",{d:"m15.228 13.852-.923-.383"}],["path",{d:"m16.852 12.228-.383-.923"}],["path",{d:"m16.852 17.772-.383.924"}],["path",{d:"m19.148 12.228.383-.923"}],["path",{d:"m19.53 18.696-.382-.924"}],["path",{d:"m20.772 13.852.924-.383"}],["path",{d:"m20.772 16.148.924.383"}],["circle",{cx:"18",cy:"15",r:"3"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wO=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"22",x2:"16",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bO=[["path",{d:"M11.5 15H7a4 4 0 0 0-4 4v2"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EO=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"19",x2:"19",y1:"8",y2:"14"}],["line",{x1:"22",x2:"16",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eo=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const So=[["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"M2 21a8 8 0 0 1 10.434-7.62"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["circle",{cx:"10",cy:"8",r:"5"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Co=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M22 19h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SO=[["path",{d:"M2 21a8 8 0 0 1 10.821-7.487"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"8",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ao=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M19 16v6"}],["path",{d:"M22 19h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CO=[["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M2 21a8 8 0 0 1 10.434-7.62"}],["circle",{cx:"18",cy:"18",r:"3"}],["path",{d:"m22 22-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const To=[["path",{d:"M2 21a8 8 0 0 1 11.873-7"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"m17 17 5 5"}],["path",{d:"m22 17-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _o=[["circle",{cx:"12",cy:"8",r:"5"}],["path",{d:"M20 21a8 8 0 0 0-16 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AO=[["circle",{cx:"10",cy:"7",r:"4"}],["path",{d:"M10.3 15H7a4 4 0 0 0-4 4v2"}],["circle",{cx:"17",cy:"17",r:"3"}],["path",{d:"m21 21-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TO=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"17",x2:"22",y1:"8",y2:"13"}],["line",{x1:"22",x2:"17",y1:"8",y2:"13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _O=[["path",{d:"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"}],["circle",{cx:"12",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ho=[["path",{d:"M18 21a8 8 0 0 0-16 0"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HO=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["path",{d:"M16 3.128a4 4 0 0 1 0 7.744"}],["path",{d:"M22 21v-2a4 4 0 0 0-3-3.87"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lo=[["path",{d:"m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"}],["path",{d:"M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"}],["path",{d:"m2.1 21.8 6.4-6.3"}],["path",{d:"m19 5-7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vo=[["path",{d:"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"}],["path",{d:"M7 2v20"}],["path",{d:"M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LO=[["path",{d:"M12 2v20"}],["path",{d:"M2 5h20"}],["path",{d:"M3 3v2"}],["path",{d:"M7 3v2"}],["path",{d:"M17 3v2"}],["path",{d:"M21 3v2"}],["path",{d:"m19 5-7 7-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VO=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}],["path",{d:"m7.9 7.9 2.7 2.7"}],["circle",{cx:"16.5",cy:"7.5",r:".5",fill:"currentColor"}],["path",{d:"m13.4 10.6 2.7-2.7"}],["circle",{cx:"7.5",cy:"16.5",r:".5",fill:"currentColor"}],["path",{d:"m7.9 16.1 2.7-2.7"}],["circle",{cx:"16.5",cy:"16.5",r:".5",fill:"currentColor"}],["path",{d:"m13.4 13.4 2.7 2.7"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PO=[["path",{d:"M8 21s-4-3-4-9 4-9 4-9"}],["path",{d:"M16 3s4 3 4 9-4 9-4 9"}],["line",{x1:"15",x2:"9",y1:"9",y2:"15"}],["line",{x1:"9",x2:"15",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DO=[["path",{d:"M19.5 7a24 24 0 0 1 0 10"}],["path",{d:"M4.5 7a24 24 0 0 0 0 10"}],["path",{d:"M7 19.5a24 24 0 0 0 10 0"}],["path",{d:"M7 4.5a24 24 0 0 1 10 0"}],["rect",{x:"17",y:"17",width:"5",height:"5",rx:"1"}],["rect",{x:"17",y:"2",width:"5",height:"5",rx:"1"}],["rect",{x:"2",y:"17",width:"5",height:"5",rx:"1"}],["rect",{x:"2",y:"2",width:"5",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OO=[["path",{d:"M16 8q6 0 6-6-6 0-6 6"}],["path",{d:"M17.41 3.59a10 10 0 1 0 3 3"}],["path",{d:"M2 2a26.6 26.6 0 0 1 10 20c.9-6.82 1.5-9.5 4-14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kO=[["path",{d:"M18 11c-1.5 0-2.5.5-3 2"}],["path",{d:"M4 6a2 2 0 0 0-2 2v4a5 5 0 0 0 5 5 8 8 0 0 1 5 2 8 8 0 0 1 5-2 5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3a8 8 0 0 0-5 2 8 8 0 0 0-5-2z"}],["path",{d:"M6 11c1.5 0 2.5.5 3 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IO=[["path",{d:"M10 20h4"}],["path",{d:"M12 16v6"}],["path",{d:"M17 2h4v4"}],["path",{d:"m21 2-5.46 5.46"}],["circle",{cx:"12",cy:"11",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NO=[["path",{d:"M12 15v7"}],["path",{d:"M9 19h6"}],["circle",{cx:"12",cy:"9",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zO=[["path",{d:"m2 8 2 2-2 2 2 2-2 2"}],["path",{d:"m22 8-2 2 2 2-2 2 2 2"}],["path",{d:"M8 8v10c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2"}],["path",{d:"M16 10.34V6c0-.55-.45-1-1-1h-4.34"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $O=[["path",{d:"m2 8 2 2-2 2 2 2-2 2"}],["path",{d:"m22 8-2 2 2 2-2 2 2 2"}],["rect",{width:"8",height:"14",x:"8",y:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RO=[["path",{d:"M10.66 6H14a2 2 0 0 1 2 2v2.5l5.248-3.062A.5.5 0 0 1 22 7.87v8.196"}],["path",{d:"M16 16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BO=[["path",{d:"m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"}],["rect",{x:"2",y:"6",width:"14",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FO=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M2 8h20"}],["circle",{cx:"8",cy:"14",r:"2"}],["path",{d:"M8 12h8"}],["circle",{cx:"16",cy:"14",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qO=[["path",{d:"M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"}],["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WO=[["circle",{cx:"6",cy:"12",r:"4"}],["circle",{cx:"18",cy:"12",r:"4"}],["line",{x1:"6",x2:"18",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jO=[["path",{d:"M11.1 7.1a16.55 16.55 0 0 1 10.9 4"}],["path",{d:"M12 12a12.6 12.6 0 0 1-8.7 5"}],["path",{d:"M16.8 13.6a16.55 16.55 0 0 1-9 7.5"}],["path",{d:"M20.7 17a12.8 12.8 0 0 0-8.7-5 13.3 13.3 0 0 1 0-10"}],["path",{d:"M6.3 3.8a16.55 16.55 0 0 0 1.9 11.5"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GO=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["path",{d:"M16 9a5 5 0 0 1 0 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZO=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["path",{d:"M16 9a5 5 0 0 1 0 6"}],["path",{d:"M19.364 18.364a9 9 0 0 0 0-12.728"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XO=[["path",{d:"M16 9a5 5 0 0 1 .95 2.293"}],["path",{d:"M19.364 5.636a9 9 0 0 1 1.889 9.96"}],["path",{d:"m2 2 20 20"}],["path",{d:"m7 7-.587.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298V11"}],["path",{d:"M9.828 4.172A.686.686 0 0 1 11 4.657v.686"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UO=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["line",{x1:"22",x2:"16",y1:"9",y2:"15"}],["line",{x1:"16",x2:"22",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YO=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KO=[["path",{d:"m9 12 2 2 4-4"}],["path",{d:"M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v12H5V7Z"}],["path",{d:"M22 19H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QO=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2"}],["path",{d:"M3 11h3c.8 0 1.6.3 2.1.9l1.1.9c1.6 1.6 4.1 1.6 5.7 0l1.1-.9c.5-.5 1.3-.9 2.1-.9H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Po=[["path",{d:"M17 14h.01"}],["path",{d:"M7 7h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JO=[["path",{d:"M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"}],["path",{d:"M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tk=[["circle",{cx:"8",cy:"9",r:"2"}],["path",{d:"m9 17 6.1-6.1a2 2 0 0 1 2.81.01L22 15V5a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Do=[["path",{d:"m21.64 3.64-1.28-1.28a1.21 1.21 0 0 0-1.72 0L2.36 18.64a1.21 1.21 0 0 0 0 1.72l1.28 1.28a1.2 1.2 0 0 0 1.72 0L21.64 5.36a1.2 1.2 0 0 0 0-1.72"}],["path",{d:"m14 7 3 3"}],["path",{d:"M5 6v4"}],["path",{d:"M19 14v4"}],["path",{d:"M10 2v2"}],["path",{d:"M7 8H3"}],["path",{d:"M21 16h-4"}],["path",{d:"M11 3H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ek=[["path",{d:"M15 4V2"}],["path",{d:"M15 16v-2"}],["path",{d:"M8 9h2"}],["path",{d:"M20 9h2"}],["path",{d:"M17.8 11.8 19 13"}],["path",{d:"M15 9h.01"}],["path",{d:"M17.8 6.2 19 5"}],["path",{d:"m3 21 9-9"}],["path",{d:"M12.2 6.2 11 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ak=[["path",{d:"M18 21V10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v11"}],["path",{d:"M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 1.132-1.803l7.95-3.974a2 2 0 0 1 1.837 0l7.948 3.974A2 2 0 0 1 22 8z"}],["path",{d:"M6 13h12"}],["path",{d:"M6 17h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ik=[["path",{d:"M3 6h3"}],["path",{d:"M17 6h.01"}],["rect",{width:"18",height:"20",x:"3",y:"2",rx:"2"}],["circle",{cx:"12",cy:"13",r:"5"}],["path",{d:"M12 18a2.5 2.5 0 0 0 0-5 2.5 2.5 0 0 1 0-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nk=[["path",{d:"M12 10v2.2l1.6 1"}],["path",{d:"m16.13 7.66-.81-4.05a2 2 0 0 0-2-1.61h-2.68a2 2 0 0 0-2 1.61l-.78 4.05"}],["path",{d:"m7.88 16.36.8 4a2 2 0 0 0 2 1.61h2.72a2 2 0 0 0 2-1.61l.81-4.05"}],["circle",{cx:"12",cy:"12",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rk=[["path",{d:"M19 5a2 2 0 0 0-2 2v11"}],["path",{d:"M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M7 13h10"}],["path",{d:"M7 9h10"}],["path",{d:"M9 5a2 2 0 0 0-2 2v11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sk=[["path",{d:"M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ok=[["circle",{cx:"12",cy:"4.5",r:"2.5"}],["path",{d:"m10.2 6.3-3.9 3.9"}],["circle",{cx:"4.5",cy:"12",r:"2.5"}],["path",{d:"M7 12h10"}],["circle",{cx:"19.5",cy:"12",r:"2.5"}],["path",{d:"m13.8 17.7 3.9-3.9"}],["circle",{cx:"12",cy:"19.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lk=[["circle",{cx:"12",cy:"10",r:"8"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 22h10"}],["path",{d:"M12 22v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hk=[["path",{d:"M17 17h-5c-1.09-.02-1.94.92-2.5 1.9A3 3 0 1 1 2.57 15"}],["path",{d:"M9 3.4a4 4 0 0 1 6.52.66"}],["path",{d:"m6 17 3.1-5.8a2.5 2.5 0 0 0 .057-2.05"}],["path",{d:"M20.3 20.3a4 4 0 0 1-2.3.7"}],["path",{d:"M18.6 13a4 4 0 0 1 3.357 3.414"}],["path",{d:"m12 6 .6 1"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dk=[["path",{d:"M18 16.98h-5.99c-1.1 0-1.95.94-2.48 1.9A4 4 0 0 1 2 17c.01-.7.2-1.4.57-2"}],["path",{d:"m6 17 3.13-5.78c.53-.97.1-2.18-.5-3.1a4 4 0 1 1 6.89-4.06"}],["path",{d:"m12 6 3.13 5.73C15.66 12.7 16.9 13 18 13a4 4 0 0 1 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ck=[["circle",{cx:"12",cy:"5",r:"3"}],["path",{d:"M6.5 8a2 2 0 0 0-1.905 1.46L2.1 18.5A2 2 0 0 0 4 21h16a2 2 0 0 0 1.925-2.54L19.4 9.5A2 2 0 0 0 17.48 8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pk=[["path",{d:"m2 22 10-10"}],["path",{d:"m16 8-1.17 1.17"}],["path",{d:"M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"m8 8-.53.53a3.5 3.5 0 0 0 0 4.94L9 15l1.53-1.53c.55-.55.88-1.25.98-1.97"}],["path",{d:"M10.91 5.26c.15-.26.34-.51.56-.73L13 3l1.53 1.53a3.5 3.5 0 0 1 .28 4.62"}],["path",{d:"M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"}],["path",{d:"M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"m16 16-.53.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.49 3.49 0 0 1 1.97-.98"}],["path",{d:"M18.74 13.09c.26-.15.51-.34.73-.56L21 11l-1.53-1.53a3.5 3.5 0 0 0-4.62-.28"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uk=[["path",{d:"M2 22 16 8"}],["path",{d:"M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"}],["path",{d:"M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fk=[["circle",{cx:"7",cy:"12",r:"3"}],["path",{d:"M10 9v6"}],["circle",{cx:"17",cy:"12",r:"3"}],["path",{d:"M14 7v8"}],["path",{d:"M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mk=[["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"M2 7.82a15 15 0 0 1 20 0"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["path",{d:"M5 11.858a10 10 0 0 1 11.5-1.785"}],["path",{d:"M8.5 15.429a5 5 0 0 1 2.413-1.31"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mk=[["path",{d:"M12 20h.01"}],["path",{d:"M5 12.859a10 10 0 0 1 14 0"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vk=[["path",{d:"M12 20h.01"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gk=[["path",{d:"M12 20h.01"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}],["path",{d:"M5 12.859a10 10 0 0 1 5.17-2.69"}],["path",{d:"M19 12.859a10 10 0 0 0-2.007-1.523"}],["path",{d:"M2 8.82a15 15 0 0 1 4.177-2.643"}],["path",{d:"M22 8.82a15 15 0 0 0-11.288-3.764"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yk=[["path",{d:"M2 8.82a15 15 0 0 1 20 0"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["path",{d:"M5 12.859a10 10 0 0 1 10.5-2.222"}],["path",{d:"M8.5 16.429a5 5 0 0 1 3-1.406"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xk=[["path",{d:"M12 20h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wk=[["path",{d:"M12 20h.01"}],["path",{d:"M2 8.82a15 15 0 0 1 20 0"}],["path",{d:"M5 12.859a10 10 0 0 1 14 0"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bk=[["path",{d:"M10 2v8"}],["path",{d:"M12.8 21.6A2 2 0 1 0 14 18H2"}],["path",{d:"M17.5 10a2.5 2.5 0 1 1 2 4H2"}],["path",{d:"m6 6 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ek=[["path",{d:"M12.8 19.6A2 2 0 1 0 14 16H2"}],["path",{d:"M17.5 8a2.5 2.5 0 1 1 2 4H2"}],["path",{d:"M9.8 4.4A2 2 0 1 1 11 8H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sk=[["path",{d:"M8 22h8"}],["path",{d:"M7 10h3m7 0h-1.343"}],["path",{d:"M12 15v7"}],["path",{d:"M7.307 7.307A12.33 12.33 0 0 0 7 10a5 5 0 0 0 7.391 4.391M8.638 2.981C8.75 2.668 8.872 2.34 9 2h6c1.5 4 2 6 2 8 0 .407-.05.809-.145 1.198"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ck=[["path",{d:"M8 22h8"}],["path",{d:"M7 10h10"}],["path",{d:"M12 15v7"}],["path",{d:"M12 15a5 5 0 0 0 5-5c0-2-.5-4-2-8H9c-1.5 4-2 6-2 8a5 5 0 0 0 5 5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ak=[["rect",{width:"8",height:"8",x:"3",y:"3",rx:"2"}],["path",{d:"M7 11v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"8",x:"13",y:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tk=[["path",{d:"m19 12-1.5 3"}],["path",{d:"M19.63 18.81 22 20"}],["path",{d:"M6.47 8.23a1.68 1.68 0 0 1 2.44 1.93l-.64 2.08a6.76 6.76 0 0 0 10.16 7.67l.42-.27a1 1 0 1 0-2.73-4.21l-.42.27a1.76 1.76 0 0 1-2.63-1.99l.64-2.08A6.66 6.66 0 0 0 3.94 3.9l-.7.4a1 1 0 1 0 2.55 4.34z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _k=[["path",{d:"m16 16-2 2 2 2"}],["path",{d:"M3 12h15a3 3 0 1 1 0 6h-4"}],["path",{d:"M3 18h7"}],["path",{d:"M3 6h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hk=[["path",{d:"M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lk=[["path",{d:"M18 6 6 18"}],["path",{d:"m6 6 12 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vk=[["path",{d:"M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"}],["path",{d:"m10 15 5-3-5-3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pk=[["path",{d:"M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dk=[["path",{d:"M10.513 4.856 13.12 2.17a.5.5 0 0 1 .86.46l-1.377 4.317"}],["path",{d:"M15.656 10H20a1 1 0 0 1 .78 1.63l-1.72 1.773"}],["path",{d:"M16.273 16.273 10.88 21.83a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14H4a1 1 0 0 1-.78-1.63l4.507-4.643"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ok=[["circle",{cx:"11",cy:"11",r:"8"}],["line",{x1:"21",x2:"16.65",y1:"21",y2:"16.65"}],["line",{x1:"11",x2:"11",y1:"8",y2:"14"}],["line",{x1:"8",x2:"14",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kk=[["circle",{cx:"11",cy:"11",r:"8"}],["line",{x1:"21",x2:"16.65",y1:"21",y2:"16.65"}],["line",{x1:"8",x2:"14",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ik=Object.freeze(Object.defineProperty({__proto__:null,AArrowDown:O5,AArrowUp:I5,ALargeSmall:k5,Accessibility:N5,Activity:z5,ActivitySquare:v0,AirVent:$5,Airplay:R5,AlarmCheck:Un,AlarmClock:F5,AlarmClockCheck:Un,AlarmClockMinus:Yn,AlarmClockOff:B5,AlarmClockPlus:Kn,AlarmMinus:Yn,AlarmPlus:Kn,AlarmSmoke:q5,Album:W5,AlertCircle:Ar,AlertOctagon:Gs,AlertTriangle:xo,AlignCenter:Z5,AlignCenterHorizontal:j5,AlignCenterVertical:G5,AlignEndHorizontal:X5,AlignEndVertical:U5,AlignHorizontalDistributeCenter:Y5,AlignHorizontalDistributeEnd:Q5,AlignHorizontalDistributeStart:K5,AlignHorizontalJustifyCenter:J5,AlignHorizontalJustifyEnd:e3,AlignHorizontalJustifyStart:t3,AlignHorizontalSpaceAround:a3,AlignHorizontalSpaceBetween:i3,AlignJustify:n3,AlignLeft:r3,AlignRight:s3,AlignStartHorizontal:o3,AlignStartVertical:l3,AlignVerticalDistributeCenter:h3,AlignVerticalDistributeEnd:d3,AlignVerticalDistributeStart:c3,AlignVerticalJustifyCenter:p3,AlignVerticalJustifyEnd:u3,AlignVerticalJustifyStart:f3,AlignVerticalSpaceAround:M3,AlignVerticalSpaceBetween:m3,Ambulance:v3,Ampersand:g3,Ampersands:y3,Amphora:x3,Anchor:w3,Angry:b3,Annoyed:E3,Antenna:S3,Anvil:C3,Aperture:A3,AppWindow:_3,AppWindowMac:T3,Apple:H3,Archive:V3,ArchiveRestore:L3,ArchiveX:D3,AreaChart:pr,Armchair:P3,ArrowBigDown:k3,ArrowBigDownDash:O3,ArrowBigLeft:N3,ArrowBigLeftDash:I3,ArrowBigRight:R3,ArrowBigRightDash:z3,ArrowBigUp:B3,ArrowBigUpDash:$3,ArrowDown:K3,ArrowDown01:F3,ArrowDown10:q3,ArrowDownAZ:Qn,ArrowDownAz:Qn,ArrowDownCircle:Cr,ArrowDownFromLine:W3,ArrowDownLeft:j3,ArrowDownLeftFromCircle:_r,ArrowDownLeftFromSquare:b0,ArrowDownLeftSquare:g0,ArrowDownNarrowWide:G3,ArrowDownRight:Z3,ArrowDownRightFromCircle:Pr,ArrowDownRightFromSquare:S0,ArrowDownRightSquare:y0,ArrowDownSquare:w0,ArrowDownToDot:X3,ArrowDownToLine:U3,ArrowDownUp:Y3,ArrowDownWideNarrow:Jn,ArrowDownZA:tr,ArrowDownZa:tr,ArrowLeft:e6,ArrowLeftCircle:Tr,ArrowLeftFromLine:Q3,ArrowLeftRight:J3,ArrowLeftSquare:x0,ArrowLeftToLine:t6,ArrowRight:r6,ArrowRightCircle:Vr,ArrowRightFromLine:a6,ArrowRightLeft:i6,ArrowRightSquare:A0,ArrowRightToLine:n6,ArrowUp:M6,ArrowUp01:s6,ArrowUp10:o6,ArrowUpAZ:er,ArrowUpAz:er,ArrowUpCircle:Dr,ArrowUpDown:l6,ArrowUpFromDot:h6,ArrowUpFromLine:d6,ArrowUpLeft:c6,ArrowUpLeftFromCircle:Hr,ArrowUpLeftFromSquare:E0,ArrowUpLeftSquare:T0,ArrowUpNarrowWide:ar,ArrowUpRight:p6,ArrowUpRightFromCircle:Lr,ArrowUpRightFromSquare:C0,ArrowUpRightSquare:_0,ArrowUpSquare:H0,ArrowUpToLine:f6,ArrowUpWideNarrow:u6,ArrowUpZA:ir,ArrowUpZa:ir,ArrowsUpFromLine:v6,Asterisk:m6,AsteriskSquare:L0,AtSign:g6,Atom:y6,AudioLines:x6,AudioWaveform:w6,Award:b6,Axe:E6,Axis3D:nr,Axis3d:nr,Baby:S6,Backpack:C6,Badge:R6,BadgeAlert:A6,BadgeCent:T6,BadgeCheck:rr,BadgeDollarSign:_6,BadgeEuro:H6,BadgeHelp:sr,BadgeIndianRupee:L6,BadgeInfo:V6,BadgeJapaneseYen:P6,BadgeMinus:D6,BadgePercent:O6,BadgePlus:I6,BadgePoundSterling:k6,BadgeQuestionMark:sr,BadgeRussianRuble:N6,BadgeSwissFranc:z6,BadgeX:$6,BaggageClaim:B6,Ban:F6,Banana:q6,Bandage:G6,Banknote:X6,BanknoteArrowDown:W6,BanknoteArrowUp:j6,BanknoteX:Z6,BarChart:xr,BarChart2:wr,BarChart3:gr,BarChart4:vr,BarChartBig:mr,BarChartHorizontal:fr,BarChartHorizontalBig:ur,Barcode:U6,Barrel:Y6,Baseline:K6,Bath:Q6,Battery:r8,BatteryCharging:J6,BatteryFull:t8,BatteryLow:e8,BatteryMedium:a8,BatteryPlus:i8,BatteryWarning:n8,Beaker:s8,Bean:l8,BeanOff:o8,Bed:c8,BedDouble:h8,BedSingle:d8,Beef:p8,Beer:f8,BeerOff:u8,Bell:w8,BellDot:M8,BellElectric:m8,BellMinus:v8,BellOff:g8,BellPlus:y8,BellRing:x8,BetweenHorizonalEnd:or,BetweenHorizonalStart:lr,BetweenHorizontalEnd:or,BetweenHorizontalStart:lr,BetweenVerticalEnd:b8,BetweenVerticalStart:E8,BicepsFlexed:S8,Bike:A8,Binary:C8,Binoculars:T8,Biohazard:_8,Bird:H8,Bitcoin:V8,Blend:L8,Blinds:P8,Blocks:D8,Bluetooth:z8,BluetoothConnected:O8,BluetoothOff:k8,BluetoothSearching:I8,Bold:N8,Bolt:$8,Bomb:R8,Bone:B8,Book:cM,BookA:F8,BookAlert:q8,BookAudio:W8,BookCheck:j8,BookCopy:G8,BookDashed:hr,BookDown:Z8,BookHeadphones:X8,BookHeart:U8,BookImage:Y8,BookKey:K8,BookLock:Q8,BookMarked:J8,BookMinus:tM,BookOpen:iM,BookOpenCheck:aM,BookOpenText:eM,BookPlus:nM,BookTemplate:hr,BookText:rM,BookType:sM,BookUp:hM,BookUp2:oM,BookUser:lM,BookX:dM,Bookmark:mM,BookmarkCheck:pM,BookmarkMinus:uM,BookmarkPlus:fM,BookmarkX:MM,BoomBox:vM,Bot:yM,BotMessageSquare:xM,BotOff:gM,BottleWine:wM,BowArrow:bM,Box:EM,BoxSelect:B0,Boxes:SM,Braces:dr,Brackets:CM,Brain:_M,BrainCircuit:AM,BrainCog:TM,BrickWall:LM,BrickWallFire:HM,Briefcase:OM,BriefcaseBusiness:VM,BriefcaseConveyorBelt:PM,BriefcaseMedical:DM,BringToFront:kM,Brush:NM,BrushCleaning:IM,Bubbles:zM,Bug:BM,BugOff:$M,BugPlay:RM,Building:qM,Building2:FM,Bus:jM,BusFront:WM,Cable:ZM,CableCar:GM,Cake:UM,CakeSlice:XM,Calculator:YM,Calendar:vm,Calendar1:KM,CalendarArrowDown:QM,CalendarArrowUp:JM,CalendarCheck:em,CalendarCheck2:tm,CalendarClock:am,CalendarCog:im,CalendarDays:nm,CalendarFold:sm,CalendarHeart:om,CalendarMinus:lm,CalendarMinus2:rm,CalendarOff:hm,CalendarPlus:cm,CalendarPlus2:dm,CalendarRange:pm,CalendarSearch:um,CalendarSync:fm,CalendarX:mm,CalendarX2:Mm,Camera:ym,CameraOff:gm,CandlestickChart:Mr,Candy:bm,CandyCane:xm,CandyOff:wm,Cannabis:Em,Captions:cr,CaptionsOff:Sm,Car:Tm,CarFront:Cm,CarTaxiFront:Am,Caravan:_m,CardSim:Hm,Carrot:Lm,CaseLower:Vm,CaseSensitive:Pm,CaseUpper:Dm,CassetteTape:Om,Cast:km,Castle:Im,Cat:Nm,Cctv:zm,ChartArea:pr,ChartBar:fr,ChartBarBig:ur,ChartBarDecreasing:$m,ChartBarIncreasing:Rm,ChartBarStacked:Bm,ChartCandlestick:Mr,ChartColumn:gr,ChartColumnBig:mr,ChartColumnDecreasing:Fm,ChartColumnIncreasing:vr,ChartColumnStacked:qm,ChartGantt:Wm,ChartLine:yr,ChartNetwork:Gm,ChartNoAxesColumn:wr,ChartNoAxesColumnDecreasing:jm,ChartNoAxesColumnIncreasing:xr,ChartNoAxesCombined:Zm,ChartNoAxesGantt:br,ChartPie:Er,ChartScatter:Sr,ChartSpline:Xm,Check:Km,CheckCheck:Um,CheckCircle:Or,CheckCircle2:kr,CheckLine:Ym,CheckSquare:P0,CheckSquare2:D0,ChefHat:Jm,Cherry:Qm,ChevronDown:t7,ChevronDownCircle:Ir,ChevronDownSquare:O0,ChevronFirst:e7,ChevronLast:i7,ChevronLeft:a7,ChevronLeftCircle:Nr,ChevronLeftSquare:k0,ChevronRight:n7,ChevronRightCircle:zr,ChevronRightSquare:I0,ChevronUp:r7,ChevronUpCircle:$r,ChevronUpSquare:N0,ChevronsDown:o7,ChevronsDownUp:s7,ChevronsLeft:d7,ChevronsLeftRight:h7,ChevronsLeftRightEllipsis:l7,ChevronsRight:p7,ChevronsRightLeft:c7,ChevronsUp:f7,ChevronsUpDown:u7,Chrome:M7,Church:m7,Cigarette:g7,CigaretteOff:v7,Circle:V7,CircleAlert:Ar,CircleArrowDown:Cr,CircleArrowLeft:Tr,CircleArrowOutDownLeft:_r,CircleArrowOutDownRight:Pr,CircleArrowOutUpLeft:Hr,CircleArrowOutUpRight:Lr,CircleArrowRight:Vr,CircleArrowUp:Dr,CircleCheck:kr,CircleCheckBig:Or,CircleChevronDown:Ir,CircleChevronLeft:Nr,CircleChevronRight:zr,CircleChevronUp:$r,CircleDashed:y7,CircleDivide:Rr,CircleDollarSign:x7,CircleDot:b7,CircleDotDashed:w7,CircleEllipsis:E7,CircleEqual:S7,CircleFadingArrowUp:C7,CircleFadingPlus:A7,CircleGauge:Br,CircleHelp:qi,CircleMinus:Fr,CircleOff:T7,CircleParking:Wr,CircleParkingOff:qr,CirclePause:Gr,CirclePercent:jr,CirclePlay:Zr,CirclePlus:Xr,CirclePoundSterling:_7,CirclePower:Ur,CircleQuestionMark:qi,CircleSlash:H7,CircleSlash2:Yr,CircleSlashed:Yr,CircleSmall:L7,CircleStop:Kr,CircleUser:Jr,CircleUserRound:Qr,CircleX:ts,CircuitBoard:P7,Citrus:D7,Clapperboard:O7,Clipboard:q7,ClipboardCheck:I7,ClipboardCopy:k7,ClipboardEdit:as,ClipboardList:N7,ClipboardMinus:z7,ClipboardPaste:$7,ClipboardPen:as,ClipboardPenLine:es,ClipboardPlus:R7,ClipboardSignature:es,ClipboardType:B7,ClipboardX:F7,Clock:ov,Clock1:W7,Clock10:j7,Clock11:G7,Clock12:Z7,Clock2:X7,Clock3:Y7,Clock4:U7,Clock5:K7,Clock6:Q7,Clock7:J7,Clock8:ev,Clock9:tv,ClockAlert:av,ClockArrowDown:iv,ClockArrowUp:nv,ClockFading:rv,ClockPlus:sv,Cloud:Ev,CloudAlert:lv,CloudCheck:hv,CloudCog:dv,CloudDownload:is,CloudDrizzle:cv,CloudFog:pv,CloudHail:uv,CloudLightning:fv,CloudMoon:vv,CloudMoonRain:Mv,CloudOff:mv,CloudRain:yv,CloudRainWind:gv,CloudSnow:xv,CloudSun:bv,CloudSunRain:wv,CloudUpload:ns,Cloudy:Sv,Clover:Cv,Club:Av,Code:Tv,Code2:rs,CodeSquare:z0,CodeXml:rs,Codepen:_v,Codesandbox:Hv,Coffee:Lv,Cog:Vv,Coins:Pv,Columns:ss,Columns2:ss,Columns3:os,Columns3Cog:Wi,Columns4:Dv,ColumnsSettings:Wi,Combine:Ov,Command:kv,Compass:Iv,Component:Nv,Computer:zv,ConciergeBell:$v,Cone:Rv,Construction:Bv,Contact:Fv,Contact2:ls,ContactRound:ls,Container:qv,Contrast:Wv,Cookie:jv,CookingPot:Gv,Copy:Qv,CopyCheck:Zv,CopyMinus:Uv,CopyPlus:Xv,CopySlash:Yv,CopyX:Kv,Copyleft:Jv,Copyright:tg,CornerDownLeft:eg,CornerDownRight:ag,CornerLeftDown:ig,CornerLeftUp:ng,CornerRightDown:rg,CornerRightUp:sg,CornerUpLeft:og,CornerUpRight:lg,Cpu:hg,CreativeCommons:dg,CreditCard:cg,Croissant:pg,Crop:ug,Cross:fg,Crosshair:Mg,Crown:mg,Cuboid:vg,CupSoda:gg,CurlyBraces:dr,Currency:yg,Cylinder:xg,Dam:wg,Database:Ag,DatabaseBackup:bg,DatabaseZap:Eg,DecimalsArrowLeft:Sg,DecimalsArrowRight:Cg,Delete:Tg,Dessert:_g,Diameter:Hg,Diamond:Pg,DiamondMinus:Vg,DiamondPercent:hs,DiamondPlus:Lg,Dice1:Dg,Dice2:Og,Dice3:kg,Dice4:Ng,Dice5:Ig,Dice6:zg,Dices:$g,Diff:Bg,Disc:Wg,Disc2:Rg,Disc3:Fg,DiscAlbum:qg,Divide:jg,DivideCircle:Rr,DivideSquare:F0,Dna:Zg,DnaOff:Gg,Dock:Xg,Dog:Ug,DollarSign:Yg,Donut:Kg,DoorClosed:Jg,DoorClosedLocked:Qg,DoorOpen:t9,Dot:e9,DotSquare:q0,Download:a9,DownloadCloud:is,DraftingCompass:i9,Drama:n9,Dribbble:r9,Drill:s9,Drone:o9,Droplet:h9,DropletOff:l9,Droplets:c9,Drum:d9,Drumstick:p9,Dumbbell:u9,Ear:f9,EarOff:M9,Earth:ds,EarthLock:m9,Eclipse:v9,Edit:V1,Edit2:r0,Edit3:n0,Egg:x9,EggFried:g9,EggOff:y9,Ellipsis:ps,EllipsisVertical:cs,Equal:E9,EqualApproximately:w9,EqualNot:b9,EqualSquare:W0,Eraser:S9,EthernetPort:C9,Euro:A9,Expand:T9,ExternalLink:_9,Eye:V9,EyeClosed:H9,EyeOff:L9,Facebook:P9,Factory:D9,Fan:O9,FastForward:k9,Feather:I9,Fence:N9,FerrisWheel:z9,Figma:$9,File:ky,FileArchive:R9,FileAudio:F9,FileAudio2:B9,FileAxis3D:us,FileAxis3d:us,FileBadge:W9,FileBadge2:q9,FileBarChart:Ms,FileBarChart2:fs,FileBox:j9,FileChartColumn:fs,FileChartColumnIncreasing:Ms,FileChartLine:vs,FileChartPie:ms,FileCheck:Z9,FileCheck2:G9,FileClock:X9,FileCode:Y9,FileCode2:U9,FileCog:gs,FileCog2:gs,FileDiff:K9,FileDigit:Q9,FileDown:J9,FileEdit:xs,FileHeart:ty,FileImage:ey,FileInput:ay,FileJson:ny,FileJson2:iy,FileKey:sy,FileKey2:ry,FileLineChart:vs,FileLock:ly,FileLock2:oy,FileMinus:dy,FileMinus2:hy,FileMusic:cy,FileOutput:py,FilePen:xs,FilePenLine:ys,FilePieChart:ms,FilePlus:fy,FilePlus2:uy,FileQuestion:ws,FileQuestionMark:ws,FileScan:My,FileSearch:vy,FileSearch2:my,FileSignature:ys,FileSliders:gy,FileSpreadsheet:yy,FileStack:xy,FileSymlink:wy,FileTerminal:by,FileText:Ey,FileType:Cy,FileType2:Sy,FileUp:Ay,FileUser:_y,FileVideo:Hy,FileVideo2:Ty,FileVolume:Vy,FileVolume2:Ly,FileWarning:Py,FileX:Oy,FileX2:Dy,Files:Iy,Film:Ny,Filter:Cs,FilterX:Ss,Fingerprint:zy,FireExtinguisher:$y,Fish:Fy,FishOff:Ry,FishSymbol:By,Flag:Gy,FlagOff:qy,FlagTriangleLeft:Wy,FlagTriangleRight:jy,Flame:Xy,FlameKindling:Zy,Flashlight:Yy,FlashlightOff:Uy,FlaskConical:Ky,FlaskConicalOff:Qy,FlaskRound:Jy,FlipHorizontal:ax,FlipHorizontal2:tx,FlipVertical:ix,FlipVertical2:ex,Flower:rx,Flower2:nx,Focus:sx,FoldHorizontal:ox,FoldVertical:lx,Folder:Nx,FolderArchive:hx,FolderCheck:dx,FolderClock:cx,FolderClosed:px,FolderCode:ux,FolderCog:bs,FolderCog2:bs,FolderDot:fx,FolderDown:Mx,FolderEdit:Es,FolderGit:vx,FolderGit2:mx,FolderHeart:gx,FolderInput:yx,FolderKanban:xx,FolderKey:wx,FolderLock:bx,FolderMinus:Ex,FolderOpen:Sx,FolderOpenDot:Cx,FolderOutput:Ax,FolderPen:Es,FolderPlus:Tx,FolderRoot:_x,FolderSearch:Lx,FolderSearch2:Hx,FolderSymlink:Vx,FolderSync:Px,FolderTree:Dx,FolderUp:Ox,FolderX:kx,Folders:Ix,Footprints:zx,ForkKnife:Vo,ForkKnifeCrossed:Lo,Forklift:$x,FormInput:o0,Forward:Rx,Frame:Bx,Framer:Fx,Frown:Wx,Fuel:qx,Fullscreen:jx,FunctionSquare:j0,Funnel:Cs,FunnelPlus:Gx,FunnelX:Ss,GalleryHorizontal:Xx,GalleryHorizontalEnd:Zx,GalleryThumbnails:Ux,GalleryVertical:Kx,GalleryVerticalEnd:Yx,Gamepad:Jx,Gamepad2:Qx,GanttChart:br,GanttChartSquare:Gi,Gauge:tw,GaugeCircle:Br,Gavel:ew,Gem:aw,GeorgianLari:iw,Ghost:nw,Gift:rw,GitBranch:ow,GitBranchPlus:sw,GitCommit:As,GitCommitHorizontal:As,GitCommitVertical:lw,GitCompare:dw,GitCompareArrows:hw,GitFork:cw,GitGraph:pw,GitMerge:uw,GitPullRequest:yw,GitPullRequestArrow:fw,GitPullRequestClosed:Mw,GitPullRequestCreate:vw,GitPullRequestCreateArrow:mw,GitPullRequestDraft:gw,Github:xw,Gitlab:ww,GlassWater:bw,Glasses:Ew,Globe:Cw,Globe2:ds,GlobeLock:Sw,Goal:Aw,Gpu:Hw,Grab:Tw,GraduationCap:_w,Grape:Lw,Grid:ji,Grid2X2:Ls,Grid2X2Check:Ts,Grid2X2Plus:Hs,Grid2X2X:_s,Grid2x2:Ls,Grid2x2Check:Ts,Grid2x2Plus:Hs,Grid2x2X:_s,Grid3X3:ji,Grid3x2:Vw,Grid3x3:ji,Grip:Dw,GripHorizontal:Pw,GripVertical:Ow,Group:kw,Guitar:Iw,Ham:Nw,Hamburger:zw,Hammer:$w,Hand:Ww,HandCoins:Rw,HandHeart:Bw,HandHelping:Vs,HandMetal:Fw,HandPlatter:qw,Handshake:jw,HardDrive:Xw,HardDriveDownload:Gw,HardDriveUpload:Zw,HardHat:Uw,Hash:Yw,Haze:Kw,HdmiPort:Qw,Heading:rb,Heading1:Jw,Heading2:tb,Heading3:ab,Heading4:eb,Heading5:ib,Heading6:nb,HeadphoneOff:sb,Headphones:ob,Headset:lb,Heart:Mb,HeartCrack:hb,HeartHandshake:db,HeartMinus:cb,HeartOff:pb,HeartPlus:ub,HeartPulse:fb,Heater:mb,HelpCircle:qi,HelpingHand:Vs,Hexagon:vb,Highlighter:gb,History:yb,Home:Ps,Hop:wb,HopOff:xb,Hospital:bb,Hotel:Eb,Hourglass:Sb,House:Ps,HousePlug:Cb,HousePlus:Ab,HouseWifi:Tb,IceCream:Os,IceCream2:Ds,IceCreamBowl:Ds,IceCreamCone:Os,IdCard:Hb,IdCardLanyard:_b,Image:Nb,ImageDown:Lb,ImageMinus:Vb,ImageOff:Pb,ImagePlay:Db,ImagePlus:Ob,ImageUp:kb,ImageUpscale:Ib,Images:zb,Import:$b,Inbox:Rb,Indent:Is,IndentDecrease:ks,IndentIncrease:Is,IndianRupee:Bb,Infinity:Fb,Info:qb,Inspect:Y0,InspectionPanel:Wb,Instagram:jb,Italic:Gb,IterationCcw:Zb,IterationCw:Xb,JapaneseYen:Ub,Joystick:Kb,Kanban:Yb,KanbanSquare:Z0,KanbanSquareDashed:$0,Key:tE,KeyRound:Qb,KeySquare:Jb,Keyboard:iE,KeyboardMusic:eE,KeyboardOff:aE,Lamp:hE,LampCeiling:nE,LampDesk:rE,LampFloor:sE,LampWallDown:oE,LampWallUp:lE,LandPlot:dE,Landmark:cE,Languages:pE,Laptop:fE,Laptop2:Ns,LaptopMinimal:Ns,LaptopMinimalCheck:uE,Lasso:mE,LassoSelect:ME,Laugh:vE,Layers:zs,Layers2:gE,Layers3:zs,Layout:i0,LayoutDashboard:yE,LayoutGrid:xE,LayoutList:wE,LayoutPanelLeft:bE,LayoutPanelTop:SE,LayoutTemplate:EE,Leaf:CE,LeafyGreen:AE,Lectern:TE,LetterText:_E,Library:LE,LibraryBig:HE,LibrarySquare:G0,LifeBuoy:VE,Ligature:PE,Lightbulb:OE,LightbulbOff:DE,LineChart:yr,LineSquiggle:kE,Link:zE,Link2:NE,Link2Off:IE,Linkedin:$E,List:aS,ListCheck:RE,ListChecks:BE,ListCollapse:FE,ListEnd:qE,ListFilter:jE,ListFilterPlus:WE,ListMinus:ZE,ListMusic:GE,ListOrdered:XE,ListPlus:UE,ListRestart:YE,ListStart:KE,ListTodo:JE,ListTree:eS,ListVideo:QE,ListX:tS,Loader:nS,Loader2:$s,LoaderCircle:$s,LoaderPinwheel:iS,Locate:lS,LocateFixed:rS,LocateOff:sS,LocationEdit:oS,Lock:dS,LockKeyhole:hS,LockKeyholeOpen:Rs,LockOpen:Bs,LogIn:cS,LogOut:pS,Logs:uS,Lollipop:fS,Luggage:MS,MSquare:X0,Magnet:mS,Mail:SS,MailCheck:vS,MailMinus:gS,MailOpen:yS,MailPlus:xS,MailQuestion:Fs,MailQuestionMark:Fs,MailSearch:wS,MailWarning:bS,MailX:ES,Mailbox:CS,Mails:AS,Map:RS,MapPin:NS,MapPinCheck:_S,MapPinCheckInside:TS,MapPinHouse:HS,MapPinMinus:VS,MapPinMinusInside:LS,MapPinOff:PS,MapPinPlus:OS,MapPinPlusInside:DS,MapPinX:IS,MapPinXInside:kS,MapPinned:zS,MapPlus:$S,Mars:FS,MarsStroke:BS,Martini:qS,Maximize:jS,Maximize2:WS,Medal:GS,Megaphone:XS,MegaphoneOff:ZS,Meh:US,MemoryStick:YS,Menu:KS,MenuSquare:U0,Merge:QS,MessageCircle:lC,MessageCircleCode:JS,MessageCircleDashed:tC,MessageCircleHeart:eC,MessageCircleMore:aC,MessageCircleOff:nC,MessageCirclePlus:iC,MessageCircleQuestion:qs,MessageCircleQuestionMark:qs,MessageCircleReply:rC,MessageCircleWarning:oC,MessageCircleX:sC,MessageSquare:SC,MessageSquareCode:hC,MessageSquareDashed:dC,MessageSquareDiff:cC,MessageSquareDot:pC,MessageSquareHeart:uC,MessageSquareLock:fC,MessageSquareMore:MC,MessageSquareOff:mC,MessageSquarePlus:vC,MessageSquareQuote:gC,MessageSquareReply:yC,MessageSquareShare:xC,MessageSquareText:wC,MessageSquareWarning:bC,MessageSquareX:EC,MessagesSquare:CC,Mic:TC,Mic2:Ws,MicOff:AC,MicVocal:Ws,Microchip:_C,Microscope:HC,Microwave:LC,Milestone:VC,Milk:DC,MilkOff:PC,Minimize:kC,Minimize2:OC,Minus:IC,MinusCircle:Fr,MinusSquare:K0,Monitor:UC,MonitorCheck:NC,MonitorCog:zC,MonitorDot:$C,MonitorDown:RC,MonitorOff:BC,MonitorPause:FC,MonitorPlay:qC,MonitorSmartphone:WC,MonitorSpeaker:ZC,MonitorStop:jC,MonitorUp:GC,MonitorX:XC,Moon:KC,MoonStar:YC,MoreHorizontal:ps,MoreVertical:cs,Mountain:tA,MountainSnow:QC,Mouse:nA,MouseOff:JC,MousePointer:rA,MousePointer2:eA,MousePointerBan:aA,MousePointerClick:iA,MousePointerSquareDashed:R0,Move:gA,Move3D:js,Move3d:js,MoveDiagonal:oA,MoveDiagonal2:sA,MoveDown:dA,MoveDownLeft:lA,MoveDownRight:hA,MoveHorizontal:cA,MoveLeft:pA,MoveRight:uA,MoveUp:mA,MoveUpLeft:fA,MoveUpRight:MA,MoveVertical:vA,Music:bA,Music2:yA,Music3:xA,Music4:wA,Navigation:AA,Navigation2:SA,Navigation2Off:EA,NavigationOff:CA,Network:TA,Newspaper:_A,Nfc:HA,NonBinary:LA,Notebook:OA,NotebookPen:VA,NotebookTabs:DA,NotebookText:PA,NotepadText:IA,NotepadTextDashed:kA,Nut:zA,NutOff:NA,Octagon:RA,OctagonAlert:Gs,OctagonMinus:$A,OctagonPause:Zs,OctagonX:Xs,Omega:BA,Option:FA,Orbit:qA,Origami:WA,Outdent:ks,Package:QA,Package2:jA,PackageCheck:GA,PackageMinus:ZA,PackageOpen:XA,PackagePlus:UA,PackageSearch:YA,PackageX:KA,PaintBucket:JA,PaintRoller:tT,Paintbrush:eT,Paintbrush2:Us,PaintbrushVertical:Us,Palette:iT,Palmtree:yo,Panda:aT,PanelBottom:sT,PanelBottomClose:nT,PanelBottomDashed:Ys,PanelBottomInactive:Ys,PanelBottomOpen:rT,PanelLeft:t0,PanelLeftClose:Ks,PanelLeftDashed:Qs,PanelLeftInactive:Qs,PanelLeftOpen:Js,PanelRight:hT,PanelRightClose:oT,PanelRightDashed:e0,PanelRightInactive:e0,PanelRightOpen:lT,PanelTop:pT,PanelTopClose:dT,PanelTopDashed:a0,PanelTopInactive:a0,PanelTopOpen:cT,PanelsLeftBottom:uT,PanelsLeftRight:os,PanelsRightBottom:fT,PanelsTopBottom:d0,PanelsTopLeft:i0,Paperclip:MT,Parentheses:mT,ParkingCircle:Wr,ParkingCircleOff:qr,ParkingMeter:vT,ParkingSquare:J0,ParkingSquareOff:Q0,PartyPopper:gT,Pause:yT,PauseCircle:Gr,PauseOctagon:Zs,PawPrint:xT,PcCase:wT,Pen:r0,PenBox:V1,PenLine:n0,PenOff:bT,PenSquare:V1,PenTool:ET,Pencil:TT,PencilLine:ST,PencilOff:CT,PencilRuler:AT,Pentagon:_T,Percent:HT,PercentCircle:jr,PercentDiamond:hs,PercentSquare:to,PersonStanding:LT,PhilippinePeso:VT,Phone:zT,PhoneCall:PT,PhoneForwarded:DT,PhoneIncoming:OT,PhoneMissed:kT,PhoneOff:IT,PhoneOutgoing:NT,Pi:$T,PiSquare:eo,Piano:RT,Pickaxe:BT,PictureInPicture:qT,PictureInPicture2:FT,PieChart:Er,PiggyBank:WT,Pilcrow:ZT,PilcrowLeft:jT,PilcrowRight:GT,PilcrowSquare:ao,Pill:UT,PillBottle:XT,Pin:KT,PinOff:YT,Pipette:QT,Pizza:JT,Plane:a_,PlaneLanding:t_,PlaneTakeoff:e_,Play:i_,PlayCircle:Zr,PlaySquare:no,Plug:r_,Plug2:n_,PlugZap:s0,PlugZap2:s0,Plus:s_,PlusCircle:Xr,PlusSquare:io,Pocket:o_,PocketKnife:l_,Podcast:h_,Pointer:p_,PointerOff:d_,Popcorn:c_,Popsicle:u_,PoundSterling:f_,Power:m_,PowerCircle:Ur,PowerOff:M_,PowerSquare:ro,Presentation:v_,Printer:y_,PrinterCheck:g_,Projector:x_,Proportions:w_,Puzzle:b_,Pyramid:E_,QrCode:S_,Quote:C_,Rabbit:A_,Radar:T_,Radiation:__,Radical:H_,Radio:V_,RadioReceiver:L_,RadioTower:P_,Radius:D_,RailSymbol:O_,Rainbow:k_,Rat:I_,Ratio:N_,Receipt:G_,ReceiptCent:z_,ReceiptEuro:$_,ReceiptIndianRupee:R_,ReceiptJapaneseYen:B_,ReceiptPoundSterling:F_,ReceiptRussianRuble:q_,ReceiptSwissFranc:W_,ReceiptText:j_,RectangleCircle:Z_,RectangleEllipsis:o0,RectangleGoggles:X_,RectangleHorizontal:U_,RectangleVertical:Y_,Recycle:K_,Redo:J_,Redo2:Q_,RedoDot:tH,RefreshCcw:aH,RefreshCcwDot:eH,RefreshCw:nH,RefreshCwOff:iH,Refrigerator:rH,Regex:sH,RemoveFormatting:oH,Repeat:dH,Repeat1:lH,Repeat2:hH,Replace:pH,ReplaceAll:cH,Reply:fH,ReplyAll:uH,Rewind:MH,Ribbon:mH,Rocket:vH,RockingChair:gH,RollerCoaster:yH,Rotate3D:l0,Rotate3d:l0,RotateCcw:bH,RotateCcwKey:wH,RotateCcwSquare:xH,RotateCw:SH,RotateCwSquare:EH,Route:AH,RouteOff:CH,Router:TH,Rows:h0,Rows2:h0,Rows3:d0,Rows4:_H,Rss:HH,Ruler:VH,RulerDimensionLine:LH,RussianRuble:PH,Sailboat:DH,Salad:OH,Sandwich:kH,Satellite:NH,SatelliteDish:IH,SaudiRiyal:zH,Save:BH,SaveAll:$H,SaveOff:RH,Scale:FH,Scale3D:c0,Scale3d:c0,Scaling:qH,Scan:YH,ScanBarcode:WH,ScanEye:GH,ScanFace:jH,ScanHeart:ZH,ScanLine:XH,ScanQrCode:UH,ScanSearch:KH,ScanText:QH,ScatterChart:Sr,School:JH,School2:bo,Scissors:tL,ScissorsLineDashed:eL,ScissorsSquare:so,ScissorsSquareDashedBottom:V0,ScreenShare:nL,ScreenShareOff:aL,Scroll:rL,ScrollText:iL,Search:cL,SearchCheck:sL,SearchCode:oL,SearchSlash:lL,SearchX:hL,Section:dL,Send:uL,SendHorizonal:p0,SendHorizontal:p0,SendToBack:pL,SeparatorHorizontal:fL,SeparatorVertical:ML,Server:yL,ServerCog:mL,ServerCrash:vL,ServerOff:gL,Settings:bL,Settings2:xL,Shapes:wL,Share:SL,Share2:EL,Sheet:AL,Shell:CL,Shield:IL,ShieldAlert:TL,ShieldBan:_L,ShieldCheck:HL,ShieldClose:f0,ShieldEllipsis:LL,ShieldHalf:VL,ShieldMinus:PL,ShieldOff:DL,ShieldPlus:OL,ShieldQuestion:u0,ShieldQuestionMark:u0,ShieldUser:kL,ShieldX:f0,Ship:zL,ShipWheel:NL,Shirt:$L,ShoppingBag:RL,ShoppingBasket:BL,ShoppingCart:FL,Shovel:qL,ShowerHead:WL,Shredder:jL,Shrimp:GL,Shrink:ZL,Shrub:XL,Shuffle:UL,Sidebar:t0,SidebarClose:Ks,SidebarOpen:Js,Sigma:YL,SigmaSquare:oo,Signal:eV,SignalHigh:KL,SignalLow:QL,SignalMedium:JL,SignalZero:tV,Signature:aV,Signpost:iV,SignpostBig:nV,Siren:rV,SkipBack:sV,SkipForward:oV,Skull:lV,Slack:hV,Slash:dV,SlashSquare:lo,Slice:cV,Sliders:M0,SlidersHorizontal:pV,SlidersVertical:M0,Smartphone:MV,SmartphoneCharging:uV,SmartphoneNfc:fV,Smile:vV,SmilePlus:mV,Snail:gV,Snowflake:yV,SoapDispenserDroplet:xV,Sofa:wV,SortAsc:ar,SortDesc:Jn,Soup:bV,Space:EV,Spade:SV,Sparkle:CV,Sparkles:m0,Speaker:AV,Speech:TV,SpellCheck:HV,SpellCheck2:_V,Spline:VV,SplinePointer:LV,Split:PV,SplitSquareHorizontal:ho,SplitSquareVertical:co,Spool:DV,SprayCan:OV,Sprout:kV,Square:qV,SquareActivity:v0,SquareArrowDown:w0,SquareArrowDownLeft:g0,SquareArrowDownRight:y0,SquareArrowLeft:x0,SquareArrowOutDownLeft:b0,SquareArrowOutDownRight:S0,SquareArrowOutUpLeft:E0,SquareArrowOutUpRight:C0,SquareArrowRight:A0,SquareArrowUp:H0,SquareArrowUpLeft:T0,SquareArrowUpRight:_0,SquareAsterisk:L0,SquareBottomDashedScissors:V0,SquareChartGantt:Gi,SquareCheck:D0,SquareCheckBig:P0,SquareChevronDown:O0,SquareChevronLeft:k0,SquareChevronRight:I0,SquareChevronUp:N0,SquareCode:z0,SquareDashed:B0,SquareDashedBottom:NV,SquareDashedBottomCode:IV,SquareDashedKanban:$0,SquareDashedMousePointer:R0,SquareDashedTopSolid:zV,SquareDivide:F0,SquareDot:q0,SquareEqual:W0,SquareFunction:j0,SquareGanttChart:Gi,SquareKanban:Z0,SquareLibrary:G0,SquareM:X0,SquareMenu:U0,SquareMinus:K0,SquareMousePointer:Y0,SquareParking:J0,SquareParkingOff:Q0,SquarePen:V1,SquarePercent:to,SquarePi:eo,SquarePilcrow:ao,SquarePlay:no,SquarePlus:io,SquarePower:ro,SquareRadical:$V,SquareRoundCorner:RV,SquareScissors:so,SquareSigma:oo,SquareSlash:lo,SquareSplitHorizontal:ho,SquareSplitVertical:co,SquareSquare:BV,SquareStack:FV,SquareTerminal:po,SquareUser:fo,SquareUserRound:uo,SquareX:Mo,SquaresExclude:WV,SquaresIntersect:jV,SquaresSubtract:GV,SquaresUnite:ZV,Squircle:UV,SquircleDashed:XV,Squirrel:YV,Stamp:KV,Star:tP,StarHalf:QV,StarOff:JV,Stars:m0,StepBack:eP,StepForward:aP,Stethoscope:nP,Sticker:iP,StickyNote:rP,StopCircle:Kr,Store:sP,StretchHorizontal:oP,StretchVertical:lP,Strikethrough:hP,Subscript:dP,Subtitles:cr,Sun:MP,SunDim:cP,SunMedium:pP,SunMoon:uP,SunSnow:fP,Sunrise:mP,Sunset:vP,Superscript:gP,SwatchBook:yP,SwissFranc:xP,SwitchCamera:wP,Sword:bP,Swords:EP,Syringe:SP,Table:PP,Table2:CP,TableCellsMerge:AP,TableCellsSplit:TP,TableColumnsSplit:_P,TableConfig:Wi,TableOfContents:HP,TableProperties:LP,TableRowsSplit:VP,Tablet:OP,TabletSmartphone:DP,Tablets:kP,Tag:IP,Tags:NP,Tally1:zP,Tally2:$P,Tally3:RP,Tally4:BP,Tally5:FP,Tangent:qP,Target:WP,Telescope:jP,Tent:ZP,TentTree:GP,Terminal:XP,TerminalSquare:po,TestTube:UP,TestTube2:mo,TestTubeDiagonal:mo,TestTubes:YP,Text:eD,TextCursor:QP,TextCursorInput:KP,TextQuote:JP,TextSearch:tD,TextSelect:vo,TextSelection:vo,Theater:nD,Thermometer:rD,ThermometerSnowflake:aD,ThermometerSun:iD,ThumbsDown:sD,ThumbsUp:oD,Ticket:fD,TicketCheck:lD,TicketMinus:hD,TicketPercent:dD,TicketPlus:cD,TicketSlash:pD,TicketX:uD,Tickets:mD,TicketsPlane:MD,Timer:yD,TimerOff:vD,TimerReset:gD,ToggleLeft:xD,ToggleRight:wD,Toilet:bD,ToolCase:SD,Tornado:ED,Torus:CD,Touchpad:TD,TouchpadOff:AD,TowerControl:_D,ToyBrick:HD,Tractor:LD,TrafficCone:VD,Train:go,TrainFront:DD,TrainFrontTunnel:PD,TrainTrack:OD,TramFront:go,Transgender:kD,Trash:ND,Trash2:ID,TreeDeciduous:zD,TreePalm:yo,TreePine:$D,Trees:RD,Trello:BD,TrendingDown:FD,TrendingUp:WD,TrendingUpDown:qD,Triangle:ZD,TriangleAlert:xo,TriangleDashed:jD,TriangleRight:GD,Trophy:XD,Truck:UD,TruckElectric:YD,Turtle:KD,Tv:JD,Tv2:wo,TvMinimal:wo,TvMinimalPlay:QD,Twitch:tO,Twitter:eO,Type:aO,TypeOutline:iO,Umbrella:rO,UmbrellaOff:nO,Underline:sO,Undo:hO,Undo2:oO,UndoDot:lO,UnfoldHorizontal:dO,UnfoldVertical:cO,Ungroup:pO,University:bo,Unlink:fO,Unlink2:uO,Unlock:Bs,UnlockKeyhole:Rs,Unplug:MO,Upload:mO,UploadCloud:ns,Usb:vO,User:_O,User2:_o,UserCheck:gO,UserCheck2:Eo,UserCircle:Jr,UserCircle2:Qr,UserCog:xO,UserCog2:So,UserLock:yO,UserMinus:wO,UserMinus2:Co,UserPen:bO,UserPlus:EO,UserPlus2:Ao,UserRound:_o,UserRoundCheck:Eo,UserRoundCog:So,UserRoundMinus:Co,UserRoundPen:SO,UserRoundPlus:Ao,UserRoundSearch:CO,UserRoundX:To,UserSearch:AO,UserSquare:fo,UserSquare2:uo,UserX:TO,UserX2:To,Users:HO,Users2:Ho,UsersRound:Ho,Utensils:Vo,UtensilsCrossed:Lo,UtilityPole:LO,Variable:PO,Vault:VO,VectorSquare:DO,Vegan:OO,VenetianMask:kO,Venus:NO,VenusAndMars:IO,Verified:rr,Vibrate:$O,VibrateOff:zO,Video:BO,VideoOff:RO,Videotape:FO,View:qO,Voicemail:WO,Volleyball:jO,Volume:YO,Volume1:GO,Volume2:ZO,VolumeOff:XO,VolumeX:UO,Vote:KO,Wallet:JO,Wallet2:Po,WalletCards:QO,WalletMinimal:Po,Wallpaper:tk,Wand:ek,Wand2:Do,WandSparkles:Do,Warehouse:ak,WashingMachine:ik,Watch:nk,Waves:sk,WavesLadder:rk,Waypoints:ok,Webcam:lk,Webhook:dk,WebhookOff:hk,Weight:ck,Wheat:uk,WheatOff:pk,WholeWord:fk,Wifi:wk,WifiCog:Mk,WifiHigh:mk,WifiLow:vk,WifiOff:gk,WifiPen:yk,WifiZero:xk,Wind:Ek,WindArrowDown:bk,Wine:Ck,WineOff:Sk,Workflow:Ak,Worm:Tk,WrapText:_k,Wrench:Hk,X:Lk,XCircle:ts,XOctagon:Xs,XSquare:Mo,Youtube:Vk,Zap:Pk,ZapOff:Dk,ZoomIn:Ok,ZoomOut:kk},Symbol.toStringTag,{value:"Module"}));/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nk=({icons:a={},nameAttr:t="data-lucide",attrs:e={}}={})=>{if(!Object.values(a).length)throw new Error(`Please provide an icons object.
If you want to use all the icons you can import it like:
 \`import { createIcons, icons } from 'lucide';
lucide.createIcons({icons});\``);if(typeof document>"u")throw new Error("`createIcons()` only works in a browser environment.");const n=document.querySelectorAll(`[${t}]`);if(Array.from(n).forEach(s=>Xn(s,{nameAttr:t,icons:a,attrs:e})),t==="data-lucide"){const s=document.querySelectorAll("[icon-name]");s.length>0&&(console.warn("[Lucide] Some icons were found with the now deprecated icon-name attribute. These will still be replaced for backwards compatibility, but will no longer be supported in v1.0 and you should switch to data-lucide"),Array.from(s).forEach(o=>Xn(o,{nameAttr:"icon-name",icons:a,attrs:e})))}};window.$=ee;window.jQuery=ee;window.Swiper=Wt;window.axios=Oo;const Zi=document.head.querySelector('meta[name="csrf-token"]');Zi&&(ee.ajaxSetup({headers:{"X-CSRF-TOKEN":Zi.content}}),window.axios.defaults.headers.common["X-CSRF-TOKEN"]=Zi.content);window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";window.sendAjax=function({url:a,method:t="GET",data:e={},headers:n={}},s=null,o=null,c=null){Oo({url:a,method:t,data:e,headers:n}).then(p=>{typeof s=="function"&&s(p.data)}).catch(p=>{var M,g,w,A;const m=(M=p==null?void 0:p.response)==null?void 0:M.status;if(m===401||m===419){const b=((w=(g=p==null?void 0:p.response)==null?void 0:g.data)==null?void 0:w.redirect)||"/admin/login";window.location.href=b;return}console.error("AJAX Error:",p),typeof o=="function"&&o(((A=p.response)==null?void 0:A.data)||p.message)}).finally(()=>{typeof c=="function"&&c()})};ee(document).ready(()=>{console.log("DOM loaded, jQuery is working!"),ee("#jqueryTestBtn").on("click",()=>console.log("Button clicked!")),Nk({icons:Ik}),new Wt(".mySwiper",{loop:!0,effect:"fade",autoplay:{delay:4e3,disableOnInteraction:!1},pagination:{el:".swiper-pagination",clickable:!0}}),new Wt("#travel-packages",{slidesPerView:5,spaceBetween:20,autoplay:{delay:2e3,disableOnInteraction:!1},loop:!0,pagination:{el:".travel-package-pagination",clickable:!0},breakpoints:{0:{slidesPerView:2},576:{slidesPerView:2},768:{slidesPerView:3},992:{slidesPerView:4},1200:{slidesPerView:4}}}),new Wt(".reviewSwiper",{loop:!0,spaceBetween:20,slidesPerView:1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},breakpoints:{768:{slidesPerView:2},992:{slidesPerView:3}}}),ee(document).off("click","#inquirySubmitBtn").on("click","#inquirySubmitBtn",function(a){a.preventDefault();let t=!0;ee("#inquiryForm input, #inquiryForm textarea, #inquiryForm select").removeClass("is-invalid");const e=ee("#inquiryForm").serializeArray(),n={};if(e.forEach(c=>{n[c.name]=c.value.trim();const p=ee(`[name="${c.name}"]`);switch(c.name){case"fname":case"lname":c.value.trim()||(p.addClass("is-invalid"),t=!1);break;case"email":let m=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;(!c.value.trim()||!m.test(c.value.trim()))&&(p.addClass("is-invalid"),t=!1);break;case"mobile_no":let M=/^[0-9]{7,15}$/;(!c.value.trim()||!M.test(c.value.trim()))&&(p.addClass("is-invalid"),t=!1);break;case"country":c.value.trim()||(p.addClass("is-invalid"),t=!1);break;case"service_id":case"category_id":c.value.trim()||(p.addClass("is-invalid"),t=!1);break;case"description":(!c.value.trim()||c.value.trim().length<10)&&(p.addClass("is-invalid"),t=!1);break;case"number_of_people":(!c.value.trim()||parseInt(c.value,10)<=0)&&(p.addClass("is-invalid"),t=!1);break}}),!t){console.warn("Validation failed.");return}const s=ee("#inquirySubmitBtn"),o=s.html();s.prop("disabled",!0).html('Wait... <span class="spinner-border spinner-border-sm ms-2 text-white"></span>'),sendAjax({url:"/inquiry",method:"POST",data:n,headers:{"Content-Type":"application/json"}},c=>{ee("#globalModal").find(".modal-content").empty().append(c.template),s.prop("disabled",!1).html(o)},c=>{console.error("Error submitting inquiry:",c),s.prop("disabled",!1).html(o)})}),ee(document).off("click",".btnOpenModal").on("click",".btnOpenModal",function(a){a.preventDefault();const t=ee(this).data("type"),e=ee(this).data("id");if(!t||!e){console.error("No type specified for modal!");return}const n=document.getElementById("globalModal");let s=Ke.getInstance(n);s&&(s.hide(),s.dispose()),sendAjax({url:`/inquiry-form?type=${t}&id=${e}`,method:"GET"},o=>{const c=n.querySelector(".modal-content");c.innerHTML=o,s=new Ke(n),s.show()},o=>{console.error("Failed to fetch modal content:",o)})})});
