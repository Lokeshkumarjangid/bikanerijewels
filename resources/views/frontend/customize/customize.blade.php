@extends('frontend.layouts.app')

@section('title', 'customize')
@section('content') 
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Customize</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="customize-top">
    <div class="container">

        <!-- VIDEO SECTION -->
        <div class="video-box">
            <iframe src="https://www.youtube.com/embed/YOUR_VIDEO_ID"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>

        <!-- TITLE -->
        <div class="heading">
            <h2>Customize Your Jewellery</h2>
            <p>Your Design — Our Craftsmanship</p>
        </div>

        <!-- STEPS -->
        <div class="steps">

            <div class="step">
                <div class="icon">💡</div>
                <h4>Step 1</h4>
                <p>Share your jewellery design and idea of customizing it.</p>
            </div>

            <div class="step">
                <div class="icon">🖥️</div>
                <h4>Step 2</h4>
                <p>Your specifics are analysed, cost & timeline shared.</p>
            </div>

            <div class="step">
                <div class="icon">🔨</div>
                <h4>Step 3</h4>
                <p>We craft your jewellery after order confirmation.</p>
            </div>

            <div class="step">
                <div class="icon">📦</div>
                <h4>Step 4</h4>
                <p>Your jewellery is delivered after final payment.</p>
            </div>

        </div>

    </div>
</section>

<section class="customize-wrapper">
    <form method="post" action="{{route('customize.store')}}" enctype="multipart/form-data" >
        <div class="containers">
            <div class="customize-grid">
                    <div class="card upload-card">

                        <h3>Upload Your Design</h3>

                        <div class="upload-area">
                        <i class="fa fa-camera"></i>
                        <p>Upload Image (Max 5MB)</p>
                        <input type="file">
                    </div>

            </div>

            <div class="card spec-card">
                <h3>Jewellery Specifications</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Item Name</label>
                            <select name="item_name">
                                <option value="">Select Item name</option>
                                <option value="Ring">Ring</option>
                                <option value="Earrings">Earrings</option>
                                <option value="Necklaces">Necklaces</option>
                                <option value="Bracelets">Bracelets</option>
                                <option value="Bangles">Bangles</option>
                                <option value="Choddi">Choddi</option>
                                <option value="Rakhadi">Rakhadi</option>
                                <option value="Bajuband">Bajuband</option>
                                <option value="Mang tika">Mang tika</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Size</label>
                            <select name="size">
                                <option value="">Select</option>

                                <!-- Numeric Sizes -->
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16">16</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                                <option value="22">22</option>
                                <option value="24">24</option>
                                <option value="26">26</option>
                                <option value="28">28</option>
                                <option value="30">30</option>

                                <!-- Types -->
                                <option value="bracelet_length">Bracelet Length</option>
                                <option value="long_haar_length">Long Haar Length</option>
                                <option value="line_mala_length">Line / Mala Length</option>
                                <option value="earring_length">Earring Length</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Diamond Size</label>
                            <input type="text">
                        </div>

                        <div class="form-group">
                            <label>Estimate</label>
                            <select name="estimate">
                                <option value="">Select</option>
                                <option value="GOLD GM">GOLD GM</option>
                                <option value="POLKI CT">POLKI CT</option>
                                <option value="ROSECUT CT">ROSECUT CT</option>
                                <option value="DIAMOND CT">DIAMOND CT</option>
                                <option value="CLR STONE CT">CLR STONE CT</option>
                                <option value="PEARL CT">PEARL CT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Metal Purity</label>
                            <select name="metal_purity">
                                <option value="">Select</option>
                                <option value="22KT GOLD">22KT GOLD</option>
                                <option value="18KT GOLD">18KT GOLD</option>
                                <option value="16KT GOLD">16KT GOLD</option>
                                <option value="14KT GOLD">14KT GOLD</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Bredth</label>
                            <select name="breadth">
                                <option value="">Select</option>

                                <option value="Bracelet Breadth">Bracelet Breadth</option>
                                <option value="Kada Breadth">Kada Breadth</option>
                                <option value="Churi Breadth">Churi Breadth</option>
                                <option value="Choker Breadth">Choker Breadth</option>
                                <option value="Necklace Breadth">Necklace Breadth</option>
                                <option value="Tops Breadth">Tops Breadth</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Meena Front Side</label>
                            <select name="meena_front_side">
                                <option value="">Select</option>

                                <option value="Partach">Partach</option>
                                <option value="Red Meena">Red Meena</option>
                                <option value="Green Meena">Green Meena</option>
                                <option value="Blue Meena">Blue Meena</option>
                                <option value="Black Meena">Black Meena</option>
                                <option value="Turquoise Meena">Turquoise Meena</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Back Side</label>
                             <select name="back_design">
                                <option value="">Select</option>

                                <option value="open">Open</option>
                                <option value="Plain Pattar">Plain Pattar</option>
                                <option value="Designer Pattar">Designer Pattar</option>
                                <option value="Jali Back Side">Jali Back Side</option>
                                <option value="Jali with Diamond">Jali with Diamond</option>
                                <option value=">Nakshi Back Side">Nakshi Back Side</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Ring -->

                        <div class="form-group">
                            <label>Utrai</label>
                            <select name="uttrai">
                                <option value="">Select</option>

                                <option value="Red Plain Uttrai">Red Plain Uttrai</option>
                                <option value="Red Cutting Uttrai">Red Cutting Uttrai</option>

                                <option value="Green Plain Uttrai">Green Plain Uttrai</option>
                                <option value="Green Cutting Uttrai">Green Cutting Uttrai</option>

                                <option value="Blue Plain Uttrai">Blue Plain Uttrai</option>
                                <option value="Blue Cutting Uttrai">Blue Cutting Uttrai</option>

                                <option value="Pink Plain Uttrai">Pink Plain Uttrai</option>
                                <option value="Pink Cutting Uttrai">Pink Cutting Uttrai</option>

                                <option value="Yellow Plain Uttrai">Yellow Plain Uttrai</option>
                                <option value="Yellow Cutting Uttrai">Yellow Cutting Uttrai</option>

                                <option value="Coral Plain Uttrai">Coral Plain Uttrai</option>
                                <option value="Coral Cutting Uttrai">Coral Cutting Uttrai</option>

                                <option value="Turquoise Plain Uttrai">Turquoise Plain Uttrai</option>
                                <option value="Turquoise Cutting Uttrai">Turquoise Cutting Uttrai</option>

                                <option value="Black Plain Uttrai">Black Plain Uttrai</option>
                                <option value="Black Cutting Uttrai">Black Cutting Uttrai</option>

                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Buggate</label>
                            <select name="buggate">
                                <option value="">Select</option>

                                <option value="Diamond Buggate">Diamond Buggate</option>
                                <option value="Red Buggate">Red Buggate</option>
                                <option value="Green Buggate">Green Buggate</option>
                                <option value="Blue Buggate">Blue Buggate</option>
                                <option value="Yellow Buggate">Yellow Buggate</option>
                                <option value="Pink Buggate">Pink Buggate</option>
                                <option value="Ruby Light Buggate">Ruby Light Buggate</option>
                                <option value="Spinal Buggate">Spinal Buggate</option>
                                <option value="Turquoise Buggate">Turquoise Buggate</option>
                                <option value="Black Buggate">Black Buggate</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Diamound</label>
                            <select name="diamound">
                                <option value="">Select</option>

                                <option value="Double Cut Round">Double Cut Round</option>
                                <option value="Single Cut Round">Single Cut Round</option>
                                <option value="Old Cut Round">Old Cut Round</option>
                                <option value="Old Cut Mix">Old Cut Mix</option>
                                <option value="Paan">Paan</option>
                                <option value="Marquise">Marquise</option>
                                <option value="Emerald Cut">Emerald Cut</option>
                                <option value="Fancy">Fancy</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Rosecut</label>
                            <select name="rosecut">
                                <option value="">Select</option>

                                <option value="Round Rosecut">Round Rosecut</option>
                                <option value="Oval Rosecut">Oval Rosecut</option>
                                <option value="Pan Rosecut">Pan Rosecut</option>
                                <option value="Mix Rosecut">Mix Rosecut</option>
                                <option value="Unshape Rosecut">Unshape Rosecut</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <!-- Delivery -->

                        <div class="form-group">
                            <label>Polki</label>
                            <select name="polki">
                                <option value="">Select</option>
                                <option value="Syndicate Polki">Syndicate Polki</option>
                                <option value="Kilvas Polki">Kilvas Polki</option>
                                <option value="Mix Polki">Mix Polki</option>
                                <option value="Mojonite Polki">Mojonite Polki</option>
                                <option value="Mojonite Parab">Mojonite Parab</option>
                                <option value="Emitation Polki">Emitation Polki</option>
                                <option value="Emitation Parab">Emitation Parab</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Dank</label>
                            <select name="dank_type">
                                <option value="">Select</option>
                                <option value="Smosa Dank">Smosa Dank</option>
                                <option value="Round Dank">Round Dank</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Colour Stone</label>
                            <select class="select2" name="colour_stone">
                                <option value=""></option>
                                <option value="Ruby Cut">Ruby Cut</option>
                                <option value="Ruby Pota">Ruby Pota</option>
                                <option value="Ruby Carving">Ruby Carving</option>

                                <option value="Emerald Cut">Emerald Cut</option>
                                <option value="Emerald Pota">Emerald Pota</option>
                                <option value="Emerald Carving">Emerald Carving</option>

                                <option value="Blue Sapphire Cut">Blue Sapphire Cut</option>
                                <option value="Blue Sapphire Pota">Blue Sapphire Pota</option>
                                <option value="Blue Sapphire Carving">Blue Sapphire Carving</option>

                                <option value="Yellow Sapphire Cut">Yellow Sapphire Cut</option>
                                <option value="Yellow Sapphire Pota">Yellow Sapphire Pota</option>
                                <option value="Yellow Sapphire Carving">Yellow Sapphire Carving</option>

                                <option value="Pearl Pota">Pearl Pota</option>
                                <option value="Pearl Carving">Pearl Carving</option>

                                <option value="Coral Cut">Coral Cut</option>
                                <option value="Coral Pota">Coral Pota</option>
                                <option value="Coral Carving">Coral Carving</option>

                                <option value="Catseye Cut">Catseye Cut</option>
                                <option value="Catseye Pota">Catseye Pota</option>
                                <option value="Catseye Carving">Catseye Carving</option>

                                <option value="Hessonite Cut">Hessonite Cut</option>
                                <option value="Hessonite Pota">Hessonite Pota</option>
                                <option value="Hessonite Carving">Hessonite Carving</option>

                                <option value="Tourmaline Plane">Tourmaline Plane</option>
                                <option value="Tourmaline Cutting">Tourmaline Cutting</option>
                                <option value="Tourmaline Carving">Tourmaline Carving</option>

                                <option value="Ruby Light Plane">Ruby Light Plane</option>
                                <option value="Ruby Light Cutting">Ruby Light Cutting</option>
                                <option value="Ruby Light Carving">Ruby Light Carving</option>

                                <option value="Spinal Plane">Spinal Plane</option>
                                <option value="Spinal Cutting">Spinal Cutting</option>
                                <option value="Spinal Carving">Spinal Carving</option>

                                <option value="Turquoise Plane">Turquoise Plane</option>
                                <option value="Turquoise Carving">Turquoise Carving</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <!-- Description -->

                        <div class="form-group full">
                            <label>Describe your design</label>
                            <textarea></textarea>
                        </div>

                    </div>
            </div>

            <div class="card contact-card">
                <h3>Your Contact Details</h3>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="text" placeholder="Mobile">
                <textarea placeholder="Address"></textarea>
            </div>
        </div>
        <button class="submit-btn">Submit</button>
    </form>
</section>
@endsection
@section('scripts')
<script>
    $('.select2').select2({
        placeholder: "Select",
        width: '100%'
    });
</script>
@endsection