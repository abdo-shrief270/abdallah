<table>
    <thead>
    <tr>
        <th class="text-center"> الكود </th>
        <th>اسم العميل</th>
        <th>رقم العميل</th>
        <th>مركز العميل</th>
        <th>العنوان</th>
        <th>اسم المندوب</th>
        <th>رقم المندوب</th>
        <th>اسم المنتج</th>
        <th>سعر المنتج</th>
        <th>الكمية</th>
        <th>اجمالي السعر</th>
        <th>الخصم الأساسي</th>
        <th>السعر النهائي</th>
        <th>تكلفة الشحن</th>
        <th>تكلفة الاوردر</th>
        <th>الخصم الأضافي</th>
        <th>التكلفة الأجمالية</th>
        <th>حالة الاوردر</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td class="checkbox-column text-center h4"> {{$order->id}} </td>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->customer->phone}}</td>
            <td>{{$order->customer->city->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->phone}}</td>
            <td>{{$order->product->name}}</td>
            <td class="text-primary">{{$order->product->net_price}}</td>
            <td>{{$order->quantity}}</td>
            <td class="text-warning">{{$order->product->net_price * $order->quantity}}</td>
            <td class="text-danger">{{$order->product->discount}}%</td>
            <td>{{$order->product->price * $order->quantity}}</td>
            <td class="text-warning">{{$order->customer->city->ship_cost}}</td>
            <td class="text-secondary">{{$order->product->price * $order->quantity + $order->customer->city->ship_cost}}</td>
            <td class="text-danger">{{$order->add_discount}}%</td>
            <td class="text-success">{{$order->total_price}}</td>
            <td>{!! $order->status=='new' ? '<span class="badge outline-badge-primary">لم يتم الاستلام</span>' : ( $order->status=='unFinished' ? '<span class="badge outline-badge-warning">جاري التوصيل</span>' : ( $order->status=='finished' ? '<span class="badge outline-badge-success">تم التوصيل</span>' :'<span class="badge outline-badge-danger">تم الألغاء</span>' ))!!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
