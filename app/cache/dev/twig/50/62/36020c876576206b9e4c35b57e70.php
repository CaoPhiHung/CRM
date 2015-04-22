<?php

/* AevitasLevisBundle:Report:renderReportUserActive.html.twig */
class __TwigTemplate_506236020c876576206b9e4c35b57e70 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<div class=\"widget\">
    <div class=\"widget-head\">
        <h4 class=\"heading\">";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User Active/Inactive"), "html", null, true);
        echo "</h4>
    </div>
    <div class=\"widget-body\">
        <script type=\"text/javascript\">
            google.load(\"visualization\", \"1\", {packages: [\"corechart\"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Status', 'Percent'],
                    ";
        // line 12
        echo (isset($context["stat"]) ? $context["stat"] : $this->getContext($context, "stat"));
        echo "
                ]);

                var options = {
                    title: '";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Customer Statistic"), "html", null, true);
        echo "',
                    is3D: true
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
            </script>
            <div id=\"piechart\"></div>
        </div>
    </div>";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Report:renderReportUserActive.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 12,  41 => 15,  37 => 14,  23 => 3,  19 => 1,  259 => 192,  255 => 191,  251 => 190,  247 => 189,  243 => 188,  239 => 187,  207 => 157,  204 => 156,  170 => 125,  58 => 16,  54 => 14,  51 => 13,  42 => 16,  39 => 5,  34 => 3,  31 => 2,);
    }
}
