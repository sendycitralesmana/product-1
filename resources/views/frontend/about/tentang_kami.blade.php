
<!-- About Area Start -->
<section class="support-company-area fix pt-10 mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-55">
                    <div class="front-text">
                        <h2 class="">Tentang Kami</h2>
                    </div>
                    <span class="back-text">Matahari Led</span>
                </div>
            </div>
        </div>
    </div>
    <div class="support-wrapper align-items-end">
        <div class="left-content">
            <!-- section tittle -->
            <div class="support-caption">
                {!! html_entity_decode($content1->description) !!}
            </div>
        </div>
        <div class="right-content">
            <!-- img -->
            <div class="right-img">
                <img src=" {{ asset('storage/image/content/'.$content1->thumbnail) }} " width="100%" height="100%" style="object-fit: cover;" srcset="{{ asset('storage/image/about/'.$content1->image) }}') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- About Area End -->