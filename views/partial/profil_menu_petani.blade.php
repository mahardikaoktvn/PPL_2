      {{-- <style>
        $yellow: #f4d03f;
        $blue: #16a085;
        $gradient-bg: linear-gradient(90deg, $blue, $yellow);
        $transparent-gray: rgba(0, 0, 0, 0.3);
        $transparent-white: rgba(255, 255, 255, 0.15);

        *,
        *::before,
        *::after {
          padding: 0;
          margin: 0;
          box-sizing: border-box;
        }

        body {
          background: $gradient-bg;
          font-family: "Montserrat", sans-serif;
          color: #fff;

          // For codepen only
          height: 100vh;
        }

        .menu {
          ol {
            list-style: none;
            padding: 0;
            margin: 0;

            &:first-child {
              width: 100%;
              max-width: 960px;
              margin: 1rem auto 0 auto;
              display: grid;
              grid-template-columns: repeat(5, 1fr);
              align-items: center;
              box-shadow: 0px 3px 8px $transparent-gray;
            }
          }

          &-item {
            display: flex;
            align-items: center;
            justify-content: center;
            border-top: 2px solid $blue;
            position: relative;
            transition: background 0.3s ease-in-out;

            &:nth-child(1) > a::before {
              content: "\f015";
            }

            &:nth-child(2) > a::before {
              content: "\f05a";
            }

            &:nth-child(3) > a::before {
              content: "\f0ad";
            }

            &:nth-child(4) > a::before {
              content: "\f2e7";
            }

            &:nth-child(5) > a::before {
              content: "\f007";
            }

            @for $i from 1 through 5 {
              &:nth-child(#{$i}) > a::before {
                font-family: "Font Awesome 5 Free";
                font-size: 1.2rem;
                display: block;
                margin-bottom: 1rem;
                font-weight: 900;
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                line-height: 1;
                color: $blue;

                @media (min-width: 768px) {
                  font-size: 1.5rem;
                }
              }
            }

            .sub-menu > a {
              color: red;
            }

            &:not(:last-child) {
              border-right: 1px solid $transparent-white;
            }

            .sub-menu {
              position: absolute;
              top: 100%;
              width: 100%;
              transform-origin: top;
              transform: rotateX(-90deg);
              transition: transform 0.3s linear;
              background-color: $yellow;

              .menu-item {
                border-color: $transparent-white;

                a::before {
                  content: "";
                }

                &:first-child {
                  border: 0;
                }
              }
            }

            &:hover,
            &.active {
              border-top: 2px solid $yellow;
              background-color: $transparent-white;

              a::before {
                color: white;
              }
            }

            &:hover .sub-menu {
              transform: rotateX(0deg);
            }

            a {
              font-size: 0.8rem;
              display: flex;
              flex-direction: column;
              align-items: center;
              color: #fff;
              text-decoration: none;
              text-transform: uppercase;
              height: 100%;
              width: 100%;
              padding: 1.5em 1em;

              @media (min-width: 768px) {
                font-size: 1rem;
              }
            }
          }
        }
      </style> --}}
      <li class="flex">
        <button
          class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
          @click="toggleProfileMenuPetani"
          @keydown.escape="closeProfileMenuPetani"
          aria-label="Account1"
          aria-haspopup="true"
        >
          <img
            class="object-cover w-12 h-12 rounded-full shadow-lg"
            src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
            alt=""
            loading="lazy"
          />
        </button>
        <template x-if="isProfileMenuPetaniOpen">
          <ul
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="closeProfileMenuPetani"
            @keydown.escape="closeProfileMenuPetani"
            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
            aria-label="submenu1"
          >
            <li class="flex">
              <a
                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                href="/lihat_profil_petani"
              >
                <svg
                  class="w-4 h-4 mr-3"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  ></path>
                </svg>
                <span>Profile</span>
              </a>
            </li>
            <li class="flex">
              <a
                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                href="/login"
              >
                <svg
                  class="w-4 h-4 mr-3"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                  ></path>
                </svg>
                <span>Log out</span>
              </a>
            </li>
          </ul>
        </template>
        {{-- <nav class="menu">
          <li class="menu-item">
            <a href="#0">Widgets</a>
            <ol class="sub-menu">
              <li class="menu-item"><a href="#0">Big Widgets</a></li>
              <li class="menu-item"><a href="#0">Bigger Widgets</a></li>
              <li class="menu-item"><a href="#0">Huge Widgets</a></li>
            </ol>
          </li>
        </nav> --}}
      </li>