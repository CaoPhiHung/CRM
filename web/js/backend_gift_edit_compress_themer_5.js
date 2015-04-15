function themerUpdateColors(a){updatePrimaryColor(a,true,true)}function rgb2hex(a){var b=[a.r.toString(16),a.g.toString(16),a.b.toString(16)];$.each(b,function(c,d){if(d.length===1){b[c]="0"+d}});return"#"+b.join("")}function rgbString2obj(a){var c=a.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);var b={r:Number(c[1]),g:Number(c[2]),b:Number(c[3])};return b}function updatePrimaryColor(c,a,b){themerPrimaryColor=c;$("#themer-primary-cp").val(themerPrimaryColor);$.minicolors.refresh();if(a===true){attachStylesheet()}if(b===true){updateCharts()}if(themerPrimaryColor!=themerThemes[themerSelectedTheme].primaryColor){themerCustom[themerSelectedTheme].primaryColor=themerPrimaryColor}else{themerCustom[themerSelectedTheme].primaryColor=null}$.cookie("themerCustom",JSON.stringify(themerCustom));toggleGetCode()}function toggleGetCode(){var b=themerCustom[themerSelectedTheme];var a=false;$.each(themerCustom,function(d,c){if(c.primaryColor!=null){a=true}});if(a){$("#themer-getcode").show()}else{$("#themer-getcode").hide()}}var themerAdvanced=$.cookie("themerAdvanced")!=null?$.cookie("themerAdvanced")==true:false;function themerAdvancedToggle(){var a=[$("#themer-primary-cp"),$("#themer-header-cp"),$("#themer-menu-cp")];if($("#themer-advanced-toggle").is(":checked")){$("#themer").addClass("themer-advanced");$.each(a,function(c,b){b.attr("data-textfield",true).removeClass("minicolors-hidden")})}else{$("#themer").removeClass("themer-advanced");$.each(a,function(c,b){b.attr("data-textfield",false).addClass("minicolors-hidden")})}}function generateCSS(b){if(!b){b=""}var a="";$.each(themerCustom,function(d,c){if(c.primaryColor==null){return true}a+=themerThemes[d].apply.join(", \n")+"\n{\n	background: "+c.primaryColor+";\n}\n\n"});return a}function attachStylesheet(c,b){if(!$("#themer-stylesheet").length){$("head").append('<style id="themer-stylesheet"></style>')}var a=generateCSS(c);latestCode.less=a;$("#themer-stylesheet").attr("type","text/x-less").text(a);less.refreshStyles()}function updateCharts(){if(typeof charts=="undefined"){return false}charts.utility.chartColors.shift();charts.utility.chartColors.unshift($("#content").css("backgroundColor"));if(typeof charts.website_traffic_graph!="undefined"&&charts.website_traffic_graph.plot!=null){charts.website_traffic_graph.init()}if(typeof charts.website_traffic_overview!="undefined"&&charts.website_traffic_overview.plot!=null){charts.website_traffic_overview.init()}if(typeof charts.traffic_sources_pie!="undefined"&&charts.traffic_sources_pie.plot!=null){charts.traffic_sources_pie.init()}if(typeof charts.chart_simple!="undefined"&&charts.chart_simple.plot!=null){charts.chart_simple.init()}if(typeof charts.chart_lines_fill_nopoints!="undefined"&&charts.chart_lines_fill_nopoints.plot!=null){charts.chart_lines_fill_nopoints.init()}if(typeof charts.chart_ordered_bars!="undefined"&&charts.chart_ordered_bars.plot!=null){charts.chart_ordered_bars.init()}if(typeof charts.chart_donut!="undefined"&&charts.chart_donut.plot!=null){charts.chart_donut.init()}if(typeof charts.chart_stacked_bars!="undefined"&&charts.chart_stacked_bars.plot!=null){charts.chart_stacked_bars.init()}if(typeof charts.chart_pie!="undefined"&&charts.chart_pie.plot!=null){charts.chart_pie.init()}if(typeof charts.chart_horizontal_bars!="undefined"&&charts.chart_horizontal_bars.plot!=null){charts.chart_horizontal_bars.init()}if(typeof charts.chart_live!="undefined"&&charts.chart_live.plot!=null){charts.chart_live.init()}if(typeof genSparklines!="undefined"){genSparklines()}}function updateTheme(a){if($("#themer-theme").val()!=a){$("#themer-theme").val(a)}themerSelectedTheme=a;$.cookie("themerSelectedTheme",themerSelectedTheme);var b=themerCustom[a].primaryColor!=null?themerCustom[a].primaryColor:themerThemes[a].primaryColor;updatePrimaryColor(b,false,true);attachStylesheet()}function themerGetCode(a){var b;if(a===true){b=latestCode.less}else{b=latestCode.css()}bootbox.alert($('<pre class="prettyprint lang-html" id="themer-pretty"></pre>').html(b))}if(!themerSelectedTheme){var themerSelectedTheme=$.cookie("themerSelectedTheme")!=null?$.cookie("themerSelectedTheme"):0}var latestCode={css:function(){return $("#themer-stylesheet").text()},less:null};var themerThemes=[{name:"Dashboard",primaryColor:"#029ec6",visible:true,apply:[".color-3"]},{name:"UI Elements",primaryColor:"#fe9c1d",visible:true,apply:[".color-1"]},{name:"Charts",primaryColor:"#f25237",visible:true,apply:[".color-2"]},{name:"Forms",primaryColor:"#6dbe3e",visible:true,apply:[".color-4"]},{name:"Tables",primaryColor:"#929e31",visible:true,apply:[".color-5"]},{name:"Calendar",primaryColor:"#666b66",visible:true,apply:[".color-6"]},{name:"Login",primaryColor:"#865531",visible:true,apply:[".color-7"]},{name:"Finances",primaryColor:"#a51f80",visible:true,apply:[".color-8"]},{name:"Online Shop",primaryColor:"#54709f",visible:true,apply:[".color-9"]},{name:"Site pages",primaryColor:"#3ca06e",visible:true,apply:[".color-10"]},{name:"Photo Gallery",primaryColor:"#bd2220",visible:true,apply:[".color-11"]},{name:"Bookings",primaryColor:"#bd9320",visible:true,apply:[".color-12"]}];var themerCustomDefault=[];$.each(themerThemes,function(b,a){themerCustomDefault[b]={primaryColor:null}});var themerCustom=$.cookie("themerCustom")!=null?$.parseJSON($.cookie("themerCustom")):themerCustomDefault;if(themerThemes.length!=themerCustom.length){themerCustom=[];$.each(themerThemes,function(b,a){if(typeof themerCustom[b]=="undefined"){themerCustom[b]=$.extend(true,[],a)}});$.cookie("themerCustom",JSON.stringify(themerCustom))}$(function(){if($("#themer").length){var a=$.cookie("themerOpened")?$.cookie("themerOpened"):0;$("#themer").on("shown",function(){$.cookie("themerOpened",1)}).on("hidden",function(){$.cookie("themerOpened",0)});$("#themer .close2").on("click",function(){$("#themer").collapse("hide")});if(a==1){$("#themer").collapse("show")}$("#themer-primary-cp").attr("data-default",themerPrimaryColor).on("change",function(){var c=$(this),d=c.val();if(d){updatePrimaryColor(d,true,true)}});var b=$("#themer-theme");$.each(themerThemes,function(c,e){if(e.visible===true){var d=$("<option></option>").text(e.name).val(c);b.append(d)}});b.on("change",function(c){c.preventDefault();updateTheme(b.val())});$("#themer-getcode-less").click(function(c){c.preventDefault();themerGetCode(true)});$("#themer-getcode-css").click(function(c){c.preventDefault();themerGetCode()});$("#themer-custom-reset").click(function(){themerCustom[themerSelectedTheme].primaryColor=null;$.cookie("themerCustom",JSON.stringify(themerCustom));updateTheme(themerSelectedTheme)});$("#themer-advanced-toggle").on("change",function(){$.cookie("themerAdvanced",$(this).is(":checked")?"1":"0");themerAdvancedToggle()});if(themerAdvanced){$("#themer-advanced-toggle").prop("checked",true).trigger("change")}updateTheme(themerSelectedTheme)}});