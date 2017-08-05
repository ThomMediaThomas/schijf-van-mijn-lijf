/**
 * Created by Thomas on 26-6-2017.
 */
function Application(){
    var self = this;

    /*region General*/
    self.loadingPage = new LoadingPage();
    self.loading = ko.observable(false);
    self.isLoading = function (loading) {
        self.loadingPage.isLoading(loading);
    };

    self.notificator = new NotificationPage();
    /*endregion General*/

    /*region LoadedConfig*/
    self.loadedConfig = new LoadedConfig();
    /*endregion LoadedConfig*/

    /*region Header*/
    self.navigation = new Navigation();
    self.addEntry = new AddEntryPage();
    self.addMeal = new AddMealPage();
    /*endregion Header*/

    /*region Pages*/
    self.pages = {
        'splash': new SplashScreen(),
        'login': new LoginPage(),
        'entries': new EntriesPage(),
        'addProduct': new AddProductPage(),
        'profile': new ProfilePage(),
        'progress': new ProgressPage()
    };

    self.currentPage = ko.observable('splash');
    self.pageTemplate = function() {
        return this.currentPage();
    }.bind(self);

    self.navigate = function(page) {
        //animate page out
        $('#page').addClass('before-toggle');

        self.navigation.currentPage(page);
        self.navigation.close();
        self.addEntry.close();
        self.addMeal.close();

        setTimeout($.proxy(function () {
            self.currentPage(page);
            if (!_.isUndefined(self.pages[page])) {
                self.pages[page].init();
            }
            $('#page').removeClass('before-toggle');
        }, self, page), 300);
    };
    /*endregion Pages*/

    /*region User*/
    self.user = ko.observable({});
    self.user.subscribe(function (user) {
        self.navigation.setUser(user);
    });
    /*endregion User*/

    self.init = function () {
        self.isLoading(true);
        self.loadedConfig.init();

        setTimeout(function () {
            self.navigate('login');
            self.isLoading(false);
        }, DEBUG ? 500 : 2000);
    };

    self.showDateNav = ko.computed(function () {
        return self.currentPage() == 'entries' &&
            self.addEntry.state() == 'closed' &&
            self.addMeal.state() == 'closed';
    });
}
