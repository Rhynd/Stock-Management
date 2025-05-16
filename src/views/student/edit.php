<a href="/student/index">
   <input type="button" value="Back" />
</a>


<h1>SQL Insert Interface</h1>
<form method="post" action="/student/postedit">
    <input type="hidden" name="id" value="<?= htmlspecialchars(isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO'])[3] : null); ?>">
    <label for="table">nom:</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($student['nom']); ?>" required>
    <br><br>

    <label for="columns">prenom:</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($student['prenom']); ?>" required>
    <br><br>

    <label for="columns">email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']); ?>" required>
    <br><br>


   <input type="submit" value="Submit" />

</form>