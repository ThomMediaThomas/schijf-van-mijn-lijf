<script id="progress" type="text/html">
    <div data-bind="with: $root.pages.progress" class="page" id="progress">
        <div class="content-wrapper">
            <div class="heading">
                <h3>Voortgang</h3>
            </div>
            <div class="form">
                <div class="form-row" id="period-selector">
                    <label for="period">Periode:</label>
                    <select name="period" id="periode" data-bind="value: period, options: periods(), optionsText: 'label', optionsValue: 'value'">
                    </select>
                </div>
            </div>
            <canvas id="progress-stat"></canvas>
            <div class="progress-sub">
                <p>Periode van <strong data-bind="text: firstDate"></strong> tot <strong data-bind="text: lastDate"></strong></p>
            </div>
            <div class="heading sub">
                <h3>Voortgang toevoegen</h3>
            </div>
            <form id="add-progress-form">
                <div class="form-row">
                    <div class="form-row-inner half">
                        <label for="weight">Gewicht:</label>
                        <input class="required number" type="number" id="weight" name="weight" data-bind="value: weight">
                    </div>
                    <div class="form-row-inner half">
                        <label for="date">Datum:</label>
                        <input class="required" type="date" id="date" name="date" data-bind="value: date">
                    </div>
                </div>
                <div class="form-row">
                    <a class="button" data-bind="click: submitProgress">Opslaan</a>
                </div>
            </form>
        </div>
    </div>
</script>
