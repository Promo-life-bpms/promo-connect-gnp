<div>
    <div class="bg-white container mx-auto h-auto max-w-7xl grid md:grid-cols-2 p-3 gap-y-1">

         <div class="font-semibold text-slate-700 py-8 flex items-center space-x-2">
            <a class="text-secondary" href="/">Inicio</a>
            <p class="text-secondary"> / </p>
            <a class="text-secondary" href="#">Compradores</a>
        </div>

        <div class="relative col-span-1  mt-12">
            <input type="search"
                class="border-2 lg:block border-gray-400 py-2 text-sm bg-white rounded-md pr-10 pl-2 focus:outline-none focus:bg-white focus:text-gray-900 w-full"
                placeholder="Buscar..." autocomplete="off" name="busqueda" wire:model="search">
            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </span>
        </div>
        <br>

        @if (@Auth::user()->hasRole('admin'))
            <div class="grid grid-cols-2 gap-x-1 md:col-start-1 mt-1 col-end-1 md:mx-5 md:gap-x-3 lg:gap-x-10 lg:mx-32">
                <a href="{{ route('administradorcompras') }}">
                    <button class="bg-[#2B2D2F] text-white rounded p-1 w-full h-full">Compras</button>
                </a>
                <a href="{{ route('administradorpedidos') }}">
                    <button class="bg-[#2B2D2F] text-white rounded w-full h-full ">Muestras</button>
                </a>
            </div>
        @endif
        <div class="relative overflow-x-auto md:col-span-2">
            <div class="relative" wire:loading.class="opacity-70">
                <div class="absolute top-5 w-full">
                    <div wire:loading.flex class="justify-center">
                        <div class="sk-chase">
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                        </div>
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-secondary ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                            </th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell ">
                                E-MAIL
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class=" px-2 md:px-6 py-1 md:py-4 font-medium  whitespace-nowrap dark:text-white">
                                    <p class="text-gray-900"> {{ $user->name }} </p>
                                    <p class="md:hidden"> {{ $user->email }} </p>
                                </th>
                                <td class="px-6 py-4  hidden md:table-cell	">
                                    {{ $user->email }}
                                </td>
                                <td class="">
                                    <a href="/seller/compradores/{{ $user->id }}">
                                        <button class="bg-primary hover:bg-primary-dark text-white h-[50px] w-full px-1 font-bold">VER
                                            PEDIDOS</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $users->links() }}
            </div>
        </div>

    </div>
    <style>
        .sk-chase {
            width: 40px;
            height: 40px;
            position: relative;
            animation: sk-chase 2.5s infinite linear both;
        }

        .sk-chase-dot {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            animation: sk-chase-dot 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:before {
            content: '';
            display: block;
            width: 25%;
            height: 25%;
            background-color: #000;
            border-radius: 100%;
            animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:nth-child(1) {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2) {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3) {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4) {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5) {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6) {
            animation-delay: -0.6s;
        }

        .sk-chase-dot:nth-child(1):before {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2):before {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3):before {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4):before {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5):before {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6):before {
            animation-delay: -0.6s;
        }

        .opacity-70 {
            opacity: 0.7;
        }

        @keyframes sk-chase {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot {

            80%,
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot-before {
            50% {
                transform: scale(0.4);
            }

            100%,
            0% {
                transform: scale(1.0);
            }
        }
    </style>

</div>
