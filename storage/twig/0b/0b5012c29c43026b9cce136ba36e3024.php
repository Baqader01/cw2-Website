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

/* shifts/book.twig */
class __TwigTemplate_8756a0f268f105c4fd66f181bee782db extends Template
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

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layout/base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "  <h2>Confirm Booking</h2>

  ";
        // line 6
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["errors"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "    <div class=\"error-box\">
      <ul>
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 10
                yield "          <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["e"], "html", null, true);
                yield "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['e'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            yield "      </ul>
    </div>
  ";
        }
        // line 15
        yield "
  ";
        // line 16
        if (array_key_exists("shift", $context)) {
            // line 17
            yield "    <p>
      <strong>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "label", [], "any", false, false, false, 18), "html", null, true);
            yield "</strong><br>
      ";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "shift_date", [], "any", false, false, false, 19), "d M Y"), "html", null, true);
            yield "<br>
      ";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "start_time", [], "any", false, false, false, 20), 0, 5), "html", null, true);
            yield " – ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "end_time", [], "any", false, false, false, 20), 0, 5), "html", null, true);
            yield "<br>
      ";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["booked"] ?? null), "html", null, true);
            yield " / ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "max_volunteers", [], "any", false, false, false, 21), "html", null, true);
            yield " booked
    </p>

    ";
            // line 24
            if ((($tmp = ($context["isFull"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 25
                yield "      <p><strong>This shift is full.</strong></p>
    ";
            } else {
                // line 27
                yield "      <form method=\"POST\" action=\"/website/public/shifts/book\">
        <input type=\"hidden\" name=\"shift_id\" value=\"";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "shift_id", [], "any", false, false, false, 28), "html", null, true);
                yield "\">
        <button class=\"button\">Confirm booking</button>
        <a href=\"/website/public/shifts\" class=\"button\">Cancel</a>
      </form>
    ";
            }
            // line 33
            yield "  ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "shifts/book.twig";
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
        return array (  133 => 33,  125 => 28,  122 => 27,  118 => 25,  116 => 24,  108 => 21,  102 => 20,  98 => 19,  94 => 18,  91 => 17,  89 => 16,  86 => 15,  81 => 12,  72 => 10,  68 => 9,  64 => 7,  62 => 6,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
  <h2>Confirm Booking</h2>

  {% if errors is not empty %}
    <div class=\"error-box\">
      <ul>
        {% for e in errors %}
          <li>{{ e }}</li>
        {% endfor %}
      </ul>
    </div>
  {% endif %}

  {% if shift is defined %}
    <p>
      <strong>{{ shift.label }}</strong><br>
      {{ shift.shift_date|date('d M Y') }}<br>
      {{ shift.start_time|slice(0,5) }} – {{ shift.end_time|slice(0,5) }}<br>
      {{ booked }} / {{ shift.max_volunteers }} booked
    </p>

    {% if isFull %}
      <p><strong>This shift is full.</strong></p>
    {% else %}
      <form method=\"POST\" action=\"/website/public/shifts/book\">
        <input type=\"hidden\" name=\"shift_id\" value=\"{{ shift.shift_id }}\">
        <button class=\"button\">Confirm booking</button>
        <a href=\"/website/public/shifts\" class=\"button\">Cancel</a>
      </form>
    {% endif %}
  {% endif %}
{% endblock %}
", "shifts/book.twig", "/var/www/html/website/src/Views/shifts/book.twig");
    }
}
