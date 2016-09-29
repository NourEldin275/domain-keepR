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
        $__internal_dd7a5ce8fe9d186058720c729629c23dcba61fded010970ae01b25404bdf4600 = $this->env->getExtension("native_profiler");
        $__internal_dd7a5ce8fe9d186058720c729629c23dcba61fded010970ae01b25404bdf4600->enter($__internal_dd7a5ce8fe9d186058720c729629c23dcba61fded010970ae01b25404bdf4600_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "addNew/client.html.twig"));

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
        
        $__internal_dd7a5ce8fe9d186058720c729629c23dcba61fded010970ae01b25404bdf4600->leave($__internal_dd7a5ce8fe9d186058720c729629c23dcba61fded010970ae01b25404bdf4600_prof);

    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $__internal_f8f4b58e2b29bbf4d99467d8b131575249e87b4d04255ba56ea27daa84959b25 = $this->env->getExtension("native_profiler");
        $__internal_f8f4b58e2b29bbf4d99467d8b131575249e87b4d04255ba56ea27daa84959b25->enter($__internal_f8f4b58e2b29bbf4d99467d8b131575249e87b4d04255ba56ea27daa84959b25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Add new client";
        
        $__internal_f8f4b58e2b29bbf4d99467d8b131575249e87b4d04255ba56ea27daa84959b25->leave($__internal_f8f4b58e2b29bbf4d99467d8b131575249e87b4d04255ba56ea27daa84959b25_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_2a2ba5ab2ee93f5c011045c6ca9c37a155aa609acf0fa728dd3d14ad30800ddf = $this->env->getExtension("native_profiler");
        $__internal_2a2ba5ab2ee93f5c011045c6ca9c37a155aa609acf0fa728dd3d14ad30800ddf->enter($__internal_2a2ba5ab2ee93f5c011045c6ca9c37a155aa609acf0fa728dd3d14ad30800ddf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        
        $__internal_2a2ba5ab2ee93f5c011045c6ca9c37a155aa609acf0fa728dd3d14ad30800ddf->leave($__internal_2a2ba5ab2ee93f5c011045c6ca9c37a155aa609acf0fa728dd3d14ad30800ddf_prof);

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
