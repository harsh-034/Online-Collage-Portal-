<?php
include("header.php"); // Include your header
?>

<div class="wrapper row3">
    <div class="rounded">
        <main class="container clear">
            <h1>Contact Us</h1>
            <div class="row">
                <!-- Contact Form - Left Side -->
                <div class="col-md-8">
                    <form id="contactForm" action="https://formsubmit.co/arvindgupta3034@gmail.com" method="POST">
                        <input type="hidden" name="_next" value="">
                        <input type="hidden" name="_captcha" value="false">
                        <table width="100%" border="1">
                            <tr>
                                <td>Name <span style="color:red;">*</span></td>
                                <td><input type="text" name="name" id="name" required></td>
                            </tr>
                            <tr>
                                <td>Mail <span style="color:red;">*</span></td>
                                <td><input type="email" name="email" id="email" required></td>
                            </tr>
                           
                            <tr>
                                <td>Your Comment</td>
                                <td><textarea name="comment" id="comment"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit">Submit Form</button>
                                    <button type="reset">Reset Form</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <!-- Address - Right Side -->
                <div class="col-md-4">
                    <h2>Address</h2>
                    <p>MY COLLEGE,</p>
                    <p>Ujire - 205766.</p>
                    <p>Tel: 7208225873, </p>
                    <p>FAX: 236220</p>
                    <p>Email: <a href="harshgupt3034@gmail.com">harshgupta3034@gmail.com</a></p>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
document.getElementById("contactForm").onsubmit = function(event) {
    event.preventDefault(); // Prevent default form submission
    fetch("https://formsubmit.co/arvindgupta3034@gmail.com", {
        method: "POST",
        body: new FormData(event.target)
    }).then(response => {
        if (response.ok) {
            alert("Form submitted successfully!"); // Show success alert
            document.getElementById("contactForm").reset(); // Reset form fields
        } else {
            alert("Error submitting form. Please try again.");
        }
    }).catch(error => alert("Error: " + error));
};
</script>

<?php include("footer.php"); ?>
