<?php include 'header.php';
if(isset($_POST['submit']))
{
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $message = $_POST['message'];
    if($fname == '' || $lname == '' || $email == '' || $phone == '' || $message == '' )
    {
        $_SESSION['error']  = 'All fields are required.';
        cheader('contactus/#msgerror');
    }
        $status = 'YES';
        $db->query("INSERT INTO contactus(`email`, `fname`, `lname`, `phone`, `message`, `dtdate`) VALUES ('".$email."','".$fname."','".$lname."','".$phone."','".$message."','".date('Y-m-d H:i:s')."')");
        
        $_SESSION['msg']  = 'Thanks';
       
        $address = "gulamhuniazi@gmail.com";
        
        $e_subject = 'You\'ve been contacted by ' . $fname . '.';
        $data ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                         <head>
                          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                          <title>Contact Us</title>
                          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        </head>
                        <body style="font-family: monospace; margin:0px auto; padding:0px; font-size: 14px; text-align: center; height:100%"><div style="display: inline-block; width: 100%; background-color:#000000;">
                              <h1 style="text-align: center; font-size: 16px;color: aliceblue">Contact Us:</h1>
                           </div>
                          <table width="100%" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%; text-align: left;">    
                                                      
                                                        <tr>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">First Name:</td>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$fname.'</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Last Name:</td>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$lname.'</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Email:</td>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$email.'</td>
                                                        </tr> 
                                                        
                                                        <tr>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Phone:</td>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$phone.'</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Message:</td>
                                                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$message.'</td>
                                                        </tr>
                                                      </table>
                        </body>
                        </html>';
                        
        $e_body = "You have been contacted by $fname with regards, their additional message is as follows." . PHP_EOL . PHP_EOL;
        $e_content = "\"$data\"" . PHP_EOL . PHP_EOL;
        $e_reply = "You can contact $name via email, $email ";
        $msg = wordwrap( $e_body . $e_content . $e_reply, 70 );
        $headers = "From: $email" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        //$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
        
        mail($address, $e_subject, $msg, $headers);
        cheader('contactus/#msgerror');
}
?>
<section class="inner-bnr relative" data-overlay="6" style="background-image:url(https://dishafoundation.org/images/pg-cover.jpg)">
        <div class="inner-banner-in transform-center z-5">
            <h1 class="slab yellow fs-54">Contact Us
                <img src="https://dishafoundation.org/images/title-bg.png" class="transform-center" alt="Image"/>
            </h1>
            <ul class="inner-bnr-nav mt-75">
                <li><a href="https://dishafoundation.org/">Home </a></li>
                <li>Contact Us</li>
            </ul>
        </div>
</section>
<section class="contact contact-bg pb-md-90" id="msgerror">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-9 col-lg-8">
                    <div class="location-map-cc pt-90 pb-90 pb-md-30">
                       <div class="contact-p-form mt-md-30">
                        <h3 class="fs-26 f-800 green slab mb-20">Get in Touch with Us</h3>
                        <form action="https://dishafoundation.org/contactus/" method="post">
                            
                                <?php 
                              if($_SESSION['error'] != "") 
                              { ?>
                               <div class="alert alert-danger"> 
                                 <?php echo $_SESSION['error']; ?>
                                  </div> 
                                 <?php 
                                  unset($_SESSION['error']); 
                               } 
                               if($_SESSION['msg'] != "") 
                               { ?>
                                <div class="alert alert-success"> 
                                    <?php echo $_SESSION['msg']; ?>
                                        
                                    </div> 
                                    <?php 
                                    unset($_SESSION['msg']); 
                                } 
                               ?>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group relative">
                                        <input type="text" class="form-control input-white" id="FirstName" name ="first_name" placeholder="First Name">
                                        <i class="far fa-user transform-v-center"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group relative">
                                        <input type="text" class="form-control input-white" id="LastName" name="last_name" placeholder="Last Name">
                                        <i class="far fa-user transform-v-center"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group relative">
                                        <input type="email" class="form-control input-white" id="YourEmail" name="email"  placeholder="Your Email">
                                        <i class="far fa-envelope transform-v-center"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group relative">
                                        <input type="text" class="form-control input-white" id="PhoneNumber" name="number" placeholder="Phone Number">
                                        <i class="fas fa-phone transform-v-center"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group relative">
                                        <textarea class="form-control input-white mb-25" name="message" id="message" cols="30" rows="7" placeholder="Your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-5">
                                    <button type="submit" name="submit" class="btn btn-shade-green">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="contact-p-fill h-100 bg-yellow" data-overlay="7" style="background-image: url('images/map.png');">
                        <div class="z-5">
                            <p>A Resource Center for Multiple Disabilities</p>
                            <div class="hr-1 bg-black opacity-3 mt-25 mb-20"></div>
                            <h4 class="fs-20 f-800 mb-10">Contact Information</h4>
                            <ul class="contacts-list">
                                <li class="mb-15">
                                    <span class="icon bg-green"><i class="fas fa-phone"></i></span>
                                    <span class="sub-head">Phone</span>
                                    <p>+91-141-4113785</p>
                                    <p>+91-141-2393319</p>
                                    <p>+91-141-2391690</p>
                                    <p>+91-70 737 77337</p>
                                </li>
                                <li>
                                    <span class="icon bg-green"><i class="fas fa-envelope"></i></span>
                                    <span class="sub-head">Email</span>
                                    <p>disha@dishafoundation.org</p>
                                </li>
                            </ul>
                            <div class="hr-1 bg-black opacity-3 mt-25 mb-20"></div>
                            <h4 class="fs-20 f-800 mb-10">Head Office</h4>
                            <ul class="contacts-list">
                                <li class="mb-15">
                                    <span class="icon bg-green"><i class="fas fa-map-marker-alt"></i></span>
                                    <span class="sub-head">Location</span>
                                    <p>Pt. T.N Mishra Marg, Near JDA park, Nirman Nagar-C, JAIPUR- 302019</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="cntct-maps relative o-hidden pt-90 pb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="map-responsive contact-map  pr-15">
                        <iframe src="https://maps.google.com/maps?q=Disha%20Path%2C%20Near%20JDA%20Park%2C%20Nirman%20Nagar-C%2C%20JAIPUR-%20302019&t=&z=13&ie=UTF8&iwloc=&output=embed" height="520" allowfullscreen=""></iframe>
                    </div>
                </div>
               
            </div>
        </div>
        
    </section>
<?php include 'footer.php';?>
