(function(a){elFinder=function(d,f){var b=this,g;this.log=function(h){window.console&&window.console.log&&window.console.log(h)};this.options=a.extend({},this.options,f||{});if(!this.options.url){alert("Invalid configuration! You have to set URL option.");return}this.id="";if((g=a(d).attr("id"))){this.id=g}else{}this.version="1.2";this.jquery=a.fn.jquery.split(".").join("");this.cwd={};this.cdc={};this.buffer={};this.selected=[];this.history=[];this.locked=false;this.zIndex=2;this.dialog=null;this.anchor=this.options.docked?a("<div/>").hide().insertBefore(d):null;this.params={dotFiles:false,arc:"",uplMaxSize:""};this.vCookie="el-finder-view-"+this.id;this.pCookie="el-finder-places-"+this.id;this.lCookie="el-finder-last-"+this.id;this.view=new this.view(this,d);this.ui=new this.ui(this);this.eventsManager=new this.eventsManager(this);this.quickLook=new this.quickLook(this);this.cookie=function(h,k){if(typeof k=="undefined"){if(document.cookie&&document.cookie!=""){var j,n=document.cookie.split(";");h+="=";for(j=0;j<n.length;j++){n[j]=a.trim(n[j]);if(n[j].substring(0,h.length)==h){return decodeURIComponent(n[j].substring(h.length))}}}return""}else{var m,l=a.extend({},this.options.cookie);if(k===null){k="";l.expires=-1}if(typeof(l.expires)=="number"){m=new Date();m.setTime(m.getTime()+(l.expires*24*60*60*1000));l.expires=m}document.cookie=h+"="+encodeURIComponent(k)+"; expires="+l.expires.toUTCString()+(l.path?"; path="+l.path:"")+(l.domain?"; domain="+l.domain:"")+(l.secure?"; secure":"")}};this.lock=function(h){this.view.spinner((this.locked=h||false));this.eventsManager.lock=this.locked};this.lockShortcuts=function(h){this.eventsManager.lock=!!h};this.setView=function(h){if(h=="list"||h=="icons"){this.options.view=h;this.cookie(this.vCookie,h)}};this.ajax=function(j,k,h){var i={timeout:5000,url:this.options.url,async:true,type:"GET",data:j,dataType:"json",cache:false,lock:true,force:false,silent:false};if(typeof(h)=="object"){i=a.extend({},i,h)}if(!i.silent){i.error=b.view.fatal}i.success=function(l){i.lock&&b.lock();if(l){l.debug&&b.log(l.debug);if(l.error){!i.silent&&b.view.error(l.error,l.errorData);if(!i.force){return}}k(l);delete l}};i.lock&&this.lock(true);a.ajax(i)};this.tmb=function(){this.ajax({cmd:"tmb",current:b.cwd.hash},function(j){if(b.options.view=="icons"&&j.images&&j.current==b.cwd.hash){for(var h in j.images){if(b.cdc[h]){b.cdc[h].tmb=j.images[h];a('div[key="'+h+'"]>p',b.view.cwd).css("background",' url("'+j.images[h]+'") 0 0 no-repeat')}}j.tmb&&b.tmb()}},{lock:false,silent:true})};this.getPlaces=function(){var h=[],i=this.cookie(this.pCookie);if(i.length){if(i.indexOf(":")!=-1){h=i.split(":")}else{h.push(i)}}return h};this.addPlace=function(i){var h=this.getPlaces();if(a.inArray(i,h)==-1){h.push(i);this.savePlaces(h);return true}};this.removePlace=function(i){var h=this.getPlaces();if(a.inArray(i,h)!=-1){this.savePlaces(a.map(h,function(j){return j==i?null:j}));return true}};this.savePlaces=function(h){this.cookie(this.pCookie,h.join(":"))};this.reload=function(k){var j;this.cwd=k.cwd;this.cdc={};for(j=0;j<k.cdc.length;j++){if(k.cdc[j].hash&&k.cdc[j].name){this.cdc[k.cdc[j].hash]=k.cdc[j];this.cwd.size+=k.cdc[j].size}}if(k.tree){this.view.renderNav(k.tree);this.eventsManager.updateNav()}this.updateCwd();if(k.tmb&&!b.locked&&b.options.view=="icons"){b.tmb()}if(k.select&&k.select.length){var h=k.select.length;while(h--){this.cdc[k.select[h]]&&this.selectById(k.select[h])}}this.lastDir(this.cwd.hash);if(this.options.autoReload>0){this.iID&&clearInterval(this.iID);this.iID=setInterval(function(){!b.locked&&b.ui.exec("reload")},this.options.autoReload*60000)}};this.updateCwd=function(){this.lockShortcuts(true);this.selected=[];this.view.renderCwd();this.eventsManager.updateCwd();this.view.tree.find('a[key="'+this.cwd.hash+'"]').trigger("select");this.lockShortcuts()};this.drop=function(k,i,j){if(i.helper.find('[key="'+j+'"]').length){return b.view.error("Unable to copy into itself")}var h=[];i.helper.find('div:not(.noaccess):has(>label):not(:has(em[class="readonly"],em[class=""]))').each(function(){h.push(a(this).hide().attr("key"))});if(!i.helper.find("div:has(>label):visible").length){i.helper.hide()}if(h.length){b.setBuffer(h,k.shiftKey?0:1,j);if(b.buffer.files){setTimeout(function(){b.ui.exec("paste");b.buffer={}},300)}}else{a(this).removeClass("el-finder-droppable")}};this.getSelected=function(h){var j,k=[];if(h>=0){return this.cdc[this.selected[h]]||{}}for(j=0;j<this.selected.length;j++){this.cdc[this.selected[j]]&&k.push(this.cdc[this.selected[j]])}return k};this.select=function(h,i){i&&a(".ui-selected",b.view.cwd).removeClass("ui-selected");h.addClass("ui-selected");b.updateSelect()};this.selectById=function(i){var h=a('[key="'+i+'"]',this.view.cwd);if(h.length){this.select(h);this.checkSelectedPos()}};this.unselect=function(h){h.removeClass("ui-selected");b.updateSelect()};this.toggleSelect=function(h){h.toggleClass("ui-selected");this.updateSelect()};this.selectAll=function(){a("[key]",b.view.cwd).addClass("ui-selected");b.updateSelect()};this.unselectAll=function(){a(".ui-selected",b.view.cwd).removeClass("ui-selected");b.updateSelect()};this.updateSelect=function(){b.selected=[];a(".ui-selected",b.view.cwd).each(function(){b.selected.push(a(this).attr("key"))});b.view.selectedInfo();b.ui.update();b.quickLook.update()};this.checkSelectedPos=function(k){var j=b.view.cwd.find(".ui-selected:"+(k?"last":"first")).eq(0),l=j.position(),i=j.outerHeight(),m=b.view.cwd.height();if(l.top<0){b.view.cwd.scrollTop(l.top+b.view.cwd.scrollTop()-2)}else{if(m-l.top<i){b.view.cwd.scrollTop(l.top+i-m+b.view.cwd.scrollTop())}}};this.setBuffer=function(j,l,n){var h,m,k;this.buffer={src:this.cwd.hash,dst:n,files:[],names:[],cut:l||0};for(h=0;h<j.length;h++){m=j[h];k=this.cdc[m];if(k&&k.read&&k.type!="link"){this.buffer.files.push(k.hash);this.buffer.names.push(k.name)}}if(!this.buffer.files.length){this.buffer={}}};this.isValidName=function(h){if(!this.cwd.dotFiles&&h.indexOf(".")==0){return false}return h.match(/^[^\\\/\<\>:]+$/)};this.fileExists=function(j){for(var h in this.cdc){if(this.cdc[h].name==j){return h}}return false};this.uniqueName=function(l,k){l=b.i18n(l);var h=l,j=0,k=k||"";if(!this.fileExists(h+k)){return h+k}while(j++<100){if(!this.fileExists(h+j+k)){return h+j+k}}return h.replace("100","")+Math.random()+k};this.lastDir=function(h){if(this.options.rememberLastDir){return h?this.cookie(this.lCookie,h):this.cookie(this.lCookie)}};function c(i,j){i&&b.view.win.width(i);j&&b.view.nav.add(b.view.cwd).height(j)}function e(){c(null,b.dialog.height()-b.view.tlb.parent().height()-(a.browser.msie?47:32))}this.time=function(){return new Date().getMilliseconds()};this.setView(this.cookie(this.vCookie));c(b.options.width,b.options.height);if(this.options.dialog||this.options.docked){this.options.dialog=a.extend({width:570,dialogClass:"",minWidth:480,minHeight:330},this.options.dialog||{});this.options.dialog.open=function(){setTimeout(function(){a('<input type="text" value="f"/>').appendTo(b.view.win).focus().select().remove()},200)};this.options.dialog.dialogClass+="el-finder-dialog";this.options.dialog.resize=e;if(this.options.docked){this.options.dialog.close=function(){b.dock()};this.view.win.data("size",{width:this.view.win.width(),height:this.view.nav.height()})}else{this.options.dialog.close=function(){b.destroy()};this.dialog=a("<div/>").append(this.view.win).dialog(this.options.dialog)}}this.ajax({cmd:"open",target:this.lastDir()||"",init:true,tree:true},function(h){if(h.cwd){b.eventsManager.init();b.reload(h);a.extend(b.params,h.params||{});a("*",document.body).each(function(){var i=parseInt(a(this).css("z-index"));if(i>=b.zIndex){b.zIndex=i+1}});b.ui.init(h.disabled)}},{force:true});this.open=function(){this.dialog?this.dialog.dialog("open"):this.view.win.show();this.eventsManager.lock=false};this.close=function(){this.quickLook.hide();if(this.options.docked&&this.view.win.attr("undocked")){this.dock()}else{this.dialog?this.dialog.dialog("close"):this.view.win.hide()}this.eventsManager.lock=true};this.destroy=function(){this.eventsManager.lock=true;this.quickLook.hide();this.quickLook.win.remove();if(this.dialog){this.dialog.dialog("destroy");this.view.win.parent().remove()}else{this.view.win.remove()}this.ui.menu.remove()};this.dock=function(){if(this.options.docked&&this.view.win.attr("undocked")){this.quickLook.hide();var h=this.view.win.data("size");this.view.win.insertAfter(this.anchor).removeAttr("undocked");c(h.width,h.height);this.dialog.dialog("destroy");this.dialog=null}};this.undock=function(){if(this.options.docked&&!this.view.win.attr("undocked")){this.quickLook.hide();this.dialog=a("<div/>").append(this.view.win.css("width","100%").attr("undocked",true).show()).dialog(this.options.dialog);e()}}};elFinder.prototype.i18n=function(b){return this.options.i18n[this.options.lang]&&this.options.i18n[this.options.lang][b]?this.options.i18n[this.options.lang][b]:b};elFinder.prototype.options={url:"",lang:"en",cssClass:"",wrap:14,places:"Places",placesFirst:true,editorCallback:null,cutURL:"",closeOnEditorCallback:true,i18n:{},view:"icons",width:"",height:"",disableShortcuts:false,rememberLastDir:true,cookie:{expires:30,domain:"",path:"/",secure:false},toolbar:[["back","reload"],["select","open"],["mkdir","mkfile","upload"],["copy","paste","rm"],["rename","edit"],["info","quicklook","resize"],["icons","list"],["load"]],contextmenu:{cwd:["reload","delim","mkdir","mkfile","upload","delim","paste","delim","info","load"],file:["select","open","quicklook","delim","copy","cut","rm","delim","duplicate","rename","edit","resize","archive","extract","delim","info","load"],group:["select","copy","cut","rm","delim","archive","extract","delim","info","load"]},dialog:null,docked:false,autoReload:0,selectMultiple:false};a.fn.elfinder=function(b){return this.each(function(){var c=typeof(b)=="string"?b:"";if(!this.elfinder){this.elfinder=new elFinder(this,typeof(b)=="object"?b:{})}switch(c){case"close":case"hide":this.elfinder.close();break;case"open":case"show":this.elfinder.open();break;case"dock":this.elfinder.dock();break;case"undock":this.elfinder.undock();break;case"destroy":this.elfinder.destroy();break}})}})(jQuery);