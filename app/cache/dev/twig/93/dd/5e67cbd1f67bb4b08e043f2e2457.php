<?php

/* AevitasChannelBundle:Default:listTemplateRule.html.twig */
class __TwigTemplate_93dd5e67cbd1f67bb4b08e043f2e2457 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
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
        <li><a href=\"#\">Template Rule</a></li>
        <li class=\"divider\"></li>
\t<li style=\"text-transform:uppercase;\"> List </li>
    </ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>
            ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "                <div class=\"alert alert-faded\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                    ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    <div class=\"control-group\">
        <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("backend_create_template_rule");
        echo "\"><span class=\"btn btn-large color-7\">Add new Rule</span></a>
    </div>
    <div class=\"separator\"></div>
    <table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\">
            <thead>
                <tr role=\"row\" style=\"color:#0F0\">
                    <th>Id</th>

                    <th>Name</th>
                    
                    <th width=\"260\"></th>
                    
            </thead>

            <tbody aria-relevant=\"all\" aria-live=\"polite\" role=\"alert\">
                ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lists"]) ? $context["lists"] : $this->getContext($context, "lists")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "                    <tr class=\"gradeA odd\">
                        <td class=\" \">";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"), "html", null, true);
            echo "</td>
                        <td class=\" \">
                            ";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "templateRuleName"), "html", null, true);
            echo "
                        </td>
                        
                        <td>
                            ";
            // line 46
            echo "                            &nbsp;&nbsp;&nbsp;<a href=\"
                            ";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template_rule", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"))), "html", null, true);
            echo "\" class=\"glyphicons no-js edit\"><i></i>View/Edit</a>
                            &nbsp;&nbsp;&nbsp;<a href=\"javascript:if(confirm('Are you sure want to delete this Template?')){window.location='";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_delete_template_rule", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"))), "html", null, true);
            echo "'}\" class=\"glyphicons no-js delete\"><i></i>delete</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "            </tbody>
    </table>

    <div class=\"modal fade\" id=\"myModal\" style=\"color:#000\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
              <h4 class=\"modal-title\" style=\"color:#000\">Send email</h4>
            </div>
            <div class=\"modal-body\">
            </div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
              <button type=\"button\" class=\"btn btn-primary\" id=\"bt-process\">Send</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:listTemplateRule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 338,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 193,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 120,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 132,  110 => 40,  76 => 24,  260 => 128,  248 => 68,  245 => 67,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 86,  175 => 45,  167 => 61,  159 => 56,  155 => 40,  129 => 124,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 256,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 138,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 84,  216 => 78,  192 => 160,  188 => 159,  170 => 62,  63 => 27,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 131,  137 => 48,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 32,  59 => 18,  255 => 122,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 169,  210 => 167,  206 => 96,  202 => 164,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 31,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 172,  220 => 101,  214 => 168,  208 => 68,  169 => 60,  143 => 51,  140 => 129,  132 => 46,  128 => 66,  119 => 28,  107 => 113,  71 => 22,  177 => 64,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 37,  89 => 37,  85 => 34,  75 => 14,  68 => 21,  56 => 17,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 112,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 38,  88 => 18,  78 => 32,  46 => 14,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 10,  40 => 8,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 42,  115 => 48,  111 => 47,  108 => 46,  101 => 41,  98 => 40,  96 => 39,  83 => 28,  74 => 28,  66 => 19,  55 => 16,  52 => 16,  50 => 7,  43 => 13,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 82,  203 => 81,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 53,  147 => 53,  144 => 130,  141 => 50,  133 => 125,  130 => 44,  125 => 52,  122 => 64,  116 => 61,  112 => 59,  109 => 45,  106 => 22,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 28,  73 => 31,  64 => 24,  60 => 19,  57 => 18,  54 => 18,  51 => 15,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 5,  33 => 3,  30 => 3,);
    }
}
