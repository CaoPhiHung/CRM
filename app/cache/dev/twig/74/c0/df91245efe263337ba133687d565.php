<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_74c0df91245efe263337ba133687d565 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("VietlandUserBundle::layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "VietlandUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_head($context, array $blocks = array())
    {
        // line 3
        echo "    <title>Login - Starclub</title>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"login\">
<div class=\"loginWrap\">
<h2 class=\"glyphicons unlock form-signin-heading\"><i></i> Please sign in</h2>
<form class=\"form-signin\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"POST\">
    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
        <label class=\"strong\" for=\"_username\">";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User"), "html", null, true);
        echo "</label>
        <input type=\"text\" name=\"_username\" class=\"input-block-level\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"User name\" />
        <label class=\"strong\" for=\"inputPassword\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password"), "html", null, true);
        echo "</label>
        <input type=\"password\" class=\"input-block-level\" name=\"_password\" placeholder=\"Password\" />
        <div class=\"separator line\"></div>
        <span class=\"pull-left uniformjs\"><label class=\"checkbox\"><input type=\"checkbox\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("remember-me"), "html", null, true);
        echo "\">Remember me</label></span>
        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.submit"), "html", null, true);
        echo "</button>
        <div class=\"clearfix\"></div>
</form>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 19,  67 => 18,  61 => 15,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  40 => 8,  37 => 7,  32 => 3,  29 => 2,);
    }
}
