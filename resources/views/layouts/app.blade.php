<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="ja">
    @yield('meta')
    <title>なづけて</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/element-ui/index.css') }}">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/vue.js"></script>
    <script type="text/javascript" src="/js/element-ui/index.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</head>

<body>
@php
/*
@if(Session::has('message'))
<div id="flash-message" style="display:none">{{ session('message') }}</div>
@endif
*/
@endphp

<header id="main-header">
    <div id="header-inner">
        <a href="/">
            <img id="logo" src="{{ asset('/images/logo.svg') }}" alt="なづけて">
            <h1 id="service-title">なづけて</h1>
        </a>
        <a id="hamburger" @click="registry_visible = true">
            <i class="fa fa-bars fa-2x"></i>
        </a>
    </div>

    <el-dialog :visible.sync="registry_visible" custom-class="common-dialog" v-cloak="v-cloak">
        <ul>
            @if (!Auth::user())
            <li>
                <a href="/auth/twitter">Twitterで新規登録/ログイン</a>
            </li>
            @endif
            @if (Auth::user())
                <li>
                    <a href="/mypage">マイページ</a>
                </li>
            @endif
            <li>
                <a href="/">なづけて一覧</a>
            </li>
            <li>
                <a href="/about">なづけてとは？</a>
            </li>
            <li>
                <a href="/privacy">プライバシーポリシー</a>
            </li>
            <li>
                <a href="/terms">利用規約</a>
            </li>
            @if (Auth::user())
            <li>
                <a href="/auth/logout">ログアウト</a>
            </li>
            @endif

        </ul>
    </el-dialog>

    @if (Session::has('message'))
    <el-dialog :visible.sync="flash_message_visible" custom-class="common-dialog" v-cloak="v-cloak">
        <div class="dialog-content">
            <p>{{ session('message') }}</p>
            <button class="primary inverted" @click="flash_message_visible = false">OK</button>
        </div>
    </el-dialog>
    @endif
</header>

<main>
    @yield('content')
</main>
</body>
</html>