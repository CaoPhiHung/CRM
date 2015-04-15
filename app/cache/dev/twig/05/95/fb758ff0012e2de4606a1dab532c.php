<?php

/* AevitasLevisBundle:Backend:GroupList.html.twig */
class __TwigTemplate_0595fb758ff0012e2de4606a1dab532c extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>Group List</li>
</ul>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 13
            echo "<div class=\"alert alert-faded\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
</div>
<div class=\"separator line bottom\"></div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "<div class=\"control-group\">
    <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("backend_group_addnew");
        echo "\"><span class=\"btn btn-large color-4\">Add new group</span></a>
</div>
<div class=\"separator\"></div>
<table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\">
    <thead>
        <tr role=\"row\" style=\"color:#0F0\">
            <th aria-label=\"Rendering eng.: activate to sort column descending\" aria-sort=\"ascending\" style=\"width: 60px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting_asc\">ID</th>
            <th aria-label=\"Browser: activate to sort column ascending\" style=\"width: 300px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Name</th>
            <th aria-label=\"Platform(s): activate to sort column ascending\" style=\"width: 100px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Admin</th>
            <th aria-label=\"Eng. vers.: activate to sort column ascending\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">ROLES</th>
            <th aria-label=\"Rendering eng.: activate to sort column descending\" aria-sort=\"ascending\" style=\"width: 60px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting_asc\"></th>
    </thead>

    <tbody aria-relevant=\"all\" aria-live=\"polite\" role=\"alert\">
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 35
            echo "            <tr class=\"gradeA odd\">
                <td class=\"  sorting_1\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "</td>
                <td class=\" \"><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/user/group/info/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"), "html", null, true);
            echo "</a></td>
                <td class=\" \">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "admin"), "html", null, true);
            echo "</td>
                <td class=\"center \">
                            ";
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "roles"));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 41
                echo "                                ";
                echo twig_escape_filter($this->env, (isset($context["role"]) ? $context["role"] : $this->getContext($context, "role")), "html", null, true);
                echo "; 
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                    </td>
                    <td>
                        <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/user/group/edit/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "\" class=\"glyphicons no-js edit\"><i></i>Edit</a>
                        <br/><a href=\"javascript:if(confirm('Are you sure want to delete this Group?')){window.location='";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/user/group/delete/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "'}\" class=\"glyphicons no-js delete\"><i></i>delete</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "            </tbody>
        </table>

";
    }

    // line 55
    public function block_javascript($context, array $blocks = array())
    {
        // line 56
        echo "
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:GroupList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  571 => 219,  568 => 218,  564 => 211,  408 => 111,  405 => 110,  375 => 186,  359 => 171,  351 => 164,  320 => 136,  316 => 135,  286 => 120,  266 => 108,  262 => 107,  256 => 104,  204 => 52,  161 => 43,  185 => 67,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 120,  429 => 149,  422 => 145,  417 => 144,  395 => 8,  388 => 134,  339 => 123,  153 => 42,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 218,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 65,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 133,  292 => 142,  288 => 121,  281 => 139,  277 => 138,  254 => 120,  197 => 51,  118 => 45,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 187,  396 => 238,  394 => 267,  391 => 135,  377 => 212,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 209,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 132,  289 => 129,  280 => 191,  276 => 113,  249 => 111,  232 => 102,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 87,  228 => 106,  221 => 62,  213 => 78,  180 => 156,  401 => 271,  364 => 105,  361 => 174,  353 => 167,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 130,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 110,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 85,  219 => 81,  215 => 60,  211 => 98,  207 => 75,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 63,  159 => 72,  155 => 40,  129 => 46,  124 => 45,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 186,  420 => 171,  415 => 165,  412 => 164,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 112,  270 => 109,  263 => 188,  259 => 192,  253 => 121,  234 => 90,  216 => 78,  192 => 83,  188 => 56,  170 => 125,  63 => 21,  53 => 16,  58 => 16,  23 => 3,  34 => 3,  146 => 58,  148 => 57,  137 => 48,  127 => 42,  113 => 40,  102 => 38,  90 => 31,  81 => 26,  59 => 23,  255 => 191,  244 => 7,  236 => 179,  230 => 176,  226 => 64,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 72,  150 => 56,  77 => 25,  97 => 30,  65 => 25,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 221,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 101,  214 => 90,  208 => 72,  169 => 76,  143 => 51,  140 => 50,  132 => 37,  128 => 36,  119 => 42,  107 => 40,  71 => 25,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 53,  114 => 51,  84 => 34,  70 => 29,  67 => 20,  61 => 20,  94 => 36,  89 => 34,  85 => 27,  75 => 26,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 47,  171 => 44,  166 => 73,  163 => 73,  158 => 67,  156 => 66,  151 => 56,  142 => 64,  138 => 43,  136 => 38,  121 => 50,  117 => 51,  105 => 39,  91 => 36,  62 => 19,  49 => 11,  87 => 28,  21 => 1,  38 => 6,  28 => 3,  24 => 4,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 35,  78 => 26,  46 => 9,  44 => 13,  27 => 2,  79 => 25,  72 => 27,  69 => 22,  47 => 19,  40 => 9,  37 => 11,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 63,  131 => 47,  123 => 46,  120 => 43,  115 => 48,  111 => 41,  108 => 48,  101 => 31,  98 => 33,  96 => 31,  83 => 26,  74 => 27,  66 => 21,  55 => 17,  52 => 12,  50 => 13,  43 => 8,  41 => 7,  35 => 8,  32 => 4,  29 => 3,  209 => 87,  203 => 73,  199 => 63,  193 => 80,  189 => 71,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 69,  162 => 59,  154 => 51,  149 => 69,  147 => 55,  144 => 53,  141 => 46,  133 => 54,  130 => 55,  125 => 46,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 44,  99 => 38,  95 => 37,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 24,  64 => 19,  60 => 17,  57 => 15,  54 => 15,  51 => 23,  48 => 11,  45 => 12,  42 => 11,  39 => 5,  36 => 5,  33 => 4,  30 => 3,);
    }
}
