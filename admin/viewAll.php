<?php

require ('../all/all.php');
require ('access.php');

if (loggedin()==true) { 


?>
<! DOCTYPE html>
<html lang="US-en">
 <head>
  <meta charset="utf-8">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
 <title>  View/Add books | Administrator </title>
  <link href="../../../../tailwind/output.css" type="text/css" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
 <!-- //ICON -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
  
</head>

<body style="font-family: 'Dosis', sans-serif; " class="antialiased   ">

<div class="w-full bg-blue-200 text-center p-5 text-2xl">
  View/Add books
</div>


<div  class="overflow-hidden flex items-center justify-center">
        <div class="w-full md:w-1/2 lg:flex-1 md:ml-8 ">
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-green-500 cursor-pointer " id="book">
            <div class="ml-2 border bg-white shadow-lg z-99">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> Add books </span><br> <span class="font-normal text-sm opacity-75"> Add a book</span>
                <div class="float-right pr-5">
                  <i class="fas fa-book-medical  fa-2x" style="color: #48bb78 !important;" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>  
        </div>

        <div class="w-full  md:w-1/2 lg:flex-1 "> 
          <div class="mt-2 rounded-lg max-w-sm bg-purple-500 md:bg-purple-500 cursor-pointer" id="view">
            <div class="ml-2 border bg-white shadow-lg z-99">
              <div class="pl-4 pt-4 pb-16">
                <span class="font-bold text-xl"> All books </span><br> <span class="font-normal text-sm opacity-75"> View all books</span>
                <div class="float-right pr-5">
                  <i class="fas fa-book-open fa-2x" style="color: #9f7aea !important;" aria-hidden="true"></i>
                </div>
              </div>
              
            </div>
          </div>
        </div>

</div>
  
  <div class=" overflow-hidden flex items-center justify-center mt-12 " >
    <div class="overflow-x-auto">
        <div class=" bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:flex-1">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto hidden" id="table">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Book ID</th>
                                <th class="py-3 px-6 text-left">Name</th> 
                                <th class="py-3 px-6 text-center">Dept designated</th>
                                <th class="py-3 px-6 text-center">Position in shelf</th>
                                <th class="py-3 px-6 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">


                            <?php 

                            

                            $sql = "SELECT books_id, name, dept_designated, shelf_position, status FROM books";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                  

                              echo    '<tr class="border-b border-gray-200 hover:bg-gray-100">
                                          <td class="py-3 px-6 text-left whitespace-nowrap">
                                              <div class="flex items-center">
                                                  <span class="font-medium">'. $row["books_id"].'</span>
                                              </div>
                                          </td>';
                              echo        '<td class="py-3 px-6 text-left">
                                              <div class="flex items-center">
                                                  <span>'. $row["name"] .'</span>
                                              </div>
                                          </td>';
                              echo        '<td class="py-3 px-6 text-center">
                                              <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">'. $row["dept_designated"].'</span>
                                          </td>';
                              echo        '<td class="py-3 px-6 text-left">
                                              <div class="flex items-center">
                                                  <span>'. $row["shelf_position"] .'</span>
                                              </div>
                                          </td>';
                              echo        '<td class="py-3 px-6 text-center">
                                              <div class="flex item-center justify-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">'.$row["status"].'</span>
                                              </div>
                                          </td>
                                      </tr>';



                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div  class="overflow-hidden flex items-center justify-center ">
    
    <?php echo '<form class="hidden"  method="post" action="'.load($conn).'" id="bookForm">';?>
      <div class="mb-4">
        <label class="block text-md font-light mb-2" for="username">Book ID</label>
        <input class="w-full bg-drabya-gray border-gray-500 appearance-none border rounded p-4 font-light leading-tight focus:outline-none focus:shadow-outline" type="text" name="id" id="" placeholder="eg. IMT-212-B">
      </div>
      <div class="mb-4">
        <label class="block text-md font-light mb-2" for="username">Name of the Book</label>
        <input class="w-full bg-drabya-gray border-gray-500 appearance-none border rounded p-4 font-light leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="" placeholder="eg. spectrum magnetism">
      </div>
      
      <div class="mb-4">
        <label class="block text-md font-light mb-2" for="username">Department designated</label>
        <input class="w-full bg-drabya-gray border-gray-500 appearance-none border rounded p-4 font-light leading-tight focus:outline-none focus:shadow-outline" type="text" name="dept" id="" placeholder="eg. IMT">
      </div>

      <div class="mb-4">
        <label class="block text-md font-light mb-2" for="username">Select Position</label>
        <select class="w-full bg-drabya-gray border-gray-500 appearance-none border rounded p-4 font-light leading-tight focus:outline-none focus:shadow-outline opacity-75 cursor-pointer" name="position">
          <option>Position in shelf </option>
          <option>Top-right</option>
          <option>Top-left</option>
          <option>Bottom-right</option>
          <option>Bottom-left</option>
        </select>
      </div>

      <div class="flex items-center justify-center mb-5">
        <button name="submit" class="bg-indigo-600 hover:bg-blue-700 text-white font-light py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
          Add Book <i class="fas fa-plus fa-1x" style="color: #48bb78 !important;" aria-hidden="true"></i> 
        </button>
      </div>
    </form>
  </div>



<div class="text-center mt-24 md:mt-32 text-sm opacity-75" style="bottom: 0; bottom">
  <a href="dashboard.php">
  <button class="p-2 bg-green-600 rounded-lg text-white font-bold">
     <i class="fa fa-fa-arrow-left"></i>  Go to Dashboard
  </button>
  </a>
</div>







<script>
  

document.getElementById('book').addEventListener('click', function(){

  document.getElementById("bookForm").style.display = "block";
  document.getElementById("view").style.display = "hidden";
  document.getElementById("table").style.display = "hidden";

  });

document.getElementById('view').addEventListener('click', function(){

  document.getElementById("table").style.display = "block";
  document.getElementById("book").style.display = "hidden";
  document.getElementById("bookForm").style.display = "hidden";
  

  });





</script>


</body>
</html>
	
<?php
  } else {

  header('Location: ../all/logout.php'); 
 }



?>
