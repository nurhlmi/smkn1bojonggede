<div class="footer-above">
    <div class="container">
        <div class="row">
            <div class="footer-col col-md-6">
                <h3 class="text-center">Contact Us</h3>
                <div class="container-fluid">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-col col-md-6">
                <h3>Location</h3>
                
                <h4>Jakarta Office</h4>
                <p>Jl. Raya Lenteng Agung No. 3 Lenteng Agung, Jagakarsa Daerah Khusus Ibukota Jakarta 12530</p><br>
                
                <h4>Bandung Office</h4>
                <p>Jl. Surya Sumantri No. 49 Kel. Sukawarna, Kec. Sukajadi, Kota Bandung 40164</p>
            </div>
            <div class="footer-col col-md-3">
                <h3>Contact</h3>
                <p><i class="fa fa-fw fa-whatsapp"></i> 0815 8421 8878</p>
                <p><i class="fa fa-fw fa-envelope"></i> info@intrex.id</p>
                <ul class="list-inline">
                    <li>
                        <a href="https:///www.facebook.com/intrex.ID" class="btn-social btn-outline" target="_blank">
                            <i class="fa fa-fw fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/intrex.id" class="btn-social btn-outline" target="_blank">
                            <i class="fa fa-fw fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-col col-md-3">
                <h3>Opening Hours</h3>
                <p>Everyday: 09:00 to 18:00</p>
                <img src="{{ asset('images/logo/intrex-footer.png') }}" style="width:100px">
            </div>
        </div>
    </div>
</div>