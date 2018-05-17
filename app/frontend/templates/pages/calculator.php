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
                                    <label for="birthdate">Geboortedatum:</label>
                                    <input class="required" type="date" id="birthdate" name="birthdate"
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
                                    <input class="number required" type="number" id="weight" name="weight"
                                           data-bind="value: weight">
                                </div>
                                <div class="form-row">
                                    <label for="length">Lengte <span>(in cm)</span>:</label>
                                    <input class="number required" type="number" id="length" name="length"
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
                        <h3>Jouw behoeftes</h3>
                    </div>
                    <div class="content">
                        <p>Goed zo! Op deze manier hebben we voor je kunnen berekenen wat jouw behoefte is.</p>
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
                <div class="calculator-step" data-bind="if: currentStep() == 4">
                    <div class="heading sub">
                        <h3>Jouw doel</h3>
                    </div>
                    <div class="content">
                        <p>Nu we dit allemaal weten, kunnen we kijken naar jouw doel(en).</p>
                        <form id="calculator-needs-form">
                            <div data-bind="with: program">
                                <div class="form-row">
                                    <label for="goal_type">Wat wil je graag?</label>
                                    <select class="required" id="goal_type" name="goal_type"
                                            data-bind="value: goal_type">
                                        <option value="stay">Ik wil graag op gewicht blijven.</option>
                                        <option value="loose">Ik wil graag afvallen</option>
                                        <option value="gain">Ik wil graag aankomen</option>
                                    </select>
                                </div>
                                <div class="form-group" data-bind="visible: goal_type() == 'stay'">
                                    <div class="heading sub-sub">
                                        <h3>Je wilt op gewicht blijven</h3>
                                    </div>
                                    <div class="form-row">
                                        <label for="current_weight">Je huidige gewicht <span>(in kg)</span>:</label>
                                        <input class="number required" disabled="disabled" type="number"
                                               id="current_weight" name="current_weight"
                                               data-bind="value: $parent.user().weight">
                                    </div>
                                    <a class="button" data-bind="click: $parent.createAdvice">Bereken advies</a>
                                </div>
                                <div class="form-group" data-bind="visible: goal_type() == 'loose'">
                                    <div class="heading sub-sub">
                                        <h3>Je wilt afvallen</h3>
                                    </div>
                                    <div class="form-row">
                                        <label for="preferred_weight">Je ideale gewicht <span>(in kg)</span>:</label>
                                        <input class="number required" type="number" id="preferred_weight"
                                               name="preferred_weight"
                                               data-bind="value: preferred_weight">
                                    </div>
                                    <div class="form-row">
                                        <label for="goal_speed">Hoe streng wil je lijnen?</span>:</label>
                                        <select class="required" id="goal_speed" name="goal_speed"
                                                data-bind="value: $parent.goal_speed">
                                            <option value="15">Normaal, gezonder eten.</option>
                                            <option value="20">Streng, kleinere porties en geen/minder snacks</option>
                                            <option value="25">Heel streng, alles anders</option>
                                        </select>
                                    </div>
                                    <a class="button" data-bind="click: $parent.createAdvice">Bereken advies</a>
                                </div>
                                <div class="form-group" data-bind="visible: goal_type() == 'gain'">
                                    <div class="heading sub-sub">
                                        <h3>Je wilt aankomen</h3>
                                    </div>
                                    <div class="form-row">
                                        <label for="preferred_weight">Je ideale gewicht <span>(in kg)</span>:</label>
                                        <input class="number required" type="number" id="preferred_weight"
                                               name="preferred_weight"
                                               data-bind="value: preferred_weight">
                                    </div>
                                    <div class="form-row">
                                        <label for="goal_speed">Hoe snel wil je aankomen?</span>:</label>
                                        <select class="required" id="goal_speed" name="goal_speed"
                                                data-bind="value: $parent.goal_speed">
                                            <option value="15">Normaal, gezonder eten.</option>
                                            <option value="20">Snel</option>
                                            <option value="25">Heel snel</option>
                                        </select>
                                    </div>
                                    <a class="button" data-bind="click: $parent.createAdvice">Bereken advies</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="calculator-step" data-bind="if: currentStep() == 5">
                    <div class="heading sub">
                        <h3>Jouw advies op maat</h3>
                    </div>
                    <div class="content">
                        <p>Let op; onderstaande is slechts een advies, gebaseerd op algemeen bekende gemiddeldes. Voor een écht advies op maat raden wij je altijd aan een diëtiste to consulteren.</p>
                        <div id="calculator-advice" data-bind="with: program">
                            <div class="heading">
                                <h3>Jouw advies</h3>
                            </div>
                            <div id="calculator-advice-intro">
                                <p>Om aan jouw doel te voldoen raden wij je aan ongeveer <strong data-bind="text: calories_goal()"></strong> kilocalorieën per dag te gebruiken.</p>
                                <p data-bind="if: goal_type() != 'stay'">Met dat doel zal het ongeveer <strong data-bind="text: goal_duration()"></strong> dagen duren om je doel te berekenen.</p>
                            </div>
                            <a class="button" data-bind="click: $parent.submitGoal">Doel opslaan en starten</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
