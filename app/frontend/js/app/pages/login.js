/**
 * Created by Thomas on 26-6-2017.
 */
function LoginPage() {
    var self = this;

    self.$form = $('#login-form');
    self.username = ko.observable();
    self.password = ko.observable();
    self.isLoading = ko.observable(false);
    self.loadingClass = ko.computed(function () {
        return self.isLoading() ? 'is-loading' : '';
    });

    self.init = function () {
        self.$form = $('#login-form');

        if (localStorage.getItem('username') && localStorage.getItem('password')) {
            self.performLogin(localStorage.getItem('username'), localStorage.getItem('password'));
        }

        //self.initSubmitOnEnter();
    };

    self.initSubmitOnEnter = function () {
        self.$form.find('input').on('keydown', function (event) {
            if (event.keyCode = 13) {
                self.login();
            }
        });
    };

    self.login = function () {
        self.performLogin(this.username(), this.password());
        return false;
    };

    self.performLogin = function (username, password) {
        self.isLoading(true);
        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.ME, {
            authentication: {
                username: username,
                password: password
            }
        }, function (data) {
            APP.user(new User(data));
            AUTHENTICATION.set(username, password);
            self.isLoading(false);
            APP.navigate(CONFIG.HOME);
        }, function () {
            self.isLoading(false);
        });
    }
}
