<table>
    <thead>
    <tr>
        <th class="text-center"> الكود </th>
        <th>اسم العميل</th>
        <th>رقم العميل</th>
        <th>مركز العميل</th>
        <th>العنوان</th>
        <th>اسم المندب</th>
        <th>رقم المندب</th>
        <th>اسم المنتج</th>
        <th>سعر المنتج</th>
        <th>الكمية</th>
        <th>اجمالي السعر</th>
        <th>الخصم الأساسي</th>
        <th>السعر النهائي</th>
        <th>الخصم الأضافي</th>
        <th>تكلفة الاوردر</th>
        <th>حالة الاوردر</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td class="checkbox-column text-center h4"> {{$order->id}} </td>
            <td>{{$order->customer_name}}</td>
            <td>{{$order->customer_phone}}</td>
            <td>{{$order->city->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->phone}}</td>
            <td>{{$order->product->name}}</td>
            <td class="text-primary">{{$order->product->net_price}}</td>
            <td>{{$order->quantity}}</td>
            <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
            <td class="text-danger">{{$order->product->discount}}</td>
            <td>{{$order->product->price * $order->quantity}}</td>
            <td class="text-danger">{{$order->add_discount}}</td>
            <td class="text-success">{{$order->total_price}}</td>
            <td>{!! $order->status=='new' ? 'جديد' : ( $order->status=='unFinished' ? 'غير مستلم' : 'مستلم' )!!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
