@if (session()->has('message'))
    <div class="container top-0 position-relative" id="flash">
        <div class="row d-flex">
            <div class="col-4 justify-content-center" style="background-color: #ee5253">
                <p style="color: #ecf0f1">{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif