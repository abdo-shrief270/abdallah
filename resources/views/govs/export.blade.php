<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
        <th>المحافظة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($govs as $gov)
        <tr>
            <td>{{ $gov->id }}</td>
            <td>{{ $gov->name }}</td>
            <td>{{ $gov->rout->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
