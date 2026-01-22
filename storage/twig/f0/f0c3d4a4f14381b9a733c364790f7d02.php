<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* open/table.twig */
class __TwigTemplate_cdd812f5381c7c8b8941ba349d1d1278 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<table id=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["table_id"] ?? null), "html", null, true);
        yield "\" class=\"opening-table\" style=\"display:";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["table_display"] ?? null), "html", null, true);
        yield "\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["hours"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 10
            yield "      <tr>
        <td>";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 11), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 13
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 14
                yield "            <span class=\"closed\">Closed</span>
          ";
            } else {
                // line 16
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 16), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 16), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 18
            yield "        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "  </tbody>
</table>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "open/table.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  90 => 21,  82 => 18,  74 => 16,  70 => 14,  68 => 13,  63 => 11,  60 => 10,  56 => 9,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<table id=\"{{ table_id }}\" class=\"opening-table\" style=\"display:{{table_display}}\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    {% for h in hours %}
      <tr>
        <td>{{ h.day_name }}</td>
        <td>
          {% if h.is_closed %}
            <span class=\"closed\">Closed</span>
          {% else %}
            {{ h.open_time|slice(0,5) }} – {{ h.close_time|slice(0,5) }}
          {% endif %}
        </td>
      </tr>
    {% endfor %}
  </tbody>
</table>
", "open/table.twig", "/var/www/html/cw2/src/Views/open/table.twig");
    }
}
