<?php 
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Export-Report.xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
?>

<!DOCTYPE html>
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
                    <th>Income</th>
                    <th>Platform Fee</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>
            <?php $num = 0; ?>
            @foreach($orders as $order)
                <?php
                $base_price_all[] = array($order->base_price_product*$order->qty);
                $income_all[] = array($order->entry_price);
                $tax_all[] = array($order->tax);
                $profit[] = array($order->profit);
                ?>
                <tr>
                    <td>
                    <center>{{$num=$num+1}}</center>
                    </td>
                    <td>
                    <center>{{$order->date}}</center>
                    </td>
                    <td>
                    <center>{{$order->product->product_name}}</center>
                    </td>
                    <td>
                    <center>{{$order->product->code}}</center>
                    </td>
                    <td>
                    <center>{{$order->source->source}}</center>
                    </td>
                    <td>
                    <center>{{$order->qty}}</center>
                    </td>
                    <td style="text-align:right">
                    Rp. {{ number_format($order->base_price_product*$order->qty,0,',','.')}},-
                    </td>
                    <td style="text-align:right">
                    Rp. {{ number_format($order->entry_price,0,',','.')}},-
                    </td>
                    <td style="text-align:right">
                    Rp. {{ number_format($order->tax,0,',','.')}},-
                    </td>
                    <td style="text-align:right">
                    Rp. {{ number_format($order->profit,0,',','.')}},-
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align:right; background-color:green;">
                   <center><h3>Total</h3></center> 
                </td>
                <td style="text-align:right">
                @dd($order)
                </td>
            </tr>
            </tbody>
        </table>
    </body>
</html>