<?php

/* TwigBundle:Exception:traces_text.html.twig */
class __TwigTemplate_50dc2a95afaad39363d7451f6fbb37b2 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<div class=\"block\">
    <h2>
        Stack Trace (Plain Text)&nbsp;
        ";
        // line 4
        ob_start();
        // line 5
        echo "        <a href=\"#\" onclick=\"toggle('traces-text'); switchIcons('icon-traces-text-open', 'icon-traces-text-close'); return false;\">
            <img class=\"toggle\" id=\"icon-traces-text-close\" alt=\"-\" src=\"data:image/gif;base64,R0lGODlhEgASAMQSANft94TG57Hb8GS44ez1+mC24IvK6ePx+Wa44dXs92+942e54o3L6W2844/M6dnu+P/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABIALAAAAAASABIAQAVCoCQBTBOd6Kk4gJhGBCTPxysJb44K0qD/ER/wlxjmisZkMqBEBW5NHrMZmVKvv9hMVsO+hE0EoNAstEYGxG9heIhCADs=\" style=\"display: none\" />
            <img class=\"toggle\" id=\"icon-traces-text-open\" alt=\"+\" src=\"data:image/gif;base64,R0lGODlhEgASAMQTANft99/v+Ga44bHb8ITG52S44dXs9+z1+uPx+YvK6WC24G+944/M6W28443L6dnu+Ge54v/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABMALAAAAAASABIAQAVS4DQBTiOd6LkwgJgeUSzHSDoNaZ4PU6FLgYBA5/vFID/DbylRGiNIZu74I0h1hNsVxbNuUV4d9SsZM2EzWe1qThVzwWFOAFCQFa1RQq6DJB4iIQA7\" style=\"display: inline\" />
        </a>
        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 10
        echo "    </h2>

    <div id=\"traces-text\" class=\"trace\" style=\"display: none;\">
<pre>";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray"));
        foreach ($context['_seq'] as $context["i"] => $context["e"]) {
            // line 14
            echo "[";
            echo twig_escape_filter($this->env, ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) + 1), "html", null, true);
            echo "] ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "class"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "message"), "html", null, true);
            echo "
";
            // line 15
            $this->env->loadTemplate("TwigBundle:Exception:traces.txt.twig")->display(array("exception" => (isset($context["e"]) ? $context["e"] : $this->getContext($context, "e"))));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</pre>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces_text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 13,  87 => 20,  31 => 5,  25 => 4,  89 => 20,  72 => 16,  68 => 14,  64 => 12,  50 => 8,  41 => 9,  199 => 91,  196 => 90,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  117 => 44,  112 => 42,  105 => 40,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  62 => 23,  39 => 6,  98 => 40,  93 => 9,  46 => 7,  44 => 10,  27 => 4,  57 => 16,  40 => 8,  23 => 3,  28 => 3,  115 => 43,  111 => 35,  104 => 31,  99 => 29,  92 => 21,  85 => 19,  70 => 17,  66 => 15,  58 => 13,  36 => 7,  21 => 2,  80 => 19,  77 => 14,  65 => 11,  61 => 14,  121 => 46,  113 => 49,  106 => 45,  94 => 22,  83 => 28,  79 => 18,  75 => 17,  71 => 12,  56 => 9,  54 => 21,  30 => 3,  22 => 2,  19 => 1,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 84,  183 => 82,  179 => 197,  173 => 74,  164 => 190,  158 => 67,  152 => 188,  146 => 185,  114 => 67,  108 => 64,  102 => 16,  88 => 6,  84 => 49,  78 => 40,  63 => 24,  59 => 33,  55 => 13,  51 => 15,  49 => 19,  43 => 8,  37 => 10,  33 => 10,  29 => 3,  26 => 5,  24 => 4,  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 246,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 92,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 157,  52 => 18,  48 => 8,  45 => 15,  42 => 14,  35 => 4,  32 => 12,);
    }
}
