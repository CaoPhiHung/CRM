!function(b){var a=function(e,d){this.$element=b(e);this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file");this.$input=this.$element.find(":file");if(this.$input.length===0){return}this.name=this.$input.attr("name")||d.name;this.$hidden=this.$element.find(':hidden[name="'+this.name+'"]');if(this.$hidden.length===0){this.$hidden=b('<input type="hidden" />');this.$element.prepend(this.$hidden)}this.$preview=this.$element.find(".fileupload-preview");var c=this.$preview.css("height");if(this.$preview.css("display")!="inline"&&c!="0px"&&c!="none"){this.$preview.css("line-height",c)}this.$remove=this.$element.find('[data-dismiss="fileupload"]');this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",b.proxy(this.trigger,this));this.listen()};a.prototype={listen:function(){this.$input.on("change.fileupload",b.proxy(this.change,this));if(this.$remove){this.$remove.on("click.fileupload",b.proxy(this.clear,this))}},change:function(i,g){var f=i.target.files!==undefined?i.target.files[0]:(i.target.value?{name:i.target.value.replace(/^.+\\/,"")}:null);if(g==="clear"){return}if(!f){this.clear();return}this.$hidden.val("");this.$hidden.attr("name","");this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof f.type!=="undefined"?f.type.match("image.*"):f.name.match("\\.(gif|png|jpe?g)$"))&&typeof FileReader!=="undefined"){var c=new FileReader();var h=this.$preview;var d=this.$element;c.onload=function(j){h.html('<img src="'+j.target.result+'" '+(h.css("max-height")!="none"?'style="max-height: '+h.css("max-height")+';"':"")+" />");d.addClass("fileupload-exists").removeClass("fileupload-new")};c.readAsDataURL(f)}else{this.$preview.text(f.name);this.$element.addClass("fileupload-exists").removeClass("fileupload-new")}},clear:function(c){this.$hidden.val("");this.$hidden.attr("name",this.name);this.$input.attr("name","");this.$input.val("");this.$preview.html("");this.$element.addClass("fileupload-new").removeClass("fileupload-exists");if(c){this.$input.trigger("change",["clear"]);c.preventDefault()}},trigger:function(c){this.$input.trigger("click");c.preventDefault()}};b.fn.fileupload=function(c){return this.each(function(){var e=b(this),d=e.data("fileupload");if(!d){e.data("fileupload",(d=new a(this,c)))}})};b.fn.fileupload.Constructor=a;b(function(){b("body").on("click.fileupload.data-api",'[data-provides="fileupload"]',function(f){var d=b(this);if(d.data("fileupload")){return}d.fileupload(d.data());var c=b(f.target).parents("[data-dismiss=fileupload],[data-trigger=fileupload]").first();if(c.length>0){c.trigger("click.fileupload");f.preventDefault()}})})}(window.jQuery);