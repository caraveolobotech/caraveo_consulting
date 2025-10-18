{{-- 
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Header con modal de contacto integrado. 
Usa TailwindCSS y se carga globalmente en toda la web.
===============================================================
--}}

<header class="fixed w-full z-30 bg-black/80 backdrop-blur-sm shadow-md border-b border-gray-800">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

    <!-- LOGO + LEYENDA -->
    <div class="flex items-center gap-4 text-left">
      <img src="{{ asset('images/logo.png') }}" alt="Caraveo LoboTech IT" class="h-16 md:h-20 lg:h-24 w-auto">
      <div>
        <p class="text-xs text-gray-400">Desarrollo. Consultoría. Innovación.</p>
        <p class="text-[#00bfff] font-semibold text-lg italic">
          Creando el futuro, una línea de código a la vez.
        </p>
      </div>
    </div>

    <!-- NAV + BOTÓN -->
    <div class="flex items-center gap-6">
      <nav class="flex gap-6 text-sm uppercase tracking-wide text-gray-300 font-semibold">
        <a href="{{ url('/consultoria') }}" class="hover:text-[#00bfff] transition">Consultoría</a>
        <a href="{{ url('/capacitacion') }}" class="hover:text-[#00bfff] transition">Capacitación</a>
        <a href="{{ url('/productos') }}" class="hover:text-[#00bfff] transition">Productos</a>
        {{-- Link que regresa al home, pero NO se muestra si ya estamos en la home --}}
        @unless (Request::is('/'))
          <a href="{{ url('/') }}" class="hover:text-[#00bfff] transition">Inicio</a>
        @endunless
      </nav>

      <!-- BOTÓN CONTACTO (abre modal) -->
      <button id="openModal"
        class="px-4 py-2 bg-[#00bfff] hover:bg-[#33ccff] text-black font-semibold rounded-md transition shadow-md">
        📞 Contacto
      </button>
    </div>
  </div>
</header>

<!-- MODAL DE CONTACTO -->
<div id="contactModal"
  class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-[#141c24] rounded-xl w-full max-w-lg p-8 text-white border border-gray-700 relative text-center shadow-xl">
    <button id="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl font-bold">✕</button>

    <!-- LOGO -->
    <img src="{{ asset('images/logo-blanco.png') }}" alt="Caraveo LoboTech IT"
      class="h-56 mx-auto mb-6 object-contain" />

    <p class="text-sm text-gray-300 mb-4">
      Estamos listos para ayudarte a impulsar tu transformación digital.
    </p>

    <div class="space-y-3">
      <a href="mailto:contacto@caraveolobotech.com"
        class="block text-[#00bfff] hover:text-[#33ccff] font-semibold transition">
        contacto@caraveolobotech.com
      </a>

      <a href="https://wa.me/525561540500?text=Hola%2C%20quisiera%20información%20sobre%20sus%20servicios."
        target="_blank" class="block text-[#00bfff] hover:text-[#33ccff] font-semibold transition">
        WhatsApp: +52 5561540500
      </a>
    </div>
  </div>
</div>

<!-- SCRIPT DEL MODAL -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('contactModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');

    if (openBtn && modal) {
      openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
      });
    }

    if (closeBtn && modal) {
      closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
      });
    }

    // Cierra el modal al hacer clic fuera del contenido
    modal?.addEventListener('click', (e) => {
      if (e.target === modal) modal.classList.add('hidden');
    });
  });
</script>