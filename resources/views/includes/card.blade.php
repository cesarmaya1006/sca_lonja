<div class="row pl-md-3 pr-md-3">
    <div class="col-12 card card-outline card-info sombra" id="caja_card_outline">
        <div class="card-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 mb-md-0">
                        <h4 class="card-title">
                            <strong>@yield('titulo_card')</strong>
                        </h4>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                        @yield('botones_card')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    @include('includes.mensaje')
                    @include('includes.error-form')
                </div>
                <div class="col-12">
                    @yield('cuerpo')
                </div>
            </div>
        </div>
        <div class="card-footer">
            @yield('footer_card')
        </div>
    </div>
</div>
