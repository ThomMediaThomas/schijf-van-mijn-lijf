var AUTHENTICATION = {
    USERNAME: null,
    PASSWORD: null,
    set: function (username, password) {
        this.USERNAME = username;
        this.PASSWORD = password;
        localStorage.setItem('username', this.USERNAME);
        localStorage.setItem('password', this.PASSWORD);
    },
    get: function () {
        return {
            username: this.USERNAME,
            password: this.PASSWORD
        }
    }
};
