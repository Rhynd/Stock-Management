<a href="/product/index">
    <input type="button" value="Back" />
</a>

<h1>Product details</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price HT</th>
        <th>TVA</th>
        <th>Price TTC</th>
        <th>Storage zone</th>
        <th>Picture</th>
    </tr>
    </thead>
    <tbody>
            <tr>
                <td><?= htmlspecialchars($id) ?></td>
                <td><?= htmlspecialchars($product['name'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['quantity'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['priceHT'] ?? 'N/A') ?>  €</td>
                <td><?= htmlspecialchars($product['TVA'] ?? 'N/A') ?> %</td>
                <td><?= htmlspecialchars($product['priceTTC'] ?? 'N/A') ?>  €</td>
                <td><?= htmlspecialchars($product['zone_name'] ?? ($product['idZone'] ?? 'N/A')) ?></td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="/public/image/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name'] ?? 'Product Image') ?>" style="width: 50px; height: auto;">
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
    </tbody>
</table>