<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- Bootstrap packages for home page -->
    <link rel="stylesheet" href="{{ asset('WebPage/resources/boostrap/bootstrap.min.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type="text/css">

        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0;
            mso-table-rspace: 0;
        }

        table {
            border-collapse: collapse !important;
            background: white;
            padding: 20px;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .col-6 button {
            height: 40px;
            padding: 10px;
        }

    </style>
</head>
<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px">
                <tr>
                    <div class="container">
                        <div class="row d-flex justify-content-center" style="margin:40px">
                            <img src="https://f10-zpcloud.zdn.vn/203965711082389279/b67e83244d3c9f62c62d.jpg" alt="">
                            <hr>
                            <div class="col-6">
                                <h4>Dear!</h4>
                                <p>A password change has been requested for your account. If this was you, please use the link below to reset your password.</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ $url }}">
                                        <button class="btn btn-md btn-dark">Reset password</button>
                                    </a>
                                </div>
                                <p>
                                    If you did not do this action, no further action is required. <br><br>
                                    Regards. <br>
                                    E-project
                                </p>
                                <hr>
                                <p>
                                    If you're having trouble clicking the "Reset password" button, click the URL below:
                                </p>
                                <a href="{{ $url }}" class="text-decoration-none">{{ $url }}</a>
                            </div>
                        </div>
                    </div>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
