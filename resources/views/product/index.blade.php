<h1>Danh sách sản phẩm</h1>

<ul>
@foreach ($products as $product)
    <li>
        <a href="{{ route('product.detail', $product['id']) }}">
            {{ $product['name'] }}
        </a>
    </li>
@endforeach
</ul>

<a href="{{ route('product.add') }}">➕ Thêm sản phẩm</a>
