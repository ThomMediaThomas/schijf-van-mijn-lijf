/**
 * Created by Thomas on 26-6-2017.
 */
function User(data){
    var self = this;

    self.id = data.id;
    self.username = data.username;
    self.firstname = ko.observable(data.firstname);
    self.lastname = ko.observable(data.lastname);
    self.email = ko.observable(data.email);
    self.gender = ko.observable(data.gender);
    self.weight = ko.observable(data.weight);
    self.length = ko.observable(data.length);
    self.birthdate = ko.observable(data.birthdate);
    self.activity_level = ko.observable(data.birthdate);
    self.calories_average = ko.observable(data.calories_average);

    self.current_program = ko.observable(new Program(data.current_program));

    self.calories_goal = ko.computed(function () {
        return self.current_program().calories_goal();
    })
}
