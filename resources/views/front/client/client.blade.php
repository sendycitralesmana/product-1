<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">

            @foreach ($clients as $client)

            @if ( $client->is_hidden == 0 )
                <div class="col-md-3 col-sm-4 col-xl-2 p-b-10 m-lr-auto">
                    <!-- Block1 -->
                    <div class=" wrap-pic-w p-4">
                        @if ( $client->link != null )
                            <a href="{{ $client->link }}" target="_blank">
                                <img src="{{asset('storage/image/client/'. $client->image)}}" alt="IMG-BANNER" class="img-fluid rounded" style="height: 120px">
                            </a>
                        @else
                            <img src="{{asset('storage/image/client/'. $client->image)}}" class="img-fluid rounded" alt="IMG-BANNER" style="height: 120px">
                        @endif
                    </div>
                </div>
            @endif
                

            @endforeach

        </div>
    </div>
</div>