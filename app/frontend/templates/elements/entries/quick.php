<script id="quick" type="text/html">
    <div class="entry" data-bind="css: className()">
        <div class="content-wrapper entry-wrapper" data-bind="click: toggle">
            <div class="entry-image">
                <img data-bind="attr: { src: '/files/images/quick.png', alt: name, title: name }"/>
            </div>
            <div class="entry-content">
                <h4 data-bind="text: name"></h4>
                <h5><span data-bind="text: calories"></span> kilocalorieën</h5>
            </div>
        </div>
        <div class="content-wrapper entry-foldout" data-bind="css: openClass()">
            <ul>
                <li><a class="button-icon" href="#" data-bind="click: openEntry"><i class="icon-info"></i><span>Informatie</span></a></li>
                <li><a class="button-icon" href="#" data-bind="click: select"><i data-bind="attr: { class: selectedClass() }"></i><span>Selecteren</span></a></li>
                <li><a class="button-icon"><i class="icon-pencil"></i><span>Bewerken</span></a></li>
                <li><a class="button-icon" href="#" data-bind="click: remove"><i class="icon-bin"></i><span>Verwijderen</span></a></li>
            </ul>
        </div>
    </div>

</script>
