$(function() {
    new Vue({
        el: '#theme-content',
        data: function () {
            return {naming_form_visible: false, theme_id:0}
        },

        methods: {
            open_naming_dialog: function (theme_id) {
                this.theme_id = theme_id;
                this.naming_form_visible = true;
            }
        },

    });
});