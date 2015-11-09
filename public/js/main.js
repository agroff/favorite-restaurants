(function ($) {

    var findRestaurantsInput = "#findRestaurants",
        restaurantResults = "#restaurantResults",
        rowTemplate = "#restaurantRow",

        setState = function (state) {
            var $states = $("#loadingContainer, #resultsHeader, #noResults"),
                $results = $("#restaurantResults");

            $states.hide();

            if(state === false){
                $results.hide();
            }
            else {
                $results.show();
                $("#" + state).show();
            }
        },

        renderRestaurants = function (results) {
            var $resultContainer = $(restaurantResults),
                $rowTemplate = $(rowTemplate);

            $resultContainer.html("");
            setState("loadingContainer");

            $.each(results, function (i, item) {
                $resultContainer.loadTemplate($rowTemplate, item, {prepend : true});
            });

            if (results.length === 0) {
                setState("noResults");
            }
            else {
                setState("resultsHeader");
            }
        },

        getMatchingRestaurants = function (query, callback) {
            if(query === ""){
                setState(false);
                return;
            }
            $.getJSON("/search/" + query, callback);
        },

        ready = function () {

            $(findRestaurantsInput).keyup(function () {
                var query = $(this).val();
                getMatchingRestaurants(query, renderRestaurants);
            });
        };

    $(ready);
}(jQuery));