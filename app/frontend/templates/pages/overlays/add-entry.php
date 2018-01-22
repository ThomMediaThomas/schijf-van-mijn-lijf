<div id="add-entry" class="page overlay" data-bind="with: addEntry, css: addEntry.state">
    <div class="add-entry-type" data-bind="visible: !isEdit()">
        <ul>
            <li data-bind="css: currentTab() == 'product' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: function () { openFromProduct(); }">
                    <i class="icon-fruits"></i>
                    <span>Product</span>
                </a>
            </li>
            <li data-bind="css: currentTab() == 'meal' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: function () {  openFromMeal(); }">
                    <i class="icon-meal"></i>
                    <span>Maaltijd</span>
                </a>
            </li>
            <li data-bind="css: currentTab() == 'quick' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: function () {  openFromQuick(); }">
                    <i class="icon-quick"></i>
                    <span>Snel toevoegen</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content-wrapper">
        <div data-bind="if: currentTab() == 'product'">
            <?php include('add-entry/from-product.php'); ?>
        </div>
        <div data-bind="if: currentTab() == 'meal'">
            <?php include('add-entry/from-meal.php'); ?>
        </div>
        <div data-bind="if: currentTab() == 'quick'">
            <?php include('add-entry/from-quick.php'); ?>
        </div>
        <a class="button small" data-bind="click: close">Annuleren</a>
        <div class="info-box">
            <p>Kan je niet vinden wat je zoekt? <a href="#" data-bind="click: function() { $root.navigate('addProduct') }">Klik dan hier</a> om een nieuw product toe te voegen.</p>
        </div>
    </div>
</div>
