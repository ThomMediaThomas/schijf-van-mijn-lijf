/**
 * Created by Thomas on 26-6-2017.
 */
function RegisterPage(){
    var self = this;

    self.$form = $('#register-form');
    self.username = ko.observable();
    self.firstname = ko.observable();
    self.lastname = ko.observable();
    self.email = ko.observable();
    self.gender = ko.observable();
    self.password = ko.observable();

    self.init = function () {
        self.$form = $('#register-form');
    };

    self.register = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER, {
            user: {
                username: self.username(),
                firstname: self.firstname(),
                lastname: self.lastname(),
                gender: self.gender(),
                email: self.email(),
                password: self.password(),
                calories_average: self.gender() == 'm' ? 2500 : 2000
            },
        }, function (data) {
            APP.navigate('login');
            APP.notificator.show('Welkom ' + self.firstname() + ', je account is aangemaakt! Je kan nu inloggen.', 'success');
        });
        return false;
    };
}
