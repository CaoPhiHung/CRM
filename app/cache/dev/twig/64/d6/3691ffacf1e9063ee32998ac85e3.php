<?php

/* AevitasPointBundle:Default:index.html.twig */
class __TwigTemplate_64d63691ffacf1e9063ee32998ac85e3 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        <li><a href=\"#\">Point Rule</a></li>
        <li class=\"divider\"></li>
\t<li>List Rules</li>
    </ul>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 20
            echo "                <div class=\"alert alert-faded\">
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
        echo "    <div class=\"control-group\">
        <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("backend_point_rules_addnew");
        echo "\"><span class=\"btn btn-large color-7\">Add new Point Rule</span></a>
    </div>
    <div class=\"separator\"></div>
    <div>
        <select id=\"store-kw\">
            ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 32
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "oldId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "name"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </select>
        &nbsp;&nbsp;<button class=\"btn btn-primary\" onclick=\"DoFilter()\">Search</button>
    </div>
    <table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\">
            <thead>
                <tr role=\"row\" style=\"color:#0F0\">

                    <th aria-label=\"Rendering eng.: activate to sort column descending\" aria-sort=\"ascending\" style=\"width: 40px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting_asc\">ID</th>

                    <th aria-label=\"Browser: activate to sort column ascending\" style=\"width: 250px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Name</th>

                    <th aria-label=\"Browser: activate to sort column ascending\" colspan=\"2\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Attributes</th>

                    <th aria-label=\"Platform(s): activate to sort column ascending\" style=\"width: 60px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting\">Point</th>
                    
                    <th aria-label=\"Rendering eng.: activate to sort column descending\" aria-sort=\"ascending\" style=\"width: 60px;\" colspan=\"1\" rowspan=\"1\" aria-controls=\"DataTables_Table_0\" tabindex=\"0\" role=\"columnheader\" class=\"sorting_asc\"></th>
                    
            </thead>

            <tbody aria-relevant=\"all\" aria-live=\"polite\" role=\"alert\">
                ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rules"]) ? $context["rules"] : $this->getContext($context, "rules")));
        foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
            // line 55
            echo "                    <tr class=\"gradeA odd\">
                        <td class=\"  sorting_1\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "id"), "html", null, true);
            echo "</td>
                        <td class=\" \">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "name"), "html", null, true);
            echo "</td>
                        <td class=\" \">
                            Level: <span style=\"color:#0f0\"><b>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "getLevelLabel"), "html", null, true);
            echo "</b></span><br/>
                            Store: <span style=\"color:#0f0\" class=\"list-stores\">";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "store"), "html", null, true);
            echo "</span><br/>
                            action: <span style=\"color:#0f0\"><b>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["actions"]) ? $context["actions"] : $this->getContext($context, "actions")), $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "action")), "html", null, true);
            echo "</b></span><br/>
                            locate: <span style=\"color:#0f0\"><b>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "locate"), "html", null, true);
            echo "</b></span><br/>
                            ";
            // line 63
            if (((null === $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay")) || (null === $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDay")))) {
                // line 64
                echo "                                interval-time: <span style=\"color:#0f0\"><b>--</b></span><br/>
                            ";
            } else {
                // line 66
                echo "                                interval-time: <span style=\"color:#0f0\"><b>";
                echo twig_escape_filter($this->env, $this->env->getExtension('aevitas_twig')->myDateConvert($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay")), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->env->getExtension('aevitas_twig')->myDateConvert($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDay")), "html", null, true);
                echo "</b></span><br/>
                            ";
            }
            // line 68
            echo "                            gender: <span style=\"color:#0f0\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "gender"), "html", null, true);
            echo "</b></span><br/>
                            ";
            // line 69
            echo sprintf(strtr(("%s : <b>" . strtr($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "schema"), array("_" => "<span style=\"color:#0f0\">---</span>"))), array("&" => "</b><br/>%s : <b>")), "<span style=\"display:none\">", "gender", "</span></td><td class=\" \"><span style=\"display:none\">interval-time", "</span>day in month", "day in week", "hour", "parity", "anniversary", "birthday", "bonus</b>", "<span style=\"display:none\">", "");
            echo "</span></td>
                        <td class=\" \">";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "point"), "html", null, true);
            echo "</td>
                        <td>
                            <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_point_rules_edit", array("ruleID" => $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "id"))), "html", null, true);
            echo "\" class=\"glyphicons no-js edit\"><i></i>Edit</a>
                            <br/><a href=\"javascript:if(confirm('Are you sure want to delete this Rule?')){window.location='";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_point_rules_delete", array("ruleID" => $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "id"))), "html", null, true);
            echo "'}\" class=\"glyphicons no-js delete\"><i></i>delete</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "            </tbody>
    </table>

";
    }

    // line 82
    public function block_javascript($context, array $blocks = array())
    {
        // line 83
        echo "    <!-- select2 js -->
    <script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/select2.js"), "html", null, true);
        echo "\"></script>
    <script>
        var storeName = [];
        ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 88
            echo "            storeName['";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "oldId"), "html", null, true);
            echo "'] = '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "name"), "html", null, true);
            echo "';
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "        \$('.list-stores').each(function(){
            var listStores = \$(this).html();
            arrStores = listStores.split('_');
            var results = '';
            for (i in arrStores){
                if (typeof(storeName[arrStores[i]]) != 'undefined'){
                    results += storeName[arrStores[i]]+', ';
                }
            }

            \$(this).html(results);
        });

        \$('#store-kw').select2({
            width: '300px'
        });

        function DoFilter(){
            var kw = \$('#store-kw').val();
            window.location = '";
        // line 109
        echo $this->env->getExtension('routing')->getPath("backend_point_rules_list");
        echo "/'+kw;
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasPointBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 141,  281 => 139,  277 => 138,  254 => 120,  197 => 90,  118 => 56,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 338,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 140,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 120,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 77,  186 => 72,  152 => 70,  110 => 50,  76 => 34,  260 => 128,  248 => 68,  245 => 67,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 84,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 58,  223 => 88,  219 => 87,  215 => 55,  211 => 98,  207 => 82,  195 => 50,  191 => 49,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 34,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 256,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 145,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 90,  216 => 78,  192 => 160,  188 => 159,  170 => 62,  63 => 18,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 60,  148 => 131,  137 => 57,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 26,  59 => 19,  255 => 109,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 100,  210 => 83,  206 => 96,  202 => 164,  190 => 73,  184 => 88,  172 => 68,  150 => 61,  77 => 25,  97 => 21,  65 => 20,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 60,  229 => 106,  224 => 172,  220 => 101,  214 => 99,  208 => 68,  169 => 76,  143 => 51,  140 => 129,  132 => 46,  128 => 66,  119 => 28,  107 => 113,  71 => 22,  177 => 69,  165 => 74,  160 => 64,  135 => 62,  126 => 54,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 42,  89 => 31,  85 => 36,  75 => 14,  68 => 22,  56 => 18,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 73,  158 => 63,  156 => 71,  151 => 39,  142 => 59,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 48,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 32,  88 => 18,  78 => 25,  46 => 9,  44 => 9,  27 => 96,  79 => 34,  72 => 21,  69 => 22,  47 => 13,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 33,  131 => 60,  123 => 29,  120 => 42,  115 => 48,  111 => 47,  108 => 46,  101 => 41,  98 => 40,  96 => 43,  83 => 28,  74 => 24,  66 => 19,  55 => 15,  52 => 16,  50 => 14,  43 => 8,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 97,  203 => 93,  199 => 91,  193 => 88,  189 => 86,  187 => 85,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 66,  162 => 62,  154 => 62,  149 => 92,  147 => 53,  144 => 130,  141 => 50,  133 => 56,  130 => 55,  125 => 58,  122 => 57,  116 => 67,  112 => 66,  109 => 65,  106 => 48,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 26,  73 => 31,  64 => 20,  60 => 19,  57 => 18,  54 => 18,  51 => 15,  48 => 7,  45 => 9,  42 => 8,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
