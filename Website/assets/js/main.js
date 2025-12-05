// Internship Card Swiper (drag / swipe only)
document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".internshipSwiper")) {
        const swiper = new Swiper(".internshipSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            grabCursor: true,
            loop: false,
            allowTouchMove: true, 
            autoplay: false,      
            breakpoints: {
                0: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    }
});

// ===== Login Form Validation and Redirect by Role =====
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();
            if (!loginForm.checkValidity()) {
                event.stopPropagation();
            } else {
                // Get selected role
                const role = document.getElementById("roleSelect").value;

                // Redirect based on role
                if (role === "student") {
                    window.location.href = "../student/dashboard.html";
                } else if (role === "employer") {
                    window.location.href = "../employer/profile.html";
                } else if (role === "admin") {
                    window.location.href = "../admin/dashboard.html";
                } else {
                    alert("Please select a role to continue.");
                }
            }
            loginForm.classList.add("was-validated");
        });
    }
});

// ===== Interview Scheduling Mock Functionality =====
document.addEventListener("DOMContentLoaded", function () {
    const scheduleForm = document.getElementById("scheduleForm");
    if (scheduleForm) {
        scheduleForm.addEventListener("submit", function (e) {
            e.preventDefault();
            if (!scheduleForm.checkValidity()) {
                e.stopPropagation();
            } else {
                const internship = document.getElementById("internshipSelect").value;
                const date = document.getElementById("interviewDate").value;
                const time = document.getElementById("interviewTime").value;

                // Set details in modal
                const details = document.getElementById("interviewDetails");
                details.textContent = `Internship: ${internship} | ${date} at ${time}`;

                // Show Bootstrap confirmation modal
                const confirmModal = new bootstrap.Modal(document.getElementById("confirmModal"));
                confirmModal.show();
            }
            scheduleForm.classList.add("was-validated");
        });
    }
});



// ===== Student Signup Validation =====
document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById("studentSignupForm");
    if (signupForm) {
        signupForm.addEventListener("submit", function (event) {
            const password = document.getElementById("studentPassword");
            const confirm = document.getElementById("studentConfirmPassword");

            if (!signupForm.checkValidity() || password.value !== confirm.value) {
                event.preventDefault();
                event.stopPropagation();
                if (password.value !== confirm.value) {
                    confirm.setCustomValidity("Passwords do not match");
                } else {
                    confirm.setCustomValidity("");
                }
            } else {
                event.preventDefault();
                alert("Student account created successfully! (Mock functionality)");
                window.location.href = "../../pages/auth/login.html"; 
            }

            signupForm.classList.add("was-validated");
        });
    }
});

// ===== Employer Signup Validation =====
document.addEventListener("DOMContentLoaded", function () {
  const employerForm = document.getElementById("employerSignupForm");
  if (employerForm) {
    employerForm.addEventListener("submit", function (event) {
      const password = document.getElementById("employerPassword");
      const confirm = document.getElementById("employerConfirmPassword");

      if (!employerForm.checkValidity() || password.value !== confirm.value) {
        event.preventDefault();
        event.stopPropagation();
        if (password.value !== confirm.value) {
          confirm.setCustomValidity("Passwords do not match");
        } else {
          confirm.setCustomValidity("");
        }
      } else {
        event.preventDefault();
        alert("Employer account created successfully! (Mock functionality)");
          window.location.href = "../../pages/auth/login.html"; 
      }

      employerForm.classList.add("was-validated");
    });
  }
});


// ===== Employer Profile Edit / Save Toggle =====
document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("editCompanyBtn");
    const saveBtn = document.getElementById("saveCompanyBtn");
    const cancelBtn = document.getElementById("cancelCompanyBtn");
    const form = document.getElementById("employerProfileForm");

    if (editBtn && form) {
        const inputs = form.querySelectorAll("input, textarea");

        editBtn.addEventListener("click", () => {
            inputs.forEach(i => i.disabled = false);
            editBtn.classList.add("d-none");
            saveBtn.classList.remove("d-none");
            cancelBtn.classList.remove("d-none");
        });

        cancelBtn.addEventListener("click", () => {
            inputs.forEach(i => i.disabled = true);
            saveBtn.classList.add("d-none");
            cancelBtn.classList.add("d-none");
            editBtn.classList.remove("d-none");
        });

        form.addEventListener("submit", e => {
            e.preventDefault();
            alert("Company profile updated successfully! (Mock functionality)");
            inputs.forEach(i => i.disabled = true);
            saveBtn.classList.add("d-none");
            cancelBtn.classList.add("d-none");
            editBtn.classList.remove("d-none");
        });
    }
});

// ===== Employer Profile Edit / Save Toggle =====
document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("editCompanyBtn");
    const saveBtn = document.getElementById("saveCompanyBtn");
    const cancelBtn = document.getElementById("cancelCompanyBtn");
    const form = document.getElementById("employerProfileForm");

    if (editBtn && form) {
        const inputs = form.querySelectorAll("input, textarea");

        editBtn.addEventListener("click", () => {
            inputs.forEach(i => i.disabled = false);
            editBtn.classList.add("d-none");
            saveBtn.classList.remove("d-none");
            cancelBtn.classList.remove("d-none");
        });

        cancelBtn.addEventListener("click", () => {
            inputs.forEach(i => i.disabled = true);
            saveBtn.classList.add("d-none");
            cancelBtn.classList.add("d-none");
            editBtn.classList.remove("d-none");
        });

        form.addEventListener("submit", e => {
            e.preventDefault();
            alert("Company profile updated successfully! (Mock functionality)");
            inputs.forEach(i => i.disabled = true);
            saveBtn.classList.add("d-none");
            cancelBtn.classList.add("d-none");
            editBtn.classList.remove("d-none");
        });
    }
});

// ===== Admin Dashboard Mock Actions =====
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-outline-danger").forEach(btn => {
        btn.addEventListener("click", () => alert("Record deleted (mock action)."));
    });
    document.querySelectorAll(".btn-outline-success").forEach(btn => {
        btn.addEventListener("click", () => alert("Schedule (mock action)."));
    });
});

// ===== Post Internship Form Validation =====
document.addEventListener("DOMContentLoaded", function () {
    const postForm = document.getElementById("postInternshipForm");
    if (postForm) {
        postForm.addEventListener("submit", function (event) {
            if (!postForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                alert("Internship posted successfully! (Mock functionality)");
                window.location.href = "profile.html"; 
            }
            postForm.classList.add("was-validated");
        });
    }
});

// ===== Student Dashboard Mock Buttons =====
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-outline-danger").forEach(btn => {
        btn.addEventListener("click", () => alert("Application withdrawn (mock action)."));
    });
    document.querySelectorAll(".btn-outline-secondary").forEach(btn => {
        btn.addEventListener("click", () => alert("Viewing application details (mock action)."));
    });
});

// ===== Student Apply for Internship Form =====
document.addEventListener("DOMContentLoaded", function () {
    const applyForm = document.getElementById("applyForm");
    if (applyForm) {
        applyForm.addEventListener("submit", function (event) {
            if (!applyForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                alert("Application submitted successfully! (Mock functionality)");
                window.location.href = "dashboard.html";
            }
            applyForm.classList.add("was-validated");
        });
    }
});

// ===== Admin Analytics Charts (Chart.js) =====
document.addEventListener("DOMContentLoaded", function () {

    if (document.getElementById("categoryChart")) {

        // Applicants by Category (Bar)
        new Chart(document.getElementById("categoryChart"), {
            type: 'bar',
            data: {
                labels: ['SEO & Analytics', 'Social Media', 'Content Strategy', 'Digital Marketing'],
                datasets: [{
                    label: 'Applicants',
                    data: [22, 25, 18, 30],
                    backgroundColor: '#009970',
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });


        // Applications Over Time (Line)
        new Chart(document.getElementById("trendChart"), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Applications',
                    data: [10, 14, 18, 22, 25, 20],
                    borderColor: '#009970',
                    backgroundColor: 'rgba(0,153,112,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: { responsive: true }
        });

        // Employers by Industry (Pie)
        new Chart(document.getElementById("employerChart"), {
            type: 'pie',
            data: {
                labels: ['Marketing', 'Social Media', 'Content Strategy', 'SEO & Analytics'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: ['#009970', '#00b383', '#00cc99', '#33d6ad']
                }]
            },
            options: { responsive: true }
        });

        // Application Status Breakdown (Doughnut)
        new Chart(document.getElementById("statusChart"), {
            type: 'doughnut',
            data: {
                labels: ['Accepted', 'Rejected', 'Interview Pending'],
                datasets: [{
                    data: [40, 30, 30],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107']
                }]
            },
            options: { responsive: true }
        });
    }
});

// ===== Admin Dashboard: Download Charts as PDF =====

document.addEventListener("DOMContentLoaded", function () {
    const downloadBtn = document.getElementById("downloadReportBtn");
    if (downloadBtn) {
        downloadBtn.addEventListener("click", function () {
            const charts = document.querySelectorAll("canvas");
            const pdfWindow = window.open("", "_blank");
            pdfWindow.document.write("<html><head><title>Analytics Report</title></head><body>");
            pdfWindow.document.write("<h2 style='color:#009970; text-align:center;'>Digital Strategy Portal - Analytics Report</h2>");
            charts.forEach((chart, index) => {
                const image = chart.toDataURL("image/png", 1.0);
                pdfWindow.document.write(`<div style='text-align:center; margin-bottom:30px;'>
            <h4>${chart.previousElementSibling?.textContent || "Chart " + (index + 1)}</h4>
            <img src='${image}' style='max-width:90%; border:1px solid #ccc; border-radius:8px;'/>
          </div>`);
            });
            pdfWindow.document.write("<p style='text-align:center; font-size:12px; color:gray;'>Generated on " + new Date().toLocaleString() + "</p>");
            pdfWindow.document.write("</body></html>");
            pdfWindow.document.close();
            pdfWindow.print();
        });
    }
});

// ===== Internship Listings: Filter & Sort =====
document.addEventListener("DOMContentLoaded", () => {
    const keywordInput = document.getElementById("keywordFilter");
    const categorySelect = document.getElementById("categoryFilter");
    const sortSelect = document.getElementById("sortFilter");
    const applyBtn = document.getElementById("applyFilters");
    const internshipCards = document.querySelectorAll(".internship-card");
    const container = document.querySelector(".listings-section .row.g-4");

    if (applyBtn && internshipCards.length > 0) {
        applyBtn.addEventListener("click", () => {
            const keyword = keywordInput.value.toLowerCase();
            const category = categorySelect.value.toLowerCase();
            const sortBy = sortSelect.value;

            // --- Filter cards ---
            internshipCards.forEach(card => {
                const title = card.querySelector(".card-title").textContent.toLowerCase();
                const text = card.querySelector(".card-text").textContent.toLowerCase();

                const matchKeyword = !keyword || title.includes(keyword) || text.includes(keyword);
                const matchCategory = !category || title.includes(category);

                if (matchKeyword && matchCategory) {
                    card.parentElement.style.display = "block";
                } else {
                    card.parentElement.style.display = "none";
                }
            });

            // --- Sort visible cards ---
            const visibleCards = Array.from(container.children).filter(
                c => c.style.display !== "none"
            );

            if (sortBy === "deadline") {
                visibleCards.sort((a, b) => {
                    const dateA = new Date(a.getAttribute("data-deadline"));
                    const dateB = new Date(b.getAttribute("data-deadline"));
                    return dateA - dateB; // earliest (nearest) first
                });
            } else if (sortBy === "latest") {
                // Reverse order to simulate "recently added"
                visibleCards.reverse();
            }

            // Re-append sorted visible cards
            visibleCards.forEach(card => container.appendChild(card));
        });
    }
});

// APPLY PAGE LOGIC
document.addEventListener("DOMContentLoaded", () => {
    const titleField = document.getElementById("internshipTitle");
    if (titleField) {
        // Read the "title" query parameter from URL
        const params = new URLSearchParams(window.location.search);
        const internshipTitle = params.get("title");

        if (internshipTitle) {
            // Update the page title and field
            document.title = `${internshipTitle} | Apply - Digital Strategy Portal`;
            titleField.value = internshipTitle;
        }
    }
});

// ===== Forgot Password Mock Logic =====
document.addEventListener("DOMContentLoaded", () => {
    const forgotForm = document.getElementById("forgotPasswordForm");
    const otpForm = document.getElementById("otpForm");
    const emailInput = document.getElementById("resetEmail");
    const otpInput = document.getElementById("otpCode");

    if (forgotForm) {
        forgotForm.addEventListener("submit", (e) => {
            e.preventDefault();
            if (!emailInput.checkValidity()) {
                e.stopPropagation();
                forgotForm.classList.add("was-validated");
                return;
            }

            const mockOTP = Math.floor(100000 + Math.random() * 900000);
            alert(`Mock OTP sent to ${emailInput.value}: ${mockOTP}`);

            forgotForm.classList.add("d-none");
            otpForm.classList.remove("d-none");
            otpInput.dataset.otp = mockOTP;
        });
    }

    if (otpForm) {
        otpForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const enteredOTP = otpInput.value.trim();
            const realOTP = otpInput.dataset.otp;

            if (enteredOTP === realOTP) {
                alert("✅ Password reset successful! (Mock functionality)");
                const modal = bootstrap.Modal.getInstance(document.getElementById("forgotPasswordModal"));
                modal.hide();
            } else {
                alert("❌ Incorrect OTP. Please try again.");
            }
        });
    }
});


