<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="style/css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="style/css/skins/skin-master.css">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="style/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="style/css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="style/css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="style/css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="style/css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="style/css/fa-regular.css">
        <link rel="stylesheet" href="default_style.css">
        <script src="style/js/vendors.bundle.js"></script>
        <script src="style/js/app.bundle.js"></script>
        <script src="style/js/miscellaneous/lightgallery/lightgallery.bundle.js"></script>
        <script>
            $(document).ready(function() {
                $('input[type=radio][name=contactview]').change(function() {
                    if (this.value == 'grid') {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                        $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                        $('#js-contacts .js-expand-btn').addClass('d-none');
                        $('#js-contacts .card-body + .card-body').addClass('show');

                    } else if (this.value == 'table') {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                        $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                        $('#js-contacts .js-expand-btn').removeClass('d-none');
                        $('#js-contacts .card-body + .card-body').removeClass('show');
                    }
                });
                initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
            });
        </script>
        <script>
            if(window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        @yield('map')
    </head>
    <body>
        @yield('content')
    </body>
</html>