<script id="meal_inline" type="text/html">
    <div class="entry in-content" data-bind="css: classNameWithoutSelection()">
        <div class="entry-wrapper" data-bind="click: {single: toggle, double: select }">
            <div class="entry-image">
                <img data-bind="attr: { src: '/files/images/meal.png', alt: name, title: name }"/>
            </div>
            <div class="entry-content">
                <h4 data-bind="text: meal().name"></h4>
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
</script>
