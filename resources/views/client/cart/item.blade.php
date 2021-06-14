<tr>
    <td style="border: solid;" class="product-thumbnail"><a href="#">
            <img src="{{ asset('assets/img/gallery/' . $product->product_image) }}"  style="width: 330px; height: 220px;" alt="product img" /></a></td>
    <td style="border: solid;" class="product-name"><a style="color: black;" href="{{ asset('products/' . $product->product_id) }}">
            {{ $product->product_name }}</a>
    </td>
    <td style="border: solid;" class="product-price">
        <span class="amount">{{ number_format($product->product_price) }} VNĐ</span>
    </td>
    <td style="border: solid;" class="product-quantity">
        <input type="number" value="{{ $product->product_quantity }}" disabled />
        <div style="margin-top: 10px">
            <a class=" btn btn-primary" href="{{ asset('cart?increase=1&product=' . $product->product_id) }}" role="button" style="width: 50px; height: 10px" >+</a>
            <a class="btn btn-primary" href="{{ asset('cart?decrease=1&product=' . $product->product_id) }}" role="button" style="width: 50px; height: 10px" >-</a>
        </div>
    </td>
    <td style="border: solid;"class="product-subtotal">
        {{ number_format($product->product_price * $product->product_quantity) }} VNĐ
    </td>
    <td style="border: solid;" class="product-remove"><a style="color: black;" href="{{ asset('cart?remove=true&product=' . $product->product_id) }}">
            <i class="fas fa-trash"></i></a></td>
</tr>