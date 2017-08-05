$(document).ready(function(){
    moment.locale('nl');

    APP = new Application();
    ko.applyBindings(APP);

    APP.init();
});
