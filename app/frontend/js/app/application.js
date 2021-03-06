/**
 * Created by Thomas on 26-6-2017.
 */
function Application(){
    var self = this;

    /*region General*/
    self.loadingPage = new LoadingPage();
    self.productFinder = new ProductFinder();
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
    self.footer = new Footer();
    self.addEntry = new AddEntryPage();
    self.addEntry = new AddEntryPage();
    self.addMeal = new AddMealPage();
    self.entryPage = new EntryPage();
    self.copySelectionPage = new CopySelectionPage();
    /*endregion Header*/

    /*region Pages*/
    self.pages = {
        'splash': new SplashScreen(),
        'login': new LoginPage(),
        'register': new RegisterPage(),
        'entries': new EntriesPage(),
        'addProduct': new AddProductPage(),
        'profile': new ProfilePage(),
        'progress': new ProgressPage(),
        'calculator' : new CalculatorPage(),
        'program' : new ProgramPage()
    };

    self.currentPage = ko.observable('splash');
    self.pageTemplate = function() {
        return this.currentPage();
    }.bind(self);

    self.navigate = function(page, options) {
        //animate page out
        $('#page').addClass('before-toggle');

        //before open
        if (!_.isUndefined(self.pages[page]) && _.isFunction(self.pages[page].beforeOpen)) {
            self.pages[page].beforeOpen();
        }

        self.navigation.currentPage(page);
        self.navigation.close();
        self.addEntry.close();
        self.addMeal.close();

        setTimeout($.proxy(function () {
            self.currentPage(page);
            if (!_.isUndefined(self.pages[page])) {
                self.pages[page].init(options ? options : null);
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
