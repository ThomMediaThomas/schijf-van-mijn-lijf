<script id="product" type="text/html">
    <div class="entry" data-bind="css: className()">
        <div class="content-wrapper entry-wrapper" data-bind="click: toggle">
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
        <div class="entry-foldout" data-bind="css: openClass()">
            <div class="content-wrapper">
                <ul>
                    <li><a class="button-icon" href="#" data-bind="click: openEntry"><i class="icon-info"></i><span>Informatie</span></a></li>
                    <li><a class="button-icon" href="#" data-bind="click: select"><i data-bind="attr: { class: selectedClass() }"></i><span>Selecteren</span></a></li>
                    <li><a class="button-icon" href="#" data-bind="click: editEntry"><i class="icon-pencil"></i><span>Bewerken</span></a></li>
                    <li><a class="button-icon" href="#" data-bind="click: remove"><i class="icon-bin"></i><span>Verwijderen</span></a></li>
                </ul>
            </div>
        </div>
        <div class="entry-percentage" data-bind="css: categorySystemName()">
            <div class="content-wrapper">
                <i class="percentage"></i>
            </div>
        </div>
    </div>
</script>
