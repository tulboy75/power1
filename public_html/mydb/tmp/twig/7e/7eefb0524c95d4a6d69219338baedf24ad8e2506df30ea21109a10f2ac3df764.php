<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* display/export/options_output_separate_files.twig */
class __TwigTemplate_4f12f17735417217fa8b2e0ee6de1dd4e6025d40a5e916d0ca08c68e738573f6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<li>
    <input type=\"checkbox\" id=\"checkbox_as_separate_files\"
        name=\"as_separate_files\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["export_type"] ?? null), "html", null, true);
        echo "\"";
        // line 4
        echo ((($context["is_checked"] ?? null)) ? (" checked") : (""));
        echo ">
    <label for=\"checkbox_as_separate_files\">
        ";
        // line 6
        if ((0 === twig_compare(($context["export_type"] ?? null), "server"))) {
            // line 7
            echo "            ";
            echo _gettext("Export databases as separate files");
            // line 8
            echo "        ";
        } elseif ((0 === twig_compare(($context["export_type"] ?? null), "database"))) {
            // line 9
            echo "            ";
            echo _gettext("Export tables as separate files");
            // line 10
            echo "        ";
        }
        // line 11
        echo "    </label>
</li>
";
    }

    public function getTemplateName()
    {
        return "display/export/options_output_separate_files.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 11,  60 => 10,  57 => 9,  54 => 8,  51 => 7,  49 => 6,  44 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "display/export/options_output_separate_files.twig", "/home/power/public_html/mydb/templates/display/export/options_output_separate_files.twig");
    }
}
