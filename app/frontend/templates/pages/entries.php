<script id="entries" type="text/html">
    <div data-bind="with: $root.pages.entries" class="page" id="entries">
        <div class="date-nav">
            <div class="content-wrapper">
                <a class="datenav-button previous" data-bind="click: previousDate"><i class="icon-circle-left"></i></a>
                <h3 data-bind="text: friendlyDate(), click: toToday"></h3>
                <a class="datenav-button next" data-bind="click: nextDate"><i class="icon-circle-right"></i></a>
            </div>
        </div>
        <div class="entries" data-bind="foreach: dayparts()">
            <div class="daypart">
                <div class="content-wrapper">
                    <h3 data-bind="text: name"></h3>
                    <strong class="day-total" data-bind="html: calories() + ' kcal'"></strong>
                </div>
            </div>
            <div data-bind="if: entries().length > 0">
                <div data-bind="template: { name: entryTemplate, foreach: entries }">

                </div>
            </div>
            <div class="entry add">
                <div class="content-wrapper entry-wrapper" data-bind="click: $parent.openAddEntry">
                    <div class="entry-image">
                        <i class="icon-plus"></i>
                    </div>
                    <div class="entry-content">
                        <h4><span data-bind="text: friendly_singular"></span> toevoegen</h4>
                        <!--<h5>Voeg iets toe aan <span data-bind="text: name.toLowerCase()"></span></h5>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="selection-nav" data-bind="visible: selectedEntries().length > 0">
            <div class="content-wrapper">
                <ul>
                    <li><a class="button-icon" href="#" data-bind="click: saveSelection"><i class="icon-save"></i><span>Maaltijd opslaan</span></a></li>
                    <li><a class="button-icon" href="#" data-bind="click: removeSelection"><i class="icon-bin"></i><span>Selectie verwijderen</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</script>
