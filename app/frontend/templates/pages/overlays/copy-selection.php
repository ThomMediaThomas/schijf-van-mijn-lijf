<div id="copy-selection" class="page overlay" data-bind="with: copySelectionPage, css: copySelectionPage.state">
    <div class="content-wrapper">
        <div class="entry-details">
            <form id="copy-selection-form">
                <div class="heading">
                    <h3>Selectie kopiëren</h3>
                </div>
                <div class="form-row">
                    <label for="destination">Selectie kopiëren naar:</label>
                    <select name="destination" id="destination" data-bind="value: destination, options: destinations(), optionsText: 'label', optionsValue: 'value'"></select>
                </div>
                <div class="form-row">
                    <label for="username">Producten:</label>
                    <div data-bind="foreach: entries()">
                        <div class="entry in-content" data-bind="css: classNameWithoutSelection()">
                            <div class="entry-wrapper">
                                <div class="entry-image" data-bind="with: product()">
                                    <img data-bind="attr: { src: image, alt: name, title: name }"/>
                                </div>
                                <div class="entry-content">
                                    <h4 data-bind="text: product().name"></h4>
                                    <h5><strong data-bind="text: friendlyAmount"></strong> - <span data-bind="text: calories"></span> kilocalorieën
                                    </h5>
                                </div>
                                <div class="entry-category">
                                <span class="category" data-bind="css: categorySystemName()">
                                    <i class="icon" data-bind="css: icon()"></i>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="button" data-bind="click: submit, css: loadingClass">Kopiëren</a>
                <a class="button small" data-bind="click: close">Annuleren</a>
            </form>
        </div>
    </div>
</div>
