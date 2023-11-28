<?php


@include 'cnx_database.php';



if (isset($_POST['submit'])) {
    // Sanitize user inputs

    $RIB = mysqli_real_escape_string($conn, $_POST['RIB']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);
    
    $userid = $_POST['userId'];;


    // Insert new bank into the 'bank' table
    $insertQuery = "INSERT INTO account (RIB, balance,userId)
     VALUES 
     ('$RIB', '$balance', '$userid')";

    $conn->query($insertQuery);

    header('location: accounts.php');
}
if (isset($_POST['accountid']) && $_POST['editing'] === 'Edit') {
    // Retrieve agency details for editing
    $id = $_POST["accountid"];
    $accountinfo = "SELECT * FROM account WHERE accountid = $id";
    $stk_cmt_info = $conn->query($accountinfo);
    $rows = mysqli_fetch_assoc($stk_cmt_info);

    // Populate variables with retrieved data
    $RIB = $rows["RIB"];
    $balance = $rows["balance"];
    
  
}


if (isset($_POST['edited'])) {

    $RIB = mysqli_real_escape_string($conn, $_POST['RIB']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);
    $id = $_POST['accountid'];
    $updateQuery = "UPDATE account SET RIB='$RIB', balance='$balance' WHERE accountid=$id";
    $conn->query($updateQuery);
    header('location: accounts.php');
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div
      class="min-h-screen flex flex-col items-center justify-center bg-gray-100"
    >
      <div
        class="
          flex flex-col
          bg-white
          shadow-md
          px-4
          sm:px-6
          md:px-8
          lg:px-10
          py-8
          rounded-3xl
          w-50
          max-w-md
        "
      >
        <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
          Ajouter Account
        </div>
        

        <div class="mt-10">
          <form action="#">
            <div class="flex flex-col mb-5">
              <label
                for="email"
                class="mb-1 text-xs tracking-wide text-gray-600"
                >BALANCE</label
              >
              <div class="relative">
                <div
                  class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  "
                >
                </div>

                <input
                  id="balance"
                  type="number"
                  name="balance"
                  class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                  value="<?php echo isset($balance) ? $balance : ''; ?>"
                />
              </div>
            </div>
            <div class="flex flex-col mb-6">
              <label
                for="password"
                class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600"
                >RIB</label
              >
              <div class="relative">
                <div
                  class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  "
                >
                 
                </div>

                <input
                  id="rib"
                  type="number"
                  name="rib"
                  class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                  value="<?php echo isset($RIB) ? $RIB : ''; ?>"
                />
              </div>
            </div>

            <div class="mt-10">
          <form action="#">
            <div class="flex flex-col mb-5">
              <label
                for="email"
                class="mb-1 text-xs tracking-wide text-gray-600"
                >USER ID</label
              >
              <div class="relative">
                <div
                  class="
                    inline-flex
                    items-center
                    justify-center
                    absolute
                    left-0
                    top-0
                    h-full
                    w-10
                    text-gray-400
                  "
                >
                </div>

                <input
                type="hidden" name="accountid" value="<?php echo isset($id) ? $id : ''; ?>"
                  class="
                    text-sm
                    placeholder-gray-500
                    pl-10
                    pr-4
                    rounded-2xl
                    border border-gray-400
                    w-full
                    py-2
                    focus:outline-none focus:border-blue-400
                  "
                  placeholder="Enter the Balance"
                />
              </div>
            </div>

            <div class="flex w-full">
              <button
                type="submit"
                class="
                  flex
                  mt-2
                  items-center
                  justify-center
                  focus:outline-none
                  text-white text-sm
                  sm:text-base
                  bg-blue-500
                  hover:bg-blue-600
                  rounded-2xl
                  py-2
                  w-full
                  transition
                  duration-150
                  ease-in
                "
              >
                <span class="mr-2 uppercase">Ajouter</span>
                <span>
                  <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </span>
                <?php
                    if (!isset($_POST['accountid'])) {         
                        echo '<select name="userId"  class="outline-none h-[40px] p-[5px] w-[50%] rounded">'    ;   
                    
                    // Query to get all banks
                    $userQuery = "SELECT userId, firstName,familyName FROM users";
                    $userResult = mysqli_query($conn, $userQuery);

                    // Check if there are banks
                    if (mysqli_num_rows($userResult) > 0) {
                        while ($userRow = mysqli_fetch_assoc($userResult)) {
                            // Set the selected attribute if the bank is associated with the agency
                            $selected = ($userRow['userId'] == $selecteduserid) ? 'selected' : '';
                            echo '<option value="' . $userRow['userId'] . '" ' . $selected . '>' . $userRow['firstName'] . '' . $userRow['familyName'] . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled>No banks found</option>';
                    }
                }else{
                    echo 'You can change account RIB OR balance';
                }
                    ?>
              </button>
            </div>
            <?php
                if (isset($_POST['accountid'])) {
                    echo '<input type="submit" name="edited" value="Edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
                } else {
                    echo '<input type="submit" name="submit" value="Add Account" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-[85%] rounded cursor-pointer">';
                };
                ?>


                <a href="accounts.php" class="bg-blue-500 w-[85%] text-center hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">accounts Details</a>

          </form>
        </div>
      </div>
     
      
    </div>
  </body>
</html>

</body>
</html>



