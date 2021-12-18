<footer class="bg-black footer-a pb-30" id="submsgerror" data-overlay="1" style="background-image:url(https://dishafoundation.org/images/ftr.jpg); background-repeat: repeat;">
        <div class="container z-5">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="footer-newsletter bg-yellow">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center text-lg-left">
                                <h2 class="fs-35 f-600 slab">Subscribe to Newsletter</h2>
                               
                            </div>
                            <div class="col-lg-6 text-center text-lg-right">
                                <form action="https://dishafoundation.org/subscribe_form/" method="post">
                                      <div style="text-align: center;">
                                      <?php 
                                      if($_SESSION['sub_error'] != "") 
                                      { ?>
                                       <div class="alert alert-danger"> 
                                         <?php echo $_SESSION['sub_error']; ?>
                                          </div> 
                                         <?php 
                                          unset($_SESSION['sub_error']); 
                                       } 
                                       if($_SESSION['sub_msg'] != "") 
                                       { ?>
                                        <div class="alert alert-success"> 
                                            <?php echo $_SESSION['sub_msg']; ?>
                                                
                                            </div> 
                                            <?php 
                                            unset($_SESSION['sub_msg']); 
                                        } 
                                       ?>
                                       </div>
                                    <div class="callback-footer-2 d-flex flex-column flex-sm-row">
                                        <input type="email" name="sub_email" class="form-control input-white shadow-2" placeholder="Your email address">
                                        <button type="submit" name="sub_submit" class="btn btn-black ml-20 ml-xs-00 mt-xs-15">SUBSCIBE </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container z-5">
            <div class="row mt-15">
                <div class="col-lg-4 col-sm-6 mb-md-30">
                    <div class="abot-ftr">
                        <img src="https://dishafoundation.org//images/awards/disha-logo.png" alt="LOGO">
                        <p>The seed sown “To love, To understand, To help” by a handful of committed and sensitive persons has bloomed. We need your support to grow further into a sprawling tree under whose shadow all people with special needs can take shelter.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 pl-10 pl-md-15 mb-md-30">
                    <h4 class="fs-18 f-700 slab yellow opacity-8">About Us</h4>
                    <ul class="footer-links">
                       <li><a href="https://dishafoundation.org/trustees/">Our Trustees</a></li>
                       <li><a href="https://dishafoundation.org/governing-board/">Our Governing Board</a></li>
                       <li><a href="https://dishafoundation.org/executive-committee/">Our Executive Committee</a></li>
                       <li><a href="https://dishafoundation.org/governance/">Governance</a> </li>
                       <li><a href="https://dishafoundation.org/beneficiaries/">Our Beneficiaries</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-6 pl-20 pl-md-15 mb-md-30">
                    <h4 class="fs-18 f-700 slab yellow opacity-8">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="https://dishafoundation.org/gallery/">Gallery</a></li>
                        <!--<li><a href="https://dishafoundation.org/events/">Events</a></li>!-->
                        <li><a href="https://dishafoundation.org/awards/">Awards</a></li>
                        <li><a href="https://dishafoundation.org/success-story/">Success Stories</a></li>
                        <li><a href="https://dishafoundation.org/awards/">Awards</a></li>
                        <li><a href="https://dishafoundation.org/annual-report/">Annual Reports</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6 pl-50 pl-md-15">
                    <h5 class="fs-18 f-700 slab opacity-8 yellow">Find on Social Media.</h5>
                    <ul class="social-icons team-social footer-social">
                        <li> <a href="https://www.facebook.com/Disha-A-Resource-Centre-For-The-Disabled-233400893371165/" target="_blank" rel="nofollow" title="facebook">Facebook <i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/disha.foundation/" target="_blank" rel="nofollow" title="Instagram">Instagram <i class="fab fa-instagram"></i></a></li>
                        <li> <a href="" target="_blank" rel="nofollow" title="Twitter">Twitter <i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="hr-2 bg-light-white mt-60 mb-30 opacity-1"></div>
                </div>
            </div>
            <div class="row copy-footer">
                <div class="col-sm-12 text-center">
                    <p class="mb-0 mb-xs-15">© 2020 DISHA FOUNDATION. All Rights Reserved |Developed By Brand Balance| Maintained By <a href="http://www.dzoneindia.org/" target="_blank" style="
    color: #fff;
">Dzone India</a></p>
                </div>
                
            </div>
        </div>
        <a href="" class="scroll-btn bg-blue opacity-0 opacity-10"><i class="fas fa-arrow-up"></i></a>
    </footer>
</body>
</html>
<script src="https://dishafoundation.org/js/modernizr-3.5.0.min.js"></script>
<script src="https://dishafoundation.org/js/jquery-1.12.4.min.js"></script>
<script src="https://dishafoundation.org/js/bootstrap.bundle.min.js"></script>
<script src="https://dishafoundation.org/js/owl.carousel.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.magnific-popup.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.nice-select.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.waypoints.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.counterup.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.countdown.min.js"></script>
<script src="https://dishafoundation.org/js/lightslider.min.js"></script>
<script src="https://dishafoundation.org/js/wow.min.js"></script>
<script src="https://dishafoundation.org/js/isotope.pkgd.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.meanmenu.min.js"></script>
<script src="https://dishafoundation.org/js/jquery.event.move.js"></script>
<script src="https://dishafoundation.org/js/main.js"></script>