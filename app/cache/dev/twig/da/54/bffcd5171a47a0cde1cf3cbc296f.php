<?php

/* AevitasPointBundle:Program:index.html.twig */
class __TwigTemplate_da54bffcd5171a47a0cde1cf3cbc296f extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
        <li><a href=\"#\">Programs</a></li>
        <li class=\"divider\"></li>
\t<li>List Programs</li>
    </ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "                <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                            ";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                </div>
            <div class=\"separator line bottom\"></div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    <div class=\"control-group\">
        <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("backend_program_addnew");
        echo "\"><span class=\"btn btn-large color-7\">Add new Program</span></a>
    </div>
    <div class=\"separator\"></div>
    <table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\">
            <thead>
                <tr role=\"row\" style=\"color:#0F0\">

                    <th aria-label=\"Rendering eng.: activate to sort column descending\" aria-sort=\"ascending\" style=\"width: 40px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting_asc\">ID</th>

                    <th aria-label=\"Browser: activate to sort column ascending\" style=\"width: 200px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Name</th>

                    <th aria-label=\"Browser: activate to sort column ascending\" style=\"width: 100px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Start Date</th>

                    <th aria-label=\"Platform(s): activate to sort column ascending\" style=\"width: 100px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">End Date</th>
                    
            </thead>

            <tbody aria-relevant=\"all\" aria-live=\"polite\" role=\"alert\">
                ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["programs"]) ? $context["programs"] : $this->getContext($context, "programs")));
        foreach ($context['_seq'] as $context["_key"] => $context["program"]) {
            // line 41
            echo "                    <tr class=\"gradeA odd\">
                        <td class=\"  sorting_1\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id"), "html", null, true);
            echo "</td>
                        <td class=\" \">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "name"), "html", null, true);
            echo "</td>
                        <td class=\" \">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "startDate"), "html", null, true);
            echo "</td>
                        <td class=\" \">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "endDate"), "html", null, true);
            echo "</td>
                        <td>
                            <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_program_clone", array("id" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id"))), "html", null, true);
            echo "\" class=\"glyphicons no-js create\"><i></i>Clone</a>
                            <br/><a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_program_edit", array("id" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id"))), "html", null, true);
            echo "\" class=\"glyphicons no-js edit\"><i></i>Edit</a>
                            <br/><a href=\"javascript:if(confirm('Are you sure want to delete this Rule?')){window.location='";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_program_delete", array("id" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id"))), "html", null, true);
            echo "'}\" class=\"glyphicons no-js delete\"><i></i>delete</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['program'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "            </tbody>
    </table>

";
    }

    // line 58
    public function block_javascript($context, array $blocks = array())
    {
        // line 59
        echo "    
";
    }

    public function getTemplateName()
    {
        return "AevitasPointBundle:Program:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 229,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 90,  118 => 48,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 238,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 77,  186 => 72,  152 => 67,  110 => 50,  76 => 25,  260 => 128,  248 => 68,  245 => 126,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 58,  223 => 88,  219 => 87,  215 => 55,  211 => 98,  207 => 96,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 42,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 192,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 90,  216 => 78,  192 => 90,  188 => 89,  170 => 62,  63 => 19,  53 => 16,  58 => 19,  23 => 3,  34 => 8,  146 => 59,  148 => 131,  137 => 57,  127 => 30,  113 => 116,  102 => 111,  90 => 40,  81 => 25,  59 => 19,  255 => 131,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 100,  210 => 83,  206 => 96,  202 => 164,  190 => 73,  184 => 90,  172 => 81,  150 => 61,  77 => 23,  97 => 42,  65 => 20,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 241,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 119,  229 => 106,  224 => 172,  220 => 101,  214 => 99,  208 => 68,  169 => 76,  143 => 51,  140 => 129,  132 => 53,  128 => 66,  119 => 45,  107 => 113,  71 => 22,  177 => 69,  165 => 74,  160 => 64,  135 => 62,  126 => 45,  114 => 47,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 41,  89 => 31,  85 => 28,  75 => 14,  68 => 22,  56 => 17,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 73,  163 => 73,  158 => 63,  156 => 66,  151 => 39,  142 => 59,  138 => 43,  136 => 52,  121 => 122,  117 => 51,  105 => 44,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 18,  78 => 25,  46 => 9,  44 => 13,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 14,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 58,  131 => 60,  123 => 44,  120 => 42,  115 => 48,  111 => 47,  108 => 41,  101 => 43,  98 => 40,  96 => 43,  83 => 28,  74 => 24,  66 => 21,  55 => 15,  52 => 15,  50 => 15,  43 => 8,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 97,  203 => 92,  199 => 94,  193 => 88,  189 => 86,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 90,  164 => 66,  162 => 74,  154 => 62,  149 => 92,  147 => 53,  144 => 130,  141 => 50,  133 => 56,  130 => 55,  125 => 58,  122 => 49,  116 => 67,  112 => 42,  109 => 45,  106 => 48,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 26,  73 => 22,  64 => 20,  60 => 18,  57 => 18,  54 => 18,  51 => 12,  48 => 7,  45 => 12,  42 => 11,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
