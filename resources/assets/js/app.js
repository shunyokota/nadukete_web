window.onload = function() {
    new Vue({
        el: '#main-header',
        data: function () {
            return {registry_visible: false, registry_form: {}, registry_data: []}
        },

        methods: {
            registry_submit: function () {
                this.registry_data.push(this.registry_form);
                this.registry_form = {};
                this.registry_visible = false;
            },
            open_dialog: function () {
                this.registry_visible = true;
            }
        }
    });
};