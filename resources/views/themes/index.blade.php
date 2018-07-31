@extends('layouts.app')

@section('content')
    <script src="/js/themes.js"></script>
    <div id="theme-content" class="content">
        @foreach($themes as $theme)
            @include('themes.partials.theme', ['theme' => $theme])
        @endforeach
        <el-dialog :visible.sync="naming_form_visible" custom-class="common-dialog" v-cloak="v-cloak">
            <div class="dialog-content">
                <form :action="`/themes/${theme_id}/namings`" method="POST">
                    {{ csrf_field() }}
                    <div class="text-wrapper">
                        <input type="text" name="name" />
                    </div>
                    <div>"@{{theme_id}}"</div>
                    <button class="primary inverted">なづける</button>
                </form>
            </div>
        </el-dialog>
    </div>
@endsection