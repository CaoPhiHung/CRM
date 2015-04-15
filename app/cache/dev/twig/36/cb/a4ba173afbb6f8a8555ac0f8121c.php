<?php

/* AevitasChannelBundle:Default:editTemplateBuilder.html.twig */
class __TwigTemplate_36cba4ba173afbb6f8a8555ac0f8121c extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasChannelBundle:eLRTE:root.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasChannelBundle:eLRTE:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 3
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
\t<li>Edit template</li>
    </ul>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "    <form class=\"form-horizontal\" action=\"\" method=\"POST\">
    <div class=\"block full-block\">
        <div class=\"block_content\">
            <div class=\"control-group row-fluid\">

                ";
        // line 16
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
        echo "
                ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "                    <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "            </div>

            <div class=\"separator line bottom\"></div>

            <div class=\"control-group row-fluid\">
                <label class=\"control-label\">Choose <strong>";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "</strong> action</strong></label>
                <div class=\"controls\">
                    <select name=\"action\" id=\"action\" onchange=\"window.location = \$(this).val();\">
                        <option value=\"\">-- Choose an action</option>
                        ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) ? $context["actions"] : $this->getContext($context, "actions")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            // line 39
            echo "                           ";
            if (((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")) == (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")))) {
                // line 40
                echo "                                <option selected=\"selected\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template", array("type" => (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "action" => (isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")))), "html", null, true);
                echo "\" onclick=\"window.location = '";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template", array("type" => (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "action" => (isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")))), "html", null, true);
                echo "';\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act"))), "html", null, true);
                echo "</option>
                           ";
            } else {
                // line 42
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template", array("type" => (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "action" => (isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")))), "html", null, true);
                echo "\" onclick=\"window.location = '";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template", array("type" => (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "action" => (isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")))), "html", null, true);
                echo "';\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act"))), "html", null, true);
                echo "</option>
                           ";
            }
            // line 44
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                    </select>
                </div>
            </div>

            <div class=\"separator line bottom\"></div>

            ";
        // line 51
        if (((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")) != null)) {
            // line 52
            echo "                ";
            if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "sms")) {
                // line 53
                echo "                    <div class=\"control-group row-fluid\">
                        <label class=\"control-label\">Edit <strong>";
                // line 54
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
                echo "</strong> template for <strong>";
                echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
                echo "</strong></label>
                        <div class=\"controls\">
                            <textarea id=\"template-content\" name=\"template-content\" class=\"wysihtml5 span12\" rows=\"5\">";
                // line 56
                echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content")), "html", null, true);
                echo "</textarea>
                        </div>
                    </div

                ";
            } else {
                // line 61
                echo "                    <div class=\"control-group row-fluid\">
                        <label class=\"control-label\">Edit <strong>";
                // line 62
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
                echo "</strong> template for <strong>";
                echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
                echo "</strong></label>
                        <div class=\"controls\">
                        ";
                // line 64
                $this->env->loadTemplate("AevitasChannelBundle:eLRTE:elrte.html.twig")->display($context);
                // line 65
                echo "                        </div>
                    </div

                    <div class=\"separator line bottom\"></div>
                ";
            }
            // line 70
            echo "                    <div class=\"form-actions\" style=\"margin: 0;\">
                            <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Save changes</button>
                    </div>
            ";
        }
        // line 74
        echo "
        </div>
    </div>
    </form>
";
    }

    // line 80
    public function block_javascript($context, array $blocks = array())
    {
        // line 81
        echo "    
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:editTemplateBuilder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 80,  186 => 70,  152 => 54,  110 => 40,  76 => 24,  260 => 128,  248 => 68,  245 => 67,  240 => 9,  237 => 8,  228 => 136,  221 => 131,  213 => 124,  180 => 93,  401 => 135,  364 => 105,  361 => 104,  353 => 99,  349 => 97,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 68,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 65,  175 => 45,  167 => 61,  159 => 56,  155 => 40,  129 => 28,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 82,  313 => 81,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 129,  259 => 66,  253 => 101,  234 => 84,  216 => 78,  192 => 74,  188 => 67,  170 => 62,  63 => 27,  53 => 23,  58 => 10,  23 => 3,  34 => 8,  146 => 52,  148 => 78,  137 => 48,  127 => 30,  113 => 49,  102 => 34,  90 => 31,  81 => 17,  59 => 10,  255 => 122,  244 => 7,  236 => 122,  230 => 139,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 91,  150 => 84,  77 => 29,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 28,  107 => 39,  71 => 13,  177 => 64,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 12,  61 => 17,  94 => 36,  89 => 29,  85 => 37,  75 => 14,  68 => 16,  56 => 17,  201 => 92,  196 => 109,  183 => 47,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 45,  121 => 55,  117 => 40,  105 => 40,  91 => 40,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 4,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 30,  46 => 19,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 19,  40 => 8,  37 => 10,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 42,  115 => 27,  111 => 26,  108 => 37,  101 => 22,  98 => 33,  96 => 34,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 16,  50 => 7,  43 => 5,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 81,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 92,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 53,  147 => 53,  144 => 51,  141 => 50,  133 => 69,  130 => 44,  125 => 44,  122 => 64,  116 => 61,  112 => 59,  109 => 41,  106 => 22,  103 => 38,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 16,  80 => 26,  73 => 31,  64 => 24,  60 => 19,  57 => 24,  54 => 18,  51 => 23,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 11,  33 => 3,  30 => 2,);
    }
}
