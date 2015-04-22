<?php

/* AevitasLevisBundle:Backend:userSearch.html.twig */
class __TwigTemplate_4cb897f6981865071487259f9ff00c5d extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo $this->env->getExtension('routing')->getPath("backend_user_advancedseeking");
        echo "\" method=\"GET\" id=\"advancesearchuser\" class=\"clearfix\">
    
    <div class=\"section_left\">
        <div class=\"row-input\">
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_level"]) ? $context["form_level"] : $this->getContext($context, "form_level")), 'rest');
        echo "
            <div>
                <label for=\"form_CCode\">C code</label><input type=\"text\" id=\"form_CCode\" name=\"form[CCode]\" value=\"";
        // line 21
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "CCode", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "CCode"), "html", null, true);
        }
        echo "\">
            </div>
            <div>
                <label for=\"form_name\">Name</label><input type=\"text\" id=\"form_name\" name=\"form[name]\" value=\"";
        // line 24
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "name", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "name"), "html", null, true);
        }
        echo "\">
            </div>
        </div>
        <div class=\"row-input\">
            <div>
                <div style=\"width:60%; float:left;\">
                    <label for=\"form_cellphone\">Cellphone</label>
                </div>
                <!--<div style=\"width:25%; float:left\">
                    <input type=\"checkbox\" name=\"form[empty_cellphone]\" id=\"empty_cellphone\" style=\"float:left; width:20%\" /><label for=\"empty_cellphone\">Empty</label>
                </div>-->
                <input type=\"text\" id=\"form_cellphone\" name=\"form[cellphone]\" value=\"";
        // line 35
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cellphone", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "cellphone"), "html", null, true);
        }
        echo "\">
            </div>
            <div>
                <div style=\"width:60%; float:left;\">
                    <label for=\"form_email\">Email</label>
                </div>
                <div style=\"width:25%; float:left\">
                    <input type=\"checkbox\" name=\"form[empty_email]\" id=\"empty_email\" style=\"float:left; width:20%\" /><label for=\"empty_email\">Empty</label>
                </div>
                <input type=\"text\" id=\"form_email\" name=\"form[email]\" value=\"";
        // line 44
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "email", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "email"), "html", null, true);
        }
        echo "\">
            </div>
            <div class=\"date_picker\">
                <label for=\"not_active_day\">Not Active from day</label>
                <input type=\"text\" id=\"not_active_day\" name=\"form[not_active_day]\" style=\"width:65%;\" value=\"";
        // line 48
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "not_active_day", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "not_active_day"), "html", null, true);
        }
        echo "\">
            </div>        
        </div>

        <div class=\"row-input\">
            <div>
                <label for=\"form_fcardno\">From Card No</label><input type=\"text\" id=\"form_fcardno\" name=\"form[fcardno]\" value=\"";
        // line 54
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fcardno", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fcardno"), "html", null, true);
        }
        echo "\">
            </div>
            <div>
                <label for=\"form_tcardno\">To Card No</label><input type=\"text\" id=\"form_tcardno\" name=\"form[tcardno]\" value=\"";
        // line 57
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tcardno", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tcardno"), "html", null, true);
        }
        echo "\">
            </div>
            <div class=\"date_picker\">
                <label for=\"bday_month\">Bday Month</label>
                <input type=\"text\" id=\"bday_month\" name=\"form[bday_month]\" style=\"width:65%;\" value=\"";
        // line 61
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "bday_month", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "bday_month"), "html", null, true);
        }
        echo "\">
            </div> 
        </div>
        
        <div class=\"row-input\">
            ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_gender"]) ? $context["form_gender"] : $this->getContext($context, "form_gender")), 'rest');
        echo "
            <div>
                <label for=\"form_city\">City</label><input type=\"text\" id=\"form_city\" name=\"form[city]\" value=\"";
        // line 68
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "city", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "city"), "html", null, true);
        }
        echo "\">
            </div>
            <div>
                <label for=\"form_district\">District</label><input type=\"text\" id=\"form_district\" name=\"form[district]\" value=\"";
        // line 71
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "district", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "district"), "html", null, true);
        }
        echo "\">
            </div>
        </div>

        <div class=\"row-input\">
            ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_marital"]) ? $context["form_marital"] : $this->getContext($context, "form_marital")), 'rest');
        echo "
            <div class=\"date_picker\">
                <label for=\"triple_point_dates\">Triple point dates</label>
                <input type=\"text\" id=\"triple_point_dates\" name=\"form[triple_point_dates]\" style=\"width:65%;\" value=\"";
        // line 79
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "triple_point_dates", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "triple_point_dates"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"padding-top:28px;\">
                <input type=\"checkbox\" name=\"form[enrolment]\" id=\"enrolment\" style=\"float:left; margin-right:10px;\">
                <label for=\"enrolment\">completed online enrolment</label>
            </div>
        </div>

        <div class=\"row-input\">
            ";
        // line 88
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_status"]) ? $context["form_status"] : $this->getContext($context, "form_status")), 'rest');
        echo "        
            <div>
                <label for=\"form_registration_store\">Registration Store</label><input type=\"text\" id=\"form_registration_store\" name=\"form[registration_store]\" value=\"";
        // line 90
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "registration_store", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "registration_store"), "html", null, true);
        }
        echo "\">
            </div>
        </div>
    </div>
    <div class=\"section_right\">
        <input type=\"submit\" class=\"btn btn-action\" value=\"Search\"/>
        <input type=\"button\" class=\"btn btn-action\" value=\"Resend RegCode\"/>
        <input type=\"button\" class=\"btn btn-action\" value=\"Downgrade\"/>
    </div>
    <div class=\"line_section\"></div>

    <div class=\"row-input\">
        ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_bill"]) ? $context["form_bill"] : $this->getContext($context, "form_bill")), 'rest');
        echo "
        <div style=\"width:60%;\">
            <div style=\"float:left;width:100%;\">
                <input type=\"checkbox\" name=\"form[lifetime]\" id=\"lifetime\" style=\"float:left; margin-right:5px;\" /><label for=\"lifetime\">Life Time</label>
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_fbill\" style=\"float:left;width:30%;\">From</label>
                <input type=\"text\" id=\"form_fbill\" name=\"form[fbill]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 109
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fbill", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fbill"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_tbill\" style=\"float:left;width:30%;\">To</label>
                <input type=\"text\" id=\"form_tbill\" name=\"form[tbill]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 113
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tbill", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tbill"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:50%;\">
                <label for=\"form_lastdays\" style=\"float:left;width:35%;\">Within the last</label>
                <input type=\"text\" id=\"form_lastdays\" name=\"form[lastdays]\" placeholder=\"number of\" style=\"float:left;width:25%\" value=\"";
        // line 117
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lastdays", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lastdays"), "html", null, true);
        }
        echo "\">
                <label for=\"form_lastdays\" style=\"float:left;width:20%;margin-left:5px;\">days</label>
            </div>

        </div>    
    </div>
    <div class=\"row-input\">
        ";
        // line 124
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_tier"]) ? $context["form_tier"] : $this->getContext($context, "form_tier")), 'rest');
        echo "
        <div style=\"width:60%;margin-top:20px;\">
            
            <div style=\"float:left;width:25%;\">
                <label for=\"form_ftier\" style=\"float:left;width:30%;\">From</label>
                ";
        // line 130
        echo "                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_from_tier"]) ? $context["form_from_tier"] : $this->getContext($context, "form_from_tier")), 'rest');
        echo "
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_ttier\" style=\"float:left;width:30%;\">To</label>
                ";
        // line 135
        echo "                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_to_tier"]) ? $context["form_to_tier"] : $this->getContext($context, "form_to_tier")), 'rest');
        echo "
            </div>
            <div style=\"float:left;width:50%;\">
                <label for=\"form_tier_lastdays\" style=\"float:left;width:35%;\">Within the last</label>
                <input type=\"text\" id=\"form_tier_lastdays\" name=\"form[tier_lastdays]\" placeholder=\"number of\" style=\"float:left;width:25%\" value=\"";
        // line 139
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tier_lastdays", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tier_lastdays"), "html", null, true);
        }
        echo "\">
                <label for=\"form_tier_lastdays\" style=\"float:left;width:20%;margin-left:5px;\">days</label>
            </div>

        </div>    
    </div>
    <div class=\"row-input\">
        ";
        // line 146
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_point"]) ? $context["form_point"] : $this->getContext($context, "form_point")), 'rest');
        echo "
        <div style=\"width:60%;\">
            <div style=\"float:left;width:100%;\">
                <input type=\"checkbox\" name=\"form[p_lifetime]\" id=\"p_lifetime\" style=\"float:left; margin-right:5px;\" /><label for=\"p_lifetime\">Life Time</label>
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_fpoint\" style=\"float:left;width:30%;\">From</label>
                <input type=\"text\" id=\"form_fpoint\" name=\"form[fpoint]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 153
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_tpoint\" style=\"float:left;width:30%;\">To</label>
                <input type=\"text\" id=\"form_tpoint\" name=\"form[tpoint]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 157
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:50%;\">
                <label for=\"form_p_lastdays\" style=\"float:left;width:35%;\">Within the last</label>
                <input type=\"text\" id=\"form_p_lastdays\" name=\"form[p_lastdays]\" placeholder=\"number of\" style=\"float:left;width:25%\" value=\"";
        // line 161
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "p_lastdays", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "p_lastdays"), "html", null, true);
        }
        echo "\">
                <label for=\"form_p_lastdays\" style=\"float:left;width:20%;margin-left:5px;\">days</label>
            </div>

        </div>    
    </div>

    <div class=\"row-input\">
        <div style=\"float:left;width:100%;\">
            <label>Joining Date</label>
        </div>
        <div class=\"date_picker\">
            <label for=\"fjoiningdate\" style=\"float:left;width:15%;padding-top:3px;\">From</label>
            <input type=\"text\" id=\"fjoiningdate\" name=\"form[fjoiningdate]\" style=\"width:61%\" value=\"";
        // line 174
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fjoiningdate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fjoiningdate"), "html", null, true);
        }
        echo "\">
        </div>
        <div class=\"date_picker\">
            <label for=\"tjoiningdate\" style=\"float:left;width:15%;padding-top:3px;\">To</label>
            <input type=\"text\" id=\"tjoiningdate\" name=\"form[tjoiningdate]\" style=\"width:60%\" value=\"";
        // line 178
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tjoiningdate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tjoiningdate"), "html", null, true);
        }
        echo "\">
        </div>        
    </div>

    <div class=\"row-input\">
        <div style=\"float:left;width:100%;\">
            <label>Bonus Point is expired on the date</label>
        </div>
        <div class=\"date_picker\">
            <label for=\"fexpireddate\" style=\"float:left;width:15%;padding-top:3px;\">From</label>
            <input type=\"text\" id=\"fexpireddate\" name=\"form[fexpireddate]\" style=\"width:61%\" value=\"";
        // line 188
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fexpireddate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fexpireddate"), "html", null, true);
        }
        echo "\">
        </div>
        <div class=\"date_picker\">
            <label for=\"texpireddate\" style=\"float:left;width:15%;padding-top:3px;\">To</label>
            <input type=\"text\" id=\"texpireddate\" name=\"form[texpireddate]\" style=\"width:60%\" value=\"";
        // line 192
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "texpireddate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "texpireddate"), "html", null, true);
        }
        echo "\">
        </div>        
    </div>

    <div class=\"line_section\"></div>

    <div class=\"row-input\">
        ";
        // line 199
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_bonuspoint"]) ? $context["form_bonuspoint"] : $this->getContext($context, "form_bonuspoint")), 'rest');
        echo "
        <div style=\"float:left;width:60%;margin-top:26px;\">
            <div style=\"float:left;width:35%;margin-right:20px;\">
                <input type=\"text\" id=\"form_amountpoint\" name=\"form[amountpoint]\" placeholder=\"Amount of points\" style=\"width:90%;\" value=\"";
        // line 202
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "amountpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amountpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div class=\"date_picker\" style=\"float:left;width:40%;margin-right:20px;\">
                <input type=\"text\" id=\"expired_date\" name=\"form[expired_date]\" placeholder=\"Expired Date\" style=\"width:75%;\"  value=\"";
        // line 205
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "expired_date", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "expired_date"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:15%;\">
                <input type=\"button\" class=\"btn btn-action\" value=\"Add points\" style=\"width:135px;\"/>
            </div>
        </div>
    </div>

    <div class=\"line_section\"></div>

    <!--<div class=\"row-input\">
        <div>
            <label for=\"form_spoint\">from point</label><input type=\"text\" id=\"form_spoint\" name=\"form[spoint]\">
        </div>
        <div>
            <label for=\"form_fpoint\">to point</label><input type=\"text\" id=\"form_fpoint\" name=\"form[fpoint]\">
        </div>
    </div>-->

    <input type=\"hidden\" id=\"form__token\" name=\"form[_token]\" value=\"\">

    <!--<input type=\"submit\" class=\"btn btn-action\" value=\"Search\"/>-->
</form>
<table class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" id=\"table-list-store\" aria-describedby=\"DataTables_Table_0_info\">
    <thead>
        <tr role=\"row\">
            <th><input type=\"checkbox\" id=\"checkall\" name=\"toggle\" value=\"\" ></th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Firstname"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lastname"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Point"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("C.Code"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 237
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Level"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 238
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 239
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
        ";
        // line 243
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
            // line 244
            echo "        <tr class=\"";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
            echo " gradeA remove_item_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\">
            <td><input type=\"checkbox\" class=\"check-row\" id=\"cb";
            // line 245
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" name=\"cid[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" ></td>
            <td>";
            // line 246
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getFirstname"), "html", null, true);
            echo "</td>
            <td>";
            // line 247
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLastname"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 248
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getEmail"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 249
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getPoint"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 250
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCCode"), "html", null, true);
            echo "</td>
            <td>";
            // line 251
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLevel"), "html", null, true);
            echo "</td>
            <td>Enabled</td>
            <td class=\"center item-price\" colspan=\"2\">
                <a rel=\"";
            // line 254
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_report_userstatement", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\" title=\"download user statement\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Download"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 255
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_user", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 256
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
        // line 260
        echo "    </tbody></table>
    ";
        // line 261
        echo (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"));
        echo "
<input type=\"hidden\" name=\"boxchecked\" value=\"\">

<a href=\"";
        // line 264
        echo twig_escape_filter($this->env, (isset($context["exporturl"]) ? $context["exporturl"] : $this->getContext($context, "exporturl")), "html", null, true);
        echo "\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "</a>

<form action=\"";
        // line 266
        echo $this->env->getExtension('routing')->getPath("user_import");
        echo "\"  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'enctype');
;
        echo " method=\"POST\">
        ";
        // line 267
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'rest');
        echo "
    <button class=\"btn btn-primary\">Import</button>
</form>
<div id=\"open-form-delete\" style=\"display: none;\" title=\"!Important\">
    Are you sure want to delete this item ?
</div>
";
    }

    // line 275
    public function block_javascript($context, array $blocks = array())
    {
        // line 276
        echo "<script>
    var backend_item_delete = '";
        // line 277
        echo $this->env->getExtension('routing')->getPath("backend_item_delete");
        echo "';
    jQuery(function() {
        jQuery( \"#not_active_day\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 282
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#bday_month\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 287
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#triple_point_dates\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 292
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#fjoiningdate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 297
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#tjoiningdate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 302
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#fexpireddate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 307
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#texpireddate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 312
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#expired_date\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 317
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
                
        jQuery(\"#form_from_tier\").css('width','50%');
        jQuery(\"#form_to_tier\").css('width','50%');

        jQuery(\"#table-list-store_wrapper .row-fluid>div:first-child\").attr('class','span5');
        jQuery(\"#table-list-store_wrapper .row-fluid>div:nth-child(2)\").attr('class','span7');

        jQuery(\"#table-list-store_filter label\").append('<input type=\"button\" id=\"btn_enabled\" name=\"btn_enabled\" value=\"Enabled All\" class=\"button-status\" /> <input type=\"button\" id=\"btn_disabled\" name=\"btn_disabled\" value=\"Disabled All\" class=\"button-status\" />');
        
        jQuery(\"#checkall\").click(function(){
            if(this.checked) {
                \$('.check-row').each(function() {
                    this.checked = true;          
                });
            }else{
                \$('.check-row').each(function() {
                    this.checked = false;                 
                });         
            }
        });
    });

</script>
<script src=\"";
        // line 342
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/store.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:userSearch.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  688 => 342,  660 => 317,  652 => 312,  644 => 307,  636 => 302,  628 => 297,  620 => 292,  612 => 287,  604 => 282,  596 => 277,  593 => 276,  590 => 275,  579 => 267,  572 => 266,  565 => 264,  559 => 261,  556 => 260,  534 => 256,  526 => 255,  518 => 254,  512 => 251,  508 => 250,  504 => 249,  500 => 248,  496 => 247,  492 => 246,  486 => 245,  479 => 244,  462 => 243,  455 => 239,  451 => 238,  447 => 237,  443 => 236,  439 => 235,  435 => 234,  431 => 233,  427 => 232,  395 => 205,  387 => 202,  381 => 199,  369 => 192,  360 => 188,  345 => 178,  336 => 174,  318 => 161,  309 => 157,  300 => 153,  290 => 146,  278 => 139,  270 => 135,  262 => 130,  254 => 124,  242 => 117,  233 => 113,  224 => 109,  214 => 102,  197 => 90,  192 => 88,  178 => 79,  172 => 76,  162 => 71,  154 => 68,  149 => 66,  139 => 61,  130 => 57,  122 => 54,  111 => 48,  102 => 44,  88 => 35,  72 => 24,  64 => 21,  59 => 19,  52 => 15,  47 => 14,  44 => 13,  33 => 5,  30 => 4,);
    }
}
