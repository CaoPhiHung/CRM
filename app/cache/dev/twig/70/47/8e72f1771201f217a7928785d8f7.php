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
        return array (  38 => 6,  24 => 4,  406 => 122,  394 => 120,  388 => 119,  382 => 118,  376 => 117,  370 => 116,  364 => 115,  353 => 113,  351 => 112,  344 => 108,  337 => 106,  331 => 105,  325 => 104,  319 => 103,  314 => 102,  312 => 101,  303 => 97,  297 => 96,  291 => 95,  279 => 93,  267 => 91,  261 => 90,  257 => 89,  252 => 87,  243 => 83,  237 => 82,  231 => 81,  225 => 80,  219 => 79,  215 => 78,  212 => 77,  202 => 73,  196 => 72,  191 => 69,  180 => 64,  174 => 63,  168 => 60,  163 => 57,  155 => 55,  153 => 54,  135 => 51,  118 => 48,  116 => 47,  107 => 43,  101 => 42,  91 => 40,  87 => 39,  81 => 38,  77 => 36,  69 => 32,  61 => 30,  57 => 29,  45 => 21,  41 => 7,  31 => 4,  28 => 3,  20 => 1,  563 => 210,  560 => 209,  428 => 203,  423 => 181,  420 => 180,  415 => 126,  412 => 168,  407 => 162,  404 => 161,  400 => 121,  397 => 107,  392 => 9,  389 => 8,  379 => 209,  374 => 207,  371 => 206,  358 => 114,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  305 => 130,  301 => 129,  296 => 127,  285 => 94,  283 => 117,  273 => 92,  268 => 107,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  220 => 82,  216 => 78,  210 => 76,  206 => 73,  188 => 67,  184 => 65,  170 => 61,  165 => 59,  151 => 57,  147 => 53,  141 => 52,  137 => 48,  123 => 49,  119 => 42,  113 => 40,  99 => 38,  95 => 41,  90 => 31,  70 => 29,  65 => 31,  51 => 23,  37 => 11,  35 => 8,  27 => 2,  25 => 1,  690 => 344,  660 => 317,  652 => 312,  644 => 307,  636 => 302,  628 => 297,  620 => 292,  612 => 287,  604 => 282,  596 => 277,  593 => 276,  590 => 275,  579 => 267,  572 => 266,  565 => 264,  559 => 261,  556 => 205,  534 => 256,  526 => 255,  518 => 254,  512 => 251,  508 => 250,  504 => 249,  500 => 248,  496 => 247,  492 => 246,  486 => 245,  479 => 244,  462 => 243,  455 => 239,  451 => 238,  447 => 237,  443 => 236,  439 => 235,  435 => 234,  431 => 233,  427 => 232,  395 => 205,  387 => 202,  381 => 212,  369 => 180,  360 => 188,  345 => 178,  336 => 174,  318 => 161,  309 => 131,  300 => 153,  290 => 146,  278 => 139,  270 => 109,  262 => 130,  254 => 88,  242 => 117,  233 => 113,  224 => 109,  214 => 102,  197 => 90,  192 => 71,  178 => 79,  172 => 76,  162 => 71,  154 => 68,  149 => 66,  139 => 61,  130 => 57,  122 => 54,  111 => 48,  102 => 44,  72 => 24,  64 => 21,  52 => 28,  47 => 19,  44 => 13,  33 => 5,  129 => 50,  124 => 25,  115 => 23,  106 => 22,  104 => 21,  88 => 35,  84 => 17,  82 => 16,  75 => 35,  59 => 19,  55 => 11,  53 => 10,  48 => 7,  39 => 5,  32 => 4,  30 => 5,  26 => 2,  19 => 1,);
    }
}
