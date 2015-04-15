<?php

/* AevitasChannelBundle:Default:createTemplate.html.twig */
class __TwigTemplate_ef16a6de53e8f2922965e1b4c67ec908 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
    <link rel=\"stylesheet\" href=\"/bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jui_jquery-ui-1.9.2.custom.min_1.css\" type=\"text/css\" media=\"screen\">
";
    }

    // line 9
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 10
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
        <li><a href=\"#\">Template</a></li>
        <li class=\"divider\"></li>
\t<li>Create</li>
    </ul>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "    <div id=\"preview_template\" class=\"modal fade\" style=\"color:#000;\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
        <h4 class=\"modal-title\" style=\"text-transform:uppercase;color:#000;\">";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 33
            echo "        <div class=\"alert alert-faded\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            ";
            // line 35
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    <form id=\"submit_create_template\" action=\"\" method=\"POST\">
        ";
        // line 40
        echo "        
        ";
        // line 41
        $context["content"] = "";
        // line 42
        echo "            <table>

        ";
        // line 44
        $this->env->loadTemplate("AevitasChannelBundle:eLRTE:elrte.html.twig")->display($context);
        // line 45
        echo "        
        <tr>

            <table>
                <tr>
                    <td>
                        ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type"), 'label');
        echo "
                        ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type"), 'widget', array("attr" => array("style" => "text-align:center;width:80%;height:25px")));
        echo "
                        ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                        ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
                     </td>

                    <td>
                        ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label');
        echo "
                        ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array("style" => "padding-left:10px")));
        echo "
                        ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
                    </td>

                    <td>
                        <div style=\"text-align:center;padding-left:10px;padding-top:15px;\">
                            <input type=\"submit\" value=\"Add\" class=\"btn btn-primary\" />
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
        // line 84
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "sms")) {
            // line 85
            echo "
                            ";
            // line 86
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodysms"), 'label');
            echo "
                        </div>
                            ";
            // line 88
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodysms"), 'widget');
            echo "
                            ";
            // line 89
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                            ";
            // line 90
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
            echo "

                            ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "mail")) {
            // line 93
            echo "
                            ";
            // line 94
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodymail"), 'label');
            echo "
                        </div>
                            ";
            // line 96
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bodymail"), 'widget', array("attr" => array("style" => "width:600px;height:150px")));
            echo "
                            ";
            // line 97
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                            ";
            // line 98
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
            echo "

                            ";
        }
        // line 101
        echo "
                    </td>

                    <td>
                        ";
        // line 105
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "sms")) {
            // line 106
            echo "                        <div class=\"alert alert-message insert-variable\" style=\"height:300px;\">
                            List avaiable variables for SMS template:<br/>
                            ";
            // line 108
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listvars"]) ? $context["listvars"] : $this->getContext($context, "listvars")));
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 109
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
            // line 111
            echo "                        </div>
                        ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "mail")) {
            // line 113
            echo "                        <!-- <br/>body <b>Email</b> template -->
                        <div class=\"separator\"></div>
                        <div class=\"alert alert-message insert-variable\" style=\"height:300px;\">
                            List avaiable variables for Email template:<br/>
                            ";
            // line 117
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listvars"]) ? $context["listvars"] : $this->getContext($context, "listvars")));
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 118
                echo "                                &nbsp;-&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "name"), "html", null, true);
                echo " <label onclick=\"innerCode('email','";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "')\" class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["var"]) ? $context["var"] : $this->getContext($context, "var")), "code"), "html", null, true);
                echo "</label><br/>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 120
            echo "                        </div>
                        ";
        }
        // line 122
        echo "                    </td>
                </tr>
                
            </table>
            
        </tr>
        
        <input type=\"hidden\" name=\"template-type\" id=\"template-type\" value=\"";
        // line 129
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\">
        <div class=\"separator\"></div>

        
    </table>
    </form>

";
    }

    // line 138
    public function block_javascript($context, array $blocks = array())
    {
        // line 139
        echo "    <!-- select2 js -->
    <script src=\"";
        // line 140
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
        
        \$('#select-city').select2({
            width: '220px'
        });
        
        //add template into preview modal 
        \$('#preview_template').on('show.bs.modal', function (e) {
            var template_content=\$('<div></div>').html(\$('textarea').val()).text();
            // var template_content=\$('textarea').text();
            template_content='<div>'+template_content+'</div>';
          \$(this).find('div.modal-body').html(\$(template_content));
        });

        //get language button
        \$('div.relativeWrap.pull-right a').on('click',function(e){
            e.preventDefault();
        });
        
       
        function doSelectCity(obj){
            var cityname = \$(obj).find(\":selected\").text();
            \$('#city-name').val(cityname);
            //console.log(\$('#city-name').val());
            \$('#loading-district').addClass('loading');
            \$.ajax({
                url: '";
        // line 180
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "/'+\$(obj).val(),
                dataType: 'json',
                success: function(data){
                    \$('#loading-district').removeClass('loading');
                    \$('#select-district').select2(\"destroy\");
                    \$('#select-district').html('<option value=\"0\">-- Global</option>'+data.html).select2();
                }
            });
        }
        
        function doSelectDistrict(obj){
            var districtname = \$(obj).find(\":selected\").text();
            \$('#district-name').val(districtname);
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
        // line 213
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
    ";
        // line 260
        echo "        
        <!--must import with right order like this for text editot to be create-->
        <script src=\"";
        // line 262
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"), "html", null, true);
        echo "\"></script>
        
        <script src=\"";
        // line 265
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 266
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
           
        
        <script src=\"";
        // line 269
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 270
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/jquery.miniColors.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 271
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 272
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 274
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/js/tag-it.min.js"), "html", null, true);
        echo "\"></script>
            <script>
            \$('.wysihtml5').wysihtml5(
            {
                \"font-styles\": false, //Font styling, e.g. h1, h2, etc. Default true
                \"emphasis\": false, //Italics, bold, etc. Default true
                \"lists\": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                \"html\": false    , //Button which allows you to edit the generated HTML. Default false
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
        return "AevitasChannelBundle:Default:createTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 140,  304 => 139,  289 => 129,  280 => 122,  276 => 120,  249 => 111,  232 => 108,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 54,  110 => 40,  76 => 24,  260 => 128,  248 => 68,  245 => 67,  240 => 9,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 93,  401 => 135,  364 => 105,  361 => 104,  353 => 99,  349 => 97,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 68,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 86,  175 => 45,  167 => 61,  159 => 56,  155 => 40,  129 => 54,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 138,  296 => 127,  273 => 110,  270 => 109,  263 => 118,  259 => 117,  253 => 113,  234 => 84,  216 => 78,  192 => 90,  188 => 89,  170 => 62,  63 => 27,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 61,  137 => 48,  127 => 30,  113 => 49,  102 => 34,  90 => 31,  81 => 17,  59 => 10,  255 => 122,  244 => 7,  236 => 109,  230 => 139,  226 => 105,  222 => 117,  218 => 116,  210 => 97,  206 => 96,  202 => 112,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 29,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 71,  220 => 101,  214 => 98,  208 => 68,  169 => 60,  143 => 51,  140 => 59,  132 => 46,  128 => 66,  119 => 28,  107 => 44,  71 => 13,  177 => 64,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 12,  61 => 20,  94 => 36,  89 => 29,  85 => 37,  75 => 14,  68 => 25,  56 => 17,  201 => 94,  196 => 109,  183 => 47,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 52,  117 => 51,  105 => 40,  91 => 40,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 32,  46 => 19,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 10,  40 => 8,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 42,  115 => 27,  111 => 26,  108 => 37,  101 => 41,  98 => 40,  96 => 34,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 16,  50 => 7,  43 => 5,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 81,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 53,  147 => 53,  144 => 60,  141 => 50,  133 => 69,  130 => 44,  125 => 53,  122 => 64,  116 => 61,  112 => 59,  109 => 45,  106 => 22,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 33,  80 => 26,  73 => 31,  64 => 24,  60 => 19,  57 => 24,  54 => 18,  51 => 23,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 11,  33 => 3,  30 => 2,);
    }
}
