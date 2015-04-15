<?php

/* AevitasLevisBundle:GiftArticle:ListGiftArticle.html.twig */
class __TwigTemplate_beaff3c0290752733708ca365086a54d extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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

    // line 4
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 5
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>Gift Article</li>
    <li class=\"divider\"></li>
    <li>List</li>
</ul>
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>

<div class=\"control-group\">
    <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("backend_gift_create");
        echo "\"><span class=\"btn btn-large color-7\">Create new gift</span></a>
</div>
<div class=\"separator\"></div>

<table class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" id=\"table-list-gift\" aria-describedby=\"DataTables_Table_0_info\">
    <thead>
        <tr role=\"row\">
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 15%;\" aria-sort=\"ascending\" aria-label=\"Rendering eng.: activate to sort column descending\">Name.</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 30%;\" aria-label=\"Browser: activate to sort column ascending\">Category</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 10%;\" aria-label=\"Platform(s): activate to sort column ascending\">Status</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 25%;\" aria-label=\"Eng. vers.: activate to sort column ascending\">Description</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 10%;\" aria-label=\"CSS grade: activate to sort column ascending\">Point</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" style=\"width: 10%;\" aria-label=\"CSS grade: activate to sort column ascending\">Operations</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
               ";
        // line 34
        if (twig_test_empty((isset($context["giftArticle"]) ? $context["giftArticle"] : $this->getContext($context, "giftArticle")))) {
            // line 35
            echo "            <tr><td>

                ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 38
                echo "                    <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
                // line 40
                echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
                echo "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "</td></tr>
                ";
        } else {
            // line 44
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["giftArticle"]) ? $context["giftArticle"] : $this->getContext($context, "giftArticle")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 45
                echo "            <tr class=\"";
                echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
                echo " gradeA remove_item_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"), "html", null, true);
                echo "\">
                <td class=\"center item-name\">";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "name"), "html", null, true);
                echo "</td>
                <td class=\"item-image\" style=\"width:20%;\">Top Category: ";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getCat"), "html", null, true);
                echo "<br/>Sub Category: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getCategory"), "getName"), "html", null, true);
                echo "</td>
                <td class=\"center item-status\">
                          ";
                // line 49
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "isActive") == 0)) {
                    echo " 
                        <div class=\"unactive_kard\" title=\"inactive\">unactive</div> 
                          ";
                } else {
                    // line 51
                    echo " 
                        <div class=\"active_kard\" title=\"active\">active</div> 
                          ";
                }
                // line 54
                echo "                    </td>

                    <td class=\"center item-category\" categoryId=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "description"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "description"), "html", null, true);
                echo "</td>
                    <td class=\"center item-price\">";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "point"), "html", null, true);
                echo "</td> 
                    <td class=\"center item-price\" colspan=\"2\"><a href=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_gift_Edit", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit"), "html", null, true);
                echo "</a> | <a rel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"), "html", null, true);
                echo " \"class=\"delete-item-gift\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_gift_delete", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Delete"), "html", null, true);
                echo "</a></td> 
                </tr>
           ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "            ";
        }
        // line 62
        echo "            </tbody></table>
     <div id=\"open-form-delete\" style=\"display: none;\" title=\"Note\">
                Are you sure want to delete this item ?
            </div>
";
    }

    // line 68
    public function block_javascript($context, array $blocks = array())
    {
        // line 69
        echo " <script>
        var backend_gift_delete = '";
        // line 70
        echo $this->env->getExtension('routing')->getPath("backend_gift_delete");
        echo "';
    </script>
    <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/giftArticle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:GiftArticle:ListGiftArticle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 58,  185 => 55,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 120,  429 => 149,  422 => 145,  417 => 144,  395 => 138,  388 => 134,  339 => 123,  153 => 61,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 136,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 68,  118 => 45,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 238,  394 => 267,  391 => 135,  377 => 261,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 102,  198 => 93,  174 => 73,  200 => 69,  186 => 61,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 8,  228 => 106,  221 => 131,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 93,  223 => 92,  219 => 87,  215 => 55,  211 => 98,  207 => 66,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 47,  124 => 25,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 143,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 121,  234 => 90,  216 => 78,  192 => 83,  188 => 56,  170 => 62,  63 => 21,  53 => 16,  58 => 17,  23 => 3,  34 => 8,  146 => 58,  148 => 131,  137 => 55,  127 => 42,  113 => 116,  102 => 41,  90 => 28,  81 => 25,  59 => 23,  255 => 131,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 95,  218 => 90,  210 => 89,  206 => 96,  202 => 64,  190 => 73,  184 => 78,  172 => 72,  150 => 61,  77 => 23,  97 => 30,  65 => 20,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 101,  214 => 90,  208 => 72,  169 => 76,  143 => 51,  140 => 57,  132 => 53,  128 => 46,  119 => 45,  107 => 42,  71 => 22,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 45,  114 => 47,  84 => 17,  70 => 29,  67 => 25,  61 => 20,  94 => 41,  89 => 31,  85 => 26,  75 => 35,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 76,  171 => 44,  166 => 73,  163 => 73,  158 => 67,  156 => 66,  151 => 56,  142 => 51,  138 => 43,  136 => 49,  121 => 50,  117 => 51,  105 => 39,  91 => 32,  62 => 19,  49 => 11,  87 => 40,  21 => 1,  38 => 9,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 34,  78 => 26,  46 => 9,  44 => 14,  27 => 96,  79 => 37,  72 => 27,  69 => 22,  47 => 15,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 57,  145 => 48,  139 => 45,  131 => 47,  123 => 50,  120 => 42,  115 => 48,  111 => 41,  108 => 40,  101 => 31,  98 => 33,  96 => 42,  83 => 38,  74 => 25,  66 => 22,  55 => 17,  52 => 12,  50 => 15,  43 => 11,  41 => 18,  35 => 5,  32 => 4,  29 => 3,  209 => 87,  203 => 70,  199 => 63,  193 => 80,  189 => 62,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 69,  162 => 68,  154 => 51,  149 => 60,  147 => 54,  144 => 58,  141 => 46,  133 => 54,  130 => 55,  125 => 46,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 44,  99 => 30,  95 => 29,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 34,  64 => 25,  60 => 17,  57 => 18,  54 => 18,  51 => 12,  48 => 14,  45 => 13,  42 => 11,  39 => 2,  36 => 5,  33 => 5,  30 => 4,);
    }
}
