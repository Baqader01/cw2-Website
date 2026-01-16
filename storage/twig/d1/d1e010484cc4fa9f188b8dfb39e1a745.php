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

/* opening_times.twig */
class __TwigTemplate_1c644079993a97083e06fb701a31a9bc extends Template
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
        yield "<section class=\"opening-times\">
  <h3>Opening Times</h3>

  ";
        // line 4
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["openingTimes"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 5
            yield "    <table class=\"opening-table\">
      <tbody>
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["openingTimes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 8
                yield "          <tr>
            <td>";
                // line 9
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "day_name", [], "any", false, false, false, 9), "html", null, true);
                yield "</td>
            <td>
              ";
                // line 11
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "is_closed", [], "any", false, false, false, 11) == 1)) {
                    // line 12
                    yield "                Closed
              ";
                } else {
                    // line 14
                    yield "                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "open_time", [], "any", false, false, false, 14), "g a"), "html", null, true);
                    yield " – ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "close_time", [], "any", false, false, false, 14), "g a"), "html", null, true);
                    yield "
              ";
                }
                // line 16
                yield "            </td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            yield "      </tbody>
    </table>
  ";
        } else {
            // line 22
            yield "    <p>No opening hours have been configured yet.</p>
  ";
        }
        // line 24
        yield "</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "opening_times.twig";
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
        return array (  96 => 24,  92 => 22,  87 => 19,  79 => 16,  71 => 14,  67 => 12,  65 => 11,  60 => 9,  57 => 8,  53 => 7,  49 => 5,  47 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"opening-times\">
  <h3>Opening Times</h3>

  {% if openingTimes is not empty %}
    <table class=\"opening-table\">
      <tbody>
        {% for row in openingTimes %}
          <tr>
            <td>{{ row.day_name }}</td>
            <td>
              {% if row.is_closed == 1 %}
                Closed
              {% else %}
                {{ row.open_time|date('g a') }} – {{ row.close_time|date('g a') }}
              {% endif %}
            </td>
          </tr>
        {% endfor %}
      </tbody>
    </table>
  {% else %}
    <p>No opening hours have been configured yet.</p>
  {% endif %}
</section>
", "opening_times.twig", "/var/www/html/cw2/src/Views/opening_times.twig");
    }
}
