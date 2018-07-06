$(function() {
    new Vue({
        el: '#btn-area',
        data: function () {
            return {theme_form_visible: false, registry_form: {}, registry_data: []}
        },

        methods: {
            registry_submit: function () {
                this.registry_data.push(this.registry_form);
                this.registry_form = {};
                //this.registry_visible = false;
            },
            open_dialog: function () {
                this.theme_form_visible = true;
            }
        }
    });
});
// window.onload = function() {
//
// };