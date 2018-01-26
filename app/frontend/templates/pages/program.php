<script id="program" type="text/html">
    <div class="page" data-bind="with: $root.pages.program">
        <div class="content-wrapper">
            <div class="heading">
                <h3>Programma</h3>
            </div>
            <div data-bind="if: hasProgram()">
                <p>Je volgt dit programma sinds <strong data-bind="text: programSince"></strong>.</p>
                <div class="heading sub">
                    <h3>Energie-behoefte</h3>
                </div>
                <p>In de rekenhulp gaf je je doel (<strong data-bind="text: goalFriendly"></strong>) aan. Op basis daarvan - maar ook op basis van je hoeveelheid beweging, gewicht, leeftijd en lengte - berekenden wij de volgende energie-behoefte:</p>
                <dl>
                    <dt>Dagelijkse energie-behoefte</dt><dd data-bind="text: kilocalories() + ' kcal'">...</dd>
                </dl>
                <div class="heading sub">
                    <h3>Macronutriënten</h3>
                </div>
                <p>Op basis van het doel (<strong data-bind="text: goalFriendly"></strong>) dat je koos in de rekenhulp, raden wij je onderstaande verdeling van macronutriënten aan:</p>
                <dl>
                    <dt>Koolhydraten</dt><dd data-bind="text: carbs() + '%'">...</dd>
                    <dt>Eiwitten</dt><dd data-bind="text: proteins() + '%'">...</dd>
                    <dt>Vetten</dt><dd data-bind="text: fats() + '%'">...</dd>
                </dl>
                <a class="button" data-bind="click: function () { APP.navigate('calculator'); }">Nieuw programma berekenen</a>
            </div>
            <div data-bind="if: !hasProgram()">
                <div class="heading sub">
                    <h3>Nog geen programma</h3>
                </div>
                <p>We zien dat je nog geen programma opgeslagen hebt, om een programma aan te maken kan je onze rekenhulp gebruiken.</p>
                <a class="button" data-bind="click: function () { APP.navigate('calculator'); }">Naar de rekenhulp</a>
            </div>
        </div>
    </div>
</script>
