function Footer() {
    var self = this;

    self.$element = $('#footer');
    self.state = ko.observable('closed');
    self.stateIcon = ko.computed(function () {
        return self.state() == 'closed' ? 'icon-circle-up' : 'icon-circle-down';
    })

    self.toggle = function () {
        if (self.state() == 'open') {
            self.close();
        } else {
            self.open();
        }
    };

    self.open = function () {
        self.state('open');
    };

    self.close = function () {
        self.state('closed');
    };
}
