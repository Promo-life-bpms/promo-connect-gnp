<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cotización Promo Life</title>
    <link rel="stylesheet" href="quotesheet/pl/style.css">
</head>

<body>|
    <header>
        {{-- <img src="quotesheet/pl/fondo-azul-superior.png" alt="" srcset="" class="fondo-head"> --}}
        <div class="fondo-head"></div>
        <div class="content" style="text-align: right">
            <img style="width:250px; height:170px; object-fit: contain;" src="{{asset('img/promolife.png')}}" class="logo">
        </div>
        <div class="content">
            <div style="margin-top: -80px;">
                <div style="width: 280px; padding-bottom: 10px;">
                    <span class="titulo1">Cotización</span>
                </div>
                <div style="width: 280px; text-align: center">
                    <span class="titulo2">QUOTATION SHEET</span>
                </div>
            </div>
        </div>
    </header>
    <footer>
        <p style="font-size: 12px; margin-left:3px; color:#000; text-align: right;" class="content">Pagina <span
                class="pagenum"></span> </p>
        <table
            style="magin-bottom: 0mm; position: absolute; bottom: 27mm; z-index: 10; width: 100%;background-color: rebeccapurple">
            {{-- {{ dd(1) }} --}}
            <tr style="background-color: rebeccapurple">
                <td style="background-color: rebeccapurple">
                    <div class="url"style="font-size: 15px; color:#fff ;">
                        <b>www.promolife.com.mx</b>
                    </div>
                </td>
            </tr>
        </table>

        <table style="magin-bottom: 0mm; position: absolute; bottom:70px; z-index:100;" class="content">
            <tr>
                <td>
                    <p style="font-size: 12px; color:#0b216e ;">
                        <span style="top: -15px; left: 38px;">
                            San Andr&#233;s Atoto 155, San Est&#233;ban, Naucalpan, Edo. Méx. C.P. 53550 <br>
                    </p>
                    </span>
                    <p style="font-size: 12px; color:#0b216e ;"> Tel. +52(55) 62690017 </p>
                </td>
            </tr>
        </table>
    </footer>



    <div style="margin-left:30px; margin-right:30px; margin-top:8px;">
        
        <div style="width: 100%; height:1px; background-color:black; margin-top:8px; "></div>
        
        @foreach($quotes as $quote)
            
            @php
                
                $quoteTechnique = optional(\App\Models\QuoteTechniques::where('quotes_id', $quote->id)->latest()->first());

                $product = optional(\App\Models\QuoteProducts::where('id', $quote->id)->latest()->first());

                $productData = json_decode($product->product);

                $productImage = \App\Models\Catalogo\Image::where('product_id', $productData->id)->get()->first();

                $productName = optional($productData)->name ?? 'Nombre no disponible';

                $productLogo = optional($productData)->logo;

                if($productLogo != '' || $productLogo !=null){
                    $filePath = public_path('/storage/logos/' . $productLogo);
                }else{
                    $logo = $productImage->image_url;

                    $filename = basename($logo);

                    $encodedFilename = rawurlencode($filename);

                    $encodedUrl = str_replace($filename, $encodedFilename, $logo);

                    $ch = curl_init($encodedUrl);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $imageData = curl_exec($ch);

                    curl_close($ch);

                    $image64 = base64_encode($imageData);
                }

            @endphp

                <br>
                <p style="margin-left:60px;">Cotizacion: <b>SQ-{{ $quote->id }}</b></p>
                <table border="1" >
                    <tr>
                        <th style="width:30%" >Imagen de Referencia</th>
                        <th style="width:70%" colspan="3">Descripción 
                    </th>
                    </tr>
                    <tr>
                        <td rowspan="6" style="width:30%"> 

                        @if($productLogo != null || $productLogo != '')
                            <center><img style="width:200px; height:240px; object-fit:contain;" src="{{$filePath}}" alt=""></center>
                        @else
                            <center><img style="width:200px; height:240px; object-fit:contain;" src="data:image/png;base64,{{$image64}}" alt=""></center>
                        @endif
                        </td>
                        <td colspan="3" style="width:70%; padding:2px;">{{ $productName }}</td>
                        
                    </tr>
                    <tr>
                        <th colspan="1" style="width:35%; padding:2px;">Tecnica de Personalizacion </th>
                        <th colspan="2" style="width:35%; padding:2px;" >Detalle de la Personalizacion </th>
                    </tr>
                    <tr>
                        <td colspan="1" style="width:35%">{{ isset($quoteTechnique->technique)? $quoteTechnique->technique :  '' }} </td>
                        <td colspan="2" style="width:35%">
                            <p> <b>Material: </b>  {{ isset($quoteTechnique->material)? $quoteTechnique->material : ''  }} </p>
                            <p> <b>Tamaño: </b>  {{ isset($quoteTechnique->size)? $quoteTechnique->size : '' }} </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width:10% ;"><center><b>Tiempo de Entrega: 10 días hábiles</b> </center>  </td>
                    </tr>
                    <tr>
                        <th colspan="1">Cantidad</th>
                        <th colspan="1">Precio Unitario</th>
                        <th colspan="1">Precio total</th>
                    </tr>
                    <tr>
                        <td colspan="1"> {{ $product->cantidad}} piezas</td>
                        <td colspan="1"> {{ $product->precio_unitario * 1.2}} </td>
                        <td colspan="1"> {{ $product->precio_total * 1.2 }}</td>
                    </tr>
                </table>
            <br>
        @endforeach

    </div>

    


    <div class="content condiciones">
        <p> Condiciones:</p>
        <ul>
            <li>Condiciones de pago acordadas con el vendedor</li>
            <li>Precios unitarios mostrados antes de IVA</li>
            <li>Precios mostrados en pesos mexicanos (MXP)</li>
            <li>El importe cotizado corresponde a la cantidad de piezas y número de tintas arriba mencionadas, si se
                modifica
                el número de piezas el precio cambiaría.</li>
            <li>El tiempo de entrega empieza a correr una vez recibida la Orden de Compra y autorizada la muestra física
                o
                virtual a solicitud del cliente.</li>
            <li>Vigencia de la cotización {{ $quote->latestQuotesUpdate->quotesInformation->shelf_life ?: 5 }} días
                {{ $quote->type_days == 0 ? 'hábiles' : 'naturales' }}.</li>
            <li>Producto cotizado de fabricación nacional o importación puede afinarse la fecha de entrega previo a la
                emisión
                de Orden de Compra.</li>
            <li>Producto cotizado disponible en stock a la fecha de esta cotización puede modificarse al paso de los
                días
                sin
                previo aviso. Solo se bloquea el inventario al recibir Orden de Compra</li>
        </ul>
    </div>
     
</body>

</html>
