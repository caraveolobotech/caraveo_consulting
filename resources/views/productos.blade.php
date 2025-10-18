{{-- resources/views/productos.blade.php --}}
{{--
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Página de Productos — catálogo de soluciones listas para
implementación: RH AI, control de asistencia móvil+web, ERP retail,
HR management, eCommerce + apps y sitios institucionales.
Diseño responsive con TailwindCSS. Imagen de fondo: public/images/productos.webp
===============================================================
--}}

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Productos - Caraveo LoboTech IT</title>
    <meta name="description" content="Soluciones listas para implementar: TalentMatch AI (RH), TimeGuard (asistencia móvil+web), RetailPro ERP, StaffCore HR, ShopWave eCommerce y WebPresence institucional.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-[#0a0f14] text-gray-200 font-[Poppins]">
    <!-- HEADER -->
    <x-header />

    <!-- MAIN (espacio para header fijo) -->
    <main class="pt-36 pb-20">

      <!-- HERO con imagen de fondo -->
      <section
        class="relative w-full bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('images/productos.webp') }}');"
        aria-label="Productos Caraveo LoboTech IT"
      >
        <!-- overlay para legibilidad -->
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-28 text-center">
          <h1 class="text-4xl md:text-5xl font-bold text-[#00bfff] leading-tight mb-4">
            Productos listos para implementar
          </h1>
          <p class="max-w-3xl mx-auto text-gray-300 text-lg mb-6">
            Soluciones empresariales probadas para acelerar la transformación digital:
            desde motores inteligentes de selección de talento hasta ERPs, aplicaciones
            móviles y tiendas online completamente integradas.
          </p>
          <a href="{{ url('/') }}#contacto"
             class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-6 py-3 rounded-md transition shadow-md">
            Solicitar demo / Información
          </a>
        </div>
      </section>

      <!-- PRODUCTOS: grid -->
      <section class="max-w-7xl mx-auto px-6 mt-12">
        <h2 class="text-3xl font-semibold text-[#00bfff] mb-6">Catálogo destacado</h2>
        <p class="text-gray-400 mb-8 max-w-3xl">Cada producto puede desplegarse como solución independiente o integrarse a tus sistemas vía APIs. Selecciona el que te interese y solicita información para recibir propuesta técnica y demo en vivo.</p>

        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
          <!-- Producto 1 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">TalentMatch AI</h3>
            <p class="text-gray-300 mb-3">
              Plataforma web avanzada para departamentos de RR.HH. Sube vacantes, importa currículums
              y utiliza algoritmos de scoring semántico (#) para filtrar y ordenar candidatos por relevancia.
              Integración con LinkedIn/CSV y panel administrativo para gestión de pipelines.
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• Búsqueda semántica y ranking por relevancia</li>
              <li>• Panel para reclutadores y workflow de entrevistas</li>
              <li>• Exportación y trazabilidad de procesos</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20TalentMatch%20AI"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>

          <!-- Producto 2 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">TimeGuard (Mobile + Web)</h3>
            <p class="text-gray-300 mb-3">
              Solución híbrida móvil y web para control de entradas y salidas. El empleado
              se toma una foto desde su móvil; el sistema realiza verificación biométrica básica,
              registra el evento y lo sincroniza con el backend (Java + microservicios).
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• App móvil (Flutter) para empleados</li>
              <li>• Backend en Java con microservicios y BD central</li>
              <li>• Panel admin web para consultas, reportes y auditoría</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20TimeGuard"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>

          <!-- Producto 3 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">RetailPro ERP (Laravel)</h3>
            <p class="text-gray-300 mb-3">
              ERP modular para producción y retail: inventarios, órdenes de producción,
              trazabilidad, control de almacenes y reporting. Construido en Laravel para
              despliegues rápidos y personalización por módulos.
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• Gestión de inventarios y lotes</li>
              <li>• Órdenes de producción y planificación</li>
              <li>• Integración con POS y eCommerce</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20RetailPro%20ERP"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>

          <!-- Producto 4 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">StaffCore HR (Laravel)</h3>
            <p class="text-gray-300 mb-3">
              Suite para administración de personal: contratos, nóminas, permisos, evaluaciones
              y documentación. Diseñado para integrarse con sistemas contables y bancos.
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• Gestión completa del ciclo de vida del empleado</li>
              <li>• Reportes de RR.HH. y exportación a payroll</li>
              <li>• Control de accesos, permisos y permisos tipo workflow</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20StaffCore%20HR"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>

          <!-- Producto 5 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">ShopWave (Laravel + Flutter)</h3>
            <p class="text-gray-300 mb-3">
              Plataforma eCommerce con carrito de compras web (Laravel) y app móvil (Flutter),
              enfocada a catálogo, pagos, notificaciones y gestión de pedidos. Ideal para comercios
              que necesitan canal online + app nativa.
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• Catálogo, carrito y checkout integrado</li>
              <li>• App móvil para catálogo y seguimiento de pedidos</li>
              <li>• Integración con gateways de pago y analítica</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20ShopWave"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>

          <!-- Producto 6 -->
          <article class="bg-gray-900/30 border border-gray-800 p-6 rounded-xl hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#00bfff] mb-2">WebPresence — Sitios institucionales</h3>
            <p class="text-gray-300 mb-3">
              Sitios institucionales profesionales, rápidos y accesibles. Diseño a medida,
              CMS ligero y optimización SEO. Entrega rápida para presencia corporativa.
            </p>
            <ul class="text-sm text-gray-400 mb-4 space-y-1">
              <li>• Web responsive, SEO básico y rendimiento</li>
              <li>• CMS para edición de contenidos</li>
              <li>• Opciones desde landing hasta sitio corporativo avanzado</li>
            </ul>
            <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20WebPresence"
               class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-4 py-2 rounded-md transition">
              Solicitar información
            </a>
          </article>
        </div>

        <!-- FOOTER CTA -->
        <div class="mt-12 text-center">
          <p class="text-gray-400 mb-4 max-w-2xl mx-auto">¿No encuentras exactamente lo que necesitas? Podemos modularizar y
          adaptar cualquiera de estas soluciones a tu flujo de trabajo y políticas internas.</p>
          <a href="{{ url('/') }}#contacto"
             class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-6 py-3 rounded-md transition">
            Contactar para propuesta personalizada
          </a>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <x-footer />

  </body>
</html>