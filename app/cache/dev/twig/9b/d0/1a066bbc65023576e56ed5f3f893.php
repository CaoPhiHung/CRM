<?php

/* AevitasLevisBundle:Front:toppanel.html.twig */
class __TwigTemplate_9bd01a066bbc65023576e56ed5f3f893 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        <img src=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getThumbnail", array(0 => 40, 1 => 40), "method")), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "getEdited", array(), "any", true, true)) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getEdited"), "html", null, true);
            }
            echo "\"/><a href=\"javascript:void(0);\" title=\"Sign In\" class=\"avatar\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getUsername"), "html", null, true);
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
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your Email"), "html", null, true);
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
        return "AevitasLevisBundle:Front:toppanel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 36,  111 => 35,  104 => 31,  99 => 29,  92 => 27,  85 => 23,  79 => 20,  75 => 19,  70 => 17,  66 => 16,  61 => 14,  58 => 13,  48 => 8,  42 => 7,  36 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}
