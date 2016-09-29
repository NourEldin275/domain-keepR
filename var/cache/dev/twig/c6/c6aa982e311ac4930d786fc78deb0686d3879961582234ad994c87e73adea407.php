<?php

/* base.html.twig */
class __TwigTemplate_5a7d2cb377d9e398164fe407fe2839ddcdb8567f6bcf4274404b2f0efa7e8ee7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d9845ede8f074c18f492af31976e2aa1e2c461589f11f82a9f438d92f6b35963 = $this->env->getExtension("native_profiler");
        $__internal_d9845ede8f074c18f492af31976e2aa1e2c461589f11f82a9f438d92f6b35963->enter($__internal_d9845ede8f074c18f492af31976e2aa1e2c461589f11f82a9f438d92f6b35963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div id=\"content\">
    ";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "</div>
</body>
</html>";
        
        $__internal_d9845ede8f074c18f492af31976e2aa1e2c461589f11f82a9f438d92f6b35963->leave($__internal_d9845ede8f074c18f492af31976e2aa1e2c461589f11f82a9f438d92f6b35963_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_9158427b1ea27a96f43b99906e5c85adf26f530fe9f07c7826ab8c8f80d7cf82 = $this->env->getExtension("native_profiler");
        $__internal_9158427b1ea27a96f43b99906e5c85adf26f530fe9f07c7826ab8c8f80d7cf82->enter($__internal_9158427b1ea27a96f43b99906e5c85adf26f530fe9f07c7826ab8c8f80d7cf82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome to Domain Keeper";
        
        $__internal_9158427b1ea27a96f43b99906e5c85adf26f530fe9f07c7826ab8c8f80d7cf82->leave($__internal_9158427b1ea27a96f43b99906e5c85adf26f530fe9f07c7826ab8c8f80d7cf82_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_2aace73d52b62e2e56694bad541b934db6336934485f26c5f59acf4fc105187e = $this->env->getExtension("native_profiler");
        $__internal_2aace73d52b62e2e56694bad541b934db6336934485f26c5f59acf4fc105187e->enter($__internal_2aace73d52b62e2e56694bad541b934db6336934485f26c5f59acf4fc105187e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "        <h1>Dashboard Login</h1>
        <form action=\"\">
            <input type=\"text\" name=\"username\" placeholder=\"Enter your username\">
            <input type=\"password\" name=\"password\" placeholder=\"Enter your password\">
            <input type=\"submit\" name=\"submit-user-login\">
        </form>
    ";
        
        $__internal_2aace73d52b62e2e56694bad541b934db6336934485f26c5f59acf4fc105187e->leave($__internal_2aace73d52b62e2e56694bad541b934db6336934485f26c5f59acf4fc105187e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  60 => 9,  48 => 5,  39 => 17,  37 => 9,  30 => 5,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/* <title>{% block title %}Welcome to Domain Keeper{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* <div id="content">*/
/*     {% block body %}*/
/*         <h1>Dashboard Login</h1>*/
/*         <form action="">*/
/*             <input type="text" name="username" placeholder="Enter your username">*/
/*             <input type="password" name="password" placeholder="Enter your password">*/
/*             <input type="submit" name="submit-user-login">*/
/*         </form>*/
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
