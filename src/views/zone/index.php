<h1>storage zones List</h1>

<a href="/zone/add">
    <input type="button" value="Add zone" />
</a>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Street</th>
        <th>Postal code</th>
        <th>City</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $zone): ?>
            <tr>
                <td><?= htmlspecialchars($zone['libelle'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($zone['rue'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($zone['cp'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($zone['ville'] ?? 'N/A') ?></td>
                <td>
                    <a href="/zone/view/<?= htmlspecialchars($zone['id'] ?? '') ?>" class="btn btn-info btn-sm">Details</a>
                    <a href="/zone/edit/<?= htmlspecialchars($zone['id'] ?? '') ?>" class="btn btn-warning btn-sm">Modify</a>
                    <a href="#" onclick="confirmDelete(<?= htmlspecialchars($zone['id'] ?? '') ?>); return false;" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No zones available.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<a href="/product/index">
    <input type="button" value="Products" />
</a>


<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this zone?")) {
            fetch(`/zone/delete/${id}`, {
                method: 'GET',
            })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                        alert("zones deleted successfully.");
                    } else {
                        alert("Failed to delete zones.");
                    }
                })
        }
    }
</script>