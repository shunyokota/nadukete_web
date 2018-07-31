$(function() {
    new Vue({
        el: '#btn-area',
        data: function () {
            return {naming_form_visible: false}
        },

        methods: {
            open_dialog: function () {
                this.naming_form_visible = true;
            }
        }
    });
});