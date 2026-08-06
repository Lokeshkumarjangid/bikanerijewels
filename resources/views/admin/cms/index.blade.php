@extends('admin.layouts.app')

@section('title', 'Cms List')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cms List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cms</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
    <section class="content">
      <div class="card">
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cms.index') }}",
        order: [[4, "desc"]],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'title', name: 'title' },
            { data: 'slug', name: 'slug' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', orderable: false, searchable: false },
        ]
    });
  });

  $(document).on('change', '.status-toggle', function () {

    let cmsid = $(this).data('id');

    $.ajax({
        url: "{{ route('cms.status.change') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: cmsid
        },
        success: function (res) {
            if (res.status) {
                toastr.success(res.message);
            } else {
                toastr.error(res.message);
            }
        },
        error: function () {
            toastr.error('Something went wrong');
        }
  });

});
</script>
@endsection

<!-- <section class="faq-section">

  <h2 class="faq-title">Frequently Asked Questions</h2>

  <p class="faq-description">
  Discover everything you need to know about shopping with <strong>Bikaneri Jewels</strong>. From handcrafted jewellery and bridal collections to delivery, customization, certifications, and jewellery care, we've answered the most common questions to make your shopping experience seamless.
  </p>

  <details class="faq-item" open>
  <summary>Where is Bikaneri Jewels located?</summary>
  <div class="faq-content">
  <p>
  Our flagship boutique is located in Mumbai, where you can explore our exclusive collections and receive personalized jewellery consultations from our experts.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>Do you deliver across India?</summary>
  <div class="faq-content">
  <p>
  Yes. We offer secure Pan India delivery with insured shipping and premium packaging to ensure your jewellery reaches you safely.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>Do you offer international shipping?</summary>
  <div class="faq-content">
  <p>
  Yes. We provide worldwide shipping to selected countries. Please contact our team for shipping availability and charges.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>Can I customize my jewellery?</summary>
  <div class="faq-content">
  <p>
  Absolutely. We specialize in bespoke jewellery and custom bridal creations tailored to your style and preferences.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>What jewellery collections do you offer?</summary>
  <div class="faq-content">
  <ul>
  <li>Polki Jewellery</li>
  <li>Kundan Jewellery</li>
  <li>Diamond Jewellery</li>
  <li>Meenakari Jewellery</li>
  <li>Bridal Jewellery</li>
  <li>Gold Jewellery</li>
  <li>Gemstone Jewellery</li>
  </ul>
  </div>
  </details>

  <details class="faq-item">
  <summary>How can I book a jewellery consultation?</summary>
  <div class="faq-content">
  <p>
  You can book an appointment through our Contact Us page, WhatsApp, phone call, or by visiting our boutique.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>Is every piece handcrafted?</summary>
  <div class="faq-content">
  <p>
  Yes. Every Bikaneri Jewels creation is meticulously handcrafted by skilled artisans using traditional techniques and exceptional craftsmanship.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>Do you provide jewellery certification?</summary>
  <div class="faq-content">
  <p>
  Yes. Our jewellery is accompanied by appropriate certifications and quality assurance depending on the product.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>How do I care for my jewellery?</summary>
  <div class="faq-content">
  <p>
  Store your jewellery in a dry place, avoid perfumes and chemicals, and clean it professionally at regular intervals to maintain its shine.
  </p>
  </div>
  </details>

  <details class="faq-item">
  <summary>How can I contact Bikaneri Jewels?</summary>
  <div class="faq-content">
  <p>
  You can reach us via phone, email, WhatsApp, or by visiting our boutique. Our jewellery experts are always happy to assist you.
  </p>
  </div>
  </details>

</section> -->

<!-- care advice html start -->
  <!-- <section class="care-guide">

      <div class="care-guide-header">

          <span>Jewellery Care</span>

          <h1>Jewellery Care Guide</h1>

          <h3>Preserve the Beauty. Celebrate the Legacy.</h3>

          <p>
              Every creation at <strong>Bikaneri Jewels</strong> is a timeless masterpiece, handcrafted with exceptional artistry and attention to detail. Our jewellery is designed to be cherished for generations, and with proper care, it will retain its brilliance, beauty, and elegance for years to come.
          </p>

          <p>
              To preserve the craftsmanship and natural beauty of your jewellery, we recommend following these simple care guidelines. A little care today ensures your treasured jewellery continues to shine beautifully and becomes a cherished heirloom for generations to come.
          </p>

      </div>

  </section>
  <section class="everyday-care">

    <div class="everyday-title">

    <h2>Everyday Jewellery Care</h2>

    <p>
    A few simple habits can help preserve the brilliance, craftsmanship, and timeless beauty of your jewellery for years to come.
    </p>

    </div>

    <div class="care-grid">

    <div class="care-card">

    <div class="care-icon">💎</div>

    <h3>Remove Before Daily Activities</h3>

    <p>
    Remove your jewellery before bathing, swimming, exercising, or engaging in household chores. Exposure to water, chlorine, saltwater, and excessive moisture can gradually affect the finish and brilliance of precious metals and gemstones.
    </p>

    </div>

    <div class="care-card">

    <div class="care-icon">🧴</div>

    <h3>Protect from Chemicals</h3>

    <p>
    Avoid direct contact with perfumes, hairsprays, cosmetics, lotions, sanitizers, detergents, bleach, and household cleaning agents. Chemicals can dull the shine of gold, gemstones, pearls, and enamel work.
    </p>

    </div>

    <div class="care-card">

    <div class="care-icon">✨</div>

    <h3>Wear Jewellery Last</h3>

    <p>
    Make your jewellery the final touch to your outfit. Apply makeup, skincare products, perfumes, and hairsprays before wearing your jewellery to prevent residue from settling on its surface.
    </p>

    </div>

    <div class="care-card">

    <div class="care-icon">📦</div>

    <h3>Store with Care</h3>

    <p>
    Store each jewellery piece separately in a soft pouch or a fabric-lined jewellery box to prevent scratches and tangling. Keep your jewellery in a cool, dry place away from direct sunlight, humidity, and excessive heat.
    </p>

    </div>

    <div class="care-card">

    <div class="care-icon">🧽</div>

    <h3>Clean Gently</h3>

    <p>
    After every wear, gently wipe your jewellery with a soft, lint-free microfiber cloth to remove oils, dust, and fingerprints. Avoid using abrasive materials or harsh cleaning solutions.
    </p>

    </div>

    </div>

  </section>
  <section class="signature-care">

      <div class="signature-header">

      <span>Signature Collections</span>

      <h2>Caring for Our Signature Collections</h2>

      <p>
      Every Bikaneri Jewels creation is handcrafted using traditional techniques and exceptional craftsmanship. Each collection deserves specialized care to preserve its brilliance, intricate detailing, and timeless elegance.
      </p>

      </div>

      <div class="signature-grid">

      <div class="signature-card">

      <div class="signature-icon">💎</div>

      <h3>Polki Jewellery</h3>

      <p>
      Polki jewellery features natural uncut diamonds set using traditional craftsmanship.
      </p>

      <ul>
      <li>Avoid contact with water and chemicals.</li>
      <li>Handle with care to protect delicate settings.</li>
      <li>Store separately to prevent scratches.</li>
      <li>Clean only with a soft, dry cloth.</li>
      <li>Professional cleaning is recommended periodically.</li>
      </ul>

      </div>

      <div class="signature-card">

      <div class="signature-icon">👑</div>

      <h3>Kundan &amp; Jadau Jewellery</h3>

      <p>
      Kundan and Jadau jewellery are handcrafted using traditional gemstone-setting techniques that require delicate handling.
      </p>

      <ul>
      <li>Avoid moisture and direct exposure to water.</li>
      <li>Do not use ultrasonic or chemical cleaners.</li>
      <li>Store individually in soft pouches.</li>
      <li>Handle gently to preserve intricate craftsmanship.</li>
      </ul>

      </div>

      <div class="signature-card">

      <div class="signature-icon">🟡</div>

      <h3>Gold Jewellery</h3>

      <p>
      Gold jewellery retains its beauty with simple everyday care.
      </p>

      <ul>
      <li>Remove before heavy physical activities.</li>
      <li>Avoid exposure to chlorine and harsh chemicals.</li>
      <li>Clean with a soft cloth after every wear.</li>
      <li>Store in a dedicated jewellery box or pouch.</li>
      </ul>

      </div>

      <div class="signature-card">

      <div class="signature-icon">💍</div>

      <h3>Diamond &amp; Gemstone Jewellery</h3>

      <p>
      Our diamond and gemstone jewellery is crafted to showcase exceptional brilliance.
      </p>

      <ul>
      <li>Avoid hard impacts that may loosen gemstone settings.</li>
      <li>Clean regularly using a soft cloth.</li>
      <li>Schedule professional inspections to ensure secure settings.</li>
      <li>Store each piece separately for added protection.</li>
      </ul>

      </div>

      </div>

  </section>
  <section class="care-highlight">

      <div class="highlight-box">

      <div class="highlight-icon">
      🛠️
      </div>

      <h2>Professional Jewellery Care</h2>

      <p>
      To maintain the brilliance, durability, and timeless beauty of your jewellery, we recommend professional cleaning and inspection once every <strong>12–18 months</strong>. Regular servicing helps preserve the craftsmanship while ensuring gemstone settings, clasps, and intricate details remain secure.
      </p>

      <p>
      Our experienced jewellery specialists carefully examine every piece, restoring its shine and ensuring it continues to reflect the elegance and quality that define Bikaneri Jewels.
      </p>

      <div class="highlight-note">
      ✨ Professional maintenance not only restores brilliance but also extends the life of your treasured jewellery for generations to come.
      </div>

      </div>

      <div class="highlight-box">

      <div class="highlight-icon">
      👑
      </div>

      <h2>A Legacy Worth Preserving</h2>

      <p>
      Every creation from <strong>Bikaneri Jewels</strong> carries a story of heritage, exceptional craftsmanship, and timeless elegance. Designed to celebrate life's most precious moments, each masterpiece deserves thoughtful care and attention.
      </p>

      <p>
      By following these simple care recommendations, your jewellery will continue to sparkle beautifully, preserving its sentimental value and becoming a cherished heirloom that can be passed down through generations.
      </p>

      <div class="highlight-note">
      ❤️ With proper care, every Bikaneri Jewels creation becomes more than jewellery—it becomes a lasting family legacy.
      </div>

      </div>

  </section>
  <section class="need-help-section">

      <div class="need-help-card">

      <div class="need-help-content">

      <span class="need-help-tag">
      We're Here To Help
      </span>

      <h2>Need Assistance?</h2>

      <p>
      Our jewellery specialists are always delighted to assist you with professional jewellery cleaning, maintenance, storage recommendations, polishing, restoration, and expert servicing. Whether you have questions about caring for your treasured pieces or would like to schedule a consultation, we are here to ensure your jewellery remains as beautiful as the day you received it.
      </p>

      <div class="contact-info">

      <div class="info-box">

      <h4>📍 Visit Our Boutique</h4>

      <p>
      Bikaneri Jewels<br>
      Office No. 11, Sputnik Building,<br>
      Breach Candy,<br>
      Mumbai, Maharashtra – 400026
      </p>

      </div>

      <div class="info-box">

      <h4>📞 Call Us</h4>

      <p>
      +91 99673 52183
      </p>

      </div>

      <div class="info-box">

      <h4>📧 Email Us</h4>

      <p>
      sales@bikanerijewels.com
      </p>

      </div>

      <div class="info-box">

      <h4>🕘 Working Hours</h4>

      <p>
      Monday – Saturday<br>
      10:00 AM – 7:00 PM
      </p>

      </div>

      </div>

      </div>

      </div>

  </section> -->
<!-- care advice html end -->

<!-- timeline of the brand start -->

  <!-- <section class="journey-section">

      <div class="journey-header">
        <h1>The Bikaneri Jewels Journey</h1>
        <h3>A Legacy of Craftsmanship. A Future of Timeless Elegance.</h3>

      </div>

      <div class="journey-content">

          <p>
              Since <strong>1942</strong>, Bikaneri Jewels has been dedicated to preserving India's rich jewellery heritage through exceptional craftsmanship, artistic excellence, and timeless design. Rooted in the traditions of Rajasthan, the brand has become synonymous with handcrafted luxury, creating exquisite <strong>Polki, Kundan, Jadau, Meenakari, Diamond, and Gemstone jewellery</strong> that transcends generations.
          </p>

          <p>
              Under the visionary leadership of <strong>Mr. Sanjay Kumar Soni</strong>, Bikaneri Jewels continues to honour its heritage while embracing contemporary aesthetics. Every creation reflects a harmonious blend of traditional artistry and modern sophistication, making each piece a timeless expression of elegance and individuality.
          </p>

          <p>
              Crafted by master artisans using techniques perfected over generations, every Bikaneri Jewels masterpiece embodies precision, authenticity, and uncompromising quality. From bespoke bridal collections to heirloom-worthy creations, each design celebrates India's rich cultural legacy while complementing today's discerning lifestyle.
          </p>

          <p>
              With a commitment to exceptional craftsmanship, personalized experiences, and lasting relationships, Bikaneri Jewels has earned the trust of families across India and beyond. Every piece is more than jewellery—it is a celebration of heritage, cherished milestones, and memories that endure for generations.
          </p>

          <p>
              As the journey continues, <strong>Mr. Sanjay Kumar Soni</strong> remains committed to carrying forward the legacy of Bikaneri Jewels, creating extraordinary masterpieces that honour tradition while inspiring the future of fine jewellery.
          </p>

      </div>

  </section>
  <section class="timeline-section">

      <div class="timeline-item">

          <div class="timeline-image">
              <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=900&q=80" alt="Bikaneri Jewels Heritage">
          </div>

          <div class="timeline-content">

              <div class="timeline-year">1942</div>

              <h3>The Beginning</h3>

              <p>
                  Bikaneri Jewels was founded with a vision to preserve Rajasthan's rich jewellery heritage through exceptional craftsmanship and timeless artistry.
              </p>

              <h3>A Legacy of Excellence</h3>

              <p>
                  Over the decades, the brand earned the trust of generations by creating handcrafted Polki, Kundan, Jadau, Meenakari, Diamond, and Gemstone jewellery of uncompromising quality.
              </p>

              <h3>A New Vision</h3>

              <p>
                  Under the leadership of <strong>Mr. Sanjay Kumar Soni</strong>, Bikaneri Jewels embraced contemporary luxury while preserving its traditional roots, introducing bespoke creations for the modern connoisseur.
              </p>

              <h3>Crafted for Every Celebration</h3>

              <p>
                  From bridal masterpieces to bespoke heirlooms, every creation is thoughtfully designed to celebrate life's most meaningful occasions.
              </p>

              <h3>Today</h3>

              <p>
                  With a heritage spanning more than <strong>80 years</strong>, Bikaneri Jewels continues to redefine fine jewellery through exceptional craftsmanship, personalized service, and timeless elegance—serving clients across India with pride.
              </p>

          </div>

      </div>

  </section> -->

<!-- timeline of the brand end -->

<!-- BRAND RESPONSIBILITIES start -->
  <!-- <section class="responsibility-section">

        <div class="responsibility-header">
        <h1>
        Our Responsibility: Craftsmanship, Heritage &amp; Trust
        </h1>

        <h3>
        Our Responsibility: Preserving Heritage, Inspiring Generations
        </h3>

        <div class="responsibility-divider"></div>

        <p>
        At <strong>Bikaneri Jewels</strong>, responsibility extends beyond creating exquisite jewellery—it is about preserving a legacy of craftsmanship, honouring traditional artistry, and delivering creations that stand the test of time.
        </p>

        <p>
        For over <strong>80 years</strong>, our master artisans have transformed precious metals and carefully selected gemstones into timeless masterpieces, blending heritage techniques with contemporary elegance. Every creation reflects uncompromising quality, authenticity, and meticulous attention to detail.
        </p>

        <p>
        We believe true luxury is built on integrity. From responsibly sourcing premium materials to supporting skilled craftsmanship, every step of our journey is guided by respect for tradition, excellence, and the people who bring our designs to life.
        </p>

        <p>
        Each Bikaneri Jewels creation is designed to become a cherished heirloom—celebrating love, milestones, and family traditions while carrying forward a legacy that can be treasured for generations.
        </p>

        </div>

  </section>
  <section class="responsibility-features">

    <div class="features-grid">

    <div class="feature-card">

    <div class="feature-icon">🌿</div>

    <h3>Sustainability</h3>

    <p>
    At Bikaneri Jewels, sustainability begins with responsible sourcing, exceptional craftsmanship, and creating jewellery that lasts for generations. We are committed to preserving traditional artistry, supporting skilled artisans, and crafting timeless heirlooms that celebrate beauty, integrity, and enduring value.
    </p>

    </div>

    <div class="feature-card">

    <div class="feature-icon">💎</div>

    <h3>Craftsmanship</h3>

    <p>
    At Bikaneri Jewels, craftsmanship is more than a process—it is a legacy. Each creation is meticulously handcrafted by master artisans, preserving the finest traditions of Polki, Kundan, Jadau, Meenakari, and fine jewellery while embracing contemporary elegance.
    </p>

    </div>

    <div class="feature-card">

    <div class="feature-icon">⌛</div>

    <h3>Timelessness</h3>

    <p>
    True luxury is timeless. Every masterpiece is thoughtfully handcrafted to honour tradition while embracing contemporary sophistication. Designed with exceptional artistry and enduring beauty, our creations become treasured heirlooms for generations.
    </p>

    </div>

    <div class="feature-card">

    <div class="feature-icon">✨</div>

    <h3>Detailing</h3>

    <p>
    Every Bikaneri Jewels creation is meticulously handcrafted with extraordinary attention to detail. From concept to completion, our master artisans ensure every design reflects exceptional precision, timeless beauty, and uncompromising craftsmanship.
    </p>

    </div>

    <div class="feature-card">

    <div class="feature-icon">🏛️</div>

    <h3>Preserving Heritage</h3>

    <p>
    For over 80 years, Bikaneri Jewels has preserved the artistry of traditional Indian jewellery through exceptional craftsmanship and timeless design. Every creation beautifully blends heritage techniques with contemporary elegance, ensuring our legacy continues for generations to come.
    </p>

    </div>

    </div>

  </section> -->
<!-- BRAND RESPONSIBILITIES end -->

<!-- Privacy Policy start -->
  <!-- <section class="privacy-section">

      <div class="privacy-header">

      <h1>
      Privacy Policy
      </h1>

      <div class="privacy-divider"></div>

      <p>
      Your privacy is important to <strong>Bikaneri Jewels</strong>. We are committed to protecting your personal information and ensuring a safe, secure, and transparent online experience. This Privacy Policy outlines how we collect, use, store, and protect your information when you visit our website or interact with our services.
      </p>

      <p>
      We value the trust you place in us and are committed to maintaining the confidentiality of your personal information. Every interaction with Bikaneri Jewels is guided by integrity, transparency, and a dedication to providing you with a secure digital experience.
      </p>

      <div class="privacy-highlight">

      <p>
      <strong>Policy Updates:</strong> We may update this Privacy Policy from time to time to reflect changes in our business practices, technologies, or legal requirements. We encourage you to review this page periodically to stay informed about how we safeguard your personal information.
      </p>

      </div>

      </div>

  </section>
  <section class="privacy-content">

    <div class="privacy-grid">

    <div class="privacy-card">

    <div class="privacy-icon">
    📋
    </div>

    <h2>Information We Collect</h2>

    <p>
    We collect personal information such as your name, email address, phone number, billing and shipping details, and order information to process purchases, provide customer support, and enhance your shopping experience.
    </p>

    <br>

    <p>
    We also use cookies and limited technical information to improve website performance, security, and user experience. Protecting your privacy and personal information remains our highest priority.
    </p>

    </div>

    <div class="privacy-card">

    <div class="privacy-icon">
    🍪
    </div>

    <h2>Cookies & Similar Technologies</h2>

    <p>
    Bikaneri Jewels uses cookies and similar technologies to enhance your browsing experience, improve website performance, and understand how visitors interact with our website.
    </p>

    <br>

    <p>
    These technologies help us deliver a secure, personalized, and seamless experience. You may manage or disable cookies through your browser settings at any time, although certain features of the website may not function as intended.
    </p>

    </div>

    <div class="privacy-card">

    <div class="privacy-icon">
    📱
    </div>

    <h2>Social Media Data</h2>

    <p>
    When you interact with Bikaneri Jewels through Instagram, Facebook, WhatsApp, or other social media platforms, we may collect information such as your name, profile details, messages, comments, and any images or files you voluntarily share.
    </p>

    <br>

    <p>
    This information is used solely to respond to your enquiries, provide customer support, assist with appointments or orders, and share relevant product information. We never use your private conversations for unauthorized marketing or third-party purposes.
    </p>

    </div>

    </div>

  </section>
  <section class="privacy-legal">

    <div class="legal-grid">

    <div class="legal-card">

    <div class="legal-icon">
    ⚖️
    </div>

    <h2>Lawful Basis for Processing</h2>

    <p>
    Bikaneri Jewels processes your personal information only when necessary to fulfil your orders, provide customer support, improve our services, comply with legal obligations, or with your consent for marketing communications.
    </p>

    <br>

    <p>
    Where processing is based on your consent, you may withdraw it at any time without affecting any prior lawful processing carried out before your request.
    </p>

    </div>

    <div class="legal-card">

    <div class="legal-icon">
    🤝
    </div>

    <h2>How We Share Information</h2>

    <p>
    We may share your information with trusted service providers such as payment gateways, delivery partners, website hosting providers, and technology partners solely to process your orders and improve our services.
    </p>

    <br>

    <p>
    We may also disclose information where required by applicable law or to protect our legal rights. <strong>We never sell or rent your personal information to third parties for marketing purposes.</strong>
    </p>

    </div>

    <div class="legal-card">

    <div class="legal-icon">
    🛡️
    </div>

    <h2>Your Rights</h2>

    <p>
    You have the right to access, update, correct, or request the deletion of your personal information, subject to applicable laws. You may also withdraw your consent for marketing communications at any time.
    </p>

    <br>

    <p>
    For any privacy-related request or enquiry, please contact us at <strong>sales@bikanerijewels.com</strong> or through our Contact Us page. We will make every effort to respond promptly.
    </p>

    </div>

    </div>

  </section>
  <section class="security-section">

    <div class="security-box">

    <div class="security-content">

    <span class="security-tag">
    Data Protection
    </span>

    <h2 class="security-title">
    How We Protect Your Information
    </h2>

    <p class="security-text">
    At <strong>Bikaneri Jewels</strong>, protecting your personal information is one of our highest priorities. We implement appropriate security measures, trusted technologies, and responsible business practices to safeguard your information against unauthorized access, misuse, alteration, or disclosure.
    </p>

    <p class="security-text">
    While we continuously strengthen our security systems and processes, no method of online transmission or electronic storage can be guaranteed to be completely secure. We regularly review and enhance our security practices to help ensure your information remains protected.
    </p>

    <div class="security-highlight">

    <h3>Your Privacy is Our Commitment</h3>

    <p>
    We are committed to maintaining the confidentiality, integrity, and security of your personal information while providing a safe, transparent, and trusted experience whenever you interact with Bikaneri Jewels.
    </p>

    </div>

    <div class="security-points">

    <div class="security-point">

    <h4>🔒 Secure Technology</h4>

    <p>
    We use trusted technologies and industry-standard security practices to help protect your personal information and online interactions.
    </p>

    </div>

    <div class="security-point">

    <h4>🛡 Privacy First</h4>

    <p>
    Your information is handled responsibly and only used for legitimate business purposes in accordance with our Privacy Policy.
    </p>

    </div>

    <div class="security-point">

    <h4>🔄 Regular Reviews</h4>

    <p>
    Our security procedures are regularly reviewed and updated to adapt to evolving technologies and industry best practices.
    </p>

    </div>

    <div class="security-point">

    <h4>🤝 Trusted Experience</h4>

    <p>
    For over 80 years, Bikaneri Jewels has built lasting relationships based on trust, transparency, quality, and customer confidence.
    </p>

    </div>

    </div>

    </div>

    </div>

  </section>
  <section class="privacy-contact">

    <div class="contact-wrapper">

    <div class="contact-content">

    <span class="contact-tag">
    We're Here to Help
    </span>

    <h2 class="contact-title">
    Contact Us
    </h2>

    <p class="contact-description">
    If you have any questions about this Privacy Policy or how Bikaneri Jewels collects, uses, stores, or protects your personal information, our team will be pleased to assist you. We are committed to responding to all privacy-related enquiries promptly and transparently.
    </p>

    <div class="contact-grid">

    <div class="contact-card">

    <h3>📍 Visit Us</h3>

    <p>
    <strong>Bikaneri Jewels</strong><br>
    Office No. 11, Sputnik Building,<br>
    Breach Candy,<br>
    Mumbai, Maharashtra – 400026, India
    </p>

    </div>

    <div class="contact-card">

    <h3>📞 Call Us</h3>

    <p>
    +91 99673 52183
    </p>

    </div>

    <div class="contact-card">

    <h3>✉ Email Us</h3>

    <p>
    sales@bikanerijewels.com
    </p>

    </div>

    <div class="contact-card">

    <h3>🕘 Store Hours</h3>

    <p>
    Monday – Saturday<br>
    10:00 AM – 6:00 PM
    </p>

    </div>

    </div>

    <div class="contact-footer">

    <p>
    We value your trust and are committed to protecting your privacy with the highest standards of security, transparency, and customer care. If you require any further assistance, please do not hesitate to get in touch with us.
    </p>

    </div>

    </div>

    </div>

  </section> -->
<!-- Privacy Policy end -->