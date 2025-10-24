  <main>
      <!--blog-area start-->
      <section class="blog-details-area fix pt-240 pb-50 pt-md-200 pb-md-60 pt-xs-150">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="blogs mb-75">
                          <div class="blogs__content section-title">
                              <span class="tag mb-25">23 Apr. 2020</span>
                              <h3 class="mb-20"><a href="blog-details.html">Quis Nostr Exercitation Ullamco Laboris nisi ut
                                      Aliquip exeal nothing.</a></h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-8 col-lg-8">
                      <div class="blogs-std mb-75">
                          <div class="blogs__thumb mb-60">
                              <img class="img-fluid" src="{{ $featuredImage ?? asset('assets/img/blog/16.jpg') }}" alt="{{ $blogTitle ?? 'Blog Image' }}">
                          </div>

                          {{-- At a Glance Section --}}
                          @if($atGlanceContent)
                          <div class="at-glance-box mb-50" style="background: linear-gradient(135deg, #fff0f0 0%, #ffeded 100%); border-left: 5px solid #ff1f1f; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                              <div class="d-flex align-items-start">
                                  <div class="at-glance-icon mr-20 mr-md-15" style="flex-shrink: 0; background: #ff1f1f; width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                      <i class="fas fa-bolt" style="font-size: 24px; color: #fff;"></i>
                                  </div>
                                  <div class="at-glance-content" style="flex: 1;">
                                      <h3 class="mb-20" style="font-size: 24px; font-weight: 700; color: #1a1a1a;">
                                          At a Glance
                                      </h3>
                                      <div class="at-glance-text ck-content" style="color: #555; line-height: 1.8; font-size: 15px;">
                                          {!! $atGlanceContent !!}
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif

                          {{-- Introduction Content --}}
                          @if($introductionContent)
                          <div class="blog-introduction mb-50 ck-content">
                              {!! $introductionContent !!}
                          </div>
                          @endif

                          {{-- Main Content --}}
                          <div class="blog-main-content mb-50 ck-content">
                              {!! $mainContent ?? '<p>Tomfoolery crikey bits and bobs brilliant bamboozled down pub amongst brolly hank panky cack bonnet arse over tit burke bugger all mate bodge..</p>
                              <p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in the future. The same is true as we experience the emotional sensation of stress from instances social rejection ridicule. We quickly learn fear & thus automatically potentially stressful situations of all kinds, including the most common of all: making mistakes. dummy sint crikey mate bodge.</p>' !!}
                          </div>
                      </div>
                      {{-- Key Takeaways Section --}}
                      @if($keyTakeawaysContent)
                      <div class="key-takeaways-box mb-50" style="background: linear-gradient(135deg, #f0f8ff 0%, #e6f2ff 100%); border-left: 5px solid #4a90e2; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                          <div class="d-flex align-items-start">
                              <div class="key-takeaways-icon mr-20 mr-md-15" style="flex-shrink: 0; background: #4a90e2; width: 50px; height: 50px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                  <i class="fas fa-check-circle" style="font-size: 24px; color: #fff;"></i>
                              </div>
                              <div class="key-takeaways-content" style="flex: 1;">
                                  <h3 class="mb-20" style="font-size: 24px; font-weight: 700; color: #1a1a1a;">
                                      Key Takeaway
                                  </h3>
                                  <div class="key-takeaways-text ck-content" style="color: #555; line-height: 1.8; font-size: 15px;">
                                      {!! $keyTakeawaysContent !!}
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endif

                  
                      {{-- FAQ Section --}}
                      <section class="faq-area pt-20 pb-20 pt-md-95 pt-xs-95">
                          <div class="">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="faq-title-wrapper faq-title-2a mb-10 pr-40 pr-xs-0">
                                          <div class="section-title">
                                              <h6 class="mb-25">FAQ’s</h6>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row justify-content-center">
                                  <div class="col-lg-12">
                                      <div class="faq-que faq-que-2 mb-30">
                                          <div id="accordion">
                                              <div class="card">
                                                  <div class="card-header" id="headingOne">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                              {{ $faq1Question ?? 'How long does a trademark registration take?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq1Answer ?? 'The trademark registration process in India typically takes 18-24 months, depending on objections and the workload of the trademark office.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card">
                                                  <div class="card-header" id="headingTwo">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                              {{ $faq2Question ?? 'Can I file a trademark on my own?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq2Answer ?? 'Yes, you can file a trademark application on your own, but it\'s recommended to consult with a trademark attorney to avoid common mistakes and ensure proper protection.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card">
                                                  <div class="card-header" id="headingThree">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                              {{ $faq3Question ?? 'What if my application is opposed?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq3Answer ?? 'If your trademark application is opposed, you will need to file a counter-statement and may need to attend hearings. Legal assistance is highly recommended in such cases.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card">
                                                  <div class="card-header" id="headingFour">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                              {{ $faq4Question ?? 'How long does a trademark last?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq4Answer ?? 'A registered trademark in India is valid for 10 years from the date of application and can be renewed indefinitely for successive 10-year periods.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card">
                                                  <div class="card-header" id="headingFive">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                              {{ $faq5Question ?? 'What classes should I register my trademark in?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq5Answer ?? 'Choose classes based on your business activities. For example, Class 25 for clothing, Class 35 for retail services, etc. Consult an expert for proper class selection.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card">
                                                  <div class="card-header" id="headingSix">
                                                      <h5 class="mb-0">
                                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                              {{ $faq6Question ?? 'Can I trademark a logo?' }}
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                                      <div class="card-body">
                                                          {{ $faq6Answer ?? 'Yes, logos can be registered as device marks or combination marks. Ensure your logo is distinctive and not similar to existing trademarks.' }}
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="get-answer text-center mt-50">
                                          <h3>Don't find your answer?</h3>
                                          <a href="{{ route('contact',app()->getLocale()) }}" class="theme_btn faq-btn">Contact us</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                      {{-- Author Bio Section --}}
                      <div class="author-bio-section mb-75">
                          <div class="author-bio-wrapper">
                              <div class="author-bio-image">
                                  <img src="{{ $authorImage ?? asset('assets/img/team/author-placeholder.jpg') }}"
                                      alt="{{ $authorName ?? 'Author' }}">
                              </div>
                              <div class="author-bio-content">
                                  <h3 class="author-name">{{ $authorName ?? 'John Smith' }}</h3>
                                  <p class="author-position">{{ $authorTitle ?? 'Partner at Example Legal' }}</p>
                                  <p class="author-description">
                                      {{ $authorBio ?? 'John has over 13 years of experience in intellectual property law, helping startups and established businesses' }}
                                  </p>
                                  <p class="author-phone">
                                      <i class="fas fa-phone-alt"></i>
                                      <span>{{ $authorPhone ?? '+91-1234567880' }}</span>
                                  </p>
                              </div>
                          </div>
                      </div>



                      {{-- Comments Section (Commented Out) --}}
                      {{--
                        <div class="blog-comments mt-105 mb-105">
                            <h3 class="blog-details-title mb-45">2 Comments</h3>
                            <ul class="latest-comments">
                                <li>
                                    <div class="single-comments pt-30 pb-25">
                                        <div class="authors mr-30">
                                            <img src="assets/img/blog/c1.png" alt="">
                                        </div>
                                        <div class="authors__content">
                                            <h4>Rashed ka. <a href="#" class="reply f-right">Reply</a></h4>
                                            <h6 class="mb-20">13 June, 2018, 7:30pm</h6>
                                            <h5>One touch of a red-hot stove is usually all we need to avoid discomfort in future. The same true we experience the emotional sensation.</h5>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-comments pt-30 pb-25">
                                        <div class="authors mr-30">
                                            <img src="assets/img/blog/c2.png" alt="">
                                        </div>
                                        <div class="authors__content">
                                            <h4>Rashed ka. <a href="#" class="reply f-right">Reply</a></h4>
                                            <h6 class="mb-20">13 June, 2018, 7:30pm</h6>
                                            <h5>One touch of a red-hot stove is usually all we need to avoid discomfort in future. The same true we experience the emotional sensation.</h5>
                                        </div>
                                    </div>
                                    <div class="single-comments pt-30 pb-25 ml-85 ml-xs-0">
                                        <div class="authors mr-30">
                                            <img src="assets/img/blog/c3.png" alt="">
                                        </div>
                                        <div class="authors__content">
                                            <h4>Jannatul Fa</h4>
                                            <h6 class="mb-20">13 June, 2018, 7:30pm</h6>
                                            <h5>One touch of a red-hot stove is usually all we need to avoid discomfort in future. The same true we experience the emotional sensation.</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comments-form mb-75">
                            <h3 class="blog-details-title mb-35">Leave A Comment</h3>
                            <h5><a href="contact.html">Sign in</a> to post your comment or singup if you dont have any account.</h5>
                             <form class="quote-form mb-20 mt-60" action="#">
                                <div class="choice-list mb-15">
                                    <span class="input-title pl-20">Name</span>
                                    <select class="select-product" name="select-value" id="select-area">
                                        <option value="Life Insurance">Life Insurance</option>
                                        <option value="Car Insurance">Car Insurance</option>
                                        <option value="House Insurance">House Insurance</option>
                                        <option value="Accident Insurance">Accident Insurance</option>
                                    </select>
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Email</label>
                                    <input type="text" placeholder="uhenilezu@upu.com">
                                </div>
                                <div class="email-input">
                                    <label class="input-title">Your Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Hi, I am julia I nee some…."></textarea>
                                </div>
                                <button class="theme_btn comments-btn">SEND</button>
                            </form>
                        </div>
                        --}}
                  </div>
                  <div class="col-xl-4 col-lg-4">
                      <div class="blog-widget-area">
                          <div class="widget mb-80">
                              <div class="widget-search-content">
                                  <form class="subscribe-form" action="form.php">
                                      <input type="text" placeholder="Search">
                                      <button class="search-icon"><i class="far fa-search"></i></button>
                                  </form>
                              </div>
                          </div>
                          <div class="widget mb-90">
                              <div class="widget-categories-content">
                                  <h3 class="widget-title mb-20">Categories</h3>
                                  <ul class="categories-list">
                                      <li><a href="#">Web Design <span class="f-right">(13)</span></a></li>
                                      <li><a href="#">Graphics <span class="f-right">(05)</span></a></li>
                                      <li><a href="#">Web Development <span class="f-right">(24)</span></a></li>
                                      <li><a href="#">IOS/Android Development <span class="f-right">(08)</span></a></li>
                                      <li><a href="#">others <span class="f-right">(09)</span></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="widget mb-90">
                              <div class="widget-post-content">
                                  <h3 class="widget-title mb-20">Recent News</h3>
                                  <div class="post-box">
                                      <h4 class="sub-title"><a href="blog-details.html">10 days quick challange for boost visitors.</a></h4>
                                      <h5>23 July, 2018</h5>
                                  </div>
                                  <div class="post-box">
                                      <h4 class="sub-title"><a href="blog-details.html">10 days quick challange for boost visitors.</a></h4>
                                      <h5>23 July, 2018</h5>
                                  </div>
                                  <div class="post-box">
                                      <h4 class="sub-title"><a href="blog-details.html">10 days quick challange for boost visitors.</a></h4>
                                      <h5>23 July, 2018</h5>
                                  </div>
                              </div>
                          </div>
                          <div class="widget mb-90">
                              <div class="widget-tags-content">
                                  <h3 class="widget-title mb-20">Recent News</h3>
                                  <div class="tag-list">
                                      <a class="tags" href="#">Ideas</a>
                                      <a class="tags" href="#">Education</a>
                                      <a class="tags" href="#">Design</a>
                                      <a class="tags" href="#">Development</a>
                                      <a class="tags" href="#">Branding</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--blog-area end-->
  </main>

  @push('styles')
  <style>
      /* CKEditor Content Styles */
      .ck-content {
          font-size: 16px;
          line-height: 1.8;
          color: #555;
      }

      .ck-content h2 {
          font-size: 28px;
          font-weight: 700;
          color: #1a1a1a;
          margin-top: 30px;
          margin-bottom: 20px;
      }

      .ck-content h3 {
          font-size: 24px;
          font-weight: 700;
          color: #1a1a1a;
          margin-top: 25px;
          margin-bottom: 15px;
      }

      .ck-content h4 {
          font-size: 20px;
          font-weight: 600;
          color: #1a1a1a;
          margin-top: 20px;
          margin-bottom: 12px;
      }

      .ck-content p {
          margin-bottom: 20px;
          color: #555;
          line-height: 1.9;
      }

      .ck-content ul,
      .ck-content ol {
          margin-bottom: 20px;
          padding-left: 30px;
      }

      .ck-content li {
          margin-bottom: 10px;
          color: #555;
          line-height: 1.8;
      }

      .ck-content strong,
      .ck-content b {
          font-weight: 700;
          color: #1a1a1a;
      }

      .ck-content a {
          color: #ff1f1f;
          text-decoration: underline;
          transition: color 0.3s;
      }

      .ck-content a:hover {
          color: #cc0000;
      }

      .ck-content blockquote {
          border-left: 4px solid #ff1f1f;
          padding-left: 20px;
          margin: 25px 0;
          font-style: italic;
          color: #666;
          background: #f8f9fa;
          padding: 20px;
          border-radius: 5px;
      }

      .ck-content img {
          max-width: 100%;
          height: auto;
          border-radius: 8px;
          margin: 20px 0;
      }

      .ck-content table {
          width: 100%;
          margin: 20px 0;
          border-collapse: collapse;
      }

      .ck-content table td,
      .ck-content table th {
          border: 1px solid #e0e0e0;
          padding: 12px;
      }

      .ck-content table th {
          background: #f8f9fa;
          font-weight: 600;
          color: #1a1a1a;
      }

      /* At a Glance & Key Takeaways Responsive */
      @media (max-width: 768px) {

          .at-glance-box,
          .key-takeaways-box {
              padding: 20px !important;
          }

          .at-glance-icon,
          .key-takeaways-icon {
              width: 40px !important;
              height: 40px !important;
              margin-right: 15px !important;
          }

          .at-glance-icon i,
          .key-takeaways-icon i {
              font-size: 20px !important;
          }

          .at-glance-content h3,
          .key-takeaways-content h3 {
              font-size: 20px !important;
          }

          .at-glance-text,
          .key-takeaways-text {
              font-size: 14px !important;
          }
      }

      @media (max-width: 576px) {

          .at-glance-box,
          .key-takeaways-box {
              padding: 15px !important;
          }

          .at-glance-content h3,
          .key-takeaways-content h3 {
              font-size: 18px !important;
              margin-bottom: 15px !important;
          }
      }

    /* Author Bio Responsive Styles */
    .author-bio-section {
        background: #ffffff;
        border-radius: 0;
        padding: 0;
        border-left: 4px solid #ff1f1f;
        background: #fafafa;
    }
    
    .author-bio-wrapper {
        display: flex;
        align-items: flex-start;
        gap: 25px;
        padding: 30px;
    }
    
    .author-bio-image {
        flex-shrink: 0;
    }
    
    .author-bio-image img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e0e0e0;
    }
    
    .author-bio-content {
        flex: 1;
    }
    
    .author-bio-content .author-name {
        font-size: 18px;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0 0 5px 0;
        line-height: 1.3;
    }
    
    .author-bio-content .author-position {
        font-size: 14px;
        color: #ff1f1f;
        font-weight: 600;
        margin: 0 0 12px 0;
        line-height: 1.3;
    }
    
    .author-bio-content .author-description {
        font-size: 14px;
        color: #555;
        line-height: 1.7;
        margin: 0 0 12px 0;
    }
    
    .author-bio-content .author-phone {
        font-size: 13px;
        color: #333;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .author-bio-content .author-phone i {
        color: #ff1f1f;
        font-size: 12px;
    }
    
    .author-bio-content .author-phone span {
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .author-bio-wrapper {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 25px 20px;
            gap: 20px;
        }
        
        .author-bio-image img {
            width: 90px;
            height: 90px;
        }
        
        .author-bio-content .author-phone {
            justify-content: center;
        }
    }
    
    @media (max-width: 576px) {
        .author-bio-wrapper {
            padding: 20px 15px;
        }
        
        .author-bio-content .author-name {
            font-size: 17px;
        }
        
        .author-bio-content .author-description {
            font-size: 13px;
        }
    }      /* FAQ Section Styles */
      .faq-area .section-title h6 {
          color: #ff1f1f;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 1px;
      }

      .faq-area .round-line {
          position: relative;
          display: inline-block;
      }

      .faq-area .card {
          border: 1px solid #e8e8e8;
          margin-bottom: 15px;
          border-radius: 5px;
          background: #fff;
      }

      .faq-area .card-header {
          background-color: #fff;
          border-bottom: 0;
          padding: 0;
      }

      .faq-area .card-header h5 {
          margin: 0;
      }

      .faq-area .btn-link {
          color: #1a1a1a;
          text-decoration: none;
          display: block;
          padding: 20px 25px;
          width: 100%;
          text-align: left;
          font-weight: 600;
          font-size: 16px;
          position: relative;
          transition: all 0.3s ease;
      }

      .faq-area .btn-link:hover,
      .faq-area .btn-link:focus {
          color: #ff1f1f;
          text-decoration: none;
      }

      .faq-area .btn-link::after {
          content: "\f107";
          font-family: "Font Awesome 5 Free";
          font-weight: 900;
          position: absolute;
          right: 25px;
          top: 50%;
          transform: translateY(-50%);
          transition: all 0.3s ease;
          color: #ff1f1f;
      }

      .faq-area .btn-link[aria-expanded="true"]::after {
          transform: translateY(-50%) rotate(180deg);
      }

      .faq-area .card-body {
          padding: 0 25px 20px 25px;
          color: #666;
          line-height: 1.8;
          font-size: 15px;
      }

      .faq-area .get-answer h3 {
          color: #1a1a1a;
          font-size: 26px;
          font-weight: 700;
          margin-bottom: 25px;
      }

      .faq-area .theme_btn.faq-btn {
          background-color: #ff1f1f;
          color: #fff;
          padding: 15px 40px;
          border-radius: 5px;
          display: inline-block;
          text-decoration: none;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          transition: all 0.3s ease;
      }

      .faq-area .theme_btn.faq-btn:hover {
          background-color: #d91919;
          transform: translateY(-2px);
          box-shadow: 0 5px 15px rgba(255, 31, 31, 0.3);
      }

      @media (max-width: 768px) {
          .faq-area .btn-link {
              font-size: 15px;
              padding: 18px 20px;
          }

          .faq-area .card-body {
              padding: 0 20px 18px 20px;
              font-size: 14px;
          }
      }
  </style>
  @endpush