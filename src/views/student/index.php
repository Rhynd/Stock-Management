<h1>SQL Interface</h1>

<a href="/student/add">
   <input type="button" value="Add user" />
</a>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['nom']) ?></td>
                    <td><?= htmlspecialchars($student['prenom']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td>
                        <a href="/student/edit/<?= htmlspecialchars($student['id']) ?>">Edit</a>
                        <a onclick="confirmDelete(<?= htmlspecialchars($student['id']) ?>)">Delete</a>                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No data available</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this student?")) {
            fetch(`/student/delete/${id}`, {
                method: 'GET',
            })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                        alert("Student deleted successfully.");
                    } else {
                        alert("Failed to delete student.");
                    }
                })
        }
    }
</script>