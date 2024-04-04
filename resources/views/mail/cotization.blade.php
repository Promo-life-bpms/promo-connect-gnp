@component('mail::message')

# Cotizacion 

---

[Promo Life S. de R.L. de C.V.](https://www.promolife.mx/)
San Andrés Atoto 155A Naucalpan de Juárez, Méx. C.P. 53550  
Tel. +52(55) 62690017

Fecha: **{{ $date }}**

---

    @php

        $quoteTechnique = \App\Models\QuoteTechniques::where('quotes_id',$quotes->id)->get()->last();

        $product = \App\Models\QuoteProducts::where('id', $quotes->id)->get()->last();
        $productData = json_decode($product->product);

        $productName = isset($productData->name) ? $productData->name : 'Nombre no disponible';
        
            
    @endphp

#Cotizacion: **SQ-{{ $quotes->id }}**

## Descripción
{{ $productName }}

### Técnica de Personalización
| Descripción                      | {{ isset($quotes->currentQuotesTechniques->technique) ? $quotes->currentQuotesTechniques->technique : '' }} |
|----------------------------------|-------------------------------------------------------------------------------------------------------------------|
| Material                         | {{ isset($quoteTechnique->material) ? $quoteTechnique->material : '' }}                                           |
| Tamaño                           | {{ isset($quoteTechnique->size) ? $quoteTechnique->size : '' }}                                                   |

**Tiempo de Entrega:** 10 días hábiles

### Detalles del Producto
| Cantidad         | Precio Unitario  | Precio total      |
|------------------|------------------|-------------------|
| {{ $product->cantidad }} piezas | {{ $product->precio_unitario }} | {{ $product->precio_total }} |

---

---

Condiciones:
- Condiciones de pago acordadas en el contrato
- Precios unitarios mostrados antes de IVA
- Precios mostrados en pesos mexicanos (MXP)

@endcomponent