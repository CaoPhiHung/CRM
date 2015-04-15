<?php

/* AevitasLevisBundle:Backend:checkPosBill.html.twig */
class __TwigTemplate_67863ff3b86165717743ec493b98c44d extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User"), "html", null, true);
        echo "</li>
    <li class=\"divider\"></li>
    <li>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Results"), "html", null, true);
        echo "</li>
</ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>
<form action=\"\" method=\"POST\">
    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        <input type=\"submit\" value=\"Search\" type=\"btn\" />
</form>
<table class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" id=\"table-list-store\" aria-describedby=\"DataTables_Table_0_info\">
    <thead>
        <tr role=\"row\">
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 140px;\" aria-sort=\"ascending\" aria-label=\"Rendering eng.: activate to sort column descending\">";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Name"), "html", null, true);
        echo "</th>         
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 91px;\" aria-label=\"Eng. vers.: activate to sort column ascending\">";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Date"), "html", null, true);
        echo "</th>
            <th>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Amount"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 101px;\" aria-label=\"CSS grade: activate to sort column ascending\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
        echo "</th>
            <th>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Customer Code"), "html", null, true);
        echo "</th>
            <th>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : $this->getContext($context, "results")));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 32
            echo "            <tr class=\"gradeA\">
                <td class=\"center item-name\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "PartyName", array(), "array"), "html", null, true);
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "BillDate", array(), "array"), "html", null, true);
            echo "</td>
                <td class=\"center item-price\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "GrossAmount", array(), "array"), "html", null, true);
            echo "</td> 
                <td class=\"center item-price\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "StoreName", array(), "array"), "html", null, true);
            echo "</td> 
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "PartyID", array(), "array"), "html", null, true);
            echo "</td>
                <td><a class=\"btn btn-action\" target=\"_blank\" href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("check_bill", array("ledgerid" => $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "Ledgerid", array(), "array"), "billno" => $this->getAttribute((isset($context["result"]) ? $context["result"] : $this->getContext($context, "result")), "BillIdNo", array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Accumulate Point"), "html", null, true);
            echo "</a><br/></td>
                </tr>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </tbody></table>
";
    }

    // line 43
    public function block_javascript($context, array $blocks = array())
    {
        // line 44
        echo "
<script type=\"text/javascript\">
\$(document).ready(function(){
    \$('#form_start').datepicker({dateFormat: 'yy-mm-dd'});
    \$('#form_end').datepicker({dateFormat: 'yy-mm-dd'});
    \$('#form_end').datepicker(\"option\", \"maxDate\", new Date());
});
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:checkPosBill.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  687 => 337,  662 => 315,  654 => 310,  646 => 305,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 265,  574 => 264,  567 => 262,  561 => 259,  558 => 258,  536 => 254,  528 => 253,  520 => 252,  514 => 249,  510 => 248,  502 => 246,  498 => 245,  481 => 242,  464 => 241,  445 => 234,  441 => 233,  383 => 197,  347 => 176,  311 => 155,  302 => 151,  242 => 117,  233 => 113,  406 => 122,  382 => 118,  370 => 116,  274 => 93,  238 => 83,  20 => 1,  571 => 219,  568 => 218,  564 => 211,  408 => 111,  405 => 110,  375 => 186,  359 => 171,  351 => 112,  320 => 159,  316 => 135,  286 => 95,  266 => 108,  262 => 129,  256 => 104,  204 => 52,  161 => 43,  185 => 66,  134 => 51,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 119,  339 => 123,  153 => 69,  506 => 247,  455 => 278,  449 => 235,  434 => 264,  385 => 218,  376 => 117,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 273,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 231,  411 => 226,  380 => 206,  367 => 202,  344 => 108,  338 => 172,  335 => 187,  331 => 186,  297 => 175,  181 => 65,  332 => 106,  323 => 154,  319 => 153,  315 => 103,  308 => 133,  292 => 144,  288 => 121,  281 => 139,  277 => 138,  254 => 124,  197 => 90,  118 => 32,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 243,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 187,  396 => 238,  394 => 120,  391 => 135,  377 => 212,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 209,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 129,  280 => 137,  276 => 113,  249 => 111,  232 => 82,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 30,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 87,  228 => 106,  221 => 62,  213 => 78,  180 => 50,  401 => 271,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 130,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 133,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 85,  219 => 81,  215 => 60,  211 => 77,  207 => 75,  195 => 50,  191 => 92,  179 => 77,  175 => 64,  167 => 68,  159 => 72,  155 => 60,  129 => 46,  124 => 50,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 186,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 121,  397 => 203,  392 => 209,  389 => 200,  371 => 190,  369 => 256,  358 => 114,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 102,  301 => 176,  296 => 127,  273 => 112,  270 => 109,  263 => 188,  259 => 192,  253 => 88,  234 => 90,  216 => 79,  192 => 88,  188 => 53,  170 => 125,  63 => 20,  53 => 13,  58 => 16,  23 => 3,  34 => 3,  146 => 64,  148 => 54,  137 => 48,  127 => 42,  113 => 35,  102 => 32,  90 => 31,  81 => 38,  59 => 19,  255 => 89,  244 => 84,  236 => 179,  230 => 176,  226 => 81,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 76,  150 => 56,  77 => 30,  97 => 31,  65 => 31,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 237,  453 => 236,  444 => 177,  440 => 247,  437 => 232,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 221,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 186,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 166,  305 => 164,  298 => 97,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 92,  264 => 84,  258 => 90,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 109,  220 => 80,  214 => 102,  208 => 72,  169 => 82,  143 => 38,  140 => 50,  132 => 37,  128 => 36,  119 => 49,  107 => 43,  71 => 22,  177 => 49,  165 => 42,  160 => 52,  135 => 37,  126 => 34,  114 => 31,  84 => 26,  70 => 29,  67 => 21,  61 => 30,  94 => 36,  89 => 34,  85 => 27,  75 => 23,  68 => 26,  56 => 14,  201 => 86,  196 => 62,  183 => 51,  171 => 62,  166 => 73,  163 => 73,  158 => 67,  156 => 56,  151 => 56,  142 => 53,  138 => 52,  136 => 41,  121 => 37,  117 => 36,  105 => 33,  91 => 27,  62 => 16,  49 => 11,  87 => 26,  21 => 1,  38 => 6,  28 => 3,  24 => 4,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 35,  78 => 26,  46 => 9,  44 => 13,  27 => 2,  79 => 24,  72 => 24,  69 => 25,  47 => 14,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 61,  131 => 47,  123 => 49,  120 => 43,  115 => 48,  111 => 48,  108 => 48,  101 => 42,  98 => 31,  96 => 31,  83 => 25,  74 => 27,  66 => 21,  55 => 18,  52 => 15,  50 => 13,  43 => 8,  41 => 7,  35 => 8,  32 => 4,  29 => 3,  209 => 87,  203 => 74,  199 => 63,  193 => 80,  189 => 83,  187 => 85,  182 => 78,  176 => 80,  173 => 74,  168 => 43,  164 => 58,  162 => 71,  154 => 68,  149 => 66,  147 => 54,  144 => 44,  141 => 43,  133 => 54,  130 => 57,  125 => 38,  122 => 54,  116 => 42,  112 => 41,  109 => 34,  106 => 33,  103 => 29,  99 => 38,  95 => 41,  92 => 29,  86 => 28,  82 => 28,  80 => 31,  73 => 24,  64 => 21,  60 => 19,  57 => 29,  54 => 15,  51 => 23,  48 => 11,  45 => 21,  42 => 11,  39 => 5,  36 => 5,  33 => 4,  30 => 3,);
    }
}
