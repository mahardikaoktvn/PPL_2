                  @if ($data->id_verify_status == 0)
                  <div class="relative">
                    <button
                      class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                      @click="toggleVerifikasiMenu"
                      @keydown.escape="closeVerifikasi"
                      aria-label="Verifikasi"
                      aria-haspopup="true"
                    >
                    Belum di Verifikasi
                    </button>
                    <template x-if="isVerifikasiOpen">
                      <ul
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click.away="closeVerifikasi"
                        @keydown.escape="closeVerifikasi"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                        aria-label="submenu"
                      >
                        <li class="flex">
                          <a href="/setuju_lahan/{{$data->id_lahan}}"
                            id = "2"
                            name="2"
                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                          >
                            <span>Di Setujui</span>
                          </a>
                        </li>
                        <li class="flex">
                          <a href="/tolak_lahan/{{$data->id_lahan}}"
                            id = "1"
                            name="1"
                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                          >
                            <span>Di Tolak</span>
                          </a>
                        </li>
                      </ul>
                    </template>
                  </div>
                  @elseif ($data->id_verify_status == 1)
                  <div class="relative">
                    <button
                      class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                      @click="toggleVerifikasiMenu"
                      @keydown.escape="closeVerifikasi"
                      aria-label="Verifikasi"
                      aria-haspopup="true"
                    >
                    Ditolak
                    </button>
                  </div>
                  @elseif ($data->id_verify_status == 2)
                  <div class="relative">
                    <button
                      class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                      @click="toggleVerifikasiMenu"
                      @keydown.escape="closeVerifikasi"
                      aria-label="Verifikasi"
                      aria-haspopup="true"
                    >
                    Ditolak
                    </button>
                  </div>
                  @endif