const STAR_IMG = '/images/star.svg';
const REVERT_STAR_IMG = '/images/revert_star.svg';
$(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    Vue.component('marking-star', {
        template:
        '<div>' +
        '   <div class="point-wrapper">' +
        '       <span class="point">' +
        '           <img class="star" src="/images/star.svg"><span class="point-value">{{total_point}}</span>' +
        '       </span>' +
        '   </div>' +
        '   <div class="marking-wrapper" v-if="!is_mine">' +
        '       <span class="marking">' +
        '           <img class="star" :src="star_img1" v-on:click="marking(1)">' +
        '           <img class="star" :src="star_img2" v-on:click="marking(2)">' +
        '           <img class="star" :src="star_img3" v-on:click="marking(3)">' +
        '           <img class="star" :src="star_img4" v-on:click="marking(4)">' +
        '           <img class="star" :src="star_img5" v-on:click="marking(5)">' +
        '       </span>'+
        '   </div>' +
            '<el-dialog :visible.sync="login_for_marking_visible" custom-class="common-dialog" v-cloak="v-cloak">' +
        '<div class="dialog-content">' +
        '<p>採点するにはログインが必要です。</p>' +
        '<button class="primary inverted" onclick="location.href=\'/auth/twitter\'">Twitterで新規登録/ログイン</button>' +
        '</div>' +
        '</el-dialog>'+
        '</div>',
        props: ['naming_id', 'point', 'total_point_ini', 'is_login', 'is_mine'],
        methods: {
            marking: function(point) {
                if (this.is_login && !this.is_mine) {
                    axios.post('/naming/' + this.naming_id + '/mark', {
                        _token: CSRF_TOKEN,
                        point: point
                    }).then(response => {
                        this.setStar(response.data['point']);
                        this.getTotalPoint();
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    });
                } else if (!this.is_login) {
                    this.open_login_for_marking_dialog();
                }
            },
            getTotalPoint: function() {
                axios.get('/naming/' + this.naming_id + '/getTotalPoint',
                    ).then(response => {
                    this.setTotalPoint(response.data['totalPoint']);
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                });
            },
            setStar: function(point) {
                this.star_img1 = 0 < point ? STAR_IMG : REVERT_STAR_IMG;
                this.star_img2 = 1 < point ? STAR_IMG : REVERT_STAR_IMG;
                this.star_img3 = 2 < point ? STAR_IMG : REVERT_STAR_IMG;
                this.star_img4 = 3 < point ? STAR_IMG : REVERT_STAR_IMG;
                this.star_img5 = 4 < point ? STAR_IMG : REVERT_STAR_IMG;
            },
            setTotalPoint: function(totalPoint) {
                this.total_point = totalPoint;
            },
            open_login_for_marking_dialog: function() {
                this.login_for_marking_visible = true;
            }
        },
        data: function() {
            return {
                star_img1: REVERT_STAR_IMG,
                star_img2: REVERT_STAR_IMG,
                star_img3: REVERT_STAR_IMG,
                star_img4: REVERT_STAR_IMG,
                star_img5: REVERT_STAR_IMG,
                total_point: 0,
                login_for_marking_visible: false,
            }
        },
        created: function() {
            this.setStar(this.point);
            this.total_point = this.total_point_ini;
        }
    })

    new Vue({
        el: '#theme-content',
        data: function () {
            return {
                naming_form_visible: false,
                login_for_naming_visible: false,
                theme_id: 0,
                name: ''
            }
        },

        methods: {
            open_naming_dialog: function (theme_id) {
                this.theme_id = theme_id;
                this.name = '';
                this.naming_form_visible = true;
            },
            open_login_for_naming_dialog: function() {
                this.login_for_naming_visible = true;
            }
        },

    });
});