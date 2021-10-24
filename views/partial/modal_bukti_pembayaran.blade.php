    <div
      x-show="isModalBuktiPembayaranOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-center sm:items-center sm:justify-center"
      style="--bg-opacity: 0.5; background-color: rgba(0,0,0,var(--bg-opacity));"
    >
      <!-- Modal -->
      <div
        x-show="isModalBuktiPembayaranOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModalBuktiPembayaran"
        @keydown.escape="closeModalBuktiPembayaran"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modalBuktiPembayaran"
      >
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex items-start justify-between p-2 border-b border-solid border-gray-200 rounded-t">
          <h4 class="font-semibold">
            Bukti Pembayaran
          </h4>
          <button
            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close"
            @click="closeModalBuktiPembayaran"
          >
            <svg
              class="w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              role="img"
              aria-hidden="true"
            >
              <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              ></path>
            </svg>
          </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <form class="text-black" style="text-align: left;">
            <div class="grid text-sm">
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Luas Lahan</div>
                <div class="px-4 py-2">150 meter persegi</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Jumlah Pembayaran</div>
                <div class="px-4 py-2">Rp 50.000.000</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Jumlah Bibit</div>
                <div class="px-4 py-2">14400 bibit</div>
              </div>
          </form>
        </div>
        <footer
          class="flex items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
        >
          <button
            @click="closeModalBuktiPembayaran"
            class="px-5 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Kembali
          </button>
          <a href="/kerjasama">
            <button
              class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
              type="button" 
              {{-- onclick="return confirm('Upload File Template MOU?');" --}}
            >
              Simpan
            </button>
          </a>
        </footer>
      </div>
    </div>