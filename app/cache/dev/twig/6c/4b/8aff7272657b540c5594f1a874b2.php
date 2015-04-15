<?php

/* AevitasLevisBundle:Backend:index.html.twig */
class __TwigTemplate_6c4b8aff7272657b540c5594f1a874b2 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
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

    // line 2
    public function block_head($context, array $blocks = array())
    {
        // line 3
        echo "<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
";
    }

    // line 5
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 6
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> METRO</a></li>
    <li class=\"divider\"></li>
    <li>Dashboard</li>
</ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "<div class=\"row-fluid\">
    <div class=\"span8\">
                ";
        // line 16
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Report:renderReportUserProfile"));
        echo "

            <div class=\"separator bottom\"></div>

            <div class=\"widget widget-2 widget-tabs widget-tabs-2\">
                <div class=\"widget-head\">
                    <ul>
                        <li class=\"active\"><a class=\"glyphicons coffe_cup\" href=\"#dataTableSourcesTab\" data-toggle=\"tab\"><i></i>Traffic sources</a></li>
                        <li><a class=\"glyphicons share_alt\" href=\"#dataTableRefferingTab\" data-toggle=\"tab\"><i></i>Referrals</a></li>
                    </ul>
                </div>
                <div class=\"widget-body\">
                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"dataTableSourcesTab\">
                            <div id=\"dataTableSources\"></div>
                        </div>
                        <div class=\"tab-pane\" id=\"dataTableRefferingTab\">
                            <div id=\"dataTableReffering\"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"separator line\"></div>

            <div class=\"widget\">
                <div class=\"widget-head\">
                    <h4 class=\"heading\">Recent Activity</h4>
                </div>
            </div>
            <div class=\"widget-activity\">
                <ul class=\"filters\">
                    <li>Filter by</li>
                    <li class=\"glyphicons user_add\"><i></i></li>
                    <li class=\"glyphicons shopping_cart active\"><i></i></li>
                    <li class=\"glyphicons envelope\"><i></i></li>
                    <li class=\"glyphicons link\"><i></i></li>
                    <li class=\"glyphicons camera\"><i></i></li>
                </ul>
                <div class=\"clearfix\"></div>
                <ul class=\"activities\">
                    <li class=\"highlight\">
                        <span class=\"glyphicons activity-icon shopping_cart\"><i></i></span>
                        <a href=\"\">Client name</a> bought 10 items worth of &euro;50 <a href=\"\">order #2301</a>
                    </li>
                    <li>
                        <span class=\"glyphicons activity-icon shopping_cart\"><i></i></span>
                        <a href=\"\">Client name</a> bought 10 items worth of &euro;50 <a href=\"\">order #2302</a>
                    </li>
                    <li>
                        <span class=\"glyphicons activity-icon shopping_cart\"><i></i></span>
                        <a href=\"\">Client name</a> bought 10 items worth of &euro;50 <a href=\"\">order #2303</a>
                    </li>
                    <li>
                        <span class=\"glyphicons activity-icon shopping_cart\"><i></i></span>
                        <a href=\"\">Client name</a> bought 10 items worth of &euro;50 <a href=\"\">order #2304</a>
                    </li>
                    <li>
                        <span class=\"glyphicons activity-icon shopping_cart\"><i></i></span>
                        <a href=\"\">Client name</a> bought 10 items worth of &euro;50 <a href=\"\">order #2305</a>
                    </li>
                </ul>
            </div>
            <div class=\"separator line\"></div>

            <div class=\"row-fluid\">
                <div class=\"span6\">
                    <div class=\"row-fluid\">
                        <div class=\"span6\">
                            <a href=\"\" class=\"widget-stats\">
                                <span class=\"txt\"><strong>20</strong>signups</span>
                                <span class=\"glyphicons user_add\"><i></i></span>
                                <div class=\"clearfix\"></div>
                            </a>
                        </div>
                        <div class=\"span6\">
                            <a href=\"\" class=\"widget-stats line\">
                                <span class=\"txt\"><strong>20</strong>signups</span>
                                <span class=\"glyphicons user_add\"><i></i></span>
                                <div class=\"clearfix\"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=\"span6\">
                    <div class=\"row-fluid\">
                        <div class=\"span4\">
                            <a href=\"\" class=\"widget-stats circle\">
                                <span class=\"txt\"><strong>20</strong>signups</span>
                                <div class=\"clearfix\"></div>
                            </a>
                        </div>
                        <div class=\"span4\">
                            <a href=\"\" class=\"widget-stats circle line\">
                                <span class=\"txt\"><strong>20</strong>signups</span>
                                <div class=\"clearfix\"></div>
                            </a>
                        </div>
                        <div class=\"span4\">
                            <a href=\"\" class=\"widget-stats circle line\">
                                <span class=\"txt\"><strong>20</strong>signups</span>
                                <div class=\"clearfix\"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class=\"span4\">
                ";
        // line 125
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Report:renderReportUserActive"));
        echo "
                <div class=\"row-fluid\">
                    <div class=\"span6\">
                        <a href=\"\" class=\"widget-stats\">
                            <span class=\"txt\"><strong>20</strong>signups</span>
                            <span class=\"glyphicons user_add\"><i></i></span>
                            <div class=\"clearfix\"></div>
                        </a>
                    </div>
                    <div class=\"span6\">
                        <a href=\"\" class=\"widget-stats line\">
                            <span class=\"txt\"><strong>20</strong>signups</span>
                            <span class=\"glyphicons user_add\"><i></i></span>
                            <div class=\"clearfix\"></div>
                        </a>
                    </div>
                </div>
                <div class=\"separator\"></div>
                <div class=\"widget\">
                    <div class=\"widget-head\">
                        <h4 class=\"heading\">Widget heading</h4>
                    </div>
                    <div class=\"widget-body\">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                        <p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                    </div>
                </div>
            </div>
        </div>
";
    }

    // line 156
    public function block_javascript($context, array $blocks = array())
    {
        // line 157
        echo "        <script type=\"text/javascript\">
            function genSparklines()
            {
                if (\$('.sparkline').length)
                {
                    \$.each(\$('.sparkline'), function(k, v)
                    {
                        var data = [[1, 3 + charts.utility.randNum()], [2, 5 + charts.utility.randNum()], [3, 8 + charts.utility.randNum()], [4, 11 + charts.utility.randNum()], [5, 14 + charts.utility.randNum()], [6, 17 + charts.utility.randNum()], [7, 20 + charts.utility.randNum()], [8, 15 + charts.utility.randNum()], [9, 18 + charts.utility.randNum()], [10, 22 + charts.utility.randNum()]];
                        \$(v).sparkline(data,
                                {
                                    width: 45,
                                    height: 28,
                                    lineColor: \"#ffffff\",
                                    fillColor: 'transparent',
                                    spotColor: '#ffffff',
                                    maxSpotColor: '#9FC569',
                                    minSpotColor: '#ED7A53',
                                    spotRadius: 3,
                                    lineWidth: 2
                                });
                    });
                }
            }
            \$(function()
            {
                genSparklines();
            });
            </script>

            <!--  Flot (Charts) JS -->
            <script src=\"";
        // line 187
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.pie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.tooltip.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.selection.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.resize.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/flot/jquery.flot.orderBars.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>


            <script>
            var charts =
                    {
                        // init all charts
                        init: function()
                        {
                            // mark weekends on the website traffic main graph
                            this.website_traffic_graph.options.markings = this.utility.weekendAreas;

                            // init website traffic main graph
                            this.website_traffic_graph.init();

                            // init website traffic toolbar
                            this.utility.website_traffic_toolbar();

                            // init website traffic overview graph
                            this.website_traffic_overview.init();

                            // connect website traffic graphs
                            this.utility.website_traffic_connect();

                            // init traffic sources pie
                            this.traffic_sources_pie.init();
                        },
                        // utility class
                        utility:
                                {
                                    chartColors: [\"#7d2212\", \"#242424\", \"#303030\", \"#383838\", \"#484848\", \"#585858\"],
                                    chartBackgroundColors: [\"rgba(0,0,0,0.3)\", \"rgba(0,0,0,0.3)\"],
                                    applyStyle: function(that)
                                    {
                                        that.options.colors = charts.utility.chartColors;
                                        that.options.grid.backgroundColor = {colors: charts.utility.chartBackgroundColors};
                                        that.options.grid.borderColor = charts.utility.chartColors[0];
                                        that.options.grid.color = charts.utility.chartColors[0];
                                    },
                                    // connect website_traffic_graph with website_traffic_overview
                                    website_traffic_connect: function()
                                    {
                                        \$(\"#placeholder\").bind(\"plotselected\", function(event, ranges)
                                        {
                                            // do the zooming // rewrite chart object
                                            charts.website_traffic_graph.plot = \$.plot(
                                                    \$(\"#placeholder\"),
                                                    [{data: charts.website_traffic_graph.d1, label: \"Visitors\"}, {data: charts.website_traffic_graph.d2, label: \"Conversions\"}],
                                            \$.extend(true, {}, charts.website_traffic_graph.options, {
                                                xaxis: {min: ranges.xaxis.from, max: ranges.xaxis.to}
                                            })
                                                    );

                                            // don't fire event on the overview to prevent eternal loop
                                            charts.website_traffic_overview.plot.setSelection(ranges, true);

                                            // enable website traffic clear selection button
                                            \$('#websiteTrafficClear').prop('disabled', false);
                                        });

                                        \$(\"#overview\").bind(\"plotselected\", function(event, ranges)
                                        {
                                            // set selection
                                            charts.website_traffic_graph.plot.setSelection(ranges);

                                            // enable website traffic clear selection button
                                            \$('#websiteTrafficClear').prop('disabled', false);
                                        });
                                    },
                                    website_traffic_toolbar: function()
                                    {
                                        // clear selection button
                                        \$(\"#websiteTrafficClear\").click(function()
                                        {
                                            charts.utility.website_traffic_clear();
                                        });

                                        // last 24 hours button
                                        \$('#websiteTraffic24Hours').click(function()
                                        {
                                            charts.website_traffic_graph.plot.setSelection(
                                                    {
                                                        xaxis:
                                                                {
                                                                    from: 1361318400000,
                                                                    to: 1361404800000}
                                                    });
                                        });

                                        // last 7 days button
                                        \$('#websiteTraffic7Days').click(function()
                                        {
                                            charts.website_traffic_graph.plot.setSelection(
                                                    {
                                                        xaxis:
                                                                {
                                                                    from: 1360800000000,
                                                                    to: 1361404800000}
                                                    });
                                        });

                                        // last 14 days button
                                        \$('#websiteTraffic14Days').click(function()
                                        {
                                            charts.website_traffic_graph.plot.setSelection(
                                                    {
                                                        xaxis:
                                                                {
                                                                    from: 1360195200000,
                                                                    to: 1361404800000}
                                                    });
                                        });
                                    },
                                    // clear selection on website traffic charts
                                    website_traffic_clear: function()
                                    {
                                        // disable clear button
                                        \$('#websiteTrafficClear').prop('disabled', true);

                                        // clear selection on website traffic main chart / rewrite chart object
                                        charts.website_traffic_graph.plot = \$.plot(
                                                \$(\"#placeholder\"),
                                                [{data: charts.website_traffic_graph.d1, label: \"Visitors\"}, {data: charts.website_traffic_graph.d2, label: \"Conversions\"}],
                                        charts.website_traffic_graph.options
                                                );

                                        // clear selection on website traffic overview chart
                                        charts.website_traffic_overview.plot.clearSelection();
                                    },
                                    // helper for returning the weekends in a period
                                    weekendAreas: function(axes)
                                    {
                                        var markings = [];
                                        var d = new Date(axes.xaxis.min);
                                        // go to the first Saturday
                                        d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
                                        d.setUTCSeconds(0);
                                        d.setUTCMinutes(0);
                                        d.setUTCHours(0);
                                        var i = d.getTime();
                                        do {
                                            // when we don't set yaxis, the rectangle automatically
                                            // extends to infinity upwards and downwards
                                            markings.push({xaxis: {from: i, to: i + 2 * 24 * 60 * 60 * 1000}});
                                            i += 7 * 24 * 60 * 60 * 1000;
                                        } while (i < axes.xaxis.max);

                                        return markings;
                                    },
                                    // generate random number for charts
                                    randNum: function()
                                    {
                                        return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                                    }
                                },
                        // main website traffic chart
                        website_traffic_graph:
                                {
                                    // data
                                    d1: [[1358899200000, 2018], [1358985600000, 2371], [1359072000000, 2737], [1359158400000, 2881], [1359244800000, 3441], [1359331200000, 2659], [1359417600000, 3723], [1359504000000, 2598], [1359590400000, 3715], [1359676800000, 3166], [1359763200000, 2189], [1359849600000, 3450], [1359936000000, 3179], [1360022400000, 3709], [1360108800000, 2554], [1360195200000, 3229], [1360281600000, 2688], [1360368000000, 3129], [1360454400000, 2553], [1360540800000, 3182], [1360627200000, 2622], [1360713600000, 3432], [1360800000000, 2499], [1360886400000, 3245], [1360972800000, 3101], [1361059200000, 2727], [1361145600000, 3498], [1361232000000, 2444], [1361318400000, 3487], [1361404800000, 3024]],
                                    d2: [[1358899200000, 457], [1358985600000, 440], [1359072000000, 605], [1359158400000, 590], [1359244800000, 694], [1359331200000, 674], [1359417600000, 481], [1359504000000, 593], [1359590400000, 471], [1359676800000, 560], [1359763200000, 621], [1359849600000, 518], [1359936000000, 426], [1360022400000, 412], [1360108800000, 411], [1360195200000, 624], [1360281600000, 684], [1360368000000, 519], [1360454400000, 686], [1360540800000, 504], [1360627200000, 500], [1360713600000, 497], [1360800000000, 525], [1360886400000, 485], [1360972800000, 689], [1361059200000, 619], [1361145600000, 603], [1361232000000, 488], [1361318400000, 508], [1361404800000, 687]],
                                    // will hold the chart object
                                    plot: null,
                                    // chart options
                                    options:
                                            {
                                                xaxis: {mode: \"time\", tickLength: 5},
                                                selection: {mode: \"x\"},
                                                grid: {
                                                    markingsColor: \"rgba(0,0,0, 0.02)\",
                                                    backgroundColor: {},
                                                    borderColor: \"#f1f1f1\",
                                                    borderWidth: 0,
                                                    color: \"#DA4C4C\",
                                                    hoverable: true,
                                                    clickable: true
                                                },
                                                series: {
                                                    lines: {
                                                        show: true,
                                                        fill: true
                                                    },
                                                    points: {
                                                        show: true
                                                    }
                                                },
                                                colors: [],
                                                tooltip: true,
                                                tooltipOpts: {
                                                    content: \"%x: <strong>%y %s</strong>\",
                                                    dateFormat: \"%y-%0m-%0d\",
                                                    shifts: {
                                                        x: 10,
                                                        y: 20
                                                    },
                                                    defaultTheme: false
                                                },
                                                legend: {
                                                    show: true,
                                                    noColumns: 2,
                                                    backgroundColor: {}
                                                }
                                            },
                                    // initialize
                                    init: function()
                                    {
                                        // apply styling
                                        charts.utility.applyStyle(this);

                                        // first correct the timestamps - they are recorded as the daily
                                        // midnights in UTC+0100, but Flot always displays dates in UTC
                                        // so we have to add one hour to hit the midnights in the plot
                                        for (var i = 0; i < this.d1.length; ++i)
                                        {
                                            this.d1[i][0] += 60 * 60 * 1000;
                                            this.d2[i][0] += 60 * 60 * 1000;
                                        }

                                        // create the chart object
                                        this.plot = \$.plot(
                                                \$(\"#placeholder\"),
                                                [{data: this.d1, label: \"Visitors\"}, {data: this.d2, label: \"Conversions\"}],
                                        this.options
                                                );
                                    }
                                },
                        // website traffic overview chart
                        website_traffic_overview:
                                {
                                    // data
                                    d1: [[1358899200000, 2018], [1358985600000, 2371], [1359072000000, 2737], [1359158400000, 2881], [1359244800000, 3441], [1359331200000, 2659], [1359417600000, 3723], [1359504000000, 2598], [1359590400000, 3715], [1359676800000, 3166], [1359763200000, 2189], [1359849600000, 3450], [1359936000000, 3179], [1360022400000, 3709], [1360108800000, 2554], [1360195200000, 3229], [1360281600000, 2688], [1360368000000, 3129], [1360454400000, 2553], [1360540800000, 3182], [1360627200000, 2622], [1360713600000, 3432], [1360800000000, 2499], [1360886400000, 3245], [1360972800000, 3101], [1361059200000, 2727], [1361145600000, 3498], [1361232000000, 2444], [1361318400000, 3487], [1361404800000, 3024]],
                                    d2: [[1358899200000, 457], [1358985600000, 440], [1359072000000, 605], [1359158400000, 590], [1359244800000, 694], [1359331200000, 674], [1359417600000, 481], [1359504000000, 593], [1359590400000, 471], [1359676800000, 560], [1359763200000, 621], [1359849600000, 518], [1359936000000, 426], [1360022400000, 412], [1360108800000, 411], [1360195200000, 624], [1360281600000, 684], [1360368000000, 519], [1360454400000, 686], [1360540800000, 504], [1360627200000, 500], [1360713600000, 497], [1360800000000, 525], [1360886400000, 485], [1360972800000, 689], [1361059200000, 619], [1361145600000, 603], [1361232000000, 488], [1361318400000, 508], [1361404800000, 687]],
                                    // will hold the chart object
                                    plot: null,
                                    // chart options
                                    options:
                                            {
                                                series: {
                                                    /*
                                                     bars: {
                                                     show: true,
                                                     lineWidth: 35,
                                                     align: \"left\"
                                                     },
                                                     */
                                                    lines: {show: true, lineWidth: 1, fill: true},
                                                    shadowSize: 0
                                                },
                                                xaxis: {ticks: [], mode: \"time\"},
                                                yaxis: {ticks: [], min: 0, autoscaleMargin: 0.1},
                                                selection: {mode: \"x\"},
                                                grid: {
                                                    borderColor: \"#DA4C4C\",
                                                    borderWidth: 0,
                                                    minBorderMargin: 0,
                                                    axisMargin: 0,
                                                    labelMargin: 0,
                                                    margin: 0,
                                                    backgroundColor: {}
                                                },
                                                colors: [],
                                                legend: {
                                                    show: false,
                                                    backgroundColor: {}
                                                }
                                            },
                                    // initialize
                                    init: function()
                                    {
                                        // apply styling
                                        charts.utility.applyStyle(this);

                                        // first correct the timestamps - they are recorded as the daily
                                        // midnights in UTC+0100, but Flot always displays dates in UTC
                                        // so we have to add one hour to hit the midnights in the plot
                                        for (var i = 0; i < this.d1.length; ++i)
                                        {
                                            this.d1[i][0] += 60 * 60 * 1000;
                                            this.d2[i][0] += 60 * 60 * 1000;
                                        }

                                        // create chart object
                                        this.plot = \$.plot(
                                                \$(\"#overview\"),
                                                [{data: this.d1, label: \"Visitors\"}, {data: this.d2, label: \"Conversions\"}],
                                        this.options
                                                );
                                    }
                                },
                        traffic_sources_pie:
                                {
                                    // data
                                    data: [
                                        {label: \"organic\", data: 60},
                                        {label: \"direct\", data: 22.1},
                                        {label: \"referral\", data: 16.9},
                                        {label: \"cpc\", data: 1}
                                    ],
                                    // chart object
                                    plot: null,
                                    // chart options
                                    options: {
                                        series: {
                                            pie: {
                                                show: true,
                                                redraw: true,
                                                radius: 1,
                                                tilt: 0.9,
                                                stroke: {
                                                    color: 'rgba(0,0,0,0.1)',
                                                    width: 1
                                                },
                                                label: {
                                                    show: true,
                                                    radius: 1,
                                                    formatter: function(label, series) {
                                                        return '<div style=\"font-size:8pt;text-align:center;padding:5px;color:#fff;\">' + Math.round(series.percent) + '%</div>';
                                                    },
                                                    background: {opacity: 0.8}
                                                }
                                            }
                                        },
                                        legend: {
                                            show: true,
                                            backgroundColor: {}
                                        },
                                        colors: [],
                                        grid: {hoverable: true},
                                        tooltip: true,
                                        tooltipOpts: {
                                            content: \"<strong>%y% %s</strong>\",
                                            dateFormat: \"%y-%0m-%0d\",
                                            shifts: {
                                                x: 10,
                                                y: 20
                                            },
                                            defaultTheme: false
                                        }
                                    },
                                    // initialize
                                    init: function()
                                    {
                                        // apply styling
                                        charts.utility.applyStyle(this);

                                        this.plot = \$.plot(\$(\"#pie\"), this.data, this.options);
                                    }
                                },
                        // traffic sources dataTables
                        // we are now using Google Charts instead of Flot
                        traffic_sources_dataTables:
                                {
                                    // tables data
                                    data:
                                            {
                                                tableSources:
                                                        {
                                                            data: null,
                                                            init: function()
                                                            {
                                                                var data = new google.visualization.DataTable();
                                                                data.addColumn('string', 'Source');
                                                                data.addColumn('string', 'Medium');
                                                                data.addColumn('number', 'Visits');
                                                                data.addColumn('number', 'Pg.Views');
                                                                data.addColumn('string', 'avg.time');

                                                                data.addRows(7);
                                                                data.setCell(0, 0, 'google', null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 1, 'organic', null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 2, 89, null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 3, 299, null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 4, '00:01:48', null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 0, '(direct)', null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 1, '(none)', null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 2, 14, null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 3, 34, null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 4, '00:03:15', null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 0, 'yahoo', null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 1, 'organic', null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 2, 3, null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 3, 3, null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 4, '00:00:00', null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 0, 'ask', null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 1, 'organic', null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 2, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 3, 3, null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 4, '00:01:34', null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 0, 'bing', null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 1, 'organic', null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 2, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 3, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 4, '00:00:00', null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 0, 'conduit', null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 1, 'organic', null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 2, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 3, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 4, '00:00:00', null, {'style': 'text-align: center;'});
                                                                data.setCell(6, 0, 'google', null, {'style': 'text-align: center;'});
                                                                data.setCell(6, 1, 'cpc', null, {'style': 'text-align: center;'});
                                                                data.setCell(6, 2, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(6, 3, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(6, 4, '00:00:00', null, {'style': 'text-align: center;'});

                                                                this.data = data;
                                                                return data;
                                                            }
                                                        },
                                                tableReffering:
                                                        {
                                                            data: null,
                                                            init: function()
                                                            {
                                                                var data = new google.visualization.DataTable();
                                                                data.addColumn('string', 'Source');
                                                                data.addColumn('number', 'Pg.Views');
                                                                data.addColumn('string', 'avg.time');
                                                                data.addColumn('string', 'Exits');

                                                                data.addRows(6);
                                                                data.setCell(0, 0, 'google.ro');
                                                                data.setCell(0, 1, 14, null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 2, '00:05:51', null, {'style': 'text-align: center;'});
                                                                data.setCell(0, 3, '3', null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 0, 'search.sweetim.com');
                                                                data.setCell(1, 1, 5, null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 2, '00:03:29', null, {'style': 'text-align: center;'});
                                                                data.setCell(1, 3, '1', null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 0, 'start.funmoods.com');
                                                                data.setCell(2, 1, 5, null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 2, '00:01:02', null, {'style': 'text-align: center;'});
                                                                data.setCell(2, 3, '1', null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 0, 'google.md');
                                                                data.setCell(3, 1, 2, null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 2, '00:03:56', null, {'style': 'text-align: center;'});
                                                                data.setCell(3, 3, '1', null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 0, 'searchmobileonline.com');
                                                                data.setCell(4, 1, 2, null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 2, '00:02:21', null, {'style': 'text-align: center;'});
                                                                data.setCell(4, 3, '1', null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 0, 'google.com');
                                                                data.setCell(5, 1, 1, null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 2, '00:00:00', null, {'style': 'text-align: center;'});
                                                                data.setCell(5, 3, '1', null, {'style': 'text-align: center;'});

                                                                this.data = data;
                                                                return data;
                                                            }
                                                        }
                                            },
                                    // chart
                                    chart:
                                            {
                                                tableSources: null,
                                                tableReffering: null
                                            },
                                    // options
                                    options:
                                            {
                                                tableSources:
                                                        {
                                                            page: 'enable',
                                                            pageSize: 6,
                                                            allowHtml: true,
                                                            cssClassNames: {
                                                                headerRow: 'tableHeaderRow',
                                                                tableRow: 'tableRow',
                                                                selectedTableRow: 'selectedTableRow',
                                                                hoverTableRow: 'hoverTableRow'
                                                            },
                                                            width: '100%',
                                                            alternatingRowStyle: false,
                                                            pagingSymbols: {prev: '<span class=\"btn btn-inverse\">prev</btn>', next: '<span class=\"btn btn-inverse\">next</span>'}
                                                        },
                                                tableReffering:
                                                        {
                                                            page: 'enable',
                                                            pageSize: 6,
                                                            allowHtml: true,
                                                            cssClassNames: {
                                                                headerRow: 'tableHeaderRow',
                                                                tableRow: 'tableRow',
                                                                selectedTableRow: 'selectedTableRow',
                                                                hoverTableRow: 'hoverTableRow'
                                                            },
                                                            width: '100%',
                                                            alternatingRowStyle: false,
                                                            pagingSymbols: {prev: '<span class=\"btn btn-inverse\">prev</btn>', next: '<span class=\"btn btn-inverse\">next</span>'}
                                                        }
                                            },
                                    // initialize
                                    init: function()
                                    {
                                        // data
                                        charts.traffic_sources_dataTables.data.tableSources.init();
                                        charts.traffic_sources_dataTables.data.tableReffering.init();

                                        // charts
                                        charts.traffic_sources_dataTables.drawTableSources();
                                        charts.traffic_sources_dataTables.drawTableReffering();
                                    },
                                    // draw Traffic Sources Table
                                    drawTableSources: function()
                                    {
                                        this.chart.tableSources = new google.visualization.Table(document.getElementById('dataTableSources'));
                                        this.chart.tableSources.draw(this.data.tableSources.data, this.options.tableSources);
                                    },
                                    // draw Refferals Table
                                    drawTableReffering: function()
                                    {
                                        this.chart.tableReffering = new google.visualization.Table(document.getElementById('dataTableReffering'));
                                        this.chart.tableReffering.draw(this.data.tableReffering.data, this.options.tableReffering);
                                    }
                                }
                    };

            \$(function()
            {
                // initialize charts
                setTimeout(function() {
                    charts.utility.chartColors[0] = \$('#content').css('backgroundColor');
                    charts.init();
                }, 500);
            });
                </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 192,  255 => 191,  251 => 190,  247 => 189,  243 => 188,  239 => 187,  207 => 157,  204 => 156,  170 => 125,  58 => 16,  54 => 14,  51 => 13,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
