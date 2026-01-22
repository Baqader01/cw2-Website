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

/* volunteers.twig */
class __TwigTemplate_00806815c5630f899178183c0b6b7357 extends Template
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
        yield "    <h2>Registered Volunteers</h2>
    <p>This page shows everyone who has registered to volunteer.</p>

   ";
        // line 7
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["volunteers"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "        <table class=\"volunteers-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Over 18?</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>

                ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["volunteers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 22
                yield "                    <tr>
                        <td>";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["v"], "volunteer_id", [], "any", false, false, false, 23), "html", null, true);
                yield "</td>
                        <td>";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["v"], "full_name", [], "any", false, false, false, 24), "html", null, true);
                yield "</td>
                        <td>";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["v"], "email", [], "any", false, false, false, 25), "html", null, true);
                yield "</td>
                        <td>";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["v"], "phone", [], "any", false, false, false, 26), "html", null, true);
                yield "</td>
                        <td>";
                // line 27
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["v"], "over18", [], "any", false, false, false, 27) == 1)) ? ("Yes") : ("No"));
                yield "</td>
                        <td>";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["v"], "created_at", [], "any", false, false, false, 28), "d M Y H:i"), "html", null, true);
                yield "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['v'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "
            </tbody>
        </table>
    ";
        } else {
            // line 35
            yield "        <p>No volunteers have registered yet.</p>
    ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "volunteers.twig";
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
        return array (  122 => 35,  116 => 31,  107 => 28,  103 => 27,  99 => 26,  95 => 25,  91 => 24,  87 => 23,  84 => 22,  80 => 21,  65 => 8,  63 => 7,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
    <h2>Registered Volunteers</h2>
    <p>This page shows everyone who has registered to volunteer.</p>

   {% if volunteers is not empty %}
        <table class=\"volunteers-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Over 18?</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>

                {% for v in volunteers %}
                    <tr>
                        <td>{{v.volunteer_id}}</td>
                        <td>{{v.full_name}}</td>
                        <td>{{v.email}}</td>
                        <td>{{v.phone}}</td>
                        <td>{{v.over18 == 1 ? 'Yes' : 'No'}}</td>
                        <td>{{v.created_at|date('d M Y H:i')}}</td>
                    </tr>
                {% endfor %}

            </tbody>
        </table>
    {% else %}
        <p>No volunteers have registered yet.</p>
    {% endif %}
{% endblock %}

", "volunteers.twig", "/var/www/html/cw2/src/Views/volunteers.twig");
    }
}
