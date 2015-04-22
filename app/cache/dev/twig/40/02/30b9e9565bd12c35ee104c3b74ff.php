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
        // line 47
        if ($this->env->getExtension('security')->isGranted("ROLE_STAFF")) {
            // line 48
            echo "                <li class=\"hasSubmenu active\"><a data-toggle=\"collapse\" href=\"#config\" class=\"glyphicons cogwheel color-6\"><i></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store Management"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 49
            if ((twig_in_filter("store", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray"))) || twig_in_filter("staff", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray"))))) {
                echo " in ";
            }
            echo "\" id=\"config\">
                <li><a href=\"";
            // line 50
            echo $this->env->getExtension('routing')->getPath("store_search_user");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("ERP Tracking"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 51
            echo $this->env->getExtension('routing')->getPath("store_staff_order");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redemption Order"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 52
            echo $this->env->getExtension('routing')->getPath("backend_staff_point2vnd");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redeem Points"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("backend_staff_redeemption");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redem Gift"), "html", null, true);
            echo "</a></li>
                ";
            // line 54
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 55
                echo "                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("admin_check_posbill");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Check POS Bill"), "html", null, true);
                echo "</a></li>
                ";
            }
            // line 57
            echo "            </ul>
        </li>
";
        }
        // line 60
        if ($this->env->getExtension('security')->isGranted("ROLE_POINT")) {
            // line 61
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons sort color-5\" href=\"#menu_manage_point_rule\"><i></i><span>Point Rule</span></a>
            <ul class=\"collapse ";
            // line 63
            if (twig_in_filter("rules", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"menu_manage_point_rule\">
                <li><a href=\"";
            // line 64
            echo $this->env->getExtension('routing')->getPath("backend_point_rules_list");
            echo "\"><span>List Rules</span></a></li>
                <li><a href=\"";
            // line 65
            echo $this->env->getExtension('routing')->getPath("backend_point_rules_addnew");
            echo "\"><span>Add Rule</span></a></li>
            </ul>
        </li>
";
        }
        // line 69
        echo "        <!--li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons sort color-3\" href=\"#item\"><i></i><span>Items</span></a>
            <ul class=\"collapse in\" id=\"item\">
                <li><a href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("backend_item_list");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("List"), "html", null, true);
        echo "</span></a></li>
                <li><a href=\"";
        // line 73
        echo $this->env->getExtension('routing')->getPath("backend_item_import");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import"), "html", null, true);
        echo "</span></a></li>
            </ul>
        </li-->
";
        // line 76
        if ($this->env->getExtension('security')->isGranted("ROLE_GIFT")) {
            // line 77
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons show_thumbnails_with_lines color-grey\" href=\"#gift\"><i></i><span>";
            // line 78
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Rewards"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 79
            if (twig_in_filter("gift", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"gift\">
                <li><a href=\"";
            // line 80
            echo $this->env->getExtension('routing')->getPath("backend_gift_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gift Manage"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 81
            echo $this->env->getExtension('routing')->getPath("backend_gift_category_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Category Manage"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 82
            echo $this->env->getExtension('routing')->getPath("backend_gift_import");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import Rewards"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 83
            echo $this->env->getExtension('routing')->getPath("backend_cart_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redemption Order"), "html", null, true);
            echo "</a></li>
            </ul>
        </li>
";
        }
        // line 87
        if ($this->env->getExtension('security')->isGranted("ROLE_STORE")) {
            // line 88
            echo "        <li class=\"hasSubmenu active\">
            <a data-toggle=\"collapse\" class=\"glyphicons show_thumbnails_with_lines color-darkgray\" href=\"#store\"><i></i><span>";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 90
            if (twig_in_filter("store", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"store\">
                <li><a href=\"";
            // line 91
            echo $this->env->getExtension('routing')->getPath("backend_store_list");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("List"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 92
            echo $this->env->getExtension('routing')->getPath("backend_store_create");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create store"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 93
            echo $this->env->getExtension('routing')->getPath("backend_store_adduser_forstore");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("New Store Staff"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 94
            echo $this->env->getExtension('routing')->getPath("backend_store_adduser");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Assign Store staff"), "html", null, true);
            echo "</span></a></li>
                <li><a href=\"";
            // line 95
            echo $this->env->getExtension('routing')->getPath("backend_store_removeuser");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remove user"), "html", null, true);
            echo "</span></a></li>  
                <li><a href=\"";
            // line 96
            echo $this->env->getExtension('routing')->getPath("store_import");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Import Store"), "html", null, true);
            echo "</a></li>          
                <li><a href=\"";
            // line 97
            echo $this->env->getExtension('routing')->getPath("staff_billjob_list");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Automation Process"), "html", null, true);
            echo "</a></li>                      
            </ul>
        </li>
";
        }
        // line 101
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 102
            echo "        <li class=\"hasSubmenu active\"><a data-toggle=\"collapse\" href=\"#configuration\" class=\"glyphicons cogwheel color-6\"><i></i><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Configuration"), "html", null, true);
            echo "</span></a>
            <ul class=\"collapse ";
            // line 103
            if (twig_in_filter("config", (isset($context["routearray"]) ? $context["routearray"] : $this->getContext($context, "routearray")))) {
                echo " in ";
            }
            echo "\" id=\"configuration\">
                <li><a href=\"";
            // line 104
            echo $this->env->getExtension('routing')->getPath("config_environment");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Envinronment Setting"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 105
            echo $this->env->getExtension('routing')->getPath("config_loyalty");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loyalty Setting"), "html", null, true);
            echo "</a></li>
                <li><a href=\"";
            // line 106
            echo $this->env->getExtension('routing')->getPath("config_mailer");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mailer Setting"), "html", null, true);
            echo "</a></li>
    <li onclick=\"window.open('http://' + '90.0.0.5:1234', '_blank');\" 
style=\"cursor:pointer\"><a>";
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
        return array (  406 => 122,  394 => 120,  388 => 119,  382 => 118,  376 => 117,  370 => 116,  364 => 115,  353 => 113,  351 => 112,  344 => 108,  337 => 106,  331 => 105,  325 => 104,  319 => 103,  314 => 102,  312 => 101,  303 => 97,  297 => 96,  291 => 95,  279 => 93,  267 => 91,  261 => 90,  257 => 89,  252 => 87,  243 => 83,  237 => 82,  231 => 81,  225 => 80,  219 => 79,  215 => 78,  212 => 77,  202 => 73,  196 => 72,  191 => 69,  180 => 64,  174 => 63,  168 => 60,  163 => 57,  155 => 55,  153 => 54,  135 => 51,  118 => 48,  116 => 47,  107 => 43,  101 => 42,  91 => 40,  87 => 39,  81 => 38,  77 => 36,  69 => 32,  61 => 30,  57 => 29,  45 => 21,  41 => 11,  31 => 4,  28 => 3,  20 => 1,  563 => 210,  560 => 209,  428 => 203,  423 => 181,  420 => 180,  415 => 126,  412 => 168,  407 => 162,  404 => 161,  400 => 121,  397 => 107,  392 => 9,  389 => 8,  379 => 209,  374 => 207,  371 => 206,  358 => 114,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  305 => 130,  301 => 129,  296 => 127,  285 => 94,  283 => 117,  273 => 92,  268 => 107,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  220 => 82,  216 => 78,  210 => 76,  206 => 73,  188 => 67,  184 => 65,  170 => 61,  165 => 59,  151 => 57,  147 => 53,  141 => 52,  137 => 48,  123 => 49,  119 => 42,  113 => 40,  99 => 38,  95 => 41,  90 => 31,  70 => 29,  65 => 31,  51 => 23,  37 => 11,  35 => 8,  27 => 2,  25 => 1,  690 => 344,  660 => 317,  652 => 312,  644 => 307,  636 => 302,  628 => 297,  620 => 292,  612 => 287,  604 => 282,  596 => 277,  593 => 276,  590 => 275,  579 => 267,  572 => 266,  565 => 264,  559 => 261,  556 => 205,  534 => 256,  526 => 255,  518 => 254,  512 => 251,  508 => 250,  504 => 249,  500 => 248,  496 => 247,  492 => 246,  486 => 245,  479 => 244,  462 => 243,  455 => 239,  451 => 238,  447 => 237,  443 => 236,  439 => 235,  435 => 234,  431 => 233,  427 => 232,  395 => 205,  387 => 202,  381 => 212,  369 => 180,  360 => 188,  345 => 178,  336 => 174,  318 => 161,  309 => 131,  300 => 153,  290 => 146,  278 => 139,  270 => 109,  262 => 130,  254 => 88,  242 => 117,  233 => 113,  224 => 109,  214 => 102,  197 => 90,  192 => 71,  178 => 79,  172 => 76,  162 => 71,  154 => 68,  149 => 66,  139 => 61,  130 => 57,  122 => 54,  111 => 48,  102 => 44,  72 => 24,  64 => 21,  52 => 28,  47 => 19,  44 => 13,  33 => 5,  129 => 50,  124 => 25,  115 => 23,  106 => 22,  104 => 21,  88 => 35,  84 => 17,  82 => 16,  75 => 35,  59 => 19,  55 => 11,  53 => 10,  48 => 7,  39 => 5,  32 => 4,  30 => 4,  26 => 2,  19 => 1,);
    }
}
