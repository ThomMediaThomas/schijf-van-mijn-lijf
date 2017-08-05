function LoadedConfig() {
    var self = this;
    self.subcategories = [];
    self.dayparts = [];
    self.forcedDaypart = null;

    self.init = function () {
        self.loadSubcategories();
        self.loadDayparts();
    };

    self.loadSubcategories = function () {
        var that = self;

        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.SUBCATEGORIES, {}, function (data) {
            that.subcategories = _.map(data, function (daypartData) {
                return new Daypart(daypartData);
            });
        });
    };

    self.loadDayparts = function () {
        var that = self;

        AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.DAYPARTS, {}, function (data) {
            that.dayparts = _.map(data, function (daypartData) {
                return new Daypart(daypartData);
            });
        });
    };

    self.forceCurrentDaypart = function (daypart) {
        self.forcedDaypart = daypart;
    };

    self.getCurrentDaypart = function () {
        if (self.forcedDaypart) {
            return self.forcedDaypart;
        } else {
            var now = new Date().getHours();
            return _.first(_.filter(self.dayparts, function (daypart) {
                var fromHour = parseInt(daypart.from.split(':')[0]);
                var untilHour = parseInt(daypart.until.split(':')[0]);
                return now >= fromHour && now < untilHour;
            }));
        }
    }
}
