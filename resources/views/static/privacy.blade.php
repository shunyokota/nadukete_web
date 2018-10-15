@extends('layouts.app')


@section('content')
    <div class="content">
        <h1>プライバイシーポリシー</h1>
        <h2>個人情報の定義</h2>
        <p>「個人情報」とは、個人に関する情報であって、1つあるいは2つ以上を組み合せることによって、特定の個人を識別できるものを指します。</p>
        <h2>個人情報の取扱</h2>
        <p>当サービスでは、登録時にTwitterに登録されたプロフィール情報を取得します。</p>
        <p>ご登録いただいたTwitterアカウントのURL、アイコン画像、ユーザー名は当サービス上で公開されます。</p>
        <h2>Twitter APIについて</h2>
        <p>
            当サービスではTwitter APIを利用しています。Twitter APIのアクセス権限には、
        </p>
        <ul>
            <li>Read only (読み込み)</li>
            <li>Read and Write (読み込みと書き込み)</li>
            <li>Read, Write and Access direct messages (読み込み、書き込み、DMの閲覧)</li>
        </ul>
        <p>の３種類があり<a href="https://blog.fkoji.com/2015/03210141.html">（参考）</a>、なづけては読み込みと書き込みの権限でTwitterにアクセスします。</p>
        <p>なづけてでは以下の操作のためにTwitter APIを利用します。<p>
        <ul>
            <li>ログインユーザーのプロフィール情報の取得</li>
            <li>ツイートの投稿（お題を登録した時、お題に回答したとき）</li>
        </ul>

    </div>
@endsection