<el-dialog :visible.sync="naming_form_visible" custom-class="common-dialog" v-cloak="v-cloak">
    <div class="dialog-content">
        <form :action="`/themes/${theme_id}/namings`" method="POST">
            {{ csrf_field() }}
            <div class="text-wrapper">
                <input type="text" name="name" />
            </div>
            <button class="primary inverted">なづける</button>
        </form>
    </div>
</el-dialog>

<el-dialog :visible.sync="login_for_naming_visible" custom-class="common-dialog" v-cloak="v-cloak">
    <div class="dialog-content">
        <p>なづけるにはログインが必要です。</p>
        <button class="primary inverted" onclick="location.href='/auth/twitter'">Twitterで新規登録/ログイン</button>
    </div>
</el-dialog>