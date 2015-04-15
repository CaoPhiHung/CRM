<?php

/* AevitasChannelBundle:Default:createProcess.html.twig */
class __TwigTemplate_c8cd9bb14c27e75816702ec2cdc2d3f8 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasChannelBundle:eLRTE:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasChannelBundle:eLRTE:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_import($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- select2 css -->
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jui_jquery-ui-1.9.2.custom.min_1.css\" type=\"text/css\" media=\"screen\">
";
    }

    // line 9
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 10
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
        <li><a href=\"#\">EMAIL - SMS</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"#\">Process</a></li>
    </ul>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<form>
<input id=\"create-process\" type=\"button\" value=\"Create Process\" class=\"btn btn-primary\">
</form>

    <table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"process_table dynamicTable table table-striped table-bordered table-condensed dataTable\">
        <th width=\"10px\">#ID</th>
        <th>Type</th>
        <th>Template</th>
        <th>Rule</th>
        <th>Mode</th>
        <th>Status</th>
        <th>Action</th>
        <th>Delete</th>

        ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["processes"]) ? $context["processes"] : $this->getContext($context, "processes")));
        foreach ($context['_seq'] as $context["_key"] => $context["process"]) {
            // line 35
            echo "            <tr id=\"process_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "_id"), "html", null, true);
            echo "\">
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "id"), "html", null, true);
            echo "</td>

                <td>
                    <select style=\"width:80px\" disabled=\"disabled\">
                        <option
                            value=\"1\"
                            ";
            // line 42
            if (($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "type") == 1)) {
                // line 43
                echo "                                selected
                            ";
            }
            // line 45
            echo "                        >Email</option>
                        <option value=\"2\"
                            ";
            // line 47
            if (($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "type") == 2)) {
                // line 48
                echo "                                selected
                            ";
            }
            // line 50
            echo "                        >SMS</option>
                    </select>
                </td>

                <td>
                    <select style=\"width:180px\" disabled=\"disabled\">
                        ";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : $this->getContext($context, "templates")));
            foreach ($context['_seq'] as $context["_key"] => $context["template"]) {
                // line 57
                echo "                            <option
                                value=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "_id"), "html", null, true);
                echo "\"
                                ";
                // line 59
                if (($this->getAttribute($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "template"), "_id") == $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "_id"))) {
                    // line 60
                    echo "                                    selected
                                ";
                }
                // line 62
                echo "                                >";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "name"), "html", null, true);
                echo "
                            </option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "                    </select>
                </td>

                <td>
                    <select style=\"width:150px\" disabled=\"disabled\">
                        ";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rules"]) ? $context["rules"] : $this->getContext($context, "rules")));
            foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
                // line 71
                echo "                            <option
                                value=\"";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "_id"), "html", null, true);
                echo "\"
                                ";
                // line 73
                if (($this->getAttribute($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "rule"), "_id") == $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "_id"))) {
                    // line 74
                    echo "                                    selected
                                ";
                }
                // line 76
                echo "                                >";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "templateRuleName"), "html", null, true);
                echo "
                            </option>
                         ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "                    </select>
                </td>

                <td>
                    <select style=\"width:130px\" disabled=\"disabled\">
                        <option value=\"1\"
                            ";
            // line 85
            if (($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "mode") == 1)) {
                // line 86
                echo "                                    selected
                            ";
            }
            // line 88
            echo "                        >Manually</option>
                        <option value=\"2\"
                            ";
            // line 90
            if (($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "mode") == 2)) {
                // line 91
                echo "                                    selected
                            ";
            }
            // line 93
            echo "                        >Automatically</option>
                    </select>
                </td>

                ";
            // line 97
            if (($this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "status") == 1)) {
                // line 98
                echo "                    <td><p class=\"process_status\">Running</p></td>
                    <td><button onclick=\"process_stop(this, ";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "_id"), "html", null, true);
                echo ")\">Stop</button></td>
                    <td><button class=\"process_delete\" onclick=\"process_delete(this, ";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "_id"), "html", null, true);
                echo ")\" disabled=\"disabled\">Delete</button></td>
                ";
            } else {
                // line 102
                echo "                    <td><p class=\"process_status\">Stopped</p></td>
                    <td>
                        <button
                            class=\"process_action\"
                            onclick=\"process_start(this, ";
                // line 106
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "_id"), "html", null, true);
                echo ")\">
                            Start
                        </button>
                    </td>
                    <td>
                        <button
                            class=\"process_delete\"
                            onclick=\"process_delete(this, ";
                // line 113
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["process"]) ? $context["process"] : $this->getContext($context, "process")), "_id"), "html", null, true);
                echo ")\">
                            Delete
                        </button>
                    </td>
                ";
            }
            // line 118
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['process'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "
    </table>
    <script>var number_process = ";
        // line 122
        echo twig_escape_filter($this->env, (isset($context["number_process"]) ? $context["number_process"] : $this->getContext($context, "number_process")), "html", null, true);
        echo " ;</script>

    <table>
        <tbody id=\"new-process\" style=\"display:none\">
            <tr id=\"row_{ id }\">
                <td>{ id }</td>

                <td>
                    <select onchange=\"change_type(this, { id })\" class=\"process_type\" style=\"width:80px\" >
                        <option value=\"1\">Email</option>
                        <option value=\"2\">SMS</option>
                    </select>
                </td>

                <td>
                    <select class=\"process_template\" style=\"width:180px\">
                        ";
        // line 138
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : $this->getContext($context, "templates")));
        foreach ($context['_seq'] as $context["_key"] => $context["template"]) {
            // line 139
            echo "                            <option
                                value=\"";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "_id"), "html", null, true);
            echo "\"
                                class=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "type"), "html", null, true);
            echo "\"
                                selected>";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "name"), "html", null, true);
            echo "
                            </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                    </select>
                </td>

                <td>
                    <select onchange=\"change_rule(this, { id })\" class=\"process_rule\" style=\"width:150px\">
                        ";
        // line 150
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rules"]) ? $context["rules"] : $this->getContext($context, "rules")));
        foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
            // line 151
            echo "                            <option
                                value=\"";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "_id"), "html", null, true);
            echo "\"
                                mode=\"";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "type"), "html", null, true);
            echo "\"
                                selected>";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rule"]) ? $context["rule"] : $this->getContext($context, "rule")), "templateRuleName"), "html", null, true);
            echo "
                            </option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 157
        echo "                    </select>
                </td>

                <td>
                    <select class=\"process_mode\" style=\"width:130px\" disabled=\"disabled\">
                        <option value=\"1\" selected>Manually</option>
                        <option value=\"2\">Automatically</option>
                    </select>
                </td>

        <td><p class=\"process_status\" style=\"display:none\"></p></td>
        <td>
            <button
                    class=\"process_action\"
                    disabled=\"disabled\"
                    style=\"display:none\">Start</button>
            </td>
            <td>
                <button class=\"process_delete\"
                        onclick=\"process_save(this, { id })\">
                        Save
                </button>
            </td>
        </tr>
        </tbody>
    <table>

    <style>
        .process button {
            margin-top:-13px;
        }
        .process td {
            padding: 0px;
            padding-top: 8px;
            text-align: center;
        }
    </style>

    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\">
    </script>

    <script>
        window.render = function(template, data) {
            var html, index, match, pattern, result, var_;
            html = \$(\"#\" + template).html();
            pattern = /\\{[\\sa-z0-9_\\.\\\$]+\\}/g;
            result = \"\";
            index = 0;
            var_ = void 0;
            while (match = pattern.exec(html)) {
                var_ = match[0].substring(1, match[0].length - 1).trim();
                result += html.substring(index, match.index);
                eval(\"result+=data.\" + var_);
                index = pattern.lastIndex;
            }
            result += html.substring(index, html.length);
            return result;
        };

        window.process_save = function(element, row_id) {
            \$(element).fadeOut();
            \$(element).replaceWith('<img class=\"loading\" style=\"margin-top:-12px\" src=\"/img/loader.gif\" />');
            \$(element).fadeIn();

            var process_info = {};

            var tr = \$('#row_' + row_id);

            var process_info = {
                type     : tr.find('.process_type').val(),
                template : tr.find('.process_template').val(),
                mode     : tr.find('.process_mode').val(),
                rule     : tr.find('.process_rule').val()
            };

            \$.ajax({
                url: \"/backend/template/process/save\",
                type: \"POST\",
                dataType: \"json\",
                data: JSON.stringify(process_info),
                success : function(data) {
                    var tr = \$('#row_' + row_id)
                        .attr('id', 'process_' + data.id);

                    tr.find('.process_status')
                      .text('Stopped')
                      .show();

                    tr.find('.process_action')
                      .text('Start')
                      .attr('onclick', 'process_start(this,'+ data.id +')')
                      .attr('class', 'process_start')
                      .removeAttr('disabled')
                      .removeAttr('style')
                      .show();

                    tr.find('.loading')
                      .replaceWith('<button class=\"process_delete\" onclick=\"process_delete(this, '+ data.id +')\">Delete</button>')
                      .show();

                    tr.find('select')
                      .attr('disabled', 'disabled');

                }
            });
        };

        window.loading = function(element) {
            \$(element).fadeOut();
            \$(element).replaceWith('<img class=\"loading\" style=\"margin-top:-12px\" src=\"/img/loader.gif\" />');
            \$(element).fadeIn();
        };

        window.process_delete = function(element, id) {

            loading(element);

            \$.ajax({
                url: \"/backend/template/process/delete/\" + id,
                type: \"POST\",
                dataType: 'json',
                success : function(data) {
                    \$('#process_' + id).hide();
                }
            });
        };

        window.process_start =  function(element, id) {

            loading(element);

            \$.ajax({
                url: \"/backend/template/process/start/\" + id,
                type: \"POST\",
                dataType: \"json\",
                success : function(data) {
                    var tr = \$('#process_' + id);

                    tr.find('.loading')
                      .replaceWith('<button class=\"process_stop\" onclick=\"process_stop(this,'+ id +')\">Stop</button>')
                      .show();

                    tr.find('.process_status')
                      .text('Running')
                      .show();

                    tr.find('.process_delete')
                      .attr('disabled', 'disabled');

                }
            });
        };

        window.process_stop = function(element, id) {

            loading(element);

            \$.ajax({
                url: \"/backend/template/process/stop/\" + id,
                type: \"POST\",
                dataType: \"json\",
                success : function(data) {
                    var tr = \$('#process_' + id);

                    tr.find('.loading')
                      .replaceWith('<button onclick=\"process_start(this,'+ id +')\">Start</button>')
                      .show();

                    tr.find('.process_status')
                      .text('Stopped')
                      .show();

                    tr.find('.process_delete')
                      .removeAttr('disabled');
                }
            });
        };

        window.change_rule = function (element, id) {
            var mode = \$(element).find(\":selected\").attr('mode');
            var select = \$('#row_' + id).find('.process_mode');

            if (mode == 1) {
                select.attr('disabled', 'disabled');
                console.log('disable');
            } else {
                select.removeAttr('disabled');
                console.log('enable');
            }

            select.val(mode);

        };

        window.change_type = function (element, id) {

            var template = \$('#row_' + id).find('.process_template');
            var mode = \$(element).find(\":selected\").val();
            var template = \$('#row_' + id).find('.process_template');

            var sms = template.find('.sms').length;
            var email = template.find('.mail').length;

            template.find('option').hide().removeAttr('selected');
            var html = template.html();
            template.html(\"\");

            setTimeout(function() {
                template.html(html);

                if (mode == 1) {

                    if (email == 0) {
                        alert('Email template does not exist. Please create first !');
                        window.location.href = '/backend/template/list';
                        return;
                    }

                    template.find('.mail').show();
                    template.find('option.mail:first').attr('selected','selected');

                } else {

                    if (sms == 0) {
                        alert('SMS template does not exist. Please create first !');
                        window.location.href = '/backend/template/list';
                        return;
                    }

                    template.find('.sms').show();
                    template.find('option.sms:first').attr('selected','selected');
                }
            }, 100);
        };

        \$('#create-process').click(function() {
            \$('.process_table tbody').last().append(render(
                'new-process', {
                    'id' : ++number_process
                }
            ));

            setTimeout(function() {
        change_type(\$('#row_' + number_process).find('.process_type'), number_process);
            }, 100);
        });

    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:createProcess.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 141,  281 => 139,  277 => 138,  254 => 120,  197 => 90,  118 => 56,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 338,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 268,  394 => 267,  391 => 266,  377 => 261,  354 => 245,  345 => 241,  343 => 240,  310 => 210,  293 => 200,  284 => 140,  257 => 184,  205 => 165,  178 => 155,  462 => 274,  458 => 273,  454 => 272,  450 => 271,  446 => 270,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 213,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 120,  249 => 111,  232 => 177,  198 => 93,  174 => 84,  200 => 80,  186 => 70,  152 => 70,  110 => 50,  76 => 34,  260 => 128,  248 => 68,  245 => 67,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 124,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 58,  223 => 102,  219 => 128,  215 => 55,  211 => 98,  207 => 143,  195 => 50,  191 => 49,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 47,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 256,  358 => 171,  356 => 168,  350 => 180,  348 => 161,  317 => 82,  313 => 81,  301 => 145,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 182,  234 => 84,  216 => 78,  192 => 160,  188 => 159,  170 => 62,  63 => 18,  53 => 23,  58 => 19,  23 => 3,  34 => 8,  146 => 52,  148 => 131,  137 => 48,  127 => 30,  113 => 116,  102 => 111,  90 => 31,  81 => 32,  59 => 16,  255 => 122,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 100,  210 => 167,  206 => 96,  202 => 164,  190 => 106,  184 => 88,  172 => 91,  150 => 84,  77 => 31,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 60,  229 => 106,  224 => 172,  220 => 101,  214 => 99,  208 => 68,  169 => 76,  143 => 51,  140 => 129,  132 => 46,  128 => 66,  119 => 28,  107 => 113,  71 => 22,  177 => 64,  165 => 74,  160 => 61,  135 => 62,  126 => 71,  114 => 37,  84 => 17,  70 => 29,  67 => 24,  61 => 20,  94 => 42,  89 => 37,  85 => 36,  75 => 14,  68 => 21,  56 => 17,  201 => 94,  196 => 161,  183 => 157,  171 => 44,  166 => 71,  163 => 73,  158 => 67,  156 => 71,  151 => 39,  142 => 78,  138 => 43,  136 => 58,  121 => 122,  117 => 51,  105 => 62,  91 => 32,  62 => 22,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 38,  88 => 18,  78 => 32,  46 => 10,  44 => 9,  27 => 96,  79 => 34,  72 => 21,  69 => 22,  47 => 13,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 33,  131 => 60,  123 => 29,  120 => 42,  115 => 48,  111 => 47,  108 => 46,  101 => 41,  98 => 40,  96 => 43,  83 => 28,  74 => 24,  66 => 19,  55 => 15,  52 => 16,  50 => 14,  43 => 9,  41 => 18,  35 => 11,  32 => 4,  29 => 3,  209 => 97,  203 => 93,  199 => 91,  193 => 88,  189 => 86,  187 => 85,  182 => 66,  176 => 85,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 92,  147 => 53,  144 => 130,  141 => 50,  133 => 125,  130 => 44,  125 => 58,  122 => 57,  116 => 67,  112 => 66,  109 => 65,  106 => 48,  103 => 42,  99 => 38,  95 => 38,  92 => 33,  86 => 35,  82 => 29,  80 => 35,  73 => 31,  64 => 24,  60 => 20,  57 => 19,  54 => 18,  51 => 15,  48 => 7,  45 => 11,  42 => 10,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
