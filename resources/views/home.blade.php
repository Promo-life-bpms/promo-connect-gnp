@extends('layouts.cotizador')

@section('content')

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img1, .img2, .img3, .img4, .img4, .img5, .img6, .img7, .img8, .img9, .img10, .img11{
            width: 350px;
            height: 250px;
        }
        .img1:hover,
        .img2:hover,
        .img3:hover,
        .img4:hover,
        .img5:hover,
        .img6:hover,
        .img7:hover,
        .img8:hover,
        .img9:hover,
        .img10:hover,
        .img11:hover {
            background-size: cover;
            background-position: center;
            color: white;
        }

        .swiper-pagination-bullet-active{
            background: rgb(166 105 51);
        }
    </style>
    <div id="default-carousel" class="relative w-full text-center" data-carousel="slide" >
        <!-- Carousel wrapper -->
        <div class="relative h-80 overflow-hidden  md:h-[32rem] mx-auto max-w-7xl">
            @foreach ($banners as $item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/banners/' . $item->url_banner) }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." style="z-index:1; object-fit: contain; !important">
                </div>
            @endforeach
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            @for ($i = 0; $i < count($banners); $i++)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
            @endfor
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="shadow-lg inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-slate-300/50 group-hover:bg-slate-300/70  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg aria-hidden="true" class=" w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="bg-slate-300/50 group-hover:bg-slate-300/70 shadow-lg inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class=" w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>

    </div>
    <div class="max-h-40">


    </div>

    <div class="flex mx-auto max-w-7xl py-8 mt-10">
        <div style="width: 20px; height:38px;" class="bg-secondary"></div>
        <p class="text-secondary pl-4 text-xl mt-2">Categorias</p>
    </div>


    <div class="container mx-auto w-full mt-10"> 
        
        <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 gap-4">

            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img1" >
                        <svg width="60px" height="60px" viewBox="-20 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Bottle" sketch:type="MSLayerGroup" transform="translate(1.000000, 1.000000)" stroke="#6B6C6E" stroke-width="2">
                                    <path d="M7,6 L7,13 C7,13 0,23.9 0,25 L0,60 C0,61.1 0.9,62 2,62 L20,62 C21.1,62 22,61.1 22,60 L22,25 C22,23.9 15,13 15,13 L15,6" id="Shape" sketch:type="MSShapeGroup"></path>
                                    <path d="M17,4 C17,5.1 16.1,6 15,6 L7,6 C5.9,6 5,5.1 5,4 L5,2 C5,0.9 5.9,0 7,0 L15,0 C16.1,0 17,0.9 17,2 L17,4 L17,4 Z" id="Shape" sketch:type="MSShapeGroup"></path>
                                </g>
                            </g>
                        </svg>
                        <p class="font-bold mt-6 text-center">BEBIDAS</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 3]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img3" >

                        <svg version="1.1" id="designs" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                width="60px" height="60px" viewBox="0 0 32 32" xml:space="preserve">
                            <style type="text/css">
                                .sketchy_een{fill:#b8b8b8;}
                            </style>
                            <path class="sketchy_een" d="M21.194,17.383c0.026-0.034,0.051-0.067,0.077-0.101c0.007-0.009,0.015-0.019,0.022-0.028
                                C21.26,17.297,21.227,17.34,21.194,17.383z M28.916,3.008c-0.004,0.722-0.018,1.443-0.026,2.167
                                c-0.006,0.712-0.012,1.419-0.066,2.129c-0.056,0.758-0.193,1.514-0.334,2.26c-0.127,0.671-0.289,1.337-0.531,1.978
                                c-0.316,0.84-0.698,1.656-1.067,2.475c-0.344,0.756-0.718,1.49-1.156,2.195c-0.478,0.77-1.045,1.494-1.646,2.171
                                c-0.265,0.302-0.543,0.591-0.81,0.889c-0.283,0.316-0.561,0.637-0.846,0.951c-0.32,0.35-0.909,0.324-1.232,0
                                c-0.328-0.328-0.346-0.909,0-1.234c0.462-0.432,0.88-0.915,1.321-1.373c0.399-0.418,0.78-0.848,1.138-1.301
                                c0.538-0.714,1.018-1.465,1.429-2.259c0.217-0.422,0.414-0.854,0.617-1.285c0.165-0.351,0.334-0.699,0.491-1.053
                                c0.234-0.59,0.448-1.186,0.595-1.805c0.04-0.167,0.068-0.338,0.101-0.507c-0.648,1.221-1.446,2.358-2.239,3.49
                                c-0.515,0.736-1.059,1.449-1.606,2.159c-0.567,0.736-1.168,1.443-1.735,2.177c0.02-0.027,0.041-0.054,0.062-0.081
                                c-0.035,0.044-0.069,0.089-0.103,0.133c-0.333,0.428-0.674,0.847-1.016,1.269c-0.141,0.173-0.412,0.259-0.625,0.259
                                c-0.032,0-0.061-0.015-0.092-0.018c-0.069,0.045-0.14,0.088-0.22,0.11c-0.208,0.057-0.38,0.019-0.566-0.054
                                c0.003,0.001,0.006,0.002,0.009,0.004c-0.027-0.011-0.055-0.021-0.082-0.031c-0.546,0.665-1.116,1.302-1.707,1.929
                                c-0.583,0.619-1.148,1.252-1.735,1.868c-0.593,0.621-1.218,1.21-1.845,1.799c-0.629,0.589-1.262,1.174-1.914,1.737
                                c-0.625,0.541-1.256,1.069-1.862,1.628c-0.322,0.3-0.639,0.607-0.971,0.895c-0.374,0.32-0.78,0.599-1.19,0.868
                                c-0.241,0.16-0.54,0.136-0.789,0.011c-0.278,0.161-0.654,0.204-0.919,0.013c-0.228-0.166-0.45-0.342-0.673-0.516
                                c-0.133,0.176-0.267,0.352-0.4,0.528c-0.141,0.185-0.275,0.326-0.509,0.39C3.948,30.03,3.708,30,3.511,29.885
                                c-0.372-0.219-0.573-0.786-0.304-1.164c0.161-0.225,0.326-0.448,0.49-0.669c0.026-0.035,0.056-0.06,0.083-0.092
                                c-0.021-0.02-0.044-0.037-0.066-0.057c-0.33-0.312-0.342-0.822-0.105-1.189c0.011-0.026,0.012-0.054,0.025-0.079
                                c0.239-0.452,0.505-0.891,0.76-1.335c0.219-0.384,0.448-0.764,0.675-1.146c0.454-0.762,0.941-1.506,1.433-2.245
                                c0.486-0.728,0.979-1.453,1.504-2.155c0.559-0.752,1.132-1.494,1.709-2.233c0.561-0.718,1.112-1.445,1.697-2.145
                                c0.578-0.692,1.168-1.373,1.774-2.042c-0.102-0.228-0.157-0.434-0.089-0.684c0.034-0.121,0.097-0.231,0.176-0.327
                                c0.011-0.129,0.045-0.255,0.114-0.352c0.348-0.477,0.75-0.893,1.16-1.315c0.344-0.356,0.683-0.716,1.029-1.07
                                c0.728-0.744,1.49-1.433,2.302-2.084c0.732-0.587,1.465-1.18,2.237-1.715c0.758-0.525,1.532-1.015,2.326-1.479
                                c0.376-0.221,0.75-0.442,1.138-0.639c0.412-0.211,0.832-0.404,1.258-0.587c0.901-0.388,1.801-0.766,2.742-1.047
                                C27.659,2.011,27.738,2,27.816,2c0.212,0,0.412,0.085,0.572,0.221C28.695,2.351,28.916,2.657,28.916,3.008z M17.118,18.088
                                c-0.058-0.035-0.12-0.064-0.177-0.101c-0.583-0.38-1.116-0.832-1.608-1.325c-0.446-0.444-0.886-0.931-1.232-1.459
                                c-0.041-0.064-0.07-0.135-0.108-0.201c-0.555,0.605-1.112,1.208-1.642,1.833c-0.628,0.74-1.219,1.513-1.813,2.278
                                c-1.001,1.318-1.96,2.664-2.881,4.04c-0.46,0.689-0.901,1.391-1.333,2.099c-0.215,0.352-0.42,0.71-0.623,1.067
                                c-0.102,0.181-0.2,0.363-0.303,0.543c0.205,0.193,0.408,0.387,0.618,0.574c0.229,0.202,0.469,0.389,0.7,0.587
                                c0.18-0.113,0.358-0.228,0.532-0.354c0.495-0.396,0.952-0.833,1.417-1.26c0.495-0.456,1.005-0.893,1.516-1.329
                                c0.639-0.547,1.276-1.096,1.902-1.658c0.633-0.573,1.276-1.144,1.865-1.765c0.605-0.637,1.194-1.292,1.783-1.946
                                c0.306-0.34,0.611-0.684,0.909-1.031C16.804,18.488,16.96,18.286,17.118,18.088z M26.535,5.79c0.206-0.564,0.398-1.13,0.516-1.717
                                c-0.492,0.169-0.98,0.348-1.464,0.545C25.136,4.809,24.68,5,24.25,5.234c-0.464,0.257-0.927,0.517-1.377,0.794
                                c-0.882,0.542-1.735,1.125-2.563,1.747c-0.98,0.765-1.955,1.546-2.835,2.426c-0.452,0.454-0.893,0.919-1.333,1.383
                                c-0.409,0.432-0.839,0.846-1.222,1.3c0.084,0.199,0.17,0.397,0.254,0.596c0.088,0.201,0.177,0.404,0.285,0.594
                                c0.099,0.178,0.212,0.346,0.332,0.509c0.457,0.558,0.983,1.075,1.546,1.527c0.488,0.371,0.987,0.756,1.548,1.005
                                c0.067,0.028,0.132,0.058,0.199,0.087c0.384-0.453,0.76-0.911,1.128-1.378c0.361-0.454,0.734-0.9,1.092-1.354
                                c0.315-0.408,0.632-0.816,0.95-1.221c0.689-0.892,1.336-1.824,1.953-2.767c0.609-0.929,1.179-1.901,1.62-2.923
                                C26.066,6.971,26.316,6.385,26.535,5.79z"/>
                            </svg>
                        <p class="font-bold mt-6 text-center p-2">ESCRITURA</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 9]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img3" >
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            width="60px" height="60px" viewBox="0 0 33 32" enable-background="new 0 0 33 32" xml:space="preserve">
                            <g>
                                <path fill="#b8b8b8" d="M32.5,19.5c-0.276,0-0.5,0.224-0.5,0.5v10.5c0,0.275-0.225,0.5-0.5,0.5H19v-8c0-0.276-0.224-0.5-0.5-0.5
                                    S18,22.724,18,23v8h-3v-8c0-0.276-0.224-0.5-0.5-0.5S14,22.724,14,23v8H1.5C1.225,31,1,30.775,1,30.5V20c0-0.276-0.224-0.5-0.5-0.5
                                    S0,19.724,0,20v10.5C0,31.327,0.673,32,1.5,32h30c0.827,0,1.5-0.673,1.5-1.5V20C33,19.724,32.776,19.5,32.5,19.5z"/>
                                <path fill="#b8b8b8" d="M31.5,5H23V1.5C23,0.673,22.327,0,21.5,0h-10C10.673,0,10,0.673,10,1.5V5H1.5C0.673,5,0,5.673,0,6.5v10
                                    C0,17.327,0.673,18,1.5,18H14v0.736c0,1.379,1.121,2.5,2.5,2.5s2.5-1.121,2.5-2.5V18h12.5c0.827,0,1.5-0.673,1.5-1.5v-10
                                    C33,5.673,32.327,5,31.5,5z M11,1.5C11,1.225,11.225,1,11.5,1h10C21.775,1,22,1.225,22,1.5V5H11V1.5z M18,18.736
                                    c0,0.827-0.673,1.5-1.5,1.5s-1.5-0.673-1.5-1.5V18h3V18.736z M32,16.5c0,0.275-0.225,0.5-0.5,0.5h-30C1.225,17,1,16.775,1,16.5v-10
                                    C1,6.225,1.225,6,1.5,6H14v9c0,0.276,0.224,0.5,0.5,0.5S15,15.276,15,15V6h3v9c0,0.276,0.224,0.5,0.5,0.5S19,15.276,19,15V6h12.5
                                    C31.775,6,32,6.225,32,6.5V16.5z"/>
                            </g>
                        </svg>
                        <p class="font-bold mt-6 text-center p-2">OFICINA </p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 4]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img4" >
                        <svg width="60px" height="60px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.74157 20.5545C4.94119 22 7.17389 22 11.6393 22H12.3605C16.8259 22 19.0586 22 20.2582 20.5545M3.74157 20.5545C2.54194 19.1091 2.9534 16.9146 3.77633 12.5257C4.36155 9.40452 4.65416 7.84393 5.76506 6.92196M3.74157 20.5545C3.74156 20.5545 3.74157 20.5545 3.74157 20.5545ZM20.2582 20.5545C21.4578 19.1091 21.0464 16.9146 20.2235 12.5257C19.6382 9.40452 19.3456 7.84393 18.2347 6.92196M20.2582 20.5545C20.2582 20.5545 20.2582 20.5545 20.2582 20.5545ZM18.2347 6.92196C17.1238 6 15.5361 6 12.3605 6H11.6393C8.46374 6 6.87596 6 5.76506 6.92196M18.2347 6.92196C18.2347 6.92196 18.2347 6.92196 18.2347 6.92196ZM5.76506 6.92196C5.76506 6.92196 5.76506 6.92196 5.76506 6.92196Z" stroke="#b8b8b8" stroke-width="1.5"/>
                            <path opacity="0.5" d="M12 12.1913L11.4813 12.7331C11.7713 13.0108 12.2287 13.0108 12.5187 12.7331L12 12.1913ZM11.0429 15.8656L10.5992 16.4703L11.0429 15.8656ZM12.9571 15.8656L12.5135 15.2609L12.9571 15.8656ZM12 16.3276L12 17.0776L12 16.3276ZM11.4865 15.2609C11.0686 14.9542 10.6081 14.5712 10.2595 14.1681C9.89122 13.7423 9.75 13.4113 9.75 13.1967H8.25C8.25 13.9666 8.6912 14.6479 9.1249 15.1493C9.57819 15.6735 10.1391 16.1327 10.5992 16.4703L11.4865 15.2609ZM9.75 13.1967C9.75 12.6207 10.0126 12.37 10.2419 12.2896C10.4922 12.2019 10.9558 12.2299 11.4813 12.7331L12.5187 11.6496C11.6943 10.8603 10.6579 10.5543 9.74566 10.8741C8.81245 11.2012 8.25 12.0995 8.25 13.1967H9.75ZM13.4008 16.4703C13.8609 16.1327 14.4218 15.6735 14.8751 15.1493C15.3088 14.6479 15.75 13.9666 15.75 13.1967H14.25C14.25 13.4113 14.1088 13.7423 13.7405 14.1681C13.3919 14.5713 12.9314 14.9542 12.5135 15.2609L13.4008 16.4703ZM15.75 13.1967C15.75 12.0995 15.1875 11.2012 14.2543 10.8741C13.3421 10.5543 12.3057 10.8603 11.4813 11.6496L12.5187 12.7331C13.0442 12.2299 13.5078 12.2019 13.7581 12.2896C13.9874 12.37 14.25 12.6207 14.25 13.1967H15.75ZM10.5992 16.4703C10.9678 16.7407 11.3816 17.0775 12 17.0776L12 15.5776C11.9756 15.5776 11.9605 15.5775 11.9061 15.5488C11.8202 15.5034 11.7128 15.4269 11.4865 15.2609L10.5992 16.4703ZM12.5135 15.2609C12.2872 15.4269 12.1798 15.5034 12.0939 15.5488C12.0395 15.5775 12.0244 15.5776 12 15.5776L12 17.0776C12.6184 17.0776 13.0322 16.7407 13.4008 16.4703L12.5135 15.2609Z" fill="#b8b8b8"/>
                            <path opacity="0.5" d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6" stroke="#b8b8b8" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <p class="font-bold mt-6 text-center p-2">SALUD Y CUIDADO PERSONAL</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 14]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img5" >
                        <svg width="60px" height="60px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 12C2.25 6.61522 6.61522 2.25 12 2.25C17.3848 2.25 21.75 6.61522 21.75 12V14.7927C21.8282 14.765 21.9123 14.75 22 14.75C22.4142 14.75 22.75 15.0858 22.75 15.5V17.5C22.75 17.9142 22.4142 18.25 22 18.25C21.9094 18.25 21.8225 18.2339 21.742 18.2045C21.7365 18.4049 21.7272 18.5895 21.7116 18.7587C21.6712 19.194 21.5841 19.5954 21.3689 19.9712C21.2257 20.2213 21.0455 20.448 20.8341 20.6429C20.5137 20.9382 20.1423 21.106 19.7312 21.2306C19.3426 21.3484 18.86 21.4436 18.2884 21.5563L18.2142 21.5709C17.8239 21.6479 17.4695 21.7178 17.1745 21.7411C16.8571 21.7661 16.4993 21.7486 16.1565 21.5557C15.9536 21.4415 15.7762 21.288 15.6334 21.1053C15.3961 20.8017 15.3167 20.4552 15.2824 20.1362C15.2499 19.8354 15.25 19.4644 15.25 19.0479V13.8117C15.25 13.4578 15.25 13.1398 15.2754 12.8788C15.3025 12.6002 15.3647 12.2991 15.5481 12.0202C15.6991 11.7905 15.9016 11.5978 16.1411 11.4597C16.4362 11.2896 16.7438 11.252 17.0215 11.2501C17.2782 11.2483 17.5863 11.2787 17.9223 11.3119L17.9923 11.3188C18.578 11.3765 19.0707 11.4251 19.47 11.5042C19.7437 11.5584 20.0031 11.632 20.2462 11.7485C20.1133 7.30853 16.4722 3.75 12 3.75C7.52777 3.75 3.88668 7.30853 3.75376 11.7485C3.99693 11.632 4.25631 11.5584 4.52996 11.5042C4.92926 11.4251 5.42201 11.3765 6.00766 11.3188L6.07774 11.3119C6.41372 11.2787 6.7218 11.2483 6.97846 11.2501C7.25619 11.252 7.56376 11.2896 7.85887 11.4597C8.09845 11.5978 8.30087 11.7905 8.45194 12.0202C8.63531 12.2991 8.6975 12.6002 8.72463 12.8788C8.75005 13.1398 8.75003 13.4578 8.75 13.8117V19.0479C8.75003 19.4644 8.75006 19.8354 8.71765 20.1362C8.68328 20.4552 8.60391 20.8017 8.36662 21.1053C8.22384 21.288 8.04645 21.4415 7.84347 21.5557C7.50067 21.7486 7.14291 21.7661 6.82548 21.7411C6.53055 21.7178 6.17612 21.6479 5.78584 21.5709L5.71157 21.5563C5.13998 21.4436 4.65744 21.3484 4.26885 21.2306C3.85769 21.106 3.48634 20.9382 3.1659 20.6429C2.95448 20.448 2.77432 20.2213 2.63113 19.9712C2.41589 19.5954 2.32879 19.194 2.28845 18.7587C2.27277 18.5895 2.26348 18.4049 2.25798 18.2045C2.17754 18.2339 2.09065 18.25 2 18.25C1.58579 18.25 1.25 17.9142 1.25 17.5V15.5C1.25 15.0858 1.58579 14.75 2 14.75C2.08766 14.75 2.17181 14.765 2.25 14.7927V12ZM3.75 17.1933C3.75 17.8449 3.75075 18.2825 3.78205 18.6203C3.8122 18.9456 3.86609 19.1093 3.93282 19.2259C4.00072 19.3444 4.08514 19.4502 4.18242 19.5398C4.27434 19.6245 4.41013 19.7061 4.70398 19.7951C5.01235 19.8886 5.42073 19.97 6.03738 20.0916C6.47899 20.1787 6.74625 20.2302 6.94334 20.2457C7.04961 20.2541 7.09804 20.2481 7.11422 20.2448C7.13915 20.2297 7.16292 20.2092 7.18363 20.183C7.1898 20.1709 7.21084 20.1188 7.22628 19.9755C7.24897 19.7649 7.25 19.476 7.25 19.0104V13.8446C7.25 13.4474 7.24917 13.2036 7.23169 13.0241C7.21948 12.8988 7.2026 12.8534 7.19802 12.8434C7.17461 12.8081 7.1457 12.7811 7.11498 12.7623C7.10182 12.7588 7.06058 12.7507 6.96825 12.75C6.80038 12.7489 6.57237 12.7704 6.19054 12.808C5.55982 12.8702 5.14042 12.9124 4.8214 12.9756C4.51569 13.0362 4.37392 13.1037 4.27863 13.1755C4.1388 13.2808 4.01933 13.4167 3.92927 13.5759C3.86481 13.6899 3.81135 13.8541 3.78152 14.1848C3.75071 14.5264 3.75 14.9699 3.75 15.6276V17.1933ZM20.25 15.6276C20.25 14.9699 20.2493 14.5264 20.2185 14.1848C20.1886 13.8541 20.1352 13.6899 20.0707 13.5759C19.9807 13.4167 19.8612 13.2808 19.7214 13.1755C19.6261 13.1037 19.4843 13.0362 19.1786 12.9756C18.8596 12.9124 18.4402 12.8702 17.8095 12.808C17.4276 12.7704 17.1996 12.7489 17.0318 12.75C16.9394 12.7507 16.8982 12.7588 16.885 12.7623C16.8543 12.7811 16.8254 12.8081 16.802 12.8434C16.7974 12.8534 16.7805 12.8988 16.7683 13.0241C16.7508 13.2036 16.75 13.4474 16.75 13.8446V19.0104C16.75 19.476 16.751 19.7649 16.7737 19.9755C16.7892 20.1188 16.8102 20.1709 16.8164 20.183C16.8371 20.2092 16.8609 20.2297 16.8858 20.2448C16.902 20.2481 16.9504 20.2541 17.0567 20.2457C17.2538 20.2302 17.521 20.1787 17.9626 20.0916C18.5793 19.97 18.9876 19.8886 19.296 19.7951C19.5899 19.7061 19.7257 19.6245 19.8176 19.5398C19.9149 19.4502 19.9993 19.3444 20.0672 19.2259C20.1339 19.1093 20.1878 18.9456 20.218 18.6203C20.2493 18.2825 20.25 17.8449 20.25 17.1933V15.6276Z" fill="#b8b8b8"/>
                        </svg>
                        <p class="font-bold mt-6 text-center p-2">TECNOLOGÍA</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 5]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-secondary hover:text-stone-300 img5" >
                        <svg fill="#b8b8b8" width="60px" height="60px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 4.96h-5.975v-1.918c0-1.655-1.346-3-3-3h-3.989c-1.655 0-3 1.345-3 3v1.918h-6.037c-1.104 0-2 0.896-2 2v22.999c0 1.105 0.896 2 2 2h22c1.105 0 2-0.895 2-2v-22.999c0-1.104-0.895-2-2-2h0zM13.037 3.042c0-0.552 0.448-1 1-1h3.989c0.552 0 1 0.448 1 1v1.918h-5.989v-1.918zM27 29.959h-22v-22.999h6.037v2.058s-0.027 0.999 0.994 0.999c1.125 0 1.006-0.999 1.006-0.999v-2.058h5.989v2.058s-0.067 1.004 0.996 1.004c1 0 1.004-1.004 1.004-1.004v-2.058h5.974v22.999z"></path>
                        </svg>
                        <p class="font-bold mt-6 text-center p-2">TEXTIL</p>
                    </div>
                </a>
            </div>
        </div>
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 3,
          spaceBetween: 30,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
    </script>
    <div class="container mx-auto max-w-7xl">

        <div class="flex mx-auto max-w-7xl py-8 mt-10">
            <div style="width: 20px; height:38px;" class="bg-secondary"></div>
            <p class="text-secondary pl-4 text-xl mt-2">Productos más vendidos</p>
        </div>
       
        <div class="container mx-auto max-w-7xl py-8 bg-white ">
            <div class="flex flex-wrap justify-center">
                @foreach ($latestProducts as $product)
                    <a href="{{ route('show.product', ['product' => $product->id]) }}" class="flex items-center justify-center text-center overflow-hidden mx-4 group">
                        <img src="{{ isset($product->firstImage->image_url) ? $product->firstImage->image_url : asset('/img/default.jpg') }}" alt="" srcset="" class="max-h-40 w-auto overflow-hidden group-hover:scale-105 transition-transform duration-300">
                    </a>
                @endforeach
            </div>
        </div>  

        <div class="container max-w-7xl">
            <div class="relative overflow-hidden  text-center">
                <img class="h-auto w-full" src="{{ asset('img/banner-anahuac.png') }}" alt="">
            </div>
        </div>
        
    </div>

@endsection
