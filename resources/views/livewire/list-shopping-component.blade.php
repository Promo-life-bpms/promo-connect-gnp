<div class="w-full ">
    <h3 class="text-2xl font-semibold mx-20 mt-20">Mis compras</h3>

    <div class="w-full px-20 mt-10">
        <table class="w-full table-auto">
            <thead>
              <tr class="bg-blue-900 text-white">
                <th style="width: 10%;" class="p-2">#</th>
                <th style="width: 10%;">Imagen</th>
                <th style="width: 15%;">Poducto</th>
                <th style="width: 20%;">Descripción</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Total</th>
                <th style="width: 10%;">Fecha de pedido</th>
                <th style="width: 10%;">Status</th>
                @role('seller')
                  <th style="width: 5%;"></th>   
                @endrole
              </tr>
            </thead>
            <tbody>
              @foreach ($shoppings  as $shopping)
                @php
                  $product = json_decode($shopping->products[0]->product, true);
                  $productDB = \App\Models\Catalogo\Product::where('id',$product['id'])->get()->first();
                  $productImage = $productDB->firstImage;

                @endphp
                <tr class="border border-gray-300">
                    <td class="text-center py-5 px-6">{{ $loop->iteration }}</td>
                    <td class="text-center">
                      @if($product['logo'] != '')
                        <img src="/storage/logos/{{$product['logo'] }}" alt="" style="width: 100px;object-fit: contain;">
                      @else
                        <img src="{{$productImage->image_url}}" alt="" style="width: 100px;object-fit: contain;">
                      @endif
                    </td>
                    <td class="text-center">
                      {{ $product['name'] }}
                    </td>
                    <td>
                      {{ $product['description'] }}
                    </td>
                    <td class="text-center"> 
                      {{ $shopping->products[0]->cantidad }}
                    </td>
                    <td class="text-center">
                      {{ number_format($shopping->products[0]->precio_total, 2, '.', ',') }}
                    </td>
                    <td class="text-center">
                      {{ $shopping->products[0]->updated_at->format('d-m-Y') }}
                    </td>
                    <td class="text-center">
                      @switch($shopping->status)
                        @case(0)
                          <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Pendiente</span>
                            @break
                        @case(1)
                          <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">En proceso</span>
                            @break
                        @case(2)
                          <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Enviado</span>
                            @break
                        @case(3)
                          <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Entregado</span>
                            @break
                        @default
                            
                      @endswitch
                      <br>
                      

                      <!-- Modal toggle -->
                      <button data-modal-target="rating-modal-{{$shopping->id}}" data-modal-toggle="rating-modal-{{$shopping->id}}"  class="block text-white bg-primary hover:bg-primary focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center ml-8 " type="button">
                        Evaluar
                      </button>

                      <!-- Main modal -->
                      <div id="rating-modal-{{$shopping->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                          <!-- Modal content -->
                          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Evaluación
                              </h3>
                              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="rating-modal-{{$shopping->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                              </button>
                            </div>
                       <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                          <div class="flex items-center justify-center space-x-2">
                              <input type="hidden" name="rating" id="rating" value="0" class="hidden">

                              <label for="star{{$shopping->id}}1" class="text-2xl cursor-pointer" onclick="setRating(1, '{{$shopping->id}}')" style="color: #f6e05e;">&#9733;</label>
                              <input type="radio" id="star{{$shopping->id}}1"  name="star" value="{{$shopping->id}}1" class="hidden" />

                              <label for="star{{$shopping->id}}2"class="text-2xl cursor-pointer" onclick="setRating(2, '{{$shopping->id}}')">&#9733;</label>
                              <input type="radio" id="star{{$shopping->id}}2"  name="star" value="{{$shopping->id}}2" class="hidden" />

                              <label for="star{{$shopping->id}}3" class="text-2xl cursor-pointer" onclick="setRating(3, '{{$shopping->id}}')">&#9733;</label>
                              <input type="radio" id="star{{$shopping->id}}3"  name="star" value="{{$shopping->id}}3" class="hidden" />

                              <label for="star{{$shopping->id}}4" class="text-2xl cursor-pointer" onclick="setRating(4, '{{$shopping->id}}')">&#9733;</label>
                              <input type="radio" id="star{{$shopping->id}}4"  name="star" value="{{$shopping->id}}4" class="hidden" />

                              <label for="star{{$shopping->id}}5" class="text-2xl cursor-pointer" onclick="setRating(5, '{{$shopping->id}}')">&#9733;</label>
                              <input type="radio" id="star{{$shopping->id}}5"  name="star" value="{{$shopping->id}}6" class="hidden" />
                          </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                          <button type="button" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
                          <button data-modal-hide="rating-modal-{{$shopping->id}}"  type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Rechazar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                    <script>
                    function setRating(value, id) {
                      console.log(value);
                      console.log(id);
                      console.log(`star${id}${value}` );
                      initValue =`${id}${1}`;
                      maxValue = `${id}${5}`;
                      console.log(initValue)
                      // Cambiar el color de las estrellas según el valor seleccionado
                      for (let i = initValue; i <= maxValue; i++) {

                          star = document.getElementById(`star${id}${value}`);

                          console.log(`star${id}${value}`)
                          const rating = document.getElementById(`star${id}${value}`).value;
                          
                          if (i <= parseInt(rating)) {
                            console.log('sii')  
                            star.style.color = '#f6e05e !important';
                          } else {
                              console.log('noo')

                              star.style.color = '#718096 !important';
                          }
                      }
                    }
                    </script>

                    </td>
                    @role('seller')
                      <td>
                        <!-- Modal toggle -->
                        <button data-modal-target="edit-modal-{{$shopping->id}}" data-modal-toggle="edit-modal-{{$shopping->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2" type="button">
                          Cambiar status
                        </button>
      
                        <!-- Main modal -->
                        <div id="edit-modal-{{$shopping->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 ">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-start">
                                            Cambiar status
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('compras.status') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        
                                        <div class="p-4 md:p-5 space-y-4">

                                          <input type="text" value="{{$shopping->id}}" name="shopping_id" hidden>
                                          <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                          <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="0" {{ $shopping->status == 0 ? 'selected' : '' }}>Pendiente</option>
                                            <option value="1" {{ $shopping->status == 1 ? 'selected' : '' }}>En proceso</option>
                                            <option value="2" {{ $shopping->status == 2 ? 'selected' : '' }}>Enviado</option>
                                            <option value="3" {{ $shopping->status == 3 ? 'selected' : '' }}>Entregado</option>
                                          </select>
                                          
                                        </div>

                                        <div class="flex items-center p-4 md:p-5 ">
                                            <button type="submit" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                                            <button data-modal-hide="edit-modal-{{$shopping->id}}"  type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                      </td>
                    @endrole
                </tr>
              @endforeach
            </tbody>
        </table>
        <style>
          .pagination{
            display: flex;
          }

          .page-link{
            padding: 10px;
          }
        </style>
        <div class="flex w-full justify-end mt-5">
          {{ $shoppings->links() }}
        </div>

    </div>

</div>
