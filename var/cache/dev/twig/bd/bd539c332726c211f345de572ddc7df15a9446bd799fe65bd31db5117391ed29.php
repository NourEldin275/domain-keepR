<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_9f6762d2f6e3ec8d5a78d9bda1c0fcc5a42ae9c3a42f04cfce39fd7d0fb8ad10 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3bb638fac25b87fd4e0971325da54caff2df6e51e58af1653c767523e85a1352 = $this->env->getExtension("native_profiler");
        $__internal_3bb638fac25b87fd4e0971325da54caff2df6e51e58af1653c767523e85a1352->enter($__internal_3bb638fac25b87fd4e0971325da54caff2df6e51e58af1653c767523e85a1352_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3bb638fac25b87fd4e0971325da54caff2df6e51e58af1653c767523e85a1352->leave($__internal_3bb638fac25b87fd4e0971325da54caff2df6e51e58af1653c767523e85a1352_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_7ffd059df602668c948a0337d0554f43bd3f257c7990f951e7b91e745b3daaf9 = $this->env->getExtension("native_profiler");
        $__internal_7ffd059df602668c948a0337d0554f43bd3f257c7990f951e7b91e745b3daaf9->enter($__internal_7ffd059df602668c948a0337d0554f43bd3f257c7990f951e7b91e745b3daaf9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_7ffd059df602668c948a0337d0554f43bd3f257c7990f951e7b91e745b3daaf9->leave($__internal_7ffd059df602668c948a0337d0554f43bd3f257c7990f951e7b91e745b3daaf9_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_4eb3d51a4aadcb2ef2556f327b4575bdedeb60f54d4ca128d8ff3e528d79f631 = $this->env->getExtension("native_profiler");
        $__internal_4eb3d51a4aadcb2ef2556f327b4575bdedeb60f54d4ca128d8ff3e528d79f631->enter($__internal_4eb3d51a4aadcb2ef2556f327b4575bdedeb60f54d4ca128d8ff3e528d79f631_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_4eb3d51a4aadcb2ef2556f327b4575bdedeb60f54d4ca128d8ff3e528d79f631->leave($__internal_4eb3d51a4aadcb2ef2556f327b4575bdedeb60f54d4ca128d8ff3e528d79f631_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_41f72dff3b832cdf02634bff92486a296b90cb9e53fab90b5e4b192bac39c22b = $this->env->getExtension("native_profiler");
        $__internal_41f72dff3b832cdf02634bff92486a296b90cb9e53fab90b5e4b192bac39c22b->enter($__internal_41f72dff3b832cdf02634bff92486a296b90cb9e53fab90b5e4b192bac39c22b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_41f72dff3b832cdf02634bff92486a296b90cb9e53fab90b5e4b192bac39c22b->leave($__internal_41f72dff3b832cdf02634bff92486a296b90cb9e53fab90b5e4b192bac39c22b_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  114 => 32,  108 => 28,  106 => 27,  102 => 25,  96 => 24,  88 => 21,  82 => 17,  80 => 16,  75 => 14,  70 => 13,  64 => 12,  54 => 9,  48 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     {% if collector.hasexception %}*/
/*         <style>*/
/*             {{ render(path('_profiler_exception_css', { token: token })) }}*/
/*         </style>*/
/*     {% endif %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block menu %}*/
/*     <span class="label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}">*/
/*         <span class="icon">{{ include('@WebProfiler/Icon/exception.svg') }}</span>*/
/*         <strong>Exception</strong>*/
/*         {% if collector.hasexception %}*/
/*             <span class="count">*/
/*                 <span>1</span>*/
/*             </span>*/
/*         {% endif %}*/
/*     </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     <h2>Exceptions</h2>*/
/* */
/*     {% if not collector.hasexception %}*/
/*         <div class="empty">*/
/*             <p>No exception was thrown and caught during the request.</p>*/
/*         </div>*/
/*     {% else %}*/
/*         <div class="sf-reset">*/
/*             {{ render(path('_profiler_exception', { token: token })) }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
