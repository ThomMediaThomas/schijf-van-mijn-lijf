<script id="profile" type="text/html">
    <div class="page" data-bind="with: $root.pages.profile">
        <div class="content-wrapper">
            <form id="profile-form">
                <div  data-bind="with: user">
                    <div class="heading">
                        <h3>Jouw profiel</h3>
                    </div>
                    <div class="form-row">
                        <label for="username">Gebruikersnaam:</label>
                        <input class="required" type="text" id="username" name="username" data-bind="value: username" disabled="disabled">
                    </div>
                    <div class="form-row">
                        <label for="email">E-mail:</label>
                        <input class="required email" type="email" id="email" name="email" data-bind="value: email">
                    </div>
                    <div class="form-row">
                        <label for="email">Profiel-foto:</label>
                        <input type="file" id="avatar-upload" name="image"  />
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
                        <select class="required" id="gender" name="gender" data-bind="value: gender">
                            <option value="m">Man</option>
                            <option value="f">Vrouw</option>
                        </select>
                    </div>
                </div>
                <a class="button" data-bind="click: submit">Profiel opslaan</a>
            </form>
        </div>
    </div>
</script>
