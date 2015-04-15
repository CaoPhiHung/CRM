<?php

/* AevitasLevisBundle:Backend:profile.html.twig */
class __TwigTemplate_d8836b9bb8ae02b819de55b6d1f8ef22 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Backend:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 4
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>Profile</li>
    <li class=\"divider\"></li>
    <li>Edit Profile</li>
</ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<div class=\"widget widget-2 widget-tabs widget-tabs-2 border-bottom-none\">
    <div class=\"widget-head\">
        <ul>
            <li class=\"active\"><a class=\"glyphicons settings\" href=\"#account-settings\" data-toggle=\"tab\"><i></i>Account settings</a></li>
        </ul>
    </div>
</div>

<form class=\"form-horizontal\" action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_user", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"fos_user_profile_edit\">
    <div class=\"tab-content\" style=\"padding: 0;\">
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        <div>
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "regcode"), 'label');
        echo "
            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "regcode"), 'widget');
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_confirm_sms", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
        echo "\" class=\"confirm btn\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Resend RegCode"), "html", null, true);
        echo "</a></div>
                ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        </div>
        <div class=\"form-actions\" style=\"margin: 0;\">
            <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Save changes</button>
        </div>
    </form>
    <!-- Modal -->
    <div id=\"confirm\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
            <strong id=\"myModalLabel\" style=\"color:#000\">";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Resend Registration code"), "html", null, true);
        echo "</strong>
        </div>
        <div class=\"modal-body\" style=\"color:#000\">
            <i>Sending... wait...</i>
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
        </div>
    </div>
";
    }

    // line 48
    public function block_javascript($context, array $blocks = array())
    {
        // line 49
        echo "<script>
    \$(document).ready(function(){
    \$('a.confirm').click(function(e){
        e.preventDefault();
        \$('#confirm').modal();
        \$.ajax({
            url: \$(this).attr('href'),
            dataType: 'json',
            success: function(data){
                \$('#confirm .modal-body i').text('Done');
                \$('#form_regcode').val(data.regcode);
            }
        })
    })
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 49,  108 => 48,  94 => 37,  82 => 28,  74 => 27,  70 => 26,  65 => 24,  57 => 22,  47 => 14,  44 => 13,  33 => 4,  30 => 3,);
    }
}
