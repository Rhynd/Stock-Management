<a href="/zone/index">
    <input type="button" value="Back" />
</a>

<h1>zone details</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Street</th>
        <th>Postal code</th>
        <th>City</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= htmlspecialchars(isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO'])[3] : null) ?></td>
        <td><?= htmlspecialchars($zone['libelle'] ?? 'N/A') ?></td>
        <td><?= htmlspecialchars($zone['rue'] ?? 'N/A') ?></td>
        <td><?= htmlspecialchars($zone['cp'] ?? 'N/A') ?></td>
        <td><?= htmlspecialchars($zone['ville'] ?? 'N/A') ?></td>
    </tr>
    </tbody>
</table>

<h1>Products</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Price HT</th>
        <th>TVA</th>
        <th>Price TTC</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['priceHT'] ?? 'N/A') ?> €</td>
                <td><?= htmlspecialchars($product['TVA'] ?? 'N/A') ?> %</td>
                <td><?= htmlspecialchars($product['priceTTC'] ?? 'N/A') ?> €</td>
                <td><img src="/public/image/<?= htmlspecialchars($product['image'] ?? '') ?>" alt="Product Image" width="100"></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No products available.</td>
        </tr>
    <?php endif; ?>
    </tbody>