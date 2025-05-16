<a href="/student/index">
   <input type="button" value="Back" />
</a>


<h1>SQL Insert Interface</h1>
<form method="post" action="/student/postadd">
    <label for="table">nom:</label>
    <input type="text" id="nom" name="nom" required>
    <br><br>

    <label for="columns">prenom:</label>
    <input type="text" id="prenom" name="prenom" required>
    <br><br>

    <label for="columns">email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>


   <input type="submit" value="Submit" />

</form>