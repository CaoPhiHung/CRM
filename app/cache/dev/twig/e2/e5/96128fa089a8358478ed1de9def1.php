<?php

/* AevitasLevisBundle:Front:completeEnrollmentStep1.html.twig */
class __TwigTemplate_e2e596128fa089a8358478ed1de9def1 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Become A Member"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Step 2"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Become A Member"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<section id=\"form_reg\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\" style=\"background:url('";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                <ul class=\"steps\">
                    <li class=\"active step1\"><span><span>1. ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create Password"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"active step2\"><span><span>2. ";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Update Your Information"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"step4\"><span><span>3. ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opt In"), "html", null, true);
        echo "</span></span></li>
                </ul>
                <div class=\"info steptwo\">
                    <span class=\"title\"><h3>2. ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Fill Basic Information"), "html", null, true);
        echo "</h3></span>
                    <div>
                        <p><strong>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Current point"), "html", null, true);
        echo ":</strong><em class=\"points\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getPoint"), "html", null, true);
        echo "</em></p>
                        <p>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Here is your information which we might contact in this program."), "html", null, true);
        echo "</p>
                        ";
        // line 30
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getFbid") == null)) {
            // line 31
            echo "

                        <p>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("You can also integrate your facebook account"), "html", null, true);
            echo " <a href=\"#\" class=\"btn btn-primary fbbutton\" onclick=\"fbintegrate();\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Integrate your Facebook account"), "html", null, true);
            echo "</a></p>
                        <div id=\"ifb\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-header\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                                <h3 id=\"myModalLabel\">";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Integrate your Facebook Account"), "html", null, true);
            echo "</h3>
                            </div>
                            <div class=\"modal-body\">
                                <i>Loading...</i>
                                <div class=\"alert alert-faded alert-success hide\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    <span>";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Load your facebook account successfully"), "html", null, true);
            echo "</span>
                                </div>
                                <div class=\"alert alert-faded alert-error hide\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    <span>";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Can not load your facebook account"), "html", null, true);
            echo "</span>
                                </div>
                            </div>
                            <div class=\"modal-footer\">
                                <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
                            </div>
                        </div>
                        <script>
                            function fbintegrate() {
                                \$('#ifb').modal();
                                FB.login(function(response) {
                                    if (response.authResponse) {
                                        \$.ajax({
                                            url: '";
            // line 60
            echo $this->env->getExtension('routing')->getPath("registration_facebook_integrate");
            echo "',
                                            dataType: 'json',
                                            success: function(data) {
                                                if (data.status) {
                                                    \$('#ifb i').remove();
                                                    \$('#ifb .alert-success').removeClass('hide');
                                                    \$('.btn.btn-primary').removeClass('btn-primary').attr('onclick', '');
                                                }
                                                else {
                                                    \$('#ifb i').remove();
                                                    \$('#ifb .alert-success').removeClass('hide').find('span').text(data.error);
                                                }
                                            }
                                        })
                                    } else {
                                        // The person cancelled the login dialog
                                    }
                                }, {scope: 'email,user_birthday,user_location,publish_actions'});
                            }
                            </script>
                        ";
        }
        // line 81
        echo "                        ";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "AevitasLevisBundle::Front/form.html.twig"));
        // line 82
        echo "                            <form action=\"";
        echo $this->env->getExtension('routing')->getPath("levis_home_register_online_step2");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"formstep2\">
                                <div class=\"row\">";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "firstname"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrFirstname") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "lastname"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrlastname") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "
                                </div>
                                <div class=\"row\"><div class=\"form-row row\">";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dob"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrdob") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPremail") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "</div><div class=\"form-row row\">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cellphone"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrfone") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sex"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrsex") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "</div>
                                </div>
                                <div class=\"row\">";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "address1"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPraddress1") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "
                                    <div class=\"form-row row\">
                                    ";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "city"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrcity") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "<div>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "district"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrdistrict") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "<select id=\"district\" class=\"alldist\"></select></div>
                                        </div>
                                    </div>
                                    <div class=\"row\">";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mari"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrmari") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kids"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrkids") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "
                                    </div>
                                    <div class=\"row\">";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ocpu"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getProcpu") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inco"), 'row', array("help" => (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPrinco") . " ") . $this->env->getExtension('translator')->trans("points"))));
        echo "
                                    </div>
                                    ";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

                                </form>
                            <div class=\"row aniv tripledate\">
                                <span>";
        // line 100
        echo $this->env->getExtension('translator')->getTranslator()->trans("Do you want to gain triple bonus points? Just book %day% days that you will come and shopping with us!", array("%day%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getTrippleDateLimit")), "messages");
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(""), "html", null, true);
        echo "</span>
                                <div class=\"annies\">";
        // line 101
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Dashboard:renderTripleDates", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getId"))));
        echo "</div>
                            </div>
                        <div class=\"row aniv\">
                            <span>";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Anniversary Date (you can add up to 5 dates)"), "html", null, true);
        echo "<strong>(";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["pointrule"]) ? $context["pointrule"] : $this->getContext($context, "pointrule")), "getPranni") . " ") . $this->env->getExtension('translator')->trans("points")), "html", null, true);
        echo ")</strong></span><a href=\"";
        echo $this->env->getExtension('routing')->getPath("home_add_anniversary");
        echo "\" class=\"addmore\">+</a>
                                <div class=\"annies\">
                                ";
        // line 106
        echo (isset($context["anniversaries"]) ? $context["anniversaries"] : $this->getContext($context, "anniversaries"));
        echo "
                                </div>
                        </div>
                            <span class=\"expand\">
                                <strong>";
        // line 110
        echo "Fill up the survey below for 300 bonus points";
        echo "</strong><em>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("click here"), "html", null, true);
        echo "</em></span>
                            <div class=\"survey\">
                            <div>
                                <span>1. ";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("What are the top 3 websites that you visit the most?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                        ";
        // line 115
        $context["ans1"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns1");
        // line 116
        echo "                                    <form class=\"qform data1\" action=\"";
        echo $this->env->getExtension('routing')->getPath("home_answer_1");
        echo "\" method=\"GET\" data=\"";
        echo twig_escape_filter($this->env, (isset($context["ans1"]) ? $context["ans1"] : $this->getContext($context, "ans1")), "html", null, true);
        echo "\">
                                    <input class=\"ans1\" name=\"ans1[1]\" type=\"text\" />
                                    <input class=\"ans1\" name=\"ans1[2]\" type=\"text\" />
                                    <input class=\"ans1\" name=\"ans1[3]\" type=\"text\" />
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>2. ";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Please rank (1 to 5) the ways that you use most often to communicate with your loved ones?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                    ";
        // line 126
        $context["ans2"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns2");
        // line 127
        echo "                                    <form class=\"qform data2\" class=\"form1\" action=\"";
        echo $this->env->getExtension('routing')->getPath("home_answer_2");
        echo "\" method=\"GET\" data=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["ans2"]) ? $context["ans2"] : $this->getContext($context, "ans2"))), "html", null, true);
        echo "\">
                                        <div><label>1</label><input class=\"ans2\" name=\"ans2[1]\" type=\"text\" rel=\"1\"/></div>
                                        <div><label>2</label><input class=\"ans2\" name=\"ans2[2]\" type=\"text\" rel=\"2\"/></div>
                                        <div><label>3</label><input class=\"ans2\" name=\"ans2[3]\" type=\"text\" rel=\"3\"/></div>
                                        <div><label>4</label><input class=\"ans2\" name=\"ans2[4]\" type=\"text\" rel=\"4\"/></div>
                                        <div><label>5</label><input class=\"ans2\" name=\"ans2[5]\" type=\"text\" rel=\"5\"/></div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>3. ";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Tell us about your favorite brands?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                    ";
        // line 139
        $context["ans3"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns3");
        // line 140
        echo "                                        <form class=\"qform data3\" action=\"";
        echo $this->env->getExtension('routing')->getPath("home_answer_3");
        echo "\" method=\"GET\" data=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["ans3"]) ? $context["ans3"] : $this->getContext($context, "ans3"))), "html", null, true);
        echo "\">
                                    <div><label>";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Eyewear"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[eyewear]\" rel=\"eyewear\"/>
                                    </div>
                                    <div><label>";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Watch"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[watch]\" rel=\"watch\"/>
                                    </div>
                                    <div><label>";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Perfume"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[perfume]\" rel=\"perfume\"/>
                                    </div>
                                    <div><label>";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Comestic"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[comestic]\" rel=\"comestic\"/>
                                    </div>
                                    <div><label>";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shoes"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[shoes]\" rel=\"shoes\"/>
                                    </div>
                                    <div><label>";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Clothes"), "html", null, true);
        echo "</label><input class=\"ans3\" type=\"text\" name=\"ans3[clothes]\" rel=\"clothes\"/>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>4. ";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("How many jeans do you have?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                    <form class=\"qform\" action=\"";
        // line 159
        echo $this->env->getExtension('routing')->getPath("home_answer_4");
        echo "\" method=\"GET\">
                                    <input class=\"ans4\" type=\"text\" name=\"ans4\" placeholder=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select your answer"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns4"), "html", null, true);
        echo "\"/>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>5. ";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("How many jeans that did you purchase in the last 1 year?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                    <form class=\"qform\" action=\"";
        // line 167
        echo $this->env->getExtension('routing')->getPath("home_answer_5");
        echo "\" method=\"GET\">
                                    <input class=\"ans5\" type=\"text\" name=\"ans5\"  placeholder=\"";
        // line 168
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select your answer"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns5"), "html", null, true);
        echo "\"/>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>6. ";
        // line 173
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("What are your top 3 favorite jean’s brands?"), "html", null, true);
        echo "(40 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser\">
                                    ";
        // line 175
        $context["ans6"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns6");
        // line 176
        echo "                                    <form class=\"qform data6\" action=\"";
        echo $this->env->getExtension('routing')->getPath("home_answer_6");
        echo "\" method=\"GET\" data=\"";
        echo twig_escape_filter($this->env, (isset($context["ans6"]) ? $context["ans6"] : $this->getContext($context, "ans6")), "html", null, true);
        echo "\">
                                    <input class=\"ans6\" name=\"ans6[1]\" type=\"text\" />
                                    <input class=\"ans6\" name=\"ans6[2]\" type=\"text\" />
                                    <input class=\"ans6\" name=\"ans6[3]\" type=\"text\" />
                                    </form>
                                </div>
                            </div>
                            <div>
                                <span>7. ";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("What’s your favorite fit of jeans?"), "html", null, true);
        echo "(60 ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo ")</span>
                                <div class=\"anwser anwser7\">
                                    ";
        // line 186
        $context["ans7"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getAns7");
        // line 187
        echo "                                    ";
        $context["extract"] = twig_split_filter((isset($context["ans7"]) ? $context["ans7"] : $this->getContext($context, "ans7")), "|");
        // line 188
        echo "                                    <form class=\"qform data7\" action=\"";
        echo $this->env->getExtension('routing')->getPath("home_answer_7");
        echo "\" method=\"GET\" data=\"";
        echo twig_escape_filter($this->env, (isset($context["ans7"]) ? $context["ans7"] : $this->getContext($context, "ans7")), "html", null, true);
        echo "\">
                                    <table border=\"1\">
                                        <tbody>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image001.jpg"), "html", null, true);
        echo "\"/><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image003.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[1]\" class=\"ans7\" type=\"checkbox\" value=\"straight\" ";
        // line 193
        if (twig_in_filter("straight", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("STRAIGHT"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sits on/below waist, Straight through hip and thigh, Straight leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image005.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[2]\" class=\"ans7\" type=\"checkbox\" value=\"slim\" ";
        // line 198
        if (twig_in_filter("slim", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SLIM"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 199
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sits below waist, Slim through hip and thigh, Slim leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image007.jpg"), "html", null, true);
        echo "\"/><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image009.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[3]\" class=\"ans7\" type=\"checkbox\" value=\"skinny\" ";
        // line 203
        if (twig_in_filter("skinny", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SKINNY"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Skinny through hip and thigh, Skinny leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image011.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[4]\" class=\"ans7\" type=\"checkbox\" value=\"relaxed\" ";
        // line 208
        if (twig_in_filter("relaxed", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("RELAXED"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sits at waist, Relaxed through hip and thigh, Slightly tapered leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 212
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image013.jpg"), "html", null, true);
        echo "\"/><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image015.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[5]\" class=\"ans7\" type=\"checkbox\" value=\"bootcut\" ";
        // line 213
        if (twig_in_filter("bootcut", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("BOOT CUT"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sits at waist, Slim through hip and thigh, Boot cut leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image017.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[6]\" class=\"ans7\" type=\"checkbox\" value=\"tapper\" ";
        // line 218
        if (twig_in_filter("tapper", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("TAPPER"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Hangs on hip, Straight through hip and thigh, Tapered leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image019.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[7]\" class=\"ans7\" type=\"checkbox\" value=\"legging\" ";
        // line 223
        if (twig_in_filter("legging", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("LEGGING"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 224
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Stretchy, Very slim through the hip and thigh, Super skinny leg"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                            <tr>
                                                <td class=\"images\"><img src=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/survey/image021.jpg"), "html", null, true);
        echo "\"/></td>
                                                <td><input name=\"ans7[8]\" class=\"ans7\" type=\"checkbox\" value=\"boyfriend\" ";
        // line 228
        if (twig_in_filter("boyfriend", (isset($context["extract"]) ? $context["extract"] : $this->getContext($context, "extract")))) {
            echo "checked=\"checked\"";
        }
        echo "/><strong>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("BOYFRIEND"), "html", null, true);
        echo "</strong>
                                                <p>(";
        // line 229
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loose fit, Low rise, Cuffed hems"), "html", null, true);
        echo ")</p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                            </div>
                            </div>
                            
                            <div>
                                <input type=\"submit\" value=\"";
        // line 239
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step"), "html", null, true);
        echo "\" class=\"yellow_button\" />
                            </div>
                            </div>
                        </div>
                        <span class=\"points\"><em>+10</em></span>
                    </div>
                </div>
            </div>
        </section>
        <script type=\"text/template\" id=\"citydata\">
            <option value=\"\">";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("City/Province"), "html", null, true);
        echo "</option>
            ";
        // line 250
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cities"]) ? $context["cities"] : $this->getContext($context, "cities")));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 251
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "getMap"), "html", null, true);
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "getName"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["city"]) ? $context["city"] : $this->getContext($context, "city")), "getName"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        echo "            </script>
            <script type=\"text/template\" id=\"districtdata\">
            <option value=\"\">";
        // line 255
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("District"), "html", null, true);
        echo "</option>
                </script>
";
        // line 257
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasConfigBundle:Config:renderPointsConfig"));
        echo "
";
    }

    // line 259
    public function block_javascript($context, array $blocks = array())
    {
        // line 260
        echo "                    var query = '";
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "';
                    \$(document).ready(function() {
                        \$('form.triple input.unedit').attr('disabled', true);
                        \$('form.triple input.unedit1').datepicker({format: \"dd-mm-yyyy\"});
                        \$('form.triple input').on('changeDate',function(){
                            \$form = \$(this).parents('form');
                            \$.ajax({
                                url: \$form.attr('action'),
                                dataType: 'json',
                                type: 'POST',
                                data: \$form.serialize(),
                                success: function(data){
                                    \$form.find('input#form_id').val(data.id);
                                }
                            });
                        });
                        \$('#reg_step_cellphone').on('keypress',function(e){if((e.charCode > 47 && e.charCode < 58) || e.keyCode == 46 || e.keyCode == 8) return true; else return false;})
                        \$('.formstep2').change(function() {
                            \$form = \$(this);
                            \$('.title h3').addClass('loading');
                            \$.ajax({
                                url: \$form.attr('action') + '.json',
                                dataType: 'json',
                                data: \$form.serialize(),
                                type: 'POST',
                                success: function(data) {
                                    if (data.points) {
                                        cPoint = parseInt(\$('em.points').text()) + data.points;
                                        \$('em.points').text(cPoint).animate({fontSize: 28}, 200, function(){\$(this).animate({fontSize:18})});
                                    }
                                    \$('.title h3').removeClass('loading');
                                }
                            });
                        });
                        \$('#reg_step_city').attr('type', 'hidden');
                        \$('#reg_step_district').attr('type', 'hidden');
                        \$('select#reg_step_sex').select2({showSearchInput: false,placeholder: 'Sex'});
                        \$('#reg_step_city').after('<select id=\"city\">' + \$('#citydata').html() + '</select>');
                        \$('#district').html(\$('#districtdata').html());
                        \$('select#city').select2({placeholder: '";
        // line 299
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("City/Province"), "html", null, true);
        echo "'});
                        \$('select#district').select2({placeholder: '";
        // line 300
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("District"), "html", null, true);
        echo "'});
                        \$('select#district').on('change', function() {
                            \$('#reg_step_district').val(\$('#district option:selected').text())
                        });
                        \$('#reg_step_mari').select2();
                        \$('#reg_step_kids').select2();
                        \$('#reg_step_ocpu').select2();
                        \$('#reg_step_inco').select2();
                        function doSelectCity(obj, CallBack) {
                            city = \$('#reg_step_city').val();
                            \$('select#city').find(\"option[value=\" + city + \"]\").attr('selected', 'selected');
                            \$.ajax({
                                url: '";
        // line 312
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "/' + \$('#reg_step_city').val(),
                                dataType: 'json',
                                success: function(data) {
                                    \$('#city').select2(\"destroy\").select2();
                                    \$('#district').select2(\"destroy\");
                                    \$('#district').html(data.html).select2();
                                    if (typeof(CallBack) != 'undefined') {
                                        window.setTimeout(function() {
                                            CallBack();
                                        }, 500);
                                    }
                                }
                            });
                        }


                        if (\$('select#city').val() != 0) {
                            doSelectCity(document.getElementById('city'), function() {
                                var val = parseInt(\$('#reg_step_district').val());
                                \$(\"#district\").select2(\"val\", val);
                            });
                        }
                        \$('select#city').on('change', function() {
                            city = \$(this).val();
                            \$('.title h3').addClass('loading');
                            \$('#reg_step_city').val(\$('#city option:selected').text());;
                            \$.ajax({
                                url: query + '/' + \$(this).val(),
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
    \$('.expand em').click(function(){if(\$('.survey').hasClass('open')) \$('.survey').removeClass('open').slideUp(); else {\$('.survey').addClass('open').slideDown()}})
    \$('form.qform').change(function(){
        that = this;
        \$.ajax({
            url: \$(this).attr('action'),
            dataType: 'json',
            data: \$(this).serialize(),
            success: function(data){
                    if(data.points){
                    cPoint = parseInt(\$('em.points').text()) + data.points;
                    \$('em.points').text(cPoint).animate({fontSize: 28}, 200, function(){\$(this).animate({fontSize:18})});
                    }
                    \$(that).tooltip({title: data.message});setTimeout(function(){\$(that).tooltip('destroy')},8000)}
        })
    });
    //initialize data form 1
    dF1 = \$('form.data1').attr('data').split('|');
    \$('form.data1 input').each(function(i, e){
        \$(e).val(dF1[i]);
    })
    //initialize data form 6
    dF6 = \$('form.data6').attr('data').split('|');
    \$('form.data6 input').each(function(i, e){
        \$(e).val(dF6[i]);
    })
    if(\$('form.data3').attr('data').length > 2) {
        dF3 = JSON.parse(\$('form.data3').attr('data'));
        \$('input.ans3').each(function(){
            \$(this).val(dF3[\$(this).attr('rel')])
        });
    }
    if(\$('form.data2').attr('data').length > 2) {
        dF2 = JSON.parse(\$('form.data2').attr('data'));
        \$('input.ans2').each(function(){
            \$(this).val(dF2[\$(this).attr('rel')])
        });
    }
    ans2 = [{id: '";
        // line 387
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Phone Call"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Phone Call"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SMS"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("SMS"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Facebook"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Facebook"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Face to face"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Face to face"), "html", null, true);
        echo "'}];
    \$('input.ans2').select2({
        placeholder: '";
        // line 389
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Select option"), "html", null, true);
        echo "',
        allowClear: true,
        data: ans2
    })
    ans4 = [{id: '1', text: '1'},{id: '2', text: '2'},{id: '3', text: '3'},{id: '4', text: '4'},{id: '5', text: '5'},{id: 'Other', text: 'Other'}]
    \$('input.ans4').select2({
        allowClear: true,
        data: ans4
    });
    \$('input.ans5').select2({
        allowClear: true,
        data: ans4
    });
    
    \$('input.ans5').on('change',function(e){
        if(e.val == '";
        // line 404
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Other"), "html", null, true);
        echo "') {\$('input.ans5').removeClass('select2-offscreen').val('').attr('placeholder', '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Type your own"), "html", null, true);
        echo "');\$('input.ans5').prev().hide()}
    })
    \$('input.ans4').on('change',function(e){
        if(e.val == '";
        // line 407
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Other"), "html", null, true);
        echo "') {\$('input.ans4').removeClass('select2-offscreen').val('').attr('placeholder', '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Type your own"), "html", null, true);
        echo "');\$('input.ans4').prev().hide()}
    })
    \$('input.ans7').uniform();
    function initAnniversary(el){
        status = parseInt(\$('#reg_step_mari').val());
        if(status > 1) var elDate = customDate = [{id: '";
        // line 412
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "'},{id: \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\"}];
        else var elDate = customDate = [{id: '";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "'},{id: \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary"), "html", null, true);
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\"}];
        if(\$(el).val() != \"\" && \$(el).val() != '";
        // line 414
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "' && \$(el).val() != \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary"), "html", null, true);
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\" && \$(el).val() != '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "' && \$(el).val() != '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "'  && \$(el).val() !=  \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\"){
            elDate.push({id: \$(el).val(), text: \$(el).val()});
        }
        elDate.push({id: '";
        // line 417
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Date"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Anniversary date"), "html", null, true);
        echo "'});
        \$(el).select2({
            placeholder: \"Select report type\",
            allowClear: true,
            data: elDate
            });

        \$(el).on('change',function(e){
        if(e.val == '";
        // line 425
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Date"), "html", null, true);
        echo "') {\$(el).removeClass('select2-offscreen');\$(el).prev().hide()}
        })
        delete elDate;
    }
    \$('form.reg_step').change(function(){
        url = \$(this).attr('action');
        \$form = \$(this);
        \$('.title h3').addClass('loading');
        \$.ajax({
            url: url+'.json',
            type:'POST',
            data: \$form.serialize(),
            dataType: 'json',
            success: function(data){
                \$('.title h3').removeClass('loading');
                if(data.points) {
                    cPoint = parseInt(\$('em.points').text()) + data.points;
                    \$('em.points').text(cPoint).animate({fontSize: 28}, 200, function(){\$(this).animate({fontSize:18})});
                }
            }
        });
    });
    \$('.annies form input.datetime').datepicker({format: \"dd-mm-yyyy\",onSelect: function(){console.log('changing')}})
    \$('.aniv a.addmore').on('click', function(e){
        e.preventDefault();
        url = \$(this).attr('href');
        \$.ajax({
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.status) \$('.annies:last').append(data.html);
                else alert(data.html);
                \$('.annies form:last input.datetime').datepicker({format: \"dd-mm-yyyy\"})
                el = \$('.annies form:last input.anniname');
                initAnniversary(el);
            }
        });
    });
    \$.each(\$('.annies form input.anniname'), function(i, el){
    initAnniversary(el);
    });
    \$('.annies form input.datetime').on('changeDate',function(){
        \$form = \$(this).parents('form');
        \$('.title h3').addClass('loading');
        \$.ajax({
            url: \$form.attr('action'),
            dataType: 'json',
            data: \$form.serialize(),
            type: 'POST',
            success: function(data){
                \$('.title h3').removeClass('loading');
                if(data.points) {
                    cPoint = parseInt(\$('em.points').text()) + data.points;
                    \$('em.points').text(cPoint).animate({fontSize: 28}, 200, function(){\$(this).animate({fontSize:18})});
                }
            }
        })
    });
    \$('.annies').delegate('form', 'change', function(){
        \$form = \$(this);
        \$('.title h3').addClass('loading');
        \$.ajax({
            url: \$form.attr('action'),
            dataType: 'json',
            data: \$form.serialize(),
            type: 'POST',
            success: function(data){
                \$('.title h3').removeClass('loading');
                if(data.id) \$form.find('#anni_id').val(data.id);
                if(data.points) {
                    cPoint = parseInt(\$('em.points').text()) + data.points;
                    \$('em.points').text(cPoint).animate({fontSize: 28}, 200, function(){\$(this).animate({fontSize:18})});
                }
            }
        })
    });
    \$('.yellow_button').click(function(){\$('form.formstep2').submit()});
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:completeEnrollmentStep1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  923 => 425,  910 => 417,  890 => 414,  872 => 413,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 312,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 255,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 224,  554 => 219,  546 => 218,  542 => 217,  522 => 212,  516 => 209,  508 => 208,  490 => 203,  460 => 194,  410 => 176,  366 => 159,  261 => 113,  194 => 87,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 137,  515 => 135,  511 => 134,  491 => 126,  487 => 125,  483 => 124,  478 => 199,  465 => 118,  456 => 115,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 315,  654 => 310,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 259,  558 => 147,  536 => 214,  528 => 213,  520 => 252,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 242,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 176,  311 => 155,  302 => 151,  242 => 117,  233 => 219,  406 => 122,  382 => 118,  370 => 160,  274 => 93,  238 => 83,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 175,  405 => 110,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 139,  286 => 284,  266 => 108,  262 => 129,  256 => 104,  204 => 207,  161 => 43,  185 => 85,  134 => 51,  378 => 132,  340 => 147,  336 => 123,  330 => 143,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 71,  339 => 123,  153 => 69,  506 => 132,  455 => 278,  449 => 235,  434 => 264,  385 => 218,  376 => 27,  372 => 226,  334 => 18,  225 => 217,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 273,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 136,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 187,  411 => 226,  380 => 165,  367 => 202,  344 => 108,  338 => 25,  335 => 145,  331 => 186,  297 => 175,  181 => 65,  332 => 106,  323 => 154,  319 => 153,  315 => 8,  308 => 133,  292 => 144,  288 => 121,  281 => 282,  277 => 138,  254 => 124,  197 => 90,  118 => 32,  100 => 44,  504 => 207,  500 => 341,  496 => 128,  492 => 339,  488 => 243,  484 => 202,  479 => 335,  475 => 334,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 212,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 127,  284 => 124,  257 => 184,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 192,  442 => 269,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 129,  280 => 137,  276 => 113,  249 => 111,  232 => 82,  198 => 204,  174 => 73,  200 => 69,  186 => 48,  152 => 188,  110 => 30,  76 => 23,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 104,  228 => 106,  221 => 62,  213 => 94,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 130,  295 => 75,  291 => 126,  287 => 73,  279 => 71,  275 => 70,  271 => 133,  267 => 189,  251 => 190,  243 => 246,  239 => 187,  231 => 101,  227 => 93,  223 => 85,  219 => 96,  215 => 60,  211 => 77,  207 => 92,  195 => 50,  191 => 200,  179 => 83,  175 => 64,  167 => 68,  159 => 72,  155 => 60,  129 => 46,  124 => 50,  104 => 32,  563 => 210,  560 => 222,  556 => 205,  428 => 186,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 80,  397 => 203,  392 => 209,  389 => 200,  371 => 190,  369 => 256,  358 => 114,  356 => 193,  350 => 151,  348 => 161,  317 => 82,  313 => 102,  301 => 176,  296 => 127,  273 => 112,  270 => 116,  263 => 188,  259 => 192,  253 => 110,  234 => 90,  216 => 79,  192 => 88,  188 => 53,  170 => 125,  63 => 19,  53 => 17,  58 => 19,  23 => 3,  34 => 3,  146 => 185,  148 => 54,  137 => 48,  127 => 42,  113 => 35,  102 => 61,  90 => 31,  81 => 38,  59 => 33,  255 => 89,  244 => 84,  236 => 179,  230 => 176,  226 => 100,  222 => 95,  218 => 61,  210 => 208,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 76,  150 => 56,  77 => 30,  97 => 30,  65 => 21,  480 => 162,  474 => 161,  469 => 120,  461 => 117,  457 => 237,  453 => 236,  444 => 177,  440 => 105,  437 => 232,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 167,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 186,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 137,  305 => 316,  298 => 97,  294 => 90,  285 => 118,  283 => 283,  278 => 150,  268 => 115,  264 => 84,  258 => 90,  252 => 121,  247 => 189,  241 => 224,  235 => 103,  229 => 218,  224 => 109,  220 => 80,  214 => 209,  208 => 72,  169 => 82,  143 => 38,  140 => 50,  132 => 37,  128 => 47,  119 => 49,  107 => 34,  71 => 22,  177 => 49,  165 => 42,  160 => 52,  135 => 37,  126 => 34,  114 => 67,  84 => 49,  70 => 23,  67 => 21,  61 => 30,  94 => 31,  89 => 34,  85 => 27,  75 => 23,  68 => 21,  56 => 14,  201 => 86,  196 => 62,  183 => 198,  171 => 82,  166 => 73,  163 => 73,  158 => 189,  156 => 56,  151 => 56,  142 => 53,  138 => 52,  136 => 41,  121 => 43,  117 => 36,  105 => 33,  91 => 27,  62 => 16,  49 => 13,  87 => 28,  21 => 1,  38 => 7,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 29,  88 => 50,  78 => 46,  46 => 9,  44 => 13,  27 => 2,  79 => 24,  72 => 22,  69 => 25,  47 => 14,  40 => 9,  37 => 5,  22 => 1,  246 => 106,  157 => 57,  145 => 41,  139 => 61,  131 => 49,  123 => 49,  120 => 43,  115 => 48,  111 => 48,  108 => 64,  101 => 42,  98 => 31,  96 => 31,  83 => 25,  74 => 24,  66 => 21,  55 => 31,  52 => 15,  50 => 13,  43 => 8,  41 => 7,  35 => 8,  32 => 6,  29 => 3,  209 => 87,  203 => 74,  199 => 89,  193 => 80,  189 => 83,  187 => 199,  182 => 78,  176 => 80,  173 => 194,  168 => 81,  164 => 190,  162 => 71,  154 => 68,  149 => 66,  147 => 54,  144 => 60,  141 => 43,  133 => 54,  130 => 57,  125 => 38,  122 => 54,  116 => 157,  112 => 37,  109 => 34,  106 => 33,  103 => 33,  99 => 31,  95 => 41,  92 => 30,  86 => 28,  82 => 26,  80 => 31,  73 => 24,  64 => 21,  60 => 19,  57 => 29,  54 => 15,  51 => 10,  48 => 11,  45 => 6,  42 => 5,  39 => 5,  36 => 5,  33 => 3,  30 => 2,);
    }
}
