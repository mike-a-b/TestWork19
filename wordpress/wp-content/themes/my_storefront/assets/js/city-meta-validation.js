// frontend validation for latitude and longitude fields in the city meta box
jQuery(document).ready(function($) {
    $('#post').on('submit', function(e) {
        const lat = parseFloat($('#cities_latitude').val());
        const lng = parseFloat($('#cities_longitude').val());

        let valid = true;
        let errors = [];

        if (isNaN(lat) || lat < -90 || lat > 90) {
            valid = false;
            errors.push('The latitude must be in the range from -90 to 90.');
        }

        if (isNaN(lng) || lng < -180 || lng > 180) {
            valid = false;
            errors.push('The longitude must be in the range from -180 to 180.');
        }

        if (!valid) {
            alert(errors.join("\n"));
            e.preventDefault();
        }
    });
});