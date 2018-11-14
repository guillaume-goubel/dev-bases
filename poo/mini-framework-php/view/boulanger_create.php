<h2>Ajouter un boulanger</h2>
<a href="/mini-framework-php/">Liste</a><br><hr>
<form id='form_create_boulanger' onsubmit="return form_action('form_create_boulanger')" action="boulanger.create" method="POST">
	<label>Nom</label><br>
	<input type="text" name='nom'><br>
	<label>Nombre de pain vendus</label><br>
	<input type="number" name='nb_vendu'><br>
	<input type="submit">
</form>
<script src="/mini-framework-php/common/js/main.js"></script>