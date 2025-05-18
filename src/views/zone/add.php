<a href="/zone/index">
    <input type="button" value="Back" />
</a>

<h1>Add a storage zone</h1>
<form action="/zone/postadd" method="POST" enctype="multipart/form-data">
    <label for="libelle">name : </label>
    <input type="text" name="libelle" id="libelle" required>
    <br><br>
    <label for="rue">street : </label>
    <input type="text" name="rue" id="rue" required>
    <br><br>
    <label for="cp">postal code : </label>
    <input type="number" name="cp" id="cp" required>
    <br><br>
    <label for="ville">city : </label>
    <input type="text" name="ville" id="ville" required>
    <br><br>
    <input class="btn btn-primary" type="submit" value="submit">
</form>
    
