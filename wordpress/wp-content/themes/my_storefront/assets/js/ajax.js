jQuery(document).ready(function($) {
    $('#cities-search-form').on('submit', function(e) {
        e.preventDefault();
        let searchTerm = $('#search_term').val();
        $.ajax({
            url: Ajax.ajax_url,
            method: 'POST',
            data: {
                action: 'cities_search',
                nonce: Ajax.nonce,
                search_term: searchTerm
            },
            success: function(response) {
                if(response.success) {
                    // alert(response.data);
                    $('#cities-table-container').html(response.data);
                } else {
                    alert(response.data);
                }
            },
            error: function() {
                alert('Error. Try it again.');
            }
        });
    });
});
