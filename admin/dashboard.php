  <?php


require '../all/all.php';
//require_once 'referrer.php';

if (loggedin()==true) { 

  
 //userId function
function UserId($get) {
  require '../all/conn.php';
  $query = "SELECT ".$get." FROM admin WHERE `id`='".$_SESSION['user_id']."'";
  if ($data_query = mysqli_query($conn, $query)) {
      $data_row = mysqli_fetch_row($data_query);
      $data_count = $data_row[0];
    if ($data_count == true) {
      return $data_count;
    }
  }
}

    $admin_name = UserId('admin_name');
    $admin_code = UserId('admin_code');
    $user_super = UserId('user_super');



?>

<! DOCTYPE html>
<html lang="US-en">
 <head>
  <meta charset="utf-8">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
 <title>  Dashboard | Administrator </title>
  <link href="../../../../tailwind/output.css" type="text/css" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
 <!-- //ICON -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- <script type="text/javascript" src="jquery/jquery1.11.3.js"></script>
  <script type="text/javascript" src="jquery/i.js"></script> -->
    

   <style>
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
  </style>
</head>

<body style="background: #edf2f7; font-family: 'Dosis', sans-serif;">
	
    
     <div class="md:m-16 m-3">
      <div students class="flex flex-wrap sm:flex-no-wrap ">
        

        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-green-500">
            <div class="ml-2 border bg-white shadow-lg z-99">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> <?php echo $user_super;?> </span><br> <span class="font-normal text-sm opacity-75"> super-user</span>
                <div class="float-right pr-5">
                  <i class="fas fa-user-shield fa-2x" style="color: #48bb78 !important;" aria-hidden="true"></i>
                </div>
              </div>
              
            </div>
          </div>
        </div>


        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-purple-500">
            <div class="modal-open ml-2 border bg-white shadow-lg z-99 cursor-pointer ">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl">My Profile </span><br> <span class="font-normal text-sm opacity-75"> Hello Mr. admin</span>
                <div class="float-right pr-5">
                  <span><i class="fa fa-user fa-2x" style="color: #9f7aea !important;" aria-hidden="true"></i></span>
                </div>
              </div>
              
            </div>
          </div>
        </div>


        


        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-yellow-600">
            <div class="ml-2 border bg-white shadow-lg z-99 cursor-pointer"><a href="viewAll.php" >
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> Add books </span><br> <span class="font-normal text-sm opacity-75"> Add books now</span>
                <div class="float-right pr-5">
                  <i class="fas fa-book-medical  fa-2x" style="color: #ecc94b !important;" aria-hidden="true"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>


        
      </div>


<!--///START // -->

      <div students class="flex flex-wrap sm:flex-no-wrap mt-8">

      <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8 ">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-green-500">
            <div id="promo" class="ml-2 border bg-white shadow-lg z-99 cursor-pointer"><a href="viewAll.php" >
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> All books </span><br> <span class="font-normal text-sm opacity-75"> View all books</span>
                <div class="float-right pr-5">
                  <i class="fas fa-eye fa-2x" style="color: #48bb78 !important;" aria-hidden="true"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>


        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8 ">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-purple-500-500">
            <div id="promo" class="ml-2 border bg-white shadow-lg z-99 cursor-pointer"><a href="borrowed.php">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl">  Borrowed books </span><br> <span class="font-normal text-sm opacity-75"> Check borrowed books</span>
                <div class="float-right pr-5">
                  <i class="fas fa-book-open fa-2x" style="color: #9f7aea !important;" aria-hidden="true"></i>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>

      <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8 ">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-yellow-600">
            <div id="promo" class="ml-2 border bg-white shadow-lg z-99">
              <div class="pl-4 pt-4 pb-7">
                <span class="font-bold text-xl"> Search </span><br> 
                <span class="font-normal text-sm opacity-75"> Search for avialable books</span>
                  <div class="float-right pr-5">
                    <i class="fas fa-search fa-2x" style="color: #ecc94b !important;" aria-hidden="true"></i>
                  </div> <br>
                  <div class="font-normal text-sm opacity-75 block"> 


                    <!-- SEARCH FORM HERE -->
                  <form enctype="form/data " >
                    <input type="text" name="Search" class="border-2 border-gray-700 rounded">
                    <input type="submit" name="" value="Search" class="ml-4 p-1 rounded bg-green-500 text-white cursor-pointer" >
                  </form>
                  </div>
                
              </div>
              
            </div>
          </div>
        </div>


        
      </div>

      <!--///END // -->

      <!--///LAST // -->

      <div students class="flex justify-center sm:flex-no-wrap mt-8">
        <div class="w-full sm:w-full md:w-1/2 lg:w-1/3 mr-8 ">
          <div class="mt-2 rounded-lg max-w-sm bg-red-500 md:bg-red-500">
            <a href="../all/logout.php">
            <div id="promo" class="ml-2 border bg-white shadow-lg z-99 cursor-pointer">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> Logout </span><br> <span class="font-normal text-sm opacity-75"> logout</span>
                <div class="float-right pr-5">
                  <i class="fas fa-sign-out-alt fa-2x" style="color: #f56565 !important;" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>



    </div>
      

<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3 mb-4">
          <p class="text-2xl font-bold"> My Profile</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        
        <p>Fullname : <span class="text-green-600 capitalize  font-bold"> <?php echo $admin_name; ?></span></p>
        <p>Username : <span class="text-green-600 capitalize font-bold"> <?php echo $admin_code; ?></span></p>
        <p>User : <span class="text-green-600 capitalize font-bold"> <?php echo $user_super; ?></span></p>
        



        <!--Footer-->
        <div class="flex justify-end pt-2">
         <form method="get">
            <button id="pass" name="pass" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Reset Password</button>
         </form>
         
        </div>
        
      </div>
    </div>
  </div>


  <script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
      event.preventDefault()
      toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
      isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
      isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
      toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    
     
  </script>


      
<div class=" w-full mt-24 ml-0" >
  <div class="text-center text-black p-4 font-bold text-medium md:fixed w-full z-99" style="left: 0; bottom: 0;">
     &copy; Library Mngt System 2021
  </div>
</div>



 
<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
  
  function withdraw(){
    window.location.href = 'dashboard/withdrawal/withdraw.php?=withdrawal?Bitcoin' ;
  }

  document.getElementById('promo').addEventListener('click', function(){
    toastr.info('There are no promos available');
  });

  document.getElementById('pass').addEventListener('click', function(){

    setTimeout( function(){toastr.success('An email has been sent to you to change your password')} , 2000);
  });
</script>


</body>
</html>



<?php
  } else {

  header('Location: ../all/logout.php'); 
 }



?>

