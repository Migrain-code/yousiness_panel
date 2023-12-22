<div class="contact-form-area pb-120">
    <div class="container">
        <div class="row gx-0">
            <div class="col-xl-5 col-lg-6">
                <div class="contact-form-left">
                    <div class="contact-form-section-box pb-80">
                        <h5 class="inner-section-subtitle">KONTAKTIEREN
                             </h5>
                        <h4 class="tp-section-title pb-10">
                              KONTAKTIEREN  <br> SİE
                              <span>
                                 <img src="/business/assets/img/send-image.svg" style="width: 40px;height: 40px">
                              </span>
                            UNS.
                        </h4>
                        <p>Sie können uns über das <br>Kontaktformular kontaktieren.</p>
                    </div>
                    <div class="contact-form-social-box p-relative">
                        <div class="contact-form-social-item">
                            <a href="{{config('settings.speed_facebook_url')}}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{config('settings.speed_twitter_url')}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{config('settings.speed_instagram_url')}}"><i class="fab fa-instagram"></i></a>
                            <a href="{{config('settings.speed_youtube_url')}}" class="mt-2"><i class="fab fa-youtube"></i></a>
                            <a href="{{config('settings.speed_tiktok_url')}}" class="mt-2"><i class="fab fa-tiktok"></i></a>
                        </div>
                        <div class="contact-form-section-img">
                            <img src="/business/assets/img/contact/contact-icon-sm-4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="contact-form-right-warp" style="background: white;padding: 30px 20px;border-radius: 10px">
                    <div class="postbox__comment-form">
                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session('response'))
                            <input type="hidden" id="alert" value="success" message="Ihre Nachricht wurde gesendet.">
                        @endif
                        <form action="{{route('contact.sendMessage')}}" method="post" class="box">
                            @csrf
                            <div class="row gx-20">
                                <div class="col-12">
                                    <div class="postbox__comment-input mb-30">
                                        <input type="text" name="fullName" class="inputText" required>
                                        <span class="floating-label">Name Nachname</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="postbox__comment-input mb-30">
                                        <input type="text" name="email" class="inputText" required>
                                        <span class="floating-label">E-Mail</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="postbox__comment-input mb-35">
                                        <input type="text" name="phone" id="phone" class="inputText" required>
                                        <span class="floating-label">Mobilnummer</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="postbox__comment-input mb-35">
                                        <input type="text" name="subject" class="inputText" required>
                                        <span class="floating-label">Betreff</span>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="postbox__comment-input mb-30">
                                        <textarea class="textareaText" name="message" required></textarea>
                                        <span class="floating-label-2">Nachricht</span>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="postbox__btn-box">
                                        <button class="submit-btn w-100" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>