<!--<div class="clearfix"></div>
         <footer class="site-footer">
            <div class="footer-inner bg-white">
               <div class="row">
                  <div class="col-sm-6">
                     Copyright &copy; <?php echo date('Y')?> Shop Buddy
                  </div>
                  
               </div>
            </div>
         </footer>
      </div>
      <!--
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>--
   </body>
</html>-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    
    <script src="https://kit.fontawesome.com/1bf9f84d4d.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');

        *{
            margin-left:0px;
            margin-right:0px;
            padding:0px;
            box-sizing: border-box;
         }
         /* footer ke andar container h  */
         .footer{
            /* background-color:#2c4152;
            */
            background-color: rgb(23, 22, 22);
            /* padding:70px 0; */
            padding-top:70px;
         }
         .container{
               max-width:1170px;
               /* background-color: brown; */
               margin:auto;
               padding-bottom: 50px;
         }

         ul{
            list-style: none;
         }
         .row
         {
            display:flex;
            flex-wrap: wrap;
            /* content div ho gya 4 row me  */
         } 
         .footer-col{
               width:25%;
               padding: 0 15px;
         } 
         .footer-col h4{
               font-size:18px;
               color:white;
               text-transform: capitalize;
               margin-bottom: 35px;
               font-weight: 500;
               position:relative;
            
         }
         /* .footer-col li{
            font-family: 'Ubuntu', sans-serif;
         } */
         .footer-col h4::before{
            content:'';
            position: absolute;
            left:0;
            bottom: -10px;
            /* background-color: #00072be8; */
            background-color:#012048;
            height:2px;
            box-sizing: border-box;
            width:50px;
         }
         body{
            line-height: 1.5;
            font-family: 'Ubuntu', sans-serif;
         }
         .footer-col ul li:not(:last-child)
         {
            margin-bottom: 10px;
         }
         .footer-col ul li a{
            font-size: 16px;
            text-transform: capitalize;
            text-decoration: none;
            font-weight: 300;
            color : #d2d1d1;
            display:block;
            transition:all 0.3s ease;
            
         }
         .footer-col ul li a:hover{
            color:white;
            padding-left:8px;

            
         }
         .footer-col .socials a{
            display: inline-block;
            height:40px;

            width:40px;
            background-color:rgba(29, 29, 29, 0.2);
            text-align: center;
            /* margin:0 10px 10px 0; */
            line-height:53px;
            border-radius: 50%;
            color:white;
            transition:all 0.5s ease;
         }
         .footer-col .socials a:hover{
            color:#24262b;
            background-color: white;

         }
         .footer-bottom{
            color:azure;
            /* list-style: 30px; */
            background-color: #000000;
           /* width:100vw;*/
            text-align:center;
            padding:20px 0;
            
         }
         .footer-bottom p{
            font-size: 14px;
            word-spacing: 2px;
            text-transform: capitalize;

         }
         .footer-bottom span{
            text-transform: uppercase;
            opacity: .4;
            font-weight:200;
         }
         @media(max-width:767px)
         {
            .footer-col{
               width:50%;
               margin-bottom: 30px;
            }
         }
         @media(max-width:574px)
         {
            .footer-col{
               width:100%;
            
            }
         }



        </style>
</head>
<body>
    
    <footer class="footer w-full ml--10 mr--10 ">
       <div class="container">
            <div class="row">
                
                <div class="footer-col">
                    <h4>Shop Buddy</h4>
                    <ul>
                        <li><a href="about_us.php">About us</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                        <li><a href="Security.php">Our Services</a></li>
                        <li><a href="PrivacyPage.php">Privacy Policy</a></li>
                        <li><a href="termsandcondition.php">Tearms and conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="Payment.php">Payment</a></li>
                        <li><a href="Shipping.php">Shipping</a></li>
                        <li><a href="#">Cancellation & Returns</a></li>
                        <li><a href="#">Customer Care</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Shop By</h4>
                    <ul>
                        <li><a href="home.php"> Women</a></li>
                        <li><a href="home.php">Men</a></li>
                        <li><a href="home.php">Kids</a></li>
                        <li><a href="home.php">Collections</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us!</h4>
                    <div class="socials">
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram-square fa-2x"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://twitter.com/login?lang=en"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="https://www.linkedin.com/signup"><i class="fab fa-linkedin fa-2x"></i></a>
                        <a href="https://in.pinterest.com/"><i class="fab fa-pinterest fa-2x"></i></a>
                    </div>
                </div>

            </div>
       </div>

       <div class="footer-bottom w-full ml-0 mr-0">
        <p>Copyright &copy; <?php echo date('Y')?> Shop Buddy. designed by <span>team</span></p>
       </div>
    </footer>
   
</body>
</html>