<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_e6a7a75b68fe601277db40b872879125 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  87 => 20,  55 => 13,  31 => 5,  25 => 4,  21 => 2,  94 => 22,  89 => 20,  85 => 19,  79 => 18,  75 => 17,  72 => 16,  68 => 14,  64 => 12,  41 => 9,  24 => 3,  201 => 92,  199 => 91,  196 => 90,  187 => 84,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  158 => 67,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  115 => 43,  112 => 42,  105 => 40,  101 => 24,  91 => 31,  86 => 28,  66 => 15,  51 => 12,  49 => 19,  39 => 6,  19 => 1,  98 => 40,  93 => 9,  80 => 19,  46 => 7,  44 => 10,  36 => 7,  27 => 4,  22 => 2,  57 => 14,  54 => 21,  43 => 8,  40 => 8,  33 => 5,  30 => 3,  437 => 167,  416 => 148,  413 => 147,  409 => 146,  347 => 144,  343 => 133,  340 => 132,  337 => 131,  315 => 112,  309 => 109,  302 => 105,  298 => 104,  288 => 99,  282 => 96,  271 => 88,  265 => 85,  261 => 84,  255 => 81,  250 => 79,  240 => 71,  231 => 69,  227 => 68,  214 => 58,  202 => 53,  190 => 50,  180 => 47,  170 => 44,  159 => 35,  156 => 66,  92 => 21,  88 => 6,  82 => 17,  78 => 40,  74 => 15,  69 => 25,  65 => 13,  62 => 23,  56 => 9,  50 => 8,  48 => 7,  45 => 6,  42 => 5,  35 => 4,  32 => 12,);
    }
}
