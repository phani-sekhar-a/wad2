<?php
    require_once __DIR__ . '/../../api/bootstrap.php';
    require_once __DIR__ . '/../../api/config.php';
    $successMessage = flash('success');
    $errorMessage = flash('error');
?>
<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Digital STratgey Internship Portal"</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="../index.html">
                <img src="../../assets/img/Navbar_Logo_2.png" alt="Digital Strategy Portal Logo" class="navbar-logo">
            </a>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../pages/listings/listings.html">Internships</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../blogs.html">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../help.html">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../auth/login.php" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- End Navbar -->
    <!-- Signup Section -->
    <section class="signup-section d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="card shadow-sm p-4 mx-auto" style="max-width:480px; border-radius:12px;">
                <h3 class="fw-bold mb-3" style="color:#009970;">Student Signup</h3>
                <?php if ($successMessage): ?>
                    <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php endif; ?>
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage); ?></div>
                <?php endif; ?>

                <form id="studentSignupForm" action="../../api/auth.php" method="POST" novalidate>
                    <!-- Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="studentName" name="name" placeholder="Full Name" required>
                        <label for="studentName">Full Name</label>
                        <div class="invalid-feedback">Please enter your full name.</div>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="studentEmail" name="email" placeholder="name@example.com" required>
                        <label for="studentEmail">Email address</label>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="studentPassword" name="password" placeholder="Password" required>
                        <label for="studentPassword">Password</label>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="studentConfirmPassword" placeholder="Confirm Password" required>
                        <label for="studentConfirmPassword">Confirm Password</label>
                        <div class="invalid-feedback">Passwords must match.</div>
                    </div>

                    <!-- Course -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="studentCourse" name="course" placeholder="Course or Major" required>
                        <label for="studentCourse">Course / Major</label>
                        <div class="invalid-feedback">Please enter your course.</div>
                    </div>

                    <!-- Skills / Interests -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Your skills and interests" id="studentSkills" name="skills" style="height:100px" required></textarea>
                        <label for="studentSkills">Skills / Interests</label>
                        <div class="invalid-feedback">Please enter your skills or interests.</div>
                    </div>

                    <!-- Submit -->
                    <input type="hidden" name="action" value="register">
                    <input type="hidden" name="role" value="student">
                    <button class="btn btn-success w-100 py-2 mt-2" type="submit">Create Account</button>

                    <!-- Links -->
                    <p class="small mt-3 mb-0">
                        Already have an account?
                        <a href="login.php" class="text-success text-decoration-none">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer mt-5 py-4">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Brand + Description -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold" style="color: #009970;">Digital Strategy Portal</h5>
                    <p class="small text-muted">
                        Explore, apply, and manage digital strategy internships with ease.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6 class="fw-bold" style="color: #009970;">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Home</a></li>
                        <li><a href="#" class="footer-link">Internships</a></li>
                        <li><a href="#" class="footer-link">About</a></li>
                        <li><a href="#" class="footer-link">Help</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6 class="fw-bold" style="color: #009970;">Contact</h6>
                    <ul class="list-unstyled small">
                        <li><i class="bi bi-envelope"></i> info@digitalstrategy.com</li>
                        <li><i class="bi bi-telephone"></i> +44 1234 567 890</li>
                        <li><i class="bi bi-geo-alt"></i> London, UK</li>
                    </ul>
                </div>

                <!-- Social Icons -->
                <div class="col-md-2 text-md-end text-center">
                    <h6 class="fw-bold" style="color: #009970;">Follow Us</h6>
                    <a href="#" class="footer-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <hr class="mt-4 mb-2">
            <div class="text-center small text-muted">
                © 2025 Digital Strategy Internship Portal. All rights reserved.
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    <script>
        const signupForm = document.getElementById('studentSignupForm');
        const signupAlert = document.getElementById('signupAlert');

        signupForm.addEventListener('submit', (event) => {
            if (!signupForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                signupForm.classList.add('was-validated');
                return;
            }

            signupAlert.classList.add('d-none');

            const password = document.getElementById('studentPassword').value;
            const confirmPassword = document.getElementById('studentConfirmPassword').value;
            if (password !== confirmPassword) {
                event.preventDefault();
                event.stopPropagation();
                signupAlert.textContent = 'Passwords must match';
                signupAlert.classList.remove('d-none');
                return;
            }

            signupForm.classList.add('was-validated');
        });
    </script>

</body>
</html>
