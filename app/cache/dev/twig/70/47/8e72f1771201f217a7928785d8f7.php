<?php

/* AevitasLevisBundle:Backend:renderTopSidebar.html.twig */
class __TwigTemplate_70478e72f1771201f217a7928785d8f7 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<span class=\"profile\">
    <a class=\"img\" href=\"form_demo.html?lang=en\"><img src=\"\" alt=\"Mr. Awesome\" /></a>
    <span>
        <strong>";
        // line 4
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "username", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        }
        echo "</strong>
            ";
        // line 5
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "storename"), "method") != null)) {
            echo "<strong>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "storename"), "method"), "html", null, true);
            echo "</strong>";
        }
        // line 6
        echo "            <br/>
        <a class=\"pull-right\" href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Log out"), "html", null, true);
        echo "</a>
    </span>
</span>";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:renderTopSidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  30 => 5,  24 => 4,  19 => 1,  406 => 122,  394 => 120,  388 => 119,  382 => 118,  376 => 117,  370 => 116,  364 => 115,  353 => 113,  351 => 112,  344 => 108,  337 => 106,  331 => 105,  325 => 104,  319 => 103,  314 => 102,  312 => 101,  303 => 97,  297 => 96,  291 => 95,  279 => 93,  267 => 91,  261 => 90,  257 => 89,  254 => 88,  252 => 87,  237 => 82,  231 => 81,  225 => 80,  219 => 79,  215 => 78,  212 => 77,  202 => 73,  196 => 72,  191 => 69,  180 => 64,  174 => 63,  168 => 60,  163 => 57,  155 => 55,  153 => 54,  135 => 51,  129 => 50,  118 => 48,  116 => 47,  107 => 43,  101 => 42,  91 => 40,  87 => 39,  81 => 38,  77 => 36,  75 => 35,  69 => 32,  61 => 30,  57 => 29,  52 => 28,  45 => 21,  41 => 7,  28 => 3,  26 => 2,  20 => 1,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  423 => 181,  420 => 180,  415 => 126,  412 => 168,  407 => 162,  404 => 161,  400 => 121,  397 => 107,  392 => 9,  389 => 8,  381 => 212,  379 => 209,  374 => 207,  371 => 206,  369 => 180,  358 => 114,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  309 => 131,  305 => 130,  301 => 129,  296 => 127,  285 => 94,  283 => 117,  273 => 92,  270 => 109,  268 => 107,  263 => 105,  253 => 101,  234 => 84,  220 => 82,  216 => 78,  210 => 76,  206 => 73,  192 => 71,  188 => 67,  184 => 65,  165 => 59,  151 => 57,  147 => 53,  141 => 52,  137 => 48,  123 => 49,  119 => 42,  113 => 40,  99 => 38,  95 => 41,  90 => 31,  70 => 29,  65 => 31,  47 => 19,  37 => 11,  35 => 8,  27 => 2,  25 => 1,  259 => 104,  255 => 191,  251 => 190,  247 => 189,  243 => 83,  239 => 187,  207 => 157,  204 => 156,  170 => 61,  58 => 16,  54 => 14,  51 => 23,  42 => 6,  39 => 5,  34 => 3,  31 => 4,);
    }
}
