<html>
    <head>
        <title>Export Excel</title>
    </head>
    <body>
        <table width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Source Payment</th>
                    <th>Qty</th>
                    <th>Base Price</th>
                    <th>Sell Price</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
            <?php $num = 0; ?>
            @foreach($orders as $order)
                <tr>
                    <td>
                    {{$num=$num+1}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>