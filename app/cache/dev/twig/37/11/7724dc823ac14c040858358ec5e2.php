<?php

/* TwigBundle:Exception:trace.html.twig */
class __TwigTemplate_37117724dc823ac14c040858358ec5e2 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")) {
            // line 2
            echo "    at
    <strong>
        <abbr title=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "class"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "short_class"), "html", null, true);
            echo "</abbr>
        ";
            // line 5
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "type") . $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")), "html", null, true);
            echo "
    </strong>
    (";
            // line 7
            echo $this->env->getExtension('code')->formatArgs($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "args"));
            echo ")
";
        }
        // line 9
        echo "
";
        // line 10
        if (((($this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "file", array(), "any", true, true) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file")) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : null), "line", array(), "any", true, true)) && $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"))) {
            // line 11
            echo "    ";
            echo (($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "function")) ? ("<br />") : (""));
            echo "
    in ";
            // line 12
            echo $this->env->getExtension('code')->formatFile($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file"), $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"));
            echo "&nbsp;
    ";
            // line 13
            ob_start();
            // line 14
            echo "    <a href=\"#\" onclick=\"toggle('trace-";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "'); switchIcons('icon-";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "-open', 'icon-";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "-close'); return false;\">
        <img class=\"toggle\" id=\"icon-";
            // line 15
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "-close\" alt=\"-\" src=\"data:image/gif;base64,R0lGODlhEgASAMQSANft94TG57Hb8GS44ez1+mC24IvK6ePx+Wa44dXs92+942e54o3L6W2844/M6dnu+P/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABIALAAAAAASABIAQAVCoCQBTBOd6Kk4gJhGBCTPxysJb44K0qD/ER/wlxjmisZkMqBEBW5NHrMZmVKvv9hMVsO+hE0EoNAstEYGxG9heIhCADs=\" style=\"display: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("inline") : ("none"));
            echo "\" />
        <img class=\"toggle\" id=\"icon-";
            // line 16
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "-open\" alt=\"+\" src=\"data:image/gif;base64,R0lGODlhEgASAMQTANft99/v+Ga44bHb8ITG52S44dXs9+z1+uPx+YvK6WC24G+944/M6W28443L6dnu+Ge54v/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABMALAAAAAASABIAQAVS4DQBTiOd6LkwgJgeUSzHSDoNaZ4PU6FLgYBA5/vFID/DbylRGiNIZu74I0h1hNsVxbNuUV4d9SsZM2EzWe1qThVzwWFOAFCQFa1RQq6DJB4iIQA7\" style=\"display: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("none") : ("inline"));
            echo "\" />
    </a>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 19
            echo "    <div id=\"trace-";
            echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")) . "-") . (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
            echo "\" style=\"display: ";
            echo (((0 == (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))) ? ("block") : ("none"));
            echo "\" class=\"trace\">
        ";
            // line 20
            echo $this->env->getExtension('code')->fileExcerpt($this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "file"), $this->getAttribute((isset($context["trace"]) ? $context["trace"] : $this->getContext($context, "trace")), "line"));
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 20,  31 => 5,  25 => 4,  89 => 20,  72 => 16,  68 => 14,  64 => 12,  50 => 8,  41 => 9,  199 => 91,  196 => 90,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  117 => 44,  112 => 42,  105 => 40,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  62 => 23,  39 => 6,  98 => 40,  93 => 9,  46 => 11,  44 => 10,  27 => 4,  57 => 14,  40 => 8,  23 => 3,  28 => 3,  115 => 43,  111 => 35,  104 => 31,  99 => 29,  92 => 21,  85 => 19,  70 => 17,  66 => 15,  58 => 13,  36 => 7,  21 => 2,  80 => 19,  77 => 14,  65 => 11,  61 => 14,  121 => 46,  113 => 49,  106 => 45,  94 => 22,  83 => 28,  79 => 18,  75 => 17,  71 => 12,  56 => 9,  54 => 21,  30 => 3,  22 => 2,  19 => 1,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 84,  183 => 82,  179 => 197,  173 => 74,  164 => 190,  158 => 67,  152 => 188,  146 => 185,  114 => 67,  108 => 64,  102 => 16,  88 => 6,  84 => 49,  78 => 40,  63 => 24,  59 => 33,  55 => 13,  51 => 12,  49 => 19,  43 => 8,  37 => 10,  33 => 5,  29 => 3,  26 => 2,  24 => 3,  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 246,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 92,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 157,  52 => 18,  48 => 8,  45 => 15,  42 => 7,  35 => 3,  32 => 12,);
    }
}
