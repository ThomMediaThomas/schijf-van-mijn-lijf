/**
 * Created by Thomas on 26-6-2017.
 */
function LoginPage(){
    var self = this;

    self.username = ko.observable();
    self.password = ko.observable();

    self.init = function () {
        if (localStorage.getItem('username') && localStorage.getItem('password')) {
            self.performLogin(localStorage.getItem('username'), localStorage.getItem('password'));
        }
    };

    self.login = function () {
        self.performLogin(this.username(), this.password());
        return false;
    };

    self.performLogin = function (username, password) {
        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.ME, {
            authentication: {
                username: username,
                password: password
            }
        }, function (data) {
            APP.user(new User(data));
            AUTHENTICATION.set(username, password);
            APP.navigate(CONFIG.HOME);
        });
    }
}
