var grayscale=(function(){var b={colorProps:["color","backgroundColor","borderBottomColor","borderTopColor","borderLeftColor","borderRightColor","backgroundImage"],externalImageHandler:{init:function(j,k){if(j.nodeName.toLowerCase()==="img"){}else{d(j).backgroundImageSRC=k;j.style.backgroundImage=""}},reset:function(j){if(j.nodeName.toLowerCase()==="img"){}else{j.style.backgroundImage="url("+(d(j).backgroundImageSRC||"")+")"}}}},c=function(){try{window.console.log.apply(console,arguments)}catch(j){}},a=function(j){return(new RegExp("https?://(?!"+window.location.hostname+")")).test(j)},d=(function(){var j=[0],k="data"+(+new Date());return function(n){var m=n[k],l=j.length;if(!m){m=n[k]=l;j[m]={}}return j[m]}})(),e=function(o,r,q){var m=document.createElement("canvas"),l=m.getContext("2d"),u=o.naturalHeight||o.offsetHeight||o.height,k=o.naturalWidth||o.offsetWidth||o.width,j;m.height=u;m.width=k;l.drawImage(o,0,0);try{j=l.getImageData(0,0,k,u)}catch(p){}if(r){e.preparing=true;var s=0;(function(){if(!e.preparing){return}if(s===u){l.putImageData(j,0,0,0,0,k,u);q?(d(q).BGdataURL=m.toDataURL()):(d(o).dataURL=m.toDataURL())}for(var v=0;v<k;v++){var w=(s*k+v)*4;j.data[w]=j.data[w+1]=j.data[w+2]=h(j.data[w],j.data[w+1],j.data[w+2])}s++;setTimeout(arguments.callee,0)})();return}else{e.preparing=false}for(var s=0;s<u;s++){for(var t=0;t<k;t++){var n=(s*k+t)*4;j.data[n]=j.data[n+1]=j.data[n+2]=h(j.data[n],j.data[n+1],j.data[n+2])}}l.putImageData(j,0,0,0,0,k,u);return m},g=function(k,m){var j=document.defaultView&&document.defaultView.getComputedStyle?document.defaultView.getComputedStyle(k,null)[m]:k.currentStyle[m];if(j&&/^#[A-F0-9]/i.test(j)){var l=j.match(/[A-F0-9]{2}/ig);j="rgb("+parseInt(l[0],16)+","+parseInt(l[1],16)+","+parseInt(l[2],16)+")"}return j},h=function(l,k,j){return parseInt((0.2125*l)+(0.7154*k)+(0.0721*j),10)},f=function(j){var k=Array.prototype.slice.call(j.getElementsByTagName("*"));k.unshift(j);return k};var i=function(k){if(k&&k[0]&&k.length&&k[0].nodeName){var s=Array.prototype.slice.call(k),r=-1,y=s.length;while(++r<y){i.call(this,s[r])}return}k=k||document.documentElement;if(!document.createElement("canvas").getContext){k.style.filter="progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)";k.style.zoom=1;return}var j=f(k),u=-1,w=j.length;while(++u<w){var m=j[u];if(m.nodeName.toLowerCase()==="img"){var p=m.getAttribute("src");if(!p){continue}if(a(p)){b.externalImageHandler.init(m,p)}else{d(m).realSRC=p;try{m.src=d(m).dataURL||e(m).toDataURL()}catch(A){b.externalImageHandler.init(m,p)}}}else{for(var o=0,v=b.colorProps.length;o<v;o++){var l=b.colorProps[o],x=g(m,l);if(!x){continue}if(m.style[l]){d(m)[l]=x}if(x.substring(0,4)==="rgb("){var q=h.apply(null,x.match(/\d+/g));m.style[l]=x="rgb("+q+","+q+","+q+")";continue}if(x.indexOf("url(")>-1){var t=/\(['"]?(.+?)['"]?\)/,n=x.match(t)[1];if(a(n)){b.externalImageHandler.init(m,n);d(m).externalBG=true;continue}try{var z=d(m).BGdataURL||(function(){var B=document.createElement("img");B.src=n;return e(B).toDataURL()})();m.style[l]=x.replace(t,function(C,B){return"("+z+")"})}catch(A){b.externalImageHandler.init(m,n)}}}}}};i.reset=function(l){if(l&&l[0]&&l.length&&l[0].nodeName){var u=Array.prototype.slice.call(l),q=-1,r=u.length;while(++q<r){i.reset.call(this,u[q])}return}l=l||document.documentElement;if(!document.createElement("canvas").getContext){l.style.filter="progid:DXImageTransform.Microsoft.BasicImage(grayscale=0)";return}var s=f(l),n=-1,o=s.length;while(++n<o){var t=s[n];if(t.nodeName.toLowerCase()==="img"){var j=t.getAttribute("src");if(a(j)){b.externalImageHandler.reset(t,j)}t.src=d(t).realSRC||j}else{for(var p=0,m=b.colorProps.length;p<m;p++){if(d(t).externalBG){b.externalImageHandler.reset(t)}var k=b.colorProps[p];t.style[k]=d(t)[k]||""}}}};i.prepare=function(l){if(l&&l[0]&&l.length&&l[0].nodeName){var t=Array.prototype.slice.call(l),o=-1,q=t.length;while(++o<q){i.prepare.call(null,t[o])}return}l=l||document.documentElement;if(!document.createElement("canvas").getContext){return}var r=f(l),m=-1,n=r.length;while(++m<n){var s=r[m];if(d(s).skip){return}if(s.nodeName.toLowerCase()==="img"){if(s.getAttribute("src")&&!a(s.src)){e(s,true)}}else{var k=g(s,"backgroundImage");if(k.indexOf("url(")>-1){var p=/\(['"]?(.+?)['"]?\)/,j=k.match(p)[1];if(!a(j)){var u=document.createElement("img");u.src=j;e(u,true,s)}}}}};return i})();