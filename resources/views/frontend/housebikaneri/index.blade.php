@extends('frontend.layouts.app')

@section('title', 'customize')
@section('content')

<section class="legacy-section">
    <!-- <div class="container">

        <div class="section-heading">
            <h2>LEGACY OF 1881</h2>

            <p class="sub-heading">
                The luxurious history began with Seth Rai Bahadur Champalal Ji Raniwala of Beawar.
                He was bestowed the title of Rai Bahadur by the British and given the mark of
                "Raniwala" in the 19th century. His passion and appreciation for fine jewellery
                live on as a legacy and stand as a hallmark of the Raniwala family.
            </p>
        </div>

        <div class="legacy-content">

            <div class="legacy-image">
                <img src="images/legacy.jpg" alt="Legacy Image">
            </div>

            <h3 class="image-title">
                SETH RAI BAHADUR CHAMPALAL JI OF BEAWAR
            </h3>

            <div class="description">
                <p>
                    The legacy of Raniwala began as a collector of fine jewellery and crafts of
                    Rajasthan rooted in Beawar. Rai Bahadur Champalal Ji was known for his refined
                    taste and remarkable vision, laying the foundation for a timeless jewellery
                    tradition that continues to inspire generations.
                </p>
            </div>

        </div>

    </div> -->
    {!! $jelwary->section_1 !!}
</section>
<section class="legacy-gallery-one py-5">
    <!-- <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 col-6">
                <div class="legacy-card">
                    <img src="images/legacy.jpg" alt="test.jpg">
                    <h5>SMT MAHADEVI JI WIFE OF SETH CHAMPALAL JI</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="legacy-card">
                    <img src="images/legacy.jpg" alt="test.jpg">
                    <h5>SMT RADHA RANI JI WITH SMT CHANDRAKANTA JI</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="legacy-card">
                    <img src="images/legacy.jpg" alt="test.jpg">
                    <h5>SHRI G.L. RANIWALA WITH SMT RADHA RANI</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="legacy-card">
                    <img src="images/legacy.jpg" alt="test.jpg">
                    <h5>RANIWALA HAVELI ROOM</h5>
                </div>
            </div>
        </div>
    </div> -->
    {!! $jelwary->section_2 !!}
</section>
<section class="legacy-gallery-two py-5">
    <!-- <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="legacy-large-card">
                    <img src="{{asset('image/test.png')}}" alt="test.png">
                    <h5>RANIWALA HAVELI</h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="legacy-large-card">
                    <img src="{{asset('image/test.png')}}" alt="test.png">
                    <h5>HISTORIC CLOCK TOWER</h5>
                </div>
            </div>
        </div>
    </div> -->
    {!! $jelwary->section_3 !!}
</section>
<section class="echo-history">
    <!-- <div class="container">
        <div class="echo-history-content">

            <img src="{{asset('image/icon_biknari.jpg')}}" class="history-icon" alt="test.png">

            <h2>Echoes of History in Every Arch</h2>

            <p>
                The CR mark displayed on the wall of the haveli stands as a
                significant symbol, potentially representing Seth Champalal Ji's
                enduring legacy...
            </p>

            <div class="history-image">
                <img src="images/image1.jpg" alt="test.png">
                <span>"CR MARK" AT BEAWAR HAVELI WALL.</span>
            </div>

            <div class="history-image">
                <img src="images/image2.jpg" alt="test.png">
                <span>CORRIDORS OF RANIWALA TEMPLE</span>
            </div>

        </div>

    </div> -->
    {!! $jelwary->section_4 !!}
</section>
<section class="heritage-card-section">
     <!-- <div class="heritage-top-content">
        <img src="{{ asset('image/icon_biknari.jpg') }}" class="history-icon" alt="Icon.jpg">

        <h2 class="section-title">
            TREASURES THAT ARE TIMELESS
        </h2>

        <p class="section-description">
            Timeless treasures are windows into the past, carrying stories of innovation,
            artistry, and heritage that continue to inspire from the 1940s, reflecting
            the cultural aesthetics of their time. Together, these timeless pieces serve
            as enduring symbols of history, preserving the essence of a rich and vibrant past.
        </p>

    </div>
    <div class="heritage-card">
        <div class="heritage-image">
            <img src="{{asset('image/forbanner1.jpg')}}" alt="Icon.jpg">
        </div>
        <h3 class="heritage-title">
            RANIWALA NASIAJI TEMPLE
        </h3>
        <p class="heritage-desc">
            The Raniwala Nasia Ji Temple, built in the 1890s, stands as a
            spiritual and architectural marvel. Dedicated to Lord Neminathji,
            the temple embodies devotion and timeless artistry.
        </p>
    </div> -->
    {!! $jelwary->section_5 !!}
</section>

@endsection