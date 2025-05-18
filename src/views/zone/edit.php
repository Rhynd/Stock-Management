<a href="/zone/index">
    <input type="button" value="Back" />
</a>

<h1>Add a storage zone</h1>
<form action="/zone/postedit" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars(isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO'])[3] : null) ?>">
    <label for="libelle">name : </label>
    <input type="text" name="libelle" id="libelle" value="<?= htmlspecialchars($zone['libelle']) ?>" required>
    <br><br>
    <label for="rue">street : </label>
    <input type="text" name="rue" id="rue" value="<?= htmlspecialchars($zone['rue']) ?>" required>
    <br><br>
    <label for="cp">postal code : </label>
    <input type="number" name="cp" id="cp" value="<?= htmlspecialchars($zone['cp']) ?>" required>
    <br><br>
    <label for="ville">city : </label>
    <input type="text" name="ville" id="ville" value="<?= htmlspecialchars($zone['ville']) ?>" required>
    <br><br>
    <input class="btn btn-primary" type="submit">
</form>
    
