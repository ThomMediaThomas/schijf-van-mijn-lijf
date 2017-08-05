/**
 * Created by Thomas on 26-6-2017.
 */
function ProfilePage(){
    var self = this;

    self.$form = $('#profile-form');
    self.user = ko.observable();

    self.init = function () {
        self.user(APP.user());
        self.$form = $('#profile-form');
    };

    self.submit = function () {
        if (!isValid(self.$form)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
            user: {
                firstname: self.user().firstname(),
                lastname: self.user().lastname(),
                gender: self.user().gender(),
                email: self.user().email()
            }
        });
    }

}
