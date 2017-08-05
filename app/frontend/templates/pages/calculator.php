<script id="calculator" type="text/html">
    <div data-bind="with: $root.pages.calculator" class="page" id="calculator">
        <div class="content-wrapper">
            <div class="heading">
                <h3>Rekenhulp</h3>
            </div>
            <p>Wil je graag een voedingsadvies op jouw maat? Onze rekenhulp helpt je daar graag bij én de uitslag kan
                gelijk verwerkt worden in de app.</p>
            <div id="calculator-steps">
                <div class="calculator-step" data-bind="if: currentStep() == 1">
                    <div class="heading sub">
                        <h3>Jouw gegevens</h3>
                    </div>
                    <div class="content">
                        <p>Om een goede berekening te maken hebben we nog wat gegevens van je nodig; kan je onderstaande
                            gegevens controleren en waar nodig aanvullen?</p>
                        <form id="calculator-personal-form">
                            <div data-bind="with: user">
                                <div class="form-row">
                                    <label for="birthdate">Geboortedatum <span>(jjjj-mm-dd)</span>:</label>
                                    <input class="required" type="text" id="birthdate" name="birthdate"
                                           data-bind="value: birthdate">
                                </div>
                                <div class="form-row">
                                    <label for="gender">Geslacht:</label>
                                    <select class="required" id="gender" name="gender" data-bind="value: gender">
                                        <option value="m">Man</option>
                                        <option value="f">Vrouw</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <label for="weight">Gewicht <span>(in kg)</span>:</label>
                                    <input class="required" type="text" id="weight" name="weight"
                                           data-bind="value: weight">
                                </div>
                                <div class="form-row">
                                    <label for="length">Lengte <span>(in cm)</span>:</label>
                                    <input class="required" type="text" id="length" name="length"
                                           data-bind="value: length">
                                </div>
                                <a class="button" data-bind="click: $parent.submitPersonal">Volgende stap</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="calculator-step" data-bind="if: currentStep() == 2">
                    <div class="heading sub">
                        <h3>Jouw beweging</h3>
                    </div>
                    <div class="content">
                        <p>Om een goede inschatting te kunnen maken van wat je per dag zou mogen eten, willen we iets
                            meer weten over jouw beweging op een gemiddelde dag.</p>
                        <form id="calculator-activity-form">
                            <div data-bind="with: user">
                                <div class="form-row">
                                    <label for="activity_level">Beweging op een gemiddelde dag:</label>
                                    <select class="required" id="activity_level" name="activity_level"
                                            data-bind="value: activity_level">
                                        <option value="1.2">Ik sport nooit</option>
                                        <option value="1.375">Ik sport 1 à 3 keer per week</option>
                                        <option value="1.55">Ik sport 3 à 5 keer per week</option>
                                        <option value="1.725">Ik sport 6 à 7 keer per week</option>
                                        <option value="1.9">Ik sport intensief (bv. door een fysieke baan)</option>
                                    </select>
                                </div>
                                <a class="button" data-bind="click: $parent.submitActivity">Volgende stap</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="calculator-step" data-bind="if: currentStep() == 3">
                    <div class="heading sub">
                        <h3>Jouw behoefte en doelen</h3>
                    </div>
                    <div class="content">
                        <p>Goed zo! Op deze manier hebben we voor je kunnen berekenen wat jouw calorie-behoefte is.</p>
                        <form id="calculator-needs-form">
                            <div class="form-group">
                                <dl>
                                    <dt>Jouw energie-behoefte in rust:</dt>
                                    <dd data-bind="text: needRest() + ' calorieën'"></dd>
                                </dl>
                                <dl>
                                    <dt>Jouw werkelijke energie-behoefte:</dt>
                                    <dd data-bind="text: needActivity() + ' calorieën'"></dd>
                                </dl>
                            </div>
                            <a class="button" data-bind="click: submitNeeds">Energiebehoefte opslaan</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
