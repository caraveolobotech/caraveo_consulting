{{-- resources/views/consultoria.blade.php --}}
{{--
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Página de Consultoría — plantilla Blade con estilo coherente al sitio
principal (TailwindCSS). Incluye secciones: hero, servicios, proceso y CTA.
===============================================================
--}}

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultoría - Caraveo LoboTech IT</title>
    <meta name="description" content="Caraveo LoboTech IT — Consultoría tecnológica: arquitectura de software, migración a la nube, microservicios, CI/CD y modernización de ERP. Soluciones seguras y escalables para pymes y medianas empresas.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
  </head>

  <body class="bg-[#0a0f14] text-gray-200 font-[Poppins]">
    <!-- HEADER COMPONENT -->
    <x-header />

    <!-- HERO (texto + imagen) -->
    <main class="pt-32">
      <section class="min-h-[85vh] pb-12 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <!-- Columna de texto -->
        <div>
          <h1 class="text-4xl md:text-5xl font-bold text-[#00bfff] mb-4">
            Consultoría tecnológica estratégica
          </h1>

          <p class="text-lg text-gray-300 mb-4 leading-relaxed">
            En <span class="text-[#00bfff] font-semibold">Caraveo LoboTech IT</span> acompañamos a empresas
            en su transformación digital: definimos arquitecturas robustas, optimizamos procesos y ejecutamos
            migraciones cloud-native con foco en seguridad, escalabilidad y reducción de costos.
          </p>

          <p class="text-gray-400 mb-4 text-justify leading-7">
            Nuestra propuesta combina experiencia en <span class="text-[#00bfff] font-semibold">Java</span>,
            diseño de <span class="text-[#00bfff] font-semibold">microservicios</span> y despliegues sobre
            <span class="text-[#00bfff] font-semibold">AWS, Azure y Google Cloud</span>. Implementamos
            pipelines CI/CD (desde infra on-premise hasta plataformas cloud), automatizamos despliegues,
            y proporcionamos trazabilidad y observabilidad para entornos productivos de alto rendimiento.
          </p>

          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
            <li class="flex items-start gap-3">
              <span class="text-[#00bfff] font-semibold">•</span>
              <span class="text-gray-300">Evaluación de arquitectura y roadmap técnico (workshops, PoC)</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-[#00bfff] font-semibold">•</span>
              <span class="text-gray-300">Migración a la nube y modernización de aplicaciones</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-[#00bfff] font-semibold">•</span>
              <span class="text-gray-300">Diseño de microservicios, APIs RESTful y contratos de integración</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-[#00bfff] font-semibold">•</span>
              <span class="text-gray-300">Pipelines CI/CD, automatización y prácticas DevOps</span>
            </li>
          </ul>
        </div>

        <!-- Columna de imagen -->
        <div class="flex items-center justify-center">
          <img
            src="{{ asset('images/consultoria.png') }}"
            alt="Consultoría tecnológica - Caraveo LoboTech IT"
            loading="lazy"
            class="w-full h-[420px] md:h-[520px] lg:h-[580px] object-cover rounded-lg shadow-lg"
          />
        </div>
      </section>

      <!-- SERVICIOS -->
      <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
          <h2 class="text-3xl font-semibold text-[#00bfff] mb-6">Nuestros servicios de consultoría</h2>
          <div class="grid md:grid-cols-3 gap-6">
            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">Arquitectura de Software</h3>
              <p class="text-gray-300 mb-3">Diseño de arquitecturas escalables, patrones de integración y definición de SLAs.</p>
              <p class="text-sm text-gray-400">Revisiones arquitectónicas, pruebas de carga y documentación técnica.</p>
            </article>

            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">Microservicios & APIs</h3>
              <p class="text-gray-300 mb-3">Modelado de dominios, separación de responsabilidades y contratos de API estables.</p>
              <p class="text-sm text-gray-400">Versionado, gateways y estrategias de despliegue sin downtime.</p>
            </article>

            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">Cloud & Infraestructura</h3>
              <p class="text-gray-300 mb-3">Diseño de landing zones, infra como código y optimización de costes cloud.</p>
              <p class="text-sm text-gray-400">AWS, Azure y Google Cloud — arquitecturas resilientes y seguras.</p>
            </article>

            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">CI/CD & DevOps</h3>
              <p class="text-gray-300 mb-3">Pipelines automáticos, testing continuo y observability para despliegues confiables.</p>
              <p class="text-sm text-gray-400">Integración con herramientas de IaC, contenedores y orquestación.</p>
            </article>

            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">Seguridad & Cumplimiento</h3>
              <p class="text-gray-300 mb-3">Evaluaciones de seguridad, hardening y recomendaciones para cumplimiento normativo.</p>
              <p class="text-sm text-gray-400">Políticas de acceso, cifrado y gestión de secretos.</p>
            </article>

            <article class="bg-gray-900/30 rounded-xl p-6 border border-gray-800">
              <h3 class="text-xl font-semibold mb-2">Modernización de ERP</h3>
              <p class="text-gray-300 mb-3">Análisis, integración y migración de sistemas ERP con foco en resultados operativos.</p>
              <p class="text-sm text-gray-400">Integración de datos, APIs y automatización de procesos.</p>
            </article>
          </div>
        </div>
      </section>

      <!-- PROCESO -->
      <section class="py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6">
          <h2 class="text-3xl font-semibold text-[#00bfff] mb-6">Cómo trabajamos</h2>

          <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-gray-900/25 p-6 rounded-lg border border-gray-800">
              <div class="text-2xl font-bold text-[#00bfff] mb-2">1</div>
              <h4 class="font-semibold mb-1">Diagnóstico</h4>
              <p class="text-sm text-gray-400">Evaluamos tu arquitectura actual y objetivos de negocio.</p>
            </div>

            <div class="bg-gray-900/25 p-6 rounded-lg border border-gray-800">
              <div class="text-2xl font-bold text-[#00bfff] mb-2">2</div>
              <h4 class="font-semibold mb-1">Roadmap</h4>
              <p class="text-sm text-gray-400">Definimos prioridades, entregables y plan de acción técnico.</p>
            </div>

            <div class="bg-gray-900/25 p-6 rounded-lg border border-gray-800">
              <div class="text-2xl font-bold text-[#00bfff] mb-2">3</div>
              <h4 class="font-semibold mb-1">Implementación</h4>
              <p class="text-sm text-gray-400">Acompañamos con equipos expertos hasta completar iteraciones.</p>
            </div>

            <div class="bg-gray-900/25 p-6 rounded-lg border border-gray-800">
              <div class="text-2xl font-bold text-[#00bfff] mb-2">4</div>
              <h4 class="font-semibold mb-1">Optimización</h4>
              <p class="text-sm text-gray-400">Ajustamos y monitoreamos para garantizar resultados sostenibles.</p>
            </div>
          </div>

          <div class="mt-8">
            <a href="{{ url('/') }}#contacto" class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold py-2 px-5 rounded-lg transition">
              Iniciar diagnóstico
            </a>
          </div>
        </div>
      </section>

      <!-- FAQ breve -->
      <section class="py-12">
        <div class="max-w-5xl mx-auto px-6">
          <h3 class="text-2xl font-semibold text-[#00bfff] mb-4">Preguntas frecuentes</h3>

          <div class="space-y-4 text-gray-300">
            <details class="bg-gray-900/25 p-4 rounded-md border border-gray-800" id="faq-1">
              <summary class="cursor-pointer font-medium">¿Qué tamaño de empresa atienden?</summary>
              <p class="mt-2 text-sm text-gray-400">Trabajamos con pymes y empresas medianas que buscan profesionalizar su plataforma tecnológica.</p>
            </details>

            <details class="bg-gray-900/25 p-4 rounded-md border border-gray-800" id="faq-2">
              <summary class="cursor-pointer font-medium">¿Ofrecen soporte posterior al proyecto?</summary>
              <p class="mt-2 text-sm text-gray-400">Sí — planes de soporte y operación para mantener sus sistemas en producción.</p>
            </details>
          </div>
        </div>
      </section>
    </main>

    <!-- FOOTER COMPONENT -->
    <x-footer />

    <!-- No scripts específicos en esta vista (modal y demás gestionados en header/footer) -->
  </body>
</html>