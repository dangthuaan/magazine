<!-- Header Logo -->
<div class="logo-wrap">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                <a href="{{ route('client.index') }}">
                    <img class="img-fluid" src="{{ asset('storage/images/basic/logo.png') }}" alt="magazine-logo">
                </a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 no-padding ads-banner">
                @include('client.widgets.ads.rectangle')
            </div>
        </div>
    </div>
</div>
<!-- End Header Logo -->
