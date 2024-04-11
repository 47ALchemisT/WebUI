<?php

include('config.php');

if(isset($_POST['login_Btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectedRole = $_POST['job']; // Retrieve selected role from the form

    // Secure the user input to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $selectedRole = $conn->real_escape_string($selectedRole);
    
    $sql = "SELECT * FROM spis.user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $userRole = $row['job'];
        
        if($userRole === $selectedRole) {
            if($userRole === 'Admin') {
                header('Location: GenSec/sportsDashboard.php');
            } elseif($userRole === 'College Committee') {
                header('Location: CollegeHead/CHDashboard.php');
            } else {
                // Handle other roles or redirect to a default dashboard
            }
        } else {
            echo "<script>alert('Access Denied: Wrong Role');
                  window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Wrong Username or Password');
              window.location.href='login.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-select{
            font-size: 16px;
            border-color: #fad400; /* Changed border color */
        }
        .details{
          z-index: 2;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          padding: 20px;
        }
        .image {
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: 1;
            position: absolute; /* Position the image absolutely */
        }
        .btn{
            border: none;
            background-color: #fad400;
            color: #ffffff;
        }
        .btn:hover{
            background-color: #f3ba00;
        }
        .form-control#name, .form-control#user-password{
            border-color: #f3ba00;
        }
        /* Custom border color for form inputs */
        .form-control#name:focus, 
        .form-control#user-password:focus,
        .form-select:focus{
            border-color: #f3ba00;
            box-shadow: 0 0 0 0.25rem rgba(243, 186, 0, 0.25);
        }
        hr{
            color: #f3ba00;
            height: 2px;
            border: none; /* Remove the default border */
            background-color: #f3ba00; /* Change the color */
            margin-top: 2rem; /* Adjust margin as needed */
        }

        .des{
          font-size: 12px;
          color: #ffffff;
        }
        .ut-text{
          font-size: 14px;
        }

        /* Warning style */
        .warning-text {
            color: red;
            font-size: 12px;
            display: none; /* Hide warning by default */
        }
    </style>
  </head>
  <body>
  <!-- Bootstrap 5 Contact Form Snippet -->
  <div class="container-fluid vh-100">
        <div class="row h-100">
          <div class="col-lg-6 p-0 position-relative"> <!-- Added position-relative class -->
            <div class="vh-100">
                <div class="image">
                    <img src="css/images/guyfyt.png" alt="error" class="image">
                    <div class="details d-flex flex-column justify-content-between py-4 px-4">
                      <div class="title d-flex gap-2 mb-4 fw-medium align-items-center">
                        <div style="height: 30px; width: 30px;">
                            <img src="css/images/ssc.jpg" alt="error" style="height: 100%; width: 100%; object-fit: cover; border-radius: 50%;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="m-0 text-white">Supreme Student Council</p>
                        </div>
                      </div>
                      <div class="middle-text py-3 d-flex align-items-center gap-3">
                        <div>
                          <img src="css/images/torch.png" alt="error" style="height: 130px; width: 80px;">
                        </div>
                        <div class="text-left mt-5">
                          <div class="text-white fs-2 fw-bold"> <span class="blue">Pal</span><span>aka</span><span class="red">san</span></div>
                          <div class="des fw-medium">"Empower, Excel, Elevate: <br> Reach New Heights Together!"</div>
                        </div>
                      </div>
                    </div>
                 </div>
             </div>
           </div>
           <div class="col-lg-6 px-5 py-3 d-flex justify-content-center align-items-center">
            <div class="card border-0 rounded-3">
              <div class="container card-body px-5 w-100">
                <div class="d-flex align-items-center gap-1 mb-4">
                  <div style="height: 100px; width: 100px;">
                    <img src="css/images/jkb.png" alt="error" style="height: 100%; width: 100%; object-fit: cover; border-radius: 50%;">
                  </div>
                </div>
                <div class="text-left mb-3 w-100">
                  <div class="h1 fs-1 fw-medium">Log In to your Account</div>
                  <div class="h1 fs-6 fw-light text-secondary">Welcome! Select user option to log in:</div>
                </div>
                  
                
    
                <form action=" " method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                <select class="form-select form-select-lg mb-3 text-secondary" id="option" aria-label="Default select example" name=job required>
                    <option disabled selected>Log In as:</option>
                    <option value="Admin">Admin</option>
                    <option value="College Committee">College Committee</option>
                <!-- Add more roles as needed -->
                  </select>
                  <hr class="my-4">

                  <!-- Name Input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" id="name" type="text" placeholder="username"  name="username"required data-sb-validations="required"/>
                    <label for="username" class="text-secondary">Username</label>
                    <div class="warning-text pt-2" id="nameWarning">Please enter your username.</div> <!-- Warning message -->
                  </div>
      
                  <!-- Password -->
                  <div class="form-floating mb-3">
                    <input class="form-control" id="user-password" type="password" placeholder="password" name="password" required data-sb-validations="required" />
                    <label for="password" class="text-secondary">Password</label>
                    <div class="warning-text pt-2" id="passwordWarning">Please enter your password.</div> <!-- Warning message -->
                  </div>
    
                  <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label fs-6 text-secondary" for="flexCheckDefault">
                          <div class="ut-text">Remember me</div>
                        </label>
                    </div>
                    <div>
                        <a href="#" class="ut-text text-decoration-none">Forgot Password?</a>
                    </div>
                  </div>
                  
                  <!-- Sign IN button -->
                  <div class="d-grid mt-4">
                    <button class="btn btn-primary btn-lg" id="login_Btn" type="submit" name="login_Btn" value="Login" onclick="validateForm()" >Sign In</button>
                  </div>
    
                  <div class="text-center mt-4 text-secondary">
                    <p class="ut-text">Don't have an account? <a href="#" class="text-decoration-none">Create an account</a></p>
                  </div>
                </form>
                <!-- End of contact form -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var nameInput = document.getElementById("name");
          var passwordInput = document.getElementById("user-password");
          var nameWarning = document.getElementById("nameWarning");
          var passwordWarning = document.getElementById("passwordWarning");
          var signInBtn = document.getElementById("signInBtn");

          // Function to show warning and tooltip for empty fields
          function showWarningAndTooltip(input, warning) {
            input.focus();
            input.setAttribute("title", "This field is required"); // Set tooltip title
            input.setAttribute("data-bs-toggle", "tooltip"); // Activate tooltip
            input.setAttribute("data-bs-placement", "bottom"); // Set tooltip placement
            warning.style.display = "block"; // Show warning
          }

          // Event listener for form submission
          signInBtn.addEventListener("click", function(event) {
            if (nameInput.value === "" && passwordInput.value === "") {
              showWarningAndTooltip(nameInput, nameWarning);
              event.preventDefault(); // Prevent form submission
            } else if (nameInput.value === "") {
              showWarningAndTooltip(nameInput, nameWarning);
              event.preventDefault(); // Prevent form submission
            } else if (passwordInput.value === "") {
              showWarningAndTooltip(passwordInput, passwordWarning);
              event.preventDefault(); // Prevent form submission
            }
          });

          // Event listeners to remove warning and tooltip when input is provided
          nameInput.addEventListener("input", function() {
            if (nameInput.value !== "") {
              nameWarning.style.display = "none"; // Hide warning
              nameInput.removeAttribute("title"); // Remove tooltip title
              nameInput.removeAttribute("data-bs-toggle"); // Deactivate tooltip
              nameInput.removeAttribute("data-bs-placement"); // Remove tooltip placement
            }
          });

          passwordInput.addEventListener("input", function() {
            if (passwordInput.value !== "") {
              passwordWarning.style.display = "none"; // Hide warning
              passwordInput.removeAttribute("title"); // Remove tooltip title
              passwordInput.removeAttribute("data-bs-toggle"); // Deactivate tooltip
              passwordInput.removeAttribute("data-bs-placement"); // Remove tooltip placement
            }
          });
        });
      </script>
  </body>
</html>