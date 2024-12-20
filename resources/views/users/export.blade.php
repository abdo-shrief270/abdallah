<table>
    <thead>
    <tr>
        <th>الكود</th>
        <th>الاسم</th>
        <th>رقم الهاتف</th>
        <th>رقم البطاقة</th>
        <th>الحالة</th>
        <th>خط السير</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->id_number }}</td>
            <td>{{ $user->active?'نشط' : 'غير نشط' }}</td>
            <td>{{ $user->rout->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
