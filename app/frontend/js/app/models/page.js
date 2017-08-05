function Page(data) {
    var self = this;
    self.icon = data.icon;
    self.name = data.name;
    self.title = data.title;
    self.action = data.action;
    self.classes = data.classes ? data.classes : '';
    self.active = ko.observable(false);

    self.css = ko.computed(function () {
        return self.classes + (self.active() ? ' active' : '');
    });
}
