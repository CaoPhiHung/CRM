<?php

/* AevitasLevisBundle:Checkout:checkoutStepTwo.html.twig */
class __TwigTemplate_4eefd1ec78c07e14324b77a5e7205100 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'jslib' => array($this, 'block_jslib'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Checkout"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Check-out"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
<style type=\"text/css\">
</style>
<section id=\"form_reg\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\" style=\"background:url('";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                <ul class=\"steps\">
                    <li class=\"active step1\"><span><span><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("checkout_step_one");
        echo "\">1. ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Confirm your cart"), "html", null, true);
        echo "</a></span></span></li>
                    <li class=\"active step2\"><span><span><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("checkout_step_two");
        echo "\">2. ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Finish"), "html", null, true);
        echo "</a></span></span></li>
                </ul>
                <div class=\"info stepone\">
                    <span class=\"title\"><h3>2. ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Choose store to pick up"), "html", null, true);
        echo "</h3></span>
                    <div>
                        <p>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Choose the store to pickup reward"), "html", null, true);
        echo "</p>

                        <div class=\"row\">
                            <div class=\"form-row\">
                                <label for=\"reg_step_city\">City</label>
                                <div class=\"form-field\"><input type=\"text\" id=\"reg_step_city\" name=\"reg_step[city]\" /></div>
                            </div>
                            <div>
                                <label for=\"reg_step_district\">District</label>
                                <input type=\"text\" id=\"reg_step_district\" name=\"reg_step[district]\" />
                                <select id=\"district\" class=\"alldist\" placeholder=\"Choose District\"></select>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"form-row results\">

                            </div>
                        </div>
                        <form action=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("checkout_step_two");
        echo "\" method=\"POST\" class=\"formsubmit\">
                                        ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                                    </form>
                                    <span class=\"button\"><a class=\"yellow_button checkout\" href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("checkout_step_two");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Finish"), "html", null, true);
        echo "</a></span>
                                </div>
                            </div>
                        </div>
                        <iframe id=\"iframe-post-form\" name=\"iframe-post-form\" style=\"display:none\"></iframe>
                    </div>
                </div>
            </section>

            <!-- Modal -->
            <div id=\"end\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                    <h3 id=\"myModalLabel\">";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("All done"), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"modal-body\">
                    <p>";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("We have received your redemption order. Our staff will verify your order within 3-5 working days. You will be contacted soon to pickup at store."), "html", null, true);
        echo "
                </div>
                <div class=\"modal-footer\">
                    <button class=\"btn btn-primary\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
                </div>
            </div>
            <script type=\"text/template\" id=\"citydata\">
                <option>";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Choose City"), "html", null, true);
        echo "</option>
                ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cities"]) ? $context["cities"] : $this->getContext($context, "cities")));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 74
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "getMap"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "getName"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                </script>
                <script type=\"text/template\" id=\"districtdata\">
                    <option>--";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Choose District"), "html", null, true);
        echo "--</option>
                    ";
        // line 79
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["districts"]) ? $context["districts"] : $this->getContext($context, "districts")));
        foreach ($context['_seq'] as $context["_key"] => $context["district"]) {
            // line 80
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["district"]) ? $context["district"] : $this->getContext($context, "district")), "getId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["district"]) ? $context["district"] : $this->getContext($context, "district")), "getName"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['district'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                    </script>
";
    }

    // line 84
    public function block_jslib($context, array $blocks = array())
    {
        // line 85
        echo "                    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
    ";
        // line 86
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3a9519c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-transition_1.js");
            // line 97
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_jquery.uniform.min_2.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-modal_3.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-dropdown_4.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-carousel_5.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-grayscale_6.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_select2_7.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-holder_8.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_iframe_9.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "3a9519c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout.js");
            echo "                    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 99
        echo "        ";
    }

    // line 100
    public function block_javascript($context, array $blocks = array())
    {
        // line 101
        echo "                    var checkoutstatus = false;
                    \$(document).ready(function() {
                        \$('a.checkout').on('click', function(e) {
                            e.preventDefault();
                            \$form = \$('form.formsubmit')
                            if(checkoutstatus) return;
                            \$.ajax({
                                url: \$form.attr('action')+'.json',
                                dataType: 'json',
                                type: 'POST',
                                data: \$form.serialize(),
                                success: function(data){
                                    if(!data.status) {
                                        \$('#end p').html('<div class=\"alert alert-faded alert-error\">'+data.error+'</div>');
                                    }
                                    \$('#end').modal();
                                    setTimeout(function(){window.location = '";
        // line 117
        echo $this->env->getExtension('routing')->getPath("levis_user_dashboard");
        echo "'},6000)
                                }
                            })
                        });
                        var query = '";
        // line 121
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "', querystore = '";
        echo $this->env->getExtension('routing')->getPath("checkout_query_store");
        echo "';
                        \$('#reg_step_city').attr('type', 'hidden');
                        \$('#reg_step_district').attr('type', 'hidden');
                        \$('#reg_step_city').after('<select id=\"city\">' + \$('#citydata').html() + '</select>');
                        \$('#district').html(\$('#districtdata').html());
                        \$('select#city').select2();
                        \$('select#district').select2();
                        \$('select#district').on('change', function() {
                            dist = \$(this).val();
                            \$.ajax({
                                url: querystore + '/' + \$('select#city').val() + '/' + \$('select#district').val(),
                                dataType: 'json',
                                type: 'GET',
                                success: function(data) {
                                    \$('.results .alert').remove();
                                    if (data.length) {
                                        \$('.results').html('');
                                        \$.each(data, function(i, item) {
                                            \$('.results').append('<div class=\"row\"><input type=\"radio\" name=\"store\" value=\"' + item.id + '\"/>' + item.name + ' - ' + item.address + '</div>');
                                        })
                                        \$('.results input').uniform();
                                        \$('.results input').each(function() {
                                            \$(this).change(function() {
                                                \$('#form_store').val(\$('input[name=\"store\"]:checked').val());
                                            })
                                        });
                                        } else \$('.results').append('<div class=\"alert alert-faded alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button><span>";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("No store founded"), "html", null, true);
        echo "</span></div>');

                                }
                            })
                        });

                        function doSelectCity(obj, CallBack) {
                            city = \$('#reg_step_city').val();
                            \$('select#city').find(\"option[value=\" + city + \"]\").attr('selected', 'selected');
                            \$.ajax({
                                url: query + '/' + \$('#reg_step_city').val(),
                                dataType: 'json',
                                success: function(data) {
                                    \$('#city').select2(\"destroy\").select2();
                                    \$('#district').select2(\"destroy\");
                                    \$('#district').html(data.html).prepend('<option>--Choose District--</option>').select2();
                                    if (typeof(CallBack) != 'undefined') {
                                        window.setTimeout(function() {
                                            CallBack();
                                        }, 500);
                                    }
                                }
                            });
                        }
                        \$('select#city').on('change', function() {
                            city = \$(this).val();
                            \$('.title h3').addClass('loading');
                            \$('#reg_step_city').val(city);
                            \$.ajax({
                                url: query + '/' + \$(this).val() + '.json',
                                dataType: 'json',
                                success: function(data) {
                                    \$('.title h3').removeClass('loading');
                                    \$('#district').select2(\"destroy\");
                                    \$('#district').html(data.html).select2();
                                    \$('#reg_step_district').val(\$('#district option:first').val())
                                }
                            });
                        })
                    });
                    \$('.address input').uniform();
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Checkout:checkoutStepTwo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 108,  594 => 104,  589 => 102,  553 => 93,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 69,  426 => 58,  414 => 52,  403 => 48,  390 => 43,  217 => 286,  212 => 276,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 23,  327 => 143,  306 => 137,  290 => 5,  265 => 85,  250 => 338,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 257,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 203,  460 => 194,  410 => 176,  366 => 33,  261 => 113,  194 => 245,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 68,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 87,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 151,  311 => 14,  302 => 121,  242 => 117,  233 => 301,  406 => 122,  382 => 118,  370 => 160,  274 => 100,  238 => 309,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 16,  286 => 284,  266 => 363,  262 => 129,  256 => 104,  204 => 86,  161 => 199,  185 => 64,  134 => 158,  378 => 132,  340 => 147,  336 => 123,  330 => 143,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 69,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 18,  225 => 295,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 25,  335 => 21,  331 => 186,  297 => 94,  181 => 229,  332 => 20,  323 => 154,  319 => 153,  315 => 140,  308 => 13,  292 => 144,  288 => 4,  281 => 385,  277 => 101,  254 => 124,  197 => 246,  118 => 36,  100 => 29,  504 => 207,  500 => 341,  496 => 128,  492 => 76,  488 => 243,  484 => 202,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 6,  284 => 124,  257 => 84,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 192,  442 => 62,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 93,  280 => 137,  276 => 378,  249 => 83,  232 => 82,  198 => 84,  174 => 78,  200 => 69,  186 => 236,  152 => 188,  110 => 30,  76 => 31,  260 => 360,  248 => 333,  245 => 332,  240 => 323,  237 => 104,  228 => 101,  221 => 70,  213 => 94,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 147,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 8,  295 => 117,  291 => 126,  287 => 73,  279 => 71,  275 => 70,  271 => 371,  267 => 116,  251 => 190,  243 => 324,  239 => 187,  231 => 101,  227 => 298,  223 => 100,  219 => 96,  215 => 277,  211 => 77,  207 => 266,  195 => 50,  191 => 243,  179 => 221,  175 => 64,  167 => 57,  159 => 74,  155 => 73,  129 => 145,  124 => 129,  104 => 87,  563 => 210,  560 => 96,  556 => 205,  428 => 59,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 35,  369 => 256,  358 => 114,  356 => 157,  350 => 26,  348 => 161,  317 => 82,  313 => 15,  301 => 176,  296 => 127,  273 => 377,  270 => 99,  263 => 362,  259 => 192,  253 => 339,  234 => 78,  216 => 96,  192 => 88,  188 => 53,  170 => 76,  63 => 20,  53 => 17,  58 => 13,  23 => 3,  34 => 3,  146 => 178,  148 => 62,  137 => 48,  127 => 47,  113 => 37,  102 => 32,  90 => 27,  81 => 40,  59 => 13,  255 => 350,  244 => 84,  236 => 179,  230 => 300,  226 => 100,  222 => 294,  218 => 61,  210 => 267,  206 => 96,  202 => 263,  190 => 49,  184 => 230,  172 => 76,  150 => 56,  77 => 24,  97 => 31,  65 => 21,  480 => 162,  474 => 161,  469 => 71,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 61,  435 => 146,  430 => 187,  427 => 263,  423 => 57,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 126,  387 => 167,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 111,  362 => 186,  360 => 249,  355 => 27,  341 => 105,  337 => 22,  322 => 141,  314 => 99,  312 => 134,  309 => 137,  305 => 316,  298 => 97,  294 => 90,  285 => 3,  283 => 283,  278 => 384,  268 => 370,  264 => 84,  258 => 351,  252 => 121,  247 => 189,  241 => 82,  235 => 308,  229 => 218,  224 => 109,  220 => 287,  214 => 209,  208 => 97,  169 => 207,  143 => 38,  140 => 50,  132 => 46,  128 => 47,  119 => 114,  107 => 34,  71 => 12,  177 => 49,  165 => 65,  160 => 52,  135 => 62,  126 => 144,  114 => 108,  84 => 41,  70 => 17,  67 => 16,  61 => 10,  94 => 31,  89 => 47,  85 => 23,  75 => 19,  68 => 22,  56 => 12,  201 => 85,  196 => 89,  183 => 66,  171 => 213,  166 => 206,  163 => 73,  158 => 189,  156 => 192,  151 => 72,  142 => 53,  138 => 50,  136 => 165,  121 => 39,  117 => 49,  105 => 32,  91 => 56,  62 => 14,  49 => 10,  87 => 28,  21 => 2,  38 => 7,  28 => 3,  24 => 3,  25 => 3,  31 => 2,  26 => 2,  19 => 1,  93 => 28,  88 => 29,  78 => 46,  46 => 11,  44 => 6,  27 => 4,  79 => 32,  72 => 18,  69 => 22,  47 => 14,  40 => 5,  37 => 8,  22 => 2,  246 => 106,  157 => 57,  145 => 61,  139 => 166,  131 => 157,  123 => 36,  120 => 39,  115 => 34,  111 => 107,  108 => 46,  101 => 86,  98 => 31,  96 => 67,  83 => 27,  74 => 23,  66 => 12,  55 => 31,  52 => 15,  50 => 10,  43 => 6,  41 => 5,  35 => 8,  32 => 6,  29 => 3,  209 => 87,  203 => 74,  199 => 262,  193 => 82,  189 => 237,  187 => 199,  182 => 80,  176 => 220,  173 => 194,  168 => 82,  164 => 200,  162 => 71,  154 => 186,  149 => 179,  147 => 54,  144 => 173,  141 => 65,  133 => 44,  130 => 41,  125 => 47,  122 => 54,  116 => 113,  112 => 47,  109 => 102,  106 => 33,  103 => 37,  99 => 68,  95 => 30,  92 => 30,  86 => 46,  82 => 26,  80 => 15,  73 => 23,  64 => 3,  60 => 19,  57 => 29,  54 => 15,  51 => 7,  48 => 8,  45 => 6,  42 => 5,  39 => 5,  36 => 5,  33 => 3,  30 => 2,);
    }
}
