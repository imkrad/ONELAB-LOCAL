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
            /* vertical-align: top; */
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
input[type=checkbox] { display: inline; }
input[type=checkbox]:before { font-family: DejaVu Sans; }
label {
  display: inline-block;
}

    </style>
    </head>

    <body>
        <?php 
            $lists = json_encode($configuration); 
            $lists = json_decode($configuration, true);   

            $tsr = json_encode($tsr); 
            $tsr = json_decode($tsr, true);   

            $samples = json_encode($samples); 
            $samples = json_decode($samples, true);   
            
        ?>

        <div style="font-family:Arial;">
            <img src="{{ asset('images/logo-sm.png') }}" alt="tag" style="position: absolute; top: -4; left: 90; width: 50px; height: 50px;">
            <center style="font-size: 11px; margin-bottom: 0px;">{{$configuration['name']}}</center>
            <center style="font-size: 11px; margin-bottom: 0px; font-weight: bold;">REGIONAL STANDARDS AND TESTING LABORATORIES</center>
            <center style="font-size: 11px;">Pettit Baracks, Zamboanga City | (062) 991-1024</center>
            <br/>
            
            <center style="font-size: 10px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">TECHNICAL SERVICES REQUEST</center>
            <center style="font-size: 10px; background-color: #CE2F14; color:#fff; font-weight: bold; padding: 2px;">ACCOUNTING COPY</center>
        </div>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
                <tr>
                    <td width="25%">TSR Number : </td>
                    <td width="25%"><span style="font-weight: bold;">{{$tsr['code']}}</span></td>
                    <td width="25%">Date and Time :</td>
                    <td width="25%"><span>{{$tsr['created_at']}}</span></td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Customer : </td>
                    <td colspan="3" width="75%"><span style="font-weight: bold; text-transform: uppercase;">{{$tsr['customer']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Address : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">{{$tsr['customer']['address']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Contact Number : </td>
                    <td width="25%"><span>{{$tsr['customer']['contact_no']}}</span></td>
                    <td width="25%">Email : </td>
                    <td width="25%"><span>{{$tsr['customer']['email']}}</span></td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">1.TESTING OR CALIBRATION SERVICES</h6>
        <table style="border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <thead style="background-color:#c8c8c8; padding: 5px; font-size: 9px;">
                <tr>    
                    <th width="20%">SAMPLE</th>
                    <th width="25%">TESTNAME</th>
                    <th width="25%">TEST METHOD</th>
                    <th width="10%">QNTY</th>
                    <th width="10%">COST</th>
                    <th width="10%">TOTAL</th>
                </tr>
            </thead>
            <tbody>
            @foreach($samples as $index=>$sample)
                <tr style="text-align: center;">
                    <td>{{$sample['samplename']}}</td>
                    <td>{{$sample['testname']}}</td>
                    <td>{{$sample['method']}}</td>
                    <td>{{$sample['count']}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$sample['fee']),'₱ ')}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$sample['fee']),'₱ ')*$sample['count'],2,".",",")}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style="text-align: center; padding: 3px; font-weight: bold; background-color:#c8c8c8;">
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">SUBTOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['subtotal']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">DISCOUNT</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['discount']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">TOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['total']),'₱ ')}}</td>
                </tr>
            </tfoot>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">2. DESCRIPTION OF THE SAMPLE(S) / REMARK(S)</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        <ul style="margin-left: -30px; list-style: none; color:#636363;">
                            @foreach($descs as $desc)
                                <li>{{$desc['code']}} : {{$desc['customer_description']}}, {{$desc['description']}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">3. CUSTOMER WALLET</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        n/a
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">4. DISCUSSED WITH CUSTOMER INCLUDING THE TERMS AND CONDITIONS AT THE BACK</h6>
        <table style="text-align: center; border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$tsr['conforme']}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer / Authorized Representative </br> <span style="font-size:9px; color: #606060;">(Conforme)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$user}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer Relation Officer </br> <span style="font-size:9px; color: #606060;">(Received by)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Technical Manager </br> <span style="font-size:9px; color: #606060;">(Approved by)</span></td>
                </tr>
            </tbody>
        </table>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Report due date : </td>
                    <td colspan="3" width="75%">
                        {{$tsr['due_at']}}  /  <span style="color: #606060;">4:00 PM (<i>or the next working day shall the due date falls on a holiday</i>)</span>
                    </td>
                </tr>
                <tr>
                    <td width="25%">Report number : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">n/a</span></td>
                </tr>
            </tbody>
        </table>
        <center style="margin-top: 15px; font-size: 8px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">FOR CASHIERING UNIT ONLY</center>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 0px;">
            <tbody>
                <tr>
                    <td style="border-right-style: hidden;" width="20%">Date Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Amount Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">OR Number</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-bottom-style: hidden; border-right-style: hidden;">Mode of Payment</td>
                    <td style="border-bottom-style: hidden;">
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cash</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cheque</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Bank Deposit/Transfer</label>
                    </td>
                    <td width="33.3%" style="text-align: center;" rowspan="2">
                        <span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span>
                    </td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Excess payment </br><span style="font-size: 9px;">(to debit on customer's wallet)</span></td>
                    <td>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">No</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Yes</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount: ________________
                    </td>
                </tr>
                <!-- <tr>
                    <td width="33.3%" style="text-align: center;"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span></td>
                </tr> -->
            </tbody>
        </table>
        <div class="page-break"></div>
        <div style="font-family:Arial;">
            <img src="{{ asset('images/logo-sm.png') }}" alt="tag" style="position: absolute; top: -4; left: 90; width: 50px; height: 50px;">
            <center style="font-size: 11px; margin-bottom: 0px;">{{$configuration['name']}}</center>
            <center style="font-size: 11px; margin-bottom: 0px; font-weight: bold;">REGIONAL STANDARDS AND TESTING LABORATORIES</center>
            <center style="font-size: 11px;">Pettit Baracks, Zamboanga City | (062) 991-1024</center>
            <br/>
            
            <center style="font-size: 10px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">TECHNICAL SERVICES REQUEST</center>
            <center style="font-size: 10px; background-color: #f3b700; color:#fff; font-weight: bold; padding: 2px;">CUSTOMER COPY</center>
        </div>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
                <tr>
                    <td width="25%">TSR Number : </td>
                    <td width="25%"><span style="font-weight: bold;">{{$tsr['code']}}</span></td>
                    <td width="25%">Date and Time :</td>
                    <td width="25%"><span>{{$tsr['created_at']}}</span></td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Customer : </td>
                    <td colspan="3" width="75%"><span style="font-weight: bold; text-transform: uppercase;">{{$tsr['customer']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Address : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">{{$tsr['customer']['address']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Contact Number : </td>
                    <td width="25%"><span>{{$tsr['customer']['contact_no']}}</span></td>
                    <td width="25%">Email : </td>
                    <td width="25%"><span>{{$tsr['customer']['email']}}</span></td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">1.TESTING OR CALIBRATION SERVICES</h6>
        <table style="border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <thead style="background-color:#c8c8c8; padding: 5px; font-size: 9px;">
                <tr>    
                    <th width="20%">SAMPLE</th>
                    <th width="25%">TESTNAME</th>
                    <th width="25%">TEST METHOD</th>
                    <th width="10%">QNTY</th>
                    <th width="10%">COST</th>
                    <th width="10%">TOTAL</th>
                </tr>
            </thead>
            <tbody>
            @foreach($samples as $index=>$sample)
                <tr style="text-align: center;">
                    <td>{{$sample['samplename']}}</td>
                    <td>{{$sample['testname']}}</td>
                    <td>{{$sample['method']}}</td>
                    <td>{{$sample['count']}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$sample['fee']),'₱ ')}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$sample['fee']),'₱ ')*$sample['count'],2,".",",")}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style="text-align: center; padding: 3px; font-weight: bold; background-color:#c8c8c8;">
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">SUBTOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['subtotal']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">DISCOUNT</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['discount']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">TOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['total']),'₱ ')}}</td>
                </tr>
            </tfoot>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">2. DESCRIPTION OF THE SAMPLE(S) / REMARK(S)</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        <ul style="margin-left: -30px; list-style: none; color:#636363;">
                            @foreach($descs as $desc)
                                <li>{{$desc['code']}} : {{$desc['customer_description']}}, {{$desc['description']}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">3. CUSTOMER WALLET</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        n/a
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">4. DISCUSSED WITH CUSTOMER INCLUDING THE TERMS AND CONDITIONS AT THE BACK</h6>
        <table style="text-align: center; border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$tsr['conforme']}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer / Authorized Representative </br> <span style="font-size:9px; color: #606060;">(Conforme)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$user}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer Relation Officer </br> <span style="font-size:9px; color: #606060;">(Received by)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Technical Manager </br> <span style="font-size:9px; color: #606060;">(Approved by)</span></td>
                </tr>
            </tbody>
        </table>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Report due date : </td>
                    <td colspan="3" width="75%">
                        {{$tsr['due_at']}}  /  <span style="color: #606060;">4:00 PM (<i>or the next working day shall the due date falls on a holiday</i>)</span>
                    </td>
                </tr>
                <tr>
                    <td width="25%">Report number : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">n/a</span></td>
                </tr>
            </tbody>
        </table>
        <center style="margin-top: 15px; font-size: 8px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">FOR CASHIERING UNIT ONLY</center>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 0px;">
            <tbody>
                <tr>
                    <td style="border-right-style: hidden;" width="20%">Date Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Amount Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">OR Number</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-bottom-style: hidden; border-right-style: hidden;">Mode of Payment</td>
                    <td style="border-bottom-style: hidden;">
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cash</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cheque</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Bank Deposit/Transfer</label>
                    </td>
                    <td width="33.3%" style="text-align: center;" rowspan="2">
                        <span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span>
                    </td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Excess payment </br><span style="font-size: 9px;">(to debit on customer's wallet)</span></td>
                    <td>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">No</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Yes</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount: ________________
                    </td>
                </tr>
                <!-- <tr>
                    <td width="33.3%" style="text-align: center;"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span></td>
                </tr> -->
            </tbody>
        </table>
        <div class="page-break"></div>
        <div style="font-family:Arial;">
            <img src="{{ asset('images/logo-sm.png') }}" alt="tag" style="position: absolute; top: -4; left: 90; width: 50px; height: 50px;">
            <center style="font-size: 11px; margin-bottom: 0px;">{{$configuration['name']}}</center>
            <center style="font-size: 11px; margin-bottom: 0px; font-weight: bold;">REGIONAL STANDARDS AND TESTING LABORATORIES</center>
            <center style="font-size: 11px;">Pettit Baracks, Zamboanga City | (062) 991-1024</center>
            <br/>
            
            <center style="font-size: 10px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">TECHNICAL SERVICES REQUEST</center>
            <center style="font-size: 10px; background-color: #762EAF; color:#fff; font-weight: bold; padding: 2px;">LABORATORY COPY</center>
        </div>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
                <tr>
                    <td width="25%">TSR Number : </td>
                    <td width="25%"><span style="font-weight: bold;">{{$tsr['code']}}</span></td>
                    <td width="25%">Date and Time :</td>
                    <td width="25%"><span>{{$tsr['created_at']}}</span></td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Customer : </td>
                    <td colspan="3" width="75%"><span style="font-weight: bold; text-transform: uppercase;">{{$tsr['customer']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Address : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">{{$tsr['customer']['address']['name']}}</span></td>
                </tr>
                <tr>
                    <td width="25%">Contact Number : </td>
                    <td width="25%"><span>{{$tsr['customer']['contact_no']}}</span></td>
                    <td width="25%">Email : </td>
                    <td width="25%"><span>{{$tsr['customer']['email']}}</span></td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">1.TESTING OR CALIBRATION SERVICES</h6>
        <table style="border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <thead style="background-color:#c8c8c8; padding: 5px; font-size: 9px;">
                <tr>    
                    <th width="20%">SAMPLE</th>
                    <th width="25%">TESTNAME</th>
                    <th width="25%">TEST METHOD</th>
                    <th width="10%">QNTY</th>
                    <th width="10%">COST</th>
                    <th width="10%">TOTAL</th>
                </tr>
            </thead>
            <tbody>
            @foreach($samples as $index=>$sample)
                <tr style="text-align: center;">
                    <td>{{$sample['samplename']}}</td>
                    <td>{{$sample['testname']}}</td>
                    <td>{{$sample['method']}}</td>
                    <td>{{$sample['count']}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$sample['fee']),'₱ ')}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$sample['fee']),'₱ ')*$sample['count'],2,".",",")}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot style="text-align: center; padding: 3px; font-weight: bold; background-color:#c8c8c8;">
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">SUBTOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['subtotal']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">DISCOUNT</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['discount']),'₱ ')}}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="font-size: 8px;">TOTAL</td>
                    <td><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim(str_replace(',','',$tsr['payment']['total']),'₱ ')}}</td>
                </tr>
            </tfoot>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">2. DESCRIPTION OF THE SAMPLE(S) / REMARK(S)</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        <ul style="margin-left: -30px; list-style: none; color:#636363;">
                            @foreach($descs as $desc)
                                <li>{{$desc['code']}} : {{$desc['customer_description']}}, {{$desc['description']}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">3. CUSTOMER WALLET</h6>
        <table style="border: 1px solid black; font-size: 9px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td>
                        n/a
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 style="font-size: 10px; margin-top: 12px;">4. DISCUSSED WITH CUSTOMER INCLUDING THE TERMS AND CONDITIONS AT THE BACK</h6>
        <table style="text-align: center; border: 1px solid black; font-size: 10px; margin-top: -22px;">
            <tbody>
                <tr>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                    <td style="min-height: 50px; padding: 20px; border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$tsr['conforme']}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer / Authorized Representative </br> <span style="font-size:9px; color: #606060;">(Conforme)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$user}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Customer Relation Officer </br> <span style="font-size:9px; color: #606060;">(Received by)</span></td>
                    <td width="33.3%"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Technical Manager </br> <span style="font-size:9px; color: #606060;">(Approved by)</span></td>
                </tr>
            </tbody>
        </table>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 10px;">
            <tbody>
                <tr>
                    <td width="25%">Report due date : </td>
                    <td colspan="3" width="75%">
                        {{$tsr['due_at']}}  /  <span style="color: #606060;">4:00 PM (<i>or the next working day shall the due date falls on a holiday</i>)</span>
                    </td>
                </tr>
                <tr>
                    <td width="25%">Report number : </td>
                    <td colspan="3" width="75%"><span style="text-transform: uppercase;">n/a</span></td>
                </tr>
            </tbody>
        </table>
        <center style="margin-top: 15px; font-size: 8px; background-color: #000; color:#fff; font-weight: bold; padding: 2px;">FOR CASHIERING UNIT ONLY</center>
        <table style="border: 1px solid black; font-size: 10px; margin-top: 0px;">
            <tbody>
                <tr>
                    <td style="border-right-style: hidden;" width="20%">Date Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Amount Paid</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">OR Number</td>
                    <td></td>
                    <td style="border-bottom-style: hidden;"></td>
                </tr>
                <tr>
                    <td style="border-bottom-style: hidden; border-right-style: hidden;">Mode of Payment</td>
                    <td style="border-bottom-style: hidden;">
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cash</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Cheque</label>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Bank Deposit/Transfer</label>
                    </td>
                    <td width="33.3%" style="text-align: center;" rowspan="2">
                        <span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span>
                    </td>
                </tr>
                <tr>
                    <td style="border-right-style: hidden;">Excess payment </br><span style="font-size: 9px;">(to debit on customer's wallet)</span></td>
                    <td>
                        <input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">No</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="a" style="margin-top: 22px;"/>&nbsp;&nbsp;<label for="a">Yes</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount: ________________
                    </td>
                </tr>
                <!-- <tr>
                    <td width="33.3%" style="text-align: center;"><span style="font-weight: bold; font-size: 11px; color: #072388; text-transform: uppercase;">{{$manager}}</span><hr style="margin-top: 0px; margin-bottom: 1px; border: .1px solid black; width: 80%;">Cashier </br> <span style="font-size:9px; color: #606060;">(Payment Received by)</span></td>
                </tr> -->
            </tbody>
        </table>
    </body>
</html>

<!-- style="border-bottom-style: hidden;" -->
