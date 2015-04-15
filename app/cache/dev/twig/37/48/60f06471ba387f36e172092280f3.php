<?php

/* AevitasLevisBundle:Backend:userList.html.twig */
class __TwigTemplate_374860f06471ba387f36e172092280f3 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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

    // line 4
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 5
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>Item</li>
    <li class=\"divider\"></li>
    <li>List</li>
</ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>
<form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("backend_user_seeking");
        echo "\" method=\"GET\" id=\"searchuser\" class=\"clearfix\">
    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    <input type=\"submit\" class=\"btn btn-action\" value=\"Search\"/>
</form>
<table class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" id=\"table-list-store\" aria-describedby=\"DataTables_Table_0_info\">
    <thead>
        <tr role=\"row\">
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Firstname"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lastname"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Point"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("C.Code"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Level"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
        ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 33
            echo "        <tr class=\"";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
            echo " gradeA remove_item_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\">
            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getFirstname"), "html", null, true);
            echo "</td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLastname"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getEmail"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getPoint"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCCode"), "html", null, true);
            echo "</td>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLevel"), "html", null, true);
            echo "</td>
            <td class=\"center item-price\" colspan=\"2\">
                <a rel=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_report_userstatement", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\" title=\"download user statement\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Download"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_user", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_delete_user", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Delete"), "html", null, true);
            echo "</a>
            </td>
        </tr>
           ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "    </tbody></table>
    ";
        // line 48
        echo (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"));
        echo "
<a href=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["exporturl"]) ? $context["exporturl"] : $this->getContext($context, "exporturl")), "html", null, true);
        echo "\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "</a>

<form action=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("user_import");
        echo "\"  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'enctype');
;
        echo " method=\"POST\">
        ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'rest');
        echo "
    <button class=\"btn btn-primary\">Import</button>
</form>
<div id=\"open-form-delete\" style=\"display: none;\" title=\"!Important\">
    Are you sure want to delete this item ?
</div>
";
    }

    // line 60
    public function block_javascript($context, array $blocks = array())
    {
        // line 61
        echo "<script>
    var backend_item_delete = '";
        // line 62
        echo $this->env->getExtension('routing')->getPath("backend_item_delete");
        echo "';
</script>
<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/store.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:userList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 64,  221 => 62,  218 => 61,  215 => 60,  204 => 52,  197 => 51,  190 => 49,  186 => 48,  183 => 47,  161 => 43,  153 => 42,  145 => 41,  140 => 39,  136 => 38,  132 => 37,  128 => 36,  120 => 34,  113 => 33,  96 => 32,  89 => 28,  85 => 27,  81 => 26,  77 => 25,  73 => 24,  69 => 23,  65 => 22,  56 => 16,  52 => 15,  47 => 14,  44 => 13,  33 => 5,  129 => 28,  124 => 35,  115 => 23,  106 => 22,  104 => 21,  88 => 18,  84 => 17,  82 => 16,  75 => 15,  59 => 12,  55 => 11,  53 => 10,  48 => 7,  39 => 5,  32 => 4,  30 => 4,  26 => 2,  19 => 1,);
    }
}
