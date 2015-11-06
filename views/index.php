<?php view( 'header' ); ?>

	<div class="starter-template">
		<h1>Find your favorite restaurants</h1>

		<p class="lead">Search by restaurant name or cuisine type</p>
	</div>

	<div class="row">

		<div class="col-lg-6 col-lg-offset-3">

			<form action="#">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input main-input" type="text" id="findRestaurants">
					<label class="mdl-textfield__label" for="findRestaurants">Find a Restaurant</label>
				</div>
			</form>

		</div>
	</div>


<?php view( 'footer' ); ?>