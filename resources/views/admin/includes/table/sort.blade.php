<div class="table-sort {{ ($sort == ($field ?? '')) ? 'table-sort-active' : '' }} {{ $order == 'asc' ? 'table-order-asc' : '' }}"
    data-field="{{ $field ?? '' }}">

        @if ($field == 'product_name')
           <table class="table_small table_order_detail">
               <tbody>
                   <tr>
                       <td class="order-product-img-column">

                       </td>
                       <td><span class="order-product-name-width">{{ $name ?? '' }}</span></td>
                       <td>Шт</td>
                       <td class="order-product-price-td">
                           Цена<br>за шт.
                       </td>
                   </tr>
               </tbody>
           </table>
        @else
            {{ $name ?? '' }}
        @endif
</div>
