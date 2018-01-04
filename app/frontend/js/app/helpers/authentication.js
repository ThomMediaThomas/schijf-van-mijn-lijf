var AUTHENTICATION = {
    USERNAME: null,
    PASSWORD: null,
    authenticated: ko.observable(false),
    set: function (username, password) {
        this.USERNAME = username;
        this.PASSWORD = password;
        localStorage.setItem('username', this.USERNAME);
        localStorage.setItem('password', this.PASSWORD);
        this.authenticated(this.USERNAME && this.PASSWORD);
    },
    get: function () {
        return {
            username: this.USERNAME,
            password: this.PASSWORD
        }
    }
};
