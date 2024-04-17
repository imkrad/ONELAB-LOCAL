<!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        html * {
            font-family:Arial, Helvetica, sans-serif;
        }
        table,
        td,
        th {
            border: .5px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 3px;
            vertical-align: top;
        }

        td {
            padding: 3px;
            vertical-align: top;
            /* text-align: center; */
        }
        input[type=checkbox] {
            transform: scale(.7);
        }
         .a {
            width: 55px; 
            height: 55px;
         }
         label {
        display: block;
        padding-left: 15px;
        text-indent: -15px;
        }
        input {
        width: 13px;
        height: 13px;
        padding: 0;
        margin:0;
        vertical-align: bottom;
        position: relative;
        top: -5px;
        left: 7px;
        *overflow: hidden;
        
        }
        .spec_table td {
margin-left: -20px;
font-size: .9em;
line-height: 1.1em;
border-top: none !important;
}

.page-break {
  page-break-after: always;
}

    </style>
    </head>

    <body>
        <?php 
            $lists = json_encode($configuration); 
            $lists = json_decode($configuration, true);   

            $quotation = json_encode($quotation); 
            $quotation = json_decode($quotation, true);   
            
        ?>

        <div style="font-family:Arial;">
            <center style="font-size: 10px; margin-bottom: 2px;">{{$configuration['name']}}</center>
            <center style="font-size: 10px; margin-bottom: 2px; font-weight: bold;">REGIONAL STANDARDS AND TESTING LABORATORIES</center>
            <center style="font-size: 10px;">Pettit Baracks, Zamboanga City | (062) 991-1024</center>
            <br/>
            
            <center style="font-size: 10px; font-weight: bold;  margin-bottom: 3px; margin-top: -5px;">QUOTATION</center>
            <center style="font-size: 10px; background-color: #1fdf62; color:#fff; font-weight: bold; padding: 2px;">CUSTOMER COPY</center>
        </div>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Quotation Code : </td>
                    <td width="25%"><span>{{$quotation['code']}}</span></td>
                    <td width="25%">Date and Time :</td>
                    <td width="25%"><span>{{$quotation['created_at']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Customer : </td>
                    <td colspan="3" width="75%"><span style="font-weight: bold;">{{$quotation['customer']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Address : </td>
                    <td colspan="3" width="75%"><span>{{$quotation['customer']['address']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Contact Number : </td>
                    <td width="25%"><span>{{$quotation['customer']['contact_no']}}</span></td>
                    <td width="25%">Email : </td>
                    <td width="25%"><span>{{$quotation['customer']['email']}}</span></td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 11px; margin-top: 12px;">1.TESTING OR CALIBRATION SERVICES</h6>
        <table style="border: 1px solid black; font-size: 10px; margin-top: -25px;">
            <thead style="background-color:#D7D6D9; padding: 5px; font-size: 9px;">
                <tr>    
                    <th width="20%">Sample</th>
                    <th width="25%">Test Requested</th>
                    <th width="25%">Test Method</th>
                    <th width="10%">#</th>
                    <th width="10%">Cost</th>
                    <th width="10%">Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($quotation['samples'] as $index=>$sample)
                <tr style="text-align: center;">
                    <td>{{$sample['name']}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style="text-align: center; font-weight: bold;">
                <tr>
                    <td colspan="4"></td>
                    <td><span style="font-size: 9px;">Subtotal</span></td>
                    <td><span style="font-weight: bold;">{{$quotation['subtotal']}}</span></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td><span style="font-size: 9px;">Discount</span></td>
                    <td><span style="font-weight: bold;">{{$quotation['discount']}}</span></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td><span style="font-size: 9px;">Total</span></td>
                    <td><span style="font-weight: bold;">{{$quotation['total']}}</span></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
