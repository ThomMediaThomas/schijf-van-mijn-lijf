/**
 * Created by Thomas on 26-6-2017.
 */
function FromProductForm(){
    var self = this;

    self.$element = $('#form-from-product');

    self.dayparts = ko.observableArray([]);
    self.daypart_id = ko.observable();
    self.product = ko.observable();
    self.product_id = ko.observable('');
    self.portions = ko.observableArray([]);
    self.portion_id = ko.observable('');
    self.amount = ko.observable('');

    self.isEdit = false;

    self.init = function (entry) {
        self.$element = $('#form-from-product');

        self.initDaypartsSelect();
        self.initProductAutocomplete();

        self.reset();

        if (entry) {
            self.isEdit = true;
            self.fillInEntryData(entry);
        }

        self.$element.find('#product_id').focus();
    };

    self.reset = function () {
        self.daypart_id(APP.loadedConfig.getCurrentDaypart().id);
        self.product_id('');
        self.amount('');
        self.portion_id('');
    };

    self.fillInEntryData = function (entry) {
        var product = entry.product();
        self.product_id(product.id);
        self.$element.find('#product_id').val(product.name);
        self.portions(_.map(product.portions(), function (portion) {
            return _.extend(portion, {
                friendlyName: portion.name + ' - ' + portion.size + portion.unit
            });
        }));
        self.portion_id(entry.portion().id);
        self.amount(entry.amount);
        self.daypart_id(entry.daypart_id);
    };

    self.initDaypartsSelect = function () {
        self.dayparts(APP.loadedConfig.dayparts);
    };

    self.initProductAutocomplete = function () {
        var that = self;

        self.$element.find('#product_id').autocomplete({
            source: function (request, response) {
                AJAXHELPER.GET(CONFIG.API + CONFIG.ENDPOINTS.PRODUCT_SEARCH, { name: request.term }, function (data) {
                    response($.map(data, function(obj) {
                        return {
                            label: obj.name,
                            value: obj.name,
                            product: obj
                        };
                    }));
                });
            },
            select: function (evt, ui) {
                that.portions(_.map(ui.item.product.portions, function (portion) {
                    return _.extend(portion, {
                        friendlyName: portion.name + ' - ' + portion.size + portion.unit
                    });
                }));

                if (_.first(ui.item.product.portions)) {
                    that.portion_id(_.first(ui.item.product.portions).id);
                }
                that.product(new Product(ui.item.product));
            }
        }).autocomplete('instance')._renderItem = function (ul, item) {
            return $('<li class="autocomplete-product-suggestion">')
                .append('<div class="entry-image">')
                    .find('div.entry-image')
                    .append('<img title="' + item.label + '" alt="' + item.label + '" src="' + IMAGEHELPER.RESOLVE(item.product.image) + '" />')
                    .parent()
                .append('<div class="entry-content">')
                    .find('div.entry-content')
                    .append('<h4>' + item.label + '</h4>')
                    .append('<h5>' + item.product.brand.name + '</h5>')
                .parent()
                .appendTo(ul);
        };
    },

    self.submit = function () {
        if (!isValid(this.$element)) {
            return false;
        }

        AJAXHELPER.POST(CONFIG.API + CONFIG.ENDPOINTS.ENTRIES, {
            entry: {
                type: 'product',
                entry_date: APP.pages.entries.date().format(CONFIG.DATE_FORMATS.API),
                daypart_id: self.daypart_id(),
                product_id: self.product().id,
                portion_id: self.portion_id(),
                amount: self.amount()
            },
        }, function (data) {
            APP.addEntry.close();
            self.isEdit = false;

            if (APP.currentPage() == 'entries') {
                APP.pages.entries.reload();
            }

            APP.notificator.show(self.product().name + ' is succesvol toegevoegd.', 'success');
        });
    }
}
