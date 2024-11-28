/*!
   SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 FixedHeader 3.2.3
 ©2009-2022 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(b,h,g){b instanceof String&&(b=String(b));for(var l=b.length,k=0;k<l;k++){var w=b[k];if(h.call(g,w,k,b))return{i:k,v:w}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(b,h,g){if(b==Array.prototype||b==Object.prototype)return b;b[h]=g.value;return b};$jscomp.getGlobal=function(b){b=["object"==typeof globalThis&&globalThis,b,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var h=0;h<b.length;++h){var g=b[h];if(g&&g.Math==Math)return g}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(b,h){var g=$jscomp.propertyToPolyfillSymbol[h];if(null==g)return b[h];g=b[g];return void 0!==g?g:b[h]};
$jscomp.polyfill=function(b,h,g,l){h&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(b,h,g,l):$jscomp.polyfillUnisolated(b,h,g,l))};$jscomp.polyfillUnisolated=function(b,h,g,l){g=$jscomp.global;b=b.split(".");for(l=0;l<b.length-1;l++){var k=b[l];if(!(k in g))return;g=g[k]}b=b[b.length-1];l=g[b];h=h(l);h!=l&&null!=h&&$jscomp.defineProperty(g,b,{configurable:!0,writable:!0,value:h})};
$jscomp.polyfillIsolated=function(b,h,g,l){var k=b.split(".");b=1===k.length;l=k[0];l=!b&&l in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var w=0;w<k.length-1;w++){var t=k[w];if(!(t in l))return;l=l[t]}k=k[k.length-1];g=$jscomp.IS_SYMBOL_NATIVE&&"es6"===g?l[k]:null;h=h(g);null!=h&&(b?$jscomp.defineProperty($jscomp.polyfills,k,{configurable:!0,writable:!0,value:h}):h!==g&&($jscomp.propertyToPolyfillSymbol[k]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(k):$jscomp.POLYFILL_PREFIX+k,k=
$jscomp.propertyToPolyfillSymbol[k],$jscomp.defineProperty(l,k,{configurable:!0,writable:!0,value:h})))};$jscomp.polyfill("Array.prototype.find",function(b){return b?b:function(h,g){return $jscomp.findInternal(this,h,g).v}},"es6","es3");
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(h){return b(h,window,document)}):"object"===typeof exports?module.exports=function(h,g){h||(h=window);g&&g.fn.dataTable||(g=require("datatables.net")(h,g).$);return b(g,h,h.document)}:b(jQuery,window,document)})(function(b,h,g,l){var k=b.fn.dataTable,w=0,t=function(a,d){if(!(this instanceof t))throw"FixedHeader must be initialised with the 'new' keyword.";!0===d&&(d={});a=new k.Api(a);this.c=b.extend(!0,
{},t.defaults,d);this.s={dt:a,position:{theadTop:0,tbodyTop:0,tfootTop:0,tfootBottom:0,width:0,left:0,tfootHeight:0,theadHeight:0,windowHeight:b(h).height(),visible:!0},headerMode:null,footerMode:null,autoWidth:a.settings()[0].oFeatures.bAutoWidth,namespace:".dtfc"+w++,scrollLeft:{header:-1,footer:-1},enable:!0};this.dom={floatingHeader:null,thead:b(a.table().header()),tbody:b(a.table().body()),tfoot:b(a.table().footer()),header:{host:null,floating:null,floatingParent:b('<div class="dtfh-floatingparent">'),
placeholder:null},footer:{host:null,floating:null,floatingParent:b('<div class="dtfh-floatingparent">'),placeholder:null}};this.dom.header.host=this.dom.thead.parent();this.dom.footer.host=this.dom.tfoot.parent();a=a.settings()[0];if(a._fixedHeader)throw"FixedHeader already initialised on table "+a.nTable.id;a._fixedHeader=this;this._constructor()};b.extend(t.prototype,{destroy:function(){var a=this.dom;this.s.dt.off(".dtfc");b(h).off(this.s.namespace);a.header.rightBlocker&&a.header.rightBlocker.remove();
a.header.leftBlocker&&a.header.leftBlocker.remove();a.footer.rightBlocker&&a.footer.rightBlocker.remove();a.footer.leftBlocker&&a.footer.leftBlocker.remove();this.c.header&&this._modeChange("in-place","header",!0);this.c.footer&&a.tfoot.length&&this._modeChange("in-place","footer",!0)},enable:function(a,d){this.s.enable=a;if(d||d===l)this._positions(),this._scroll(!0)},enabled:function(){return this.s.enable},headerOffset:function(a){a!==l&&(this.c.headerOffset=a,this.update());return this.c.headerOffset},
footerOffset:function(a){a!==l&&(this.c.footerOffset=a,this.update());return this.c.footerOffset},update:function(a){var d=this.s.dt.table().node();b(d).is(":visible")?this.enable(!0,!1):this.enable(!1,!1);0!==b(d).children("thead").length&&(this._positions(),this._scroll(a!==l?a:!0))},_constructor:function(){var a=this,d=this.s.dt;b(h).on("scroll"+this.s.namespace,function(){a._scroll()}).on("resize"+this.s.namespace,k.util.throttle(function(){a.s.position.windowHeight=b(h).height();a.update()},
50));var c=b(".fh-fixedHeader");!this.c.headerOffset&&c.length&&(this.c.headerOffset=c.outerHeight());c=b(".fh-fixedFooter");!this.c.footerOffset&&c.length&&(this.c.footerOffset=c.outerHeight());d.on("column-reorder.dt.dtfc column-visibility.dt.dtfc column-sizing.dt.dtfc responsive-display.dt.dtfc",function(f,e){a.update()}).on("draw.dt.dtfc",function(f,e){a.update(e===d.settings()[0]?!1:!0)});d.on("destroy.dtfc",function(){a.destroy()});this._positions();this._scroll()},_clone:function(a,d){var c=
this,f=this.s.dt,e=this.dom[a],p="header"===a?this.dom.thead:this.dom.tfoot;if("footer"!==a||!this._scrollEnabled())if(!d&&e.floating)e.floating.removeClass("fixedHeader-floating fixedHeader-locked");else{e.floating&&(null!==e.placeholder&&e.placeholder.remove(),this._unsize(a),e.floating.children().detach(),e.floating.remove());var q=b(f.table().node()),n=b(q.parent()),r=this._scrollEnabled();d=b(g).scrollLeft();var m=b(g).scrollTop();e.floating=b(f.table().node().cloneNode(!1)).attr("aria-hidden",
"true").css({"table-layout":"fixed",top:0,left:0}).removeAttr("id").append(p);e.floatingParent.css({width:n.width(),overflow:"hidden",height:"fit-content",position:"fixed",left:r?q.offset().left+n.scrollLeft():0}).css("header"===a?{top:this.c.headerOffset,bottom:""}:{top:"",bottom:this.c.footerOffset}).addClass("footer"===a?"dtfh-floatingparentfoot":"dtfh-floatingparenthead").append(e.floating).appendTo("body");this._stickyPosition(e.floating,"-");a=function(){var u=n.scrollLeft();c.s.scrollLeft=
{footer:u,header:u};e.floatingParent.scrollLeft(c.s.scrollLeft.header)};a();n.off("scroll.dtfh").on("scroll.dtfh",a);e.placeholder=p.clone(!1);e.placeholder.find("*[id]").removeAttr("id");e.host.prepend(e.placeholder);this._matchWidths(e.placeholder,e.floating);b(g).scrollTop(m).scrollLeft(d)}},_stickyPosition:function(a,d){if(this._scrollEnabled()){var c=this,f="rtl"===b(c.s.dt.table().node()).css("direction");a.find("th").each(function(){if("sticky"===b(this).css("position")){var e=b(this).css("right"),
p=b(this).css("left");"auto"===e||f?"auto"!==p&&f&&(e=+p.replace(/px/g,"")+("-"===d?-1:1)*c.s.dt.settings()[0].oBrowser.barWidth,b(this).css("left",0<e?e:0)):(e=+e.replace(/px/g,"")+("-"===d?-1:1)*c.s.dt.settings()[0].oBrowser.barWidth,b(this).css("right",0<e?e:0))}})}},_matchWidths:function(a,d){var c=function(p){return b(p,a).map(function(){return 1*b(this).css("width").replace(/[^\d\.]/g,"")}).toArray()},f=function(p,q){b(p,d).each(function(n){b(this).css({width:q[n],minWidth:q[n]})})},e=c("th");
c=c("td");f("th",e);f("td",c)},_unsize:function(a){var d=this.dom[a].floating;d&&("footer"===a||"header"===a&&!this.s.autoWidth)?b("th, td",d).css({width:"",minWidth:""}):d&&"header"===a&&b("th, td",d).css("min-width","")},_horizontal:function(a,d){var c=this.dom[a],f=this.s.scrollLeft;if(c.floating&&f[a]!==d){if(this._scrollEnabled()){var e=b(b(this.s.dt.table().node()).parent()).scrollLeft();c.floating.scrollLeft(e);c.floatingParent.scrollLeft(e)}f[a]=d}},_modeChange:function(a,d,c){var f=this.dom[d],
e=this.s.position,p=this._scrollEnabled();if("footer"!==d||!p){var q=function(B){f.floating.attr("style",function(x,y){return(y||"")+"width: "+B+"px !important;"});p||f.floatingParent.attr("style",function(x,y){return(y||"")+"width: "+B+"px !important;"})},n=this.dom["footer"===d?"tfoot":"thead"],r=b.contains(n[0],g.activeElement)?g.activeElement:null,m=b(b(this.s.dt.table().node()).parent());if("in-place"===a)f.placeholder&&(f.placeholder.remove(),f.placeholder=null),this._unsize(d),"header"===d?
f.host.prepend(n):f.host.append(n),f.floating&&(f.floating.remove(),f.floating=null,this._stickyPosition(f.host,"+")),f.floatingParent&&f.floatingParent.remove(),b(b(f.host.parent()).parent()).scrollLeft(m.scrollLeft());else if("in"===a){this._clone(d,c);n=m.offset();c=b(g).scrollTop();var u=b(h).height();u=c+u;var z=p?n.top:e.tbodyTop;m=p?n.top+m.outerHeight():e.tfootTop;c="footer"===d?z>u?e.tfootHeight:z+e.tfootHeight-u:c+this.c.headerOffset+e.theadHeight-m;m="header"===d?"top":"bottom";c=this.c[d+
"Offset"]-(0<c?c:0);f.floating.addClass("fixedHeader-floating");f.floatingParent.css(m,c).css({left:e.left,height:"header"===d?e.theadHeight:e.tfootHeight,"z-index":2}).append(f.floating);q(e.width);"footer"===d&&f.floating.css("top","")}else"below"===a?(this._clone(d,c),f.floating.addClass("fixedHeader-locked"),f.floatingParent.css({position:"absolute",top:e.tfootTop-e.theadHeight,left:e.left+"px"}),q(e.width)):"above"===a&&(this._clone(d,c),f.floating.addClass("fixedHeader-locked"),f.floatingParent.css({position:"absolute",
top:e.tbodyTop,left:e.left+"px"}),q(e.width));r&&r!==g.activeElement&&setTimeout(function(){r.focus()},10);this.s.scrollLeft.header=-1;this.s.scrollLeft.footer=-1;this.s[d+"Mode"]=a}},_positions:function(){var a=this.s.dt,d=a.table(),c=this.s.position,f=this.dom;d=b(d.node());var e=this._scrollEnabled(),p=b(a.table().header());a=b(a.table().footer());f=f.tbody;var q=d.parent();c.visible=d.is(":visible");c.width=d.outerWidth();c.left=d.offset().left;c.theadTop=p.offset().top;c.tbodyTop=e?q.offset().top:
f.offset().top;c.tbodyHeight=e?q.outerHeight():f.outerHeight();c.theadHeight=p.outerHeight();c.theadBottom=c.theadTop+c.theadHeight;a.length?(c.tfootTop=c.tbodyTop+c.tbodyHeight,c.tfootBottom=c.tfootTop+a.outerHeight(),c.tfootHeight=a.outerHeight()):(c.tfootTop=c.tbodyTop+f.outerHeight(),c.tfootBottom=c.tfootTop,c.tfootHeight=c.tfootTop)},_scroll:function(a){if(!this.s.dt.settings()[0].bDestroying){var d=this._scrollEnabled(),c=b(this.s.dt.table().node()).parent(),f=c.offset(),e=c.outerHeight(),p=
b(g).scrollLeft(),q=b(g).scrollTop(),n=b(h).height(),r=n+q,m=this.s.position,u=d?f.top:m.tbodyTop,z=d?f.left:m.left;e=d?f.top+e:m.tfootTop;var B=d?c.outerWidth():m.tbodyWidth;r=q+n;this.c.header&&(this.s.enable?!m.visible||q+this.c.headerOffset+m.theadHeight<=u?n="in-place":q+this.c.headerOffset+m.theadHeight>u&&q+this.c.headerOffset+m.theadHeight<e?(n="in",c=b(b(this.s.dt.table().node()).parent()),q+this.c.headerOffset+m.theadHeight>e||this.dom.header.floatingParent===l?a=!0:this.dom.header.floatingParent.css({top:this.c.headerOffset,
position:"fixed"}).append(this.dom.header.floating)):n="below":n="in-place",(a||n!==this.s.headerMode)&&this._modeChange(n,"header",a),this._horizontal("header",p));var x={offset:{top:0,left:0},height:0},y={offset:{top:0,left:0},height:0};this.c.footer&&this.dom.tfoot.length&&(this.s.enable?!m.visible||m.tfootBottom+this.c.footerOffset<=r?m="in-place":e+m.tfootHeight+this.c.footerOffset>r&&u+this.c.footerOffset<r?(m="in",a=!0):m="above":m="in-place",(a||m!==this.s.footerMode)&&this._modeChange(m,
"footer",a),this._horizontal("footer",p),a=function(A){return{offset:A.offset(),height:A.outerHeight()}},x=this.dom.header.floating?a(this.dom.header.floating):a(this.dom.thead),y=this.dom.footer.floating?a(this.dom.footer.floating):a(this.dom.tfoot),d&&y.offset.top>q&&(d=q-f.top,r=r+(d>-x.height?d:0)-(x.offset.top+(d<-x.height?x.height:0)+y.height),0>r&&(r=0),c.outerHeight(r),Math.round(c.outerHeight())>=Math.round(r)?b(this.dom.tfoot.parent()).addClass("fixedHeader-floating"):b(this.dom.tfoot.parent()).removeClass("fixedHeader-floating")));
this.dom.header.floating&&this.dom.header.floatingParent.css("left",z-p);this.dom.footer.floating&&this.dom.footer.floatingParent.css("left",z-p);this.s.dt.settings()[0]._fixedColumns!==l&&(c=function(A,C,v){v===l&&(v=b("div.dtfc-"+A+"-"+C+"-blocker"),v=0===v.length?null:v.clone().appendTo("body").css("z-index",1));null!==v&&v.css({top:"top"===C?x.offset.top:y.offset.top,left:"right"===A?z+B-v.width():z});return v},this.dom.header.rightBlocker=c("right","top",this.dom.header.rightBlocker),this.dom.header.leftBlocker=
c("left","top",this.dom.header.leftBlocker),this.dom.footer.rightBlocker=c("right","bottom",this.dom.footer.rightBlocker),this.dom.footer.leftBlocker=c("left","bottom",this.dom.footer.leftBlocker))}},_scrollEnabled:function(){var a=this.s.dt.settings()[0].oScroll;return""!==a.sY||""!==a.sX?!0:!1}});t.version="3.2.3";t.defaults={header:!0,footer:!1,headerOffset:0,footerOffset:0};b.fn.dataTable.FixedHeader=t;b.fn.DataTable.FixedHeader=t;b(g).on("init.dt.dtfh",function(a,d,c){"dt"===a.namespace&&(a=
d.oInit.fixedHeader,c=k.defaults.fixedHeader,!a&&!c||d._fixedHeader||(c=b.extend({},c,a),!1!==a&&new t(d,c)))});k.Api.register("fixedHeader()",function(){});k.Api.register("fixedHeader.adjust()",function(){return this.iterator("table",function(a){(a=a._fixedHeader)&&a.update()})});k.Api.register("fixedHeader.enable()",function(a){return this.iterator("table",function(d){d=d._fixedHeader;a=a!==l?a:!0;d&&a!==d.enabled()&&d.enable(a)})});k.Api.register("fixedHeader.enabled()",function(){if(this.context.length){var a=
this.context[0]._fixedHeader;if(a)return a.enabled()}return!1});k.Api.register("fixedHeader.disable()",function(){return this.iterator("table",function(a){(a=a._fixedHeader)&&a.enabled()&&a.enable(!1)})});b.each(["header","footer"],function(a,d){k.Api.register("fixedHeader."+d+"Offset()",function(c){var f=this.context;return c===l?f.length&&f[0]._fixedHeader?f[0]._fixedHeader[d+"Offset"]():l:this.iterator("table",function(e){if(e=e._fixedHeader)e[d+"Offset"](c)})})});return t});