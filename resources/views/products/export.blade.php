<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
        <th>كود الصنف</th>
        <th>سعر الصنف الأساسي</th>
        <th>كمية الخصم</th>
        <th>السعر الأجمالي</th>
        <th>الكمية المتاحة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->net_price }}</td>
            <td>{{ $product->discount }}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->available_quantity}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
