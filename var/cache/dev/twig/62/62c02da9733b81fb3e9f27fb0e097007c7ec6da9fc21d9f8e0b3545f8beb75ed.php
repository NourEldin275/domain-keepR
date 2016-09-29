<?php

/* addNew/messages/client-saved.html.twig */
class __TwigTemplate_83995a9d2276092ea073d0d7abf93911166d3eb0e6dbb12fec0c11527d7c6405 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7237f107371a4eee555278a1eeffa84a8294f7dc4d35e743fbc3c8c0072483e9 = $this->env->getExtension("native_profiler");
        $__internal_7237f107371a4eee555278a1eeffa84a8294f7dc4d35e743fbc3c8c0072483e9->enter($__internal_7237f107371a4eee555278a1eeffa84a8294f7dc4d35e743fbc3c8c0072483e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "addNew/messages/client-saved.html.twig"));

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
    <h1>Client saved successfully.</h1>

</div>
</body>
</html>";
        
        $__internal_7237f107371a4eee555278a1eeffa84a8294f7dc4d35e743fbc3c8c0072483e9->leave($__internal_7237f107371a4eee555278a1eeffa84a8294f7dc4d35e743fbc3c8c0072483e9_prof);

    }

    public function block_title($context, array $blocks = array())
    {
        $__internal_9e121b8f0c22b91dce1ccefa99b612764848fca194f51d65d626e7ba2cc457f2 = $this->env->getExtension("native_profiler");
        $__internal_9e121b8f0c22b91dce1ccefa99b612764848fca194f51d65d626e7ba2cc457f2->enter($__internal_9e121b8f0c22b91dce1ccefa99b612764848fca194f51d65d626e7ba2cc457f2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Success";
        
        $__internal_9e121b8f0c22b91dce1ccefa99b612764848fca194f51d65d626e7ba2cc457f2->leave($__internal_9e121b8f0c22b91dce1ccefa99b612764848fca194f51d65d626e7ba2cc457f2_prof);

    }

    public function getTemplateName()
    {
        return "addNew/messages/client-saved.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  29 => 6,  23 => 2,);
    }
}
/* {# Add new client template*#}*/
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>{% block title %}Success{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* <div id="content">*/
/*     <h1>Client saved successfully.</h1>*/
/* */
/* </div>*/
/* </body>*/
/* </html>*/
