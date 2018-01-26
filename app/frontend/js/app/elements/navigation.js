/**
 * Created by Thomas on 26-6-2017.
 */
function Navigation(){
    var self = this;

    self.state = ko.observable('closed');

    self.user = null;

    self.heading = ko.observable('Welkom');
    self.intro = ko.observable('Fijn dat je er weer bent.');
    self.currentPage = ko.observable('');
    self.currentPage.subscribe(function () {
        _.each(self.pages(), function (page) {
           if (self.currentPage() == page.name) {
               page.active(true);
           } else {
               page.active(false);
           }
        });
    });

    self.pages = ko.observableArray([
        new Page({
            icon: 'calendar',
            name: 'entries',
            title: 'Dagboek',
            action: function () {
                APP.navigate('entries');
            }
        }),
        new Page({
            icon: 'stats',
            name: 'progress',
            title: 'Voortgang',
            action: function () {
                APP.navigate('progress');
            }
        }),
        new Page({
            icon: 'calculator',
            name: 'calculator',
            title: 'Rekenhulp',
            action: function () {
                APP.navigate('calculator');
            }
        }),
        new Page({
            icon: 'profile',
            name: 'program',
            title: 'Programma',
            action: function () {
                APP.navigate('program');
            }
        }),
        new Page({
            icon: 'user',
            name: 'profile',
            title: 'Profiel',
            action: function () {
                APP.navigate('profile');
            }
        }),
        new Page({
            icon: 'plus',
            name: 'addProduct',
            title: 'Product toevoegen',
            action: function () {
                APP.navigate('addProduct');
            }
        }),
        new Page({
            icon: 'question',
            name: 'help',
            title: 'Hulp',
            action: function () {
                APP.navigate('help');
            }
        }),
        new Page({
            icon: 'logout',
            name: 'logout',
            title: 'Uitloggen',
            classes: 'small',
            action: function () {
                self.logout();
            }
        }),
        new Page({
            icon: 'info',
            name: 'disclaimer',
            title: 'Disclaimer',
            classes: 'small',
            action: function () {
                APP.navigate('disclaimer');
            }
        }),
    ]);

    self.logout = function () {
        localStorage.removeItem('username');
        localStorage.removeItem('password');
        location.reload();
    };

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

    self.setUser = function (user) {
        self.user = user;
        self.heading('Welkom terug, ' + self.user.firstname() + '!');
    };

    self.setIntroCalories = function (total) {
        self.intro('Fijn dat je er weer bent, je hebt vandaag <strong>' + total + ' kilocalorieën</strong> (van de aanbevolen ' + self.user.calories_goal() + ') ingevoerd.');
    }
}
