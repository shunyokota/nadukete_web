<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="ja">
    <title>なづけて</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/element-ui/index.css') }}">
    <script type="text/javascript" src="/js/vue.js"></script>
    <script type="text/javascript" src="/js/element-ui/index.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</head>

<body>


<header id="main-header">
    <div id="header-inner">
        <a href="/">
            <img id="logo" src="{{ asset('/images/logo.svg') }}" alt="なづけて">
        </a>
        <h1 id="service-title">なづけて</h1>
        <a id="hamburger" @click="registry_visible = true">
            <i class="fa fa-bars fa-2x"></i>
        </a>
    </div>

    <el-dialog :visible.sync="registry_visible" custom-class="main-menu-dialog" v-cloak="v-cloak">
        <ul>
            @if (!Auth::user())
            <li>
                <a href="/auth/twitter">Twitterで新規登録/ログイン</a>
            </li>
            @endif
            <li>
                <a>なづけてとは？</a>
            </li>
            <li>
                <a>プライバシーポリシー</a>
            </li>
            <li>
                <a>利用規約</a>
            </li>
            @if (Auth::user())
            <li>
                <a href="/auth/logout">ログアウト</a>
            </li>
            @endif

        </ul>
    </el-dialog>
</header>


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