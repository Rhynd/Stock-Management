<h1>Product List</h1>

<a href="/product/add">
    <input type="button" value="Add Product" />
</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price TTC</th>
            <th>Zone</th>
            <th>Picture</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($product['quantity'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars(isset($product['priceTTC']) ? number_format((float)$product['priceTTC'], 2, ',', ' ') . ' €' : 'N/A') ?></td>
                <td><?= htmlspecialchars($product['zone_name'] ?? ($product['idZone'] ?? 'N/A')) ?></td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="/uploads/product_images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name'] ?? 'Product Image') ?>" style="width: 50px; height: auto;">
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/product/view/<?= htmlspecialchars($product['id'] ?? '') ?>" class="btn btn-info btn-sm">Détails</a>
                    <a href="/product/edit/<?= htmlspecialchars($product['id'] ?? '') ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="#" onclick="confirmDelete(<?= htmlspecialchars($product['id'] ?? '') ?>); return false;" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No products available.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this products?")) {
            fetch(`/product/delete/${id}`, {
                method: 'GET',
            })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                        alert("products deleted successfully.");
                    } else {
                        alert("Failed to delete products.");
                    }
                })
        }
    }
</script>