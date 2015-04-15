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
                <div style=\"width:25%; float:left\">
                    <input type=\"checkbox\" name=\"form[empty_cellphone]\" id=\"empty_cellphone\" style=\"float:left; width:20%\" /><label for=\"empty_cellphone\">Empty</label>
                </div>
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
                <input type=\"text\" id=\"form_ftier\" name=\"form[ftier]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 129
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ftier", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "ftier"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_ttier\" style=\"float:left;width:30%;\">To</label>
                <input type=\"text\" id=\"form_ttier\" name=\"form[ttier]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 133
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ttier", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "ttier"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:50%;\">
                <label for=\"form_tier_lastdays\" style=\"float:left;width:35%;\">Within the last</label>
                <input type=\"text\" id=\"form_tier_lastdays\" name=\"form[tier_lastdays]\" placeholder=\"number of\" style=\"float:left;width:25%\" value=\"";
        // line 137
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
        // line 144
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_point"]) ? $context["form_point"] : $this->getContext($context, "form_point")), 'rest');
        echo "
        <div style=\"width:60%;\">
            <div style=\"float:left;width:100%;\">
                <input type=\"checkbox\" name=\"form[p_lifetime]\" id=\"p_lifetime\" style=\"float:left; margin-right:5px;\" /><label for=\"p_lifetime\">Life Time</label>
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_fpoint\" style=\"float:left;width:30%;\">From</label>
                <input type=\"text\" id=\"form_fpoint\" name=\"form[fpoint]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 151
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:25%;\">
                <label for=\"form_tpoint\" style=\"float:left;width:30%;\">To</label>
                <input type=\"text\" id=\"form_tpoint\" name=\"form[tpoint]\" placeholder=\"Value\" style=\"width:40%\" value=\"";
        // line 155
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "tpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div style=\"float:left;width:50%;\">
                <label for=\"form_p_lastdays\" style=\"float:left;width:35%;\">Within the last</label>
                <input type=\"text\" id=\"form_p_lastdays\" name=\"form[p_lastdays]\" placeholder=\"number of\" style=\"float:left;width:25%\" value=\"";
        // line 159
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
        // line 172
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fjoiningdate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fjoiningdate"), "html", null, true);
        }
        echo "\">
        </div>
        <div class=\"date_picker\">
            <label for=\"tjoiningdate\" style=\"float:left;width:15%;padding-top:3px;\">From</label>
            <input type=\"text\" id=\"tjoiningdate\" name=\"form[tjoiningdate]\" style=\"width:60%\" value=\"";
        // line 176
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
        // line 186
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fexpireddate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "fexpireddate"), "html", null, true);
        }
        echo "\">
        </div>
        <div class=\"date_picker\">
            <label for=\"texpireddate\" style=\"float:left;width:15%;padding-top:3px;\">From</label>
            <input type=\"text\" id=\"texpireddate\" name=\"form[texpireddate]\" style=\"width:60%\" value=\"";
        // line 190
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "texpireddate", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "texpireddate"), "html", null, true);
        }
        echo "\">
        </div>        
    </div>

    <div class=\"line_section\"></div>

    <div class=\"row-input\">
        ";
        // line 197
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_bonuspoint"]) ? $context["form_bonuspoint"] : $this->getContext($context, "form_bonuspoint")), 'rest');
        echo "
        <div style=\"float:left;width:60%;margin-top:26px;\">
            <div style=\"float:left;width:35%;margin-right:20px;\">
                <input type=\"text\" id=\"form_amountpoint\" name=\"form[amountpoint]\" placeholder=\"Amount of points\" style=\"width:90%;\" value=\"";
        // line 200
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "amountpoint", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amountpoint"), "html", null, true);
        }
        echo "\">
            </div>
            <div class=\"date_picker\" style=\"float:left;width:40%;margin-right:20px;\">
                <input type=\"text\" id=\"expired_date\" name=\"form[expired_date]\" placeholder=\"Expired Date\" style=\"width:75%;\"  value=\"";
        // line 203
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
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Firstname"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lastname"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Point"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("C.Code"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Level"), "html", null, true);
        echo "</th>
            <th class=\"sorting_asc\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\">";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Status"), "html", null, true);
        echo "</th>
            <th class=\"sorting\" role=\"columnheader\" tabindex=\"0\" aria-controls=\"DataTables_Table_0\" rowspan=\"1\" colspan=\"1\">";
        // line 237
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
        ";
        // line 241
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
            // line 242
            echo "        <tr class=\"";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
            echo " gradeA remove_item_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\">
            <td><input type=\"checkbox\" class=\"check-row\" id=\"cb";
            // line 243
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" name=\"cid[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" ></td>
            <td>";
            // line 244
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getFirstname"), "html", null, true);
            echo "</td>
            <td>";
            // line 245
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLastname"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 246
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getEmail"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 247
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getPoint"), "html", null, true);
            echo "</td>
            <td class=\"center item-name\">";
            // line 248
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCCode"), "html", null, true);
            echo "</td>
            <td>";
            // line 249
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLevel"), "html", null, true);
            echo "</td>
            <td>Enabled</td>
            <td class=\"center item-price\" colspan=\"2\">
                <a rel=\"";
            // line 252
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_report_userstatement", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\" title=\"download user statement\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Download"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 253
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_user", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit"), "html", null, true);
            echo "</a> | 
                <a rel=\"";
            // line 254
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
        // line 258
        echo "    </tbody></table>
    ";
        // line 259
        echo (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"));
        echo "
<input type=\"hidden\" name=\"boxchecked\" value=\"\">

<a href=\"";
        // line 262
        echo twig_escape_filter($this->env, (isset($context["exporturl"]) ? $context["exporturl"] : $this->getContext($context, "exporturl")), "html", null, true);
        echo "\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Export"), "html", null, true);
        echo "</a>

<form action=\"";
        // line 264
        echo $this->env->getExtension('routing')->getPath("user_import");
        echo "\"  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'enctype');
;
        echo " method=\"POST\">
        ";
        // line 265
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["import"]) ? $context["import"] : $this->getContext($context, "import")), 'rest');
        echo "
    <button class=\"btn btn-primary\">Import</button>
</form>
<div id=\"open-form-delete\" style=\"display: none;\" title=\"!Important\">
    Are you sure want to delete this item ?
</div>
";
    }

    // line 273
    public function block_javascript($context, array $blocks = array())
    {
        // line 274
        echo "<script>
    var backend_item_delete = '";
        // line 275
        echo $this->env->getExtension('routing')->getPath("backend_item_delete");
        echo "';
    jQuery(function() {
        jQuery( \"#not_active_day\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 280
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#bday_month\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 285
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#triple_point_dates\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 290
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#fjoiningdate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 295
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#tjoiningdate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 300
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#fexpireddate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 305
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#texpireddate\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 310
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });
        jQuery( \"#expired_date\" ).datepicker({
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '";
        // line 315
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/datepicker.png"), "html", null, true);
        echo "'
        });

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
        // line 337
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
        return array (  687 => 337,  662 => 315,  654 => 310,  646 => 305,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 265,  574 => 264,  567 => 262,  561 => 259,  558 => 258,  536 => 254,  528 => 253,  520 => 252,  514 => 249,  510 => 248,  502 => 246,  498 => 245,  481 => 242,  464 => 241,  445 => 234,  441 => 233,  383 => 197,  347 => 176,  311 => 155,  302 => 151,  242 => 117,  233 => 113,  406 => 122,  382 => 118,  370 => 116,  274 => 93,  238 => 83,  20 => 1,  571 => 219,  568 => 218,  564 => 211,  408 => 111,  405 => 110,  375 => 186,  359 => 171,  351 => 112,  320 => 159,  316 => 135,  286 => 95,  266 => 108,  262 => 129,  256 => 104,  204 => 52,  161 => 43,  185 => 66,  134 => 51,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 119,  339 => 123,  153 => 69,  506 => 247,  455 => 278,  449 => 235,  434 => 264,  385 => 218,  376 => 117,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 273,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 231,  411 => 226,  380 => 206,  367 => 202,  344 => 108,  338 => 172,  335 => 187,  331 => 186,  297 => 175,  181 => 65,  332 => 106,  323 => 154,  319 => 153,  315 => 103,  308 => 133,  292 => 144,  288 => 121,  281 => 139,  277 => 138,  254 => 124,  197 => 90,  118 => 32,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 243,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 187,  396 => 238,  394 => 120,  391 => 135,  377 => 212,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 209,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 129,  280 => 137,  276 => 113,  249 => 111,  232 => 82,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 30,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 87,  228 => 106,  221 => 62,  213 => 78,  180 => 50,  401 => 271,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 130,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 133,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 85,  219 => 81,  215 => 60,  211 => 77,  207 => 75,  195 => 50,  191 => 92,  179 => 77,  175 => 64,  167 => 68,  159 => 72,  155 => 60,  129 => 46,  124 => 50,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 186,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 121,  397 => 203,  392 => 209,  389 => 200,  371 => 190,  369 => 256,  358 => 114,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 102,  301 => 176,  296 => 127,  273 => 112,  270 => 109,  263 => 188,  259 => 192,  253 => 88,  234 => 90,  216 => 79,  192 => 88,  188 => 53,  170 => 125,  63 => 20,  53 => 14,  58 => 16,  23 => 3,  34 => 3,  146 => 64,  148 => 54,  137 => 48,  127 => 42,  113 => 42,  102 => 44,  90 => 31,  81 => 38,  59 => 19,  255 => 89,  244 => 84,  236 => 179,  230 => 176,  226 => 81,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 76,  150 => 56,  77 => 30,  97 => 31,  65 => 31,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 237,  453 => 236,  444 => 177,  440 => 247,  437 => 232,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 221,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 186,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 166,  305 => 164,  298 => 97,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 92,  264 => 84,  258 => 90,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 109,  220 => 80,  214 => 102,  208 => 72,  169 => 82,  143 => 38,  140 => 50,  132 => 37,  128 => 36,  119 => 49,  107 => 43,  71 => 22,  177 => 49,  165 => 42,  160 => 52,  135 => 37,  126 => 34,  114 => 31,  84 => 26,  70 => 29,  67 => 21,  61 => 30,  94 => 36,  89 => 34,  85 => 27,  75 => 23,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 51,  171 => 62,  166 => 73,  163 => 73,  158 => 67,  156 => 56,  151 => 56,  142 => 53,  138 => 52,  136 => 52,  121 => 50,  117 => 48,  105 => 39,  91 => 40,  62 => 19,  49 => 11,  87 => 39,  21 => 1,  38 => 6,  28 => 3,  24 => 4,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 35,  78 => 26,  46 => 9,  44 => 13,  27 => 2,  79 => 24,  72 => 24,  69 => 25,  47 => 14,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 61,  131 => 47,  123 => 49,  120 => 43,  115 => 48,  111 => 48,  108 => 48,  101 => 42,  98 => 33,  96 => 31,  83 => 26,  74 => 27,  66 => 21,  55 => 18,  52 => 15,  50 => 13,  43 => 8,  41 => 7,  35 => 8,  32 => 4,  29 => 3,  209 => 87,  203 => 74,  199 => 63,  193 => 80,  189 => 83,  187 => 85,  182 => 78,  176 => 80,  173 => 74,  168 => 43,  164 => 58,  162 => 71,  154 => 68,  149 => 66,  147 => 54,  144 => 53,  141 => 46,  133 => 54,  130 => 57,  125 => 44,  122 => 54,  116 => 42,  112 => 41,  109 => 41,  106 => 33,  103 => 29,  99 => 38,  95 => 41,  92 => 29,  86 => 28,  82 => 28,  80 => 31,  73 => 24,  64 => 21,  60 => 19,  57 => 29,  54 => 15,  51 => 23,  48 => 11,  45 => 21,  42 => 11,  39 => 5,  36 => 5,  33 => 5,  30 => 4,);
    }
}
