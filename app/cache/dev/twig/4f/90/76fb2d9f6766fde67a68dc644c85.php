<?php

/* AevitasLevisBundle:Static:policy.en.html.twig */
class __TwigTemplate_4f9076fb2d9f6766fde67a68dc644c85 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
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
        echo "<title>Star Club - Privacy Policy</title>
";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "<!-- Le styles -->
";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5013256_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_style_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "5013256"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "
<!-- Carousel
================================================== -->
<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>Privacy Policy</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <div class=\"fulltext\">
                    <strong>This starclubvn.com web site is a service of Thanh Bac Fashion Group.</strong><p>

                        Star Club respects the privacy of our customers and the users of our website and has instituted the policies and practices described below to ensure that your personal information is handled in a responsible manner. Our online privacy policy describes the types of personal information we may collect from you when you visit our websites or our stores, how we use this information, and when we share it with third parties or our affiliated brands. The information on this website and our privacy policy are subject to change from time to time. Any material changes to our privacy policy and practices will be reflected on this page so that you can be aware of what information we collect and how we are using and/or disclosing it. By using our website, you consent to the collection and use of this information by Star Club. Our policy was last updated on July 31, 2013.

                    </p><strong>What information does Star Club collect?</strong><p>

                        Star Club collects data that you provide on starclubvn.com and the websites of our affiliated brands by visiting our websites or through transactions, email registrations, sweepstakes, contests, or online memberships; to our sales associates in our company-owned Thanh Bac Fashion stores and the stores and outlets of our affiliated brands (including Levi’s, Birkenstock, DKNY, Adidas and Diesel); or through phone, mail and fax interactions or paper registrations that you submit.

                    </p><strong>Star Club may collect and store two types of information: \"personal information\" and \"automatic information.\" </strong><p>

                        Personal information tells us who you are such as your name, gender, billing address, shipping address, email address, telephone number, date of birth or age, any personal preferences you choose to provide, transaction details such as style, size, price, discount, date, store, your credit card number and expiration date used for transactions, and an assigned password to protect your privacy.</p><p>

                        Automatic information is information that we may collect automatically whenever you interact with this website such as your IP address, the type of computer you use, the web browser you use, and the web page that linked you to our site. An IP address is a number assigned to your computer when you connect to the Internet. Each time you visit this site; our web server may automatically recognize and collect this information. Automatic information also includes \"cookies\" and \"web beacons\".</p><p>

                        A \"cookie\" is a small text file that is sent to your browser from a web server and stored on your computer's hard drive. Among other things, cookies provide a means for us to keep track of your online patterns and preferences. By understanding which areas of the site you visit, cookies allow us to present information, products and services that are of personal interest and make our website more efficient. Some of the ways we may use cookies include enabling your log-in, identifying your shopping carts, tracking where you travel on our websites and what you look at and purchase, and for marketing testing and product recommendations.</p><p>

                        Most browsers are initially set up to accept cookies but allow you to change your browser so that it will not automatically accept cookies. Various browsers have different ways to inform you when a cookie has been sent to you, limit the kinds of cookies that can be placed on your computer and let you delete cookies. Please refer to your browser instructions or help screen to learn more about these functions. Additionally, if you have a Flash player installed on your computer, flash cookies may be stored. Flash cookies are different from browser cookies and the cookie management tools provided by your browser will not necessarily remove Flash cookies. The latest versions of many browsers let you control or delete Flash cookies through the browser's settings. If you use an older version of one of these browsers, upgrade to the most recent version, and set it to update automatically. However, if you delete or remove cookies, it is possible that some portions of the site may not function as intended.</p><p>

                        \"Web beacons\", also known as clear GIFs or single-pixel GIFs, or similar technologies are small image files that we may place on web pages and within web-based email newsletters that we send. Working in conjunction with cookies, web beacons allow us to accurately count the number of unique users who have visited a specific page and the number of times those pages are displayed. We can also use web beacons to let us know how many people opened a web-based email newsletter or message.</p><p>

                        We may associate automatic information with your personal information. In the event of such association, such automatic information will be considered personal information.</p><p>

                        Finally, Star Club occasionally obtains email addresses of active Thanh Bac Fashion store customers who requested fashion emails on other websites and the email addresses and/or phone numbers of people who submitted their contact information to Internet search engines to be contacted by Star Club. Star Club also reserves the right to obtain publicly accessible customer demographics.

                    </p><strong>How does Star Club use this information?</strong><p>

                        Star Club uses this information to confirm and process sales transactions or to contact you with questions or communications about your order, or to respond to your customer service inquiries.</p><p>

                        Star Club also uses this information to enhance and personalize your shopping experience, both online and in our stores, to communicate with you for marketing and promotional purposes including via targeted postal pieces, phone messages, or personalized emails, and to improve the effectiveness of our websites and business activities. You may indicate your contact preferences regarding promotional communications either directly to us online or to customer service representatives.

                    </p><strong>How can you access your information?</strong><p>

                        You may access and edit the information that you provide online by signing in at starclubvn.com. Simply click on the \"<a href=\"http://www.ninewest.com/on/demandware.store/Sites-ninewest-Site/default/Login-Show\">Sign In</a>\" link from the home page and enter your email address and password to access your information. You can request password help at any time by clicking on the \"Forgotten your ID\" link at which time starclubvn.com will email your password to the associated email address. Currently, we do not provide online access to information that you provided to Star Club offline. But at any time you may request access to your information from our customer service representatives.

                    </p><strong>How does Star Club protect your information?</strong><p>

                        Unfortunately, no data transmission over the Internet can be unconditionally guaranteed to be secure. Therefore, any information you transmit to us is sent at your own risk.</p><p>

                        However, when you place an order online, we use encryption technology, such as Secure Socket Layer Technology (\"SSL\"), to protect your personal information during data transport. SSL encrypts your order information, including your name, address, and credit card number, before it is transmitted to us to avoid the decoding of your information by anyone other than Star Club.</p><p>

                        In addition, when you create an online account on starclubvn.com, you must select a personal password. As a member of Star Club website, you will be able to view, among other things, your account profile, contact preferences, order history, address book. We store this type of information so that you do not have to reenter it each time you make a purchase or visit the website. Should you decide to become a member of Star Club’s website, you will be asked to provide an accurate email address and create a password. In order to help protect your personal information, you should be careful about maintaining the secrecy of your password.

                    </p><strong>Does Star Club disclose your information to others?</strong><p>

                        Thanh Bac Fashion Group maintains a single database of customer information for several brands owned by or licensed to Thanh Bac Fashion Group family of companies. When you establish or update your customer profile information with one of the Star Club, whether through a purchase, registration or email sign-up at a company-owned or operated website, specialty store or outlet store for one of the Levi’s, through a customer service representative, or in any other communication you may have with us, we will update your customer record on Star Club database.</p><p>

                        In addition, all of the information that Star Club collects may be shared among our affiliates, including Thanh Bac Fashion Group, the Levi’s in our shared database (e.g., Birkenstock, DKNY, Adidas and Diesel) and the Thanh Bac Fashion Group -owned and licensed brands. Please refer to Thanh Bac Fashion Group’s website at www.thanhbacfashion.com for a full listing of our company-owned and licensed brands.</p><p>

                        Except as described in this privacy policy, Star Club does not sell, rent or trade with third parties any personal information you provide to us online or at our stores, nor do we share such information with third parties. We may disclose personal information about you to third parties who provide services to us and who agree to maintain the confidentiality of such information in accordance with this privacy policy and use the information only in connection with the services they provide. These third parties may provide a variety of services to us including, without limitation, hosting our website, assisting us in fulfilling your transactions and customer service inquiries, managing and updating your customer information record in our database, deploying our emails and promotional offers to you, or fulfilling your request to <a href=\"http://www.ninewest.com/UNSUBSCRIBE/UNSUB_PRIVACY,default,pg.html\">unsubscribe</a> from our email. We also use third party vendors to assist us in better understanding how people use our site, including measuring the effectiveness of our advertising. We and our vendors may place cookies and web beacons on your computer to collect information such as the IP addresses of our visitors' computers, the state and zip code from which our visitors come, which search engine referred you, how you navigated around our site, what you browsed and purchased and what traffic is driven by banner ads and e-mails. We do not authorize those third parties to make any other use of your information except on an aggregate, non-personal basis (in other words, the information will not be identified with you).</p><p>

                        We may use and/or disclose to others information about your demographics and use of our website in a manner that does not reveal your identity. We may match information collected from you at our website with information obtained collected from other sources or third parties.</p><p>

                        From time to time, we may partner with a co-sponsor to conduct a contest, sweepstakes or other promotional event. In those situations, each of the participating web sites may collect or receive personal information from you and will have the right to use your personal information in accordance with their own policies.</p><p>

                        We may disclose personal information in special cases when we have reason to believe that disclosing this information is necessary to identify, contact, or bring legal action against someone who may have breached our Team<a href=\"http://www.ninewest.com/Terms/TERMS,default,pg.html\"> of Use</a> or who may be causing injury to or interference with (either intentionally or unintentionally) our rights or property, other users of our website, or anyone else who could be harmed by such activities.</p><p>

                        We may also disclose personal information when we reasonably believe that the law requires it. We might sell or buy subsidiaries, or business units. In such transactions, personally identifiable information generally is one of the transferred business assets but remains subject to the promises made in any pre-existing privacy policy. Also, in the unlikely event that assets of Star Club are sold, personal information may be one of the transferred assets.</p><p>

                        <b>Can I unsubscribe?</b>

                        Yes. Star Club honors requests to <a href=\"http://www.ninewest.com/UNSUBSCRIBE/UNSUB_PRIVACY,default,pg.html\">unsubscribe</a> from receipt of emails, not only for promotional emails that Star Club sends, but also for emails about Star Club that we permit other companies to send to their own list of subscribers. Please note that you may continue to receive emails from Star Club until such requests become effective.

                    </p><strong>How does Star Club protect a child's privacy?</strong><p>

                        This site is a general audience web site. We do not intentionally collect personally identifiable information from children under the age of thirteen. If we become aware that we have collected personally identifiable information from a user of the site who is under the age of 13, we will remove that child's personal information from our files.

                    </p><strong>Does starclubvn.com have links to other web sites?</strong><p>

                        While you are using this website, you may be linked or directed to other third party sites outside of the website that are beyond our control. Each of these third parties may have a privacy policy different from ours. For example, you might click on a link or banner ad that will take you off the website. These links and banners may take you to sites of advertisers, sponsors and co-branding partners. Please review the privacy policies of these sites. We are not responsible for any actions or policies of such third parties.</p><p>

                        <span style=\"text-decoration: underline;\"></p><strong>Contact Information</strong><p></span>

                        We welcome your comments regarding this privacy policy. Please send any concerns to:

                    </p><strong>Thanh Bac Fasion Branch, 3rd floor, COPAC building, 12 Ton Dan street, Ward 13, District 4, Ho Chi Minh City, Viet Nam</strong><p>
                </div>
            </div>
        </div>
    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:policy.en.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 17,  82 => 16,  48 => 13,  44 => 7,  41 => 6,  38 => 5,  33 => 3,  30 => 2,);
    }
}
