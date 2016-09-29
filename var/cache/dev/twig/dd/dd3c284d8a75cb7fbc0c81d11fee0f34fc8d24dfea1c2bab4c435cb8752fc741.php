<?php

/* base.html.twig */
class __TwigTemplate_d837a1382f6b0c3b612544cc09c3e5917277518b4ebee1bc1fb69eece8c13329 extends Twig_Template
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
        $__internal_10e07d1124fcb44f27e1c8975f9ab784ad33ab7cd3abe7dea007c898cb638fb9 = $this->env->getExtension("native_profiler");
        $__internal_10e07d1124fcb44f27e1c8975f9ab784ad33ab7cd3abe7dea007c898cb638fb9->enter($__internal_10e07d1124fcb44f27e1c8975f9ab784ad33ab7cd3abe7dea007c898cb638fb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_10e07d1124fcb44f27e1c8975f9ab784ad33ab7cd3abe7dea007c898cb638fb9->leave($__internal_10e07d1124fcb44f27e1c8975f9ab784ad33ab7cd3abe7dea007c898cb638fb9_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_26768392dc987733ebb27e8f3d8c9d916a835e0c11864a07a3ca92ed76c961d8 = $this->env->getExtension("native_profiler");
        $__internal_26768392dc987733ebb27e8f3d8c9d916a835e0c11864a07a3ca92ed76c961d8->enter($__internal_26768392dc987733ebb27e8f3d8c9d916a835e0c11864a07a3ca92ed76c961d8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_26768392dc987733ebb27e8f3d8c9d916a835e0c11864a07a3ca92ed76c961d8->leave($__internal_26768392dc987733ebb27e8f3d8c9d916a835e0c11864a07a3ca92ed76c961d8_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_32068988622458c17a14c508416970cbb4aa6166575d257f0495fc98ea4a8bb9 = $this->env->getExtension("native_profiler");
        $__internal_32068988622458c17a14c508416970cbb4aa6166575d257f0495fc98ea4a8bb9->enter($__internal_32068988622458c17a14c508416970cbb4aa6166575d257f0495fc98ea4a8bb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_32068988622458c17a14c508416970cbb4aa6166575d257f0495fc98ea4a8bb9->leave($__internal_32068988622458c17a14c508416970cbb4aa6166575d257f0495fc98ea4a8bb9_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_87970d98962512189484b4f528f5bccec647f3d43dbc2e326042fc8b0c54cde3 = $this->env->getExtension("native_profiler");
        $__internal_87970d98962512189484b4f528f5bccec647f3d43dbc2e326042fc8b0c54cde3->enter($__internal_87970d98962512189484b4f528f5bccec647f3d43dbc2e326042fc8b0c54cde3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_87970d98962512189484b4f528f5bccec647f3d43dbc2e326042fc8b0c54cde3->leave($__internal_87970d98962512189484b4f528f5bccec647f3d43dbc2e326042fc8b0c54cde3_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_ee73e8c2e91544d7aeb4cc815e6d71137566a2bb34fd9176db52a0eb4315db09 = $this->env->getExtension("native_profiler");
        $__internal_ee73e8c2e91544d7aeb4cc815e6d71137566a2bb34fd9176db52a0eb4315db09->enter($__internal_ee73e8c2e91544d7aeb4cc815e6d71137566a2bb34fd9176db52a0eb4315db09_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_ee73e8c2e91544d7aeb4cc815e6d71137566a2bb34fd9176db52a0eb4315db09->leave($__internal_ee73e8c2e91544d7aeb4cc815e6d71137566a2bb34fd9176db52a0eb4315db09_prof);

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
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
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
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
