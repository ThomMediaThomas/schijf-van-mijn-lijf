<script id="register" type="text/html">
    <div data-bind="with: $root.pages.register" class="page">
        <div class="content-wrapper">
            <form id="register-form">
                <div class="heading">
                    <h3>Jouw profiel</h3>
                </div>
                <div class="form-row">
                    <label for="email">E-mail:</label>
                    <input class="required email" type="email" id="email" name="email" data-bind="value: email">
                </div>
                <div class="form-row">
                    <label for="password">Wachtwoord:</label>
                    <input class="required" type="password" id="password" name="password" data-bind="value: password">
                </div>
                <div class="form-row">
                    <label for="username">Gebruikersnaam:</label>
                    <input class="required" type="text" id="username" name="username" data-bind="value: username">
                </div>
                <div class="heading sub">
                    <h3>Jouw gegevens</h3>
                </div>
                <div class="form-row">
                    <label for="firstname">Voornaam:</label>
                    <input class="required" type="text" id="firstname" name="firstname" data-bind="value: firstname">
                </div>
                <div class="form-row">
                    <label for="lastname">Achternaam:</label>
                    <input class="required" type="text" id="lastname" name="lastname" data-bind="value: lastname">
                </div>
                <div class="form-row">
                    <label for="gender">Geslacht:</label>
                    <div class="form-row">
                        <div class="form-row-inner half">
                            <input type="radio" name="gender" id="male" value="m" data-bind="checked: gender"><label for="male">Man</label>
                        </div>
                        <div class="form-row-inner half">
                            <input type="radio" name="gender" id="female" value="f" data-bind="checked: gender"><label for="female">Vrouw</label>
                        </div>
                    </div>
                </div>
                <a class="button" data-bind="click: register">Registreren</a>
            </form>
        </div>
    </div>
</script>
