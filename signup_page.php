<?php

include('cnx_database.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];
    $genre = $_POST["genre"];
    $usertype = $_POST["usertype"];
    $cpassword=$_POST["cpassword"];

    if (!empty($username) && !empty($password)) {
        if($password ===$cpassword){
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, nom, prenom, nationalite, genre, usertype) VALUES ('$username', '$hashedPassword', '$nom', '$prenom', '$nationalite', '$genre', '$usertype')";
        $result = mysqli_query($cnx, $sql);

        if ($result) {
            // echo "success";
        } else {
            echo "error";
        }
    }else{
        $error[] = 'Password and confirmation password do not match!';    }


}
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    <!-- component -->
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Responsive Form</h2>
      <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p>

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Personal Details</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="full_name">Nom</label>
                <input type="text" name="nom" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-5">
                <label for="email">Prénom</label>
                <input type="text" name="prenom" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
              </div>

              <div class="md:col-span-5">
                <label for="email">Username</label>
                <input type="text" name="username" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
              </div>

              <div class="md:col-span-3">
                <label for="address">Password</label>
                <input type="password" name="password" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>
              

              <div class="md:col-span-2">
                <label for="city">Reapet Password</label>
                <input type="password" name="cpassword" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>

              <div class="md:col-span-2">
              <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">User Type</label> 
              <SELECT name="usertype" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                   <option value="1">client</option>
                 <option value="1">admin</option>
              </SELECT>
              </div>

              <div class="md:col-span-2">
              <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Genre</label> 
              <SELECT name="genre" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                 <option value="1">Male</option>
                 <option value="1">Femelle</option>
              </SELECT>
              </div>

              <div class="md:col-span-5">
                <label for="email">Adress</label>
                <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>

              <div class="md:col-span-2">
                <label for="country">Country</label>
                <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                  <input name="country" id="country" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                 
                  <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                  </button>
                </div>
              </div>

              

              <div class="md:col-span-1">
                <label for="zipcode">City</label>
                <input type="text" name="city" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
              </div>

              <div class="md:col-span-1">
                <label for="zipcode">Zipcode</label>
                <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
              </div>
              <div class="md:col-span-3">
                <label for="address">Phone Number</label>
                <input type="number" name="phone" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>
              

              <div class="md:col-span-2">
                <label for="city"> Email</label>
                <input type="email" name="email" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>

              <div class="md:col-span-5">
                <div class="inline-flex items-center">
                  <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                  <label for="billing_same" class="ml-2">My billing address is different than above</label>
                </div>
              </div>

              
                 
                </div>
              </div>
      
              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
              </div>

            </div>
            <?php
if (!empty($error)) {
    echo '<div style="color: red;">';
    foreach ($error as $err) {
        echo $err . '<br>';
    }
    echo '</div>';
}
?>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>

<!-- <div class="p-8 rounded border border-gray-200">   
     <h1 class="font-medium text-3xl">Add User</h1> 
        <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> 
<form action="#" method="POST">   
     <div class="mt-8 grid lg:grid-cols-2 gap-4">  
     <div>    
     <label for="job" class="text-sm text-gray-700 block mb-1 font-medium">Nom</label>    
     <input type="text" name="nom" id="nom" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" />   
     </div> 
     <div>  
     <label for="prenom" class="text-sm text-gray-700 block mb-1 font-medium">Prenom</label>    
     <input type="text" name="prenom" id="prenom" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />   
     </div> 
        
     <div>    
     <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Username</label>     
     <input type="text" name="username" id="username" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />       
     </div>    
                                                                                                                           
    <div>                                                                            
    <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Password</label> 
    <input type="password" name="password" id="password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />    
    </div> 

    <div>                                                                            
    <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">User Type</label> 
    <SELECT class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
     <option value="1">client</option>
     <option value="1">admin</option>
  </SELECT>
</div>


  

    <div>    
     <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Nationalité</label>     
     <input type="text" name="nationalite" id="nationalite" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />       
     </div>
     <div>    
     <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Genre</label>     
     <input type="text" name="genre" id="genre" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />       
     </div>
    

    </div>   
    <div class="space-x-4 mt-8"> 
   <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Sign up</button>    
                                                                                                    -->
    
</body>
</html>



