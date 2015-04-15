<?php

/* AevitasLevisBundle:Report:newMemberReport.html.twig */
class __TwigTemplate_b07fe4a51e9ebf7ce7666db98b740d4b extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("BACKEND"), "html", null, true);
        echo "</a></li>
    <li class=\"divider\"></li>
    <li>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Download Report"), "html", null, true);
        echo "</li>
</ul>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "<form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('routing')->getPath("backend_report_newmember");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"fos_user_profile_edit\">
    ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    <div class=\"form-actions\" style=\"margin: 0;\">
        <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Download</button>
    </div>
</form>
";
    }

    // line 19
    public function block_javascript($context, array $blocks = array())
    {
        // line 20
        echo "
<script type=\"text/javascript\">
\$(document).ready(function(){
    \$('#form_start').datepicker({dateFormat: 'yy-mm-dd'});
    \$('#form_end').datepicker({dateFormat: 'yy-mm-dd'});
    \$('#form_end').datepicker(\"option\", \"maxDate\", new Date());
});
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Report:newMemberReport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  69 => 19,  59 => 13,  51 => 12,  48 => 11,  41 => 7,  36 => 5,  33 => 4,  30 => 3,);
    }
}
