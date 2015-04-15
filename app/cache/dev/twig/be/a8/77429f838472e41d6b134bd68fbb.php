<?php

/* AevitasConfigBundle:Localize:toppanel.html.twig */
class __TwigTemplate_bea877429f838472e41d6b134bd68fbb extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "getId", array(), "any", true, true)) {
            // line 2
            echo "    <div class=\"login\">
        <a href=\"javascript:void(0);\" title=\"Sign In\" class=\"avatar\"><img src=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getThumbnail", array(0 => 40, 1 => 40), "method")), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "getEdited", array(), "any", true, true)) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getEdited"), "html", null, true);
            }
            echo "\" width=\"40\" height=\"40\"/>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getName"), "html", null, true);
            echo "</a>
        <div class=\"panel\">
            <ul class=\"usernav\">
                <li><a href=\"";
            // line 6
            echo $this->env->getExtension('routing')->getPath("levis_user_dashboard");
            echo "\" title=\"Dashboard\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("My Dashboard"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 7
            echo $this->env->getExtension('routing')->getPath("levis_user_profile");
            echo "\" title=\"Profile\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("My Profile"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 8
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\" title=\"Logout\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logout"), "html", null, true);
            echo "</a></li>
            </ul>
        </div>
    </div>
";
        } else {
            // line 13
            echo "<div class=\"signin_button\">
    <a href=\"#\" title=\"Sign In\" class=\"yellow_button\">";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sign In"), "html", null, true);
            echo "</a>
    <div>
        <h3>";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login To Your Account"), "html", null, true);
            echo "</h3>
        <form action=\"";
            // line 17
            echo $this->env->getExtension('routing')->getPath("fos_user_security_check", array("locate" => "homepage"));
            echo "\" method=\"post\">
            <fieldset>
                <label for=\"_username\">";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Card Number"), "html", null, true);
            echo "</label>
                <input type=\"text\" name=\"_username\" class=\"input-block-level\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
            echo "\" placeholder=\"User name\" />
            </fieldset>
            <fieldset>
                <label for=\"signin_pass\">";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password"), "html", null, true);
            echo "</label>
                <input type=\"password\" class=\"input-block-level\" name=\"_password\" id=\"signin_pass\" placeholder=\"Password\" />
            </fieldset>
            <fieldset>
                <a href=\"";
            // line 27
            echo $this->env->getExtension('routing')->getPath("levis_home_forget_password");
            echo "\" title=\"Recover your password\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Forgotten your password?"), "html", null, true);
            echo "</a>
                <input type=\"checkbox\" id=\"signin_remember\" name=\"signin_remember\" />
                <label for=\"signin_remember\">";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remember me"), "html", null, true);
            echo "</label>
            </fieldset>
            <div><input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
            echo "\" />
                <input type=\"submit\" id=\"signin_submit\" name=\"signin_submit\" value=\"Login\" class=\"yellow_button\" />
            </div>
        </form>
        <a href=\"#\" title=\"Login with Facebook\" class=\"login_fb\" onclick=\"fblogin()\">";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login with Facebook"), "html", null, true);
            echo "</a>
        <a href=\"#\" title=\"Register\" class=\"user_register\">";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("New User? Register now"), "html", null, true);
            echo "</a>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "AevitasConfigBundle:Localize:toppanel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 36,  111 => 35,  104 => 31,  99 => 29,  92 => 27,  85 => 23,  70 => 17,  66 => 16,  58 => 13,  36 => 6,  21 => 2,  80 => 15,  77 => 14,  65 => 11,  61 => 14,  121 => 55,  113 => 49,  106 => 45,  94 => 36,  83 => 28,  79 => 20,  75 => 19,  71 => 12,  56 => 19,  54 => 18,  30 => 5,  22 => 2,  19 => 1,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 199,  183 => 198,  179 => 197,  173 => 194,  164 => 190,  158 => 189,  152 => 188,  146 => 185,  114 => 67,  108 => 64,  102 => 16,  88 => 50,  84 => 49,  78 => 46,  63 => 24,  59 => 33,  55 => 31,  51 => 7,  49 => 17,  43 => 6,  37 => 10,  33 => 4,  29 => 3,  26 => 2,  24 => 3,  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 246,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 68,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 157,  52 => 18,  48 => 8,  45 => 15,  42 => 7,  35 => 3,  32 => 2,);
    }
}
