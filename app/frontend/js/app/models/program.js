/**
 * Created by Thomas on 26-6-2017.
 */
function Program(data){
    var self = this,
        data = data ? data : {};

    self.id = data.id ? data.id : null;
    self.goal_type = ko.observable(data.goal_type ? data.goal_type : '');
    self.goal_type_friendly = ko.computed(function () {
        return CONFIG.GOAL_TYPES_FRIENDLY[self.goal_type()];
    });
    self.preferred_weight = ko.observable(data.preferred_weight ? data.preferred_weight : '');
    self.calories_goal = ko.observable(data.calories_goal ? data.calories_goal : '');
    self.goal_duration = ko.observable(data.goal_duration ? data.goal_duration : '');
    self.start_date = ko.observable(data.start_date ? data.start_date : '');
    self.started = ko.observable(data.started ? data.started : '');
}
