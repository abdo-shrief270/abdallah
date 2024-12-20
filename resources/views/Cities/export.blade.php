<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
        <th>المنطقة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->gov->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
