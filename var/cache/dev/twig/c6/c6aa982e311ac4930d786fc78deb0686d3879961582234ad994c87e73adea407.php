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
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b1c6460f1b131fa0d98790d96778ac45e7c37c99513313a846c732d63576c4f9 = $this->env->getExtension("native_profiler");
        $__internal_b1c6460f1b131fa0d98790d96778ac45e7c37c99513313a846c732d63576c4f9->enter($__internal_b1c6460f1b131fa0d98790d96778ac45e7c37c99513313a846c732d63576c4f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 14
        echo "    </body>
</html>
";
        
        $__internal_b1c6460f1b131fa0d98790d96778ac45e7c37c99513313a846c732d63576c4f9->leave($__internal_b1c6460f1b131fa0d98790d96778ac45e7c37c99513313a846c732d63576c4f9_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_300c69642e12fed29ca5f8cc01c2a5c4ee749f4ec8465f2e72c7615bac0199e2 = $this->env->getExtension("native_profiler");
        $__internal_300c69642e12fed29ca5f8cc01c2a5c4ee749f4ec8465f2e72c7615bac0199e2->enter($__internal_300c69642e12fed29ca5f8cc01c2a5c4ee749f4ec8465f2e72c7615bac0199e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_300c69642e12fed29ca5f8cc01c2a5c4ee749f4ec8465f2e72c7615bac0199e2->leave($__internal_300c69642e12fed29ca5f8cc01c2a5c4ee749f4ec8465f2e72c7615bac0199e2_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f56269a0d617d2cee71b2e851a7a37aac319b84edb5735f6fe97a71c1d610afa = $this->env->getExtension("native_profiler");
        $__internal_f56269a0d617d2cee71b2e851a7a37aac319b84edb5735f6fe97a71c1d610afa->enter($__internal_f56269a0d617d2cee71b2e851a7a37aac319b84edb5735f6fe97a71c1d610afa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_f56269a0d617d2cee71b2e851a7a37aac319b84edb5735f6fe97a71c1d610afa->leave($__internal_f56269a0d617d2cee71b2e851a7a37aac319b84edb5735f6fe97a71c1d610afa_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_10b80c32456e3f95033128ce1bf9923c2c48ffa48e492348bffa5e7739387960 = $this->env->getExtension("native_profiler");
        $__internal_10b80c32456e3f95033128ce1bf9923c2c48ffa48e492348bffa5e7739387960->enter($__internal_10b80c32456e3f95033128ce1bf9923c2c48ffa48e492348bffa5e7739387960_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "            <h1>Welcome to ";
        echo twig_escape_filter($this->env, (isset($context["appname"]) ? $context["appname"] : $this->getContext($context, "appname")), "html", null, true);
        echo "</h1>
        ";
        
        $__internal_10b80c32456e3f95033128ce1bf9923c2c48ffa48e492348bffa5e7739387960->leave($__internal_10b80c32456e3f95033128ce1bf9923c2c48ffa48e492348bffa5e7739387960_prof);

    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_268a06e1d26d0ff6bb38ea678c50e23a06d86b0594d625873620cb2f617303cd = $this->env->getExtension("native_profiler");
        $__internal_268a06e1d26d0ff6bb38ea678c50e23a06d86b0594d625873620cb2f617303cd->enter($__internal_268a06e1d26d0ff6bb38ea678c50e23a06d86b0594d625873620cb2f617303cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_268a06e1d26d0ff6bb38ea678c50e23a06d86b0594d625873620cb2f617303cd->leave($__internal_268a06e1d26d0ff6bb38ea678c50e23a06d86b0594d625873620cb2f617303cd_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 13,  88 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 14,  47 => 13,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}*/
/*             <h1>Welcome to {{ appname }}</h1>*/
/*         {% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
