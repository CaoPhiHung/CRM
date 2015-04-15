<?php

/* AevitasChannelBundle:Default:editTemplate.html.twig */
class __TwigTemplate_b5cb50497cafc8a64c0d6520f5587aaa extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasChannelBundle:eLRTE:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasChannelBundle:eLRTE:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_import($context, array $blocks = array())
    {
        echo "    
    <!-- select2 css -->
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 8
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 9
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
        <li><a href=\"#\">Template</a></li>
        <li class=\"divider\"></li>
\t<li>Edit</li>
    </ul>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    <div id=\"preview_template\" class=\"modal fade\" style=\"color:#000;\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
        <h4 class=\"modal-title\" style=\"text-transform:uppercase;color:#000;\">";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "        <div class=\"alert alert-faded\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            ";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    ";
        // line 109
        echo "    <form id=\"submit_create_template\" action=\"\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
        ";
        // line 111
        echo "        
        ";
        // line 112
        $context["content"] = "";
        // line 113
        echo "            <table>

        ";
        // line 115
        $this->env->loadTemplate("AevitasChannelBundle:eLRTE:elrte.html.twig")->display($context);
        // line 116
        echo "        
        <tr>

            <table>
                <tr>
                    <td>
                        ";
        // line 122
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type"), 'label');
        echo "
                        ";
        // line 123
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type"), 'widget', array("attr" => array("style" => "text-align:center;width:80%;height:25px")));
        echo "
                        ";
        // line 124
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                        ";
        // line 125
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
                     </td>

                    <td>
                        ";
        // line 129
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label');
        echo "
                        ";
        // line 130
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array("style" => "padding-left:10px")));
        echo "
                        ";
        // line 131
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                        ";
        // line 132
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
                    </td>

                    <td>
                        <div style=\"text-align:center;padding-left:10px;padding-top:15px;\">
                            <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" />
                        </div>
                    </td>

                    <td>
                        <div style=\"text-align:center;padding-left:10px;padding-top:15px;\">
                            <input type=\"button\" value=\"Preview\" class=\"btn btn-primary\" data-toggle =\"modal\" href=\"#preview_template\" />
                        </div>
                    </td>
                </tr>
            </table>
            
        </tr>
        <tr>
            <table>
                <tr>
                    <td id='bodycontent'>
                        <div id=\"label_for_bodycontent\">
                            ";
        // line 155
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "sms")) {
            // line 156
            echo "
                            ";
            // line 157
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodysms"), 'label');
            echo "
                        </div>
                            ";
            // line 159
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodysms"), 'widget');
            echo "
                            ";
            // line 160
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                            ";
            // line 161
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
            echo "

                            ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "mail")) {
            // line 164
            echo "
                            ";
            // line 165
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodymail"), 'label');
            echo "
                        </div>
                            ";
            // line 167
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodymail"), 'widget', array("attr" => array("style" => "width:600px;height:150px")));
            echo "
                            ";
            // line 168
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                            ";
            // line 169
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
            echo "

                            ";
        }
        // line 172
        echo "
                    </td>

                    <td>
                        ";
        // line 176
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "sms")) {
            // line 177
            echo "                        <div class=\"alert alert-message insert-variable\" style=\"height:300px;\">
                            List avaiable variables for SMS template:<br/>
                            ";
            // line 179
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listvars"]) ? $context["listvars"] : $this->getContext($context, "listvars")));
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 180
                echo "                                &nbsp;-&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "name"), "html", null, true);
                echo " <label onclick=\"innerCode('sms','";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "')\" class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "</label></br>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "                        </div>
                        ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "mail")) {
            // line 184
            echo "                        <!-- <br/>body <b>Email</b> template -->
                        <div class=\"separator\"></div>
                        <div class=\"alert alert-message insert-variable\" style=\"height:300px;\">
                            List avaiable variables for Email template:<br/>
                            ";
            // line 188
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listvars"]) ? $context["listvars"] : $this->getContext($context, "listvars")));
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 189
                echo "                                &nbsp;-&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "name"), "html", null, true);
                echo " <label onclick=\"innerCode('email','";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "')\" class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "</label></br>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 191
            echo "                        </div>
                        ";
        }
        // line 193
        echo "                    </td>
                </tr>
                
            </table>
            
        </tr>
        
        <input type=\"hidden\" name=\"template-type\" id=\"template-type\" value=\"";
        // line 200
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\">
        <div class=\"separator\"></div>
        
    </table>
    </form>

";
    }

    // line 208
    public function block_javascript($context, array $blocks = array())
    {
        // line 209
        echo "    <!-- select2 js -->
    <script src=\"";
        // line 210
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/select2.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$('#aevitas_edit_template_name').css({'width':'220px', 'height':'25px'});
        \$('#aevitas_edit_template_bodysms').css({'width':'600px', 'height':'150px'});
        
        \$('#aevitas_edit_template_district').after(\$('#addtion-attr'));
        
        \$('#aevitas_edit_template_gender').select2({
            width: '220px'
        });
        
        \$('#aevitas_edit_template_level').select2({
            width: '220px'
        });

        //get language button
        \$('div.relativeWrap.pull-right a').on('click',function(e){
            e.preventDefault();
        });

        //add template into preview modal 
        \$('#preview_template').on('show.bs.modal', function (e) {
            var template_content=\$('<div></div>').html(\$('textarea').val()).text();
            template_content='<div>'+template_content+'</div>';
          \$(this).find('div.modal-body').html(\$(template_content));
          \$(this).css({
            'width':'800px'
          });
        });
        
        ";
        // line 240
        if ((!(null === (isset($context["city"]) ? $context["city"] : $this->getContext($context, "city"))))) {
            // line 241
            echo "            \$('#select-city').select2({
                width: '220px'
            }).val(";
            // line 243
            echo twig_escape_filter($this->env, (isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "html", null, true);
            echo ");
        ";
        } else {
            // line 245
            echo "            \$('#select-city').select2({
                width: '220px'
            });
        ";
        }
        // line 249
        echo "        
        function doSelectCity(obj){
            var cityname = \$(obj).find(\":selected\").text();
            \$('#city-name').val(cityname);
            //console.log(\$('#city-name').val());
            \$('#loading-district').addClass('loading');
            \$.ajax({
                url: '";
        // line 256
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "/'+\$(obj).val(),
                dataType: 'json',
                success: function(data){
                    \$('#loading-district').removeClass('loading');
                    \$('#select-district').select2(\"destroy\");
                    ";
        // line 261
        if ((!(null === (isset($context["district"]) ? $context["district"] : $this->getContext($context, "district"))))) {
            // line 262
            echo "                        var xhtml = (data.html).replace('value=\"";
            echo twig_escape_filter($this->env, (isset($context["district"]) ? $context["district"] : $this->getContext($context, "district")), "html", null, true);
            echo "\"', 'value=\"";
            echo twig_escape_filter($this->env, (isset($context["district"]) ? $context["district"] : $this->getContext($context, "district")), "html", null, true);
            echo "\" selected=\"selected\"');
                    ";
        } else {
            // line 264
            echo "                        var xhtml = '';
                    ";
        }
        // line 266
        echo "                    \$('#select-district').html('<option value=\"0\">-- Global</option>'+xhtml).select2();
                    ";
        // line 267
        if ((!(null === (isset($context["district"]) ? $context["district"] : $this->getContext($context, "district"))))) {
            // line 268
            echo "                        //console.log(\$('#select-district').val());
                        doSelectDistrict(document.getElementById('select-district'));
                    ";
        }
        // line 271
        echo "                }
            });
        }
        
        function doSelectDistrict(obj){
            var districtname = \$(obj).find(\":selected\").text();
            \$('#district-name').val(districtname);
            //console.log(\$('#district-name').val());
        }
        
        function innerCode(type, code){
            if (type == 'sms'){
                var temp = \$('#aevitas_edit_template_bodysms').val();
                temp += code;
                \$('#aevitas_edit_template_bodysms').val(temp);
                // \$('#aevitas_edit_template_bodysms').append(code);
            }else{
                var temp = \$('#aevitas_edit_template_bodymail').val();
                temp += code;
                \$('#aevitas_edit_template_bodymail').val(temp);
                // \$('#aevitas_edit_template_bodymail').append(code);
            }
            var wysihtml5_editor =\$('.wysihtml5').data(\"wysihtml5\").editor;
            
            wysihtml5_editor.composer.commands.exec(\"insertHTML\",code);
        }

        
        var templatetype= \"";
        // line 299
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\";
        var margin_bottom_variable=0;
        \$(document).ready(function(){

            if(templatetype=='sms'){
                margin_bottom_variable=3-\$('#aevitas_edit_template_bodysms-wysihtml5-toolbar').height()-\$('div#label_for_bodycontent >label').height();

            \$('.insert-variable').css(
                {
                    'margin-bottom':margin_bottom_variable
                }
                );
        }else{
            margin_bottom_variable=23-\$('#aevitas_edit_template_bodymail-wysihtml5-toolbar').height()-\$('div#label_for_bodycontent >label').height();
            \$('.insert-variable').css(
                {
                    'margin-bottom':margin_bottom_variable
                }
                
                );
        }
        });
        
        
    </script>
    <style>
    iframe.wysihtml5-sandbox{
        height: 305px !important;
    }
    </style>
    
        <!--must import with right order like this for text editot to be create-->
        <script src=\"";
        // line 331
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 332
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"), "html", null, true);
        echo "\"></script>
        
        <script src=\"";
        // line 334
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 335
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        
        <script src=\"";
        // line 337
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 338
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/jquery.miniColors.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 339
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 340
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 341
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 342
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/js/tag-it.min.js"), "html", null, true);
        echo "\"></script>
            <script>
            \$('.wysihtml5').wysihtml5(
            {
                \"font-styles\": false, //Font styling, e.g. h1, h2, etc. Default true
                \"emphasis\": false, //Italics, bold, etc. Default true
                \"lists\": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                \"htmlable\": false    , //Button which allows you to edit the generated HTML. Default false
                \"link\": false, //Button to insert a link. Default true
                \"image\": false, //Button to insert an image. Default true,
                \"color\": false //Button to change color of font 
            }
                );
            </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:editTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 338,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 193,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 120,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 132,  110 => 40,  76 => 24,  260 => 128,  248 => 68,  245 => 67,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 86,  175 => 45,  167 => 61,  159 => 56,  155 => 40,  129 => 124,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 256,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 138,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 84,  216 => 78,  192 => 160,  188 => 159,  170 => 62,  63 => 27,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 131,  137 => 48,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 32,  59 => 21,  255 => 122,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 169,  210 => 167,  206 => 96,  202 => 164,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 31,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 172,  220 => 101,  214 => 168,  208 => 68,  169 => 60,  143 => 51,  140 => 129,  132 => 46,  128 => 66,  119 => 28,  107 => 113,  71 => 25,  177 => 64,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 37,  89 => 31,  85 => 34,  75 => 14,  68 => 25,  56 => 17,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 112,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 32,  46 => 9,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 10,  40 => 8,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 42,  115 => 27,  111 => 115,  108 => 37,  101 => 41,  98 => 40,  96 => 109,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 16,  50 => 7,  43 => 8,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 81,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 53,  147 => 53,  144 => 130,  141 => 50,  133 => 125,  130 => 44,  125 => 123,  122 => 64,  116 => 61,  112 => 59,  109 => 45,  106 => 22,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 28,  73 => 31,  64 => 24,  60 => 19,  57 => 18,  54 => 18,  51 => 23,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 5,  33 => 3,  30 => 3,);
    }
}
