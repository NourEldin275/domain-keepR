<?php

/* new/client.html.twig */
class __TwigTemplate_87dd4006048548864f2c66d74104f55929e47cb5eb7e9b18f4095cb9a2c70fb3 extends Twig_Template
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
        $__internal_c24e020064bab9ae128f5682e6f0d69671c8886546f395fdbc76562509d782c3 = $this->env->getExtension("native_profiler");
        $__internal_c24e020064bab9ae128f5682e6f0d69671c8886546f395fdbc76562509d782c3->enter($__internal_c24e020064bab9ae128f5682e6f0d69671c8886546f395fdbc76562509d782c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "new/client.html.twig"));

        // line 2
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div id=\"content\">
    ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 16
        echo "</div>
</body>
</html>";
        
        $__internal_c24e020064bab9ae128f5682e6f0d69671c8886546f395fdbc76562509d782c3->leave($__internal_c24e020064bab9ae128f5682e6f0d69671c8886546f395fdbc76562509d782c3_prof);

    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $__internal_5a0a89c778e4889c21511b5ae5fefd5e6b46ca4e62ab023db3614f928e2cc4f4 = $this->env->getExtension("native_profiler");
        $__internal_5a0a89c778e4889c21511b5ae5fefd5e6b46ca4e62ab023db3614f928e2cc4f4->enter($__internal_5a0a89c778e4889c21511b5ae5fefd5e6b46ca4e62ab023db3614f928e2cc4f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Add new client";
        
        $__internal_5a0a89c778e4889c21511b5ae5fefd5e6b46ca4e62ab023db3614f928e2cc4f4->leave($__internal_5a0a89c778e4889c21511b5ae5fefd5e6b46ca4e62ab023db3614f928e2cc4f4_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_84e3e06b4be12adc508d0172273eeaf567a7f0d9a7b6a20600356b2ac340ccf5 = $this->env->getExtension("native_profiler");
        $__internal_84e3e06b4be12adc508d0172273eeaf567a7f0d9a7b6a20600356b2ac340ccf5->enter($__internal_84e3e06b4be12adc508d0172273eeaf567a7f0d9a7b6a20600356b2ac340ccf5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "        <h1>Add new Client</h1>
        ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        ";
        // line 14
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    ";
        
        $__internal_84e3e06b4be12adc508d0172273eeaf567a7f0d9a7b6a20600356b2ac340ccf5->leave($__internal_84e3e06b4be12adc508d0172273eeaf567a7f0d9a7b6a20600356b2ac340ccf5_prof);

    }

    public function getTemplateName()
    {
        return "new/client.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 14,  73 => 13,  69 => 12,  66 => 11,  60 => 10,  48 => 6,  39 => 16,  37 => 10,  30 => 6,  24 => 2,);
    }
}
/* {# Add new client template*#}*/
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>{% block title %}Add new client{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* <div id="content">*/
/*     {% block body %}*/
/*         <h1>Add new Client</h1>*/
/*         {{ form_start(form) }}*/
/*         {{ form_widget(form) }}*/
/*         {{ form_end(form) }}*/
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
