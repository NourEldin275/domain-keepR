<?php

/* addNew/client.html.twig */
class __TwigTemplate_cad4ab5e6ccd2d3748de7ed6e4e14280353bc24fc35ec4c02e3bfa37692d28f4 extends Twig_Template
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
        $__internal_702a0b6a4997bdafcded85134f676937b66adc7e4b8df0ec6c650ac720beda22 = $this->env->getExtension("native_profiler");
        $__internal_702a0b6a4997bdafcded85134f676937b66adc7e4b8df0ec6c650ac720beda22->enter($__internal_702a0b6a4997bdafcded85134f676937b66adc7e4b8df0ec6c650ac720beda22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "addNew/client.html.twig"));

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
        
        $__internal_702a0b6a4997bdafcded85134f676937b66adc7e4b8df0ec6c650ac720beda22->leave($__internal_702a0b6a4997bdafcded85134f676937b66adc7e4b8df0ec6c650ac720beda22_prof);

    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $__internal_5b52a9469c49bf290d1896d043208f3445ea0a2e20ae3fbaf388ef2427f624dc = $this->env->getExtension("native_profiler");
        $__internal_5b52a9469c49bf290d1896d043208f3445ea0a2e20ae3fbaf388ef2427f624dc->enter($__internal_5b52a9469c49bf290d1896d043208f3445ea0a2e20ae3fbaf388ef2427f624dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Add new client";
        
        $__internal_5b52a9469c49bf290d1896d043208f3445ea0a2e20ae3fbaf388ef2427f624dc->leave($__internal_5b52a9469c49bf290d1896d043208f3445ea0a2e20ae3fbaf388ef2427f624dc_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_ba4f8bee6a100466e477eed89a9f6b3156728f55468041a88d0287a79e7023e7 = $this->env->getExtension("native_profiler");
        $__internal_ba4f8bee6a100466e477eed89a9f6b3156728f55468041a88d0287a79e7023e7->enter($__internal_ba4f8bee6a100466e477eed89a9f6b3156728f55468041a88d0287a79e7023e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        
        $__internal_ba4f8bee6a100466e477eed89a9f6b3156728f55468041a88d0287a79e7023e7->leave($__internal_ba4f8bee6a100466e477eed89a9f6b3156728f55468041a88d0287a79e7023e7_prof);

    }

    public function getTemplateName()
    {
        return "addNew/client.html.twig";
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
