$(function() {
    new Vue({
        el: '#btn-area',
        data: function () {
            return {theme_form_visible: false}
        },

        methods: {
            open_dialog: function () {
                this.theme_form_visible = true;
            }
        }
    });
});