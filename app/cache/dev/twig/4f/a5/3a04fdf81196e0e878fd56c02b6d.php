<?php

/* AevitasLevisBundle:Backend:GroupEdit.html.twig */
class __TwigTemplate_4fa53a04fdf81196e0e878fd56c02b6d extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Backend:root.html.twig";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/vietlanduser/js/select2/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- select2 js -->
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/vietlanduser/js/select2/select2.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 11
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 12
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend"), "html", null, true);
        echo "\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
\t<li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/user/group/list"), "html", null, true);
        echo "\">Group</a></li>
        <li class=\"divider\"></li>
        <li>Edit</li>
    </ul>
";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "    <form class=\"form-horizontal\" action=\"\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
    <div class=\"block full-block\">

                ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "                    <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "            <div class=\"separator line bottom\"></div>
            <div class=\"control-group\">
                <label class=\"control-label\">Group name</label>
                <div class=\"controls\">
                    ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Choose group admin</label>
                <div class=\"controls\">
                    <input class=\"select2-offscreen\" tabindex=\"-1\" id=\"vietland_user_group_admin\" name=\"vietland_user_group_admin\" style=\"width:220px\" type=\"hidden\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["admin_id"]) ? $context["admin_id"] : $this->getContext($context, "admin_id")), "html", null, true);
        echo "\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Choose roles</label>
                <div class=\"controls\">
                    ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "roles"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

            <div class=\"form-actions\" style=\"margin: 0;\">
                    <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Save changes</button>
            </div>

    </div>
    </form>
";
    }

    // line 63
    public function block_javascript($context, array $blocks = array())
    {
        // line 64
        echo "    <script>
      \$(document).ready(function() {
        \$(\"#vietland_user_group_admin\").select2({
            minimumInputLength: 2,
            ajax: {
                url: \"";
        // line 69
        echo $this->env->getExtension('routing')->getPath("backend_user_search", array("_format" => "json"));
        echo "\",
                dataType: 'jsonp',
                data: function(term, page){
                     return {
                        q: term
                     };
                },
                results: function (data, page) {
                    console.log(data);
                    return {results: data};
                }
            },
            initSelection : function (element, callback) {
                var data = {id: ";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["admin_id"]) ? $context["admin_id"] : $this->getContext($context, "admin_id")), "html", null, true);
        echo ", text: '";
        echo twig_escape_filter($this->env, (isset($context["admin_name"]) ? $context["admin_name"] : $this->getContext($context, "admin_name")), "html", null, true);
        echo "'};
                callback(data);
            }
        });
      });
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:GroupEdit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 122,  382 => 118,  370 => 116,  274 => 93,  238 => 83,  20 => 1,  571 => 219,  568 => 218,  564 => 211,  408 => 111,  405 => 110,  375 => 186,  359 => 171,  351 => 112,  320 => 104,  316 => 135,  286 => 95,  266 => 108,  262 => 91,  256 => 104,  204 => 52,  161 => 43,  185 => 66,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 105,  429 => 149,  422 => 145,  417 => 144,  395 => 8,  388 => 119,  339 => 123,  153 => 69,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 218,  376 => 117,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 108,  338 => 107,  335 => 187,  331 => 186,  297 => 175,  181 => 65,  332 => 106,  323 => 154,  319 => 153,  315 => 103,  308 => 133,  292 => 96,  288 => 121,  281 => 139,  277 => 138,  254 => 120,  197 => 73,  118 => 45,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 187,  396 => 238,  394 => 120,  391 => 135,  377 => 212,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 209,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 129,  280 => 94,  276 => 113,  249 => 111,  232 => 82,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 87,  228 => 106,  221 => 62,  213 => 78,  180 => 156,  401 => 271,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 130,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 110,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 85,  219 => 81,  215 => 60,  211 => 77,  207 => 75,  195 => 50,  191 => 92,  179 => 79,  175 => 64,  167 => 63,  159 => 72,  155 => 40,  129 => 46,  124 => 50,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 186,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 121,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 114,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 102,  301 => 176,  296 => 127,  273 => 112,  270 => 109,  263 => 188,  259 => 192,  253 => 88,  234 => 90,  216 => 79,  192 => 70,  188 => 56,  170 => 125,  63 => 21,  53 => 16,  58 => 16,  23 => 3,  34 => 3,  146 => 64,  148 => 54,  137 => 48,  127 => 42,  113 => 42,  102 => 38,  90 => 31,  81 => 38,  59 => 23,  255 => 89,  244 => 84,  236 => 179,  230 => 176,  226 => 81,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 72,  150 => 56,  77 => 36,  97 => 31,  65 => 31,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 221,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 166,  305 => 164,  298 => 97,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 92,  264 => 84,  258 => 90,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 80,  214 => 90,  208 => 72,  169 => 82,  143 => 63,  140 => 50,  132 => 37,  128 => 36,  119 => 49,  107 => 43,  71 => 25,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 53,  114 => 51,  84 => 26,  70 => 29,  67 => 20,  61 => 30,  94 => 36,  89 => 34,  85 => 27,  75 => 35,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 47,  171 => 62,  166 => 73,  163 => 73,  158 => 67,  156 => 56,  151 => 56,  142 => 53,  138 => 43,  136 => 52,  121 => 50,  117 => 48,  105 => 39,  91 => 40,  62 => 19,  49 => 11,  87 => 39,  21 => 1,  38 => 6,  28 => 3,  24 => 4,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 28,  78 => 26,  46 => 9,  44 => 13,  27 => 2,  79 => 25,  72 => 22,  69 => 21,  47 => 19,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 63,  131 => 47,  123 => 49,  120 => 43,  115 => 48,  111 => 41,  108 => 48,  101 => 42,  98 => 33,  96 => 31,  83 => 26,  74 => 27,  66 => 21,  55 => 13,  52 => 12,  50 => 13,  43 => 8,  41 => 11,  35 => 8,  32 => 4,  29 => 3,  209 => 87,  203 => 74,  199 => 63,  193 => 80,  189 => 71,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 58,  162 => 59,  154 => 55,  149 => 69,  147 => 55,  144 => 53,  141 => 46,  133 => 54,  130 => 53,  125 => 46,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 35,  99 => 38,  95 => 41,  92 => 35,  86 => 35,  82 => 28,  80 => 25,  73 => 24,  64 => 19,  60 => 15,  57 => 29,  54 => 15,  51 => 23,  48 => 11,  45 => 21,  42 => 11,  39 => 5,  36 => 5,  33 => 4,  30 => 3,);
    }
}
