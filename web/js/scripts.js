var searchTimer;
jQuery(document).ready(function () {

    // Fire Ajax call when Add client button is clicked
    jQuery("#addClient").click(quickAddClient);

    /*
     *  Header search feature
     */
    var headerSearchField = '#header-search';

    jQuery(headerSearchField).keyup(headerSearch);



});


function headerSearch(event) {

    var modalElement = '#search-results-modal';
    var modalBody = '#search-results-modal .modal-body';

    clearTimeout(searchTimer);

    // Check that key pressed was numbers/letters or backspace or period '.'
    // return if it is not one of those keys
    if ( !( (event.which > 47 && event.which < 91) || event.which == 190 )  ){
        return;
    }

    // If the event was keyup and fields value length was more than 4 or the event was click and field value was more than 4
    if ( event.type == 'keyup' && jQuery(this).val().length > 4 )
    {

        var searchField = jQuery(this);

        jQuery(searchField).off('keyup', headerSearch);

        searchTimer = setTimeout(function () {
            if ( searchField.val().length > 4 ){
                jQuery.ajax({
                    type: 'GET',
                    url: Routing.generate('header_ajax_search'),
                    dataType: 'text',
                    data: {
                        term: searchField.val()
                    },
                    success: function (response) {
                        jQuery(modalBody).html(response);
                        jQuery(modalElement).modal('show');
                        jQuery(searchField).on('keyup', headerSearch);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        var response = '<div class="alert alert-warning" role="alert">Something went wrong!</div>';

                        jQuery(modalBody).html(response);
                        jQuery(modalElement).modal('show');

                        setTimeout(function () {
                            jQuery(modalElement).modal('hide');
                        }, 7000);
                    }
                });
            }
        }, 1200);

    }

}


function quickAddClient(event) {
    jQuery.ajax({
        type: 'GET',
        url: 'http://localhost:8000/ajax/add-client/',
        success: function (response) {
            jQuery("#add_client_modal .modal-body").html(response);
        }
    });
}