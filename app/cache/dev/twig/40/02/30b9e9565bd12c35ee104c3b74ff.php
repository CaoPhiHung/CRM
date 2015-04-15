<?php

/* AevitasLevisBundle:Backend:sidebar.html.twig */
class __TwigTemplate_400230b9e9565bd12c35ee104c3b74ff extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('sidebar', $context, $blocks);
    }

    public function block_sidebar($context, array $blocks = array())
    {
        // line 2
        $context["routearray"] = twig_split_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), "_");
        // line 3
        echo "<div id=\"menu\" class=\"hidden-phone\">
    ";
        // line 4
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Backend:renderTopSidebar"));
        echo "
    <div id=\"search\">
        <input type=\"text\" placeholder=\"Quick search ...\" />
        <button class=\"glyphicons search\"><i></i></button>
    </div>

    <ul>
        <li class=\"glyphicons home\"><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("backend_index");
        echo "\" class=\"color-3\"><i></i><span>Dashboard</span></a></li>
        ";
        // line 21
        echo "        <li class=\"hasSubmenu active\">

            <a data-toggle=\"collapse\" class=\"glyphicons sort color-10\" href=\"#menu_edit_template\"><i></i><span>Email - SMS</span></a>

            <ul class=\"collapse in\" id=\"menu_edit_template\">
               ";
        // line 28
        echo "                <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("backend_create_process");
        echo "\"><span>List Process</span></a></li>
                 <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("backend_list_template");
        echo "\"><span>List Template</span></a></li>
                  <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("backend_create_template", array("type" => "mail"));
        echo "\"><span>Create Mail Template</span></a></li>
                <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("backend_create_template", array("type" => "sms"));
        echo "\"><span>Create SMS Template</span></a></li>
                <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("backend_list_template_rule");
        echo "\"><span>Rules Management</span></a></li>
            </ul>
        </li>
";
        // line 35
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 36
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons sort color-7\" href=\"#menu_manage_users\"><i></i><span>Users</span></a>
            <ul class=\"collapse  ";
            // line 38
            if (twig_in_filter("list", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"menu_manage_users\">
                <li><a href=\"";
            // line 39
            echo $this->env->getExtension('routing')->getPath("backend_import_user");
            echo "\"><span>Import Users</span></a></li>
                <li><a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("backend_group_list");
            echo "\"><span>Groups Manager</span></a></li>
                <li><a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("backend_user_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User Management"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getPath("backend_staff_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Staff Management"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("backend_customer_code_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Customer Code"), "html", null, true);
            echo "</a></li>
                
            </ul>
        </li>
";
        }
        // line 48
        if ($this->env->getExtension('security')->isGranted("ROLE_STAFF")) {
            // line 49
            echo "                <li class=\"hasSubmenu active\"><a data-toggle=\"collapse\" href=\"#config\" class=\"glyphicons cogwheel color-6\"><i></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store Management"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 50
            if ((twig_in_filter("store", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray"))) || twig_in_filter("staff", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray"))))) {
                echo " in ";
            }
            echo "\" id=\"config\">
                <li><a href=\"";
            // line 51
            echo $this->env->getExtension('routing')->getPath("store_search_user");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("ERP Tracking"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 52
            echo $this->env->getExtension('routing')->getPath("store_staff_order");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redemption Order"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("backend_staff_point2vnd");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redeem Points"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 54
            echo $this->env->getExtension('routing')->getPath("backend_staff_redeemption");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redem Gift"), "html", null, true);
            echo "</a></li>
                ";
            // line 55
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 56
                echo "                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_check_posbill");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Check POS Bill"), "html", null, true);
                echo "</a></li>
                ";
            }
            // line 58
            echo "            </ul>
        </li>
";
        }
        // line 61
        if ($this->env->getExtension('security')->isGranted("ROLE_POINT")) {
            // line 62
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons sort color-5\" href=\"#menu_manage_point_rule\"><i></i><span>Point Rule</span></a>
            <ul class=\"collapse ";
            // line 64
            if (twig_in_filter("rules", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"menu_manage_point_rule\">
                <li><a href=\"";
            // line 65
            echo $this->env->getExtension('routing')->getPath("backend_point_rules_list");
            echo "\"><span>List Rules</span></a></li>
                <li><a href=\"";
            // line 66
            echo $this->env->getExtension('routing')->getPath("backend_point_rules_addnew");
            echo "\"><span>Add Rule</span></a></li>
            </ul>
        </li>
";
        }
        // line 70
        echo "        <!--li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons sort color-3\" href=\"#item\"><i></i><span>Items</span></a>
            <ul class=\"collapse in\" id=\"item\">
                <li><a href=\"";
        // line 73
        echo $this->env->getExtension('routing')->getPath("backend_item_list");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("List"), "html", null, true);
        echo "</span></a></li>
                <li><a href=\"";
        // line 74
        echo $this->env->getExtension('routing')->getPath("backend_item_import");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import"), "html", null, true);
        echo "</span></a></li>
            </ul>
        </li-->
";
        // line 77
        if ($this->env->getExtension('security')->isGranted("ROLE_GIFT")) {
            // line 78
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons show_thumbnails_with_lines color-grey\" href=\"#gift\"><i></i><span>";
            // line 79
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rewards"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 80
            if (twig_in_filter("gift", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"gift\">
                <li><a href=\"";
            // line 81
            echo $this->env->getExtension('routing')->getPath("backend_gift_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gift Manage"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 82
            echo $this->env->getExtension('routing')->getPath("backend_gift_category_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category Manage"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 83
            echo $this->env->getExtension('routing')->getPath("backend_gift_import");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import Rewards"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 84
            echo $this->env->getExtension('routing')->getPath("backend_cart_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redemption Order"), "html", null, true);
            echo "</a></li>
            </ul>
        </li>
";
        }
        // line 88
        if ($this->env->getExtension('security')->isGranted("ROLE_STORE")) {
            // line 89
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons show_thumbnails_with_lines color-darkgray\" href=\"#store\"><i></i><span>";
            // line 90
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 91
            if (twig_in_filter("store", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"store\">
                <li><a href=\"";
            // line 92
            echo $this->env->getExtension('routing')->getPath("backend_store_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("List"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 93
            echo $this->env->getExtension('routing')->getPath("backend_store_create");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create store"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 94
            echo $this->env->getExtension('routing')->getPath("backend_store_adduser_forstore");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("New Store Staff"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 95
            echo $this->env->getExtension('routing')->getPath("backend_store_adduser");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Assign Store staff"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 96
            echo $this->env->getExtension('routing')->getPath("backend_store_removeuser");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remove user"), "html", null, true);
            echo "</span></a></li>  
                <li><a href=\"";
            // line 97
            echo $this->env->getExtension('routing')->getPath("store_import");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import Store"), "html", null, true);
            echo "</a></li>          
                <li><a href=\"";
            // line 98
            echo $this->env->getExtension('routing')->getPath("staff_billjob_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Automation Process"), "html", null, true);
            echo "</a></li>                      
            </ul>
        </li>
";
        }
        // line 102
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 103
            echo "        <li class=\"hasSubmenu active\"><a data-toggle=\"collapse\" href=\"#configuration\" class=\"glyphicons cogwheel color-6\"><i></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Configuration"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 104
            if (twig_in_filter("config", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"configuration\">
                <li><a href=\"";
            // line 105
            echo $this->env->getExtension('routing')->getPath("config_environment");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Envinronment Setting"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 106
            echo $this->env->getExtension('routing')->getPath("config_loyalty");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loyalty Setting"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 107
            echo $this->env->getExtension('routing')->getPath("config_mailer");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mailer Setting"), "html", null, true);
            echo "</a></li>
    <li onclick=\"window.open('http://' + window.location.hostname + ':1234', '_blank');\" style=\"cursor:pointer\"><a>";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Repair Database"), "html", null, true);
            echo "</a></li>
            </ul>
        </li>
";
        }
        // line 112
        if ($this->env->getExtension('security')->isGranted("ROLE_REPORT")) {
            // line 113
            echo "        <li class=\"hasSubmenu active\"><a data-toggle=\"collapse\" href=\"#report\" class=\"glyphicons cogwheel color-10\"><i></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Report"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 114
            if (twig_in_filter("report", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"report\">
                <li><a href=\"";
            // line 115
            echo $this->env->getExtension('routing')->getPath("form_download_report_account");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Purchase Report"), "html", null, true);
            echo "</a></li>
                <!--li><a href=\"";
            // line 116
            echo $this->env->getExtension('routing')->getPath("customer_report_download");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Registration Report"), "html", null, true);
            echo "</a></li-->
                <li><a href=\"";
            // line 117
            echo $this->env->getExtension('routing')->getPath("backend_report_newmember");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("New Member Report"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 118
            echo $this->env->getExtension('routing')->getPath("backend_report_birthday");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday Report"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 119
            echo $this->env->getExtension('routing')->getPath("backend_report_anniversary");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Anniversary Report"), "html", null, true);
            echo "</a></li>
                <!--li><a href=\"";
            // line 120
            echo $this->env->getExtension('routing')->getPath("customer_report_download");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Download User Report"), "html", null, true);
            echo "</a></li-->
                <li><a href=\"";
            // line 121
            echo $this->env->getExtension('routing')->getPath("backend_report_notshopped");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User not Shopped"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 122
            echo $this->env->getExtension('routing')->getPath("backend_report_redeemption");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redeemption Report"), "html", null, true);
            echo "</a></li>
            </ul>
        </li>
";
        }
        // line 126
        echo "        <!--
        <li class=\"glyphicons coins\"><a href=\"finances.html?lang=en\" class=\"color-8\"><i></i><span>Finances</span></a></li>
        <li class=\"hasSubmenu\">
                <a data-toggle=\"collapse\" class=\"glyphicons shopping_cart color-9\" href=\"#menu_ecommerce\"><i></i><span>Online Shop</span></a>
                <ul class=\"collapse\" id=\"menu_ecommerce\">
                        <li><a href=\"products.html?lang=en\"><span>Products</span></a></li>
                        <li><a href=\"product_edit.html?lang=en\"><span>Add product</span></a></li>
                </ul>
        </li>
        <li class=\"glyphicons picture\"><a href=\"gallery.html?lang=en\" class=\"color-11\"><i></i><span>Photo Gallery</span></a></li>
        <li class=\"glyphicons adress_book\"><a href=\"bookings.html?lang=en\" class=\"color-12\"><i></i><span>Bookings</span></a></li>
        -->
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:sidebar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  415 => 126,  406 => 122,  400 => 121,  394 => 120,  388 => 119,  382 => 118,  376 => 117,  370 => 116,  364 => 115,  358 => 114,  353 => 113,  351 => 112,  344 => 108,  338 => 107,  332 => 106,  326 => 105,  320 => 104,  315 => 103,  313 => 102,  304 => 98,  298 => 97,  292 => 96,  286 => 95,  280 => 94,  274 => 93,  268 => 92,  262 => 91,  258 => 90,  255 => 89,  253 => 88,  244 => 84,  238 => 83,  232 => 82,  226 => 81,  220 => 80,  216 => 79,  213 => 78,  211 => 77,  203 => 74,  197 => 73,  192 => 70,  185 => 66,  181 => 65,  175 => 64,  171 => 62,  169 => 61,  164 => 58,  156 => 56,  154 => 55,  148 => 54,  142 => 53,  136 => 52,  130 => 51,  124 => 50,  119 => 49,  117 => 48,  107 => 43,  101 => 42,  95 => 41,  91 => 40,  87 => 39,  81 => 38,  77 => 36,  75 => 35,  69 => 32,  65 => 31,  61 => 30,  57 => 29,  52 => 28,  45 => 21,  41 => 11,  31 => 4,  28 => 3,  26 => 2,  20 => 1,);
    }
}
