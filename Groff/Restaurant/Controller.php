<?php namespace Groff\Restaurant;


class Controller {

	/**
	 * Main index page
	 */
	public function index() {
		view( "index" );
	}

	/**
	 * @param $query - The search query used to find restaurants
	 */
	public function search( $query ) {

		//sleep(2);
		$results = Restaurant::search($query);

		echo json_encode( $results );
	}

} 