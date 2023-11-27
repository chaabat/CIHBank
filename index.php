<?php
include('login_role.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   

<div class="h-screen md:flex ">
	<div
		class="relative overflow-hidden md:flex w-1/2 bg-[url('home.png')] bg-no-repeat bg-center bg-cover i justify-around items-center hidden">
		
		
	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form action="#" method="POST" class="bg-white"  >
		
		<img src="logo.png" class="h-8 me-3 sm:h-8" alt="bank Logo" />
         <span class=" self-center text-xl font-semibold whitespace-nowrap dark:text-white">CIH BANK</span>			
			<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd" />
				</svg>
				
					
						<input class="pl-2 outline-none border-none" type="text" name="email" id="email" placeholder="Email Address" />
      </div>
						<div class="flex items-center border-2 py-2 px-3 rounded-2xl">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none" type="password" name="password" id="password" placeholder="Password" />
      </div>
							<button type="submit" class="block w-full bg-orange-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
						
		</form>
	</div>
</div>
    
</body>
</html>


