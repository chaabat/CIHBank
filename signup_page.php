<?php

include('cnx_database.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nationalite = $_POST["nationalite"];
    $genre = $_POST["genre"];
    $cpassword = $_POST["cpassword"];

    if (!empty($username) && !empty($password)) {
        if ($password === $cpassword) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT );

            $sql = "INSERT INTO users (username, password, nom, prenom, nationalite, genre, usertype) VALUES ('$username', '$hashedPassword', '$nom', '$prenom', '$nationalite', '$genre')";
            
            $result = mysqli_query($cnx, $sql);

            if ($result) {
                echo "success";
            } else {
                echo "error: " . mysqli_error($cnx);
            }
        } else {
            echo "Password and confirmation password do not match!";
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
    <!-- component -->
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Responsive Form</h2>
      <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p>
<form action="#" method="POST">
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
                <input type="text" name="lastname" required placeholder="Enter Your FirstName" value="<?php echo isset($lastname) ? $lastname : ''; ?>" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>

              <div class="md:col-span-5">
                <label for="email">Prénom</label>
                <input type="text" name="firstname" required placeholder="Enter Your FirstName" value="<?php echo isset($firstname) ? $firstname : ''; ?>" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>

              <div class="md:col-span-5">
                <label for="email">Username</label>
                <input type="text" name="username" required placeholder="Enter Your username" value="<?php echo isset($username) ? $username : ''; ?>"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>

              <div class="md:col-span-3">
                <label for="address">Password</label>
                <input type="password" name="password" required placeholder="Enter Your password" value="<?php echo isset($password) ? $password : ''; ?>" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
              </div>
              

              <div class="md:col-span-2">
                <label for="city">Reapet Password</label>
                <input type="password" name="cpassword" required placeholder="confirme Your password" value="<?php echo isset($password) ? $password : ''; ?>" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>

              <div class="md:col-span-2">
              <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">User Type</label> 
              <SELECT name="user-type" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                   <option value="1">client</option>
                 <option value="1">admin</option>
              </SELECT>
              </div>

             

              <div class="md:col-span-2">
              <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Genre</label> 
              <SELECT name="genre" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                 <option value="male">Male</option>
                 <option value="femelle">Femelle</option>
              </SELECT>
              </div>

              <div class="md:col-span-5">
                <label for="adress">Nationalité</label>
                <input type="text" name="nationalite" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
              </div>

              <div class="md:col-span-5">
                <label for="adress">Adress</label>
                <input type="text" name="adress" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
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

          </div>
        </div>
      </div>
    </div>
    <?php
        if (isset($_POST['userid']) && $_POST['editing'] === 'Edit') {
            echo '<input type="hidden" name="user_ids" value="' . implode(',', $userIds) . '">';
            echo '<input type="hidden" name="userid" value="' . (isset($id) ? $id : "") . '">';
            echo '<input type="submit" name="edited" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
        } else {
            echo '<input type="submit" name="add_user" value="Add User" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
        }
        ?>
    </form>

    
  </div>
</div>


</body>
</html>



