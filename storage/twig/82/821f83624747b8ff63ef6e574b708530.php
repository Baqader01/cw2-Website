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

/* home.twig */
class __TwigTemplate_a1b97e61daa82a54d089e5a5b8e374fd extends Template
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
        yield "  <section id=\"our-story\">
      <h2>Our Story</h2>
      <p><strong>The Community Table</strong> was established in 2018 by local organiser <strong>Maya Patel</strong> and chef <strong>David Green</strong> as a neighbourhood initiative to tackle food insecurity and social isolation in the heart of East London. What began as a small food bank and soup kitchen in a church hall has evolved into a vibrant community hub where people cook, share, and learn together.</p>
      <p>Today, The Community Table runs a zero-waste café, weekly community meals, and cooking workshops that celebrate seasonal, affordable, and culturally diverse food. All proceeds go back into supporting local families through meal donations, skills training, and volunteer opportunities.</p>
      <p>Recognised for its innovative approach to social sustainability, The Community Table received the <em>London Food Roots Award (2023)</em> and continues to partner with local growers and surplus suppliers to ensure that no good food goes to waste.</p>
    </section>

    <section class=\"carousel\">
      <img src=\"../assets/marketing/food_1.jpg\" alt=\"Volunteer placing donated food into a box in a community storeroom\">
      <img src=\"../assets/marketing/food_2.jpg\" alt=\"Two food donation boxes, including one labelled halal, filled with assorted groceries\">
      <img src=\"../assets/marketing/food_3.jpg\" alt=\"Volunteer packing food items into a donation box for the community\">
      <img src=\"../assets/marketing/food_4.jpg\" alt=\"Stack of food donation boxes prepared for community distribution\">
      <img src=\"../assets/marketing/tins_1.jpeg\" alt=\"Canned goods and tins donated for community food support\">
    </section>

    <section id=\"info\">
      <h2>Visitor Information</h2>
      <p>We welcome everyone — no referrals or proof of need required. All meals are vegetarian-friendly, with vegan and gluten-free options available daily. The space is fully wheelchair accessible, with step-free entry and accessible bathrooms.</p>
      
      ";
        // line 23
        yield from $this->load("opening_times.twig", 23)->unwrap()->yield($context);
        // line 24
        yield "    </section>

    <section id=\"volunteer\">
      <h2>Volunteer With Us</h2>
      <figure>
        <img src=\"../assets/volunteers/people_w_1.jpeg\" alt=\"Portrait of a volunteer woman with crossed arms in a dimly lit setting.\">
      </figure>
      <p>Our volunteers are at the heart of everything we do. Whether you’re helping prepare meals, welcoming visitors, or organising food donations, your time makes a real difference.</p>
      <a href=\"/cw2/public/register.php\" class=\"button\">Become a Volunteer</a>
    </section>
    <section id=\"testimonials\" class=\"testimonials\">
      <h2>What People Say</h2>
      <div class=\"testimonial-grid\">
        <blockquote>
          \"Community Table isn’t just about food — it’s about dignity. When I first came here, I was struggling to feed my kids. Now I volunteer twice a week, and it feels like being part of a big, caring family.\"  
          <cite>— Amira, Local Resident & Volunteer</cite>
        </blockquote>

        <blockquote>
          \"The meals are nourishing, but the real magic is the sense of belonging. Everyone is welcome, and you can feel that from the moment you walk in.\"
          <cite>— Sophie Lang, Manager at GreenGrocer Co-op </cite>
        </blockquote>

        <blockquote>
          \"Our partnership with Community Table has shown how local businesses can make a real difference. Their zero-waste ethos aligns perfectly with our sustainability goals.\"
          <cite>— Priya, Community Member</cite>
        </blockquote>
      </div>

      <a href=\"assets/PDFs/Testimonials.pdf\" class=\"button\" download>
        Read all 7 testimonials (PDF)
      </a>
    </section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home.twig";
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
        return array (  81 => 24,  79 => 23,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
  <section id=\"our-story\">
      <h2>Our Story</h2>
      <p><strong>The Community Table</strong> was established in 2018 by local organiser <strong>Maya Patel</strong> and chef <strong>David Green</strong> as a neighbourhood initiative to tackle food insecurity and social isolation in the heart of East London. What began as a small food bank and soup kitchen in a church hall has evolved into a vibrant community hub where people cook, share, and learn together.</p>
      <p>Today, The Community Table runs a zero-waste café, weekly community meals, and cooking workshops that celebrate seasonal, affordable, and culturally diverse food. All proceeds go back into supporting local families through meal donations, skills training, and volunteer opportunities.</p>
      <p>Recognised for its innovative approach to social sustainability, The Community Table received the <em>London Food Roots Award (2023)</em> and continues to partner with local growers and surplus suppliers to ensure that no good food goes to waste.</p>
    </section>

    <section class=\"carousel\">
      <img src=\"../assets/marketing/food_1.jpg\" alt=\"Volunteer placing donated food into a box in a community storeroom\">
      <img src=\"../assets/marketing/food_2.jpg\" alt=\"Two food donation boxes, including one labelled halal, filled with assorted groceries\">
      <img src=\"../assets/marketing/food_3.jpg\" alt=\"Volunteer packing food items into a donation box for the community\">
      <img src=\"../assets/marketing/food_4.jpg\" alt=\"Stack of food donation boxes prepared for community distribution\">
      <img src=\"../assets/marketing/tins_1.jpeg\" alt=\"Canned goods and tins donated for community food support\">
    </section>

    <section id=\"info\">
      <h2>Visitor Information</h2>
      <p>We welcome everyone — no referrals or proof of need required. All meals are vegetarian-friendly, with vegan and gluten-free options available daily. The space is fully wheelchair accessible, with step-free entry and accessible bathrooms.</p>
      
      {% include 'opening_times.twig' %}
    </section>

    <section id=\"volunteer\">
      <h2>Volunteer With Us</h2>
      <figure>
        <img src=\"../assets/volunteers/people_w_1.jpeg\" alt=\"Portrait of a volunteer woman with crossed arms in a dimly lit setting.\">
      </figure>
      <p>Our volunteers are at the heart of everything we do. Whether you’re helping prepare meals, welcoming visitors, or organising food donations, your time makes a real difference.</p>
      <a href=\"/cw2/public/register.php\" class=\"button\">Become a Volunteer</a>
    </section>
    <section id=\"testimonials\" class=\"testimonials\">
      <h2>What People Say</h2>
      <div class=\"testimonial-grid\">
        <blockquote>
          \"Community Table isn’t just about food — it’s about dignity. When I first came here, I was struggling to feed my kids. Now I volunteer twice a week, and it feels like being part of a big, caring family.\"  
          <cite>— Amira, Local Resident & Volunteer</cite>
        </blockquote>

        <blockquote>
          \"The meals are nourishing, but the real magic is the sense of belonging. Everyone is welcome, and you can feel that from the moment you walk in.\"
          <cite>— Sophie Lang, Manager at GreenGrocer Co-op </cite>
        </blockquote>

        <blockquote>
          \"Our partnership with Community Table has shown how local businesses can make a real difference. Their zero-waste ethos aligns perfectly with our sustainability goals.\"
          <cite>— Priya, Community Member</cite>
        </blockquote>
      </div>

      <a href=\"assets/PDFs/Testimonials.pdf\" class=\"button\" download>
        Read all 7 testimonials (PDF)
      </a>
    </section>
{% endblock %}", "home.twig", "/var/www/html/cw2/src/Views/home.twig");
    }
}
