<?php
session_start();
$err_username = $err_password = $passwordUser = $usernameUser = '';
$token = generateRandomString();

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (isset($_POST['login'])) {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST['password']);

  if (!empty($username) && !empty($password)) {

    try {
      $sql = "SELECT username from users WHERE username=:username";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->execute();
      $coutUsername = $stmt->rowCount();
      if ($coutUsername == 1) {

        try {
          $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam('username', $username, PDO::PARAM_STR);
          $stmt->bindValue('password', $password, PDO::PARAM_STR);
          // $stmt->execute(['username' => $username, 'password' => $password]);
          $stmt->execute();
          $userCount = $stmt->rowCount();
          if ($userCount == 1) {
            $_SESSION["username"] = $username;
            // $_SESSION["password"] = $password;
            // $_SESSION["token"] = $token;

            header('Location:./download-page/index.php');
          } else {
            $usernameUser = $username;

            $err_password = ' <div class="flex items-center mt-1 text-red-700">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                            clip-rule="evenodd"
                          />
                        </svg>
                        <p class="ml-1 text-xs">Password incorrect !</p>
                      </div>
                
                    </div>';
          }
        } catch (PDOException $e) {
          echo 'Error :' . $e->getMessage();
        }
      } else {
        $err_username = ' <div class="flex items-center mt-1 text-red-700">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                    clip-rule="evenodd"
                  />
                </svg>
                <p class="ml-1 text-xs">Username does not exist !</p>
              </div>
              
            </div>';
      }
    } catch (PDOException $e) {

      echo "Error : " . $e->getMessage();
    }
  } else {
    echo '<div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <!-- banner - start -->
        <div class="flex flex-wrap sm:flex-nowrap sm:justify-center sm:items-center bg-red-500 relative sm:gap-3 px-4 sm:pr-8 ms:px-8 py-3">
          <div class="order-1 sm:order-none w-11/12 sm:w-auto max-w-screen-sm inline-block text-white text-sm md:text-base mb-2 sm:mb-0">Error ,Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, fugiat! </div>
          <a href="#" class="order-last sm:order-none w-full sm:w-auto inline-block bg-red-700 hover:bg-indigo-700 active:bg-indigo-800 focus-visible:ring ring-indigo-300 text-white text-xs md:text-sm font-semibold text-center whitespace-nowrap rounded-lg outline-none transition duration-100 px-4 py-2">Learn more</a>
        </div>
        <!-- banner - end -->
      </div>';
  }
}
