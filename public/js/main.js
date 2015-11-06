(function ($) {

    var findRestaurantsInput = "#findRestaurants",
        restaurantResults = "#restaurantResults",
        rowTemplate = "#restaurantRow",

        setState = function (state) {
            var $states = $("#loadingContainer, #resultsHeader, #noResults");
            $states.hide();

            $("#" + state).show();
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
            $.getJSON("/search/" + query, callback);
        },

        ready = function () {
            var searchRestaurants = function () {
                var query = $(this).val();
                getMatchingRestaurants(query, function (response) {
                    renderRestaurants(response);
                });
            };

            $(findRestaurantsInput).keyup(searchRestaurants);
        };

    $(ready);
}(jQuery));