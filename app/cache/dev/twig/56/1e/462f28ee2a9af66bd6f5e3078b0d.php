<?php

/* AevitasLevisBundle:Backend:ImportUser.html.twig */
class __TwigTemplate_561e462f28ee2a9af66bd6f5e3078b0d extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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

    // line 3
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 4
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("BACKEND"), "html", null, true);
        echo "</a></li>
    <li class=\"divider\"></li>
    <li>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import Users"), "html", null, true);
        echo "</li>
</ul>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "<form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('routing')->getPath("backend_import_user");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
    <div class=\"block full-block\">
        <div class=\"block_content\">
            <div class=\"control-group row-fluid\">
                <label class=\"control-label\">Choose data file</label>
                <div class=\"controls\">
                    <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\"><input name=\"\" value=\"\" type=\"hidden\">
                        <div class=\"input-append\">
                            <div class=\"uneditable-input span3\">
                                <i class=\"icon-file fileupload-exists\"></i> 
                                <span class=\"fileupload-preview\"></span>
                            </div>
                            <span class=\"btn btn-file\">
                                <span class=\"fileupload-new\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select file"), "html", null, true);
        echo "</span>
                                <span class=\"fileupload-exists\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Change"), "html", null, true);
        echo "</span>
                                    ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fileupload"), 'widget', array("attr" => array()));
        echo "
                            </span>
                            <a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">Remove</a>
                            <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Excel or CSV file\"><i></i></span>
                        </div>
                    </div>

                    ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                </div>
                <i><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("data/TBFSampleUser.csv"), "html", null, true);
        echo "\">Download Sample</a></i>
            </div>

            <div class=\"separator line bottom\"></div>

            <div class=\"form-actions\" style=\"margin: 0;\">
                <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Save changes</button>
            </div>

        </div>
    </div>
</form>
";
    }

    // line 50
    public function block_javascript($context, array $blocks = array())
    {
        // line 51
        echo "
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:ImportUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 52,  161 => 43,  185 => 55,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 120,  429 => 149,  422 => 145,  417 => 144,  395 => 138,  388 => 134,  339 => 123,  153 => 42,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 136,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 51,  118 => 45,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 238,  394 => 267,  391 => 135,  377 => 261,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 102,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 8,  228 => 106,  221 => 62,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 92,  219 => 87,  215 => 60,  211 => 98,  207 => 157,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 47,  124 => 35,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 143,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 192,  253 => 121,  234 => 90,  216 => 78,  192 => 83,  188 => 56,  170 => 125,  63 => 21,  53 => 16,  58 => 16,  23 => 3,  34 => 3,  146 => 58,  148 => 131,  137 => 55,  127 => 42,  113 => 33,  102 => 41,  90 => 28,  81 => 26,  59 => 23,  255 => 191,  244 => 7,  236 => 179,  230 => 176,  226 => 64,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 72,  150 => 61,  77 => 25,  97 => 30,  65 => 22,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 101,  214 => 90,  208 => 72,  169 => 76,  143 => 51,  140 => 39,  132 => 37,  128 => 36,  119 => 45,  107 => 42,  71 => 25,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 45,  114 => 51,  84 => 17,  70 => 26,  67 => 25,  61 => 20,  94 => 36,  89 => 34,  85 => 27,  75 => 26,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 47,  171 => 44,  166 => 73,  163 => 73,  158 => 67,  156 => 66,  151 => 56,  142 => 51,  138 => 43,  136 => 38,  121 => 50,  117 => 51,  105 => 39,  91 => 32,  62 => 19,  49 => 11,  87 => 40,  21 => 1,  38 => 9,  28 => 3,  24 => 1,  25 => 1,  31 => 2,  26 => 2,  19 => 1,  93 => 34,  88 => 34,  78 => 26,  46 => 9,  44 => 13,  27 => 96,  79 => 27,  72 => 27,  69 => 23,  47 => 14,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 45,  131 => 47,  123 => 50,  120 => 34,  115 => 48,  111 => 50,  108 => 48,  101 => 31,  98 => 33,  96 => 32,  83 => 38,  74 => 27,  66 => 22,  55 => 17,  52 => 15,  50 => 15,  43 => 11,  41 => 7,  35 => 5,  32 => 4,  29 => 3,  209 => 87,  203 => 70,  199 => 63,  193 => 80,  189 => 62,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 69,  162 => 68,  154 => 51,  149 => 60,  147 => 54,  144 => 58,  141 => 46,  133 => 54,  130 => 55,  125 => 46,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 44,  99 => 30,  95 => 29,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 24,  64 => 25,  60 => 17,  57 => 22,  54 => 14,  51 => 12,  48 => 11,  45 => 13,  42 => 6,  39 => 5,  36 => 5,  33 => 4,  30 => 3,);
    }
}
