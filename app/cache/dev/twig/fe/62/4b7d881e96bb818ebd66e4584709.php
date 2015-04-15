<?php

/* AevitasChannelBundle:Default:createTemplateRule.html.twig */
class __TwigTemplate_fe624b7d881e96bb818ebd66e4584709 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasChannelBundle:eLRTE:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
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
        <li><a href=\"#\">Rule</a></li>
        <li class=\"divider\"></li>
\t<li>Create</li>
    </ul>
";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 23
            echo "        <div class=\"alert alert-faded\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            ";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    ";
        // line 29
        echo "    <form id=\"submit_create_template\" action=\"\" method=\"POST\">
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        ";
        // line 31
        $context["content"] = "";
        // line 32
        echo "        
        <div class=\"separator\"></div>
        <div style=\"text-align: right\">
            <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" />
        </div>
    </form>
    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
<script>
    \$('select.option-type').parent().each(function(i){
        \$(this).addClass('wrap_option_type');
    });
    \$('.time-for-auto').css({
        'width':\$('input#aevitas_edit_template_rule_templateRuleName').width()
    });
     \$('input.check_birthday').parent().each(function(i){
        \$(this).addClass('wrap_option_type');
    });

    \$('#aevitas_edit_template_rule_filter-timer1_date_year').hide();
    \$('#aevitas_edit_template_rule_filter-timer1_date_year').val(new Date().getFullYear());
    var timertype = ";
        // line 52
        echo twig_jsonencode_filter((isset($context["timertype"]) ? $context["timertype"] : $this->getContext($context, "timertype")));
        echo ";

    function ontimertypechange(val,clear_error_message){

        if(!val)
        {
            \$('.time-for-auto').each(function(){
                \$(this).css({'display':'none'});
            });
        }
        else{
            var timeid_will_appear ='aevitas_edit_template_rule_filter-timer'+val;
            \$('#'+timeid_will_appear).css({'display':'block'});
            for(i=0;i<timertype.length;i++)
            {
                var index_will_disappear = timertype[i];
                if(index_will_disappear!=val)
                {
                    var timeid_will_disappear ='aevitas_edit_template_rule_filter-timer'+index_will_disappear;
                \$('#'+timeid_will_disappear).css({'display':'none'});
                }
                
            }

            //toggle date chosen 
            if(\$('select#aevitas_edit_template_rule_filter-timer1_date_year').attr('disabled'))
            {
                    \$('#'+timeid_will_appear).find('select').each(function(){
                        \$(this).removeAttr('disabled');
                    });
            }
        }
        
        if(clear_error_message)
            \$('.time-for-auto').parent().find('ul').remove();
    }

    
    var current_time_type = \$('#aevitas_edit_template_rule_timertype').val();
    // /**set default field for time delay**/
    if(current_time_type!=='')
        ontimertypechange(current_time_type,false);
    </script>
    <style>
    .wrap_option_type {
        position:absolute;
        margin-left:235px;
    }
    </style>

";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:createTemplateRule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 140,  304 => 139,  289 => 129,  280 => 122,  276 => 120,  249 => 111,  232 => 108,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 54,  110 => 40,  76 => 24,  260 => 128,  248 => 68,  245 => 67,  240 => 9,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 93,  401 => 135,  364 => 105,  361 => 104,  353 => 99,  349 => 97,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 68,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 86,  175 => 45,  167 => 61,  159 => 56,  155 => 40,  129 => 54,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 138,  296 => 127,  273 => 110,  270 => 109,  263 => 118,  259 => 117,  253 => 113,  234 => 84,  216 => 78,  192 => 90,  188 => 89,  170 => 62,  63 => 27,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 61,  137 => 48,  127 => 30,  113 => 52,  102 => 34,  90 => 31,  81 => 17,  59 => 21,  255 => 122,  244 => 7,  236 => 109,  230 => 139,  226 => 105,  222 => 117,  218 => 116,  210 => 97,  206 => 96,  202 => 112,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 29,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 71,  220 => 101,  214 => 98,  208 => 68,  169 => 60,  143 => 51,  140 => 59,  132 => 46,  128 => 66,  119 => 28,  107 => 44,  71 => 25,  177 => 64,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 23,  61 => 20,  94 => 36,  89 => 31,  85 => 30,  75 => 14,  68 => 25,  56 => 17,  201 => 94,  196 => 109,  183 => 47,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 52,  117 => 51,  105 => 40,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 32,  46 => 10,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 10,  40 => 8,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 42,  115 => 27,  111 => 26,  108 => 37,  101 => 41,  98 => 40,  96 => 34,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 16,  50 => 7,  43 => 9,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 81,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 53,  147 => 53,  144 => 60,  141 => 50,  133 => 69,  130 => 44,  125 => 53,  122 => 64,  116 => 61,  112 => 59,  109 => 45,  106 => 22,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 28,  73 => 31,  64 => 24,  60 => 19,  57 => 24,  54 => 18,  51 => 23,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 5,  33 => 3,  30 => 3,);
    }
}
