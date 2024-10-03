<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    代理店ユーザー
    ログイン成功

    <pre>
        {{Auth::user()}}
    </pre>
    <form action="{{route('agency.logout')}}" method="post">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>
