<?php 
    $msg='';
    require('top.php');
    
?>
<html>
<head>
<title>contact us</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
function emailValidate()
{
	var emailID= document.f.e.value;
	var atp= emailID.indexOf("@");
	var dotp=emailID.lastIndexOf(".");
	if(atp<1 || (dotp-atp<2))
	{
		alert("Your Email is in incorrect format!");
		document.f.e.focus();
		return false;
	}
	return true;
}
</script>

<body>
                <div class="row ml-28 mr-28  flex mb-4">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title   mt-4 mb-4">
                                <h2 class="title__line--6 text-3xl font-bold text-gray-500">Send a Mail</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <form id="contact-form" name="f" action="send_message.php" onsubmit="return(emailValidate())" method="POST">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input class="rounded p-4 bg-gray-200 mb-3 mr-3" type="text" id="name" name="n" placeholder="Your Name*"required>
                                        <input class="rounded p-4 bg-gray-200 mb-3 mr-3" type="email" id="email" name="e" placeholder="Email*"required>
										<input class="rounded p-4 bg-gray-200 mb-3" type="text" id="mobile" name="m" placeholder="Mobile*"required>
                                    </div>
                                </div>
                                
                                <div class="single-contact-form mb-2">
                                    <div class="contact-box message">
                                        <textarea  class="w-full h-36 p-4 bg-gray-200 rounded"name="t"  id="message" placeholder="Your Message" required></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn mb-2">
                                    <button type="Submit" name="s" value="Submit"  id="submit"class="fv-btn h-12 w-64 bg-pink-600 flex items-center justify-center text-white  text-2xl rounded text-md cursor-pointer hover:bg-white focus:ring-pink-600 hover:border-pink-600 hover:text-pink-600">Send Message</button>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege text-gray-500 text-lg"></p>
                               
                            </div>
                        </div>
                    </div> 

                <div class="row ml-32">
                    
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6 text-3xl mt-4 mb-4 font-bold text-gray-500">Contact Us</h2>
                        <div class="address flex mb-3">
                            <div class="address__icon h-16 w-16 bg-pink-600 rounded text-white text-2xl p-3 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="address__details ml-3">
                                <h2 class="ct__title text-xl font-bold text-gray-700 mb-1 mt-2">OUR ADDRESS</h2>
                                <p class="text-sm text-gray-400 font-bold">666 Connaught Place, Delhi, India </p>
                            </div>
                        </div>
                        <div class="address flex mb-3">
                            <div class="address__icon h-16 w-16 bg-pink-600 rounded text-white text-2xl p-3 text-center">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="address__details ml-3">
                                <h2 class="ct__title text-xl font-bold text-gray-700 mb-1 mt-2">OPENNING HOUR</h2>
                                <p class="text-sm text-gray-400 font-bold">ShopBuddy@gmail.com </p>
                            </div>
                        </div>

                        <div class="address flex">
                            <div class="address__icon h-16 w-16 bg-pink-600 rounded text-white text-2xl p-3 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="address__details ml-3">
                                <h2 class="ct__title text-xl font-bold text-gray-700 mb-1 mt-2">PHONE NUMBER</h2>
                                <p class="text-sm text-gray-400 font-bold">123-6586-587456</p>
                            </div>
                        </div>
                    </div>      
                </div>
</div>
           
</body>
</html>
<?php require('footer.inc.php')?>