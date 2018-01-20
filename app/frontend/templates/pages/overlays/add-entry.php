<div id="add-entry" class="page overlay" data-bind="with: addEntry, css: addEntry.state">
    <div class="add-entry-type" data-bind="visible: !isEdit">
        <ul>
            <li data-bind="css: currentTab() == 'product' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: openFromProduct">
                    <i class="icon-fruits"></i>
                    <span>Product</span>
                </a>
            </li>
            <li data-bind="css: currentTab() == 'meal' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: openFromMeal">
                    <i class="icon-meal"></i>
                    <span>Maaltijd</span>
                </a>
            </li>
            <li data-bind="css: currentTab() == 'quick' ? 'active' : ''">
                <a class="button-icon" href="#" data-bind="click: openFromQuick">
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
    </div>
</div>
