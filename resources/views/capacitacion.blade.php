{{-- resources/views/capacitacion.blade.php --}}
{{--
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Página de Capacitaciones — cursos, talleres y formación técnica
para empresas y profesionales. Inspirada en la sección de consultoría,
totalmente responsiva con TailwindCSS.
===============================================================
--}}

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Capacitación - Caraveo LoboTech IT</title>
    <meta name="description" content="Capacitaciones profesionales en desarrollo, microservicios, DevOps, Laravel, Java, Python y más con Caraveo LoboTech IT.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
  </head>

  <body class="bg-[#0a0f14] text-gray-200 font-[Poppins]">
    <!-- HEADER -->
    <x-header />

    <main class="pt-36 pb-20 px-6">
      <!-- HERO IMAGE -->
      <section class="flex flex-col items-center text-center mb-12">
      	<h1 class="text-4xl md:text-5xl font-bold text-[#00bfff] mb-6">
          Formación que impulsa tu crecimiento profesional
        </h1>
      
<img src="{{ asset('images/capacitacion.jpg') }}"
     alt="Capacitación Caraveo LoboTech IT"
     class="w-full max-w-5xl max-h-96 rounded-2xl shadow-2xl object-cover mb-8 mx-auto">


        <p class="max-w-3xl text-gray-300 text-lg leading-relaxed mb-4">
          En <span class="text-[#00bfff] font-semibold">Caraveo LoboTech IT</span> impulsamos tu desarrollo
          profesional con programas de capacitación diseñados para equipos de TI, ingenieros y
          desarrolladores que desean dominar tecnologías modernas y aplicarlas en proyectos reales.
        </p>

        <p class="max-w-3xl text-gray-400 text-base leading-relaxed mb-8">
          Aprenderás con instructores experimentados en el desarrollo de software empresarial, DevOps,
          microservicios, APIs, infraestructura cloud y automatización. Cada curso está orientado a
          resultados prácticos, optimización de procesos y adopción de buenas prácticas.
        </p>

        <button id="openCursosModal"
          class="px-6 py-3 bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold rounded-lg transition shadow-md">
          Ver cursos disponibles
        </button>
      </section>

      <!-- CURSOS MODAL -->
      <div id="cursosModal" class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center">
        <div class="bg-[#141c24] rounded-xl w-full max-w-3xl p-8 text-white border border-gray-700 relative">
          <button id="closeCursosModal" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">✕</button>
          <h2 class="text-3xl font-bold text-[#00bfff] text-center mb-6">Cursos y Tecnologías</h2>
          <p class="text-gray-300 text-center mb-8">Selecciona un curso para conocer más detalles.</p>

          <div class="grid md:grid-cols-3 gap-6">
            @foreach ([
              ['Java', 'Arquitectura, POO, APIs REST, Spring Boot y patrones de diseño.'],
              ['Microservicios', 'Diseño, resiliencia, despliegue con Docker y Kubernetes.'],
              ['Laravel', 'MVC, Eloquent ORM, seguridad y APIs con Sanctum.'],
              ['PHP', 'Fundamentos sólidos, buenas prácticas y seguridad web.'],
              ['Python', 'Automatización, IA básica, FastAPI y backend moderno.'],
              ['Flutter', 'Apps móviles multiplataforma con UI/UX profesional.'],
              ['DevOps', 'CI/CD, contenedores, IaC y observabilidad.'],
              ['AWS & Cloud', 'Despliegue, serverless y optimización de costos.'],
              ['Bases de datos', 'Modelado, optimización y PostgreSQL.']
            ] as [$curso, $desc])
              <div class="bg-gray-900/40 border border-gray-700 p-4 rounded-lg hover:border-[#00bfff] transition">
                <h3 class="text-xl font-semibold text-[#00bfff] mb-2">{{ $curso }}</h3>
                <p class="text-sm text-gray-300 mb-3">{{ $desc }}</p>
                <button class="bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-3 py-2 rounded-md text-sm w-full"
                        onclick="abrirModalCurso('{{ $curso }}', '{{ $desc }}')">
                  Más información
                </button>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- MODAL DETALLE CURSO -->
      <div id="detalleCursoModal" class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center">
        <div class="bg-[#141c24] rounded-xl w-full max-w-md p-8 text-white border border-gray-700 relative text-center">
          <button id="closeDetalleModal" class="absolute top-3 right-3 text-gray-400 hover:text-white text-xl">✕</button>
          <h3 id="cursoTitulo" class="text-2xl font-bold text-[#00bfff] mb-4"></h3>
          <p id="cursoDescripcion" class="text-gray-300 mb-6"></p>
          <p class="text-gray-400 text-sm mb-4">
            Modalidad: <span class="text-[#00bfff]">Online en vivo o presencial</span><br>
            Duración: <span class="text-[#00bfff]">20 a 40 horas</span>
          </p>
          <a href="mailto:contacto@caraveolobotech.com?subject=Interés%20en%20curso"
             class="bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-6 py-3 rounded-md inline-block transition">
            Solicitar información
          </a>
        </div>
      </div>

      <!-- CTA FINAL -->
      <section class="pt-16 text-center border-t border-gray-800">
        <h2 class="text-3xl font-bold text-[#00bfff] mb-4">
          ¿Listo para llevar tu carrera al siguiente nivel?
        </h2>
        <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
          Capacítate con expertos que construyen soluciones reales. Aprende con nosotros y acelera
          tu crecimiento profesional.
        </p>
        <a href="{{ url('/') }}#contacto"
           class="inline-block bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold px-6 py-3 rounded-lg transition">
          Contactar para inscripción
        </a>
      </section>
    </main>

    <!-- FOOTER -->
    <x-footer />

    <!-- SCRIPTS -->
    <script>
      const cursosModal = document.getElementById('cursosModal');
      const detalleModal = document.getElementById('detalleCursoModal');
      const cursoTitulo = document.getElementById('cursoTitulo');
      const cursoDescripcion = document.getElementById('cursoDescripcion');

      document.getElementById('openCursosModal').onclick = () => cursosModal.classList.remove('hidden');
      document.getElementById('closeCursosModal').onclick = () => cursosModal.classList.add('hidden');

      function abrirModalCurso(nombre, descripcion) {
        cursoTitulo.textContent = nombre;
        cursoDescripcion.textContent = descripcion;
        cursosModal.classList.add('hidden');
        detalleModal.classList.remove('hidden');
      }

      document.getElementById('closeDetalleModal').onclick = () => detalleModal.classList.add('hidden');
    </script>
  </body>
</html>