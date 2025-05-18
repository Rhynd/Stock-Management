<a href="/product/index">
    <input type="button" value="Back" />
</a>

<h1>Edit a product</h1>
<form action="/product/postedit" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars(isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO'])[3] : null) ?>">
    <label for="name">name : </label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>">
    <br><br>
    <label for="quantity">quantity : </label>
    <input type="number" name="quantity" id="quantity" value="<?= htmlspecialchars($product['quantity']) ?>">
    <br><br>
    <label for="priceHT">price HT : </label>
    <input type="number" name="priceHT" id="priceHT" value="<?= htmlspecialchars($product['priceHT']) ?>">
    <br><br>

    <label for="TVA">TVA : </label>
    <input type="number" name="TVA" id="TVA" value="<?= htmlspecialchars($product['TVA']) ?>">
    <br><br>
    <label for="idZone">Storage zone : </label>
    <select name="idZone" id="idZone">
        <option value="1">Zone 1</option>
        <option value="2">Zone 2</option>
        <option value="3">Zone 3</option>
    </select>
    <br><br>
    <label for="image">picture : </label>
    <img src="/public/image/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name'] ?? 'Product Image') ?>" style="width: 50px; height: auto;">
    <input type="file" name="image" id="image" value="<?= "public/image/" .$product['image']?>">
    <br><br>
    <input type="hidden" name="priceTTC" id="priceTTC" value=0>
    <input class="btn btn-primary" type="submit" value="submit">
</form>


