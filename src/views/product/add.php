<a href="/product/index">
    <input type="button" value="Back" />
</a>

<h1>Add a product</h1>
<form action="/product/postadd" method="POST" enctype="multipart/form-data">
        <label for="name">name : </label>
        <input type="text" name="name" id="name" required>
    <br><br>
        <label for="quantity">quantity : </label>
        <input type="number" name="quantity" id="quantity" required>
    <br><br>
        <label for="priceHT">price HT : </label>
        <input type="number" name="priceHT" id="priceHT" required>
    <br><br>
    
        <label for="TVA">TVA : </label>
        <input type="number" name="TVA" id="TVA" required>
    <br><br>
    <label for="idZone">Storage zone : </label>
    <select name="idZone" id="idZone">
        <?php if (!empty($zones)): ?>
            <?php foreach ($zones as $zone): ?>
                <option value="<?= htmlspecialchars($zone['id']) ?>">
                    <?= htmlspecialchars($zone['libelle']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No zones available</option>
        <?php endif; ?>
    </select>
    <br><br>
        <label for="image">picture : </label>
        <input type="file" name="image" id="image" required>
    <br><br>
        <input type="hidden" name="priceTTC" id="priceTTC" value=0>
        <input class="btn btn-primary" type="submit" value="submit">
    </form>
    
