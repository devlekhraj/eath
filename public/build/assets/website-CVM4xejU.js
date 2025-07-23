import Vl from"./index-DIycyeiE.js";function Pl(a){return a&&a.__esModule&&Object.prototype.hasOwnProperty.call(a,"default")?a.default:a}var V1={exports:{}};/*!
 * jQuery JavaScript Library v3.7.1
 * https://jquery.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2023-08-28T13:37Z
 */var Dl=V1.exports,ir;function Ol(){return ir||(ir=1,function(a){(function(t,e){a.exports=t.document?e(t,!0):function(r){if(!r.document)throw new Error("jQuery requires a window with a document");return e(r)}})(typeof window<"u"?window:Dl,function(t,e){var r=[],s=Object.getPrototypeOf,o=r.slice,c=r.flat?function(i){return r.flat.call(i)}:function(i){return r.concat.apply([],i)},f=r.push,v=r.indexOf,M={},g=M.toString,w=M.hasOwnProperty,T=w.toString,b=T.call(Object),p={},u=function(n){return typeof n=="function"&&typeof n.nodeType!="number"&&typeof n.item!="function"},A=function(n){return n!=null&&n===n.window},S=t.document,C={type:!0,src:!0,nonce:!0,noModule:!0};function E(i,n,l){l=l||S;var d,m,y=l.createElement("script");if(y.text=i,n)for(d in C)m=n[d]||n.getAttribute&&n.getAttribute(d),m&&y.setAttribute(d,m);l.head.appendChild(y).parentNode.removeChild(y)}function L(i){return i==null?i+"":typeof i=="object"||typeof i=="function"?M[g.call(i)]||"object":typeof i}var O="3.7.1",q=/HTML$/i,h=function(i,n){return new h.fn.init(i,n)};h.fn=h.prototype={jquery:O,constructor:h,length:0,toArray:function(){return o.call(this)},get:function(i){return i==null?o.call(this):i<0?this[i+this.length]:this[i]},pushStack:function(i){var n=h.merge(this.constructor(),i);return n.prevObject=this,n},each:function(i){return h.each(this,i)},map:function(i){return this.pushStack(h.map(this,function(n,l){return i.call(n,l,n)}))},slice:function(){return this.pushStack(o.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},even:function(){return this.pushStack(h.grep(this,function(i,n){return(n+1)%2}))},odd:function(){return this.pushStack(h.grep(this,function(i,n){return n%2}))},eq:function(i){var n=this.length,l=+i+(i<0?n:0);return this.pushStack(l>=0&&l<n?[this[l]]:[])},end:function(){return this.prevObject||this.constructor()},push:f,sort:r.sort,splice:r.splice},h.extend=h.fn.extend=function(){var i,n,l,d,m,y,x=arguments[0]||{},V=1,H=arguments.length,D=!1;for(typeof x=="boolean"&&(D=x,x=arguments[V]||{},V++),typeof x!="object"&&!u(x)&&(x={}),V===H&&(x=this,V--);V<H;V++)if((i=arguments[V])!=null)for(n in i)d=i[n],!(n==="__proto__"||x===d)&&(D&&d&&(h.isPlainObject(d)||(m=Array.isArray(d)))?(l=x[n],m&&!Array.isArray(l)?y=[]:!m&&!h.isPlainObject(l)?y={}:y=l,m=!1,x[n]=h.extend(D,y,d)):d!==void 0&&(x[n]=d));return x},h.extend({expando:"jQuery"+(O+Math.random()).replace(/\D/g,""),isReady:!0,error:function(i){throw new Error(i)},noop:function(){},isPlainObject:function(i){var n,l;return!i||g.call(i)!=="[object Object]"?!1:(n=s(i),n?(l=w.call(n,"constructor")&&n.constructor,typeof l=="function"&&T.call(l)===b):!0)},isEmptyObject:function(i){var n;for(n in i)return!1;return!0},globalEval:function(i,n,l){E(i,{nonce:n&&n.nonce},l)},each:function(i,n){var l,d=0;if(W(i))for(l=i.length;d<l&&n.call(i[d],d,i[d])!==!1;d++);else for(d in i)if(n.call(i[d],d,i[d])===!1)break;return i},text:function(i){var n,l="",d=0,m=i.nodeType;if(!m)for(;n=i[d++];)l+=h.text(n);return m===1||m===11?i.textContent:m===9?i.documentElement.textContent:m===3||m===4?i.nodeValue:l},makeArray:function(i,n){var l=n||[];return i!=null&&(W(Object(i))?h.merge(l,typeof i=="string"?[i]:i):f.call(l,i)),l},inArray:function(i,n,l){return n==null?-1:v.call(n,i,l)},isXMLDoc:function(i){var n=i&&i.namespaceURI,l=i&&(i.ownerDocument||i).documentElement;return!q.test(n||l&&l.nodeName||"HTML")},merge:function(i,n){for(var l=+n.length,d=0,m=i.length;d<l;d++)i[m++]=n[d];return i.length=m,i},grep:function(i,n,l){for(var d,m=[],y=0,x=i.length,V=!l;y<x;y++)d=!n(i[y],y),d!==V&&m.push(i[y]);return m},map:function(i,n,l){var d,m,y=0,x=[];if(W(i))for(d=i.length;y<d;y++)m=n(i[y],y,l),m!=null&&x.push(m);else for(y in i)m=n(i[y],y,l),m!=null&&x.push(m);return c(x)},guid:1,support:p}),typeof Symbol=="function"&&(h.fn[Symbol.iterator]=r[Symbol.iterator]),h.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(i,n){M["[object "+n+"]"]=n.toLowerCase()});function W(i){var n=!!i&&"length"in i&&i.length,l=L(i);return u(i)||A(i)?!1:l==="array"||n===0||typeof n=="number"&&n>0&&n-1 in i}function k(i,n){return i.nodeName&&i.nodeName.toLowerCase()===n.toLowerCase()}var z=r.pop,G=r.sort,j=r.splice,I="[\\x20\\t\\r\\n\\f]",X=new RegExp("^"+I+"+|((?:^|[^\\\\])(?:\\\\.)*)"+I+"+$","g");h.contains=function(i,n){var l=n&&n.parentNode;return i===l||!!(l&&l.nodeType===1&&(i.contains?i.contains(l):i.compareDocumentPosition&&i.compareDocumentPosition(l)&16))};var J=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g;function Q(i,n){return n?i==="\0"?"�":i.slice(0,-1)+"\\"+i.charCodeAt(i.length-1).toString(16)+" ":"\\"+i}h.escapeSelector=function(i){return(i+"").replace(J,Q)};var N=S,B=f;(function(){var i,n,l,d,m,y=B,x,V,H,D,Z,Y=h.expando,R=0,it=0,ft=y1(),bt=y1(),vt=y1(),Rt=y1(),kt=function(_,P){return _===P&&(m=!0),0},Ce="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",Ae="(?:\\\\[\\da-fA-F]{1,6}"+I+"?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",wt="\\["+I+"*("+Ae+")(?:"+I+"*([*^$|!~]?=)"+I+`*(?:'((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)"|(`+Ae+"))|)"+I+"*\\]",na=":("+Ae+`)(?:\\((('((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)")|((?:\\\\.|[^\\\\()[\\]]|`+wt+")*)|.*)\\)|)",Et=new RegExp(I+"+","g"),Lt=new RegExp("^"+I+"*,"+I+"*"),Ya=new RegExp("^"+I+"*([>+~]|"+I+")"+I+"*"),p2=new RegExp(I+"|>"),Te=new RegExp(na),Ka=new RegExp("^"+Ae+"$"),_e={ID:new RegExp("^#("+Ae+")"),CLASS:new RegExp("^\\.("+Ae+")"),TAG:new RegExp("^("+Ae+"|[*])"),ATTR:new RegExp("^"+wt),PSEUDO:new RegExp("^"+na),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+I+"*(even|odd|(([+-]|)(\\d*)n|)"+I+"*(?:([+-]|)"+I+"*(\\d+)|))"+I+"*\\)|)","i"),bool:new RegExp("^(?:"+Ce+")$","i"),needsContext:new RegExp("^"+I+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+I+"*((?:-\\d)?\\d*)"+I+"*\\)|)(?=[^-]|$)","i")},Fe=/^(?:input|select|textarea|button)$/i,qe=/^h\d$/i,pe=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,u2=/[+~]/,Oe=new RegExp("\\\\[\\da-fA-F]{1,6}"+I+"?|\\\\([^\\r\\n\\f])","g"),ke=function(_,P){var $="0x"+_.slice(1)-65536;return P||($<0?String.fromCharCode($+65536):String.fromCharCode($>>10|55296,$&1023|56320))},Sl=function(){We()},Cl=w1(function(_){return _.disabled===!0&&k(_,"fieldset")},{dir:"parentNode",next:"legend"});function Al(){try{return x.activeElement}catch{}}try{y.apply(r=o.call(N.childNodes),N.childNodes),r[N.childNodes.length].nodeType}catch{y={apply:function(P,$){B.apply(P,o.call($))},call:function(P){B.apply(P,o.call(arguments,1))}}}function Ct(_,P,$,F){var U,nt,st,lt,ot,gt,ut,Mt=P&&P.ownerDocument,yt=P?P.nodeType:9;if($=$||[],typeof _!="string"||!_||yt!==1&&yt!==9&&yt!==11)return $;if(!F&&(We(P),P=P||x,H)){if(yt!==11&&(ot=pe.exec(_)))if(U=ot[1]){if(yt===9)if(st=P.getElementById(U)){if(st.id===U)return y.call($,st),$}else return $;else if(Mt&&(st=Mt.getElementById(U))&&Ct.contains(P,st)&&st.id===U)return y.call($,st),$}else{if(ot[2])return y.apply($,P.getElementsByTagName(_)),$;if((U=ot[3])&&P.getElementsByClassName)return y.apply($,P.getElementsByClassName(U)),$}if(!Rt[_+" "]&&(!D||!D.test(_))){if(ut=_,Mt=P,yt===1&&(p2.test(_)||Ya.test(_))){for(Mt=u2.test(_)&&f2(P.parentNode)||P,(Mt!=P||!p.scope)&&((lt=P.getAttribute("id"))?lt=h.escapeSelector(lt):P.setAttribute("id",lt=Y)),gt=Qa(_),nt=gt.length;nt--;)gt[nt]=(lt?"#"+lt:":scope")+" "+x1(gt[nt]);ut=gt.join(",")}try{return y.apply($,Mt.querySelectorAll(ut)),$}catch{Rt(_,!0)}finally{lt===Y&&P.removeAttribute("id")}}}return ar(_.replace(X,"$1"),P,$,F)}function y1(){var _=[];function P($,F){return _.push($+" ")>n.cacheLength&&delete P[_.shift()],P[$+" "]=F}return P}function be(_){return _[Y]=!0,_}function ba(_){var P=x.createElement("fieldset");try{return!!_(P)}catch{return!1}finally{P.parentNode&&P.parentNode.removeChild(P),P=null}}function Tl(_){return function(P){return k(P,"input")&&P.type===_}}function _l(_){return function(P){return(k(P,"input")||k(P,"button"))&&P.type===_}}function tr(_){return function(P){return"form"in P?P.parentNode&&P.disabled===!1?"label"in P?"label"in P.parentNode?P.parentNode.disabled===_:P.disabled===_:P.isDisabled===_||P.isDisabled!==!_&&Cl(P)===_:P.disabled===_:"label"in P?P.disabled===_:!1}}function sa(_){return be(function(P){return P=+P,be(function($,F){for(var U,nt=_([],$.length,P),st=nt.length;st--;)$[U=nt[st]]&&($[U]=!(F[U]=$[U]))})})}function f2(_){return _&&typeof _.getElementsByTagName<"u"&&_}function We(_){var P,$=_?_.ownerDocument||_:N;return $==x||$.nodeType!==9||!$.documentElement||(x=$,V=x.documentElement,H=!h.isXMLDoc(x),Z=V.matches||V.webkitMatchesSelector||V.msMatchesSelector,V.msMatchesSelector&&N!=x&&(P=x.defaultView)&&P.top!==P&&P.addEventListener("unload",Sl),p.getById=ba(function(F){return V.appendChild(F).id=h.expando,!x.getElementsByName||!x.getElementsByName(h.expando).length}),p.disconnectedMatch=ba(function(F){return Z.call(F,"*")}),p.scope=ba(function(){return x.querySelectorAll(":scope")}),p.cssHas=ba(function(){try{return x.querySelector(":has(*,:jqfake)"),!1}catch{return!0}}),p.getById?(n.filter.ID=function(F){var U=F.replace(Oe,ke);return function(nt){return nt.getAttribute("id")===U}},n.find.ID=function(F,U){if(typeof U.getElementById<"u"&&H){var nt=U.getElementById(F);return nt?[nt]:[]}}):(n.filter.ID=function(F){var U=F.replace(Oe,ke);return function(nt){var st=typeof nt.getAttributeNode<"u"&&nt.getAttributeNode("id");return st&&st.value===U}},n.find.ID=function(F,U){if(typeof U.getElementById<"u"&&H){var nt,st,lt,ot=U.getElementById(F);if(ot){if(nt=ot.getAttributeNode("id"),nt&&nt.value===F)return[ot];for(lt=U.getElementsByName(F),st=0;ot=lt[st++];)if(nt=ot.getAttributeNode("id"),nt&&nt.value===F)return[ot]}return[]}}),n.find.TAG=function(F,U){return typeof U.getElementsByTagName<"u"?U.getElementsByTagName(F):U.querySelectorAll(F)},n.find.CLASS=function(F,U){if(typeof U.getElementsByClassName<"u"&&H)return U.getElementsByClassName(F)},D=[],ba(function(F){var U;V.appendChild(F).innerHTML="<a id='"+Y+"' href='' disabled='disabled'></a><select id='"+Y+"-\r\\' disabled='disabled'><option selected=''></option></select>",F.querySelectorAll("[selected]").length||D.push("\\["+I+"*(?:value|"+Ce+")"),F.querySelectorAll("[id~="+Y+"-]").length||D.push("~="),F.querySelectorAll("a#"+Y+"+*").length||D.push(".#.+[+~]"),F.querySelectorAll(":checked").length||D.push(":checked"),U=x.createElement("input"),U.setAttribute("type","hidden"),F.appendChild(U).setAttribute("name","D"),V.appendChild(F).disabled=!0,F.querySelectorAll(":disabled").length!==2&&D.push(":enabled",":disabled"),U=x.createElement("input"),U.setAttribute("name",""),F.appendChild(U),F.querySelectorAll("[name='']").length||D.push("\\["+I+"*name"+I+"*="+I+`*(?:''|"")`)}),p.cssHas||D.push(":has"),D=D.length&&new RegExp(D.join("|")),kt=function(F,U){if(F===U)return m=!0,0;var nt=!F.compareDocumentPosition-!U.compareDocumentPosition;return nt||(nt=(F.ownerDocument||F)==(U.ownerDocument||U)?F.compareDocumentPosition(U):1,nt&1||!p.sortDetached&&U.compareDocumentPosition(F)===nt?F===x||F.ownerDocument==N&&Ct.contains(N,F)?-1:U===x||U.ownerDocument==N&&Ct.contains(N,U)?1:d?v.call(d,F)-v.call(d,U):0:nt&4?-1:1)}),x}Ct.matches=function(_,P){return Ct(_,null,null,P)},Ct.matchesSelector=function(_,P){if(We(_),H&&!Rt[P+" "]&&(!D||!D.test(P)))try{var $=Z.call(_,P);if($||p.disconnectedMatch||_.document&&_.document.nodeType!==11)return $}catch{Rt(P,!0)}return Ct(P,x,null,[_]).length>0},Ct.contains=function(_,P){return(_.ownerDocument||_)!=x&&We(_),h.contains(_,P)},Ct.attr=function(_,P){(_.ownerDocument||_)!=x&&We(_);var $=n.attrHandle[P.toLowerCase()],F=$&&w.call(n.attrHandle,P.toLowerCase())?$(_,P,!H):void 0;return F!==void 0?F:_.getAttribute(P)},Ct.error=function(_){throw new Error("Syntax error, unrecognized expression: "+_)},h.uniqueSort=function(_){var P,$=[],F=0,U=0;if(m=!p.sortStable,d=!p.sortStable&&o.call(_,0),G.call(_,kt),m){for(;P=_[U++];)P===_[U]&&(F=$.push(U));for(;F--;)j.call(_,$[F],1)}return d=null,_},h.fn.uniqueSort=function(){return this.pushStack(h.uniqueSort(o.apply(this)))},n=h.expr={cacheLength:50,createPseudo:be,match:_e,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(_){return _[1]=_[1].replace(Oe,ke),_[3]=(_[3]||_[4]||_[5]||"").replace(Oe,ke),_[2]==="~="&&(_[3]=" "+_[3]+" "),_.slice(0,4)},CHILD:function(_){return _[1]=_[1].toLowerCase(),_[1].slice(0,3)==="nth"?(_[3]||Ct.error(_[0]),_[4]=+(_[4]?_[5]+(_[6]||1):2*(_[3]==="even"||_[3]==="odd")),_[5]=+(_[7]+_[8]||_[3]==="odd")):_[3]&&Ct.error(_[0]),_},PSEUDO:function(_){var P,$=!_[6]&&_[2];return _e.CHILD.test(_[0])?null:(_[3]?_[2]=_[4]||_[5]||"":$&&Te.test($)&&(P=Qa($,!0))&&(P=$.indexOf(")",$.length-P)-$.length)&&(_[0]=_[0].slice(0,P),_[2]=$.slice(0,P)),_.slice(0,3))}},filter:{TAG:function(_){var P=_.replace(Oe,ke).toLowerCase();return _==="*"?function(){return!0}:function($){return k($,P)}},CLASS:function(_){var P=ft[_+" "];return P||(P=new RegExp("(^|"+I+")"+_+"("+I+"|$)"))&&ft(_,function($){return P.test(typeof $.className=="string"&&$.className||typeof $.getAttribute<"u"&&$.getAttribute("class")||"")})},ATTR:function(_,P,$){return function(F){var U=Ct.attr(F,_);return U==null?P==="!=":P?(U+="",P==="="?U===$:P==="!="?U!==$:P==="^="?$&&U.indexOf($)===0:P==="*="?$&&U.indexOf($)>-1:P==="$="?$&&U.slice(-$.length)===$:P==="~="?(" "+U.replace(Et," ")+" ").indexOf($)>-1:P==="|="?U===$||U.slice(0,$.length+1)===$+"-":!1):!0}},CHILD:function(_,P,$,F,U){var nt=_.slice(0,3)!=="nth",st=_.slice(-4)!=="last",lt=P==="of-type";return F===1&&U===0?function(ot){return!!ot.parentNode}:function(ot,gt,ut){var Mt,yt,ct,Tt,te,qt=nt!==st?"nextSibling":"previousSibling",ue=ot.parentNode,He=lt&&ot.nodeName.toLowerCase(),Ea=!ut&&!lt,Zt=!1;if(ue){if(nt){for(;qt;){for(ct=ot;ct=ct[qt];)if(lt?k(ct,He):ct.nodeType===1)return!1;te=qt=_==="only"&&!te&&"nextSibling"}return!0}if(te=[st?ue.firstChild:ue.lastChild],st&&Ea){for(yt=ue[Y]||(ue[Y]={}),Mt=yt[_]||[],Tt=Mt[0]===R&&Mt[1],Zt=Tt&&Mt[2],ct=Tt&&ue.childNodes[Tt];ct=++Tt&&ct&&ct[qt]||(Zt=Tt=0)||te.pop();)if(ct.nodeType===1&&++Zt&&ct===ot){yt[_]=[R,Tt,Zt];break}}else if(Ea&&(yt=ot[Y]||(ot[Y]={}),Mt=yt[_]||[],Tt=Mt[0]===R&&Mt[1],Zt=Tt),Zt===!1)for(;(ct=++Tt&&ct&&ct[qt]||(Zt=Tt=0)||te.pop())&&!((lt?k(ct,He):ct.nodeType===1)&&++Zt&&(Ea&&(yt=ct[Y]||(ct[Y]={}),yt[_]=[R,Zt]),ct===ot)););return Zt-=U,Zt===F||Zt%F===0&&Zt/F>=0}}},PSEUDO:function(_,P){var $,F=n.pseudos[_]||n.setFilters[_.toLowerCase()]||Ct.error("unsupported pseudo: "+_);return F[Y]?F(P):F.length>1?($=[_,_,"",P],n.setFilters.hasOwnProperty(_.toLowerCase())?be(function(U,nt){for(var st,lt=F(U,P),ot=lt.length;ot--;)st=v.call(U,lt[ot]),U[st]=!(nt[st]=lt[ot])}):function(U){return F(U,0,$)}):F}},pseudos:{not:be(function(_){var P=[],$=[],F=g2(_.replace(X,"$1"));return F[Y]?be(function(U,nt,st,lt){for(var ot,gt=F(U,null,lt,[]),ut=U.length;ut--;)(ot=gt[ut])&&(U[ut]=!(nt[ut]=ot))}):function(U,nt,st){return P[0]=U,F(P,null,st,$),P[0]=null,!$.pop()}}),has:be(function(_){return function(P){return Ct(_,P).length>0}}),contains:be(function(_){return _=_.replace(Oe,ke),function(P){return(P.textContent||h.text(P)).indexOf(_)>-1}}),lang:be(function(_){return Ka.test(_||"")||Ct.error("unsupported lang: "+_),_=_.replace(Oe,ke).toLowerCase(),function(P){var $;do if($=H?P.lang:P.getAttribute("xml:lang")||P.getAttribute("lang"))return $=$.toLowerCase(),$===_||$.indexOf(_+"-")===0;while((P=P.parentNode)&&P.nodeType===1);return!1}}),target:function(_){var P=t.location&&t.location.hash;return P&&P.slice(1)===_.id},root:function(_){return _===V},focus:function(_){return _===Al()&&x.hasFocus()&&!!(_.type||_.href||~_.tabIndex)},enabled:tr(!1),disabled:tr(!0),checked:function(_){return k(_,"input")&&!!_.checked||k(_,"option")&&!!_.selected},selected:function(_){return _.parentNode&&_.parentNode.selectedIndex,_.selected===!0},empty:function(_){for(_=_.firstChild;_;_=_.nextSibling)if(_.nodeType<6)return!1;return!0},parent:function(_){return!n.pseudos.empty(_)},header:function(_){return qe.test(_.nodeName)},input:function(_){return Fe.test(_.nodeName)},button:function(_){return k(_,"input")&&_.type==="button"||k(_,"button")},text:function(_){var P;return k(_,"input")&&_.type==="text"&&((P=_.getAttribute("type"))==null||P.toLowerCase()==="text")},first:sa(function(){return[0]}),last:sa(function(_,P){return[P-1]}),eq:sa(function(_,P,$){return[$<0?$+P:$]}),even:sa(function(_,P){for(var $=0;$<P;$+=2)_.push($);return _}),odd:sa(function(_,P){for(var $=1;$<P;$+=2)_.push($);return _}),lt:sa(function(_,P,$){var F;for($<0?F=$+P:$>P?F=P:F=$;--F>=0;)_.push(F);return _}),gt:sa(function(_,P,$){for(var F=$<0?$+P:$;++F<P;)_.push(F);return _})}},n.pseudos.nth=n.pseudos.eq;for(i in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})n.pseudos[i]=Tl(i);for(i in{submit:!0,reset:!0})n.pseudos[i]=_l(i);function er(){}er.prototype=n.filters=n.pseudos,n.setFilters=new er;function Qa(_,P){var $,F,U,nt,st,lt,ot,gt=bt[_+" "];if(gt)return P?0:gt.slice(0);for(st=_,lt=[],ot=n.preFilter;st;){(!$||(F=Lt.exec(st)))&&(F&&(st=st.slice(F[0].length)||st),lt.push(U=[])),$=!1,(F=Ya.exec(st))&&($=F.shift(),U.push({value:$,type:F[0].replace(X," ")}),st=st.slice($.length));for(nt in n.filter)(F=_e[nt].exec(st))&&(!ot[nt]||(F=ot[nt](F)))&&($=F.shift(),U.push({value:$,type:nt,matches:F}),st=st.slice($.length));if(!$)break}return P?st.length:st?Ct.error(_):bt(_,lt).slice(0)}function x1(_){for(var P=0,$=_.length,F="";P<$;P++)F+=_[P].value;return F}function w1(_,P,$){var F=P.dir,U=P.next,nt=U||F,st=$&&nt==="parentNode",lt=it++;return P.first?function(ot,gt,ut){for(;ot=ot[F];)if(ot.nodeType===1||st)return _(ot,gt,ut);return!1}:function(ot,gt,ut){var Mt,yt,ct=[R,lt];if(ut){for(;ot=ot[F];)if((ot.nodeType===1||st)&&_(ot,gt,ut))return!0}else for(;ot=ot[F];)if(ot.nodeType===1||st)if(yt=ot[Y]||(ot[Y]={}),U&&k(ot,U))ot=ot[F]||ot;else{if((Mt=yt[nt])&&Mt[0]===R&&Mt[1]===lt)return ct[2]=Mt[2];if(yt[nt]=ct,ct[2]=_(ot,gt,ut))return!0}return!1}}function M2(_){return _.length>1?function(P,$,F){for(var U=_.length;U--;)if(!_[U](P,$,F))return!1;return!0}:_[0]}function Hl(_,P,$){for(var F=0,U=P.length;F<U;F++)Ct(_,P[F],$);return $}function b1(_,P,$,F,U){for(var nt,st=[],lt=0,ot=_.length,gt=P!=null;lt<ot;lt++)(nt=_[lt])&&(!$||$(nt,F,U))&&(st.push(nt),gt&&P.push(lt));return st}function m2(_,P,$,F,U,nt){return F&&!F[Y]&&(F=m2(F)),U&&!U[Y]&&(U=m2(U,nt)),be(function(st,lt,ot,gt){var ut,Mt,yt,ct,Tt=[],te=[],qt=lt.length,ue=st||Hl(P||"*",ot.nodeType?[ot]:ot,[]),He=_&&(st||!P)?b1(ue,Tt,_,ot,gt):ue;if($?(ct=U||(st?_:qt||F)?[]:lt,$(He,ct,ot,gt)):ct=He,F)for(ut=b1(ct,te),F(ut,[],ot,gt),Mt=ut.length;Mt--;)(yt=ut[Mt])&&(ct[te[Mt]]=!(He[te[Mt]]=yt));if(st){if(U||_){if(U){for(ut=[],Mt=ct.length;Mt--;)(yt=ct[Mt])&&ut.push(He[Mt]=yt);U(null,ct=[],ut,gt)}for(Mt=ct.length;Mt--;)(yt=ct[Mt])&&(ut=U?v.call(st,yt):Tt[Mt])>-1&&(st[ut]=!(lt[ut]=yt))}}else ct=b1(ct===lt?ct.splice(qt,ct.length):ct),U?U(null,lt,ct,gt):y.apply(lt,ct)})}function v2(_){for(var P,$,F,U=_.length,nt=n.relative[_[0].type],st=nt||n.relative[" "],lt=nt?1:0,ot=w1(function(Mt){return Mt===P},st,!0),gt=w1(function(Mt){return v.call(P,Mt)>-1},st,!0),ut=[function(Mt,yt,ct){var Tt=!nt&&(ct||yt!=l)||((P=yt).nodeType?ot(Mt,yt,ct):gt(Mt,yt,ct));return P=null,Tt}];lt<U;lt++)if($=n.relative[_[lt].type])ut=[w1(M2(ut),$)];else{if($=n.filter[_[lt].type].apply(null,_[lt].matches),$[Y]){for(F=++lt;F<U&&!n.relative[_[F].type];F++);return m2(lt>1&&M2(ut),lt>1&&x1(_.slice(0,lt-1).concat({value:_[lt-2].type===" "?"*":""})).replace(X,"$1"),$,lt<F&&v2(_.slice(lt,F)),F<U&&v2(_=_.slice(F)),F<U&&x1(_))}ut.push($)}return M2(ut)}function Ll(_,P){var $=P.length>0,F=_.length>0,U=function(nt,st,lt,ot,gt){var ut,Mt,yt,ct=0,Tt="0",te=nt&&[],qt=[],ue=l,He=nt||F&&n.find.TAG("*",gt),Ea=R+=ue==null?1:Math.random()||.1,Zt=He.length;for(gt&&(l=st==x||st||gt);Tt!==Zt&&(ut=He[Tt])!=null;Tt++){if(F&&ut){for(Mt=0,!st&&ut.ownerDocument!=x&&(We(ut),lt=!H);yt=_[Mt++];)if(yt(ut,st||x,lt)){y.call(ot,ut);break}gt&&(R=Ea)}$&&((ut=!yt&&ut)&&ct--,nt&&te.push(ut))}if(ct+=Tt,$&&Tt!==ct){for(Mt=0;yt=P[Mt++];)yt(te,qt,st,lt);if(nt){if(ct>0)for(;Tt--;)te[Tt]||qt[Tt]||(qt[Tt]=z.call(ot));qt=b1(qt)}y.apply(ot,qt),gt&&!nt&&qt.length>0&&ct+P.length>1&&h.uniqueSort(ot)}return gt&&(R=Ea,l=ue),te};return $?be(U):U}function g2(_,P){var $,F=[],U=[],nt=vt[_+" "];if(!nt){for(P||(P=Qa(_)),$=P.length;$--;)nt=v2(P[$]),nt[Y]?F.push(nt):U.push(nt);nt=vt(_,Ll(U,F)),nt.selector=_}return nt}function ar(_,P,$,F){var U,nt,st,lt,ot,gt=typeof _=="function"&&_,ut=!F&&Qa(_=gt.selector||_);if($=$||[],ut.length===1){if(nt=ut[0]=ut[0].slice(0),nt.length>2&&(st=nt[0]).type==="ID"&&P.nodeType===9&&H&&n.relative[nt[1].type]){if(P=(n.find.ID(st.matches[0].replace(Oe,ke),P)||[])[0],P)gt&&(P=P.parentNode);else return $;_=_.slice(nt.shift().value.length)}for(U=_e.needsContext.test(_)?0:nt.length;U--&&(st=nt[U],!n.relative[lt=st.type]);)if((ot=n.find[lt])&&(F=ot(st.matches[0].replace(Oe,ke),u2.test(nt[0].type)&&f2(P.parentNode)||P))){if(nt.splice(U,1),_=F.length&&x1(nt),!_)return y.apply($,F),$;break}}return(gt||g2(_,ut))(F,P,!H,$,!P||u2.test(_)&&f2(P.parentNode)||P),$}p.sortStable=Y.split("").sort(kt).join("")===Y,We(),p.sortDetached=ba(function(_){return _.compareDocumentPosition(x.createElement("fieldset"))&1}),h.find=Ct,h.expr[":"]=h.expr.pseudos,h.unique=h.uniqueSort,Ct.compile=g2,Ct.select=ar,Ct.setDocument=We,Ct.tokenize=Qa,Ct.escape=h.escapeSelector,Ct.getText=h.text,Ct.isXML=h.isXMLDoc,Ct.selectors=h.expr,Ct.support=h.support,Ct.uniqueSort=h.uniqueSort})();var at=function(i,n,l){for(var d=[],m=l!==void 0;(i=i[n])&&i.nodeType!==9;)if(i.nodeType===1){if(m&&h(i).is(l))break;d.push(i)}return d},pt=function(i,n){for(var l=[];i;i=i.nextSibling)i.nodeType===1&&i!==n&&l.push(i);return l},St=h.expr.match.needsContext,At=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function Ot(i,n,l){return u(n)?h.grep(i,function(d,m){return!!n.call(d,m,d)!==l}):n.nodeType?h.grep(i,function(d){return d===n!==l}):typeof n!="string"?h.grep(i,function(d){return v.call(n,d)>-1!==l}):h.filter(n,i,l)}h.filter=function(i,n,l){var d=n[0];return l&&(i=":not("+i+")"),n.length===1&&d.nodeType===1?h.find.matchesSelector(d,i)?[d]:[]:h.find.matches(i,h.grep(n,function(m){return m.nodeType===1}))},h.fn.extend({find:function(i){var n,l,d=this.length,m=this;if(typeof i!="string")return this.pushStack(h(i).filter(function(){for(n=0;n<d;n++)if(h.contains(m[n],this))return!0}));for(l=this.pushStack([]),n=0;n<d;n++)h.find(i,m[n],l);return d>1?h.uniqueSort(l):l},filter:function(i){return this.pushStack(Ot(this,i||[],!1))},not:function(i){return this.pushStack(Ot(this,i||[],!0))},is:function(i){return!!Ot(this,typeof i=="string"&&St.test(i)?h(i):i||[],!1).length}});var jt,tt=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,K=h.fn.init=function(i,n,l){var d,m;if(!i)return this;if(l=l||jt,typeof i=="string")if(i[0]==="<"&&i[i.length-1]===">"&&i.length>=3?d=[null,i,null]:d=tt.exec(i),d&&(d[1]||!n))if(d[1]){if(n=n instanceof h?n[0]:n,h.merge(this,h.parseHTML(d[1],n&&n.nodeType?n.ownerDocument||n:S,!0)),At.test(d[1])&&h.isPlainObject(n))for(d in n)u(this[d])?this[d](n[d]):this.attr(d,n[d]);return this}else return m=S.getElementById(d[2]),m&&(this[0]=m,this.length=1),this;else return!n||n.jquery?(n||l).find(i):this.constructor(n).find(i);else{if(i.nodeType)return this[0]=i,this.length=1,this;if(u(i))return l.ready!==void 0?l.ready(i):i(h)}return h.makeArray(i,this)};K.prototype=h.fn,jt=h(S);var rt=/^(?:parents|prev(?:Until|All))/,mt={children:!0,contents:!0,next:!0,prev:!0};h.fn.extend({has:function(i){var n=h(i,this),l=n.length;return this.filter(function(){for(var d=0;d<l;d++)if(h.contains(this,n[d]))return!0})},closest:function(i,n){var l,d=0,m=this.length,y=[],x=typeof i!="string"&&h(i);if(!St.test(i)){for(;d<m;d++)for(l=this[d];l&&l!==n;l=l.parentNode)if(l.nodeType<11&&(x?x.index(l)>-1:l.nodeType===1&&h.find.matchesSelector(l,i))){y.push(l);break}}return this.pushStack(y.length>1?h.uniqueSort(y):y)},index:function(i){return i?typeof i=="string"?v.call(h(i),this[0]):v.call(this,i.jquery?i[0]:i):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(i,n){return this.pushStack(h.uniqueSort(h.merge(this.get(),h(i,n))))},addBack:function(i){return this.add(i==null?this.prevObject:this.prevObject.filter(i))}});function Ht(i,n){for(;(i=i[n])&&i.nodeType!==1;);return i}h.each({parent:function(i){var n=i.parentNode;return n&&n.nodeType!==11?n:null},parents:function(i){return at(i,"parentNode")},parentsUntil:function(i,n,l){return at(i,"parentNode",l)},next:function(i){return Ht(i,"nextSibling")},prev:function(i){return Ht(i,"previousSibling")},nextAll:function(i){return at(i,"nextSibling")},prevAll:function(i){return at(i,"previousSibling")},nextUntil:function(i,n,l){return at(i,"nextSibling",l)},prevUntil:function(i,n,l){return at(i,"previousSibling",l)},siblings:function(i){return pt((i.parentNode||{}).firstChild,i)},children:function(i){return pt(i.firstChild)},contents:function(i){return i.contentDocument!=null&&s(i.contentDocument)?i.contentDocument:(k(i,"template")&&(i=i.content||i),h.merge([],i.childNodes))}},function(i,n){h.fn[i]=function(l,d){var m=h.map(this,n,l);return i.slice(-5)!=="Until"&&(d=l),d&&typeof d=="string"&&(m=h.filter(d,m)),this.length>1&&(mt[i]||h.uniqueSort(m),rt.test(i)&&m.reverse()),this.pushStack(m)}});var Vt=/[^\x20\t\r\n\f]+/g;function Yt(i){var n={};return h.each(i.match(Vt)||[],function(l,d){n[d]=!0}),n}h.Callbacks=function(i){i=typeof i=="string"?Yt(i):h.extend({},i);var n,l,d,m,y=[],x=[],V=-1,H=function(){for(m=m||i.once,d=n=!0;x.length;V=-1)for(l=x.shift();++V<y.length;)y[V].apply(l[0],l[1])===!1&&i.stopOnFalse&&(V=y.length,l=!1);i.memory||(l=!1),n=!1,m&&(l?y=[]:y="")},D={add:function(){return y&&(l&&!n&&(V=y.length-1,x.push(l)),function Z(Y){h.each(Y,function(R,it){u(it)?(!i.unique||!D.has(it))&&y.push(it):it&&it.length&&L(it)!=="string"&&Z(it)})}(arguments),l&&!n&&H()),this},remove:function(){return h.each(arguments,function(Z,Y){for(var R;(R=h.inArray(Y,y,R))>-1;)y.splice(R,1),R<=V&&V--}),this},has:function(Z){return Z?h.inArray(Z,y)>-1:y.length>0},empty:function(){return y&&(y=[]),this},disable:function(){return m=x=[],y=l="",this},disabled:function(){return!y},lock:function(){return m=x=[],!l&&!n&&(y=l=""),this},locked:function(){return!!m},fireWith:function(Z,Y){return m||(Y=Y||[],Y=[Z,Y.slice?Y.slice():Y],x.push(Y),n||H()),this},fire:function(){return D.fireWith(this,arguments),this},fired:function(){return!!d}};return D};function It(i){return i}function Ft(i){throw i}function Pt(i,n,l,d){var m;try{i&&u(m=i.promise)?m.call(i).done(n).fail(l):i&&u(m=i.then)?m.call(i,n,l):n.apply(void 0,[i].slice(d))}catch(y){l.apply(void 0,[y])}}h.extend({Deferred:function(i){var n=[["notify","progress",h.Callbacks("memory"),h.Callbacks("memory"),2],["resolve","done",h.Callbacks("once memory"),h.Callbacks("once memory"),0,"resolved"],["reject","fail",h.Callbacks("once memory"),h.Callbacks("once memory"),1,"rejected"]],l="pending",d={state:function(){return l},always:function(){return m.done(arguments).fail(arguments),this},catch:function(y){return d.then(null,y)},pipe:function(){var y=arguments;return h.Deferred(function(x){h.each(n,function(V,H){var D=u(y[H[4]])&&y[H[4]];m[H[1]](function(){var Z=D&&D.apply(this,arguments);Z&&u(Z.promise)?Z.promise().progress(x.notify).done(x.resolve).fail(x.reject):x[H[0]+"With"](this,D?[Z]:arguments)})}),y=null}).promise()},then:function(y,x,V){var H=0;function D(Z,Y,R,it){return function(){var ft=this,bt=arguments,vt=function(){var kt,Ce;if(!(Z<H)){if(kt=R.apply(ft,bt),kt===Y.promise())throw new TypeError("Thenable self-resolution");Ce=kt&&(typeof kt=="object"||typeof kt=="function")&&kt.then,u(Ce)?it?Ce.call(kt,D(H,Y,It,it),D(H,Y,Ft,it)):(H++,Ce.call(kt,D(H,Y,It,it),D(H,Y,Ft,it),D(H,Y,It,Y.notifyWith))):(R!==It&&(ft=void 0,bt=[kt]),(it||Y.resolveWith)(ft,bt))}},Rt=it?vt:function(){try{vt()}catch(kt){h.Deferred.exceptionHook&&h.Deferred.exceptionHook(kt,Rt.error),Z+1>=H&&(R!==Ft&&(ft=void 0,bt=[kt]),Y.rejectWith(ft,bt))}};Z?Rt():(h.Deferred.getErrorHook?Rt.error=h.Deferred.getErrorHook():h.Deferred.getStackHook&&(Rt.error=h.Deferred.getStackHook()),t.setTimeout(Rt))}}return h.Deferred(function(Z){n[0][3].add(D(0,Z,u(V)?V:It,Z.notifyWith)),n[1][3].add(D(0,Z,u(y)?y:It)),n[2][3].add(D(0,Z,u(x)?x:Ft))}).promise()},promise:function(y){return y!=null?h.extend(y,d):d}},m={};return h.each(n,function(y,x){var V=x[2],H=x[5];d[x[1]]=V.add,H&&V.add(function(){l=H},n[3-y][2].disable,n[3-y][3].disable,n[0][2].lock,n[0][3].lock),V.add(x[3].fire),m[x[0]]=function(){return m[x[0]+"With"](this===m?void 0:this,arguments),this},m[x[0]+"With"]=V.fireWith}),d.promise(m),i&&i.call(m,m),m},when:function(i){var n=arguments.length,l=n,d=Array(l),m=o.call(arguments),y=h.Deferred(),x=function(V){return function(H){d[V]=this,m[V]=arguments.length>1?o.call(arguments):H,--n||y.resolveWith(d,m)}};if(n<=1&&(Pt(i,y.done(x(l)).resolve,y.reject,!n),y.state()==="pending"||u(m[l]&&m[l].then)))return y.then();for(;l--;)Pt(m[l],x(l),y.reject);return y.promise()}});var Gt=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;h.Deferred.exceptionHook=function(i,n){t.console&&t.console.warn&&i&&Gt.test(i.name)&&t.console.warn("jQuery.Deferred exception: "+i.message,i.stack,n)},h.readyException=function(i){t.setTimeout(function(){throw i})};var he=h.Deferred();h.fn.ready=function(i){return he.then(i).catch(function(n){h.readyException(n)}),this},h.extend({isReady:!1,readyWait:1,ready:function(i){(i===!0?--h.readyWait:h.isReady)||(h.isReady=!0,!(i!==!0&&--h.readyWait>0)&&he.resolveWith(S,[h]))}}),h.ready.then=he.then;function le(){S.removeEventListener("DOMContentLoaded",le),t.removeEventListener("load",le),h.ready()}S.readyState==="complete"||S.readyState!=="loading"&&!S.documentElement.doScroll?t.setTimeout(h.ready):(S.addEventListener("DOMContentLoaded",le),t.addEventListener("load",le));var Nt=function(i,n,l,d,m,y,x){var V=0,H=i.length,D=l==null;if(L(l)==="object"){m=!0;for(V in l)Nt(i,n,V,l[V],!0,y,x)}else if(d!==void 0&&(m=!0,u(d)||(x=!0),D&&(x?(n.call(i,d),n=null):(D=n,n=function(Z,Y,R){return D.call(h(Z),R)})),n))for(;V<H;V++)n(i[V],l,x?d:d.call(i[V],V,n(i[V],l)));return m?i:D?n.call(i):H?n(i[0],l):y},Se=/^-ms-/,Kt=/-([a-z])/g;function ye(i,n){return n.toUpperCase()}function $t(i){return i.replace(Se,"ms-").replace(Kt,ye)}var de=function(i){return i.nodeType===1||i.nodeType===9||!+i.nodeType};function ae(){this.expando=h.expando+ae.uid++}ae.uid=1,ae.prototype={cache:function(i){var n=i[this.expando];return n||(n={},de(i)&&(i.nodeType?i[this.expando]=n:Object.defineProperty(i,this.expando,{value:n,configurable:!0}))),n},set:function(i,n,l){var d,m=this.cache(i);if(typeof n=="string")m[$t(n)]=l;else for(d in n)m[$t(d)]=n[d];return m},get:function(i,n){return n===void 0?this.cache(i):i[this.expando]&&i[this.expando][$t(n)]},access:function(i,n,l){return n===void 0||n&&typeof n=="string"&&l===void 0?this.get(i,n):(this.set(i,n,l),l!==void 0?l:n)},remove:function(i,n){var l,d=i[this.expando];if(d!==void 0){if(n!==void 0)for(Array.isArray(n)?n=n.map($t):(n=$t(n),n=n in d?[n]:n.match(Vt)||[]),l=n.length;l--;)delete d[n[l]];(n===void 0||h.isEmptyObject(d))&&(i.nodeType?i[this.expando]=void 0:delete i[this.expando])}},hasData:function(i){var n=i[this.expando];return n!==void 0&&!h.isEmptyObject(n)}};var ht=new ae,Dt=new ae,xe=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,ta=/[A-Z]/g;function ea(i){return i==="true"?!0:i==="false"?!1:i==="null"?null:i===+i+""?+i:xe.test(i)?JSON.parse(i):i}function Ei(i,n,l){var d;if(l===void 0&&i.nodeType===1)if(d="data-"+n.replace(ta,"-$&").toLowerCase(),l=i.getAttribute(d),typeof l=="string"){try{l=ea(l)}catch{}Dt.set(i,n,l)}else l=void 0;return l}h.extend({hasData:function(i){return Dt.hasData(i)||ht.hasData(i)},data:function(i,n,l){return Dt.access(i,n,l)},removeData:function(i,n){Dt.remove(i,n)},_data:function(i,n,l){return ht.access(i,n,l)},_removeData:function(i,n){ht.remove(i,n)}}),h.fn.extend({data:function(i,n){var l,d,m,y=this[0],x=y&&y.attributes;if(i===void 0){if(this.length&&(m=Dt.get(y),y.nodeType===1&&!ht.get(y,"hasDataAttrs"))){for(l=x.length;l--;)x[l]&&(d=x[l].name,d.indexOf("data-")===0&&(d=$t(d.slice(5)),Ei(y,d,m[d])));ht.set(y,"hasDataAttrs",!0)}return m}return typeof i=="object"?this.each(function(){Dt.set(this,i)}):Nt(this,function(V){var H;if(y&&V===void 0)return H=Dt.get(y,i),H!==void 0||(H=Ei(y,i),H!==void 0)?H:void 0;this.each(function(){Dt.set(this,i,V)})},null,n,arguments.length>1,null,!0)},removeData:function(i){return this.each(function(){Dt.remove(this,i)})}}),h.extend({queue:function(i,n,l){var d;if(i)return n=(n||"fx")+"queue",d=ht.get(i,n),l&&(!d||Array.isArray(l)?d=ht.access(i,n,h.makeArray(l)):d.push(l)),d||[]},dequeue:function(i,n){n=n||"fx";var l=h.queue(i,n),d=l.length,m=l.shift(),y=h._queueHooks(i,n),x=function(){h.dequeue(i,n)};m==="inprogress"&&(m=l.shift(),d--),m&&(n==="fx"&&l.unshift("inprogress"),delete y.stop,m.call(i,x,y)),!d&&y&&y.empty.fire()},_queueHooks:function(i,n){var l=n+"queueHooks";return ht.get(i,l)||ht.access(i,l,{empty:h.Callbacks("once memory").add(function(){ht.remove(i,[n+"queue",l])})})}}),h.fn.extend({queue:function(i,n){var l=2;return typeof i!="string"&&(n=i,i="fx",l--),arguments.length<l?h.queue(this[0],i):n===void 0?this:this.each(function(){var d=h.queue(this,i,n);h._queueHooks(this,i),i==="fx"&&d[0]!=="inprogress"&&h.dequeue(this,i)})},dequeue:function(i){return this.each(function(){h.dequeue(this,i)})},clearQueue:function(i){return this.queue(i||"fx",[])},promise:function(i,n){var l,d=1,m=h.Deferred(),y=this,x=this.length,V=function(){--d||m.resolveWith(y,[y])};for(typeof i!="string"&&(n=i,i=void 0),i=i||"fx";x--;)l=ht.get(y[x],i+"queueHooks"),l&&l.empty&&(d++,l.empty.add(V));return V(),m.promise(n)}});var Si=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,Wa=new RegExp("^(?:([+-])=|)("+Si+")([a-z%]*)$","i"),De=["Top","Right","Bottom","Left"],aa=S.documentElement,ma=function(i){return h.contains(i.ownerDocument,i)},Fh={composed:!0};aa.getRootNode&&(ma=function(i){return h.contains(i.ownerDocument,i)||i.getRootNode(Fh)===i.ownerDocument});var f1=function(i,n){return i=n||i,i.style.display==="none"||i.style.display===""&&ma(i)&&h.css(i,"display")==="none"};function Ci(i,n,l,d){var m,y,x=20,V=d?function(){return d.cur()}:function(){return h.css(i,n,"")},H=V(),D=l&&l[3]||(h.cssNumber[n]?"":"px"),Z=i.nodeType&&(h.cssNumber[n]||D!=="px"&&+H)&&Wa.exec(h.css(i,n));if(Z&&Z[3]!==D){for(H=H/2,D=D||Z[3],Z=+H||1;x--;)h.style(i,n,Z+D),(1-y)*(1-(y=V()/H||.5))<=0&&(x=0),Z=Z/y;Z=Z*2,h.style(i,n,Z+D),l=l||[]}return l&&(Z=+Z||+H||0,m=l[1]?Z+(l[1]+1)*l[2]:+l[2],d&&(d.unit=D,d.start=Z,d.end=m)),m}var Ai={};function qh(i){var n,l=i.ownerDocument,d=i.nodeName,m=Ai[d];return m||(n=l.body.appendChild(l.createElement(d)),m=h.css(n,"display"),n.parentNode.removeChild(n),m==="none"&&(m="block"),Ai[d]=m,m)}function va(i,n){for(var l,d,m=[],y=0,x=i.length;y<x;y++)d=i[y],d.style&&(l=d.style.display,n?(l==="none"&&(m[y]=ht.get(d,"display")||null,m[y]||(d.style.display="")),d.style.display===""&&f1(d)&&(m[y]=qh(d))):l!=="none"&&(m[y]="none",ht.set(d,"display",l)));for(y=0;y<x;y++)m[y]!=null&&(i[y].style.display=m[y]);return i}h.fn.extend({show:function(){return va(this,!0)},hide:function(){return va(this)},toggle:function(i){return typeof i=="boolean"?i?this.show():this.hide():this.each(function(){f1(this)?h(this).show():h(this).hide()})}});var ja=/^(?:checkbox|radio)$/i,Ti=/<([a-z][^\/\0>\x20\t\r\n\f]*)/i,_i=/^$|^module$|\/(?:java|ecma)script/i;(function(){var i=S.createDocumentFragment(),n=i.appendChild(S.createElement("div")),l=S.createElement("input");l.setAttribute("type","radio"),l.setAttribute("checked","checked"),l.setAttribute("name","t"),n.appendChild(l),p.checkClone=n.cloneNode(!0).cloneNode(!0).lastChild.checked,n.innerHTML="<textarea>x</textarea>",p.noCloneChecked=!!n.cloneNode(!0).lastChild.defaultValue,n.innerHTML="<option></option>",p.option=!!n.lastChild})();var ce={thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ce.tbody=ce.tfoot=ce.colgroup=ce.caption=ce.thead,ce.th=ce.td,p.option||(ce.optgroup=ce.option=[1,"<select multiple='multiple'>","</select>"]);function Qt(i,n){var l;return typeof i.getElementsByTagName<"u"?l=i.getElementsByTagName(n||"*"):typeof i.querySelectorAll<"u"?l=i.querySelectorAll(n||"*"):l=[],n===void 0||n&&k(i,n)?h.merge([i],l):l}function Q1(i,n){for(var l=0,d=i.length;l<d;l++)ht.set(i[l],"globalEval",!n||ht.get(n[l],"globalEval"))}var Wh=/<|&#?\w+;/;function Hi(i,n,l,d,m){for(var y,x,V,H,D,Z,Y=n.createDocumentFragment(),R=[],it=0,ft=i.length;it<ft;it++)if(y=i[it],y||y===0)if(L(y)==="object")h.merge(R,y.nodeType?[y]:y);else if(!Wh.test(y))R.push(n.createTextNode(y));else{for(x=x||Y.appendChild(n.createElement("div")),V=(Ti.exec(y)||["",""])[1].toLowerCase(),H=ce[V]||ce._default,x.innerHTML=H[1]+h.htmlPrefilter(y)+H[2],Z=H[0];Z--;)x=x.lastChild;h.merge(R,x.childNodes),x=Y.firstChild,x.textContent=""}for(Y.textContent="",it=0;y=R[it++];){if(d&&h.inArray(y,d)>-1){m&&m.push(y);continue}if(D=ma(y),x=Qt(Y.appendChild(y),"script"),D&&Q1(x),l)for(Z=0;y=x[Z++];)_i.test(y.type||"")&&l.push(y)}return Y}var Li=/^([^.]*)(?:\.(.+)|)/;function ga(){return!0}function ya(){return!1}function J1(i,n,l,d,m,y){var x,V;if(typeof n=="object"){typeof l!="string"&&(d=d||l,l=void 0);for(V in n)J1(i,V,l,d,n[V],y);return i}if(d==null&&m==null?(m=l,d=l=void 0):m==null&&(typeof l=="string"?(m=d,d=void 0):(m=d,d=l,l=void 0)),m===!1)m=ya;else if(!m)return i;return y===1&&(x=m,m=function(H){return h().off(H),x.apply(this,arguments)},m.guid=x.guid||(x.guid=h.guid++)),i.each(function(){h.event.add(this,n,m,d,l)})}h.event={global:{},add:function(i,n,l,d,m){var y,x,V,H,D,Z,Y,R,it,ft,bt,vt=ht.get(i);if(de(i))for(l.handler&&(y=l,l=y.handler,m=y.selector),m&&h.find.matchesSelector(aa,m),l.guid||(l.guid=h.guid++),(H=vt.events)||(H=vt.events=Object.create(null)),(x=vt.handle)||(x=vt.handle=function(Rt){return typeof h<"u"&&h.event.triggered!==Rt.type?h.event.dispatch.apply(i,arguments):void 0}),n=(n||"").match(Vt)||[""],D=n.length;D--;)V=Li.exec(n[D])||[],it=bt=V[1],ft=(V[2]||"").split(".").sort(),it&&(Y=h.event.special[it]||{},it=(m?Y.delegateType:Y.bindType)||it,Y=h.event.special[it]||{},Z=h.extend({type:it,origType:bt,data:d,handler:l,guid:l.guid,selector:m,needsContext:m&&h.expr.match.needsContext.test(m),namespace:ft.join(".")},y),(R=H[it])||(R=H[it]=[],R.delegateCount=0,(!Y.setup||Y.setup.call(i,d,ft,x)===!1)&&i.addEventListener&&i.addEventListener(it,x)),Y.add&&(Y.add.call(i,Z),Z.handler.guid||(Z.handler.guid=l.guid)),m?R.splice(R.delegateCount++,0,Z):R.push(Z),h.event.global[it]=!0)},remove:function(i,n,l,d,m){var y,x,V,H,D,Z,Y,R,it,ft,bt,vt=ht.hasData(i)&&ht.get(i);if(!(!vt||!(H=vt.events))){for(n=(n||"").match(Vt)||[""],D=n.length;D--;){if(V=Li.exec(n[D])||[],it=bt=V[1],ft=(V[2]||"").split(".").sort(),!it){for(it in H)h.event.remove(i,it+n[D],l,d,!0);continue}for(Y=h.event.special[it]||{},it=(d?Y.delegateType:Y.bindType)||it,R=H[it]||[],V=V[2]&&new RegExp("(^|\\.)"+ft.join("\\.(?:.*\\.|)")+"(\\.|$)"),x=y=R.length;y--;)Z=R[y],(m||bt===Z.origType)&&(!l||l.guid===Z.guid)&&(!V||V.test(Z.namespace))&&(!d||d===Z.selector||d==="**"&&Z.selector)&&(R.splice(y,1),Z.selector&&R.delegateCount--,Y.remove&&Y.remove.call(i,Z));x&&!R.length&&((!Y.teardown||Y.teardown.call(i,ft,vt.handle)===!1)&&h.removeEvent(i,it,vt.handle),delete H[it])}h.isEmptyObject(H)&&ht.remove(i,"handle events")}},dispatch:function(i){var n,l,d,m,y,x,V=new Array(arguments.length),H=h.event.fix(i),D=(ht.get(this,"events")||Object.create(null))[H.type]||[],Z=h.event.special[H.type]||{};for(V[0]=H,n=1;n<arguments.length;n++)V[n]=arguments[n];if(H.delegateTarget=this,!(Z.preDispatch&&Z.preDispatch.call(this,H)===!1)){for(x=h.event.handlers.call(this,H,D),n=0;(m=x[n++])&&!H.isPropagationStopped();)for(H.currentTarget=m.elem,l=0;(y=m.handlers[l++])&&!H.isImmediatePropagationStopped();)(!H.rnamespace||y.namespace===!1||H.rnamespace.test(y.namespace))&&(H.handleObj=y,H.data=y.data,d=((h.event.special[y.origType]||{}).handle||y.handler).apply(m.elem,V),d!==void 0&&(H.result=d)===!1&&(H.preventDefault(),H.stopPropagation()));return Z.postDispatch&&Z.postDispatch.call(this,H),H.result}},handlers:function(i,n){var l,d,m,y,x,V=[],H=n.delegateCount,D=i.target;if(H&&D.nodeType&&!(i.type==="click"&&i.button>=1)){for(;D!==this;D=D.parentNode||this)if(D.nodeType===1&&!(i.type==="click"&&D.disabled===!0)){for(y=[],x={},l=0;l<H;l++)d=n[l],m=d.selector+" ",x[m]===void 0&&(x[m]=d.needsContext?h(m,this).index(D)>-1:h.find(m,this,null,[D]).length),x[m]&&y.push(d);y.length&&V.push({elem:D,handlers:y})}}return D=this,H<n.length&&V.push({elem:D,handlers:n.slice(H)}),V},addProp:function(i,n){Object.defineProperty(h.Event.prototype,i,{enumerable:!0,configurable:!0,get:u(n)?function(){if(this.originalEvent)return n(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[i]},set:function(l){Object.defineProperty(this,i,{enumerable:!0,configurable:!0,writable:!0,value:l})}})},fix:function(i){return i[h.expando]?i:new h.Event(i)},special:{load:{noBubble:!0},click:{setup:function(i){var n=this||i;return ja.test(n.type)&&n.click&&k(n,"input")&&M1(n,"click",!0),!1},trigger:function(i){var n=this||i;return ja.test(n.type)&&n.click&&k(n,"input")&&M1(n,"click"),!0},_default:function(i){var n=i.target;return ja.test(n.type)&&n.click&&k(n,"input")&&ht.get(n,"click")||k(n,"a")}},beforeunload:{postDispatch:function(i){i.result!==void 0&&i.originalEvent&&(i.originalEvent.returnValue=i.result)}}}};function M1(i,n,l){if(!l){ht.get(i,n)===void 0&&h.event.add(i,n,ga);return}ht.set(i,n,!1),h.event.add(i,n,{namespace:!1,handler:function(d){var m,y=ht.get(this,n);if(d.isTrigger&1&&this[n]){if(y)(h.event.special[n]||{}).delegateType&&d.stopPropagation();else if(y=o.call(arguments),ht.set(this,n,y),this[n](),m=ht.get(this,n),ht.set(this,n,!1),y!==m)return d.stopImmediatePropagation(),d.preventDefault(),m}else y&&(ht.set(this,n,h.event.trigger(y[0],y.slice(1),this)),d.stopPropagation(),d.isImmediatePropagationStopped=ga)}})}h.removeEvent=function(i,n,l){i.removeEventListener&&i.removeEventListener(n,l)},h.Event=function(i,n){if(!(this instanceof h.Event))return new h.Event(i,n);i&&i.type?(this.originalEvent=i,this.type=i.type,this.isDefaultPrevented=i.defaultPrevented||i.defaultPrevented===void 0&&i.returnValue===!1?ga:ya,this.target=i.target&&i.target.nodeType===3?i.target.parentNode:i.target,this.currentTarget=i.currentTarget,this.relatedTarget=i.relatedTarget):this.type=i,n&&h.extend(this,n),this.timeStamp=i&&i.timeStamp||Date.now(),this[h.expando]=!0},h.Event.prototype={constructor:h.Event,isDefaultPrevented:ya,isPropagationStopped:ya,isImmediatePropagationStopped:ya,isSimulated:!1,preventDefault:function(){var i=this.originalEvent;this.isDefaultPrevented=ga,i&&!this.isSimulated&&i.preventDefault()},stopPropagation:function(){var i=this.originalEvent;this.isPropagationStopped=ga,i&&!this.isSimulated&&i.stopPropagation()},stopImmediatePropagation:function(){var i=this.originalEvent;this.isImmediatePropagationStopped=ga,i&&!this.isSimulated&&i.stopImmediatePropagation(),this.stopPropagation()}},h.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,char:!0,code:!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:!0},h.event.addProp),h.each({focus:"focusin",blur:"focusout"},function(i,n){function l(d){if(S.documentMode){var m=ht.get(this,"handle"),y=h.event.fix(d);y.type=d.type==="focusin"?"focus":"blur",y.isSimulated=!0,m(d),y.target===y.currentTarget&&m(y)}else h.event.simulate(n,d.target,h.event.fix(d))}h.event.special[i]={setup:function(){var d;if(M1(this,i,!0),S.documentMode)d=ht.get(this,n),d||this.addEventListener(n,l),ht.set(this,n,(d||0)+1);else return!1},trigger:function(){return M1(this,i),!0},teardown:function(){var d;if(S.documentMode)d=ht.get(this,n)-1,d?ht.set(this,n,d):(this.removeEventListener(n,l),ht.remove(this,n));else return!1},_default:function(d){return ht.get(d.target,i)},delegateType:n},h.event.special[n]={setup:function(){var d=this.ownerDocument||this.document||this,m=S.documentMode?this:d,y=ht.get(m,n);y||(S.documentMode?this.addEventListener(n,l):d.addEventListener(i,l,!0)),ht.set(m,n,(y||0)+1)},teardown:function(){var d=this.ownerDocument||this.document||this,m=S.documentMode?this:d,y=ht.get(m,n)-1;y?ht.set(m,n,y):(S.documentMode?this.removeEventListener(n,l):d.removeEventListener(i,l,!0),ht.remove(m,n))}}}),h.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(i,n){h.event.special[i]={delegateType:n,bindType:n,handle:function(l){var d,m=this,y=l.relatedTarget,x=l.handleObj;return(!y||y!==m&&!h.contains(m,y))&&(l.type=x.origType,d=x.handler.apply(this,arguments),l.type=n),d}}}),h.fn.extend({on:function(i,n,l,d){return J1(this,i,n,l,d)},one:function(i,n,l,d){return J1(this,i,n,l,d,1)},off:function(i,n,l){var d,m;if(i&&i.preventDefault&&i.handleObj)return d=i.handleObj,h(i.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if(typeof i=="object"){for(m in i)this.off(m,n,i[m]);return this}return(n===!1||typeof n=="function")&&(l=n,n=void 0),l===!1&&(l=ya),this.each(function(){h.event.remove(this,i,l,n)})}});var jh=/<script|<style|<link/i,Gh=/checked\s*(?:[^=]|=\s*.checked.)/i,Zh=/^\s*<!\[CDATA\[|\]\]>\s*$/g;function Vi(i,n){return k(i,"table")&&k(n.nodeType!==11?n:n.firstChild,"tr")&&h(i).children("tbody")[0]||i}function Xh(i){return i.type=(i.getAttribute("type")!==null)+"/"+i.type,i}function Uh(i){return(i.type||"").slice(0,5)==="true/"?i.type=i.type.slice(5):i.removeAttribute("type"),i}function Pi(i,n){var l,d,m,y,x,V,H;if(n.nodeType===1){if(ht.hasData(i)&&(y=ht.get(i),H=y.events,H)){ht.remove(n,"handle events");for(m in H)for(l=0,d=H[m].length;l<d;l++)h.event.add(n,m,H[m][l])}Dt.hasData(i)&&(x=Dt.access(i),V=h.extend({},x),Dt.set(n,V))}}function Yh(i,n){var l=n.nodeName.toLowerCase();l==="input"&&ja.test(i.type)?n.checked=i.checked:(l==="input"||l==="textarea")&&(n.defaultValue=i.defaultValue)}function xa(i,n,l,d){n=c(n);var m,y,x,V,H,D,Z=0,Y=i.length,R=Y-1,it=n[0],ft=u(it);if(ft||Y>1&&typeof it=="string"&&!p.checkClone&&Gh.test(it))return i.each(function(bt){var vt=i.eq(bt);ft&&(n[0]=it.call(this,bt,vt.html())),xa(vt,n,l,d)});if(Y&&(m=Hi(n,i[0].ownerDocument,!1,i,d),y=m.firstChild,m.childNodes.length===1&&(m=y),y||d)){for(x=h.map(Qt(m,"script"),Xh),V=x.length;Z<Y;Z++)H=m,Z!==R&&(H=h.clone(H,!0,!0),V&&h.merge(x,Qt(H,"script"))),l.call(i[Z],H,Z);if(V)for(D=x[x.length-1].ownerDocument,h.map(x,Uh),Z=0;Z<V;Z++)H=x[Z],_i.test(H.type||"")&&!ht.access(H,"globalEval")&&h.contains(D,H)&&(H.src&&(H.type||"").toLowerCase()!=="module"?h._evalUrl&&!H.noModule&&h._evalUrl(H.src,{nonce:H.nonce||H.getAttribute("nonce")},D):E(H.textContent.replace(Zh,""),H,D))}return i}function Di(i,n,l){for(var d,m=n?h.filter(n,i):i,y=0;(d=m[y])!=null;y++)!l&&d.nodeType===1&&h.cleanData(Qt(d)),d.parentNode&&(l&&ma(d)&&Q1(Qt(d,"script")),d.parentNode.removeChild(d));return i}h.extend({htmlPrefilter:function(i){return i},clone:function(i,n,l){var d,m,y,x,V=i.cloneNode(!0),H=ma(i);if(!p.noCloneChecked&&(i.nodeType===1||i.nodeType===11)&&!h.isXMLDoc(i))for(x=Qt(V),y=Qt(i),d=0,m=y.length;d<m;d++)Yh(y[d],x[d]);if(n)if(l)for(y=y||Qt(i),x=x||Qt(V),d=0,m=y.length;d<m;d++)Pi(y[d],x[d]);else Pi(i,V);return x=Qt(V,"script"),x.length>0&&Q1(x,!H&&Qt(i,"script")),V},cleanData:function(i){for(var n,l,d,m=h.event.special,y=0;(l=i[y])!==void 0;y++)if(de(l)){if(n=l[ht.expando]){if(n.events)for(d in n.events)m[d]?h.event.remove(l,d):h.removeEvent(l,d,n.handle);l[ht.expando]=void 0}l[Dt.expando]&&(l[Dt.expando]=void 0)}}}),h.fn.extend({detach:function(i){return Di(this,i,!0)},remove:function(i){return Di(this,i)},text:function(i){return Nt(this,function(n){return n===void 0?h.text(this):this.empty().each(function(){(this.nodeType===1||this.nodeType===11||this.nodeType===9)&&(this.textContent=n)})},null,i,arguments.length)},append:function(){return xa(this,arguments,function(i){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){var n=Vi(this,i);n.appendChild(i)}})},prepend:function(){return xa(this,arguments,function(i){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){var n=Vi(this,i);n.insertBefore(i,n.firstChild)}})},before:function(){return xa(this,arguments,function(i){this.parentNode&&this.parentNode.insertBefore(i,this)})},after:function(){return xa(this,arguments,function(i){this.parentNode&&this.parentNode.insertBefore(i,this.nextSibling)})},empty:function(){for(var i,n=0;(i=this[n])!=null;n++)i.nodeType===1&&(h.cleanData(Qt(i,!1)),i.textContent="");return this},clone:function(i,n){return i=i??!1,n=n??i,this.map(function(){return h.clone(this,i,n)})},html:function(i){return Nt(this,function(n){var l=this[0]||{},d=0,m=this.length;if(n===void 0&&l.nodeType===1)return l.innerHTML;if(typeof n=="string"&&!jh.test(n)&&!ce[(Ti.exec(n)||["",""])[1].toLowerCase()]){n=h.htmlPrefilter(n);try{for(;d<m;d++)l=this[d]||{},l.nodeType===1&&(h.cleanData(Qt(l,!1)),l.innerHTML=n);l=0}catch{}}l&&this.empty().append(n)},null,i,arguments.length)},replaceWith:function(){var i=[];return xa(this,arguments,function(n){var l=this.parentNode;h.inArray(this,i)<0&&(h.cleanData(Qt(this)),l&&l.replaceChild(n,this))},i)}}),h.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(i,n){h.fn[i]=function(l){for(var d,m=[],y=h(l),x=y.length-1,V=0;V<=x;V++)d=V===x?this:this.clone(!0),h(y[V])[n](d),f.apply(m,d.get());return this.pushStack(m)}});var t2=new RegExp("^("+Si+")(?!px)[a-z%]+$","i"),e2=/^--/,m1=function(i){var n=i.ownerDocument.defaultView;return(!n||!n.opener)&&(n=t),n.getComputedStyle(i)},Oi=function(i,n,l){var d,m,y={};for(m in n)y[m]=i.style[m],i.style[m]=n[m];d=l.call(i);for(m in n)i.style[m]=y[m];return d},Kh=new RegExp(De.join("|"),"i");(function(){function i(){if(D){H.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",D.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",aa.appendChild(H).appendChild(D);var Z=t.getComputedStyle(D);l=Z.top!=="1%",V=n(Z.marginLeft)===12,D.style.right="60%",y=n(Z.right)===36,d=n(Z.width)===36,D.style.position="absolute",m=n(D.offsetWidth/3)===12,aa.removeChild(H),D=null}}function n(Z){return Math.round(parseFloat(Z))}var l,d,m,y,x,V,H=S.createElement("div"),D=S.createElement("div");D.style&&(D.style.backgroundClip="content-box",D.cloneNode(!0).style.backgroundClip="",p.clearCloneStyle=D.style.backgroundClip==="content-box",h.extend(p,{boxSizingReliable:function(){return i(),d},pixelBoxStyles:function(){return i(),y},pixelPosition:function(){return i(),l},reliableMarginLeft:function(){return i(),V},scrollboxSize:function(){return i(),m},reliableTrDimensions:function(){var Z,Y,R,it;return x==null&&(Z=S.createElement("table"),Y=S.createElement("tr"),R=S.createElement("div"),Z.style.cssText="position:absolute;left:-11111px;border-collapse:separate",Y.style.cssText="box-sizing:content-box;border:1px solid",Y.style.height="1px",R.style.height="9px",R.style.display="block",aa.appendChild(Z).appendChild(Y).appendChild(R),it=t.getComputedStyle(Y),x=parseInt(it.height,10)+parseInt(it.borderTopWidth,10)+parseInt(it.borderBottomWidth,10)===Y.offsetHeight,aa.removeChild(Z)),x}}))})();function Ga(i,n,l){var d,m,y,x,V=e2.test(n),H=i.style;return l=l||m1(i),l&&(x=l.getPropertyValue(n)||l[n],V&&x&&(x=x.replace(X,"$1")||void 0),x===""&&!ma(i)&&(x=h.style(i,n)),!p.pixelBoxStyles()&&t2.test(x)&&Kh.test(n)&&(d=H.width,m=H.minWidth,y=H.maxWidth,H.minWidth=H.maxWidth=H.width=x,x=l.width,H.width=d,H.minWidth=m,H.maxWidth=y)),x!==void 0?x+"":x}function ki(i,n){return{get:function(){if(i()){delete this.get;return}return(this.get=n).apply(this,arguments)}}}var Ii=["Webkit","Moz","ms"],Ni=S.createElement("div").style,zi={};function Qh(i){for(var n=i[0].toUpperCase()+i.slice(1),l=Ii.length;l--;)if(i=Ii[l]+n,i in Ni)return i}function a2(i){var n=h.cssProps[i]||zi[i];return n||(i in Ni?i:zi[i]=Qh(i)||i)}var Jh=/^(none|table(?!-c[ea]).+)/,tl={position:"absolute",visibility:"hidden",display:"block"},$i={letterSpacing:"0",fontWeight:"400"};function Ri(i,n,l){var d=Wa.exec(n);return d?Math.max(0,d[2]-(l||0))+(d[3]||"px"):n}function i2(i,n,l,d,m,y){var x=n==="width"?1:0,V=0,H=0,D=0;if(l===(d?"border":"content"))return 0;for(;x<4;x+=2)l==="margin"&&(D+=h.css(i,l+De[x],!0,m)),d?(l==="content"&&(H-=h.css(i,"padding"+De[x],!0,m)),l!=="margin"&&(H-=h.css(i,"border"+De[x]+"Width",!0,m))):(H+=h.css(i,"padding"+De[x],!0,m),l!=="padding"?H+=h.css(i,"border"+De[x]+"Width",!0,m):V+=h.css(i,"border"+De[x]+"Width",!0,m));return!d&&y>=0&&(H+=Math.max(0,Math.ceil(i["offset"+n[0].toUpperCase()+n.slice(1)]-y-H-V-.5))||0),H+D}function Bi(i,n,l){var d=m1(i),m=!p.boxSizingReliable()||l,y=m&&h.css(i,"boxSizing",!1,d)==="border-box",x=y,V=Ga(i,n,d),H="offset"+n[0].toUpperCase()+n.slice(1);if(t2.test(V)){if(!l)return V;V="auto"}return(!p.boxSizingReliable()&&y||!p.reliableTrDimensions()&&k(i,"tr")||V==="auto"||!parseFloat(V)&&h.css(i,"display",!1,d)==="inline")&&i.getClientRects().length&&(y=h.css(i,"boxSizing",!1,d)==="border-box",x=H in i,x&&(V=i[H])),V=parseFloat(V)||0,V+i2(i,n,l||(y?"border":"content"),x,d,V)+"px"}h.extend({cssHooks:{opacity:{get:function(i,n){if(n){var l=Ga(i,"opacity");return l===""?"1":l}}}},cssNumber:{animationIterationCount:!0,aspectRatio:!0,borderImageSlice:!0,columnCount:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,gridArea:!0,gridColumn:!0,gridColumnEnd:!0,gridColumnStart:!0,gridRow:!0,gridRowEnd:!0,gridRowStart:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,scale:!0,widows:!0,zIndex:!0,zoom:!0,fillOpacity:!0,floodOpacity:!0,stopOpacity:!0,strokeMiterlimit:!0,strokeOpacity:!0},cssProps:{},style:function(i,n,l,d){if(!(!i||i.nodeType===3||i.nodeType===8||!i.style)){var m,y,x,V=$t(n),H=e2.test(n),D=i.style;if(H||(n=a2(V)),x=h.cssHooks[n]||h.cssHooks[V],l!==void 0){if(y=typeof l,y==="string"&&(m=Wa.exec(l))&&m[1]&&(l=Ci(i,n,m),y="number"),l==null||l!==l)return;y==="number"&&!H&&(l+=m&&m[3]||(h.cssNumber[V]?"":"px")),!p.clearCloneStyle&&l===""&&n.indexOf("background")===0&&(D[n]="inherit"),(!x||!("set"in x)||(l=x.set(i,l,d))!==void 0)&&(H?D.setProperty(n,l):D[n]=l)}else return x&&"get"in x&&(m=x.get(i,!1,d))!==void 0?m:D[n]}},css:function(i,n,l,d){var m,y,x,V=$t(n),H=e2.test(n);return H||(n=a2(V)),x=h.cssHooks[n]||h.cssHooks[V],x&&"get"in x&&(m=x.get(i,!0,l)),m===void 0&&(m=Ga(i,n,d)),m==="normal"&&n in $i&&(m=$i[n]),l===""||l?(y=parseFloat(m),l===!0||isFinite(y)?y||0:m):m}}),h.each(["height","width"],function(i,n){h.cssHooks[n]={get:function(l,d,m){if(d)return Jh.test(h.css(l,"display"))&&(!l.getClientRects().length||!l.getBoundingClientRect().width)?Oi(l,tl,function(){return Bi(l,n,m)}):Bi(l,n,m)},set:function(l,d,m){var y,x=m1(l),V=!p.scrollboxSize()&&x.position==="absolute",H=V||m,D=H&&h.css(l,"boxSizing",!1,x)==="border-box",Z=m?i2(l,n,m,D,x):0;return D&&V&&(Z-=Math.ceil(l["offset"+n[0].toUpperCase()+n.slice(1)]-parseFloat(x[n])-i2(l,n,"border",!1,x)-.5)),Z&&(y=Wa.exec(d))&&(y[3]||"px")!=="px"&&(l.style[n]=d,d=h.css(l,n)),Ri(l,d,Z)}}}),h.cssHooks.marginLeft=ki(p.reliableMarginLeft,function(i,n){if(n)return(parseFloat(Ga(i,"marginLeft"))||i.getBoundingClientRect().left-Oi(i,{marginLeft:0},function(){return i.getBoundingClientRect().left}))+"px"}),h.each({margin:"",padding:"",border:"Width"},function(i,n){h.cssHooks[i+n]={expand:function(l){for(var d=0,m={},y=typeof l=="string"?l.split(" "):[l];d<4;d++)m[i+De[d]+n]=y[d]||y[d-2]||y[0];return m}},i!=="margin"&&(h.cssHooks[i+n].set=Ri)}),h.fn.extend({css:function(i,n){return Nt(this,function(l,d,m){var y,x,V={},H=0;if(Array.isArray(d)){for(y=m1(l),x=d.length;H<x;H++)V[d[H]]=h.css(l,d[H],!1,y);return V}return m!==void 0?h.style(l,d,m):h.css(l,d)},i,n,arguments.length>1)}});function Jt(i,n,l,d,m){return new Jt.prototype.init(i,n,l,d,m)}h.Tween=Jt,Jt.prototype={constructor:Jt,init:function(i,n,l,d,m,y){this.elem=i,this.prop=l,this.easing=m||h.easing._default,this.options=n,this.start=this.now=this.cur(),this.end=d,this.unit=y||(h.cssNumber[l]?"":"px")},cur:function(){var i=Jt.propHooks[this.prop];return i&&i.get?i.get(this):Jt.propHooks._default.get(this)},run:function(i){var n,l=Jt.propHooks[this.prop];return this.options.duration?this.pos=n=h.easing[this.easing](i,this.options.duration*i,0,1,this.options.duration):this.pos=n=i,this.now=(this.end-this.start)*n+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),l&&l.set?l.set(this):Jt.propHooks._default.set(this),this}},Jt.prototype.init.prototype=Jt.prototype,Jt.propHooks={_default:{get:function(i){var n;return i.elem.nodeType!==1||i.elem[i.prop]!=null&&i.elem.style[i.prop]==null?i.elem[i.prop]:(n=h.css(i.elem,i.prop,""),!n||n==="auto"?0:n)},set:function(i){h.fx.step[i.prop]?h.fx.step[i.prop](i):i.elem.nodeType===1&&(h.cssHooks[i.prop]||i.elem.style[a2(i.prop)]!=null)?h.style(i.elem,i.prop,i.now+i.unit):i.elem[i.prop]=i.now}}},Jt.propHooks.scrollTop=Jt.propHooks.scrollLeft={set:function(i){i.elem.nodeType&&i.elem.parentNode&&(i.elem[i.prop]=i.now)}},h.easing={linear:function(i){return i},swing:function(i){return .5-Math.cos(i*Math.PI)/2},_default:"swing"},h.fx=Jt.prototype.init,h.fx.step={};var wa,v1,el=/^(?:toggle|show|hide)$/,al=/queueHooks$/;function r2(){v1&&(S.hidden===!1&&t.requestAnimationFrame?t.requestAnimationFrame(r2):t.setTimeout(r2,h.fx.interval),h.fx.tick())}function Fi(){return t.setTimeout(function(){wa=void 0}),wa=Date.now()}function g1(i,n){var l,d=0,m={height:i};for(n=n?1:0;d<4;d+=2-n)l=De[d],m["margin"+l]=m["padding"+l]=i;return n&&(m.opacity=m.width=i),m}function qi(i,n,l){for(var d,m=(we.tweeners[n]||[]).concat(we.tweeners["*"]),y=0,x=m.length;y<x;y++)if(d=m[y].call(l,n,i))return d}function il(i,n,l){var d,m,y,x,V,H,D,Z,Y="width"in n||"height"in n,R=this,it={},ft=i.style,bt=i.nodeType&&f1(i),vt=ht.get(i,"fxshow");l.queue||(x=h._queueHooks(i,"fx"),x.unqueued==null&&(x.unqueued=0,V=x.empty.fire,x.empty.fire=function(){x.unqueued||V()}),x.unqueued++,R.always(function(){R.always(function(){x.unqueued--,h.queue(i,"fx").length||x.empty.fire()})}));for(d in n)if(m=n[d],el.test(m)){if(delete n[d],y=y||m==="toggle",m===(bt?"hide":"show"))if(m==="show"&&vt&&vt[d]!==void 0)bt=!0;else continue;it[d]=vt&&vt[d]||h.style(i,d)}if(H=!h.isEmptyObject(n),!(!H&&h.isEmptyObject(it))){Y&&i.nodeType===1&&(l.overflow=[ft.overflow,ft.overflowX,ft.overflowY],D=vt&&vt.display,D==null&&(D=ht.get(i,"display")),Z=h.css(i,"display"),Z==="none"&&(D?Z=D:(va([i],!0),D=i.style.display||D,Z=h.css(i,"display"),va([i]))),(Z==="inline"||Z==="inline-block"&&D!=null)&&h.css(i,"float")==="none"&&(H||(R.done(function(){ft.display=D}),D==null&&(Z=ft.display,D=Z==="none"?"":Z)),ft.display="inline-block")),l.overflow&&(ft.overflow="hidden",R.always(function(){ft.overflow=l.overflow[0],ft.overflowX=l.overflow[1],ft.overflowY=l.overflow[2]})),H=!1;for(d in it)H||(vt?"hidden"in vt&&(bt=vt.hidden):vt=ht.access(i,"fxshow",{display:D}),y&&(vt.hidden=!bt),bt&&va([i],!0),R.done(function(){bt||va([i]),ht.remove(i,"fxshow");for(d in it)h.style(i,d,it[d])})),H=qi(bt?vt[d]:0,d,R),d in vt||(vt[d]=H.start,bt&&(H.end=H.start,H.start=0))}}function rl(i,n){var l,d,m,y,x;for(l in i)if(d=$t(l),m=n[d],y=i[l],Array.isArray(y)&&(m=y[1],y=i[l]=y[0]),l!==d&&(i[d]=y,delete i[l]),x=h.cssHooks[d],x&&"expand"in x){y=x.expand(y),delete i[d];for(l in y)l in i||(i[l]=y[l],n[l]=m)}else n[d]=m}function we(i,n,l){var d,m,y=0,x=we.prefilters.length,V=h.Deferred().always(function(){delete H.elem}),H=function(){if(m)return!1;for(var Y=wa||Fi(),R=Math.max(0,D.startTime+D.duration-Y),it=R/D.duration||0,ft=1-it,bt=0,vt=D.tweens.length;bt<vt;bt++)D.tweens[bt].run(ft);return V.notifyWith(i,[D,ft,R]),ft<1&&vt?R:(vt||V.notifyWith(i,[D,1,0]),V.resolveWith(i,[D]),!1)},D=V.promise({elem:i,props:h.extend({},n),opts:h.extend(!0,{specialEasing:{},easing:h.easing._default},l),originalProperties:n,originalOptions:l,startTime:wa||Fi(),duration:l.duration,tweens:[],createTween:function(Y,R){var it=h.Tween(i,D.opts,Y,R,D.opts.specialEasing[Y]||D.opts.easing);return D.tweens.push(it),it},stop:function(Y){var R=0,it=Y?D.tweens.length:0;if(m)return this;for(m=!0;R<it;R++)D.tweens[R].run(1);return Y?(V.notifyWith(i,[D,1,0]),V.resolveWith(i,[D,Y])):V.rejectWith(i,[D,Y]),this}}),Z=D.props;for(rl(Z,D.opts.specialEasing);y<x;y++)if(d=we.prefilters[y].call(D,i,Z,D.opts),d)return u(d.stop)&&(h._queueHooks(D.elem,D.opts.queue).stop=d.stop.bind(d)),d;return h.map(Z,qi,D),u(D.opts.start)&&D.opts.start.call(i,D),D.progress(D.opts.progress).done(D.opts.done,D.opts.complete).fail(D.opts.fail).always(D.opts.always),h.fx.timer(h.extend(H,{elem:i,anim:D,queue:D.opts.queue})),D}h.Animation=h.extend(we,{tweeners:{"*":[function(i,n){var l=this.createTween(i,n);return Ci(l.elem,i,Wa.exec(n),l),l}]},tweener:function(i,n){u(i)?(n=i,i=["*"]):i=i.match(Vt);for(var l,d=0,m=i.length;d<m;d++)l=i[d],we.tweeners[l]=we.tweeners[l]||[],we.tweeners[l].unshift(n)},prefilters:[il],prefilter:function(i,n){n?we.prefilters.unshift(i):we.prefilters.push(i)}}),h.speed=function(i,n,l){var d=i&&typeof i=="object"?h.extend({},i):{complete:l||!l&&n||u(i)&&i,duration:i,easing:l&&n||n&&!u(n)&&n};return h.fx.off?d.duration=0:typeof d.duration!="number"&&(d.duration in h.fx.speeds?d.duration=h.fx.speeds[d.duration]:d.duration=h.fx.speeds._default),(d.queue==null||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){u(d.old)&&d.old.call(this),d.queue&&h.dequeue(this,d.queue)},d},h.fn.extend({fadeTo:function(i,n,l,d){return this.filter(f1).css("opacity",0).show().end().animate({opacity:n},i,l,d)},animate:function(i,n,l,d){var m=h.isEmptyObject(i),y=h.speed(n,l,d),x=function(){var V=we(this,h.extend({},i),y);(m||ht.get(this,"finish"))&&V.stop(!0)};return x.finish=x,m||y.queue===!1?this.each(x):this.queue(y.queue,x)},stop:function(i,n,l){var d=function(m){var y=m.stop;delete m.stop,y(l)};return typeof i!="string"&&(l=n,n=i,i=void 0),n&&this.queue(i||"fx",[]),this.each(function(){var m=!0,y=i!=null&&i+"queueHooks",x=h.timers,V=ht.get(this);if(y)V[y]&&V[y].stop&&d(V[y]);else for(y in V)V[y]&&V[y].stop&&al.test(y)&&d(V[y]);for(y=x.length;y--;)x[y].elem===this&&(i==null||x[y].queue===i)&&(x[y].anim.stop(l),m=!1,x.splice(y,1));(m||!l)&&h.dequeue(this,i)})},finish:function(i){return i!==!1&&(i=i||"fx"),this.each(function(){var n,l=ht.get(this),d=l[i+"queue"],m=l[i+"queueHooks"],y=h.timers,x=d?d.length:0;for(l.finish=!0,h.queue(this,i,[]),m&&m.stop&&m.stop.call(this,!0),n=y.length;n--;)y[n].elem===this&&y[n].queue===i&&(y[n].anim.stop(!0),y.splice(n,1));for(n=0;n<x;n++)d[n]&&d[n].finish&&d[n].finish.call(this);delete l.finish})}}),h.each(["toggle","show","hide"],function(i,n){var l=h.fn[n];h.fn[n]=function(d,m,y){return d==null||typeof d=="boolean"?l.apply(this,arguments):this.animate(g1(n,!0),d,m,y)}}),h.each({slideDown:g1("show"),slideUp:g1("hide"),slideToggle:g1("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(i,n){h.fn[i]=function(l,d,m){return this.animate(n,l,d,m)}}),h.timers=[],h.fx.tick=function(){var i,n=0,l=h.timers;for(wa=Date.now();n<l.length;n++)i=l[n],!i()&&l[n]===i&&l.splice(n--,1);l.length||h.fx.stop(),wa=void 0},h.fx.timer=function(i){h.timers.push(i),h.fx.start()},h.fx.interval=13,h.fx.start=function(){v1||(v1=!0,r2())},h.fx.stop=function(){v1=null},h.fx.speeds={slow:600,fast:200,_default:400},h.fn.delay=function(i,n){return i=h.fx&&h.fx.speeds[i]||i,n=n||"fx",this.queue(n,function(l,d){var m=t.setTimeout(l,i);d.stop=function(){t.clearTimeout(m)}})},function(){var i=S.createElement("input"),n=S.createElement("select"),l=n.appendChild(S.createElement("option"));i.type="checkbox",p.checkOn=i.value!=="",p.optSelected=l.selected,i=S.createElement("input"),i.value="t",i.type="radio",p.radioValue=i.value==="t"}();var Wi,Za=h.expr.attrHandle;h.fn.extend({attr:function(i,n){return Nt(this,h.attr,i,n,arguments.length>1)},removeAttr:function(i){return this.each(function(){h.removeAttr(this,i)})}}),h.extend({attr:function(i,n,l){var d,m,y=i.nodeType;if(!(y===3||y===8||y===2)){if(typeof i.getAttribute>"u")return h.prop(i,n,l);if((y!==1||!h.isXMLDoc(i))&&(m=h.attrHooks[n.toLowerCase()]||(h.expr.match.bool.test(n)?Wi:void 0)),l!==void 0){if(l===null){h.removeAttr(i,n);return}return m&&"set"in m&&(d=m.set(i,l,n))!==void 0?d:(i.setAttribute(n,l+""),l)}return m&&"get"in m&&(d=m.get(i,n))!==null?d:(d=h.find.attr(i,n),d??void 0)}},attrHooks:{type:{set:function(i,n){if(!p.radioValue&&n==="radio"&&k(i,"input")){var l=i.value;return i.setAttribute("type",n),l&&(i.value=l),n}}}},removeAttr:function(i,n){var l,d=0,m=n&&n.match(Vt);if(m&&i.nodeType===1)for(;l=m[d++];)i.removeAttribute(l)}}),Wi={set:function(i,n,l){return n===!1?h.removeAttr(i,l):i.setAttribute(l,l),l}},h.each(h.expr.match.bool.source.match(/\w+/g),function(i,n){var l=Za[n]||h.find.attr;Za[n]=function(d,m,y){var x,V,H=m.toLowerCase();return y||(V=Za[H],Za[H]=x,x=l(d,m,y)!=null?H:null,Za[H]=V),x}});var nl=/^(?:input|select|textarea|button)$/i,sl=/^(?:a|area)$/i;h.fn.extend({prop:function(i,n){return Nt(this,h.prop,i,n,arguments.length>1)},removeProp:function(i){return this.each(function(){delete this[h.propFix[i]||i]})}}),h.extend({prop:function(i,n,l){var d,m,y=i.nodeType;if(!(y===3||y===8||y===2))return(y!==1||!h.isXMLDoc(i))&&(n=h.propFix[n]||n,m=h.propHooks[n]),l!==void 0?m&&"set"in m&&(d=m.set(i,l,n))!==void 0?d:i[n]=l:m&&"get"in m&&(d=m.get(i,n))!==null?d:i[n]},propHooks:{tabIndex:{get:function(i){var n=h.find.attr(i,"tabindex");return n?parseInt(n,10):nl.test(i.nodeName)||sl.test(i.nodeName)&&i.href?0:-1}}},propFix:{for:"htmlFor",class:"className"}}),p.optSelected||(h.propHooks.selected={get:function(i){var n=i.parentNode;return n&&n.parentNode&&n.parentNode.selectedIndex,null},set:function(i){var n=i.parentNode;n&&(n.selectedIndex,n.parentNode&&n.parentNode.selectedIndex)}}),h.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){h.propFix[this.toLowerCase()]=this});function ia(i){var n=i.match(Vt)||[];return n.join(" ")}function ra(i){return i.getAttribute&&i.getAttribute("class")||""}function n2(i){return Array.isArray(i)?i:typeof i=="string"?i.match(Vt)||[]:[]}h.fn.extend({addClass:function(i){var n,l,d,m,y,x;return u(i)?this.each(function(V){h(this).addClass(i.call(this,V,ra(this)))}):(n=n2(i),n.length?this.each(function(){if(d=ra(this),l=this.nodeType===1&&" "+ia(d)+" ",l){for(y=0;y<n.length;y++)m=n[y],l.indexOf(" "+m+" ")<0&&(l+=m+" ");x=ia(l),d!==x&&this.setAttribute("class",x)}}):this)},removeClass:function(i){var n,l,d,m,y,x;return u(i)?this.each(function(V){h(this).removeClass(i.call(this,V,ra(this)))}):arguments.length?(n=n2(i),n.length?this.each(function(){if(d=ra(this),l=this.nodeType===1&&" "+ia(d)+" ",l){for(y=0;y<n.length;y++)for(m=n[y];l.indexOf(" "+m+" ")>-1;)l=l.replace(" "+m+" "," ");x=ia(l),d!==x&&this.setAttribute("class",x)}}):this):this.attr("class","")},toggleClass:function(i,n){var l,d,m,y,x=typeof i,V=x==="string"||Array.isArray(i);return u(i)?this.each(function(H){h(this).toggleClass(i.call(this,H,ra(this),n),n)}):typeof n=="boolean"&&V?n?this.addClass(i):this.removeClass(i):(l=n2(i),this.each(function(){if(V)for(y=h(this),m=0;m<l.length;m++)d=l[m],y.hasClass(d)?y.removeClass(d):y.addClass(d);else(i===void 0||x==="boolean")&&(d=ra(this),d&&ht.set(this,"__className__",d),this.setAttribute&&this.setAttribute("class",d||i===!1?"":ht.get(this,"__className__")||""))}))},hasClass:function(i){var n,l,d=0;for(n=" "+i+" ";l=this[d++];)if(l.nodeType===1&&(" "+ia(ra(l))+" ").indexOf(n)>-1)return!0;return!1}});var ol=/\r/g;h.fn.extend({val:function(i){var n,l,d,m=this[0];return arguments.length?(d=u(i),this.each(function(y){var x;this.nodeType===1&&(d?x=i.call(this,y,h(this).val()):x=i,x==null?x="":typeof x=="number"?x+="":Array.isArray(x)&&(x=h.map(x,function(V){return V==null?"":V+""})),n=h.valHooks[this.type]||h.valHooks[this.nodeName.toLowerCase()],(!n||!("set"in n)||n.set(this,x,"value")===void 0)&&(this.value=x))})):m?(n=h.valHooks[m.type]||h.valHooks[m.nodeName.toLowerCase()],n&&"get"in n&&(l=n.get(m,"value"))!==void 0?l:(l=m.value,typeof l=="string"?l.replace(ol,""):l??"")):void 0}}),h.extend({valHooks:{option:{get:function(i){var n=h.find.attr(i,"value");return n??ia(h.text(i))}},select:{get:function(i){var n,l,d,m=i.options,y=i.selectedIndex,x=i.type==="select-one",V=x?null:[],H=x?y+1:m.length;for(y<0?d=H:d=x?y:0;d<H;d++)if(l=m[d],(l.selected||d===y)&&!l.disabled&&(!l.parentNode.disabled||!k(l.parentNode,"optgroup"))){if(n=h(l).val(),x)return n;V.push(n)}return V},set:function(i,n){for(var l,d,m=i.options,y=h.makeArray(n),x=m.length;x--;)d=m[x],(d.selected=h.inArray(h.valHooks.option.get(d),y)>-1)&&(l=!0);return l||(i.selectedIndex=-1),y}}}}),h.each(["radio","checkbox"],function(){h.valHooks[this]={set:function(i,n){if(Array.isArray(n))return i.checked=h.inArray(h(i).val(),n)>-1}},p.checkOn||(h.valHooks[this].get=function(i){return i.getAttribute("value")===null?"on":i.value})});var Xa=t.location,ji={guid:Date.now()},s2=/\?/;h.parseXML=function(i){var n,l;if(!i||typeof i!="string")return null;try{n=new t.DOMParser().parseFromString(i,"text/xml")}catch{}return l=n&&n.getElementsByTagName("parsererror")[0],(!n||l)&&h.error("Invalid XML: "+(l?h.map(l.childNodes,function(d){return d.textContent}).join(`
`):i)),n};var Gi=/^(?:focusinfocus|focusoutblur)$/,Zi=function(i){i.stopPropagation()};h.extend(h.event,{trigger:function(i,n,l,d){var m,y,x,V,H,D,Z,Y,R=[l||S],it=w.call(i,"type")?i.type:i,ft=w.call(i,"namespace")?i.namespace.split("."):[];if(y=Y=x=l=l||S,!(l.nodeType===3||l.nodeType===8)&&!Gi.test(it+h.event.triggered)&&(it.indexOf(".")>-1&&(ft=it.split("."),it=ft.shift(),ft.sort()),H=it.indexOf(":")<0&&"on"+it,i=i[h.expando]?i:new h.Event(it,typeof i=="object"&&i),i.isTrigger=d?2:3,i.namespace=ft.join("."),i.rnamespace=i.namespace?new RegExp("(^|\\.)"+ft.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,i.result=void 0,i.target||(i.target=l),n=n==null?[i]:h.makeArray(n,[i]),Z=h.event.special[it]||{},!(!d&&Z.trigger&&Z.trigger.apply(l,n)===!1))){if(!d&&!Z.noBubble&&!A(l)){for(V=Z.delegateType||it,Gi.test(V+it)||(y=y.parentNode);y;y=y.parentNode)R.push(y),x=y;x===(l.ownerDocument||S)&&R.push(x.defaultView||x.parentWindow||t)}for(m=0;(y=R[m++])&&!i.isPropagationStopped();)Y=y,i.type=m>1?V:Z.bindType||it,D=(ht.get(y,"events")||Object.create(null))[i.type]&&ht.get(y,"handle"),D&&D.apply(y,n),D=H&&y[H],D&&D.apply&&de(y)&&(i.result=D.apply(y,n),i.result===!1&&i.preventDefault());return i.type=it,!d&&!i.isDefaultPrevented()&&(!Z._default||Z._default.apply(R.pop(),n)===!1)&&de(l)&&H&&u(l[it])&&!A(l)&&(x=l[H],x&&(l[H]=null),h.event.triggered=it,i.isPropagationStopped()&&Y.addEventListener(it,Zi),l[it](),i.isPropagationStopped()&&Y.removeEventListener(it,Zi),h.event.triggered=void 0,x&&(l[H]=x)),i.result}},simulate:function(i,n,l){var d=h.extend(new h.Event,l,{type:i,isSimulated:!0});h.event.trigger(d,null,n)}}),h.fn.extend({trigger:function(i,n){return this.each(function(){h.event.trigger(i,n,this)})},triggerHandler:function(i,n){var l=this[0];if(l)return h.event.trigger(i,n,l,!0)}});var hl=/\[\]$/,Xi=/\r?\n/g,ll=/^(?:submit|button|image|reset|file)$/i,dl=/^(?:input|select|textarea|keygen)/i;function o2(i,n,l,d){var m;if(Array.isArray(n))h.each(n,function(y,x){l||hl.test(i)?d(i,x):o2(i+"["+(typeof x=="object"&&x!=null?y:"")+"]",x,l,d)});else if(!l&&L(n)==="object")for(m in n)o2(i+"["+m+"]",n[m],l,d);else d(i,n)}h.param=function(i,n){var l,d=[],m=function(y,x){var V=u(x)?x():x;d[d.length]=encodeURIComponent(y)+"="+encodeURIComponent(V??"")};if(i==null)return"";if(Array.isArray(i)||i.jquery&&!h.isPlainObject(i))h.each(i,function(){m(this.name,this.value)});else for(l in i)o2(l,i[l],n,m);return d.join("&")},h.fn.extend({serialize:function(){return h.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var i=h.prop(this,"elements");return i?h.makeArray(i):this}).filter(function(){var i=this.type;return this.name&&!h(this).is(":disabled")&&dl.test(this.nodeName)&&!ll.test(i)&&(this.checked||!ja.test(i))}).map(function(i,n){var l=h(this).val();return l==null?null:Array.isArray(l)?h.map(l,function(d){return{name:n.name,value:d.replace(Xi,`\r
`)}}):{name:n.name,value:l.replace(Xi,`\r
`)}}).get()}});var cl=/%20/g,pl=/#.*$/,ul=/([?&])_=[^&]*/,fl=/^(.*?):[ \t]*([^\r\n]*)$/mg,Ml=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,ml=/^(?:GET|HEAD)$/,vl=/^\/\//,Ui={},h2={},Yi="*/".concat("*"),l2=S.createElement("a");l2.href=Xa.href;function Ki(i){return function(n,l){typeof n!="string"&&(l=n,n="*");var d,m=0,y=n.toLowerCase().match(Vt)||[];if(u(l))for(;d=y[m++];)d[0]==="+"?(d=d.slice(1)||"*",(i[d]=i[d]||[]).unshift(l)):(i[d]=i[d]||[]).push(l)}}function Qi(i,n,l,d){var m={},y=i===h2;function x(V){var H;return m[V]=!0,h.each(i[V]||[],function(D,Z){var Y=Z(n,l,d);if(typeof Y=="string"&&!y&&!m[Y])return n.dataTypes.unshift(Y),x(Y),!1;if(y)return!(H=Y)}),H}return x(n.dataTypes[0])||!m["*"]&&x("*")}function d2(i,n){var l,d,m=h.ajaxSettings.flatOptions||{};for(l in n)n[l]!==void 0&&((m[l]?i:d||(d={}))[l]=n[l]);return d&&h.extend(!0,i,d),i}function gl(i,n,l){for(var d,m,y,x,V=i.contents,H=i.dataTypes;H[0]==="*";)H.shift(),d===void 0&&(d=i.mimeType||n.getResponseHeader("Content-Type"));if(d){for(m in V)if(V[m]&&V[m].test(d)){H.unshift(m);break}}if(H[0]in l)y=H[0];else{for(m in l){if(!H[0]||i.converters[m+" "+H[0]]){y=m;break}x||(x=m)}y=y||x}if(y)return y!==H[0]&&H.unshift(y),l[y]}function yl(i,n,l,d){var m,y,x,V,H,D={},Z=i.dataTypes.slice();if(Z[1])for(x in i.converters)D[x.toLowerCase()]=i.converters[x];for(y=Z.shift();y;)if(i.responseFields[y]&&(l[i.responseFields[y]]=n),!H&&d&&i.dataFilter&&(n=i.dataFilter(n,i.dataType)),H=y,y=Z.shift(),y){if(y==="*")y=H;else if(H!=="*"&&H!==y){if(x=D[H+" "+y]||D["* "+y],!x){for(m in D)if(V=m.split(" "),V[1]===y&&(x=D[H+" "+V[0]]||D["* "+V[0]],x)){x===!0?x=D[m]:D[m]!==!0&&(y=V[0],Z.unshift(V[1]));break}}if(x!==!0)if(x&&i.throws)n=x(n);else try{n=x(n)}catch(Y){return{state:"parsererror",error:x?Y:"No conversion from "+H+" to "+y}}}}return{state:"success",data:n}}h.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Xa.href,type:"GET",isLocal:Ml.test(Xa.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Yi,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":h.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(i,n){return n?d2(d2(i,h.ajaxSettings),n):d2(h.ajaxSettings,i)},ajaxPrefilter:Ki(Ui),ajaxTransport:Ki(h2),ajax:function(i,n){typeof i=="object"&&(n=i,i=void 0),n=n||{};var l,d,m,y,x,V,H,D,Z,Y,R=h.ajaxSetup({},n),it=R.context||R,ft=R.context&&(it.nodeType||it.jquery)?h(it):h.event,bt=h.Deferred(),vt=h.Callbacks("once memory"),Rt=R.statusCode||{},kt={},Ce={},Ae="canceled",wt={readyState:0,getResponseHeader:function(Et){var Lt;if(H){if(!y)for(y={};Lt=fl.exec(m);)y[Lt[1].toLowerCase()+" "]=(y[Lt[1].toLowerCase()+" "]||[]).concat(Lt[2]);Lt=y[Et.toLowerCase()+" "]}return Lt==null?null:Lt.join(", ")},getAllResponseHeaders:function(){return H?m:null},setRequestHeader:function(Et,Lt){return H==null&&(Et=Ce[Et.toLowerCase()]=Ce[Et.toLowerCase()]||Et,kt[Et]=Lt),this},overrideMimeType:function(Et){return H==null&&(R.mimeType=Et),this},statusCode:function(Et){var Lt;if(Et)if(H)wt.always(Et[wt.status]);else for(Lt in Et)Rt[Lt]=[Rt[Lt],Et[Lt]];return this},abort:function(Et){var Lt=Et||Ae;return l&&l.abort(Lt),na(0,Lt),this}};if(bt.promise(wt),R.url=((i||R.url||Xa.href)+"").replace(vl,Xa.protocol+"//"),R.type=n.method||n.type||R.method||R.type,R.dataTypes=(R.dataType||"*").toLowerCase().match(Vt)||[""],R.crossDomain==null){V=S.createElement("a");try{V.href=R.url,V.href=V.href,R.crossDomain=l2.protocol+"//"+l2.host!=V.protocol+"//"+V.host}catch{R.crossDomain=!0}}if(R.data&&R.processData&&typeof R.data!="string"&&(R.data=h.param(R.data,R.traditional)),Qi(Ui,R,n,wt),H)return wt;D=h.event&&R.global,D&&h.active++===0&&h.event.trigger("ajaxStart"),R.type=R.type.toUpperCase(),R.hasContent=!ml.test(R.type),d=R.url.replace(pl,""),R.hasContent?R.data&&R.processData&&(R.contentType||"").indexOf("application/x-www-form-urlencoded")===0&&(R.data=R.data.replace(cl,"+")):(Y=R.url.slice(d.length),R.data&&(R.processData||typeof R.data=="string")&&(d+=(s2.test(d)?"&":"?")+R.data,delete R.data),R.cache===!1&&(d=d.replace(ul,"$1"),Y=(s2.test(d)?"&":"?")+"_="+ji.guid+++Y),R.url=d+Y),R.ifModified&&(h.lastModified[d]&&wt.setRequestHeader("If-Modified-Since",h.lastModified[d]),h.etag[d]&&wt.setRequestHeader("If-None-Match",h.etag[d])),(R.data&&R.hasContent&&R.contentType!==!1||n.contentType)&&wt.setRequestHeader("Content-Type",R.contentType),wt.setRequestHeader("Accept",R.dataTypes[0]&&R.accepts[R.dataTypes[0]]?R.accepts[R.dataTypes[0]]+(R.dataTypes[0]!=="*"?", "+Yi+"; q=0.01":""):R.accepts["*"]);for(Z in R.headers)wt.setRequestHeader(Z,R.headers[Z]);if(R.beforeSend&&(R.beforeSend.call(it,wt,R)===!1||H))return wt.abort();if(Ae="abort",vt.add(R.complete),wt.done(R.success),wt.fail(R.error),l=Qi(h2,R,n,wt),!l)na(-1,"No Transport");else{if(wt.readyState=1,D&&ft.trigger("ajaxSend",[wt,R]),H)return wt;R.async&&R.timeout>0&&(x=t.setTimeout(function(){wt.abort("timeout")},R.timeout));try{H=!1,l.send(kt,na)}catch(Et){if(H)throw Et;na(-1,Et)}}function na(Et,Lt,Ya,p2){var Te,Ka,_e,Fe,qe,pe=Lt;H||(H=!0,x&&t.clearTimeout(x),l=void 0,m=p2||"",wt.readyState=Et>0?4:0,Te=Et>=200&&Et<300||Et===304,Ya&&(Fe=gl(R,wt,Ya)),!Te&&h.inArray("script",R.dataTypes)>-1&&h.inArray("json",R.dataTypes)<0&&(R.converters["text script"]=function(){}),Fe=yl(R,Fe,wt,Te),Te?(R.ifModified&&(qe=wt.getResponseHeader("Last-Modified"),qe&&(h.lastModified[d]=qe),qe=wt.getResponseHeader("etag"),qe&&(h.etag[d]=qe)),Et===204||R.type==="HEAD"?pe="nocontent":Et===304?pe="notmodified":(pe=Fe.state,Ka=Fe.data,_e=Fe.error,Te=!_e)):(_e=pe,(Et||!pe)&&(pe="error",Et<0&&(Et=0))),wt.status=Et,wt.statusText=(Lt||pe)+"",Te?bt.resolveWith(it,[Ka,pe,wt]):bt.rejectWith(it,[wt,pe,_e]),wt.statusCode(Rt),Rt=void 0,D&&ft.trigger(Te?"ajaxSuccess":"ajaxError",[wt,R,Te?Ka:_e]),vt.fireWith(it,[wt,pe]),D&&(ft.trigger("ajaxComplete",[wt,R]),--h.active||h.event.trigger("ajaxStop")))}return wt},getJSON:function(i,n,l){return h.get(i,n,l,"json")},getScript:function(i,n){return h.get(i,void 0,n,"script")}}),h.each(["get","post"],function(i,n){h[n]=function(l,d,m,y){return u(d)&&(y=y||m,m=d,d=void 0),h.ajax(h.extend({url:l,type:n,dataType:y,data:d,success:m},h.isPlainObject(l)&&l))}}),h.ajaxPrefilter(function(i){var n;for(n in i.headers)n.toLowerCase()==="content-type"&&(i.contentType=i.headers[n]||"")}),h._evalUrl=function(i,n,l){return h.ajax({url:i,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,converters:{"text script":function(){}},dataFilter:function(d){h.globalEval(d,n,l)}})},h.fn.extend({wrapAll:function(i){var n;return this[0]&&(u(i)&&(i=i.call(this[0])),n=h(i,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&n.insertBefore(this[0]),n.map(function(){for(var l=this;l.firstElementChild;)l=l.firstElementChild;return l}).append(this)),this},wrapInner:function(i){return u(i)?this.each(function(n){h(this).wrapInner(i.call(this,n))}):this.each(function(){var n=h(this),l=n.contents();l.length?l.wrapAll(i):n.append(i)})},wrap:function(i){var n=u(i);return this.each(function(l){h(this).wrapAll(n?i.call(this,l):i)})},unwrap:function(i){return this.parent(i).not("body").each(function(){h(this).replaceWith(this.childNodes)}),this}}),h.expr.pseudos.hidden=function(i){return!h.expr.pseudos.visible(i)},h.expr.pseudos.visible=function(i){return!!(i.offsetWidth||i.offsetHeight||i.getClientRects().length)},h.ajaxSettings.xhr=function(){try{return new t.XMLHttpRequest}catch{}};var xl={0:200,1223:204},Ua=h.ajaxSettings.xhr();p.cors=!!Ua&&"withCredentials"in Ua,p.ajax=Ua=!!Ua,h.ajaxTransport(function(i){var n,l;if(p.cors||Ua&&!i.crossDomain)return{send:function(d,m){var y,x=i.xhr();if(x.open(i.type,i.url,i.async,i.username,i.password),i.xhrFields)for(y in i.xhrFields)x[y]=i.xhrFields[y];i.mimeType&&x.overrideMimeType&&x.overrideMimeType(i.mimeType),!i.crossDomain&&!d["X-Requested-With"]&&(d["X-Requested-With"]="XMLHttpRequest");for(y in d)x.setRequestHeader(y,d[y]);n=function(V){return function(){n&&(n=l=x.onload=x.onerror=x.onabort=x.ontimeout=x.onreadystatechange=null,V==="abort"?x.abort():V==="error"?typeof x.status!="number"?m(0,"error"):m(x.status,x.statusText):m(xl[x.status]||x.status,x.statusText,(x.responseType||"text")!=="text"||typeof x.responseText!="string"?{binary:x.response}:{text:x.responseText},x.getAllResponseHeaders()))}},x.onload=n(),l=x.onerror=x.ontimeout=n("error"),x.onabort!==void 0?x.onabort=l:x.onreadystatechange=function(){x.readyState===4&&t.setTimeout(function(){n&&l()})},n=n("abort");try{x.send(i.hasContent&&i.data||null)}catch(V){if(n)throw V}},abort:function(){n&&n()}}}),h.ajaxPrefilter(function(i){i.crossDomain&&(i.contents.script=!1)}),h.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(i){return h.globalEval(i),i}}}),h.ajaxPrefilter("script",function(i){i.cache===void 0&&(i.cache=!1),i.crossDomain&&(i.type="GET")}),h.ajaxTransport("script",function(i){if(i.crossDomain||i.scriptAttrs){var n,l;return{send:function(d,m){n=h("<script>").attr(i.scriptAttrs||{}).prop({charset:i.scriptCharset,src:i.url}).on("load error",l=function(y){n.remove(),l=null,y&&m(y.type==="error"?404:200,y.type)}),S.head.appendChild(n[0])},abort:function(){l&&l()}}}});var Ji=[],c2=/(=)\?(?=&|$)|\?\?/;h.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var i=Ji.pop()||h.expando+"_"+ji.guid++;return this[i]=!0,i}}),h.ajaxPrefilter("json jsonp",function(i,n,l){var d,m,y,x=i.jsonp!==!1&&(c2.test(i.url)?"url":typeof i.data=="string"&&(i.contentType||"").indexOf("application/x-www-form-urlencoded")===0&&c2.test(i.data)&&"data");if(x||i.dataTypes[0]==="jsonp")return d=i.jsonpCallback=u(i.jsonpCallback)?i.jsonpCallback():i.jsonpCallback,x?i[x]=i[x].replace(c2,"$1"+d):i.jsonp!==!1&&(i.url+=(s2.test(i.url)?"&":"?")+i.jsonp+"="+d),i.converters["script json"]=function(){return y||h.error(d+" was not called"),y[0]},i.dataTypes[0]="json",m=t[d],t[d]=function(){y=arguments},l.always(function(){m===void 0?h(t).removeProp(d):t[d]=m,i[d]&&(i.jsonpCallback=n.jsonpCallback,Ji.push(d)),y&&u(m)&&m(y[0]),y=m=void 0}),"script"}),p.createHTMLDocument=function(){var i=S.implementation.createHTMLDocument("").body;return i.innerHTML="<form></form><form></form>",i.childNodes.length===2}(),h.parseHTML=function(i,n,l){if(typeof i!="string")return[];typeof n=="boolean"&&(l=n,n=!1);var d,m,y;return n||(p.createHTMLDocument?(n=S.implementation.createHTMLDocument(""),d=n.createElement("base"),d.href=S.location.href,n.head.appendChild(d)):n=S),m=At.exec(i),y=!l&&[],m?[n.createElement(m[1])]:(m=Hi([i],n,y),y&&y.length&&h(y).remove(),h.merge([],m.childNodes))},h.fn.load=function(i,n,l){var d,m,y,x=this,V=i.indexOf(" ");return V>-1&&(d=ia(i.slice(V)),i=i.slice(0,V)),u(n)?(l=n,n=void 0):n&&typeof n=="object"&&(m="POST"),x.length>0&&h.ajax({url:i,type:m||"GET",dataType:"html",data:n}).done(function(H){y=arguments,x.html(d?h("<div>").append(h.parseHTML(H)).find(d):H)}).always(l&&function(H,D){x.each(function(){l.apply(this,y||[H.responseText,D,H])})}),this},h.expr.pseudos.animated=function(i){return h.grep(h.timers,function(n){return i===n.elem}).length},h.offset={setOffset:function(i,n,l){var d,m,y,x,V,H,D,Z=h.css(i,"position"),Y=h(i),R={};Z==="static"&&(i.style.position="relative"),V=Y.offset(),y=h.css(i,"top"),H=h.css(i,"left"),D=(Z==="absolute"||Z==="fixed")&&(y+H).indexOf("auto")>-1,D?(d=Y.position(),x=d.top,m=d.left):(x=parseFloat(y)||0,m=parseFloat(H)||0),u(n)&&(n=n.call(i,l,h.extend({},V))),n.top!=null&&(R.top=n.top-V.top+x),n.left!=null&&(R.left=n.left-V.left+m),"using"in n?n.using.call(i,R):Y.css(R)}},h.fn.extend({offset:function(i){if(arguments.length)return i===void 0?this:this.each(function(m){h.offset.setOffset(this,i,m)});var n,l,d=this[0];if(d)return d.getClientRects().length?(n=d.getBoundingClientRect(),l=d.ownerDocument.defaultView,{top:n.top+l.pageYOffset,left:n.left+l.pageXOffset}):{top:0,left:0}},position:function(){if(this[0]){var i,n,l,d=this[0],m={top:0,left:0};if(h.css(d,"position")==="fixed")n=d.getBoundingClientRect();else{for(n=this.offset(),l=d.ownerDocument,i=d.offsetParent||l.documentElement;i&&(i===l.body||i===l.documentElement)&&h.css(i,"position")==="static";)i=i.parentNode;i&&i!==d&&i.nodeType===1&&(m=h(i).offset(),m.top+=h.css(i,"borderTopWidth",!0),m.left+=h.css(i,"borderLeftWidth",!0))}return{top:n.top-m.top-h.css(d,"marginTop",!0),left:n.left-m.left-h.css(d,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){for(var i=this.offsetParent;i&&h.css(i,"position")==="static";)i=i.offsetParent;return i||aa})}}),h.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(i,n){var l=n==="pageYOffset";h.fn[i]=function(d){return Nt(this,function(m,y,x){var V;if(A(m)?V=m:m.nodeType===9&&(V=m.defaultView),x===void 0)return V?V[n]:m[y];V?V.scrollTo(l?V.pageXOffset:x,l?x:V.pageYOffset):m[y]=x},i,d,arguments.length)}}),h.each(["top","left"],function(i,n){h.cssHooks[n]=ki(p.pixelPosition,function(l,d){if(d)return d=Ga(l,n),t2.test(d)?h(l).position()[n]+"px":d})}),h.each({Height:"height",Width:"width"},function(i,n){h.each({padding:"inner"+i,content:n,"":"outer"+i},function(l,d){h.fn[d]=function(m,y){var x=arguments.length&&(l||typeof m!="boolean"),V=l||(m===!0||y===!0?"margin":"border");return Nt(this,function(H,D,Z){var Y;return A(H)?d.indexOf("outer")===0?H["inner"+i]:H.document.documentElement["client"+i]:H.nodeType===9?(Y=H.documentElement,Math.max(H.body["scroll"+i],Y["scroll"+i],H.body["offset"+i],Y["offset"+i],Y["client"+i])):Z===void 0?h.css(H,D,V):h.style(H,D,Z,V)},n,x?m:void 0,x)}})}),h.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(i,n){h.fn[n]=function(l){return this.on(n,l)}}),h.fn.extend({bind:function(i,n,l){return this.on(i,null,n,l)},unbind:function(i,n){return this.off(i,null,n)},delegate:function(i,n,l,d){return this.on(n,i,l,d)},undelegate:function(i,n,l){return arguments.length===1?this.off(i,"**"):this.off(n,i||"**",l)},hover:function(i,n){return this.on("mouseenter",i).on("mouseleave",n||i)}}),h.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(i,n){h.fn[n]=function(l,d){return arguments.length>0?this.on(n,null,l,d):this.trigger(n)}});var wl=/^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;h.proxy=function(i,n){var l,d,m;if(typeof n=="string"&&(l=i[n],n=i,i=l),!!u(i))return d=o.call(arguments,2),m=function(){return i.apply(n||this,d.concat(o.call(arguments)))},m.guid=i.guid=i.guid||h.guid++,m},h.holdReady=function(i){i?h.readyWait++:h.ready(!0)},h.isArray=Array.isArray,h.parseJSON=JSON.parse,h.nodeName=k,h.isFunction=u,h.isWindow=A,h.camelCase=$t,h.type=L,h.now=Date.now,h.isNumeric=function(i){var n=h.type(i);return(n==="number"||n==="string")&&!isNaN(i-parseFloat(i))},h.trim=function(i){return i==null?"":(i+"").replace(wl,"$1")};var bl=t.jQuery,El=t.$;return h.noConflict=function(i){return t.$===h&&(t.$=El),i&&t.jQuery===h&&(t.jQuery=bl),h},typeof e>"u"&&(t.jQuery=t.$=h),h})}(V1)),V1.exports}var kl=Ol();const ai=Pl(kl);/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Do={xmlns:"http://www.w3.org/2000/svg",width:24,height:24,viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":2,"stroke-linecap":"round","stroke-linejoin":"round"};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Oo=([a,t,e])=>{const r=document.createElementNS("http://www.w3.org/2000/svg",a);return Object.keys(t).forEach(s=>{r.setAttribute(s,String(t[s]))}),e!=null&&e.length&&e.forEach(s=>{const o=Oo(s);r.appendChild(o)}),r},Il=(a,t={})=>{const e="svg",r={...Do,...t};return Oo([e,r,a])};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nl=a=>Array.from(a.attributes).reduce((t,e)=>(t[e.name]=e.value,t),{}),zl=a=>typeof a=="string"?a:!a||!a.class?"":a.class&&typeof a.class=="string"?a.class.split(" "):a.class&&Array.isArray(a.class)?a.class:"",$l=a=>a.flatMap(zl).map(e=>e.trim()).filter(Boolean).filter((e,r,s)=>s.indexOf(e)===r).join(" "),Rl=a=>a.replace(/(\w)(\w*)(_|-|\s*)/g,(t,e,r)=>e.toUpperCase()+r.toLowerCase()),rr=(a,{nameAttr:t,icons:e,attrs:r})=>{var w;const s=a.getAttribute(t);if(s==null)return;const o=Rl(s),c=e[o];if(!c)return console.warn(`${a.outerHTML} icon name was not found in the provided icons object.`);const f=Nl(a),v={...Do,"data-lucide":s,...r,...f},M=$l(["lucide",`lucide-${s}`,f,r]);M&&Object.assign(v,{class:M});const g=Il(c,v);return(w=a.parentNode)==null?void 0:w.replaceChild(g,a)};/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bl=[["path",{d:"M3.5 13h6"}],["path",{d:"m2 16 4.5-9 4.5 9"}],["path",{d:"M18 7v9"}],["path",{d:"m14 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fl=[["path",{d:"M21 14h-5"}],["path",{d:"M16 16v-3.5a2.5 2.5 0 0 1 5 0V16"}],["path",{d:"M4.5 13h6"}],["path",{d:"m3 16 4.5-9 4.5 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ql=[["path",{d:"M3.5 13h6"}],["path",{d:"m2 16 4.5-9 4.5 9"}],["path",{d:"M18 16V7"}],["path",{d:"m14 11 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wl=[["circle",{cx:"16",cy:"4",r:"1"}],["path",{d:"m18 19 1-7-6 1"}],["path",{d:"m5 8 3-3 5.5 3-2.36 3.5"}],["path",{d:"M4.24 14.5a5 5 0 0 0 6.88 6"}],["path",{d:"M13.76 17.5a5 5 0 0 0-6.88-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jl=[["path",{d:"M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gl=[["path",{d:"M18 17.5a2.5 2.5 0 1 1-4 2.03V12"}],["path",{d:"M6 12H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 8h12"}],["path",{d:"M6.6 15.572A2 2 0 1 0 10 17v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zl=[["path",{d:"M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"}],["path",{d:"m12 15 5 6H7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nr=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"m9 13 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sr=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"M9 13h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xl=[["path",{d:"M6.87 6.87a8 8 0 1 0 11.26 11.26"}],["path",{d:"M19.9 14.25a8 8 0 0 0-9.15-9.15"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.26 18.67 4 21"}],["path",{d:"m2 2 20 20"}],["path",{d:"M4 4 2 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const or=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}],["path",{d:"M12 10v6"}],["path",{d:"M9 13h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ul=[["circle",{cx:"12",cy:"13",r:"8"}],["path",{d:"M12 9v4l2 2"}],["path",{d:"M5 3 2 6"}],["path",{d:"m22 6-3-3"}],["path",{d:"M6.38 18.7 4 21"}],["path",{d:"M17.64 18.67 20 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yl=[["path",{d:"M11 21c0-2.5 2-2.5 2-5"}],["path",{d:"M16 21c0-2.5 2-2.5 2-5"}],["path",{d:"m19 8-.8 3a1.25 1.25 0 0 1-1.2 1H7a1.25 1.25 0 0 1-1.2-1L5 8"}],["path",{d:"M21 3a1 1 0 0 1 1 1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a1 1 0 0 1 1-1z"}],["path",{d:"M6 21c0-2.5 2-2.5 2-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kl=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["polyline",{points:"11 3 11 11 14 8 17 11 17 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ql=[["path",{d:"M2 12h20"}],["path",{d:"M10 16v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4"}],["path",{d:"M10 8V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v4"}],["path",{d:"M20 16v1a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-1"}],["path",{d:"M14 8V7c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jl=[["path",{d:"M12 2v20"}],["path",{d:"M8 10H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h4"}],["path",{d:"M16 10h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-4"}],["path",{d:"M8 20H7a2 2 0 0 1-2-2v-2c0-1.1.9-2 2-2h1"}],["path",{d:"M16 14h1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const td=[["path",{d:"M17 12H7"}],["path",{d:"M19 18H5"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ed=[["rect",{width:"6",height:"16",x:"4",y:"2",rx:"2"}],["rect",{width:"6",height:"9",x:"14",y:"9",rx:"2"}],["path",{d:"M22 22H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ad=[["rect",{width:"16",height:"6",x:"2",y:"4",rx:"2"}],["rect",{width:"9",height:"6",x:"9",y:"14",rx:"2"}],["path",{d:"M22 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const id=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M17 22v-5"}],["path",{d:"M17 7V2"}],["path",{d:"M7 22v-3"}],["path",{d:"M7 5V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rd=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M4 2v20"}],["path",{d:"M14 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nd=[["rect",{width:"6",height:"14",x:"4",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"14",y:"7",rx:"2"}],["path",{d:"M10 2v20"}],["path",{d:"M20 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sd=[["rect",{width:"6",height:"14",x:"2",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"16",y:"7",rx:"2"}],["path",{d:"M12 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const od=[["rect",{width:"6",height:"14",x:"6",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"16",y:"7",rx:"2"}],["path",{d:"M2 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hd=[["rect",{width:"6",height:"14",x:"2",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"12",y:"7",rx:"2"}],["path",{d:"M22 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ld=[["rect",{width:"6",height:"10",x:"9",y:"7",rx:"2"}],["path",{d:"M4 22V2"}],["path",{d:"M20 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dd=[["rect",{width:"6",height:"14",x:"3",y:"5",rx:"2"}],["rect",{width:"6",height:"10",x:"15",y:"7",rx:"2"}],["path",{d:"M3 2v20"}],["path",{d:"M21 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cd=[["path",{d:"M3 12h18"}],["path",{d:"M3 18h18"}],["path",{d:"M3 6h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pd=[["path",{d:"M15 12H3"}],["path",{d:"M17 18H3"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ud=[["path",{d:"M21 12H9"}],["path",{d:"M21 18H7"}],["path",{d:"M21 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fd=[["rect",{width:"6",height:"16",x:"4",y:"6",rx:"2"}],["rect",{width:"6",height:"9",x:"14",y:"6",rx:"2"}],["path",{d:"M22 2H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Md=[["rect",{width:"9",height:"6",x:"6",y:"14",rx:"2"}],["rect",{width:"16",height:"6",x:"6",y:"4",rx:"2"}],["path",{d:"M2 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const md=[["path",{d:"M22 17h-3"}],["path",{d:"M22 7h-5"}],["path",{d:"M5 17H2"}],["path",{d:"M7 7H2"}],["rect",{x:"5",y:"14",width:"14",height:"6",rx:"2"}],["rect",{x:"7",y:"4",width:"10",height:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vd=[["rect",{width:"14",height:"6",x:"5",y:"14",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"4",rx:"2"}],["path",{d:"M2 20h20"}],["path",{d:"M2 10h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gd=[["rect",{width:"14",height:"6",x:"5",y:"14",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"4",rx:"2"}],["path",{d:"M2 14h20"}],["path",{d:"M2 4h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yd=[["rect",{width:"14",height:"6",x:"5",y:"16",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"2",rx:"2"}],["path",{d:"M2 12h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xd=[["rect",{width:"14",height:"6",x:"5",y:"12",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"2",rx:"2"}],["path",{d:"M2 22h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wd=[["rect",{width:"14",height:"6",x:"5",y:"16",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"6",rx:"2"}],["path",{d:"M2 2h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bd=[["rect",{width:"10",height:"6",x:"7",y:"9",rx:"2"}],["path",{d:"M22 20H2"}],["path",{d:"M22 4H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ed=[["rect",{width:"14",height:"6",x:"5",y:"15",rx:"2"}],["rect",{width:"10",height:"6",x:"7",y:"3",rx:"2"}],["path",{d:"M2 21h20"}],["path",{d:"M2 3h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sd=[["path",{d:"M10 10H6"}],["path",{d:"M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"}],["path",{d:"M19 18h2a1 1 0 0 0 1-1v-3.28a1 1 0 0 0-.684-.948l-1.923-.641a1 1 0 0 1-.578-.502l-1.539-3.076A1 1 0 0 0 16.382 8H14"}],["path",{d:"M8 8v4"}],["path",{d:"M9 18h6"}],["circle",{cx:"17",cy:"18",r:"2"}],["circle",{cx:"7",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cd=[["path",{d:"M17.5 12c0 4.4-3.6 8-8 8A4.5 4.5 0 0 1 5 15.5c0-6 8-4 8-8.5a3 3 0 1 0-6 0c0 3 2.5 8.5 12 13"}],["path",{d:"M16 12h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ad=[["path",{d:"M10 17c-5-3-7-7-7-9a2 2 0 0 1 4 0c0 2.5-5 2.5-5 6 0 1.7 1.3 3 3 3 2.8 0 5-2.2 5-5"}],["path",{d:"M22 17c-5-3-7-7-7-9a2 2 0 0 1 4 0c0 2.5-5 2.5-5 6 0 1.7 1.3 3 3 3 2.8 0 5-2.2 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Td=[["path",{d:"M10 2v5.632c0 .424-.272.795-.653.982A6 6 0 0 0 6 14c.006 4 3 7 5 8"}],["path",{d:"M10 5H8a2 2 0 0 0 0 4h.68"}],["path",{d:"M14 2v5.632c0 .424.272.795.652.982A6 6 0 0 1 18 14c0 4-3 7-5 8"}],["path",{d:"M14 5h2a2 2 0 0 1 0 4h-.68"}],["path",{d:"M18 22H6"}],["path",{d:"M9 2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _d=[["path",{d:"M12 22V8"}],["path",{d:"M5 12H2a10 10 0 0 0 20 0h-3"}],["circle",{cx:"12",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hd=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 16s-1.5-2-4-2-4 2-4 2"}],["path",{d:"M7.5 8 10 9"}],["path",{d:"m14 9 2.5-1"}],["path",{d:"M9 10h.01"}],["path",{d:"M15 10h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ld=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 15h8"}],["path",{d:"M8 9h2"}],["path",{d:"M14 9h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vd=[["path",{d:"M2 12 7 2"}],["path",{d:"m7 12 5-10"}],["path",{d:"m12 12 5-10"}],["path",{d:"m17 12 5-10"}],["path",{d:"M4.5 7h15"}],["path",{d:"M12 16v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pd=[["path",{d:"M7 10H6a4 4 0 0 1-4-4 1 1 0 0 1 1-1h4"}],["path",{d:"M7 5a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1 7 7 0 0 1-7 7H8a1 1 0 0 1-1-1z"}],["path",{d:"M9 12v5"}],["path",{d:"M15 12v5"}],["path",{d:"M5 20a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3 1 1 0 0 1-1 1H6a1 1 0 0 1-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dd=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m14.31 8 5.74 9.94"}],["path",{d:"M9.69 8h11.48"}],["path",{d:"m7.38 12 5.74-9.94"}],["path",{d:"M9.69 16 3.95 6.06"}],["path",{d:"M14.31 16H2.83"}],["path",{d:"m16.62 12-5.74 9.94"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Od=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 8h.01"}],["path",{d:"M10 8h.01"}],["path",{d:"M14 8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kd=[["rect",{x:"2",y:"4",width:"20",height:"16",rx:"2"}],["path",{d:"M10 4v4"}],["path",{d:"M2 8h20"}],["path",{d:"M6 4v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Id=[["path",{d:"M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"}],["path",{d:"M10 2c1 .5 2 2 2 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nd=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h2"}],["path",{d:"M20 8v11a2 2 0 0 1-2 2h-2"}],["path",{d:"m9 15 3-3 3 3"}],["path",{d:"M12 12v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zd=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"}],["path",{d:"M10 12h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $d=[["path",{d:"M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"}],["path",{d:"M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rd=[["rect",{width:"20",height:"5",x:"2",y:"3",rx:"1"}],["path",{d:"M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"}],["path",{d:"m9.5 17 5-5"}],["path",{d:"m9.5 12 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bd=[["path",{d:"M15 5H9"}],["path",{d:"M15 9v3h4l-7 7-7-7h4V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fd=[["path",{d:"M15 6v6h4l-7 7-7-7h4V6h6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qd=[["path",{d:"M19 15V9"}],["path",{d:"M15 15h-3v4l-7-7 7-7v4h3v6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wd=[["path",{d:"M18 15h-6v4l-7-7 7-7v4h6v6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jd=[["path",{d:"M5 9v6"}],["path",{d:"M9 9h3V5l7 7-7 7v-4H9V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gd=[["path",{d:"M9 19h6"}],["path",{d:"M9 15v-3H5l7-7 7 7h-4v3H9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zd=[["path",{d:"M6 9h6V5l7 7-7 7v-4H6V9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xd=[["path",{d:"M9 18v-6H5l7-7 7 7h-4v6H9z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ud=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["rect",{x:"15",y:"4",width:"4",height:"6",ry:"2"}],["path",{d:"M17 20v-6h-2"}],["path",{d:"M15 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yd=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M17 10V4h-2"}],["path",{d:"M15 10h4"}],["rect",{x:"15",y:"14",width:"4",height:"6",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hr=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M20 8h-5"}],["path",{d:"M15 10V6.5a2.5 2.5 0 0 1 5 0V10"}],["path",{d:"M15 14h5l-5 6h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kd=[["path",{d:"M19 3H5"}],["path",{d:"M12 21V7"}],["path",{d:"m6 15 6 6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qd=[["path",{d:"M17 7 7 17"}],["path",{d:"M17 17H7V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jd=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M11 4h4"}],["path",{d:"M11 8h7"}],["path",{d:"M11 12h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tc=[["path",{d:"m7 7 10 10"}],["path",{d:"M17 7v10H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ec=[["path",{d:"M12 2v14"}],["path",{d:"m19 9-7 7-7-7"}],["circle",{cx:"12",cy:"21",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ac=[["path",{d:"M12 17V3"}],["path",{d:"m6 11 6 6 6-6"}],["path",{d:"M19 21H5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ic=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"m21 8-4-4-4 4"}],["path",{d:"M17 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lr=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 20V4"}],["path",{d:"M11 4h10"}],["path",{d:"M11 8h7"}],["path",{d:"M11 12h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dr=[["path",{d:"m3 16 4 4 4-4"}],["path",{d:"M7 4v16"}],["path",{d:"M15 4h5l-5 6h5"}],["path",{d:"M15 20v-3.5a2.5 2.5 0 0 1 5 0V20"}],["path",{d:"M20 18h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rc=[["path",{d:"M12 5v14"}],["path",{d:"m19 12-7 7-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nc=[["path",{d:"m9 6-6 6 6 6"}],["path",{d:"M3 12h14"}],["path",{d:"M21 19V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sc=[["path",{d:"M8 3 4 7l4 4"}],["path",{d:"M4 7h16"}],["path",{d:"m16 21 4-4-4-4"}],["path",{d:"M20 17H4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oc=[["path",{d:"M3 19V5"}],["path",{d:"m13 6-6 6 6 6"}],["path",{d:"M7 12h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hc=[["path",{d:"m12 19-7-7 7-7"}],["path",{d:"M19 12H5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lc=[["path",{d:"M3 5v14"}],["path",{d:"M21 12H7"}],["path",{d:"m15 18 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dc=[["path",{d:"m16 3 4 4-4 4"}],["path",{d:"M20 7H4"}],["path",{d:"m8 21-4-4 4-4"}],["path",{d:"M4 17h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cc=[["path",{d:"M17 12H3"}],["path",{d:"m11 18 6-6-6-6"}],["path",{d:"M21 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pc=[["path",{d:"M5 12h14"}],["path",{d:"m12 5 7 7-7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uc=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["rect",{x:"15",y:"4",width:"4",height:"6",ry:"2"}],["path",{d:"M17 20v-6h-2"}],["path",{d:"M15 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fc=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M17 10V4h-2"}],["path",{d:"M15 10h4"}],["rect",{x:"15",y:"14",width:"4",height:"6",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cr=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M20 8h-5"}],["path",{d:"M15 10V6.5a2.5 2.5 0 0 1 5 0V10"}],["path",{d:"M15 14h5l-5 6h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mc=[["path",{d:"m21 16-4 4-4-4"}],["path",{d:"M17 20V4"}],["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mc=[["path",{d:"m5 9 7-7 7 7"}],["path",{d:"M12 16V2"}],["circle",{cx:"12",cy:"21",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vc=[["path",{d:"m18 9-6-6-6 6"}],["path",{d:"M12 3v14"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gc=[["path",{d:"M7 17V7h10"}],["path",{d:"M17 17 7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pr=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M11 12h4"}],["path",{d:"M11 16h7"}],["path",{d:"M11 20h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yc=[["path",{d:"M7 7h10v10"}],["path",{d:"M7 17 17 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xc=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M11 12h10"}],["path",{d:"M11 16h7"}],["path",{d:"M11 20h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wc=[["path",{d:"M5 3h14"}],["path",{d:"m18 13-6-6-6 6"}],["path",{d:"M12 7v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ur=[["path",{d:"m3 8 4-4 4 4"}],["path",{d:"M7 4v16"}],["path",{d:"M15 4h5l-5 6h5"}],["path",{d:"M15 20v-3.5a2.5 2.5 0 0 1 5 0V20"}],["path",{d:"M20 18h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bc=[["path",{d:"m5 12 7-7 7 7"}],["path",{d:"M12 19V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ec=[["path",{d:"M12 6v12"}],["path",{d:"M17.196 9 6.804 15"}],["path",{d:"m6.804 9 10.392 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sc=[["path",{d:"m4 6 3-3 3 3"}],["path",{d:"M7 17V3"}],["path",{d:"m14 6 3-3 3 3"}],["path",{d:"M17 17V3"}],["path",{d:"M4 21h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cc=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ac=[["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M20.2 20.2c2.04-2.03.02-7.36-4.5-11.9-4.54-4.52-9.87-6.54-11.9-4.5-2.04 2.03-.02 7.36 4.5 11.9 4.54 4.52 9.87 6.54 11.9 4.5Z"}],["path",{d:"M15.7 15.7c4.52-4.54 6.54-9.87 4.5-11.9-2.03-2.04-7.36-.02-11.9 4.5-4.52 4.54-6.54 9.87-4.5 11.9 2.03 2.04 7.36.02 11.9-4.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tc=[["path",{d:"M2 10v3"}],["path",{d:"M6 6v11"}],["path",{d:"M10 3v18"}],["path",{d:"M14 8v7"}],["path",{d:"M18 5v13"}],["path",{d:"M22 10v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _c=[["path",{d:"M2 13a2 2 0 0 0 2-2V7a2 2 0 0 1 4 0v13a2 2 0 0 0 4 0V4a2 2 0 0 1 4 0v13a2 2 0 0 0 4 0v-4a2 2 0 0 1 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hc=[["path",{d:"m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"}],["circle",{cx:"12",cy:"8",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lc=[["path",{d:"m14 12-8.381 8.38a1 1 0 0 1-3.001-3L11 9"}],["path",{d:"M15 15.5a.5.5 0 0 0 .5.5A6.5 6.5 0 0 0 22 9.5a.5.5 0 0 0-.5-.5h-1.672a2 2 0 0 1-1.414-.586l-5.062-5.062a1.205 1.205 0 0 0-1.704 0L9.352 5.648a1.205 1.205 0 0 0 0 1.704l5.062 5.062A2 2 0 0 1 15 13.828z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fr=[["path",{d:"M13.5 10.5 15 9"}],["path",{d:"M4 4v15a1 1 0 0 0 1 1h15"}],["path",{d:"M4.293 19.707 6 18"}],["path",{d:"m9 15 1.5-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vc=[["path",{d:"M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"}],["path",{d:"M15 12h.01"}],["path",{d:"M19.38 6.813A9 9 0 0 1 20.8 10.2a2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1"}],["path",{d:"M9 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pc=[["path",{d:"M4 10a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"}],["path",{d:"M8 10h8"}],["path",{d:"M8 18h8"}],["path",{d:"M8 22v-6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v6"}],["path",{d:"M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"8",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mr=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Oc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M12 7v10"}],["path",{d:"M15.4 10a4 4 0 1 0 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ic=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M7 12h5"}],["path",{d:"M15 9.4a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M8 8h8"}],["path",{d:"M8 12h8"}],["path",{d:"m13 17-5-1h1a4 4 0 0 0 0-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"16",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"8",y2:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $c=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m9 8 3 3v7"}],["path",{d:"m12 11 3-3"}],["path",{d:"M9 12h6"}],["path",{d:"M9 16h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M8 12h4"}],["path",{d:"M10 16V9.5a2.5 2.5 0 0 1 5 0"}],["path",{d:"M8 16h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"12",x2:"12",y1:"8",y2:"16"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mr=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["line",{x1:"12",x2:"12.01",y1:"17",y2:"17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M9 16h5"}],["path",{d:"M9 12h5a2 2 0 1 0 0-4h-3v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["path",{d:"M11 17V8h4"}],["path",{d:"M11 12h3"}],["path",{d:"M9 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}],["line",{x1:"15",x2:"9",y1:"9",y2:"15"}],["line",{x1:"9",x2:"15",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zc=[["path",{d:"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xc=[["path",{d:"M22 18H6a2 2 0 0 1-2-2V7a2 2 0 0 0-2-2"}],["path",{d:"M17 14V4a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v10"}],["rect",{width:"13",height:"8",x:"8",y:"6",rx:"1"}],["circle",{cx:"18",cy:"20",r:"2"}],["circle",{cx:"9",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uc=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m4.9 4.9 14.2 14.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yc=[["path",{d:"M4 13c3.5-2 8-2 10 2a5.5 5.5 0 0 1 8 5"}],["path",{d:"M5.15 17.89c5.52-1.52 8.65-6.89 7-12C11.55 4 11.5 2 13 2c3.22 0 5 5.5 5 8 0 6.5-4.2 12-10.49 12C5.11 22 2 22 2 20c0-1.5 1.14-1.55 3.15-2.11Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kc=[["path",{d:"M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"m16 19 3 3 3-3"}],["path",{d:"M18 12h.01"}],["path",{d:"M19 16v6"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qc=[["path",{d:"M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"M18 12h.01"}],["path",{d:"M19 22v-6"}],["path",{d:"m22 19-3-3-3 3"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jc=[["path",{d:"M10 10.01h.01"}],["path",{d:"M10 14.01h.01"}],["path",{d:"M14 10.01h.01"}],["path",{d:"M14 14.01h.01"}],["path",{d:"M18 6v11.5"}],["path",{d:"M6 6v12"}],["rect",{x:"2",y:"6",width:"20",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tp=[["path",{d:"M13 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5"}],["path",{d:"m17 17 5 5"}],["path",{d:"M18 12h.01"}],["path",{d:"m22 17-5 5"}],["path",{d:"M6 12h.01"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ep=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M6 12h.01M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ap=[["path",{d:"M3 5v14"}],["path",{d:"M8 5v14"}],["path",{d:"M12 5v14"}],["path",{d:"M17 5v14"}],["path",{d:"M21 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ip=[["path",{d:"M10 3a41 41 0 0 0 0 18"}],["path",{d:"M14 3a41 41 0 0 1 0 18"}],["path",{d:"M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"}],["path",{d:"M3.84 17h16.32"}],["path",{d:"M3.84 7h16.32"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rp=[["path",{d:"M4 20h16"}],["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const np=[["path",{d:"M10 4 8 6"}],["path",{d:"M17 19v2"}],["path",{d:"M2 12h20"}],["path",{d:"M7 19v2"}],["path",{d:"M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sp=[["path",{d:"m11 7-3 5h4l-3 5"}],["path",{d:"M14.856 6H16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.935"}],["path",{d:"M22 14v-4"}],["path",{d:"M5.14 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2.936"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const op=[["path",{d:"M10 10v4"}],["path",{d:"M14 10v4"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 10v4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hp=[["path",{d:"M22 14v-4"}],["path",{d:"M6 14v-4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lp=[["path",{d:"M10 14v-4"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 14v-4"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dp=[["path",{d:"M10 9v6"}],["path",{d:"M12.543 6H16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.605"}],["path",{d:"M22 14v-4"}],["path",{d:"M7 12h6"}],["path",{d:"M7.606 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.606"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cp=[["path",{d:"M10 17h.01"}],["path",{d:"M10 7v6"}],["path",{d:"M14 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2"}],["path",{d:"M22 14v-4"}],["path",{d:"M6 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pp=[["path",{d:"M 22 14 L 22 10"}],["rect",{x:"2",y:"6",width:"16",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const up=[["path",{d:"M4.5 3h15"}],["path",{d:"M6 3v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V3"}],["path",{d:"M6 14h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fp=[["path",{d:"M9 9c-.64.64-1.521.954-2.402 1.165A6 6 0 0 0 8 22a13.96 13.96 0 0 0 9.9-4.1"}],["path",{d:"M10.75 5.093A6 6 0 0 1 22 8c0 2.411-.61 4.68-1.683 6.66"}],["path",{d:"M5.341 10.62a4 4 0 0 0 6.487 1.208M10.62 5.341a4.015 4.015 0 0 1 2.039 2.04"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mp=[["path",{d:"M10.165 6.598C9.954 7.478 9.64 8.36 9 9c-.64.64-1.521.954-2.402 1.165A6 6 0 0 0 8 22c7.732 0 14-6.268 14-14a6 6 0 0 0-11.835-1.402Z"}],["path",{d:"M5.341 10.62a4 4 0 1 0 5.279-5.28"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mp=[["path",{d:"M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"}],["path",{d:"M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"}],["path",{d:"M12 4v6"}],["path",{d:"M2 18h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vp=[["path",{d:"M3 20v-8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8"}],["path",{d:"M5 10V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4"}],["path",{d:"M3 18h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gp=[["path",{d:"M2 4v16"}],["path",{d:"M2 8h18a2 2 0 0 1 2 2v10"}],["path",{d:"M2 17h20"}],["path",{d:"M6 8v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yp=[["path",{d:"M16.4 13.7A6.5 6.5 0 1 0 6.28 6.6c-1.1 3.13-.78 3.9-3.18 6.08A3 3 0 0 0 5 18c4 0 8.4-1.8 11.4-4.3"}],["path",{d:"m18.5 6 2.19 4.5a6.48 6.48 0 0 1-2.29 7.2C15.4 20.2 11 22 7 22a3 3 0 0 1-2.68-1.66L2.4 16.5"}],["circle",{cx:"12.5",cy:"8.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xp=[["path",{d:"M13 13v5"}],["path",{d:"M17 11.47V8"}],["path",{d:"M17 11h1a3 3 0 0 1 2.745 4.211"}],["path",{d:"m2 2 20 20"}],["path",{d:"M5 8v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-3"}],["path",{d:"M7.536 7.535C6.766 7.649 6.154 8 5.5 8a2.5 2.5 0 0 1-1.768-4.268"}],["path",{d:"M8.727 3.204C9.306 2.767 9.885 2 11 2c1.56 0 2 1.5 3 1.5s1.72-.5 2.5-.5a1 1 0 1 1 0 5c-.78 0-1.5-.5-2.5-.5a3.149 3.149 0 0 0-.842.12"}],["path",{d:"M9 14.6V18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wp=[["path",{d:"M17 11h1a3 3 0 0 1 0 6h-1"}],["path",{d:"M9 12v6"}],["path",{d:"M13 12v6"}],["path",{d:"M14 7.5c-1 0-1.44.5-3 .5s-2-.5-3-.5-1.72.5-2.5.5a2.5 2.5 0 0 1 0-5c.78 0 1.57.5 2.5.5S9.44 2 11 2s2 1.5 3 1.5 1.72-.5 2.5-.5a2.5 2.5 0 0 1 0 5c-.78 0-1.5-.5-2.5-.5Z"}],["path",{d:"M5 8v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bp=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M13.916 2.314A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.74 7.327A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673 9 9 0 0 1-.585-.665"}],["circle",{cx:"18",cy:"8",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ep=[["path",{d:"M18.518 17.347A7 7 0 0 1 14 19"}],["path",{d:"M18.8 4A11 11 0 0 1 20 9"}],["path",{d:"M9 9h.01"}],["circle",{cx:"20",cy:"16",r:"2"}],["circle",{cx:"9",cy:"9",r:"7"}],["rect",{x:"4",y:"16",width:"10",height:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sp=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M15 8h6"}],["path",{d:"M16.243 3.757A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673A9.4 9.4 0 0 1 18.667 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cp=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M17 17H4a1 1 0 0 1-.74-1.673C4.59 13.956 6 12.499 6 8a6 6 0 0 1 .258-1.742"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.668 3.01A6 6 0 0 1 18 8c0 2.687.77 4.653 1.707 6.05"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ap=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M15 8h6"}],["path",{d:"M18 5v6"}],["path",{d:"M20.002 14.464a9 9 0 0 0 .738.863A1 1 0 0 1 20 17H4a1 1 0 0 1-.74-1.673C4.59 13.956 6 12.499 6 8a6 6 0 0 1 8.75-5.332"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tp=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M22 8c0-2.3-.8-4.3-2-6"}],["path",{d:"M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"}],["path",{d:"M4 2C2.8 3.7 2 5.7 2 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _p=[["path",{d:"M10.268 21a2 2 0 0 0 3.464 0"}],["path",{d:"M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vr=[["rect",{width:"13",height:"7",x:"3",y:"3",rx:"1"}],["path",{d:"m22 15-3-3 3-3"}],["rect",{width:"13",height:"7",x:"3",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gr=[["rect",{width:"13",height:"7",x:"8",y:"3",rx:"1"}],["path",{d:"m2 9 3 3-3 3"}],["rect",{width:"13",height:"7",x:"8",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hp=[["rect",{width:"7",height:"13",x:"3",y:"3",rx:"1"}],["path",{d:"m9 22 3-3 3 3"}],["rect",{width:"7",height:"13",x:"14",y:"3",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lp=[["rect",{width:"7",height:"13",x:"3",y:"8",rx:"1"}],["path",{d:"m15 2-3 3-3-3"}],["rect",{width:"7",height:"13",x:"14",y:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vp=[["path",{d:"M12.409 13.017A5 5 0 0 1 22 15c0 3.866-4 7-9 7-4.077 0-8.153-.82-10.371-2.462-.426-.316-.631-.832-.62-1.362C2.118 12.723 2.627 2 10 2a3 3 0 0 1 3 3 2 2 0 0 1-2 2c-1.105 0-1.64-.444-2-1"}],["path",{d:"M15 14a5 5 0 0 0-7.584 2"}],["path",{d:"M9.964 6.825C8.019 7.977 9.5 13 8 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pp=[["rect",{x:"14",y:"14",width:"4",height:"6",rx:"2"}],["rect",{x:"6",y:"4",width:"4",height:"6",rx:"2"}],["path",{d:"M6 20h4"}],["path",{d:"M14 10h4"}],["path",{d:"M6 14h2v6"}],["path",{d:"M14 4h2v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dp=[["circle",{cx:"18.5",cy:"17.5",r:"3.5"}],["circle",{cx:"5.5",cy:"17.5",r:"3.5"}],["circle",{cx:"15",cy:"5",r:"1"}],["path",{d:"M12 17.5V14l-3-3 4-3 2 3h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Op=[["path",{d:"M10 10h4"}],["path",{d:"M19 7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3"}],["path",{d:"M20 21a2 2 0 0 0 2-2v-3.851c0-1.39-2-2.962-2-4.829V8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2z"}],["path",{d:"M 22 16 L 2 16"}],["path",{d:"M4 21a2 2 0 0 1-2-2v-3.851c0-1.39 2-2.962 2-4.829V8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v11a2 2 0 0 1-2 2z"}],["path",{d:"M9 7V4a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kp=[["circle",{cx:"12",cy:"11.9",r:"2"}],["path",{d:"M6.7 3.4c-.9 2.5 0 5.2 2.2 6.7C6.5 9 3.7 9.6 2 11.6"}],["path",{d:"m8.9 10.1 1.4.8"}],["path",{d:"M17.3 3.4c.9 2.5 0 5.2-2.2 6.7 2.4-1.2 5.2-.6 6.9 1.5"}],["path",{d:"m15.1 10.1-1.4.8"}],["path",{d:"M16.7 20.8c-2.6-.4-4.6-2.6-4.7-5.3-.2 2.6-2.1 4.8-4.7 5.2"}],["path",{d:"M12 13.9v1.6"}],["path",{d:"M13.5 5.4c-1-.2-2-.2-3 0"}],["path",{d:"M17 16.4c.7-.7 1.2-1.6 1.5-2.5"}],["path",{d:"M5.5 13.9c.3.9.8 1.8 1.5 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ip=[["path",{d:"M16 7h.01"}],["path",{d:"M3.4 18H12a8 8 0 0 0 8-8V7a4 4 0 0 0-7.28-2.3L2 20"}],["path",{d:"m20 7 2 .5-2 .5"}],["path",{d:"M10 18v3"}],["path",{d:"M14 17.75V21"}],["path",{d:"M7 18a6 6 0 0 0 3.84-10.61"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Np=[["circle",{cx:"9",cy:"9",r:"7"}],["circle",{cx:"15",cy:"15",r:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zp=[["path",{d:"M11.767 19.089c4.924.868 6.14-6.025 1.216-6.894m-1.216 6.894L5.86 18.047m5.908 1.042-.347 1.97m1.563-8.864c4.924.869 6.14-6.025 1.215-6.893m-1.215 6.893-3.94-.694m5.155-6.2L8.29 4.26m5.908 1.042.348-1.97M7.48 20.364l3.126-17.727"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $p=[["path",{d:"M3 3h18"}],["path",{d:"M20 7H8"}],["path",{d:"M20 11H8"}],["path",{d:"M10 19h10"}],["path",{d:"M8 15h12"}],["path",{d:"M4 3v14"}],["circle",{cx:"4",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rp=[["path",{d:"M10 22V7a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a1 1 0 0 0-1-1H2"}],["rect",{x:"14",y:"2",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bp=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}],["line",{x1:"18",x2:"21",y1:"12",y2:"12"}],["line",{x1:"3",x2:"6",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fp=[["path",{d:"m17 17-5 5V12l-5 5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M14.5 9.5 17 7l-5-5v4.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qp=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}],["path",{d:"M20.83 14.83a4 4 0 0 0 0-5.66"}],["path",{d:"M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wp=[["path",{d:"M6 12h9a4 4 0 0 1 0 8H7a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h7a4 4 0 0 1 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jp=[["path",{d:"m7 7 10 10-5 5V2l5 5L7 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gp=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zp=[["circle",{cx:"11",cy:"13",r:"9"}],["path",{d:"M14.35 4.65 16.3 2.7a2.41 2.41 0 0 1 3.4 0l1.6 1.6a2.4 2.4 0 0 1 0 3.4l-1.95 1.95"}],["path",{d:"m22 2-1.5 1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xp=[["path",{d:"M17 10c.7-.7 1.69 0 2.5 0a2.5 2.5 0 1 0 0-5 .5.5 0 0 1-.5-.5 2.5 2.5 0 1 0-5 0c0 .81.7 1.8 0 2.5l-7 7c-.7.7-1.69 0-2.5 0a2.5 2.5 0 0 0 0 5c.28 0 .5.22.5.5a2.5 2.5 0 1 0 5 0c0-.81-.7-1.8 0-2.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Up=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m8 13 4-7 4 7"}],["path",{d:"M9.1 11h5.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yp=[["path",{d:"M12 13h.01"}],["path",{d:"M12 6v3"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kp=[["path",{d:"M12 6v7"}],["path",{d:"M16 8v3"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 8v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qp=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 9.5 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jp=[["path",{d:"M2 16V4a2 2 0 0 1 2-2h11"}],["path",{d:"M22 18H11a2 2 0 1 0 0 4h10.5a.5.5 0 0 0 .5-.5v-15a.5.5 0 0 0-.5-.5H11a2 2 0 0 0-2 2v12"}],["path",{d:"M5 14H4a2 2 0 1 0 0 4h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tu=[["path",{d:"M12 13V7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 10 3 3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yr=[["path",{d:"M12 17h1.5"}],["path",{d:"M12 22h1.5"}],["path",{d:"M12 2h1.5"}],["path",{d:"M17.5 22H19a1 1 0 0 0 1-1"}],["path",{d:"M17.5 2H19a1 1 0 0 1 1 1v1.5"}],["path",{d:"M20 14v3h-2.5"}],["path",{d:"M20 8.5V10"}],["path",{d:"M4 10V8.5"}],["path",{d:"M4 19.5V14"}],["path",{d:"M4 4.5A2.5 2.5 0 0 1 6.5 2H8"}],["path",{d:"M8 22H6.5a1 1 0 0 1 0-5H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eu=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 12v-2a4 4 0 0 1 8 0v2"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"9",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const au=[["path",{d:"M16 8.2A2.22 2.22 0 0 0 13.8 6c-.8 0-1.4.3-1.8.9-.4-.6-1-.9-1.8-.9A2.22 2.22 0 0 0 8 8.2c0 .6.3 1.2.7 1.6A226.652 226.652 0 0 0 12 13a404 404 0 0 0 3.3-3.1 2.413 2.413 0 0 0 .7-1.7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iu=[["path",{d:"m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["circle",{cx:"10",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ru=[["path",{d:"m19 3 1 1"}],["path",{d:"m20 2-4.5 4.5"}],["path",{d:"M20 7.898V21a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2h7.844"}],["circle",{cx:"14",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nu=[["path",{d:"M18 6V4a2 2 0 1 0-4 0v2"}],["path",{d:"M20 15v6a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H10"}],["rect",{x:"12",y:"6",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const su=[["path",{d:"M10 2v8l3-3 3 3V2"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ou=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hu=[["path",{d:"M12 7v14"}],["path",{d:"M16 12h2"}],["path",{d:"M16 8h2"}],["path",{d:"M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"}],["path",{d:"M6 12h2"}],["path",{d:"M6 8h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lu=[["path",{d:"M12 21V7"}],["path",{d:"m16 12 2 2 4-4"}],["path",{d:"M22 6V4a1 1 0 0 0-1-1h-5a4 4 0 0 0-4 4 4 4 0 0 0-4-4H3a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h6a3 3 0 0 1 3 3 3 3 0 0 1 3-3h6a1 1 0 0 0 1-1v-1.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const du=[["path",{d:"M12 7v14"}],["path",{d:"M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cu=[["path",{d:"M12 7v6"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pu=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M8 11h8"}],["path",{d:"M8 7h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uu=[["path",{d:"M10 13h4"}],["path",{d:"M12 6v7"}],["path",{d:"M16 8V6H8v2"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fu=[["path",{d:"M12 13V7"}],["path",{d:"M18 2h1a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2"}],["path",{d:"m9 10 3-3 3 3"}],["path",{d:"m9 5 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mu=[["path",{d:"M15 13a3 3 0 1 0-6 0"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["circle",{cx:"12",cy:"8",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mu=[["path",{d:"M12 13V7"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9 10 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vu=[["path",{d:"m14.5 7-5 5"}],["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}],["path",{d:"m9.5 7 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gu=[["path",{d:"M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yu=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2Z"}],["path",{d:"m9 10 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xu=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}],["line",{x1:"15",x2:"9",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wu=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}],["line",{x1:"12",x2:"12",y1:"7",y2:"13"}],["line",{x1:"15",x2:"9",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bu=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2Z"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eu=[["path",{d:"m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Su=[["path",{d:"M4 9V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"}],["path",{d:"M8 8v1"}],["path",{d:"M12 8v1"}],["path",{d:"M16 8v1"}],["rect",{width:"20",height:"12",x:"2",y:"9",rx:"2"}],["circle",{cx:"8",cy:"15",r:"2"}],["circle",{cx:"16",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cu=[["path",{d:"M13.67 8H18a2 2 0 0 1 2 2v4.33"}],["path",{d:"M2 14h2"}],["path",{d:"M20 14h2"}],["path",{d:"M22 22 2 2"}],["path",{d:"M8 8H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 1.414-.586"}],["path",{d:"M9 13v2"}],["path",{d:"M9.67 4H12v2.33"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Au=[["path",{d:"M12 8V4H8"}],["rect",{width:"16",height:"12",x:"4",y:"8",rx:"2"}],["path",{d:"M2 14h2"}],["path",{d:"M20 14h2"}],["path",{d:"M15 13v2"}],["path",{d:"M9 13v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tu=[["path",{d:"M12 6V2H8"}],["path",{d:"m8 18-4 4V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z"}],["path",{d:"M2 12h2"}],["path",{d:"M9 11v2"}],["path",{d:"M15 11v2"}],["path",{d:"M20 12h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _u=[["path",{d:"M10 3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a6 6 0 0 0 1.2 3.6l.6.8A6 6 0 0 1 17 13v8a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-8a6 6 0 0 1 1.2-3.6l.6-.8A6 6 0 0 0 10 5z"}],["path",{d:"M17 13h-4a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hu=[["path",{d:"M17 3h4v4"}],["path",{d:"M18.575 11.082a13 13 0 0 1 1.048 9.027 1.17 1.17 0 0 1-1.914.597L14 17"}],["path",{d:"M7 10 3.29 6.29a1.17 1.17 0 0 1 .6-1.91 13 13 0 0 1 9.03 1.05"}],["path",{d:"M7 14a1.7 1.7 0 0 0-1.207.5l-2.646 2.646A.5.5 0 0 0 3.5 18H5a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .854.354L9.5 18.207A1.7 1.7 0 0 0 10 17v-2a1 1 0 0 0-1-1z"}],["path",{d:"M9.707 14.293 21 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lu=[["path",{d:"M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"}],["path",{d:"m3.3 7 8.7 5 8.7-5"}],["path",{d:"M12 22V12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vu=[["path",{d:"M2.97 12.92A2 2 0 0 0 2 14.63v3.24a2 2 0 0 0 .97 1.71l3 1.8a2 2 0 0 0 2.06 0L12 19v-5.5l-5-3-4.03 2.42Z"}],["path",{d:"m7 16.5-4.74-2.85"}],["path",{d:"m7 16.5 5-3"}],["path",{d:"M7 16.5v5.17"}],["path",{d:"M12 13.5V19l3.97 2.38a2 2 0 0 0 2.06 0l3-1.8a2 2 0 0 0 .97-1.71v-3.24a2 2 0 0 0-.97-1.71L17 10.5l-5 3Z"}],["path",{d:"m17 16.5-5-3"}],["path",{d:"m17 16.5 4.74-2.85"}],["path",{d:"M17 16.5v5.17"}],["path",{d:"M7.97 4.42A2 2 0 0 0 7 6.13v4.37l5 3 5-3V6.13a2 2 0 0 0-.97-1.71l-3-1.8a2 2 0 0 0-2.06 0l-3 1.8Z"}],["path",{d:"M12 8 7.26 5.15"}],["path",{d:"m12 8 4.74-2.85"}],["path",{d:"M12 13.5V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xr=[["path",{d:"M8 3H7a2 2 0 0 0-2 2v5a2 2 0 0 1-2 2 2 2 0 0 1 2 2v5c0 1.1.9 2 2 2h1"}],["path",{d:"M16 21h1a2 2 0 0 0 2-2v-5c0-1.1.9-2 2-2a2 2 0 0 1-2-2V5a2 2 0 0 0-2-2h-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pu=[["path",{d:"M16 3h3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-3"}],["path",{d:"M8 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Du=[["path",{d:"M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"}],["path",{d:"M9 13a4.5 4.5 0 0 0 3-4"}],["path",{d:"M6.003 5.125A3 3 0 0 0 6.401 6.5"}],["path",{d:"M3.477 10.896a4 4 0 0 1 .585-.396"}],["path",{d:"M6 18a4 4 0 0 1-1.967-.516"}],["path",{d:"M12 13h4"}],["path",{d:"M12 18h6a2 2 0 0 1 2 2v1"}],["path",{d:"M12 8h8"}],["path",{d:"M16 8V5a2 2 0 0 1 2-2"}],["circle",{cx:"16",cy:"13",r:".5"}],["circle",{cx:"18",cy:"3",r:".5"}],["circle",{cx:"20",cy:"21",r:".5"}],["circle",{cx:"20",cy:"8",r:".5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ou=[["path",{d:"m10.852 14.772-.383.923"}],["path",{d:"m10.852 9.228-.383-.923"}],["path",{d:"m13.148 14.772.382.924"}],["path",{d:"m13.531 8.305-.383.923"}],["path",{d:"m14.772 10.852.923-.383"}],["path",{d:"m14.772 13.148.923.383"}],["path",{d:"M17.598 6.5A3 3 0 1 0 12 5a3 3 0 0 0-5.63-1.446 3 3 0 0 0-.368 1.571 4 4 0 0 0-2.525 5.771"}],["path",{d:"M17.998 5.125a4 4 0 0 1 2.525 5.771"}],["path",{d:"M19.505 10.294a4 4 0 0 1-1.5 7.706"}],["path",{d:"M4.032 17.483A4 4 0 0 0 11.464 20c.18-.311.892-.311 1.072 0a4 4 0 0 0 7.432-2.516"}],["path",{d:"M4.5 10.291A4 4 0 0 0 6 18"}],["path",{d:"M6.002 5.125a3 3 0 0 0 .4 1.375"}],["path",{d:"m9.228 10.852-.923-.383"}],["path",{d:"m9.228 13.148-.923.383"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ku=[["path",{d:"M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"}],["path",{d:"M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"}],["path",{d:"M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"}],["path",{d:"M17.599 6.5a3 3 0 0 0 .399-1.375"}],["path",{d:"M6.003 5.125A3 3 0 0 0 6.401 6.5"}],["path",{d:"M3.477 10.896a4 4 0 0 1 .585-.396"}],["path",{d:"M19.938 10.5a4 4 0 0 1 .585.396"}],["path",{d:"M6 18a4 4 0 0 1-1.967-.516"}],["path",{d:"M19.967 17.484A4 4 0 0 1 18 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iu=[["path",{d:"M16 3v2.107"}],["path",{d:"M17 9c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 22 17a5 5 0 0 1-10 0c0-.3 0-.6.1-.9a2 2 0 1 0 3.3-2C13 11.5 16 9 17 9"}],["path",{d:"M21 8.274V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.938"}],["path",{d:"M3 15h5.253"}],["path",{d:"M3 9h8.228"}],["path",{d:"M8 15v6"}],["path",{d:"M8 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nu=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 9v6"}],["path",{d:"M16 15v6"}],["path",{d:"M16 3v6"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["path",{d:"M8 15v6"}],["path",{d:"M8 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zu=[["path",{d:"M12 12h.01"}],["path",{d:"M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"}],["path",{d:"M22 13a18.15 18.15 0 0 1-20 0"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $u=[["path",{d:"M10 20v2"}],["path",{d:"M14 20v2"}],["path",{d:"M18 20v2"}],["path",{d:"M21 20H3"}],["path",{d:"M6 20v2"}],["path",{d:"M8 16V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v12"}],["rect",{x:"4",y:"6",width:"16",height:"10",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ru=[["path",{d:"M12 11v4"}],["path",{d:"M14 13h-4"}],["path",{d:"M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"}],["path",{d:"M18 6v14"}],["path",{d:"M6 6v14"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bu=[["path",{d:"M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fu=[["rect",{x:"8",y:"8",width:"8",height:"8",rx:"2"}],["path",{d:"M4 10a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2"}],["path",{d:"M14 20a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qu=[["path",{d:"m16 22-1-4"}],["path",{d:"M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1"}],["path",{d:"M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z"}],["path",{d:"m8 22 1-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wu=[["path",{d:"m11 10 3 3"}],["path",{d:"M6.5 21A3.5 3.5 0 1 0 3 17.5a2.62 2.62 0 0 1-.708 1.792A1 1 0 0 0 3 21z"}],["path",{d:"M9.969 17.031 21.378 5.624a1 1 0 0 0-3.002-3.002L6.967 14.031"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ju=[["path",{d:"M7.2 14.8a2 2 0 0 1 2 2"}],["circle",{cx:"18.5",cy:"8.5",r:"3.5"}],["circle",{cx:"7.5",cy:"16.5",r:"5.5"}],["circle",{cx:"7.5",cy:"4.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gu=[["path",{d:"M15 7.13V6a3 3 0 0 0-5.14-2.1L8 2"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M22 13h-4v-2a4 4 0 0 0-4-4h-1.3"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7.7 7.7A4 4 0 0 0 6 11v3a6 6 0 0 0 11.13 3.13"}],["path",{d:"M12 20v-8"}],["path",{d:"M6 13H2"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zu=[["path",{d:"M12.765 21.522a.5.5 0 0 1-.765-.424v-8.196a.5.5 0 0 1 .765-.424l5.878 3.674a1 1 0 0 1 0 1.696z"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M18 11a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v3a6.1 6.1 0 0 0 2 4.5"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}],["path",{d:"M6 13H2"}],["path",{d:"M6.53 9C4.6 8.8 3 7.1 3 5"}],["path",{d:"m8 2 1.88 1.88"}],["path",{d:"M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xu=[["path",{d:"m8 2 1.88 1.88"}],["path",{d:"M14.12 3.88 16 2"}],["path",{d:"M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"}],["path",{d:"M12 20c-3.3 0-6-2.7-6-6v-3a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v3c0 3.3-2.7 6-6 6"}],["path",{d:"M12 20v-9"}],["path",{d:"M6.53 9C4.6 8.8 3 7.1 3 5"}],["path",{d:"M6 13H2"}],["path",{d:"M3 21c0-2.1 1.7-3.9 3.8-4"}],["path",{d:"M20.97 5c0 2.1-1.6 3.8-3.5 4"}],["path",{d:"M22 13h-4"}],["path",{d:"M17.2 17c2.1.1 3.8 1.9 3.8 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uu=[["path",{d:"M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"}],["path",{d:"M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"}],["path",{d:"M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"}],["path",{d:"M10 6h4"}],["path",{d:"M10 10h4"}],["path",{d:"M10 14h4"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yu=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2",ry:"2"}],["path",{d:"M9 22v-4h6v4"}],["path",{d:"M8 6h.01"}],["path",{d:"M16 6h.01"}],["path",{d:"M12 6h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M16 10h.01"}],["path",{d:"M16 14h.01"}],["path",{d:"M8 10h.01"}],["path",{d:"M8 14h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ku=[["path",{d:"M4 6 2 7"}],["path",{d:"M10 6h4"}],["path",{d:"m22 7-2-1"}],["rect",{width:"16",height:"16",x:"4",y:"3",rx:"2"}],["path",{d:"M4 11h16"}],["path",{d:"M8 15h.01"}],["path",{d:"M16 15h.01"}],["path",{d:"M6 19v2"}],["path",{d:"M18 21v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qu=[["path",{d:"M8 6v6"}],["path",{d:"M15 6v6"}],["path",{d:"M2 12h19.6"}],["path",{d:"M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2l-1.4-5C20.1 6.8 19.1 6 18 6H4a2 2 0 0 0-2 2v10h3"}],["circle",{cx:"7",cy:"18",r:"2"}],["path",{d:"M9 18h5"}],["circle",{cx:"16",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ju=[["path",{d:"M10 3h.01"}],["path",{d:"M14 2h.01"}],["path",{d:"m2 9 20-5"}],["path",{d:"M12 12V6.5"}],["rect",{width:"16",height:"10",x:"4",y:"12",rx:"3"}],["path",{d:"M9 12v5"}],["path",{d:"M15 12v5"}],["path",{d:"M4 17h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t4=[["path",{d:"M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1"}],["path",{d:"M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9"}],["path",{d:"M21 21v-2h-4"}],["path",{d:"M3 5h4V3"}],["path",{d:"M7 5a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1V3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e4=[["circle",{cx:"9",cy:"7",r:"2"}],["path",{d:"M7.2 7.9 3 11v9c0 .6.4 1 1 1h16c.6 0 1-.4 1-1v-9c0-2-3-6-7-8l-3.6 2.6"}],["path",{d:"M16 13H3"}],["path",{d:"M16 17H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a4=[["path",{d:"M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"}],["path",{d:"M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1"}],["path",{d:"M2 21h20"}],["path",{d:"M7 8v3"}],["path",{d:"M12 8v3"}],["path",{d:"M17 8v3"}],["path",{d:"M7 4h.01"}],["path",{d:"M12 4h.01"}],["path",{d:"M17 4h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i4=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["line",{x1:"8",x2:"16",y1:"6",y2:"6"}],["line",{x1:"16",x2:"16",y1:"14",y2:"18"}],["path",{d:"M16 10h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M8 10h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M8 14h.01"}],["path",{d:"M12 18h.01"}],["path",{d:"M8 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r4=[["path",{d:"M11 14h1v4"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n4=[["path",{d:"m14 18 4 4 4-4"}],["path",{d:"M16 2v4"}],["path",{d:"M18 14v8"}],["path",{d:"M21 11.354V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.343"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s4=[["path",{d:"m14 18 4-4 4 4"}],["path",{d:"M16 2v4"}],["path",{d:"M18 22v-8"}],["path",{d:"M21 11.343V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h9"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"}],["path",{d:"M3 10h18"}],["path",{d:"m16 20 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"m9 16 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l4=[["path",{d:"M16 14v2.2l1.6 1"}],["path",{d:"M16 2v4"}],["path",{d:"M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"}],["path",{d:"M3 10h5"}],["path",{d:"M8 2v4"}],["circle",{cx:"16",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d4=[["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m15.228 19.148-.923.383"}],["path",{d:"M16 2v4"}],["path",{d:"m16.47 14.305.382.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["path",{d:"M21 11V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M8 14h.01"}],["path",{d:"M12 14h.01"}],["path",{d:"M16 14h.01"}],["path",{d:"M8 18h.01"}],["path",{d:"M12 18h.01"}],["path",{d:"M16 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M10 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z"}],["path",{d:"M3 10h18"}],["path",{d:"M15 22v-4a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f4=[["path",{d:"M3 10h18V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7"}],["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21.29 14.7a2.43 2.43 0 0 0-2.65-.52c-.3.12-.57.3-.8.53l-.34.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L17.5 22l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M4=[["path",{d:"M16 19h6"}],["path",{d:"M16 2v4"}],["path",{d:"M21 15V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8.5"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m4=[["path",{d:"M4.2 4.2A2 2 0 0 0 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 1.82-1.18"}],["path",{d:"M21 15.5V6a2 2 0 0 0-2-2H9.5"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h7"}],["path",{d:"M21 10h-5.5"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"M10 16h4"}],["path",{d:"M12 14v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g4=[["path",{d:"M16 19h6"}],["path",{d:"M16 2v4"}],["path",{d:"M19 16v6"}],["path",{d:"M21 12.598V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8.5"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y4=[["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M16 2v4"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["path",{d:"M17 14h-6"}],["path",{d:"M13 18H7"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x4=[["path",{d:"M16 2v4"}],["path",{d:"M21 11.75V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.25"}],["path",{d:"m22 22-1.875-1.875"}],["path",{d:"M3 10h18"}],["path",{d:"M8 2v4"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w4=[["path",{d:"M11 10v4h4"}],["path",{d:"m11 14 1.535-1.605a5 5 0 0 1 8 1.5"}],["path",{d:"M16 2v4"}],["path",{d:"m21 18-1.535 1.605a5 5 0 0 1-8-1.5"}],["path",{d:"M21 22v-4h-4"}],["path",{d:"M21 8.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h4.3"}],["path",{d:"M3 10h4"}],["path",{d:"M8 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"}],["path",{d:"M3 10h18"}],["path",{d:"m17 22 5-5"}],["path",{d:"m17 17 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}],["path",{d:"m14 14-4 4"}],["path",{d:"m10 14 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S4=[["path",{d:"M8 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"18",height:"18",x:"3",y:"4",rx:"2"}],["path",{d:"M3 10h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C4=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16"}],["path",{d:"M9.5 4h5L17 7h3a2 2 0 0 1 2 2v7.5"}],["path",{d:"M14.121 15.121A3 3 0 1 1 9.88 10.88"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A4=[["path",{d:"M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"}],["circle",{cx:"12",cy:"13",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T4=[["path",{d:"M5.7 21a2 2 0 0 1-3.5-2l8.6-14a6 6 0 0 1 10.4 6 2 2 0 1 1-3.464-2 2 2 0 1 0-3.464-2Z"}],["path",{d:"M17.75 7 15 2.1"}],["path",{d:"M10.9 4.8 13 9"}],["path",{d:"m7.9 9.7 2 4.4"}],["path",{d:"M4.9 14.7 7 18.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _4=[["path",{d:"M10 10v7.9"}],["path",{d:"M11.802 6.145a5 5 0 0 1 6.053 6.053"}],["path",{d:"M14 6.1v2.243"}],["path",{d:"m15.5 15.571-.964.964a5 5 0 0 1-7.071 0 5 5 0 0 1 0-7.07l.964-.965"}],["path",{d:"M16 7V3a1 1 0 0 1 1.707-.707 2.5 2.5 0 0 0 2.152.717 1 1 0 0 1 1.131 1.131 2.5 2.5 0 0 0 .717 2.152A1 1 0 0 1 21 8h-4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8 17v4a1 1 0 0 1-1.707.707 2.5 2.5 0 0 0-2.152-.717 1 1 0 0 1-1.131-1.131 2.5 2.5 0 0 0-.717-2.152A1 1 0 0 1 3 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H4=[["path",{d:"M10 7v10.9"}],["path",{d:"M14 6.1V17"}],["path",{d:"M16 7V3a1 1 0 0 1 1.707-.707 2.5 2.5 0 0 0 2.152.717 1 1 0 0 1 1.131 1.131 2.5 2.5 0 0 0 .717 2.152A1 1 0 0 1 21 8h-4"}],["path",{d:"M16.536 7.465a5 5 0 0 0-7.072 0l-2 2a5 5 0 0 0 0 7.07 5 5 0 0 0 7.072 0l2-2a5 5 0 0 0 0-7.07"}],["path",{d:"M8 17v4a1 1 0 0 1-1.707.707 2.5 2.5 0 0 0-2.152-.717 1 1 0 0 1-1.131-1.131 2.5 2.5 0 0 0-.717-2.152A1 1 0 0 1 3 16h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L4=[["path",{d:"M12 22v-4"}],["path",{d:"M7 12c-1.5 0-4.5 1.5-5 3 3.5 1.5 6 1 6 1-1.5 1.5-2 3.5-2 5 2.5 0 4.5-1.5 6-3 1.5 1.5 3.5 3 6 3 0-1.5-.5-3.5-2-5 0 0 2.5.5 6-1-.5-1.5-3.5-3-5-3 1.5-1 4-4 4-6-2.5 0-5.5 1.5-7 3 0-2.5-.5-5-2-7-1.5 2-2 4.5-2 7-1.5-1.5-4.5-3-7-3 0 2 2.5 5 4 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V4=[["path",{d:"M10.5 5H19a2 2 0 0 1 2 2v8.5"}],["path",{d:"M17 11h-.5"}],["path",{d:"M19 19H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7 11h4"}],["path",{d:"M7 15h2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wr=[["rect",{width:"18",height:"14",x:"3",y:"5",rx:"2",ry:"2"}],["path",{d:"M7 15h4M15 15h2M7 11h2M13 11h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P4=[["path",{d:"m21 8-2 2-1.5-3.7A2 2 0 0 0 15.646 5H8.4a2 2 0 0 0-1.903 1.257L5 10 3 8"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 14h.01"}],["rect",{width:"18",height:"8",x:"3",y:"10",rx:"2"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D4=[["path",{d:"M10 2h4"}],["path",{d:"m21 8-2 2-1.5-3.7A2 2 0 0 0 15.646 5H8.4a2 2 0 0 0-1.903 1.257L5 10 3 8"}],["path",{d:"M7 14h.01"}],["path",{d:"M17 14h.01"}],["rect",{width:"18",height:"8",x:"3",y:"10",rx:"2"}],["path",{d:"M5 18v2"}],["path",{d:"M19 18v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O4=[["path",{d:"M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"}],["circle",{cx:"7",cy:"17",r:"2"}],["path",{d:"M9 17h6"}],["circle",{cx:"17",cy:"17",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k4=[["path",{d:"M18 19V9a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v8a2 2 0 0 0 2 2h2"}],["path",{d:"M2 9h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2"}],["path",{d:"M22 17v1a1 1 0 0 1-1 1H10v-9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v9"}],["circle",{cx:"8",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I4=[["path",{d:"M12 14v4"}],["path",{d:"M14.172 2a2 2 0 0 1 1.414.586l3.828 3.828A2 2 0 0 1 20 7.828V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"}],["path",{d:"M8 14h8"}],["rect",{x:"8",y:"10",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N4=[["path",{d:"M2.27 21.7s9.87-3.5 12.73-6.36a4.5 4.5 0 0 0-6.36-6.37C5.77 11.84 2.27 21.7 2.27 21.7zM8.64 14l-2.05-2.04M15.34 15l-2.46-2.46"}],["path",{d:"M22 9s-1.33-2-3.5-2C16.86 7 15 9 15 9s1.33 2 3.5 2S22 9 22 9z"}],["path",{d:"M15 2s-2 1.33-2 3.5S15 9 15 9s2-1.84 2-3.5C17 3.33 15 2 15 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z4=[["circle",{cx:"7",cy:"12",r:"3"}],["path",{d:"M10 9v6"}],["circle",{cx:"17",cy:"12",r:"3"}],["path",{d:"M14 7v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $4=[["path",{d:"m3 15 4-8 4 8"}],["path",{d:"M4 13h6"}],["circle",{cx:"18",cy:"12",r:"3"}],["path",{d:"M21 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R4=[["path",{d:"m3 15 4-8 4 8"}],["path",{d:"M4 13h6"}],["path",{d:"M15 11h4.5a2 2 0 0 1 0 4H15V7h4a2 2 0 0 1 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B4=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["circle",{cx:"8",cy:"10",r:"2"}],["path",{d:"M8 12h8"}],["circle",{cx:"16",cy:"10",r:"2"}],["path",{d:"m6 20 .7-2.9A1.4 1.4 0 0 1 8.1 16h7.8a1.4 1.4 0 0 1 1.4 1l.7 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F4=[["path",{d:"M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"}],["path",{d:"M2 12a9 9 0 0 1 8 8"}],["path",{d:"M2 16a5 5 0 0 1 4 4"}],["line",{x1:"2",x2:"2.01",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q4=[["path",{d:"M22 20v-9H2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2Z"}],["path",{d:"M18 11V4H6v7"}],["path",{d:"M15 22v-4a3 3 0 0 0-3-3a3 3 0 0 0-3 3v4"}],["path",{d:"M22 11V9"}],["path",{d:"M2 11V9"}],["path",{d:"M6 4V2"}],["path",{d:"M18 4V2"}],["path",{d:"M10 4V2"}],["path",{d:"M14 4V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W4=[["path",{d:"M12 5c.67 0 1.35.09 2 .26 1.78-2 5.03-2.84 6.42-2.26 1.4.58-.42 7-.42 7 .57 1.07 1 2.24 1 3.44C21 17.9 16.97 21 12 21s-9-3-9-7.56c0-1.25.5-2.4 1-3.44 0 0-1.89-6.42-.5-7 1.39-.58 4.72.23 6.5 2.23A9.04 9.04 0 0 1 12 5Z"}],["path",{d:"M8 14v.5"}],["path",{d:"M16 14v.5"}],["path",{d:"M11.25 16.25h1.5L12 17l-.75-.75Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const br=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11.207a.5.5 0 0 1 .146-.353l2-2a.5.5 0 0 1 .708 0l3.292 3.292a.5.5 0 0 0 .708 0l4.292-4.292a.5.5 0 0 1 .854.353V16a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j4=[["path",{d:"M16.75 12h3.632a1 1 0 0 1 .894 1.447l-2.034 4.069a1 1 0 0 1-1.708.134l-2.124-2.97"}],["path",{d:"M17.106 9.053a1 1 0 0 1 .447 1.341l-3.106 6.211a1 1 0 0 1-1.342.447L3.61 12.3a2.92 2.92 0 0 1-1.3-3.91L3.69 5.6a2.92 2.92 0 0 1 3.92-1.3z"}],["path",{d:"M2 19h3.76a2 2 0 0 0 1.8-1.1L9 15"}],["path",{d:"M2 21v-4"}],["path",{d:"M7 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Er=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"7",y:"13",width:"9",height:"4",rx:"1"}],["rect",{x:"7",y:"5",width:"12",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G4=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11h8"}],["path",{d:"M7 16h3"}],["path",{d:"M7 6h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z4=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 11h8"}],["path",{d:"M7 16h12"}],["path",{d:"M7 6h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X4=[["path",{d:"M11 13v4"}],["path",{d:"M15 5v4"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"7",y:"13",width:"9",height:"4",rx:"1"}],["rect",{x:"7",y:"5",width:"12",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 16h8"}],["path",{d:"M7 11h12"}],["path",{d:"M7 6h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cr=[["path",{d:"M9 5v4"}],["rect",{width:"4",height:"6",x:"7",y:"9",rx:"1"}],["path",{d:"M9 15v2"}],["path",{d:"M17 3v2"}],["rect",{width:"4",height:"8",x:"15",y:"5",rx:"1"}],["path",{d:"M17 13v3"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ar=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"15",y:"5",width:"4",height:"12",rx:"1"}],["rect",{x:"7",y:"8",width:"4",height:"9",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U4=[["path",{d:"M13 17V9"}],["path",{d:"M18 17v-3"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 17V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tr=[["path",{d:"M13 17V9"}],["path",{d:"M18 17V5"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 17v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y4=[["path",{d:"M11 13H7"}],["path",{d:"M19 9h-4"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["rect",{x:"15",y:"5",width:"4",height:"12",rx:"1"}],["rect",{x:"7",y:"8",width:"4",height:"9",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _r=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M18 17V9"}],["path",{d:"M13 17V5"}],["path",{d:"M8 17v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K4=[["path",{d:"M10 6h8"}],["path",{d:"M12 16h6"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M8 11h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hr=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"m19 9-5 5-4-4-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q4=[["path",{d:"M12 20V10"}],["path",{d:"M18 20v-4"}],["path",{d:"M6 20V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lr=[["line",{x1:"12",x2:"12",y1:"20",y2:"10"}],["line",{x1:"18",x2:"18",y1:"20",y2:"4"}],["line",{x1:"6",x2:"6",y1:"20",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J4=[["path",{d:"m13.11 7.664 1.78 2.672"}],["path",{d:"m14.162 12.788-3.324 1.424"}],["path",{d:"m20 4-6.06 1.515"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["circle",{cx:"12",cy:"6",r:"2"}],["circle",{cx:"16",cy:"12",r:"2"}],["circle",{cx:"9",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vr=[["line",{x1:"18",x2:"18",y1:"20",y2:"10"}],["line",{x1:"12",x2:"12",y1:"20",y2:"4"}],["line",{x1:"6",x2:"6",y1:"20",y2:"14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tf=[["path",{d:"M12 16v5"}],["path",{d:"M16 14v7"}],["path",{d:"M20 10v11"}],["path",{d:"m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"}],["path",{d:"M4 18v3"}],["path",{d:"M8 14v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pr=[["path",{d:"M8 6h10"}],["path",{d:"M6 12h9"}],["path",{d:"M11 18h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dr=[["path",{d:"M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"}],["path",{d:"M21.21 15.89A10 10 0 1 1 8 2.83"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Or=[["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}],["circle",{cx:"18.5",cy:"5.5",r:".5",fill:"currentColor"}],["circle",{cx:"11.5",cy:"11.5",r:".5",fill:"currentColor"}],["circle",{cx:"7.5",cy:"16.5",r:".5",fill:"currentColor"}],["circle",{cx:"17.5",cy:"14.5",r:".5",fill:"currentColor"}],["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ef=[["path",{d:"M3 3v16a2 2 0 0 0 2 2h16"}],["path",{d:"M7 16c.5-2 1.5-7 4-7 2 0 2 3 4 3 2.5 0 4.5-5 5-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const af=[["path",{d:"M18 6 7 17l-5-5"}],["path",{d:"m22 10-7.5 7.5L13 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rf=[["path",{d:"M20 4L9 15"}],["path",{d:"M21 19L3 19"}],["path",{d:"M9 15L4 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nf=[["path",{d:"M20 6 9 17l-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sf=[["path",{d:"M2 17a5 5 0 0 0 10 0c0-2.76-2.5-5-5-3-2.5-2-5 .24-5 3Z"}],["path",{d:"M12 17a5 5 0 0 0 10 0c0-2.76-2.5-5-5-3-2.5-2-5 .24-5 3Z"}],["path",{d:"M7 14c3.22-2.91 4.29-8.75 5-12 1.66 2.38 4.94 9 5 12"}],["path",{d:"M22 9c-4.29 0-7.14-2.33-10-7 5.71 0 10 4.67 10 7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const of=[["path",{d:"M17 21a1 1 0 0 0 1-1v-5.35c0-.457.316-.844.727-1.041a4 4 0 0 0-2.134-7.589 5 5 0 0 0-9.186 0 4 4 0 0 0-2.134 7.588c.411.198.727.585.727 1.041V20a1 1 0 0 0 1 1Z"}],["path",{d:"M6 17h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hf=[["path",{d:"m6 9 6 6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lf=[["path",{d:"m17 18-6-6 6-6"}],["path",{d:"M7 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const df=[["path",{d:"m15 18-6-6 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cf=[["path",{d:"m7 18 6-6-6-6"}],["path",{d:"M17 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pf=[["path",{d:"m9 18 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uf=[["path",{d:"m18 15-6-6-6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ff=[["path",{d:"m7 20 5-5 5 5"}],["path",{d:"m7 4 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mf=[["path",{d:"m7 6 5 5 5-5"}],["path",{d:"m7 13 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mf=[["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"m17 7 5 5-5 5"}],["path",{d:"m7 7-5 5 5 5"}],["path",{d:"M8 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vf=[["path",{d:"m9 7-5 5 5 5"}],["path",{d:"m15 7 5 5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gf=[["path",{d:"m11 17-5-5 5-5"}],["path",{d:"m18 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yf=[["path",{d:"m20 17-5-5 5-5"}],["path",{d:"m4 17 5-5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xf=[["path",{d:"m6 17 5-5-5-5"}],["path",{d:"m13 17 5-5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wf=[["path",{d:"m7 15 5 5 5-5"}],["path",{d:"m7 9 5-5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bf=[["path",{d:"m17 11-5-5-5 5"}],["path",{d:"m17 18-5-5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ef=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"4"}],["line",{x1:"21.17",x2:"12",y1:"8",y2:"8"}],["line",{x1:"3.95",x2:"8.54",y1:"6.06",y2:"14"}],["line",{x1:"10.88",x2:"15.46",y1:"21.94",y2:"14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sf=[["path",{d:"M10 9h4"}],["path",{d:"M12 7v5"}],["path",{d:"M14 22v-4a2 2 0 0 0-4 0v4"}],["path",{d:"M18 22V5.618a1 1 0 0 0-.553-.894l-4.553-2.277a2 2 0 0 0-1.788 0L6.553 4.724A1 1 0 0 0 6 5.618V22"}],["path",{d:"m18 7 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.618a1 1 0 0 1 .553-.894L6 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cf=[["path",{d:"M12 12H3a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h13"}],["path",{d:"M18 8c0-2.5-2-2.5-2-5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M21 12a1 1 0 0 1 1 1v2a1 1 0 0 1-.5.866"}],["path",{d:"M22 8c0-2.5-2-2.5-2-5"}],["path",{d:"M7 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Af=[["path",{d:"M17 12H3a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14"}],["path",{d:"M18 8c0-2.5-2-2.5-2-5"}],["path",{d:"M21 16a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"}],["path",{d:"M22 8c0-2.5-2-2.5-2-5"}],["path",{d:"M7 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 8v8"}],["path",{d:"m8 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ir=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"12",x2:"12",y1:"8",y2:"12"}],["line",{x1:"12",x2:"12.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m12 8-4 4 4 4"}],["path",{d:"M16 12H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zr=[["path",{d:"M2 12a10 10 0 1 1 10 10"}],["path",{d:"m2 22 10-10"}],["path",{d:"M8 22H2v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $r=[["path",{d:"M2 8V2h6"}],["path",{d:"m2 2 10 10"}],["path",{d:"M12 2A10 10 0 1 1 2 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rr=[["path",{d:"M22 12A10 10 0 1 1 12 2"}],["path",{d:"M22 2 12 12"}],["path",{d:"M16 2h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Br=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m12 16 4-4-4-4"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fr=[["path",{d:"M12 22a10 10 0 1 1 10-10"}],["path",{d:"M22 22 12 12"}],["path",{d:"M22 16v6h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wr=[["path",{d:"M21.801 10A10 10 0 1 1 17 3.335"}],["path",{d:"m9 11 3 3L22 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m16 10-4 4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m14 16-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m10 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ur=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m8 14 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tf=[["path",{d:"M10.1 2.182a10 10 0 0 1 3.8 0"}],["path",{d:"M13.9 21.818a10 10 0 0 1-3.8 0"}],["path",{d:"M17.609 3.721a10 10 0 0 1 2.69 2.7"}],["path",{d:"M2.182 13.9a10 10 0 0 1 0-3.8"}],["path",{d:"M20.279 17.609a10 10 0 0 1-2.7 2.69"}],["path",{d:"M21.818 10.1a10 10 0 0 1 0 3.8"}],["path",{d:"M3.721 6.391a10 10 0 0 1 2.7-2.69"}],["path",{d:"M6.391 20.279a10 10 0 0 1-2.69-2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yr=[["line",{x1:"8",x2:"16",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"16",y2:"16"}],["line",{x1:"12",x2:"12",y1:"8",y2:"8"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _f=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hf=[["path",{d:"M10.1 2.18a9.93 9.93 0 0 1 3.8 0"}],["path",{d:"M17.6 3.71a9.95 9.95 0 0 1 2.69 2.7"}],["path",{d:"M21.82 10.1a9.93 9.93 0 0 1 0 3.8"}],["path",{d:"M20.29 17.6a9.95 9.95 0 0 1-2.7 2.69"}],["path",{d:"M13.9 21.82a9.94 9.94 0 0 1-3.8 0"}],["path",{d:"M6.4 20.29a9.95 9.95 0 0 1-2.69-2.7"}],["path",{d:"M2.18 13.9a9.93 9.93 0 0 1 0-3.8"}],["path",{d:"M3.71 6.4a9.95 9.95 0 0 1 2.7-2.69"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lf=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vf=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M17 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M7 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pf=[["path",{d:"M7 10h10"}],["path",{d:"M7 14h10"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Df=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Of=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"M12 8v8"}],["path",{d:"M16 12H8"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kr=[["path",{d:"M15.6 2.7a10 10 0 1 0 5.7 5.7"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M13.4 10.6 19 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kf=[["path",{d:"m2 2 20 20"}],["path",{d:"M8.35 2.69A10 10 0 0 1 21.3 15.65"}],["path",{d:"M19.08 19.08A10 10 0 1 1 4.92 4.92"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jr=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m5 5 14 14"}],["path",{d:"M13 13a3 3 0 1 0 0-6H9v2"}],["path",{d:"M9 17v-2.34"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tn=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9 17V7h4a3 3 0 0 1 0 6H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const en=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const an=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"10",x2:"10",y1:"15",y2:"9"}],["line",{x1:"14",x2:"14",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rn=[["circle",{cx:"12",cy:"12",r:"10"}],["polygon",{points:"10 8 16 12 10 16 10 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nn=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const If=[["path",{d:"M10 16V9.5a1 1 0 0 1 5 0"}],["path",{d:"M8 12h4"}],["path",{d:"M8 16h7"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y2=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sn=[["path",{d:"M12 7v4"}],["path",{d:"M7.998 9.003a5 5 0 1 0 8-.005"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const on=[["path",{d:"M22 2 2 22"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nf=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"9",x2:"15",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zf=[["circle",{cx:"12",cy:"12",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hn=[["circle",{cx:"12",cy:"12",r:"10"}],["rect",{x:"9",y:"9",width:"6",height:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ln=[["path",{d:"M18 20a6 6 0 0 0-12 0"}],["circle",{cx:"12",cy:"10",r:"4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dn=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $f=[["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cn=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rf=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M11 9h4a2 2 0 0 0 2-2V3"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"M7 21v-4a2 2 0 0 1 2-2h4"}],["circle",{cx:"15",cy:"15",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bf=[["path",{d:"M21.66 17.67a1.08 1.08 0 0 1-.04 1.6A12 12 0 0 1 4.73 2.38a1.1 1.1 0 0 1 1.61-.04z"}],["path",{d:"M19.65 15.66A8 8 0 0 1 8.35 4.34"}],["path",{d:"m14 10-5.5 5.5"}],["path",{d:"M14 17.85V10H6.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ff=[["path",{d:"M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"}],["path",{d:"m6.2 5.3 3.1 3.9"}],["path",{d:"m12.4 3.4 3.1 4"}],["path",{d:"M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v4"}],["path",{d:"M21 14H11"}],["path",{d:"m15 10-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"m9 14 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M12 11h4"}],["path",{d:"M12 16h4"}],["path",{d:"M8 11h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 14h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zf=[["path",{d:"M11 14h10"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v1.344"}],["path",{d:"m17 18 4-4-4-4"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 1.793-1.113"}],["rect",{x:"8",y:"2",width:"8",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pn=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1"}],["path",{d:"M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5"}],["path",{d:"M16 4h2a2 2 0 0 1 1.73 1"}],["path",{d:"M8 18h1"}],["path",{d:"M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 14h6"}],["path",{d:"M12 17v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const un=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5.5"}],["path",{d:"M4 13.5V6a2 2 0 0 1 2-2h2"}],["path",{d:"M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"M9 12v-1h6v1"}],["path",{d:"M11 17h2"}],["path",{d:"M12 11v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}],["path",{d:"m15 11-6 6"}],["path",{d:"m9 11 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kf=[["rect",{width:"8",height:"4",x:"8",y:"2",rx:"1",ry:"1"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qf=[["path",{d:"M12 6v6l2-4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jf=[["path",{d:"M12 6v6l-4-2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t5=[["path",{d:"M12 6v6l-2-4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e5=[["path",{d:"M12 6v6"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a5=[["path",{d:"M12 6v6l4-2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i5=[["path",{d:"M12 6v6l4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r5=[["path",{d:"M12 6v6h4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n5=[["path",{d:"M12 6v6l2 4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s5=[["path",{d:"M12 6v10"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o5=[["path",{d:"M12 6v6l-2 4"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h5=[["path",{d:"M12 6v6H8"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l5=[["path",{d:"M12 6v6l-4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d5=[["path",{d:"M12 6v6l4 2"}],["path",{d:"M20 12v5"}],["path",{d:"M20 21h.01"}],["path",{d:"M21.25 8.2A10 10 0 1 0 16 21.16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c5=[["path",{d:"M12 6v6l2 1"}],["path",{d:"M12.337 21.994a10 10 0 1 1 9.588-8.767"}],["path",{d:"m14 18 4 4 4-4"}],["path",{d:"M18 14v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p5=[["path",{d:"M12 6v6l1.56.78"}],["path",{d:"M13.227 21.925a10 10 0 1 1 8.767-9.588"}],["path",{d:"m14 18 4-4 4 4"}],["path",{d:"M18 22v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u5=[["path",{d:"M12 2a10 10 0 0 1 7.38 16.75"}],["path",{d:"M12 6v6l4 2"}],["path",{d:"M2.5 8.875a10 10 0 0 0-.5 3"}],["path",{d:"M2.83 16a10 10 0 0 0 2.43 3.4"}],["path",{d:"M4.636 5.235a10 10 0 0 1 .891-.857"}],["path",{d:"M8.644 21.42a10 10 0 0 0 7.631-.38"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f5=[["path",{d:"M12 6v6l3.644 1.822"}],["path",{d:"M16 19h6"}],["path",{d:"M19 16v6"}],["path",{d:"M21.92 13.267a10 10 0 1 0-8.653 8.653"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M5=[["path",{d:"M12 6v6l4 2"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m5=[["path",{d:"M12 12v4"}],["path",{d:"M12 20h.01"}],["path",{d:"M17 18h.5a1 1 0 0 0 0-9h-1.79A7 7 0 1 0 7 17.708"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v5=[["path",{d:"m17 15-5.5 5.5L9 18"}],["path",{d:"M5 17.743A7 7 0 1 1 15.71 10h1.79a4.5 4.5 0 0 1 1.5 8.742"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g5=[["path",{d:"m10.852 19.772-.383.924"}],["path",{d:"m13.148 14.228.383-.923"}],["path",{d:"M13.148 19.772a3 3 0 1 0-2.296-5.544l-.383-.923"}],["path",{d:"m13.53 20.696-.382-.924a3 3 0 1 1-2.296-5.544"}],["path",{d:"m14.772 15.852.923-.383"}],["path",{d:"m14.772 18.148.923.383"}],["path",{d:"M4.2 15.1a7 7 0 1 1 9.93-9.858A7 7 0 0 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.2"}],["path",{d:"m9.228 15.852-.923-.383"}],["path",{d:"m9.228 18.148-.923.383"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fn=[["path",{d:"M12 13v8l-4-4"}],["path",{d:"m12 21 4-4"}],["path",{d:"M4.393 15.269A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.436 8.284"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M8 19v1"}],["path",{d:"M8 14v1"}],["path",{d:"M16 19v1"}],["path",{d:"M16 14v1"}],["path",{d:"M12 21v1"}],["path",{d:"M12 16v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 17H7"}],["path",{d:"M17 21H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 14v2"}],["path",{d:"M8 14v2"}],["path",{d:"M16 20h.01"}],["path",{d:"M8 20h.01"}],["path",{d:"M12 16v2"}],["path",{d:"M12 22h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b5=[["path",{d:"M6 16.326A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 .5 8.973"}],["path",{d:"m13 12-3 5h4l-3 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E5=[["path",{d:"M10.188 8.5A6 6 0 0 1 16 4a1 1 0 0 0 6 6 6 6 0 0 1-3 5.197"}],["path",{d:"M11 20v2"}],["path",{d:"M3 20a5 5 0 1 1 8.9-4H13a3 3 0 0 1 2 5.24"}],["path",{d:"M7 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S5=[["path",{d:"m2 2 20 20"}],["path",{d:"M5.782 5.782A7 7 0 0 0 9 19h8.5a4.5 4.5 0 0 0 1.307-.193"}],["path",{d:"M21.532 16.5A4.5 4.5 0 0 0 17.5 10h-1.79A7.008 7.008 0 0 0 10 5.07"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C5=[["path",{d:"M10.188 8.5A6 6 0 0 1 16 4a1 1 0 0 0 6 6 6 6 0 0 1-3 5.197"}],["path",{d:"M13 16a3 3 0 1 1 0 6H7a5 5 0 1 1 4.9-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"m9.2 22 3-7"}],["path",{d:"m9 13-3 7"}],["path",{d:"m17 13-3 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M16 14v6"}],["path",{d:"M8 14v6"}],["path",{d:"M12 16v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _5=[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"M8 15h.01"}],["path",{d:"M8 19h.01"}],["path",{d:"M12 17h.01"}],["path",{d:"M12 21h.01"}],["path",{d:"M16 15h.01"}],["path",{d:"M16 19h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H5=[["path",{d:"M12 2v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"M20 12h2"}],["path",{d:"m19.07 4.93-1.41 1.41"}],["path",{d:"M15.947 12.65a4 4 0 0 0-5.925-4.128"}],["path",{d:"M3 20a5 5 0 1 1 8.9-4H13a3 3 0 0 1 2 5.24"}],["path",{d:"M11 20v2"}],["path",{d:"M7 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L5=[["path",{d:"M12 2v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"M20 12h2"}],["path",{d:"m19.07 4.93-1.41 1.41"}],["path",{d:"M15.947 12.65a4 4 0 0 0-5.925-4.128"}],["path",{d:"M13 22H7a5 5 0 1 1 4.9-6H13a3 3 0 0 1 0 6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mn=[["path",{d:"M12 13v8"}],["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"}],["path",{d:"m8 17 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V5=[["path",{d:"M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P5=[["path",{d:"M17.5 21H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"}],["path",{d:"M22 10a3 3 0 0 0-3-3h-2.207a5.502 5.502 0 0 0-10.702.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D5=[["path",{d:"M16.17 7.83 2 22"}],["path",{d:"M4.02 12a2.827 2.827 0 1 1 3.81-4.17A2.827 2.827 0 1 1 12 4.02a2.827 2.827 0 1 1 4.17 3.81A2.827 2.827 0 1 1 19.98 12a2.827 2.827 0 1 1-3.81 4.17A2.827 2.827 0 1 1 12 19.98a2.827 2.827 0 1 1-4.17-3.81A1 1 0 1 1 4 12"}],["path",{d:"m7.83 7.83 8.34 8.34"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O5=[["path",{d:"M17.28 9.05a5.5 5.5 0 1 0-10.56 0A5.5 5.5 0 1 0 12 17.66a5.5 5.5 0 1 0 5.28-8.6Z"}],["path",{d:"M12 17.66L12 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mn=[["path",{d:"m18 16 4-4-4-4"}],["path",{d:"m6 8-4 4 4 4"}],["path",{d:"m14.5 4-5 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k5=[["path",{d:"m16 18 6-6-6-6"}],["path",{d:"m8 6-6 6 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I5=[["polygon",{points:"12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"}],["line",{x1:"12",x2:"12",y1:"22",y2:"15.5"}],["polyline",{points:"22 8.5 12 15.5 2 8.5"}],["polyline",{points:"2 15.5 12 8.5 22 15.5"}],["line",{x1:"12",x2:"12",y1:"2",y2:"8.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N5=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}],["polyline",{points:"7.5 4.21 12 6.81 16.5 4.21"}],["polyline",{points:"7.5 19.79 7.5 14.6 3 12"}],["polyline",{points:"21 12 16.5 14.6 16.5 19.79"}],["polyline",{points:"3.27 6.96 12 12.01 20.73 6.96"}],["line",{x1:"12",x2:"12",y1:"22.08",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z5=[["path",{d:"M10 2v2"}],["path",{d:"M14 2v2"}],["path",{d:"M16 8a1 1 0 0 1 1 1v8a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V9a1 1 0 0 1 1-1h14a4 4 0 1 1 0 8h-1"}],["path",{d:"M6 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $5=[["path",{d:"M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"}],["path",{d:"M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"}],["path",{d:"M12 2v2"}],["path",{d:"M12 22v-2"}],["path",{d:"m17 20.66-1-1.73"}],["path",{d:"M11 10.27 7 3.34"}],["path",{d:"m20.66 17-1.73-1"}],["path",{d:"m3.34 7 1.73 1"}],["path",{d:"M14 12h8"}],["path",{d:"M2 12h2"}],["path",{d:"m20.66 7-1.73 1"}],["path",{d:"m3.34 17 1.73-1"}],["path",{d:"m17 3.34-1 1.73"}],["path",{d:"m11 13.73-4 6.93"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R5=[["circle",{cx:"8",cy:"8",r:"6"}],["path",{d:"M18.09 10.37A6 6 0 1 1 10.34 18"}],["path",{d:"M7 6h1v4"}],["path",{d:"m16.71 13.88.7.71-2.82 2.82"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vn=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x2=[["path",{d:"M10.5 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5.5"}],["path",{d:"m14.3 19.6 1-.4"}],["path",{d:"M15 3v7.5"}],["path",{d:"m15.2 16.9-.9-.3"}],["path",{d:"m16.6 21.7.3-.9"}],["path",{d:"m16.8 15.3-.4-1"}],["path",{d:"m19.1 15.2.3-.9"}],["path",{d:"m19.6 21.7-.4-1"}],["path",{d:"m20.7 16.8 1-.4"}],["path",{d:"m21.7 19.4-.9-.3"}],["path",{d:"M9 3v18"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gn=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B5=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7.5 3v18"}],["path",{d:"M12 3v18"}],["path",{d:"M16.5 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F5=[["path",{d:"M10 18H5a3 3 0 0 1-3-3v-1"}],["path",{d:"M14 2a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M20 2a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"m7 21 3-3-3-3"}],["rect",{x:"14",y:"14",width:"8",height:"8",rx:"2"}],["rect",{x:"2",y:"2",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q5=[["path",{d:"M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W5=[["path",{d:"m16.24 7.76-1.804 5.411a2 2 0 0 1-1.265 1.265L7.76 16.24l1.804-5.411a2 2 0 0 1 1.265-1.265z"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j5=[["path",{d:"M15.536 11.293a1 1 0 0 0 0 1.414l2.376 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"}],["path",{d:"M2.297 11.293a1 1 0 0 0 0 1.414l2.377 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414L6.088 8.916a1 1 0 0 0-1.414 0z"}],["path",{d:"M8.916 17.912a1 1 0 0 0 0 1.415l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.415l-2.377-2.376a1 1 0 0 0-1.414 0z"}],["path",{d:"M8.916 4.674a1 1 0 0 0 0 1.414l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G5=[["rect",{width:"14",height:"8",x:"5",y:"2",rx:"2"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h2"}],["path",{d:"M12 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z5=[["path",{d:"M3 20a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1Z"}],["path",{d:"M20 16a8 8 0 1 0-16 0"}],["path",{d:"M12 4v4"}],["path",{d:"M10 4h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X5=[["path",{d:"m20.9 18.55-8-15.98a1 1 0 0 0-1.8 0l-8 15.98"}],["ellipse",{cx:"12",cy:"19",rx:"9",ry:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U5=[["rect",{x:"2",y:"6",width:"20",height:"8",rx:"1"}],["path",{d:"M17 14v7"}],["path",{d:"M7 14v7"}],["path",{d:"M17 3v3"}],["path",{d:"M7 3v3"}],["path",{d:"M10 14 2.3 6.3"}],["path",{d:"m14 6 7.7 7.7"}],["path",{d:"m8 6 8 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y5=[["path",{d:"M16 2v2"}],["path",{d:"M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"}],["path",{d:"M8 2v2"}],["circle",{cx:"12",cy:"11",r:"3"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yn=[["path",{d:"M16 2v2"}],["path",{d:"M17.915 22a6 6 0 0 0-12 0"}],["path",{d:"M8 2v2"}],["circle",{cx:"12",cy:"12",r:"4"}],["rect",{x:"3",y:"4",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K5=[["path",{d:"M22 7.7c0-.6-.4-1.2-.8-1.5l-6.3-3.9a1.72 1.72 0 0 0-1.7 0l-10.3 6c-.5.2-.9.8-.9 1.4v6.6c0 .5.4 1.2.8 1.5l6.3 3.9a1.72 1.72 0 0 0 1.7 0l10.3-6c.5-.3.9-1 .9-1.5Z"}],["path",{d:"M10 21.9V14L2.1 9.1"}],["path",{d:"m10 14 11.9-6.9"}],["path",{d:"M14 19.8v-8.1"}],["path",{d:"M18 17.5V9.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q5=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 18a6 6 0 0 0 0-12v12z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J5=[["path",{d:"M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"}],["path",{d:"M8.5 8.5v.01"}],["path",{d:"M16 15.5v.01"}],["path",{d:"M12 12v.01"}],["path",{d:"M11 17v.01"}],["path",{d:"M7 14v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t3=[["path",{d:"M2 12h20"}],["path",{d:"M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"}],["path",{d:"m4 8 16-4"}],["path",{d:"m8.86 6.78-.45-1.81a2 2 0 0 1 1.45-2.43l1.94-.48a2 2 0 0 1 2.43 1.46l.45 1.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e3=[["path",{d:"m12 15 2 2 4-4"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a3=[["line",{x1:"15",x2:"15",y1:"12",y2:"18"}],["line",{x1:"12",x2:"18",y1:"15",y2:"15"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i3=[["line",{x1:"12",x2:"18",y1:"15",y2:"15"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r3=[["line",{x1:"12",x2:"18",y1:"18",y2:"12"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n3=[["line",{x1:"12",x2:"18",y1:"12",y2:"18"}],["line",{x1:"12",x2:"18",y1:"18",y2:"12"}],["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s3=[["rect",{width:"14",height:"14",x:"8",y:"8",rx:"2",ry:"2"}],["path",{d:"M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M9.17 14.83a4 4 0 1 0 0-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M14.83 14.83a4 4 0 1 1 0-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l3=[["path",{d:"M20 4v7a4 4 0 0 1-4 4H4"}],["path",{d:"m9 10-5 5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d3=[["path",{d:"m15 10 5 5-5 5"}],["path",{d:"M4 4v7a4 4 0 0 0 4 4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c3=[["path",{d:"m14 15-5 5-5-5"}],["path",{d:"M20 4h-7a4 4 0 0 0-4 4v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p3=[["path",{d:"M14 9 9 4 4 9"}],["path",{d:"M20 20h-7a4 4 0 0 1-4-4V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u3=[["path",{d:"m10 15 5 5 5-5"}],["path",{d:"M4 4h7a4 4 0 0 1 4 4v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f3=[["path",{d:"m10 9 5-5 5 5"}],["path",{d:"M4 20h7a4 4 0 0 0 4-4V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M3=[["path",{d:"M20 20v-7a4 4 0 0 0-4-4H4"}],["path",{d:"M9 14 4 9l5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m3=[["path",{d:"m15 14 5-5-5-5"}],["path",{d:"M4 20v-7a4 4 0 0 1 4-4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v3=[["path",{d:"M12 20v2"}],["path",{d:"M12 2v2"}],["path",{d:"M17 20v2"}],["path",{d:"M17 2v2"}],["path",{d:"M2 12h2"}],["path",{d:"M2 17h2"}],["path",{d:"M2 7h2"}],["path",{d:"M20 12h2"}],["path",{d:"M20 17h2"}],["path",{d:"M20 7h2"}],["path",{d:"M7 20v2"}],["path",{d:"M7 2v2"}],["rect",{x:"4",y:"4",width:"16",height:"16",rx:"2"}],["rect",{x:"8",y:"8",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M10 9.3a2.8 2.8 0 0 0-3.5 1 3.1 3.1 0 0 0 0 3.4 2.7 2.7 0 0 0 3.5 1"}],["path",{d:"M17 9.3a2.8 2.8 0 0 0-3.5 1 3.1 3.1 0 0 0 0 3.4 2.7 2.7 0 0 0 3.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y3=[["rect",{width:"20",height:"14",x:"2",y:"5",rx:"2"}],["line",{x1:"2",x2:"22",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x3=[["path",{d:"m4.6 13.11 5.79-3.21c1.89-1.05 4.79 1.78 3.71 3.71l-3.22 5.81C8.8 23.16.79 15.23 4.6 13.11Z"}],["path",{d:"m10.5 9.5-1-2.29C9.2 6.48 8.8 6 8 6H4.5C2.79 6 2 6.5 2 8.5a7.71 7.71 0 0 0 2 4.83"}],["path",{d:"M8 6c0-1.55.24-4-2-4-2 0-2.5 2.17-2.5 4"}],["path",{d:"m14.5 13.5 2.29 1c.73.3 1.21.7 1.21 1.5v3.5c0 1.71-.5 2.5-2.5 2.5a7.71 7.71 0 0 1-4.83-2"}],["path",{d:"M18 16c1.55 0 4-.24 4 2 0 2-2.17 2.5-4 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w3=[["path",{d:"M6 2v14a2 2 0 0 0 2 2h14"}],["path",{d:"M18 22V8a2 2 0 0 0-2-2H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b3=[["path",{d:"M4 9a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a1 1 0 0 1 1 1v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-4a1 1 0 0 1 1-1h4a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a1 1 0 0 1-1-1V4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4a1 1 0 0 1-1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E3=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"22",x2:"18",y1:"12",y2:"12"}],["line",{x1:"6",x2:"2",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"6",y2:"2"}],["line",{x1:"12",x2:"12",y1:"22",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S3=[["path",{d:"M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C3=[["path",{d:"m21.12 6.4-6.05-4.06a2 2 0 0 0-2.17-.05L2.95 8.41a2 2 0 0 0-.95 1.7v5.82a2 2 0 0 0 .88 1.66l6.05 4.07a2 2 0 0 0 2.17.05l9.95-6.12a2 2 0 0 0 .95-1.7V8.06a2 2 0 0 0-.88-1.66Z"}],["path",{d:"M10 22v-8L2.25 9.15"}],["path",{d:"m10 14 11.77-6.87"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A3=[["path",{d:"m6 8 1.75 12.28a2 2 0 0 0 2 1.72h4.54a2 2 0 0 0 2-1.72L18 8"}],["path",{d:"M5 8h14"}],["path",{d:"M7 15a6.47 6.47 0 0 1 5 0 6.47 6.47 0 0 0 5 0"}],["path",{d:"m12 8 1-6h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T3=[["circle",{cx:"12",cy:"12",r:"8"}],["line",{x1:"3",x2:"6",y1:"3",y2:"6"}],["line",{x1:"21",x2:"18",y1:"3",y2:"6"}],["line",{x1:"3",x2:"6",y1:"21",y2:"18"}],["line",{x1:"21",x2:"18",y1:"21",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _3=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5v14a9 3 0 0 0 18 0V5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H3=[["path",{d:"M11 11.31c1.17.56 1.54 1.69 3.5 1.69 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M11.75 18c.35.5 1.45 1 2.75 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["path",{d:"M2 6h4"}],["path",{d:"M7 3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1L10 4a1 1 0 0 0-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L3=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 12a9 3 0 0 0 5 2.69"}],["path",{d:"M21 9.3V5"}],["path",{d:"M3 5v14a9 3 0 0 0 6.47 2.88"}],["path",{d:"M12 12v4h4"}],["path",{d:"M13 20a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L12 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V3=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5V19A9 3 0 0 0 15 21.84"}],["path",{d:"M21 5V8"}],["path",{d:"M21 12L18 17H22L19 22"}],["path",{d:"M3 12A9 3 0 0 0 14.59 14.87"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P3=[["path",{d:"m13 21-3-3 3-3"}],["path",{d:"M20 18H10"}],["path",{d:"M3 11h.01"}],["rect",{x:"6",y:"3",width:"5",height:"8",rx:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D3=[["path",{d:"M10 18h10"}],["path",{d:"m17 21 3-3-3-3"}],["path",{d:"M3 11h.01"}],["rect",{x:"15",y:"3",width:"5",height:"8",rx:"2.5"}],["rect",{x:"6",y:"3",width:"5",height:"8",rx:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O3=[["ellipse",{cx:"12",cy:"5",rx:"9",ry:"3"}],["path",{d:"M3 5V19A9 3 0 0 0 21 19V5"}],["path",{d:"M3 12A9 3 0 0 0 21 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k3=[["path",{d:"M10 5a2 2 0 0 0-1.344.519l-6.328 5.74a1 1 0 0 0 0 1.481l6.328 5.741A2 2 0 0 0 10 19h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z"}],["path",{d:"m12 9 6 6"}],["path",{d:"m18 9-6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I3=[["path",{d:"M10.162 3.167A10 10 0 0 0 2 13a2 2 0 0 0 4 0v-1a2 2 0 0 1 4 0v4a2 2 0 0 0 4 0v-4a2 2 0 0 1 4 0v1a2 2 0 0 0 4-.006 10 10 0 0 0-8.161-9.826"}],["path",{d:"M20.804 14.869a9 9 0 0 1-17.608 0"}],["circle",{cx:"12",cy:"4",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N3=[["circle",{cx:"19",cy:"19",r:"2"}],["circle",{cx:"5",cy:"5",r:"2"}],["path",{d:"M6.48 3.66a10 10 0 0 1 13.86 13.86"}],["path",{d:"m6.41 6.41 11.18 11.18"}],["path",{d:"M3.66 6.48a10 10 0 0 0 13.86 13.86"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xn=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0Z"}],["path",{d:"M9.2 9.2h.01"}],["path",{d:"m14.5 9.5-5 5"}],["path",{d:"M14.7 14.8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z3=[["path",{d:"M12 8v8"}],["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $3=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41L13.7 2.71a2.41 2.41 0 0 0-3.41 0z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R3=[["path",{d:"M2.7 10.3a2.41 2.41 0 0 0 0 3.41l7.59 7.59a2.41 2.41 0 0 0 3.41 0l7.59-7.59a2.41 2.41 0 0 0 0-3.41l-7.59-7.59a2.41 2.41 0 0 0-3.41 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M15 9h.01"}],["path",{d:"M9 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 16h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 16h.01"}],["path",{d:"M16 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M16 8h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M8 8h.01"}],["path",{d:"M8 12h.01"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z3=[["rect",{width:"12",height:"12",x:"2",y:"10",rx:"2",ry:"2"}],["path",{d:"m17.92 14 3.5-3.5a2.24 2.24 0 0 0 0-3l-5-4.92a2.24 2.24 0 0 0-3 0L10 6"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 14h.01"}],["path",{d:"M15 6h.01"}],["path",{d:"M18 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X3=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U3=[["path",{d:"M12 3v14"}],["path",{d:"M5 10h14"}],["path",{d:"M5 21h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y3=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M6 12c0-1.7.7-3.2 1.8-4.2"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M18 12c0 1.7-.7 3.2-1.8 4.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K3=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"12",r:"5"}],["path",{d:"M12 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q3=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J3=[["circle",{cx:"12",cy:"6",r:"1"}],["line",{x1:"5",x2:"19",y1:"12",y2:"12"}],["circle",{cx:"12",cy:"18",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t6=[["path",{d:"M15 2c-1.35 1.5-2.092 3-2.5 4.5L14 8"}],["path",{d:"m17 6-2.891-2.891"}],["path",{d:"M2 15c3.333-3 6.667-3 10-3"}],["path",{d:"m2 2 20 20"}],["path",{d:"m20 9 .891.891"}],["path",{d:"M22 9c-1.5 1.35-3 2.092-4.5 2.5l-1-1"}],["path",{d:"M3.109 14.109 4 15"}],["path",{d:"m6.5 12.5 1 1"}],["path",{d:"m7 18 2.891 2.891"}],["path",{d:"M9 22c1.35-1.5 2.092-3 2.5-4.5L10 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e6=[["path",{d:"m10 16 1.5 1.5"}],["path",{d:"m14 8-1.5-1.5"}],["path",{d:"M15 2c-1.798 1.998-2.518 3.995-2.807 5.993"}],["path",{d:"m16.5 10.5 1 1"}],["path",{d:"m17 6-2.891-2.891"}],["path",{d:"M2 15c6.667-6 13.333 0 20-6"}],["path",{d:"m20 9 .891.891"}],["path",{d:"M3.109 14.109 4 15"}],["path",{d:"m6.5 12.5 1 1"}],["path",{d:"m7 18 2.891 2.891"}],["path",{d:"M9 22c1.798-1.998 2.518-3.995 2.807-5.993"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a6=[["path",{d:"M2 8h20"}],["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 16h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i6=[["path",{d:"M11.25 16.25h1.5L12 17z"}],["path",{d:"M16 14v.5"}],["path",{d:"M4.42 11.247A13.152 13.152 0 0 0 4 14.556C4 18.728 7.582 21 12 21s8-2.272 8-6.444a11.702 11.702 0 0 0-.493-3.309"}],["path",{d:"M8 14v.5"}],["path",{d:"M8.5 8.5c-.384 1.05-1.083 2.028-2.344 2.5-1.931.722-3.576-.297-3.656-1-.113-.994 1.177-6.53 4-7 1.923-.321 3.651.845 3.651 2.235A7.497 7.497 0 0 1 14 5.277c0-1.39 1.844-2.598 3.767-2.277 2.823.47 4.113 6.006 4 7-.08.703-1.725 1.722-3.656 1-1.261-.472-1.855-1.45-2.239-2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r6=[["line",{x1:"12",x2:"12",y1:"2",y2:"22"}],["path",{d:"M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n6=[["path",{d:"M20.5 10a2.5 2.5 0 0 1-2.4-3H18a2.95 2.95 0 0 1-2.6-4.4 10 10 0 1 0 6.3 7.1c-.3.2-.8.3-1.2.3"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s6=[["path",{d:"M10 12h.01"}],["path",{d:"M18 9V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"}],["path",{d:"M2 20h8"}],["path",{d:"M20 17v-2a2 2 0 1 0-4 0v2"}],["rect",{x:"14",y:"17",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o6=[["path",{d:"M10 12h.01"}],["path",{d:"M18 20V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"}],["path",{d:"M2 20h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h6=[["path",{d:"M11 20H2"}],["path",{d:"M11 4.562v16.157a1 1 0 0 0 1.242.97L19 20V5.562a2 2 0 0 0-1.515-1.94l-4-1A2 2 0 0 0 11 4.561z"}],["path",{d:"M11 4H8a2 2 0 0 0-2 2v14"}],["path",{d:"M14 12h.01"}],["path",{d:"M22 20h-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l6=[["circle",{cx:"12.1",cy:"12.1",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d6=[["path",{d:"M12 15V3"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}],["path",{d:"m7 10 5 5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c6=[["path",{d:"m12.99 6.74 1.93 3.44"}],["path",{d:"M19.136 12a10 10 0 0 1-14.271 0"}],["path",{d:"m21 21-2.16-3.84"}],["path",{d:"m3 21 8.02-14.26"}],["circle",{cx:"12",cy:"5",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p6=[["path",{d:"M10 11h.01"}],["path",{d:"M14 6h.01"}],["path",{d:"M18 6h.01"}],["path",{d:"M6.5 13.1h.01"}],["path",{d:"M22 5c0 9-4 12-6 12s-6-3-6-12c0-2 2-3 6-3s6 1 6 3"}],["path",{d:"M17.4 9.9c-.8.8-2 .8-2.8 0"}],["path",{d:"M10.1 7.1C9 7.2 7.7 7.7 6 8.6c-3.5 2-4.7 3.9-3.7 5.6 4.5 7.8 9.5 8.4 11.2 7.4.9-.5 1.9-2.1 1.9-4.7"}],["path",{d:"M9.1 16.5c.3-1.1 1.4-1.7 2.4-1.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u6=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"}],["path",{d:"M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"}],["path",{d:"M8.56 2.75c4.37 6 6 9.42 8 17.72"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f6=[["path",{d:"M10 18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3 1 1 0 0 1 1-1z"}],["path",{d:"M13 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1l-.81 3.242a1 1 0 0 1-.97.758H8"}],["path",{d:"M14 4h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3"}],["path",{d:"M18 6h4"}],["path",{d:"m5 10-2 8"}],["path",{d:"m7 18 2-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M6=[["path",{d:"M10 10 7 7"}],["path",{d:"m10 14-3 3"}],["path",{d:"m14 10 3-3"}],["path",{d:"m14 14 3 3"}],["path",{d:"M14.205 4.139a4 4 0 1 1 5.439 5.863"}],["path",{d:"M19.637 14a4 4 0 1 1-5.432 5.868"}],["path",{d:"M4.367 10a4 4 0 1 1 5.438-5.862"}],["path",{d:"M9.795 19.862a4 4 0 1 1-5.429-5.873"}],["rect",{x:"10",y:"8",width:"4",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m6=[["path",{d:"M18.715 13.186C18.29 11.858 17.384 10.607 16 9.5c-2-1.6-3.5-4-4-6.5a10.7 10.7 0 0 1-.884 2.586"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.795 8.797A11 11 0 0 1 8 9.5C6 11.1 5 13 5 15a7 7 0 0 0 13.222 3.208"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v6=[["path",{d:"M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g6=[["path",{d:"m2 2 8 8"}],["path",{d:"m22 2-8 8"}],["ellipse",{cx:"12",cy:"9",rx:"10",ry:"5"}],["path",{d:"M7 13.4v7.9"}],["path",{d:"M12 14v8"}],["path",{d:"M17 13.4v7.9"}],["path",{d:"M2 9v8a10 5 0 0 0 20 0V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y6=[["path",{d:"M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"}],["path",{d:"M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x6=[["path",{d:"M15.4 15.63a7.875 6 135 1 1 6.23-6.23 4.5 3.43 135 0 0-6.23 6.23"}],["path",{d:"m8.29 12.71-2.6 2.6a2.5 2.5 0 1 0-1.65 4.65A2.5 2.5 0 1 0 8.7 18.3l2.59-2.59"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w6=[["path",{d:"M17.596 12.768a2 2 0 1 0 2.829-2.829l-1.768-1.767a2 2 0 0 0 2.828-2.829l-2.828-2.828a2 2 0 0 0-2.829 2.828l-1.767-1.768a2 2 0 1 0-2.829 2.829z"}],["path",{d:"m2.5 21.5 1.4-1.4"}],["path",{d:"m20.1 3.9 1.4-1.4"}],["path",{d:"M5.343 21.485a2 2 0 1 0 2.829-2.828l1.767 1.768a2 2 0 1 0 2.829-2.829l-6.364-6.364a2 2 0 1 0-2.829 2.829l1.768 1.767a2 2 0 0 0-2.828 2.829z"}],["path",{d:"m9.6 14.4 4.8-4.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b6=[["path",{d:"M6 8.5a6.5 6.5 0 1 1 13 0c0 6-6 6-6 10a3.5 3.5 0 1 1-7 0"}],["path",{d:"M15 8.5a2.5 2.5 0 0 0-5 0v1a2 2 0 1 1 0 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E6=[["path",{d:"M6 18.5a3.5 3.5 0 1 0 7 0c0-1.57.92-2.52 2.04-3.46"}],["path",{d:"M6 8.5c0-.75.13-1.47.36-2.14"}],["path",{d:"M8.8 3.15A6.5 6.5 0 0 1 19 8.5c0 1.63-.44 2.81-1.09 3.76"}],["path",{d:"M12.5 6A2.5 2.5 0 0 1 15 8.5M10 13a2 2 0 0 0 1.82-1.18"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S6=[["path",{d:"M7 3.34V5a3 3 0 0 0 3 3"}],["path",{d:"M11 21.95V18a2 2 0 0 0-2-2 2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"}],["path",{d:"M21.54 15H17a2 2 0 0 0-2 2v4.54"}],["path",{d:"M12 2a10 10 0 1 0 9.54 13"}],["path",{d:"M20 6V4a2 2 0 1 0-4 0v2"}],["rect",{width:"8",height:"5",x:"14",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wn=[["path",{d:"M21.54 15H17a2 2 0 0 0-2 2v4.54"}],["path",{d:"M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"}],["path",{d:"M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C6=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 2a7 7 0 1 0 10 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A6=[["circle",{cx:"11.5",cy:"12.5",r:"3.5"}],["path",{d:"M3 8c0-3.5 2.5-6 6.5-6 5 0 4.83 3 7.5 5s5 2 5 6c0 4.5-2.5 6.5-7 6.5-2.5 0-2.5 2.5-6 2.5s-7-2-7-5.5c0-3 1.5-3 1.5-5C3.5 10 3 9 3 8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T6=[["path",{d:"m2 2 20 20"}],["path",{d:"M20 14.347V14c0-6-4-12-8-12-1.078 0-2.157.436-3.157 1.19"}],["path",{d:"M6.206 6.21C4.871 8.4 4 11.2 4 14a8 8 0 0 0 14.568 4.568"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _6=[["path",{d:"M12 2C8 2 4 8 4 14a8 8 0 0 0 16 0c0-6-4-12-8-12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bn=[["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"12",cy:"5",r:"1"}],["circle",{cx:"12",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const En=[["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"19",cy:"12",r:"1"}],["circle",{cx:"5",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H6=[["path",{d:"M5 15a6.5 6.5 0 0 1 7 0 6.5 6.5 0 0 0 7 0"}],["path",{d:"M5 9a6.5 6.5 0 0 1 7 0 6.5 6.5 0 0 0 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L6=[["line",{x1:"5",x2:"19",y1:"9",y2:"9"}],["line",{x1:"5",x2:"19",y1:"15",y2:"15"}],["line",{x1:"19",x2:"5",y1:"5",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V6=[["line",{x1:"5",x2:"19",y1:"9",y2:"9"}],["line",{x1:"5",x2:"19",y1:"15",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P6=[["path",{d:"M21 21H8a2 2 0 0 1-1.42-.587l-3.994-3.999a2 2 0 0 1 0-2.828l10-10a2 2 0 0 1 2.829 0l5.999 6a2 2 0 0 1 0 2.828L12.834 21"}],["path",{d:"m5.082 11.09 8.828 8.828"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D6=[["path",{d:"m15 20 3-3h2a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2l3 3z"}],["path",{d:"M6 8v1"}],["path",{d:"M10 8v1"}],["path",{d:"M14 8v1"}],["path",{d:"M18 8v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O6=[["path",{d:"M4 10h12"}],["path",{d:"M4 14h9"}],["path",{d:"M19 6a7.7 7.7 0 0 0-5.2-2A7.9 7.9 0 0 0 6 12c0 4.4 3.5 8 7.8 8 2 0 3.8-.8 5.2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k6=[["path",{d:"m15 15 6 6"}],["path",{d:"m15 9 6-6"}],["path",{d:"M21 16v5h-5"}],["path",{d:"M21 8V3h-5"}],["path",{d:"M3 16v5h5"}],["path",{d:"m3 21 6-6"}],["path",{d:"M3 8V3h5"}],["path",{d:"M9 9 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I6=[["path",{d:"M15 3h6v6"}],["path",{d:"M10 14 21 3"}],["path",{d:"M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N6=[["path",{d:"m15 18-.722-3.25"}],["path",{d:"M2 8a10.645 10.645 0 0 0 20 0"}],["path",{d:"m20 15-1.726-2.05"}],["path",{d:"m4 15 1.726-2.05"}],["path",{d:"m9 18 .722-3.25"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z6=[["path",{d:"M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"}],["path",{d:"M14.084 14.158a3 3 0 0 1-4.242-4.242"}],["path",{d:"M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $6=[["path",{d:"M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R6=[["path",{d:"M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B6=[["path",{d:"M12 16h.01"}],["path",{d:"M16 16h.01"}],["path",{d:"M3 19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.5a.5.5 0 0 0-.769-.422l-4.462 2.844A.5.5 0 0 1 15 10.5v-2a.5.5 0 0 0-.769-.422L9.77 10.922A.5.5 0 0 1 9 10.5V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"}],["path",{d:"M8 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F6=[["path",{d:"M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"}],["path",{d:"M12 12v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q6=[["polygon",{points:"13 19 22 12 13 5 13 19"}],["polygon",{points:"2 19 11 12 2 5 2 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W6=[["path",{d:"M12.67 19a2 2 0 0 0 1.416-.588l6.154-6.172a6 6 0 0 0-8.49-8.49L5.586 9.914A2 2 0 0 0 5 11.328V18a1 1 0 0 0 1 1z"}],["path",{d:"M16 8 2 22"}],["path",{d:"M17.5 15H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j6=[["path",{d:"M4 3 2 5v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}],["path",{d:"M6 8h4"}],["path",{d:"M6 18h4"}],["path",{d:"m12 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}],["path",{d:"M14 8h4"}],["path",{d:"M14 18h4"}],["path",{d:"m20 3-2 2v15c0 .6.4 1 1 1h2c.6 0 1-.4 1-1V5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G6=[["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"M12 2v4"}],["path",{d:"m6.8 15-3.5 2"}],["path",{d:"m20.7 7-3.5 2"}],["path",{d:"M6.8 9 3.3 7"}],["path",{d:"m20.7 17-3.5-2"}],["path",{d:"m9 22 3-8 3 8"}],["path",{d:"M8 22h8"}],["path",{d:"M18 18.7a9 9 0 1 0-12 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z6=[["path",{d:"M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"}],["path",{d:"M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"}],["path",{d:"M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"}],["path",{d:"M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"}],["path",{d:"M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X6=[["path",{d:"M10 12v-1"}],["path",{d:"M10 18v-2"}],["path",{d:"M10 7V6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 .274 1.01"}],["circle",{cx:"10",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U6=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"3",cy:"17",r:"1"}],["path",{d:"M2 17v-3a4 4 0 0 1 8 0v3"}],["circle",{cx:"9",cy:"17",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y6=[["path",{d:"M17.5 22h.5a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 19a2 2 0 1 1 4 0v1a2 2 0 1 1-4 0v-4a6 6 0 0 1 12 0v4a2 2 0 1 1-4 0v-1a2 2 0 1 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K6=[["path",{d:"m13.69 12.479 1.29 4.88a.5.5 0 0 1-.697.591l-1.844-.849a1 1 0 0 0-.88.001l-1.846.85a.5.5 0 0 1-.693-.593l1.29-4.88"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["circle",{cx:"12",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sn=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 18 4-4"}],["path",{d:"M8 10v8h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q6=[["path",{d:"M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3.072"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m6.69 16.479 1.29 4.88a.5.5 0 0 1-.698.591l-1.843-.849a1 1 0 0 0-.88.001l-1.846.85a.5.5 0 0 1-.693-.593l1.29-4.88"}],["circle",{cx:"5",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J6=[["path",{d:"M14.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 13.1a2 2 0 0 0-1 1.76v3.24a2 2 0 0 0 .97 1.78L6 21.7a2 2 0 0 0 2.03.01L11 19.9a2 2 0 0 0 1-1.76V14.9a2 2 0 0 0-.97-1.78L8 11.3a2 2 0 0 0-2.03-.01Z"}],["path",{d:"M7 17v5"}],["path",{d:"M11.7 14.2 7 17l-4.7-2.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cn=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 18v-1"}],["path",{d:"M12 18v-6"}],["path",{d:"M16 18v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const An=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 18v-2"}],["path",{d:"M12 18v-4"}],["path",{d:"M16 18v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tn=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3.5"}],["path",{d:"M4.017 11.512a6 6 0 1 0 8.466 8.475"}],["path",{d:"M9 16a1 1 0 0 1-1-1v-4c0-.552.45-1.008.995-.917a6 6 0 0 1 4.922 4.922c.091.544-.365.995-.917.995z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m3 15 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _n=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m16 13-3.5 3.5-2-2L8 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m9 15 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a8=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"M8 14v2.2l1.6 1"}],["circle",{cx:"8",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m5 12-3 3 3 3"}],["path",{d:"m9 18 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r8=[["path",{d:"M10 12.5 8 15l2 2.5"}],["path",{d:"m14 12.5 2 2.5-2 2.5"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hn=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m2.305 15.53.923-.382"}],["path",{d:"m3.228 12.852-.924-.383"}],["path",{d:"M4.677 21.5a2 2 0 0 0 1.313.5H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2.5"}],["path",{d:"m4.852 11.228-.383-.923"}],["path",{d:"m4.852 16.772-.383.924"}],["path",{d:"m7.148 11.228.383-.923"}],["path",{d:"m7.53 17.696-.382-.924"}],["path",{d:"m8.772 12.852.923-.383"}],["path",{d:"m8.772 15.148.923.383"}],["circle",{cx:"6",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M9 10h6"}],["path",{d:"M12 13V7"}],["path",{d:"M9 17h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"4",height:"6",x:"2",y:"12",rx:"2"}],["path",{d:"M10 12h2v6"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M12 18v-6"}],["path",{d:"m9 15 3 3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10.29 10.7a2.43 2.43 0 0 0-2.66-.52c-.29.12-.56.3-.78.53l-.35.34-.35-.34a2.43 2.43 0 0 0-2.65-.53c-.3.12-.56.3-.79.53-.95.94-1 2.53.2 3.74L6.5 18l3.6-3.55c1.2-1.21 1.14-2.8.19-3.74Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"10",cy:"12",r:"2"}],["path",{d:"m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 15h10"}],["path",{d:"m9 18 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 12a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1 1 1 0 0 1 1 1v1a1 1 0 0 0 1 1"}],["path",{d:"M8 18a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1 1 1 0 0 1-1-1v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10 12a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1 1 1 0 0 1 1 1v1a1 1 0 0 0 1 1"}],["path",{d:"M14 18a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1 1 1 0 0 1-1-1v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"4",cy:"16",r:"2"}],["path",{d:"m10 10-4.5 4.5"}],["path",{d:"m9 11 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["circle",{cx:"10",cy:"16",r:"2"}],["path",{d:"m16 10-4.5 4.5"}],["path",{d:"m15 11 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v1"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"5",x:"2",y:"13",rx:"1"}],["path",{d:"M8 13v-2a2 2 0 1 0-4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["rect",{width:"8",height:"6",x:"8",y:"12",rx:"1"}],["path",{d:"M10 12v-2a2 2 0 1 1 4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y8=[["path",{d:"M10.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v8.4"}],["path",{d:"M8 18v-7.7L16 9v7"}],["circle",{cx:"14",cy:"16",r:"2"}],["circle",{cx:"6",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x8=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 7V4a2 2 0 0 1 2-2 2 2 0 0 0-2 2"}],["path",{d:"M4.063 20.999a2 2 0 0 0 2 1L18 22a2 2 0 0 0 2-2V7l-5-5H6"}],["path",{d:"m5 11-3 3"}],["path",{d:"m5 17-3-3h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ln=[["path",{d:"m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"}],["path",{d:"M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["path",{d:"M8 18h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vn=[["path",{d:"M12.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v9.5"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M3 15h6"}],["path",{d:"M6 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 15h6"}],["path",{d:"M12 18v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pn=[["path",{d:"M12 17h.01"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["path",{d:"M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E8=[["path",{d:"M20 10V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M16 14a2 2 0 0 0-2 2"}],["path",{d:"M20 14a2 2 0 0 1 2 2"}],["path",{d:"M20 22a2 2 0 0 0 2-2"}],["path",{d:"M16 22a2 2 0 0 1-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["circle",{cx:"11.5",cy:"14.5",r:"2.5"}],["path",{d:"M13.3 16.3 15 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C8=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4.268 21a2 2 0 0 0 1.727 1H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"}],["path",{d:"m9 18-1.5-1.5"}],["circle",{cx:"5",cy:"14",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 12h8"}],["path",{d:"M10 11v2"}],["path",{d:"M8 17h8"}],["path",{d:"M14 16v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 13h2"}],["path",{d:"M14 13h2"}],["path",{d:"M8 17h2"}],["path",{d:"M14 17h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _8=[["path",{d:"M21 7h-3a2 2 0 0 1-2-2V2"}],["path",{d:"M21 6v6.5c0 .8-.7 1.5-1.5 1.5h-7c-.8 0-1.5-.7-1.5-1.5v-9c0-.8.7-1.5 1.5-1.5H17Z"}],["path",{d:"M7 8v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H15"}],["path",{d:"M3 12v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H8=[["path",{d:"m10 18 3-3-3-3"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 11V4a2 2 0 0 1 2-2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 16 2-2-2-2"}],["path",{d:"M12 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M10 9H8"}],["path",{d:"M16 13H8"}],["path",{d:"M16 17H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M2 13v-1h6v1"}],["path",{d:"M5 12v6"}],["path",{d:"M4 18h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M9 13v-1h6v1"}],["path",{d:"M12 12v6"}],["path",{d:"M11 18h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M12 12v6"}],["path",{d:"m15 15-3-3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"6",x:"2",y:"12",rx:"1"}],["path",{d:"m10 15.5 4 2.5v-6l-4 2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I8=[["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M15 18a3 3 0 1 0-6 0"}],["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"}],["circle",{cx:"12",cy:"13",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m10 11 5 3-5 3v-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 15h.01"}],["path",{d:"M11.5 13.5a2.5 2.5 0 0 1 0 3"}],["path",{d:"M15 12a5 5 0 0 1 0 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $8=[["path",{d:"M11 11a5 5 0 0 1 0 6"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M4 6.765V4a2 2 0 0 1 2-2h9l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-.93-.23"}],["path",{d:"M7 10.51a.5.5 0 0 0-.826-.38l-1.893 1.628A1 1 0 0 1 3.63 12H2.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1.129a1 1 0 0 1 .652.242l1.893 1.63a.5.5 0 0 0 .826-.38z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M12 9v4"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B8=[["path",{d:"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m8 12.5-5 5"}],["path",{d:"m3 12.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"m14.5 12.5-5 5"}],["path",{d:"m9.5 12.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q8=[["path",{d:"M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W8=[["path",{d:"M20 7h-3a2 2 0 0 1-2-2V2"}],["path",{d:"M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"}],["path",{d:"M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j8=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 3v18"}],["path",{d:"M3 7.5h4"}],["path",{d:"M3 12h18"}],["path",{d:"M3 16.5h4"}],["path",{d:"M17 3v18"}],["path",{d:"M17 7.5h4"}],["path",{d:"M17 16.5h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G8=[["path",{d:"M12 10a2 2 0 0 0-2 2c0 1.02-.1 2.51-.26 4"}],["path",{d:"M14 13.12c0 2.38 0 6.38-1 8.88"}],["path",{d:"M17.29 21.02c.12-.6.43-2.3.5-3.02"}],["path",{d:"M2 12a10 10 0 0 1 18-6"}],["path",{d:"M2 16h.01"}],["path",{d:"M21.8 16c.2-2 .131-5.354 0-6"}],["path",{d:"M5 19.5C5.5 18 6 15 6 12a6 6 0 0 1 .34-2"}],["path",{d:"M8.65 22c.21-.66.45-1.32.57-2"}],["path",{d:"M9 6.8a6 6 0 0 1 9 5.2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z8=[["path",{d:"M15 6.5V3a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3.5"}],["path",{d:"M9 18h8"}],["path",{d:"M18 3h-3"}],["path",{d:"M11 3a6 6 0 0 0-6 6v11"}],["path",{d:"M5 13h4"}],["path",{d:"M17 10a4 4 0 0 0-8 0v10a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X8=[["path",{d:"M18 12.47v.03m0-.5v.47m-.475 5.056A6.744 6.744 0 0 1 15 18c-3.56 0-7.56-2.53-8.5-6 .348-1.28 1.114-2.433 2.121-3.38m3.444-2.088A8.802 8.802 0 0 1 15 6c3.56 0 6.06 2.54 7 6-.309 1.14-.786 2.177-1.413 3.058"}],["path",{d:"M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33m7.48-4.372A9.77 9.77 0 0 1 16 6.07m0 11.86a9.77 9.77 0 0 1-1.728-3.618"}],["path",{d:"m16.01 17.93-.23 1.4A2 2 0 0 1 13.8 21H9.5a5.96 5.96 0 0 0 1.49-3.98M8.53 3h5.27a2 2 0 0 1 1.98 1.67l.23 1.4M2 2l20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U8=[["path",{d:"M2 16s9-15 20-4C11 23 2 8 2 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y8=[["path",{d:"M6.5 12c.94-3.46 4.94-6 8.5-6 3.56 0 6.06 2.54 7 6-.94 3.47-3.44 6-7 6s-7.56-2.53-8.5-6Z"}],["path",{d:"M18 12v.5"}],["path",{d:"M16 17.93a9.77 9.77 0 0 1 0-11.86"}],["path",{d:"M7 10.67C7 8 5.58 5.97 2.73 5.5c-1 1.5-1 5 .23 6.5-1.24 1.5-1.24 5-.23 6.5C5.58 18.03 7 16 7 13.33"}],["path",{d:"M10.46 7.26C10.2 5.88 9.17 4.24 8 3h5.8a2 2 0 0 1 1.98 1.67l.23 1.4"}],["path",{d:"m16.01 17.93-.23 1.4A2 2 0 0 1 13.8 21H9.5a5.96 5.96 0 0 0 1.49-3.98"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K8=[["path",{d:"M16 16c-3 0-5-2-8-2a6 6 0 0 0-4 1.528"}],["path",{d:"m2 2 20 20"}],["path",{d:"M4 22V4"}],["path",{d:"M7.656 2H8c3 0 5 2 7.333 2q2 0 3.067-.8A1 1 0 0 1 20 4v10.347"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q8=[["path",{d:"M17 22V2L7 7l10 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J8=[["path",{d:"M7 22V2l10 5-10 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tM=[["path",{d:"M4 22V4a1 1 0 0 1 .4-.8A6 6 0 0 1 8 2c3 0 5 2 7.333 2q2 0 3.067-.8A1 1 0 0 1 20 4v10a1 1 0 0 1-.4.8A6 6 0 0 1 16 16c-3 0-5-2-8-2a6 6 0 0 0-4 1.528"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eM=[["path",{d:"M12 2c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 17 10a5 5 0 1 1-10 0c0-.3 0-.6.1-.9a2 2 0 1 0 3.3-2C8 4.5 11 2 12 2Z"}],["path",{d:"m5 22 14-4"}],["path",{d:"m5 18 14 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aM=[["path",{d:"M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iM=[["path",{d:"M16 16v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V10c0-2-2-2-2-4"}],["path",{d:"M7 2h11v4c0 2-2 2-2 4v1"}],["line",{x1:"11",x2:"18",y1:"6",y2:"6"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rM=[["path",{d:"M18 6c0 2-2 2-2 4v10a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V10c0-2-2-2-2-4V2h12z"}],["line",{x1:"6",x2:"18",y1:"6",y2:"6"}],["line",{x1:"12",x2:"12",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nM=[["path",{d:"M14 2v6a2 2 0 0 0 .245.96l5.51 10.08A2 2 0 0 1 18 22H6a2 2 0 0 1-1.755-2.96l5.51-10.08A2 2 0 0 0 10 8V2"}],["path",{d:"M6.453 15h11.094"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sM=[["path",{d:"M10 2v2.343"}],["path",{d:"M14 2v6.343"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20a2 2 0 0 1-2 2H6a2 2 0 0 1-1.755-2.96l5.227-9.563"}],["path",{d:"M6.453 15H15"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oM=[["path",{d:"M10 2v6.292a7 7 0 1 0 4 0V2"}],["path",{d:"M5 15h14"}],["path",{d:"M8.5 2h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hM=[["path",{d:"m3 7 5 5-5 5V7"}],["path",{d:"m21 7-5 5 5 5V7"}],["path",{d:"M12 20v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lM=[["path",{d:"m17 3-5 5-5-5h10"}],["path",{d:"m17 21-5-5-5 5h10"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dM=[["path",{d:"M8 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h3"}],["path",{d:"M16 3h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-3"}],["path",{d:"M12 20v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cM=[["path",{d:"M21 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3"}],["path",{d:"M21 16v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pM=[["path",{d:"M12 5a3 3 0 1 1 3 3m-3-3a3 3 0 1 0-3 3m3-3v1M9 8a3 3 0 1 0 3 3M9 8h1m5 0a3 3 0 1 1-3 3m3-3h-1m-2 3v-1"}],["circle",{cx:"12",cy:"8",r:"2"}],["path",{d:"M12 10v12"}],["path",{d:"M12 22c4.2 0 7-1.667 7-5-4.2 0-7 1.667-7 5Z"}],["path",{d:"M12 22c-4.2 0-7-1.667-7-5 4.2 0 7 1.667 7 5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uM=[["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M12 16.5A4.5 4.5 0 1 1 7.5 12 4.5 4.5 0 1 1 12 7.5a4.5 4.5 0 1 1 4.5 4.5 4.5 4.5 0 1 1-4.5 4.5"}],["path",{d:"M12 7.5V9"}],["path",{d:"M7.5 12H9"}],["path",{d:"M16.5 12H15"}],["path",{d:"M12 16.5V15"}],["path",{d:"m8 8 1.88 1.88"}],["path",{d:"M14.12 9.88 16 8"}],["path",{d:"m8 16 1.88-1.88"}],["path",{d:"M14.12 14.12 16 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fM=[["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MM=[["path",{d:"M2 12h6"}],["path",{d:"M22 12h-6"}],["path",{d:"M12 2v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 20v2"}],["path",{d:"m19 9-3 3 3 3"}],["path",{d:"m5 15 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mM=[["path",{d:"M12 22v-6"}],["path",{d:"M12 8V2"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}],["path",{d:"m15 19-3-3-3 3"}],["path",{d:"m15 5-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vM=[["circle",{cx:"15",cy:"19",r:"2"}],["path",{d:"M20.9 19.8A2 2 0 0 0 22 18V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h5.1"}],["path",{d:"M15 11v-1"}],["path",{d:"M15 17v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"m9 13 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yM=[["path",{d:"M16 14v2.2l1.6 1"}],["path",{d:"M7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2"}],["circle",{cx:"16",cy:"16",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M2 10h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wM=[["path",{d:"M10 10.5 8 13l2 2.5"}],["path",{d:"m14 10.5 2 2.5-2 2.5"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dn=[["path",{d:"M10.3 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.98a2 2 0 0 1 1.69.9l.66 1.2A2 2 0 0 0 12 6h8a2 2 0 0 1 2 2v3.3"}],["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bM=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["circle",{cx:"12",cy:"13",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M12 10v6"}],["path",{d:"m15 13-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SM=[["path",{d:"M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v5"}],["circle",{cx:"13",cy:"12",r:"2"}],["path",{d:"M18 19c-2.8 0-5-2.2-5-5v8"}],["circle",{cx:"20",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CM=[["circle",{cx:"12",cy:"13",r:"2"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M14 13h3"}],["path",{d:"M7 13h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AM=[["path",{d:"M11 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v1.5"}],["path",{d:"M13.9 17.45c-1.2-1.2-1.14-2.8-.2-3.73a2.43 2.43 0 0 1 3.44 0l.36.34.34-.34a2.43 2.43 0 0 1 3.45-.01c.95.95 1 2.53-.2 3.74L17.5 21Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TM=[["path",{d:"M2 9V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-1"}],["path",{d:"M2 13h10"}],["path",{d:"m9 16 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _M=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["path",{d:"M8 10v4"}],["path",{d:"M12 10v2"}],["path",{d:"M16 10v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HM=[["circle",{cx:"16",cy:"20",r:"2"}],["path",{d:"M10 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v2"}],["path",{d:"m22 14-4.5 4.5"}],["path",{d:"m21 15 1 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LM=[["rect",{width:"8",height:"5",x:"14",y:"17",rx:"1"}],["path",{d:"M10 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v2.5"}],["path",{d:"M20 17v-2a2 2 0 1 0-4 0v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VM=[["path",{d:"M9 13h6"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PM=[["path",{d:"m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.54 6a2 2 0 0 1-1.95 1.5H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H18a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DM=[["path",{d:"m6 14 1.45-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.55 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"}],["circle",{cx:"14",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OM=[["path",{d:"M2 7.5V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-1.5"}],["path",{d:"M2 13h10"}],["path",{d:"m5 10-3 3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const On=[["path",{d:"M2 11.5V5a2 2 0 0 1 2-2h3.9c.7 0 1.3.3 1.7.9l.8 1.2c.4.6 1 .9 1.7.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-9.5"}],["path",{d:"M11.378 13.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kM=[["path",{d:"M12 10v6"}],["path",{d:"M9 13h6"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IM=[["path",{d:"M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"}],["circle",{cx:"12",cy:"13",r:"2"}],["path",{d:"M12 15v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NM=[["circle",{cx:"11.5",cy:"12.5",r:"2.5"}],["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M13.3 14.3 15 16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zM=[["path",{d:"M10.7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v4.1"}],["path",{d:"m21 21-1.9-1.9"}],["circle",{cx:"17",cy:"17",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $M=[["path",{d:"M2 9V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h7"}],["path",{d:"m8 16 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RM=[["path",{d:"M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v.5"}],["path",{d:"M12 10v4h4"}],["path",{d:"m12 14 1.535-1.605a5 5 0 0 1 8 1.5"}],["path",{d:"M22 22v-4h-4"}],["path",{d:"m22 18-1.535 1.605a5 5 0 0 1-8-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BM=[["path",{d:"M20 10a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2.5a1 1 0 0 1-.8-.4l-.9-1.2A1 1 0 0 0 15 3h-2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1Z"}],["path",{d:"M20 21a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-2.9a1 1 0 0 1-.88-.55l-.42-.85a1 1 0 0 0-.92-.6H13a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1Z"}],["path",{d:"M3 5a2 2 0 0 0 2 2h3"}],["path",{d:"M3 3v13a2 2 0 0 0 2 2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"M12 10v6"}],["path",{d:"m9 13 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}],["path",{d:"m9.5 10.5 5 5"}],["path",{d:"m14.5 10.5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WM=[["path",{d:"M20 17a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3.9a2 2 0 0 1-1.69-.9l-.81-1.2a2 2 0 0 0-1.67-.9H8a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2Z"}],["path",{d:"M2 8v11a2 2 0 0 0 2 2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jM=[["path",{d:"M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GM=[["path",{d:"M4 16v-2.38C4 11.5 2.97 10.5 3 8c.03-2.72 1.49-6 4.5-6C9.37 2 10 3.8 10 5.5c0 3.11-2 5.66-2 8.68V16a2 2 0 1 1-4 0Z"}],["path",{d:"M20 20v-2.38c0-2.12 1.03-3.12 1-5.62-.03-2.72-1.49-6-4.5-6C14.63 6 14 7.8 14 9.5c0 3.11 2 5.66 2 8.68V20a2 2 0 1 0 4 0Z"}],["path",{d:"M16 17h4"}],["path",{d:"M4 13h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZM=[["path",{d:"M12 12H5a2 2 0 0 0-2 2v5"}],["circle",{cx:"13",cy:"19",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}],["path",{d:"M8 19h3m5-17v17h6M6 12V7c0-1.1.9-2 2-2h3l5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XM=[["path",{d:"m15 17 5-5-5-5"}],["path",{d:"M4 18v-2a4 4 0 0 1 4-4h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UM=[["line",{x1:"22",x2:"2",y1:"6",y2:"6"}],["line",{x1:"22",x2:"2",y1:"18",y2:"18"}],["line",{x1:"6",x2:"6",y1:"2",y2:"22"}],["line",{x1:"18",x2:"18",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YM=[["path",{d:"M5 16V9h14V2H5l14 14h-7m-7 0 7 7v-7m-7 0h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KM=[["line",{x1:"3",x2:"15",y1:"22",y2:"22"}],["line",{x1:"4",x2:"14",y1:"9",y2:"9"}],["path",{d:"M14 22V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v18"}],["path",{d:"M14 13h2a2 2 0 0 1 2 2v2a2 2 0 0 0 2 2a2 2 0 0 0 2-2V9.83a2 2 0 0 0-.59-1.42L18 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QM=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M16 16s-1.5-2-4-2-4 2-4 2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JM=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["rect",{width:"10",height:"8",x:"7",y:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tm=[["path",{d:"M13.354 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14v6a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341l1.218-1.348"}],["path",{d:"M16 6h6"}],["path",{d:"M19 3v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kn=[["path",{d:"M12.531 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14v6a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341l.427-.473"}],["path",{d:"m16.5 3.5 5 5"}],["path",{d:"m21.5 3.5-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const In=[["path",{d:"M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const em=[["path",{d:"M2 7v10"}],["path",{d:"M6 5v14"}],["rect",{width:"12",height:"18",x:"10",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const am=[["path",{d:"M2 3v18"}],["rect",{width:"12",height:"18",x:"6",y:"3",rx:"2"}],["path",{d:"M22 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const im=[["rect",{width:"18",height:"14",x:"3",y:"3",rx:"2"}],["path",{d:"M4 21h1"}],["path",{d:"M9 21h1"}],["path",{d:"M14 21h1"}],["path",{d:"M19 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rm=[["path",{d:"M7 2h10"}],["path",{d:"M5 6h14"}],["rect",{width:"18",height:"12",x:"3",y:"10",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nm=[["path",{d:"M3 2h18"}],["rect",{width:"18",height:"12",x:"3",y:"6",rx:"2"}],["path",{d:"M3 22h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sm=[["line",{x1:"6",x2:"10",y1:"11",y2:"11"}],["line",{x1:"8",x2:"8",y1:"9",y2:"13"}],["line",{x1:"15",x2:"15.01",y1:"12",y2:"12"}],["line",{x1:"18",x2:"18.01",y1:"10",y2:"10"}],["path",{d:"M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const om=[["line",{x1:"6",x2:"10",y1:"12",y2:"12"}],["line",{x1:"8",x2:"8",y1:"10",y2:"14"}],["line",{x1:"15",x2:"15.01",y1:"13",y2:"13"}],["line",{x1:"18",x2:"18.01",y1:"11",y2:"11"}],["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hm=[["path",{d:"m12 14 4-4"}],["path",{d:"M3.34 19a10 10 0 1 1 17.32 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lm=[["path",{d:"m14.5 12.5-8 8a2.119 2.119 0 1 1-3-3l8-8"}],["path",{d:"m16 16 6-6"}],["path",{d:"m8 8 6-6"}],["path",{d:"m9 7 8 8"}],["path",{d:"m21 11-8-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dm=[["path",{d:"M6 3h12l4 6-10 13L2 9Z"}],["path",{d:"M11 3 8 9l4 13 4-13-3-6"}],["path",{d:"M2 9h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cm=[["path",{d:"M11.5 21a7.5 7.5 0 1 1 7.35-9"}],["path",{d:"M13 12V3"}],["path",{d:"M4 21h16"}],["path",{d:"M9 12V3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pm=[["path",{d:"M9 10h.01"}],["path",{d:"M15 10h.01"}],["path",{d:"M12 2a8 8 0 0 0-8 8v12l3-3 2.5 2.5L12 19l2.5 2.5L17 19l3 3V10a8 8 0 0 0-8-8z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const um=[["rect",{x:"3",y:"8",width:"18",height:"4",rx:"1"}],["path",{d:"M12 8v13"}],["path",{d:"M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"}],["path",{d:"M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fm=[["path",{d:"M6 3v12"}],["path",{d:"M18 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"}],["path",{d:"M6 21a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"}],["path",{d:"M15 6a9 9 0 0 0-9 9"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mm=[["line",{x1:"6",x2:"6",y1:"3",y2:"15"}],["circle",{cx:"18",cy:"6",r:"3"}],["circle",{cx:"6",cy:"18",r:"3"}],["path",{d:"M18 9a9 9 0 0 1-9 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mm=[["path",{d:"M12 3v6"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"M12 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vm=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v7"}],["path",{d:"m15 9-3-3 3-3"}],["circle",{cx:"19",cy:"18",r:"3"}],["path",{d:"M12 18H7a2 2 0 0 1-2-2V9"}],["path",{d:"m9 15 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nn=[["circle",{cx:"12",cy:"12",r:"3"}],["line",{x1:"3",x2:"9",y1:"12",y2:"12"}],["line",{x1:"15",x2:"21",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gm=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v7"}],["path",{d:"M11 18H8a2 2 0 0 1-2-2V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ym=[["circle",{cx:"12",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["circle",{cx:"18",cy:"6",r:"3"}],["path",{d:"M18 9v2c0 .6-.4 1-1 1H7c-.6 0-1-.4-1-1V9"}],["path",{d:"M12 12v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xm=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v6"}],["circle",{cx:"5",cy:"18",r:"3"}],["path",{d:"M12 3v18"}],["circle",{cx:"19",cy:"6",r:"3"}],["path",{d:"M16 15.7A9 9 0 0 0 19 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wm=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 21V9a9 9 0 0 0 9 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bm=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v12"}],["circle",{cx:"19",cy:"18",r:"3"}],["path",{d:"m15 9-3-3 3-3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Em=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 9v12"}],["path",{d:"m21 3-6 6"}],["path",{d:"m21 9-6-6"}],["path",{d:"M18 11.5V15"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sm=[["circle",{cx:"5",cy:"6",r:"3"}],["path",{d:"M5 9v12"}],["path",{d:"m15 9-3-3 3-3"}],["path",{d:"M12 6h5a2 2 0 0 1 2 2v3"}],["path",{d:"M19 15v6"}],["path",{d:"M22 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cm=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M6 9v12"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v3"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Am=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M18 6V5"}],["path",{d:"M18 11v-1"}],["line",{x1:"6",x2:"6",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tm=[["circle",{cx:"18",cy:"18",r:"3"}],["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M13 6h3a2 2 0 0 1 2 2v7"}],["line",{x1:"6",x2:"6",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _m=[["path",{d:"M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"}],["path",{d:"M9 18c-4.51 2-5-2-7-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hm=[["path",{d:"m22 13.29-3.33-10a.42.42 0 0 0-.14-.18.38.38 0 0 0-.22-.11.39.39 0 0 0-.23.07.42.42 0 0 0-.14.18l-2.26 6.67H8.32L6.1 3.26a.42.42 0 0 0-.1-.18.38.38 0 0 0-.26-.08.39.39 0 0 0-.23.07.42.42 0 0 0-.14.18L2 13.29a.74.74 0 0 0 .27.83L12 21l9.69-6.88a.71.71 0 0 0 .31-.83Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lm=[["path",{d:"M5.116 4.104A1 1 0 0 1 6.11 3h11.78a1 1 0 0 1 .994 1.105L17.19 20.21A2 2 0 0 1 15.2 22H8.8a2 2 0 0 1-2-1.79z"}],["path",{d:"M6 12a5 5 0 0 1 6 0 5 5 0 0 0 6 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vm=[["circle",{cx:"6",cy:"15",r:"4"}],["circle",{cx:"18",cy:"15",r:"4"}],["path",{d:"M14 15a2 2 0 0 0-2-2 2 2 0 0 0-2 2"}],["path",{d:"M2.5 13 5 7c.7-1.3 1.4-2 3-2"}],["path",{d:"M21.5 13 19 7c-.7-1.3-1.5-2-3-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pm=[["path",{d:"M15.686 15A14.5 14.5 0 0 1 12 22a14.5 14.5 0 0 1 0-20 10 10 0 1 0 9.542 13"}],["path",{d:"M2 12h8.5"}],["path",{d:"M20 6V4a2 2 0 1 0-4 0v2"}],["rect",{width:"8",height:"5",x:"14",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dm=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"}],["path",{d:"M2 12h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Om=[["path",{d:"M12 13V2l8 4-8 4"}],["path",{d:"M20.561 10.222a9 9 0 1 1-12.55-5.29"}],["path",{d:"M8.002 9.997a5 5 0 1 0 8.9 2.02"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const km=[["path",{d:"M18 11.5V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1.4"}],["path",{d:"M14 10V8a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"}],["path",{d:"M10 9.9V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v5"}],["path",{d:"M6 14a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M18 11a2 2 0 1 1 4 0v3a8 8 0 0 1-8 8h-4a8 8 0 0 1-8-8 2 2 0 1 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Im=[["path",{d:"M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"}],["path",{d:"M22 10v6"}],["path",{d:"M6 12.5V16a6 3 0 0 0 12 0v-3.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nm=[["path",{d:"M2 21V3"}],["path",{d:"M2 5h18a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2.26"}],["path",{d:"M7 17v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3"}],["circle",{cx:"16",cy:"11",r:"2"}],["circle",{cx:"8",cy:"11",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zm=[["path",{d:"M22 5V2l-5.89 5.89"}],["circle",{cx:"16.6",cy:"15.89",r:"3"}],["circle",{cx:"8.11",cy:"7.4",r:"3"}],["circle",{cx:"12.35",cy:"11.65",r:"3"}],["circle",{cx:"13.91",cy:"5.85",r:"3"}],["circle",{cx:"18.15",cy:"10.09",r:"3"}],["circle",{cx:"6.56",cy:"13.2",r:"3"}],["circle",{cx:"10.8",cy:"17.44",r:"3"}],["circle",{cx:"5",cy:"19",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zn=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $n=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"m16 16 5 5"}],["path",{d:"m16 21 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rn=[["path",{d:"M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3"}],["path",{d:"M16 19h6"}],["path",{d:"M19 22v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bn=[["path",{d:"M12 3v18"}],["path",{d:"M3 12h18"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $m=[["path",{d:"M15 3v18"}],["path",{d:"M3 12h18"}],["path",{d:"M9 3v18"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w2=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M3 15h18"}],["path",{d:"M9 3v18"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rm=[["circle",{cx:"12",cy:"9",r:"1"}],["circle",{cx:"19",cy:"9",r:"1"}],["circle",{cx:"5",cy:"9",r:"1"}],["circle",{cx:"12",cy:"15",r:"1"}],["circle",{cx:"19",cy:"15",r:"1"}],["circle",{cx:"5",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bm=[["circle",{cx:"12",cy:"5",r:"1"}],["circle",{cx:"19",cy:"5",r:"1"}],["circle",{cx:"5",cy:"5",r:"1"}],["circle",{cx:"12",cy:"12",r:"1"}],["circle",{cx:"19",cy:"12",r:"1"}],["circle",{cx:"5",cy:"12",r:"1"}],["circle",{cx:"12",cy:"19",r:"1"}],["circle",{cx:"19",cy:"19",r:"1"}],["circle",{cx:"5",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fm=[["circle",{cx:"9",cy:"12",r:"1"}],["circle",{cx:"9",cy:"5",r:"1"}],["circle",{cx:"9",cy:"19",r:"1"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"15",cy:"5",r:"1"}],["circle",{cx:"15",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qm=[["path",{d:"M3 7V5c0-1.1.9-2 2-2h2"}],["path",{d:"M17 3h2c1.1 0 2 .9 2 2v2"}],["path",{d:"M21 17v2c0 1.1-.9 2-2 2h-2"}],["path",{d:"M7 21H5c-1.1 0-2-.9-2-2v-2"}],["rect",{width:"7",height:"5",x:"7",y:"7",rx:"1"}],["rect",{width:"7",height:"5",x:"10",y:"12",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wm=[["path",{d:"m11.9 12.1 4.514-4.514"}],["path",{d:"M20.1 2.3a1 1 0 0 0-1.4 0l-1.114 1.114A2 2 0 0 0 17 4.828v1.344a2 2 0 0 1-.586 1.414A2 2 0 0 1 17.828 7h1.344a2 2 0 0 0 1.414-.586L21.7 5.3a1 1 0 0 0 0-1.4z"}],["path",{d:"m6 16 2 2"}],["path",{d:"M8.23 9.85A3 3 0 0 1 11 8a5 5 0 0 1 5 5 3 3 0 0 1-1.85 2.77l-.92.38A2 2 0 0 0 12 18a4 4 0 0 1-4 4 6 6 0 0 1-6-6 4 4 0 0 1 4-4 2 2 0 0 0 1.85-1.23z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jm=[["path",{d:"M13.144 21.144A7.274 10.445 45 1 0 2.856 10.856"}],["path",{d:"M13.144 21.144A7.274 4.365 45 0 0 2.856 10.856a7.274 4.365 45 0 0 10.288 10.288"}],["path",{d:"M16.565 10.435 18.6 8.4a2.501 2.501 0 1 0 1.65-4.65 2.5 2.5 0 1 0-4.66 1.66l-2.024 2.025"}],["path",{d:"m8.5 16.5-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gm=[["path",{d:"M12 16H4a2 2 0 1 1 0-4h16a2 2 0 1 1 0 4h-4.25"}],["path",{d:"M5 12a2 2 0 0 1-2-2 9 7 0 0 1 18 0 2 2 0 0 1-2 2"}],["path",{d:"M5 16a2 2 0 0 0-2 2 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 2 2 0 0 0-2-2q0 0 0 0"}],["path",{d:"m6.67 12 6.13 4.6a2 2 0 0 0 2.8-.4l3.15-4.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zm=[["path",{d:"m15 12-8.373 8.373a1 1 0 1 1-3-3L12 9"}],["path",{d:"m18 15 4-4"}],["path",{d:"m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172V7l-2.26-2.26a6 6 0 0 0-4.202-1.756L9 2.96l.92.82A6.18 6.18 0 0 1 12 8.4V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xm=[["path",{d:"M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"}],["path",{d:"m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 16 6 6"}],["circle",{cx:"16",cy:"9",r:"2.9"}],["circle",{cx:"6",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Um=[["path",{d:"M11 14h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 16"}],["path",{d:"m7 20 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 15 6 6"}],["path",{d:"M19.5 8.5c.7-.7 1.5-1.6 1.5-2.7A2.73 2.73 0 0 0 16 4a2.78 2.78 0 0 0-5 1.8c0 1.2.8 2 1.5 2.8L16 12Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fn=[["path",{d:"M11 12h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 14"}],["path",{d:"m7 18 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"}],["path",{d:"m2 13 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ym=[["path",{d:"M18 12.5V10a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1.4"}],["path",{d:"M14 11V9a2 2 0 1 0-4 0v2"}],["path",{d:"M10 10.5V5a2 2 0 1 0-4 0v9"}],["path",{d:"m7 15-1.76-1.76a2 2 0 0 0-2.83 2.82l3.6 3.6C7.5 21.14 9.2 22 12 22h2a8 8 0 0 0 8-8V7a2 2 0 1 0-4 0v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Km=[["path",{d:"M12 3V2"}],["path",{d:"m15.4 17.4 3.2-2.8a2 2 0 1 1 2.8 2.9l-3.6 3.3c-.7.8-1.7 1.2-2.8 1.2h-4c-1.1 0-2.1-.4-2.8-1.2l-1.302-1.464A1 1 0 0 0 6.151 19H5"}],["path",{d:"M2 14h12a2 2 0 0 1 0 4h-2"}],["path",{d:"M4 10h16"}],["path",{d:"M5 10a7 7 0 0 1 14 0"}],["path",{d:"M5 14v6a1 1 0 0 1-1 1H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qm=[["path",{d:"M18 11V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M14 10V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"}],["path",{d:"M10 10.5V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2v8"}],["path",{d:"M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jm=[["path",{d:"m11 17 2 2a1 1 0 1 0 3-3"}],["path",{d:"m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"}],["path",{d:"m21 3 1 11h-2"}],["path",{d:"M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"}],["path",{d:"M3 4h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t7=[["path",{d:"M12 2v8"}],["path",{d:"m16 6-4 4-4-4"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e7=[["path",{d:"m16 6-4-4-4 4"}],["path",{d:"M12 2v8"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6 18h.01"}],["path",{d:"M10 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a7=[["line",{x1:"22",x2:"2",y1:"12",y2:"12"}],["path",{d:"M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"}],["line",{x1:"6",x2:"6.01",y1:"16",y2:"16"}],["line",{x1:"10",x2:"10.01",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i7=[["path",{d:"M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5"}],["path",{d:"M14 6a6 6 0 0 1 6 6v3"}],["path",{d:"M4 15v-3a6 6 0 0 1 6-6"}],["rect",{x:"2",y:"15",width:"20",height:"4",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r7=[["line",{x1:"4",x2:"20",y1:"9",y2:"9"}],["line",{x1:"4",x2:"20",y1:"15",y2:"15"}],["line",{x1:"10",x2:"8",y1:"3",y2:"21"}],["line",{x1:"16",x2:"14",y1:"3",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n7=[["path",{d:"m5.2 6.2 1.4 1.4"}],["path",{d:"M2 13h2"}],["path",{d:"M20 13h2"}],["path",{d:"m17.4 7.6 1.4-1.4"}],["path",{d:"M22 17H2"}],["path",{d:"M22 21H2"}],["path",{d:"M16 13a4 4 0 0 0-8 0"}],["path",{d:"M12 5V2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s7=[["path",{d:"M22 9a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1l2 2h12l2-2h1a1 1 0 0 0 1-1Z"}],["path",{d:"M7.5 12h9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o7=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"m17 12 3-2v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h7=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M21 18h-4c0-4 4-3 4-6 0-1.5-2-2.5-4-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l7=[["path",{d:"M12 18V6"}],["path",{d:"M17 10v3a1 1 0 0 0 1 1h3"}],["path",{d:"M21 10v8"}],["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d7=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M17.5 10.5c1.7-1 3.5 0 3.5 1.5a2 2 0 0 1-2 2"}],["path",{d:"M17 17.5c2 1.5 4 .3 4-1.5a2 2 0 0 0-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c7=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["path",{d:"M17 13v-3h4"}],["path",{d:"M17 17.7c.4.2.8.3 1.3.3 1.5 0 2.7-1.1 2.7-2.5S19.8 13 18.3 13H17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p7=[["path",{d:"M4 12h8"}],["path",{d:"M4 18V6"}],["path",{d:"M12 18V6"}],["circle",{cx:"19",cy:"16",r:"2"}],["path",{d:"M20 10c-2 2-3 3.5-3 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u7=[["path",{d:"M6 12h12"}],["path",{d:"M6 20V4"}],["path",{d:"M18 20V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f7=[["path",{d:"M21 14h-1.343"}],["path",{d:"M9.128 3.47A9 9 0 0 1 21 12v3.343"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20.414 20.414A2 2 0 0 1 19 21h-1a2 2 0 0 1-2-2v-3"}],["path",{d:"M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 2.636-6.364"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M7=[["path",{d:"M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m7=[["path",{d:"M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z"}],["path",{d:"M21 16v2a4 4 0 0 1-4 4h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v7=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"m12 13-1-1 2-2-3-3 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g7=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"}],["path",{d:"m18 15-2-2"}],["path",{d:"m15 18-2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y7=[["path",{d:"M13.5 19.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5A5.5 5.5 0 0 1 7.5 3c1.76 0 3 .5 4.5 2 1.5-1.5 2.74-2 4.5-2a5.5 5.5 0 0 1 5.402 6.5"}],["path",{d:"M15 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x7=[["line",{x1:"2",y1:"2",x2:"22",y2:"22"}],["path",{d:"M16.5 16.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5a5.5 5.5 0 0 1 2.14-4.35"}],["path",{d:"M8.76 3.1c1.15.22 2.13.78 3.24 1.9 1.5-1.5 2.74-2 4.5-2A5.5 5.5 0 0 1 22 8.5c0 2.12-1.3 3.78-2.67 5.17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w7=[["path",{d:"M13.5 19.5 12 21l-7-7c-1.5-1.45-3-3.2-3-5.5A5.5 5.5 0 0 1 7.5 3c1.76 0 3 .5 4.5 2 1.5-1.5 2.74-2 4.5-2a5.5 5.5 0 0 1 5.402 6.5"}],["path",{d:"M15 15h6"}],["path",{d:"M18 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b7=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}],["path",{d:"M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E7=[["path",{d:"M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S7=[["path",{d:"M11 8c2-3-2-3 0-6"}],["path",{d:"M15.5 8c2-3-2-3 0-6"}],["path",{d:"M6 10h.01"}],["path",{d:"M6 14h.01"}],["path",{d:"M10 16v-4"}],["path",{d:"M14 16v-4"}],["path",{d:"M18 16v-4"}],["path",{d:"M20 6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3"}],["path",{d:"M5 20v2"}],["path",{d:"M19 20v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C7=[["path",{d:"M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A7=[["path",{d:"m9 11-6 6v3h9l3-3"}],["path",{d:"m22 12-4.6 4.6a2 2 0 0 1-2.8 0l-5.2-5.2a2 2 0 0 1 0-2.8L14 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T7=[["path",{d:"M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["path",{d:"M12 7v5l4 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _7=[["path",{d:"M10.82 16.12c1.69.6 3.91.79 5.18.85.28.01.53-.09.7-.27"}],["path",{d:"M11.14 20.57c.52.24 2.44 1.12 4.08 1.37.46.06.86-.25.9-.71.12-1.52-.3-3.43-.5-4.28"}],["path",{d:"M16.13 21.05c1.65.63 3.68.84 4.87.91a.9.9 0 0 0 .7-.26"}],["path",{d:"M17.99 5.52a20.83 20.83 0 0 1 3.15 4.5.8.8 0 0 1-.68 1.13c-1.17.1-2.5.02-3.9-.25"}],["path",{d:"M20.57 11.14c.24.52 1.12 2.44 1.37 4.08.04.3-.08.59-.31.75"}],["path",{d:"M4.93 4.93a10 10 0 0 0-.67 13.4c.35.43.96.4 1.17-.12.69-1.71 1.07-5.07 1.07-6.71 1.34.45 3.1.9 4.88.62a.85.85 0 0 0 .48-.24"}],["path",{d:"M5.52 17.99c1.05.95 2.91 2.42 4.5 3.15a.8.8 0 0 0 1.13-.68c.2-2.34-.33-5.3-1.57-8.28"}],["path",{d:"M8.35 2.68a10 10 0 0 1 9.98 1.58c.43.35.4.96-.12 1.17-1.5.6-4.3.98-6.07 1.05"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H7=[["path",{d:"M10.82 16.12c1.69.6 3.91.79 5.18.85.55.03 1-.42.97-.97-.06-1.27-.26-3.5-.85-5.18"}],["path",{d:"M11.5 6.5c1.64 0 5-.38 6.71-1.07.52-.2.55-.82.12-1.17A10 10 0 0 0 4.26 18.33c.35.43.96.4 1.17-.12.69-1.71 1.07-5.07 1.07-6.71 1.34.45 3.1.9 4.88.62a.88.88 0 0 0 .73-.74c.3-2.14-.15-3.5-.61-4.88"}],["path",{d:"M15.62 16.95c.2.85.62 2.76.5 4.28a.77.77 0 0 1-.9.7 16.64 16.64 0 0 1-4.08-1.36"}],["path",{d:"M16.13 21.05c1.65.63 3.68.84 4.87.91a.9.9 0 0 0 .96-.96 17.68 17.68 0 0 0-.9-4.87"}],["path",{d:"M16.94 15.62c.86.2 2.77.62 4.29.5a.77.77 0 0 0 .7-.9 16.64 16.64 0 0 0-1.36-4.08"}],["path",{d:"M17.99 5.52a20.82 20.82 0 0 1 3.15 4.5.8.8 0 0 1-.68 1.13c-2.33.2-5.3-.32-8.27-1.57"}],["path",{d:"M4.93 4.93 3 3a.7.7 0 0 1 0-1"}],["path",{d:"M9.58 12.18c1.24 2.98 1.77 5.95 1.57 8.28a.8.8 0 0 1-1.13.68 20.82 20.82 0 0 1-4.5-3.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L7=[["path",{d:"M12 6v4"}],["path",{d:"M14 14h-4"}],["path",{d:"M14 18h-4"}],["path",{d:"M14 8h-4"}],["path",{d:"M18 12h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h2"}],["path",{d:"M18 22V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V7=[["path",{d:"M10 22v-6.57"}],["path",{d:"M12 11h.01"}],["path",{d:"M12 7h.01"}],["path",{d:"M14 15.43V22"}],["path",{d:"M15 16a5 5 0 0 0-6 0"}],["path",{d:"M16 11h.01"}],["path",{d:"M16 7h.01"}],["path",{d:"M8 11h.01"}],["path",{d:"M8 7h.01"}],["rect",{x:"4",y:"2",width:"16",height:"20",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P7=[["path",{d:"M5 22h14"}],["path",{d:"M5 2h14"}],["path",{d:"M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"}],["path",{d:"M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D7=[["path",{d:"M10 12V8.964"}],["path",{d:"M14 12V8.964"}],["path",{d:"M15 12a1 1 0 0 1 1 1v2a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-2a1 1 0 0 1 1-1z"}],["path",{d:"M8.5 21H5a2 2 0 0 1-2-2v-9a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2h-5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O7=[["path",{d:"M12.662 21H5a2 2 0 0 1-2-2v-9a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v2.475"}],["path",{d:"M14.959 12.717A1 1 0 0 0 14 12h-4a1 1 0 0 0-1 1v8"}],["path",{d:"M15 18h6"}],["path",{d:"M18 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k7=[["path",{d:"M9.5 13.866a4 4 0 0 1 5 .01"}],["path",{d:"M12 17h.01"}],["path",{d:"M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}],["path",{d:"M7 10.754a8 8 0 0 1 10 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qn=[["path",{d:"M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"}],["path",{d:"M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wn=[["path",{d:"M12 17c5 0 8-2.69 8-6H4c0 3.31 3 6 8 6m-4 4h8m-4-3v3M5.14 11a3.5 3.5 0 1 1 6.71 0"}],["path",{d:"M12.14 11a3.5 3.5 0 1 1 6.71 0"}],["path",{d:"M15.5 6.5a3.5 3.5 0 1 0-7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jn=[["path",{d:"m7 11 4.08 10.35a1 1 0 0 0 1.84 0L17 11"}],["path",{d:"M17 7A5 5 0 0 0 7 7"}],["path",{d:"M17 7a2 2 0 0 1 0 4H7a2 2 0 0 1 0-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I7=[["path",{d:"M13.5 8h-3"}],["path",{d:"m15 2-1 2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h3"}],["path",{d:"M16.899 22A5 5 0 0 0 7.1 22"}],["path",{d:"m9 2 3 6"}],["circle",{cx:"12",cy:"15",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N7=[["path",{d:"M16 10h2"}],["path",{d:"M16 14h2"}],["path",{d:"M6.17 15a3 3 0 0 1 5.66 0"}],["circle",{cx:"9",cy:"11",r:"2"}],["rect",{x:"2",y:"5",width:"20",height:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z7=[["path",{d:"M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21"}],["path",{d:"m14 19 3 3v-5.5"}],["path",{d:"m17 22 3-3"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $7=[["path",{d:"M21 9v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"}],["line",{x1:"16",x2:"22",y1:"5",y2:"5"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R7=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M10.41 10.41a2 2 0 1 1-2.83-2.83"}],["line",{x1:"13.5",x2:"6",y1:"13.5",y2:"21"}],["line",{x1:"18",x2:"21",y1:"12",y2:"15"}],["path",{d:"M3.59 3.59A1.99 1.99 0 0 0 3 5v14a2 2 0 0 0 2 2h14c.55 0 1.052-.22 1.41-.59"}],["path",{d:"M21 15V5a2 2 0 0 0-2-2H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B7=[["path",{d:"m11 16-5 5"}],["path",{d:"M11 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6.5"}],["path",{d:"M15.765 22a.5.5 0 0 1-.765-.424V13.38a.5.5 0 0 1 .765-.424l5.878 3.674a1 1 0 0 1 0 1.696z"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F7=[["path",{d:"M16 5h6"}],["path",{d:"M19 2v6"}],["path",{d:"M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q7=[["path",{d:"M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21"}],["path",{d:"m14 19.5 3-3 3 3"}],["path",{d:"M17 22v-5.5"}],["circle",{cx:"9",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W7=[["path",{d:"M16 3h5v5"}],["path",{d:"M17 21h2a2 2 0 0 0 2-2"}],["path",{d:"M21 12v3"}],["path",{d:"m21 3-5 5"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2"}],["path",{d:"m5 21 4.144-4.144a1.21 1.21 0 0 1 1.712 0L13 19"}],["path",{d:"M9 3h3"}],["rect",{x:"3",y:"11",width:"10",height:"10",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j7=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["circle",{cx:"9",cy:"9",r:"2"}],["path",{d:"m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G7=[["path",{d:"M18 22H4a2 2 0 0 1-2-2V6"}],["path",{d:"m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"}],["circle",{cx:"12",cy:"8",r:"2"}],["rect",{width:"16",height:"16",x:"6",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z7=[["path",{d:"M12 3v12"}],["path",{d:"m8 11 4 4 4-4"}],["path",{d:"M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X7=[["polyline",{points:"22 12 16 12 14 15 10 15 8 12 2 12"}],["path",{d:"M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gn=[["path",{d:"M21 12H11"}],["path",{d:"M21 18H11"}],["path",{d:"M21 6H11"}],["path",{d:"m7 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zn=[["path",{d:"M21 12H11"}],["path",{d:"M21 18H11"}],["path",{d:"M21 6H11"}],["path",{d:"m3 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U7=[["path",{d:"M6 3h12"}],["path",{d:"M6 8h12"}],["path",{d:"m6 13 8.5 8"}],["path",{d:"M6 13h3"}],["path",{d:"M9 13c6.667 0 6.667-10 0-10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y7=[["path",{d:"M6 16c5 0 7-8 12-8a4 4 0 0 1 0 8c-5 0-7-8-12-8a4 4 0 1 0 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K7=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M12 16v-4"}],["path",{d:"M12 8h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q7=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7h.01"}],["path",{d:"M17 7h.01"}],["path",{d:"M7 17h.01"}],["path",{d:"M17 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J7=[["rect",{width:"20",height:"20",x:"2",y:"2",rx:"5",ry:"5"}],["path",{d:"M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"}],["line",{x1:"17.5",x2:"17.51",y1:"6.5",y2:"6.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tv=[["line",{x1:"19",x2:"10",y1:"4",y2:"4"}],["line",{x1:"14",x2:"5",y1:"20",y2:"20"}],["line",{x1:"15",x2:"9",y1:"4",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ev=[["path",{d:"m16 14 4 4-4 4"}],["path",{d:"M20 10a8 8 0 1 0-8 8h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const av=[["path",{d:"M4 10a8 8 0 1 1 8 8H4"}],["path",{d:"m8 22-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iv=[["path",{d:"M12 9.5V21m0-11.5L6 3m6 6.5L18 3"}],["path",{d:"M6 15h12"}],["path",{d:"M6 11h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rv=[["path",{d:"M6 5v11"}],["path",{d:"M12 5v6"}],["path",{d:"M18 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nv=[["path",{d:"M21 17a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2Z"}],["path",{d:"M6 15v-2"}],["path",{d:"M12 15V9"}],["circle",{cx:"12",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sv=[["path",{d:"M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"}],["circle",{cx:"16.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ov=[["path",{d:"M12.4 2.7a2.5 2.5 0 0 1 3.4 0l5.5 5.5a2.5 2.5 0 0 1 0 3.4l-3.7 3.7a2.5 2.5 0 0 1-3.4 0L8.7 9.8a2.5 2.5 0 0 1 0-3.4z"}],["path",{d:"m14 7 3 3"}],["path",{d:"m9.4 10.6-6.814 6.814A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hv=[["path",{d:"m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 1 0 0 0 0-1.4L19 4"}],["path",{d:"m21 2-9.6 9.6"}],["circle",{cx:"7.5",cy:"15.5",r:"5.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lv=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M6 8h4"}],["path",{d:"M14 8h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"M2 12h20"}],["path",{d:"M6 12v4"}],["path",{d:"M10 12v4"}],["path",{d:"M14 12v4"}],["path",{d:"M18 12v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dv=[["path",{d:"M 20 4 A2 2 0 0 1 22 6"}],["path",{d:"M 22 6 L 22 16.41"}],["path",{d:"M 7 16 L 16 16"}],["path",{d:"M 9.69 4 L 20 4"}],["path",{d:"M14 8h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"}],["path",{d:"M6 8h.01"}],["path",{d:"M8 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cv=[["path",{d:"M10 8h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M14 8h.01"}],["path",{d:"M16 12h.01"}],["path",{d:"M18 8h.01"}],["path",{d:"M6 8h.01"}],["path",{d:"M7 16h10"}],["path",{d:"M8 12h.01"}],["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pv=[["path",{d:"M12 2v5"}],["path",{d:"M14.829 15.998a3 3 0 1 1-5.658 0"}],["path",{d:"M20.92 14.606A1 1 0 0 1 20 16H4a1 1 0 0 1-.92-1.394l3-7A1 1 0 0 1 7 7h10a1 1 0 0 1 .92.606z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uv=[["path",{d:"M10.293 2.293a1 1 0 0 1 1.414 0l2.5 2.5 5.994 1.227a1 1 0 0 1 .506 1.687l-7 7a1 1 0 0 1-1.687-.506l-1.227-5.994-2.5-2.5a1 1 0 0 1 0-1.414z"}],["path",{d:"m14.207 4.793-3.414 3.414"}],["path",{d:"M3 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"}],["path",{d:"m9.086 6.5-4.793 4.793a1 1 0 0 0-.18 1.17L7 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fv=[["path",{d:"M12 10v12"}],["path",{d:"M17.929 7.629A1 1 0 0 1 17 9H7a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 9 2h6a1 1 0 0 1 .928.629z"}],["path",{d:"M9 22h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mv=[["path",{d:"M19.929 18.629A1 1 0 0 1 19 20H9a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 11 13h6a1 1 0 0 1 .928.629z"}],["path",{d:"M6 3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"}],["path",{d:"M8 6h4a2 2 0 0 1 2 2v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mv=[["path",{d:"M19.929 9.629A1 1 0 0 1 19 11H9a1 1 0 0 1-.928-1.371l2-5A1 1 0 0 1 11 4h6a1 1 0 0 1 .928.629z"}],["path",{d:"M6 15a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1z"}],["path",{d:"M8 18h4a2 2 0 0 0 2-2v-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vv=[["path",{d:"M12 12v6"}],["path",{d:"M4.077 10.615A1 1 0 0 0 5 12h14a1 1 0 0 0 .923-1.385l-3.077-7.384A2 2 0 0 0 15 2H9a2 2 0 0 0-1.846 1.23Z"}],["path",{d:"M8 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gv=[["path",{d:"m12 8 6-3-6-3v10"}],["path",{d:"m8 11.99-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12"}],["path",{d:"m6.49 12.85 11.02 6.3"}],["path",{d:"M17.51 12.85 6.5 19.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yv=[["path",{d:"M10 18v-7"}],["path",{d:"M11.12 2.198a2 2 0 0 1 1.76.006l7.866 3.847c.476.233.31.949-.22.949H3.474c-.53 0-.695-.716-.22-.949z"}],["path",{d:"M14 18v-7"}],["path",{d:"M18 18v-7"}],["path",{d:"M3 22h18"}],["path",{d:"M6 18v-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xv=[["path",{d:"m5 8 6 6"}],["path",{d:"m4 14 6-6 2-3"}],["path",{d:"M2 5h12"}],["path",{d:"M7 2h1"}],["path",{d:"m22 22-5-10-5 10"}],["path",{d:"M14 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wv=[["path",{d:"M2 20h20"}],["path",{d:"m9 10 2 2 4-4"}],["rect",{x:"3",y:"4",width:"18",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xn=[["rect",{width:"18",height:"12",x:"3",y:"4",rx:"2",ry:"2"}],["line",{x1:"2",x2:"22",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bv=[["path",{d:"M18 5a2 2 0 0 1 2 2v8.526a2 2 0 0 0 .212.897l1.068 2.127a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45l1.068-2.127A2 2 0 0 0 4 15.526V7a2 2 0 0 1 2-2z"}],["path",{d:"M20.054 15.987H3.946"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ev=[["path",{d:"M7 22a5 5 0 0 1-2-4"}],["path",{d:"M7 16.93c.96.43 1.96.74 2.99.91"}],["path",{d:"M3.34 14A6.8 6.8 0 0 1 2 10c0-4.42 4.48-8 10-8s10 3.58 10 8a7.19 7.19 0 0 1-.33 2"}],["path",{d:"M5 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"}],["path",{d:"M14.33 22h-.09a.35.35 0 0 1-.24-.32v-10a.34.34 0 0 1 .33-.34c.08 0 .15.03.21.08l7.34 6a.33.33 0 0 1-.21.59h-4.49l-2.57 3.85a.35.35 0 0 1-.28.14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sv=[["path",{d:"M7 22a5 5 0 0 1-2-4"}],["path",{d:"M3.3 14A6.8 6.8 0 0 1 2 10c0-4.4 4.5-8 10-8s10 3.6 10 8-4.5 8-10 8a12 12 0 0 1-5-1"}],["path",{d:"M5 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cv=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M18 13a6 6 0 0 1-6 5 6 6 0 0 1-6-5h12Z"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Av=[["path",{d:"M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74z"}],["path",{d:"m20 14.285 1.5.845a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74l1.5-.845"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Un=[["path",{d:"M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"}],["path",{d:"M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"}],["path",{d:"M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tv=[["rect",{width:"7",height:"9",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"5",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"9",x:"14",y:"12",rx:"1"}],["rect",{width:"7",height:"5",x:"3",y:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _v=[["rect",{width:"7",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hv=[["rect",{width:"7",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}],["path",{d:"M14 4h7"}],["path",{d:"M14 9h7"}],["path",{d:"M14 15h7"}],["path",{d:"M14 20h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lv=[["rect",{width:"7",height:"18",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vv=[["rect",{width:"18",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"9",height:"7",x:"3",y:"14",rx:"1"}],["rect",{width:"5",height:"7",x:"16",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pv=[["rect",{width:"18",height:"7",x:"3",y:"3",rx:"1"}],["rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"}],["rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dv=[["path",{d:"M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"}],["path",{d:"M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ov=[["path",{d:"M2 22c1.25-.987 2.27-1.975 3.9-2.2a5.56 5.56 0 0 1 3.8 1.5 4 4 0 0 0 6.187-2.353 3.5 3.5 0 0 0 3.69-5.116A3.5 3.5 0 0 0 20.95 8 3.5 3.5 0 1 0 16 3.05a3.5 3.5 0 0 0-5.831 1.373 3.5 3.5 0 0 0-5.116 3.69 4 4 0 0 0-2.348 6.155C3.499 15.42 4.409 16.712 4.2 18.1 3.926 19.743 3.014 20.732 2 22"}],["path",{d:"M2 22 17 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kv=[["path",{d:"M16 12h3a2 2 0 0 0 1.902-1.38l1.056-3.333A1 1 0 0 0 21 6H3a1 1 0 0 0-.958 1.287l1.056 3.334A2 2 0 0 0 5 12h3"}],["path",{d:"M18 6V3a1 1 0 0 0-1-1h-3"}],["rect",{width:"8",height:"12",x:"8",y:"10",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iv=[["path",{d:"M15 12h6"}],["path",{d:"M15 6h6"}],["path",{d:"m3 13 3.553-7.724a.5.5 0 0 1 .894 0L11 13"}],["path",{d:"M3 18h18"}],["path",{d:"M3.92 11h6.16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nv=[["rect",{width:"8",height:"18",x:"3",y:"3",rx:"1"}],["path",{d:"M7 3v18"}],["path",{d:"M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zv=[["path",{d:"m16 6 4 14"}],["path",{d:"M12 6v14"}],["path",{d:"M8 8v12"}],["path",{d:"M4 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $v=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"m4.93 4.93 4.24 4.24"}],["path",{d:"m14.83 9.17 4.24-4.24"}],["path",{d:"m14.83 14.83 4.24 4.24"}],["path",{d:"m9.17 14.83-4.24 4.24"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rv=[["path",{d:"M14 12h2v8"}],["path",{d:"M14 20h4"}],["path",{d:"M6 12h4"}],["path",{d:"M6 20h4"}],["path",{d:"M8 20V8a4 4 0 0 1 7.464-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bv=[["path",{d:"M16.8 11.2c.8-.9 1.2-2 1.2-3.2a6 6 0 0 0-9.3-5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M6.3 6.3a4.67 4.67 0 0 0 1.2 5.2c.7.7 1.3 1.5 1.5 2.5"}],["path",{d:"M9 18h6"}],["path",{d:"M10 22h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fv=[["path",{d:"M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"}],["path",{d:"M9 18h6"}],["path",{d:"M10 22h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qv=[["path",{d:"M7 3.5c5-2 7 2.5 3 4C1.5 10 2 15 5 16c5 2 9-10 14-7s.5 13.5-4 12c-5-2.5.5-11 6-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wv=[["path",{d:"M9 17H7A5 5 0 0 1 7 7"}],["path",{d:"M15 7h2a5 5 0 0 1 4 8"}],["line",{x1:"8",x2:"12",y1:"12",y2:"12"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jv=[["path",{d:"M9 17H7A5 5 0 0 1 7 7h2"}],["path",{d:"M15 7h2a5 5 0 1 1 0 10h-2"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gv=[["path",{d:"M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"}],["path",{d:"M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zv=[["path",{d:"M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"}],["rect",{width:"4",height:"12",x:"2",y:"9"}],["circle",{cx:"4",cy:"4",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xv=[["path",{d:"M11 18H3"}],["path",{d:"m15 18 2 2 4-4"}],["path",{d:"M16 12H3"}],["path",{d:"M16 6H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uv=[["path",{d:"m3 17 2 2 4-4"}],["path",{d:"m3 7 2 2 4-4"}],["path",{d:"M13 6h8"}],["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yv=[["path",{d:"M10 12h11"}],["path",{d:"M10 18h11"}],["path",{d:"M10 6h11"}],["path",{d:"m3 10 3-3-3-3"}],["path",{d:"m3 20 3-3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kv=[["path",{d:"M16 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M10 18H3"}],["path",{d:"M21 6v10a2 2 0 0 1-2 2h-5"}],["path",{d:"m16 16-2 2 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qv=[["path",{d:"M10 18h4"}],["path",{d:"M11 6H3"}],["path",{d:"M15 6h6"}],["path",{d:"M18 9V3"}],["path",{d:"M7 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jv=[["path",{d:"M3 6h18"}],["path",{d:"M7 12h10"}],["path",{d:"M10 18h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tg=[["path",{d:"M21 15V6"}],["path",{d:"M18.5 18a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"}],["path",{d:"M12 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M12 18H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eg=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"M21 12h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ag=[["path",{d:"M10 12h11"}],["path",{d:"M10 18h11"}],["path",{d:"M10 6h11"}],["path",{d:"M4 10h2"}],["path",{d:"M4 6h1v4"}],["path",{d:"M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ig=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"M18 9v6"}],["path",{d:"M21 12h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rg=[["path",{d:"M21 6H3"}],["path",{d:"M7 12H3"}],["path",{d:"M7 18H3"}],["path",{d:"M12 18a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L11 14"}],["path",{d:"M11 10v4h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ng=[["path",{d:"M16 12H3"}],["path",{d:"M16 18H3"}],["path",{d:"M10 6H3"}],["path",{d:"M21 18V8a2 2 0 0 0-2-2h-5"}],["path",{d:"m16 8-2-2 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sg=[["path",{d:"M12 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M12 18H3"}],["path",{d:"m16 12 5 3-5 3v-6Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const og=[["rect",{x:"3",y:"5",width:"6",height:"6",rx:"1"}],["path",{d:"m3 17 2 2 4-4"}],["path",{d:"M13 6h8"}],["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hg=[["path",{d:"M11 12H3"}],["path",{d:"M16 6H3"}],["path",{d:"M16 18H3"}],["path",{d:"m19 10-4 4"}],["path",{d:"m15 10 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lg=[["path",{d:"M21 12h-8"}],["path",{d:"M21 6H8"}],["path",{d:"M21 18h-8"}],["path",{d:"M3 6v4c0 1.1.9 2 2 2h3"}],["path",{d:"M3 10v6c0 1.1.9 2 2 2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dg=[["path",{d:"M3 12h.01"}],["path",{d:"M3 18h.01"}],["path",{d:"M3 6h.01"}],["path",{d:"M8 12h13"}],["path",{d:"M8 18h13"}],["path",{d:"M8 6h13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yn=[["path",{d:"M21 12a9 9 0 1 1-6.219-8.56"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cg=[["path",{d:"M22 12a1 1 0 0 1-10 0 1 1 0 0 0-10 0"}],["path",{d:"M7 20.7a1 1 0 1 1 5-8.7 1 1 0 1 0 5-8.6"}],["path",{d:"M7 3.3a1 1 0 1 1 5 8.6 1 1 0 1 0 5 8.6"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pg=[["path",{d:"M12 2v4"}],["path",{d:"m16.2 7.8 2.9-2.9"}],["path",{d:"M18 12h4"}],["path",{d:"m16.2 16.2 2.9 2.9"}],["path",{d:"M12 18v4"}],["path",{d:"m4.9 19.1 2.9-2.9"}],["path",{d:"M2 12h4"}],["path",{d:"m4.9 4.9 2.9 2.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ug=[["line",{x1:"2",x2:"5",y1:"12",y2:"12"}],["line",{x1:"19",x2:"22",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"2",y2:"5"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}],["circle",{cx:"12",cy:"12",r:"7"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fg=[["path",{d:"M12 19v3"}],["path",{d:"M12 2v3"}],["path",{d:"M18.89 13.24a7 7 0 0 0-8.13-8.13"}],["path",{d:"M19 12h3"}],["path",{d:"M2 12h3"}],["path",{d:"m2 2 20 20"}],["path",{d:"M7.05 7.05a7 7 0 0 0 9.9 9.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mg=[["path",{d:"M17.97 9.304A8 8 0 0 0 2 10c0 4.69 4.887 9.562 7.022 11.468"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mg=[["line",{x1:"2",x2:"5",y1:"12",y2:"12"}],["line",{x1:"19",x2:"22",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"2",y2:"5"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}],["circle",{cx:"12",cy:"12",r:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kn=[["circle",{cx:"12",cy:"16",r:"1"}],["rect",{width:"18",height:"12",x:"3",y:"10",rx:"2"}],["path",{d:"M7 10V7a5 5 0 0 1 9.33-2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vg=[["circle",{cx:"12",cy:"16",r:"1"}],["rect",{x:"3",y:"10",width:"18",height:"12",rx:"2"}],["path",{d:"M7 10V7a5 5 0 0 1 10 0v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qn=[["rect",{width:"18",height:"11",x:"3",y:"11",rx:"2",ry:"2"}],["path",{d:"M7 11V7a5 5 0 0 1 9.9-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gg=[["rect",{width:"18",height:"11",x:"3",y:"11",rx:"2",ry:"2"}],["path",{d:"M7 11V7a5 5 0 0 1 10 0v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yg=[["path",{d:"m10 17 5-5-5-5"}],["path",{d:"M15 12H3"}],["path",{d:"M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xg=[["path",{d:"m16 17 5-5-5-5"}],["path",{d:"M21 12H9"}],["path",{d:"M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wg=[["path",{d:"M13 12h8"}],["path",{d:"M13 18h8"}],["path",{d:"M13 6h8"}],["path",{d:"M3 12h1"}],["path",{d:"M3 18h1"}],["path",{d:"M3 6h1"}],["path",{d:"M8 12h1"}],["path",{d:"M8 18h1"}],["path",{d:"M8 6h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bg=[["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}],["path",{d:"M11 11a2 2 0 0 0 4 0 4 4 0 0 0-8 0 6 6 0 0 0 12 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eg=[["path",{d:"M6 20a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"}],["path",{d:"M8 18V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v14"}],["path",{d:"M10 20h4"}],["circle",{cx:"16",cy:"20",r:"2"}],["circle",{cx:"8",cy:"20",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sg=[["path",{d:"m6 15-4-4 6.75-6.77a7.79 7.79 0 0 1 11 11L13 22l-4-4 6.39-6.36a2.14 2.14 0 0 0-3-3L6 15"}],["path",{d:"m5 8 4 4"}],["path",{d:"m12 15 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cg=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ag=[["path",{d:"M22 15V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M16 19h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tg=[["path",{d:"M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"}],["path",{d:"m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _g=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M19 16v6"}],["path",{d:"M16 19h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jn=[["path",{d:"M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M18 15.28c.2-.4.5-.8.9-1a2.1 2.1 0 0 1 2.6.4c.3.4.5.8.5 1.3 0 1.3-2 2-2 2"}],["path",{d:"M20 22v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hg=[["path",{d:"M22 12.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h7.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M18 21a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"}],["circle",{cx:"18",cy:"18",r:"3"}],["path",{d:"m22 22-1.5-1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lg=[["path",{d:"M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"M20 14v4"}],["path",{d:"M20 22v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vg=[["path",{d:"M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h9"}],["path",{d:"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"}],["path",{d:"m17 17 4 4"}],["path",{d:"m21 17-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pg=[["path",{d:"m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"}],["rect",{x:"2",y:"4",width:"20",height:"16",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dg=[["path",{d:"M22 17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5C2 7 4 5 6.5 5H18c2.2 0 4 1.8 4 4v8Z"}],["polyline",{points:"15,9 18,9 18,11"}],["path",{d:"M6.5 5C9 5 11 7 11 9.5V17a2 2 0 0 1-2 2"}],["line",{x1:"6",x2:"7",y1:"10",y2:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Og=[["rect",{width:"16",height:"13",x:"6",y:"4",rx:"2"}],["path",{d:"m22 7-7.1 3.78c-.57.3-1.23.3-1.8 0L6 7"}],["path",{d:"M2 8v11c0 1.1.9 2 2 2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kg=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"m9 10 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ig=[["path",{d:"M19.43 12.935c.357-.967.57-1.955.57-2.935a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32.197 32.197 0 0 0 .813-.728"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"m16 18 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ng=[["path",{d:"M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z"}],["path",{d:"M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2"}],["path",{d:"M18 22v-3"}],["circle",{cx:"10",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zg=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $g=[["path",{d:"M18.977 14C19.6 12.701 20 11.343 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M16 18h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rg=[["path",{d:"M12.75 7.09a3 3 0 0 1 2.16 2.16"}],["path",{d:"M17.072 17.072c-1.634 2.17-3.527 3.912-4.471 4.727a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 1.432-4.568"}],["path",{d:"m2 2 20 20"}],["path",{d:"M8.475 2.818A8 8 0 0 1 20 10c0 1.183-.31 2.377-.81 3.533"}],["path",{d:"M9.13 9.13a3 3 0 0 0 3.74 3.74"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bg=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"M12 7v6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fg=[["path",{d:"M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M16 18h6"}],["path",{d:"M19 15v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qg=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wg=[["path",{d:"M19.752 11.901A7.78 7.78 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 19 19 0 0 0 .09-.077"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"m21.5 15.5-5 5"}],["path",{d:"m21.5 20.5-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jg=[["path",{d:"M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"}],["circle",{cx:"12",cy:"10",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gg=[["path",{d:"M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0"}],["circle",{cx:"12",cy:"8",r:"2"}],["path",{d:"M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zg=[["path",{d:"m11 19-1.106-.552a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0l4.212 2.106a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619V12"}],["path",{d:"M15 5.764V12"}],["path",{d:"M18 15v6"}],["path",{d:"M21 18h-6"}],["path",{d:"M9 3.236v15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xg=[["path",{d:"M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"}],["path",{d:"M15 5.764v15"}],["path",{d:"M9 3.236v15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ug=[["path",{d:"m14 6 4 4"}],["path",{d:"M17 3h4v4"}],["path",{d:"m21 3-7.75 7.75"}],["circle",{cx:"9",cy:"15",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yg=[["path",{d:"M16 3h5v5"}],["path",{d:"m21 3-6.75 6.75"}],["circle",{cx:"10",cy:"14",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kg=[["path",{d:"M8 22h8"}],["path",{d:"M12 11v11"}],["path",{d:"m19 3-7 8-7-8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qg=[["path",{d:"M15 3h6v6"}],["path",{d:"m21 3-7 7"}],["path",{d:"m3 21 7-7"}],["path",{d:"M9 21H3v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jg=[["path",{d:"M8 3H5a2 2 0 0 0-2 2v3"}],["path",{d:"M21 8V5a2 2 0 0 0-2-2h-3"}],["path",{d:"M3 16v3a2 2 0 0 0 2 2h3"}],["path",{d:"M16 21h3a2 2 0 0 0 2-2v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t9=[["path",{d:"M7.21 15 2.66 7.14a2 2 0 0 1 .13-2.2L4.4 2.8A2 2 0 0 1 6 2h12a2 2 0 0 1 1.6.8l1.6 2.14a2 2 0 0 1 .14 2.2L16.79 15"}],["path",{d:"M11 12 5.12 2.2"}],["path",{d:"m13 12 5.88-9.8"}],["path",{d:"M8 7h8"}],["circle",{cx:"12",cy:"17",r:"5"}],["path",{d:"M12 18v-2h-.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e9=[["path",{d:"M11.636 6A13 13 0 0 0 19.4 3.2 1 1 0 0 1 21 4v11.344"}],["path",{d:"M14.378 14.357A13 13 0 0 0 11 14H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1"}],["path",{d:"m2 2 20 20"}],["path",{d:"M6 14a12 12 0 0 0 2.4 7.2 2 2 0 0 0 3.2-2.4A8 8 0 0 1 10 14"}],["path",{d:"M8 8v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a9=[["path",{d:"M11 6a13 13 0 0 0 8.4-2.8A1 1 0 0 1 21 4v12a1 1 0 0 1-1.6.8A13 13 0 0 0 11 14H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"}],["path",{d:"M6 14a12 12 0 0 0 2.4 7.2 2 2 0 0 0 3.2-2.4A8 8 0 0 1 10 14"}],["path",{d:"M8 6v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i9=[["circle",{cx:"12",cy:"12",r:"10"}],["line",{x1:"8",x2:"16",y1:"15",y2:"15"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r9=[["path",{d:"M6 19v-3"}],["path",{d:"M10 19v-3"}],["path",{d:"M14 19v-3"}],["path",{d:"M18 19v-3"}],["path",{d:"M8 11V9"}],["path",{d:"M16 11V9"}],["path",{d:"M12 11V9"}],["path",{d:"M2 15h20"}],["path",{d:"M2 7a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1.1a2 2 0 0 0 0 3.837V17a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5.1a2 2 0 0 0 0-3.837Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n9=[["path",{d:"M4 12h16"}],["path",{d:"M4 18h16"}],["path",{d:"M4 6h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s9=[["path",{d:"m8 6 4-4 4 4"}],["path",{d:"M12 2v10.3a4 4 0 0 1-1.172 2.872L4 22"}],["path",{d:"m20 22-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o9=[["path",{d:"M10 9.5 8 12l2 2.5"}],["path",{d:"m14 9.5 2 2.5-2 2.5"}],["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h9=[["path",{d:"M13.5 3.1c-.5 0-1-.1-1.5-.1s-1 .1-1.5.1"}],["path",{d:"M19.3 6.8a10.45 10.45 0 0 0-2.1-2.1"}],["path",{d:"M20.9 13.5c.1-.5.1-1 .1-1.5s-.1-1-.1-1.5"}],["path",{d:"M17.2 19.3a10.45 10.45 0 0 0 2.1-2.1"}],["path",{d:"M10.5 20.9c.5.1 1 .1 1.5.1s1-.1 1.5-.1"}],["path",{d:"M3.5 17.5 2 22l4.5-1.5"}],["path",{d:"M3.1 10.5c0 .5-.1 1-.1 1.5s.1 1 .1 1.5"}],["path",{d:"M6.8 4.7a10.45 10.45 0 0 0-2.1 2.1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M15.8 9.2a2.5 2.5 0 0 0-3.5 0l-.3.4-.35-.3a2.42 2.42 0 1 0-3.2 3.6l3.6 3.5 3.6-3.5c1.2-1.2 1.1-2.7.2-3.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M8 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p9=[["path",{d:"M20.5 14.9A9 9 0 0 0 9.1 3.5"}],["path",{d:"m2 2 20 20"}],["path",{d:"M5.6 5.6C3 8.3 2.2 12.5 4 16l-2 6 6-2c3.4 1.8 7.6 1.1 10.3-1.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ts=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"m10 15-3-3 3-3"}],["path",{d:"M7 12h7a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}],["path",{d:"M12 8v4"}],["path",{d:"M12 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m9=[["path",{d:"M7.9 20A9 9 0 1 0 4 16.1L2 22Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v9=[["path",{d:"M10 7.5 8 10l2 2.5"}],["path",{d:"m14 7.5 2 2.5-2 2.5"}],["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g9=[["path",{d:"M10 17H7l-4 4v-7"}],["path",{d:"M14 17h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 14v1a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 9v1"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M9 3h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y9=[["path",{d:"m5 19-2 2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2"}],["path",{d:"M9 10h6"}],["path",{d:"M12 7v6"}],["path",{d:"M9 17h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x9=[["path",{d:"M11.7 3H5a2 2 0 0 0-2 2v16l4-4h12a2 2 0 0 0 2-2v-2.7"}],["circle",{cx:"18",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M14.8 7.5a1.84 1.84 0 0 0-2.6 0l-.2.3-.3-.3a1.84 1.84 0 1 0-2.4 2.8L12 13l2.7-2.7c.9-.9.8-2.1.1-2.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b9=[["path",{d:"M19 15v-2a2 2 0 1 0-4 0v2"}],["path",{d:"M9 17H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v3.5"}],["rect",{x:"13",y:"15",width:"8",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M8 10h.01"}],["path",{d:"M12 10h.01"}],["path",{d:"M16 10h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S9=[["path",{d:"M21 15V5a2 2 0 0 0-2-2H9"}],["path",{d:"m2 2 20 20"}],["path",{d:"M3.6 3.6c-.4.3-.6.8-.6 1.4v16l4-4h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M12 7v6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M8 12a2 2 0 0 0 2-2V8H8"}],["path",{d:"M14 12a2 2 0 0 0 2-2V8h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"m10 7-3 3 3 3"}],["path",{d:"M17 13v-1a2 2 0 0 0-2-2H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _9=[["path",{d:"M21 12v3a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h7"}],["path",{d:"M16 3h5v5"}],["path",{d:"m16 8 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M13 8H7"}],["path",{d:"M17 12H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"M12 7v2"}],["path",{d:"M12 13h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}],["path",{d:"m14.5 7.5-5 5"}],["path",{d:"m9.5 7.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P9=[["path",{d:"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D9=[["path",{d:"M14 9a2 2 0 0 1-2 2H6l-4 4V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2z"}],["path",{d:"M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O9=[["line",{x1:"2",x2:"22",y1:"2",y2:"22"}],["path",{d:"M18.89 13.23A7.12 7.12 0 0 0 19 12v-2"}],["path",{d:"M5 10v2a7 7 0 0 0 12 5"}],["path",{d:"M15 9.34V5a3 3 0 0 0-5.68-1.33"}],["path",{d:"M9 9v3a3 3 0 0 0 5.12 2.12"}],["line",{x1:"12",x2:"12",y1:"19",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const es=[["path",{d:"m11 7.601-5.994 8.19a1 1 0 0 0 .1 1.298l.817.818a1 1 0 0 0 1.314.087L15.09 12"}],["path",{d:"M16.5 21.174C15.5 20.5 14.372 20 13 20c-2.058 0-3.928 2.356-6 2-2.072-.356-2.775-3.369-1.5-4.5"}],["circle",{cx:"16",cy:"7",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k9=[["path",{d:"M12 19v3"}],["path",{d:"M19 10v2a7 7 0 0 1-14 0v-2"}],["rect",{x:"9",y:"2",width:"6",height:"13",rx:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I9=[["path",{d:"M18 12h2"}],["path",{d:"M18 16h2"}],["path",{d:"M18 20h2"}],["path",{d:"M18 4h2"}],["path",{d:"M18 8h2"}],["path",{d:"M4 12h2"}],["path",{d:"M4 16h2"}],["path",{d:"M4 20h2"}],["path",{d:"M4 4h2"}],["path",{d:"M4 8h2"}],["path",{d:"M8 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-1.5c-.276 0-.494.227-.562.495a2 2 0 0 1-3.876 0C9.994 2.227 9.776 2 9.5 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N9=[["path",{d:"M6 18h8"}],["path",{d:"M3 22h18"}],["path",{d:"M14 22a7 7 0 1 0 0-14h-1"}],["path",{d:"M9 14h2"}],["path",{d:"M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"}],["path",{d:"M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z9=[["rect",{width:"20",height:"15",x:"2",y:"4",rx:"2"}],["rect",{width:"8",height:"7",x:"6",y:"8",rx:"1"}],["path",{d:"M18 8v7"}],["path",{d:"M6 19v2"}],["path",{d:"M18 19v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $9=[["path",{d:"M12 13v8"}],["path",{d:"M12 3v3"}],["path",{d:"M4 6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h13a2 2 0 0 0 1.152-.365l3.424-2.317a1 1 0 0 0 0-1.635l-3.424-2.318A2 2 0 0 0 17 6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R9=[["path",{d:"M8 2h8"}],["path",{d:"M9 2v1.343M15 2v2.789a4 4 0 0 0 .672 2.219l.656.984a4 4 0 0 1 .672 2.22v1.131M7.8 7.8l-.128.192A4 4 0 0 0 7 10.212V20a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3"}],["path",{d:"M7 15a6.47 6.47 0 0 1 5 0 6.472 6.472 0 0 0 3.435.435"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B9=[["path",{d:"M8 2h8"}],["path",{d:"M9 2v2.789a4 4 0 0 1-.672 2.219l-.656.984A4 4 0 0 0 7 10.212V20a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-9.789a4 4 0 0 0-.672-2.219l-.656-.984A4 4 0 0 1 15 4.788V2"}],["path",{d:"M7 15a6.472 6.472 0 0 1 5 0 6.47 6.47 0 0 0 5 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F9=[["path",{d:"m14 10 7-7"}],["path",{d:"M20 10h-6V4"}],["path",{d:"m3 21 7-7"}],["path",{d:"M4 14h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q9=[["path",{d:"M8 3v3a2 2 0 0 1-2 2H3"}],["path",{d:"M21 8h-3a2 2 0 0 1-2-2V3"}],["path",{d:"M3 16h3a2 2 0 0 1 2 2v3"}],["path",{d:"M16 21v-3a2 2 0 0 1 2-2h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W9=[["path",{d:"M5 12h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j9=[["path",{d:"m9 10 2 2 4-4"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const G9=[["path",{d:"M12 17v4"}],["path",{d:"m14.305 7.53.923-.382"}],["path",{d:"m15.228 4.852-.923-.383"}],["path",{d:"m16.852 3.228-.383-.924"}],["path",{d:"m16.852 8.772-.383.923"}],["path",{d:"m19.148 3.228.383-.924"}],["path",{d:"m19.53 9.696-.382-.924"}],["path",{d:"m20.772 4.852.924-.383"}],["path",{d:"m20.772 7.148.924.383"}],["path",{d:"M22 13v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"}],["path",{d:"M8 21h8"}],["circle",{cx:"18",cy:"6",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Z9=[["circle",{cx:"19",cy:"6",r:"3"}],["path",{d:"M22 12v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const X9=[["path",{d:"M12 13V7"}],["path",{d:"m15 10-3 3-3-3"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const U9=[["path",{d:"M17 17H4a2 2 0 0 1-2-2V5c0-1.5 1-2 1-2"}],["path",{d:"M22 15V5a2 2 0 0 0-2-2H9"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Y9=[["path",{d:"M10 13V7"}],["path",{d:"M14 13V7"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const K9=[["path",{d:"M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}],["rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Q9=[["path",{d:"M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8"}],["path",{d:"M10 19v-3.96 3.15"}],["path",{d:"M7 19h5"}],["rect",{width:"6",height:"10",x:"16",y:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const J9=[["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}],["rect",{x:"2",y:"3",width:"20",height:"14",rx:"2"}],["rect",{x:"9",y:"7",width:"6",height:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ty=[["path",{d:"m9 10 3-3 3 3"}],["path",{d:"M12 13V7"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ey=[["path",{d:"M5.5 20H8"}],["path",{d:"M17 9h.01"}],["rect",{width:"10",height:"16",x:"12",y:"4",rx:"2"}],["path",{d:"M8 6H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4"}],["circle",{cx:"17",cy:"15",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ay=[["path",{d:"m14.5 12.5-5-5"}],["path",{d:"m9.5 12.5 5-5"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["path",{d:"M12 17v4"}],["path",{d:"M8 21h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iy=[["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}],["line",{x1:"8",x2:"16",y1:"21",y2:"21"}],["line",{x1:"12",x2:"12",y1:"17",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ry=[["path",{d:"M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9"}],["path",{d:"M20 3v4"}],["path",{d:"M22 5h-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ny=[["path",{d:"M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sy=[["path",{d:"m8 3 4 8 5-5 5 15H2L8 3z"}],["path",{d:"M4.14 15.08c2.62-1.57 5.24-1.43 7.86.42 2.74 1.94 5.49 2 8.23.19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oy=[["path",{d:"M12 6v.343"}],["path",{d:"M18.218 18.218A7 7 0 0 1 5 15V9a7 7 0 0 1 .782-3.218"}],["path",{d:"M19 13.343V9A7 7 0 0 0 8.56 2.902"}],["path",{d:"M22 22 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hy=[["path",{d:"m8 3 4 8 5-5 5 15H2L8 3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ly=[["path",{d:"M4.037 4.688a.495.495 0 0 1 .651-.651l16 6.5a.5.5 0 0 1-.063.947l-6.124 1.58a2 2 0 0 0-1.438 1.435l-1.579 6.126a.5.5 0 0 1-.947.063z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dy=[["path",{d:"M2.034 2.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.944L8.204 7.545a1 1 0 0 0-.66.66l-1.066 3.443a.5.5 0 0 1-.944.033z"}],["circle",{cx:"16",cy:"16",r:"6"}],["path",{d:"m11.8 11.8 8.4 8.4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cy=[["path",{d:"M14 4.1 12 6"}],["path",{d:"m5.1 8-2.9-.8"}],["path",{d:"m6 12-1.9 2"}],["path",{d:"M7.2 2.2 8 5.1"}],["path",{d:"M9.037 9.69a.498.498 0 0 1 .653-.653l11 4.5a.5.5 0 0 1-.074.949l-4.349 1.041a1 1 0 0 0-.74.739l-1.04 4.35a.5.5 0 0 1-.95.074z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const py=[["rect",{x:"5",y:"2",width:"14",height:"20",rx:"7"}],["path",{d:"M12 6v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uy=[["path",{d:"M12.586 12.586 19 19"}],["path",{d:"M3.688 3.037a.497.497 0 0 0-.651.651l6.5 15.999a.501.501 0 0 0 .947-.062l1.569-6.083a2 2 0 0 1 1.448-1.479l6.124-1.579a.5.5 0 0 0 .063-.947z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const as=[["path",{d:"M5 3v16h16"}],["path",{d:"m5 19 6-6"}],["path",{d:"m2 6 3-3 3 3"}],["path",{d:"m18 16 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fy=[["path",{d:"M19 13v6h-6"}],["path",{d:"M5 11V5h6"}],["path",{d:"m5 5 14 14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const My=[["path",{d:"M11 19H5v-6"}],["path",{d:"M13 5h6v6"}],["path",{d:"M19 5 5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const my=[["path",{d:"M11 19H5V13"}],["path",{d:"M19 5L5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vy=[["path",{d:"M19 13V19H13"}],["path",{d:"M5 5L19 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gy=[["path",{d:"M8 18L12 22L16 18"}],["path",{d:"M12 2V22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yy=[["path",{d:"m18 8 4 4-4 4"}],["path",{d:"M2 12h20"}],["path",{d:"m6 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xy=[["path",{d:"M6 8L2 12L6 16"}],["path",{d:"M2 12H22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wy=[["path",{d:"M18 8L22 12L18 16"}],["path",{d:"M2 12H22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const by=[["path",{d:"M5 11V5H11"}],["path",{d:"M5 5L19 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ey=[["path",{d:"M13 5H19V11"}],["path",{d:"M19 5L5 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sy=[["path",{d:"M8 6L12 2L16 6"}],["path",{d:"M12 2V22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cy=[["path",{d:"M12 2v20"}],["path",{d:"m8 18 4 4 4-4"}],["path",{d:"m8 6 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ay=[["path",{d:"M12 2v20"}],["path",{d:"m15 19-3 3-3-3"}],["path",{d:"m19 9 3 3-3 3"}],["path",{d:"M2 12h20"}],["path",{d:"m5 9-3 3 3 3"}],["path",{d:"m9 5 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ty=[["circle",{cx:"8",cy:"18",r:"4"}],["path",{d:"M12 18V2l7 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _y=[["circle",{cx:"12",cy:"18",r:"4"}],["path",{d:"M16 18V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hy=[["path",{d:"M9 18V5l12-2v13"}],["path",{d:"m9 9 12-2"}],["circle",{cx:"6",cy:"18",r:"3"}],["circle",{cx:"18",cy:"16",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ly=[["path",{d:"M9 18V5l12-2v13"}],["circle",{cx:"6",cy:"18",r:"3"}],["circle",{cx:"18",cy:"16",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vy=[["path",{d:"M9.31 9.31 5 21l7-4 7 4-1.17-3.17"}],["path",{d:"M14.53 8.88 12 2l-1.17 3.17"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Py=[["polygon",{points:"12 2 19 21 12 17 5 21 12 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dy=[["path",{d:"M8.43 8.43 3 11l8 2 2 8 2.57-5.43"}],["path",{d:"M17.39 11.73 22 2l-9.73 4.61"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Oy=[["polygon",{points:"3 11 22 2 13 21 11 13 3 11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ky=[["rect",{x:"16",y:"16",width:"6",height:"6",rx:"1"}],["rect",{x:"2",y:"16",width:"6",height:"6",rx:"1"}],["rect",{x:"9",y:"2",width:"6",height:"6",rx:"1"}],["path",{d:"M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"}],["path",{d:"M12 12V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iy=[["path",{d:"M15 18h-5"}],["path",{d:"M18 14h-8"}],["path",{d:"M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2"}],["rect",{width:"8",height:"4",x:"10",y:"6",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ny=[["path",{d:"M6 8.32a7.43 7.43 0 0 1 0 7.36"}],["path",{d:"M9.46 6.21a11.76 11.76 0 0 1 0 11.58"}],["path",{d:"M12.91 4.1a15.91 15.91 0 0 1 .01 15.8"}],["path",{d:"M16.37 2a20.16 20.16 0 0 1 0 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zy=[["path",{d:"M12 2v10"}],["path",{d:"m8.5 4 7 4"}],["path",{d:"m8.5 8 7-4"}],["circle",{cx:"12",cy:"17",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $y=[["path",{d:"M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"}],["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["path",{d:"M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ry=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M9.5 8h5"}],["path",{d:"M9.5 12H16"}],["path",{d:"M9.5 16H14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const By=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M15 2v20"}],["path",{d:"M15 7h5"}],["path",{d:"M15 12h5"}],["path",{d:"M15 17h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fy=[["path",{d:"M2 6h4"}],["path",{d:"M2 10h4"}],["path",{d:"M2 14h4"}],["path",{d:"M2 18h4"}],["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M16 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qy=[["path",{d:"M8 2v4"}],["path",{d:"M12 2v4"}],["path",{d:"M16 2v4"}],["path",{d:"M16 4h2a2 2 0 0 1 2 2v2"}],["path",{d:"M20 12v2"}],["path",{d:"M20 18v2a2 2 0 0 1-2 2h-1"}],["path",{d:"M13 22h-2"}],["path",{d:"M7 22H6a2 2 0 0 1-2-2v-2"}],["path",{d:"M4 14v-2"}],["path",{d:"M4 8V6a2 2 0 0 1 2-2h2"}],["path",{d:"M8 10h6"}],["path",{d:"M8 14h8"}],["path",{d:"M8 18h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wy=[["path",{d:"M8 2v4"}],["path",{d:"M12 2v4"}],["path",{d:"M16 2v4"}],["rect",{width:"16",height:"18",x:"4",y:"4",rx:"2"}],["path",{d:"M8 10h6"}],["path",{d:"M8 14h8"}],["path",{d:"M8 18h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jy=[["path",{d:"M12 4V2"}],["path",{d:"M5 10v4a7.004 7.004 0 0 0 5.277 6.787c.412.104.802.292 1.102.592L12 22l.621-.621c.3-.3.69-.488 1.102-.592a7.01 7.01 0 0 0 4.125-2.939"}],["path",{d:"M19 10v3.343"}],["path",{d:"M12 12c-1.349-.573-1.905-1.005-2.5-2-.546.902-1.048 1.353-2.5 2-1.018-.644-1.46-1.08-2-2-1.028.71-1.69.918-3 1 1.081-1.048 1.757-2.03 2-3 .194-.776.84-1.551 1.79-2.21m11.654 5.997c.887-.457 1.28-.891 1.556-1.787 1.032.916 1.683 1.157 3 1-1.297-1.036-1.758-2.03-2-3-.5-2-4-4-8-4-.74 0-1.461.068-2.15.192"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gy=[["path",{d:"M12 4V2"}],["path",{d:"M5 10v4a7.004 7.004 0 0 0 5.277 6.787c.412.104.802.292 1.102.592L12 22l.621-.621c.3-.3.69-.488 1.102-.592A7.003 7.003 0 0 0 19 14v-4"}],["path",{d:"M12 4C8 4 4.5 6 4 8c-.243.97-.919 1.952-2 3 1.31-.082 1.972-.29 3-1 .54.92.982 1.356 2 2 1.452-.647 1.954-1.098 2.5-2 .595.995 1.151 1.427 2.5 2 1.31-.621 1.862-1.058 2.5-2 .629.977 1.162 1.423 2.5 2 1.209-.548 1.68-.967 2-2 1.032.916 1.683 1.157 3 1-1.297-1.036-1.758-2.03-2-3-.5-2-4-4-8-4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const is=[["path",{d:"M12 16h.01"}],["path",{d:"M12 8v4"}],["path",{d:"M15.312 2a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586l-4.688-4.688A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zy=[["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rs=[["path",{d:"M10 15V9"}],["path",{d:"M14 15V9"}],["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ns=[["path",{d:"m15 9-6 6"}],["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xy=[["path",{d:"M2.586 16.726A2 2 0 0 1 2 15.312V8.688a2 2 0 0 1 .586-1.414l4.688-4.688A2 2 0 0 1 8.688 2h6.624a2 2 0 0 1 1.414.586l4.688 4.688A2 2 0 0 1 22 8.688v6.624a2 2 0 0 1-.586 1.414l-4.688 4.688a2 2 0 0 1-1.414.586H8.688a2 2 0 0 1-1.414-.586z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uy=[["path",{d:"M3 20h4.5a.5.5 0 0 0 .5-.5v-.282a.52.52 0 0 0-.247-.437 8 8 0 1 1 8.494-.001.52.52 0 0 0-.247.438v.282a.5.5 0 0 0 .5.5H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yy=[["path",{d:"M3 3h6l6 18h6"}],["path",{d:"M14 3h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ky=[["path",{d:"M20.341 6.484A10 10 0 0 1 10.266 21.85"}],["path",{d:"M3.659 17.516A10 10 0 0 1 13.74 2.152"}],["circle",{cx:"12",cy:"12",r:"3"}],["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qy=[["path",{d:"M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"}],["path",{d:"m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"}],["path",{d:"m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jy=[["path",{d:"M12 3v6"}],["path",{d:"M16.76 3a2 2 0 0 1 1.8 1.1l2.23 4.479a2 2 0 0 1 .21.891V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9.472a2 2 0 0 1 .211-.894L5.45 4.1A2 2 0 0 1 7.24 3z"}],["path",{d:"M3.054 9.013h17.893"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tx=[["path",{d:"m16 16 2 2 4-4"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ex=[["path",{d:"M16 16h6"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ax=[["path",{d:"M12 22v-9"}],["path",{d:"M15.17 2.21a1.67 1.67 0 0 1 1.63 0L21 4.57a1.93 1.93 0 0 1 0 3.36L8.82 14.79a1.655 1.655 0 0 1-1.64 0L3 12.43a1.93 1.93 0 0 1 0-3.36z"}],["path",{d:"M20 13v3.87a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13"}],["path",{d:"M21 12.43a1.93 1.93 0 0 0 0-3.36L8.83 2.2a1.64 1.64 0 0 0-1.63 0L3 4.57a1.93 1.93 0 0 0 0 3.36l12.18 6.86a1.636 1.636 0 0 0 1.63 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ix=[["path",{d:"M16 16h6"}],["path",{d:"M19 13v6"}],["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rx=[["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}],["circle",{cx:"18.5",cy:"15.5",r:"2.5"}],["path",{d:"M20.27 17.27 22 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nx=[["path",{d:"M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"}],["path",{d:"m7.5 4.27 9 5.15"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["line",{x1:"12",x2:"12",y1:"22",y2:"12"}],["path",{d:"m17 13 5 5m-5 0 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sx=[["path",{d:"M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"}],["path",{d:"M12 22V12"}],["polyline",{points:"3.29 7 12 12 20.71 7"}],["path",{d:"m7.5 4.27 9 5.15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ox=[["path",{d:"m19 11-8-8-8.6 8.6a2 2 0 0 0 0 2.8l5.2 5.2c.8.8 2 .8 2.8 0L19 11Z"}],["path",{d:"m5 2 5 5"}],["path",{d:"M2 13h15"}],["path",{d:"M22 20a2 2 0 1 1-4 0c0-1.6 1.7-2.4 2-4 .3 1.6 2 2.4 2 4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hx=[["rect",{width:"16",height:"6",x:"2",y:"2",rx:"2"}],["path",{d:"M10 16v-2a2 2 0 0 1 2-2h8a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"}],["rect",{width:"4",height:"6",x:"8",y:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ss=[["path",{d:"M10 2v2"}],["path",{d:"M14 2v4"}],["path",{d:"M17 2a1 1 0 0 1 1 1v9H6V3a1 1 0 0 1 1-1z"}],["path",{d:"M6 12a1 1 0 0 0-1 1v1a2 2 0 0 0 2 2h2a1 1 0 0 1 1 1v2.9a2 2 0 1 0 4 0V17a1 1 0 0 1 1-1h2a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lx=[["path",{d:"m14.622 17.897-10.68-2.913"}],["path",{d:"M18.376 2.622a1 1 0 1 1 3.002 3.002L17.36 9.643a.5.5 0 0 0 0 .707l.944.944a2.41 2.41 0 0 1 0 3.408l-.944.944a.5.5 0 0 1-.707 0L8.354 7.348a.5.5 0 0 1 0-.707l.944-.944a2.41 2.41 0 0 1 3.408 0l.944.944a.5.5 0 0 0 .707 0z"}],["path",{d:"M9 8c-1.804 2.71-3.97 3.46-6.583 3.948a.507.507 0 0 0-.302.819l7.32 8.883a1 1 0 0 0 1.185.204C12.735 20.405 16 16.792 16 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dx=[["path",{d:"M11.25 17.25h1.5L12 18z"}],["path",{d:"m15 12 2 2"}],["path",{d:"M18 6.5a.5.5 0 0 0-.5-.5"}],["path",{d:"M20.69 9.67a4.5 4.5 0 1 0-7.04-5.5 8.35 8.35 0 0 0-3.3 0 4.5 4.5 0 1 0-7.04 5.5C2.49 11.2 2 12.88 2 14.5 2 19.47 6.48 22 12 22s10-2.53 10-7.5c0-1.62-.48-3.3-1.3-4.83"}],["path",{d:"M6 6.5a.495.495 0 0 1 .5-.5"}],["path",{d:"m9 12-2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cx=[["path",{d:"M12 22a1 1 0 0 1 0-20 10 9 0 0 1 10 9 5 5 0 0 1-5 5h-2.25a1.75 1.75 0 0 0-1.4 2.8l.3.4a1.75 1.75 0 0 1-1.4 2.8z"}],["circle",{cx:"13.5",cy:"6.5",r:".5",fill:"currentColor"}],["circle",{cx:"17.5",cy:"10.5",r:".5",fill:"currentColor"}],["circle",{cx:"6.5",cy:"12.5",r:".5",fill:"currentColor"}],["circle",{cx:"8.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const px=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}],["path",{d:"m15 8-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const os=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M14 15h1"}],["path",{d:"M19 15h2"}],["path",{d:"M3 15h2"}],["path",{d:"M9 15h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ux=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}],["path",{d:"m9 10 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"m16 15-3-3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ls=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 14v1"}],["path",{d:"M9 19v2"}],["path",{d:"M9 3v2"}],["path",{d:"M9 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ds=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"m14 9 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}],["path",{d:"m8 9 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ps=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 14v1"}],["path",{d:"M15 19v2"}],["path",{d:"M15 3v2"}],["path",{d:"M15 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}],["path",{d:"m10 15-3-3 3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"m9 16 3-3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const us=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M14 9h1"}],["path",{d:"M19 9h2"}],["path",{d:"M3 9h2"}],["path",{d:"M9 9h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"m15 14-3 3-3-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 3v18"}],["path",{d:"M9 15h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bx=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 15h12"}],["path",{d:"M15 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M9 21V9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ex=[["path",{d:"m16 6-8.414 8.586a2 2 0 0 0 2.829 2.829l8.414-8.586a4 4 0 1 0-5.657-5.657l-8.379 8.551a6 6 0 1 0 8.485 8.485l8.379-8.551"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sx=[["path",{d:"M8 21s-4-3-4-9 4-9 4-9"}],["path",{d:"M16 3s4 3 4 9-4 9-4 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cx=[["path",{d:"M11 15h2"}],["path",{d:"M12 12v3"}],["path",{d:"M12 19v3"}],["path",{d:"M15.282 19a1 1 0 0 0 .948-.68l2.37-6.988a7 7 0 1 0-13.2 0l2.37 6.988a1 1 0 0 0 .948.68z"}],["path",{d:"M9 9a3 3 0 1 1 6 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ax=[["path",{d:"M5.8 11.3 2 22l10.7-3.79"}],["path",{d:"M4 3h.01"}],["path",{d:"M22 8h.01"}],["path",{d:"M15 2h.01"}],["path",{d:"M22 20h.01"}],["path",{d:"m22 2-2.24.75a2.9 2.9 0 0 0-1.96 3.12c.1.86-.57 1.63-1.45 1.63h-.38c-.86 0-1.6.6-1.76 1.44L14 10"}],["path",{d:"m22 13-.82-.33c-.86-.34-1.82.2-1.98 1.11c-.11.7-.72 1.22-1.43 1.22H17"}],["path",{d:"m11 2 .33.82c.34.86-.2 1.82-1.11 1.98C9.52 4.9 9 5.52 9 6.23V7"}],["path",{d:"M11 13c1.93 1.93 2.83 4.17 2 5-.83.83-3.07-.07-5-2-1.93-1.93-2.83-4.17-2-5 .83-.83 3.07.07 5 2Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tx=[["rect",{x:"14",y:"4",width:"4",height:"16",rx:"1"}],["rect",{x:"6",y:"4",width:"4",height:"16",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _x=[["circle",{cx:"11",cy:"4",r:"2"}],["circle",{cx:"18",cy:"8",r:"2"}],["circle",{cx:"20",cy:"16",r:"2"}],["path",{d:"M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hx=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2"}],["path",{d:"M15 14h.01"}],["path",{d:"M9 6h6"}],["path",{d:"M9 10h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ms=[["path",{d:"M12 20h9"}],["path",{d:"M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lx=[["path",{d:"m10 10-6.157 6.162a2 2 0 0 0-.5.833l-1.322 4.36a.5.5 0 0 0 .622.624l4.358-1.323a2 2 0 0 0 .83-.5L14 13.982"}],["path",{d:"m12.829 7.172 4.359-4.346a1 1 0 1 1 3.986 3.986l-4.353 4.353"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vx=[["path",{d:"M15.707 21.293a1 1 0 0 1-1.414 0l-1.586-1.586a1 1 0 0 1 0-1.414l5.586-5.586a1 1 0 0 1 1.414 0l1.586 1.586a1 1 0 0 1 0 1.414z"}],["path",{d:"m18 13-1.375-6.874a1 1 0 0 0-.746-.776L3.235 2.028a1 1 0 0 0-1.207 1.207L5.35 15.879a1 1 0 0 0 .776.746L13 18"}],["path",{d:"m2.3 2.3 7.286 7.286"}],["circle",{cx:"11",cy:"11",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ms=[["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Px=[["path",{d:"M12 20h9"}],["path",{d:"M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"}],["path",{d:"m15 5 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dx=[["path",{d:"m10 10-6.157 6.162a2 2 0 0 0-.5.833l-1.322 4.36a.5.5 0 0 0 .622.624l4.358-1.323a2 2 0 0 0 .83-.5L14 13.982"}],["path",{d:"m12.829 7.172 4.359-4.346a1 1 0 1 1 3.986 3.986l-4.353 4.353"}],["path",{d:"m15 5 4 4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ox=[["path",{d:"M13 7 8.7 2.7a2.41 2.41 0 0 0-3.4 0L2.7 5.3a2.41 2.41 0 0 0 0 3.4L7 13"}],["path",{d:"m8 6 2-2"}],["path",{d:"m18 16 2-2"}],["path",{d:"m17 11 4.3 4.3c.94.94.94 2.46 0 3.4l-2.6 2.6c-.94.94-2.46.94-3.4 0L11 17"}],["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}],["path",{d:"m15 5 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kx=[["path",{d:"M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"}],["path",{d:"m15 5 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ix=[["path",{d:"M10.83 2.38a2 2 0 0 1 2.34 0l8 5.74a2 2 0 0 1 .73 2.25l-3.04 9.26a2 2 0 0 1-1.9 1.37H7.04a2 2 0 0 1-1.9-1.37L2.1 10.37a2 2 0 0 1 .73-2.25z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nx=[["line",{x1:"19",x2:"5",y1:"5",y2:"19"}],["circle",{cx:"6.5",cy:"6.5",r:"2.5"}],["circle",{cx:"17.5",cy:"17.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zx=[["circle",{cx:"12",cy:"5",r:"1"}],["path",{d:"m9 20 3-6 3 6"}],["path",{d:"m6 8 6 2 6-2"}],["path",{d:"M12 10v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $x=[["path",{d:"M20 11H4"}],["path",{d:"M20 7H4"}],["path",{d:"M7 21V4a1 1 0 0 1 1-1h4a1 1 0 0 1 0 12H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rx=[["path",{d:"M13 2a9 9 0 0 1 9 9"}],["path",{d:"M13 6a5 5 0 0 1 5 5"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bx=[["path",{d:"M14 6h8"}],["path",{d:"m18 2 4 4-4 4"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fx=[["path",{d:"M16 2v6h6"}],["path",{d:"m22 2-6 6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qx=[["path",{d:"m16 2 6 6"}],["path",{d:"m22 2-6 6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wx=[["path",{d:"M10.1 13.9a14 14 0 0 0 3.732 2.668 1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2 18 18 0 0 1-12.728-5.272"}],["path",{d:"M22 2 2 22"}],["path",{d:"M4.76 13.582A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 .244.473"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jx=[["path",{d:"m16 8 6-6"}],["path",{d:"M22 8V2h-6"}],["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gx=[["path",{d:"M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zx=[["line",{x1:"9",x2:"9",y1:"4",y2:"20"}],["path",{d:"M4 7c0-1.7 1.3-3 3-3h13"}],["path",{d:"M18 20c-1.7 0-3-1.3-3-3V4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xx=[["path",{d:"M18.5 8c-1.4 0-2.6-.8-3.2-2A6.87 6.87 0 0 0 2 9v11a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8.5C22 9.6 20.4 8 18.5 8"}],["path",{d:"M2 14h20"}],["path",{d:"M6 14v4"}],["path",{d:"M10 14v4"}],["path",{d:"M14 14v4"}],["path",{d:"M18 14v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ux=[["path",{d:"M14.531 12.469 6.619 20.38a1 1 0 1 1-3-3l7.912-7.912"}],["path",{d:"M15.686 4.314A12.5 12.5 0 0 0 5.461 2.958 1 1 0 0 0 5.58 4.71a22 22 0 0 1 6.318 3.393"}],["path",{d:"M17.7 3.7a1 1 0 0 0-1.4 0l-4.6 4.6a1 1 0 0 0 0 1.4l2.6 2.6a1 1 0 0 0 1.4 0l4.6-4.6a1 1 0 0 0 0-1.4z"}],["path",{d:"M19.686 8.314a12.501 12.501 0 0 1 1.356 10.225 1 1 0 0 1-1.751-.119 22 22 0 0 0-3.393-6.319"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yx=[["path",{d:"M21 9V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2h4"}],["rect",{width:"10",height:"7",x:"12",y:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kx=[["path",{d:"M2 10h6V4"}],["path",{d:"m2 4 6 6"}],["path",{d:"M21 10V7a2 2 0 0 0-2-2h-7"}],["path",{d:"M3 14v2a2 2 0 0 0 2 2h3"}],["rect",{x:"12",y:"14",width:"10",height:"7",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qx=[["path",{d:"M11 17h3v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3a3.16 3.16 0 0 0 2-2h1a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-1a5 5 0 0 0-2-4V3a4 4 0 0 0-3.2 1.6l-.3.4H11a6 6 0 0 0-6 6v1a5 5 0 0 0 2 4v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1z"}],["path",{d:"M16 10h.01"}],["path",{d:"M2 8v1a2 2 0 0 0 2 2h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jx=[["path",{d:"M14 3v11"}],["path",{d:"M14 9h-3a3 3 0 0 1 0-6h9"}],["path",{d:"M18 3v11"}],["path",{d:"M22 18H2l4-4"}],["path",{d:"m6 22-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tw=[["path",{d:"M10 3v11"}],["path",{d:"M10 9H7a1 1 0 0 1 0-6h8"}],["path",{d:"M14 3v11"}],["path",{d:"m18 14 4 4H2"}],["path",{d:"m22 18-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ew=[["path",{d:"M13 4v16"}],["path",{d:"M17 4v16"}],["path",{d:"M19 4H9.5a4.5 4.5 0 0 0 0 9H13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aw=[["path",{d:"M18 11h-4a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h4"}],["path",{d:"M6 7v13a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7"}],["rect",{width:"16",height:"5",x:"4",y:"2",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iw=[["path",{d:"m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"}],["path",{d:"m8.5 8.5 7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rw=[["path",{d:"M12 17v5"}],["path",{d:"M15 9.34V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H7.89"}],["path",{d:"m2 2 20 20"}],["path",{d:"M9 9v1.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nw=[["path",{d:"M12 17v5"}],["path",{d:"M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sw=[["path",{d:"m12 9-8.414 8.414A2 2 0 0 0 3 18.828v1.344a2 2 0 0 1-.586 1.414A2 2 0 0 1 3.828 21h1.344a2 2 0 0 0 1.414-.586L15 12"}],["path",{d:"m18 9 .4.4a1 1 0 1 1-3 3l-3.8-3.8a1 1 0 1 1 3-3l.4.4 3.4-3.4a1 1 0 1 1 3 3z"}],["path",{d:"m2 22 .414-.414"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ow=[["path",{d:"m12 14-1 1"}],["path",{d:"m13.75 18.25-1.25 1.42"}],["path",{d:"M17.775 5.654a15.68 15.68 0 0 0-12.121 12.12"}],["path",{d:"M18.8 9.3a1 1 0 0 0 2.1 7.7"}],["path",{d:"M21.964 20.732a1 1 0 0 1-1.232 1.232l-18-5a1 1 0 0 1-.695-1.232A19.68 19.68 0 0 1 15.732 2.037a1 1 0 0 1 1.232.695z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hw=[["path",{d:"M2 22h20"}],["path",{d:"M3.77 10.77 2 9l2-4.5 1.1.55c.55.28.9.84.9 1.45s.35 1.17.9 1.45L8 8.5l3-6 1.05.53a2 2 0 0 1 1.09 1.52l.72 5.4a2 2 0 0 0 1.09 1.52l4.4 2.2c.42.22.78.55 1.01.96l.6 1.03c.49.88-.06 1.98-1.06 2.1l-1.18.15c-.47.06-.95-.02-1.37-.24L4.29 11.15a2 2 0 0 1-.52-.38Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lw=[["path",{d:"M2 22h20"}],["path",{d:"M6.36 17.4 4 17l-2-4 1.1-.55a2 2 0 0 1 1.8 0l.17.1a2 2 0 0 0 1.8 0L8 12 5 6l.9-.45a2 2 0 0 1 2.09.2l4.02 3a2 2 0 0 0 2.1.2l4.19-2.06a2.41 2.41 0 0 1 1.73-.17L21 7a1.4 1.4 0 0 1 .87 1.99l-.38.76c-.23.46-.6.84-1.07 1.08L7.58 17.2a2 2 0 0 1-1.22.18Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dw=[["path",{d:"M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cw=[["polygon",{points:"6 3 20 12 6 21 6 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pw=[["path",{d:"M9 2v6"}],["path",{d:"M15 2v6"}],["path",{d:"M12 17v5"}],["path",{d:"M5 8h14"}],["path",{d:"M6 11V8h12v3a6 6 0 1 1-12 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vs=[["path",{d:"M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z"}],["path",{d:"m2 22 3-3"}],["path",{d:"M7.5 13.5 10 11"}],["path",{d:"M10.5 16.5 13 14"}],["path",{d:"m18 3-4 4h6l-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uw=[["path",{d:"M12 22v-5"}],["path",{d:"M9 8V2"}],["path",{d:"M15 8V2"}],["path",{d:"M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fw=[["path",{d:"M5 12h14"}],["path",{d:"M12 5v14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mw=[["path",{d:"M20 3a2 2 0 0 1 2 2v6a1 1 0 0 1-20 0V5a2 2 0 0 1 2-2z"}],["path",{d:"m8 10 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mw=[["path",{d:"M3 2v1c0 1 2 1 2 2S3 6 3 7s2 1 2 2-2 1-2 2 2 1 2 2"}],["path",{d:"M18 6h.01"}],["path",{d:"M6 18h.01"}],["path",{d:"M20.83 8.83a4 4 0 0 0-5.66-5.66l-12 12a4 4 0 1 0 5.66 5.66Z"}],["path",{d:"M18 11.66V22a4 4 0 0 0 4-4V6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vw=[["path",{d:"M16.85 18.58a9 9 0 1 0-9.7 0"}],["path",{d:"M8 14a5 5 0 1 1 8 0"}],["circle",{cx:"12",cy:"11",r:"1"}],["path",{d:"M13 17a1 1 0 1 0-2 0l.5 4.5a.5.5 0 1 0 1 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gw=[["path",{d:"M10 4.5V4a2 2 0 0 0-2.41-1.957"}],["path",{d:"M13.9 8.4a2 2 0 0 0-1.26-1.295"}],["path",{d:"M21.7 16.2A8 8 0 0 0 22 14v-3a2 2 0 1 0-4 0v-1a2 2 0 0 0-3.63-1.158"}],["path",{d:"m7 15-1.8-1.8a2 2 0 0 0-2.79 2.86L6 19.7a7.74 7.74 0 0 0 6 2.3h2a8 8 0 0 0 5.657-2.343"}],["path",{d:"M6 6v8"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yw=[["path",{d:"M18 8a2 2 0 0 0 0-4 2 2 0 0 0-4 0 2 2 0 0 0-4 0 2 2 0 0 0-4 0 2 2 0 0 0 0 4"}],["path",{d:"M10 22 9 8"}],["path",{d:"m14 22 1-14"}],["path",{d:"M20 8c.5 0 .9.4.8 1l-2.6 12c-.1.5-.7 1-1.2 1H7c-.6 0-1.1-.4-1.2-1L3.2 9c-.1-.6.3-1 .8-1Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xw=[["path",{d:"M22 14a8 8 0 0 1-8 8"}],["path",{d:"M18 11v-1a2 2 0 0 0-2-2a2 2 0 0 0-2 2"}],["path",{d:"M14 10V9a2 2 0 0 0-2-2a2 2 0 0 0-2 2v1"}],["path",{d:"M10 9.5V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v10"}],["path",{d:"M18 11a2 2 0 1 1 4 0v3a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ww=[["path",{d:"M18.6 14.4c.8-.8.8-2 0-2.8l-8.1-8.1a4.95 4.95 0 1 0-7.1 7.1l8.1 8.1c.9.7 2.1.7 2.9-.1Z"}],["path",{d:"m22 22-5.5-5.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bw=[["path",{d:"M18 7c0-5.333-8-5.333-8 0"}],["path",{d:"M10 7v14"}],["path",{d:"M6 21h12"}],["path",{d:"M6 13h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ew=[["path",{d:"M18.36 6.64A9 9 0 0 1 20.77 15"}],["path",{d:"M6.16 6.16a9 9 0 1 0 12.68 12.68"}],["path",{d:"M12 2v4"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sw=[["path",{d:"M12 2v10"}],["path",{d:"M18.4 6.6a9 9 0 1 1-12.77.04"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cw=[["path",{d:"M2 3h20"}],["path",{d:"M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"}],["path",{d:"m7 21 5-5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Aw=[["path",{d:"M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5"}],["path",{d:"m16 19 2 2 4-4"}],["path",{d:"M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2"}],["path",{d:"M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tw=[["path",{d:"M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"}],["rect",{x:"6",y:"14",width:"12",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _w=[["path",{d:"M5 7 3 5"}],["path",{d:"M9 6V3"}],["path",{d:"m13 7 2-2"}],["circle",{cx:"9",cy:"13",r:"3"}],["path",{d:"M11.83 12H20a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h2.17"}],["path",{d:"M16 16h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hw=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M12 9v11"}],["path",{d:"M2 9h13a2 2 0 0 1 2 2v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lw=[["path",{d:"M15.39 4.39a1 1 0 0 0 1.68-.474 2.5 2.5 0 1 1 3.014 3.015 1 1 0 0 0-.474 1.68l1.683 1.682a2.414 2.414 0 0 1 0 3.414L19.61 15.39a1 1 0 0 1-1.68-.474 2.5 2.5 0 1 0-3.014 3.015 1 1 0 0 1 .474 1.68l-1.683 1.682a2.414 2.414 0 0 1-3.414 0L8.61 19.61a1 1 0 0 0-1.68.474 2.5 2.5 0 1 1-3.014-3.015 1 1 0 0 0 .474-1.68l-1.683-1.682a2.414 2.414 0 0 1 0-3.414L4.39 8.61a1 1 0 0 1 1.68.474 2.5 2.5 0 1 0 3.014-3.015 1 1 0 0 1-.474-1.68l1.683-1.682a2.414 2.414 0 0 1 3.414 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vw=[["path",{d:"M2.5 16.88a1 1 0 0 1-.32-1.43l9-13.02a1 1 0 0 1 1.64 0l9 13.01a1 1 0 0 1-.32 1.44l-8.51 4.86a2 2 0 0 1-1.98 0Z"}],["path",{d:"M12 2v20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pw=[["rect",{width:"5",height:"5",x:"3",y:"3",rx:"1"}],["rect",{width:"5",height:"5",x:"16",y:"3",rx:"1"}],["rect",{width:"5",height:"5",x:"3",y:"16",rx:"1"}],["path",{d:"M21 16h-3a2 2 0 0 0-2 2v3"}],["path",{d:"M21 21v.01"}],["path",{d:"M12 7v3a2 2 0 0 1-2 2H7"}],["path",{d:"M3 12h.01"}],["path",{d:"M12 3h.01"}],["path",{d:"M12 16v.01"}],["path",{d:"M16 12h1"}],["path",{d:"M21 12v.01"}],["path",{d:"M12 21v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Dw=[["path",{d:"M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"}],["path",{d:"M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ow=[["path",{d:"M13 16a3 3 0 0 1 2.24 5"}],["path",{d:"M18 12h.01"}],["path",{d:"M18 21h-8a4 4 0 0 1-4-4 7 7 0 0 1 7-7h.2L9.6 6.4a1 1 0 1 1 2.8-2.8L15.8 7h.2c3.3 0 6 2.7 6 6v1a2 2 0 0 1-2 2h-1a3 3 0 0 0-3 3"}],["path",{d:"M20 8.54V4a2 2 0 1 0-4 0v3"}],["path",{d:"M7.612 12.524a3 3 0 1 0-1.6 4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kw=[["path",{d:"M19.07 4.93A10 10 0 0 0 6.99 3.34"}],["path",{d:"M4 6h.01"}],["path",{d:"M2.29 9.62A10 10 0 1 0 21.31 8.35"}],["path",{d:"M16.24 7.76A6 6 0 1 0 8.23 16.67"}],["path",{d:"M12 18h.01"}],["path",{d:"M17.99 11.66A6 6 0 0 1 15.77 16.67"}],["circle",{cx:"12",cy:"12",r:"2"}],["path",{d:"m13.41 10.59 5.66-5.66"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Iw=[["path",{d:"M12 12h.01"}],["path",{d:"M14 15.4641a4 4 0 0 1-4 0L7.52786 19.74597 A 1 1 0 0 0 7.99303 21.16211 10 10 0 0 0 16.00697 21.16211 1 1 0 0 0 16.47214 19.74597z"}],["path",{d:"M16 12a4 4 0 0 0-2-3.464l2.472-4.282a1 1 0 0 1 1.46-.305 10 10 0 0 1 4.006 6.94A1 1 0 0 1 21 12z"}],["path",{d:"M8 12a4 4 0 0 1 2-3.464L7.528 4.254a1 1 0 0 0-1.46-.305 10 10 0 0 0-4.006 6.94A1 1 0 0 0 3 12z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nw=[["path",{d:"M3 12h3.28a1 1 0 0 1 .948.684l2.298 7.934a.5.5 0 0 0 .96-.044L13.82 4.771A1 1 0 0 1 14.792 4H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zw=[["path",{d:"M5 16v2"}],["path",{d:"M19 16v2"}],["rect",{width:"20",height:"8",x:"2",y:"8",rx:"2"}],["path",{d:"M18 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $w=[["path",{d:"M16.247 7.761a6 6 0 0 1 0 8.478"}],["path",{d:"M19.075 4.933a10 10 0 0 1 0 14.134"}],["path",{d:"M4.925 19.067a10 10 0 0 1 0-14.134"}],["path",{d:"M7.753 16.239a6 6 0 0 1 0-8.478"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rw=[["path",{d:"M4.9 16.1C1 12.2 1 5.8 4.9 1.9"}],["path",{d:"M7.8 4.7a6.14 6.14 0 0 0-.8 7.5"}],["circle",{cx:"12",cy:"9",r:"2"}],["path",{d:"M16.2 4.8c2 2 2.26 5.11.8 7.47"}],["path",{d:"M19.1 1.9a9.96 9.96 0 0 1 0 14.1"}],["path",{d:"M9.5 18h5"}],["path",{d:"m8 22 4-11 4 11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bw=[["path",{d:"M20.34 17.52a10 10 0 1 0-2.82 2.82"}],["circle",{cx:"19",cy:"19",r:"2"}],["path",{d:"m13.41 13.41 4.18 4.18"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fw=[["path",{d:"M5 15h14"}],["path",{d:"M5 9h14"}],["path",{d:"m14 20-5-5 6-6-5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qw=[["path",{d:"M22 17a10 10 0 0 0-20 0"}],["path",{d:"M6 17a6 6 0 0 1 12 0"}],["path",{d:"M10 17a2 2 0 0 1 4 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ww=[["path",{d:"M13 22H4a2 2 0 0 1 0-4h12"}],["path",{d:"M13.236 18a3 3 0 0 0-2.2-5"}],["path",{d:"M16 9h.01"}],["path",{d:"M16.82 3.94a3 3 0 1 1 3.237 4.868l1.815 2.587a1.5 1.5 0 0 1-1.5 2.1l-2.872-.453a3 3 0 0 0-3.5 3"}],["path",{d:"M17 4.988a3 3 0 1 0-5.2 2.052A7 7 0 0 0 4 14.015 4 4 0 0 0 8 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jw=[["rect",{width:"12",height:"20",x:"6",y:"2",rx:"2"}],["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M12 6.5v11"}],["path",{d:"M15 9.4a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 12h5"}],["path",{d:"M16 9.5a4 4 0 1 0 0 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 7h8"}],["path",{d:"M12 17.5 8 15h1a4 4 0 0 0 0-8"}],["path",{d:"M8 11h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Uw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"m12 10 3-3"}],["path",{d:"m9 7 3 3v7.5"}],["path",{d:"M9 11h6"}],["path",{d:"M9 15h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 13h5"}],["path",{d:"M10 17V9.5a2.5 2.5 0 0 1 5 0"}],["path",{d:"M8 17h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M8 15h5"}],["path",{d:"M8 11h5a2 2 0 1 0 0-4h-3v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M10 17V7h5"}],["path",{d:"M10 11h4"}],["path",{d:"M8 15h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jw=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M14 8H8"}],["path",{d:"M16 12H8"}],["path",{d:"M13 16H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tb=[["path",{d:"M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"}],["path",{d:"M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"}],["path",{d:"M12 17.5v-11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gs=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}],["path",{d:"M12 12h.01"}],["path",{d:"M17 12h.01"}],["path",{d:"M7 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eb=[["path",{d:"M14 4v16H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"}],["circle",{cx:"14",cy:"12",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ab=[["path",{d:"M20 6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4a2 2 0 0 1-1.6-.8l-1.6-2.13a1 1 0 0 0-1.6 0L9.6 17.2A2 2 0 0 1 8 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ib=[["rect",{width:"20",height:"12",x:"2",y:"6",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rb=[["rect",{width:"12",height:"20",x:"6",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nb=[["path",{d:"M7 19H4.815a1.83 1.83 0 0 1-1.57-.881 1.785 1.785 0 0 1-.004-1.784L7.196 9.5"}],["path",{d:"M11 19h8.203a1.83 1.83 0 0 0 1.556-.89 1.784 1.784 0 0 0 0-1.775l-1.226-2.12"}],["path",{d:"m14 16-3 3 3 3"}],["path",{d:"M8.293 13.596 7.196 9.5 3.1 10.598"}],["path",{d:"m9.344 5.811 1.093-1.892A1.83 1.83 0 0 1 11.985 3a1.784 1.784 0 0 1 1.546.888l3.943 6.843"}],["path",{d:"m13.378 9.633 4.096 1.098 1.097-4.096"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sb=[["path",{d:"m15 14 5-5-5-5"}],["path",{d:"M20 9H9.5A5.5 5.5 0 0 0 4 14.5A5.5 5.5 0 0 0 9.5 20H13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ob=[["path",{d:"M21 7v6h-6"}],["path",{d:"M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3l3 2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hb=[["circle",{cx:"12",cy:"17",r:"1"}],["path",{d:"M21 7v6h-6"}],["path",{d:"M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3l3 2.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lb=[["path",{d:"M3 2v6h6"}],["path",{d:"M21 12A9 9 0 0 0 6 5.3L3 8"}],["path",{d:"M21 22v-6h-6"}],["path",{d:"M3 12a9 9 0 0 0 15 6.7l3-2.7"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const db=[["path",{d:"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["path",{d:"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"}],["path",{d:"M16 16h5v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cb=[["path",{d:"M21 8L18.74 5.74A9.75 9.75 0 0 0 12 3C11 3 10.03 3.16 9.13 3.47"}],["path",{d:"M8 16H3v5"}],["path",{d:"M3 12C3 9.51 4 7.26 5.64 5.64"}],["path",{d:"m3 16 2.26 2.26A9.75 9.75 0 0 0 12 21c2.49 0 4.74-1 6.36-2.64"}],["path",{d:"M21 12c0 1-.16 1.97-.47 2.87"}],["path",{d:"M21 3v5h-5"}],["path",{d:"M22 22 2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pb=[["path",{d:"M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"}],["path",{d:"M21 3v5h-5"}],["path",{d:"M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"}],["path",{d:"M8 16H3v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ub=[["path",{d:"M5 6a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6Z"}],["path",{d:"M5 10h14"}],["path",{d:"M15 7v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fb=[["path",{d:"M17 3v10"}],["path",{d:"m12.67 5.5 8.66 5"}],["path",{d:"m12.67 10.5 8.66-5"}],["path",{d:"M9 17a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Mb=[["path",{d:"M4 7V4h16v3"}],["path",{d:"M5 20h6"}],["path",{d:"M13 4 8 20"}],["path",{d:"m15 15 5 5"}],["path",{d:"m20 15-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mb=[["path",{d:"m17 2 4 4-4 4"}],["path",{d:"M3 11v-1a4 4 0 0 1 4-4h14"}],["path",{d:"m7 22-4-4 4-4"}],["path",{d:"M21 13v1a4 4 0 0 1-4 4H3"}],["path",{d:"M11 10h1v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vb=[["path",{d:"m2 9 3-3 3 3"}],["path",{d:"M13 18H7a2 2 0 0 1-2-2V6"}],["path",{d:"m22 15-3 3-3-3"}],["path",{d:"M11 6h6a2 2 0 0 1 2 2v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gb=[["path",{d:"m17 2 4 4-4 4"}],["path",{d:"M3 11v-1a4 4 0 0 1 4-4h14"}],["path",{d:"m7 22-4-4 4-4"}],["path",{d:"M21 13v1a4 4 0 0 1-4 4H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yb=[["path",{d:"M14 14a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M14 4a2 2 0 0 1 2-2"}],["path",{d:"M16 10a2 2 0 0 1-2-2"}],["path",{d:"M20 14a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2"}],["path",{d:"M20 2a2 2 0 0 1 2 2"}],["path",{d:"M22 8a2 2 0 0 1-2 2"}],["path",{d:"m3 7 3 3 3-3"}],["path",{d:"M6 10V5a 3 3 0 0 1 3-3h1"}],["rect",{x:"2",y:"14",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xb=[["path",{d:"M14 4a2 2 0 0 1 2-2"}],["path",{d:"M16 10a2 2 0 0 1-2-2"}],["path",{d:"M20 2a2 2 0 0 1 2 2"}],["path",{d:"M22 8a2 2 0 0 1-2 2"}],["path",{d:"m3 7 3 3 3-3"}],["path",{d:"M6 10V5a3 3 0 0 1 3-3h1"}],["rect",{x:"2",y:"14",width:"8",height:"8",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wb=[["path",{d:"m12 17-5-5 5-5"}],["path",{d:"M22 18v-2a4 4 0 0 0-4-4H7"}],["path",{d:"m7 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bb=[["path",{d:"M20 18v-2a4 4 0 0 0-4-4H4"}],["path",{d:"m9 17-5-5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Eb=[["polygon",{points:"11 19 2 12 11 5 11 19"}],["polygon",{points:"22 19 13 12 22 5 22 19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Sb=[["path",{d:"M12 11.22C11 9.997 10 9 10 8a2 2 0 0 1 4 0c0 1-.998 2.002-2.01 3.22"}],["path",{d:"m12 18 2.57-3.5"}],["path",{d:"M6.243 9.016a7 7 0 0 1 11.507-.009"}],["path",{d:"M9.35 14.53 12 11.22"}],["path",{d:"M9.35 14.53C7.728 12.246 6 10.221 6 7a6 5 0 0 1 12 0c-.005 3.22-1.778 5.235-3.43 7.5l3.557 4.527a1 1 0 0 1-.203 1.43l-1.894 1.36a1 1 0 0 1-1.384-.215L12 18l-2.679 3.593a1 1 0 0 1-1.39.213l-1.865-1.353a1 1 0 0 1-.203-1.422z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cb=[["path",{d:"M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"}],["path",{d:"m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"}],["path",{d:"M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"}],["path",{d:"M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ab=[["polyline",{points:"3.5 2 6.5 12.5 18 12.5"}],["line",{x1:"9.5",x2:"5.5",y1:"12.5",y2:"20"}],["line",{x1:"15",x2:"18.5",y1:"12.5",y2:"20"}],["path",{d:"M2.75 18a13 13 0 0 0 18.5 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ys=[["path",{d:"M16.466 7.5C15.643 4.237 13.952 2 12 2 9.239 2 7 6.477 7 12s2.239 10 5 10c.342 0 .677-.069 1-.2"}],["path",{d:"m15.194 13.707 3.814 1.86-1.86 3.814"}],["path",{d:"M19 15.57c-1.804.885-4.274 1.43-7 1.43-5.523 0-10-2.239-10-5s4.477-5 10-5c4.838 0 8.873 1.718 9.8 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Tb=[["path",{d:"M6 19V5"}],["path",{d:"M10 19V6.8"}],["path",{d:"M14 19v-7.8"}],["path",{d:"M18 5v4"}],["path",{d:"M18 19v-6"}],["path",{d:"M22 19V9"}],["path",{d:"M2 19V9a4 4 0 0 1 4-4c2 0 4 1.33 6 4s4 4 6 4a4 4 0 1 0-3-6.65"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _b=[["path",{d:"M20 9V7a2 2 0 0 0-2-2h-6"}],["path",{d:"m15 2-3 3 3 3"}],["path",{d:"M20 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hb=[["path",{d:"m14.5 9.5 1 1"}],["path",{d:"m15.5 8.5-4 4"}],["path",{d:"M3 12a9 9 0 1 0 9-9 9.74 9.74 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}],["circle",{cx:"10",cy:"14",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Lb=[["path",{d:"M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"}],["path",{d:"M3 3v5h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vb=[["path",{d:"M12 5H6a2 2 0 0 0-2 2v3"}],["path",{d:"m9 8 3-3-3-3"}],["path",{d:"M4 14v4a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Pb=[["path",{d:"M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"}],["path",{d:"M21 3v5h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Db=[["circle",{cx:"6",cy:"19",r:"3"}],["path",{d:"M9 19h8.5c.4 0 .9-.1 1.3-.2"}],["path",{d:"M5.2 5.2A3.5 3.53 0 0 0 6.5 12H12"}],["path",{d:"m2 2 20 20"}],["path",{d:"M21 15.3a3.5 3.5 0 0 0-3.3-3.3"}],["path",{d:"M15 5h-4.3"}],["circle",{cx:"18",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ob=[["circle",{cx:"6",cy:"19",r:"3"}],["path",{d:"M9 19h8.5a3.5 3.5 0 0 0 0-7h-11a3.5 3.5 0 0 1 0-7H15"}],["circle",{cx:"18",cy:"5",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kb=[["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2"}],["path",{d:"M6.01 18H6"}],["path",{d:"M10.01 18H10"}],["path",{d:"M15 10v4"}],["path",{d:"M17.84 7.17a4 4 0 0 0-5.66 0"}],["path",{d:"M20.66 4.34a8 8 0 0 0-11.31 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 12h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ws=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 9H3"}],["path",{d:"M21 15H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ib=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 7.5H3"}],["path",{d:"M21 12H3"}],["path",{d:"M21 16.5H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Nb=[["path",{d:"M4 11a9 9 0 0 1 9 9"}],["path",{d:"M4 4a16 16 0 0 1 16 16"}],["circle",{cx:"5",cy:"19",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zb=[["path",{d:"M12 15v-3.014"}],["path",{d:"M16 15v-3.014"}],["path",{d:"M20 6H4"}],["path",{d:"M20 8V4"}],["path",{d:"M4 8V4"}],["path",{d:"M8 15v-3.014"}],["rect",{x:"3",y:"12",width:"18",height:"7",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $b=[["path",{d:"M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"}],["path",{d:"m14.5 12.5 2-2"}],["path",{d:"m11.5 9.5 2-2"}],["path",{d:"m8.5 6.5 2-2"}],["path",{d:"m17.5 15.5 2-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rb=[["path",{d:"M6 11h8a4 4 0 0 0 0-8H9v18"}],["path",{d:"M6 15h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bb=[["path",{d:"M22 18H2a4 4 0 0 0 4 4h12a4 4 0 0 0 4-4Z"}],["path",{d:"M21 14 10 2 3 14h18Z"}],["path",{d:"M10 2v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fb=[["path",{d:"M7 21h10"}],["path",{d:"M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"}],["path",{d:"M11.38 12a2.4 2.4 0 0 1-.4-4.77 2.4 2.4 0 0 1 3.2-2.77 2.4 2.4 0 0 1 3.47-.63 2.4 2.4 0 0 1 3.37 3.37 2.4 2.4 0 0 1-1.1 3.7 2.51 2.51 0 0 1 .03 1.1"}],["path",{d:"m13 12 4-4"}],["path",{d:"M10.9 7.25A3.99 3.99 0 0 0 4 10c0 .73.2 1.41.54 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qb=[["path",{d:"m2.37 11.223 8.372-6.777a2 2 0 0 1 2.516 0l8.371 6.777"}],["path",{d:"M21 15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-5.25"}],["path",{d:"M3 15a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h9"}],["path",{d:"m6.67 15 6.13 4.6a2 2 0 0 0 2.8-.4l3.15-4.2"}],["rect",{width:"20",height:"4",x:"2",y:"11",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Wb=[["path",{d:"M4 10a7.31 7.31 0 0 0 10 10Z"}],["path",{d:"m9 15 3-3"}],["path",{d:"M17 13a6 6 0 0 0-6-6"}],["path",{d:"M21 13A10 10 0 0 0 11 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jb=[["path",{d:"m13.5 6.5-3.148-3.148a1.205 1.205 0 0 0-1.704 0L6.352 5.648a1.205 1.205 0 0 0 0 1.704L9.5 10.5"}],["path",{d:"M16.5 7.5 19 5"}],["path",{d:"m17.5 10.5 3.148 3.148a1.205 1.205 0 0 1 0 1.704l-2.296 2.296a1.205 1.205 0 0 1-1.704 0L13.5 14.5"}],["path",{d:"M9 21a6 6 0 0 0-6-6"}],["path",{d:"M9.352 10.648a1.205 1.205 0 0 0 0 1.704l2.296 2.296a1.205 1.205 0 0 0 1.704 0l4.296-4.296a1.205 1.205 0 0 0 0-1.704l-2.296-2.296a1.205 1.205 0 0 0-1.704 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gb=[["path",{d:"m20 19.5-5.5 1.2"}],["path",{d:"M14.5 4v11.22a1 1 0 0 0 1.242.97L20 15.2"}],["path",{d:"m2.978 19.351 5.549-1.363A2 2 0 0 0 10 16V2"}],["path",{d:"M20 10 4 13.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zb=[["path",{d:"M10 2v3a1 1 0 0 0 1 1h5"}],["path",{d:"M18 18v-6a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6"}],["path",{d:"M18 22H4a2 2 0 0 1-2-2V6"}],["path",{d:"M8 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9.172a2 2 0 0 1 1.414.586l2.828 2.828A2 2 0 0 1 22 6.828V16a2 2 0 0 1-2.01 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xb=[["path",{d:"M13 13H8a1 1 0 0 0-1 1v7"}],["path",{d:"M14 8h1"}],["path",{d:"M17 21v-4"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20.41 20.41A2 2 0 0 1 19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 .59-1.41"}],["path",{d:"M29.5 11.5s5 5 4 5"}],["path",{d:"M9 3h6.2a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ub=[["path",{d:"M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"}],["path",{d:"M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"}],["path",{d:"M7 3v4a1 1 0 0 0 1 1h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bs=[["path",{d:"M5 7v11a1 1 0 0 0 1 1h11"}],["path",{d:"M5.293 18.707 11 13"}],["circle",{cx:"19",cy:"19",r:"2"}],["circle",{cx:"5",cy:"5",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Yb=[["path",{d:"m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"}],["path",{d:"m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"}],["path",{d:"M7 21h10"}],["path",{d:"M12 3v18"}],["path",{d:"M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Kb=[["path",{d:"M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"}],["path",{d:"M14 15H9v-5"}],["path",{d:"M16 3h5v5"}],["path",{d:"M21 3 9 15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qb=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M8 7v10"}],["path",{d:"M12 7v10"}],["path",{d:"M17 7v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Jb=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 9h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tE=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eE=[["path",{d:"M11.246 16.657a1 1 0 0 0 1.508 0l3.57-4.101A2.75 2.75 0 1 0 12 9.168a2.75 2.75 0 1 0-4.324 3.388z"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aE=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M7 12h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iE=[["path",{d:"M17 12v4a1 1 0 0 1-1 1h-4"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M17 8V7"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M7 17h.01"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["rect",{x:"7",y:"7",width:"5",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rE=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nE=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"m16 16-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sE=[["path",{d:"M3 7V5a2 2 0 0 1 2-2h2"}],["path",{d:"M17 3h2a2 2 0 0 1 2 2v2"}],["path",{d:"M21 17v2a2 2 0 0 1-2 2h-2"}],["path",{d:"M7 21H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M7 8h8"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oE=[["path",{d:"M14 22v-4a2 2 0 1 0-4 0v4"}],["path",{d:"m18 10 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7.382a1 1 0 0 1 .553-.894L6 10"}],["path",{d:"M18 5v17"}],["path",{d:"m4 6 7.106-3.553a2 2 0 0 1 1.788 0L20 6"}],["path",{d:"M6 5v17"}],["circle",{cx:"12",cy:"9",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hE=[["circle",{cx:"6",cy:"6",r:"3"}],["path",{d:"M8.12 8.12 12 12"}],["path",{d:"M20 4 8.12 15.88"}],["circle",{cx:"6",cy:"18",r:"3"}],["path",{d:"M14.8 14.8 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lE=[["path",{d:"M5.42 9.42 8 12"}],["circle",{cx:"4",cy:"8",r:"2"}],["path",{d:"m14 6-8.58 8.58"}],["circle",{cx:"4",cy:"16",r:"2"}],["path",{d:"M10.8 14.8 14 18"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dE=[["path",{d:"M13 3H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m22 3-5 5"}],["path",{d:"m17 3 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cE=[["path",{d:"M15 12h-5"}],["path",{d:"M15 8h-5"}],["path",{d:"M19 17V5a2 2 0 0 0-2-2H4"}],["path",{d:"M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pE=[["path",{d:"M13 3H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}],["path",{d:"m17 8 5-5"}],["path",{d:"M17 3h5v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uE=[["path",{d:"M19 17V5a2 2 0 0 0-2-2H4"}],["path",{d:"M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fE=[["path",{d:"m8 11 2 2 4-4"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ME=[["path",{d:"m13 13.5 2-2.5-2-2.5"}],["path",{d:"m21 21-4.3-4.3"}],["path",{d:"M9 8.5 7 11l2 2.5"}],["circle",{cx:"11",cy:"11",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mE=[["path",{d:"m13.5 8.5-5 5"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vE=[["path",{d:"m13.5 8.5-5 5"}],["path",{d:"m8.5 8.5 5 5"}],["circle",{cx:"11",cy:"11",r:"8"}],["path",{d:"m21 21-4.3-4.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gE=[["path",{d:"M16 5a4 3 0 0 0-8 0c0 4 8 3 8 7a4 3 0 0 1-8 0"}],["path",{d:"M8 19a4 3 0 0 0 8 0c0-4-8-3-8-7a4 3 0 0 1 8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yE=[["path",{d:"m21 21-4.34-4.34"}],["circle",{cx:"11",cy:"11",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Es=[["path",{d:"M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"}],["path",{d:"M6 12h16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xE=[["rect",{x:"14",y:"14",width:"8",height:"8",rx:"2"}],["rect",{x:"2",y:"2",width:"8",height:"8",rx:"2"}],["path",{d:"M7 14v1a2 2 0 0 0 2 2h1"}],["path",{d:"M14 7h1a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wE=[["path",{d:"M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"}],["path",{d:"m21.854 2.147-10.94 10.939"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bE=[["path",{d:"m16 16-4 4-4-4"}],["path",{d:"M3 12h18"}],["path",{d:"m8 8 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EE=[["path",{d:"M12 3v18"}],["path",{d:"m16 16 4-4-4-4"}],["path",{d:"m8 8-4 4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SE=[["path",{d:"m10.852 14.772-.383.923"}],["path",{d:"M13.148 14.772a3 3 0 1 0-2.296-5.544l-.383-.923"}],["path",{d:"m13.148 9.228.383-.923"}],["path",{d:"m13.53 15.696-.382-.924a3 3 0 1 1-2.296-5.544"}],["path",{d:"m14.772 10.852.923-.383"}],["path",{d:"m14.772 13.148.923.383"}],["path",{d:"M4.5 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-.5"}],["path",{d:"M4.5 14H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-.5"}],["path",{d:"M6 18h.01"}],["path",{d:"M6 6h.01"}],["path",{d:"m9.228 10.852-.923-.383"}],["path",{d:"m9.228 13.148-.923.383"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CE=[["path",{d:"M6 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2"}],["path",{d:"M6 14H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2"}],["path",{d:"M6 6h.01"}],["path",{d:"M6 18h.01"}],["path",{d:"m13 6-4 6h6l-4 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AE=[["path",{d:"M7 2h13a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-5"}],["path",{d:"M10 10 2.5 2.5C2 2 2 2.5 2 5v3a2 2 0 0 0 2 2h6z"}],["path",{d:"M22 17v-1a2 2 0 0 0-2-2h-1"}],["path",{d:"M4 14a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16.5l1-.5.5.5-8-8H4z"}],["path",{d:"M6 18h.01"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TE=[["rect",{width:"20",height:"8",x:"2",y:"2",rx:"2",ry:"2"}],["rect",{width:"20",height:"8",x:"2",y:"14",rx:"2",ry:"2"}],["line",{x1:"6",x2:"6.01",y1:"6",y2:"6"}],["line",{x1:"6",x2:"6.01",y1:"18",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _E=[["path",{d:"M14 17H5"}],["path",{d:"M19 7h-9"}],["circle",{cx:"17",cy:"17",r:"3"}],["circle",{cx:"7",cy:"7",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HE=[["path",{d:"M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z"}],["rect",{x:"3",y:"14",width:"7",height:"7",rx:"1"}],["circle",{cx:"17.5",cy:"17.5",r:"3.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LE=[["path",{d:"M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"}],["circle",{cx:"12",cy:"12",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VE=[["circle",{cx:"18",cy:"5",r:"3"}],["circle",{cx:"6",cy:"12",r:"3"}],["circle",{cx:"18",cy:"19",r:"3"}],["line",{x1:"8.59",x2:"15.42",y1:"13.51",y2:"17.49"}],["line",{x1:"15.41",x2:"8.59",y1:"6.51",y2:"10.49"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PE=[["path",{d:"M12 2v13"}],["path",{d:"m16 6-4-4-4 4"}],["path",{d:"M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DE=[["path",{d:"M14 11a2 2 0 1 1-4 0 4 4 0 0 1 8 0 6 6 0 0 1-12 0 8 8 0 0 1 16 0 10 10 0 1 1-20 0 11.93 11.93 0 0 1 2.42-7.22 2 2 0 1 1 3.16 2.44"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OE=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["line",{x1:"3",x2:"21",y1:"9",y2:"9"}],["line",{x1:"3",x2:"21",y1:"15",y2:"15"}],["line",{x1:"9",x2:"9",y1:"9",y2:"21"}],["line",{x1:"15",x2:"15",y1:"9",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M12 8v4"}],["path",{d:"M12 16h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m4.243 5.21 14.39 12.472"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M8 12h.01"}],["path",{d:"M12 12h.01"}],["path",{d:"M16 12h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $E=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M12 22V2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9 12h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BE=[["path",{d:"m2 2 20 20"}],["path",{d:"M5 5a1 1 0 0 0-1 1v7c0 5 3.5 7.5 7.67 8.94a1 1 0 0 0 .67.01c2.35-.82 4.48-1.97 5.9-3.71"}],["path",{d:"M9.309 3.652A12.252 12.252 0 0 0 11.24 2.28a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1v7a9.784 9.784 0 0 1-.08 1.264"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9 12h6"}],["path",{d:"M12 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ss=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"M6.376 18.91a6 6 0 0 1 11.249.003"}],["circle",{cx:"12",cy:"11",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Cs=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}],["path",{d:"m14.5 9.5-5 5"}],["path",{d:"m9.5 9.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WE=[["path",{d:"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jE=[["circle",{cx:"12",cy:"12",r:"8"}],["path",{d:"M12 2v7.5"}],["path",{d:"m19 5-5.23 5.23"}],["path",{d:"M22 12h-7.5"}],["path",{d:"m19 19-5.23-5.23"}],["path",{d:"M12 14.5V22"}],["path",{d:"M10.23 13.77 5 19"}],["path",{d:"M9.5 12H2"}],["path",{d:"M10.23 10.23 5 5"}],["circle",{cx:"12",cy:"12",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GE=[["path",{d:"M12 10.189V14"}],["path",{d:"M12 2v3"}],["path",{d:"M19 13V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v6"}],["path",{d:"M19.38 20A11.6 11.6 0 0 0 21 14l-8.188-3.639a2 2 0 0 0-1.624 0L3 14a11.6 11.6 0 0 0 2.81 7.76"}],["path",{d:"M2 21c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1s1.2 1 2.5 1c2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZE=[["path",{d:"M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XE=[["path",{d:"M16 10a4 4 0 0 1-8 0"}],["path",{d:"M3.103 6.034h17.794"}],["path",{d:"M3.4 5.467a2 2 0 0 0-.4 1.2V20a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6.667a2 2 0 0 0-.4-1.2l-2-2.667A2 2 0 0 0 17 2H7a2 2 0 0 0-1.6.8z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UE=[["path",{d:"m15 11-1 9"}],["path",{d:"m19 11-4-7"}],["path",{d:"M2 11h20"}],["path",{d:"m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4"}],["path",{d:"M4.5 15.5h15"}],["path",{d:"m5 11 4-7"}],["path",{d:"m9 11 1 9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YE=[["circle",{cx:"8",cy:"21",r:"1"}],["circle",{cx:"19",cy:"21",r:"1"}],["path",{d:"M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KE=[["path",{d:"M2 22v-5l5-5 5 5-5 5z"}],["path",{d:"M9.5 14.5 16 8"}],["path",{d:"m17 2 5 5-.5.5a3.53 3.53 0 0 1-5 0s0 0 0 0a3.53 3.53 0 0 1 0-5L17 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QE=[["path",{d:"m4 4 2.5 2.5"}],["path",{d:"M13.5 6.5a4.95 4.95 0 0 0-7 7"}],["path",{d:"M15 5 5 15"}],["path",{d:"M14 17v.01"}],["path",{d:"M10 16v.01"}],["path",{d:"M13 13v.01"}],["path",{d:"M16 10v.01"}],["path",{d:"M11 20v.01"}],["path",{d:"M17 14v.01"}],["path",{d:"M20 11v.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JE=[["path",{d:"M10 22v-5"}],["path",{d:"M14 19v-2"}],["path",{d:"M14 2v4a2 2 0 0 0 2 2h4"}],["path",{d:"M18 20v-3"}],["path",{d:"M2 13h20"}],["path",{d:"M20 13V7l-5-5H6a2 2 0 0 0-2 2v9"}],["path",{d:"M6 20v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tS=[["path",{d:"M11 12h.01"}],["path",{d:"M13 22c.5-.5 1.12-1 2.5-1-1.38 0-2-.5-2.5-1"}],["path",{d:"M14 2a3.28 3.28 0 0 1-3.227 1.798l-6.17-.561A2.387 2.387 0 1 0 4.387 8H15.5a1 1 0 0 1 0 13 1 1 0 0 0 0-5H12a7 7 0 0 1-7-7V8"}],["path",{d:"M14 8a8.5 8.5 0 0 1 0 8"}],["path",{d:"M16 16c2 0 4.5-4 4-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eS=[["path",{d:"m15 15 6 6m-6-6v4.8m0-4.8h4.8"}],["path",{d:"M9 19.8V15m0 0H4.2M9 15l-6 6"}],["path",{d:"M15 4.2V9m0 0h4.8M15 9l6-6"}],["path",{d:"M9 4.2V9m0 0H4.2M9 9 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aS=[["path",{d:"M12 22v-5.172a2 2 0 0 0-.586-1.414L9.5 13.5"}],["path",{d:"M14.5 14.5 12 17"}],["path",{d:"M17 8.8A6 6 0 0 1 13.8 20H10A6.5 6.5 0 0 1 7 8a5 5 0 0 1 10 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iS=[["path",{d:"m18 14 4 4-4 4"}],["path",{d:"m18 2 4 4-4 4"}],["path",{d:"M2 18h1.973a4 4 0 0 0 3.3-1.7l5.454-8.6a4 4 0 0 1 3.3-1.7H22"}],["path",{d:"M2 6h1.972a4 4 0 0 1 3.6 2.2"}],["path",{d:"M22 18h-6.041a4 4 0 0 1-3.3-1.8l-.359-.45"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rS=[["path",{d:"M18 7V5a1 1 0 0 0-1-1H6.5a.5.5 0 0 0-.4.8l4.5 6a2 2 0 0 1 0 2.4l-4.5 6a.5.5 0 0 0 .4.8H17a1 1 0 0 0 1-1v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nS=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}],["path",{d:"M17 20V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sS=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oS=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hS=[["path",{d:"M2 20h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lS=[["path",{d:"M2 20h.01"}],["path",{d:"M7 20v-4"}],["path",{d:"M12 20v-8"}],["path",{d:"M17 20V8"}],["path",{d:"M22 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dS=[["path",{d:"m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"}],["path",{d:"M3 21h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cS=[["path",{d:"M12 13v8"}],["path",{d:"M12 3v3"}],["path",{d:"M18 6a2 2 0 0 1 1.387.56l2.307 2.22a1 1 0 0 1 0 1.44l-2.307 2.22A2 2 0 0 1 18 13H6a2 2 0 0 1-1.387-.56l-2.306-2.22a1 1 0 0 1 0-1.44l2.306-2.22A2 2 0 0 1 6 6z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pS=[["path",{d:"M10 9H4L2 7l2-2h6"}],["path",{d:"M14 5h6l2 2-2 2h-6"}],["path",{d:"M10 22V4a2 2 0 1 1 4 0v18"}],["path",{d:"M8 22h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uS=[["path",{d:"M7 18v-6a5 5 0 1 1 10 0v6"}],["path",{d:"M5 21a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2z"}],["path",{d:"M21 12h1"}],["path",{d:"M18.5 4.5 18 5"}],["path",{d:"M2 12h1"}],["path",{d:"M12 2v1"}],["path",{d:"m4.929 4.929.707.707"}],["path",{d:"M12 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fS=[["polygon",{points:"19 20 9 12 19 4 19 20"}],["line",{x1:"5",x2:"5",y1:"19",y2:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MS=[["polygon",{points:"5 4 15 12 5 20 5 4"}],["line",{x1:"19",x2:"19",y1:"5",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mS=[["path",{d:"m12.5 17-.5-1-.5 1h1z"}],["path",{d:"M15 22a1 1 0 0 0 1-1v-1a2 2 0 0 0 1.56-3.25 8 8 0 1 0-11.12 0A2 2 0 0 0 8 20v1a1 1 0 0 0 1 1z"}],["circle",{cx:"15",cy:"12",r:"1"}],["circle",{cx:"9",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vS=[["rect",{width:"3",height:"8",x:"13",y:"2",rx:"1.5"}],["path",{d:"M19 8.5V10h1.5A1.5 1.5 0 1 0 19 8.5"}],["rect",{width:"3",height:"8",x:"8",y:"14",rx:"1.5"}],["path",{d:"M5 15.5V14H3.5A1.5 1.5 0 1 0 5 15.5"}],["rect",{width:"8",height:"3",x:"14",y:"13",rx:"1.5"}],["path",{d:"M15.5 19H14v1.5a1.5 1.5 0 1 0 1.5-1.5"}],["rect",{width:"8",height:"3",x:"2",y:"8",rx:"1.5"}],["path",{d:"M8.5 5H10V3.5A1.5 1.5 0 1 0 8.5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gS=[["path",{d:"M22 2 2 22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yS=[["path",{d:"M11 16.586V19a1 1 0 0 1-1 1H2L18.37 3.63a1 1 0 1 1 3 3l-9.663 9.663a1 1 0 0 1-1.414 0L8 14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xS=[["line",{x1:"21",x2:"14",y1:"4",y2:"4"}],["line",{x1:"10",x2:"3",y1:"4",y2:"4"}],["line",{x1:"21",x2:"12",y1:"12",y2:"12"}],["line",{x1:"8",x2:"3",y1:"12",y2:"12"}],["line",{x1:"21",x2:"16",y1:"20",y2:"20"}],["line",{x1:"12",x2:"3",y1:"20",y2:"20"}],["line",{x1:"14",x2:"14",y1:"2",y2:"6"}],["line",{x1:"8",x2:"8",y1:"10",y2:"14"}],["line",{x1:"16",x2:"16",y1:"18",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const As=[["line",{x1:"4",x2:"4",y1:"21",y2:"14"}],["line",{x1:"4",x2:"4",y1:"10",y2:"3"}],["line",{x1:"12",x2:"12",y1:"21",y2:"12"}],["line",{x1:"12",x2:"12",y1:"8",y2:"3"}],["line",{x1:"20",x2:"20",y1:"21",y2:"16"}],["line",{x1:"20",x2:"20",y1:"12",y2:"3"}],["line",{x1:"2",x2:"6",y1:"14",y2:"14"}],["line",{x1:"10",x2:"14",y1:"8",y2:"8"}],["line",{x1:"18",x2:"22",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wS=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2",ry:"2"}],["path",{d:"M12.667 8 10 12h4l-2.667 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bS=[["rect",{width:"7",height:"12",x:"2",y:"6",rx:"1"}],["path",{d:"M13 8.32a7.43 7.43 0 0 1 0 7.36"}],["path",{d:"M16.46 6.21a11.76 11.76 0 0 1 0 11.58"}],["path",{d:"M19.91 4.1a15.91 15.91 0 0 1 .01 15.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ES=[["rect",{width:"14",height:"20",x:"5",y:"2",rx:"2",ry:"2"}],["path",{d:"M12 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SS=[["path",{d:"M22 11v1a10 10 0 1 1-9-10"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}],["path",{d:"M16 5h6"}],["path",{d:"M19 2v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CS=[["circle",{cx:"12",cy:"12",r:"10"}],["path",{d:"M8 14s1.5 2 4 2 4-2 4-2"}],["line",{x1:"9",x2:"9.01",y1:"9",y2:"9"}],["line",{x1:"15",x2:"15.01",y1:"9",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AS=[["path",{d:"M2 13a6 6 0 1 0 12 0 4 4 0 1 0-8 0 2 2 0 0 0 4 0"}],["circle",{cx:"10",cy:"13",r:"8"}],["path",{d:"M2 21h12c4.4 0 8-3.6 8-8V7a2 2 0 1 0-4 0v6"}],["path",{d:"M18 3 19.1 5.2"}],["path",{d:"M22 3 20.9 5.2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TS=[["path",{d:"m10 20-1.25-2.5L6 18"}],["path",{d:"M10 4 8.75 6.5 6 6"}],["path",{d:"m14 20 1.25-2.5L18 18"}],["path",{d:"m14 4 1.25 2.5L18 6"}],["path",{d:"m17 21-3-6h-4"}],["path",{d:"m17 3-3 6 1.5 3"}],["path",{d:"M2 12h6.5L10 9"}],["path",{d:"m20 10-1.5 2 1.5 2"}],["path",{d:"M22 12h-6.5L14 15"}],["path",{d:"m4 10 1.5 2L4 14"}],["path",{d:"m7 21 3-6-1.5-3"}],["path",{d:"m7 3 3 6h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _S=[["path",{d:"M10.5 2v4"}],["path",{d:"M14 2H7a2 2 0 0 0-2 2"}],["path",{d:"M19.29 14.76A6.67 6.67 0 0 1 17 11a6.6 6.6 0 0 1-2.29 3.76c-1.15.92-1.71 2.04-1.71 3.19 0 2.22 1.8 4.05 4 4.05s4-1.83 4-4.05c0-1.16-.57-2.26-1.71-3.19"}],["path",{d:"M9.607 21H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h7V7a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HS=[["path",{d:"M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"}],["path",{d:"M2 16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"}],["path",{d:"M4 18v2"}],["path",{d:"M20 18v2"}],["path",{d:"M12 4v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LS=[["path",{d:"M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"}],["path",{d:"M7 21h10"}],["path",{d:"M19.5 12 22 6"}],["path",{d:"M16.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.73 1.62"}],["path",{d:"M11.25 3c.27.1.8.53.74 1.36-.05.83-.93 1.2-.98 2.02-.06.78.33 1.24.72 1.62"}],["path",{d:"M6.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.74 1.62"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VS=[["path",{d:"M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PS=[["path",{d:"M5 9c-1.5 1.5-3 3.2-3 5.5A5.5 5.5 0 0 0 7.5 20c1.8 0 3-.5 4.5-2 1.5 1.5 2.7 2 4.5 2a5.5 5.5 0 0 0 5.5-5.5c0-2.3-1.5-4-3-5.5l-7-7-7 7Z"}],["path",{d:"M12 18v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DS=[["path",{d:"M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ts=[["path",{d:"M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"}],["path",{d:"M20 3v4"}],["path",{d:"M22 5h-4"}],["path",{d:"M4 17v2"}],["path",{d:"M5 18H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OS=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2"}],["path",{d:"M12 6h.01"}],["circle",{cx:"12",cy:"14",r:"4"}],["path",{d:"M12 14h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kS=[["path",{d:"M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.054 1 4.55a5.77 5.77 0 0 1 .029 2.758L2 20"}],["path",{d:"M19.8 17.8a7.5 7.5 0 0 0 .003-10.603"}],["path",{d:"M17 15a3.5 3.5 0 0 0-.025-4.975"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IS=[["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}],["path",{d:"M4 21c1.1 0 1.1-1 2.3-1s1.1 1 2.3 1c1.1 0 1.1-1 2.3-1 1.1 0 1.1 1 2.3 1 1.1 0 1.1-1 2.3-1 1.1 0 1.1 1 2.3 1 1.1 0 1.1-1 2.3-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NS=[["path",{d:"m6 16 6-12 6 12"}],["path",{d:"M8 12h8"}],["path",{d:"m16 20 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zS=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M5 17A12 12 0 0 1 17 5"}],["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $S=[["circle",{cx:"19",cy:"5",r:"2"}],["circle",{cx:"5",cy:"19",r:"2"}],["path",{d:"M5 17A12 12 0 0 1 17 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RS=[["path",{d:"M16 3h5v5"}],["path",{d:"M8 3H3v5"}],["path",{d:"M12 22v-8.3a4 4 0 0 0-1.172-2.872L3 3"}],["path",{d:"m15 9 6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BS=[["path",{d:"M17 13.44 4.442 17.082A2 2 0 0 0 4.982 21H19a2 2 0 0 0 .558-3.921l-1.115-.32A2 2 0 0 1 17 14.837V7.66"}],["path",{d:"m7 10.56 12.558-3.642A2 2 0 0 0 19.018 3H5a2 2 0 0 0-.558 3.921l1.115.32A2 2 0 0 1 7 9.163v7.178"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FS=[["path",{d:"M3 3h.01"}],["path",{d:"M7 5h.01"}],["path",{d:"M11 7h.01"}],["path",{d:"M3 7h.01"}],["path",{d:"M7 9h.01"}],["path",{d:"M3 11h.01"}],["rect",{width:"4",height:"4",x:"15",y:"5"}],["path",{d:"m19 9 2 2v10c0 .6-.4 1-1 1h-6c-.6 0-1-.4-1-1V11l2-2"}],["path",{d:"m13 14 8-2"}],["path",{d:"m13 19 8-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qS=[["path",{d:"M7 20h10"}],["path",{d:"M10 20c5.5-2.5.8-6.4 3-10"}],["path",{d:"M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"}],["path",{d:"M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _s=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M17 12h-2l-2 5-2-10-2 5H7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Hs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 8-8 8"}],["path",{d:"M16 16H8V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ls=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m8 8 8 8"}],["path",{d:"M16 8v8H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Vs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m12 8-4 4 4 4"}],["path",{d:"M16 12H8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ps=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 8v8"}],["path",{d:"m8 12 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ds=[["path",{d:"M13 21h6a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6"}],["path",{d:"m3 21 9-9"}],["path",{d:"M9 21H3v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Os=[["path",{d:"M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"}],["path",{d:"m3 3 9 9"}],["path",{d:"M3 9V3h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ks=[["path",{d:"M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}],["path",{d:"m21 21-9-9"}],["path",{d:"M21 15v6h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Is=[["path",{d:"M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"}],["path",{d:"m21 3-9 9"}],["path",{d:"M15 3h6v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ns=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}],["path",{d:"m12 16 4-4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 16V8h8"}],["path",{d:"M16 16 8 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $s=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 8h8v8"}],["path",{d:"m8 16 8-8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Rs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 12-4-4-4 4"}],["path",{d:"M12 16V8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Bs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 8v8"}],["path",{d:"m8.5 14 7-4"}],["path",{d:"m8.5 10 7 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Fs=[["path",{d:"M4 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2"}],["path",{d:"M10 22H8"}],["path",{d:"M16 22h-2"}],["circle",{cx:"8",cy:"8",r:"2"}],["path",{d:"M9.414 9.414 12 12"}],["path",{d:"M14.8 14.8 18 18"}],["circle",{cx:"8",cy:"16",r:"2"}],["path",{d:"m18 6-8.586 8.586"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b2=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 8h7"}],["path",{d:"M8 12h6"}],["path",{d:"M11 16h5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qs=[["path",{d:"M21 10.656V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.344"}],["path",{d:"m9 11 3 3L22 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ws=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const js=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m16 10-4 4-4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Gs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m14 16-4-4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Zs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m10 8 4 4-4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Xs=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m8 14 4-4 4 4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Us=[["path",{d:"m10 9-3 3 3 3"}],["path",{d:"m14 15 3-3-3-3"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WS=[["path",{d:"M10 9.5 8 12l2 2.5"}],["path",{d:"M14 21h1"}],["path",{d:"m14 9.5 2 2.5-2 2.5"}],["path",{d:"M5 21a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2"}],["path",{d:"M9 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jS=[["path",{d:"M5 21a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2"}],["path",{d:"M9 21h1"}],["path",{d:"M14 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ys=[["path",{d:"M8 7v7"}],["path",{d:"M12 7v4"}],["path",{d:"M16 7v9"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M9 3h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M14 21h1"}],["path",{d:"M9 21h1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M3 14v1"}],["path",{d:"M3 9v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Ks=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 3h1"}],["path",{d:"M9 21h2"}],["path",{d:"M14 3h1"}],["path",{d:"M3 9v1"}],["path",{d:"M21 9v2"}],["path",{d:"M3 14v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GS=[["path",{d:"M14 21h1"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M3 5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2"}],["path",{d:"M3 9v1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 21h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Qs=[["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M9 3h1"}],["path",{d:"M9 21h1"}],["path",{d:"M14 3h1"}],["path",{d:"M14 21h1"}],["path",{d:"M3 9v1"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M21 14v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const Js=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["line",{x1:"8",x2:"16",y1:"12",y2:"12"}],["line",{x1:"12",x2:"12",y1:"16",y2:"16"}],["line",{x1:"12",x2:"12",y1:"8",y2:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"12",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 10h10"}],["path",{d:"M7 14h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"M9 17c2 0 2.8-1 2.8-2.8V10c0-2 1-3.3 3.2-3"}],["path",{d:"M9 11.2h5.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7v10"}],["path",{d:"M11 7v10"}],["path",{d:"m15 7 2 10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 7v7"}],["path",{d:"M12 7v4"}],["path",{d:"M16 7v9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 16V8l4 4 4-4v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 8h10"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o0=[["path",{d:"M12.034 12.681a.498.498 0 0 1 .647-.647l9 3.5a.5.5 0 0 1-.033.943l-3.444 1.068a1 1 0 0 0-.66.66l-1.067 3.443a.5.5 0 0 1-.943.033z"}],["path",{d:"M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l0=[["path",{d:"M3.6 3.6A2 2 0 0 1 5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-.59 1.41"}],["path",{d:"M3 8.7V19a2 2 0 0 0 2 2h10.3"}],["path",{d:"m2 2 20 20"}],["path",{d:"M13 13a3 3 0 1 0 0-6H9v2"}],["path",{d:"M9 17v-2.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M9 17V7h4a3 3 0 0 1 0 6H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E1=[["path",{d:"M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"}],["path",{d:"M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m15 9-6 6"}],["path",{d:"M9 9h.01"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M7 7h10"}],["path",{d:"M10 7v10"}],["path",{d:"M16 17a2 2 0 0 1-2-2V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M12 12H9.5a2.5 2.5 0 0 1 0-5H17"}],["path",{d:"M12 7v10"}],["path",{d:"M16 7v10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M8 12h8"}],["path",{d:"M12 8v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"m9 8 6 4-6 4Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m0=[["path",{d:"M12 7v4"}],["path",{d:"M7.998 9.003a5 5 0 1 0 8-.005"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZS=[["path",{d:"M7 12h2l2 5 2-10h4"}],["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XS=[["path",{d:"M21 11a8 8 0 0 0-8-8"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v0=[["rect",{width:"20",height:"20",x:"2",y:"2",rx:"2"}],["circle",{cx:"8",cy:"8",r:"2"}],["path",{d:"M9.414 9.414 12 12"}],["path",{d:"M14.8 14.8 18 18"}],["circle",{cx:"8",cy:"16",r:"2"}],["path",{d:"m18 6-8.586 8.586"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M16 8.9V7H8l4 5-4 5h8v-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["line",{x1:"9",x2:"15",y1:"15",y2:"9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x0=[["path",{d:"M8 19H5c-1 0-2-1-2-2V7c0-1 1-2 2-2h3"}],["path",{d:"M16 5h3c1 0 2 1 2 2v10c0 1-1 2-2 2h-3"}],["line",{x1:"12",x2:"12",y1:"4",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w0=[["path",{d:"M5 8V5c0-1 1-2 2-2h10c1 0 2 1 2 2v3"}],["path",{d:"M19 16v3c0 1-1 2-2 2H7c-1 0-2-1-2-2v-3"}],["line",{x1:"4",x2:"20",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const US=[["rect",{x:"3",y:"3",width:"18",height:"18",rx:"2"}],["rect",{x:"8",y:"8",width:"8",height:"8",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YS=[["path",{d:"M4 10c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2"}],["path",{d:"M10 16c-1.1 0-2-.9-2-2v-4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2"}],["rect",{width:"8",height:"8",x:"14",y:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b0=[["path",{d:"m7 11 2-2-2-2"}],["path",{d:"M11 13h4"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E0=[["path",{d:"M18 21a6 6 0 0 0-12 0"}],["circle",{cx:"12",cy:"11",r:"4"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C0=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["path",{d:"m15 9-6 6"}],["path",{d:"m9 9 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KS=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QS=[["path",{d:"M16 12v2a2 2 0 0 1-2 2H9a1 1 0 0 0-1 1v3a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2h0"}],["path",{d:"M4 16a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v3a1 1 0 0 1-1 1h-5a2 2 0 0 0-2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JS=[["path",{d:"M10 22a2 2 0 0 1-2-2"}],["path",{d:"M14 2a2 2 0 0 1 2 2"}],["path",{d:"M16 22h-2"}],["path",{d:"M2 10V8"}],["path",{d:"M2 4a2 2 0 0 1 2-2"}],["path",{d:"M20 8a2 2 0 0 1 2 2"}],["path",{d:"M22 14v2"}],["path",{d:"M22 20a2 2 0 0 1-2 2"}],["path",{d:"M4 16a2 2 0 0 1-2-2"}],["path",{d:"M8 10a2 2 0 0 1 2-2h5a1 1 0 0 1 1 1v5a2 2 0 0 1-2 2H9a1 1 0 0 1-1-1z"}],["path",{d:"M8 2h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tC=[["path",{d:"M10 22a2 2 0 0 1-2-2"}],["path",{d:"M16 22h-2"}],["path",{d:"M16 4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-5a2 2 0 0 1 2-2h5a1 1 0 0 0 1-1z"}],["path",{d:"M20 8a2 2 0 0 1 2 2"}],["path",{d:"M22 14v2"}],["path",{d:"M22 20a2 2 0 0 1-2 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eC=[["path",{d:"M4 16a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v3a1 1 0 0 0 1 1h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2v-3a1 1 0 0 0-1-1z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aC=[["path",{d:"M13.77 3.043a34 34 0 0 0-3.54 0"}],["path",{d:"M13.771 20.956a33 33 0 0 1-3.541.001"}],["path",{d:"M20.18 17.74c-.51 1.15-1.29 1.93-2.439 2.44"}],["path",{d:"M20.18 6.259c-.51-1.148-1.291-1.929-2.44-2.438"}],["path",{d:"M20.957 10.23a33 33 0 0 1 0 3.54"}],["path",{d:"M3.043 10.23a34 34 0 0 0 .001 3.541"}],["path",{d:"M6.26 20.179c-1.15-.508-1.93-1.29-2.44-2.438"}],["path",{d:"M6.26 3.82c-1.149.51-1.93 1.291-2.44 2.44"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iC=[["path",{d:"M12 3c7.2 0 9 1.8 9 9s-1.8 9-9 9-9-1.8-9-9 1.8-9 9-9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rC=[["path",{d:"M15.236 22a3 3 0 0 0-2.2-5"}],["path",{d:"M16 20a3 3 0 0 1 3-3h1a2 2 0 0 0 2-2v-2a4 4 0 0 0-4-4V4"}],["path",{d:"M18 13h.01"}],["path",{d:"M18 6a4 4 0 0 0-4 4 7 7 0 0 0-7 7c0-5 4-5 4-10.5a4.5 4.5 0 1 0-9 0 2.5 2.5 0 0 0 5 0C7 10 3 11 3 17c0 2.8 2.2 5 5 5h10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nC=[["path",{d:"M14 13V8.5C14 7 15 7 15 5a3 3 0 0 0-6 0c0 2 1 2 1 3.5V13"}],["path",{d:"M20 15.5a2.5 2.5 0 0 0-2.5-2.5h-11A2.5 2.5 0 0 0 4 15.5V17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1z"}],["path",{d:"M5 22h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sC=[["path",{d:"M12 18.338a2.1 2.1 0 0 0-.987.244L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16l2.309-4.679A.53.53 0 0 1 12 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oC=[["path",{d:"M8.34 8.34 2 9.27l5 4.87L5.82 21 12 17.77 18.18 21l-.59-3.43"}],["path",{d:"M18.42 12.76 22 9.27l-6.91-1L12 2l-1.44 2.91"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hC=[["path",{d:"M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lC=[["line",{x1:"18",x2:"18",y1:"20",y2:"4"}],["polygon",{points:"14,20 4,12 14,4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dC=[["line",{x1:"6",x2:"6",y1:"4",y2:"20"}],["polygon",{points:"10,4 20,12 10,20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cC=[["path",{d:"M15.5 3H5a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V8.5L15.5 3Z"}],["path",{d:"M14 3v4a2 2 0 0 0 2 2h4"}],["path",{d:"M8 13h.01"}],["path",{d:"M16 13h.01"}],["path",{d:"M10 16s.8 1 2 1c1.3 0 2-1 2-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pC=[["path",{d:"M11 2v2"}],["path",{d:"M5 2v2"}],["path",{d:"M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"}],["path",{d:"M8 15a6 6 0 0 0 12 0v-3"}],["circle",{cx:"20",cy:"10",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uC=[["path",{d:"M16 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8Z"}],["path",{d:"M15 3v4a2 2 0 0 0 2 2h4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fC=[["path",{d:"m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"}],["path",{d:"M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"}],["path",{d:"M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"}],["path",{d:"M2 7h20"}],["path",{d:"M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MC=[["rect",{width:"20",height:"6",x:"2",y:"4",rx:"2"}],["rect",{width:"20",height:"6",x:"2",y:"14",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mC=[["rect",{width:"6",height:"20",x:"4",y:"2",rx:"2"}],["rect",{width:"6",height:"20",x:"14",y:"2",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vC=[["path",{d:"M16 4H9a3 3 0 0 0-2.83 4"}],["path",{d:"M14 12a4 4 0 0 1 0 8H6"}],["line",{x1:"4",x2:"20",y1:"12",y2:"12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gC=[["path",{d:"m4 5 8 8"}],["path",{d:"m12 5-8 8"}],["path",{d:"M20 19h-4c0-1.5.44-2 1.5-2.5S20 15.33 20 14c0-.47-.17-.93-.48-1.29a2.11 2.11 0 0 0-2.62-.44c-.42.24-.74.62-.9 1.07"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yC=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 4h.01"}],["path",{d:"M20 12h.01"}],["path",{d:"M12 20h.01"}],["path",{d:"M4 12h.01"}],["path",{d:"M17.657 6.343h.01"}],["path",{d:"M17.657 17.657h.01"}],["path",{d:"M6.343 17.657h.01"}],["path",{d:"M6.343 6.343h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xC=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 3v1"}],["path",{d:"M12 20v1"}],["path",{d:"M3 12h1"}],["path",{d:"M20 12h1"}],["path",{d:"m18.364 5.636-.707.707"}],["path",{d:"m6.343 17.657-.707.707"}],["path",{d:"m5.636 5.636.707.707"}],["path",{d:"m17.657 17.657.707.707"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wC=[["path",{d:"M12 2v2"}],["path",{d:"M13 8.129A4 4 0 0 1 15.873 11"}],["path",{d:"m19 5-1.256 1.256"}],["path",{d:"M20 12h2"}],["path",{d:"M9 8a5 5 0 1 0 7 7 7 7 0 1 1-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bC=[["path",{d:"M10 21v-1"}],["path",{d:"M10 4V3"}],["path",{d:"M10 9a3 3 0 0 0 0 6"}],["path",{d:"m14 20 1.25-2.5L18 18"}],["path",{d:"m14 4 1.25 2.5L18 6"}],["path",{d:"m17 21-3-6 1.5-3H22"}],["path",{d:"m17 3-3 6 1.5 3"}],["path",{d:"M2 12h1"}],["path",{d:"m20 10-1.5 2 1.5 2"}],["path",{d:"m3.64 18.36.7-.7"}],["path",{d:"m4.34 6.34-.7-.7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EC=[["circle",{cx:"12",cy:"12",r:"4"}],["path",{d:"M12 2v2"}],["path",{d:"M12 20v2"}],["path",{d:"m4.93 4.93 1.41 1.41"}],["path",{d:"m17.66 17.66 1.41 1.41"}],["path",{d:"M2 12h2"}],["path",{d:"M20 12h2"}],["path",{d:"m6.34 17.66-1.41 1.41"}],["path",{d:"m19.07 4.93-1.41 1.41"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SC=[["path",{d:"M12 2v8"}],["path",{d:"m4.93 10.93 1.41 1.41"}],["path",{d:"M2 18h2"}],["path",{d:"M20 18h2"}],["path",{d:"m19.07 10.93-1.41 1.41"}],["path",{d:"M22 22H2"}],["path",{d:"m8 6 4-4 4 4"}],["path",{d:"M16 18a4 4 0 0 0-8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CC=[["path",{d:"M12 10V2"}],["path",{d:"m4.93 10.93 1.41 1.41"}],["path",{d:"M2 18h2"}],["path",{d:"M20 18h2"}],["path",{d:"m19.07 10.93-1.41 1.41"}],["path",{d:"M22 22H2"}],["path",{d:"m16 6-4 4-4-4"}],["path",{d:"M16 18a4 4 0 0 0-8 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AC=[["path",{d:"m4 19 8-8"}],["path",{d:"m12 19-8-8"}],["path",{d:"M20 12h-4c0-1.5.442-2 1.5-2.5S20 8.334 20 7.002c0-.472-.17-.93-.484-1.29a2.105 2.105 0 0 0-2.617-.436c-.42.239-.738.614-.899 1.06"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TC=[["path",{d:"M11 17a4 4 0 0 1-8 0V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2Z"}],["path",{d:"M16.7 13H19a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H7"}],["path",{d:"M 7 17h.01"}],["path",{d:"m11 8 2.3-2.3a2.4 2.4 0 0 1 3.404.004L18.6 7.6a2.4 2.4 0 0 1 .026 3.434L9.9 19.8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _C=[["path",{d:"M10 21V3h8"}],["path",{d:"M6 16h9"}],["path",{d:"M10 9.5h7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HC=[["path",{d:"M11 19H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5"}],["path",{d:"M13 5h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-5"}],["circle",{cx:"12",cy:"12",r:"3"}],["path",{d:"m18 22-3-3 3-3"}],["path",{d:"m6 2 3 3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LC=[["polyline",{points:"14.5 17.5 3 6 3 3 6 3 17.5 14.5"}],["line",{x1:"13",x2:"19",y1:"19",y2:"13"}],["line",{x1:"16",x2:"20",y1:"16",y2:"20"}],["line",{x1:"19",x2:"21",y1:"21",y2:"19"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VC=[["polyline",{points:"14.5 17.5 3 6 3 3 6 3 17.5 14.5"}],["line",{x1:"13",x2:"19",y1:"19",y2:"13"}],["line",{x1:"16",x2:"20",y1:"16",y2:"20"}],["line",{x1:"19",x2:"21",y1:"21",y2:"19"}],["polyline",{points:"14.5 6.5 18 3 21 3 21 6 17.5 9.5"}],["line",{x1:"5",x2:"9",y1:"14",y2:"18"}],["line",{x1:"7",x2:"4",y1:"17",y2:"20"}],["line",{x1:"3",x2:"5",y1:"19",y2:"21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PC=[["path",{d:"m18 2 4 4"}],["path",{d:"m17 7 3-3"}],["path",{d:"M19 9 8.7 19.3c-1 1-2.5 1-3.4 0l-.6-.6c-1-1-1-2.5 0-3.4L15 5"}],["path",{d:"m9 11 4 4"}],["path",{d:"m5 19-3 3"}],["path",{d:"m14 4 6 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DC=[["path",{d:"M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OC=[["path",{d:"M12 21v-6"}],["path",{d:"M12 9V3"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kC=[["path",{d:"M12 15V9"}],["path",{d:"M3 15h18"}],["path",{d:"M3 9h18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IC=[["path",{d:"M14 14v2"}],["path",{d:"M14 20v2"}],["path",{d:"M14 2v2"}],["path",{d:"M14 8v2"}],["path",{d:"M2 15h8"}],["path",{d:"M2 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H2"}],["path",{d:"M2 9h8"}],["path",{d:"M22 15h-4"}],["path",{d:"M22 3h-2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h2"}],["path",{d:"M22 9h-4"}],["path",{d:"M5 3v18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NC=[["path",{d:"M16 12H3"}],["path",{d:"M16 18H3"}],["path",{d:"M16 6H3"}],["path",{d:"M21 12h.01"}],["path",{d:"M21 18h.01"}],["path",{d:"M21 6h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zC=[["path",{d:"M15 3v18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M21 9H3"}],["path",{d:"M21 15H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $C=[["path",{d:"M14 10h2"}],["path",{d:"M15 22v-8"}],["path",{d:"M15 2v4"}],["path",{d:"M2 10h2"}],["path",{d:"M20 10h2"}],["path",{d:"M3 19h18"}],["path",{d:"M3 22v-6a2 2 135 0 1 2-2h14a2 2 45 0 1 2 2v6"}],["path",{d:"M3 2v2a2 2 45 0 0 2 2h14a2 2 135 0 0 2-2V2"}],["path",{d:"M8 10h2"}],["path",{d:"M9 22v-8"}],["path",{d:"M9 2v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RC=[["path",{d:"M12 3v18"}],["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9h18"}],["path",{d:"M3 15h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BC=[["rect",{width:"10",height:"14",x:"3",y:"8",rx:"2"}],["path",{d:"M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"}],["path",{d:"M8 18h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FC=[["rect",{width:"16",height:"20",x:"4",y:"2",rx:"2",ry:"2"}],["line",{x1:"12",x2:"12.01",y1:"18",y2:"18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qC=[["circle",{cx:"7",cy:"7",r:"5"}],["circle",{cx:"17",cy:"17",r:"5"}],["path",{d:"M12 17h10"}],["path",{d:"m3.46 10.54 7.08-7.08"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WC=[["path",{d:"M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"}],["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jC=[["path",{d:"m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19"}],["path",{d:"M9.586 5.586A2 2 0 0 0 8.172 5H3a1 1 0 0 0-1 1v5.172a2 2 0 0 0 .586 1.414L8.29 18.29a2.426 2.426 0 0 0 3.42 0l3.58-3.58a2.426 2.426 0 0 0 0-3.42z"}],["circle",{cx:"6.5",cy:"9.5",r:".5",fill:"currentColor"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GC=[["path",{d:"M4 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZC=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XC=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UC=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}],["path",{d:"M19 4v16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YC=[["path",{d:"M4 4v16"}],["path",{d:"M9 4v16"}],["path",{d:"M14 4v16"}],["path",{d:"M19 4v16"}],["path",{d:"M22 6 2 18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KC=[["circle",{cx:"17",cy:"4",r:"2"}],["path",{d:"M15.59 5.41 5.41 15.59"}],["circle",{cx:"4",cy:"17",r:"2"}],["path",{d:"M12 22s-4-9-1.5-11.5S22 12 22 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QC=[["circle",{cx:"12",cy:"12",r:"10"}],["circle",{cx:"12",cy:"12",r:"6"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JC=[["path",{d:"m10.065 12.493-6.18 1.318a.934.934 0 0 1-1.108-.702l-.537-2.15a1.07 1.07 0 0 1 .691-1.265l13.504-4.44"}],["path",{d:"m13.56 11.747 4.332-.924"}],["path",{d:"m16 21-3.105-6.21"}],["path",{d:"M16.485 5.94a2 2 0 0 1 1.455-2.425l1.09-.272a1 1 0 0 1 1.212.727l1.515 6.06a1 1 0 0 1-.727 1.213l-1.09.272a2 2 0 0 1-2.425-1.455z"}],["path",{d:"m6.158 8.633 1.114 4.456"}],["path",{d:"m8 21 3.105-6.21"}],["circle",{cx:"12",cy:"13",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tA=[["circle",{cx:"4",cy:"4",r:"2"}],["path",{d:"m14 5 3-3 3 3"}],["path",{d:"m14 10 3-3 3 3"}],["path",{d:"M17 14V2"}],["path",{d:"M17 14H7l-5 8h20Z"}],["path",{d:"M8 14v8"}],["path",{d:"m9 14 5 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eA=[["path",{d:"M3.5 21 14 3"}],["path",{d:"M20.5 21 10 3"}],["path",{d:"M15.5 21 12 15l-3.5 6"}],["path",{d:"M2 21h20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aA=[["path",{d:"M12 19h8"}],["path",{d:"m4 17 6-6-6-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iA=[["path",{d:"M14.5 2v17.5c0 1.4-1.1 2.5-2.5 2.5c-1.4 0-2.5-1.1-2.5-2.5V2"}],["path",{d:"M8.5 2h7"}],["path",{d:"M14.5 16h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rA=[["path",{d:"M9 2v17.5A2.5 2.5 0 0 1 6.5 22A2.5 2.5 0 0 1 4 19.5V2"}],["path",{d:"M20 2v17.5a2.5 2.5 0 0 1-2.5 2.5a2.5 2.5 0 0 1-2.5-2.5V2"}],["path",{d:"M3 2h7"}],["path",{d:"M14 2h7"}],["path",{d:"M9 16H4"}],["path",{d:"M20 16h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A0=[["path",{d:"M21 7 6.82 21.18a2.83 2.83 0 0 1-3.99-.01a2.83 2.83 0 0 1 0-4L17 3"}],["path",{d:"m16 2 6 6"}],["path",{d:"M12 16H4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nA=[["path",{d:"M12 20h-1a2 2 0 0 1-2-2 2 2 0 0 1-2 2H6"}],["path",{d:"M13 8h7a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-7"}],["path",{d:"M5 16H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1"}],["path",{d:"M6 4h1a2 2 0 0 1 2 2 2 2 0 0 1 2-2h1"}],["path",{d:"M9 6v12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sA=[["path",{d:"M17 22h-1a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h1"}],["path",{d:"M7 22h1a4 4 0 0 0 4-4v-1"}],["path",{d:"M7 2h1a4 4 0 0 1 4 4v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oA=[["path",{d:"M17 6H3"}],["path",{d:"M21 12H8"}],["path",{d:"M21 18H8"}],["path",{d:"M3 12v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hA=[["path",{d:"M21 6H3"}],["path",{d:"M10 12H3"}],["path",{d:"M10 18H3"}],["circle",{cx:"17",cy:"15",r:"3"}],["path",{d:"m21 19-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T0=[["path",{d:"M14 21h1"}],["path",{d:"M14 3h1"}],["path",{d:"M19 3a2 2 0 0 1 2 2"}],["path",{d:"M21 14v1"}],["path",{d:"M21 19a2 2 0 0 1-2 2"}],["path",{d:"M21 9v1"}],["path",{d:"M3 14v1"}],["path",{d:"M3 9v1"}],["path",{d:"M5 21a2 2 0 0 1-2-2"}],["path",{d:"M5 3a2 2 0 0 0-2 2"}],["path",{d:"M7 12h10"}],["path",{d:"M7 16h6"}],["path",{d:"M7 8h8"}],["path",{d:"M9 21h1"}],["path",{d:"M9 3h1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lA=[["path",{d:"M15 18H3"}],["path",{d:"M17 6H3"}],["path",{d:"M21 12H3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dA=[["path",{d:"m10 20-1.25-2.5L6 18"}],["path",{d:"M10 4 8.75 6.5 6 6"}],["path",{d:"M10.585 15H10"}],["path",{d:"M2 12h6.5L10 9"}],["path",{d:"M20 14.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0z"}],["path",{d:"m4 10 1.5 2L4 14"}],["path",{d:"m7 21 3-6-1.5-3"}],["path",{d:"m7 3 3 6h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cA=[["path",{d:"M12 9a4 4 0 0 0-2 7.5"}],["path",{d:"M12 3v2"}],["path",{d:"m6.6 18.4-1.4 1.4"}],["path",{d:"M20 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"}],["path",{d:"M4 13H2"}],["path",{d:"M6.34 7.34 4.93 5.93"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pA=[["path",{d:"M2 10s3-3 3-8"}],["path",{d:"M22 10s-3-3-3-8"}],["path",{d:"M10 2c0 4.4-3.6 8-8 8"}],["path",{d:"M14 2c0 4.4 3.6 8 8 8"}],["path",{d:"M2 10s2 2 2 5"}],["path",{d:"M22 10s-2 2-2 5"}],["path",{d:"M8 15h8"}],["path",{d:"M2 22v-1a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1"}],["path",{d:"M14 22v-1a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uA=[["path",{d:"M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fA=[["path",{d:"M17 14V2"}],["path",{d:"M9 18.12 10 14H4.17a2 2 0 0 1-1.92-2.56l2.33-8A2 2 0 0 1 6.5 2H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.76a2 2 0 0 0-1.79 1.11L12 22a3.13 3.13 0 0 1-3-3.88Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MA=[["path",{d:"M7 10v12"}],["path",{d:"M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9 12 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 12h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gA=[["path",{d:"M2 9a3 3 0 1 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 1 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 9h.01"}],["path",{d:"m15 9-6 6"}],["path",{d:"M15 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M9 12h6"}],["path",{d:"M12 9v6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9.5 14.5 5-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"m9.5 14.5 5-5"}],["path",{d:"m9.5 9.5 5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bA=[["path",{d:"M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"}],["path",{d:"M13 5v2"}],["path",{d:"M13 17v2"}],["path",{d:"M13 11v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const EA=[["path",{d:"M10.5 17h1.227a2 2 0 0 0 1.345-.52L18 12"}],["path",{d:"m12 13.5 3.75.5"}],["path",{d:"m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"}],["path",{d:"M6 10V8"}],["path",{d:"M6 14v1"}],["path",{d:"M6 19v2"}],["rect",{x:"2",y:"8",width:"20",height:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const SA=[["path",{d:"m4.5 8 10.58-5.06a1 1 0 0 1 1.342.488L18.5 8"}],["path",{d:"M6 10V8"}],["path",{d:"M6 14v1"}],["path",{d:"M6 19v2"}],["rect",{x:"2",y:"8",width:"20",height:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CA=[["path",{d:"M10 2h4"}],["path",{d:"M4.6 11a8 8 0 0 0 1.7 8.7 8 8 0 0 0 8.7 1.7"}],["path",{d:"M7.4 7.4a8 8 0 0 1 10.3 1 8 8 0 0 1 .9 10.2"}],["path",{d:"m2 2 20 20"}],["path",{d:"M12 12v-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AA=[["path",{d:"M10 2h4"}],["path",{d:"M12 14v-4"}],["path",{d:"M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17.6"}],["path",{d:"M9 17H4v5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TA=[["line",{x1:"10",x2:"14",y1:"2",y2:"2"}],["line",{x1:"12",x2:"15",y1:"14",y2:"11"}],["circle",{cx:"12",cy:"14",r:"8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _A=[["circle",{cx:"9",cy:"12",r:"3"}],["rect",{width:"20",height:"14",x:"2",y:"5",rx:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HA=[["circle",{cx:"15",cy:"12",r:"3"}],["rect",{width:"20",height:"14",x:"2",y:"5",rx:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LA=[["path",{d:"M7 12h13a1 1 0 0 1 1 1 5 5 0 0 1-5 5h-.598a.5.5 0 0 0-.424.765l1.544 2.47a.5.5 0 0 1-.424.765H5.402a.5.5 0 0 1-.424-.765L7 18"}],["path",{d:"M8 18a5 5 0 0 1-5-5V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VA=[["path",{d:"M21 4H3"}],["path",{d:"M18 8H6"}],["path",{d:"M19 12H9"}],["path",{d:"M16 16h-6"}],["path",{d:"M11 20H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PA=[["path",{d:"M10 15h4"}],["path",{d:"m14.817 10.995-.971-1.45 1.034-1.232a2 2 0 0 0-2.025-3.238l-1.82.364L9.91 3.885a2 2 0 0 0-3.625.748L6.141 6.55l-1.725.426a2 2 0 0 0-.19 3.756l.657.27"}],["path",{d:"m18.822 10.995 2.26-5.38a1 1 0 0 0-.557-1.318L16.954 2.9a1 1 0 0 0-1.281.533l-.924 2.122"}],["path",{d:"M4 12.006A1 1 0 0 1 4.994 11H19a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DA=[["ellipse",{cx:"12",cy:"11",rx:"3",ry:"2"}],["ellipse",{cx:"12",cy:"12.5",rx:"10",ry:"8.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OA=[["path",{d:"M12 20v-6"}],["path",{d:"M19.656 14H22"}],["path",{d:"M2 14h12"}],["path",{d:"m2 2 20 20"}],["path",{d:"M20 20H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"}],["path",{d:"M9.656 4H20a2 2 0 0 1 2 2v10.344"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kA=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M2 14h20"}],["path",{d:"M12 20v-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IA=[["path",{d:"M18.2 12.27 20 6H4l1.8 6.27a1 1 0 0 0 .95.73h10.5a1 1 0 0 0 .96-.73Z"}],["path",{d:"M8 13v9"}],["path",{d:"M16 22v-9"}],["path",{d:"m9 6 1 7"}],["path",{d:"m15 6-1 7"}],["path",{d:"M12 6V2"}],["path",{d:"M13 2h-2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NA=[["rect",{width:"18",height:"12",x:"3",y:"8",rx:"1"}],["path",{d:"M10 8V5c0-.6-.4-1-1-1H6a1 1 0 0 0-1 1v3"}],["path",{d:"M19 8V5c0-.6-.4-1-1-1h-3a1 1 0 0 0-1 1v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zA=[["path",{d:"m10 11 11 .9a1 1 0 0 1 .8 1.1l-.665 4.158a1 1 0 0 1-.988.842H20"}],["path",{d:"M16 18h-5"}],["path",{d:"M18 5a1 1 0 0 0-1 1v5.573"}],["path",{d:"M3 4h8.129a1 1 0 0 1 .99.863L13 11.246"}],["path",{d:"M4 11V4"}],["path",{d:"M7 15h.01"}],["path",{d:"M8 10.1V4"}],["circle",{cx:"18",cy:"18",r:"2"}],["circle",{cx:"7",cy:"15",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $A=[["path",{d:"M16.05 10.966a5 2.5 0 0 1-8.1 0"}],["path",{d:"m16.923 14.049 4.48 2.04a1 1 0 0 1 .001 1.831l-8.574 3.9a2 2 0 0 1-1.66 0l-8.574-3.91a1 1 0 0 1 0-1.83l4.484-2.04"}],["path",{d:"M16.949 14.14a5 2.5 0 1 1-9.9 0L10.063 3.5a2 2 0 0 1 3.874 0z"}],["path",{d:"M9.194 6.57a5 2.5 0 0 0 5.61 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RA=[["path",{d:"M2 22V12a10 10 0 1 1 20 0v10"}],["path",{d:"M15 6.8v1.4a3 2.8 0 1 1-6 0V6.8"}],["path",{d:"M10 15h.01"}],["path",{d:"M14 15h.01"}],["path",{d:"M10 19a4 4 0 0 1-4-4v-3a6 6 0 1 1 12 0v3a4 4 0 0 1-4 4Z"}],["path",{d:"m9 19-2 3"}],["path",{d:"m15 19 2 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BA=[["path",{d:"M8 3.1V7a4 4 0 0 0 8 0V3.1"}],["path",{d:"m9 15-1-1"}],["path",{d:"m15 15 1-1"}],["path",{d:"M9 19c-2.8 0-5-2.2-5-5v-4a8 8 0 0 1 16 0v4c0 2.8-2.2 5-5 5Z"}],["path",{d:"m8 19-2 3"}],["path",{d:"m16 19 2 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _0=[["rect",{width:"16",height:"16",x:"4",y:"3",rx:"2"}],["path",{d:"M4 11h16"}],["path",{d:"M12 3v8"}],["path",{d:"m8 19-2 3"}],["path",{d:"m18 22-2-3"}],["path",{d:"M8 15h.01"}],["path",{d:"M16 15h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FA=[["path",{d:"M2 17 17 2"}],["path",{d:"m2 14 8 8"}],["path",{d:"m5 11 8 8"}],["path",{d:"m8 8 8 8"}],["path",{d:"m11 5 8 8"}],["path",{d:"m14 2 8 8"}],["path",{d:"M7 22 22 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qA=[["path",{d:"M12 16v6"}],["path",{d:"M14 20h-4"}],["path",{d:"M18 2h4v4"}],["path",{d:"m2 2 7.17 7.17"}],["path",{d:"M2 5.355V2h3.357"}],["path",{d:"m22 2-7.17 7.17"}],["path",{d:"M8 5 5 8"}],["circle",{cx:"12",cy:"12",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WA=[["path",{d:"M3 6h18"}],["path",{d:"M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"}],["path",{d:"M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"}],["line",{x1:"10",x2:"10",y1:"11",y2:"17"}],["line",{x1:"14",x2:"14",y1:"11",y2:"17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jA=[["path",{d:"M3 6h18"}],["path",{d:"M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"}],["path",{d:"M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GA=[["path",{d:"M8 19a4 4 0 0 1-2.24-7.32A3.5 3.5 0 0 1 9 6.03V6a3 3 0 1 1 6 0v.04a3.5 3.5 0 0 1 3.24 5.65A4 4 0 0 1 16 19Z"}],["path",{d:"M12 19v3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H0=[["path",{d:"M13 8c0-2.76-2.46-5-5.5-5S2 5.24 2 8h2l1-1 1 1h4"}],["path",{d:"M13 7.14A5.82 5.82 0 0 1 16.5 6c3.04 0 5.5 2.24 5.5 5h-3l-1-1-1 1h-3"}],["path",{d:"M5.89 9.71c-2.15 2.15-2.3 5.47-.35 7.43l4.24-4.25.7-.7.71-.71 2.12-2.12c-1.95-1.96-5.27-1.8-7.42.35"}],["path",{d:"M11 15.5c.5 2.5-.17 4.5-1 6.5h4c2-5.5-.5-12-1-14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZA=[["path",{d:"m17 14 3 3.3a1 1 0 0 1-.7 1.7H4.7a1 1 0 0 1-.7-1.7L7 14h-.3a1 1 0 0 1-.7-1.7L9 9h-.2A1 1 0 0 1 8 7.3L12 3l4 4.3a1 1 0 0 1-.8 1.7H15l3 3.3a1 1 0 0 1-.7 1.7H17Z"}],["path",{d:"M12 22v-3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XA=[["path",{d:"M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z"}],["path",{d:"M7 16v6"}],["path",{d:"M13 19v3"}],["path",{d:"M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UA=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",ry:"2"}],["rect",{width:"3",height:"9",x:"7",y:"7"}],["rect",{width:"3",height:"5",x:"14",y:"7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YA=[["path",{d:"M16 17h6v-6"}],["path",{d:"m22 17-8.5-8.5-5 5L2 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KA=[["path",{d:"M14.828 14.828 21 21"}],["path",{d:"M21 16v5h-5"}],["path",{d:"m21 3-9 9-4-4-6 6"}],["path",{d:"M21 8V3h-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QA=[["path",{d:"M16 7h6v6"}],["path",{d:"m22 7-8.5 8.5-5-5L2 17"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L0=[["path",{d:"m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"}],["path",{d:"M12 9v4"}],["path",{d:"M12 17h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JA=[["path",{d:"M10.17 4.193a2 2 0 0 1 3.666.013"}],["path",{d:"M14 21h2"}],["path",{d:"m15.874 7.743 1 1.732"}],["path",{d:"m18.849 12.952 1 1.732"}],["path",{d:"M21.824 18.18a2 2 0 0 1-1.835 2.824"}],["path",{d:"M4.024 21a2 2 0 0 1-1.839-2.839"}],["path",{d:"m5.136 12.952-1 1.732"}],["path",{d:"M8 21h2"}],["path",{d:"m8.102 7.743-1 1.732"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const tT=[["path",{d:"M22 18a2 2 0 0 1-2 2H3c-1.1 0-1.3-.6-.4-1.3L20.4 4.3c.9-.7 1.6-.4 1.6.7Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const eT=[["path",{d:"M13.73 4a2 2 0 0 0-3.46 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const aT=[["path",{d:"M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"}],["path",{d:"M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"}],["path",{d:"M18 9h1.5a1 1 0 0 0 0-5H18"}],["path",{d:"M4 22h16"}],["path",{d:"M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"}],["path",{d:"M6 9H4.5a1 1 0 0 1 0-5H6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const iT=[["path",{d:"M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"}],["path",{d:"M15 18H9"}],["path",{d:"M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"}],["circle",{cx:"17",cy:"18",r:"2"}],["circle",{cx:"7",cy:"18",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const rT=[["path",{d:"M14 19V7a2 2 0 0 0-2-2H9"}],["path",{d:"M15 19H9"}],["path",{d:"M19 19h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L18.3 9.38a1 1 0 0 0-.78-.38H14"}],["path",{d:"M2 13v5a1 1 0 0 0 1 1h2"}],["path",{d:"M4 3 2.15 5.15a.495.495 0 0 0 .35.86h2.15a.47.47 0 0 1 .35.86L3 9.02"}],["circle",{cx:"17",cy:"19",r:"2"}],["circle",{cx:"7",cy:"19",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const nT=[["path",{d:"m12 10 2 4v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3a8 8 0 1 0-16 0v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3l2-4h4Z"}],["path",{d:"M4.82 7.9 8 10"}],["path",{d:"M15.18 7.9 12 10"}],["path",{d:"M16.93 10H20a2 2 0 0 1 0 4H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const sT=[["path",{d:"M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z"}],["path",{d:"M7 21h10"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V0=[["path",{d:"M7 21h10"}],["rect",{width:"20",height:"14",x:"2",y:"3",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const oT=[["path",{d:"m17 2-5 5-5-5"}],["rect",{width:"20",height:"15",x:"2",y:"7",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const hT=[["path",{d:"M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const lT=[["path",{d:"M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const dT=[["path",{d:"M12 4v16"}],["path",{d:"M4 7V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2"}],["path",{d:"M9 20h6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const cT=[["path",{d:"M14 16.5a.5.5 0 0 0 .5.5h.5a2 2 0 0 1 0 4H9a2 2 0 0 1 0-4h.5a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V8a2 2 0 0 1-4 0V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-4 0v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const pT=[["path",{d:"M12 2v1"}],["path",{d:"M15.5 21a1.85 1.85 0 0 1-3.5-1v-8H2a10 10 0 0 1 3.428-6.575"}],["path",{d:"M17.5 12H22A10 10 0 0 0 9.004 3.455"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const uT=[["path",{d:"M22 12a10.06 10.06 1 0 0-20 0Z"}],["path",{d:"M12 12v8a2 2 0 0 0 4 0"}],["path",{d:"M12 2v1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const fT=[["path",{d:"M6 4v6a6 6 0 0 0 12 0V4"}],["line",{x1:"4",x2:"20",y1:"20",y2:"20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const MT=[["path",{d:"M9 14 4 9l5-5"}],["path",{d:"M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5a5.5 5.5 0 0 1-5.5 5.5H11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const mT=[["path",{d:"M21 17a9 9 0 0 0-15-6.7L3 13"}],["path",{d:"M3 7v6h6"}],["circle",{cx:"12",cy:"17",r:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const vT=[["path",{d:"M3 7v6h6"}],["path",{d:"M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const gT=[["path",{d:"M16 12h6"}],["path",{d:"M8 12H2"}],["path",{d:"M12 2v2"}],["path",{d:"M12 8v2"}],["path",{d:"M12 14v2"}],["path",{d:"M12 20v2"}],["path",{d:"m19 15 3-3-3-3"}],["path",{d:"m5 9-3 3 3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const yT=[["path",{d:"M12 22v-6"}],["path",{d:"M12 8V2"}],["path",{d:"M4 12H2"}],["path",{d:"M10 12H8"}],["path",{d:"M16 12h-2"}],["path",{d:"M22 12h-2"}],["path",{d:"m15 19-3 3-3-3"}],["path",{d:"m15 5-3-3-3 3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const xT=[["rect",{width:"8",height:"6",x:"5",y:"4",rx:"1"}],["rect",{width:"8",height:"6",x:"11",y:"14",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P0=[["path",{d:"M14 21v-3a2 2 0 0 0-4 0v3"}],["path",{d:"M18 12h.01"}],["path",{d:"M18 16h.01"}],["path",{d:"M22 7a1 1 0 0 0-1-1h-2a2 2 0 0 1-1.143-.359L13.143 2.36a2 2 0 0 0-2.286-.001L6.143 5.64A2 2 0 0 1 5 6H3a1 1 0 0 0-1 1v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2z"}],["path",{d:"M6 12h.01"}],["path",{d:"M6 16h.01"}],["circle",{cx:"12",cy:"10",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const wT=[["path",{d:"M15 7h2a5 5 0 0 1 0 10h-2m-6 0H7A5 5 0 0 1 7 7h2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const bT=[["path",{d:"m18.84 12.25 1.72-1.71h-.02a5.004 5.004 0 0 0-.12-7.07 5.006 5.006 0 0 0-6.95 0l-1.72 1.71"}],["path",{d:"m5.17 11.75-1.71 1.71a5.004 5.004 0 0 0 .12 7.07 5.006 5.006 0 0 0 6.95 0l1.71-1.71"}],["line",{x1:"8",x2:"8",y1:"2",y2:"5"}],["line",{x1:"2",x2:"5",y1:"8",y2:"8"}],["line",{x1:"16",x2:"16",y1:"19",y2:"22"}],["line",{x1:"19",x2:"22",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ET=[["path",{d:"m19 5 3-3"}],["path",{d:"m2 22 3-3"}],["path",{d:"M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z"}],["path",{d:"M7.5 13.5 10 11"}],["path",{d:"M10.5 16.5 13 14"}],["path",{d:"m12 6 6 6 2.3-2.3a2.4 2.4 0 0 0 0-3.4l-2.6-2.6a2.4 2.4 0 0 0-3.4 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ST=[["path",{d:"M12 3v12"}],["path",{d:"m17 8-5-5-5 5"}],["path",{d:"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const CT=[["circle",{cx:"10",cy:"7",r:"1"}],["circle",{cx:"4",cy:"20",r:"1"}],["path",{d:"M4.7 19.3 19 5"}],["path",{d:"m21 3-3 1 2 2Z"}],["path",{d:"M9.26 7.68 5 12l2 5"}],["path",{d:"m10 14 5 2 3.5-3.5"}],["path",{d:"m18 12 1-1 1 1-1 1Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const AT=[["path",{d:"m16 11 2 2 4-4"}],["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const TT=[["circle",{cx:"10",cy:"7",r:"4"}],["path",{d:"M10.3 15H7a4 4 0 0 0-4 4v2"}],["path",{d:"M15 15.5V14a2 2 0 0 1 4 0v1.5"}],["rect",{width:"8",height:"5",x:"13",y:"16",rx:".899"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const _T=[["path",{d:"M10 15H6a4 4 0 0 0-4 4v2"}],["path",{d:"m14.305 16.53.923-.382"}],["path",{d:"m15.228 13.852-.923-.383"}],["path",{d:"m16.852 12.228-.383-.923"}],["path",{d:"m16.852 17.772-.383.924"}],["path",{d:"m19.148 12.228.383-.923"}],["path",{d:"m19.53 18.696-.382-.924"}],["path",{d:"m20.772 13.852.924-.383"}],["path",{d:"m20.772 16.148.924.383"}],["circle",{cx:"18",cy:"15",r:"3"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const HT=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"22",x2:"16",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const LT=[["path",{d:"M11.5 15H7a4 4 0 0 0-4 4v2"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const VT=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"19",x2:"19",y1:"8",y2:"14"}],["line",{x1:"22",x2:"16",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D0=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"m16 19 2 2 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O0=[["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"M2 21a8 8 0 0 1 10.434-7.62"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["circle",{cx:"10",cy:"8",r:"5"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k0=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M22 19h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const PT=[["path",{d:"M2 21a8 8 0 0 1 10.821-7.487"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["circle",{cx:"10",cy:"8",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I0=[["path",{d:"M2 21a8 8 0 0 1 13.292-6"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M19 16v6"}],["path",{d:"M22 19h-6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const DT=[["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M2 21a8 8 0 0 1 10.434-7.62"}],["circle",{cx:"18",cy:"18",r:"3"}],["path",{d:"m22 22-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N0=[["path",{d:"M2 21a8 8 0 0 1 11.873-7"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"m17 17 5 5"}],["path",{d:"m22 17-5 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z0=[["circle",{cx:"12",cy:"8",r:"5"}],["path",{d:"M20 21a8 8 0 0 0-16 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const OT=[["circle",{cx:"10",cy:"7",r:"4"}],["path",{d:"M10.3 15H7a4 4 0 0 0-4 4v2"}],["circle",{cx:"17",cy:"17",r:"3"}],["path",{d:"m21 21-1.9-1.9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const kT=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["circle",{cx:"9",cy:"7",r:"4"}],["line",{x1:"17",x2:"22",y1:"8",y2:"13"}],["line",{x1:"22",x2:"17",y1:"8",y2:"13"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const IT=[["path",{d:"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"}],["circle",{cx:"12",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $0=[["path",{d:"M18 21a8 8 0 0 0-16 0"}],["circle",{cx:"10",cy:"8",r:"5"}],["path",{d:"M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const NT=[["path",{d:"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"}],["path",{d:"M16 3.128a4 4 0 0 1 0 7.744"}],["path",{d:"M22 21v-2a4 4 0 0 0-3-3.87"}],["circle",{cx:"9",cy:"7",r:"4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R0=[["path",{d:"m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"}],["path",{d:"M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"}],["path",{d:"m2.1 21.8 6.4-6.3"}],["path",{d:"m19 5-7 7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B0=[["path",{d:"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"}],["path",{d:"M7 2v20"}],["path",{d:"M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const zT=[["path",{d:"M12 2v20"}],["path",{d:"M2 5h20"}],["path",{d:"M3 3v2"}],["path",{d:"M7 3v2"}],["path",{d:"M17 3v2"}],["path",{d:"M21 3v2"}],["path",{d:"m19 5-7 7-7-7"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $T=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["circle",{cx:"7.5",cy:"7.5",r:".5",fill:"currentColor"}],["path",{d:"m7.9 7.9 2.7 2.7"}],["circle",{cx:"16.5",cy:"7.5",r:".5",fill:"currentColor"}],["path",{d:"m13.4 10.6 2.7-2.7"}],["circle",{cx:"7.5",cy:"16.5",r:".5",fill:"currentColor"}],["path",{d:"m7.9 16.1 2.7-2.7"}],["circle",{cx:"16.5",cy:"16.5",r:".5",fill:"currentColor"}],["path",{d:"m13.4 13.4 2.7 2.7"}],["circle",{cx:"12",cy:"12",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const RT=[["path",{d:"M8 21s-4-3-4-9 4-9 4-9"}],["path",{d:"M16 3s4 3 4 9-4 9-4 9"}],["line",{x1:"15",x2:"9",y1:"9",y2:"15"}],["line",{x1:"9",x2:"15",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const BT=[["path",{d:"M19.5 7a24 24 0 0 1 0 10"}],["path",{d:"M4.5 7a24 24 0 0 0 0 10"}],["path",{d:"M7 19.5a24 24 0 0 0 10 0"}],["path",{d:"M7 4.5a24 24 0 0 1 10 0"}],["rect",{x:"17",y:"17",width:"5",height:"5",rx:"1"}],["rect",{x:"17",y:"2",width:"5",height:"5",rx:"1"}],["rect",{x:"2",y:"17",width:"5",height:"5",rx:"1"}],["rect",{x:"2",y:"2",width:"5",height:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const FT=[["path",{d:"M16 8q6 0 6-6-6 0-6 6"}],["path",{d:"M17.41 3.59a10 10 0 1 0 3 3"}],["path",{d:"M2 2a26.6 26.6 0 0 1 10 20c.9-6.82 1.5-9.5 4-14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const qT=[["path",{d:"M18 11c-1.5 0-2.5.5-3 2"}],["path",{d:"M4 6a2 2 0 0 0-2 2v4a5 5 0 0 0 5 5 8 8 0 0 1 5 2 8 8 0 0 1 5-2 5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3a8 8 0 0 0-5 2 8 8 0 0 0-5-2z"}],["path",{d:"M6 11c1.5 0 2.5.5 3 2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const WT=[["path",{d:"M10 20h4"}],["path",{d:"M12 16v6"}],["path",{d:"M17 2h4v4"}],["path",{d:"m21 2-5.46 5.46"}],["circle",{cx:"12",cy:"11",r:"5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const jT=[["path",{d:"M12 15v7"}],["path",{d:"M9 19h6"}],["circle",{cx:"12",cy:"9",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const GT=[["path",{d:"m2 8 2 2-2 2 2 2-2 2"}],["path",{d:"m22 8-2 2 2 2-2 2 2 2"}],["path",{d:"M8 8v10c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2"}],["path",{d:"M16 10.34V6c0-.55-.45-1-1-1h-4.34"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const ZT=[["path",{d:"m2 8 2 2-2 2 2 2-2 2"}],["path",{d:"m22 8-2 2 2 2-2 2 2 2"}],["rect",{width:"8",height:"14",x:"8",y:"5",rx:"1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const XT=[["path",{d:"M10.66 6H14a2 2 0 0 1 2 2v2.5l5.248-3.062A.5.5 0 0 1 22 7.87v8.196"}],["path",{d:"M16 16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const UT=[["path",{d:"m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"}],["rect",{x:"2",y:"6",width:"14",height:"12",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const YT=[["rect",{width:"20",height:"16",x:"2",y:"4",rx:"2"}],["path",{d:"M2 8h20"}],["circle",{cx:"8",cy:"14",r:"2"}],["path",{d:"M8 12h8"}],["circle",{cx:"16",cy:"14",r:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const KT=[["path",{d:"M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"}],["path",{d:"M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"}],["circle",{cx:"12",cy:"12",r:"1"}],["path",{d:"M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const QT=[["circle",{cx:"6",cy:"12",r:"4"}],["circle",{cx:"18",cy:"12",r:"4"}],["line",{x1:"6",x2:"18",y1:"16",y2:"16"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const JT=[["path",{d:"M11.1 7.1a16.55 16.55 0 0 1 10.9 4"}],["path",{d:"M12 12a12.6 12.6 0 0 1-8.7 5"}],["path",{d:"M16.8 13.6a16.55 16.55 0 0 1-9 7.5"}],["path",{d:"M20.7 17a12.8 12.8 0 0 0-8.7-5 13.3 13.3 0 0 1 0-10"}],["path",{d:"M6.3 3.8a16.55 16.55 0 0 0 1.9 11.5"}],["circle",{cx:"12",cy:"12",r:"10"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const t_=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["path",{d:"M16 9a5 5 0 0 1 0 6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const e_=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["path",{d:"M16 9a5 5 0 0 1 0 6"}],["path",{d:"M19.364 18.364a9 9 0 0 0 0-12.728"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const a_=[["path",{d:"M16 9a5 5 0 0 1 .95 2.293"}],["path",{d:"M19.364 5.636a9 9 0 0 1 1.889 9.96"}],["path",{d:"m2 2 20 20"}],["path",{d:"m7 7-.587.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298V11"}],["path",{d:"M9.828 4.172A.686.686 0 0 1 11 4.657v.686"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const i_=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}],["line",{x1:"22",x2:"16",y1:"9",y2:"15"}],["line",{x1:"16",x2:"22",y1:"9",y2:"15"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const r_=[["path",{d:"M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const n_=[["path",{d:"m9 12 2 2 4-4"}],["path",{d:"M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v12H5V7Z"}],["path",{d:"M22 19H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const s_=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2"}],["path",{d:"M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2"}],["path",{d:"M3 11h3c.8 0 1.6.3 2.1.9l1.1.9c1.6 1.6 4.1 1.6 5.7 0l1.1-.9c.5-.5 1.3-.9 2.1-.9H21"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F0=[["path",{d:"M17 14h.01"}],["path",{d:"M7 7h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const o_=[["path",{d:"M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"}],["path",{d:"M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h_=[["circle",{cx:"8",cy:"9",r:"2"}],["path",{d:"m9 17 6.1-6.1a2 2 0 0 1 2.81.01L22 15V5a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2"}],["path",{d:"M8 21h8"}],["path",{d:"M12 17v4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q0=[["path",{d:"m21.64 3.64-1.28-1.28a1.21 1.21 0 0 0-1.72 0L2.36 18.64a1.21 1.21 0 0 0 0 1.72l1.28 1.28a1.2 1.2 0 0 0 1.72 0L21.64 5.36a1.2 1.2 0 0 0 0-1.72"}],["path",{d:"m14 7 3 3"}],["path",{d:"M5 6v4"}],["path",{d:"M19 14v4"}],["path",{d:"M10 2v2"}],["path",{d:"M7 8H3"}],["path",{d:"M21 16h-4"}],["path",{d:"M11 3H9"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const l_=[["path",{d:"M15 4V2"}],["path",{d:"M15 16v-2"}],["path",{d:"M8 9h2"}],["path",{d:"M20 9h2"}],["path",{d:"M17.8 11.8 19 13"}],["path",{d:"M15 9h.01"}],["path",{d:"M17.8 6.2 19 5"}],["path",{d:"m3 21 9-9"}],["path",{d:"M12.2 6.2 11 5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const d_=[["path",{d:"M18 21V10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v11"}],["path",{d:"M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 1.132-1.803l7.95-3.974a2 2 0 0 1 1.837 0l7.948 3.974A2 2 0 0 1 22 8z"}],["path",{d:"M6 13h12"}],["path",{d:"M6 17h12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const c_=[["path",{d:"M3 6h3"}],["path",{d:"M17 6h.01"}],["rect",{width:"18",height:"20",x:"3",y:"2",rx:"2"}],["circle",{cx:"12",cy:"13",r:"5"}],["path",{d:"M12 18a2.5 2.5 0 0 0 0-5 2.5 2.5 0 0 1 0-5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const p_=[["path",{d:"M12 10v2.2l1.6 1"}],["path",{d:"m16.13 7.66-.81-4.05a2 2 0 0 0-2-1.61h-2.68a2 2 0 0 0-2 1.61l-.78 4.05"}],["path",{d:"m7.88 16.36.8 4a2 2 0 0 0 2 1.61h2.72a2 2 0 0 0 2-1.61l.81-4.05"}],["circle",{cx:"12",cy:"12",r:"6"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const u_=[["path",{d:"M19 5a2 2 0 0 0-2 2v11"}],["path",{d:"M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M7 13h10"}],["path",{d:"M7 9h10"}],["path",{d:"M9 5a2 2 0 0 0-2 2v11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const f_=[["path",{d:"M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}],["path",{d:"M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const M_=[["circle",{cx:"12",cy:"4.5",r:"2.5"}],["path",{d:"m10.2 6.3-3.9 3.9"}],["circle",{cx:"4.5",cy:"12",r:"2.5"}],["path",{d:"M7 12h10"}],["circle",{cx:"19.5",cy:"12",r:"2.5"}],["path",{d:"m13.8 17.7 3.9-3.9"}],["circle",{cx:"12",cy:"19.5",r:"2.5"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const m_=[["circle",{cx:"12",cy:"10",r:"8"}],["circle",{cx:"12",cy:"10",r:"3"}],["path",{d:"M7 22h10"}],["path",{d:"M12 22v-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v_=[["path",{d:"M17 17h-5c-1.09-.02-1.94.92-2.5 1.9A3 3 0 1 1 2.57 15"}],["path",{d:"M9 3.4a4 4 0 0 1 6.52.66"}],["path",{d:"m6 17 3.1-5.8a2.5 2.5 0 0 0 .057-2.05"}],["path",{d:"M20.3 20.3a4 4 0 0 1-2.3.7"}],["path",{d:"M18.6 13a4 4 0 0 1 3.357 3.414"}],["path",{d:"m12 6 .6 1"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g_=[["path",{d:"M18 16.98h-5.99c-1.1 0-1.95.94-2.48 1.9A4 4 0 0 1 2 17c.01-.7.2-1.4.57-2"}],["path",{d:"m6 17 3.13-5.78c.53-.97.1-2.18-.5-3.1a4 4 0 1 1 6.89-4.06"}],["path",{d:"m12 6 3.13 5.73C15.66 12.7 16.9 13 18 13a4 4 0 0 1 0 8"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const y_=[["circle",{cx:"12",cy:"5",r:"3"}],["path",{d:"M6.5 8a2 2 0 0 0-1.905 1.46L2.1 18.5A2 2 0 0 0 4 21h16a2 2 0 0 0 1.925-2.54L19.4 9.5A2 2 0 0 0 17.48 8Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const x_=[["path",{d:"m2 22 10-10"}],["path",{d:"m16 8-1.17 1.17"}],["path",{d:"M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"m8 8-.53.53a3.5 3.5 0 0 0 0 4.94L9 15l1.53-1.53c.55-.55.88-1.25.98-1.97"}],["path",{d:"M10.91 5.26c.15-.26.34-.51.56-.73L13 3l1.53 1.53a3.5 3.5 0 0 1 .28 4.62"}],["path",{d:"M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"}],["path",{d:"M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"m16 16-.53.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.49 3.49 0 0 1 1.97-.98"}],["path",{d:"M18.74 13.09c.26-.15.51-.34.73-.56L21 11l-1.53-1.53a3.5 3.5 0 0 0-4.62-.28"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const w_=[["path",{d:"M2 22 16 8"}],["path",{d:"M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"}],["path",{d:"M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"}],["path",{d:"M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}],["path",{d:"M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const b_=[["circle",{cx:"7",cy:"12",r:"3"}],["path",{d:"M10 9v6"}],["circle",{cx:"17",cy:"12",r:"3"}],["path",{d:"M14 7v8"}],["path",{d:"M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const E_=[["path",{d:"m14.305 19.53.923-.382"}],["path",{d:"m15.228 16.852-.923-.383"}],["path",{d:"m16.852 15.228-.383-.923"}],["path",{d:"m16.852 20.772-.383.924"}],["path",{d:"m19.148 15.228.383-.923"}],["path",{d:"m19.53 21.696-.382-.924"}],["path",{d:"M2 7.82a15 15 0 0 1 20 0"}],["path",{d:"m20.772 16.852.924-.383"}],["path",{d:"m20.772 19.148.924.383"}],["path",{d:"M5 11.858a10 10 0 0 1 11.5-1.785"}],["path",{d:"M8.5 15.429a5 5 0 0 1 2.413-1.31"}],["circle",{cx:"18",cy:"18",r:"3"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const S_=[["path",{d:"M12 20h.01"}],["path",{d:"M5 12.859a10 10 0 0 1 14 0"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C_=[["path",{d:"M12 20h.01"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const A_=[["path",{d:"M12 20h.01"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}],["path",{d:"M5 12.859a10 10 0 0 1 5.17-2.69"}],["path",{d:"M19 12.859a10 10 0 0 0-2.007-1.523"}],["path",{d:"M2 8.82a15 15 0 0 1 4.177-2.643"}],["path",{d:"M22 8.82a15 15 0 0 0-11.288-3.764"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const T_=[["path",{d:"M2 8.82a15 15 0 0 1 20 0"}],["path",{d:"M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"}],["path",{d:"M5 12.859a10 10 0 0 1 10.5-2.222"}],["path",{d:"M8.5 16.429a5 5 0 0 1 3-1.406"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const __=[["path",{d:"M12 20h.01"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const H_=[["path",{d:"M12 20h.01"}],["path",{d:"M2 8.82a15 15 0 0 1 20 0"}],["path",{d:"M5 12.859a10 10 0 0 1 14 0"}],["path",{d:"M8.5 16.429a5 5 0 0 1 7 0"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const L_=[["path",{d:"M10 2v8"}],["path",{d:"M12.8 21.6A2 2 0 1 0 14 18H2"}],["path",{d:"M17.5 10a2.5 2.5 0 1 1 2 4H2"}],["path",{d:"m6 6 4 4 4-4"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const V_=[["path",{d:"M12.8 19.6A2 2 0 1 0 14 16H2"}],["path",{d:"M17.5 8a2.5 2.5 0 1 1 2 4H2"}],["path",{d:"M9.8 4.4A2 2 0 1 1 11 8H2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const P_=[["path",{d:"M8 22h8"}],["path",{d:"M7 10h3m7 0h-1.343"}],["path",{d:"M12 15v7"}],["path",{d:"M7.307 7.307A12.33 12.33 0 0 0 7 10a5 5 0 0 0 7.391 4.391M8.638 2.981C8.75 2.668 8.872 2.34 9 2h6c1.5 4 2 6 2 8 0 .407-.05.809-.145 1.198"}],["line",{x1:"2",x2:"22",y1:"2",y2:"22"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const D_=[["path",{d:"M8 22h8"}],["path",{d:"M7 10h10"}],["path",{d:"M12 15v7"}],["path",{d:"M12 15a5 5 0 0 0 5-5c0-2-.5-4-2-8H9c-1.5 4-2 6-2 8a5 5 0 0 0 5 5Z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const O_=[["rect",{width:"8",height:"8",x:"3",y:"3",rx:"2"}],["path",{d:"M7 11v4a2 2 0 0 0 2 2h4"}],["rect",{width:"8",height:"8",x:"13",y:"13",rx:"2"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k_=[["path",{d:"m19 12-1.5 3"}],["path",{d:"M19.63 18.81 22 20"}],["path",{d:"M6.47 8.23a1.68 1.68 0 0 1 2.44 1.93l-.64 2.08a6.76 6.76 0 0 0 10.16 7.67l.42-.27a1 1 0 1 0-2.73-4.21l-.42.27a1.76 1.76 0 0 1-2.63-1.99l.64-2.08A6.66 6.66 0 0 0 3.94 3.9l-.7.4a1 1 0 1 0 2.55 4.34z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const I_=[["path",{d:"m16 16-2 2 2 2"}],["path",{d:"M3 12h15a3 3 0 1 1 0 6h-4"}],["path",{d:"M3 18h7"}],["path",{d:"M3 6h18"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const N_=[["path",{d:"M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const z_=[["path",{d:"M18 6 6 18"}],["path",{d:"m6 6 12 12"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const $_=[["path",{d:"M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"}],["path",{d:"m10 15 5-3-5-3z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const R_=[["path",{d:"M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const B_=[["path",{d:"M10.513 4.856 13.12 2.17a.5.5 0 0 1 .86.46l-1.377 4.317"}],["path",{d:"M15.656 10H20a1 1 0 0 1 .78 1.63l-1.72 1.773"}],["path",{d:"M16.273 16.273 10.88 21.83a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14H4a1 1 0 0 1-.78-1.63l4.507-4.643"}],["path",{d:"m2 2 20 20"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const F_=[["circle",{cx:"11",cy:"11",r:"8"}],["line",{x1:"21",x2:"16.65",y1:"21",y2:"16.65"}],["line",{x1:"11",x2:"11",y1:"8",y2:"14"}],["line",{x1:"8",x2:"14",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const q_=[["circle",{cx:"11",cy:"11",r:"8"}],["line",{x1:"21",x2:"16.65",y1:"21",y2:"16.65"}],["line",{x1:"8",x2:"14",y1:"11",y2:"11"}]];/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const W_=Object.freeze(Object.defineProperty({__proto__:null,AArrowDown:Bl,AArrowUp:ql,ALargeSmall:Fl,Accessibility:Wl,Activity:jl,ActivitySquare:_s,AirVent:Gl,Airplay:Zl,AlarmCheck:nr,AlarmClock:Ul,AlarmClockCheck:nr,AlarmClockMinus:sr,AlarmClockOff:Xl,AlarmClockPlus:or,AlarmMinus:sr,AlarmPlus:or,AlarmSmoke:Yl,Album:Kl,AlertCircle:Ir,AlertOctagon:is,AlertTriangle:L0,AlignCenter:td,AlignCenterHorizontal:Ql,AlignCenterVertical:Jl,AlignEndHorizontal:ed,AlignEndVertical:ad,AlignHorizontalDistributeCenter:id,AlignHorizontalDistributeEnd:nd,AlignHorizontalDistributeStart:rd,AlignHorizontalJustifyCenter:sd,AlignHorizontalJustifyEnd:hd,AlignHorizontalJustifyStart:od,AlignHorizontalSpaceAround:ld,AlignHorizontalSpaceBetween:dd,AlignJustify:cd,AlignLeft:pd,AlignRight:ud,AlignStartHorizontal:fd,AlignStartVertical:Md,AlignVerticalDistributeCenter:md,AlignVerticalDistributeEnd:vd,AlignVerticalDistributeStart:gd,AlignVerticalJustifyCenter:yd,AlignVerticalJustifyEnd:xd,AlignVerticalJustifyStart:wd,AlignVerticalSpaceAround:bd,AlignVerticalSpaceBetween:Ed,Ambulance:Sd,Ampersand:Cd,Ampersands:Ad,Amphora:Td,Anchor:_d,Angry:Hd,Annoyed:Ld,Antenna:Vd,Anvil:Pd,Aperture:Dd,AppWindow:kd,AppWindowMac:Od,Apple:Id,Archive:zd,ArchiveRestore:Nd,ArchiveX:Rd,AreaChart:br,Armchair:$d,ArrowBigDown:Fd,ArrowBigDownDash:Bd,ArrowBigLeft:Wd,ArrowBigLeftDash:qd,ArrowBigRight:Zd,ArrowBigRightDash:jd,ArrowBigUp:Xd,ArrowBigUpDash:Gd,ArrowDown:rc,ArrowDown01:Ud,ArrowDown10:Yd,ArrowDownAZ:hr,ArrowDownAz:hr,ArrowDownCircle:kr,ArrowDownFromLine:Kd,ArrowDownLeft:Qd,ArrowDownLeftFromCircle:zr,ArrowDownLeftFromSquare:Ds,ArrowDownLeftSquare:Hs,ArrowDownNarrowWide:Jd,ArrowDownRight:tc,ArrowDownRightFromCircle:Fr,ArrowDownRightFromSquare:ks,ArrowDownRightSquare:Ls,ArrowDownSquare:Ps,ArrowDownToDot:ec,ArrowDownToLine:ac,ArrowDownUp:ic,ArrowDownWideNarrow:lr,ArrowDownZA:dr,ArrowDownZa:dr,ArrowLeft:hc,ArrowLeftCircle:Nr,ArrowLeftFromLine:nc,ArrowLeftRight:sc,ArrowLeftSquare:Vs,ArrowLeftToLine:oc,ArrowRight:pc,ArrowRightCircle:Br,ArrowRightFromLine:lc,ArrowRightLeft:dc,ArrowRightSquare:Ns,ArrowRightToLine:cc,ArrowUp:bc,ArrowUp01:uc,ArrowUp10:fc,ArrowUpAZ:cr,ArrowUpAz:cr,ArrowUpCircle:qr,ArrowUpDown:Mc,ArrowUpFromDot:mc,ArrowUpFromLine:vc,ArrowUpLeft:gc,ArrowUpLeftFromCircle:$r,ArrowUpLeftFromSquare:Os,ArrowUpLeftSquare:zs,ArrowUpNarrowWide:pr,ArrowUpRight:yc,ArrowUpRightFromCircle:Rr,ArrowUpRightFromSquare:Is,ArrowUpRightSquare:$s,ArrowUpSquare:Rs,ArrowUpToLine:wc,ArrowUpWideNarrow:xc,ArrowUpZA:ur,ArrowUpZa:ur,ArrowsUpFromLine:Sc,Asterisk:Ec,AsteriskSquare:Bs,AtSign:Cc,Atom:Ac,AudioLines:Tc,AudioWaveform:_c,Award:Hc,Axe:Lc,Axis3D:fr,Axis3d:fr,Baby:Vc,Backpack:Pc,Badge:Zc,BadgeAlert:Dc,BadgeCent:Oc,BadgeCheck:Mr,BadgeDollarSign:kc,BadgeEuro:Ic,BadgeHelp:mr,BadgeIndianRupee:Nc,BadgeInfo:zc,BadgeJapaneseYen:$c,BadgeMinus:Rc,BadgePercent:Bc,BadgePlus:qc,BadgePoundSterling:Fc,BadgeQuestionMark:mr,BadgeRussianRuble:Wc,BadgeSwissFranc:jc,BadgeX:Gc,BaggageClaim:Xc,Ban:Uc,Banana:Yc,Bandage:Jc,Banknote:ep,BanknoteArrowDown:Kc,BanknoteArrowUp:Qc,BanknoteX:tp,BarChart:Lr,BarChart2:Vr,BarChart3:_r,BarChart4:Tr,BarChartBig:Ar,BarChartHorizontal:Sr,BarChartHorizontalBig:Er,Barcode:ap,Barrel:ip,Baseline:rp,Bath:np,Battery:pp,BatteryCharging:sp,BatteryFull:op,BatteryLow:hp,BatteryMedium:lp,BatteryPlus:dp,BatteryWarning:cp,Beaker:up,Bean:Mp,BeanOff:fp,Bed:gp,BedDouble:mp,BedSingle:vp,Beef:yp,Beer:wp,BeerOff:xp,Bell:_p,BellDot:bp,BellElectric:Ep,BellMinus:Sp,BellOff:Cp,BellPlus:Ap,BellRing:Tp,BetweenHorizonalEnd:vr,BetweenHorizonalStart:gr,BetweenHorizontalEnd:vr,BetweenHorizontalStart:gr,BetweenVerticalEnd:Hp,BetweenVerticalStart:Lp,BicepsFlexed:Vp,Bike:Dp,Binary:Pp,Binoculars:Op,Biohazard:kp,Bird:Ip,Bitcoin:zp,Blend:Np,Blinds:$p,Blocks:Rp,Bluetooth:jp,BluetoothConnected:Bp,BluetoothOff:Fp,BluetoothSearching:qp,Bold:Wp,Bolt:Gp,Bomb:Zp,Bone:Xp,Book:gu,BookA:Up,BookAlert:Yp,BookAudio:Kp,BookCheck:Qp,BookCopy:Jp,BookDashed:yr,BookDown:tu,BookHeadphones:eu,BookHeart:au,BookImage:iu,BookKey:ru,BookLock:nu,BookMarked:su,BookMinus:ou,BookOpen:du,BookOpenCheck:lu,BookOpenText:hu,BookPlus:cu,BookTemplate:yr,BookText:pu,BookType:uu,BookUp:mu,BookUp2:fu,BookUser:Mu,BookX:vu,Bookmark:Eu,BookmarkCheck:yu,BookmarkMinus:xu,BookmarkPlus:wu,BookmarkX:bu,BoomBox:Su,Bot:Au,BotMessageSquare:Tu,BotOff:Cu,BottleWine:_u,BowArrow:Hu,Box:Lu,BoxSelect:Qs,Boxes:Vu,Braces:xr,Brackets:Pu,Brain:ku,BrainCircuit:Du,BrainCog:Ou,BrickWall:Nu,BrickWallFire:Iu,Briefcase:Bu,BriefcaseBusiness:zu,BriefcaseConveyorBelt:$u,BriefcaseMedical:Ru,BringToFront:Fu,Brush:Wu,BrushCleaning:qu,Bubbles:ju,Bug:Xu,BugOff:Gu,BugPlay:Zu,Building:Yu,Building2:Uu,Bus:Qu,BusFront:Ku,Cable:t4,CableCar:Ju,Cake:a4,CakeSlice:e4,Calculator:i4,Calendar:S4,Calendar1:r4,CalendarArrowDown:n4,CalendarArrowUp:s4,CalendarCheck:h4,CalendarCheck2:o4,CalendarClock:l4,CalendarCog:d4,CalendarDays:c4,CalendarFold:u4,CalendarHeart:f4,CalendarMinus:M4,CalendarMinus2:p4,CalendarOff:m4,CalendarPlus:g4,CalendarPlus2:v4,CalendarRange:y4,CalendarSearch:x4,CalendarSync:w4,CalendarX:E4,CalendarX2:b4,Camera:A4,CameraOff:C4,CandlestickChart:Cr,Candy:H4,CandyCane:T4,CandyOff:_4,Cannabis:L4,Captions:wr,CaptionsOff:V4,Car:O4,CarFront:P4,CarTaxiFront:D4,Caravan:k4,CardSim:I4,Carrot:N4,CaseLower:z4,CaseSensitive:$4,CaseUpper:R4,CassetteTape:B4,Cast:F4,Castle:q4,Cat:W4,Cctv:j4,ChartArea:br,ChartBar:Sr,ChartBarBig:Er,ChartBarDecreasing:G4,ChartBarIncreasing:Z4,ChartBarStacked:X4,ChartCandlestick:Cr,ChartColumn:_r,ChartColumnBig:Ar,ChartColumnDecreasing:U4,ChartColumnIncreasing:Tr,ChartColumnStacked:Y4,ChartGantt:K4,ChartLine:Hr,ChartNetwork:J4,ChartNoAxesColumn:Vr,ChartNoAxesColumnDecreasing:Q4,ChartNoAxesColumnIncreasing:Lr,ChartNoAxesCombined:tf,ChartNoAxesGantt:Pr,ChartPie:Dr,ChartScatter:Or,ChartSpline:ef,Check:nf,CheckCheck:af,CheckCircle:Wr,CheckCircle2:jr,CheckLine:rf,CheckSquare:qs,CheckSquare2:Ws,ChefHat:of,Cherry:sf,ChevronDown:hf,ChevronDownCircle:Gr,ChevronDownSquare:js,ChevronFirst:lf,ChevronLast:cf,ChevronLeft:df,ChevronLeftCircle:Zr,ChevronLeftSquare:Gs,ChevronRight:pf,ChevronRightCircle:Xr,ChevronRightSquare:Zs,ChevronUp:uf,ChevronUpCircle:Ur,ChevronUpSquare:Xs,ChevronsDown:Mf,ChevronsDownUp:ff,ChevronsLeft:gf,ChevronsLeftRight:vf,ChevronsLeftRightEllipsis:mf,ChevronsRight:xf,ChevronsRightLeft:yf,ChevronsUp:bf,ChevronsUpDown:wf,Chrome:Ef,Church:Sf,Cigarette:Af,CigaretteOff:Cf,Circle:$f,CircleAlert:Ir,CircleArrowDown:kr,CircleArrowLeft:Nr,CircleArrowOutDownLeft:zr,CircleArrowOutDownRight:Fr,CircleArrowOutUpLeft:$r,CircleArrowOutUpRight:Rr,CircleArrowRight:Br,CircleArrowUp:qr,CircleCheck:jr,CircleCheckBig:Wr,CircleChevronDown:Gr,CircleChevronLeft:Zr,CircleChevronRight:Xr,CircleChevronUp:Ur,CircleDashed:Tf,CircleDivide:Yr,CircleDollarSign:_f,CircleDot:Lf,CircleDotDashed:Hf,CircleEllipsis:Vf,CircleEqual:Pf,CircleFadingArrowUp:Df,CircleFadingPlus:Of,CircleGauge:Kr,CircleHelp:y2,CircleMinus:Qr,CircleOff:kf,CircleParking:tn,CircleParkingOff:Jr,CirclePause:an,CirclePercent:en,CirclePlay:rn,CirclePlus:nn,CirclePoundSterling:If,CirclePower:sn,CircleQuestionMark:y2,CircleSlash:Nf,CircleSlash2:on,CircleSlashed:on,CircleSmall:zf,CircleStop:hn,CircleUser:dn,CircleUserRound:ln,CircleX:cn,CircuitBoard:Rf,Citrus:Bf,Clapperboard:Ff,Clipboard:Kf,ClipboardCheck:Wf,ClipboardCopy:qf,ClipboardEdit:un,ClipboardList:jf,ClipboardMinus:Gf,ClipboardPaste:Zf,ClipboardPen:un,ClipboardPenLine:pn,ClipboardPlus:Xf,ClipboardSignature:pn,ClipboardType:Uf,ClipboardX:Yf,Clock:M5,Clock1:Qf,Clock10:Jf,Clock11:t5,Clock12:e5,Clock2:a5,Clock3:r5,Clock4:i5,Clock5:n5,Clock6:s5,Clock7:o5,Clock8:l5,Clock9:h5,ClockAlert:d5,ClockArrowDown:c5,ClockArrowUp:p5,ClockFading:u5,ClockPlus:f5,Cloud:V5,CloudAlert:m5,CloudCheck:v5,CloudCog:g5,CloudDownload:fn,CloudDrizzle:y5,CloudFog:x5,CloudHail:w5,CloudLightning:b5,CloudMoon:C5,CloudMoonRain:E5,CloudOff:S5,CloudRain:T5,CloudRainWind:A5,CloudSnow:_5,CloudSun:L5,CloudSunRain:H5,CloudUpload:Mn,Cloudy:P5,Clover:D5,Club:O5,Code:k5,Code2:mn,CodeSquare:Us,CodeXml:mn,Codepen:I5,Codesandbox:N5,Coffee:z5,Cog:$5,Coins:R5,Columns:vn,Columns2:vn,Columns3:gn,Columns3Cog:x2,Columns4:B5,ColumnsSettings:x2,Combine:F5,Command:q5,Compass:W5,Component:j5,Computer:G5,ConciergeBell:Z5,Cone:X5,Construction:U5,Contact:Y5,Contact2:yn,ContactRound:yn,Container:K5,Contrast:Q5,Cookie:J5,CookingPot:t3,Copy:s3,CopyCheck:e3,CopyMinus:i3,CopyPlus:a3,CopySlash:r3,CopyX:n3,Copyleft:o3,Copyright:h3,CornerDownLeft:l3,CornerDownRight:d3,CornerLeftDown:c3,CornerLeftUp:p3,CornerRightDown:u3,CornerRightUp:f3,CornerUpLeft:M3,CornerUpRight:m3,Cpu:v3,CreativeCommons:g3,CreditCard:y3,Croissant:x3,Crop:w3,Cross:b3,Crosshair:E3,Crown:S3,Cuboid:C3,CupSoda:A3,CurlyBraces:xr,Currency:T3,Cylinder:_3,Dam:H3,Database:O3,DatabaseBackup:L3,DatabaseZap:V3,DecimalsArrowLeft:P3,DecimalsArrowRight:D3,Delete:k3,Dessert:I3,Diameter:N3,Diamond:R3,DiamondMinus:$3,DiamondPercent:xn,DiamondPlus:z3,Dice1:B3,Dice2:F3,Dice3:q3,Dice4:j3,Dice5:W3,Dice6:G3,Dices:Z3,Diff:U3,Disc:Q3,Disc2:X3,Disc3:Y3,DiscAlbum:K3,Divide:J3,DivideCircle:Yr,DivideSquare:Js,Dna:e6,DnaOff:t6,Dock:a6,Dog:i6,DollarSign:r6,Donut:n6,DoorClosed:o6,DoorClosedLocked:s6,DoorOpen:h6,Dot:l6,DotSquare:t0,Download:d6,DownloadCloud:fn,DraftingCompass:c6,Drama:p6,Dribbble:u6,Drill:f6,Drone:M6,Droplet:v6,DropletOff:m6,Droplets:y6,Drum:g6,Drumstick:x6,Dumbbell:w6,Ear:b6,EarOff:E6,Earth:wn,EarthLock:S6,Eclipse:C6,Edit:E1,Edit2:ms,Edit3:Ms,Egg:_6,EggFried:A6,EggOff:T6,Ellipsis:En,EllipsisVertical:bn,Equal:V6,EqualApproximately:H6,EqualNot:L6,EqualSquare:e0,Eraser:P6,EthernetPort:D6,Euro:O6,Expand:k6,ExternalLink:I6,Eye:$6,EyeClosed:N6,EyeOff:z6,Facebook:R6,Factory:B6,Fan:F6,FastForward:q6,Feather:W6,Fence:j6,FerrisWheel:G6,Figma:Z6,File:q8,FileArchive:X6,FileAudio:Y6,FileAudio2:U6,FileAxis3D:Sn,FileAxis3d:Sn,FileBadge:Q6,FileBadge2:K6,FileBarChart:An,FileBarChart2:Cn,FileBox:J6,FileChartColumn:Cn,FileChartColumnIncreasing:An,FileChartLine:_n,FileChartPie:Tn,FileCheck:e8,FileCheck2:t8,FileClock:a8,FileCode:r8,FileCode2:i8,FileCog:Hn,FileCog2:Hn,FileDiff:n8,FileDigit:s8,FileDown:o8,FileEdit:Vn,FileHeart:h8,FileImage:l8,FileInput:d8,FileJson:p8,FileJson2:c8,FileKey:f8,FileKey2:u8,FileLineChart:_n,FileLock:m8,FileLock2:M8,FileMinus:g8,FileMinus2:v8,FileMusic:y8,FileOutput:x8,FilePen:Vn,FilePenLine:Ln,FilePieChart:Tn,FilePlus:b8,FilePlus2:w8,FileQuestion:Pn,FileQuestionMark:Pn,FileScan:E8,FileSearch:C8,FileSearch2:S8,FileSignature:Ln,FileSliders:A8,FileSpreadsheet:T8,FileStack:_8,FileSymlink:H8,FileTerminal:L8,FileText:V8,FileType:D8,FileType2:P8,FileUp:O8,FileUser:I8,FileVideo:N8,FileVideo2:k8,FileVolume:$8,FileVolume2:z8,FileWarning:R8,FileX:F8,FileX2:B8,Files:W8,Film:j8,Filter:In,FilterX:kn,Fingerprint:G8,FireExtinguisher:Z8,Fish:Y8,FishOff:X8,FishSymbol:U8,Flag:tM,FlagOff:K8,FlagTriangleLeft:Q8,FlagTriangleRight:J8,Flame:aM,FlameKindling:eM,Flashlight:rM,FlashlightOff:iM,FlaskConical:nM,FlaskConicalOff:sM,FlaskRound:oM,FlipHorizontal:dM,FlipHorizontal2:hM,FlipVertical:cM,FlipVertical2:lM,Flower:uM,Flower2:pM,Focus:fM,FoldHorizontal:MM,FoldVertical:mM,Folder:jM,FolderArchive:vM,FolderCheck:gM,FolderClock:yM,FolderClosed:xM,FolderCode:wM,FolderCog:Dn,FolderCog2:Dn,FolderDot:bM,FolderDown:EM,FolderEdit:On,FolderGit:CM,FolderGit2:SM,FolderHeart:AM,FolderInput:TM,FolderKanban:_M,FolderKey:HM,FolderLock:LM,FolderMinus:VM,FolderOpen:PM,FolderOpenDot:DM,FolderOutput:OM,FolderPen:On,FolderPlus:kM,FolderRoot:IM,FolderSearch:zM,FolderSearch2:NM,FolderSymlink:$M,FolderSync:RM,FolderTree:BM,FolderUp:FM,FolderX:qM,Folders:WM,Footprints:GM,ForkKnife:B0,ForkKnifeCrossed:R0,Forklift:ZM,FormInput:gs,Forward:XM,Frame:UM,Framer:YM,Frown:QM,Fuel:KM,Fullscreen:JM,FunctionSquare:a0,Funnel:In,FunnelPlus:tm,FunnelX:kn,GalleryHorizontal:am,GalleryHorizontalEnd:em,GalleryThumbnails:im,GalleryVertical:nm,GalleryVerticalEnd:rm,Gamepad:om,Gamepad2:sm,GanttChart:Pr,GanttChartSquare:b2,Gauge:hm,GaugeCircle:Kr,Gavel:lm,Gem:dm,GeorgianLari:cm,Ghost:pm,Gift:um,GitBranch:Mm,GitBranchPlus:fm,GitCommit:Nn,GitCommitHorizontal:Nn,GitCommitVertical:mm,GitCompare:gm,GitCompareArrows:vm,GitFork:ym,GitGraph:xm,GitMerge:wm,GitPullRequest:Tm,GitPullRequestArrow:bm,GitPullRequestClosed:Em,GitPullRequestCreate:Cm,GitPullRequestCreateArrow:Sm,GitPullRequestDraft:Am,Github:_m,Gitlab:Hm,GlassWater:Lm,Glasses:Vm,Globe:Dm,Globe2:wn,GlobeLock:Pm,Goal:Om,Gpu:Nm,Grab:km,GraduationCap:Im,Grape:zm,Grid:w2,Grid2X2:Bn,Grid2X2Check:zn,Grid2X2Plus:Rn,Grid2X2X:$n,Grid2x2:Bn,Grid2x2Check:zn,Grid2x2Plus:Rn,Grid2x2X:$n,Grid3X3:w2,Grid3x2:$m,Grid3x3:w2,Grip:Bm,GripHorizontal:Rm,GripVertical:Fm,Group:qm,Guitar:Wm,Ham:jm,Hamburger:Gm,Hammer:Zm,Hand:Qm,HandCoins:Xm,HandHeart:Um,HandHelping:Fn,HandMetal:Ym,HandPlatter:Km,Handshake:Jm,HardDrive:a7,HardDriveDownload:t7,HardDriveUpload:e7,HardHat:i7,Hash:r7,Haze:n7,HdmiPort:s7,Heading:u7,Heading1:o7,Heading2:h7,Heading3:d7,Heading4:l7,Heading5:c7,Heading6:p7,HeadphoneOff:f7,Headphones:M7,Headset:m7,Heart:E7,HeartCrack:v7,HeartHandshake:g7,HeartMinus:y7,HeartOff:x7,HeartPlus:w7,HeartPulse:b7,Heater:S7,HelpCircle:y2,HelpingHand:Fn,Hexagon:C7,Highlighter:A7,History:T7,Home:qn,Hop:H7,HopOff:_7,Hospital:L7,Hotel:V7,Hourglass:P7,House:qn,HousePlug:D7,HousePlus:O7,HouseWifi:k7,IceCream:jn,IceCream2:Wn,IceCreamBowl:Wn,IceCreamCone:jn,IdCard:N7,IdCardLanyard:I7,Image:j7,ImageDown:z7,ImageMinus:$7,ImageOff:R7,ImagePlay:B7,ImagePlus:F7,ImageUp:q7,ImageUpscale:W7,Images:G7,Import:Z7,Inbox:X7,Indent:Zn,IndentDecrease:Gn,IndentIncrease:Zn,IndianRupee:U7,Infinity:Y7,Info:K7,Inspect:o0,InspectionPanel:Q7,Instagram:J7,Italic:tv,IterationCcw:ev,IterationCw:av,JapaneseYen:iv,Joystick:nv,Kanban:rv,KanbanSquare:r0,KanbanSquareDashed:Ys,Key:hv,KeyRound:sv,KeySquare:ov,Keyboard:cv,KeyboardMusic:lv,KeyboardOff:dv,Lamp:vv,LampCeiling:pv,LampDesk:uv,LampFloor:fv,LampWallDown:Mv,LampWallUp:mv,LandPlot:gv,Landmark:yv,Languages:xv,Laptop:bv,Laptop2:Xn,LaptopMinimal:Xn,LaptopMinimalCheck:wv,Lasso:Sv,LassoSelect:Ev,Laugh:Cv,Layers:Un,Layers2:Av,Layers3:Un,Layout:fs,LayoutDashboard:Tv,LayoutGrid:_v,LayoutList:Hv,LayoutPanelLeft:Lv,LayoutPanelTop:Pv,LayoutTemplate:Vv,Leaf:Dv,LeafyGreen:Ov,Lectern:kv,LetterText:Iv,Library:zv,LibraryBig:Nv,LibrarySquare:i0,LifeBuoy:$v,Ligature:Rv,Lightbulb:Fv,LightbulbOff:Bv,LineChart:Hr,LineSquiggle:qv,Link:Gv,Link2:jv,Link2Off:Wv,Linkedin:Zv,List:dg,ListCheck:Xv,ListChecks:Uv,ListCollapse:Yv,ListEnd:Kv,ListFilter:Jv,ListFilterPlus:Qv,ListMinus:eg,ListMusic:tg,ListOrdered:ag,ListPlus:ig,ListRestart:rg,ListStart:ng,ListTodo:og,ListTree:lg,ListVideo:sg,ListX:hg,Loader:pg,Loader2:Yn,LoaderCircle:Yn,LoaderPinwheel:cg,Locate:mg,LocateFixed:ug,LocateOff:fg,LocationEdit:Mg,Lock:gg,LockKeyhole:vg,LockKeyholeOpen:Kn,LockOpen:Qn,LogIn:yg,LogOut:xg,Logs:wg,Lollipop:bg,Luggage:Eg,MSquare:n0,Magnet:Sg,Mail:Pg,MailCheck:Cg,MailMinus:Ag,MailOpen:Tg,MailPlus:_g,MailQuestion:Jn,MailQuestionMark:Jn,MailSearch:Hg,MailWarning:Lg,MailX:Vg,Mailbox:Dg,Mails:Og,Map:Xg,MapPin:jg,MapPinCheck:Ig,MapPinCheckInside:kg,MapPinHouse:Ng,MapPinMinus:$g,MapPinMinusInside:zg,MapPinOff:Rg,MapPinPlus:Fg,MapPinPlusInside:Bg,MapPinX:Wg,MapPinXInside:qg,MapPinned:Gg,MapPlus:Zg,Mars:Yg,MarsStroke:Ug,Martini:Kg,Maximize:Jg,Maximize2:Qg,Medal:t9,Megaphone:a9,MegaphoneOff:e9,Meh:i9,MemoryStick:r9,Menu:n9,MenuSquare:s0,Merge:s9,MessageCircle:m9,MessageCircleCode:o9,MessageCircleDashed:h9,MessageCircleHeart:l9,MessageCircleMore:d9,MessageCircleOff:p9,MessageCirclePlus:c9,MessageCircleQuestion:ts,MessageCircleQuestionMark:ts,MessageCircleReply:u9,MessageCircleWarning:M9,MessageCircleX:f9,MessageSquare:P9,MessageSquareCode:v9,MessageSquareDashed:g9,MessageSquareDiff:y9,MessageSquareDot:x9,MessageSquareHeart:w9,MessageSquareLock:b9,MessageSquareMore:E9,MessageSquareOff:S9,MessageSquarePlus:C9,MessageSquareQuote:A9,MessageSquareReply:T9,MessageSquareShare:_9,MessageSquareText:H9,MessageSquareWarning:L9,MessageSquareX:V9,MessagesSquare:D9,Mic:k9,Mic2:es,MicOff:O9,MicVocal:es,Microchip:I9,Microscope:N9,Microwave:z9,Milestone:$9,Milk:B9,MilkOff:R9,Minimize:q9,Minimize2:F9,Minus:W9,MinusCircle:Qr,MinusSquare:h0,Monitor:iy,MonitorCheck:j9,MonitorCog:G9,MonitorDot:Z9,MonitorDown:X9,MonitorOff:U9,MonitorPause:Y9,MonitorPlay:K9,MonitorSmartphone:Q9,MonitorSpeaker:ey,MonitorStop:J9,MonitorUp:ty,MonitorX:ay,Moon:ny,MoonStar:ry,MoreHorizontal:En,MoreVertical:bn,Mountain:hy,MountainSnow:sy,Mouse:py,MouseOff:oy,MousePointer:uy,MousePointer2:ly,MousePointerBan:dy,MousePointerClick:cy,MousePointerSquareDashed:Ks,Move:Ay,Move3D:as,Move3d:as,MoveDiagonal:My,MoveDiagonal2:fy,MoveDown:gy,MoveDownLeft:my,MoveDownRight:vy,MoveHorizontal:yy,MoveLeft:xy,MoveRight:wy,MoveUp:Sy,MoveUpLeft:by,MoveUpRight:Ey,MoveVertical:Cy,Music:Ly,Music2:Ty,Music3:_y,Music4:Hy,Navigation:Oy,Navigation2:Py,Navigation2Off:Vy,NavigationOff:Dy,Network:ky,Newspaper:Iy,Nfc:Ny,NonBinary:zy,Notebook:Fy,NotebookPen:$y,NotebookTabs:By,NotebookText:Ry,NotepadText:Wy,NotepadTextDashed:qy,Nut:Gy,NutOff:jy,Octagon:Xy,OctagonAlert:is,OctagonMinus:Zy,OctagonPause:rs,OctagonX:ns,Omega:Uy,Option:Yy,Orbit:Ky,Origami:Qy,Outdent:Gn,Package:sx,Package2:Jy,PackageCheck:tx,PackageMinus:ex,PackageOpen:ax,PackagePlus:ix,PackageSearch:rx,PackageX:nx,PaintBucket:ox,PaintRoller:hx,Paintbrush:lx,Paintbrush2:ss,PaintbrushVertical:ss,Palette:cx,Palmtree:H0,Panda:dx,PanelBottom:fx,PanelBottomClose:px,PanelBottomDashed:os,PanelBottomInactive:os,PanelBottomOpen:ux,PanelLeft:cs,PanelLeftClose:hs,PanelLeftDashed:ls,PanelLeftInactive:ls,PanelLeftOpen:ds,PanelRight:vx,PanelRightClose:Mx,PanelRightDashed:ps,PanelRightInactive:ps,PanelRightOpen:mx,PanelTop:xx,PanelTopClose:gx,PanelTopDashed:us,PanelTopInactive:us,PanelTopOpen:yx,PanelsLeftBottom:wx,PanelsLeftRight:gn,PanelsRightBottom:bx,PanelsTopBottom:ws,PanelsTopLeft:fs,Paperclip:Ex,Parentheses:Sx,ParkingCircle:tn,ParkingCircleOff:Jr,ParkingMeter:Cx,ParkingSquare:d0,ParkingSquareOff:l0,PartyPopper:Ax,Pause:Tx,PauseCircle:an,PauseOctagon:rs,PawPrint:_x,PcCase:Hx,Pen:ms,PenBox:E1,PenLine:Ms,PenOff:Lx,PenSquare:E1,PenTool:Vx,Pencil:kx,PencilLine:Px,PencilOff:Dx,PencilRuler:Ox,Pentagon:Ix,Percent:Nx,PercentCircle:en,PercentDiamond:xn,PercentSquare:c0,PersonStanding:zx,PhilippinePeso:$x,Phone:Gx,PhoneCall:Rx,PhoneForwarded:Bx,PhoneIncoming:Fx,PhoneMissed:qx,PhoneOff:Wx,PhoneOutgoing:jx,Pi:Zx,PiSquare:p0,Piano:Xx,Pickaxe:Ux,PictureInPicture:Kx,PictureInPicture2:Yx,PieChart:Dr,PiggyBank:Qx,Pilcrow:ew,PilcrowLeft:Jx,PilcrowRight:tw,PilcrowSquare:u0,Pill:iw,PillBottle:aw,Pin:nw,PinOff:rw,Pipette:sw,Pizza:ow,Plane:dw,PlaneLanding:hw,PlaneTakeoff:lw,Play:cw,PlayCircle:rn,PlaySquare:M0,Plug:uw,Plug2:pw,PlugZap:vs,PlugZap2:vs,Plus:fw,PlusCircle:nn,PlusSquare:f0,Pocket:Mw,PocketKnife:mw,Podcast:vw,Pointer:xw,PointerOff:gw,Popcorn:yw,Popsicle:ww,PoundSterling:bw,Power:Sw,PowerCircle:sn,PowerOff:Ew,PowerSquare:m0,Presentation:Cw,Printer:Tw,PrinterCheck:Aw,Projector:_w,Proportions:Hw,Puzzle:Lw,Pyramid:Vw,QrCode:Pw,Quote:Dw,Rabbit:Ow,Radar:kw,Radiation:Iw,Radical:Nw,Radio:$w,RadioReceiver:zw,RadioTower:Rw,Radius:Bw,RailSymbol:Fw,Rainbow:qw,Rat:Ww,Ratio:jw,Receipt:tb,ReceiptCent:Gw,ReceiptEuro:Zw,ReceiptIndianRupee:Xw,ReceiptJapaneseYen:Uw,ReceiptPoundSterling:Yw,ReceiptRussianRuble:Kw,ReceiptSwissFranc:Qw,ReceiptText:Jw,RectangleCircle:eb,RectangleEllipsis:gs,RectangleGoggles:ab,RectangleHorizontal:ib,RectangleVertical:rb,Recycle:nb,Redo:ob,Redo2:sb,RedoDot:hb,RefreshCcw:db,RefreshCcwDot:lb,RefreshCw:pb,RefreshCwOff:cb,Refrigerator:ub,Regex:fb,RemoveFormatting:Mb,Repeat:gb,Repeat1:mb,Repeat2:vb,Replace:xb,ReplaceAll:yb,Reply:bb,ReplyAll:wb,Rewind:Eb,Ribbon:Sb,Rocket:Cb,RockingChair:Ab,RollerCoaster:Tb,Rotate3D:ys,Rotate3d:ys,RotateCcw:Lb,RotateCcwKey:Hb,RotateCcwSquare:_b,RotateCw:Pb,RotateCwSquare:Vb,Route:Ob,RouteOff:Db,Router:kb,Rows:xs,Rows2:xs,Rows3:ws,Rows4:Ib,Rss:Nb,Ruler:$b,RulerDimensionLine:zb,RussianRuble:Rb,Sailboat:Bb,Salad:Fb,Sandwich:qb,Satellite:jb,SatelliteDish:Wb,SaudiRiyal:Gb,Save:Ub,SaveAll:Zb,SaveOff:Xb,Scale:Yb,Scale3D:bs,Scale3d:bs,Scaling:Kb,Scan:rE,ScanBarcode:Qb,ScanEye:tE,ScanFace:Jb,ScanHeart:eE,ScanLine:aE,ScanQrCode:iE,ScanSearch:nE,ScanText:sE,ScatterChart:Or,School:oE,School2:P0,Scissors:hE,ScissorsLineDashed:lE,ScissorsSquare:v0,ScissorsSquareDashedBottom:Fs,ScreenShare:pE,ScreenShareOff:dE,Scroll:uE,ScrollText:cE,Search:yE,SearchCheck:fE,SearchCode:ME,SearchSlash:mE,SearchX:vE,Section:gE,Send:wE,SendHorizonal:Es,SendHorizontal:Es,SendToBack:xE,SeparatorHorizontal:bE,SeparatorVertical:EE,Server:TE,ServerCog:SE,ServerCrash:CE,ServerOff:AE,Settings:LE,Settings2:_E,Shapes:HE,Share:PE,Share2:VE,Sheet:OE,Shell:DE,Shield:WE,ShieldAlert:kE,ShieldBan:IE,ShieldCheck:NE,ShieldClose:Cs,ShieldEllipsis:zE,ShieldHalf:$E,ShieldMinus:RE,ShieldOff:BE,ShieldPlus:FE,ShieldQuestion:Ss,ShieldQuestionMark:Ss,ShieldUser:qE,ShieldX:Cs,Ship:GE,ShipWheel:jE,Shirt:ZE,ShoppingBag:XE,ShoppingBasket:UE,ShoppingCart:YE,Shovel:KE,ShowerHead:QE,Shredder:JE,Shrimp:tS,Shrink:eS,Shrub:aS,Shuffle:iS,Sidebar:cs,SidebarClose:hs,SidebarOpen:ds,Sigma:rS,SigmaSquare:g0,Signal:lS,SignalHigh:nS,SignalLow:sS,SignalMedium:oS,SignalZero:hS,Signature:dS,Signpost:cS,SignpostBig:pS,Siren:uS,SkipBack:fS,SkipForward:MS,Skull:mS,Slack:vS,Slash:gS,SlashSquare:y0,Slice:yS,Sliders:As,SlidersHorizontal:xS,SlidersVertical:As,Smartphone:ES,SmartphoneCharging:wS,SmartphoneNfc:bS,Smile:CS,SmilePlus:SS,Snail:AS,Snowflake:TS,SoapDispenserDroplet:_S,Sofa:HS,SortAsc:pr,SortDesc:lr,Soup:LS,Space:VS,Spade:PS,Sparkle:DS,Sparkles:Ts,Speaker:OS,Speech:kS,SpellCheck:NS,SpellCheck2:IS,Spline:$S,SplinePointer:zS,Split:RS,SplitSquareHorizontal:x0,SplitSquareVertical:w0,Spool:BS,SprayCan:FS,Sprout:qS,Square:KS,SquareActivity:_s,SquareArrowDown:Ps,SquareArrowDownLeft:Hs,SquareArrowDownRight:Ls,SquareArrowLeft:Vs,SquareArrowOutDownLeft:Ds,SquareArrowOutDownRight:ks,SquareArrowOutUpLeft:Os,SquareArrowOutUpRight:Is,SquareArrowRight:Ns,SquareArrowUp:Rs,SquareArrowUpLeft:zs,SquareArrowUpRight:$s,SquareAsterisk:Bs,SquareBottomDashedScissors:Fs,SquareChartGantt:b2,SquareCheck:Ws,SquareCheckBig:qs,SquareChevronDown:js,SquareChevronLeft:Gs,SquareChevronRight:Zs,SquareChevronUp:Xs,SquareCode:Us,SquareDashed:Qs,SquareDashedBottom:jS,SquareDashedBottomCode:WS,SquareDashedKanban:Ys,SquareDashedMousePointer:Ks,SquareDashedTopSolid:GS,SquareDivide:Js,SquareDot:t0,SquareEqual:e0,SquareFunction:a0,SquareGanttChart:b2,SquareKanban:r0,SquareLibrary:i0,SquareM:n0,SquareMenu:s0,SquareMinus:h0,SquareMousePointer:o0,SquareParking:d0,SquareParkingOff:l0,SquarePen:E1,SquarePercent:c0,SquarePi:p0,SquarePilcrow:u0,SquarePlay:M0,SquarePlus:f0,SquarePower:m0,SquareRadical:ZS,SquareRoundCorner:XS,SquareScissors:v0,SquareSigma:g0,SquareSlash:y0,SquareSplitHorizontal:x0,SquareSplitVertical:w0,SquareSquare:US,SquareStack:YS,SquareTerminal:b0,SquareUser:S0,SquareUserRound:E0,SquareX:C0,SquaresExclude:QS,SquaresIntersect:JS,SquaresSubtract:tC,SquaresUnite:eC,Squircle:iC,SquircleDashed:aC,Squirrel:rC,Stamp:nC,Star:hC,StarHalf:sC,StarOff:oC,Stars:Ts,StepBack:lC,StepForward:dC,Stethoscope:pC,Sticker:cC,StickyNote:uC,StopCircle:hn,Store:fC,StretchHorizontal:MC,StretchVertical:mC,Strikethrough:vC,Subscript:gC,Subtitles:wr,Sun:EC,SunDim:yC,SunMedium:xC,SunMoon:wC,SunSnow:bC,Sunrise:SC,Sunset:CC,Superscript:AC,SwatchBook:TC,SwissFranc:_C,SwitchCamera:HC,Sword:LC,Swords:VC,Syringe:PC,Table:RC,Table2:DC,TableCellsMerge:OC,TableCellsSplit:kC,TableColumnsSplit:IC,TableConfig:x2,TableOfContents:NC,TableProperties:zC,TableRowsSplit:$C,Tablet:FC,TabletSmartphone:BC,Tablets:qC,Tag:WC,Tags:jC,Tally1:GC,Tally2:ZC,Tally3:XC,Tally4:UC,Tally5:YC,Tangent:KC,Target:QC,Telescope:JC,Tent:eA,TentTree:tA,Terminal:aA,TerminalSquare:b0,TestTube:iA,TestTube2:A0,TestTubeDiagonal:A0,TestTubes:rA,Text:lA,TextCursor:sA,TextCursorInput:nA,TextQuote:oA,TextSearch:hA,TextSelect:T0,TextSelection:T0,Theater:pA,Thermometer:uA,ThermometerSnowflake:dA,ThermometerSun:cA,ThumbsDown:fA,ThumbsUp:MA,Ticket:bA,TicketCheck:mA,TicketMinus:vA,TicketPercent:gA,TicketPlus:yA,TicketSlash:xA,TicketX:wA,Tickets:SA,TicketsPlane:EA,Timer:TA,TimerOff:CA,TimerReset:AA,ToggleLeft:_A,ToggleRight:HA,Toilet:LA,ToolCase:PA,Tornado:VA,Torus:DA,Touchpad:kA,TouchpadOff:OA,TowerControl:IA,ToyBrick:NA,Tractor:zA,TrafficCone:$A,Train:_0,TrainFront:BA,TrainFrontTunnel:RA,TrainTrack:FA,TramFront:_0,Transgender:qA,Trash:jA,Trash2:WA,TreeDeciduous:GA,TreePalm:H0,TreePine:ZA,Trees:XA,Trello:UA,TrendingDown:YA,TrendingUp:QA,TrendingUpDown:KA,Triangle:eT,TriangleAlert:L0,TriangleDashed:JA,TriangleRight:tT,Trophy:aT,Truck:iT,TruckElectric:rT,Turtle:nT,Tv:oT,Tv2:V0,TvMinimal:V0,TvMinimalPlay:sT,Twitch:hT,Twitter:lT,Type:dT,TypeOutline:cT,Umbrella:uT,UmbrellaOff:pT,Underline:fT,Undo:vT,Undo2:MT,UndoDot:mT,UnfoldHorizontal:gT,UnfoldVertical:yT,Ungroup:xT,University:P0,Unlink:bT,Unlink2:wT,Unlock:Qn,UnlockKeyhole:Kn,Unplug:ET,Upload:ST,UploadCloud:Mn,Usb:CT,User:IT,User2:z0,UserCheck:AT,UserCheck2:D0,UserCircle:dn,UserCircle2:ln,UserCog:_T,UserCog2:O0,UserLock:TT,UserMinus:HT,UserMinus2:k0,UserPen:LT,UserPlus:VT,UserPlus2:I0,UserRound:z0,UserRoundCheck:D0,UserRoundCog:O0,UserRoundMinus:k0,UserRoundPen:PT,UserRoundPlus:I0,UserRoundSearch:DT,UserRoundX:N0,UserSearch:OT,UserSquare:S0,UserSquare2:E0,UserX:kT,UserX2:N0,Users:NT,Users2:$0,UsersRound:$0,Utensils:B0,UtensilsCrossed:R0,UtilityPole:zT,Variable:RT,Vault:$T,VectorSquare:BT,Vegan:FT,VenetianMask:qT,Venus:jT,VenusAndMars:WT,Verified:Mr,Vibrate:ZT,VibrateOff:GT,Video:UT,VideoOff:XT,Videotape:YT,View:KT,Voicemail:QT,Volleyball:JT,Volume:r_,Volume1:t_,Volume2:e_,VolumeOff:a_,VolumeX:i_,Vote:n_,Wallet:o_,Wallet2:F0,WalletCards:s_,WalletMinimal:F0,Wallpaper:h_,Wand:l_,Wand2:q0,WandSparkles:q0,Warehouse:d_,WashingMachine:c_,Watch:p_,Waves:f_,WavesLadder:u_,Waypoints:M_,Webcam:m_,Webhook:g_,WebhookOff:v_,Weight:y_,Wheat:w_,WheatOff:x_,WholeWord:b_,Wifi:H_,WifiCog:E_,WifiHigh:S_,WifiLow:C_,WifiOff:A_,WifiPen:T_,WifiZero:__,Wind:V_,WindArrowDown:L_,Wine:D_,WineOff:P_,Workflow:O_,Worm:k_,WrapText:I_,Wrench:N_,X:z_,XCircle:cn,XOctagon:ns,XSquare:C0,Youtube:$_,Zap:R_,ZapOff:B_,ZoomIn:F_,ZoomOut:q_},Symbol.toStringTag,{value:"Module"}));/**
 * @license lucide v0.525.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const j_=({icons:a={},nameAttr:t="data-lucide",attrs:e={}}={})=>{if(!Object.values(a).length)throw new Error(`Please provide an icons object.
If you want to use all the icons you can import it like:
 \`import { createIcons, icons } from 'lucide';
lucide.createIcons({icons});\``);if(typeof document>"u")throw new Error("`createIcons()` only works in a browser environment.");const r=document.querySelectorAll(`[${t}]`);if(Array.from(r).forEach(s=>rr(s,{nameAttr:t,icons:a,attrs:e})),t==="data-lucide"){const s=document.querySelectorAll("[icon-name]");s.length>0&&(console.warn("[Lucide] Some icons were found with the now deprecated icon-name attribute. These will still be replaced for backwards compatibility, but will no longer be supported in v1.0 and you should switch to data-lucide"),Array.from(s).forEach(o=>rr(o,{nameAttr:"icon-name",icons:a,attrs:e})))}};function W0(a){return a!==null&&typeof a=="object"&&"constructor"in a&&a.constructor===Object}function ii(a,t){a===void 0&&(a={}),t===void 0&&(t={});const e=["__proto__","constructor","prototype"];Object.keys(t).filter(r=>e.indexOf(r)<0).forEach(r=>{typeof a[r]>"u"?a[r]=t[r]:W0(t[r])&&W0(a[r])&&Object.keys(t[r]).length>0&&ii(a[r],t[r])})}const ko={body:{},addEventListener(){},removeEventListener(){},activeElement:{blur(){},nodeName:""},querySelector(){return null},querySelectorAll(){return[]},getElementById(){return null},createEvent(){return{initEvent(){}}},createElement(){return{children:[],childNodes:[],style:{},setAttribute(){},getElementsByTagName(){return[]}}},createElementNS(){return{}},importNode(){return null},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""}};function zt(){const a=typeof document<"u"?document:{};return ii(a,ko),a}const G_={document:ko,navigator:{userAgent:""},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""},history:{replaceState(){},pushState(){},go(){},back(){}},CustomEvent:function(){return this},addEventListener(){},removeEventListener(){},getComputedStyle(){return{getPropertyValue(){return""}}},Image(){},Date(){},screen:{},setTimeout(){},clearTimeout(){},matchMedia(){return{}},requestAnimationFrame(a){return typeof setTimeout>"u"?(a(),null):setTimeout(a,0)},cancelAnimationFrame(a){typeof setTimeout>"u"||clearTimeout(a)}};function _t(){const a=typeof window<"u"?window:{};return ii(a,G_),a}function Ge(a){return a===void 0&&(a=""),a.trim().split(" ").filter(t=>!!t.trim())}function Z_(a){const t=a;Object.keys(t).forEach(e=>{try{t[e]=null}catch{}try{delete t[e]}catch{}})}function La(a,t){return t===void 0&&(t=0),setTimeout(a,t)}function fe(){return Date.now()}function X_(a){const t=_t();let e;return t.getComputedStyle&&(e=t.getComputedStyle(a,null)),!e&&a.currentStyle&&(e=a.currentStyle),e||(e=a.style),e}function G2(a,t){t===void 0&&(t="x");const e=_t();let r,s,o;const c=X_(a);return e.WebKitCSSMatrix?(s=c.transform||c.webkitTransform,s.split(",").length>6&&(s=s.split(", ").map(f=>f.replace(",",".")).join(", ")),o=new e.WebKitCSSMatrix(s==="none"?"":s)):(o=c.MozTransform||c.OTransform||c.MsTransform||c.msTransform||c.transform||c.getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,"),r=o.toString().split(",")),t==="x"&&(e.WebKitCSSMatrix?s=o.m41:r.length===16?s=parseFloat(r[12]):s=parseFloat(r[4])),t==="y"&&(e.WebKitCSSMatrix?s=o.m42:r.length===16?s=parseFloat(r[13]):s=parseFloat(r[5])),s||0}function e1(a){return typeof a=="object"&&a!==null&&a.constructor&&Object.prototype.toString.call(a).slice(8,-1)==="Object"}function U_(a){return typeof window<"u"&&typeof window.HTMLElement<"u"?a instanceof HTMLElement:a&&(a.nodeType===1||a.nodeType===11)}function ie(){const a=Object(arguments.length<=0?void 0:arguments[0]),t=["__proto__","constructor","prototype"];for(let e=1;e<arguments.length;e+=1){const r=e<0||arguments.length<=e?void 0:arguments[e];if(r!=null&&!U_(r)){const s=Object.keys(Object(r)).filter(o=>t.indexOf(o)<0);for(let o=0,c=s.length;o<c;o+=1){const f=s[o],v=Object.getOwnPropertyDescriptor(r,f);v!==void 0&&v.enumerable&&(e1(a[f])&&e1(r[f])?r[f].__swiper__?a[f]=r[f]:ie(a[f],r[f]):!e1(a[f])&&e1(r[f])?(a[f]={},r[f].__swiper__?a[f]=r[f]:ie(a[f],r[f])):a[f]=r[f])}}}return a}function a1(a,t,e){a.style.setProperty(t,e)}function Io(a){let{swiper:t,targetPosition:e,side:r}=a;const s=_t(),o=-t.translate;let c=null,f;const v=t.params.speed;t.wrapperEl.style.scrollSnapType="none",s.cancelAnimationFrame(t.cssModeFrameID);const M=e>o?"next":"prev",g=(T,b)=>M==="next"&&T>=b||M==="prev"&&T<=b,w=()=>{f=new Date().getTime(),c===null&&(c=f);const T=Math.max(Math.min((f-c)/v,1),0),b=.5-Math.cos(T*Math.PI)/2;let p=o+b*(e-o);if(g(p,e)&&(p=e),t.wrapperEl.scrollTo({[r]:p}),g(p,e)){t.wrapperEl.style.overflow="hidden",t.wrapperEl.style.scrollSnapType="",setTimeout(()=>{t.wrapperEl.style.overflow="",t.wrapperEl.scrollTo({[r]:p})}),s.cancelAnimationFrame(t.cssModeFrameID);return}t.cssModeFrameID=s.requestAnimationFrame(w)};w()}function ua(a){return a.querySelector(".swiper-slide-transform")||a.shadowRoot&&a.shadowRoot.querySelector(".swiper-slide-transform")||a}function Bt(a,t){t===void 0&&(t="");const e=_t(),r=[...a.children];return e.HTMLSlotElement&&a instanceof HTMLSlotElement&&r.push(...a.assignedElements()),t?r.filter(s=>s.matches(t)):r}function Y_(a,t){const e=[t];for(;e.length>0;){const r=e.shift();if(a===r)return!0;e.push(...r.children,...r.shadowRoot?r.shadowRoot.children:[],...r.assignedElements?r.assignedElements():[])}}function K_(a,t){const e=_t();let r=t.contains(a);return!r&&e.HTMLSlotElement&&t instanceof HTMLSlotElement&&(r=[...t.assignedElements()].includes(a),r||(r=Y_(a,t))),r}function I1(a){try{console.warn(a);return}catch{}}function re(a,t){t===void 0&&(t=[]);const e=document.createElement(a);return e.classList.add(...Array.isArray(t)?t:Ge(t)),e}function N1(a){const t=_t(),e=zt(),r=a.getBoundingClientRect(),s=e.body,o=a.clientTop||s.clientTop||0,c=a.clientLeft||s.clientLeft||0,f=a===t?t.scrollY:a.scrollTop,v=a===t?t.scrollX:a.scrollLeft;return{top:r.top+f-o,left:r.left+v-c}}function Q_(a,t){const e=[];for(;a.previousElementSibling;){const r=a.previousElementSibling;t?r.matches(t)&&e.push(r):e.push(r),a=r}return e}function J_(a,t){const e=[];for(;a.nextElementSibling;){const r=a.nextElementSibling;t?r.matches(t)&&e.push(r):e.push(r),a=r}return e}function Ze(a,t){return _t().getComputedStyle(a,null).getPropertyValue(t)}function s1(a){let t=a,e;if(t){for(e=0;(t=t.previousSibling)!==null;)t.nodeType===1&&(e+=1);return e}}function la(a,t){const e=[];let r=a.parentElement;for(;r;)t?r.matches(t)&&e.push(r):e.push(r),r=r.parentElement;return e}function i1(a,t){function e(r){r.target===a&&(t.call(a,r),a.removeEventListener("transitionend",e))}t&&a.addEventListener("transitionend",e)}function Z2(a,t,e){const r=_t();return a[t==="width"?"offsetWidth":"offsetHeight"]+parseFloat(r.getComputedStyle(a,null).getPropertyValue(t==="width"?"margin-right":"margin-top"))+parseFloat(r.getComputedStyle(a,null).getPropertyValue(t==="width"?"margin-left":"margin-bottom"))}function xt(a){return(Array.isArray(a)?a:[a]).filter(t=>!!t)}function F1(a){return t=>Math.abs(t)>0&&a.browser&&a.browser.need3dFix&&Math.abs(t)%90===0?t+.001:t}function $e(a,t){t===void 0&&(t=""),typeof trustedTypes<"u"?a.innerHTML=trustedTypes.createPolicy("html",{createHTML:e=>e}).createHTML(t):a.innerHTML=t}let E2;function tH(){const a=_t(),t=zt();return{smoothScroll:t.documentElement&&t.documentElement.style&&"scrollBehavior"in t.documentElement.style,touch:!!("ontouchstart"in a||a.DocumentTouch&&t instanceof a.DocumentTouch)}}function No(){return E2||(E2=tH()),E2}let S2;function eH(a){let{userAgent:t}=a===void 0?{}:a;const e=No(),r=_t(),s=r.navigator.platform,o=t||r.navigator.userAgent,c={ios:!1,android:!1},f=r.screen.width,v=r.screen.height,M=o.match(/(Android);?[\s\/]+([\d.]+)?/);let g=o.match(/(iPad).*OS\s([\d_]+)/);const w=o.match(/(iPod)(.*OS\s([\d_]+))?/),T=!g&&o.match(/(iPhone\sOS|iOS)\s([\d_]+)/),b=s==="Win32";let p=s==="MacIntel";const u=["1024x1366","1366x1024","834x1194","1194x834","834x1112","1112x834","768x1024","1024x768","820x1180","1180x820","810x1080","1080x810"];return!g&&p&&e.touch&&u.indexOf(`${f}x${v}`)>=0&&(g=o.match(/(Version)\/([\d.]+)/),g||(g=[0,1,"13_0_0"]),p=!1),M&&!b&&(c.os="android",c.android=!0),(g||T||w)&&(c.os="ios",c.ios=!0),c}function zo(a){return a===void 0&&(a={}),S2||(S2=eH(a)),S2}let C2;function aH(){const a=_t(),t=zo();let e=!1;function r(){const f=a.navigator.userAgent.toLowerCase();return f.indexOf("safari")>=0&&f.indexOf("chrome")<0&&f.indexOf("android")<0}if(r()){const f=String(a.navigator.userAgent);if(f.includes("Version/")){const[v,M]=f.split("Version/")[1].split(" ")[0].split(".").map(g=>Number(g));e=v<16||v===16&&M<2}}const s=/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(a.navigator.userAgent),o=r(),c=o||s&&t.ios;return{isSafari:e||o,needPerspectiveFix:e,need3dFix:c,isWebView:s}}function $o(){return C2||(C2=aH()),C2}function iH(a){let{swiper:t,on:e,emit:r}=a;const s=_t();let o=null,c=null;const f=()=>{!t||t.destroyed||!t.initialized||(r("beforeResize"),r("resize"))},v=()=>{!t||t.destroyed||!t.initialized||(o=new ResizeObserver(w=>{c=s.requestAnimationFrame(()=>{const{width:T,height:b}=t;let p=T,u=b;w.forEach(A=>{let{contentBoxSize:S,contentRect:C,target:E}=A;E&&E!==t.el||(p=C?C.width:(S[0]||S).inlineSize,u=C?C.height:(S[0]||S).blockSize)}),(p!==T||u!==b)&&f()})}),o.observe(t.el))},M=()=>{c&&s.cancelAnimationFrame(c),o&&o.unobserve&&t.el&&(o.unobserve(t.el),o=null)},g=()=>{!t||t.destroyed||!t.initialized||r("orientationchange")};e("init",()=>{if(t.params.resizeObserver&&typeof s.ResizeObserver<"u"){v();return}s.addEventListener("resize",f),s.addEventListener("orientationchange",g)}),e("destroy",()=>{M(),s.removeEventListener("resize",f),s.removeEventListener("orientationchange",g)})}function rH(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o=[],c=_t(),f=function(g,w){w===void 0&&(w={});const T=c.MutationObserver||c.WebkitMutationObserver,b=new T(p=>{if(t.__preventObserver__)return;if(p.length===1){s("observerUpdate",p[0]);return}const u=function(){s("observerUpdate",p[0])};c.requestAnimationFrame?c.requestAnimationFrame(u):c.setTimeout(u,0)});b.observe(g,{attributes:typeof w.attributes>"u"?!0:w.attributes,childList:t.isElement||(typeof w.childList>"u"?!0:w).childList,characterData:typeof w.characterData>"u"?!0:w.characterData}),o.push(b)},v=()=>{if(t.params.observer){if(t.params.observeParents){const g=la(t.hostEl);for(let w=0;w<g.length;w+=1)f(g[w])}f(t.hostEl,{childList:t.params.observeSlideChildren}),f(t.wrapperEl,{attributes:!1})}},M=()=>{o.forEach(g=>{g.disconnect()}),o.splice(0,o.length)};e({observer:!1,observeParents:!1,observeSlideChildren:!1}),r("init",v),r("destroy",M)}var nH={on(a,t,e){const r=this;if(!r.eventsListeners||r.destroyed||typeof t!="function")return r;const s=e?"unshift":"push";return a.split(" ").forEach(o=>{r.eventsListeners[o]||(r.eventsListeners[o]=[]),r.eventsListeners[o][s](t)}),r},once(a,t,e){const r=this;if(!r.eventsListeners||r.destroyed||typeof t!="function")return r;function s(){r.off(a,s),s.__emitterProxy&&delete s.__emitterProxy;for(var o=arguments.length,c=new Array(o),f=0;f<o;f++)c[f]=arguments[f];t.apply(r,c)}return s.__emitterProxy=t,r.on(a,s,e)},onAny(a,t){const e=this;if(!e.eventsListeners||e.destroyed||typeof a!="function")return e;const r=t?"unshift":"push";return e.eventsAnyListeners.indexOf(a)<0&&e.eventsAnyListeners[r](a),e},offAny(a){const t=this;if(!t.eventsListeners||t.destroyed||!t.eventsAnyListeners)return t;const e=t.eventsAnyListeners.indexOf(a);return e>=0&&t.eventsAnyListeners.splice(e,1),t},off(a,t){const e=this;return!e.eventsListeners||e.destroyed||!e.eventsListeners||a.split(" ").forEach(r=>{typeof t>"u"?e.eventsListeners[r]=[]:e.eventsListeners[r]&&e.eventsListeners[r].forEach((s,o)=>{(s===t||s.__emitterProxy&&s.__emitterProxy===t)&&e.eventsListeners[r].splice(o,1)})}),e},emit(){const a=this;if(!a.eventsListeners||a.destroyed||!a.eventsListeners)return a;let t,e,r;for(var s=arguments.length,o=new Array(s),c=0;c<s;c++)o[c]=arguments[c];return typeof o[0]=="string"||Array.isArray(o[0])?(t=o[0],e=o.slice(1,o.length),r=a):(t=o[0].events,e=o[0].data,r=o[0].context||a),e.unshift(r),(Array.isArray(t)?t:t.split(" ")).forEach(v=>{a.eventsAnyListeners&&a.eventsAnyListeners.length&&a.eventsAnyListeners.forEach(M=>{M.apply(r,[v,...e])}),a.eventsListeners&&a.eventsListeners[v]&&a.eventsListeners[v].forEach(M=>{M.apply(r,e)})}),a}};function sH(){const a=this;let t,e;const r=a.el;typeof a.params.width<"u"&&a.params.width!==null?t=a.params.width:t=r.clientWidth,typeof a.params.height<"u"&&a.params.height!==null?e=a.params.height:e=r.clientHeight,!(t===0&&a.isHorizontal()||e===0&&a.isVertical())&&(t=t-parseInt(Ze(r,"padding-left")||0,10)-parseInt(Ze(r,"padding-right")||0,10),e=e-parseInt(Ze(r,"padding-top")||0,10)-parseInt(Ze(r,"padding-bottom")||0,10),Number.isNaN(t)&&(t=0),Number.isNaN(e)&&(e=0),Object.assign(a,{width:t,height:e,size:a.isHorizontal()?t:e}))}function oH(){const a=this;function t(z,G){return parseFloat(z.getPropertyValue(a.getDirectionLabel(G))||0)}const e=a.params,{wrapperEl:r,slidesEl:s,size:o,rtlTranslate:c,wrongRTL:f}=a,v=a.virtual&&e.virtual.enabled,M=v?a.virtual.slides.length:a.slides.length,g=Bt(s,`.${a.params.slideClass}, swiper-slide`),w=v?a.virtual.slides.length:g.length;let T=[];const b=[],p=[];let u=e.slidesOffsetBefore;typeof u=="function"&&(u=e.slidesOffsetBefore.call(a));let A=e.slidesOffsetAfter;typeof A=="function"&&(A=e.slidesOffsetAfter.call(a));const S=a.snapGrid.length,C=a.slidesGrid.length;let E=e.spaceBetween,L=-u,O=0,q=0;if(typeof o>"u")return;typeof E=="string"&&E.indexOf("%")>=0?E=parseFloat(E.replace("%",""))/100*o:typeof E=="string"&&(E=parseFloat(E)),a.virtualSize=-E,g.forEach(z=>{c?z.style.marginLeft="":z.style.marginRight="",z.style.marginBottom="",z.style.marginTop=""}),e.centeredSlides&&e.cssMode&&(a1(r,"--swiper-centered-offset-before",""),a1(r,"--swiper-centered-offset-after",""));const h=e.grid&&e.grid.rows>1&&a.grid;h?a.grid.initSlides(g):a.grid&&a.grid.unsetSlides();let W;const k=e.slidesPerView==="auto"&&e.breakpoints&&Object.keys(e.breakpoints).filter(z=>typeof e.breakpoints[z].slidesPerView<"u").length>0;for(let z=0;z<w;z+=1){W=0;let G;if(g[z]&&(G=g[z]),h&&a.grid.updateSlide(z,G,g),!(g[z]&&Ze(G,"display")==="none")){if(e.slidesPerView==="auto"){k&&(g[z].style[a.getDirectionLabel("width")]="");const j=getComputedStyle(G),I=G.style.transform,X=G.style.webkitTransform;if(I&&(G.style.transform="none"),X&&(G.style.webkitTransform="none"),e.roundLengths)W=a.isHorizontal()?Z2(G,"width"):Z2(G,"height");else{const J=t(j,"width"),Q=t(j,"padding-left"),N=t(j,"padding-right"),B=t(j,"margin-left"),at=t(j,"margin-right"),pt=j.getPropertyValue("box-sizing");if(pt&&pt==="border-box")W=J+B+at;else{const{clientWidth:St,offsetWidth:At}=G;W=J+Q+N+B+at+(At-St)}}I&&(G.style.transform=I),X&&(G.style.webkitTransform=X),e.roundLengths&&(W=Math.floor(W))}else W=(o-(e.slidesPerView-1)*E)/e.slidesPerView,e.roundLengths&&(W=Math.floor(W)),g[z]&&(g[z].style[a.getDirectionLabel("width")]=`${W}px`);g[z]&&(g[z].swiperSlideSize=W),p.push(W),e.centeredSlides?(L=L+W/2+O/2+E,O===0&&z!==0&&(L=L-o/2-E),z===0&&(L=L-o/2-E),Math.abs(L)<1/1e3&&(L=0),e.roundLengths&&(L=Math.floor(L)),q%e.slidesPerGroup===0&&T.push(L),b.push(L)):(e.roundLengths&&(L=Math.floor(L)),(q-Math.min(a.params.slidesPerGroupSkip,q))%a.params.slidesPerGroup===0&&T.push(L),b.push(L),L=L+W+E),a.virtualSize+=W+E,O=W,q+=1}}if(a.virtualSize=Math.max(a.virtualSize,o)+A,c&&f&&(e.effect==="slide"||e.effect==="coverflow")&&(r.style.width=`${a.virtualSize+E}px`),e.setWrapperSize&&(r.style[a.getDirectionLabel("width")]=`${a.virtualSize+E}px`),h&&a.grid.updateWrapperSize(W,T),!e.centeredSlides){const z=[];for(let G=0;G<T.length;G+=1){let j=T[G];e.roundLengths&&(j=Math.floor(j)),T[G]<=a.virtualSize-o&&z.push(j)}T=z,Math.floor(a.virtualSize-o)-Math.floor(T[T.length-1])>1&&T.push(a.virtualSize-o)}if(v&&e.loop){const z=p[0]+E;if(e.slidesPerGroup>1){const G=Math.ceil((a.virtual.slidesBefore+a.virtual.slidesAfter)/e.slidesPerGroup),j=z*e.slidesPerGroup;for(let I=0;I<G;I+=1)T.push(T[T.length-1]+j)}for(let G=0;G<a.virtual.slidesBefore+a.virtual.slidesAfter;G+=1)e.slidesPerGroup===1&&T.push(T[T.length-1]+z),b.push(b[b.length-1]+z),a.virtualSize+=z}if(T.length===0&&(T=[0]),E!==0){const z=a.isHorizontal()&&c?"marginLeft":a.getDirectionLabel("marginRight");g.filter((G,j)=>!e.cssMode||e.loop?!0:j!==g.length-1).forEach(G=>{G.style[z]=`${E}px`})}if(e.centeredSlides&&e.centeredSlidesBounds){let z=0;p.forEach(j=>{z+=j+(E||0)}),z-=E;const G=z>o?z-o:0;T=T.map(j=>j<=0?-u:j>G?G+A:j)}if(e.centerInsufficientSlides){let z=0;p.forEach(j=>{z+=j+(E||0)}),z-=E;const G=(e.slidesOffsetBefore||0)+(e.slidesOffsetAfter||0);if(z+G<o){const j=(o-z-G)/2;T.forEach((I,X)=>{T[X]=I-j}),b.forEach((I,X)=>{b[X]=I+j})}}if(Object.assign(a,{slides:g,snapGrid:T,slidesGrid:b,slidesSizesGrid:p}),e.centeredSlides&&e.cssMode&&!e.centeredSlidesBounds){a1(r,"--swiper-centered-offset-before",`${-T[0]}px`),a1(r,"--swiper-centered-offset-after",`${a.size/2-p[p.length-1]/2}px`);const z=-a.snapGrid[0],G=-a.slidesGrid[0];a.snapGrid=a.snapGrid.map(j=>j+z),a.slidesGrid=a.slidesGrid.map(j=>j+G)}if(w!==M&&a.emit("slidesLengthChange"),T.length!==S&&(a.params.watchOverflow&&a.checkOverflow(),a.emit("snapGridLengthChange")),b.length!==C&&a.emit("slidesGridLengthChange"),e.watchSlidesProgress&&a.updateSlidesOffset(),a.emit("slidesUpdated"),!v&&!e.cssMode&&(e.effect==="slide"||e.effect==="fade")){const z=`${e.containerModifierClass}backface-hidden`,G=a.el.classList.contains(z);w<=e.maxBackfaceHiddenSlides?G||a.el.classList.add(z):G&&a.el.classList.remove(z)}}function hH(a){const t=this,e=[],r=t.virtual&&t.params.virtual.enabled;let s=0,o;typeof a=="number"?t.setTransition(a):a===!0&&t.setTransition(t.params.speed);const c=f=>r?t.slides[t.getSlideIndexByData(f)]:t.slides[f];if(t.params.slidesPerView!=="auto"&&t.params.slidesPerView>1)if(t.params.centeredSlides)(t.visibleSlides||[]).forEach(f=>{e.push(f)});else for(o=0;o<Math.ceil(t.params.slidesPerView);o+=1){const f=t.activeIndex+o;if(f>t.slides.length&&!r)break;e.push(c(f))}else e.push(c(t.activeIndex));for(o=0;o<e.length;o+=1)if(typeof e[o]<"u"){const f=e[o].offsetHeight;s=f>s?f:s}(s||s===0)&&(t.wrapperEl.style.height=`${s}px`)}function lH(){const a=this,t=a.slides,e=a.isElement?a.isHorizontal()?a.wrapperEl.offsetLeft:a.wrapperEl.offsetTop:0;for(let r=0;r<t.length;r+=1)t[r].swiperSlideOffset=(a.isHorizontal()?t[r].offsetLeft:t[r].offsetTop)-e-a.cssOverflowAdjustment()}const j0=(a,t,e)=>{t&&!a.classList.contains(e)?a.classList.add(e):!t&&a.classList.contains(e)&&a.classList.remove(e)};function dH(a){a===void 0&&(a=this&&this.translate||0);const t=this,e=t.params,{slides:r,rtlTranslate:s,snapGrid:o}=t;if(r.length===0)return;typeof r[0].swiperSlideOffset>"u"&&t.updateSlidesOffset();let c=-a;s&&(c=a),t.visibleSlidesIndexes=[],t.visibleSlides=[];let f=e.spaceBetween;typeof f=="string"&&f.indexOf("%")>=0?f=parseFloat(f.replace("%",""))/100*t.size:typeof f=="string"&&(f=parseFloat(f));for(let v=0;v<r.length;v+=1){const M=r[v];let g=M.swiperSlideOffset;e.cssMode&&e.centeredSlides&&(g-=r[0].swiperSlideOffset);const w=(c+(e.centeredSlides?t.minTranslate():0)-g)/(M.swiperSlideSize+f),T=(c-o[0]+(e.centeredSlides?t.minTranslate():0)-g)/(M.swiperSlideSize+f),b=-(c-g),p=b+t.slidesSizesGrid[v],u=b>=0&&b<=t.size-t.slidesSizesGrid[v],A=b>=0&&b<t.size-1||p>1&&p<=t.size||b<=0&&p>=t.size;A&&(t.visibleSlides.push(M),t.visibleSlidesIndexes.push(v)),j0(M,A,e.slideVisibleClass),j0(M,u,e.slideFullyVisibleClass),M.progress=s?-w:w,M.originalProgress=s?-T:T}}function cH(a){const t=this;if(typeof a>"u"){const g=t.rtlTranslate?-1:1;a=t&&t.translate&&t.translate*g||0}const e=t.params,r=t.maxTranslate()-t.minTranslate();let{progress:s,isBeginning:o,isEnd:c,progressLoop:f}=t;const v=o,M=c;if(r===0)s=0,o=!0,c=!0;else{s=(a-t.minTranslate())/r;const g=Math.abs(a-t.minTranslate())<1,w=Math.abs(a-t.maxTranslate())<1;o=g||s<=0,c=w||s>=1,g&&(s=0),w&&(s=1)}if(e.loop){const g=t.getSlideIndexByData(0),w=t.getSlideIndexByData(t.slides.length-1),T=t.slidesGrid[g],b=t.slidesGrid[w],p=t.slidesGrid[t.slidesGrid.length-1],u=Math.abs(a);u>=T?f=(u-T)/p:f=(u+p-b)/p,f>1&&(f-=1)}Object.assign(t,{progress:s,progressLoop:f,isBeginning:o,isEnd:c}),(e.watchSlidesProgress||e.centeredSlides&&e.autoHeight)&&t.updateSlidesProgress(a),o&&!v&&t.emit("reachBeginning toEdge"),c&&!M&&t.emit("reachEnd toEdge"),(v&&!o||M&&!c)&&t.emit("fromEdge"),t.emit("progress",s)}const A2=(a,t,e)=>{t&&!a.classList.contains(e)?a.classList.add(e):!t&&a.classList.contains(e)&&a.classList.remove(e)};function pH(){const a=this,{slides:t,params:e,slidesEl:r,activeIndex:s}=a,o=a.virtual&&e.virtual.enabled,c=a.grid&&e.grid&&e.grid.rows>1,f=w=>Bt(r,`.${e.slideClass}${w}, swiper-slide${w}`)[0];let v,M,g;if(o)if(e.loop){let w=s-a.virtual.slidesBefore;w<0&&(w=a.virtual.slides.length+w),w>=a.virtual.slides.length&&(w-=a.virtual.slides.length),v=f(`[data-swiper-slide-index="${w}"]`)}else v=f(`[data-swiper-slide-index="${s}"]`);else c?(v=t.find(w=>w.column===s),g=t.find(w=>w.column===s+1),M=t.find(w=>w.column===s-1)):v=t[s];v&&(c||(g=J_(v,`.${e.slideClass}, swiper-slide`)[0],e.loop&&!g&&(g=t[0]),M=Q_(v,`.${e.slideClass}, swiper-slide`)[0],e.loop&&!M===0&&(M=t[t.length-1]))),t.forEach(w=>{A2(w,w===v,e.slideActiveClass),A2(w,w===g,e.slideNextClass),A2(w,w===M,e.slidePrevClass)}),a.emitSlidesClasses()}const P1=(a,t)=>{if(!a||a.destroyed||!a.params)return;const e=()=>a.isElement?"swiper-slide":`.${a.params.slideClass}`,r=t.closest(e());if(r){let s=r.querySelector(`.${a.params.lazyPreloaderClass}`);!s&&a.isElement&&(r.shadowRoot?s=r.shadowRoot.querySelector(`.${a.params.lazyPreloaderClass}`):requestAnimationFrame(()=>{r.shadowRoot&&(s=r.shadowRoot.querySelector(`.${a.params.lazyPreloaderClass}`),s&&s.remove())})),s&&s.remove()}},T2=(a,t)=>{if(!a.slides[t])return;const e=a.slides[t].querySelector('[loading="lazy"]');e&&e.removeAttribute("loading")},X2=a=>{if(!a||a.destroyed||!a.params)return;let t=a.params.lazyPreloadPrevNext;const e=a.slides.length;if(!e||!t||t<0)return;t=Math.min(t,e);const r=a.params.slidesPerView==="auto"?a.slidesPerViewDynamic():Math.ceil(a.params.slidesPerView),s=a.activeIndex;if(a.params.grid&&a.params.grid.rows>1){const c=s,f=[c-t];f.push(...Array.from({length:t}).map((v,M)=>c+r+M)),a.slides.forEach((v,M)=>{f.includes(v.column)&&T2(a,M)});return}const o=s+r-1;if(a.params.rewind||a.params.loop)for(let c=s-t;c<=o+t;c+=1){const f=(c%e+e)%e;(f<s||f>o)&&T2(a,f)}else for(let c=Math.max(s-t,0);c<=Math.min(o+t,e-1);c+=1)c!==s&&(c>o||c<s)&&T2(a,c)};function uH(a){const{slidesGrid:t,params:e}=a,r=a.rtlTranslate?a.translate:-a.translate;let s;for(let o=0;o<t.length;o+=1)typeof t[o+1]<"u"?r>=t[o]&&r<t[o+1]-(t[o+1]-t[o])/2?s=o:r>=t[o]&&r<t[o+1]&&(s=o+1):r>=t[o]&&(s=o);return e.normalizeSlideIndex&&(s<0||typeof s>"u")&&(s=0),s}function fH(a){const t=this,e=t.rtlTranslate?t.translate:-t.translate,{snapGrid:r,params:s,activeIndex:o,realIndex:c,snapIndex:f}=t;let v=a,M;const g=b=>{let p=b-t.virtual.slidesBefore;return p<0&&(p=t.virtual.slides.length+p),p>=t.virtual.slides.length&&(p-=t.virtual.slides.length),p};if(typeof v>"u"&&(v=uH(t)),r.indexOf(e)>=0)M=r.indexOf(e);else{const b=Math.min(s.slidesPerGroupSkip,v);M=b+Math.floor((v-b)/s.slidesPerGroup)}if(M>=r.length&&(M=r.length-1),v===o&&!t.params.loop){M!==f&&(t.snapIndex=M,t.emit("snapIndexChange"));return}if(v===o&&t.params.loop&&t.virtual&&t.params.virtual.enabled){t.realIndex=g(v);return}const w=t.grid&&s.grid&&s.grid.rows>1;let T;if(t.virtual&&s.virtual.enabled&&s.loop)T=g(v);else if(w){const b=t.slides.find(u=>u.column===v);let p=parseInt(b.getAttribute("data-swiper-slide-index"),10);Number.isNaN(p)&&(p=Math.max(t.slides.indexOf(b),0)),T=Math.floor(p/s.grid.rows)}else if(t.slides[v]){const b=t.slides[v].getAttribute("data-swiper-slide-index");b?T=parseInt(b,10):T=v}else T=v;Object.assign(t,{previousSnapIndex:f,snapIndex:M,previousRealIndex:c,realIndex:T,previousIndex:o,activeIndex:v}),t.initialized&&X2(t),t.emit("activeIndexChange"),t.emit("snapIndexChange"),(t.initialized||t.params.runCallbacksOnInit)&&(c!==T&&t.emit("realIndexChange"),t.emit("slideChange"))}function MH(a,t){const e=this,r=e.params;let s=a.closest(`.${r.slideClass}, swiper-slide`);!s&&e.isElement&&t&&t.length>1&&t.includes(a)&&[...t.slice(t.indexOf(a)+1,t.length)].forEach(f=>{!s&&f.matches&&f.matches(`.${r.slideClass}, swiper-slide`)&&(s=f)});let o=!1,c;if(s){for(let f=0;f<e.slides.length;f+=1)if(e.slides[f]===s){o=!0,c=f;break}}if(s&&o)e.clickedSlide=s,e.virtual&&e.params.virtual.enabled?e.clickedIndex=parseInt(s.getAttribute("data-swiper-slide-index"),10):e.clickedIndex=c;else{e.clickedSlide=void 0,e.clickedIndex=void 0;return}r.slideToClickedSlide&&e.clickedIndex!==void 0&&e.clickedIndex!==e.activeIndex&&e.slideToClickedSlide()}var mH={updateSize:sH,updateSlides:oH,updateAutoHeight:hH,updateSlidesOffset:lH,updateSlidesProgress:dH,updateProgress:cH,updateSlidesClasses:pH,updateActiveIndex:fH,updateClickedSlide:MH};function vH(a){a===void 0&&(a=this.isHorizontal()?"x":"y");const t=this,{params:e,rtlTranslate:r,translate:s,wrapperEl:o}=t;if(e.virtualTranslate)return r?-s:s;if(e.cssMode)return s;let c=G2(o,a);return c+=t.cssOverflowAdjustment(),r&&(c=-c),c||0}function gH(a,t){const e=this,{rtlTranslate:r,params:s,wrapperEl:o,progress:c}=e;let f=0,v=0;const M=0;e.isHorizontal()?f=r?-a:a:v=a,s.roundLengths&&(f=Math.floor(f),v=Math.floor(v)),e.previousTranslate=e.translate,e.translate=e.isHorizontal()?f:v,s.cssMode?o[e.isHorizontal()?"scrollLeft":"scrollTop"]=e.isHorizontal()?-f:-v:s.virtualTranslate||(e.isHorizontal()?f-=e.cssOverflowAdjustment():v-=e.cssOverflowAdjustment(),o.style.transform=`translate3d(${f}px, ${v}px, ${M}px)`);let g;const w=e.maxTranslate()-e.minTranslate();w===0?g=0:g=(a-e.minTranslate())/w,g!==c&&e.updateProgress(a),e.emit("setTranslate",e.translate,t)}function yH(){return-this.snapGrid[0]}function xH(){return-this.snapGrid[this.snapGrid.length-1]}function wH(a,t,e,r,s){a===void 0&&(a=0),t===void 0&&(t=this.params.speed),e===void 0&&(e=!0),r===void 0&&(r=!0);const o=this,{params:c,wrapperEl:f}=o;if(o.animating&&c.preventInteractionOnTransition)return!1;const v=o.minTranslate(),M=o.maxTranslate();let g;if(r&&a>v?g=v:r&&a<M?g=M:g=a,o.updateProgress(g),c.cssMode){const w=o.isHorizontal();if(t===0)f[w?"scrollLeft":"scrollTop"]=-g;else{if(!o.support.smoothScroll)return Io({swiper:o,targetPosition:-g,side:w?"left":"top"}),!0;f.scrollTo({[w?"left":"top"]:-g,behavior:"smooth"})}return!0}return t===0?(o.setTransition(0),o.setTranslate(g),e&&(o.emit("beforeTransitionStart",t,s),o.emit("transitionEnd"))):(o.setTransition(t),o.setTranslate(g),e&&(o.emit("beforeTransitionStart",t,s),o.emit("transitionStart")),o.animating||(o.animating=!0,o.onTranslateToWrapperTransitionEnd||(o.onTranslateToWrapperTransitionEnd=function(T){!o||o.destroyed||T.target===this&&(o.wrapperEl.removeEventListener("transitionend",o.onTranslateToWrapperTransitionEnd),o.onTranslateToWrapperTransitionEnd=null,delete o.onTranslateToWrapperTransitionEnd,o.animating=!1,e&&o.emit("transitionEnd"))}),o.wrapperEl.addEventListener("transitionend",o.onTranslateToWrapperTransitionEnd))),!0}var bH={getTranslate:vH,setTranslate:gH,minTranslate:yH,maxTranslate:xH,translateTo:wH};function EH(a,t){const e=this;e.params.cssMode||(e.wrapperEl.style.transitionDuration=`${a}ms`,e.wrapperEl.style.transitionDelay=a===0?"0ms":""),e.emit("setTransition",a,t)}function Ro(a){let{swiper:t,runCallbacks:e,direction:r,step:s}=a;const{activeIndex:o,previousIndex:c}=t;let f=r;f||(o>c?f="next":o<c?f="prev":f="reset"),t.emit(`transition${s}`),e&&f==="reset"?t.emit(`slideResetTransition${s}`):e&&o!==c&&(t.emit(`slideChangeTransition${s}`),f==="next"?t.emit(`slideNextTransition${s}`):t.emit(`slidePrevTransition${s}`))}function SH(a,t){a===void 0&&(a=!0);const e=this,{params:r}=e;r.cssMode||(r.autoHeight&&e.updateAutoHeight(),Ro({swiper:e,runCallbacks:a,direction:t,step:"Start"}))}function CH(a,t){a===void 0&&(a=!0);const e=this,{params:r}=e;e.animating=!1,!r.cssMode&&(e.setTransition(0),Ro({swiper:e,runCallbacks:a,direction:t,step:"End"}))}var AH={setTransition:EH,transitionStart:SH,transitionEnd:CH};function TH(a,t,e,r,s){a===void 0&&(a=0),e===void 0&&(e=!0),typeof a=="string"&&(a=parseInt(a,10));const o=this;let c=a;c<0&&(c=0);const{params:f,snapGrid:v,slidesGrid:M,previousIndex:g,activeIndex:w,rtlTranslate:T,wrapperEl:b,enabled:p}=o;if(!p&&!r&&!s||o.destroyed||o.animating&&f.preventInteractionOnTransition)return!1;typeof t>"u"&&(t=o.params.speed);const u=Math.min(o.params.slidesPerGroupSkip,c);let A=u+Math.floor((c-u)/o.params.slidesPerGroup);A>=v.length&&(A=v.length-1);const S=-v[A];if(f.normalizeSlideIndex)for(let h=0;h<M.length;h+=1){const W=-Math.floor(S*100),k=Math.floor(M[h]*100),z=Math.floor(M[h+1]*100);typeof M[h+1]<"u"?W>=k&&W<z-(z-k)/2?c=h:W>=k&&W<z&&(c=h+1):W>=k&&(c=h)}if(o.initialized&&c!==w&&(!o.allowSlideNext&&(T?S>o.translate&&S>o.minTranslate():S<o.translate&&S<o.minTranslate())||!o.allowSlidePrev&&S>o.translate&&S>o.maxTranslate()&&(w||0)!==c))return!1;c!==(g||0)&&e&&o.emit("beforeSlideChangeStart"),o.updateProgress(S);let C;c>w?C="next":c<w?C="prev":C="reset";const E=o.virtual&&o.params.virtual.enabled;if(!(E&&s)&&(T&&-S===o.translate||!T&&S===o.translate))return o.updateActiveIndex(c),f.autoHeight&&o.updateAutoHeight(),o.updateSlidesClasses(),f.effect!=="slide"&&o.setTranslate(S),C!=="reset"&&(o.transitionStart(e,C),o.transitionEnd(e,C)),!1;if(f.cssMode){const h=o.isHorizontal(),W=T?S:-S;if(t===0)E&&(o.wrapperEl.style.scrollSnapType="none",o._immediateVirtual=!0),E&&!o._cssModeVirtualInitialSet&&o.params.initialSlide>0?(o._cssModeVirtualInitialSet=!0,requestAnimationFrame(()=>{b[h?"scrollLeft":"scrollTop"]=W})):b[h?"scrollLeft":"scrollTop"]=W,E&&requestAnimationFrame(()=>{o.wrapperEl.style.scrollSnapType="",o._immediateVirtual=!1});else{if(!o.support.smoothScroll)return Io({swiper:o,targetPosition:W,side:h?"left":"top"}),!0;b.scrollTo({[h?"left":"top"]:W,behavior:"smooth"})}return!0}const q=$o().isSafari;return E&&!s&&q&&o.isElement&&o.virtual.update(!1,!1,c),o.setTransition(t),o.setTranslate(S),o.updateActiveIndex(c),o.updateSlidesClasses(),o.emit("beforeTransitionStart",t,r),o.transitionStart(e,C),t===0?o.transitionEnd(e,C):o.animating||(o.animating=!0,o.onSlideToWrapperTransitionEnd||(o.onSlideToWrapperTransitionEnd=function(W){!o||o.destroyed||W.target===this&&(o.wrapperEl.removeEventListener("transitionend",o.onSlideToWrapperTransitionEnd),o.onSlideToWrapperTransitionEnd=null,delete o.onSlideToWrapperTransitionEnd,o.transitionEnd(e,C))}),o.wrapperEl.addEventListener("transitionend",o.onSlideToWrapperTransitionEnd)),!0}function _H(a,t,e,r){a===void 0&&(a=0),e===void 0&&(e=!0),typeof a=="string"&&(a=parseInt(a,10));const s=this;if(s.destroyed)return;typeof t>"u"&&(t=s.params.speed);const o=s.grid&&s.params.grid&&s.params.grid.rows>1;let c=a;if(s.params.loop)if(s.virtual&&s.params.virtual.enabled)c=c+s.virtual.slidesBefore;else{let f;if(o){const T=c*s.params.grid.rows;f=s.slides.find(b=>b.getAttribute("data-swiper-slide-index")*1===T).column}else f=s.getSlideIndexByData(c);const v=o?Math.ceil(s.slides.length/s.params.grid.rows):s.slides.length,{centeredSlides:M}=s.params;let g=s.params.slidesPerView;g==="auto"?g=s.slidesPerViewDynamic():(g=Math.ceil(parseFloat(s.params.slidesPerView,10)),M&&g%2===0&&(g=g+1));let w=v-f<g;if(M&&(w=w||f<Math.ceil(g/2)),r&&M&&s.params.slidesPerView!=="auto"&&!o&&(w=!1),w){const T=M?f<s.activeIndex?"prev":"next":f-s.activeIndex-1<s.params.slidesPerView?"next":"prev";s.loopFix({direction:T,slideTo:!0,activeSlideIndex:T==="next"?f+1:f-v+1,slideRealIndex:T==="next"?s.realIndex:void 0})}if(o){const T=c*s.params.grid.rows;c=s.slides.find(b=>b.getAttribute("data-swiper-slide-index")*1===T).column}else c=s.getSlideIndexByData(c)}return requestAnimationFrame(()=>{s.slideTo(c,t,e,r)}),s}function HH(a,t,e){t===void 0&&(t=!0);const r=this,{enabled:s,params:o,animating:c}=r;if(!s||r.destroyed)return r;typeof a>"u"&&(a=r.params.speed);let f=o.slidesPerGroup;o.slidesPerView==="auto"&&o.slidesPerGroup===1&&o.slidesPerGroupAuto&&(f=Math.max(r.slidesPerViewDynamic("current",!0),1));const v=r.activeIndex<o.slidesPerGroupSkip?1:f,M=r.virtual&&o.virtual.enabled;if(o.loop){if(c&&!M&&o.loopPreventsSliding)return!1;if(r.loopFix({direction:"next"}),r._clientLeft=r.wrapperEl.clientLeft,r.activeIndex===r.slides.length-1&&o.cssMode)return requestAnimationFrame(()=>{r.slideTo(r.activeIndex+v,a,t,e)}),!0}return o.rewind&&r.isEnd?r.slideTo(0,a,t,e):r.slideTo(r.activeIndex+v,a,t,e)}function LH(a,t,e){t===void 0&&(t=!0);const r=this,{params:s,snapGrid:o,slidesGrid:c,rtlTranslate:f,enabled:v,animating:M}=r;if(!v||r.destroyed)return r;typeof a>"u"&&(a=r.params.speed);const g=r.virtual&&s.virtual.enabled;if(s.loop){if(M&&!g&&s.loopPreventsSliding)return!1;r.loopFix({direction:"prev"}),r._clientLeft=r.wrapperEl.clientLeft}const w=f?r.translate:-r.translate;function T(C){return C<0?-Math.floor(Math.abs(C)):Math.floor(C)}const b=T(w),p=o.map(C=>T(C)),u=s.freeMode&&s.freeMode.enabled;let A=o[p.indexOf(b)-1];if(typeof A>"u"&&(s.cssMode||u)){let C;o.forEach((E,L)=>{b>=E&&(C=L)}),typeof C<"u"&&(A=u?o[C]:o[C>0?C-1:C])}let S=0;if(typeof A<"u"&&(S=c.indexOf(A),S<0&&(S=r.activeIndex-1),s.slidesPerView==="auto"&&s.slidesPerGroup===1&&s.slidesPerGroupAuto&&(S=S-r.slidesPerViewDynamic("previous",!0)+1,S=Math.max(S,0))),s.rewind&&r.isBeginning){const C=r.params.virtual&&r.params.virtual.enabled&&r.virtual?r.virtual.slides.length-1:r.slides.length-1;return r.slideTo(C,a,t,e)}else if(s.loop&&r.activeIndex===0&&s.cssMode)return requestAnimationFrame(()=>{r.slideTo(S,a,t,e)}),!0;return r.slideTo(S,a,t,e)}function VH(a,t,e){t===void 0&&(t=!0);const r=this;if(!r.destroyed)return typeof a>"u"&&(a=r.params.speed),r.slideTo(r.activeIndex,a,t,e)}function PH(a,t,e,r){t===void 0&&(t=!0),r===void 0&&(r=.5);const s=this;if(s.destroyed)return;typeof a>"u"&&(a=s.params.speed);let o=s.activeIndex;const c=Math.min(s.params.slidesPerGroupSkip,o),f=c+Math.floor((o-c)/s.params.slidesPerGroup),v=s.rtlTranslate?s.translate:-s.translate;if(v>=s.snapGrid[f]){const M=s.snapGrid[f],g=s.snapGrid[f+1];v-M>(g-M)*r&&(o+=s.params.slidesPerGroup)}else{const M=s.snapGrid[f-1],g=s.snapGrid[f];v-M<=(g-M)*r&&(o-=s.params.slidesPerGroup)}return o=Math.max(o,0),o=Math.min(o,s.slidesGrid.length-1),s.slideTo(o,a,t,e)}function DH(){const a=this;if(a.destroyed)return;const{params:t,slidesEl:e}=a,r=t.slidesPerView==="auto"?a.slidesPerViewDynamic():t.slidesPerView;let s=a.getSlideIndexWhenGrid(a.clickedIndex),o;const c=a.isElement?"swiper-slide":`.${t.slideClass}`,f=a.grid&&a.params.grid&&a.params.grid.rows>1;if(t.loop){if(a.animating)return;o=parseInt(a.clickedSlide.getAttribute("data-swiper-slide-index"),10),t.centeredSlides?a.slideToLoop(o):s>(f?(a.slides.length-r)/2-(a.params.grid.rows-1):a.slides.length-r)?(a.loopFix(),s=a.getSlideIndex(Bt(e,`${c}[data-swiper-slide-index="${o}"]`)[0]),La(()=>{a.slideTo(s)})):a.slideTo(s)}else a.slideTo(s)}var OH={slideTo:TH,slideToLoop:_H,slideNext:HH,slidePrev:LH,slideReset:VH,slideToClosest:PH,slideToClickedSlide:DH};function kH(a,t){const e=this,{params:r,slidesEl:s}=e;if(!r.loop||e.virtual&&e.params.virtual.enabled)return;const o=()=>{Bt(s,`.${r.slideClass}, swiper-slide`).forEach((b,p)=>{b.setAttribute("data-swiper-slide-index",p)})},c=()=>{const T=Bt(s,`.${r.slideBlankClass}`);T.forEach(b=>{b.remove()}),T.length>0&&(e.recalcSlides(),e.updateSlides())},f=e.grid&&r.grid&&r.grid.rows>1;r.loopAddBlankSlides&&(r.slidesPerGroup>1||f)&&c();const v=r.slidesPerGroup*(f?r.grid.rows:1),M=e.slides.length%v!==0,g=f&&e.slides.length%r.grid.rows!==0,w=T=>{for(let b=0;b<T;b+=1){const p=e.isElement?re("swiper-slide",[r.slideBlankClass]):re("div",[r.slideClass,r.slideBlankClass]);e.slidesEl.append(p)}};if(M){if(r.loopAddBlankSlides){const T=v-e.slides.length%v;w(T),e.recalcSlides(),e.updateSlides()}else I1("Swiper Loop Warning: The number of slides is not even to slidesPerGroup, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");o()}else if(g){if(r.loopAddBlankSlides){const T=r.grid.rows-e.slides.length%r.grid.rows;w(T),e.recalcSlides(),e.updateSlides()}else I1("Swiper Loop Warning: The number of slides is not even to grid.rows, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");o()}else o();e.loopFix({slideRealIndex:a,direction:r.centeredSlides?void 0:"next",initial:t})}function IH(a){let{slideRealIndex:t,slideTo:e=!0,direction:r,setTranslate:s,activeSlideIndex:o,initial:c,byController:f,byMousewheel:v}=a===void 0?{}:a;const M=this;if(!M.params.loop)return;M.emit("beforeLoopFix");const{slides:g,allowSlidePrev:w,allowSlideNext:T,slidesEl:b,params:p}=M,{centeredSlides:u,initialSlide:A}=p;if(M.allowSlidePrev=!0,M.allowSlideNext=!0,M.virtual&&p.virtual.enabled){e&&(!p.centeredSlides&&M.snapIndex===0?M.slideTo(M.virtual.slides.length,0,!1,!0):p.centeredSlides&&M.snapIndex<p.slidesPerView?M.slideTo(M.virtual.slides.length+M.snapIndex,0,!1,!0):M.snapIndex===M.snapGrid.length-1&&M.slideTo(M.virtual.slidesBefore,0,!1,!0)),M.allowSlidePrev=w,M.allowSlideNext=T,M.emit("loopFix");return}let S=p.slidesPerView;S==="auto"?S=M.slidesPerViewDynamic():(S=Math.ceil(parseFloat(p.slidesPerView,10)),u&&S%2===0&&(S=S+1));const C=p.slidesPerGroupAuto?S:p.slidesPerGroup;let E=u?Math.max(C,Math.ceil(S/2)):C;E%C!==0&&(E+=C-E%C),E+=p.loopAdditionalSlides,M.loopedSlides=E;const L=M.grid&&p.grid&&p.grid.rows>1;g.length<S+E||M.params.effect==="cards"&&g.length<S+E*2?I1("Swiper Loop Warning: The number of slides is not enough for loop mode, it will be disabled or not function properly. You need to add more slides (or make duplicates) or lower the values of slidesPerView and slidesPerGroup parameters"):L&&p.grid.fill==="row"&&I1("Swiper Loop Warning: Loop mode is not compatible with grid.fill = `row`");const O=[],q=[],h=L?Math.ceil(g.length/p.grid.rows):g.length,W=c&&h-A<S&&!u;let k=W?A:M.activeIndex;typeof o>"u"?o=M.getSlideIndex(g.find(Q=>Q.classList.contains(p.slideActiveClass))):k=o;const z=r==="next"||!r,G=r==="prev"||!r;let j=0,I=0;const J=(L?g[o].column:o)+(u&&typeof s>"u"?-S/2+.5:0);if(J<E){j=Math.max(E-J,C);for(let Q=0;Q<E-J;Q+=1){const N=Q-Math.floor(Q/h)*h;if(L){const B=h-N-1;for(let at=g.length-1;at>=0;at-=1)g[at].column===B&&O.push(at)}else O.push(h-N-1)}}else if(J+S>h-E){I=Math.max(J-(h-E*2),C),W&&(I=Math.max(I,S-h+A+1));for(let Q=0;Q<I;Q+=1){const N=Q-Math.floor(Q/h)*h;L?g.forEach((B,at)=>{B.column===N&&q.push(at)}):q.push(N)}}if(M.__preventObserver__=!0,requestAnimationFrame(()=>{M.__preventObserver__=!1}),M.params.effect==="cards"&&g.length<S+E*2&&(q.includes(o)&&q.splice(q.indexOf(o),1),O.includes(o)&&O.splice(O.indexOf(o),1)),G&&O.forEach(Q=>{g[Q].swiperLoopMoveDOM=!0,b.prepend(g[Q]),g[Q].swiperLoopMoveDOM=!1}),z&&q.forEach(Q=>{g[Q].swiperLoopMoveDOM=!0,b.append(g[Q]),g[Q].swiperLoopMoveDOM=!1}),M.recalcSlides(),p.slidesPerView==="auto"?M.updateSlides():L&&(O.length>0&&G||q.length>0&&z)&&M.slides.forEach((Q,N)=>{M.grid.updateSlide(N,Q,M.slides)}),p.watchSlidesProgress&&M.updateSlidesOffset(),e){if(O.length>0&&G){if(typeof t>"u"){const Q=M.slidesGrid[k],B=M.slidesGrid[k+j]-Q;v?M.setTranslate(M.translate-B):(M.slideTo(k+Math.ceil(j),0,!1,!0),s&&(M.touchEventsData.startTranslate=M.touchEventsData.startTranslate-B,M.touchEventsData.currentTranslate=M.touchEventsData.currentTranslate-B))}else if(s){const Q=L?O.length/p.grid.rows:O.length;M.slideTo(M.activeIndex+Q,0,!1,!0),M.touchEventsData.currentTranslate=M.translate}}else if(q.length>0&&z)if(typeof t>"u"){const Q=M.slidesGrid[k],B=M.slidesGrid[k-I]-Q;v?M.setTranslate(M.translate-B):(M.slideTo(k-I,0,!1,!0),s&&(M.touchEventsData.startTranslate=M.touchEventsData.startTranslate-B,M.touchEventsData.currentTranslate=M.touchEventsData.currentTranslate-B))}else{const Q=L?q.length/p.grid.rows:q.length;M.slideTo(M.activeIndex-Q,0,!1,!0)}}if(M.allowSlidePrev=w,M.allowSlideNext=T,M.controller&&M.controller.control&&!f){const Q={slideRealIndex:t,direction:r,setTranslate:s,activeSlideIndex:o,byController:!0};Array.isArray(M.controller.control)?M.controller.control.forEach(N=>{!N.destroyed&&N.params.loop&&N.loopFix({...Q,slideTo:N.params.slidesPerView===p.slidesPerView?e:!1})}):M.controller.control instanceof M.constructor&&M.controller.control.params.loop&&M.controller.control.loopFix({...Q,slideTo:M.controller.control.params.slidesPerView===p.slidesPerView?e:!1})}M.emit("loopFix")}function NH(){const a=this,{params:t,slidesEl:e}=a;if(!t.loop||!e||a.virtual&&a.params.virtual.enabled)return;a.recalcSlides();const r=[];a.slides.forEach(s=>{const o=typeof s.swiperSlideIndex>"u"?s.getAttribute("data-swiper-slide-index")*1:s.swiperSlideIndex;r[o]=s}),a.slides.forEach(s=>{s.removeAttribute("data-swiper-slide-index")}),r.forEach(s=>{e.append(s)}),a.recalcSlides(),a.slideTo(a.realIndex,0)}var zH={loopCreate:kH,loopFix:IH,loopDestroy:NH};function $H(a){const t=this;if(!t.params.simulateTouch||t.params.watchOverflow&&t.isLocked||t.params.cssMode)return;const e=t.params.touchEventsTarget==="container"?t.el:t.wrapperEl;t.isElement&&(t.__preventObserver__=!0),e.style.cursor="move",e.style.cursor=a?"grabbing":"grab",t.isElement&&requestAnimationFrame(()=>{t.__preventObserver__=!1})}function RH(){const a=this;a.params.watchOverflow&&a.isLocked||a.params.cssMode||(a.isElement&&(a.__preventObserver__=!0),a[a.params.touchEventsTarget==="container"?"el":"wrapperEl"].style.cursor="",a.isElement&&requestAnimationFrame(()=>{a.__preventObserver__=!1}))}var BH={setGrabCursor:$H,unsetGrabCursor:RH};function FH(a,t){t===void 0&&(t=this);function e(r){if(!r||r===zt()||r===_t())return null;r.assignedSlot&&(r=r.assignedSlot);const s=r.closest(a);return!s&&!r.getRootNode?null:s||e(r.getRootNode().host)}return e(t)}function G0(a,t,e){const r=_t(),{params:s}=a,o=s.edgeSwipeDetection,c=s.edgeSwipeThreshold;return o&&(e<=c||e>=r.innerWidth-c)?o==="prevent"?(t.preventDefault(),!0):!1:!0}function qH(a){const t=this,e=zt();let r=a;r.originalEvent&&(r=r.originalEvent);const s=t.touchEventsData;if(r.type==="pointerdown"){if(s.pointerId!==null&&s.pointerId!==r.pointerId)return;s.pointerId=r.pointerId}else r.type==="touchstart"&&r.targetTouches.length===1&&(s.touchId=r.targetTouches[0].identifier);if(r.type==="touchstart"){G0(t,r,r.targetTouches[0].pageX);return}const{params:o,touches:c,enabled:f}=t;if(!f||!o.simulateTouch&&r.pointerType==="mouse"||t.animating&&o.preventInteractionOnTransition)return;!t.animating&&o.cssMode&&o.loop&&t.loopFix();let v=r.target;if(o.touchEventsTarget==="wrapper"&&!K_(v,t.wrapperEl)||"which"in r&&r.which===3||"button"in r&&r.button>0||s.isTouched&&s.isMoved)return;const M=!!o.noSwipingClass&&o.noSwipingClass!=="",g=r.composedPath?r.composedPath():r.path;M&&r.target&&r.target.shadowRoot&&g&&(v=g[0]);const w=o.noSwipingSelector?o.noSwipingSelector:`.${o.noSwipingClass}`,T=!!(r.target&&r.target.shadowRoot);if(o.noSwiping&&(T?FH(w,v):v.closest(w))){t.allowClick=!0;return}if(o.swipeHandler&&!v.closest(o.swipeHandler))return;c.currentX=r.pageX,c.currentY=r.pageY;const b=c.currentX,p=c.currentY;if(!G0(t,r,b))return;Object.assign(s,{isTouched:!0,isMoved:!1,allowTouchCallbacks:!0,isScrolling:void 0,startMoving:void 0}),c.startX=b,c.startY=p,s.touchStartTime=fe(),t.allowClick=!0,t.updateSize(),t.swipeDirection=void 0,o.threshold>0&&(s.allowThresholdMove=!1);let u=!0;v.matches(s.focusableElements)&&(u=!1,v.nodeName==="SELECT"&&(s.isTouched=!1)),e.activeElement&&e.activeElement.matches(s.focusableElements)&&e.activeElement!==v&&(r.pointerType==="mouse"||r.pointerType!=="mouse"&&!v.matches(s.focusableElements))&&e.activeElement.blur();const A=u&&t.allowTouchMove&&o.touchStartPreventDefault;(o.touchStartForcePreventDefault||A)&&!v.isContentEditable&&r.preventDefault(),o.freeMode&&o.freeMode.enabled&&t.freeMode&&t.animating&&!o.cssMode&&t.freeMode.onTouchStart(),t.emit("touchStart",r)}function WH(a){const t=zt(),e=this,r=e.touchEventsData,{params:s,touches:o,rtlTranslate:c,enabled:f}=e;if(!f||!s.simulateTouch&&a.pointerType==="mouse")return;let v=a;if(v.originalEvent&&(v=v.originalEvent),v.type==="pointermove"&&(r.touchId!==null||v.pointerId!==r.pointerId))return;let M;if(v.type==="touchmove"){if(M=[...v.changedTouches].find(O=>O.identifier===r.touchId),!M||M.identifier!==r.touchId)return}else M=v;if(!r.isTouched){r.startMoving&&r.isScrolling&&e.emit("touchMoveOpposite",v);return}const g=M.pageX,w=M.pageY;if(v.preventedByNestedSwiper){o.startX=g,o.startY=w;return}if(!e.allowTouchMove){v.target.matches(r.focusableElements)||(e.allowClick=!1),r.isTouched&&(Object.assign(o,{startX:g,startY:w,currentX:g,currentY:w}),r.touchStartTime=fe());return}if(s.touchReleaseOnEdges&&!s.loop)if(e.isVertical()){if(w<o.startY&&e.translate<=e.maxTranslate()||w>o.startY&&e.translate>=e.minTranslate()){r.isTouched=!1,r.isMoved=!1;return}}else{if(c&&(g>o.startX&&-e.translate<=e.maxTranslate()||g<o.startX&&-e.translate>=e.minTranslate()))return;if(!c&&(g<o.startX&&e.translate<=e.maxTranslate()||g>o.startX&&e.translate>=e.minTranslate()))return}if(t.activeElement&&t.activeElement.matches(r.focusableElements)&&t.activeElement!==v.target&&v.pointerType!=="mouse"&&t.activeElement.blur(),t.activeElement&&v.target===t.activeElement&&v.target.matches(r.focusableElements)){r.isMoved=!0,e.allowClick=!1;return}r.allowTouchCallbacks&&e.emit("touchMove",v),o.previousX=o.currentX,o.previousY=o.currentY,o.currentX=g,o.currentY=w;const T=o.currentX-o.startX,b=o.currentY-o.startY;if(e.params.threshold&&Math.sqrt(T**2+b**2)<e.params.threshold)return;if(typeof r.isScrolling>"u"){let O;e.isHorizontal()&&o.currentY===o.startY||e.isVertical()&&o.currentX===o.startX?r.isScrolling=!1:T*T+b*b>=25&&(O=Math.atan2(Math.abs(b),Math.abs(T))*180/Math.PI,r.isScrolling=e.isHorizontal()?O>s.touchAngle:90-O>s.touchAngle)}if(r.isScrolling&&e.emit("touchMoveOpposite",v),typeof r.startMoving>"u"&&(o.currentX!==o.startX||o.currentY!==o.startY)&&(r.startMoving=!0),r.isScrolling||v.type==="touchmove"&&r.preventTouchMoveFromPointerMove){r.isTouched=!1;return}if(!r.startMoving)return;e.allowClick=!1,!s.cssMode&&v.cancelable&&v.preventDefault(),s.touchMoveStopPropagation&&!s.nested&&v.stopPropagation();let p=e.isHorizontal()?T:b,u=e.isHorizontal()?o.currentX-o.previousX:o.currentY-o.previousY;s.oneWayMovement&&(p=Math.abs(p)*(c?1:-1),u=Math.abs(u)*(c?1:-1)),o.diff=p,p*=s.touchRatio,c&&(p=-p,u=-u);const A=e.touchesDirection;e.swipeDirection=p>0?"prev":"next",e.touchesDirection=u>0?"prev":"next";const S=e.params.loop&&!s.cssMode,C=e.touchesDirection==="next"&&e.allowSlideNext||e.touchesDirection==="prev"&&e.allowSlidePrev;if(!r.isMoved){if(S&&C&&e.loopFix({direction:e.swipeDirection}),r.startTranslate=e.getTranslate(),e.setTransition(0),e.animating){const O=new window.CustomEvent("transitionend",{bubbles:!0,cancelable:!0,detail:{bySwiperTouchMove:!0}});e.wrapperEl.dispatchEvent(O)}r.allowMomentumBounce=!1,s.grabCursor&&(e.allowSlideNext===!0||e.allowSlidePrev===!0)&&e.setGrabCursor(!0),e.emit("sliderFirstMove",v)}if(new Date().getTime(),s._loopSwapReset!==!1&&r.isMoved&&r.allowThresholdMove&&A!==e.touchesDirection&&S&&C&&Math.abs(p)>=1){Object.assign(o,{startX:g,startY:w,currentX:g,currentY:w,startTranslate:r.currentTranslate}),r.loopSwapReset=!0,r.startTranslate=r.currentTranslate;return}e.emit("sliderMove",v),r.isMoved=!0,r.currentTranslate=p+r.startTranslate;let E=!0,L=s.resistanceRatio;if(s.touchReleaseOnEdges&&(L=0),p>0?(S&&C&&r.allowThresholdMove&&r.currentTranslate>(s.centeredSlides?e.minTranslate()-e.slidesSizesGrid[e.activeIndex+1]-(s.slidesPerView!=="auto"&&e.slides.length-s.slidesPerView>=2?e.slidesSizesGrid[e.activeIndex+1]+e.params.spaceBetween:0)-e.params.spaceBetween:e.minTranslate())&&e.loopFix({direction:"prev",setTranslate:!0,activeSlideIndex:0}),r.currentTranslate>e.minTranslate()&&(E=!1,s.resistance&&(r.currentTranslate=e.minTranslate()-1+(-e.minTranslate()+r.startTranslate+p)**L))):p<0&&(S&&C&&r.allowThresholdMove&&r.currentTranslate<(s.centeredSlides?e.maxTranslate()+e.slidesSizesGrid[e.slidesSizesGrid.length-1]+e.params.spaceBetween+(s.slidesPerView!=="auto"&&e.slides.length-s.slidesPerView>=2?e.slidesSizesGrid[e.slidesSizesGrid.length-1]+e.params.spaceBetween:0):e.maxTranslate())&&e.loopFix({direction:"next",setTranslate:!0,activeSlideIndex:e.slides.length-(s.slidesPerView==="auto"?e.slidesPerViewDynamic():Math.ceil(parseFloat(s.slidesPerView,10)))}),r.currentTranslate<e.maxTranslate()&&(E=!1,s.resistance&&(r.currentTranslate=e.maxTranslate()+1-(e.maxTranslate()-r.startTranslate-p)**L))),E&&(v.preventedByNestedSwiper=!0),!e.allowSlideNext&&e.swipeDirection==="next"&&r.currentTranslate<r.startTranslate&&(r.currentTranslate=r.startTranslate),!e.allowSlidePrev&&e.swipeDirection==="prev"&&r.currentTranslate>r.startTranslate&&(r.currentTranslate=r.startTranslate),!e.allowSlidePrev&&!e.allowSlideNext&&(r.currentTranslate=r.startTranslate),s.threshold>0)if(Math.abs(p)>s.threshold||r.allowThresholdMove){if(!r.allowThresholdMove){r.allowThresholdMove=!0,o.startX=o.currentX,o.startY=o.currentY,r.currentTranslate=r.startTranslate,o.diff=e.isHorizontal()?o.currentX-o.startX:o.currentY-o.startY;return}}else{r.currentTranslate=r.startTranslate;return}!s.followFinger||s.cssMode||((s.freeMode&&s.freeMode.enabled&&e.freeMode||s.watchSlidesProgress)&&(e.updateActiveIndex(),e.updateSlidesClasses()),s.freeMode&&s.freeMode.enabled&&e.freeMode&&e.freeMode.onTouchMove(),e.updateProgress(r.currentTranslate),e.setTranslate(r.currentTranslate))}function jH(a){const t=this,e=t.touchEventsData;let r=a;r.originalEvent&&(r=r.originalEvent);let s;if(r.type==="touchend"||r.type==="touchcancel"){if(s=[...r.changedTouches].find(O=>O.identifier===e.touchId),!s||s.identifier!==e.touchId)return}else{if(e.touchId!==null||r.pointerId!==e.pointerId)return;s=r}if(["pointercancel","pointerout","pointerleave","contextmenu"].includes(r.type)&&!(["pointercancel","contextmenu"].includes(r.type)&&(t.browser.isSafari||t.browser.isWebView)))return;e.pointerId=null,e.touchId=null;const{params:c,touches:f,rtlTranslate:v,slidesGrid:M,enabled:g}=t;if(!g||!c.simulateTouch&&r.pointerType==="mouse")return;if(e.allowTouchCallbacks&&t.emit("touchEnd",r),e.allowTouchCallbacks=!1,!e.isTouched){e.isMoved&&c.grabCursor&&t.setGrabCursor(!1),e.isMoved=!1,e.startMoving=!1;return}c.grabCursor&&e.isMoved&&e.isTouched&&(t.allowSlideNext===!0||t.allowSlidePrev===!0)&&t.setGrabCursor(!1);const w=fe(),T=w-e.touchStartTime;if(t.allowClick){const O=r.path||r.composedPath&&r.composedPath();t.updateClickedSlide(O&&O[0]||r.target,O),t.emit("tap click",r),T<300&&w-e.lastClickTime<300&&t.emit("doubleTap doubleClick",r)}if(e.lastClickTime=fe(),La(()=>{t.destroyed||(t.allowClick=!0)}),!e.isTouched||!e.isMoved||!t.swipeDirection||f.diff===0&&!e.loopSwapReset||e.currentTranslate===e.startTranslate&&!e.loopSwapReset){e.isTouched=!1,e.isMoved=!1,e.startMoving=!1;return}e.isTouched=!1,e.isMoved=!1,e.startMoving=!1;let b;if(c.followFinger?b=v?t.translate:-t.translate:b=-e.currentTranslate,c.cssMode)return;if(c.freeMode&&c.freeMode.enabled){t.freeMode.onTouchEnd({currentPos:b});return}const p=b>=-t.maxTranslate()&&!t.params.loop;let u=0,A=t.slidesSizesGrid[0];for(let O=0;O<M.length;O+=O<c.slidesPerGroupSkip?1:c.slidesPerGroup){const q=O<c.slidesPerGroupSkip-1?1:c.slidesPerGroup;typeof M[O+q]<"u"?(p||b>=M[O]&&b<M[O+q])&&(u=O,A=M[O+q]-M[O]):(p||b>=M[O])&&(u=O,A=M[M.length-1]-M[M.length-2])}let S=null,C=null;c.rewind&&(t.isBeginning?C=c.virtual&&c.virtual.enabled&&t.virtual?t.virtual.slides.length-1:t.slides.length-1:t.isEnd&&(S=0));const E=(b-M[u])/A,L=u<c.slidesPerGroupSkip-1?1:c.slidesPerGroup;if(T>c.longSwipesMs){if(!c.longSwipes){t.slideTo(t.activeIndex);return}t.swipeDirection==="next"&&(E>=c.longSwipesRatio?t.slideTo(c.rewind&&t.isEnd?S:u+L):t.slideTo(u)),t.swipeDirection==="prev"&&(E>1-c.longSwipesRatio?t.slideTo(u+L):C!==null&&E<0&&Math.abs(E)>c.longSwipesRatio?t.slideTo(C):t.slideTo(u))}else{if(!c.shortSwipes){t.slideTo(t.activeIndex);return}t.navigation&&(r.target===t.navigation.nextEl||r.target===t.navigation.prevEl)?r.target===t.navigation.nextEl?t.slideTo(u+L):t.slideTo(u):(t.swipeDirection==="next"&&t.slideTo(S!==null?S:u+L),t.swipeDirection==="prev"&&t.slideTo(C!==null?C:u))}}function Z0(){const a=this,{params:t,el:e}=a;if(e&&e.offsetWidth===0)return;t.breakpoints&&a.setBreakpoint();const{allowSlideNext:r,allowSlidePrev:s,snapGrid:o}=a,c=a.virtual&&a.params.virtual.enabled;a.allowSlideNext=!0,a.allowSlidePrev=!0,a.updateSize(),a.updateSlides(),a.updateSlidesClasses();const f=c&&t.loop;(t.slidesPerView==="auto"||t.slidesPerView>1)&&a.isEnd&&!a.isBeginning&&!a.params.centeredSlides&&!f?a.slideTo(a.slides.length-1,0,!1,!0):a.params.loop&&!c?a.slideToLoop(a.realIndex,0,!1,!0):a.slideTo(a.activeIndex,0,!1,!0),a.autoplay&&a.autoplay.running&&a.autoplay.paused&&(clearTimeout(a.autoplay.resizeTimeout),a.autoplay.resizeTimeout=setTimeout(()=>{a.autoplay&&a.autoplay.running&&a.autoplay.paused&&a.autoplay.resume()},500)),a.allowSlidePrev=s,a.allowSlideNext=r,a.params.watchOverflow&&o!==a.snapGrid&&a.checkOverflow()}function GH(a){const t=this;t.enabled&&(t.allowClick||(t.params.preventClicks&&a.preventDefault(),t.params.preventClicksPropagation&&t.animating&&(a.stopPropagation(),a.stopImmediatePropagation())))}function ZH(){const a=this,{wrapperEl:t,rtlTranslate:e,enabled:r}=a;if(!r)return;a.previousTranslate=a.translate,a.isHorizontal()?a.translate=-t.scrollLeft:a.translate=-t.scrollTop,a.translate===0&&(a.translate=0),a.updateActiveIndex(),a.updateSlidesClasses();let s;const o=a.maxTranslate()-a.minTranslate();o===0?s=0:s=(a.translate-a.minTranslate())/o,s!==a.progress&&a.updateProgress(e?-a.translate:a.translate),a.emit("setTranslate",a.translate,!1)}function XH(a){const t=this;P1(t,a.target),!(t.params.cssMode||t.params.slidesPerView!=="auto"&&!t.params.autoHeight)&&t.update()}function UH(){const a=this;a.documentTouchHandlerProceeded||(a.documentTouchHandlerProceeded=!0,a.params.touchReleaseOnEdges&&(a.el.style.touchAction="auto"))}const Bo=(a,t)=>{const e=zt(),{params:r,el:s,wrapperEl:o,device:c}=a,f=!!r.nested,v=t==="on"?"addEventListener":"removeEventListener",M=t;!s||typeof s=="string"||(e[v]("touchstart",a.onDocumentTouchStart,{passive:!1,capture:f}),s[v]("touchstart",a.onTouchStart,{passive:!1}),s[v]("pointerdown",a.onTouchStart,{passive:!1}),e[v]("touchmove",a.onTouchMove,{passive:!1,capture:f}),e[v]("pointermove",a.onTouchMove,{passive:!1,capture:f}),e[v]("touchend",a.onTouchEnd,{passive:!0}),e[v]("pointerup",a.onTouchEnd,{passive:!0}),e[v]("pointercancel",a.onTouchEnd,{passive:!0}),e[v]("touchcancel",a.onTouchEnd,{passive:!0}),e[v]("pointerout",a.onTouchEnd,{passive:!0}),e[v]("pointerleave",a.onTouchEnd,{passive:!0}),e[v]("contextmenu",a.onTouchEnd,{passive:!0}),(r.preventClicks||r.preventClicksPropagation)&&s[v]("click",a.onClick,!0),r.cssMode&&o[v]("scroll",a.onScroll),r.updateOnWindowResize?a[M](c.ios||c.android?"resize orientationchange observerUpdate":"resize observerUpdate",Z0,!0):a[M]("observerUpdate",Z0,!0),s[v]("load",a.onLoad,{capture:!0}))};function YH(){const a=this,{params:t}=a;a.onTouchStart=qH.bind(a),a.onTouchMove=WH.bind(a),a.onTouchEnd=jH.bind(a),a.onDocumentTouchStart=UH.bind(a),t.cssMode&&(a.onScroll=ZH.bind(a)),a.onClick=GH.bind(a),a.onLoad=XH.bind(a),Bo(a,"on")}function KH(){Bo(this,"off")}var QH={attachEvents:YH,detachEvents:KH};const X0=(a,t)=>a.grid&&t.grid&&t.grid.rows>1;function JH(){const a=this,{realIndex:t,initialized:e,params:r,el:s}=a,o=r.breakpoints;if(!o||o&&Object.keys(o).length===0)return;const c=zt(),f=r.breakpointsBase==="window"||!r.breakpointsBase?r.breakpointsBase:"container",v=["window","container"].includes(r.breakpointsBase)||!r.breakpointsBase?a.el:c.querySelector(r.breakpointsBase),M=a.getBreakpoint(o,f,v);if(!M||a.currentBreakpoint===M)return;const w=(M in o?o[M]:void 0)||a.originalParams,T=X0(a,r),b=X0(a,w),p=a.params.grabCursor,u=w.grabCursor,A=r.enabled;T&&!b?(s.classList.remove(`${r.containerModifierClass}grid`,`${r.containerModifierClass}grid-column`),a.emitContainerClasses()):!T&&b&&(s.classList.add(`${r.containerModifierClass}grid`),(w.grid.fill&&w.grid.fill==="column"||!w.grid.fill&&r.grid.fill==="column")&&s.classList.add(`${r.containerModifierClass}grid-column`),a.emitContainerClasses()),p&&!u?a.unsetGrabCursor():!p&&u&&a.setGrabCursor(),["navigation","pagination","scrollbar"].forEach(q=>{if(typeof w[q]>"u")return;const h=r[q]&&r[q].enabled,W=w[q]&&w[q].enabled;h&&!W&&a[q].disable(),!h&&W&&a[q].enable()});const S=w.direction&&w.direction!==r.direction,C=r.loop&&(w.slidesPerView!==r.slidesPerView||S),E=r.loop;S&&e&&a.changeDirection(),ie(a.params,w);const L=a.params.enabled,O=a.params.loop;Object.assign(a,{allowTouchMove:a.params.allowTouchMove,allowSlideNext:a.params.allowSlideNext,allowSlidePrev:a.params.allowSlidePrev}),A&&!L?a.disable():!A&&L&&a.enable(),a.currentBreakpoint=M,a.emit("_beforeBreakpoint",w),e&&(C?(a.loopDestroy(),a.loopCreate(t),a.updateSlides()):!E&&O?(a.loopCreate(t),a.updateSlides()):E&&!O&&a.loopDestroy()),a.emit("breakpoint",w)}function tL(a,t,e){if(t===void 0&&(t="window"),!a||t==="container"&&!e)return;let r=!1;const s=_t(),o=t==="window"?s.innerHeight:e.clientHeight,c=Object.keys(a).map(f=>{if(typeof f=="string"&&f.indexOf("@")===0){const v=parseFloat(f.substr(1));return{value:o*v,point:f}}return{value:f,point:f}});c.sort((f,v)=>parseInt(f.value,10)-parseInt(v.value,10));for(let f=0;f<c.length;f+=1){const{point:v,value:M}=c[f];t==="window"?s.matchMedia(`(min-width: ${M}px)`).matches&&(r=v):M<=e.clientWidth&&(r=v)}return r||"max"}var eL={setBreakpoint:JH,getBreakpoint:tL};function aL(a,t){const e=[];return a.forEach(r=>{typeof r=="object"?Object.keys(r).forEach(s=>{r[s]&&e.push(t+s)}):typeof r=="string"&&e.push(t+r)}),e}function iL(){const a=this,{classNames:t,params:e,rtl:r,el:s,device:o}=a,c=aL(["initialized",e.direction,{"free-mode":a.params.freeMode&&e.freeMode.enabled},{autoheight:e.autoHeight},{rtl:r},{grid:e.grid&&e.grid.rows>1},{"grid-column":e.grid&&e.grid.rows>1&&e.grid.fill==="column"},{android:o.android},{ios:o.ios},{"css-mode":e.cssMode},{centered:e.cssMode&&e.centeredSlides},{"watch-progress":e.watchSlidesProgress}],e.containerModifierClass);t.push(...c),s.classList.add(...t),a.emitContainerClasses()}function rL(){const a=this,{el:t,classNames:e}=a;!t||typeof t=="string"||(t.classList.remove(...e),a.emitContainerClasses())}var nL={addClasses:iL,removeClasses:rL};function sL(){const a=this,{isLocked:t,params:e}=a,{slidesOffsetBefore:r}=e;if(r){const s=a.slides.length-1,o=a.slidesGrid[s]+a.slidesSizesGrid[s]+r*2;a.isLocked=a.size>o}else a.isLocked=a.snapGrid.length===1;e.allowSlideNext===!0&&(a.allowSlideNext=!a.isLocked),e.allowSlidePrev===!0&&(a.allowSlidePrev=!a.isLocked),t&&t!==a.isLocked&&(a.isEnd=!1),t!==a.isLocked&&a.emit(a.isLocked?"lock":"unlock")}var oL={checkOverflow:sL},U0={init:!0,direction:"horizontal",oneWayMovement:!1,swiperElementNodeName:"SWIPER-CONTAINER",touchEventsTarget:"wrapper",initialSlide:0,speed:300,cssMode:!1,updateOnWindowResize:!0,resizeObserver:!0,nested:!1,createElements:!1,eventsPrefix:"swiper",enabled:!0,focusableElements:"input, select, option, textarea, button, video, label",width:null,height:null,preventInteractionOnTransition:!1,userAgent:null,url:null,edgeSwipeDetection:!1,edgeSwipeThreshold:20,autoHeight:!1,setWrapperSize:!1,virtualTranslate:!1,effect:"slide",breakpoints:void 0,breakpointsBase:"window",spaceBetween:0,slidesPerView:1,slidesPerGroup:1,slidesPerGroupSkip:0,slidesPerGroupAuto:!1,centeredSlides:!1,centeredSlidesBounds:!1,slidesOffsetBefore:0,slidesOffsetAfter:0,normalizeSlideIndex:!0,centerInsufficientSlides:!1,watchOverflow:!0,roundLengths:!1,touchRatio:1,touchAngle:45,simulateTouch:!0,shortSwipes:!0,longSwipes:!0,longSwipesRatio:.5,longSwipesMs:300,followFinger:!0,allowTouchMove:!0,threshold:5,touchMoveStopPropagation:!1,touchStartPreventDefault:!0,touchStartForcePreventDefault:!1,touchReleaseOnEdges:!1,uniqueNavElements:!0,resistance:!0,resistanceRatio:.85,watchSlidesProgress:!1,grabCursor:!1,preventClicks:!0,preventClicksPropagation:!0,slideToClickedSlide:!1,loop:!1,loopAddBlankSlides:!0,loopAdditionalSlides:0,loopPreventsSliding:!0,rewind:!1,allowSlidePrev:!0,allowSlideNext:!0,swipeHandler:null,noSwiping:!0,noSwipingClass:"swiper-no-swiping",noSwipingSelector:null,passiveListeners:!0,maxBackfaceHiddenSlides:10,containerModifierClass:"swiper-",slideClass:"swiper-slide",slideBlankClass:"swiper-slide-blank",slideActiveClass:"swiper-slide-active",slideVisibleClass:"swiper-slide-visible",slideFullyVisibleClass:"swiper-slide-fully-visible",slideNextClass:"swiper-slide-next",slidePrevClass:"swiper-slide-prev",wrapperClass:"swiper-wrapper",lazyPreloaderClass:"swiper-lazy-preloader",lazyPreloadPrevNext:0,runCallbacksOnInit:!0,_emitClasses:!1};function hL(a,t){return function(r){r===void 0&&(r={});const s=Object.keys(r)[0],o=r[s];if(typeof o!="object"||o===null){ie(t,r);return}if(a[s]===!0&&(a[s]={enabled:!0}),s==="navigation"&&a[s]&&a[s].enabled&&!a[s].prevEl&&!a[s].nextEl&&(a[s].auto=!0),["pagination","scrollbar"].indexOf(s)>=0&&a[s]&&a[s].enabled&&!a[s].el&&(a[s].auto=!0),!(s in a&&"enabled"in o)){ie(t,r);return}typeof a[s]=="object"&&!("enabled"in a[s])&&(a[s].enabled=!0),a[s]||(a[s]={enabled:!1}),ie(t,r)}}const _2={eventsEmitter:nH,update:mH,translate:bH,transition:AH,slide:OH,loop:zH,grabCursor:BH,events:QH,breakpoints:eL,checkOverflow:oL,classes:nL},H2={};class Wt{constructor(){let t,e;for(var r=arguments.length,s=new Array(r),o=0;o<r;o++)s[o]=arguments[o];s.length===1&&s[0].constructor&&Object.prototype.toString.call(s[0]).slice(8,-1)==="Object"?e=s[0]:[t,e]=s,e||(e={}),e=ie({},e),t&&!e.el&&(e.el=t);const c=zt();if(e.el&&typeof e.el=="string"&&c.querySelectorAll(e.el).length>1){const g=[];return c.querySelectorAll(e.el).forEach(w=>{const T=ie({},e,{el:w});g.push(new Wt(T))}),g}const f=this;f.__swiper__=!0,f.support=No(),f.device=zo({userAgent:e.userAgent}),f.browser=$o(),f.eventsListeners={},f.eventsAnyListeners=[],f.modules=[...f.__modules__],e.modules&&Array.isArray(e.modules)&&f.modules.push(...e.modules);const v={};f.modules.forEach(g=>{g({params:e,swiper:f,extendParams:hL(e,v),on:f.on.bind(f),once:f.once.bind(f),off:f.off.bind(f),emit:f.emit.bind(f)})});const M=ie({},U0,v);return f.params=ie({},M,H2,e),f.originalParams=ie({},f.params),f.passedParams=ie({},e),f.params&&f.params.on&&Object.keys(f.params.on).forEach(g=>{f.on(g,f.params.on[g])}),f.params&&f.params.onAny&&f.onAny(f.params.onAny),Object.assign(f,{enabled:f.params.enabled,el:t,classNames:[],slides:[],slidesGrid:[],snapGrid:[],slidesSizesGrid:[],isHorizontal(){return f.params.direction==="horizontal"},isVertical(){return f.params.direction==="vertical"},activeIndex:0,realIndex:0,isBeginning:!0,isEnd:!1,translate:0,previousTranslate:0,progress:0,velocity:0,animating:!1,cssOverflowAdjustment(){return Math.trunc(this.translate/2**23)*2**23},allowSlideNext:f.params.allowSlideNext,allowSlidePrev:f.params.allowSlidePrev,touchEventsData:{isTouched:void 0,isMoved:void 0,allowTouchCallbacks:void 0,touchStartTime:void 0,isScrolling:void 0,currentTranslate:void 0,startTranslate:void 0,allowThresholdMove:void 0,focusableElements:f.params.focusableElements,lastClickTime:0,clickTimeout:void 0,velocities:[],allowMomentumBounce:void 0,startMoving:void 0,pointerId:null,touchId:null},allowClick:!0,allowTouchMove:f.params.allowTouchMove,touches:{startX:0,startY:0,currentX:0,currentY:0,diff:0},imagesToLoad:[],imagesLoaded:0}),f.emit("_swiper"),f.params.init&&f.init(),f}getDirectionLabel(t){return this.isHorizontal()?t:{width:"height","margin-top":"margin-left","margin-bottom ":"margin-right","margin-left":"margin-top","margin-right":"margin-bottom","padding-left":"padding-top","padding-right":"padding-bottom",marginRight:"marginBottom"}[t]}getSlideIndex(t){const{slidesEl:e,params:r}=this,s=Bt(e,`.${r.slideClass}, swiper-slide`),o=s1(s[0]);return s1(t)-o}getSlideIndexByData(t){return this.getSlideIndex(this.slides.find(e=>e.getAttribute("data-swiper-slide-index")*1===t))}getSlideIndexWhenGrid(t){return this.grid&&this.params.grid&&this.params.grid.rows>1&&(this.params.grid.fill==="column"?t=Math.floor(t/this.params.grid.rows):this.params.grid.fill==="row"&&(t=t%Math.ceil(this.slides.length/this.params.grid.rows))),t}recalcSlides(){const t=this,{slidesEl:e,params:r}=t;t.slides=Bt(e,`.${r.slideClass}, swiper-slide`)}enable(){const t=this;t.enabled||(t.enabled=!0,t.params.grabCursor&&t.setGrabCursor(),t.emit("enable"))}disable(){const t=this;t.enabled&&(t.enabled=!1,t.params.grabCursor&&t.unsetGrabCursor(),t.emit("disable"))}setProgress(t,e){const r=this;t=Math.min(Math.max(t,0),1);const s=r.minTranslate(),c=(r.maxTranslate()-s)*t+s;r.translateTo(c,typeof e>"u"?0:e),r.updateActiveIndex(),r.updateSlidesClasses()}emitContainerClasses(){const t=this;if(!t.params._emitClasses||!t.el)return;const e=t.el.className.split(" ").filter(r=>r.indexOf("swiper")===0||r.indexOf(t.params.containerModifierClass)===0);t.emit("_containerClasses",e.join(" "))}getSlideClasses(t){const e=this;return e.destroyed?"":t.className.split(" ").filter(r=>r.indexOf("swiper-slide")===0||r.indexOf(e.params.slideClass)===0).join(" ")}emitSlidesClasses(){const t=this;if(!t.params._emitClasses||!t.el)return;const e=[];t.slides.forEach(r=>{const s=t.getSlideClasses(r);e.push({slideEl:r,classNames:s}),t.emit("_slideClass",r,s)}),t.emit("_slideClasses",e)}slidesPerViewDynamic(t,e){t===void 0&&(t="current"),e===void 0&&(e=!1);const r=this,{params:s,slides:o,slidesGrid:c,slidesSizesGrid:f,size:v,activeIndex:M}=r;let g=1;if(typeof s.slidesPerView=="number")return s.slidesPerView;if(s.centeredSlides){let w=o[M]?Math.ceil(o[M].swiperSlideSize):0,T;for(let b=M+1;b<o.length;b+=1)o[b]&&!T&&(w+=Math.ceil(o[b].swiperSlideSize),g+=1,w>v&&(T=!0));for(let b=M-1;b>=0;b-=1)o[b]&&!T&&(w+=o[b].swiperSlideSize,g+=1,w>v&&(T=!0))}else if(t==="current")for(let w=M+1;w<o.length;w+=1)(e?c[w]+f[w]-c[M]<v:c[w]-c[M]<v)&&(g+=1);else for(let w=M-1;w>=0;w-=1)c[M]-c[w]<v&&(g+=1);return g}update(){const t=this;if(!t||t.destroyed)return;const{snapGrid:e,params:r}=t;r.breakpoints&&t.setBreakpoint(),[...t.el.querySelectorAll('[loading="lazy"]')].forEach(c=>{c.complete&&P1(t,c)}),t.updateSize(),t.updateSlides(),t.updateProgress(),t.updateSlidesClasses();function s(){const c=t.rtlTranslate?t.translate*-1:t.translate,f=Math.min(Math.max(c,t.maxTranslate()),t.minTranslate());t.setTranslate(f),t.updateActiveIndex(),t.updateSlidesClasses()}let o;if(r.freeMode&&r.freeMode.enabled&&!r.cssMode)s(),r.autoHeight&&t.updateAutoHeight();else{if((r.slidesPerView==="auto"||r.slidesPerView>1)&&t.isEnd&&!r.centeredSlides){const c=t.virtual&&r.virtual.enabled?t.virtual.slides:t.slides;o=t.slideTo(c.length-1,0,!1,!0)}else o=t.slideTo(t.activeIndex,0,!1,!0);o||s()}r.watchOverflow&&e!==t.snapGrid&&t.checkOverflow(),t.emit("update")}changeDirection(t,e){e===void 0&&(e=!0);const r=this,s=r.params.direction;return t||(t=s==="horizontal"?"vertical":"horizontal"),t===s||t!=="horizontal"&&t!=="vertical"||(r.el.classList.remove(`${r.params.containerModifierClass}${s}`),r.el.classList.add(`${r.params.containerModifierClass}${t}`),r.emitContainerClasses(),r.params.direction=t,r.slides.forEach(o=>{t==="vertical"?o.style.width="":o.style.height=""}),r.emit("changeDirection"),e&&r.update()),r}changeLanguageDirection(t){const e=this;e.rtl&&t==="rtl"||!e.rtl&&t==="ltr"||(e.rtl=t==="rtl",e.rtlTranslate=e.params.direction==="horizontal"&&e.rtl,e.rtl?(e.el.classList.add(`${e.params.containerModifierClass}rtl`),e.el.dir="rtl"):(e.el.classList.remove(`${e.params.containerModifierClass}rtl`),e.el.dir="ltr"),e.update())}mount(t){const e=this;if(e.mounted)return!0;let r=t||e.params.el;if(typeof r=="string"&&(r=document.querySelector(r)),!r)return!1;r.swiper=e,r.parentNode&&r.parentNode.host&&r.parentNode.host.nodeName===e.params.swiperElementNodeName.toUpperCase()&&(e.isElement=!0);const s=()=>`.${(e.params.wrapperClass||"").trim().split(" ").join(".")}`;let c=r&&r.shadowRoot&&r.shadowRoot.querySelector?r.shadowRoot.querySelector(s()):Bt(r,s())[0];return!c&&e.params.createElements&&(c=re("div",e.params.wrapperClass),r.append(c),Bt(r,`.${e.params.slideClass}`).forEach(f=>{c.append(f)})),Object.assign(e,{el:r,wrapperEl:c,slidesEl:e.isElement&&!r.parentNode.host.slideSlots?r.parentNode.host:c,hostEl:e.isElement?r.parentNode.host:r,mounted:!0,rtl:r.dir.toLowerCase()==="rtl"||Ze(r,"direction")==="rtl",rtlTranslate:e.params.direction==="horizontal"&&(r.dir.toLowerCase()==="rtl"||Ze(r,"direction")==="rtl"),wrongRTL:Ze(c,"display")==="-webkit-box"}),!0}init(t){const e=this;if(e.initialized||e.mount(t)===!1)return e;e.emit("beforeInit"),e.params.breakpoints&&e.setBreakpoint(),e.addClasses(),e.updateSize(),e.updateSlides(),e.params.watchOverflow&&e.checkOverflow(),e.params.grabCursor&&e.enabled&&e.setGrabCursor(),e.params.loop&&e.virtual&&e.params.virtual.enabled?e.slideTo(e.params.initialSlide+e.virtual.slidesBefore,0,e.params.runCallbacksOnInit,!1,!0):e.slideTo(e.params.initialSlide,0,e.params.runCallbacksOnInit,!1,!0),e.params.loop&&e.loopCreate(void 0,!0),e.attachEvents();const s=[...e.el.querySelectorAll('[loading="lazy"]')];return e.isElement&&s.push(...e.hostEl.querySelectorAll('[loading="lazy"]')),s.forEach(o=>{o.complete?P1(e,o):o.addEventListener("load",c=>{P1(e,c.target)})}),X2(e),e.initialized=!0,X2(e),e.emit("init"),e.emit("afterInit"),e}destroy(t,e){t===void 0&&(t=!0),e===void 0&&(e=!0);const r=this,{params:s,el:o,wrapperEl:c,slides:f}=r;return typeof r.params>"u"||r.destroyed||(r.emit("beforeDestroy"),r.initialized=!1,r.detachEvents(),s.loop&&r.loopDestroy(),e&&(r.removeClasses(),o&&typeof o!="string"&&o.removeAttribute("style"),c&&c.removeAttribute("style"),f&&f.length&&f.forEach(v=>{v.classList.remove(s.slideVisibleClass,s.slideFullyVisibleClass,s.slideActiveClass,s.slideNextClass,s.slidePrevClass),v.removeAttribute("style"),v.removeAttribute("data-swiper-slide-index")})),r.emit("destroy"),Object.keys(r.eventsListeners).forEach(v=>{r.off(v)}),t!==!1&&(r.el&&typeof r.el!="string"&&(r.el.swiper=null),Z_(r)),r.destroyed=!0),null}static extendDefaults(t){ie(H2,t)}static get extendedDefaults(){return H2}static get defaults(){return U0}static installModule(t){Wt.prototype.__modules__||(Wt.prototype.__modules__=[]);const e=Wt.prototype.__modules__;typeof t=="function"&&e.indexOf(t)<0&&e.push(t)}static use(t){return Array.isArray(t)?(t.forEach(e=>Wt.installModule(e)),Wt):(Wt.installModule(t),Wt)}}Object.keys(_2).forEach(a=>{Object.keys(_2[a]).forEach(t=>{Wt.prototype[t]=_2[a][t]})});Wt.use([iH,rH]);function lL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;e({virtual:{enabled:!1,slides:[],cache:!0,renderSlide:null,renderExternal:null,renderExternalUpdate:!0,addSlidesBefore:0,addSlidesAfter:0}});let o;const c=zt();t.virtual={cache:{},from:void 0,to:void 0,slides:[],offset:0,slidesGrid:[]};const f=c.createElement("div");function v(p,u){const A=t.params.virtual;if(A.cache&&t.virtual.cache[u])return t.virtual.cache[u];let S;return A.renderSlide?(S=A.renderSlide.call(t,p,u),typeof S=="string"&&($e(f,S),S=f.children[0])):t.isElement?S=re("swiper-slide"):S=re("div",t.params.slideClass),S.setAttribute("data-swiper-slide-index",u),A.renderSlide||$e(S,p),A.cache&&(t.virtual.cache[u]=S),S}function M(p,u,A){const{slidesPerView:S,slidesPerGroup:C,centeredSlides:E,loop:L,initialSlide:O}=t.params;if(u&&!L&&O>0)return;const{addSlidesBefore:q,addSlidesAfter:h}=t.params.virtual,{from:W,to:k,slides:z,slidesGrid:G,offset:j}=t.virtual;t.params.cssMode||t.updateActiveIndex();const I=typeof A>"u"?t.activeIndex||0:A;let X;t.rtlTranslate?X="right":X=t.isHorizontal()?"left":"top";let J,Q;E?(J=Math.floor(S/2)+C+h,Q=Math.floor(S/2)+C+q):(J=S+(C-1)+h,Q=(L?S:C)+q);let N=I-Q,B=I+J;L||(N=Math.max(N,0),B=Math.min(B,z.length-1));let at=(t.slidesGrid[N]||0)-(t.slidesGrid[0]||0);L&&I>=Q?(N-=Q,E||(at+=t.slidesGrid[0])):L&&I<Q&&(N=-Q,E&&(at+=t.slidesGrid[0])),Object.assign(t.virtual,{from:N,to:B,offset:at,slidesGrid:t.slidesGrid,slidesBefore:Q,slidesAfter:J});function pt(){t.updateSlides(),t.updateProgress(),t.updateSlidesClasses(),s("virtualUpdate")}if(W===N&&k===B&&!p){t.slidesGrid!==G&&at!==j&&t.slides.forEach(K=>{K.style[X]=`${at-Math.abs(t.cssOverflowAdjustment())}px`}),t.updateProgress(),s("virtualUpdate");return}if(t.params.virtual.renderExternal){t.params.virtual.renderExternal.call(t,{offset:at,from:N,to:B,slides:function(){const rt=[];for(let mt=N;mt<=B;mt+=1)rt.push(z[mt]);return rt}()}),t.params.virtual.renderExternalUpdate?pt():s("virtualUpdate");return}const St=[],At=[],Ot=K=>{let rt=K;return K<0?rt=z.length+K:rt>=z.length&&(rt=rt-z.length),rt};if(p)t.slides.filter(K=>K.matches(`.${t.params.slideClass}, swiper-slide`)).forEach(K=>{K.remove()});else for(let K=W;K<=k;K+=1)if(K<N||K>B){const rt=Ot(K);t.slides.filter(mt=>mt.matches(`.${t.params.slideClass}[data-swiper-slide-index="${rt}"], swiper-slide[data-swiper-slide-index="${rt}"]`)).forEach(mt=>{mt.remove()})}const jt=L?-z.length:0,tt=L?z.length*2:z.length;for(let K=jt;K<tt;K+=1)if(K>=N&&K<=B){const rt=Ot(K);typeof k>"u"||p?At.push(rt):(K>k&&At.push(rt),K<W&&St.push(rt))}if(At.forEach(K=>{t.slidesEl.append(v(z[K],K))}),L)for(let K=St.length-1;K>=0;K-=1){const rt=St[K];t.slidesEl.prepend(v(z[rt],rt))}else St.sort((K,rt)=>rt-K),St.forEach(K=>{t.slidesEl.prepend(v(z[K],K))});Bt(t.slidesEl,".swiper-slide, swiper-slide").forEach(K=>{K.style[X]=`${at-Math.abs(t.cssOverflowAdjustment())}px`}),pt()}function g(p){if(typeof p=="object"&&"length"in p)for(let u=0;u<p.length;u+=1)p[u]&&t.virtual.slides.push(p[u]);else t.virtual.slides.push(p);M(!0)}function w(p){const u=t.activeIndex;let A=u+1,S=1;if(Array.isArray(p)){for(let C=0;C<p.length;C+=1)p[C]&&t.virtual.slides.unshift(p[C]);A=u+p.length,S=p.length}else t.virtual.slides.unshift(p);if(t.params.virtual.cache){const C=t.virtual.cache,E={};Object.keys(C).forEach(L=>{const O=C[L],q=O.getAttribute("data-swiper-slide-index");q&&O.setAttribute("data-swiper-slide-index",parseInt(q,10)+S),E[parseInt(L,10)+S]=O}),t.virtual.cache=E}M(!0),t.slideTo(A,0)}function T(p){if(typeof p>"u"||p===null)return;let u=t.activeIndex;if(Array.isArray(p))for(let A=p.length-1;A>=0;A-=1)t.params.virtual.cache&&(delete t.virtual.cache[p[A]],Object.keys(t.virtual.cache).forEach(S=>{S>p&&(t.virtual.cache[S-1]=t.virtual.cache[S],t.virtual.cache[S-1].setAttribute("data-swiper-slide-index",S-1),delete t.virtual.cache[S])})),t.virtual.slides.splice(p[A],1),p[A]<u&&(u-=1),u=Math.max(u,0);else t.params.virtual.cache&&(delete t.virtual.cache[p],Object.keys(t.virtual.cache).forEach(A=>{A>p&&(t.virtual.cache[A-1]=t.virtual.cache[A],t.virtual.cache[A-1].setAttribute("data-swiper-slide-index",A-1),delete t.virtual.cache[A])})),t.virtual.slides.splice(p,1),p<u&&(u-=1),u=Math.max(u,0);M(!0),t.slideTo(u,0)}function b(){t.virtual.slides=[],t.params.virtual.cache&&(t.virtual.cache={}),M(!0),t.slideTo(0,0)}r("beforeInit",()=>{if(!t.params.virtual.enabled)return;let p;if(typeof t.passedParams.virtual.slides>"u"){const u=[...t.slidesEl.children].filter(A=>A.matches(`.${t.params.slideClass}, swiper-slide`));u&&u.length&&(t.virtual.slides=[...u],p=!0,u.forEach((A,S)=>{A.setAttribute("data-swiper-slide-index",S),t.virtual.cache[S]=A,A.remove()}))}p||(t.virtual.slides=t.params.virtual.slides),t.classNames.push(`${t.params.containerModifierClass}virtual`),t.params.watchSlidesProgress=!0,t.originalParams.watchSlidesProgress=!0,M(!1,!0)}),r("setTranslate",()=>{t.params.virtual.enabled&&(t.params.cssMode&&!t._immediateVirtual?(clearTimeout(o),o=setTimeout(()=>{M()},100)):M())}),r("init update resize",()=>{t.params.virtual.enabled&&t.params.cssMode&&a1(t.wrapperEl,"--swiper-virtual-size",`${t.virtualSize}px`)}),Object.assign(t.virtual,{appendSlide:g,prependSlide:w,removeSlide:T,removeAllSlides:b,update:M})}function dL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o=zt(),c=_t();t.keyboard={enabled:!1},e({keyboard:{enabled:!1,onlyInViewport:!0,pageUpDown:!0}});function f(g){if(!t.enabled)return;const{rtlTranslate:w}=t;let T=g;T.originalEvent&&(T=T.originalEvent);const b=T.keyCode||T.charCode,p=t.params.keyboard.pageUpDown,u=p&&b===33,A=p&&b===34,S=b===37,C=b===39,E=b===38,L=b===40;if(!t.allowSlideNext&&(t.isHorizontal()&&C||t.isVertical()&&L||A)||!t.allowSlidePrev&&(t.isHorizontal()&&S||t.isVertical()&&E||u))return!1;if(!(T.shiftKey||T.altKey||T.ctrlKey||T.metaKey)&&!(o.activeElement&&(o.activeElement.isContentEditable||o.activeElement.nodeName&&(o.activeElement.nodeName.toLowerCase()==="input"||o.activeElement.nodeName.toLowerCase()==="textarea")))){if(t.params.keyboard.onlyInViewport&&(u||A||S||C||E||L)){let O=!1;if(la(t.el,`.${t.params.slideClass}, swiper-slide`).length>0&&la(t.el,`.${t.params.slideActiveClass}`).length===0)return;const q=t.el,h=q.clientWidth,W=q.clientHeight,k=c.innerWidth,z=c.innerHeight,G=N1(q);w&&(G.left-=q.scrollLeft);const j=[[G.left,G.top],[G.left+h,G.top],[G.left,G.top+W],[G.left+h,G.top+W]];for(let I=0;I<j.length;I+=1){const X=j[I];if(X[0]>=0&&X[0]<=k&&X[1]>=0&&X[1]<=z){if(X[0]===0&&X[1]===0)continue;O=!0}}if(!O)return}t.isHorizontal()?((u||A||S||C)&&(T.preventDefault?T.preventDefault():T.returnValue=!1),((A||C)&&!w||(u||S)&&w)&&t.slideNext(),((u||S)&&!w||(A||C)&&w)&&t.slidePrev()):((u||A||E||L)&&(T.preventDefault?T.preventDefault():T.returnValue=!1),(A||L)&&t.slideNext(),(u||E)&&t.slidePrev()),s("keyPress",b)}}function v(){t.keyboard.enabled||(o.addEventListener("keydown",f),t.keyboard.enabled=!0)}function M(){t.keyboard.enabled&&(o.removeEventListener("keydown",f),t.keyboard.enabled=!1)}r("init",()=>{t.params.keyboard.enabled&&v()}),r("destroy",()=>{t.keyboard.enabled&&M()}),Object.assign(t.keyboard,{enable:v,disable:M})}function cL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o=_t();e({mousewheel:{enabled:!1,releaseOnEdges:!1,invert:!1,forceToAxis:!1,sensitivity:1,eventsTarget:"container",thresholdDelta:null,thresholdTime:null,noMousewheelClass:"swiper-no-mousewheel"}}),t.mousewheel={enabled:!1};let c,f=fe(),v;const M=[];function g(E){let h=0,W=0,k=0,z=0;return"detail"in E&&(W=E.detail),"wheelDelta"in E&&(W=-E.wheelDelta/120),"wheelDeltaY"in E&&(W=-E.wheelDeltaY/120),"wheelDeltaX"in E&&(h=-E.wheelDeltaX/120),"axis"in E&&E.axis===E.HORIZONTAL_AXIS&&(h=W,W=0),k=h*10,z=W*10,"deltaY"in E&&(z=E.deltaY),"deltaX"in E&&(k=E.deltaX),E.shiftKey&&!k&&(k=z,z=0),(k||z)&&E.deltaMode&&(E.deltaMode===1?(k*=40,z*=40):(k*=800,z*=800)),k&&!h&&(h=k<1?-1:1),z&&!W&&(W=z<1?-1:1),{spinX:h,spinY:W,pixelX:k,pixelY:z}}function w(){t.enabled&&(t.mouseEntered=!0)}function T(){t.enabled&&(t.mouseEntered=!1)}function b(E){return t.params.mousewheel.thresholdDelta&&E.delta<t.params.mousewheel.thresholdDelta||t.params.mousewheel.thresholdTime&&fe()-f<t.params.mousewheel.thresholdTime?!1:E.delta>=6&&fe()-f<60?!0:(E.direction<0?(!t.isEnd||t.params.loop)&&!t.animating&&(t.slideNext(),s("scroll",E.raw)):(!t.isBeginning||t.params.loop)&&!t.animating&&(t.slidePrev(),s("scroll",E.raw)),f=new o.Date().getTime(),!1)}function p(E){const L=t.params.mousewheel;if(E.direction<0){if(t.isEnd&&!t.params.loop&&L.releaseOnEdges)return!0}else if(t.isBeginning&&!t.params.loop&&L.releaseOnEdges)return!0;return!1}function u(E){let L=E,O=!0;if(!t.enabled||E.target.closest(`.${t.params.mousewheel.noMousewheelClass}`))return;const q=t.params.mousewheel;t.params.cssMode&&L.preventDefault();let h=t.el;t.params.mousewheel.eventsTarget!=="container"&&(h=document.querySelector(t.params.mousewheel.eventsTarget));const W=h&&h.contains(L.target);if(!t.mouseEntered&&!W&&!q.releaseOnEdges)return!0;L.originalEvent&&(L=L.originalEvent);let k=0;const z=t.rtlTranslate?-1:1,G=g(L);if(q.forceToAxis)if(t.isHorizontal())if(Math.abs(G.pixelX)>Math.abs(G.pixelY))k=-G.pixelX*z;else return!0;else if(Math.abs(G.pixelY)>Math.abs(G.pixelX))k=-G.pixelY;else return!0;else k=Math.abs(G.pixelX)>Math.abs(G.pixelY)?-G.pixelX*z:-G.pixelY;if(k===0)return!0;q.invert&&(k=-k);let j=t.getTranslate()+k*q.sensitivity;if(j>=t.minTranslate()&&(j=t.minTranslate()),j<=t.maxTranslate()&&(j=t.maxTranslate()),O=t.params.loop?!0:!(j===t.minTranslate()||j===t.maxTranslate()),O&&t.params.nested&&L.stopPropagation(),!t.params.freeMode||!t.params.freeMode.enabled){const I={time:fe(),delta:Math.abs(k),direction:Math.sign(k),raw:E};M.length>=2&&M.shift();const X=M.length?M[M.length-1]:void 0;if(M.push(I),X?(I.direction!==X.direction||I.delta>X.delta||I.time>X.time+150)&&b(I):b(I),p(I))return!0}else{const I={time:fe(),delta:Math.abs(k),direction:Math.sign(k)},X=v&&I.time<v.time+500&&I.delta<=v.delta&&I.direction===v.direction;if(!X){v=void 0;let J=t.getTranslate()+k*q.sensitivity;const Q=t.isBeginning,N=t.isEnd;if(J>=t.minTranslate()&&(J=t.minTranslate()),J<=t.maxTranslate()&&(J=t.maxTranslate()),t.setTransition(0),t.setTranslate(J),t.updateProgress(),t.updateActiveIndex(),t.updateSlidesClasses(),(!Q&&t.isBeginning||!N&&t.isEnd)&&t.updateSlidesClasses(),t.params.loop&&t.loopFix({direction:I.direction<0?"next":"prev",byMousewheel:!0}),t.params.freeMode.sticky){clearTimeout(c),c=void 0,M.length>=15&&M.shift();const B=M.length?M[M.length-1]:void 0,at=M[0];if(M.push(I),B&&(I.delta>B.delta||I.direction!==B.direction))M.splice(0);else if(M.length>=15&&I.time-at.time<500&&at.delta-I.delta>=1&&I.delta<=6){const pt=k>0?.8:.2;v=I,M.splice(0),c=La(()=>{t.destroyed||!t.params||t.slideToClosest(t.params.speed,!0,void 0,pt)},0)}c||(c=La(()=>{if(t.destroyed||!t.params)return;const pt=.5;v=I,M.splice(0),t.slideToClosest(t.params.speed,!0,void 0,pt)},500))}if(X||s("scroll",L),t.params.autoplay&&t.params.autoplay.disableOnInteraction&&t.autoplay.stop(),q.releaseOnEdges&&(J===t.minTranslate()||J===t.maxTranslate()))return!0}}return L.preventDefault?L.preventDefault():L.returnValue=!1,!1}function A(E){let L=t.el;t.params.mousewheel.eventsTarget!=="container"&&(L=document.querySelector(t.params.mousewheel.eventsTarget)),L[E]("mouseenter",w),L[E]("mouseleave",T),L[E]("wheel",u)}function S(){return t.params.cssMode?(t.wrapperEl.removeEventListener("wheel",u),!0):t.mousewheel.enabled?!1:(A("addEventListener"),t.mousewheel.enabled=!0,!0)}function C(){return t.params.cssMode?(t.wrapperEl.addEventListener(event,u),!0):t.mousewheel.enabled?(A("removeEventListener"),t.mousewheel.enabled=!1,!0):!1}r("init",()=>{!t.params.mousewheel.enabled&&t.params.cssMode&&C(),t.params.mousewheel.enabled&&S()}),r("destroy",()=>{t.params.cssMode&&S(),t.mousewheel.enabled&&C()}),Object.assign(t.mousewheel,{enable:S,disable:C})}function ri(a,t,e,r){return a.params.createElements&&Object.keys(r).forEach(s=>{if(!e[s]&&e.auto===!0){let o=Bt(a.el,`.${r[s]}`)[0];o||(o=re("div",r[s]),o.className=r[s],a.el.append(o)),e[s]=o,t[s]=o}}),e}function pL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;e({navigation:{nextEl:null,prevEl:null,hideOnClick:!1,disabledClass:"swiper-button-disabled",hiddenClass:"swiper-button-hidden",lockClass:"swiper-button-lock",navigationDisabledClass:"swiper-navigation-disabled"}}),t.navigation={nextEl:null,prevEl:null};function o(p){let u;return p&&typeof p=="string"&&t.isElement&&(u=t.el.querySelector(p)||t.hostEl.querySelector(p),u)?u:(p&&(typeof p=="string"&&(u=[...document.querySelectorAll(p)]),t.params.uniqueNavElements&&typeof p=="string"&&u&&u.length>1&&t.el.querySelectorAll(p).length===1?u=t.el.querySelector(p):u&&u.length===1&&(u=u[0])),p&&!u?p:u)}function c(p,u){const A=t.params.navigation;p=xt(p),p.forEach(S=>{S&&(S.classList[u?"add":"remove"](...A.disabledClass.split(" ")),S.tagName==="BUTTON"&&(S.disabled=u),t.params.watchOverflow&&t.enabled&&S.classList[t.isLocked?"add":"remove"](A.lockClass))})}function f(){const{nextEl:p,prevEl:u}=t.navigation;if(t.params.loop){c(u,!1),c(p,!1);return}c(u,t.isBeginning&&!t.params.rewind),c(p,t.isEnd&&!t.params.rewind)}function v(p){p.preventDefault(),!(t.isBeginning&&!t.params.loop&&!t.params.rewind)&&(t.slidePrev(),s("navigationPrev"))}function M(p){p.preventDefault(),!(t.isEnd&&!t.params.loop&&!t.params.rewind)&&(t.slideNext(),s("navigationNext"))}function g(){const p=t.params.navigation;if(t.params.navigation=ri(t,t.originalParams.navigation,t.params.navigation,{nextEl:"swiper-button-next",prevEl:"swiper-button-prev"}),!(p.nextEl||p.prevEl))return;let u=o(p.nextEl),A=o(p.prevEl);Object.assign(t.navigation,{nextEl:u,prevEl:A}),u=xt(u),A=xt(A);const S=(C,E)=>{C&&C.addEventListener("click",E==="next"?M:v),!t.enabled&&C&&C.classList.add(...p.lockClass.split(" "))};u.forEach(C=>S(C,"next")),A.forEach(C=>S(C,"prev"))}function w(){let{nextEl:p,prevEl:u}=t.navigation;p=xt(p),u=xt(u);const A=(S,C)=>{S.removeEventListener("click",C==="next"?M:v),S.classList.remove(...t.params.navigation.disabledClass.split(" "))};p.forEach(S=>A(S,"next")),u.forEach(S=>A(S,"prev"))}r("init",()=>{t.params.navigation.enabled===!1?b():(g(),f())}),r("toEdge fromEdge lock unlock",()=>{f()}),r("destroy",()=>{w()}),r("enable disable",()=>{let{nextEl:p,prevEl:u}=t.navigation;if(p=xt(p),u=xt(u),t.enabled){f();return}[...p,...u].filter(A=>!!A).forEach(A=>A.classList.add(t.params.navigation.lockClass))}),r("click",(p,u)=>{let{nextEl:A,prevEl:S}=t.navigation;A=xt(A),S=xt(S);const C=u.target;let E=S.includes(C)||A.includes(C);if(t.isElement&&!E){const L=u.path||u.composedPath&&u.composedPath();L&&(E=L.find(O=>A.includes(O)||S.includes(O)))}if(t.params.navigation.hideOnClick&&!E){if(t.pagination&&t.params.pagination&&t.params.pagination.clickable&&(t.pagination.el===C||t.pagination.el.contains(C)))return;let L;A.length?L=A[0].classList.contains(t.params.navigation.hiddenClass):S.length&&(L=S[0].classList.contains(t.params.navigation.hiddenClass)),s(L===!0?"navigationShow":"navigationHide"),[...A,...S].filter(O=>!!O).forEach(O=>O.classList.toggle(t.params.navigation.hiddenClass))}});const T=()=>{t.el.classList.remove(...t.params.navigation.navigationDisabledClass.split(" ")),g(),f()},b=()=>{t.el.classList.add(...t.params.navigation.navigationDisabledClass.split(" ")),w()};Object.assign(t.navigation,{enable:T,disable:b,update:f,init:g,destroy:w})}function Ie(a){return a===void 0&&(a=""),`.${a.trim().replace(/([\.:!+\/()[\]])/g,"\\$1").replace(/ /g,".")}`}function uL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o="swiper-pagination";e({pagination:{el:null,bulletElement:"span",clickable:!1,hideOnClick:!1,renderBullet:null,renderProgressbar:null,renderFraction:null,renderCustom:null,progressbarOpposite:!1,type:"bullets",dynamicBullets:!1,dynamicMainBullets:1,formatFractionCurrent:C=>C,formatFractionTotal:C=>C,bulletClass:`${o}-bullet`,bulletActiveClass:`${o}-bullet-active`,modifierClass:`${o}-`,currentClass:`${o}-current`,totalClass:`${o}-total`,hiddenClass:`${o}-hidden`,progressbarFillClass:`${o}-progressbar-fill`,progressbarOppositeClass:`${o}-progressbar-opposite`,clickableClass:`${o}-clickable`,lockClass:`${o}-lock`,horizontalClass:`${o}-horizontal`,verticalClass:`${o}-vertical`,paginationDisabledClass:`${o}-disabled`}}),t.pagination={el:null,bullets:[]};let c,f=0;function v(){return!t.params.pagination.el||!t.pagination.el||Array.isArray(t.pagination.el)&&t.pagination.el.length===0}function M(C,E){const{bulletActiveClass:L}=t.params.pagination;C&&(C=C[`${E==="prev"?"previous":"next"}ElementSibling`],C&&(C.classList.add(`${L}-${E}`),C=C[`${E==="prev"?"previous":"next"}ElementSibling`],C&&C.classList.add(`${L}-${E}-${E}`)))}function g(C,E,L){if(C=C%L,E=E%L,E===C+1)return"next";if(E===C-1)return"previous"}function w(C){const E=C.target.closest(Ie(t.params.pagination.bulletClass));if(!E)return;C.preventDefault();const L=s1(E)*t.params.slidesPerGroup;if(t.params.loop){if(t.realIndex===L)return;const O=g(t.realIndex,L,t.slides.length);O==="next"?t.slideNext():O==="previous"?t.slidePrev():t.slideToLoop(L)}else t.slideTo(L)}function T(){const C=t.rtl,E=t.params.pagination;if(v())return;let L=t.pagination.el;L=xt(L);let O,q;const h=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:t.slides.length,W=t.params.loop?Math.ceil(h/t.params.slidesPerGroup):t.snapGrid.length;if(t.params.loop?(q=t.previousRealIndex||0,O=t.params.slidesPerGroup>1?Math.floor(t.realIndex/t.params.slidesPerGroup):t.realIndex):typeof t.snapIndex<"u"?(O=t.snapIndex,q=t.previousSnapIndex):(q=t.previousIndex||0,O=t.activeIndex||0),E.type==="bullets"&&t.pagination.bullets&&t.pagination.bullets.length>0){const k=t.pagination.bullets;let z,G,j;if(E.dynamicBullets&&(c=Z2(k[0],t.isHorizontal()?"width":"height"),L.forEach(I=>{I.style[t.isHorizontal()?"width":"height"]=`${c*(E.dynamicMainBullets+4)}px`}),E.dynamicMainBullets>1&&q!==void 0&&(f+=O-(q||0),f>E.dynamicMainBullets-1?f=E.dynamicMainBullets-1:f<0&&(f=0)),z=Math.max(O-f,0),G=z+(Math.min(k.length,E.dynamicMainBullets)-1),j=(G+z)/2),k.forEach(I=>{const X=[...["","-next","-next-next","-prev","-prev-prev","-main"].map(J=>`${E.bulletActiveClass}${J}`)].map(J=>typeof J=="string"&&J.includes(" ")?J.split(" "):J).flat();I.classList.remove(...X)}),L.length>1)k.forEach(I=>{const X=s1(I);X===O?I.classList.add(...E.bulletActiveClass.split(" ")):t.isElement&&I.setAttribute("part","bullet"),E.dynamicBullets&&(X>=z&&X<=G&&I.classList.add(...`${E.bulletActiveClass}-main`.split(" ")),X===z&&M(I,"prev"),X===G&&M(I,"next"))});else{const I=k[O];if(I&&I.classList.add(...E.bulletActiveClass.split(" ")),t.isElement&&k.forEach((X,J)=>{X.setAttribute("part",J===O?"bullet-active":"bullet")}),E.dynamicBullets){const X=k[z],J=k[G];for(let Q=z;Q<=G;Q+=1)k[Q]&&k[Q].classList.add(...`${E.bulletActiveClass}-main`.split(" "));M(X,"prev"),M(J,"next")}}if(E.dynamicBullets){const I=Math.min(k.length,E.dynamicMainBullets+4),X=(c*I-c)/2-j*c,J=C?"right":"left";k.forEach(Q=>{Q.style[t.isHorizontal()?J:"top"]=`${X}px`})}}L.forEach((k,z)=>{if(E.type==="fraction"&&(k.querySelectorAll(Ie(E.currentClass)).forEach(G=>{G.textContent=E.formatFractionCurrent(O+1)}),k.querySelectorAll(Ie(E.totalClass)).forEach(G=>{G.textContent=E.formatFractionTotal(W)})),E.type==="progressbar"){let G;E.progressbarOpposite?G=t.isHorizontal()?"vertical":"horizontal":G=t.isHorizontal()?"horizontal":"vertical";const j=(O+1)/W;let I=1,X=1;G==="horizontal"?I=j:X=j,k.querySelectorAll(Ie(E.progressbarFillClass)).forEach(J=>{J.style.transform=`translate3d(0,0,0) scaleX(${I}) scaleY(${X})`,J.style.transitionDuration=`${t.params.speed}ms`})}E.type==="custom"&&E.renderCustom?($e(k,E.renderCustom(t,O+1,W)),z===0&&s("paginationRender",k)):(z===0&&s("paginationRender",k),s("paginationUpdate",k)),t.params.watchOverflow&&t.enabled&&k.classList[t.isLocked?"add":"remove"](E.lockClass)})}function b(){const C=t.params.pagination;if(v())return;const E=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:t.grid&&t.params.grid.rows>1?t.slides.length/Math.ceil(t.params.grid.rows):t.slides.length;let L=t.pagination.el;L=xt(L);let O="";if(C.type==="bullets"){let q=t.params.loop?Math.ceil(E/t.params.slidesPerGroup):t.snapGrid.length;t.params.freeMode&&t.params.freeMode.enabled&&q>E&&(q=E);for(let h=0;h<q;h+=1)C.renderBullet?O+=C.renderBullet.call(t,h,C.bulletClass):O+=`<${C.bulletElement} ${t.isElement?'part="bullet"':""} class="${C.bulletClass}"></${C.bulletElement}>`}C.type==="fraction"&&(C.renderFraction?O=C.renderFraction.call(t,C.currentClass,C.totalClass):O=`<span class="${C.currentClass}"></span> / <span class="${C.totalClass}"></span>`),C.type==="progressbar"&&(C.renderProgressbar?O=C.renderProgressbar.call(t,C.progressbarFillClass):O=`<span class="${C.progressbarFillClass}"></span>`),t.pagination.bullets=[],L.forEach(q=>{C.type!=="custom"&&$e(q,O||""),C.type==="bullets"&&t.pagination.bullets.push(...q.querySelectorAll(Ie(C.bulletClass)))}),C.type!=="custom"&&s("paginationRender",L[0])}function p(){t.params.pagination=ri(t,t.originalParams.pagination,t.params.pagination,{el:"swiper-pagination"});const C=t.params.pagination;if(!C.el)return;let E;typeof C.el=="string"&&t.isElement&&(E=t.el.querySelector(C.el)),!E&&typeof C.el=="string"&&(E=[...document.querySelectorAll(C.el)]),E||(E=C.el),!(!E||E.length===0)&&(t.params.uniqueNavElements&&typeof C.el=="string"&&Array.isArray(E)&&E.length>1&&(E=[...t.el.querySelectorAll(C.el)],E.length>1&&(E=E.find(L=>la(L,".swiper")[0]===t.el))),Array.isArray(E)&&E.length===1&&(E=E[0]),Object.assign(t.pagination,{el:E}),E=xt(E),E.forEach(L=>{C.type==="bullets"&&C.clickable&&L.classList.add(...(C.clickableClass||"").split(" ")),L.classList.add(C.modifierClass+C.type),L.classList.add(t.isHorizontal()?C.horizontalClass:C.verticalClass),C.type==="bullets"&&C.dynamicBullets&&(L.classList.add(`${C.modifierClass}${C.type}-dynamic`),f=0,C.dynamicMainBullets<1&&(C.dynamicMainBullets=1)),C.type==="progressbar"&&C.progressbarOpposite&&L.classList.add(C.progressbarOppositeClass),C.clickable&&L.addEventListener("click",w),t.enabled||L.classList.add(C.lockClass)}))}function u(){const C=t.params.pagination;if(v())return;let E=t.pagination.el;E&&(E=xt(E),E.forEach(L=>{L.classList.remove(C.hiddenClass),L.classList.remove(C.modifierClass+C.type),L.classList.remove(t.isHorizontal()?C.horizontalClass:C.verticalClass),C.clickable&&(L.classList.remove(...(C.clickableClass||"").split(" ")),L.removeEventListener("click",w))})),t.pagination.bullets&&t.pagination.bullets.forEach(L=>L.classList.remove(...C.bulletActiveClass.split(" ")))}r("changeDirection",()=>{if(!t.pagination||!t.pagination.el)return;const C=t.params.pagination;let{el:E}=t.pagination;E=xt(E),E.forEach(L=>{L.classList.remove(C.horizontalClass,C.verticalClass),L.classList.add(t.isHorizontal()?C.horizontalClass:C.verticalClass)})}),r("init",()=>{t.params.pagination.enabled===!1?S():(p(),b(),T())}),r("activeIndexChange",()=>{typeof t.snapIndex>"u"&&T()}),r("snapIndexChange",()=>{T()}),r("snapGridLengthChange",()=>{b(),T()}),r("destroy",()=>{u()}),r("enable disable",()=>{let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList[t.enabled?"remove":"add"](t.params.pagination.lockClass)))}),r("lock unlock",()=>{T()}),r("click",(C,E)=>{const L=E.target,O=xt(t.pagination.el);if(t.params.pagination.el&&t.params.pagination.hideOnClick&&O&&O.length>0&&!L.classList.contains(t.params.pagination.bulletClass)){if(t.navigation&&(t.navigation.nextEl&&L===t.navigation.nextEl||t.navigation.prevEl&&L===t.navigation.prevEl))return;const q=O[0].classList.contains(t.params.pagination.hiddenClass);s(q===!0?"paginationShow":"paginationHide"),O.forEach(h=>h.classList.toggle(t.params.pagination.hiddenClass))}});const A=()=>{t.el.classList.remove(t.params.pagination.paginationDisabledClass);let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList.remove(t.params.pagination.paginationDisabledClass))),p(),b(),T()},S=()=>{t.el.classList.add(t.params.pagination.paginationDisabledClass);let{el:C}=t.pagination;C&&(C=xt(C),C.forEach(E=>E.classList.add(t.params.pagination.paginationDisabledClass))),u()};Object.assign(t.pagination,{enable:A,disable:S,render:b,update:T,init:p,destroy:u})}function fL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o=zt();let c=!1,f=null,v=null,M,g,w,T;e({scrollbar:{el:null,dragSize:"auto",hide:!1,draggable:!1,snapOnRelease:!0,lockClass:"swiper-scrollbar-lock",dragClass:"swiper-scrollbar-drag",scrollbarDisabledClass:"swiper-scrollbar-disabled",horizontalClass:"swiper-scrollbar-horizontal",verticalClass:"swiper-scrollbar-vertical"}}),t.scrollbar={el:null,dragEl:null};function b(){if(!t.params.scrollbar.el||!t.scrollbar.el)return;const{scrollbar:j,rtlTranslate:I}=t,{dragEl:X,el:J}=j,Q=t.params.scrollbar,N=t.params.loop?t.progressLoop:t.progress;let B=g,at=(w-g)*N;I?(at=-at,at>0?(B=g-at,at=0):-at+g>w&&(B=w+at)):at<0?(B=g+at,at=0):at+g>w&&(B=w-at),t.isHorizontal()?(X.style.transform=`translate3d(${at}px, 0, 0)`,X.style.width=`${B}px`):(X.style.transform=`translate3d(0px, ${at}px, 0)`,X.style.height=`${B}px`),Q.hide&&(clearTimeout(f),J.style.opacity=1,f=setTimeout(()=>{J.style.opacity=0,J.style.transitionDuration="400ms"},1e3))}function p(j){!t.params.scrollbar.el||!t.scrollbar.el||(t.scrollbar.dragEl.style.transitionDuration=`${j}ms`)}function u(){if(!t.params.scrollbar.el||!t.scrollbar.el)return;const{scrollbar:j}=t,{dragEl:I,el:X}=j;I.style.width="",I.style.height="",w=t.isHorizontal()?X.offsetWidth:X.offsetHeight,T=t.size/(t.virtualSize+t.params.slidesOffsetBefore-(t.params.centeredSlides?t.snapGrid[0]:0)),t.params.scrollbar.dragSize==="auto"?g=w*T:g=parseInt(t.params.scrollbar.dragSize,10),t.isHorizontal()?I.style.width=`${g}px`:I.style.height=`${g}px`,T>=1?X.style.display="none":X.style.display="",t.params.scrollbar.hide&&(X.style.opacity=0),t.params.watchOverflow&&t.enabled&&j.el.classList[t.isLocked?"add":"remove"](t.params.scrollbar.lockClass)}function A(j){return t.isHorizontal()?j.clientX:j.clientY}function S(j){const{scrollbar:I,rtlTranslate:X}=t,{el:J}=I;let Q;Q=(A(j)-N1(J)[t.isHorizontal()?"left":"top"]-(M!==null?M:g/2))/(w-g),Q=Math.max(Math.min(Q,1),0),X&&(Q=1-Q);const N=t.minTranslate()+(t.maxTranslate()-t.minTranslate())*Q;t.updateProgress(N),t.setTranslate(N),t.updateActiveIndex(),t.updateSlidesClasses()}function C(j){const I=t.params.scrollbar,{scrollbar:X,wrapperEl:J}=t,{el:Q,dragEl:N}=X;c=!0,M=j.target===N?A(j)-j.target.getBoundingClientRect()[t.isHorizontal()?"left":"top"]:null,j.preventDefault(),j.stopPropagation(),J.style.transitionDuration="100ms",N.style.transitionDuration="100ms",S(j),clearTimeout(v),Q.style.transitionDuration="0ms",I.hide&&(Q.style.opacity=1),t.params.cssMode&&(t.wrapperEl.style["scroll-snap-type"]="none"),s("scrollbarDragStart",j)}function E(j){const{scrollbar:I,wrapperEl:X}=t,{el:J,dragEl:Q}=I;c&&(j.preventDefault&&j.cancelable?j.preventDefault():j.returnValue=!1,S(j),X.style.transitionDuration="0ms",J.style.transitionDuration="0ms",Q.style.transitionDuration="0ms",s("scrollbarDragMove",j))}function L(j){const I=t.params.scrollbar,{scrollbar:X,wrapperEl:J}=t,{el:Q}=X;c&&(c=!1,t.params.cssMode&&(t.wrapperEl.style["scroll-snap-type"]="",J.style.transitionDuration=""),I.hide&&(clearTimeout(v),v=La(()=>{Q.style.opacity=0,Q.style.transitionDuration="400ms"},1e3)),s("scrollbarDragEnd",j),I.snapOnRelease&&t.slideToClosest())}function O(j){const{scrollbar:I,params:X}=t,J=I.el;if(!J)return;const Q=J,N=X.passiveListeners?{passive:!1,capture:!1}:!1,B=X.passiveListeners?{passive:!0,capture:!1}:!1;if(!Q)return;const at=j==="on"?"addEventListener":"removeEventListener";Q[at]("pointerdown",C,N),o[at]("pointermove",E,N),o[at]("pointerup",L,B)}function q(){!t.params.scrollbar.el||!t.scrollbar.el||O("on")}function h(){!t.params.scrollbar.el||!t.scrollbar.el||O("off")}function W(){const{scrollbar:j,el:I}=t;t.params.scrollbar=ri(t,t.originalParams.scrollbar,t.params.scrollbar,{el:"swiper-scrollbar"});const X=t.params.scrollbar;if(!X.el)return;let J;if(typeof X.el=="string"&&t.isElement&&(J=t.el.querySelector(X.el)),!J&&typeof X.el=="string"){if(J=o.querySelectorAll(X.el),!J.length)return}else J||(J=X.el);t.params.uniqueNavElements&&typeof X.el=="string"&&J.length>1&&I.querySelectorAll(X.el).length===1&&(J=I.querySelector(X.el)),J.length>0&&(J=J[0]),J.classList.add(t.isHorizontal()?X.horizontalClass:X.verticalClass);let Q;J&&(Q=J.querySelector(Ie(t.params.scrollbar.dragClass)),Q||(Q=re("div",t.params.scrollbar.dragClass),J.append(Q))),Object.assign(j,{el:J,dragEl:Q}),X.draggable&&q(),J&&J.classList[t.enabled?"remove":"add"](...Ge(t.params.scrollbar.lockClass))}function k(){const j=t.params.scrollbar,I=t.scrollbar.el;I&&I.classList.remove(...Ge(t.isHorizontal()?j.horizontalClass:j.verticalClass)),h()}r("changeDirection",()=>{if(!t.scrollbar||!t.scrollbar.el)return;const j=t.params.scrollbar;let{el:I}=t.scrollbar;I=xt(I),I.forEach(X=>{X.classList.remove(j.horizontalClass,j.verticalClass),X.classList.add(t.isHorizontal()?j.horizontalClass:j.verticalClass)})}),r("init",()=>{t.params.scrollbar.enabled===!1?G():(W(),u(),b())}),r("update resize observerUpdate lock unlock changeDirection",()=>{u()}),r("setTranslate",()=>{b()}),r("setTransition",(j,I)=>{p(I)}),r("enable disable",()=>{const{el:j}=t.scrollbar;j&&j.classList[t.enabled?"remove":"add"](...Ge(t.params.scrollbar.lockClass))}),r("destroy",()=>{k()});const z=()=>{t.el.classList.remove(...Ge(t.params.scrollbar.scrollbarDisabledClass)),t.scrollbar.el&&t.scrollbar.el.classList.remove(...Ge(t.params.scrollbar.scrollbarDisabledClass)),W(),u(),b()},G=()=>{t.el.classList.add(...Ge(t.params.scrollbar.scrollbarDisabledClass)),t.scrollbar.el&&t.scrollbar.el.classList.add(...Ge(t.params.scrollbar.scrollbarDisabledClass)),k()};Object.assign(t.scrollbar,{enable:z,disable:G,updateSize:u,setTranslate:b,init:W,destroy:k})}function ML(a){let{swiper:t,extendParams:e,on:r}=a;e({parallax:{enabled:!1}});const s="[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]",o=(v,M)=>{const{rtl:g}=t,w=g?-1:1,T=v.getAttribute("data-swiper-parallax")||"0";let b=v.getAttribute("data-swiper-parallax-x"),p=v.getAttribute("data-swiper-parallax-y");const u=v.getAttribute("data-swiper-parallax-scale"),A=v.getAttribute("data-swiper-parallax-opacity"),S=v.getAttribute("data-swiper-parallax-rotate");if(b||p?(b=b||"0",p=p||"0"):t.isHorizontal()?(b=T,p="0"):(p=T,b="0"),b.indexOf("%")>=0?b=`${parseInt(b,10)*M*w}%`:b=`${b*M*w}px`,p.indexOf("%")>=0?p=`${parseInt(p,10)*M}%`:p=`${p*M}px`,typeof A<"u"&&A!==null){const E=A-(A-1)*(1-Math.abs(M));v.style.opacity=E}let C=`translate3d(${b}, ${p}, 0px)`;if(typeof u<"u"&&u!==null){const E=u-(u-1)*(1-Math.abs(M));C+=` scale(${E})`}if(S&&typeof S<"u"&&S!==null){const E=S*M*-1;C+=` rotate(${E}deg)`}v.style.transform=C},c=()=>{const{el:v,slides:M,progress:g,snapGrid:w,isElement:T}=t,b=Bt(v,s);t.isElement&&b.push(...Bt(t.hostEl,s)),b.forEach(p=>{o(p,g)}),M.forEach((p,u)=>{let A=p.progress;t.params.slidesPerGroup>1&&t.params.slidesPerView!=="auto"&&(A+=Math.ceil(u/2)-g*(w.length-1)),A=Math.min(Math.max(A,-1),1),p.querySelectorAll(`${s}, [data-swiper-parallax-rotate]`).forEach(S=>{o(S,A)})})},f=function(v){v===void 0&&(v=t.params.speed);const{el:M,hostEl:g}=t,w=[...M.querySelectorAll(s)];t.isElement&&w.push(...g.querySelectorAll(s)),w.forEach(T=>{let b=parseInt(T.getAttribute("data-swiper-parallax-duration"),10)||v;v===0&&(b=0),T.style.transitionDuration=`${b}ms`})};r("beforeInit",()=>{t.params.parallax.enabled&&(t.params.watchSlidesProgress=!0,t.originalParams.watchSlidesProgress=!0)}),r("init",()=>{t.params.parallax.enabled&&c()}),r("setTranslate",()=>{t.params.parallax.enabled&&c()}),r("setTransition",(v,M)=>{t.params.parallax.enabled&&f(M)})}function mL(a){let{swiper:t,extendParams:e,on:r,emit:s}=a;const o=_t();e({zoom:{enabled:!1,limitToOriginalSize:!1,maxRatio:3,minRatio:1,panOnMouseMove:!1,toggle:!0,containerClass:"swiper-zoom-container",zoomedSlideClass:"swiper-slide-zoomed"}}),t.zoom={enabled:!1};let c=1,f=!1,v=!1,M={x:0,y:0};const g=-3;let w,T;const b=[],p={originX:0,originY:0,slideEl:void 0,slideWidth:void 0,slideHeight:void 0,imageEl:void 0,imageWrapEl:void 0,maxRatio:3},u={isTouched:void 0,isMoved:void 0,currentX:void 0,currentY:void 0,minX:void 0,minY:void 0,maxX:void 0,maxY:void 0,width:void 0,height:void 0,startX:void 0,startY:void 0,touchesStart:{},touchesCurrent:{}},A={x:void 0,y:void 0,prevPositionX:void 0,prevPositionY:void 0,prevTime:void 0};let S=1;Object.defineProperty(t.zoom,"scale",{get(){return S},set(tt){if(S!==tt){const K=p.imageEl,rt=p.slideEl;s("zoomChange",tt,K,rt)}S=tt}});function C(){if(b.length<2)return 1;const tt=b[0].pageX,K=b[0].pageY,rt=b[1].pageX,mt=b[1].pageY;return Math.sqrt((rt-tt)**2+(mt-K)**2)}function E(){const tt=t.params.zoom,K=p.imageWrapEl.getAttribute("data-swiper-zoom")||tt.maxRatio;if(tt.limitToOriginalSize&&p.imageEl&&p.imageEl.naturalWidth){const rt=p.imageEl.naturalWidth/p.imageEl.offsetWidth;return Math.min(rt,K)}return K}function L(){if(b.length<2)return{x:null,y:null};const tt=p.imageEl.getBoundingClientRect();return[(b[0].pageX+(b[1].pageX-b[0].pageX)/2-tt.x-o.scrollX)/c,(b[0].pageY+(b[1].pageY-b[0].pageY)/2-tt.y-o.scrollY)/c]}function O(){return t.isElement?"swiper-slide":`.${t.params.slideClass}`}function q(tt){const K=O();return!!(tt.target.matches(K)||t.slides.filter(rt=>rt.contains(tt.target)).length>0)}function h(tt){const K=`.${t.params.zoom.containerClass}`;return!!(tt.target.matches(K)||[...t.hostEl.querySelectorAll(K)].filter(rt=>rt.contains(tt.target)).length>0)}function W(tt){if(tt.pointerType==="mouse"&&b.splice(0,b.length),!q(tt))return;const K=t.params.zoom;if(w=!1,T=!1,b.push(tt),!(b.length<2)){if(w=!0,p.scaleStart=C(),!p.slideEl){p.slideEl=tt.target.closest(`.${t.params.slideClass}, swiper-slide`),p.slideEl||(p.slideEl=t.slides[t.activeIndex]);let rt=p.slideEl.querySelector(`.${K.containerClass}`);if(rt&&(rt=rt.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),p.imageEl=rt,rt?p.imageWrapEl=la(p.imageEl,`.${K.containerClass}`)[0]:p.imageWrapEl=void 0,!p.imageWrapEl){p.imageEl=void 0;return}p.maxRatio=E()}if(p.imageEl){const[rt,mt]=L();p.originX=rt,p.originY=mt,p.imageEl.style.transitionDuration="0ms"}f=!0}}function k(tt){if(!q(tt))return;const K=t.params.zoom,rt=t.zoom,mt=b.findIndex(Ht=>Ht.pointerId===tt.pointerId);mt>=0&&(b[mt]=tt),!(b.length<2)&&(T=!0,p.scaleMove=C(),p.imageEl&&(rt.scale=p.scaleMove/p.scaleStart*c,rt.scale>p.maxRatio&&(rt.scale=p.maxRatio-1+(rt.scale-p.maxRatio+1)**.5),rt.scale<K.minRatio&&(rt.scale=K.minRatio+1-(K.minRatio-rt.scale+1)**.5),p.imageEl.style.transform=`translate3d(0,0,0) scale(${rt.scale})`))}function z(tt){if(!q(tt)||tt.pointerType==="mouse"&&tt.type==="pointerout")return;const K=t.params.zoom,rt=t.zoom,mt=b.findIndex(Ht=>Ht.pointerId===tt.pointerId);mt>=0&&b.splice(mt,1),!(!w||!T)&&(w=!1,T=!1,p.imageEl&&(rt.scale=Math.max(Math.min(rt.scale,p.maxRatio),K.minRatio),p.imageEl.style.transitionDuration=`${t.params.speed}ms`,p.imageEl.style.transform=`translate3d(0,0,0) scale(${rt.scale})`,c=rt.scale,f=!1,rt.scale>1&&p.slideEl?p.slideEl.classList.add(`${K.zoomedSlideClass}`):rt.scale<=1&&p.slideEl&&p.slideEl.classList.remove(`${K.zoomedSlideClass}`),rt.scale===1&&(p.originX=0,p.originY=0,p.slideEl=void 0)))}let G;function j(){t.touchEventsData.preventTouchMoveFromPointerMove=!1}function I(){clearTimeout(G),t.touchEventsData.preventTouchMoveFromPointerMove=!0,G=setTimeout(()=>{t.destroyed||j()})}function X(tt){const K=t.device;if(!p.imageEl||u.isTouched)return;K.android&&tt.cancelable&&tt.preventDefault(),u.isTouched=!0;const rt=b.length>0?b[0]:tt;u.touchesStart.x=rt.pageX,u.touchesStart.y=rt.pageY}function J(tt){const rt=tt.pointerType==="mouse"&&t.params.zoom.panOnMouseMove;if(!q(tt)||!h(tt))return;const mt=t.zoom;if(!p.imageEl)return;if(!u.isTouched||!p.slideEl){rt&&B(tt);return}if(rt){B(tt);return}u.isMoved||(u.width=p.imageEl.offsetWidth||p.imageEl.clientWidth,u.height=p.imageEl.offsetHeight||p.imageEl.clientHeight,u.startX=G2(p.imageWrapEl,"x")||0,u.startY=G2(p.imageWrapEl,"y")||0,p.slideWidth=p.slideEl.offsetWidth,p.slideHeight=p.slideEl.offsetHeight,p.imageWrapEl.style.transitionDuration="0ms");const Ht=u.width*mt.scale,Vt=u.height*mt.scale;if(u.minX=Math.min(p.slideWidth/2-Ht/2,0),u.maxX=-u.minX,u.minY=Math.min(p.slideHeight/2-Vt/2,0),u.maxY=-u.minY,u.touchesCurrent.x=b.length>0?b[0].pageX:tt.pageX,u.touchesCurrent.y=b.length>0?b[0].pageY:tt.pageY,Math.max(Math.abs(u.touchesCurrent.x-u.touchesStart.x),Math.abs(u.touchesCurrent.y-u.touchesStart.y))>5&&(t.allowClick=!1),!u.isMoved&&!f){if(t.isHorizontal()&&(Math.floor(u.minX)===Math.floor(u.startX)&&u.touchesCurrent.x<u.touchesStart.x||Math.floor(u.maxX)===Math.floor(u.startX)&&u.touchesCurrent.x>u.touchesStart.x)){u.isTouched=!1,j();return}if(!t.isHorizontal()&&(Math.floor(u.minY)===Math.floor(u.startY)&&u.touchesCurrent.y<u.touchesStart.y||Math.floor(u.maxY)===Math.floor(u.startY)&&u.touchesCurrent.y>u.touchesStart.y)){u.isTouched=!1,j();return}}tt.cancelable&&tt.preventDefault(),tt.stopPropagation(),I(),u.isMoved=!0;const It=(mt.scale-c)/(p.maxRatio-t.params.zoom.minRatio),{originX:Ft,originY:Pt}=p;u.currentX=u.touchesCurrent.x-u.touchesStart.x+u.startX+It*(u.width-Ft*2),u.currentY=u.touchesCurrent.y-u.touchesStart.y+u.startY+It*(u.height-Pt*2),u.currentX<u.minX&&(u.currentX=u.minX+1-(u.minX-u.currentX+1)**.8),u.currentX>u.maxX&&(u.currentX=u.maxX-1+(u.currentX-u.maxX+1)**.8),u.currentY<u.minY&&(u.currentY=u.minY+1-(u.minY-u.currentY+1)**.8),u.currentY>u.maxY&&(u.currentY=u.maxY-1+(u.currentY-u.maxY+1)**.8),A.prevPositionX||(A.prevPositionX=u.touchesCurrent.x),A.prevPositionY||(A.prevPositionY=u.touchesCurrent.y),A.prevTime||(A.prevTime=Date.now()),A.x=(u.touchesCurrent.x-A.prevPositionX)/(Date.now()-A.prevTime)/2,A.y=(u.touchesCurrent.y-A.prevPositionY)/(Date.now()-A.prevTime)/2,Math.abs(u.touchesCurrent.x-A.prevPositionX)<2&&(A.x=0),Math.abs(u.touchesCurrent.y-A.prevPositionY)<2&&(A.y=0),A.prevPositionX=u.touchesCurrent.x,A.prevPositionY=u.touchesCurrent.y,A.prevTime=Date.now(),p.imageWrapEl.style.transform=`translate3d(${u.currentX}px, ${u.currentY}px,0)`}function Q(){const tt=t.zoom;if(b.length=0,!p.imageEl)return;if(!u.isTouched||!u.isMoved){u.isTouched=!1,u.isMoved=!1;return}u.isTouched=!1,u.isMoved=!1;let K=300,rt=300;const mt=A.x*K,Ht=u.currentX+mt,Vt=A.y*rt,Yt=u.currentY+Vt;A.x!==0&&(K=Math.abs((Ht-u.currentX)/A.x)),A.y!==0&&(rt=Math.abs((Yt-u.currentY)/A.y));const It=Math.max(K,rt);u.currentX=Ht,u.currentY=Yt;const Ft=u.width*tt.scale,Pt=u.height*tt.scale;u.minX=Math.min(p.slideWidth/2-Ft/2,0),u.maxX=-u.minX,u.minY=Math.min(p.slideHeight/2-Pt/2,0),u.maxY=-u.minY,u.currentX=Math.max(Math.min(u.currentX,u.maxX),u.minX),u.currentY=Math.max(Math.min(u.currentY,u.maxY),u.minY),p.imageWrapEl.style.transitionDuration=`${It}ms`,p.imageWrapEl.style.transform=`translate3d(${u.currentX}px, ${u.currentY}px,0)`}function N(){const tt=t.zoom;p.slideEl&&t.activeIndex!==t.slides.indexOf(p.slideEl)&&(p.imageEl&&(p.imageEl.style.transform="translate3d(0,0,0) scale(1)"),p.imageWrapEl&&(p.imageWrapEl.style.transform="translate3d(0,0,0)"),p.slideEl.classList.remove(`${t.params.zoom.zoomedSlideClass}`),tt.scale=1,c=1,p.slideEl=void 0,p.imageEl=void 0,p.imageWrapEl=void 0,p.originX=0,p.originY=0)}function B(tt){if(c<=1||!p.imageWrapEl||!q(tt)||!h(tt))return;const K=o.getComputedStyle(p.imageWrapEl).transform,rt=new o.DOMMatrix(K);if(!v){v=!0,M.x=tt.clientX,M.y=tt.clientY,u.startX=rt.e,u.startY=rt.f,u.width=p.imageEl.offsetWidth||p.imageEl.clientWidth,u.height=p.imageEl.offsetHeight||p.imageEl.clientHeight,p.slideWidth=p.slideEl.offsetWidth,p.slideHeight=p.slideEl.offsetHeight;return}const mt=(tt.clientX-M.x)*g,Ht=(tt.clientY-M.y)*g,Vt=u.width*c,Yt=u.height*c,It=p.slideWidth,Ft=p.slideHeight,Pt=Math.min(It/2-Vt/2,0),Gt=-Pt,he=Math.min(Ft/2-Yt/2,0),le=-he,Nt=Math.max(Math.min(u.startX+mt,Gt),Pt),Se=Math.max(Math.min(u.startY+Ht,le),he);p.imageWrapEl.style.transitionDuration="0ms",p.imageWrapEl.style.transform=`translate3d(${Nt}px, ${Se}px, 0)`,M.x=tt.clientX,M.y=tt.clientY,u.startX=Nt,u.startY=Se,u.currentX=Nt,u.currentY=Se}function at(tt){const K=t.zoom,rt=t.params.zoom;if(!p.slideEl){tt&&tt.target&&(p.slideEl=tt.target.closest(`.${t.params.slideClass}, swiper-slide`)),p.slideEl||(t.params.virtual&&t.params.virtual.enabled&&t.virtual?p.slideEl=Bt(t.slidesEl,`.${t.params.slideActiveClass}`)[0]:p.slideEl=t.slides[t.activeIndex]);let ea=p.slideEl.querySelector(`.${rt.containerClass}`);ea&&(ea=ea.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),p.imageEl=ea,ea?p.imageWrapEl=la(p.imageEl,`.${rt.containerClass}`)[0]:p.imageWrapEl=void 0}if(!p.imageEl||!p.imageWrapEl)return;t.params.cssMode&&(t.wrapperEl.style.overflow="hidden",t.wrapperEl.style.touchAction="none"),p.slideEl.classList.add(`${rt.zoomedSlideClass}`);let mt,Ht,Vt,Yt,It,Ft,Pt,Gt,he,le,Nt,Se,Kt,ye,$t,de,ae,ht;typeof u.touchesStart.x>"u"&&tt?(mt=tt.pageX,Ht=tt.pageY):(mt=u.touchesStart.x,Ht=u.touchesStart.y);const Dt=c,xe=typeof tt=="number"?tt:null;c===1&&xe&&(mt=void 0,Ht=void 0,u.touchesStart.x=void 0,u.touchesStart.y=void 0);const ta=E();K.scale=xe||ta,c=xe||ta,tt&&!(c===1&&xe)?(ae=p.slideEl.offsetWidth,ht=p.slideEl.offsetHeight,Vt=N1(p.slideEl).left+o.scrollX,Yt=N1(p.slideEl).top+o.scrollY,It=Vt+ae/2-mt,Ft=Yt+ht/2-Ht,he=p.imageEl.offsetWidth||p.imageEl.clientWidth,le=p.imageEl.offsetHeight||p.imageEl.clientHeight,Nt=he*K.scale,Se=le*K.scale,Kt=Math.min(ae/2-Nt/2,0),ye=Math.min(ht/2-Se/2,0),$t=-Kt,de=-ye,Dt>0&&xe&&typeof u.currentX=="number"&&typeof u.currentY=="number"?(Pt=u.currentX*K.scale/Dt,Gt=u.currentY*K.scale/Dt):(Pt=It*K.scale,Gt=Ft*K.scale),Pt<Kt&&(Pt=Kt),Pt>$t&&(Pt=$t),Gt<ye&&(Gt=ye),Gt>de&&(Gt=de)):(Pt=0,Gt=0),xe&&K.scale===1&&(p.originX=0,p.originY=0),u.currentX=Pt,u.currentY=Gt,p.imageWrapEl.style.transitionDuration="300ms",p.imageWrapEl.style.transform=`translate3d(${Pt}px, ${Gt}px,0)`,p.imageEl.style.transitionDuration="300ms",p.imageEl.style.transform=`translate3d(0,0,0) scale(${K.scale})`}function pt(){const tt=t.zoom,K=t.params.zoom;if(!p.slideEl){t.params.virtual&&t.params.virtual.enabled&&t.virtual?p.slideEl=Bt(t.slidesEl,`.${t.params.slideActiveClass}`)[0]:p.slideEl=t.slides[t.activeIndex];let rt=p.slideEl.querySelector(`.${K.containerClass}`);rt&&(rt=rt.querySelectorAll("picture, img, svg, canvas, .swiper-zoom-target")[0]),p.imageEl=rt,rt?p.imageWrapEl=la(p.imageEl,`.${K.containerClass}`)[0]:p.imageWrapEl=void 0}!p.imageEl||!p.imageWrapEl||(t.params.cssMode&&(t.wrapperEl.style.overflow="",t.wrapperEl.style.touchAction=""),tt.scale=1,c=1,u.currentX=void 0,u.currentY=void 0,u.touchesStart.x=void 0,u.touchesStart.y=void 0,p.imageWrapEl.style.transitionDuration="300ms",p.imageWrapEl.style.transform="translate3d(0,0,0)",p.imageEl.style.transitionDuration="300ms",p.imageEl.style.transform="translate3d(0,0,0) scale(1)",p.slideEl.classList.remove(`${K.zoomedSlideClass}`),p.slideEl=void 0,p.originX=0,p.originY=0,t.params.zoom.panOnMouseMove&&(M={x:0,y:0},v&&(v=!1,u.startX=0,u.startY=0)))}function St(tt){const K=t.zoom;K.scale&&K.scale!==1?pt():at(tt)}function At(){const tt=t.params.passiveListeners?{passive:!0,capture:!1}:!1,K=t.params.passiveListeners?{passive:!1,capture:!0}:!0;return{passiveListener:tt,activeListenerWithCapture:K}}function Ot(){const tt=t.zoom;if(tt.enabled)return;tt.enabled=!0;const{passiveListener:K,activeListenerWithCapture:rt}=At();t.wrapperEl.addEventListener("pointerdown",W,K),t.wrapperEl.addEventListener("pointermove",k,rt),["pointerup","pointercancel","pointerout"].forEach(mt=>{t.wrapperEl.addEventListener(mt,z,K)}),t.wrapperEl.addEventListener("pointermove",J,rt)}function jt(){const tt=t.zoom;if(!tt.enabled)return;tt.enabled=!1;const{passiveListener:K,activeListenerWithCapture:rt}=At();t.wrapperEl.removeEventListener("pointerdown",W,K),t.wrapperEl.removeEventListener("pointermove",k,rt),["pointerup","pointercancel","pointerout"].forEach(mt=>{t.wrapperEl.removeEventListener(mt,z,K)}),t.wrapperEl.removeEventListener("pointermove",J,rt)}r("init",()=>{t.params.zoom.enabled&&Ot()}),r("destroy",()=>{jt()}),r("touchStart",(tt,K)=>{t.zoom.enabled&&X(K)}),r("touchEnd",(tt,K)=>{t.zoom.enabled&&Q()}),r("doubleTap",(tt,K)=>{!t.animating&&t.params.zoom.enabled&&t.zoom.enabled&&t.params.zoom.toggle&&St(K)}),r("transitionEnd",()=>{t.zoom.enabled&&t.params.zoom.enabled&&N()}),r("slideChange",()=>{t.zoom.enabled&&t.params.zoom.enabled&&t.params.cssMode&&N()}),Object.assign(t.zoom,{enable:Ot,disable:jt,in:at,out:pt,toggle:St})}function vL(a){let{swiper:t,extendParams:e,on:r}=a;e({controller:{control:void 0,inverse:!1,by:"slide"}}),t.controller={control:void 0};function s(M,g){const w=function(){let u,A,S;return(C,E)=>{for(A=-1,u=C.length;u-A>1;)S=u+A>>1,C[S]<=E?A=S:u=S;return u}}();this.x=M,this.y=g,this.lastIndex=M.length-1;let T,b;return this.interpolate=function(u){return u?(b=w(this.x,u),T=b-1,(u-this.x[T])*(this.y[b]-this.y[T])/(this.x[b]-this.x[T])+this.y[T]):0},this}function o(M){t.controller.spline=t.params.loop?new s(t.slidesGrid,M.slidesGrid):new s(t.snapGrid,M.snapGrid)}function c(M,g){const w=t.controller.control;let T,b;const p=t.constructor;function u(A){if(A.destroyed)return;const S=t.rtlTranslate?-t.translate:t.translate;t.params.controller.by==="slide"&&(o(A),b=-t.controller.spline.interpolate(-S)),(!b||t.params.controller.by==="container")&&(T=(A.maxTranslate()-A.minTranslate())/(t.maxTranslate()-t.minTranslate()),(Number.isNaN(T)||!Number.isFinite(T))&&(T=1),b=(S-t.minTranslate())*T+A.minTranslate()),t.params.controller.inverse&&(b=A.maxTranslate()-b),A.updateProgress(b),A.setTranslate(b,t),A.updateActiveIndex(),A.updateSlidesClasses()}if(Array.isArray(w))for(let A=0;A<w.length;A+=1)w[A]!==g&&w[A]instanceof p&&u(w[A]);else w instanceof p&&g!==w&&u(w)}function f(M,g){const w=t.constructor,T=t.controller.control;let b;function p(u){u.destroyed||(u.setTransition(M,t),M!==0&&(u.transitionStart(),u.params.autoHeight&&La(()=>{u.updateAutoHeight()}),i1(u.wrapperEl,()=>{T&&u.transitionEnd()})))}if(Array.isArray(T))for(b=0;b<T.length;b+=1)T[b]!==g&&T[b]instanceof w&&p(T[b]);else T instanceof w&&g!==T&&p(T)}function v(){t.controller.control&&t.controller.spline&&(t.controller.spline=void 0,delete t.controller.spline)}r("beforeInit",()=>{if(typeof window<"u"&&(typeof t.params.controller.control=="string"||t.params.controller.control instanceof HTMLElement)){(typeof t.params.controller.control=="string"?[...document.querySelectorAll(t.params.controller.control)]:[t.params.controller.control]).forEach(g=>{if(t.controller.control||(t.controller.control=[]),g&&g.swiper)t.controller.control.push(g.swiper);else if(g){const w=`${t.params.eventsPrefix}init`,T=b=>{t.controller.control.push(b.detail[0]),t.update(),g.removeEventListener(w,T)};g.addEventListener(w,T)}});return}t.controller.control=t.params.controller.control}),r("update",()=>{v()}),r("resize",()=>{v()}),r("observerUpdate",()=>{v()}),r("setTranslate",(M,g,w)=>{!t.controller.control||t.controller.control.destroyed||t.controller.setTranslate(g,w)}),r("setTransition",(M,g,w)=>{!t.controller.control||t.controller.control.destroyed||t.controller.setTransition(g,w)}),Object.assign(t.controller,{setTranslate:c,setTransition:f})}function gL(a){let{swiper:t,extendParams:e,on:r}=a;e({a11y:{enabled:!0,notificationClass:"swiper-notification",prevSlideMessage:"Previous slide",nextSlideMessage:"Next slide",firstSlideMessage:"This is the first slide",lastSlideMessage:"This is the last slide",paginationBulletMessage:"Go to slide {{index}}",slideLabelMessage:"{{index}} / {{slidesLength}}",containerMessage:null,containerRoleDescriptionMessage:null,containerRole:null,itemRoleDescriptionMessage:null,slideRole:"group",id:null,scrollOnFocus:!0}}),t.a11y={clicked:!1};let s=null,o,c,f=new Date().getTime();function v(N){const B=s;B.length!==0&&$e(B,N)}function M(N){const B=()=>Math.round(16*Math.random()).toString(16);return"x".repeat(N).replace(/x/g,B)}function g(N){N=xt(N),N.forEach(B=>{B.setAttribute("tabIndex","0")})}function w(N){N=xt(N),N.forEach(B=>{B.setAttribute("tabIndex","-1")})}function T(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("role",B)})}function b(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-roledescription",B)})}function p(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-controls",B)})}function u(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-label",B)})}function A(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("id",B)})}function S(N,B){N=xt(N),N.forEach(at=>{at.setAttribute("aria-live",B)})}function C(N){N=xt(N),N.forEach(B=>{B.setAttribute("aria-disabled",!0)})}function E(N){N=xt(N),N.forEach(B=>{B.setAttribute("aria-disabled",!1)})}function L(N){if(N.keyCode!==13&&N.keyCode!==32)return;const B=t.params.a11y,at=N.target;if(!(t.pagination&&t.pagination.el&&(at===t.pagination.el||t.pagination.el.contains(N.target))&&!N.target.matches(Ie(t.params.pagination.bulletClass)))){if(t.navigation&&t.navigation.prevEl&&t.navigation.nextEl){const pt=xt(t.navigation.prevEl);xt(t.navigation.nextEl).includes(at)&&(t.isEnd&&!t.params.loop||t.slideNext(),t.isEnd?v(B.lastSlideMessage):v(B.nextSlideMessage)),pt.includes(at)&&(t.isBeginning&&!t.params.loop||t.slidePrev(),t.isBeginning?v(B.firstSlideMessage):v(B.prevSlideMessage))}t.pagination&&at.matches(Ie(t.params.pagination.bulletClass))&&at.click()}}function O(){if(t.params.loop||t.params.rewind||!t.navigation)return;const{nextEl:N,prevEl:B}=t.navigation;B&&(t.isBeginning?(C(B),w(B)):(E(B),g(B))),N&&(t.isEnd?(C(N),w(N)):(E(N),g(N)))}function q(){return t.pagination&&t.pagination.bullets&&t.pagination.bullets.length}function h(){return q()&&t.params.pagination.clickable}function W(){const N=t.params.a11y;q()&&t.pagination.bullets.forEach(B=>{t.params.pagination.clickable&&(g(B),t.params.pagination.renderBullet||(T(B,"button"),u(B,N.paginationBulletMessage.replace(/\{\{index\}\}/,s1(B)+1)))),B.matches(Ie(t.params.pagination.bulletActiveClass))?B.setAttribute("aria-current","true"):B.removeAttribute("aria-current")})}const k=(N,B,at)=>{g(N),N.tagName!=="BUTTON"&&(T(N,"button"),N.addEventListener("keydown",L)),u(N,at),p(N,B)},z=N=>{c&&c!==N.target&&!c.contains(N.target)&&(o=!0),t.a11y.clicked=!0},G=()=>{o=!1,requestAnimationFrame(()=>{requestAnimationFrame(()=>{t.destroyed||(t.a11y.clicked=!1)})})},j=N=>{f=new Date().getTime()},I=N=>{if(t.a11y.clicked||!t.params.a11y.scrollOnFocus||new Date().getTime()-f<100)return;const B=N.target.closest(`.${t.params.slideClass}, swiper-slide`);if(!B||!t.slides.includes(B))return;c=B;const at=t.slides.indexOf(B)===t.activeIndex,pt=t.params.watchSlidesProgress&&t.visibleSlides&&t.visibleSlides.includes(B);at||pt||N.sourceCapabilities&&N.sourceCapabilities.firesTouchEvents||(t.isHorizontal()?t.el.scrollLeft=0:t.el.scrollTop=0,requestAnimationFrame(()=>{o||(t.params.loop?t.slideToLoop(t.getSlideIndexWhenGrid(parseInt(B.getAttribute("data-swiper-slide-index"))),0):t.slideTo(t.getSlideIndexWhenGrid(t.slides.indexOf(B)),0),o=!1)}))},X=()=>{const N=t.params.a11y;N.itemRoleDescriptionMessage&&b(t.slides,N.itemRoleDescriptionMessage),N.slideRole&&T(t.slides,N.slideRole);const B=t.slides.length;N.slideLabelMessage&&t.slides.forEach((at,pt)=>{const St=t.params.loop?parseInt(at.getAttribute("data-swiper-slide-index"),10):pt,At=N.slideLabelMessage.replace(/\{\{index\}\}/,St+1).replace(/\{\{slidesLength\}\}/,B);u(at,At)})},J=()=>{const N=t.params.a11y;t.el.append(s);const B=t.el;N.containerRoleDescriptionMessage&&b(B,N.containerRoleDescriptionMessage),N.containerMessage&&u(B,N.containerMessage),N.containerRole&&T(B,N.containerRole);const at=t.wrapperEl,pt=N.id||at.getAttribute("id")||`swiper-wrapper-${M(16)}`,St=t.params.autoplay&&t.params.autoplay.enabled?"off":"polite";A(at,pt),S(at,St),X();let{nextEl:At,prevEl:Ot}=t.navigation?t.navigation:{};At=xt(At),Ot=xt(Ot),At&&At.forEach(tt=>k(tt,pt,N.nextSlideMessage)),Ot&&Ot.forEach(tt=>k(tt,pt,N.prevSlideMessage)),h()&&xt(t.pagination.el).forEach(K=>{K.addEventListener("keydown",L)}),zt().addEventListener("visibilitychange",j),t.el.addEventListener("focus",I,!0),t.el.addEventListener("focus",I,!0),t.el.addEventListener("pointerdown",z,!0),t.el.addEventListener("pointerup",G,!0)};function Q(){s&&s.remove();let{nextEl:N,prevEl:B}=t.navigation?t.navigation:{};N=xt(N),B=xt(B),N&&N.forEach(pt=>pt.removeEventListener("keydown",L)),B&&B.forEach(pt=>pt.removeEventListener("keydown",L)),h()&&xt(t.pagination.el).forEach(St=>{St.removeEventListener("keydown",L)}),zt().removeEventListener("visibilitychange",j),t.el&&typeof t.el!="string"&&(t.el.removeEventListener("focus",I,!0),t.el.removeEventListener("pointerdown",z,!0),t.el.removeEventListener("pointerup",G,!0))}r("beforeInit",()=>{s=re("span",t.params.a11y.notificationClass),s.setAttribute("aria-live","assertive"),s.setAttribute("aria-atomic","true")}),r("afterInit",()=>{t.params.a11y.enabled&&J()}),r("slidesLengthChange snapGridLengthChange slidesGridLengthChange",()=>{t.params.a11y.enabled&&X()}),r("fromEdge toEdge afterInit lock unlock",()=>{t.params.a11y.enabled&&O()}),r("paginationUpdate",()=>{t.params.a11y.enabled&&W()}),r("destroy",()=>{t.params.a11y.enabled&&Q()})}function yL(a){let{swiper:t,extendParams:e,on:r}=a;e({history:{enabled:!1,root:"",replaceState:!1,key:"slides",keepQuery:!1}});let s=!1,o={};const c=b=>b.toString().replace(/\s+/g,"-").replace(/[^\w-]+/g,"").replace(/--+/g,"-").replace(/^-+/,"").replace(/-+$/,""),f=b=>{const p=_t();let u;b?u=new URL(b):u=p.location;const A=u.pathname.slice(1).split("/").filter(L=>L!==""),S=A.length,C=A[S-2],E=A[S-1];return{key:C,value:E}},v=(b,p)=>{const u=_t();if(!s||!t.params.history.enabled)return;let A;t.params.url?A=new URL(t.params.url):A=u.location;const S=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${p}"]`):t.slides[p];let C=c(S.getAttribute("data-history"));if(t.params.history.root.length>0){let L=t.params.history.root;L[L.length-1]==="/"&&(L=L.slice(0,L.length-1)),C=`${L}/${b?`${b}/`:""}${C}`}else A.pathname.includes(b)||(C=`${b?`${b}/`:""}${C}`);t.params.history.keepQuery&&(C+=A.search);const E=u.history.state;E&&E.value===C||(t.params.history.replaceState?u.history.replaceState({value:C},null,C):u.history.pushState({value:C},null,C))},M=(b,p,u)=>{if(p)for(let A=0,S=t.slides.length;A<S;A+=1){const C=t.slides[A];if(c(C.getAttribute("data-history"))===p){const L=t.getSlideIndex(C);t.slideTo(L,b,u)}}else t.slideTo(0,b,u)},g=()=>{o=f(t.params.url),M(t.params.speed,o.value,!1)},w=()=>{const b=_t();if(t.params.history){if(!b.history||!b.history.pushState){t.params.history.enabled=!1,t.params.hashNavigation.enabled=!0;return}if(s=!0,o=f(t.params.url),!o.key&&!o.value){t.params.history.replaceState||b.addEventListener("popstate",g);return}M(0,o.value,t.params.runCallbacksOnInit),t.params.history.replaceState||b.addEventListener("popstate",g)}},T=()=>{const b=_t();t.params.history.replaceState||b.removeEventListener("popstate",g)};r("init",()=>{t.params.history.enabled&&w()}),r("destroy",()=>{t.params.history.enabled&&T()}),r("transitionEnd _freeModeNoMomentumRelease",()=>{s&&v(t.params.history.key,t.activeIndex)}),r("slideChange",()=>{s&&t.params.cssMode&&v(t.params.history.key,t.activeIndex)})}function xL(a){let{swiper:t,extendParams:e,emit:r,on:s}=a,o=!1;const c=zt(),f=_t();e({hashNavigation:{enabled:!1,replaceState:!1,watchState:!1,getSlideIndex(T,b){if(t.virtual&&t.params.virtual.enabled){const p=t.slides.find(A=>A.getAttribute("data-hash")===b);return p?parseInt(p.getAttribute("data-swiper-slide-index"),10):0}return t.getSlideIndex(Bt(t.slidesEl,`.${t.params.slideClass}[data-hash="${b}"], swiper-slide[data-hash="${b}"]`)[0])}}});const v=()=>{r("hashChange");const T=c.location.hash.replace("#",""),b=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${t.activeIndex}"]`):t.slides[t.activeIndex],p=b?b.getAttribute("data-hash"):"";if(T!==p){const u=t.params.hashNavigation.getSlideIndex(t,T);if(typeof u>"u"||Number.isNaN(u))return;t.slideTo(u)}},M=()=>{if(!o||!t.params.hashNavigation.enabled)return;const T=t.virtual&&t.params.virtual.enabled?t.slidesEl.querySelector(`[data-swiper-slide-index="${t.activeIndex}"]`):t.slides[t.activeIndex],b=T?T.getAttribute("data-hash")||T.getAttribute("data-history"):"";t.params.hashNavigation.replaceState&&f.history&&f.history.replaceState?(f.history.replaceState(null,null,`#${b}`||""),r("hashSet")):(c.location.hash=b||"",r("hashSet"))},g=()=>{if(!t.params.hashNavigation.enabled||t.params.history&&t.params.history.enabled)return;o=!0;const T=c.location.hash.replace("#","");if(T){const p=t.params.hashNavigation.getSlideIndex(t,T);t.slideTo(p||0,0,t.params.runCallbacksOnInit,!0)}t.params.hashNavigation.watchState&&f.addEventListener("hashchange",v)},w=()=>{t.params.hashNavigation.watchState&&f.removeEventListener("hashchange",v)};s("init",()=>{t.params.hashNavigation.enabled&&g()}),s("destroy",()=>{t.params.hashNavigation.enabled&&w()}),s("transitionEnd _freeModeNoMomentumRelease",()=>{o&&M()}),s("slideChange",()=>{o&&t.params.cssMode&&M()})}function wL(a){let{swiper:t,extendParams:e,on:r,emit:s,params:o}=a;t.autoplay={running:!1,paused:!1,timeLeft:0},e({autoplay:{enabled:!1,delay:3e3,waitForTransition:!0,disableOnInteraction:!1,stopOnLastSlide:!1,reverseDirection:!1,pauseOnMouseEnter:!1}});let c,f,v=o&&o.autoplay?o.autoplay.delay:3e3,M=o&&o.autoplay?o.autoplay.delay:3e3,g,w=new Date().getTime(),T,b,p,u,A,S,C;function E(B){!t||t.destroyed||!t.wrapperEl||B.target===t.wrapperEl&&(t.wrapperEl.removeEventListener("transitionend",E),!(C||B.detail&&B.detail.bySwiperTouchMove)&&z())}const L=()=>{if(t.destroyed||!t.autoplay.running)return;t.autoplay.paused?T=!0:T&&(M=g,T=!1);const B=t.autoplay.paused?g:w+M-new Date().getTime();t.autoplay.timeLeft=B,s("autoplayTimeLeft",B,B/v),f=requestAnimationFrame(()=>{L()})},O=()=>{let B;return t.virtual&&t.params.virtual.enabled?B=t.slides.find(pt=>pt.classList.contains("swiper-slide-active")):B=t.slides[t.activeIndex],B?parseInt(B.getAttribute("data-swiper-autoplay"),10):void 0},q=B=>{if(t.destroyed||!t.autoplay.running)return;cancelAnimationFrame(f),L();let at=typeof B>"u"?t.params.autoplay.delay:B;v=t.params.autoplay.delay,M=t.params.autoplay.delay;const pt=O();!Number.isNaN(pt)&&pt>0&&typeof B>"u"&&(at=pt,v=pt,M=pt),g=at;const St=t.params.speed,At=()=>{!t||t.destroyed||(t.params.autoplay.reverseDirection?!t.isBeginning||t.params.loop||t.params.rewind?(t.slidePrev(St,!0,!0),s("autoplay")):t.params.autoplay.stopOnLastSlide||(t.slideTo(t.slides.length-1,St,!0,!0),s("autoplay")):!t.isEnd||t.params.loop||t.params.rewind?(t.slideNext(St,!0,!0),s("autoplay")):t.params.autoplay.stopOnLastSlide||(t.slideTo(0,St,!0,!0),s("autoplay")),t.params.cssMode&&(w=new Date().getTime(),requestAnimationFrame(()=>{q()})))};return at>0?(clearTimeout(c),c=setTimeout(()=>{At()},at)):requestAnimationFrame(()=>{At()}),at},h=()=>{w=new Date().getTime(),t.autoplay.running=!0,q(),s("autoplayStart")},W=()=>{t.autoplay.running=!1,clearTimeout(c),cancelAnimationFrame(f),s("autoplayStop")},k=(B,at)=>{if(t.destroyed||!t.autoplay.running)return;clearTimeout(c),B||(S=!0);const pt=()=>{s("autoplayPause"),t.params.autoplay.waitForTransition?t.wrapperEl.addEventListener("transitionend",E):z()};if(t.autoplay.paused=!0,at){A&&(g=t.params.autoplay.delay),A=!1,pt();return}g=(g||t.params.autoplay.delay)-(new Date().getTime()-w),!(t.isEnd&&g<0&&!t.params.loop)&&(g<0&&(g=0),pt())},z=()=>{t.isEnd&&g<0&&!t.params.loop||t.destroyed||!t.autoplay.running||(w=new Date().getTime(),S?(S=!1,q(g)):q(),t.autoplay.paused=!1,s("autoplayResume"))},G=()=>{if(t.destroyed||!t.autoplay.running)return;const B=zt();B.visibilityState==="hidden"&&(S=!0,k(!0)),B.visibilityState==="visible"&&z()},j=B=>{B.pointerType==="mouse"&&(S=!0,C=!0,!(t.animating||t.autoplay.paused)&&k(!0))},I=B=>{B.pointerType==="mouse"&&(C=!1,t.autoplay.paused&&z())},X=()=>{t.params.autoplay.pauseOnMouseEnter&&(t.el.addEventListener("pointerenter",j),t.el.addEventListener("pointerleave",I))},J=()=>{t.el&&typeof t.el!="string"&&(t.el.removeEventListener("pointerenter",j),t.el.removeEventListener("pointerleave",I))},Q=()=>{zt().addEventListener("visibilitychange",G)},N=()=>{zt().removeEventListener("visibilitychange",G)};r("init",()=>{t.params.autoplay.enabled&&(X(),Q(),h())}),r("destroy",()=>{J(),N(),t.autoplay.running&&W()}),r("_freeModeStaticRelease",()=>{(p||S)&&z()}),r("_freeModeNoMomentumRelease",()=>{t.params.autoplay.disableOnInteraction?W():k(!0,!0)}),r("beforeTransitionStart",(B,at,pt)=>{t.destroyed||!t.autoplay.running||(pt||!t.params.autoplay.disableOnInteraction?k(!0,!0):W())}),r("sliderFirstMove",()=>{if(!(t.destroyed||!t.autoplay.running)){if(t.params.autoplay.disableOnInteraction){W();return}b=!0,p=!1,S=!1,u=setTimeout(()=>{S=!0,p=!0,k(!0)},200)}}),r("touchEnd",()=>{if(!(t.destroyed||!t.autoplay.running||!b)){if(clearTimeout(u),clearTimeout(c),t.params.autoplay.disableOnInteraction){p=!1,b=!1;return}p&&t.params.cssMode&&z(),p=!1,b=!1}}),r("slideChange",()=>{t.destroyed||!t.autoplay.running||(A=!0)}),Object.assign(t.autoplay,{start:h,stop:W,pause:k,resume:z})}function bL(a){let{swiper:t,extendParams:e,on:r}=a;e({thumbs:{swiper:null,multipleActiveThumbs:!0,autoScrollOffset:0,slideThumbActiveClass:"swiper-slide-thumb-active",thumbsContainerClass:"swiper-thumbs"}});let s=!1,o=!1;t.thumbs={swiper:null};function c(){const M=t.thumbs.swiper;if(!M||M.destroyed)return;const g=M.clickedIndex,w=M.clickedSlide;if(w&&w.classList.contains(t.params.thumbs.slideThumbActiveClass)||typeof g>"u"||g===null)return;let T;M.params.loop?T=parseInt(M.clickedSlide.getAttribute("data-swiper-slide-index"),10):T=g,t.params.loop?t.slideToLoop(T):t.slideTo(T)}function f(){const{thumbs:M}=t.params;if(s)return!1;s=!0;const g=t.constructor;if(M.swiper instanceof g){if(M.swiper.destroyed)return s=!1,!1;t.thumbs.swiper=M.swiper,Object.assign(t.thumbs.swiper.originalParams,{watchSlidesProgress:!0,slideToClickedSlide:!1}),Object.assign(t.thumbs.swiper.params,{watchSlidesProgress:!0,slideToClickedSlide:!1}),t.thumbs.swiper.update()}else if(e1(M.swiper)){const w=Object.assign({},M.swiper);Object.assign(w,{watchSlidesProgress:!0,slideToClickedSlide:!1}),t.thumbs.swiper=new g(w),o=!0}return t.thumbs.swiper.el.classList.add(t.params.thumbs.thumbsContainerClass),t.thumbs.swiper.on("tap",c),!0}function v(M){const g=t.thumbs.swiper;if(!g||g.destroyed)return;const w=g.params.slidesPerView==="auto"?g.slidesPerViewDynamic():g.params.slidesPerView;let T=1;const b=t.params.thumbs.slideThumbActiveClass;if(t.params.slidesPerView>1&&!t.params.centeredSlides&&(T=t.params.slidesPerView),t.params.thumbs.multipleActiveThumbs||(T=1),T=Math.floor(T),g.slides.forEach(A=>A.classList.remove(b)),g.params.loop||g.params.virtual&&g.params.virtual.enabled)for(let A=0;A<T;A+=1)Bt(g.slidesEl,`[data-swiper-slide-index="${t.realIndex+A}"]`).forEach(S=>{S.classList.add(b)});else for(let A=0;A<T;A+=1)g.slides[t.realIndex+A]&&g.slides[t.realIndex+A].classList.add(b);const p=t.params.thumbs.autoScrollOffset,u=p&&!g.params.loop;if(t.realIndex!==g.realIndex||u){const A=g.activeIndex;let S,C;if(g.params.loop){const E=g.slides.find(L=>L.getAttribute("data-swiper-slide-index")===`${t.realIndex}`);S=g.slides.indexOf(E),C=t.activeIndex>t.previousIndex?"next":"prev"}else S=t.realIndex,C=S>t.previousIndex?"next":"prev";u&&(S+=C==="next"?p:-1*p),g.visibleSlidesIndexes&&g.visibleSlidesIndexes.indexOf(S)<0&&(g.params.centeredSlides?S>A?S=S-Math.floor(w/2)+1:S=S+Math.floor(w/2)-1:S>A&&g.params.slidesPerGroup,g.slideTo(S,M?0:void 0))}}r("beforeInit",()=>{const{thumbs:M}=t.params;if(!(!M||!M.swiper))if(typeof M.swiper=="string"||M.swiper instanceof HTMLElement){const g=zt(),w=()=>{const b=typeof M.swiper=="string"?g.querySelector(M.swiper):M.swiper;if(b&&b.swiper)M.swiper=b.swiper,f(),v(!0);else if(b){const p=`${t.params.eventsPrefix}init`,u=A=>{M.swiper=A.detail[0],b.removeEventListener(p,u),f(),v(!0),M.swiper.update(),t.update()};b.addEventListener(p,u)}return b},T=()=>{if(t.destroyed)return;w()||requestAnimationFrame(T)};requestAnimationFrame(T)}else f(),v(!0)}),r("slideChange update resize observerUpdate",()=>{v()}),r("setTransition",(M,g)=>{const w=t.thumbs.swiper;!w||w.destroyed||w.setTransition(g)}),r("beforeDestroy",()=>{const M=t.thumbs.swiper;!M||M.destroyed||o&&M.destroy()}),Object.assign(t.thumbs,{init:f,update:v})}function EL(a){let{swiper:t,extendParams:e,emit:r,once:s}=a;e({freeMode:{enabled:!1,momentum:!0,momentumRatio:1,momentumBounce:!0,momentumBounceRatio:1,momentumVelocityRatio:1,sticky:!1,minimumVelocity:.02}});function o(){if(t.params.cssMode)return;const v=t.getTranslate();t.setTranslate(v),t.setTransition(0),t.touchEventsData.velocities.length=0,t.freeMode.onTouchEnd({currentPos:t.rtl?t.translate:-t.translate})}function c(){if(t.params.cssMode)return;const{touchEventsData:v,touches:M}=t;v.velocities.length===0&&v.velocities.push({position:M[t.isHorizontal()?"startX":"startY"],time:v.touchStartTime}),v.velocities.push({position:M[t.isHorizontal()?"currentX":"currentY"],time:fe()})}function f(v){let{currentPos:M}=v;if(t.params.cssMode)return;const{params:g,wrapperEl:w,rtlTranslate:T,snapGrid:b,touchEventsData:p}=t,A=fe()-p.touchStartTime;if(M<-t.minTranslate()){t.slideTo(t.activeIndex);return}if(M>-t.maxTranslate()){t.slides.length<b.length?t.slideTo(b.length-1):t.slideTo(t.slides.length-1);return}if(g.freeMode.momentum){if(p.velocities.length>1){const W=p.velocities.pop(),k=p.velocities.pop(),z=W.position-k.position,G=W.time-k.time;t.velocity=z/G,t.velocity/=2,Math.abs(t.velocity)<g.freeMode.minimumVelocity&&(t.velocity=0),(G>150||fe()-W.time>300)&&(t.velocity=0)}else t.velocity=0;t.velocity*=g.freeMode.momentumVelocityRatio,p.velocities.length=0;let S=1e3*g.freeMode.momentumRatio;const C=t.velocity*S;let E=t.translate+C;T&&(E=-E);let L=!1,O;const q=Math.abs(t.velocity)*20*g.freeMode.momentumBounceRatio;let h;if(E<t.maxTranslate())g.freeMode.momentumBounce?(E+t.maxTranslate()<-q&&(E=t.maxTranslate()-q),O=t.maxTranslate(),L=!0,p.allowMomentumBounce=!0):E=t.maxTranslate(),g.loop&&g.centeredSlides&&(h=!0);else if(E>t.minTranslate())g.freeMode.momentumBounce?(E-t.minTranslate()>q&&(E=t.minTranslate()+q),O=t.minTranslate(),L=!0,p.allowMomentumBounce=!0):E=t.minTranslate(),g.loop&&g.centeredSlides&&(h=!0);else if(g.freeMode.sticky){let W;for(let k=0;k<b.length;k+=1)if(b[k]>-E){W=k;break}Math.abs(b[W]-E)<Math.abs(b[W-1]-E)||t.swipeDirection==="next"?E=b[W]:E=b[W-1],E=-E}if(h&&s("transitionEnd",()=>{t.loopFix()}),t.velocity!==0){if(T?S=Math.abs((-E-t.translate)/t.velocity):S=Math.abs((E-t.translate)/t.velocity),g.freeMode.sticky){const W=Math.abs((T?-E:E)-t.translate),k=t.slidesSizesGrid[t.activeIndex];W<k?S=g.speed:W<2*k?S=g.speed*1.5:S=g.speed*2.5}}else if(g.freeMode.sticky){t.slideToClosest();return}g.freeMode.momentumBounce&&L?(t.updateProgress(O),t.setTransition(S),t.setTranslate(E),t.transitionStart(!0,t.swipeDirection),t.animating=!0,i1(w,()=>{!t||t.destroyed||!p.allowMomentumBounce||(r("momentumBounce"),t.setTransition(g.speed),setTimeout(()=>{t.setTranslate(O),i1(w,()=>{!t||t.destroyed||t.transitionEnd()})},0))})):t.velocity?(r("_freeModeNoMomentumRelease"),t.updateProgress(E),t.setTransition(S),t.setTranslate(E),t.transitionStart(!0,t.swipeDirection),t.animating||(t.animating=!0,i1(w,()=>{!t||t.destroyed||t.transitionEnd()}))):t.updateProgress(E),t.updateActiveIndex(),t.updateSlidesClasses()}else if(g.freeMode.sticky){t.slideToClosest();return}else g.freeMode&&r("_freeModeNoMomentumRelease");(!g.freeMode.momentum||A>=g.longSwipesMs)&&(r("_freeModeStaticRelease"),t.updateProgress(),t.updateActiveIndex(),t.updateSlidesClasses())}Object.assign(t,{freeMode:{onTouchStart:o,onTouchMove:c,onTouchEnd:f}})}function SL(a){let{swiper:t,extendParams:e,on:r}=a;e({grid:{rows:1,fill:"column"}});let s,o,c,f;const v=()=>{let u=t.params.spaceBetween;return typeof u=="string"&&u.indexOf("%")>=0?u=parseFloat(u.replace("%",""))/100*t.size:typeof u=="string"&&(u=parseFloat(u)),u},M=u=>{const{slidesPerView:A}=t.params,{rows:S,fill:C}=t.params.grid,E=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:u.length;c=Math.floor(E/S),Math.floor(E/S)===E/S?s=E:s=Math.ceil(E/S)*S,A!=="auto"&&C==="row"&&(s=Math.max(s,A*S)),o=s/S},g=()=>{t.slides&&t.slides.forEach(u=>{u.swiperSlideGridSet&&(u.style.height="",u.style[t.getDirectionLabel("margin-top")]="")})},w=(u,A,S)=>{const{slidesPerGroup:C}=t.params,E=v(),{rows:L,fill:O}=t.params.grid,q=t.virtual&&t.params.virtual.enabled?t.virtual.slides.length:S.length;let h,W,k;if(O==="row"&&C>1){const z=Math.floor(u/(C*L)),G=u-L*C*z,j=z===0?C:Math.min(Math.ceil((q-z*L*C)/L),C);k=Math.floor(G/j),W=G-k*j+z*C,h=W+k*s/L,A.style.order=h}else O==="column"?(W=Math.floor(u/L),k=u-W*L,(W>c||W===c&&k===L-1)&&(k+=1,k>=L&&(k=0,W+=1))):(k=Math.floor(u/o),W=u-k*o);A.row=k,A.column=W,A.style.height=`calc((100% - ${(L-1)*E}px) / ${L})`,A.style[t.getDirectionLabel("margin-top")]=k!==0?E&&`${E}px`:"",A.swiperSlideGridSet=!0},T=(u,A)=>{const{centeredSlides:S,roundLengths:C}=t.params,E=v(),{rows:L}=t.params.grid;if(t.virtualSize=(u+E)*s,t.virtualSize=Math.ceil(t.virtualSize/L)-E,t.params.cssMode||(t.wrapperEl.style[t.getDirectionLabel("width")]=`${t.virtualSize+E}px`),S){const O=[];for(let q=0;q<A.length;q+=1){let h=A[q];C&&(h=Math.floor(h)),A[q]<t.virtualSize+A[0]&&O.push(h)}A.splice(0,A.length),A.push(...O)}},b=()=>{f=t.params.grid&&t.params.grid.rows>1},p=()=>{const{params:u,el:A}=t,S=u.grid&&u.grid.rows>1;f&&!S?(A.classList.remove(`${u.containerModifierClass}grid`,`${u.containerModifierClass}grid-column`),c=1,t.emitContainerClasses()):!f&&S&&(A.classList.add(`${u.containerModifierClass}grid`),u.grid.fill==="column"&&A.classList.add(`${u.containerModifierClass}grid-column`),t.emitContainerClasses()),f=S};r("init",b),r("update",p),t.grid={initSlides:M,unsetSlides:g,updateSlide:w,updateWrapperSize:T}}function CL(a){const t=this,{params:e,slidesEl:r}=t;e.loop&&t.loopDestroy();const s=o=>{if(typeof o=="string"){const c=document.createElement("div");$e(c,o),r.append(c.children[0]),$e(c,"")}else r.append(o)};if(typeof a=="object"&&"length"in a)for(let o=0;o<a.length;o+=1)a[o]&&s(a[o]);else s(a);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update()}function AL(a){const t=this,{params:e,activeIndex:r,slidesEl:s}=t;e.loop&&t.loopDestroy();let o=r+1;const c=f=>{if(typeof f=="string"){const v=document.createElement("div");$e(v,f),s.prepend(v.children[0]),$e(v,"")}else s.prepend(f)};if(typeof a=="object"&&"length"in a){for(let f=0;f<a.length;f+=1)a[f]&&c(a[f]);o=r+a.length}else c(a);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update(),t.slideTo(o,0,!1)}function TL(a,t){const e=this,{params:r,activeIndex:s,slidesEl:o}=e;let c=s;r.loop&&(c-=e.loopedSlides,e.loopDestroy(),e.recalcSlides());const f=e.slides.length;if(a<=0){e.prependSlide(t);return}if(a>=f){e.appendSlide(t);return}let v=c>a?c+1:c;const M=[];for(let g=f-1;g>=a;g-=1){const w=e.slides[g];w.remove(),M.unshift(w)}if(typeof t=="object"&&"length"in t){for(let g=0;g<t.length;g+=1)t[g]&&o.append(t[g]);v=c>a?c+t.length:c}else o.append(t);for(let g=0;g<M.length;g+=1)o.append(M[g]);e.recalcSlides(),r.loop&&e.loopCreate(),(!r.observer||e.isElement)&&e.update(),r.loop?e.slideTo(v+e.loopedSlides,0,!1):e.slideTo(v,0,!1)}function _L(a){const t=this,{params:e,activeIndex:r}=t;let s=r;e.loop&&(s-=t.loopedSlides,t.loopDestroy());let o=s,c;if(typeof a=="object"&&"length"in a){for(let f=0;f<a.length;f+=1)c=a[f],t.slides[c]&&t.slides[c].remove(),c<o&&(o-=1);o=Math.max(o,0)}else c=a,t.slides[c]&&t.slides[c].remove(),c<o&&(o-=1),o=Math.max(o,0);t.recalcSlides(),e.loop&&t.loopCreate(),(!e.observer||t.isElement)&&t.update(),e.loop?t.slideTo(o+t.loopedSlides,0,!1):t.slideTo(o,0,!1)}function HL(){const a=this,t=[];for(let e=0;e<a.slides.length;e+=1)t.push(e);a.removeSlide(t)}function LL(a){let{swiper:t}=a;Object.assign(t,{appendSlide:CL.bind(t),prependSlide:AL.bind(t),addSlide:TL.bind(t),removeSlide:_L.bind(t),removeAllSlides:HL.bind(t)})}function $a(a){const{effect:t,swiper:e,on:r,setTranslate:s,setTransition:o,overwriteParams:c,perspective:f,recreateShadows:v,getEffectParams:M}=a;r("beforeInit",()=>{if(e.params.effect!==t)return;e.classNames.push(`${e.params.containerModifierClass}${t}`),f&&f()&&e.classNames.push(`${e.params.containerModifierClass}3d`);const w=c?c():{};Object.assign(e.params,w),Object.assign(e.originalParams,w)}),r("setTranslate _virtualUpdated",()=>{e.params.effect===t&&s()}),r("setTransition",(w,T)=>{e.params.effect===t&&o(T)}),r("transitionEnd",()=>{if(e.params.effect===t&&v){if(!M||!M().slideShadows)return;e.slides.forEach(w=>{w.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(T=>T.remove())}),v()}});let g;r("virtualUpdate",()=>{e.params.effect===t&&(e.slides.length||(g=!0),requestAnimationFrame(()=>{g&&e.slides&&e.slides.length&&(s(),g=!1)}))})}function h1(a,t){const e=ua(t);return e!==t&&(e.style.backfaceVisibility="hidden",e.style["-webkit-backface-visibility"]="hidden"),e}function q1(a){let{swiper:t,duration:e,transformElements:r,allSlides:s}=a;const{activeIndex:o}=t,c=f=>f.parentElement?f.parentElement:t.slides.find(M=>M.shadowRoot&&M.shadowRoot===f.parentNode);if(t.params.virtualTranslate&&e!==0){let f=!1,v;s?v=r:v=r.filter(M=>{const g=M.classList.contains("swiper-slide-transform")?c(M):M;return t.getSlideIndex(g)===o}),v.forEach(M=>{i1(M,()=>{if(f||!t||t.destroyed)return;f=!0,t.animating=!1;const g=new window.CustomEvent("transitionend",{bubbles:!0,cancelable:!0});t.wrapperEl.dispatchEvent(g)})})}}function VL(a){let{swiper:t,extendParams:e,on:r}=a;e({fadeEffect:{crossFade:!1}}),$a({effect:"fade",swiper:t,on:r,setTranslate:()=>{const{slides:c}=t,f=t.params.fadeEffect;for(let v=0;v<c.length;v+=1){const M=t.slides[v];let w=-M.swiperSlideOffset;t.params.virtualTranslate||(w-=t.translate);let T=0;t.isHorizontal()||(T=w,w=0);const b=t.params.fadeEffect.crossFade?Math.max(1-Math.abs(M.progress),0):1+Math.min(Math.max(M.progress,-1),0),p=h1(f,M);p.style.opacity=b,p.style.transform=`translate3d(${w}px, ${T}px, 0px)`}},setTransition:c=>{const f=t.slides.map(v=>ua(v));f.forEach(v=>{v.style.transitionDuration=`${c}ms`}),q1({swiper:t,duration:c,transformElements:f,allSlides:!0})},overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!t.params.cssMode})})}function PL(a){let{swiper:t,extendParams:e,on:r}=a;e({cubeEffect:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94}});const s=(v,M,g)=>{let w=g?v.querySelector(".swiper-slide-shadow-left"):v.querySelector(".swiper-slide-shadow-top"),T=g?v.querySelector(".swiper-slide-shadow-right"):v.querySelector(".swiper-slide-shadow-bottom");w||(w=re("div",`swiper-slide-shadow-cube swiper-slide-shadow-${g?"left":"top"}`.split(" ")),v.append(w)),T||(T=re("div",`swiper-slide-shadow-cube swiper-slide-shadow-${g?"right":"bottom"}`.split(" ")),v.append(T)),w&&(w.style.opacity=Math.max(-M,0)),T&&(T.style.opacity=Math.max(M,0))};$a({effect:"cube",swiper:t,on:r,setTranslate:()=>{const{el:v,wrapperEl:M,slides:g,width:w,height:T,rtlTranslate:b,size:p,browser:u}=t,A=F1(t),S=t.params.cubeEffect,C=t.isHorizontal(),E=t.virtual&&t.params.virtual.enabled;let L=0,O;S.shadow&&(C?(O=t.wrapperEl.querySelector(".swiper-cube-shadow"),O||(O=re("div","swiper-cube-shadow"),t.wrapperEl.append(O)),O.style.height=`${w}px`):(O=v.querySelector(".swiper-cube-shadow"),O||(O=re("div","swiper-cube-shadow"),v.append(O))));for(let h=0;h<g.length;h+=1){const W=g[h];let k=h;E&&(k=parseInt(W.getAttribute("data-swiper-slide-index"),10));let z=k*90,G=Math.floor(z/360);b&&(z=-z,G=Math.floor(-z/360));const j=Math.max(Math.min(W.progress,1),-1);let I=0,X=0,J=0;k%4===0?(I=-G*4*p,J=0):(k-1)%4===0?(I=0,J=-G*4*p):(k-2)%4===0?(I=p+G*4*p,J=p):(k-3)%4===0&&(I=-p,J=3*p+p*4*G),b&&(I=-I),C||(X=I,I=0);const Q=`rotateX(${A(C?0:-z)}deg) rotateY(${A(C?z:0)}deg) translate3d(${I}px, ${X}px, ${J}px)`;j<=1&&j>-1&&(L=k*90+j*90,b&&(L=-k*90-j*90)),W.style.transform=Q,S.slideShadows&&s(W,j,C)}if(M.style.transformOrigin=`50% 50% -${p/2}px`,M.style["-webkit-transform-origin"]=`50% 50% -${p/2}px`,S.shadow)if(C)O.style.transform=`translate3d(0px, ${w/2+S.shadowOffset}px, ${-w/2}px) rotateX(89.99deg) rotateZ(0deg) scale(${S.shadowScale})`;else{const h=Math.abs(L)-Math.floor(Math.abs(L)/90)*90,W=1.5-(Math.sin(h*2*Math.PI/360)/2+Math.cos(h*2*Math.PI/360)/2),k=S.shadowScale,z=S.shadowScale/W,G=S.shadowOffset;O.style.transform=`scale3d(${k}, 1, ${z}) translate3d(0px, ${T/2+G}px, ${-T/2/z}px) rotateX(-89.99deg)`}const q=(u.isSafari||u.isWebView)&&u.needPerspectiveFix?-p/2:0;M.style.transform=`translate3d(0px,0,${q}px) rotateX(${A(t.isHorizontal()?0:L)}deg) rotateY(${A(t.isHorizontal()?-L:0)}deg)`,M.style.setProperty("--swiper-cube-translate-z",`${q}px`)},setTransition:v=>{const{el:M,slides:g}=t;if(g.forEach(w=>{w.style.transitionDuration=`${v}ms`,w.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(T=>{T.style.transitionDuration=`${v}ms`})}),t.params.cubeEffect.shadow&&!t.isHorizontal()){const w=M.querySelector(".swiper-cube-shadow");w&&(w.style.transitionDuration=`${v}ms`)}},recreateShadows:()=>{const v=t.isHorizontal();t.slides.forEach(M=>{const g=Math.max(Math.min(M.progress,1),-1);s(M,g,v)})},getEffectParams:()=>t.params.cubeEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,resistanceRatio:0,spaceBetween:0,centeredSlides:!1,virtualTranslate:!0})})}function Va(a,t,e){const r=`swiper-slide-shadow${e?`-${e}`:""}${a?` swiper-slide-shadow-${a}`:""}`,s=ua(t);let o=s.querySelector(`.${r.split(" ").join(".")}`);return o||(o=re("div",r.split(" ")),s.append(o)),o}function DL(a){let{swiper:t,extendParams:e,on:r}=a;e({flipEffect:{slideShadows:!0,limitRotation:!0}});const s=(v,M)=>{let g=t.isHorizontal()?v.querySelector(".swiper-slide-shadow-left"):v.querySelector(".swiper-slide-shadow-top"),w=t.isHorizontal()?v.querySelector(".swiper-slide-shadow-right"):v.querySelector(".swiper-slide-shadow-bottom");g||(g=Va("flip",v,t.isHorizontal()?"left":"top")),w||(w=Va("flip",v,t.isHorizontal()?"right":"bottom")),g&&(g.style.opacity=Math.max(-M,0)),w&&(w.style.opacity=Math.max(M,0))};$a({effect:"flip",swiper:t,on:r,setTranslate:()=>{const{slides:v,rtlTranslate:M}=t,g=t.params.flipEffect,w=F1(t);for(let T=0;T<v.length;T+=1){const b=v[T];let p=b.progress;t.params.flipEffect.limitRotation&&(p=Math.max(Math.min(b.progress,1),-1));const u=b.swiperSlideOffset;let S=-180*p,C=0,E=t.params.cssMode?-u-t.translate:-u,L=0;t.isHorizontal()?M&&(S=-S):(L=E,E=0,C=-S,S=0),b.style.zIndex=-Math.abs(Math.round(p))+v.length,g.slideShadows&&s(b,p);const O=`translate3d(${E}px, ${L}px, 0px) rotateX(${w(C)}deg) rotateY(${w(S)}deg)`,q=h1(g,b);q.style.transform=O}},setTransition:v=>{const M=t.slides.map(g=>ua(g));M.forEach(g=>{g.style.transitionDuration=`${v}ms`,g.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(w=>{w.style.transitionDuration=`${v}ms`})}),q1({swiper:t,duration:v,transformElements:M})},recreateShadows:()=>{t.params.flipEffect,t.slides.forEach(v=>{let M=v.progress;t.params.flipEffect.limitRotation&&(M=Math.max(Math.min(v.progress,1),-1)),s(v,M)})},getEffectParams:()=>t.params.flipEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!t.params.cssMode})})}function OL(a){let{swiper:t,extendParams:e,on:r}=a;e({coverflowEffect:{rotate:50,stretch:0,depth:100,scale:1,modifier:1,slideShadows:!0}}),$a({effect:"coverflow",swiper:t,on:r,setTranslate:()=>{const{width:c,height:f,slides:v,slidesSizesGrid:M}=t,g=t.params.coverflowEffect,w=t.isHorizontal(),T=t.translate,b=w?-T+c/2:-T+f/2,p=w?g.rotate:-g.rotate,u=g.depth,A=F1(t);for(let S=0,C=v.length;S<C;S+=1){const E=v[S],L=M[S],O=E.swiperSlideOffset,q=(b-O-L/2)/L,h=typeof g.modifier=="function"?g.modifier(q):q*g.modifier;let W=w?p*h:0,k=w?0:p*h,z=-u*Math.abs(h),G=g.stretch;typeof G=="string"&&G.indexOf("%")!==-1&&(G=parseFloat(g.stretch)/100*L);let j=w?0:G*h,I=w?G*h:0,X=1-(1-g.scale)*Math.abs(h);Math.abs(I)<.001&&(I=0),Math.abs(j)<.001&&(j=0),Math.abs(z)<.001&&(z=0),Math.abs(W)<.001&&(W=0),Math.abs(k)<.001&&(k=0),Math.abs(X)<.001&&(X=0);const J=`translate3d(${I}px,${j}px,${z}px)  rotateX(${A(k)}deg) rotateY(${A(W)}deg) scale(${X})`,Q=h1(g,E);if(Q.style.transform=J,E.style.zIndex=-Math.abs(Math.round(h))+1,g.slideShadows){let N=w?E.querySelector(".swiper-slide-shadow-left"):E.querySelector(".swiper-slide-shadow-top"),B=w?E.querySelector(".swiper-slide-shadow-right"):E.querySelector(".swiper-slide-shadow-bottom");N||(N=Va("coverflow",E,w?"left":"top")),B||(B=Va("coverflow",E,w?"right":"bottom")),N&&(N.style.opacity=h>0?h:0),B&&(B.style.opacity=-h>0?-h:0)}}},setTransition:c=>{t.slides.map(v=>ua(v)).forEach(v=>{v.style.transitionDuration=`${c}ms`,v.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(M=>{M.style.transitionDuration=`${c}ms`})})},perspective:()=>!0,overwriteParams:()=>({watchSlidesProgress:!0})})}function kL(a){let{swiper:t,extendParams:e,on:r}=a;e({creativeEffect:{limitProgress:1,shadowPerProgress:!1,progressMultiplier:1,perspective:!0,prev:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1},next:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1}}});const s=f=>typeof f=="string"?f:`${f}px`;$a({effect:"creative",swiper:t,on:r,setTranslate:()=>{const{slides:f,wrapperEl:v,slidesSizesGrid:M}=t,g=t.params.creativeEffect,{progressMultiplier:w}=g,T=t.params.centeredSlides,b=F1(t);if(T){const p=M[0]/2-t.params.slidesOffsetBefore||0;v.style.transform=`translateX(calc(50% - ${p}px))`}for(let p=0;p<f.length;p+=1){const u=f[p],A=u.progress,S=Math.min(Math.max(u.progress,-g.limitProgress),g.limitProgress);let C=S;T||(C=Math.min(Math.max(u.originalProgress,-g.limitProgress),g.limitProgress));const E=u.swiperSlideOffset,L=[t.params.cssMode?-E-t.translate:-E,0,0],O=[0,0,0];let q=!1;t.isHorizontal()||(L[1]=L[0],L[0]=0);let h={translate:[0,0,0],rotate:[0,0,0],scale:1,opacity:1};S<0?(h=g.next,q=!0):S>0&&(h=g.prev,q=!0),L.forEach((X,J)=>{L[J]=`calc(${X}px + (${s(h.translate[J])} * ${Math.abs(S*w)}))`}),O.forEach((X,J)=>{let Q=h.rotate[J]*Math.abs(S*w);O[J]=Q}),u.style.zIndex=-Math.abs(Math.round(A))+f.length;const W=L.join(", "),k=`rotateX(${b(O[0])}deg) rotateY(${b(O[1])}deg) rotateZ(${b(O[2])}deg)`,z=C<0?`scale(${1+(1-h.scale)*C*w})`:`scale(${1-(1-h.scale)*C*w})`,G=C<0?1+(1-h.opacity)*C*w:1-(1-h.opacity)*C*w,j=`translate3d(${W}) ${k} ${z}`;if(q&&h.shadow||!q){let X=u.querySelector(".swiper-slide-shadow");if(!X&&h.shadow&&(X=Va("creative",u)),X){const J=g.shadowPerProgress?S*(1/g.limitProgress):S;X.style.opacity=Math.min(Math.max(Math.abs(J),0),1)}}const I=h1(g,u);I.style.transform=j,I.style.opacity=G,h.origin&&(I.style.transformOrigin=h.origin)}},setTransition:f=>{const v=t.slides.map(M=>ua(M));v.forEach(M=>{M.style.transitionDuration=`${f}ms`,M.querySelectorAll(".swiper-slide-shadow").forEach(g=>{g.style.transitionDuration=`${f}ms`})}),q1({swiper:t,duration:f,transformElements:v,allSlides:!0})},perspective:()=>t.params.creativeEffect.perspective,overwriteParams:()=>({watchSlidesProgress:!0,virtualTranslate:!t.params.cssMode})})}function IL(a){let{swiper:t,extendParams:e,on:r}=a;e({cardsEffect:{slideShadows:!0,rotate:!0,perSlideRotate:2,perSlideOffset:8}}),$a({effect:"cards",swiper:t,on:r,setTranslate:()=>{const{slides:c,activeIndex:f,rtlTranslate:v}=t,M=t.params.cardsEffect,{startTranslate:g,isTouched:w}=t.touchEventsData,T=v?-t.translate:t.translate;for(let b=0;b<c.length;b+=1){const p=c[b],u=p.progress,A=Math.min(Math.max(u,-4),4);let S=p.swiperSlideOffset;t.params.centeredSlides&&!t.params.cssMode&&(t.wrapperEl.style.transform=`translateX(${t.minTranslate()}px)`),t.params.centeredSlides&&t.params.cssMode&&(S-=c[0].swiperSlideOffset);let C=t.params.cssMode?-S-t.translate:-S,E=0;const L=-100*Math.abs(A);let O=1,q=-M.perSlideRotate*A,h=M.perSlideOffset-Math.abs(A)*.75;const W=t.virtual&&t.params.virtual.enabled?t.virtual.from+b:b,k=(W===f||W===f-1)&&A>0&&A<1&&(w||t.params.cssMode)&&T<g,z=(W===f||W===f+1)&&A<0&&A>-1&&(w||t.params.cssMode)&&T>g;if(k||z){const X=(1-Math.abs((Math.abs(A)-.5)/.5))**.5;q+=-28*A*X,O+=-.5*X,h+=96*X,E=`${-25*X*Math.abs(A)}%`}if(A<0?C=`calc(${C}px ${v?"-":"+"} (${h*Math.abs(A)}%))`:A>0?C=`calc(${C}px ${v?"-":"+"} (-${h*Math.abs(A)}%))`:C=`${C}px`,!t.isHorizontal()){const X=E;E=C,C=X}const G=A<0?`${1+(1-O)*A}`:`${1-(1-O)*A}`,j=`
        translate3d(${C}, ${E}, ${L}px)
        rotateZ(${M.rotate?v?-q:q:0}deg)
        scale(${G})
      `;if(M.slideShadows){let X=p.querySelector(".swiper-slide-shadow");X||(X=Va("cards",p)),X&&(X.style.opacity=Math.min(Math.max((Math.abs(A)-.5)/.5,0),1))}p.style.zIndex=-Math.abs(Math.round(u))+c.length;const I=h1(M,p);I.style.transform=j}},setTransition:c=>{const f=t.slides.map(v=>ua(v));f.forEach(v=>{v.style.transitionDuration=`${c}ms`,v.querySelectorAll(".swiper-slide-shadow").forEach(M=>{M.style.transitionDuration=`${c}ms`})}),q1({swiper:t,duration:c,transformElements:f})},perspective:()=>!0,overwriteParams:()=>({_loopSwapReset:!1,watchSlidesProgress:!0,loopAdditionalSlides:t.params.cardsEffect.rotate?3:2,centeredSlides:!0,virtualTranslate:!t.params.cssMode})})}const NL=[lL,dL,cL,pL,uL,fL,ML,mL,vL,gL,yL,xL,wL,bL,EL,SL,LL,VL,PL,DL,OL,kL,IL];Wt.use(NL);var Xt="top",ne="bottom",se="right",Ut="left",W1="auto",Ra=[Xt,ne,se,Ut],ca="start",Pa="end",Fo="clippingParents",ni="viewport",Aa="popper",qo="reference",U2=Ra.reduce(function(a,t){return a.concat([t+"-"+ca,t+"-"+Pa])},[]),si=[].concat(Ra,[W1]).reduce(function(a,t){return a.concat([t,t+"-"+ca,t+"-"+Pa])},[]),Wo="beforeRead",jo="read",Go="afterRead",Zo="beforeMain",Xo="main",Uo="afterMain",Yo="beforeWrite",Ko="write",Qo="afterWrite",Jo=[Wo,jo,Go,Zo,Xo,Uo,Yo,Ko,Qo];function Pe(a){return a?(a.nodeName||"").toLowerCase():null}function oe(a){if(a==null)return window;if(a.toString()!=="[object Window]"){var t=a.ownerDocument;return t&&t.defaultView||window}return a}function pa(a){var t=oe(a).Element;return a instanceof t||a instanceof Element}function Me(a){var t=oe(a).HTMLElement;return a instanceof t||a instanceof HTMLElement}function oi(a){if(typeof ShadowRoot>"u")return!1;var t=oe(a).ShadowRoot;return a instanceof t||a instanceof ShadowRoot}function zL(a){var t=a.state;Object.keys(t.elements).forEach(function(e){var r=t.styles[e]||{},s=t.attributes[e]||{},o=t.elements[e];!Me(o)||!Pe(o)||(Object.assign(o.style,r),Object.keys(s).forEach(function(c){var f=s[c];f===!1?o.removeAttribute(c):o.setAttribute(c,f===!0?"":f)}))})}function $L(a){var t=a.state,e={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,e.popper),t.styles=e,t.elements.arrow&&Object.assign(t.elements.arrow.style,e.arrow),function(){Object.keys(t.elements).forEach(function(r){var s=t.elements[r],o=t.attributes[r]||{},c=Object.keys(t.styles.hasOwnProperty(r)?t.styles[r]:e[r]),f=c.reduce(function(v,M){return v[M]="",v},{});!Me(s)||!Pe(s)||(Object.assign(s.style,f),Object.keys(o).forEach(function(v){s.removeAttribute(v)}))})}}const hi={name:"applyStyles",enabled:!0,phase:"write",fn:zL,effect:$L,requires:["computeStyles"]};function Le(a){return a.split("-")[0]}var da=Math.max,z1=Math.min,Da=Math.round;function Y2(){var a=navigator.userAgentData;return a!=null&&a.brands&&Array.isArray(a.brands)?a.brands.map(function(t){return t.brand+"/"+t.version}).join(" "):navigator.userAgent}function th(){return!/^((?!chrome|android).)*safari/i.test(Y2())}function Oa(a,t,e){t===void 0&&(t=!1),e===void 0&&(e=!1);var r=a.getBoundingClientRect(),s=1,o=1;t&&Me(a)&&(s=a.offsetWidth>0&&Da(r.width)/a.offsetWidth||1,o=a.offsetHeight>0&&Da(r.height)/a.offsetHeight||1);var c=pa(a)?oe(a):window,f=c.visualViewport,v=!th()&&e,M=(r.left+(v&&f?f.offsetLeft:0))/s,g=(r.top+(v&&f?f.offsetTop:0))/o,w=r.width/s,T=r.height/o;return{width:w,height:T,top:g,right:M+w,bottom:g+T,left:M,x:M,y:g}}function li(a){var t=Oa(a),e=a.offsetWidth,r=a.offsetHeight;return Math.abs(t.width-e)<=1&&(e=t.width),Math.abs(t.height-r)<=1&&(r=t.height),{x:a.offsetLeft,y:a.offsetTop,width:e,height:r}}function eh(a,t){var e=t.getRootNode&&t.getRootNode();if(a.contains(t))return!0;if(e&&oi(e)){var r=t;do{if(r&&a.isSameNode(r))return!0;r=r.parentNode||r.host}while(r)}return!1}function Re(a){return oe(a).getComputedStyle(a)}function RL(a){return["table","td","th"].indexOf(Pe(a))>=0}function Ke(a){return((pa(a)?a.ownerDocument:a.document)||window.document).documentElement}function j1(a){return Pe(a)==="html"?a:a.assignedSlot||a.parentNode||(oi(a)?a.host:null)||Ke(a)}function Y0(a){return!Me(a)||Re(a).position==="fixed"?null:a.offsetParent}function BL(a){var t=/firefox/i.test(Y2()),e=/Trident/i.test(Y2());if(e&&Me(a)){var r=Re(a);if(r.position==="fixed")return null}var s=j1(a);for(oi(s)&&(s=s.host);Me(s)&&["html","body"].indexOf(Pe(s))<0;){var o=Re(s);if(o.transform!=="none"||o.perspective!=="none"||o.contain==="paint"||["transform","perspective"].indexOf(o.willChange)!==-1||t&&o.willChange==="filter"||t&&o.filter&&o.filter!=="none")return s;s=s.parentNode}return null}function l1(a){for(var t=oe(a),e=Y0(a);e&&RL(e)&&Re(e).position==="static";)e=Y0(e);return e&&(Pe(e)==="html"||Pe(e)==="body"&&Re(e).position==="static")?t:e||BL(a)||t}function di(a){return["top","bottom"].indexOf(a)>=0?"x":"y"}function r1(a,t,e){return da(a,z1(t,e))}function FL(a,t,e){var r=r1(a,t,e);return r>e?e:r}function ah(){return{top:0,right:0,bottom:0,left:0}}function ih(a){return Object.assign({},ah(),a)}function rh(a,t){return t.reduce(function(e,r){return e[r]=a,e},{})}var qL=function(t,e){return t=typeof t=="function"?t(Object.assign({},e.rects,{placement:e.placement})):t,ih(typeof t!="number"?t:rh(t,Ra))};function WL(a){var t,e=a.state,r=a.name,s=a.options,o=e.elements.arrow,c=e.modifiersData.popperOffsets,f=Le(e.placement),v=di(f),M=[Ut,se].indexOf(f)>=0,g=M?"height":"width";if(!(!o||!c)){var w=qL(s.padding,e),T=li(o),b=v==="y"?Xt:Ut,p=v==="y"?ne:se,u=e.rects.reference[g]+e.rects.reference[v]-c[v]-e.rects.popper[g],A=c[v]-e.rects.reference[v],S=l1(o),C=S?v==="y"?S.clientHeight||0:S.clientWidth||0:0,E=u/2-A/2,L=w[b],O=C-T[g]-w[p],q=C/2-T[g]/2+E,h=r1(L,q,O),W=v;e.modifiersData[r]=(t={},t[W]=h,t.centerOffset=h-q,t)}}function jL(a){var t=a.state,e=a.options,r=e.element,s=r===void 0?"[data-popper-arrow]":r;s!=null&&(typeof s=="string"&&(s=t.elements.popper.querySelector(s),!s)||eh(t.elements.popper,s)&&(t.elements.arrow=s))}const nh={name:"arrow",enabled:!0,phase:"main",fn:WL,effect:jL,requires:["popperOffsets"],requiresIfExists:["preventOverflow"]};function ka(a){return a.split("-")[1]}var GL={top:"auto",right:"auto",bottom:"auto",left:"auto"};function ZL(a,t){var e=a.x,r=a.y,s=t.devicePixelRatio||1;return{x:Da(e*s)/s||0,y:Da(r*s)/s||0}}function K0(a){var t,e=a.popper,r=a.popperRect,s=a.placement,o=a.variation,c=a.offsets,f=a.position,v=a.gpuAcceleration,M=a.adaptive,g=a.roundOffsets,w=a.isFixed,T=c.x,b=T===void 0?0:T,p=c.y,u=p===void 0?0:p,A=typeof g=="function"?g({x:b,y:u}):{x:b,y:u};b=A.x,u=A.y;var S=c.hasOwnProperty("x"),C=c.hasOwnProperty("y"),E=Ut,L=Xt,O=window;if(M){var q=l1(e),h="clientHeight",W="clientWidth";if(q===oe(e)&&(q=Ke(e),Re(q).position!=="static"&&f==="absolute"&&(h="scrollHeight",W="scrollWidth")),q=q,s===Xt||(s===Ut||s===se)&&o===Pa){L=ne;var k=w&&q===O&&O.visualViewport?O.visualViewport.height:q[h];u-=k-r.height,u*=v?1:-1}if(s===Ut||(s===Xt||s===ne)&&o===Pa){E=se;var z=w&&q===O&&O.visualViewport?O.visualViewport.width:q[W];b-=z-r.width,b*=v?1:-1}}var G=Object.assign({position:f},M&&GL),j=g===!0?ZL({x:b,y:u},oe(e)):{x:b,y:u};if(b=j.x,u=j.y,v){var I;return Object.assign({},G,(I={},I[L]=C?"0":"",I[E]=S?"0":"",I.transform=(O.devicePixelRatio||1)<=1?"translate("+b+"px, "+u+"px)":"translate3d("+b+"px, "+u+"px, 0)",I))}return Object.assign({},G,(t={},t[L]=C?u+"px":"",t[E]=S?b+"px":"",t.transform="",t))}function XL(a){var t=a.state,e=a.options,r=e.gpuAcceleration,s=r===void 0?!0:r,o=e.adaptive,c=o===void 0?!0:o,f=e.roundOffsets,v=f===void 0?!0:f,M={placement:Le(t.placement),variation:ka(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:s,isFixed:t.options.strategy==="fixed"};t.modifiersData.popperOffsets!=null&&(t.styles.popper=Object.assign({},t.styles.popper,K0(Object.assign({},M,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:c,roundOffsets:v})))),t.modifiersData.arrow!=null&&(t.styles.arrow=Object.assign({},t.styles.arrow,K0(Object.assign({},M,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:v})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})}const ci={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:XL,data:{}};var S1={passive:!0};function UL(a){var t=a.state,e=a.instance,r=a.options,s=r.scroll,o=s===void 0?!0:s,c=r.resize,f=c===void 0?!0:c,v=oe(t.elements.popper),M=[].concat(t.scrollParents.reference,t.scrollParents.popper);return o&&M.forEach(function(g){g.addEventListener("scroll",e.update,S1)}),f&&v.addEventListener("resize",e.update,S1),function(){o&&M.forEach(function(g){g.removeEventListener("scroll",e.update,S1)}),f&&v.removeEventListener("resize",e.update,S1)}}const pi={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:UL,data:{}};var YL={left:"right",right:"left",bottom:"top",top:"bottom"};function D1(a){return a.replace(/left|right|bottom|top/g,function(t){return YL[t]})}var KL={start:"end",end:"start"};function Q0(a){return a.replace(/start|end/g,function(t){return KL[t]})}function ui(a){var t=oe(a),e=t.pageXOffset,r=t.pageYOffset;return{scrollLeft:e,scrollTop:r}}function fi(a){return Oa(Ke(a)).left+ui(a).scrollLeft}function QL(a,t){var e=oe(a),r=Ke(a),s=e.visualViewport,o=r.clientWidth,c=r.clientHeight,f=0,v=0;if(s){o=s.width,c=s.height;var M=th();(M||!M&&t==="fixed")&&(f=s.offsetLeft,v=s.offsetTop)}return{width:o,height:c,x:f+fi(a),y:v}}function JL(a){var t,e=Ke(a),r=ui(a),s=(t=a.ownerDocument)==null?void 0:t.body,o=da(e.scrollWidth,e.clientWidth,s?s.scrollWidth:0,s?s.clientWidth:0),c=da(e.scrollHeight,e.clientHeight,s?s.scrollHeight:0,s?s.clientHeight:0),f=-r.scrollLeft+fi(a),v=-r.scrollTop;return Re(s||e).direction==="rtl"&&(f+=da(e.clientWidth,s?s.clientWidth:0)-o),{width:o,height:c,x:f,y:v}}function Mi(a){var t=Re(a),e=t.overflow,r=t.overflowX,s=t.overflowY;return/auto|scroll|overlay|hidden/.test(e+s+r)}function sh(a){return["html","body","#document"].indexOf(Pe(a))>=0?a.ownerDocument.body:Me(a)&&Mi(a)?a:sh(j1(a))}function n1(a,t){var e;t===void 0&&(t=[]);var r=sh(a),s=r===((e=a.ownerDocument)==null?void 0:e.body),o=oe(r),c=s?[o].concat(o.visualViewport||[],Mi(r)?r:[]):r,f=t.concat(c);return s?f:f.concat(n1(j1(c)))}function K2(a){return Object.assign({},a,{left:a.x,top:a.y,right:a.x+a.width,bottom:a.y+a.height})}function tV(a,t){var e=Oa(a,!1,t==="fixed");return e.top=e.top+a.clientTop,e.left=e.left+a.clientLeft,e.bottom=e.top+a.clientHeight,e.right=e.left+a.clientWidth,e.width=a.clientWidth,e.height=a.clientHeight,e.x=e.left,e.y=e.top,e}function J0(a,t,e){return t===ni?K2(QL(a,e)):pa(t)?tV(t,e):K2(JL(Ke(a)))}function eV(a){var t=n1(j1(a)),e=["absolute","fixed"].indexOf(Re(a).position)>=0,r=e&&Me(a)?l1(a):a;return pa(r)?t.filter(function(s){return pa(s)&&eh(s,r)&&Pe(s)!=="body"}):[]}function aV(a,t,e,r){var s=t==="clippingParents"?eV(a):[].concat(t),o=[].concat(s,[e]),c=o[0],f=o.reduce(function(v,M){var g=J0(a,M,r);return v.top=da(g.top,v.top),v.right=z1(g.right,v.right),v.bottom=z1(g.bottom,v.bottom),v.left=da(g.left,v.left),v},J0(a,c,r));return f.width=f.right-f.left,f.height=f.bottom-f.top,f.x=f.left,f.y=f.top,f}function oh(a){var t=a.reference,e=a.element,r=a.placement,s=r?Le(r):null,o=r?ka(r):null,c=t.x+t.width/2-e.width/2,f=t.y+t.height/2-e.height/2,v;switch(s){case Xt:v={x:c,y:t.y-e.height};break;case ne:v={x:c,y:t.y+t.height};break;case se:v={x:t.x+t.width,y:f};break;case Ut:v={x:t.x-e.width,y:f};break;default:v={x:t.x,y:t.y}}var M=s?di(s):null;if(M!=null){var g=M==="y"?"height":"width";switch(o){case ca:v[M]=v[M]-(t[g]/2-e[g]/2);break;case Pa:v[M]=v[M]+(t[g]/2-e[g]/2);break}}return v}function Ia(a,t){t===void 0&&(t={});var e=t,r=e.placement,s=r===void 0?a.placement:r,o=e.strategy,c=o===void 0?a.strategy:o,f=e.boundary,v=f===void 0?Fo:f,M=e.rootBoundary,g=M===void 0?ni:M,w=e.elementContext,T=w===void 0?Aa:w,b=e.altBoundary,p=b===void 0?!1:b,u=e.padding,A=u===void 0?0:u,S=ih(typeof A!="number"?A:rh(A,Ra)),C=T===Aa?qo:Aa,E=a.rects.popper,L=a.elements[p?C:T],O=aV(pa(L)?L:L.contextElement||Ke(a.elements.popper),v,g,c),q=Oa(a.elements.reference),h=oh({reference:q,element:E,placement:s}),W=K2(Object.assign({},E,h)),k=T===Aa?W:q,z={top:O.top-k.top+S.top,bottom:k.bottom-O.bottom+S.bottom,left:O.left-k.left+S.left,right:k.right-O.right+S.right},G=a.modifiersData.offset;if(T===Aa&&G){var j=G[s];Object.keys(z).forEach(function(I){var X=[se,ne].indexOf(I)>=0?1:-1,J=[Xt,ne].indexOf(I)>=0?"y":"x";z[I]+=j[J]*X})}return z}function iV(a,t){t===void 0&&(t={});var e=t,r=e.placement,s=e.boundary,o=e.rootBoundary,c=e.padding,f=e.flipVariations,v=e.allowedAutoPlacements,M=v===void 0?si:v,g=ka(r),w=g?f?U2:U2.filter(function(p){return ka(p)===g}):Ra,T=w.filter(function(p){return M.indexOf(p)>=0});T.length===0&&(T=w);var b=T.reduce(function(p,u){return p[u]=Ia(a,{placement:u,boundary:s,rootBoundary:o,padding:c})[Le(u)],p},{});return Object.keys(b).sort(function(p,u){return b[p]-b[u]})}function rV(a){if(Le(a)===W1)return[];var t=D1(a);return[Q0(a),t,Q0(t)]}function nV(a){var t=a.state,e=a.options,r=a.name;if(!t.modifiersData[r]._skip){for(var s=e.mainAxis,o=s===void 0?!0:s,c=e.altAxis,f=c===void 0?!0:c,v=e.fallbackPlacements,M=e.padding,g=e.boundary,w=e.rootBoundary,T=e.altBoundary,b=e.flipVariations,p=b===void 0?!0:b,u=e.allowedAutoPlacements,A=t.options.placement,S=Le(A),C=S===A,E=v||(C||!p?[D1(A)]:rV(A)),L=[A].concat(E).reduce(function(jt,tt){return jt.concat(Le(tt)===W1?iV(t,{placement:tt,boundary:g,rootBoundary:w,padding:M,flipVariations:p,allowedAutoPlacements:u}):tt)},[]),O=t.rects.reference,q=t.rects.popper,h=new Map,W=!0,k=L[0],z=0;z<L.length;z++){var G=L[z],j=Le(G),I=ka(G)===ca,X=[Xt,ne].indexOf(j)>=0,J=X?"width":"height",Q=Ia(t,{placement:G,boundary:g,rootBoundary:w,altBoundary:T,padding:M}),N=X?I?se:Ut:I?ne:Xt;O[J]>q[J]&&(N=D1(N));var B=D1(N),at=[];if(o&&at.push(Q[j]<=0),f&&at.push(Q[N]<=0,Q[B]<=0),at.every(function(jt){return jt})){k=G,W=!1;break}h.set(G,at)}if(W)for(var pt=p?3:1,St=function(tt){var K=L.find(function(rt){var mt=h.get(rt);if(mt)return mt.slice(0,tt).every(function(Ht){return Ht})});if(K)return k=K,"break"},At=pt;At>0;At--){var Ot=St(At);if(Ot==="break")break}t.placement!==k&&(t.modifiersData[r]._skip=!0,t.placement=k,t.reset=!0)}}const hh={name:"flip",enabled:!0,phase:"main",fn:nV,requiresIfExists:["offset"],data:{_skip:!1}};function to(a,t,e){return e===void 0&&(e={x:0,y:0}),{top:a.top-t.height-e.y,right:a.right-t.width+e.x,bottom:a.bottom-t.height+e.y,left:a.left-t.width-e.x}}function eo(a){return[Xt,se,ne,Ut].some(function(t){return a[t]>=0})}function sV(a){var t=a.state,e=a.name,r=t.rects.reference,s=t.rects.popper,o=t.modifiersData.preventOverflow,c=Ia(t,{elementContext:"reference"}),f=Ia(t,{altBoundary:!0}),v=to(c,r),M=to(f,s,o),g=eo(v),w=eo(M);t.modifiersData[e]={referenceClippingOffsets:v,popperEscapeOffsets:M,isReferenceHidden:g,hasPopperEscaped:w},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":g,"data-popper-escaped":w})}const lh={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:sV};function oV(a,t,e){var r=Le(a),s=[Ut,Xt].indexOf(r)>=0?-1:1,o=typeof e=="function"?e(Object.assign({},t,{placement:a})):e,c=o[0],f=o[1];return c=c||0,f=(f||0)*s,[Ut,se].indexOf(r)>=0?{x:f,y:c}:{x:c,y:f}}function hV(a){var t=a.state,e=a.options,r=a.name,s=e.offset,o=s===void 0?[0,0]:s,c=si.reduce(function(g,w){return g[w]=oV(w,t.rects,o),g},{}),f=c[t.placement],v=f.x,M=f.y;t.modifiersData.popperOffsets!=null&&(t.modifiersData.popperOffsets.x+=v,t.modifiersData.popperOffsets.y+=M),t.modifiersData[r]=c}const dh={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:hV};function lV(a){var t=a.state,e=a.name;t.modifiersData[e]=oh({reference:t.rects.reference,element:t.rects.popper,placement:t.placement})}const mi={name:"popperOffsets",enabled:!0,phase:"read",fn:lV,data:{}};function dV(a){return a==="x"?"y":"x"}function cV(a){var t=a.state,e=a.options,r=a.name,s=e.mainAxis,o=s===void 0?!0:s,c=e.altAxis,f=c===void 0?!1:c,v=e.boundary,M=e.rootBoundary,g=e.altBoundary,w=e.padding,T=e.tether,b=T===void 0?!0:T,p=e.tetherOffset,u=p===void 0?0:p,A=Ia(t,{boundary:v,rootBoundary:M,padding:w,altBoundary:g}),S=Le(t.placement),C=ka(t.placement),E=!C,L=di(S),O=dV(L),q=t.modifiersData.popperOffsets,h=t.rects.reference,W=t.rects.popper,k=typeof u=="function"?u(Object.assign({},t.rects,{placement:t.placement})):u,z=typeof k=="number"?{mainAxis:k,altAxis:k}:Object.assign({mainAxis:0,altAxis:0},k),G=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,j={x:0,y:0};if(q){if(o){var I,X=L==="y"?Xt:Ut,J=L==="y"?ne:se,Q=L==="y"?"height":"width",N=q[L],B=N+A[X],at=N-A[J],pt=b?-W[Q]/2:0,St=C===ca?h[Q]:W[Q],At=C===ca?-W[Q]:-h[Q],Ot=t.elements.arrow,jt=b&&Ot?li(Ot):{width:0,height:0},tt=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:ah(),K=tt[X],rt=tt[J],mt=r1(0,h[Q],jt[Q]),Ht=E?h[Q]/2-pt-mt-K-z.mainAxis:St-mt-K-z.mainAxis,Vt=E?-h[Q]/2+pt+mt+rt+z.mainAxis:At+mt+rt+z.mainAxis,Yt=t.elements.arrow&&l1(t.elements.arrow),It=Yt?L==="y"?Yt.clientTop||0:Yt.clientLeft||0:0,Ft=(I=G==null?void 0:G[L])!=null?I:0,Pt=N+Ht-Ft-It,Gt=N+Vt-Ft,he=r1(b?z1(B,Pt):B,N,b?da(at,Gt):at);q[L]=he,j[L]=he-N}if(f){var le,Nt=L==="x"?Xt:Ut,Se=L==="x"?ne:se,Kt=q[O],ye=O==="y"?"height":"width",$t=Kt+A[Nt],de=Kt-A[Se],ae=[Xt,Ut].indexOf(S)!==-1,ht=(le=G==null?void 0:G[O])!=null?le:0,Dt=ae?$t:Kt-h[ye]-W[ye]-ht+z.altAxis,xe=ae?Kt+h[ye]+W[ye]-ht-z.altAxis:de,ta=b&&ae?FL(Dt,Kt,xe):r1(b?Dt:$t,Kt,b?xe:de);q[O]=ta,j[O]=ta-Kt}t.modifiersData[r]=j}}const ch={name:"preventOverflow",enabled:!0,phase:"main",fn:cV,requiresIfExists:["offset"]};function pV(a){return{scrollLeft:a.scrollLeft,scrollTop:a.scrollTop}}function uV(a){return a===oe(a)||!Me(a)?ui(a):pV(a)}function fV(a){var t=a.getBoundingClientRect(),e=Da(t.width)/a.offsetWidth||1,r=Da(t.height)/a.offsetHeight||1;return e!==1||r!==1}function MV(a,t,e){e===void 0&&(e=!1);var r=Me(t),s=Me(t)&&fV(t),o=Ke(t),c=Oa(a,s,e),f={scrollLeft:0,scrollTop:0},v={x:0,y:0};return(r||!r&&!e)&&((Pe(t)!=="body"||Mi(o))&&(f=uV(t)),Me(t)?(v=Oa(t,!0),v.x+=t.clientLeft,v.y+=t.clientTop):o&&(v.x=fi(o))),{x:c.left+f.scrollLeft-v.x,y:c.top+f.scrollTop-v.y,width:c.width,height:c.height}}function mV(a){var t=new Map,e=new Set,r=[];a.forEach(function(o){t.set(o.name,o)});function s(o){e.add(o.name);var c=[].concat(o.requires||[],o.requiresIfExists||[]);c.forEach(function(f){if(!e.has(f)){var v=t.get(f);v&&s(v)}}),r.push(o)}return a.forEach(function(o){e.has(o.name)||s(o)}),r}function vV(a){var t=mV(a);return Jo.reduce(function(e,r){return e.concat(t.filter(function(s){return s.phase===r}))},[])}function gV(a){var t;return function(){return t||(t=new Promise(function(e){Promise.resolve().then(function(){t=void 0,e(a())})})),t}}function yV(a){var t=a.reduce(function(e,r){var s=e[r.name];return e[r.name]=s?Object.assign({},s,r,{options:Object.assign({},s.options,r.options),data:Object.assign({},s.data,r.data)}):r,e},{});return Object.keys(t).map(function(e){return t[e]})}var ao={placement:"bottom",modifiers:[],strategy:"absolute"};function io(){for(var a=arguments.length,t=new Array(a),e=0;e<a;e++)t[e]=arguments[e];return!t.some(function(r){return!(r&&typeof r.getBoundingClientRect=="function")})}function G1(a){a===void 0&&(a={});var t=a,e=t.defaultModifiers,r=e===void 0?[]:e,s=t.defaultOptions,o=s===void 0?ao:s;return function(f,v,M){M===void 0&&(M=o);var g={placement:"bottom",orderedModifiers:[],options:Object.assign({},ao,o),modifiersData:{},elements:{reference:f,popper:v},attributes:{},styles:{}},w=[],T=!1,b={state:g,setOptions:function(S){var C=typeof S=="function"?S(g.options):S;u(),g.options=Object.assign({},o,g.options,C),g.scrollParents={reference:pa(f)?n1(f):f.contextElement?n1(f.contextElement):[],popper:n1(v)};var E=vV(yV([].concat(r,g.options.modifiers)));return g.orderedModifiers=E.filter(function(L){return L.enabled}),p(),b.update()},forceUpdate:function(){if(!T){var S=g.elements,C=S.reference,E=S.popper;if(io(C,E)){g.rects={reference:MV(C,l1(E),g.options.strategy==="fixed"),popper:li(E)},g.reset=!1,g.placement=g.options.placement,g.orderedModifiers.forEach(function(z){return g.modifiersData[z.name]=Object.assign({},z.data)});for(var L=0;L<g.orderedModifiers.length;L++){if(g.reset===!0){g.reset=!1,L=-1;continue}var O=g.orderedModifiers[L],q=O.fn,h=O.options,W=h===void 0?{}:h,k=O.name;typeof q=="function"&&(g=q({state:g,options:W,name:k,instance:b})||g)}}}},update:gV(function(){return new Promise(function(A){b.forceUpdate(),A(g)})}),destroy:function(){u(),T=!0}};if(!io(f,v))return b;b.setOptions(M).then(function(A){!T&&M.onFirstUpdate&&M.onFirstUpdate(A)});function p(){g.orderedModifiers.forEach(function(A){var S=A.name,C=A.options,E=C===void 0?{}:C,L=A.effect;if(typeof L=="function"){var O=L({state:g,name:S,instance:b,options:E}),q=function(){};w.push(O||q)}})}function u(){w.forEach(function(A){return A()}),w=[]}return b}}var xV=G1(),wV=[pi,mi,ci,hi],bV=G1({defaultModifiers:wV}),EV=[pi,mi,ci,hi,dh,hh,ch,nh,lh],vi=G1({defaultModifiers:EV});const ph=Object.freeze(Object.defineProperty({__proto__:null,afterMain:Uo,afterRead:Go,afterWrite:Qo,applyStyles:hi,arrow:nh,auto:W1,basePlacements:Ra,beforeMain:Zo,beforeRead:Wo,beforeWrite:Yo,bottom:ne,clippingParents:Fo,computeStyles:ci,createPopper:vi,createPopperBase:xV,createPopperLite:bV,detectOverflow:Ia,end:Pa,eventListeners:pi,flip:hh,hide:lh,left:Ut,main:Xo,modifierPhases:Jo,offset:dh,placements:si,popper:Aa,popperGenerator:G1,popperOffsets:mi,preventOverflow:ch,read:jo,reference:qo,right:se,start:ca,top:Xt,variationPlacements:U2,viewport:ni,write:Ko},Symbol.toStringTag,{value:"Module"}));/*!
  * Bootstrap v5.3.7 (https://getbootstrap.com/)
  * Copyright 2011-2025 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */const je=new Map,L2={set(a,t,e){je.has(a)||je.set(a,new Map);const r=je.get(a);if(!r.has(t)&&r.size!==0){console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(r.keys())[0]}.`);return}r.set(t,e)},get(a,t){return je.has(a)&&je.get(a).get(t)||null},remove(a,t){if(!je.has(a))return;const e=je.get(a);e.delete(t),e.size===0&&je.delete(a)}},SV=1e6,CV=1e3,Q2="transitionend",uh=a=>(a&&window.CSS&&window.CSS.escape&&(a=a.replace(/#([^\s"#']+)/g,(t,e)=>`#${CSS.escape(e)}`)),a),AV=a=>a==null?`${a}`:Object.prototype.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase(),TV=a=>{do a+=Math.floor(Math.random()*SV);while(document.getElementById(a));return a},_V=a=>{if(!a)return 0;let{transitionDuration:t,transitionDelay:e}=window.getComputedStyle(a);const r=Number.parseFloat(t),s=Number.parseFloat(e);return!r&&!s?0:(t=t.split(",")[0],e=e.split(",")[0],(Number.parseFloat(t)+Number.parseFloat(e))*CV)},fh=a=>{a.dispatchEvent(new Event(Q2))},Ne=a=>!a||typeof a!="object"?!1:(typeof a.jquery<"u"&&(a=a[0]),typeof a.nodeType<"u"),Xe=a=>Ne(a)?a.jquery?a[0]:a:typeof a=="string"&&a.length>0?document.querySelector(uh(a)):null,Ba=a=>{if(!Ne(a)||a.getClientRects().length===0)return!1;const t=getComputedStyle(a).getPropertyValue("visibility")==="visible",e=a.closest("details:not([open])");if(!e)return t;if(e!==a){const r=a.closest("summary");if(r&&r.parentNode!==e||r===null)return!1}return t},Ue=a=>!a||a.nodeType!==Node.ELEMENT_NODE||a.classList.contains("disabled")?!0:typeof a.disabled<"u"?a.disabled:a.hasAttribute("disabled")&&a.getAttribute("disabled")!=="false",Mh=a=>{if(!document.documentElement.attachShadow)return null;if(typeof a.getRootNode=="function"){const t=a.getRootNode();return t instanceof ShadowRoot?t:null}return a instanceof ShadowRoot?a:a.parentNode?Mh(a.parentNode):null},$1=()=>{},d1=a=>{a.offsetHeight},mh=()=>window.jQuery&&!document.body.hasAttribute("data-bs-no-jquery")?window.jQuery:null,V2=[],HV=a=>{document.readyState==="loading"?(V2.length||document.addEventListener("DOMContentLoaded",()=>{for(const t of V2)t()}),V2.push(a)):a()},me=()=>document.documentElement.dir==="rtl",ge=a=>{HV(()=>{const t=mh();if(t){const e=a.NAME,r=t.fn[e];t.fn[e]=a.jQueryInterface,t.fn[e].Constructor=a,t.fn[e].noConflict=()=>(t.fn[e]=r,a.jQueryInterface)}})},ee=(a,t=[],e=a)=>typeof a=="function"?a.call(...t):e,vh=(a,t,e=!0)=>{if(!e){ee(a);return}const s=_V(t)+5;let o=!1;const c=({target:f})=>{f===t&&(o=!0,t.removeEventListener(Q2,c),ee(a))};t.addEventListener(Q2,c),setTimeout(()=>{o||fh(t)},s)},gi=(a,t,e,r)=>{const s=a.length;let o=a.indexOf(t);return o===-1?!e&&r?a[s-1]:a[0]:(o+=e?1:-1,r&&(o=(o+s)%s),a[Math.max(0,Math.min(o,s-1))])},LV=/[^.]*(?=\..*)\.|.*/,VV=/\..*/,PV=/::\d+$/,P2={};let ro=1;const gh={mouseenter:"mouseover",mouseleave:"mouseout"},DV=new Set(["click","dblclick","mouseup","mousedown","contextmenu","mousewheel","DOMMouseScroll","mouseover","mouseout","mousemove","selectstart","selectend","keydown","keypress","keyup","orientationchange","touchstart","touchmove","touchend","touchcancel","pointerdown","pointermove","pointerup","pointerleave","pointercancel","gesturestart","gesturechange","gestureend","focus","blur","change","reset","select","submit","focusin","focusout","load","unload","beforeunload","resize","move","DOMContentLoaded","readystatechange","error","abort","scroll"]);function yh(a,t){return t&&`${t}::${ro++}`||a.uidEvent||ro++}function xh(a){const t=yh(a);return a.uidEvent=t,P2[t]=P2[t]||{},P2[t]}function OV(a,t){return function e(r){return yi(r,{delegateTarget:a}),e.oneOff&&et.off(a,r.type,t),t.apply(a,[r])}}function kV(a,t,e){return function r(s){const o=a.querySelectorAll(t);for(let{target:c}=s;c&&c!==this;c=c.parentNode)for(const f of o)if(f===c)return yi(s,{delegateTarget:c}),r.oneOff&&et.off(a,s.type,t,e),e.apply(c,[s])}}function wh(a,t,e=null){return Object.values(a).find(r=>r.callable===t&&r.delegationSelector===e)}function bh(a,t,e){const r=typeof t=="string",s=r?e:t||e;let o=Eh(a);return DV.has(o)||(o=a),[r,s,o]}function no(a,t,e,r,s){if(typeof t!="string"||!a)return;let[o,c,f]=bh(t,e,r);t in gh&&(c=(p=>function(u){if(!u.relatedTarget||u.relatedTarget!==u.delegateTarget&&!u.delegateTarget.contains(u.relatedTarget))return p.call(this,u)})(c));const v=xh(a),M=v[f]||(v[f]={}),g=wh(M,c,o?e:null);if(g){g.oneOff=g.oneOff&&s;return}const w=yh(c,t.replace(LV,"")),T=o?kV(a,e,c):OV(a,c);T.delegationSelector=o?e:null,T.callable=c,T.oneOff=s,T.uidEvent=w,M[w]=T,a.addEventListener(f,T,o)}function J2(a,t,e,r,s){const o=wh(t[e],r,s);o&&(a.removeEventListener(e,o,!!s),delete t[e][o.uidEvent])}function IV(a,t,e,r){const s=t[e]||{};for(const[o,c]of Object.entries(s))o.includes(r)&&J2(a,t,e,c.callable,c.delegationSelector)}function Eh(a){return a=a.replace(VV,""),gh[a]||a}const et={on(a,t,e,r){no(a,t,e,r,!1)},one(a,t,e,r){no(a,t,e,r,!0)},off(a,t,e,r){if(typeof t!="string"||!a)return;const[s,o,c]=bh(t,e,r),f=c!==t,v=xh(a),M=v[c]||{},g=t.startsWith(".");if(typeof o<"u"){if(!Object.keys(M).length)return;J2(a,v,c,o,s?e:null);return}if(g)for(const w of Object.keys(v))IV(a,v,w,t.slice(1));for(const[w,T]of Object.entries(M)){const b=w.replace(PV,"");(!f||t.includes(b))&&J2(a,v,c,T.callable,T.delegationSelector)}},trigger(a,t,e){if(typeof t!="string"||!a)return null;const r=mh(),s=Eh(t),o=t!==s;let c=null,f=!0,v=!0,M=!1;o&&r&&(c=r.Event(t,e),r(a).trigger(c),f=!c.isPropagationStopped(),v=!c.isImmediatePropagationStopped(),M=c.isDefaultPrevented());const g=yi(new Event(t,{bubbles:f,cancelable:!0}),e);return M&&g.preventDefault(),v&&a.dispatchEvent(g),g.defaultPrevented&&c&&c.preventDefault(),g}};function yi(a,t={}){for(const[e,r]of Object.entries(t))try{a[e]=r}catch{Object.defineProperty(a,e,{configurable:!0,get(){return r}})}return a}function so(a){if(a==="true")return!0;if(a==="false")return!1;if(a===Number(a).toString())return Number(a);if(a===""||a==="null")return null;if(typeof a!="string")return a;try{return JSON.parse(decodeURIComponent(a))}catch{return a}}function D2(a){return a.replace(/[A-Z]/g,t=>`-${t.toLowerCase()}`)}const ze={setDataAttribute(a,t,e){a.setAttribute(`data-bs-${D2(t)}`,e)},removeDataAttribute(a,t){a.removeAttribute(`data-bs-${D2(t)}`)},getDataAttributes(a){if(!a)return{};const t={},e=Object.keys(a.dataset).filter(r=>r.startsWith("bs")&&!r.startsWith("bsConfig"));for(const r of e){let s=r.replace(/^bs/,"");s=s.charAt(0).toLowerCase()+s.slice(1),t[s]=so(a.dataset[r])}return t},getDataAttribute(a,t){return so(a.getAttribute(`data-bs-${D2(t)}`))}};class c1{static get Default(){return{}}static get DefaultType(){return{}}static get NAME(){throw new Error('You have to implement the static method "NAME", for each component!')}_getConfig(t){return t=this._mergeConfigObj(t),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}_configAfterMerge(t){return t}_mergeConfigObj(t,e){const r=Ne(e)?ze.getDataAttribute(e,"config"):{};return{...this.constructor.Default,...typeof r=="object"?r:{},...Ne(e)?ze.getDataAttributes(e):{},...typeof t=="object"?t:{}}}_typeCheckConfig(t,e=this.constructor.DefaultType){for(const[r,s]of Object.entries(e)){const o=t[r],c=Ne(o)?"element":AV(o);if(!new RegExp(s).test(c))throw new TypeError(`${this.constructor.NAME.toUpperCase()}: Option "${r}" provided type "${c}" but expected type "${s}".`)}}}const NV="5.3.7";class Ee extends c1{constructor(t,e){super(),t=Xe(t),t&&(this._element=t,this._config=this._getConfig(e),L2.set(this._element,this.constructor.DATA_KEY,this))}dispose(){L2.remove(this._element,this.constructor.DATA_KEY),et.off(this._element,this.constructor.EVENT_KEY);for(const t of Object.getOwnPropertyNames(this))this[t]=null}_queueCallback(t,e,r=!0){vh(t,e,r)}_getConfig(t){return t=this._mergeConfigObj(t,this._element),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}static getInstance(t){return L2.get(Xe(t),this.DATA_KEY)}static getOrCreateInstance(t,e={}){return this.getInstance(t)||new this(t,typeof e=="object"?e:null)}static get VERSION(){return NV}static get DATA_KEY(){return`bs.${this.NAME}`}static get EVENT_KEY(){return`.${this.DATA_KEY}`}static eventName(t){return`${t}${this.EVENT_KEY}`}}const O2=a=>{let t=a.getAttribute("data-bs-target");if(!t||t==="#"){let e=a.getAttribute("href");if(!e||!e.includes("#")&&!e.startsWith("."))return null;e.includes("#")&&!e.startsWith("#")&&(e=`#${e.split("#")[1]}`),t=e&&e!=="#"?e.trim():null}return t?t.split(",").map(e=>uh(e)).join(","):null},dt={find(a,t=document.documentElement){return[].concat(...Element.prototype.querySelectorAll.call(t,a))},findOne(a,t=document.documentElement){return Element.prototype.querySelector.call(t,a)},children(a,t){return[].concat(...a.children).filter(e=>e.matches(t))},parents(a,t){const e=[];let r=a.parentNode.closest(t);for(;r;)e.push(r),r=r.parentNode.closest(t);return e},prev(a,t){let e=a.previousElementSibling;for(;e;){if(e.matches(t))return[e];e=e.previousElementSibling}return[]},next(a,t){let e=a.nextElementSibling;for(;e;){if(e.matches(t))return[e];e=e.nextElementSibling}return[]},focusableChildren(a){const t=["a","button","input","textarea","select","details","[tabindex]",'[contenteditable="true"]'].map(e=>`${e}:not([tabindex^="-"])`).join(",");return this.find(t,a).filter(e=>!Ue(e)&&Ba(e))},getSelectorFromElement(a){const t=O2(a);return t&&dt.findOne(t)?t:null},getElementFromSelector(a){const t=O2(a);return t?dt.findOne(t):null},getMultipleElementsFromSelector(a){const t=O2(a);return t?dt.find(t):[]}},Z1=(a,t="hide")=>{const e=`click.dismiss${a.EVENT_KEY}`,r=a.NAME;et.on(document,e,`[data-bs-dismiss="${r}"]`,function(s){if(["A","AREA"].includes(this.tagName)&&s.preventDefault(),Ue(this))return;const o=dt.getElementFromSelector(this)||this.closest(`.${r}`);a.getOrCreateInstance(o)[t]()})},zV="alert",$V="bs.alert",Sh=`.${$V}`,RV=`close${Sh}`,BV=`closed${Sh}`,FV="fade",qV="show";class X1 extends Ee{static get NAME(){return zV}close(){if(et.trigger(this._element,RV).defaultPrevented)return;this._element.classList.remove(qV);const e=this._element.classList.contains(FV);this._queueCallback(()=>this._destroyElement(),this._element,e)}_destroyElement(){this._element.remove(),et.trigger(this._element,BV),this.dispose()}static jQueryInterface(t){return this.each(function(){const e=X1.getOrCreateInstance(this);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}Z1(X1,"close");ge(X1);const WV="button",jV="bs.button",GV=`.${jV}`,ZV=".data-api",XV="active",oo='[data-bs-toggle="button"]',UV=`click${GV}${ZV}`;class U1 extends Ee{static get NAME(){return WV}toggle(){this._element.setAttribute("aria-pressed",this._element.classList.toggle(XV))}static jQueryInterface(t){return this.each(function(){const e=U1.getOrCreateInstance(this);t==="toggle"&&e[t]()})}}et.on(document,UV,oo,a=>{a.preventDefault();const t=a.target.closest(oo);U1.getOrCreateInstance(t).toggle()});ge(U1);const YV="swipe",Fa=".bs.swipe",KV=`touchstart${Fa}`,QV=`touchmove${Fa}`,JV=`touchend${Fa}`,tP=`pointerdown${Fa}`,eP=`pointerup${Fa}`,aP="touch",iP="pen",rP="pointer-event",nP=40,sP={endCallback:null,leftCallback:null,rightCallback:null},oP={endCallback:"(function|null)",leftCallback:"(function|null)",rightCallback:"(function|null)"};class R1 extends c1{constructor(t,e){super(),this._element=t,!(!t||!R1.isSupported())&&(this._config=this._getConfig(e),this._deltaX=0,this._supportPointerEvents=!!window.PointerEvent,this._initEvents())}static get Default(){return sP}static get DefaultType(){return oP}static get NAME(){return YV}dispose(){et.off(this._element,Fa)}_start(t){if(!this._supportPointerEvents){this._deltaX=t.touches[0].clientX;return}this._eventIsPointerPenTouch(t)&&(this._deltaX=t.clientX)}_end(t){this._eventIsPointerPenTouch(t)&&(this._deltaX=t.clientX-this._deltaX),this._handleSwipe(),ee(this._config.endCallback)}_move(t){this._deltaX=t.touches&&t.touches.length>1?0:t.touches[0].clientX-this._deltaX}_handleSwipe(){const t=Math.abs(this._deltaX);if(t<=nP)return;const e=t/this._deltaX;this._deltaX=0,e&&ee(e>0?this._config.rightCallback:this._config.leftCallback)}_initEvents(){this._supportPointerEvents?(et.on(this._element,tP,t=>this._start(t)),et.on(this._element,eP,t=>this._end(t)),this._element.classList.add(rP)):(et.on(this._element,KV,t=>this._start(t)),et.on(this._element,QV,t=>this._move(t)),et.on(this._element,JV,t=>this._end(t)))}_eventIsPointerPenTouch(t){return this._supportPointerEvents&&(t.pointerType===iP||t.pointerType===aP)}static isSupported(){return"ontouchstart"in document.documentElement||navigator.maxTouchPoints>0}}const hP="carousel",lP="bs.carousel",Qe=`.${lP}`,Ch=".data-api",dP="ArrowLeft",cP="ArrowRight",pP=500,Ja="next",Sa="prev",Ta="left",O1="right",uP=`slide${Qe}`,k2=`slid${Qe}`,fP=`keydown${Qe}`,MP=`mouseenter${Qe}`,mP=`mouseleave${Qe}`,vP=`dragstart${Qe}`,gP=`load${Qe}${Ch}`,yP=`click${Qe}${Ch}`,Ah="carousel",C1="active",xP="slide",wP="carousel-item-end",bP="carousel-item-start",EP="carousel-item-next",SP="carousel-item-prev",Th=".active",_h=".carousel-item",CP=Th+_h,AP=".carousel-item img",TP=".carousel-indicators",_P="[data-bs-slide], [data-bs-slide-to]",HP='[data-bs-ride="carousel"]',LP={[dP]:O1,[cP]:Ta},VP={interval:5e3,keyboard:!0,pause:"hover",ride:!1,touch:!0,wrap:!0},PP={interval:"(number|boolean)",keyboard:"boolean",pause:"(string|boolean)",ride:"(boolean|string)",touch:"boolean",wrap:"boolean"};class p1 extends Ee{constructor(t,e){super(t,e),this._interval=null,this._activeElement=null,this._isSliding=!1,this.touchTimeout=null,this._swipeHelper=null,this._indicatorsElement=dt.findOne(TP,this._element),this._addEventListeners(),this._config.ride===Ah&&this.cycle()}static get Default(){return VP}static get DefaultType(){return PP}static get NAME(){return hP}next(){this._slide(Ja)}nextWhenVisible(){!document.hidden&&Ba(this._element)&&this.next()}prev(){this._slide(Sa)}pause(){this._isSliding&&fh(this._element),this._clearInterval()}cycle(){this._clearInterval(),this._updateInterval(),this._interval=setInterval(()=>this.nextWhenVisible(),this._config.interval)}_maybeEnableCycle(){if(this._config.ride){if(this._isSliding){et.one(this._element,k2,()=>this.cycle());return}this.cycle()}}to(t){const e=this._getItems();if(t>e.length-1||t<0)return;if(this._isSliding){et.one(this._element,k2,()=>this.to(t));return}const r=this._getItemIndex(this._getActive());if(r===t)return;const s=t>r?Ja:Sa;this._slide(s,e[t])}dispose(){this._swipeHelper&&this._swipeHelper.dispose(),super.dispose()}_configAfterMerge(t){return t.defaultInterval=t.interval,t}_addEventListeners(){this._config.keyboard&&et.on(this._element,fP,t=>this._keydown(t)),this._config.pause==="hover"&&(et.on(this._element,MP,()=>this.pause()),et.on(this._element,mP,()=>this._maybeEnableCycle())),this._config.touch&&R1.isSupported()&&this._addTouchEventListeners()}_addTouchEventListeners(){for(const r of dt.find(AP,this._element))et.on(r,vP,s=>s.preventDefault());const e={leftCallback:()=>this._slide(this._directionToOrder(Ta)),rightCallback:()=>this._slide(this._directionToOrder(O1)),endCallback:()=>{this._config.pause==="hover"&&(this.pause(),this.touchTimeout&&clearTimeout(this.touchTimeout),this.touchTimeout=setTimeout(()=>this._maybeEnableCycle(),pP+this._config.interval))}};this._swipeHelper=new R1(this._element,e)}_keydown(t){if(/input|textarea/i.test(t.target.tagName))return;const e=LP[t.key];e&&(t.preventDefault(),this._slide(this._directionToOrder(e)))}_getItemIndex(t){return this._getItems().indexOf(t)}_setActiveIndicatorElement(t){if(!this._indicatorsElement)return;const e=dt.findOne(Th,this._indicatorsElement);e.classList.remove(C1),e.removeAttribute("aria-current");const r=dt.findOne(`[data-bs-slide-to="${t}"]`,this._indicatorsElement);r&&(r.classList.add(C1),r.setAttribute("aria-current","true"))}_updateInterval(){const t=this._activeElement||this._getActive();if(!t)return;const e=Number.parseInt(t.getAttribute("data-bs-interval"),10);this._config.interval=e||this._config.defaultInterval}_slide(t,e=null){if(this._isSliding)return;const r=this._getActive(),s=t===Ja,o=e||gi(this._getItems(),r,s,this._config.wrap);if(o===r)return;const c=this._getItemIndex(o),f=b=>et.trigger(this._element,b,{relatedTarget:o,direction:this._orderToDirection(t),from:this._getItemIndex(r),to:c});if(f(uP).defaultPrevented||!r||!o)return;const M=!!this._interval;this.pause(),this._isSliding=!0,this._setActiveIndicatorElement(c),this._activeElement=o;const g=s?bP:wP,w=s?EP:SP;o.classList.add(w),d1(o),r.classList.add(g),o.classList.add(g);const T=()=>{o.classList.remove(g,w),o.classList.add(C1),r.classList.remove(C1,w,g),this._isSliding=!1,f(k2)};this._queueCallback(T,r,this._isAnimated()),M&&this.cycle()}_isAnimated(){return this._element.classList.contains(xP)}_getActive(){return dt.findOne(CP,this._element)}_getItems(){return dt.find(_h,this._element)}_clearInterval(){this._interval&&(clearInterval(this._interval),this._interval=null)}_directionToOrder(t){return me()?t===Ta?Sa:Ja:t===Ta?Ja:Sa}_orderToDirection(t){return me()?t===Sa?Ta:O1:t===Sa?O1:Ta}static jQueryInterface(t){return this.each(function(){const e=p1.getOrCreateInstance(this,t);if(typeof t=="number"){e.to(t);return}if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(document,yP,_P,function(a){const t=dt.getElementFromSelector(this);if(!t||!t.classList.contains(Ah))return;a.preventDefault();const e=p1.getOrCreateInstance(t),r=this.getAttribute("data-bs-slide-to");if(r){e.to(r),e._maybeEnableCycle();return}if(ze.getDataAttribute(this,"slide")==="next"){e.next(),e._maybeEnableCycle();return}e.prev(),e._maybeEnableCycle()});et.on(window,gP,()=>{const a=dt.find(HP);for(const t of a)p1.getOrCreateInstance(t)});ge(p1);const DP="collapse",OP="bs.collapse",u1=`.${OP}`,kP=".data-api",IP=`show${u1}`,NP=`shown${u1}`,zP=`hide${u1}`,$P=`hidden${u1}`,RP=`click${u1}${kP}`,I2="show",Ha="collapse",A1="collapsing",BP="collapsed",FP=`:scope .${Ha} .${Ha}`,qP="collapse-horizontal",WP="width",jP="height",GP=".collapse.show, .collapse.collapsing",ti='[data-bs-toggle="collapse"]',ZP={parent:null,toggle:!0},XP={parent:"(null|element)",toggle:"boolean"};class o1 extends Ee{constructor(t,e){super(t,e),this._isTransitioning=!1,this._triggerArray=[];const r=dt.find(ti);for(const s of r){const o=dt.getSelectorFromElement(s),c=dt.find(o).filter(f=>f===this._element);o!==null&&c.length&&this._triggerArray.push(s)}this._initializeChildren(),this._config.parent||this._addAriaAndCollapsedClass(this._triggerArray,this._isShown()),this._config.toggle&&this.toggle()}static get Default(){return ZP}static get DefaultType(){return XP}static get NAME(){return DP}toggle(){this._isShown()?this.hide():this.show()}show(){if(this._isTransitioning||this._isShown())return;let t=[];if(this._config.parent&&(t=this._getFirstLevelChildren(GP).filter(f=>f!==this._element).map(f=>o1.getOrCreateInstance(f,{toggle:!1}))),t.length&&t[0]._isTransitioning||et.trigger(this._element,IP).defaultPrevented)return;for(const f of t)f.hide();const r=this._getDimension();this._element.classList.remove(Ha),this._element.classList.add(A1),this._element.style[r]=0,this._addAriaAndCollapsedClass(this._triggerArray,!0),this._isTransitioning=!0;const s=()=>{this._isTransitioning=!1,this._element.classList.remove(A1),this._element.classList.add(Ha,I2),this._element.style[r]="",et.trigger(this._element,NP)},c=`scroll${r[0].toUpperCase()+r.slice(1)}`;this._queueCallback(s,this._element,!0),this._element.style[r]=`${this._element[c]}px`}hide(){if(this._isTransitioning||!this._isShown()||et.trigger(this._element,zP).defaultPrevented)return;const e=this._getDimension();this._element.style[e]=`${this._element.getBoundingClientRect()[e]}px`,d1(this._element),this._element.classList.add(A1),this._element.classList.remove(Ha,I2);for(const s of this._triggerArray){const o=dt.getElementFromSelector(s);o&&!this._isShown(o)&&this._addAriaAndCollapsedClass([s],!1)}this._isTransitioning=!0;const r=()=>{this._isTransitioning=!1,this._element.classList.remove(A1),this._element.classList.add(Ha),et.trigger(this._element,$P)};this._element.style[e]="",this._queueCallback(r,this._element,!0)}_isShown(t=this._element){return t.classList.contains(I2)}_configAfterMerge(t){return t.toggle=!!t.toggle,t.parent=Xe(t.parent),t}_getDimension(){return this._element.classList.contains(qP)?WP:jP}_initializeChildren(){if(!this._config.parent)return;const t=this._getFirstLevelChildren(ti);for(const e of t){const r=dt.getElementFromSelector(e);r&&this._addAriaAndCollapsedClass([e],this._isShown(r))}}_getFirstLevelChildren(t){const e=dt.find(FP,this._config.parent);return dt.find(t,this._config.parent).filter(r=>!e.includes(r))}_addAriaAndCollapsedClass(t,e){if(t.length)for(const r of t)r.classList.toggle(BP,!e),r.setAttribute("aria-expanded",e)}static jQueryInterface(t){const e={};return typeof t=="string"&&/show|hide/.test(t)&&(e.toggle=!1),this.each(function(){const r=o1.getOrCreateInstance(this,e);if(typeof t=="string"){if(typeof r[t]>"u")throw new TypeError(`No method named "${t}"`);r[t]()}})}}et.on(document,RP,ti,function(a){(a.target.tagName==="A"||a.delegateTarget&&a.delegateTarget.tagName==="A")&&a.preventDefault();for(const t of dt.getMultipleElementsFromSelector(this))o1.getOrCreateInstance(t,{toggle:!1}).toggle()});ge(o1);const ho="dropdown",UP="bs.dropdown",fa=`.${UP}`,xi=".data-api",YP="Escape",lo="Tab",KP="ArrowUp",co="ArrowDown",QP=2,JP=`hide${fa}`,tD=`hidden${fa}`,eD=`show${fa}`,aD=`shown${fa}`,Hh=`click${fa}${xi}`,Lh=`keydown${fa}${xi}`,iD=`keyup${fa}${xi}`,_a="show",rD="dropup",nD="dropend",sD="dropstart",oD="dropup-center",hD="dropdown-center",oa='[data-bs-toggle="dropdown"]:not(.disabled):not(:disabled)',lD=`${oa}.${_a}`,k1=".dropdown-menu",dD=".navbar",cD=".navbar-nav",pD=".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",uD=me()?"top-end":"top-start",fD=me()?"top-start":"top-end",MD=me()?"bottom-end":"bottom-start",mD=me()?"bottom-start":"bottom-end",vD=me()?"left-start":"right-start",gD=me()?"right-start":"left-start",yD="top",xD="bottom",wD={autoClose:!0,boundary:"clippingParents",display:"dynamic",offset:[0,2],popperConfig:null,reference:"toggle"},bD={autoClose:"(boolean|string)",boundary:"(string|element)",display:"string",offset:"(array|string|function)",popperConfig:"(null|object|function)",reference:"(string|element|object)"};class Ve extends Ee{constructor(t,e){super(t,e),this._popper=null,this._parent=this._element.parentNode,this._menu=dt.next(this._element,k1)[0]||dt.prev(this._element,k1)[0]||dt.findOne(k1,this._parent),this._inNavbar=this._detectNavbar()}static get Default(){return wD}static get DefaultType(){return bD}static get NAME(){return ho}toggle(){return this._isShown()?this.hide():this.show()}show(){if(Ue(this._element)||this._isShown())return;const t={relatedTarget:this._element};if(!et.trigger(this._element,eD,t).defaultPrevented){if(this._createPopper(),"ontouchstart"in document.documentElement&&!this._parent.closest(cD))for(const r of[].concat(...document.body.children))et.on(r,"mouseover",$1);this._element.focus(),this._element.setAttribute("aria-expanded",!0),this._menu.classList.add(_a),this._element.classList.add(_a),et.trigger(this._element,aD,t)}}hide(){if(Ue(this._element)||!this._isShown())return;const t={relatedTarget:this._element};this._completeHide(t)}dispose(){this._popper&&this._popper.destroy(),super.dispose()}update(){this._inNavbar=this._detectNavbar(),this._popper&&this._popper.update()}_completeHide(t){if(!et.trigger(this._element,JP,t).defaultPrevented){if("ontouchstart"in document.documentElement)for(const r of[].concat(...document.body.children))et.off(r,"mouseover",$1);this._popper&&this._popper.destroy(),this._menu.classList.remove(_a),this._element.classList.remove(_a),this._element.setAttribute("aria-expanded","false"),ze.removeDataAttribute(this._menu,"popper"),et.trigger(this._element,tD,t),this._element.focus()}}_getConfig(t){if(t=super._getConfig(t),typeof t.reference=="object"&&!Ne(t.reference)&&typeof t.reference.getBoundingClientRect!="function")throw new TypeError(`${ho.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);return t}_createPopper(){if(typeof ph>"u")throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org/docs/v2/)");let t=this._element;this._config.reference==="parent"?t=this._parent:Ne(this._config.reference)?t=Xe(this._config.reference):typeof this._config.reference=="object"&&(t=this._config.reference);const e=this._getPopperConfig();this._popper=vi(t,this._menu,e)}_isShown(){return this._menu.classList.contains(_a)}_getPlacement(){const t=this._parent;if(t.classList.contains(nD))return vD;if(t.classList.contains(sD))return gD;if(t.classList.contains(oD))return yD;if(t.classList.contains(hD))return xD;const e=getComputedStyle(this._menu).getPropertyValue("--bs-position").trim()==="end";return t.classList.contains(rD)?e?fD:uD:e?mD:MD}_detectNavbar(){return this._element.closest(dD)!==null}_getOffset(){const{offset:t}=this._config;return typeof t=="string"?t.split(",").map(e=>Number.parseInt(e,10)):typeof t=="function"?e=>t(e,this._element):t}_getPopperConfig(){const t={placement:this._getPlacement(),modifiers:[{name:"preventOverflow",options:{boundary:this._config.boundary}},{name:"offset",options:{offset:this._getOffset()}}]};return(this._inNavbar||this._config.display==="static")&&(ze.setDataAttribute(this._menu,"popper","static"),t.modifiers=[{name:"applyStyles",enabled:!1}]),{...t,...ee(this._config.popperConfig,[void 0,t])}}_selectMenuItem({key:t,target:e}){const r=dt.find(pD,this._menu).filter(s=>Ba(s));r.length&&gi(r,e,t===co,!r.includes(e)).focus()}static jQueryInterface(t){return this.each(function(){const e=Ve.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}static clearMenus(t){if(t.button===QP||t.type==="keyup"&&t.key!==lo)return;const e=dt.find(lD);for(const r of e){const s=Ve.getInstance(r);if(!s||s._config.autoClose===!1)continue;const o=t.composedPath(),c=o.includes(s._menu);if(o.includes(s._element)||s._config.autoClose==="inside"&&!c||s._config.autoClose==="outside"&&c||s._menu.contains(t.target)&&(t.type==="keyup"&&t.key===lo||/input|select|option|textarea|form/i.test(t.target.tagName)))continue;const f={relatedTarget:s._element};t.type==="click"&&(f.clickEvent=t),s._completeHide(f)}}static dataApiKeydownHandler(t){const e=/input|textarea/i.test(t.target.tagName),r=t.key===YP,s=[KP,co].includes(t.key);if(!s&&!r||e&&!r)return;t.preventDefault();const o=this.matches(oa)?this:dt.prev(this,oa)[0]||dt.next(this,oa)[0]||dt.findOne(oa,t.delegateTarget.parentNode),c=Ve.getOrCreateInstance(o);if(s){t.stopPropagation(),c.show(),c._selectMenuItem(t);return}c._isShown()&&(t.stopPropagation(),c.hide(),o.focus())}}et.on(document,Lh,oa,Ve.dataApiKeydownHandler);et.on(document,Lh,k1,Ve.dataApiKeydownHandler);et.on(document,Hh,Ve.clearMenus);et.on(document,iD,Ve.clearMenus);et.on(document,Hh,oa,function(a){a.preventDefault(),Ve.getOrCreateInstance(this).toggle()});ge(Ve);const Vh="backdrop",ED="fade",po="show",uo=`mousedown.bs.${Vh}`,SD={className:"modal-backdrop",clickCallback:null,isAnimated:!1,isVisible:!0,rootElement:"body"},CD={className:"string",clickCallback:"(function|null)",isAnimated:"boolean",isVisible:"boolean",rootElement:"(element|string)"};class Ph extends c1{constructor(t){super(),this._config=this._getConfig(t),this._isAppended=!1,this._element=null}static get Default(){return SD}static get DefaultType(){return CD}static get NAME(){return Vh}show(t){if(!this._config.isVisible){ee(t);return}this._append();const e=this._getElement();this._config.isAnimated&&d1(e),e.classList.add(po),this._emulateAnimation(()=>{ee(t)})}hide(t){if(!this._config.isVisible){ee(t);return}this._getElement().classList.remove(po),this._emulateAnimation(()=>{this.dispose(),ee(t)})}dispose(){this._isAppended&&(et.off(this._element,uo),this._element.remove(),this._isAppended=!1)}_getElement(){if(!this._element){const t=document.createElement("div");t.className=this._config.className,this._config.isAnimated&&t.classList.add(ED),this._element=t}return this._element}_configAfterMerge(t){return t.rootElement=Xe(t.rootElement),t}_append(){if(this._isAppended)return;const t=this._getElement();this._config.rootElement.append(t),et.on(t,uo,()=>{ee(this._config.clickCallback)}),this._isAppended=!0}_emulateAnimation(t){vh(t,this._getElement(),this._config.isAnimated)}}const AD="focustrap",TD="bs.focustrap",B1=`.${TD}`,_D=`focusin${B1}`,HD=`keydown.tab${B1}`,LD="Tab",VD="forward",fo="backward",PD={autofocus:!0,trapElement:null},DD={autofocus:"boolean",trapElement:"element"};class Dh extends c1{constructor(t){super(),this._config=this._getConfig(t),this._isActive=!1,this._lastTabNavDirection=null}static get Default(){return PD}static get DefaultType(){return DD}static get NAME(){return AD}activate(){this._isActive||(this._config.autofocus&&this._config.trapElement.focus(),et.off(document,B1),et.on(document,_D,t=>this._handleFocusin(t)),et.on(document,HD,t=>this._handleKeydown(t)),this._isActive=!0)}deactivate(){this._isActive&&(this._isActive=!1,et.off(document,B1))}_handleFocusin(t){const{trapElement:e}=this._config;if(t.target===document||t.target===e||e.contains(t.target))return;const r=dt.focusableChildren(e);r.length===0?e.focus():this._lastTabNavDirection===fo?r[r.length-1].focus():r[0].focus()}_handleKeydown(t){t.key===LD&&(this._lastTabNavDirection=t.shiftKey?fo:VD)}}const Mo=".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",mo=".sticky-top",T1="padding-right",vo="margin-right";class ei{constructor(){this._element=document.body}getWidth(){const t=document.documentElement.clientWidth;return Math.abs(window.innerWidth-t)}hide(){const t=this.getWidth();this._disableOverFlow(),this._setElementAttributes(this._element,T1,e=>e+t),this._setElementAttributes(Mo,T1,e=>e+t),this._setElementAttributes(mo,vo,e=>e-t)}reset(){this._resetElementAttributes(this._element,"overflow"),this._resetElementAttributes(this._element,T1),this._resetElementAttributes(Mo,T1),this._resetElementAttributes(mo,vo)}isOverflowing(){return this.getWidth()>0}_disableOverFlow(){this._saveInitialAttribute(this._element,"overflow"),this._element.style.overflow="hidden"}_setElementAttributes(t,e,r){const s=this.getWidth(),o=c=>{if(c!==this._element&&window.innerWidth>c.clientWidth+s)return;this._saveInitialAttribute(c,e);const f=window.getComputedStyle(c).getPropertyValue(e);c.style.setProperty(e,`${r(Number.parseFloat(f))}px`)};this._applyManipulationCallback(t,o)}_saveInitialAttribute(t,e){const r=t.style.getPropertyValue(e);r&&ze.setDataAttribute(t,e,r)}_resetElementAttributes(t,e){const r=s=>{const o=ze.getDataAttribute(s,e);if(o===null){s.style.removeProperty(e);return}ze.removeDataAttribute(s,e),s.style.setProperty(e,o)};this._applyManipulationCallback(t,r)}_applyManipulationCallback(t,e){if(Ne(t)){e(t);return}for(const r of dt.find(t,this._element))e(r)}}const OD="modal",kD="bs.modal",ve=`.${kD}`,ID=".data-api",ND="Escape",zD=`hide${ve}`,$D=`hidePrevented${ve}`,Oh=`hidden${ve}`,kh=`show${ve}`,RD=`shown${ve}`,BD=`resize${ve}`,FD=`click.dismiss${ve}`,qD=`mousedown.dismiss${ve}`,WD=`keydown.dismiss${ve}`,jD=`click${ve}${ID}`,go="modal-open",GD="fade",yo="show",N2="modal-static",ZD=".modal.show",XD=".modal-dialog",UD=".modal-body",YD='[data-bs-toggle="modal"]',KD={backdrop:!0,focus:!0,keyboard:!0},QD={backdrop:"(boolean|string)",focus:"boolean",keyboard:"boolean"};class Na extends Ee{constructor(t,e){super(t,e),this._dialog=dt.findOne(XD,this._element),this._backdrop=this._initializeBackDrop(),this._focustrap=this._initializeFocusTrap(),this._isShown=!1,this._isTransitioning=!1,this._scrollBar=new ei,this._addEventListeners()}static get Default(){return KD}static get DefaultType(){return QD}static get NAME(){return OD}toggle(t){return this._isShown?this.hide():this.show(t)}show(t){this._isShown||this._isTransitioning||et.trigger(this._element,kh,{relatedTarget:t}).defaultPrevented||(this._isShown=!0,this._isTransitioning=!0,this._scrollBar.hide(),document.body.classList.add(go),this._adjustDialog(),this._backdrop.show(()=>this._showElement(t)))}hide(){!this._isShown||this._isTransitioning||et.trigger(this._element,zD).defaultPrevented||(this._isShown=!1,this._isTransitioning=!0,this._focustrap.deactivate(),this._element.classList.remove(yo),this._queueCallback(()=>this._hideModal(),this._element,this._isAnimated()))}dispose(){et.off(window,ve),et.off(this._dialog,ve),this._backdrop.dispose(),this._focustrap.deactivate(),super.dispose()}handleUpdate(){this._adjustDialog()}_initializeBackDrop(){return new Ph({isVisible:!!this._config.backdrop,isAnimated:this._isAnimated()})}_initializeFocusTrap(){return new Dh({trapElement:this._element})}_showElement(t){document.body.contains(this._element)||document.body.append(this._element),this._element.style.display="block",this._element.removeAttribute("aria-hidden"),this._element.setAttribute("aria-modal",!0),this._element.setAttribute("role","dialog"),this._element.scrollTop=0;const e=dt.findOne(UD,this._dialog);e&&(e.scrollTop=0),d1(this._element),this._element.classList.add(yo);const r=()=>{this._config.focus&&this._focustrap.activate(),this._isTransitioning=!1,et.trigger(this._element,RD,{relatedTarget:t})};this._queueCallback(r,this._dialog,this._isAnimated())}_addEventListeners(){et.on(this._element,WD,t=>{if(t.key===ND){if(this._config.keyboard){this.hide();return}this._triggerBackdropTransition()}}),et.on(window,BD,()=>{this._isShown&&!this._isTransitioning&&this._adjustDialog()}),et.on(this._element,qD,t=>{et.one(this._element,FD,e=>{if(!(this._element!==t.target||this._element!==e.target)){if(this._config.backdrop==="static"){this._triggerBackdropTransition();return}this._config.backdrop&&this.hide()}})})}_hideModal(){this._element.style.display="none",this._element.setAttribute("aria-hidden",!0),this._element.removeAttribute("aria-modal"),this._element.removeAttribute("role"),this._isTransitioning=!1,this._backdrop.hide(()=>{document.body.classList.remove(go),this._resetAdjustments(),this._scrollBar.reset(),et.trigger(this._element,Oh)})}_isAnimated(){return this._element.classList.contains(GD)}_triggerBackdropTransition(){if(et.trigger(this._element,$D).defaultPrevented)return;const e=this._element.scrollHeight>document.documentElement.clientHeight,r=this._element.style.overflowY;r==="hidden"||this._element.classList.contains(N2)||(e||(this._element.style.overflowY="hidden"),this._element.classList.add(N2),this._queueCallback(()=>{this._element.classList.remove(N2),this._queueCallback(()=>{this._element.style.overflowY=r},this._dialog)},this._dialog),this._element.focus())}_adjustDialog(){const t=this._element.scrollHeight>document.documentElement.clientHeight,e=this._scrollBar.getWidth(),r=e>0;if(r&&!t){const s=me()?"paddingLeft":"paddingRight";this._element.style[s]=`${e}px`}if(!r&&t){const s=me()?"paddingRight":"paddingLeft";this._element.style[s]=`${e}px`}}_resetAdjustments(){this._element.style.paddingLeft="",this._element.style.paddingRight=""}static jQueryInterface(t,e){return this.each(function(){const r=Na.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof r[t]>"u")throw new TypeError(`No method named "${t}"`);r[t](e)}})}}et.on(document,jD,YD,function(a){const t=dt.getElementFromSelector(this);["A","AREA"].includes(this.tagName)&&a.preventDefault(),et.one(t,kh,s=>{s.defaultPrevented||et.one(t,Oh,()=>{Ba(this)&&this.focus()})});const e=dt.findOne(ZD);e&&Na.getInstance(e).hide(),Na.getOrCreateInstance(t).toggle(this)});Z1(Na);ge(Na);const JD="offcanvas",tO="bs.offcanvas",Be=`.${tO}`,Ih=".data-api",eO=`load${Be}${Ih}`,aO="Escape",xo="show",wo="showing",bo="hiding",iO="offcanvas-backdrop",Nh=".offcanvas.show",rO=`show${Be}`,nO=`shown${Be}`,sO=`hide${Be}`,Eo=`hidePrevented${Be}`,zh=`hidden${Be}`,oO=`resize${Be}`,hO=`click${Be}${Ih}`,lO=`keydown.dismiss${Be}`,dO='[data-bs-toggle="offcanvas"]',cO={backdrop:!0,keyboard:!0,scroll:!1},pO={backdrop:"(boolean|string)",keyboard:"boolean",scroll:"boolean"};class Ye extends Ee{constructor(t,e){super(t,e),this._isShown=!1,this._backdrop=this._initializeBackDrop(),this._focustrap=this._initializeFocusTrap(),this._addEventListeners()}static get Default(){return cO}static get DefaultType(){return pO}static get NAME(){return JD}toggle(t){return this._isShown?this.hide():this.show(t)}show(t){if(this._isShown||et.trigger(this._element,rO,{relatedTarget:t}).defaultPrevented)return;this._isShown=!0,this._backdrop.show(),this._config.scroll||new ei().hide(),this._element.setAttribute("aria-modal",!0),this._element.setAttribute("role","dialog"),this._element.classList.add(wo);const r=()=>{(!this._config.scroll||this._config.backdrop)&&this._focustrap.activate(),this._element.classList.add(xo),this._element.classList.remove(wo),et.trigger(this._element,nO,{relatedTarget:t})};this._queueCallback(r,this._element,!0)}hide(){if(!this._isShown||et.trigger(this._element,sO).defaultPrevented)return;this._focustrap.deactivate(),this._element.blur(),this._isShown=!1,this._element.classList.add(bo),this._backdrop.hide();const e=()=>{this._element.classList.remove(xo,bo),this._element.removeAttribute("aria-modal"),this._element.removeAttribute("role"),this._config.scroll||new ei().reset(),et.trigger(this._element,zh)};this._queueCallback(e,this._element,!0)}dispose(){this._backdrop.dispose(),this._focustrap.deactivate(),super.dispose()}_initializeBackDrop(){const t=()=>{if(this._config.backdrop==="static"){et.trigger(this._element,Eo);return}this.hide()},e=!!this._config.backdrop;return new Ph({className:iO,isVisible:e,isAnimated:!0,rootElement:this._element.parentNode,clickCallback:e?t:null})}_initializeFocusTrap(){return new Dh({trapElement:this._element})}_addEventListeners(){et.on(this._element,lO,t=>{if(t.key===aO){if(this._config.keyboard){this.hide();return}et.trigger(this._element,Eo)}})}static jQueryInterface(t){return this.each(function(){const e=Ye.getOrCreateInstance(this,t);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}et.on(document,hO,dO,function(a){const t=dt.getElementFromSelector(this);if(["A","AREA"].includes(this.tagName)&&a.preventDefault(),Ue(this))return;et.one(t,zh,()=>{Ba(this)&&this.focus()});const e=dt.findOne(Nh);e&&e!==t&&Ye.getInstance(e).hide(),Ye.getOrCreateInstance(t).toggle(this)});et.on(window,eO,()=>{for(const a of dt.find(Nh))Ye.getOrCreateInstance(a).show()});et.on(window,oO,()=>{for(const a of dt.find("[aria-modal][class*=show][class*=offcanvas-]"))getComputedStyle(a).position!=="fixed"&&Ye.getOrCreateInstance(a).hide()});Z1(Ye);ge(Ye);const uO=/^aria-[\w-]*$/i,$h={"*":["class","dir","id","lang","role",uO],a:["target","href","title","rel"],area:[],b:[],br:[],col:[],code:[],dd:[],div:[],dl:[],dt:[],em:[],hr:[],h1:[],h2:[],h3:[],h4:[],h5:[],h6:[],i:[],img:["src","srcset","alt","title","width","height"],li:[],ol:[],p:[],pre:[],s:[],small:[],span:[],sub:[],sup:[],strong:[],u:[],ul:[]},fO=new Set(["background","cite","href","itemtype","longdesc","poster","src","xlink:href"]),MO=/^(?!javascript:)(?:[a-z0-9+.-]+:|[^&:/?#]*(?:[/?#]|$))/i,mO=(a,t)=>{const e=a.nodeName.toLowerCase();return t.includes(e)?fO.has(e)?!!MO.test(a.nodeValue):!0:t.filter(r=>r instanceof RegExp).some(r=>r.test(e))};function vO(a,t,e){if(!a.length)return a;if(e&&typeof e=="function")return e(a);const s=new window.DOMParser().parseFromString(a,"text/html"),o=[].concat(...s.body.querySelectorAll("*"));for(const c of o){const f=c.nodeName.toLowerCase();if(!Object.keys(t).includes(f)){c.remove();continue}const v=[].concat(...c.attributes),M=[].concat(t["*"]||[],t[f]||[]);for(const g of v)mO(g,M)||c.removeAttribute(g.nodeName)}return s.body.innerHTML}const gO="TemplateFactory",yO={allowList:$h,content:{},extraClass:"",html:!1,sanitize:!0,sanitizeFn:null,template:"<div></div>"},xO={allowList:"object",content:"object",extraClass:"(string|function)",html:"boolean",sanitize:"boolean",sanitizeFn:"(null|function)",template:"string"},wO={entry:"(string|element|function|null)",selector:"(string|element)"};class bO extends c1{constructor(t){super(),this._config=this._getConfig(t)}static get Default(){return yO}static get DefaultType(){return xO}static get NAME(){return gO}getContent(){return Object.values(this._config.content).map(t=>this._resolvePossibleFunction(t)).filter(Boolean)}hasContent(){return this.getContent().length>0}changeContent(t){return this._checkContent(t),this._config.content={...this._config.content,...t},this}toHtml(){const t=document.createElement("div");t.innerHTML=this._maybeSanitize(this._config.template);for(const[s,o]of Object.entries(this._config.content))this._setContent(t,o,s);const e=t.children[0],r=this._resolvePossibleFunction(this._config.extraClass);return r&&e.classList.add(...r.split(" ")),e}_typeCheckConfig(t){super._typeCheckConfig(t),this._checkContent(t.content)}_checkContent(t){for(const[e,r]of Object.entries(t))super._typeCheckConfig({selector:e,entry:r},wO)}_setContent(t,e,r){const s=dt.findOne(r,t);if(s){if(e=this._resolvePossibleFunction(e),!e){s.remove();return}if(Ne(e)){this._putElementInTemplate(Xe(e),s);return}if(this._config.html){s.innerHTML=this._maybeSanitize(e);return}s.textContent=e}}_maybeSanitize(t){return this._config.sanitize?vO(t,this._config.allowList,this._config.sanitizeFn):t}_resolvePossibleFunction(t){return ee(t,[void 0,this])}_putElementInTemplate(t,e){if(this._config.html){e.innerHTML="",e.append(t);return}e.textContent=t.textContent}}const EO="tooltip",SO=new Set(["sanitize","allowList","sanitizeFn"]),z2="fade",CO="modal",_1="show",AO=".tooltip-inner",So=`.${CO}`,Co="hide.bs.modal",t1="hover",$2="focus",R2="click",TO="manual",_O="hide",HO="hidden",LO="show",VO="shown",PO="inserted",DO="click",OO="focusin",kO="focusout",IO="mouseenter",NO="mouseleave",zO={AUTO:"auto",TOP:"top",RIGHT:me()?"left":"right",BOTTOM:"bottom",LEFT:me()?"right":"left"},$O={allowList:$h,animation:!0,boundary:"clippingParents",container:!1,customClass:"",delay:0,fallbackPlacements:["top","right","bottom","left"],html:!1,offset:[0,6],placement:"top",popperConfig:null,sanitize:!0,sanitizeFn:null,selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',title:"",trigger:"hover focus"},RO={allowList:"object",animation:"boolean",boundary:"(string|element)",container:"(string|element|boolean)",customClass:"(string|function)",delay:"(number|object)",fallbackPlacements:"array",html:"boolean",offset:"(array|string|function)",placement:"(string|function)",popperConfig:"(null|object|function)",sanitize:"boolean",sanitizeFn:"(null|function)",selector:"(string|boolean)",template:"string",title:"(string|element|function)",trigger:"string"};class qa extends Ee{constructor(t,e){if(typeof ph>"u")throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org/docs/v2/)");super(t,e),this._isEnabled=!0,this._timeout=0,this._isHovered=null,this._activeTrigger={},this._popper=null,this._templateFactory=null,this._newContent=null,this.tip=null,this._setListeners(),this._config.selector||this._fixTitle()}static get Default(){return $O}static get DefaultType(){return RO}static get NAME(){return EO}enable(){this._isEnabled=!0}disable(){this._isEnabled=!1}toggleEnabled(){this._isEnabled=!this._isEnabled}toggle(){if(this._isEnabled){if(this._isShown()){this._leave();return}this._enter()}}dispose(){clearTimeout(this._timeout),et.off(this._element.closest(So),Co,this._hideModalHandler),this._element.getAttribute("data-bs-original-title")&&this._element.setAttribute("title",this._element.getAttribute("data-bs-original-title")),this._disposePopper(),super.dispose()}show(){if(this._element.style.display==="none")throw new Error("Please use show on visible elements");if(!(this._isWithContent()&&this._isEnabled))return;const t=et.trigger(this._element,this.constructor.eventName(LO)),r=(Mh(this._element)||this._element.ownerDocument.documentElement).contains(this._element);if(t.defaultPrevented||!r)return;this._disposePopper();const s=this._getTipElement();this._element.setAttribute("aria-describedby",s.getAttribute("id"));const{container:o}=this._config;if(this._element.ownerDocument.documentElement.contains(this.tip)||(o.append(s),et.trigger(this._element,this.constructor.eventName(PO))),this._popper=this._createPopper(s),s.classList.add(_1),"ontouchstart"in document.documentElement)for(const f of[].concat(...document.body.children))et.on(f,"mouseover",$1);const c=()=>{et.trigger(this._element,this.constructor.eventName(VO)),this._isHovered===!1&&this._leave(),this._isHovered=!1};this._queueCallback(c,this.tip,this._isAnimated())}hide(){if(!this._isShown()||et.trigger(this._element,this.constructor.eventName(_O)).defaultPrevented)return;if(this._getTipElement().classList.remove(_1),"ontouchstart"in document.documentElement)for(const s of[].concat(...document.body.children))et.off(s,"mouseover",$1);this._activeTrigger[R2]=!1,this._activeTrigger[$2]=!1,this._activeTrigger[t1]=!1,this._isHovered=null;const r=()=>{this._isWithActiveTrigger()||(this._isHovered||this._disposePopper(),this._element.removeAttribute("aria-describedby"),et.trigger(this._element,this.constructor.eventName(HO)))};this._queueCallback(r,this.tip,this._isAnimated())}update(){this._popper&&this._popper.update()}_isWithContent(){return!!this._getTitle()}_getTipElement(){return this.tip||(this.tip=this._createTipElement(this._newContent||this._getContentForTemplate())),this.tip}_createTipElement(t){const e=this._getTemplateFactory(t).toHtml();if(!e)return null;e.classList.remove(z2,_1),e.classList.add(`bs-${this.constructor.NAME}-auto`);const r=TV(this.constructor.NAME).toString();return e.setAttribute("id",r),this._isAnimated()&&e.classList.add(z2),e}setContent(t){this._newContent=t,this._isShown()&&(this._disposePopper(),this.show())}_getTemplateFactory(t){return this._templateFactory?this._templateFactory.changeContent(t):this._templateFactory=new bO({...this._config,content:t,extraClass:this._resolvePossibleFunction(this._config.customClass)}),this._templateFactory}_getContentForTemplate(){return{[AO]:this._getTitle()}}_getTitle(){return this._resolvePossibleFunction(this._config.title)||this._element.getAttribute("data-bs-original-title")}_initializeOnDelegatedTarget(t){return this.constructor.getOrCreateInstance(t.delegateTarget,this._getDelegateConfig())}_isAnimated(){return this._config.animation||this.tip&&this.tip.classList.contains(z2)}_isShown(){return this.tip&&this.tip.classList.contains(_1)}_createPopper(t){const e=ee(this._config.placement,[this,t,this._element]),r=zO[e.toUpperCase()];return vi(this._element,t,this._getPopperConfig(r))}_getOffset(){const{offset:t}=this._config;return typeof t=="string"?t.split(",").map(e=>Number.parseInt(e,10)):typeof t=="function"?e=>t(e,this._element):t}_resolvePossibleFunction(t){return ee(t,[this._element,this._element])}_getPopperConfig(t){const e={placement:t,modifiers:[{name:"flip",options:{fallbackPlacements:this._config.fallbackPlacements}},{name:"offset",options:{offset:this._getOffset()}},{name:"preventOverflow",options:{boundary:this._config.boundary}},{name:"arrow",options:{element:`.${this.constructor.NAME}-arrow`}},{name:"preSetPlacement",enabled:!0,phase:"beforeMain",fn:r=>{this._getTipElement().setAttribute("data-popper-placement",r.state.placement)}}]};return{...e,...ee(this._config.popperConfig,[void 0,e])}}_setListeners(){const t=this._config.trigger.split(" ");for(const e of t)if(e==="click")et.on(this._element,this.constructor.eventName(DO),this._config.selector,r=>{const s=this._initializeOnDelegatedTarget(r);s._activeTrigger[R2]=!(s._isShown()&&s._activeTrigger[R2]),s.toggle()});else if(e!==TO){const r=e===t1?this.constructor.eventName(IO):this.constructor.eventName(OO),s=e===t1?this.constructor.eventName(NO):this.constructor.eventName(kO);et.on(this._element,r,this._config.selector,o=>{const c=this._initializeOnDelegatedTarget(o);c._activeTrigger[o.type==="focusin"?$2:t1]=!0,c._enter()}),et.on(this._element,s,this._config.selector,o=>{const c=this._initializeOnDelegatedTarget(o);c._activeTrigger[o.type==="focusout"?$2:t1]=c._element.contains(o.relatedTarget),c._leave()})}this._hideModalHandler=()=>{this._element&&this.hide()},et.on(this._element.closest(So),Co,this._hideModalHandler)}_fixTitle(){const t=this._element.getAttribute("title");t&&(!this._element.getAttribute("aria-label")&&!this._element.textContent.trim()&&this._element.setAttribute("aria-label",t),this._element.setAttribute("data-bs-original-title",t),this._element.removeAttribute("title"))}_enter(){if(this._isShown()||this._isHovered){this._isHovered=!0;return}this._isHovered=!0,this._setTimeout(()=>{this._isHovered&&this.show()},this._config.delay.show)}_leave(){this._isWithActiveTrigger()||(this._isHovered=!1,this._setTimeout(()=>{this._isHovered||this.hide()},this._config.delay.hide))}_setTimeout(t,e){clearTimeout(this._timeout),this._timeout=setTimeout(t,e)}_isWithActiveTrigger(){return Object.values(this._activeTrigger).includes(!0)}_getConfig(t){const e=ze.getDataAttributes(this._element);for(const r of Object.keys(e))SO.has(r)&&delete e[r];return t={...e,...typeof t=="object"&&t?t:{}},t=this._mergeConfigObj(t),t=this._configAfterMerge(t),this._typeCheckConfig(t),t}_configAfterMerge(t){return t.container=t.container===!1?document.body:Xe(t.container),typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),typeof t.title=="number"&&(t.title=t.title.toString()),typeof t.content=="number"&&(t.content=t.content.toString()),t}_getDelegateConfig(){const t={};for(const[e,r]of Object.entries(this._config))this.constructor.Default[e]!==r&&(t[e]=r);return t.selector=!1,t.trigger="manual",t}_disposePopper(){this._popper&&(this._popper.destroy(),this._popper=null),this.tip&&(this.tip.remove(),this.tip=null)}static jQueryInterface(t){return this.each(function(){const e=qa.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}}ge(qa);const BO="popover",FO=".popover-header",qO=".popover-body",WO={...qa.Default,content:"",offset:[0,8],placement:"right",template:'<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',trigger:"click"},jO={...qa.DefaultType,content:"(null|string|element|function)"};class wi extends qa{static get Default(){return WO}static get DefaultType(){return jO}static get NAME(){return BO}_isWithContent(){return this._getTitle()||this._getContent()}_getContentForTemplate(){return{[FO]:this._getTitle(),[qO]:this._getContent()}}_getContent(){return this._resolvePossibleFunction(this._config.content)}static jQueryInterface(t){return this.each(function(){const e=wi.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t]()}})}}ge(wi);const GO="scrollspy",ZO="bs.scrollspy",bi=`.${ZO}`,XO=".data-api",UO=`activate${bi}`,Ao=`click${bi}`,YO=`load${bi}${XO}`,KO="dropdown-item",Ca="active",QO='[data-bs-spy="scroll"]',B2="[href]",JO=".nav, .list-group",To=".nav-link",tk=".nav-item",ek=".list-group-item",ak=`${To}, ${tk} > ${To}, ${ek}`,ik=".dropdown",rk=".dropdown-toggle",nk={offset:null,rootMargin:"0px 0px -25%",smoothScroll:!1,target:null,threshold:[.1,.5,1]},sk={offset:"(number|null)",rootMargin:"string",smoothScroll:"boolean",target:"element",threshold:"array"};class Y1 extends Ee{constructor(t,e){super(t,e),this._targetLinks=new Map,this._observableSections=new Map,this._rootElement=getComputedStyle(this._element).overflowY==="visible"?null:this._element,this._activeTarget=null,this._observer=null,this._previousScrollData={visibleEntryTop:0,parentScrollTop:0},this.refresh()}static get Default(){return nk}static get DefaultType(){return sk}static get NAME(){return GO}refresh(){this._initializeTargetsAndObservables(),this._maybeEnableSmoothScroll(),this._observer?this._observer.disconnect():this._observer=this._getNewObserver();for(const t of this._observableSections.values())this._observer.observe(t)}dispose(){this._observer.disconnect(),super.dispose()}_configAfterMerge(t){return t.target=Xe(t.target)||document.body,t.rootMargin=t.offset?`${t.offset}px 0px -30%`:t.rootMargin,typeof t.threshold=="string"&&(t.threshold=t.threshold.split(",").map(e=>Number.parseFloat(e))),t}_maybeEnableSmoothScroll(){this._config.smoothScroll&&(et.off(this._config.target,Ao),et.on(this._config.target,Ao,B2,t=>{const e=this._observableSections.get(t.target.hash);if(e){t.preventDefault();const r=this._rootElement||window,s=e.offsetTop-this._element.offsetTop;if(r.scrollTo){r.scrollTo({top:s,behavior:"smooth"});return}r.scrollTop=s}}))}_getNewObserver(){const t={root:this._rootElement,threshold:this._config.threshold,rootMargin:this._config.rootMargin};return new IntersectionObserver(e=>this._observerCallback(e),t)}_observerCallback(t){const e=c=>this._targetLinks.get(`#${c.target.id}`),r=c=>{this._previousScrollData.visibleEntryTop=c.target.offsetTop,this._process(e(c))},s=(this._rootElement||document.documentElement).scrollTop,o=s>=this._previousScrollData.parentScrollTop;this._previousScrollData.parentScrollTop=s;for(const c of t){if(!c.isIntersecting){this._activeTarget=null,this._clearActiveClass(e(c));continue}const f=c.target.offsetTop>=this._previousScrollData.visibleEntryTop;if(o&&f){if(r(c),!s)return;continue}!o&&!f&&r(c)}}_initializeTargetsAndObservables(){this._targetLinks=new Map,this._observableSections=new Map;const t=dt.find(B2,this._config.target);for(const e of t){if(!e.hash||Ue(e))continue;const r=dt.findOne(decodeURI(e.hash),this._element);Ba(r)&&(this._targetLinks.set(decodeURI(e.hash),e),this._observableSections.set(e.hash,r))}}_process(t){this._activeTarget!==t&&(this._clearActiveClass(this._config.target),this._activeTarget=t,t.classList.add(Ca),this._activateParents(t),et.trigger(this._element,UO,{relatedTarget:t}))}_activateParents(t){if(t.classList.contains(KO)){dt.findOne(rk,t.closest(ik)).classList.add(Ca);return}for(const e of dt.parents(t,JO))for(const r of dt.prev(e,ak))r.classList.add(Ca)}_clearActiveClass(t){t.classList.remove(Ca);const e=dt.find(`${B2}.${Ca}`,t);for(const r of e)r.classList.remove(Ca)}static jQueryInterface(t){return this.each(function(){const e=Y1.getOrCreateInstance(this,t);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(window,YO,()=>{for(const a of dt.find(QO))Y1.getOrCreateInstance(a)});ge(Y1);const ok="tab",hk="bs.tab",Ma=`.${hk}`,lk=`hide${Ma}`,dk=`hidden${Ma}`,ck=`show${Ma}`,pk=`shown${Ma}`,uk=`click${Ma}`,fk=`keydown${Ma}`,Mk=`load${Ma}`,mk="ArrowLeft",_o="ArrowRight",vk="ArrowUp",Ho="ArrowDown",F2="Home",Lo="End",ha="active",Vo="fade",q2="show",gk="dropdown",Rh=".dropdown-toggle",yk=".dropdown-menu",W2=`:not(${Rh})`,xk='.list-group, .nav, [role="tablist"]',wk=".nav-item, .list-group-item",bk=`.nav-link${W2}, .list-group-item${W2}, [role="tab"]${W2}`,Bh='[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]',j2=`${bk}, ${Bh}`,Ek=`.${ha}[data-bs-toggle="tab"], .${ha}[data-bs-toggle="pill"], .${ha}[data-bs-toggle="list"]`;class za extends Ee{constructor(t){super(t),this._parent=this._element.closest(xk),this._parent&&(this._setInitialAttributes(this._parent,this._getChildren()),et.on(this._element,fk,e=>this._keydown(e)))}static get NAME(){return ok}show(){const t=this._element;if(this._elemIsActive(t))return;const e=this._getActiveElem(),r=e?et.trigger(e,lk,{relatedTarget:t}):null;et.trigger(t,ck,{relatedTarget:e}).defaultPrevented||r&&r.defaultPrevented||(this._deactivate(e,t),this._activate(t,e))}_activate(t,e){if(!t)return;t.classList.add(ha),this._activate(dt.getElementFromSelector(t));const r=()=>{if(t.getAttribute("role")!=="tab"){t.classList.add(q2);return}t.removeAttribute("tabindex"),t.setAttribute("aria-selected",!0),this._toggleDropDown(t,!0),et.trigger(t,pk,{relatedTarget:e})};this._queueCallback(r,t,t.classList.contains(Vo))}_deactivate(t,e){if(!t)return;t.classList.remove(ha),t.blur(),this._deactivate(dt.getElementFromSelector(t));const r=()=>{if(t.getAttribute("role")!=="tab"){t.classList.remove(q2);return}t.setAttribute("aria-selected",!1),t.setAttribute("tabindex","-1"),this._toggleDropDown(t,!1),et.trigger(t,dk,{relatedTarget:e})};this._queueCallback(r,t,t.classList.contains(Vo))}_keydown(t){if(![mk,_o,vk,Ho,F2,Lo].includes(t.key))return;t.stopPropagation(),t.preventDefault();const e=this._getChildren().filter(s=>!Ue(s));let r;if([F2,Lo].includes(t.key))r=e[t.key===F2?0:e.length-1];else{const s=[_o,Ho].includes(t.key);r=gi(e,t.target,s,!0)}r&&(r.focus({preventScroll:!0}),za.getOrCreateInstance(r).show())}_getChildren(){return dt.find(j2,this._parent)}_getActiveElem(){return this._getChildren().find(t=>this._elemIsActive(t))||null}_setInitialAttributes(t,e){this._setAttributeIfNotExists(t,"role","tablist");for(const r of e)this._setInitialAttributesOnChild(r)}_setInitialAttributesOnChild(t){t=this._getInnerElement(t);const e=this._elemIsActive(t),r=this._getOuterElement(t);t.setAttribute("aria-selected",e),r!==t&&this._setAttributeIfNotExists(r,"role","presentation"),e||t.setAttribute("tabindex","-1"),this._setAttributeIfNotExists(t,"role","tab"),this._setInitialAttributesOnTargetPanel(t)}_setInitialAttributesOnTargetPanel(t){const e=dt.getElementFromSelector(t);e&&(this._setAttributeIfNotExists(e,"role","tabpanel"),t.id&&this._setAttributeIfNotExists(e,"aria-labelledby",`${t.id}`))}_toggleDropDown(t,e){const r=this._getOuterElement(t);if(!r.classList.contains(gk))return;const s=(o,c)=>{const f=dt.findOne(o,r);f&&f.classList.toggle(c,e)};s(Rh,ha),s(yk,q2),r.setAttribute("aria-expanded",e)}_setAttributeIfNotExists(t,e,r){t.hasAttribute(e)||t.setAttribute(e,r)}_elemIsActive(t){return t.classList.contains(ha)}_getInnerElement(t){return t.matches(j2)?t:dt.findOne(j2,t)}_getOuterElement(t){return t.closest(wk)||t}static jQueryInterface(t){return this.each(function(){const e=za.getOrCreateInstance(this);if(typeof t=="string"){if(e[t]===void 0||t.startsWith("_")||t==="constructor")throw new TypeError(`No method named "${t}"`);e[t]()}})}}et.on(document,uk,Bh,function(a){["A","AREA"].includes(this.tagName)&&a.preventDefault(),!Ue(this)&&za.getOrCreateInstance(this).show()});et.on(window,Mk,()=>{for(const a of dt.find(Ek))za.getOrCreateInstance(a)});ge(za);const Sk="toast",Ck="bs.toast",Je=`.${Ck}`,Ak=`mouseover${Je}`,Tk=`mouseout${Je}`,_k=`focusin${Je}`,Hk=`focusout${Je}`,Lk=`hide${Je}`,Vk=`hidden${Je}`,Pk=`show${Je}`,Dk=`shown${Je}`,Ok="fade",Po="hide",H1="show",L1="showing",kk={animation:"boolean",autohide:"boolean",delay:"number"},Ik={animation:!0,autohide:!0,delay:5e3};class K1 extends Ee{constructor(t,e){super(t,e),this._timeout=null,this._hasMouseInteraction=!1,this._hasKeyboardInteraction=!1,this._setListeners()}static get Default(){return Ik}static get DefaultType(){return kk}static get NAME(){return Sk}show(){if(et.trigger(this._element,Pk).defaultPrevented)return;this._clearTimeout(),this._config.animation&&this._element.classList.add(Ok);const e=()=>{this._element.classList.remove(L1),et.trigger(this._element,Dk),this._maybeScheduleHide()};this._element.classList.remove(Po),d1(this._element),this._element.classList.add(H1,L1),this._queueCallback(e,this._element,this._config.animation)}hide(){if(!this.isShown()||et.trigger(this._element,Lk).defaultPrevented)return;const e=()=>{this._element.classList.add(Po),this._element.classList.remove(L1,H1),et.trigger(this._element,Vk)};this._element.classList.add(L1),this._queueCallback(e,this._element,this._config.animation)}dispose(){this._clearTimeout(),this.isShown()&&this._element.classList.remove(H1),super.dispose()}isShown(){return this._element.classList.contains(H1)}_maybeScheduleHide(){this._config.autohide&&(this._hasMouseInteraction||this._hasKeyboardInteraction||(this._timeout=setTimeout(()=>{this.hide()},this._config.delay)))}_onInteraction(t,e){switch(t.type){case"mouseover":case"mouseout":{this._hasMouseInteraction=e;break}case"focusin":case"focusout":{this._hasKeyboardInteraction=e;break}}if(e){this._clearTimeout();return}const r=t.relatedTarget;this._element===r||this._element.contains(r)||this._maybeScheduleHide()}_setListeners(){et.on(this._element,Ak,t=>this._onInteraction(t,!0)),et.on(this._element,Tk,t=>this._onInteraction(t,!1)),et.on(this._element,_k,t=>this._onInteraction(t,!0)),et.on(this._element,Hk,t=>this._onInteraction(t,!1))}_clearTimeout(){clearTimeout(this._timeout),this._timeout=null}static jQueryInterface(t){return this.each(function(){const e=K1.getOrCreateInstance(this,t);if(typeof t=="string"){if(typeof e[t]>"u")throw new TypeError(`No method named "${t}"`);e[t](this)}})}}Z1(K1);ge(K1);window.$=ai;window.jQuery=ai;window.Swiper=Wt;window.axios=Vl;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";document.addEventListener("DOMContentLoaded",()=>{console.log("Test"),ai("#jqueryTestBtn").on("click",()=>{console.log("jQuery is working!")}),j_({icons:W_}),new Wt(".mySwiper",{loop:!0,effect:"fade",autoplay:{delay:4e3,disableOnInteraction:!1},pagination:{el:".swiper-pagination",clickable:!0}}),new Wt("#travel-packages",{slidesPerView:5,spaceBetween:20,loop:!0,pagination:{el:".travel-package-pagination",clickable:!0},breakpoints:{0:{slidesPerView:2},576:{slidesPerView:2},768:{slidesPerView:3},992:{slidesPerView:4},1200:{slidesPerView:4}}}),new Wt(".reviewSwiper",{loop:!0,spaceBetween:20,slidesPerView:1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},breakpoints:{768:{slidesPerView:2},992:{slidesPerView:3}}})});
