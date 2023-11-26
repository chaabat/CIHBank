<?php
include('cnx_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Clients</title>
</head>
<body>



<button  type="button" class="w-1/6 flex justify-around  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-[300px] mt-10"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
    <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"/>
    </svg><a href="signup_page.php">Ajouter un client</a></button>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg top-10 ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Password
                </th>
                <th scope="col" class="px-6 py-3">
                    Nationalité
                </th>
                <th scope="col" class="px-6 py-3">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
               
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM 'users'";
            $result = mysqli_query($nx,$sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $id=$row['id'];
                    $nom=$row['nom'];
                    $prenom=$row['prenom'];
                    $username=$row['username'];
                    $password=$row['password'];
                    $nationalite=$row['nationalite'];
                    $genre=$row['genre'];
                    echo `<tr>
                    <td> '.$nom.'</td>
                    <td> '.$prenom.'</td>
                    <td> '.$username.'</td>
                    <td> '.$password.'</td>
                    <td> '.$nationalite.'</td>
                    <td> '.$genre.'</td>
                    </tr>;
                    `
                    
                }}


          ?>

        </tbody>
    </table>
</div>

<?php
include('sidenav.php');
?>





</body>
</html>
