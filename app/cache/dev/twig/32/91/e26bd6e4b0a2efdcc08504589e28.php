<?php

/* AevitasLevisBundle:GiftArticle:importGift.html.twig */
class __TwigTemplate_3291e26bd6e4b0a2efdcc08504589e28 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
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

    // line 5
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 6
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gift"), "html", null, true);
        echo "</li>
    <li class=\"divider\"></li>
    <li>";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import"), "html", null, true);
        echo "</li>
</ul>
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 17
            echo "                    <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    <form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('routing')->getPath("backend_gift_import");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
        <div class=\"row-fluid\">
            <div class=\"span9\">
           ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fileupload"), 'label');
        echo "
           ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fileupload"), 'widget');
        echo "
                    <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"File is required.\"><i></i></span>
                    <span class=\"error\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fileupload"), 'errors');
        echo "</span>
                    <div class=\"separator\"></div>        
                </div>
            </div>
            <div class=\"separator line bottom\"></div>
            ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            <div class=\"form-actions\" style=\"margin: 0;\">
                <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Import</button>
            </div>
        </form>
";
    }

    // line 40
    public function block_javascript($context, array $blocks = array())
    {
        // line 41
        echo "
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:GiftArticle:importGift.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 55,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 120,  429 => 149,  422 => 145,  417 => 144,  395 => 138,  388 => 134,  339 => 123,  153 => 61,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 136,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 81,  118 => 39,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 238,  394 => 267,  391 => 135,  377 => 261,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 102,  198 => 93,  174 => 73,  200 => 77,  186 => 72,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 8,  228 => 106,  221 => 131,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 93,  223 => 92,  219 => 87,  215 => 55,  211 => 98,  207 => 66,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 46,  124 => 25,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 143,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 121,  234 => 90,  216 => 78,  192 => 83,  188 => 56,  170 => 62,  63 => 21,  53 => 16,  58 => 17,  23 => 3,  34 => 8,  146 => 58,  148 => 131,  137 => 55,  127 => 42,  113 => 116,  102 => 41,  90 => 28,  81 => 25,  59 => 23,  255 => 131,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 95,  218 => 90,  210 => 89,  206 => 96,  202 => 64,  190 => 73,  184 => 78,  172 => 72,  150 => 61,  77 => 23,  97 => 30,  65 => 20,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 101,  214 => 90,  208 => 68,  169 => 76,  143 => 51,  140 => 57,  132 => 53,  128 => 46,  119 => 45,  107 => 42,  71 => 22,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 45,  114 => 47,  84 => 17,  70 => 29,  67 => 25,  61 => 20,  94 => 41,  89 => 31,  85 => 26,  75 => 14,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 76,  171 => 44,  166 => 73,  163 => 73,  158 => 67,  156 => 66,  151 => 50,  142 => 57,  138 => 43,  136 => 52,  121 => 50,  117 => 51,  105 => 39,  91 => 32,  62 => 19,  49 => 11,  87 => 26,  21 => 1,  38 => 9,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 34,  78 => 26,  46 => 9,  44 => 14,  27 => 96,  79 => 28,  72 => 27,  69 => 22,  47 => 15,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 48,  139 => 45,  131 => 47,  123 => 50,  120 => 42,  115 => 48,  111 => 41,  108 => 40,  101 => 31,  98 => 33,  96 => 37,  83 => 32,  74 => 25,  66 => 22,  55 => 17,  52 => 12,  50 => 15,  43 => 11,  41 => 18,  35 => 5,  32 => 4,  29 => 3,  209 => 87,  203 => 92,  199 => 63,  193 => 80,  189 => 86,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 69,  162 => 68,  154 => 51,  149 => 60,  147 => 53,  144 => 58,  141 => 46,  133 => 54,  130 => 55,  125 => 51,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 44,  99 => 30,  95 => 29,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 22,  64 => 25,  60 => 17,  57 => 18,  54 => 18,  51 => 12,  48 => 14,  45 => 13,  42 => 11,  39 => 2,  36 => 5,  33 => 6,  30 => 5,);
    }
}
