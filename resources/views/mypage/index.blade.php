@extends('layouts.app')

@section('content')
    <script src="/js/mypage.js"></script>
    <div class="content">
        <div class="avatar-wrapper">
            <img class="avatar" src="{{Auth::user()->avatar}}" />
        </div>

        <div class="user-info-wrapper">
            <h2>{{Auth::user()->name}}</h2>
            <div class="nickname">{{"@"}}{{Auth::user()->nickname}}</div>
            <p>{{Auth::user()->description}}</p>
        </div>

        <div id="btn-area" class="btn-area-wrapper">
            <button class="primary" @click="theme_form_visible = true">なづけてもらう</button>
            <button class="primary" onclick="location.href='/mypage/namings'">My なづけた</button>
            <button class="primary" onclick="location.href='/mypage/themes'">My なづけて</button>


            <el-dialog :visible.sync="theme_form_visible" custom-class="common-dialog" v-cloak="v-cloak">
                <div class="dialog-content">
                    <form action="/themes" method="POST">
                        {{ csrf_field() }}
                        <textarea name="content"></textarea>
                        <button class="primary inverted">登録</button>
                    </form>
                </div>
            </el-dialog>
        </div>
    </div>
@endsection