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

        self.submitImage(function (imageUrl) {
            var data = {
                firstname: self.user().firstname(),
                lastname: self.user().lastname(),
                gender: self.user().gender(),
                email: self.user().email()
            };

            if (imageUrl) {
                data.avatar = imageUrl;
            }

            AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.USER + '/' + self.user().id, {
                user: data
            }, function (data) {
                APP.navigate('profile');
                self.user(new User(data));
                APP.notificator.show(self.user().firstname() + ' is succesvol gewijzigd.', 'success');
                APP.navigation.setUser(self.user());
            });
        });
    };

    self.submitImage = function (callback) {
        var files = document.getElementById('avatar-upload').files;

        if (!files) {
            return false;
        }

        IMAGE_UPLOADER.UPLOAD(files, function (response) {
            var imageUrl = response.url;
            callback(imageUrl);
        });
    };

}
