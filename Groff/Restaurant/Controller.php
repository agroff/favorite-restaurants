<?php namespace Groff\Restaurant;

use \ORM;

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
		$query = addcslashes($query, "%_") . "%";

		$restaurants = ORM::for_table( 'restaurants' )
		                  ->where_any_is( array(
			                  array( 'restaurant_name' => $query ),
			                  array( 'cuisine_type' => $query ),
		                  ), "LIKE" )
		                  ->order_by_asc( 'restaurant_name' )
		                  ->find_many();

		$results = array();
		foreach ( $restaurants as $restaurant ) {
			$results[] = $restaurant->as_array();
		}

		echo json_encode( $results );
	}

} 