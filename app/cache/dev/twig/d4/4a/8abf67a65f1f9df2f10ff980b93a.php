<?php

/* AevitasPointBundle:Default:edit.html.twig */
class __TwigTemplate_d44a8abf67a65f1f9df2f10ff980b93a extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
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
    public function block_import($context, array $blocks = array())
    {
        echo "    
    <!-- select2 css -->
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 8
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 9
        echo "    <ul class=\"breadcrumb\">
        <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"#\">Point Rule</a></li>
        <li class=\"divider\"></li>
        <li>Edit rules</li>
    </ul>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    <form class=\"form-horizontal\" action=\"\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
        <div class=\"block full-block\">

            ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 23
            echo "                <div class=\"alert alert-faded\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                    ";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
            <div class=\"separator line bottom\"></div>

            <div class=\"control-group\">
                <label class=\"control-label\">Rule name</label>
                <div class=\"controls\">
                    ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Store</label>
                <div class=\"controls\">
                    <select id=\"select-stores\" name=\"select-stores\" multiple=\"multiple\">
                        ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : $this->getContext($context, "stores")));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 43
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "getOldId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["store"]) ? $context["store"] : $this->getContext($context, "store")), "name"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                    </select>
                    ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "store"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Level</label>
                <div class=\"controls\">
                    ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "level"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Point</label>
                <div class=\"controls\">
                    ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "point"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Point Operation</label>
                <div class=\"controls\">
                    ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "operation"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Action</label>
                <div class=\"controls\">
                    ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "action"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Gender</label>
                <div class=\"controls\">
                    ";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "gender"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">City</label>
                <div class=\"controls\">
                    <select id=\"select-city\" name=\"select-city\">
                        <option value=\"0\" selected=\"selected\">-- Global</option>
                        ";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cities"]) ? $context["cities"] : $this->getContext($context, "cities")));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 91
            echo "                            ";
            if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "city") == $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "map"))) {
                // line 92
                echo "                                <option selected=\"selected\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "map"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "name"), "html", null, true);
                echo "</option>
                            ";
            } else {
                // line 94
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "map"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "name"), "html", null, true);
                echo "</option>
                            ";
            }
            // line 96
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                    </select>
                </div>
            </div>

            <input type=\"hidden\" name=\"city-name\" id=\"city-name\" value=\"\">
            <input type=\"hidden\" name=\"district-name\" id=\"district-name\">

            <div class=\"control-group\">
                <label class=\"control-label\">District</label>
                <div class=\"controls\">
                    <select id=\"select-district\" name=\"select-district\" style=\"width:220px\">

                    </select>
                    <span id=\"loading-district\"></span>
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Anniversary check</label>
                <div class=\"controls\">
                    ";
        // line 117
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "anniversary"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Birthday check</label>
                <div class=\"controls\">
                    ";
        // line 124
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "birthday"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>
                
            <div class=\"control-group\">
                <label class=\"control-label\">Bonus check</label>
                <div class=\"controls\">
                    ";
        // line 131
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bonus"), 'widget', array("attr" => array()));
        echo "
                </div>
            </div>

            <div class=\"separator line bottom\"></div>

            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <input type=\"checkbox\" name=\"turn-IntervalDate\" id=\"turn-IntervalDate\" onchange=\"TurnBlock(this)\"/> &nbsp;
                    <strong>Interval date</strong>
                    <p class=\"muted\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class=\"span9\" id=\"block-IntervalDate\">
                    <div class=\"row-fluid\">
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Start date:</label>
                                <div class=\"input-prepend\">
                                    ";
        // line 149
        if ($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay")) {
            // line 150
            echo "                                        <input type=\"text\" id=\"sDate\" name=\"sDate\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('aevitas_twig')->myDateConvert($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay")), "html", null, true);
            echo "\"/>
                                    ";
        } else {
            // line 152
            echo "                                        <input type=\"text\" id=\"sDate\" name=\"sDate\" value=\"\"/>
                                    ";
        }
        // line 154
        echo "                                </div>
                            </div>
                        </div>
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Finish date:</label>
                                <div class=\"input-prepend\">
                                    ";
        // line 161
        if ($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay")) {
            // line 162
            echo "                                        <input type=\"text\" id=\"fDate\" name=\"fDate\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('aevitas_twig')->myDateConvert($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDay")), "html", null, true);
            echo "\"/>
                                    ";
        } else {
            // line 164
            echo "                                        <input type=\"text\" id=\"fDate\" name=\"fDate\" value=\"\"/>
                                    ";
        }
        // line 166
        echo "                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <input type=\"checkbox\" name=\"turn-DayOfMonth\" id=\"turn-DayOfMonth\" onchange=\"TurnBlock(this)\"/> &nbsp;
                    <strong>Days of Month options</strong>
                    <p class=\"muted\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class=\"span9\" id=\"block-DayOfMonth\">
                    <div class=\"row-fluid\">
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Start day of month:</label>
                                <div class=\"input-prepend\">
                                    <select id=\"sDayMonth\" name=\"sDayMonth\"?>
                                        ";
        // line 186
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["ii"]) {
            // line 187
            echo "                                            ";
            if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDayInMonth") == (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")))) {
                // line 188
                echo "                                                <option selected>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            } else {
                // line 190
                echo "                                                <option>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            }
            // line 192
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ii'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Finish day of month:</label>
                                <div class=\"input-prepend\">
                                    <select id=\"fDayMonth\" name=\"fDayMonth\"?>
                                        ";
        // line 202
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["ii"]) {
            // line 203
            echo "                                            ";
            if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDayInMonth") == (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")))) {
                // line 204
                echo "                                                <option selected>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            } else {
                // line 206
                echo "                                                <option>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            }
            // line 208
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ii'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 209
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <input type=\"checkbox\" name=\"turn-DayOfWeek\" id=\"turn-DayOfWeek\" onchange=\"TurnBlock(this)\"/> &nbsp;
                    <strong>Days of Week options</strong>
                    <p class=\"muted\">example for list [Monday, Wedday, Friday and Sunday]: \"2,4,6,1\" or: \"1,2,4,6\" ... <br/>(<strong>1</strong> denote for Sunday)</p>
                </div>
                <div class=\"span9\" id=\"block-DayOfWeek\">
                    <div class=\"control-group\">
                        <label>List of days of week:</label>
                        <input value=\"";
        // line 226
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "arrDayInWeek"), "html", null, true);
        echo "\" id=\"sDayWeek\" name=\"sDayWeek\" type=\"text\" placeholder=\"\" class=\"span10\"?>
                        <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"days much be [1..7] (value 1 is sunday) and separated by comma ( , )\"><i></i></span>
                    </div>
                </div>
            </div>

            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <input type=\"checkbox\" name=\"turn-HourOfDay\" id=\"turn-HourOfDay\" onchange=\"TurnBlock(this)\"/> &nbsp;
                    <strong>Hours of Day options</strong>
                    <p class=\"muted\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class=\"span9\" id=\"block-HourOfDay\">
                    <div class=\"row-fluid\">
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Start hour of day:</label>
                                <div class=\"input-prepend\">
                                    <select id=\"sHourDay\" name=\"sHourDay\"?>
                                        ";
        // line 245
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["ii"]) {
            // line 246
            echo "                                            ";
            if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sHourInDay") == (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")))) {
                // line 247
                echo "                                                <option selected>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            } else {
                // line 249
                echo "                                                <option>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            }
            // line 251
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ii'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 252
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=\"span6\">
                            <div class=\"control-group\">
                                <label>Finish hour of day:</label>
                                <div class=\"input-prepend\">
                                    <select id=\"fHourDay\" name=\"fHourDay\"?>
                                        ";
        // line 261
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["ii"]) {
            // line 262
            echo "                                            ";
            if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fHourInDay") == (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")))) {
                // line 263
                echo "                                                <option selected>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            } else {
                // line 265
                echo "                                                <option>";
                echo twig_escape_filter($this->env, (isset($context["ii"]) ? $context["ii"] : $this->getContext($context, "ii")), "html", null, true);
                echo "</option>
                                            ";
            }
            // line 267
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ii'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 268
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row-fluid\">
                <div class=\"span3\">
                    <input type=\"checkbox\" name=\"turn-DayParity\" id=\"turn-DayParity\" onchange=\"TurnBlock(this)\"/> &nbsp;
                    <strong>Day parity</strong>
                    <p class=\"muted\">even-day or odd-day</p>
                </div>
                <div class=\"span9\" id=\"block-DayParity\">
                    <div class=\"control-group\">
                        <input type=\"radio\" value=\"1\" id=\"DayParity-1\" name=\"DayParity\"/> even day<br/>
                        <input type=\"radio\" value=\"2\" id=\"DayParity-2\" name=\"DayParity\"/> odd day<br/>
                        <input type=\"radio\" value=\"3\" checked=\"checked\" id=\"DayParity-3\" name=\"DayParity\"/> both
                    </div>
                </div>
            </div>

            ";
        // line 291
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

            <div class=\"separator line bottom\"></div>

            <div class=\"form-actions\" style=\"margin: 0;\">
                <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Update</button>
            </div>

        </div>
    </form>
";
    }

    // line 303
    public function block_javascript($context, array $blocks = array())
    {
        // line 304
        echo "    <!-- select2 js -->
    <script src=\"";
        // line 305
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/select2.js"), "html", null, true);
        echo "\"></script>
    <script>
                        \$('.row-fluid .control-group input').attr('disabled', 'disabled');
                        \$('.row-fluid .control-group select').attr('disabled', 'disabled');

                        \$(function() {
                            \$(\"#sDate\").datepicker({
                                dateFormat: \"dd/mm/yy\",
                                changeMonth: true,
                                numberOfMonths: 1,
                                onClose: function(selectedDate) {
                                    if (\$(\"#sDate\").attr('value') == '') {
                                        \$(\"#fDate\").datepicker(\"option\", \"minDate\", new Date());
                                    } else {
                                        \$(\"#fDate\").datepicker(\"option\", \"minDate\", selectedDate);
                                    }
                                }
                            });
                            \$(\"#fDate\").datepicker({
                                minDate: new Date(),
                                dateFormat: \"dd/mm/yy\",
                                changeMonth: true,
                                numberOfMonths: 1,
                                onClose: function(selectedDate) {
                                    \$(\"#sDate\").datepicker(\"option\", \"maxDate\", selectedDate);
                                }
                            });
                        });

                        function TurnBlock(obj) {
                            var did = \$(obj).attr('name');
                            did = did.replace(\"turn\", \"block\");

                            if (\$(obj).attr('checked') != 'checked') {
                                \$('#' + did + ' input').attr('disabled', 'disabled');
                                \$('#' + did + ' select').attr('disabled', 'disabled');
                            } else {
                                \$('#' + did + ' input').removeAttr('disabled');
                                \$('#' + did + ' select').removeAttr('disabled');
                            }/**/
                        }

        ";
        // line 347
        if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDay") && $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDay"))) {
            // line 348
            echo "            \$(document.getElementById('turn-IntervalDate')).attr('checked', 'checked');
            TurnBlock(document.getElementById('turn-IntervalDate'));
        ";
        }
        // line 351
        echo "
        ";
        // line 352
        if (($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "sDayInMonth") && $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fDayInMonth"))) {
            // line 353
            echo "            \$(document.getElementById('turn-DayOfMonth')).attr('checked', 'checked');
            TurnBlock(document.getElementById('turn-DayOfMonth'));
        ";
        }
        // line 356
        echo "
        ";
        // line 357
        if ($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "arrDayInWeek")) {
            // line 358
            echo "            \$(document.getElementById('turn-DayOfWeek')).attr('checked', 'checked');
            TurnBlock(document.getElementById('turn-DayOfWeek'));
        ";
        }
        // line 361
        echo "
        ";
        // line 362
        if ($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "fHourInDay")) {
            // line 363
            echo "            \$(document.getElementById('turn-HourOfDay')).attr('checked', 'checked');
            TurnBlock(document.getElementById('turn-HourOfDay'));
        ";
        }
        // line 366
        echo "
        ";
        // line 367
        if ($this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "DayParity")) {
            // line 368
            echo "            \$('#DayParity-' +";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "DayParity"), "html", null, true);
            echo " ).attr('checked', 'checked');
            \$(document.getElementById('turn-DayParity')).attr('checked', 'checked');
            TurnBlock(document.getElementById('turn-DayParity'));
        ";
        }
        // line 372
        echo "
            function doSelectCity(obj, CallBack) {
                var cityname = \$(obj).find(\":selected\").text();
                \$('#city-name').val(cityname);
                \$('#loading-district').addClass('loading');
                \$.ajax({
                    url: '";
        // line 378
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "/' + \$(obj).val(),
                    dataType: 'json',
                    success: function(data) {
                        \$('#loading-district').removeClass('loading');
                        \$('#select-district').select2(\"destroy\");
                        \$('#select-district').html('<option value=\"\">-- Global</option>' + data.html).select2();
                        if (typeof (CallBack) != 'undefined') {
                            window.setTimeout(function() {
                                CallBack();
                            }, 500);
                        }
                    }
                });
            }

            \$('select#select-city').on('change', function() {
                doSelectCity(this);
            });

            var arrStores = [];
            var listStores = \$('#aevitas_point_rule_store').val();
            arrStores = listStores.split('_');
            console.log(arrStores);
            \$('#select-stores').val(arrStores);

            \$('#select-stores').select2({
                width: '220px'
            }).on('change', function(e) {
                var strval = '_';
                var val = e.val;
                for (i in val) {
                    strval += val[i] + '_';
                }
                \$('#aevitas_point_rule_store').val(strval);
            });

            \$('select#select-district').on('change', function() {
                var districtname = \$(this).find(\":selected\").text();
                \$('#district-name').val(districtname);
            });

            if (\$('select#select-city').val() != 0) {
                doSelectCity(document.getElementById('select-city'), function() {
                    var val = parseInt(";
        // line 421
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "district"), "html", null, true);
        echo ");
                    \$(\"#select-district\").select2(\"val\", val);
                });
            }
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasPointBundle:Default:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 251,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 161,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 90,  118 => 56,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 152,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 77,  186 => 72,  152 => 67,  110 => 50,  76 => 25,  260 => 128,  248 => 68,  245 => 124,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 58,  223 => 88,  219 => 87,  215 => 55,  211 => 98,  207 => 96,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 42,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 192,  348 => 161,  317 => 82,  313 => 81,  301 => 145,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 90,  216 => 78,  192 => 160,  188 => 91,  170 => 62,  63 => 18,  53 => 16,  58 => 19,  23 => 3,  34 => 8,  146 => 60,  148 => 131,  137 => 57,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 26,  59 => 19,  255 => 131,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 100,  210 => 83,  206 => 96,  202 => 164,  190 => 73,  184 => 90,  172 => 81,  150 => 61,  77 => 25,  97 => 21,  65 => 20,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 117,  229 => 106,  224 => 172,  220 => 101,  214 => 99,  208 => 68,  169 => 76,  143 => 51,  140 => 129,  132 => 53,  128 => 66,  119 => 45,  107 => 113,  71 => 22,  177 => 69,  165 => 74,  160 => 64,  135 => 62,  126 => 54,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 42,  89 => 31,  85 => 28,  75 => 14,  68 => 22,  56 => 18,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 73,  158 => 63,  156 => 71,  151 => 39,  142 => 60,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 48,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 18,  78 => 25,  46 => 9,  44 => 9,  27 => 96,  79 => 34,  72 => 23,  69 => 22,  47 => 13,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 33,  131 => 60,  123 => 29,  120 => 42,  115 => 48,  111 => 47,  108 => 43,  101 => 41,  98 => 40,  96 => 43,  83 => 28,  74 => 24,  66 => 19,  55 => 15,  52 => 16,  50 => 15,  43 => 8,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 97,  203 => 93,  199 => 94,  193 => 88,  189 => 86,  187 => 85,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 66,  162 => 74,  154 => 62,  149 => 92,  147 => 53,  144 => 130,  141 => 50,  133 => 56,  130 => 55,  125 => 58,  122 => 46,  116 => 67,  112 => 66,  109 => 65,  106 => 48,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 26,  73 => 31,  64 => 20,  60 => 19,  57 => 18,  54 => 18,  51 => 15,  48 => 7,  45 => 12,  42 => 11,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
