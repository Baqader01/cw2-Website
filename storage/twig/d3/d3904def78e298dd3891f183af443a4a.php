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

/* includes/header.twig */
class __TwigTemplate_9b019e4a56190697416da3723477f141 extends Template
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
        yield "<header>
    <figure class=\"logo\">
        <img src=\"../assets/logos/CommunityTable-logo.png\" alt=\"The Community Table logo\">
    </figure>

    <div class=\"title\">
        <h1>The Community Table</h1>
        <p class=\"tagline\">A table set for all</p>
        <nav aria-label=\"Main navigation\">
        <ul>
            <li><a href=\"/cw2/public\">Our Story</a></li>

            ";
        // line 13
        if ((($tmp = ($context["isVolunteer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "                <li><a href=\"/cw2/public/shifts.php\">Shifts</a></li>
                <li><a href=\"/cw2/public/volunteer_shifts.php\">My Shifts</a></li>
                <li><a href=\"/cw2/public/logout.php\">Logout</a></li>
            
            ";
        } elseif ((($tmp =         // line 18
($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "                <li><a href=\"/cw2/public/shifts.php\">Manage Shifts</a></li>
                <li><a href=\"/cw2/public/volunteers.php\">View volunteers</a></li>
                <li><a href=\"/cw2/public/logout.php\">Logout</a></li>

            ";
        } else {
            // line 24
            yield "                <li><a href=\"/cw2/public/shifts.php\">Shifts</a></li>
                <li><a href=\"/cw2/public/login.php\">Login</a></li>
            ";
        }
        // line 27
        yield "
        </ul>
        </nav>
    </div>
</header>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "includes/header.twig";
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
        return array (  78 => 27,  73 => 24,  66 => 19,  64 => 18,  58 => 14,  56 => 13,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<header>
    <figure class=\"logo\">
        <img src=\"../assets/logos/CommunityTable-logo.png\" alt=\"The Community Table logo\">
    </figure>

    <div class=\"title\">
        <h1>The Community Table</h1>
        <p class=\"tagline\">A table set for all</p>
        <nav aria-label=\"Main navigation\">
        <ul>
            <li><a href=\"/cw2/public\">Our Story</a></li>

            {% if isVolunteer %}
                <li><a href=\"/cw2/public/shifts.php\">Shifts</a></li>
                <li><a href=\"/cw2/public/volunteer_shifts.php\">My Shifts</a></li>
                <li><a href=\"/cw2/public/logout.php\">Logout</a></li>
            
            {% elseif isStaff %}
                <li><a href=\"/cw2/public/shifts.php\">Manage Shifts</a></li>
                <li><a href=\"/cw2/public/volunteers.php\">View volunteers</a></li>
                <li><a href=\"/cw2/public/logout.php\">Logout</a></li>

            {% else %}
                <li><a href=\"/cw2/public/shifts.php\">Shifts</a></li>
                <li><a href=\"/cw2/public/login.php\">Login</a></li>
            {% endif %}

        </ul>
        </nav>
    </div>
</header>", "includes/header.twig", "/var/www/html/cw2/src/Views/includes/header.twig");
    }
}
