<?php

/* AevitasLevisBundle:Report:renderReportUserProfile.html.twig */
class __TwigTemplate_1b1817322d3faac316751fcf14fef55e extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Account percentage for each profile's field"), "html", null, true);
        echo "</h4>
    </div>
    <div class=\"widget-body\">

        <script type=\"text/javascript\">
            google.load('visualization', '1', {packages: ['corechart']});
            </script>
            <script type=\"text/javascript\">
                function drawVisualization() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                  ";
        // line 14
        echo (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label"));
        echo ",
                  ";
        // line 15
        echo (isset($context["gdata"]) ? $context["gdata"] : $this->getContext($context, "gdata"));
        echo "
                    ]);

                    var options = {
                        title: 'Percentage filup profile attribute',
                        vAxis: {title: \"Percent\",maxValue: 100},
                        hAxis: {title: \"Profile field\"},
                        seriesType: \"bars\",
                        chartArea: {height: 300},
                        series: {5: {type: \"line\"}}
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('combochart'));
                    chart.draw(data, options);
                }
                google.setOnLoadCallback(drawVisualization);
                </script>
                <div id=\"combochart\" style=\"height: 400px\"></div>
            </div>
        </div>";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Report:renderReportUserProfile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 15,  37 => 14,  23 => 3,  19 => 1,  259 => 192,  255 => 191,  251 => 190,  247 => 189,  243 => 188,  239 => 187,  207 => 157,  204 => 156,  170 => 125,  58 => 16,  54 => 14,  51 => 13,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
