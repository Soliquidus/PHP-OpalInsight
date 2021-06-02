<div class="productForm form">
    <form id="productForm" method="POST" action="<?php echo $_SESSION['URL'];?>/functions/add_product.php" enctype="multipart/form-data">
        <input type="text" name='name' placeholder="Nom du produit"><br>
        <textarea type="text" name='description' placeholder="description du produit"></textarea><br>
        <input type="number" name='stock' placeholder="quantité du produit"><br>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <input type="file" name="picture">
        <button type="submit">Ajouter un produit</button>
    </form>
</div>