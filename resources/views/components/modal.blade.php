<div x-data="{ open: false }">
    <!-- Botón que abre la modal -->
    <button @click="open = true" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg  mr-1">
        {{$icon}}
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <!-- Contenido de la modal -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-96" @click.away="open = false">
            {{$contenido}}
        </div>
    </div>
</div>