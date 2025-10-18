{{-- 
===============================================================
Autor: Rubén Caraveo García
Email: contacto@caraveolobotech.com
WhatsApp: +52 5561540500
Empresa: Caraveo LoboTech IT
Descripción:
Footer Página institucional desarrollada en Laravel + TailwindCSS.
Incluye modal "Nuestra Historia".
===============================================================
--}}

<!-- resources/views/components/footer.blade.php -->
<footer class="bg-black/90 py-10 mt-10 text-gray-400">
    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 px-6">
        <!-- Columna izquierda (info empresa) -->
        <div>
            <h3 class="text-[#00bfff] font-semibold text-lg mb-2">Caraveo LoboTech IT</h3>
            <p class="text-sm">Desarrollo. Consultoría. Innovación.</p>
            <p class="mt-2 text-xs">Dirección: Av. Hombres Ilustres, CP 16880, CDMX, México</p>
            <p class="mt-2 text-xs">WhatsApp: <span class="text-[#00bfff] font-semibold">5561540500</span></p>
            <p class="text-xs">Teléfonos: 55 9352 2687 / 55 8998 2853</p>
            <p class="text-xs mt-2">Email: contacto@caraveolobotech.com</p>
        </div>

        <!-- Columna central (redes) -->
        <div class="text-center">
            <h4 class="font-semibold text-white mb-3">Redes Sociales</h4>
            <div class="flex justify-center gap-4 text-sm">
                <a href="https://www.facebook.com/CaraveoLoboTechIT"
                   target="_blank"
                   class="inline-block transition transform hover:scale-110">
                  <img src="{{ asset('images/logos/facebook.png') }}"
                       alt="Facebook"
                       class="w-6 h-6 object-contain" />
                </a>
                <a href="#" class="hover:text-[#00bfff] transition">LinkedIn</a>
                <a href="#" class="hover:text-[#00bfff] transition">UpToWork</a>
                <a href="#" class="hover:text-[#00bfff] transition">Freelace</a>
            </div>
        </div>

        <!-- Columna derecha (secciones) -->
        <div class="text-right">
            <ul class="space-y-2 text-sm">
                <li><a href="{{ url('/consultoria') }}" class="hover:text-[#00bfff] transition">Consultoría</a></li>
                <li><a href="{{ url('/capacitacion') }}" class="hover:text-[#00bfff] transition">Capacitación</a></li>
                <li><a href="{{ url('/productos') }}" class="hover:text-[#00bfff] transition">Productos</a></li>
                <li>
                  <!-- Enlace que abre modal de historia -->
                  <button id="openHistory" class="hover:text-[#00bfff] transition text-sm font-semibold">
                    Nuestra Historia
                  </button>
                </li>
            </ul>
            <p class="text-xs text-gray-500 mt-4">© {{ date('Y') }} Caraveo LoboTech IT. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- MODAL: NUESTRA HISTORIA -->
<div id="historyModal" class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-[#071019] rounded-xl w-full max-w-3xl p-8 text-gray-200 border border-gray-700 relative shadow-2xl">
    <button id="closeHistory" class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl font-bold">✕</button>

    <div class="flex flex-col md:flex-row gap-6">
      <div class="md:w-1/3 flex items-center justify-center">
        <img src="{{ asset('images/logo-blanco.png') }}" alt="Caraveo LoboTech IT" class="h-32 w-auto">
      </div>

      <div class="md:w-2/3">
        <h3 class="text-2xl text-[#00bfff] font-bold mb-3">Nuestra Historia</h3>

        <p class="text-gray-300 leading-relaxed mb-3">
          Nació de la convicción de que la tecnología debe resolver problemas reales, no sólo
          generar código. <strong>Caraveo LoboTech IT</strong> empezó como un pequeño taller de
          soluciones empresariales y hoy acompaña a empresas a transformar procesos críticos con
          software de alto impacto.
        </p>

        <p class="text-gray-300 leading-relaxed mb-3">
          Nuestra filosofía es simple: <span class="text-[#00bfff] font-semibold">arquitectura sólida, operaciones
          seguras y entregas eficientes</span>. Combinamos experiencia en Java, microservicios,
          DevOps y cloud con un enfoque humano: entendemos negocio, adaptamos tecnología y
          empoderamos equipos.
        </p>

        <p class="text-gray-300 leading-relaxed mb-4">
          En cada proyecto buscamos resultados medibles: reducción de costos, mayor resiliencia,
          ciclos de despliegue más cortos y aplicaciones que escalan. Trabajamos con clientes
          que buscan no sólo un proveedor, sino un socio tecnológico que impulse su crecimiento.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT para modal de historia (footer) -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const historyModal = document.getElementById('historyModal');
    const openHistory = document.getElementById('openHistory');
    const closeHistory = document.getElementById('closeHistory');

    openHistory?.addEventListener('click', () => {
      historyModal.classList.remove('hidden');
      document.documentElement.style.overflow = 'hidden';
    });

    closeHistory?.addEventListener('click', () => {
      historyModal.classList.add('hidden');
      document.documentElement.style.overflow = '';
    });

    // Click outside to close
    historyModal?.addEventListener('click', (e) => {
      if (e.target === historyModal) {
        historyModal.classList.add('hidden');
        document.documentElement.style.overflow = '';
      }
    });
  });
</script>