<?php
$pdo = null;
$addressManager = new AddressManager($pdo);
?>

<div class="formAddConcert form">
    <h2>Ajouter un concert</h2>
    <form id="formConcert">
        <label for="name">Titre du concert</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="5" cols="33"></textarea>
        <br>
        <label for="address_id">Adresse</label>
        <select name="address_id" id="address_id">
            <option value=""> -- Choisir -- </option>
            <?php
            $addressList = $addressManager->getAddressList();
            foreach ($addressList as $value) {
                ?>
                <option value="<?php echo $value->getId(); ?>">
                    <?php echo $value->getName(); ?>
                </option>
                <?php
            }
            ?>
        </select>
        <label for="concert_start">Date de début</label>
        <input type="datetime-local" name="concert_start" id="concert_start">
        <br>
        <label for="concert_end">Date de fin</label>
        <input type="datetime-local" name="concert_end" id="concert_end">
        <br>
        <label for="available_tickets">Nombre de places</label>
        <input type="number" name="available_tickets" id="available_tickets">
        <br>
        <label for="ticket_price">Prix</label>
        <input type="number" name="ticket_price" id="ticket_price">
        <br>
        <button type="submit">Enregistrer</button>
    </form>
</div>
