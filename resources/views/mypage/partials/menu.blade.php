<script src="/js/mypage.js"></script>
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