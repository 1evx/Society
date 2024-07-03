// Button To redirect page
function redirectTo(location){
    window.location.href = location;
}


// Button To Redirect To Signin Page- Logic For Sign In 
function redirectToSignIn() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.loggedIn) {
                // User is already logged in, redirect to another page
                window.alert('You login already. Please process to your user profile to log out if needed.');
            } else {
                // User is not logged in, redirect to signin.php
                window.location.href = 'signin.php';
            }
        }
    };
    xhr.open('POST', 'loginstatus.php', true);
    xhr.send();
}


// Button To Redirect To Signin Page- Logic For Sign In 
function redirectWhenLogin(location) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.loggedIn) {
                if (response.userType == 'user') {
                    window.location.href = location;
                } else if (response.userType == 'admin') {
                    window.location.href = 'adminprofile1.php';
                }
            } else {
                window.alert('You haven\'t logged in yet.');
                window.location.href = 'signin.php';
            }
        }
    }
    xhr.open('GET', 'loginstatus.php', true);
    xhr.send();
}



// Job Finer - Redirect To Job Post Section
function redirectToJobSection(){
    window.scrollTo({
        top: 1500,
        behavior: 'smooth'
    });
}


// Global Temp Variable
var searchConditions = {};


// Job Finder
// show country image when change option
function showCountry(str) {
    if (str == "") {
        document.getElementById("CountryImage").src = "image/malaysia.png";
        return;
    } else {
        const xhttp1 = new XMLHttpRequest();
        xhttp1.onload = function() {
            if (this.status === 200) {
                console.log('First response:', this.responseText);
                document.getElementById("CountryImage").src = this.responseText;

            } else {
                console.error("Error in first XMLHttpRequest. Status: " + this.status);
            }
        };

        xhttp1.open("GET", "getCountryImage.php?q=" + str);
        xhttp1.send();
    }
}


// Job Finder
// Search bar input collection
function updateSearchConditions() {
    var countryValue = document.getElementById("CountrySelect").value;
    var searchTextValue = document.getElementById("SearchSelect").value;
    var categoryValue = document.getElementById("CategorySelect").value;
    var sortValue = document.getElementById("SortCategory").value;

    searchConditions['country'] = countryValue;
    searchConditions['searchText'] = searchTextValue;
    searchConditions['category'] = categoryValue;
    searchConditions['sort'] = sortValue;
    
    executeQuery();
}


// Job Finder
// Get the value collection and process it to the jobminipost.php and display it to the iframeContainer1
function executeQuery() {
    var query = "SELECT * FROM jobpost " +
                "INNER JOIN country ON country.countryid = jobpost.countryid " +
                "INNER JOIN category ON category.categoryid = jobpost.categoryid " +
                "WHERE finishstatus = '1' AND adminid != ' '";

    if (searchConditions['country']) {
        query += " AND country.countryid = '" + encodeURIComponent(searchConditions['country'].toUpperCase()) + "'";
    }

    if (searchConditions['searchText']) {
        query += " AND (UPPER(jobpost.jobtitle) LIKE '%" + encodeURIComponent(searchConditions['searchText'].toUpperCase()) + "%' " +
                    "OR country.name LIKE '%" + encodeURIComponent(searchConditions['searchText'].toUpperCase()) + "%' " +
                    "OR jobpost.companyname LIKE '%" + encodeURIComponent(searchConditions['searchText'].toUpperCase()) + "%')";
    }

    if (searchConditions['category']) {
        query += " AND category.categoryid = '" + encodeURIComponent(searchConditions['category']) + "'";
    }

    if (searchConditions['sort']) {
        query += " ORDER BY " + encodeURIComponent(searchConditions['sort']);
    }

    if(query != ""){
        const xhttp = new XMLHttpRequest();

        xhttp.onload = function() {
            if (this.status === 200) {
                const iframeContainer = document.querySelector('.IframeContainer1');
                iframeContainer.innerHTML = this.responseText;
            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }
    

        xhttp.open("POST", "jobminipost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + encodeURIComponent(query));
    }
}


// Job Finder
// Show Job Main Post
function showJobMainPost(str){
    if (str !== "") {
        const xhttp = new XMLHttpRequest();

        xhttp.onload = function() {
            if (this.status === 200) {
                console.log(this.responseText);
                const iframeContainer = document.querySelector('.IframeContainer2');
                iframeContainer.innerHTML = this.responseText;

            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhttp.open("POST", "jobmainpost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + str);
    }
}


// Job Finder
// Display total job by counting the button which have class = '.JobPost'
function updateJobCount() {
    var buttons = document.querySelectorAll('.JobPost');
    var buttonCount = buttons.length;

    document.getElementById("JobNumber").innerHTML = buttonCount + " Jobs";
}


// Skill Sync
// Update Lecturer
function updateLecturer(str){
    var query = 
    "SELECT * FROM coursepost " +
    "INNER JOIN category ON category.categoryid = coursepost.categoryid " +
    "WHERE finishstatus = '1' AND adminid != ' ' AND coursepost.userid = '" + str + "'";

    if (str !== "") {
        const xhttp = new XMLHttpRequest();
        resetCategory();
        resetCourse();
        resetTop();

        xhttp.onload = function() {
            if (this.status === 200) {
                const iframeContainer = document.querySelector('.IframeContainer1');
                iframeContainer.innerHTML = this.responseText;

            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhttp.open("POST", "skillminipost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + query);
    }
}


// Skill Sync
// Reset Button
function updateTop(){
    var query = 
    "SELECT * FROM coursepost " +
    "INNER JOIN category ON category.categoryid = coursepost.categoryid " +
    "WHERE finishstatus = '1' AND adminid != ' '" +
    "ORDER BY courseid";

    const xhttp = new XMLHttpRequest();
    resetCategory();
    resetCourse();
    resetLecturer();
    resetTop();

    xhttp.onload = function() {
        if (this.status === 200) {
            const iframeContainer = document.querySelector('.IframeContainer1');
            iframeContainer.innerHTML = this.responseText;

        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "skillminipost.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + query);
}


// Skill Sync
// Update Course
function updateCourse(str){
    resetCategory();
    resetTop();
    resetLecturer();

    var query = 
    "SELECT * FROM coursepost " +
    "INNER JOIN category ON category.categoryid = coursepost.categoryid " +
    "WHERE finishstatus = '1' AND adminid != ' ' AND coursepost.courseid = '" + str + "'";

    if (str !== "") {
        const xhttp = new XMLHttpRequest();
        
        xhttp.onload = function() {
            if (this.status === 200) {
                const iframeContainer = document.querySelector('.IframeContainer1');
                iframeContainer.innerHTML = this.responseText;

            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhttp.open("POST", "skillminipost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + query);
    }
}


// Skill Sync
// Update Category
function updateCategory(str){
    console.log('Value:', str);

    var query = 
    "SELECT * FROM coursepost " +
    "INNER JOIN category ON category.categoryid = coursepost.categoryid " +
    "WHERE finishstatus = '1' AND adminid != ' ' AND category.name = '" + str + "'";

    if (str !== "") {
        const xhttp = new XMLHttpRequest();
        resetTop();
        resetCourse();
        resetLecturer();


        xhttp.onload = function() {
            if (this.status === 200) {
                const iframeContainer = document.querySelector('.IframeContainer1');
                iframeContainer.innerHTML = this.responseText;

            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhttp.open("POST", "skillminipost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + query);
    }
}


// Skill Sync
// Reset
function resetLecturer(){
    var lecturerForm = document.getElementById("Lecturer");
    
    if (lecturerForm && lecturerForm.tagName.toLowerCase() === 'form') {
        lecturerForm.reset();
    }
}


// Skill Sync
// Reset
function resetTop() {
    var topButton = document.getElementById("TopSelect");

    if (topButton && topButton.tagName.toLowerCase() === 'button') {
        topButton.value = '';
    }
}


// Skill Sync
// Reset
function resetCourse(){
    var courseForm = document.getElementById("Course");

    if (courseForm && courseForm.tagName.toLowerCase() === 'form') {
        courseForm.reset();
    }
}


// Skill Sync
// Reset
function resetCategory() {
    var resetButtons = document.getElementsByClassName("SkillCategory");

    for (var i = 0; i < resetButtons.length; i++) {
        resetButtons[i].classList.remove("clicked");
    }
}


// Event
// Search bar input collection
function updateSearchConditions2() {
    var countryValue = document.getElementById("CountrySelect").value;
    var searchTextValue = document.getElementById("SearchSelect").value;
    var categoryValue = document.getElementById("CategorySelect").value;

    searchConditions['country'] = countryValue;
    searchConditions['searchText'] = searchTextValue;
    searchConditions['category'] = categoryValue;
    
    executeQuery2();
}


// Event 
// Get the value collection and process it to the eventminipost.php and display it to the iframeContainer1
function executeQuery2() {
    var query = "SELECT * FROM eventpost " +
                "INNER JOIN country ON country.countryid = eventpost.countryid " +
                "WHERE finishstatus = '1' AND adminid != ' '";

    if (searchConditions['country']) {
        query += " AND country.countryid = '" + encodeURIComponent(searchConditions['country'].toUpperCase()) + "'";
    }
    
    if (searchConditions['searchText']) {
        query += " AND UPPER(eventpost.title) LIKE '%" + encodeURIComponent(searchConditions['searchText'].toUpperCase()) + "%' " +
                 "OR UPPER(country.name) LIKE '%" + encodeURIComponent(searchConditions['searchText'].toUpperCase()) + "%' ";
    }

    if (searchConditions['category']) {
        query += " ORDER BY " + encodeURIComponent(searchConditions['category']);
    }

    if(query != ""){
        const xhttp = new XMLHttpRequest();
        console.log(query);

        xhttp.onload = function() {
            if (this.status === 200) {
                const iframeContainer = document.querySelector('.IframeContainer1');
                iframeContainer.innerHTML = this.responseText;
            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }
    
        xhttp.open("POST", "eventminipost.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + encodeURIComponent(query));
    }
}


// Direct To Jost Review Post
function redirectToJobPost(id) {
    window.location.href = "jobreview.php?id=" + id;
}


// Direct To Skill Review Post
function redirectToSkillPost(id) {
    window.location.href = "coursereview.php?id=" + id;
}


// Direct To Event Review Post
function redirectToEventPost(id) {
    window.location.href = "eventreview.php?id=" + id;
}

// Direct To Resubmit Job Post
function jobConfirm(id){
    window.location.href = "jobconfirm.php?id=" + id;
}

// Direct To Resubmit Event Post
function eventConfirm(id){
    window.location.href = "eventconfirm.php?id=" + id;
}

// Direct To Resubmit Skill Post
function skillConfirm(id){
    window.location.href = "skillconfirm.php?id=" + id;
}


// Save Post Function
function toggleJobBookmark(icon) {
    const id = icon.getAttribute("data-id");

    if (icon.classList.contains("active")) {
        removeJobBookmark(id);
    } else {
        addJobBookmark(id);
    }
}


// Add Bookmark
function addJobBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.add("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    };
    xhttp.open("POST", "addJobMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Remove Bookmark
function removeJobBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.remove("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "removeJobMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Show Bookmark From Database
function showJobBookmark(jobid) {
    const icon = document.querySelector('[data-id="' + jobid + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result === 'success') {
                if (icon) {
                    icon.classList.add("active");
                }
            } else if (result === 'fail') {
                window.alert("You haven\'t logged in yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    };
    xhttp.open("POST", "getJobMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("jobid=" + encodeURIComponent(jobid));
}



// Save Course Post Function
function toggleCourseBookmark(icon) {
    const id = icon.getAttribute("data-id");

    if (icon.classList.contains("active")) {
        removeCourseBookmark(id);
    } else {
        addCourseBookmark(id);
    }
}


// Add Course Bookmark
function addCourseBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.add("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    };

    // Set the content type and send data in the request body
    xhttp.open("POST", "addCourseMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Remove Course Bookmark
function removeCourseBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.remove("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "removeCourseMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Save Course Post Function
function toggleEventBookmark(icon) {
    const id = icon.getAttribute("data-id");

    if (icon.classList.contains("active")) {
        removeEventBookmark(id);
    } else {
        addEventBookmark(id);
    }
}


// Add Course Bookmark
function addEventBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.add("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    };

    xhttp.open("POST", "addEventMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Remove Course Bookmark
function removeEventBookmark(id) {
    const icon = document.querySelector('[data-id="' + id + '"]');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            let text = this.responseText;
            let result = text.trim();
            if (result == 'sucess') {
                if (icon) {
                    icon.classList.remove("active");
                }
            } else if (result == 'fail') {
                window.alert("You Haven\'t Login Yet");
            } else {
                console.log(result);
            }
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "removeEventMark.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + encodeURIComponent(id));
}


// Post Lesson 
function timePassed(time) {
    let [hours, mins] = time.split(":");
    hours = hours/12 > 1 ? hours-12 : hours;
    console.log(hours);
    console.log(mins);
}


// About Us 
function printAbout() {
    var whiteContent = document.querySelector('.WhiteContent');

    if (whiteContent) {
        whiteContent.innerHTML = `
        <br><br>
        <h1 class="Title">About Society Connect</h1>
        <h2 class="SubTitle">Question and answer for Society Connect</h2>
        <img class="TitleImage" src="image/world.png">

        <!--Admin Section-->
        <br><br><br><img class="AdminImage" src="image/default_profile2.png"><p class="AdminTitle">Our Admin</p>
        <div class="AdminUnderline"></div>

        <div class="AdminContainer">
            <!--Admin PHP-->
            <img id="AdminProfile" src="image/default_profile2.png">
            <p id="AdminName">John</p>
            <img id="AdminProfile" src="image/default_profile2.png">
            <p id="AdminName">Falcon</p>
            <img id="AdminProfile" src="image/default_profile2.png">
            <p id="AdminName">Johnny</p>
            <img id="AdminProfile" src="image/default_profile2.png">
            <p id="AdminName">Miles</p>
        </div>

        <!--Moderator Section-->
        <img class="ModeratorImage" src="image/default_profile2.png">
        <p class="ModeratorTitle">Our Moderator</p>
        <div class="AdminUnderline"></div>
            <div class="ModeratorContainer">
                <!--Moderator PHP-->
                <img id="ModeratorProfile" src="image/default_profile2.png">
                <p id="ModeratorName">Desmond</p>
            </div>
        </div>
        `;
    }
}


// About Us 
function printFaq() {
    var whiteContent = document.querySelector('.WhiteContent');

    if (whiteContent) {
        whiteContent.innerHTML = `
        <div class="FaqTitle">FAQ</div>
        <img class="FaqImage" src="image/faq.png">
        <div class="GreyGround"></div>
            <div class="FaqContent">
                <section>
                    <h2>General Questions</h2>
                    <div class="faq-item">
                        <h3>What is the purpose of this website?</h3>
                        <p>This website is designed to serve as a platform for our society members to connect, share information, and collaborate on various activities and events.</p>
                    </div>
                    <div class="faq-item">
                        <h3>How can I register on the website?</h3>
                        <p>To register on the website, click on the "Register" link at the top of the page and fill out the registration form with your details.</p>
                    </div>
                    <!-- Add more FAQ items here -->
                </section>
                <section>
                    <h2>Account Related Questions</h2>
                    <div class="faq-item">
                        <h3>I forgot my password. What should I do?</h3>
                        <p>If you forgot your password, you can click on the "Forgot Password" link on the login page and follow the instructions to reset your password.</p>
                    </div>
                    <div class="faq-item">
                        <h3>Can I change my email address associated with my account?</h3>
                        <p>Yes, you can change your email address by accessing your account settings and updating the email field with your new email address.</p>
                    </div>
                    <!-- Add more FAQ items here -->
                </section>
            </div>
        </div>
        `;
    }
}


// About Us 
function printPolicy() {
    var whiteContent = document.querySelector('.WhiteContent');

    if (whiteContent) {
        whiteContent.innerHTML = `
        <div class="PolicyTitle">Private Policy</div>
        <img class="PolicyImage" src="image/policy.png">
        <div class="GreyGround"></div>
            <div class="PolicyContent">
                <section>
                    <h2>Introduction</h2>
                    <p>Your privacy is important to us. This privacy policy explains what personal data we collect from you and how we use it.</p>
                </section>
                <br>
                <section>
                    <h2>Information We Collect</h2>
                    <p>We may collect personal information such as your name, email address, and contact details when you register on our website or fill out a form. We may also collect non-personal information such as your IP address, browser type, and operating system.</p>
                </section>
                <br>
                <section>
                    <h2>How We Use Your Information</h2>
                    <p>We may use the information we collect from you to:</p>
                    <ul>
                        <li>Personalize your experience</li>
                        <li>Improve our website</li>
                        <li>Send periodic emails</li>
                    </ul>
                </section>
                <br>
                <section>
                    <h2>Sharing Your Information</h2>
                    <p>We do not sell, trade, or otherwise transfer your personal information to outside parties without your consent. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential.</p>

                </section>
                <br>
                <section>
                    <h2>Third Party Links</h2>
                    <p>Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites.</p>
                </section>
            </div>
        </div>
        `;
    }
}


// About Us 
function printTerm() {
    var whiteContent = document.querySelector('.WhiteContent');

    if (whiteContent) {
        whiteContent.innerHTML = `
        <div class="TermTitle">Term Of Use</div>
        <img class="TermImage" src="image/term.png">
        <div class="GreyGround"></div>
            <div class="TermContent">
                <section>
                    <h2>1. License to use website</h2>
                    <p>Unless otherwise stated, we or our licensors own the intellectual property rights in the website and material on the website. Subject to the license below, all these intellectual property rights are reserved.</p>
                </section>
                <br>
                <section>
                    <h2>2. Acceptable use</h2>
                    <p>You must not use our website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>
                </section>
                <br>
                <section>
                    <h2>3. Limitations of liability</h2>
                    <p>Nothing in these terms of use will: (a) limit or exclude our or your liability for death or personal injury resulting from negligence; (b) limit or exclude our or your liability for fraud or fraudulent misrepresentation; (c) limit any of our or your liabilities in any way that is not permitted under applicable law; or (d) exclude any of our or your liabilities that may not be excluded under applicable law.</p>
                </section>
                <br>
                <section>
                    <h2>4. Variation</h2>
                    <p>We may revise these terms of use from time to time. Revised terms of use will apply to the use of our website from the date of publication of the revised terms of use on our website.</p>
                </section>
                <br>
                <section>
                    <h2>5. Entire agreement</h2>
                    <p>These terms of use, together with our privacy policy, constitute the entire agreement between you and us in relation to your use of our website, and supersede all previous agreements in respect of your use of this website.</p>
                </section>
            </div>
        </div>
        `;
    }
}


// Admin - Print Database
function printDatabase(tablename){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            console.log(this.responseText);
            const iframeContainer = document.querySelector('.inside-border-1');
            iframeContainer.innerHTML = this.responseText;

        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "getDatabase.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + tablename);
}


// Admin - Delete Row
function deleteRow(tablename, primarycolumn, id) {
    var confirmDelete = confirm("Are you sure you want to delete this record?");
    if (confirmDelete) {

        var xhr = new XMLHttpRequest();

        xhr.onload = function() {
            if (this.status === 200) {
                window.alert(this.response);
                window.location.reload(); // Reload the page after successful deletion
            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhr.open("POST", "deleteRow.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("q1=" + encodeURIComponent(tablename) + "&q2=" + encodeURIComponent(primarycolumn) + "&q3=" + encodeURIComponent(id));
    }
}


// Admin - Print Approval From Database
function printApproval(tablename){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            console.log(this.responseText);
            const iframeContainer = document.querySelector('.inside-border-1');
            iframeContainer.innerHTML = this.responseText;

        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }
    xhttp.open("POST", "getApprovalPost.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + tablename);
}


// Admin - Approve Row
function approveRow(tablename, primarycolumn, id) {
    var confirmDelete = confirm("Click Yes To Continue");
    if (confirmDelete) {

        var xhr = new XMLHttpRequest();

        xhr.onload = function() {
            if (this.status === 200) {
                window.alert(this.response);
                window.location.reload(); // Reload the page after successful deletion
            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhr.open("POST", "approveRow.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("q1=" + encodeURIComponent(tablename) + "&q2=" + encodeURIComponent(primarycolumn) + "&q3=" + encodeURIComponent(id));
    }
}


// Admin - Reject Row
function rejectRow(tablename, primarycolumn, id) {
    var confirmDelete = confirm("Click Yes To Continue");
    if (confirmDelete) {

        var xhr = new XMLHttpRequest();

        xhr.onload = function() {
            if (this.status === 200) {
                window.alert(this.response);
                window.location.reload(); // Reload the page after successful deletion
            } else {
                console.error("Error in XMLHttpRequest. Status: " + this.status);
            }
        }

        xhr.open("POST", "rejectRow.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("q1=" + encodeURIComponent(tablename) + "&q2=" + encodeURIComponent(primarycolumn) + "&q3=" + encodeURIComponent(id));
    }
}


// Log Out
function logout() {
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
        if (this.status === 200) {
            window.alert('Log Out Sucess!');
            window.location.href = 'mainpage.php';
        } else {
            console.error("Error in XMLHttpRequest. Status: " + this.status);
        }
    }

    xhttp.open("POST", "logout.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}