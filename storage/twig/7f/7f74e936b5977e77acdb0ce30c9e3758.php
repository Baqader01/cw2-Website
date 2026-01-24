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

/* shifts/volunteer.twig */
class __TwigTemplate_c4e0579b1c865f965a00af6d29862ece extends Template
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
        yield "    <h2>My Shifts</h2>

    ";
        // line 6
        if (Twig\Extension\CoreExtension::testEmpty(($context["shifts"] ?? null))) {
            // line 7
            yield "        <p>You have not booked any shifts yet.</p>
    ";
        } else {
            // line 9
            yield "        <table class=\"shifts-table\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Role</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["shifts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 19
                yield "                    <tr>
                        <td>";
                // line 20
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_date", [], "any", false, false, false, 20), "D d M Y"), "html", null, true);
                yield "</td>
                        <td>";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "label", [], "any", false, false, false, 21), "html", null, true);
                yield "</td>
                        <td>";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "start_time", [], "any", false, false, false, 22), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "end_time", [], "any", false, false, false, 22), 0, 5), "html", null, true);
                yield "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "            </tbody>
        </table>
    ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "shifts/volunteer.twig";
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
        return array (  105 => 25,  94 => 22,  90 => 21,  86 => 20,  83 => 19,  79 => 18,  68 => 9,  64 => 7,  62 => 6,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
    <h2>My Shifts</h2>

    {% if shifts is empty %}
        <p>You have not booked any shifts yet.</p>
    {% else %}
        <table class=\"shifts-table\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Role</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                {% for s in shifts %}
                    <tr>
                        <td>{{ s.shift_date|date('D d M Y') }}</td>
                        <td>{{ s.label }}</td>
                        <td>{{ s.start_time|slice(0,5) }} – {{ s.end_time|slice(0,5) }}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    {% endif %}
{% endblock %}
", "shifts/volunteer.twig", "/var/www/html/website/src/Views/shifts/volunteer.twig");
    }
}
