<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">

            @foreach ($clients as $client)
                
            <div class="col-md-3 col-sm-4 col-xl-2 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class=" wrap-pic-w">
                    {{-- <img src="{{asset('assets/frontend/images/banner-01.jpg')}}" alt="IMG-BANNER"> --}}
                    <img src="{{asset('storage/image/client/'. $client->image)}}" alt="IMG-BANNER">
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>