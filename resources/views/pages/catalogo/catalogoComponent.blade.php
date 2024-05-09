<div class="bg-white">
    <div class="container mx-auto w-full px-2">
        <div class="font-semibold text-slate-700 py-8 flex items-center space-x-2">
            <a class="text-secondary" href="/">Inicio</a>
            <p class="text-secondary"> / </p>
            <a class="text-secondary" href="#">Catálogo de productos</a>
        </div>

        
        <div class="flex w-full flex-col md:flex-row">
            <style>
                .container1 {
                    width:400px;
                    margin: 0; 
                }

                @media (max-width: 767px) {
                    .container1 {
                        width:100%;
                        margin: 0; 
                        padding: 0 0 10% 5%;
                    }
                }
            </style>
            <div class="container1" >
                <div class="rounded-lg" style="border: 1px solid #bfbfbf; padding:20px;">
                    <p class="text-xl font-semibold text-secondary">Filtros</p>
                    <br>
                    <div>
                        <label class="text-sm" for="name">Nombre:</label>
                        <input wire:model='nombre' type="text"
                            class="py-1 px-2 border border-slate-700 rounded w-full" name="search" id="search"
                            placeholder="Nombre">
                    </div>
                    <br>
                    <div>
                        <label class="text-sm" for="color">Color:</label>
                        <input wire:model='color' type="text"
                            class="py-1 px-2 border border-slate-700 rounded w-full" name="color" id="color"
                            placeholder="Color">
                    </div>
                    <br>
                    <div>
                        <label  class="text-sm" for="piezas">Piezas:</label>
                        <div class="flex gap-1">
                            <input wire:model='stockMin' type="number"
                                class="py-1 px-2 border border-slate-700 rounded w-2/5" name="piezas"
                                id="piezas" placeholder="Max">
                            <p class="w-1/5 text-center text-sm">  - a - </p>
                            <input wire:model='stockMax' type="number"
                                class="py-1 px-2 border border-slate-700 rounded w-1/3" name="piezas1"
                                id="piezas1" placeholder="Min">
                        </div>
                    </div>
                    <br>
                    <div>
                        <label  class="text-sm" for="precio">Precio:</label>
                        <div class="flex gap-1">
                            <input wire:model='precioMin' type="number"
                                class="py-1 px-2 border border-slate-700 rounded w-2/5" name="precio1"
                                id="precio1" placeholder="Max">
                            <p class="w-1/5 text-center text-sm">  - a - </p>
                            <input wire:model='precioMax' type="number"
                                class="py-1 px-2 border border-slate-700 rounded w-1/3" name="precio"
                                id="precio" placeholder="Min">
                        </div>
                    </div>
                    <br>
                    <div>
                        <label  class="text-sm">Categoría:</label>
                        <div class="grid grid-cols-2 justify-center items-center mb-5">
                            <div class="col-span-12">
                                <a href="#" wire:click="changeCategory({{ 2 }})">
                                    <span class="inline-block {{ $category == 2 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-1 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        BEBIDAS
                                    </span>
                                </a>
                    
                                <a href="#" wire:click="changeCategory({{ 3 }})">
                                    <span class="inline-block {{ $category == 3 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-2 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        ESCRITURA
                                    </span>
                                </a>
                    
                                <a href="#" wire:click="changeCategory({{ 9 }})">
                                    <span class="inline-block {{ $category == 9 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-2 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        OFICINA
                                    </span>
                                </a>
                    
                                <a href="#" wire:click="changeCategory({{ 4 }})">
                                    <span class="inline-block {{ $category == 4 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-2 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        SALUD Y CUIDADO PERSONAL
                                    </span>
                                </a>
                    
                                <a href="#" wire:click="changeCategory({{ 14 }})">
                                    <span class="inline-block {{ $category == 14 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-2 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        TECNOLOGÍA
                                    </span>
                                </a>
                    
                                <a href="#" wire:click="changeCategory({{ 5 }})">
                                    <span class="inline-block {{ $category == 5 ? 'bg-primary' : 'bg-stone-700'}} hover:bg-stone-700 text-white px-2 py-1 font-semibold rounded-full my-2 mr-2" style="font-size: 10px;">
                                        TEXTIL
                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-full md:w-70 ml-10">
                <div class="relative mt-8" wire:loading.class="opacity-40">
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
                    @if (count($products) <= 0)
                        <div class="flex flex-wrap justify-center items-center flex-col  text-slate-700">
                            <p>No hay resultados de busqueda en la pagina actual</p>
                            @if (count($products->items()) == 0 && $products->currentPage() > 1)
                                <p>Click en la paginacion para ver mas resultados</p>
                            @endif
                        </div>
                    @endif
                    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 gap-8 pb-8 -mt-8">
                        @foreach ($products as $row)

                            @if(isset($row->firstImage) && $row->firstImage->image_url != null)
                                @php
                                    $haspvc = false;
                                    foreach ($row->productAttributes as $attribute) {
                                        if ($attribute->value === 'pvc') {
                                            $haspvc = true;
                                        }
                                    }
                                @endphp

                                @if($haspvc == false)
                                    <div class="w-full h-auto bg-white rounded-xl shadow-lg overflow-hidden p-4" style="border: 1px solid #d1d1d1;">
                                        <div
                                            class="flex sm:block gap-2 sm:bg-transparent bg-white rounded-md sm:rounded-none p-2 sm:p-0">
                                            @php
                                                /* $priceProduct = $row->price;
                                                if ($row->producto_promocion) {
                                                    $priceProduct = round($priceProduct - $priceProduct * ($row->descuento / 100), 2);
                                                } else {
                                                    $priceProduct = round($priceProduct - $priceProduct * ($row->provider->discount / 100), 2);
                                                }
                                                $priceProduct = round($priceProduct / ((100 - $utilidad) / 100), 2); */
                
                                                if($row->provider_id == 1){
                                                    /* FOR PROMOTIONAL */
                                                    $priceProduct = ($row->price) * 0.93751;
                                                }else if($row->provider_id == 2){
                                                    /* PROMO OPCION */
                
                                                    $priceProduct = ($row->price) * 0.87502;
                                                }else if($row->provider_id == 3){
                                                    /* INNOVATION */
                                                    $priceProduct = ($row->price) * 1.2329;
                                                }else{
                                                    /* OTRO */
                                                    $priceProduct = ($row->price);
                                                }
                                                /* $priceProduct = round($row->price * 0.9375, 2); */
                                    
                                            
                                            @endphp
                                            <div class="w-full flex justify-center  sm:p-5 sm:bg-white  text-center">
                                                <div class="">
                                                    <img src="{{ $row->firstImage ? $row->firstImage->image_url : '' }}"
                                                        class="w-auto h-52" alt="{{ $row->name }}">
                                                </div>
                                            </div>
                                            <div class="text-center flex-grow gap-2 flex flex-col justify-between sm:block">
                                                <div class="py-2 text-lg text-slate-700">
                                                    <h5 class="capitalize m-0">
                                                        {{ Str::limit($row->name, 22, '...') }}</h5>
                                                    <p class="m-0">$
                                                        {{number_format($priceProduct,2)}}</p>
                                                </div>
                                                <a href="{{ route('show.product', ['product' => $row->id]) }}"
                                                    class="block w-full bg-primary hover:bg-primary-dark text-white text-center rounded-sm font-semibold py-2 rounded-xl">
                                                    Cotizar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endif

                            @endif
 
                        @endforeach
                    </div>
                </div>
                <div class=" flex sm:hidden justify-center">
                    {{ $products->onEachSide(0)->links() }}
                </div>
                <div class="hidden sm:flex justify-center">
                    {{ $products->onEachSide(3)->links() }}
                </div>
            </div>
        </div>

        
        
        <br>
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
