
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
         
         

         
         
         body{
            line-height: 1.5;
            font-family: 'Ubuntu', sans-serif;
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
         



        </style>
</head>
<body>
    
    <footer class="footer w-full ml--10 mr--10 ">
       <div class="footer-bottom w-full ml-0 mr-0">
        <p>Copyright &copy; <?php echo date('Y')?> Shop Buddy. designed by <span>team</span></p>
       </div>
    </footer>
   
</body>
</html>