<a href="/product/index">
    <input type="button" value="Back" />
</a>

<h1>Add product</h1>
<form action="/product/postadd" method="POST">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name">
    <br><br>
        <label for="quantity">quantité : </label>
        <input type="number" name="quantity" id="quantity">
    <br><br>
        <label for="priceHT">prix HT : </label>
        <input type="number" name="priceHT" id="priceHT">
    <br><br>
    
        <label for="TVA">TVA : </label>
        <input type="number" name="TVA" id="TVA">
    <br><br>
        <label for="zone">zone : </label>
        <select name="idZone" id="idZone">
            <option value="1">Zone 1</option>
            <option value="2">Zone 2</option>
            <option value="3">Zone 3</option>
            </select>
    <br><br>
        <label for="image">image : </label>
        <input type="file" name="image" id="image">
    <br><br>
        <input type="hidden" name="priceTTC" id="priceTTC" value=0>
        <input class="btn btn-primary" type="submit" value="Valider">
    </form>
    

<?php debug::printr($data);?>