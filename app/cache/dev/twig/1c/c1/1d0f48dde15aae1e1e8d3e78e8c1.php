<?php

/* AevitasLevisBundle:Front:login.html.twig */
class __TwigTemplate_1cc11d0f48dde15aae1e1e8d3e78e8c1 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Front:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "<title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login to Loyalty Program"), "html", null, true);
        echo "</title>
        ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login to Loyalty Program"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
<style type=\"text/css\">
        .stepone .form-row + .form-row{float:none}
    </style>
    <section id=\"form_reg\" class=\"clearfix\">
        <div class=\"shadow_wrapper\">
            <div>
                <div class=\"content\" style=\"background:url('";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                    <ul class=\"steps\">
                        <li class=\"active step1\"></li>
                    </ul>
                    <div class=\"info stepone\">
                        <span class=\"title\"><h3>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login"), "html", null, true);
        echo "</h3></span>
                        <div style=\"width:30%\">
                ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 29
            echo "                                <div class=\"alert alert-faded alert-error\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage"))), "html", null, true);
            echo "
                                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                                <form action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check", array("locate" => "homepage"));
        echo "\" method=\"POST\">
                                    <fieldset>
                                        <label for=\"_username\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your Email"), "html", null, true);
        echo "</label>
                                        <input type=\"text\" name=\"_username\" class=\"input-block-level\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"User name\" />
                                    </fieldset>
                                    <fieldset>
                                        <label for=\"signin_pass\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Password"), "html", null, true);
        echo "</label>
                                        <input type=\"password\" class=\"input-block-level\" name=\"_password\" id=\"signin_pass\" placeholder=\"Password\" />
                                    </fieldset>
                                    <fieldset>
                                        <a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("levis_home_forget_password");
        echo "\" title=\"Recover your password\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Forgotten your password?"), "html", null, true);
        echo "</a>
                                        <br/>
                                        <input type=\"checkbox\" id=\"signin_remember\" name=\"signin_remember\" style=\"float:left\"/>
                                        <label for=\"signin_remember\" style=\"margin-left:20px\">";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remember me"), "html", null, true);
        echo "</label>
                                    </fieldset>
                                    <div><input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
                                        <input type=\"submit\" id=\"signin_submit\" name=\"signin_submit\" value=\"Login\" class=\"yellow_button\" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
";
    }

    // line 61
    public function block_javascript($context, array $blocks = array())
    {
        // line 62
        echo "
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 62,  145 => 61,  129 => 49,  124 => 47,  116 => 44,  109 => 40,  103 => 37,  99 => 36,  93 => 34,  84 => 31,  80 => 29,  76 => 28,  71 => 26,  63 => 21,  49 => 10,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
