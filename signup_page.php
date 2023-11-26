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

    if (!empty($username) && !empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, nom, prenom, nationalite, genre, usertype) VALUES ('$username', '$hashedPassword', '$nom', '$prenom', '$nationalite', '$genre', '$usertype')";
        $result = mysqli_query($cnx, $sql);

        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
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

<div class="p-8 rounded border border-gray-200">   
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
    <input type="text" name="password" id="password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />    
    </div> 

    <div>                                                                            
    <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Type</label> 
    <input type="text" name="usertype" id="usertype" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />    
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
                                                                                                   
    
</body>
</html>



