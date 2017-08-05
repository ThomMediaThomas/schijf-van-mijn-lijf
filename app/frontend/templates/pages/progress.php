<script id="progress" type="text/html">
    <div data-bind="with: $root.pages.progress" class="page" id="progress">
        <div class="content-wrapper">
            <div class="heading">
                <h3>Voortgang</h3>
            </div>
            <div id="progress-stat">
                <!-- ko with: max -->
                <div data-bind="attr : { style: css }" class="progress-stat-bound max">
                    <strong data-bind="text: weight"></strong>
                </div>
                <!-- /ko -->
                <!-- ko foreach: progressesByDate -->
                <div class="single-progress-stat" data-bind="attr : { style: progress.css }"></div>
                <!-- /ko -->
                <!-- ko with: min -->
                <div data-bind="attr : { style: css }" class="progress-stat-bound min">
                    <strong data-bind="text: weight"></strong>
                </div>
                <!-- /ko -->
            </div>
            <div id="progress-stat-dates">
                <div class="progress-stat-date first" data-bind="text: firstDate"></div>
                <div class="progress-stat-date last" data-bind="text: lastDate"></div>
            </div>
            <div class="heading sub">
                <h3>Voortgang toevoegen</h3>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-row-inner half">
                        <label for="weight">Gewicht:</label>
                        <input type="text" id="weight" name="weight" data-bind="value: weight">
                    </div>
                    <div class="form-row-inner half">
                        <label>&nbsp;</label>
                        <a class="button" data-bind="click: submitProgress">Opslaan</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
