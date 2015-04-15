<?php

/* AevitasLevisBundle:Front:completeEnrollmentStep0.html.twig */
class __TwigTemplate_b2cf9c0dff14712db83d74fc10228dcf extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Front:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "        <title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Complete Enrollment"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Step 1"), "html", null, true);
        echo "</title>
        ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>Become A Member</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<section id=\"form_reg\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\" style=\"background:url('";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                <ul class=\"steps\">
                    <li class=\"active step1\"><span><span>1. ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create Password"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"step2\"><span><span>2. ";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Update Information"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"step4\"><span><span>3. ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opt In"), "html", null, true);
        echo "</span></span></li>
                </ul>
                <div class=\"info steptwo\">
                    <span class=\"title\"><h3>1. ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Update Password"), "html", null, true);
        echo "</h3></span>
                    <div>
                        <p>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Please create the password."), "html", null, true);
        echo "</p>
                        ";
        // line 29
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "AevitasLevisBundle::Front/form.html.twig"));
        // line 30
        echo "                        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("levis_home_complete_enrollment_step1");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"formstep2\">
                            <div class=\"row\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainPassword"), 'row');
        echo "
                            </div>";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                            <div>
                                <input type=\"submit\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step"), "html", null, true);
        echo "\" class=\"yellow_button\" />
                            </div>

                        </form>
                    </div>
                </div>
                <span class=\"points\"><em>+10</em></span>
            </div>
        </div>
    </div>
</section>
";
        // line 45
        echo $this->env->getExtension('aevitas_twig')->pointsConfig();
        echo "
";
    }

    // line 47
    public function block_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:completeEnrollmentStep0.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  920 => 427,  907 => 419,  887 => 416,  869 => 415,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 389,  714 => 314,  697 => 300,  650 => 260,  647 => 259,  636 => 255,  632 => 253,  621 => 251,  613 => 249,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 219,  543 => 218,  539 => 217,  533 => 214,  525 => 213,  513 => 209,  505 => 208,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 159,  342 => 149,  327 => 143,  306 => 137,  290 => 127,  265 => 85,  250 => 110,  923 => 425,  910 => 417,  890 => 414,  872 => 413,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 312,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 257,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 224,  554 => 219,  546 => 218,  542 => 217,  522 => 212,  516 => 209,  508 => 208,  490 => 203,  460 => 194,  410 => 176,  366 => 159,  261 => 113,  194 => 87,  693 => 299,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 137,  515 => 135,  511 => 134,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 115,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 315,  654 => 310,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 252,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 151,  311 => 155,  302 => 151,  242 => 117,  233 => 76,  406 => 122,  382 => 118,  370 => 160,  274 => 93,  238 => 83,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 175,  405 => 175,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 139,  286 => 284,  266 => 87,  262 => 129,  256 => 104,  204 => 92,  161 => 56,  185 => 64,  134 => 51,  378 => 132,  340 => 147,  336 => 123,  330 => 143,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 168,  339 => 123,  153 => 69,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 218,  376 => 27,  372 => 226,  334 => 18,  225 => 217,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 273,  587 => 229,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 188,  411 => 226,  380 => 165,  367 => 160,  344 => 108,  338 => 25,  335 => 145,  331 => 186,  297 => 94,  181 => 65,  332 => 145,  323 => 154,  319 => 153,  315 => 140,  308 => 133,  292 => 144,  288 => 126,  281 => 92,  277 => 138,  254 => 124,  197 => 74,  118 => 36,  100 => 33,  504 => 207,  500 => 341,  496 => 128,  492 => 339,  488 => 243,  484 => 202,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 165,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 127,  284 => 124,  257 => 84,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 192,  442 => 269,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 93,  280 => 137,  276 => 113,  249 => 83,  232 => 82,  198 => 204,  174 => 73,  200 => 69,  186 => 48,  152 => 188,  110 => 30,  76 => 23,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 104,  228 => 101,  221 => 70,  213 => 94,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 130,  295 => 75,  291 => 126,  287 => 73,  279 => 71,  275 => 70,  271 => 133,  267 => 116,  251 => 190,  243 => 106,  239 => 187,  231 => 101,  227 => 93,  223 => 100,  219 => 96,  215 => 75,  211 => 77,  207 => 92,  195 => 50,  191 => 87,  179 => 83,  175 => 64,  167 => 57,  159 => 72,  155 => 55,  129 => 53,  124 => 50,  104 => 34,  563 => 210,  560 => 222,  556 => 205,  428 => 186,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 80,  397 => 203,  392 => 209,  389 => 200,  371 => 190,  369 => 256,  358 => 114,  356 => 157,  350 => 151,  348 => 161,  317 => 82,  313 => 139,  301 => 176,  296 => 127,  273 => 91,  270 => 116,  263 => 188,  259 => 192,  253 => 79,  234 => 78,  216 => 96,  192 => 88,  188 => 53,  170 => 125,  63 => 19,  53 => 17,  58 => 19,  23 => 3,  34 => 3,  146 => 185,  148 => 65,  137 => 48,  127 => 47,  113 => 34,  102 => 32,  90 => 30,  81 => 38,  59 => 33,  255 => 89,  244 => 84,  236 => 179,  230 => 176,  226 => 100,  222 => 95,  218 => 61,  210 => 94,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 76,  150 => 56,  77 => 24,  97 => 31,  65 => 21,  480 => 162,  474 => 161,  469 => 120,  461 => 117,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 232,  435 => 146,  430 => 187,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 126,  387 => 167,  384 => 167,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 186,  360 => 249,  355 => 106,  341 => 105,  337 => 147,  322 => 141,  314 => 99,  312 => 134,  309 => 137,  305 => 316,  298 => 97,  294 => 90,  285 => 118,  283 => 283,  278 => 150,  268 => 115,  264 => 84,  258 => 113,  252 => 121,  247 => 189,  241 => 82,  235 => 103,  229 => 218,  224 => 109,  220 => 80,  214 => 209,  208 => 72,  169 => 82,  143 => 38,  140 => 50,  132 => 46,  128 => 47,  119 => 49,  107 => 34,  71 => 22,  177 => 49,  165 => 65,  160 => 52,  135 => 47,  126 => 34,  114 => 36,  84 => 28,  70 => 23,  67 => 21,  61 => 30,  94 => 31,  89 => 28,  85 => 27,  75 => 23,  68 => 21,  56 => 14,  201 => 67,  196 => 89,  183 => 66,  171 => 82,  166 => 73,  163 => 73,  158 => 189,  156 => 56,  151 => 55,  142 => 53,  138 => 52,  136 => 44,  121 => 45,  117 => 36,  105 => 32,  91 => 29,  62 => 16,  49 => 13,  87 => 28,  21 => 2,  38 => 7,  28 => 3,  24 => 1,  25 => 3,  31 => 5,  26 => 2,  19 => 1,  93 => 30,  88 => 29,  78 => 46,  46 => 11,  44 => 13,  27 => 4,  79 => 26,  72 => 22,  69 => 22,  47 => 14,  40 => 9,  37 => 8,  22 => 1,  246 => 106,  157 => 57,  145 => 53,  139 => 61,  131 => 49,  123 => 39,  120 => 39,  115 => 48,  111 => 34,  108 => 34,  101 => 31,  98 => 31,  96 => 31,  83 => 27,  74 => 24,  66 => 21,  55 => 31,  52 => 15,  50 => 13,  43 => 8,  41 => 9,  35 => 8,  32 => 6,  29 => 3,  209 => 87,  203 => 74,  199 => 89,  193 => 80,  189 => 83,  187 => 199,  182 => 63,  176 => 61,  173 => 194,  168 => 82,  164 => 190,  162 => 71,  154 => 56,  149 => 54,  147 => 54,  144 => 60,  141 => 60,  133 => 44,  130 => 41,  125 => 47,  122 => 54,  116 => 157,  112 => 37,  109 => 33,  106 => 33,  103 => 33,  99 => 32,  95 => 30,  92 => 30,  86 => 27,  82 => 26,  80 => 24,  73 => 23,  64 => 21,  60 => 19,  57 => 29,  54 => 15,  51 => 10,  48 => 11,  45 => 6,  42 => 5,  39 => 5,  36 => 5,  33 => 3,  30 => 2,);
    }
}
