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

/* shifts.twig */
class __TwigTemplate_be302ce6681ca9e93c496c75c7f7bf2c extends Template
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
        yield "    
    <h2>Available Shifts</h2>
    <p>Pick a shift to book. If it is full, the button disappears automatically.</p>

    ";
        // line 7
        if (Twig\Extension\CoreExtension::testEmpty(($context["shifts"] ?? null))) {
            // line 8
            yield "        <p>No shifts have been added yet.</p>
    ";
        } else {
            // line 10
            yield "        <table class=\"shifts-table\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Label</th>
                    <th>Time</th>
                    <th>Booked</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["shifts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 22
                yield "                    ";
                $context["booked"] = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 22);
                // line 23
                yield "                    ";
                $context["max"] = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "max_volunteers", [], "any", false, false, false, 23);
                // line 24
                yield "                    ";
                $context["isFull"] = (($context["booked"] ?? null) >= ($context["max"] ?? null));
                // line 25
                yield "
                    <tr>
                        <td>";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_date", [], "any", false, false, false, 27), "d M Y"), "html", null, true);
                yield "</td>
                        <td>";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "label", [], "any", false, false, false, 28), "html", null, true);
                yield "</td>
                        <td>
                            ";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "start_time", [], "any", false, false, false, 30), 0, 5), "html", null, true);
                yield "
                            –
                            ";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "end_time", [], "any", false, false, false, 32), 0, 5), "html", null, true);
                yield "
                        </td>
                        <td>";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["booked"] ?? null), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["max"] ?? null), "html", null, true);
                yield "</td>
                        <td>
                            ";
                // line 36
                if ((($tmp = ($context["isVolunteer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 37
                    yield "                                ";
                    if ((($tmp = ($context["isFull"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 38
                        yield "                                    <span>Full</span>
                                ";
                    } else {
                        // line 40
                        yield "                                    <a class=\"book-button\"
                                    href=\"/book?shift_id=";
                        // line 41
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 41), "html", null, true);
                        yield "\">
                                        Book
                                    </a>
                                ";
                    }
                    // line 45
                    yield "                            ";
                } elseif ((($tmp = ($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 46
                    yield "                                <a class=\"book-button\"
                                href=\"/staff/shifts/edit?shift_id=";
                    // line 47
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 47), "html", null, true);
                    yield "\">
                                    Edit
                                </a>
                            ";
                }
                // line 51
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
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
        return "shifts.twig";
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
        return array (  165 => 54,  157 => 51,  150 => 47,  147 => 46,  144 => 45,  137 => 41,  134 => 40,  130 => 38,  127 => 37,  125 => 36,  118 => 34,  113 => 32,  108 => 30,  103 => 28,  99 => 27,  95 => 25,  92 => 24,  89 => 23,  86 => 22,  82 => 21,  69 => 10,  65 => 8,  63 => 7,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}    
    <h2>Available Shifts</h2>
    <p>Pick a shift to book. If it is full, the button disappears automatically.</p>

    {% if shifts is empty %}
        <p>No shifts have been added yet.</p>
    {% else %}
        <table class=\"shifts-table\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Label</th>
                    <th>Time</th>
                    <th>Booked</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for s in shifts %}
                    {% set booked = s.booked_count %}
                    {% set max = s.max_volunteers %}
                    {% set isFull = booked >= max %}

                    <tr>
                        <td>{{ s.shift_date|date('d M Y') }}</td>
                        <td>{{ s.label }}</td>
                        <td>
                            {{ s.start_time|slice(0,5) }}
                            –
                            {{ s.end_time|slice(0,5) }}
                        </td>
                        <td>{{ booked }} / {{ max }}</td>
                        <td>
                            {% if isVolunteer %}
                                {% if isFull %}
                                    <span>Full</span>
                                {% else %}
                                    <a class=\"book-button\"
                                    href=\"/book?shift_id={{ s.shift_id }}\">
                                        Book
                                    </a>
                                {% endif %}
                            {% elseif isStaff %}
                                <a class=\"book-button\"
                                href=\"/staff/shifts/edit?shift_id={{ s.shift_id }}\">
                                    Edit
                                </a>
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    {% endif %}
{% endblock %}
", "shifts.twig", "/var/www/html/cw2/src/Views/shifts.twig");
    }
}
