<div id="entry" class="page overlay" data-bind="with: entryPage, css: entryPage.state">
    <div class="content-wrapper">
        <div class="entry-details">
            <div data-bind="if: entryType() == 'product'">
                <?php include('entry/product.php'); ?>
            </div>
            <div data-bind="if: entryType() == 'meal'">
                <?php include('entry/meal.php'); ?>
            </div>
            <div data-bind="if: entryType() == 'quick'">
                <?php include('entry/quick.php'); ?>
            </div>
        </div>
    </div>
</div>
