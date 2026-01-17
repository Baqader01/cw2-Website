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

/* auth/login.twig */
class __TwigTemplate_4679753ef0973bf83195cee7eee3da6b extends Template
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
            'scripts' => [$this, 'block_scripts'],
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
        yield "<main class=\"auth\">

  ";
        // line 6
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["errors"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "    <div class=\"error-box\" data-role=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["role"] ?? null), "html", null, true);
            yield "\">
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
  <div class=\"role-toggle\">
    <button type=\"button\" class=\"role-btn ";
        // line 17
        yield (((($context["role"] ?? null) == "volunteer")) ? ("active") : (""));
        yield "\" data-role=\"volunteer\"> Volunteer</button>
    <button type=\"button\" class=\"role-btn ";
        // line 18
        yield (((($context["role"] ?? null) == "staff")) ? ("active") : (""));
        yield "\" data-role=\"staff\"> Staff</button>
    <div class=\"slider\"></div>
  </div>

  <div class=\"forms\">
    <form method=\"POST\" class=\"login-form show\" data-role=\"volunteer\">
      <input type=\"hidden\" name=\"role\" value=\"volunteer\">

      <h2>Volunteer Login</h2>

      <label>Email
        <input type=\"email\" name=\"email\" value=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 29));
        yield "\" required>
      </label>

      <label>Password
        <input type=\"password\" name=\"password\" required>
      </label>

      <button class=\"button\">Sign in</button>

      <p class=\"auth-link\">
        New here?
        <a href=\"/register\">Register as a volunteer</a>
      </p>
    </form>

    <form method=\"POST\" class=\"login-form\" data-role=\"staff\">
      <input type=\"hidden\" name=\"role\" value=\"staff\">

      <h2>Staff Login</h2>

      <label>Email
        <input type=\"email\" name=\"email\" value=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 50));
        yield "\" required>
      </label>

      <label>Password
        <input type=\"password\" name=\"password\" required>
      </label>

      <button class=\"button\">Sign in</button>
    </form>

  </div>
</main>

";
        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 66
        yield "  <script src=\"/cw2/assets/js/auth.js\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "auth/login.twig";
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
        return array (  161 => 66,  154 => 65,  135 => 50,  111 => 29,  97 => 18,  93 => 17,  89 => 15,  84 => 12,  75 => 10,  71 => 9,  65 => 7,  63 => 6,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
<main class=\"auth\">

  {% if errors is not empty %}
    <div class=\"error-box\" data-role=\"{{ role }}\">
      <ul>
        {% for e in errors %}
          <li>{{ e }}</li>
        {% endfor %}
      </ul>
    </div>
  {% endif %}

  <div class=\"role-toggle\">
    <button type=\"button\" class=\"role-btn {{ role == 'volunteer' ? 'active' : '' }}\" data-role=\"volunteer\"> Volunteer</button>
    <button type=\"button\" class=\"role-btn {{ role == 'staff' ? 'active' : '' }}\" data-role=\"staff\"> Staff</button>
    <div class=\"slider\"></div>
  </div>

  <div class=\"forms\">
    <form method=\"POST\" class=\"login-form show\" data-role=\"volunteer\">
      <input type=\"hidden\" name=\"role\" value=\"volunteer\">

      <h2>Volunteer Login</h2>

      <label>Email
        <input type=\"email\" name=\"email\" value=\"{{ old.email|e }}\" required>
      </label>

      <label>Password
        <input type=\"password\" name=\"password\" required>
      </label>

      <button class=\"button\">Sign in</button>

      <p class=\"auth-link\">
        New here?
        <a href=\"/register\">Register as a volunteer</a>
      </p>
    </form>

    <form method=\"POST\" class=\"login-form\" data-role=\"staff\">
      <input type=\"hidden\" name=\"role\" value=\"staff\">

      <h2>Staff Login</h2>

      <label>Email
        <input type=\"email\" name=\"email\" value=\"{{ old.email|e }}\" required>
      </label>

      <label>Password
        <input type=\"password\" name=\"password\" required>
      </label>

      <button class=\"button\">Sign in</button>
    </form>

  </div>
</main>

{% endblock %}

{% block scripts %}
  <script src=\"/cw2/assets/js/auth.js\"></script>
{% endblock %}
", "auth/login.twig", "/var/www/html/cw2/src/Views/auth/login.twig");
    }
}
