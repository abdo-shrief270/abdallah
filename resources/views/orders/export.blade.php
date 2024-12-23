<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
    </tr>
    </thead>
    <tbody>
    @foreach($routs as $rout)
        <tr>
            <td>{{ $rout->id }}</td>
            <td>{{ $rout->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
