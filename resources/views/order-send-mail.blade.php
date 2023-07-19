{{--<h1>Order Confirmation</h1>--}}
{{--<h3>Hi {{ $name }}!</h3>--}}
{{--<p>Here is your order information. Please check again and contact us if got something is wrong.</p>--}}

{{--<h4><b>Customer information</b></h4>--}}
{{--<div class="user-item">--}}
{{--    <div class="client-info">--}}
{{--        <div class="d-flex justify-content-between pt-2">--}}
{{--            <p class="text-muted mb-0"><b><i class="fas fa-user-circle"></i></b> {{ $name }}--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="d-flex justify-content-between">--}}
{{--            <p class="text-muted mb-0"><b><i class="far fa-envelope"></i></b> {{ $email }}</p>--}}
{{--        </div>--}}
{{--        <div class="d-flex justify-content-between">--}}
{{--            <p class="text-muted mb-0"><b><i class="fas fa-phone-alt"></i></b> {{ $address }}</p>--}}
{{--        </div>--}}
{{--        <div class="d-flex justify-content-between">--}}
{{--            <p class="text-muted mb-0"><b><i class="fas fa-house-user"></i></b> {{ $phone_number }}</p>--}}
{{--        </div>--}}
{{--        @if ($notice)--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <p class="text-muted mb-0"><b><i class="far fa-file-alt"></i></b> {{ $notice }}</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}
{{--<hr>--}}
{{--<h4><b>Product detail</b></h4>--}}
{{--<table>--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Image</th>--}}
{{--        <th>Name</th>--}}
{{--        <th>Price</th>--}}
{{--        <th>Quantity</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach ($order_detail as $detail)--}}
{{--        <tr>--}}
{{--            <th><img src="{{ $detail->image }}" alt="" width="120px"></th>--}}
{{--            <th>{{ $detail->name }}</th>--}}
{{--            <th>{{ $detail->price }}</th>--}}
{{--            <th>{{ $detail->quantity }}</th>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
{{--<div class="order-detail">--}}
{{--    <div class="d-flex justify-content-between pt-2">--}}
{{--        <p class="text-muted mb-0">Payment method : 18KU-62IIK</p>--}}
{{--        <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $0</p>--}}
{{--    </div>--}}
{{--    <div class="d-flex justify-content-between">--}}
{{--        <p class="text-muted mb-0">Shipping code: 788152</p>--}}
{{--        <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Fee</span> $0</p>--}}
{{--    </div>--}}
{{--    <div class="d-flex justify-content-between">--}}
{{--        <p class="text-muted mb-0">Create Date : {{ $created_date }}</p>--}}
{{--        <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>--}}
{{--    </div>--}}
{{--    <hr>--}}
{{--    <div class="d-flex justify-content-between pt-2">--}}
{{--        <p class="fw-bold mb-0">Total:</p>--}}
{{--        <p class="text-muted mb-0">--}}
{{--            ${{ number_format($total, 0, '', '.') }}--}}
{{--        </p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<h3>Thank you for your order! We are pleased to confirm that we have received your order.</h3>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <style type="text/css">

        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0;
            mso-table-rspace: 0;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }


        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>
<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;"
                        bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="max-width:600px;">
                            <tr>
                                <td align="center"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                    <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                         width="125" height="120" style="display: block; border: 0;"/><br>
                                    <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                        Thank You For Your Order!
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="left"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                    <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                        We are pleased to confirm that we have received your order. Here is your order information. Please check again and contact us if got something is wrong.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left" bgcolor="#eeeeee"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                Order Confirmation #
                                            </td>
                                            <td width="25%" align="left" bgcolor="#eeeeee"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                2345678
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="25%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 5px 10px;">
                                                Image
                                            </td>
                                            <td width="25%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 5px 10px;">
                                                Name
                                            </td>
                                            <td width="25%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 5px 10px;">
                                                Price
                                            </td>
                                            <td width="25%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 5px 10px;">
                                                Quantity
                                            </td>
                                        </tr>
                                        @foreach($order_detail as $detail)
                                            <tr>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    <img src="{{ $detail->image }}" alt="">
                                                </td>
                                                <td width="35%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    {{ $detail->name }}
                                                </td>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    {{ $detail->price }}
                                                </td>
                                                <td width="15%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    {{ $detail->quantity }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top: 20px;">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="75%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                TOTAL
                                            </td>
                                            <td width="25%" align="left"
                                                style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                {{ $total }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td align="center" height="100%" valign="top" width="100%"
                        style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="max-width:660px;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <div
                                        style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                               style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">Client name:</p>
                                                    <p style="font-weight: 800;">Email:</p>
                                                    <p style="font-weight: 800;">Phon number:</p>
                                                    <p style="font-weight: 800;">Delivery Address:</p>
                                                    <p style="font-weight: 800;">Notice:</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div
                                        style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                               style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p>{{ $name }}</p>
                                                    <p>{{ $email }}</p>
                                                    <p>{{ $phone_number }}</p>
                                                    <p>{{ $address }}</p>
                                                    <p>{{ $notice }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style=" padding: 35px; background-color: #4b4b4b;" bgcolor="#1b9ba3">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="max-width:600px;">
                            <tr>
                                <td align="center"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                    <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                                        Get up to 30% sale off to your next order.
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 25px 0 15px 0;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7">
                                                <a href="http://127.0.0.1:8000/home" target="_blank"
                                                   style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #000000; padding: 15px 30px; border: 1px solid #bbbbbb; display: block;">Shopping
                                                    Again</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="max-width:600px;">
                            <tr>
                                <td align="center"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        Designed by Le Thanh Long
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
