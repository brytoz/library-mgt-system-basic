<?php
require 'all/query.php';

?>
<! DOCTYPE html>
<html lang="US-en">
 <head>
  <meta charset="utf-8">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Library Mngt System -  Register</title>
  <link href="../../../tailwind/output.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <!-- <script type="text/javascript" src="jquery/jquery1.11.3.js"></script>
  <script type="text/javascript" src="jquery/i.js"></script>    -->

<link href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body style="background: #edf2f7;">
	
	


<div class="overflow-hidden flex items-center justify-center flex-wrap md:flex-nowrap lg:mt-8">
		<div class="w-full md:w-4/6 text-center mt-4 hidden md:block">
			<img src="svg/undraw_book_lover_mkck.svg" width="550" class="lg:ml-12">
		</div>


		<div class="w-full md:w-4/6 text-center mt-4">
			<div class="relative min-h-screen flex flex-col sm:justify-center items-center ">
                <div class="relative sm:max-w-sm md:w-full">
                    <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                        <label for="" class="block text-sm text-gray-700 text-center font-semibold" id="labelfor">
                            Register
                        </label>
                       <?php echo '<form method="post" action="'.register($conn).'" class="mt-10">'; ?>
                                           
                            <div>
                                <input type="text" required="" placeholder="Registration number" name="Reg_num" size="20" pattern="[0-9]{11}" maxlength ="11" title="Enter Registration number" class="text-center font-bold text-green-700 focus:text-sm mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>

                            <div class="mt-5">
                                <input type="text" required="" placeholder="Fullname" name="fullname" size="20"  title="Enter Fullname" class="text-center font-bold text-green-700 focus:text-sm mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>

                			
                			<div class="mt-5">
                                <input type="text" required="" maxlength="3" placeholder="Department" name="dept" size="20" pattern="[aA-zZ]{3}" title="Enter Registration number" class="text-center font-bold text-green-700 focus:text-sm mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>

                            <div class="mt-5">                
                                <input type="password" required="" size="20" name="password" placeholder="Password" class="mt-1 block w-full text-center font-bold  border-none bg-gray-100 h-11 rounded-xl text-green-700 shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>

                            
                
                            <div class="mt-7">
                                <input type="submit" name="submit"  class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105" value="Register">
                                    
                            </div>
                
                            <div class="flex mt-7 items-center text-center">
                                <hr class="border-gray-300 border-1 w-full rounded-md">
                                <label class="block font-medium text-sm text-gray-700 w-full">
                                    Library Mngt System
                                </label>
                                <hr class="border-gray-300 border-1 w-full rounded-md">
                            </div>
                
                            <div class="flex mt-7 justify-center w-full">
                                <button class="mr-5 bg-blue-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    
                                    Vivian
                                </button>
                
                                <button class="bg-red-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    
                                    Rotimi
                                </button>
                            </div>
                
                            <div class="mt-7">
                                <div class="flex justify-center items-center text-sm ">
                                    <label class="w-full text-gray-600">Already have an account?</label>
                                    <a href="login.php" class="w-full text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
</div>

</body>

</html>