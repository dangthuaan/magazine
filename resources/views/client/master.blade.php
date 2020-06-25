<!DOCTYPE html>
<html lang="en">

@include('client.includes.head')

<body>
<!-- begin:: Page Loading mask -->
<div id="loading">
    <img id="loading-image" src="{{ asset('storage/images/basic/page-loader.svg') }}" alt="Loading..."/>
</div>
<!-- end:: Page Loading mask -->

<!-- begin:: Ajax Loading mask -->
<div id="ajax-loading" style="display: none; margin-bottom: -25px;">
    <img id="ajax-loading-image" src="{{ asset('storage/images/basic/ajax-page-loader.svg') }}"
         alt="Loading..."/>
</div>
<!-- end:: Ajax Loading mask -->

<div id="dom-disabled" style="display: none"></div>


@include('client.includes.header.master')

@yield('content')

@include('client.includes.footer')
</body>

@include('client.includes.script')

<script>
    //show loading if page is loading
    $(window).ready(function () {
        $('#loading').fadeOut();
    });

    //show loading if ajax working
    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $('#ajax-loading').fadeIn();
            $('#dom-disabled').show();
        });
        $(document).ajaxComplete(function () {
            $('#ajax-loading').fadeOut();
            $('#dom-disabled').hide();
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function errorClient() {
        Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
    }

    function errorServer() {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Server went wrong!',
        });
    }

    function createSuccess() {
        Swal.fire({
            type: 'success',
            title: 'Created Success!',
        }).then(function () {
            location.reload();
        });
    }

    function updateSuccess() {
        Swal.fire({
            type: 'success',
            title: 'Update Success!',
        }).then(function () {
            location.reload();
        });
    }

    function deleteSuccess() {
        Swal.fire({
            type: 'success',
            title: 'Removed!',
        });
    }
</script>

@yield('js')

</html>
