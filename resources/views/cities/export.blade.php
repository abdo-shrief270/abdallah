<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
        <th>تكلفة الشحن</th>
        <th>المنطقة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->ship_cost }}</td>
            <td>{{ $city->gov->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
