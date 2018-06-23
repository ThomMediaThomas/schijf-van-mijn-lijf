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
                    <div data-bind="template: { name: entryTemplate, foreach: entries }">

                    </div>
                </div>
                <a class="button" data-bind="click: submit, css: loadingClass">Kopiëren</a>
                <a class="button small" data-bind="click: close">Annuleren</a>
            </form>
        </div>
    </div>
</div>
