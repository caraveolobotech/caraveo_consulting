{{-- resources/views/home.blade.php --}}
{{-- 
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Página institucional desarrollada en Laravel + TailwindCSS.
Consultoría, desarrollo de software, microservicios, CI/CD, DevOps,
y soluciones empresariales innovadoras.
===============================================================
--}}

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Caraveo LoboTech IT - Consultoría y Desarrollo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />

    <!-- CSS intl-tel-input: debe ir en el head -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
  </head>

  <body class="bg-[#0a0f14] text-gray-200 font-[Poppins]">
    <!-- HEADER COMPONENT -->
    <x-header />

    <!-- HERO (full-screen, texto justificado y responsive) -->
    <main class="pt-32">
        <section class="min-h-[85vh] pb-12 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
          <!-- Columna de texto -->
          <div class="flex items-center">
            <div class="max-w-2xl">
              <h2 class="text-4xl md:text-5xl font-bold text-[#00bfff] mb-6">
                Desarrollo y consultoría tecnológica integral
              </h2>
        
              <p class="text-lg sm:text-xl text-gray-300 leading-relaxed mb-6 text-justify">
                En <span class="text-[#00bfff] font-semibold">Caraveo LoboTech IT</span>,
                combinamos innovación, arquitectura de software y experiencia DevOps para
                crear soluciones que transforman la forma en que las empresas operan.
              </p>
        
              <p class="text-gray-400 mb-8 text-justify leading-7">
                En <span class="text-[#00bfff] font-semibold">Caraveo LoboTech IT</span>, creemos que la tecnología debe potenciar las ideas,
                por eso ayudamos a nuestros clientes a llevar sus proyectos a la nube con soluciones innovadoras, seguras y sostenibles.
                Nos especializamos en el desarrollo de soluciones empresariales garantizando escalabilidad, seguridad y alto rendimiento en cada proyecto.
                Además, diseñamos e implementemos sistemas ERP robustos, aplicaciones móviles y web modernas con APIs RESTful.
              </p>
        
              <p class="text-gray-400 mb-8 text-justify leading-7">
                Si buscas un aliado estratégico en tecnología, <span class="text-[#00bfff] font-semibold">Caraveo LoboTech IT</span>
                es la mejor opción para impulsar tu transformación digital.
              </p>
            </div>
          </div>
        
          <!-- Columna de imagen -->
          <div class="flex items-center justify-center">
            <img
              src="{{ asset('images/principal.jpeg') }}"
              alt="Caraveo LoboTech IT"
              class="w-full h-[420px] md:h-[520px] lg:h-[580px] object-cover rounded-lg shadow-lg"
            />
          </div>
        </section>

      <!-- CONTACT SECTION (form on left, image right) -->
      <section id="contacto" class="bg-[#0e151d] py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8 items-center">
          <!-- Imagen -->
          <div class="flex justify-center order-1 md:order-1">
            <img src="{{ asset('images/contacto.jpg') }}" alt="Contáctanos" class="rounded-lg shadow-lg max-h-[400px] object-cover" />
          </div>

          <!-- Formulario -->
          <div class="order-2 md:order-2">
            <h2 class="text-3xl font-semibold text-[#00bfff] mb-8">Contáctanos</h2>

            {{-- Mensajes de éxito / error generales --}} 
            @if (session('success'))
              <div class="flash-message mb-4 p-3 rounded-md bg-green-900/40 border border-green-700 text-green-200 transition-all duration-500 ease-out">
                {{ session('success') }}
              </div>
            @endif

            @if (session('error'))
              <div class="flash-message mb-4 p-3 rounded-md bg-red-900/40 border border-red-700 text-red-200 transition-all duration-500 ease-out">
                {{ session('error') }}
              </div>
            @endif

            {{-- Errores de validación --}}
            @if ($errors->any())
              <div class="flash-message mb-4 p-3 rounded-md bg-red-900/20 border border-red-700 text-red-200 transition-all duration-500 ease-out">
                <ul class="list-disc pl-5">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-4" id="contactForm" novalidate>
              @csrf
              <!-- Nombre -->
              <div>
                <label class="block text-sm mb-1 text-gray-300">Nombre <span class="text-red-500">*</span></label>
                <input
                  name="name"
                  type="text"
                  required
                  value="{{ old('name') }}"
                  class="w-full bg-gray-800 rounded-md p-2 border border-gray-700 focus:border-[#00bfff] focus:outline-none"
                />
                @error('name')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <!-- Empresa -->
              <div>
                <label class="block text-sm mb-1 text-gray-300">Empresa <span class="text-red-500">*</span></label>
                <input
                  name="company"
                  type="text"
                  required
                  value="{{ old('company') }}"
                  class="w-full bg-gray-800 rounded-md p-2 border border-gray-700 focus:border-[#00bfff] focus:outline-none"
                />
                @error('company')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <!-- Correo -->
              <div>
                <label class="block text-sm mb-1 text-gray-300">Correo electrónico <span class="text-red-500">*</span></label>
                <input
                  name="email"
                  type="email"
                  required
                  value="{{ old('email') }}"
                  class="w-full bg-gray-800 rounded-md p-2 border border-gray-700 focus:border-[#00bfff] focus:outline-none"
                  placeholder="tucorreo@ejemplo.com"
                />
                @error('email')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <!-- Teléfono con banderas -->
              <div>
                <label class="block text-sm mb-1 text-gray-300">Teléfono <span class="text-red-500">*</span></label>
                <input
                  id="phone"
                  name="phone"
                  type="tel"
                  required
                  value="{{ old('phone') }}"
                  class="w-full bg-gray-800 rounded-md p-2 border border-gray-700 focus:border-[#00bfff] focus:outline-none"
                />
                @error('phone')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <!-- Comentarios -->
              <div>
                <label class="block text-sm mb-1 text-gray-300">Comentarios <span class="text-red-500">*</span></label>
                <textarea
                  name="message"
                  rows="4"
                  required
                  class="w-full bg-gray-800 rounded-md p-2 border border-gray-700 focus:border-[#00bfff] focus:outline-none"
                  placeholder="Escribe tu mensaje..."
                >{{ old('message') }}</textarea>
                @error('message')
                  <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
              </div>

                <!-- Botón -->
                <button
                  id="submitBtn"
                  type="submit"
                  class="w-full bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold py-2 rounded-md transition flex items-center justify-center gap-2"
                >
                  <span id="btnText">Enviar mensaje</span>
                  <svg
                    id="btnSpinner"
                    class="hidden animate-spin h-5 w-5 text-black"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <circle
                      class="opacity-25"
                      cx="12"
                      cy="12"
                      r="10"
                      stroke="currentColor"
                      stroke-width="4"
                    ></circle>
                    <path
                      class="opacity-75"
                      fill="currentColor"
                      d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"
                    ></path>
                  </svg>
                </button>
            </form>
          </div>
        </div>
      </section>
    </main>

    <!-- NOTE: Modal removed from here — modal lives inside components/header.blade.php -->

    <!-- FOOTER COMPONENT -->
    <x-footer />

    <!-- Scripts: intl-tel-input y validaciones (al final del body) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector("#phone");
        const form = document.querySelector("#contactForm");
        const submitBtn = document.querySelector("#submitBtn");
        const btnText = document.querySelector("#btnText");
        const btnSpinner = document.querySelector("#btnSpinner");

        // --- Inicializa intl-tel-input ---
        let iti = null;
        if (input) {
          iti = window.intlTelInput(input, {
            initialCountry: "mx",
            preferredCountries: ["mx", "us", "ca", "es", "ar", "cl", "co"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
          });
        }

        // --- Validación y control de envío ---
        if (form) {
          form.addEventListener("submit", function (e) {
            // Previene envío doble
            if (submitBtn.disabled) return;

            const email = form.querySelector('input[name="email"]');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Validar email
            if (!emailRegex.test(email.value)) {
              e.preventDefault();
              alert("Por favor, ingresa un correo electrónico válido.");
              email.focus();
              return;
            }

            // Validar teléfono
            if (iti && !iti.isValidNumber()) {
              e.preventDefault();
              alert("Por favor, ingresa un número de teléfono válido.");
              input.focus();
              return;
            }

            // Reemplazar valor del input por formato E.164
            if (iti) {
              input.value = iti.getNumber();
            }

            // Mostrar estado de "enviando..."
            submitBtn.disabled = true;
            btnText.textContent = "Enviando...";
            btnSpinner.classList.remove("hidden");
          });
        }

        // --- Al recargar la página tras envío (éxito o error), desplaza al formulario ---
        const contactSection = document.querySelector("#contacto");

        // Convertimos los estados del servidor a booleanos JS de forma segura
        const hasSuccess = {{ session()->has('success') ? 'true' : 'false' }};
        const hasError = {{ session()->has('error') ? 'true' : 'false' }};
        const hasAnyErrors = {{ $errors->any() ? 'true' : 'false' }};

        if (contactSection && (window.location.hash === "#contacto" || hasSuccess || hasError || hasAnyErrors)) {
          setTimeout(() => {
            // scroll y enfoque en el primer campo con error (si existe)
            contactSection.scrollIntoView({ behavior: "smooth", block: "center" });

            // If there are validation errors, focus the first invalid input
            const firstError = contactSection.querySelector('.text-red-400');
            if (firstError) {
              // .text-red-400 es el <p> de error que colocamos; intentamos enfocar el input anterior
              const possibleInput = firstError.previousElementSibling;
              if (possibleInput && (possibleInput.tagName === 'INPUT' || possibleInput.tagName === 'TEXTAREA')) {
                possibleInput.focus();
              } else {
                // fallback: focus first input inside the section
                const firstInput = contactSection.querySelector('input, textarea, button');
                if (firstInput) firstInput.focus();
              }
            } else {
              // No validation errors — focus first input for convenience
              const firstInput = contactSection.querySelector('input, textarea, button');
              if (firstInput) firstInput.focus();
            }
          }, 300);
        }

        // --- Auto-hide de mensajes flash (6 segundos) ---
        (function autoHideFlash() {
          const FLASH_DURATION = 6000; // ms (6s) - ajusta a 8000 si prefieres
          const flashes = document.querySelectorAll('.flash-message');
          if (!flashes || flashes.length === 0) return;

          flashes.forEach((el) => {
            // after FLASH_DURATION, add clases para animar la salida
            setTimeout(() => {
              // Añadimos transición: se usa opacity y translate para efecto suave
              el.style.transition = 'opacity 500ms ease, transform 500ms ease';
              el.style.opacity = '0';
              el.style.transform = 'translateY(-8px)';
              // eliminar del DOM una vez termine la transición (500ms)
              setTimeout(() => {
                if (el && el.parentNode) el.parentNode.removeChild(el);
              }, 500);
            }, FLASH_DURATION);
          });
        })();

        // NOTE: modal open/close handled by components/header.blade.php (no duplication here)
      });
    </script>
  </body>
</html>