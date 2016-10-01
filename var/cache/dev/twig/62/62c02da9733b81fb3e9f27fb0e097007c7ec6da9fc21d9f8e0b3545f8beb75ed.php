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
        $__internal_ef1cc1468640dbfd2da72175e7fdbc8a93a95de53fb40981b87b2d65063b1d77 = $this->env->getExtension("native_profiler");
        $__internal_ef1cc1468640dbfd2da72175e7fdbc8a93a95de53fb40981b87b2d65063b1d77->enter($__internal_ef1cc1468640dbfd2da72175e7fdbc8a93a95de53fb40981b87b2d65063b1d77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "addNew/messages/client-saved.html.twig"));

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
        
        $__internal_ef1cc1468640dbfd2da72175e7fdbc8a93a95de53fb40981b87b2d65063b1d77->leave($__internal_ef1cc1468640dbfd2da72175e7fdbc8a93a95de53fb40981b87b2d65063b1d77_prof);

    }

    public function block_title($context, array $blocks = array())
    {
        $__internal_7622615ad79ba778fff5c3e941a02e44630ebd0f302a6a606226d7cb8b61193d = $this->env->getExtension("native_profiler");
        $__internal_7622615ad79ba778fff5c3e941a02e44630ebd0f302a6a606226d7cb8b61193d->enter($__internal_7622615ad79ba778fff5c3e941a02e44630ebd0f302a6a606226d7cb8b61193d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Success";
        
        $__internal_7622615ad79ba778fff5c3e941a02e44630ebd0f302a6a606226d7cb8b61193d->leave($__internal_7622615ad79ba778fff5c3e941a02e44630ebd0f302a6a606226d7cb8b61193d_prof);

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
