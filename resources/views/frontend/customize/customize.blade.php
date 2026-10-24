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
                        <input type="file" id="designImage">
                    </div>

                    <div id="previewBox" style="display:none; margin-top:20px;">
                        <img id="previewImage"
                            src=""
                            alt="Image Preview"
                            style="display:block; max-width:100%; width:300px; height:auto; margin-top:10px;">

                        <button type="button"
                                id="removeImage"
                                style="margin-top:10px;">
                            Remove Image
                        </button>
                    </div>

            </div>

            <div class="card spec-card">
                <h3>Jewellery Specifications</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Item Name</label>
                            <select name="item_name" class="js-example-basic-single">
                                <option value="">Select</option>
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
                                <option value="2-2">2-2</option>
                                <option value="2-4">2-4</option>
                                <option value="2-6">2-6</option>
                                <option value="2-8">2-8</option>
                                <option value="2-10">2-10</option>
                                <option value="2-12">2-12</option>

                                <!-- Types -->
                                <option value="bracelet_length">Bracelet Length</option>
                                <option value="long_haar_length">Long Haar Length</option>
                                <option value="line_mala_length">Line / Mala Length</option>
                                <option value="earring_length">Earring Length</option>
                                <option value="other">Other</option>
                            </select>
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
                             <select name="back_side">
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
                            <label>Baguette</label>
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

                        <!-- Ring -->

                        <!-- <div class="form-group">
                            <label>Baguette</label>
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
                        </div> -->

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
                            <select name="dank">
                                <option value="">Select</option>
                                <option value="Smosa Dank">Smosa Dank</option>
                                <option value="Round Dank">Round Dank</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Colour Stone</label>
                            <select name="colour_stone">
                                <option value="">Select</option>
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

                        <div class="form-group">
                            <label>Rhodium</label>
                            <select name="">
                                <option value="">Select</option>
                                <option value="All White">All White</option>
                                <option value="Only Prong White">Only Prong White</option>
                                <option value="Only Prong Black">Only Prong Black</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Look</label>
                            <select name>
                                <option value="">Select</option>
                                <option value="New">New</option>
                                <option value="Light Antique">Light Antique</option>
                                <option value="Antique">Antique</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mani</label>
                            <select na>
                                <option value="">Select</option>

                                <option value="Ruby Cut Mani">Ruby Cut Mani</option>
                                <option value="Ruby Plane Mani">Ruby Plane Mani</option>
                                <option value="Ruby Carving Mani">Ruby Carving Mani</option>

                                <option value="Emerald Cutting Mani">Emerald Cutting Mani</option>
                                <option value="Emerald Plane Mani">Emerald Plane Mani</option>
                                <option value="Emerald Carving Mani">Emerald Carving Mani</option>

                                <option value="Blue Sapphire Cut Mani">Blue Sapphire Cut Mani</option>
                                <option value="Blue Sapphire Plane Mani">Blue Sapphire Plane Mani</option>
                                <option value="Blue Sapphire Carving Mani">Blue Sapphire Carving Mani</option>

                                <option value="Yellow Sapphire Cut Mani">Yellow Sapphire Cut Mani</option>
                                <option value="Yellow Sapphire Plane Mani">Yellow Sapphire Plane Mani</option>
                                <option value="Yellow Sapphire Carving Mani">Yellow Sapphire Carving Mani</option>

                                <option value="Corel Plane Mani">Corel Plane Mani</option>
                                <option value="Corel Carving Mani">Corel Carving Mani</option>

                                <option value="Catseye Cut Mani">Catseye Cut Mani</option>
                                <option value="Catseye Plane Mani">Catseye Plane Mani</option>
                                <option value="Catseye Carving Mani">Catseye Carving Mani</option>

                                <option value="Hessonite Cut Mani">Hessonite Cut Mani</option>
                                <option value="Hessonite Plane Mani">Hessonite Plane Mani</option>
                                <option value="Hessonite Carving Mani">Hessonite Carving Mani</option>

                                <option value="Tourmukine Cutting Mani">Tourmukine Cutting Mani</option>
                                <option value="Tourmuline Plane Mani">Tourmuline Plane Mani</option>
                                <option value="Tourmuline Carving Mani">Tourmuline Carving Mani</option>

                                <option value="Ruby Light Cutting Mani">Ruby Light Cutting Mani</option>
                                <option value="Ruby Light Plane Mani">Ruby Light Plane Mani</option>
                                <option value="Ruby Light Carving Mani">Ruby Light Carving Mani</option>

                                <option value="Spinal Cutting Mani">Spinal Cutting Mani</option>
                                <option value="Spinal Plane Mani">Spinal Plane Mani</option>
                                <option value="Spinal Carving Mani">Spinal Carving Mani</option>

                                <option value="Turquise Plane Mani">Turquise Plane Mani</option>
                                <option value="Turquise Carving Mani">Turquise Carving Mani</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pearl</label>
                            <select name="pearl">
                                <option value="">Select</option>
                                <option value="China Round Pearl">China Round Pearl</option>
                                <option value="China Unshape Pearl">China Unshape Pearl</option>
                                <option value="China Kalki Pearl">China Kalki Pearl</option>
                                <option value="KC Kalaki Pearl">KC Kalaki Pearl</option>
                                <option value="KC Unshape Pearl">KC Unshape Pearl</option>
                                <option value="South Sea Round Pearl">South Sea Round Pearl</option>
                                <option value="South Sea Kalki Pearl">South Sea Kalki Pearl</option>
                                <option value="Baruk Unshape Pearl">Baruk Unshape Pearl</option>
                                <option value="Culture Pearl">Culture Pearl</option>
                                <option value="Basra Round Pearl">Basra Round Pearl</option>
                                <option value="Basra Unshape Pearl">Basra Unshape Pearl</option>
                                <option value="Shell Pearl">Shell Pearl</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pearl Colour</label>
                            <select name="pearl_colour">
                                <option value="">Select</option>
                                <option value="White CLR">White CLR</option>
                                <option value="Yellow Shade CLR">Yellow Shade CLR</option>
                                <option value="Basra Look CLR">Basra Look CLR</option>
                                <option value="Coffee Shade CLR">Coffee Shade CLR</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cheed</label>
                            <select nam>
                                <option value="">Select</option>
                                <option value="Red Cheed">Red Cheed</option>
                                <option value="Green Cheed">Green Cheed</option>
                                <option value="Blue Cheed">Blue Cheed</option>
                                <option value="Turquise Cheed">Turquise Cheed</option>
                                <option value="Coral Cheed">Coral Cheed</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Beads</label>
                            <select name="beads">
                                <option value="">Select</option>
                                <option value="EM Plane Beads">EM Plane Beads</option>
                                <option value="EM Cutting Beads">EM Cutting Beads</option>
                                <option value="Ruby Plane Beads">Ruby Plane Beads</option>
                                <option value="Ruby Cutting Beads">Ruby Cutting Beads</option>
                                <option value="Pink Plane Beads">Pink Plane Beads</option>
                                <option value="Pink Cutting Beads">Pink Cutting Beads</option>
                                <option value="Blue Plane Beads">Blue Plane Beads</option>
                                <option value="Blue Cutting Beads">Blue Cutting Beads</option>
                                <option value="Coral Plane Beads">Coral Plane Beads</option>
                                <option value="Turquise Plane Beads">Turquise Plane Beads</option>
                                <option value="Yellow Sapphire Plane Beads">Yellow Sapphire Plane Beads</option>
                                <option value="Yellow Sapphire Cutting Beads">Yellow Sapphire Cutting Beads</option>
                                <option value="Tourmuline Plane Beads">Tourmuline Plane Beads</option>
                                <option value="Tourmukine Cutting Beads">Tourmukine Cutting Beads</option>
                                <option value="Ruby Light Plane Beads">Ruby Light Plane Beads</option>
                                <option value="Ruby Light Cutting Beads">Ruby Light Cutting Beads</option>
                                <option value="Spinal Plane Beads">Spinal Plane Beads</option>
                                <option value="Spinal Cutting Beads">Spinal Cutting Beads</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Melon</label>
                            <select name="melon">
                                <option value="">Select</option>
                                <option value="Ruby Melon">Ruby Melon</option>
                                <option value="Emerald Melon">Emerald Melon</option>
                                <option value="Blue Sapphire Melon">Blue Sapphire Melon</option>
                                <option value="Yellow Sapphire Melon">Yellow Sapphire Melon</option>
                                <option value="Corel Melon">Corel Melon</option>
                                <option value="Pearl Melon">Pearl Melon</option>
                                <option value="Catseye Melon">Catseye Melon</option>
                                <option value="Hessonite Melon">Hessonite Melon</option>
                                <option value="Turquise Melon">Turquise Melon</option>
                                <option value="Spinal Melon">Spinal Melon</option>
                                <option value="Ruby Light Melon">Ruby Light Melon</option>
                                <option value="Tourmuline Melon">Tourmuline Melon</option>
                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Badam</label>
                            <select name="badam">
                                <option value="">Select</option>

                                <option value="Ruby Cut Badam">Ruby Cut Badam</option>
                                <option value="Ruby Plane Badam">Ruby Plane Badam</option>
                                <option value="Ruby Carving Badam">Ruby Carving Badam</option>

                                <option value="Emerald Cut Badam">Emerald Cut Badam</option>
                                <option value="Emerald Plane Badam">Emerald Plane Badam</option>
                                <option value="Emerald Carving Badam">Emerald Carving Badam</option>

                                <option value="Blue Sapphire Cut Badam">Blue Sapphire Cut Badam</option>
                                <option value="Blue Sapphire Plane Badam">Blue Sapphire Plane Badam</option>
                                <option value="Blue Sapphire Carving Badam">Blue Sapphire Carving Badam</option>

                                <option value="Yellow Sapphire Cut Badam">Yellow Sapphire Cut Badam</option>
                                <option value="Yellow Sapphire Plane Badam">Yellow Sapphire Plane Badam</option>
                                <option value="Yellow Sapphire Carving Badam">Yellow Sapphire Carving Badam</option>

                                <option value="Corel Plane Badam">Corel Plane Badam</option>
                                <option value="Corel Carving Badam">Corel Carving Badam</option>

                                <option value="Catseye Cut Badam">Catseye Cut Badam</option>
                                <option value="Catseye Plane Badam">Catseye Plane Badam</option>
                                <option value="Catseye Carving Badam">Catseye Carving Badam</option>

                                <option value="Hessonite Cut Badam">Hessonite Cut Badam</option>
                                <option value="Hessonite Plane Badam">Hessonite Plane Badam</option>
                                <option value="Hessonite Carving Badam">Hessonite Carving Badam</option>

                                <option value="Tourmukine Cutting Badam">Tourmukine Cutting Badam</option>
                                <option value="Tourmuline Plane Badam">Tourmuline Plane Badam</option>
                                <option value="Tourmuline Carving Badam">Tourmuline Carving Badam</option>
                                <option value="Tourmukine Carving Badam">Tourmukine Carving Badam</option>

                                <option value="Ruby Light Cutting Badam">Ruby Light Cutting Badam</option>
                                <option value="Ruby Light Plane Badam">Ruby Light Plane Badam</option>
                                <option value="Ruby Light Carving Badam">Ruby Light Carving Badam</option>

                                <option value="Spinal Cutting Badam">Spinal Cutting Badam</option>
                                <option value="Spinal Plane Badam">Spinal Plane Badam</option>
                                <option value="Spinal Carving Badam">Spinal Carving Badam</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Goshware</label>
                            <select name="goshware">
                                <option value="">Select</option>

                                <option value="Ruby Cut Goshware">Ruby Cut Goshware</option>
                                <option value="Ruby Plane Goshware">Ruby Plane Goshware</option>
                                <option value="Ruby Carving Goshware">Ruby Carving Goshware</option>

                                <option value="Emerald Cut Goshware">Emerald Cut Goshware</option>
                                <option value="Emerald Plane Goshware">Emerald Plane Goshware</option>
                                <option value="Emerald Carving Goshware">Emerald Carving Goshware</option>

                                <option value="Blue Sapphire Cut Goshware">Blue Sapphire Cut Goshware</option>
                                <option value="Blue Sapphire Plane Goshware">Blue Sapphire Plane Goshware</option>
                                <option value="Blue Sapphire Carving Goshware">Blue Sapphire Carving Goshware</option>

                                <option value="Yellow Sapphire Cut Goshware">Yellow Sapphire Cut Goshware</option>
                                <option value="Yellow Sapphire Plane Goshware">Yellow Sapphire Plane Goshware</option>
                                <option value="Yellow Sapphire Carving Goshware">Yellow Sapphire Carving Goshware</option>

                                <option value="Corel Plane Goshware">Corel Plane Goshware</option>
                                <option value="Corel Carving Goshware">Corel Carving Goshware</option>

                                <option value="Catseye Cut Goshware">Catseye Cut Goshware</option>
                                <option value="Catseye Plane Goshware">Catseye Plane Goshware</option>
                                <option value="Catseye Carving Goshware">Catseye Carving Goshware</option>

                                <option value="Hessonite Cut Goshware">Hessonite Cut Goshware</option>
                                <option value="Hessonite Plane Goshware">Hessonite Plane Goshware</option>
                                <option value="Hessonite Carving Goshware">Hessonite Carving Goshware</option>

                                <option value="Tourmukine Cutting Goshware">Tourmukine Cutting Goshware</option>
                                <option value="Tourmuline Plane Goshware">Tourmuline Plane Goshware</option>
                                <option value="Tourmuline Carving Goshware">Tourmuline Carving Goshware</option>

                                <option value="Ruby Light Cutting Goshware">Ruby Light Cutting Goshware</option>
                                <option value="Ruby Light Plane Goshware">Ruby Light Plane Goshware</option>
                                <option value="Ruby Light Carving Goshware">Ruby Light Carving Goshware</option>

                                <option value="Spinal Cutting Goshware">Spinal Cutting Goshware</option>
                                <option value="Spinal Plane Goshware">Spinal Plane Goshware</option>
                                <option value="Spinal Carving Goshware">Spinal Carving Goshware</option>

                                <option value="Other">Other</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
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
                        </div> -->

                        <!-- Description -->

                        <div class="form-group">
                            <label>Delivery Date</label>
                            <input type="date"
                                name="delivery_date"
                                min="{{ date('Y-m-d', strtotime('+12 days')) }}"
                                required>
                        </div>

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
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('designImage');
    const previewBox = document.getElementById('previewBox');
    const previewImage = document.getElementById('previewImage');
    const removeButton = document.getElementById('removeImage');

    if (!input || !previewBox || !previewImage || !removeButton) {
        console.error('Image preview elements not found.');
        return;
    }

    input.addEventListener('change', function () {
        const file = input.files[0];

        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image.');
            input.value = '';
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('Image size must be less than 5MB.');
            input.value = '';
            return;
        }

        const imageURL = URL.createObjectURL(file);
        previewImage.src = imageURL;
        previewBox.style.display = 'block';
    });

    removeButton.addEventListener('click', function () {
        input.value = '';
        previewImage.src = '';
        previewBox.style.display = 'none';
    });
});
</script>
@endsection