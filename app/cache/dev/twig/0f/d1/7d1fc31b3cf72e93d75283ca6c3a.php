<?php

/* VietlandStoreBundle:Store:shoppingAction.html.twig */
class __TwigTemplate_0fd17d1fc31b3cf72e93d75283ca6c3a extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
        echo "</a></li>
    <li class=\"divider\"></li>
    <li>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("CRM Data"), "html", null, true);
        echo "</li>
    <li class=\"divider\"></li>
    <li>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shopping Action"), "html", null, true);
        echo "</li>
</ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["notices"]) ? $context["notices"] : $this->getContext($context, "notices")));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "<div class=\"alert alert-faded\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "<div class=\"widget finances_summary\">
    <div class=\"widget-head\">
        <h4 class=\"heading\">";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Bill is created at"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "bDate"), "F jS \\a\\t g:ia"), "html", null, true);
        echo "</h4>
    </div>
    <div class=\"widget-body\">
        <div class=\"row-fluid\">
            <div class=\"span4\">
                <div class=\"well\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Number product"), "html", null, true);
        echo "<strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "itemNumber"), "html", null, true);
        echo "</strong>
                </div>
                <div class=\"separator bottom center\">
                    <span class=\"glyphicons flash standard\"><i></i></span>
                </div>
                <div class=\"well\">";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Total Payment"), "html", null, true);
        echo "<strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "Amount"), "html", null, true);
        echo "</strong>
                </div>
            </div>
            ";
        // line 35
        if (array_key_exists("usercrm", $context)) {
            // line 36
            echo "                ";
            echo twig_escape_filter($this->env, twig_include($this->env, $context, "VietlandStoreBundle:Store:userLastActivities.html.twig", array("user" => (isset($context["usercrm"]) ? $context["usercrm"] : $this->getContext($context, "usercrm")))), "html", null, true);
            echo "
            ";
        }
        // line 38
        echo "        </div>
        <a class=\"glyphicons list single\" href=\"\"><i></i> View details</a>
    </div>
</div>
<div class=\"widget\">
    <div class=\"widget-head\">
        <h4 class=\"heading\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Bill Detail"), "html", null, true);
        echo "</h4>
    </div>
    <div class=\"widget-body\">
        <table class=\"table table-condensed table-striped table-vertical-center table-thead-simple\">
            <thead>
                <tr>
                    <th class=\"center\" style=\"width: 1%\">No.</th>
                    <th>";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Item Code"), "html", null, true);
        echo "</th>
                    <th class=\"center\">";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Item Description"), "html", null, true);
        echo "</th>
                    <th class=\"center\">";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Amount"), "html", null, true);
        echo "</th>
                    <th class=\"right\">";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Quantity"), "html", null, true);
        echo "</th>
                </tr>
            </thead>
            <tbody>
                        ";
        // line 58
        $context["index"] = 1;
        // line 59
        echo "                        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : $this->getContext($context, "items")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 60
            echo "                    <tr class=\"selectable\">
                        <td class=\"center\">";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")), "html", null, true);
            echo "</td>
                        <td class=\"important\">";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "iCode"), "html", null, true);
            echo "</td>
                        <td class=\"center\"><span class=\"label label-important\">";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "iDesc"), "html", null, true);
            echo "</span></td>
                        <td class=\"center\">";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "iValue"), "html", null, true);
            echo "đ</td>
                        <td class=\"right\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "Qty"), "html", null, true);
            echo "</td>
                    </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                </tbody>
            </table>
            <div class=\"separator top\"><a href=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("store_save_shopping", array("billno" => (isset($context["billno"]) ? $context["billno"] : $this->getContext($context, "billno")), "ledgerid" => (isset($context["ledgerid"]) ? $context["ledgerid"] : $this->getContext($context, "ledgerid")))), "html", null, true);
        echo "\" class=\"glyphicons list single\"><i></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Accumulate points for THIS BILL"), "html", null, true);
        echo "</a></div>
        </div>
    </div>
";
    }

    // line 74
    public function block_javascript($context, array $blocks = array())
    {
        // line 75
        echo "    <script type=\"text/javascript\">
    \$(document).ready(function(){
        \$('button.action').live('click', function(){
            window.open(\$('select.actions').val(), '_blank');
        });
    });
        </script>
";
    }

    public function getTemplateName()
    {
        return "VietlandStoreBundle:Store:shoppingAction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 96,  576 => 197,  425 => 145,  269 => 87,  656 => 305,  649 => 301,  629 => 287,  518 => 185,  503 => 176,  472 => 163,  324 => 131,  272 => 102,  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 271,  594 => 104,  589 => 102,  553 => 191,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 159,  426 => 58,  414 => 52,  403 => 48,  390 => 142,  217 => 66,  212 => 59,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 135,  327 => 143,  306 => 137,  290 => 103,  265 => 100,  250 => 85,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 296,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 168,  460 => 194,  410 => 176,  366 => 33,  261 => 88,  194 => 53,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 198,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 158,  424 => 184,  416 => 148,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 180,  514 => 249,  510 => 248,  502 => 179,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 136,  347 => 144,  311 => 148,  302 => 105,  242 => 78,  233 => 76,  406 => 122,  382 => 118,  370 => 160,  274 => 81,  238 => 309,  20 => 1,  571 => 219,  568 => 196,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 143,  351 => 112,  320 => 130,  316 => 16,  286 => 284,  266 => 79,  262 => 139,  256 => 104,  204 => 56,  161 => 61,  185 => 76,  134 => 32,  378 => 132,  340 => 104,  336 => 123,  330 => 189,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 59,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 105,  225 => 68,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 183,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 166,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 115,  335 => 21,  331 => 104,  297 => 134,  181 => 50,  332 => 102,  323 => 250,  319 => 116,  315 => 112,  308 => 147,  292 => 144,  288 => 99,  281 => 385,  277 => 101,  254 => 97,  197 => 58,  118 => 34,  100 => 34,  504 => 207,  500 => 175,  496 => 128,  492 => 76,  488 => 243,  484 => 178,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 160,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 107,  343 => 133,  310 => 178,  293 => 6,  284 => 104,  257 => 98,  205 => 69,  178 => 67,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 151,  442 => 62,  436 => 188,  432 => 149,  419 => 147,  386 => 208,  307 => 114,  304 => 103,  289 => 97,  280 => 96,  276 => 91,  249 => 79,  232 => 75,  198 => 84,  174 => 50,  200 => 74,  186 => 68,  152 => 52,  110 => 32,  76 => 21,  260 => 100,  248 => 72,  245 => 78,  240 => 71,  237 => 77,  228 => 73,  221 => 66,  213 => 71,  180 => 47,  401 => 173,  364 => 115,  361 => 174,  353 => 151,  349 => 138,  346 => 125,  333 => 102,  329 => 101,  325 => 100,  321 => 97,  303 => 296,  299 => 8,  295 => 88,  291 => 86,  287 => 130,  279 => 125,  275 => 70,  271 => 88,  267 => 91,  251 => 79,  243 => 78,  239 => 76,  231 => 69,  227 => 68,  223 => 100,  219 => 72,  215 => 60,  211 => 61,  207 => 58,  195 => 65,  191 => 54,  179 => 51,  175 => 49,  167 => 68,  159 => 35,  155 => 60,  129 => 46,  124 => 36,  104 => 29,  563 => 210,  560 => 195,  556 => 220,  428 => 146,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 129,  369 => 256,  358 => 114,  356 => 157,  350 => 203,  348 => 161,  317 => 82,  313 => 115,  301 => 89,  296 => 127,  273 => 125,  270 => 80,  263 => 78,  259 => 77,  253 => 86,  234 => 78,  216 => 60,  192 => 67,  188 => 52,  170 => 49,  63 => 19,  53 => 13,  58 => 13,  23 => 3,  34 => 6,  146 => 55,  148 => 51,  137 => 53,  127 => 28,  113 => 25,  102 => 30,  90 => 16,  81 => 24,  59 => 17,  255 => 86,  244 => 71,  236 => 77,  230 => 68,  226 => 74,  222 => 72,  218 => 71,  210 => 58,  206 => 57,  202 => 53,  190 => 70,  184 => 230,  172 => 66,  150 => 42,  77 => 21,  97 => 29,  65 => 17,  480 => 162,  474 => 161,  469 => 162,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 167,  435 => 146,  430 => 187,  427 => 153,  423 => 57,  413 => 147,  409 => 146,  407 => 176,  402 => 130,  398 => 173,  393 => 143,  387 => 143,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 128,  362 => 144,  360 => 249,  355 => 27,  341 => 105,  337 => 105,  322 => 141,  314 => 99,  312 => 143,  309 => 109,  305 => 121,  298 => 104,  294 => 90,  285 => 128,  283 => 97,  278 => 82,  268 => 87,  264 => 84,  258 => 87,  252 => 73,  247 => 84,  241 => 76,  235 => 70,  229 => 75,  224 => 62,  220 => 287,  214 => 58,  208 => 70,  169 => 63,  143 => 57,  140 => 53,  132 => 51,  128 => 37,  119 => 22,  107 => 49,  71 => 25,  177 => 65,  165 => 62,  160 => 63,  135 => 39,  126 => 42,  114 => 38,  84 => 23,  70 => 20,  67 => 29,  61 => 15,  94 => 30,  89 => 34,  85 => 25,  75 => 26,  68 => 19,  56 => 14,  201 => 68,  196 => 68,  183 => 66,  171 => 59,  166 => 48,  163 => 64,  158 => 60,  156 => 57,  151 => 58,  142 => 54,  138 => 39,  136 => 52,  121 => 44,  117 => 42,  105 => 32,  91 => 27,  62 => 27,  49 => 9,  87 => 25,  21 => 2,  38 => 8,  28 => 5,  24 => 4,  25 => 3,  31 => 3,  26 => 4,  19 => 1,  93 => 28,  88 => 27,  78 => 22,  46 => 9,  44 => 6,  27 => 4,  79 => 27,  72 => 20,  69 => 13,  47 => 7,  40 => 14,  37 => 7,  22 => 2,  246 => 106,  157 => 44,  145 => 42,  139 => 41,  131 => 31,  123 => 41,  120 => 35,  115 => 21,  111 => 33,  108 => 36,  101 => 44,  98 => 32,  96 => 38,  83 => 24,  74 => 20,  66 => 20,  55 => 15,  52 => 18,  50 => 8,  43 => 10,  41 => 7,  35 => 3,  32 => 2,  29 => 3,  209 => 70,  203 => 75,  199 => 69,  193 => 55,  189 => 72,  187 => 51,  182 => 51,  176 => 62,  173 => 64,  168 => 49,  164 => 200,  162 => 43,  154 => 41,  149 => 43,  147 => 36,  144 => 54,  141 => 40,  133 => 37,  130 => 31,  125 => 45,  122 => 44,  116 => 42,  112 => 41,  109 => 40,  106 => 35,  103 => 19,  99 => 28,  95 => 28,  92 => 39,  86 => 35,  82 => 23,  80 => 22,  73 => 19,  64 => 18,  60 => 19,  57 => 13,  54 => 16,  51 => 12,  48 => 11,  45 => 6,  42 => 8,  39 => 7,  36 => 5,  33 => 4,  30 => 3,);
    }
}
