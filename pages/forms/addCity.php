<div class="cityForm form">
    <form id="form-city" method="post" action="../../functions/add_city.php">
        <input type="text" id="name" name="name" placeholder="Nom">
        <br>
        <label>Pays</label>
        <select id="country_id" name="country_id">
            <option value=""> -- choisir -- </option>
            <?php
            $countryList = $countryManager->getCountryList();
            foreach ($countryList as $value) {
                ?>
                <option value="<?php echo $value->getId(); ?>"><?php echo $value->getName(); ?></option>
                <?php
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Enregistrer</button>
    </form>
</div>
