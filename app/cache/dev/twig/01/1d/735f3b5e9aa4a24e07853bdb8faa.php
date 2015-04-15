<?php

/* AevitasLevisBundle:Front:topmenu.html.twig */
class __TwigTemplate_011d735f3b5e9aa4a24e07853bdb8faa extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<ul class=\"nav\">
    ";
        // line 2
        $context["extract"] = twig_split_filter((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), "_");
        // line 3
        echo "    <li class=\"";
        if (twig_in_filter("welcome", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "active";
        }
        echo "\"><a href=\"/\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Home"), "html", null, true);
        echo "</a></li>
    <li class=\"dropdown ";
        // line 4
        if (twig_in_filter("member", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "active";
        } elseif (twig_in_filter("faq", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
        }
        echo "\"><a href=\"javascript:void(0);\" title=\"How It Works\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Benefits"), "html", null, true);
        echo "</a>
        <ul class=\"dropdown-menu\">
            <li><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("levis_member_tier");
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rewards tiers"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Membership Tiers"), "html", null, true);
        echo "</a></li>
            <li><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("levis_faq");
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("FAQ"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("FAQ"), "html", null, true);
        echo "</a></li>
        </ul>
    </li>
    <li><a href=\"#\">";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shop"), "html", null, true);
        echo "</a></li>
    <!--li class=\"dropdown ";
        // line 11
        if (twig_in_filter("gift", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "active";
        }
        echo "\">
        <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("levis_gift_category");
        echo "\" title=\"Rewards\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rewards"), "html", null, true);
        echo "</a>
        ";
        // line 14
        echo "    </li-->
    ";
        // line 15
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "getId", array(), "any", true, true)) {
            echo "<li class=\"";
            if (twig_in_filter("dashboard", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("levis_user_dashboard");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("My Account"), "html", null, true);
            echo "</a></li>";
        } else {
            echo "<li class=\"";
            if (twig_in_filter("register", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("levis_home_register_online");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Register"), "html", null, true);
            echo "</a></li>";
        }
        // line 16
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:topmenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 15,  77 => 14,  65 => 11,  61 => 10,  121 => 55,  113 => 49,  106 => 45,  94 => 36,  83 => 28,  79 => 27,  75 => 26,  71 => 12,  56 => 19,  54 => 18,  30 => 5,  22 => 2,  19 => 1,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 199,  183 => 198,  179 => 197,  173 => 194,  164 => 190,  158 => 189,  152 => 188,  146 => 185,  114 => 67,  108 => 64,  102 => 16,  88 => 50,  84 => 49,  78 => 46,  63 => 24,  59 => 33,  55 => 31,  51 => 7,  49 => 17,  43 => 6,  37 => 10,  33 => 4,  29 => 3,  26 => 2,  24 => 3,  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 246,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 68,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 157,  52 => 18,  48 => 7,  45 => 15,  42 => 5,  35 => 3,  32 => 2,);
    }
}
