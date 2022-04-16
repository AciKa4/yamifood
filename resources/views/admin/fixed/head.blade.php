<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="@yield("keywords")">
    <meta name="description" content="@yield("description")">
    <meta name="author" content="Aleksandar Arsic">
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset("assets/admin/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("assets/admin/css/custom.css")}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset("assets/img/favicon.ico")}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
