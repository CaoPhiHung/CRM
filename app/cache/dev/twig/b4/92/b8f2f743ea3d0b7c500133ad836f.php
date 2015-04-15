<?php

/* AevitasChannelBundle:Default:editTemplateRule.html.twig */
class __TwigTemplate_b492b8f2f743ea3d0b7c500133ad836f extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 20
            echo "        <div class=\"alert alert-faded\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            ";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    <form id=\"submit_create_template\" action=\"\" method=\"POST\">
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        
       
        <div class=\"separator\"></div>
        <div style=\"text-align: right\">
            <input type=\"submit\" value=\"Update\" class=\"btn btn-primary\" />
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
        // line 48
        echo twig_jsonencode_filter((isset($context["timertype"]) ? $context["timertype"] : $this->getContext($context, "timertype")));
        echo ";
    // console.log(v);

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
        return "AevitasChannelBundle:Default:editTemplateRule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 141,  281 => 139,  277 => 138,  254 => 120,  197 => 90,  118 => 56,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 338,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 140,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 120,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 70,  110 => 50,  76 => 34,  260 => 128,  248 => 68,  245 => 67,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 58,  223 => 102,  219 => 128,  215 => 55,  211 => 98,  207 => 143,  195 => 50,  191 => 49,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 47,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 256,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 145,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 84,  216 => 78,  192 => 160,  188 => 159,  170 => 62,  63 => 18,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 131,  137 => 48,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 32,  59 => 19,  255 => 122,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 100,  210 => 167,  206 => 96,  202 => 164,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 25,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 60,  229 => 106,  224 => 172,  220 => 101,  214 => 99,  208 => 68,  169 => 76,  143 => 51,  140 => 129,  132 => 46,  128 => 66,  119 => 28,  107 => 113,  71 => 22,  177 => 64,  165 => 74,  160 => 61,  135 => 62,  126 => 71,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 42,  89 => 37,  85 => 36,  75 => 14,  68 => 22,  56 => 18,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 73,  158 => 67,  156 => 71,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 48,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 38,  88 => 18,  78 => 32,  46 => 10,  44 => 9,  27 => 96,  79 => 34,  72 => 21,  69 => 22,  47 => 13,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 33,  131 => 60,  123 => 29,  120 => 42,  115 => 48,  111 => 47,  108 => 46,  101 => 41,  98 => 40,  96 => 43,  83 => 28,  74 => 24,  66 => 19,  55 => 15,  52 => 16,  50 => 14,  43 => 9,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 97,  203 => 93,  199 => 91,  193 => 88,  189 => 86,  187 => 85,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 92,  147 => 53,  144 => 130,  141 => 50,  133 => 125,  130 => 44,  125 => 58,  122 => 57,  116 => 67,  112 => 66,  109 => 65,  106 => 48,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 26,  73 => 31,  64 => 20,  60 => 20,  57 => 19,  54 => 18,  51 => 15,  48 => 7,  45 => 9,  42 => 8,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
