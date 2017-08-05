/**
 * Created by Thomas on 26-6-2017.
 */
function NotificationPage(){
    var self = this;

    self.$element = $('#notification');
    self.state = ko.observable('closed')
    self.message = ko.observable('');
    self.type = ko.observable('default');

    self.hideTimeout = null;

    self.cssClass = ko.computed(function () {
        return self.state() + ' ' + self.type();
    });

    self.show = function (message, type) {
        self.message(message ? message : '');
        self.type(type ? type : 'default');
        self.state('open');

        self.hideTimeout = setTimeout(self.close, 5000);
    };

    self.close = function () {
        self.state('closed');
    };
}
