<?php
$pdo = null;
$cityManager = new CityManager($pdo);
?>

<div class="formAddAddress form">
    <form id="form-address" method="post" action="../../functions/add_address.php">
        <input type="text" id="name" name="name" placeholder="Ex. : Bar du Chat Noir">
        <br>
        <input type="number" id="number" name="number" placeholder="numéro de la rue">
        <br>
        <input type="text" id="address" name="address" placeholder="rue...">
        <br>
        <input type="number" id="postal_code" name="postal_code" placeholder="code postal...">
        <br>
        <label>Ville</label>
        <select id="city_id" name="city_id">
            <option value=""> -- Choisir -- </option>
            <?php
            $cityList = $cityManager->getCityList();
            foreach ($cityList as $value) {
                ?>
                <option value="<?php echo $value->getId(); ?>">
                    <?php echo $value->getName(); ?>
                </option>
                <?php
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Enregistrer</button>
    </form>
</div>
