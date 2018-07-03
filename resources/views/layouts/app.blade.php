<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="ja">
    <title>なづけて</title>
</head>

<body>
<div class="container">
<nav class="navbar navbar-default">
    <!-- Navbar Contents -->
</nav>
@if (!Auth::user())
    <a href="/auth/twitter">Twitterで新規登録/ログイン</a>
@endif
</div>
@if (Auth::user())
    {{ Auth::user()->name }}
    <a href="/auth/logout">ログアウト</a>
@endif

@yield('content')
</body>
</html>