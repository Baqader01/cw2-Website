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

/* shifts/edit.twig */
class __TwigTemplate_8b4360ef3a7e41ac70abb270d04a3b2c extends Template
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
        yield "    <h2>Edit Shift</h2>

    ";
        // line 6
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["errors"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        <div class=\"error-box\">
            <ul>
                ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 10
                yield "                    <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["e"], "html", null, true);
                yield "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['e'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            yield "            </ul>
        </div>
    ";
        }
        // line 15
        yield "
    <form method=\"POST\" action=\"/website/public/shifts/update\">
        <input type=\"hidden\" name=\"shift_id\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "shift_id", [], "any", false, false, false, 17), "html", null, true);
        yield "\">
        <label>
            Date
            <input type=\"date\"
                   name=\"shift_date\"
                   value=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "shift_date", [], "any", false, false, false, 22), "html", null, true);
        yield "\"
                   required>
        </label>

        <label>
            Label
            <input type=\"text\"
                   name=\"label\"
                   value=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "label", [], "any", false, false, false, 30), "html", null, true);
        yield "\"
                   required>
        </label>

        <label>
            Start time
            <input type=\"time\"
                   name=\"start_time\"
                   value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "start_time", [], "any", false, false, false, 38), 0, 5), "html", null, true);
        yield "\"
                   required>
        </label>

        <label>
            End time
            <input type=\"time\"
                   name=\"end_time\"
                   value=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "end_time", [], "any", false, false, false, 46), 0, 5), "html", null, true);
        yield "\"
                   required>
        </label>

        <label>
            Max volunteers
            <input type=\"number\"
                   name=\"max_volunteers\"
                   min=\"1\"
                   value=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["shift"] ?? null), "max_volunteers", [], "any", false, false, false, 55), "html", null, true);
        yield "\"
                   required>
        </label>

        <button type=\"submit\" class=\"button\">Save changes</button>
        <a href=\"/website/public/shifts\" class=\"button\">Cancel</a>
    </form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "shifts/edit.twig";
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
        return array (  143 => 55,  131 => 46,  120 => 38,  109 => 30,  98 => 22,  90 => 17,  86 => 15,  81 => 12,  72 => 10,  68 => 9,  64 => 7,  62 => 6,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
    <h2>Edit Shift</h2>

    {% if errors is not empty %}
        <div class=\"error-box\">
            <ul>
                {% for e in errors %}
                    <li>{{ e }}</li>
                {% endfor %}
            </ul>
        </div>
    {% endif %}

    <form method=\"POST\" action=\"/website/public/shifts/update\">
        <input type=\"hidden\" name=\"shift_id\" value=\"{{ shift.shift_id }}\">
        <label>
            Date
            <input type=\"date\"
                   name=\"shift_date\"
                   value=\"{{ shift.shift_date }}\"
                   required>
        </label>

        <label>
            Label
            <input type=\"text\"
                   name=\"label\"
                   value=\"{{ shift.label }}\"
                   required>
        </label>

        <label>
            Start time
            <input type=\"time\"
                   name=\"start_time\"
                   value=\"{{ shift.start_time|slice(0,5) }}\"
                   required>
        </label>

        <label>
            End time
            <input type=\"time\"
                   name=\"end_time\"
                   value=\"{{ shift.end_time|slice(0,5) }}\"
                   required>
        </label>

        <label>
            Max volunteers
            <input type=\"number\"
                   name=\"max_volunteers\"
                   min=\"1\"
                   value=\"{{ shift.max_volunteers }}\"
                   required>
        </label>

        <button type=\"submit\" class=\"button\">Save changes</button>
        <a href=\"/website/public/shifts\" class=\"button\">Cancel</a>
    </form>
{% endblock %}
", "shifts/edit.twig", "/var/www/html/website/src/Views/shifts/edit.twig");
    }
}
