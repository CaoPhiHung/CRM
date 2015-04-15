<?php

/* VietlandAevitasBundle:Pagination:view.html.twig */
class __TwigTemplate_8d9c258855f229d30c635e7974c6d282 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<div class=\"dataTables_paginate paging_full_numbers min-";
        echo twig_escape_filter($this->env, (isset($context["min"]) ? $context["min"] : $this->getContext($context, "min")), "html", null, true);
        echo " current";
        echo twig_escape_filter($this->env, (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")), "html", null, true);
        echo " pagination\" id=\"tSortable_paginate\">
    <ul rel=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "baseurl"), "html", null, true);
        echo "sort=%sort%&amount=%amount%\">
    ";
        // line 3
        if (((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) > 1)) {
            // line 4
            echo "        <li><a class=\"first paginate_button\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
            echo "page=1&amount=";
            echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
            echo "\" tabindex=\"0\" id=\"tSortable_first\">First</a></li>
        <li><a class=\"previous paginate_button\" href=\"";
            // line 5
            echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
            echo "page=";
            echo twig_escape_filter($this->env, ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) - 1), "html", null, true);
            echo "&amount=";
            echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
            echo "\" tabindex=\"0\" id=\"tSortable_previous\">Previous</a></li>
    ";
        } else {
            // line 7
            echo "        <li class=\"disabled\"><a class=\"first paginate_button\" tabindex=\"0\" id=\"tSortable_first\">First</a></li>
        <li class=\"disabled\"><a class=\"previous paginate_button\" tabindex=\"0\" id=\"tSortable_previous\">Previous</a></li>
    ";
        }
        // line 10
        if ((((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) - 1) >= (isset($context["min"]) ? $context["min"] : $this->getContext($context, "min")))) {
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["min"]) ? $context["min"] : $this->getContext($context, "min")), ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 12
                echo "        <li><a href=\"";
                echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "&amount=";
                echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
                echo "\" class=\"paginate_button\" tabindex=\"0\">";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "</a></li>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 15
        echo "        <li><a class=\"paginate_active\" tabindex=\"0\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Page"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")), "html", null, true);
        echo "</a></li>
";
        // line 16
        if (((isset($context["max"]) ? $context["max"] : $this->getContext($context, "max")) >= ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) + 1))) {
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) + 1), (isset($context["max"]) ? $context["max"] : $this->getContext($context, "max"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 18
                echo "        <li><a href=\"";
                echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
                echo "page=";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "&amount=";
                echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
                echo "\" class=\"paginate_button\" tabindex=\"0\">";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "</a></li>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 21
        if (((isset($context["max"]) ? $context["max"] : $this->getContext($context, "max")) < (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")))) {
            // line 22
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
            echo "page=";
            echo twig_escape_filter($this->env, ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) + 1), "html", null, true);
            echo "&amount=";
            echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
            echo "\" class=\"next paginate_button\" tabindex=\"0\" id=\"tSortable_next\">Next</a></li>
        <li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["router"]) ? $context["router"] : $this->getContext($context, "router")), "html", null, true);
            echo "page=";
            echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")), "html", null, true);
            echo "&amount=";
            echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
            echo "\" class=\"last paginate_button\" tabindex=\"0\" id=\"tSortable_last\">Last</a></li>
";
        } else {
            // line 25
            echo "        <li class=\"disabled\"><a class=\"next paginate_button\" tabindex=\"0\" id=\"tSortable_next\">Next</a></li>
        <li class=\"disabled\"><a class=\"last paginate_button\" tabindex=\"0\" id=\"tSortable_last\">Last</a></li>
";
        }
        // line 28
        echo "        </ul>
    </div>";
    }

    public function getTemplateName()
    {
        return "VietlandAevitasBundle:Pagination:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 28,  124 => 25,  115 => 23,  106 => 22,  104 => 21,  88 => 18,  84 => 17,  82 => 16,  75 => 15,  59 => 12,  55 => 11,  53 => 10,  48 => 7,  39 => 5,  32 => 4,  30 => 3,  26 => 2,  19 => 1,);
    }
}
