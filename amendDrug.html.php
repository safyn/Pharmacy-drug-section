<!--
Name : amendDrug.html.php
Purpose : Display amend/view Drug form and allow modification of the drug table records. 
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<!DOCTYPE HTML>
<!--HTML declaration-->
<html lang="en-UK">
<!--Start of HTML tag-->
<?php // Start of php tag
session_start(); //start the session

// if a session is set for user, don't do anything
if (isset($_SESSION['user'])) {
} else {
    // if sesion is not set, redirect user to the login page
    header("Location: https://c2ppharmacy.candept.com/index.html.php");
}
?>
<!-- End of php tag-->

<head>
    <!-- Start of HEAD tag -->

    <!-- End of php tag-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link CSS, JavaScript and PHP files to the webside-->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/button.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/profile.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/section.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/footer.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/newSubMenu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/drugsForm.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/table.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/connection.php" media="all">
    <script src="/javaScript/logIn.js"></script>
    <link rel="icon" href="_Images/Logo.ico">
    <meta name="" content="Pharmacy System">
    <title>Amend/View Drug</title>


</head><!-- End of HEAD tag-->

<body>
    <!-- Start of Body tag -->

    <img src="/logo.png" id="logo" height="100" width="100"> <!-- insert Logo and initialise its size on the webside -->
    <!-- Display the user of the current session -->
    <div id="profile">
        <!-- Start of profile div -->

        <div id="text">
            <p id="Name"><?php echo $_SESSION['user']; ?></p>
        </div>

        <div id="image">
            <img src="/logo.png"> <!-- Display logo inside of menu -->
        </div>

        <div id="menu">
            <!-- Start Menu div -->
            <!-- Redirect to the webside when "Settings" button is clicked. -->
            <a href="/settings.html.php" target="_self"><button>Settings</button></a><br />
            <!-- link form with close.php file -->
            <form action="close.php" method="POST">
                <!-- Start of Form -->
                <!-- On button click send data to the close.php that closes session and connection -->
                <button type="submit" id="logout" value="logout">LogOut</button>
            </form><!-- End of Form -->
        </div> <!-- End of Menu div -->
    </div><!-- End of profile div -->

    <nav>
        <!-- Start of NAV - block of navigation links -->
        <ul id="mainMenu">
            <!-- Start of main menu list -->
            <li><a href="/main.html.php"><button type="button" id="mainMenu">Main Menu</button></a></li>
            <li><a href="/counterSales.html.php"><button type="button" id="mainMenu"> Sales</button></a></li>
            <li><a href="/Drug Krzysztof Bas c00239768/amendDrug.html.php"><button type="button" id="mainMenu"> Drugs</button></a></li>
            <li><a href="/stockControl.html.php"><button type="button" id="mainMenu">Stock </button></a></li>
            <li><a href="/supplierAccounts.html.php"><button type="button" id="mainMenu">Suppliers </button></a></li>
            <li><a href="/fileMaintenance.html.php"><button type="button" id="mainMenu">Maintenance</button></a></li>
            <li><a href="/reports.html.php"><button type="button" id="mainMenu">Reports</button></a></li>
        </ul>
        <!--End of main menu list-->
    </nav><!-- End of NAV -->

    <div id="content">
        <!-- Start of content div -->
        <section>
            <!--Main Content here This is Where the indivual work starts-->
            <h1>Main Menu</h1> <!-- Main menu header -->

            <div class="grid">

                <ul id="subMenu">
                    <!-- Start of subMenu list  -->
                    <!-- Add Drug button redirects to the "Add Drug" form -->
                    <li><a href="/Drug Krzysztof Bas c00239768/addDrug.html.php"><button type="button" id="sideMenu">Add Drug</button></a></li>
                    <!-- Amend/View Drug button redirects to the "Amend/View Drug" form which allows viewing and drug modification-->
                    <li><a href="/Drug Krzysztof Bas c00239768/amendDrug.html.php"><button type="button" id="sideMenu">Amend/View Drug</button></a></li>
                    <!-- Delete Drug button redirects to the "Delete Drug" form which allows deletion of the drug -->
                    <li><a href="/Drug Krzysztof Bas c00239768/deleteDrug.html.php"><button type="button" id="sideMenu">Delete Drug</button></a></li>
                    <!-- Dispense drug to a customer  -->
                    <li><a href="/Drug Krzysztof Bas c00239768/dispenseDrugs.html.php"><button type="button" id="sideMenu">Dispense Drugs</button></a></li>
                </ul>
                <!--sub Menu Bar-->


                <div id="database">
                    <!--Start of database div-->
                    <div id="line">
                        <!-- Start of line div it displays drug listbox and amend/viev button-->
                        <p><br><br>

                            <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
                            <?php include 'php/drugListbox.php' ?>
                            <!--Drug select box -->
                            <script src="javaScript/amendDrug.js"></script> <!-- include file with necessary js functions-->
                        </p>
                    </div>


                    <form action="php/updateDrug.php" id="formbut" onsubmit="confirmCheck(event)" method="post">
                        <!-- Start of Amend/View Drug form on submit "confirmCheck" checks if fields are enablednext data is send to "updateDrug.php"-->


                        <div class="row">
                            <!-- Start of row div used to display form as one row -->
                            <div class="column">
                                <!-- Start of column div used to display fields in the same column -->
                                <!-- FIRST COLUMN -->
                                <p>
                                    <!-- Start of drugID paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <label for="drugID">Drug ID:</label><!-- drugID label -->
                                        <input type="number" name="drugID" id="drugID" readOnly>
                                        <!--drugID field, displays DrugID, cannot be modified -->
                                    </div>
                                    <p></p><!-- End of drugID paragraph -->

                                    <!-- Start of Brand Name paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="Name">Brand Name:</label><!-- Brand Name label -->
                                            <!--Brand Name field, displays Drug Brand Name, allows letters -->
                                            <input type="text" name="brandName" id="brandName" pattern="[a-zA-Z. ]+" placeholder="e.g Paracetamol" disabled>
                                        </p>
                                    </div>
                                    <!-- End of Brand Name paragraph -->

                                    <!-- Start of Generic Name paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="Address">Generic Name:</label><!-- Generic Name label -->
                                            <!--Generic Name field, displays Drug Generic Name, allows letters  -->
                                            <input type="text" name="genericName" id="genericName" pattern="[a-zA-Z. ]+" placeholder="e.g Panadol" disabled>
                                        </p>
                                    </div>
                                    <!-- End of Generic Name paragraph -->

                                    <!-- Start of "Form of Drug" paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="form">Form of Drug:</label><!-- Form of Drug label -->
                                            <select name="Form" id="form" disabled>
                                                <!-- Select tag used to display predefined option values -->
                                                <option value="" disabled selected>e.g Tablet</option><!-- Disabled, selected option with empty value used as a placeholder -->
                                                <!-- Selectable options -->
                                                <option value="Tablet">Tablet</option>
                                                <option value="Capsule">Capsule</option>
                                                <option value="Lotion">Lotion</option>
                                                <option value="Cream">Cream</option>
                                                <option value="Ointment">Ointment</option>
                                                <option value="Syroup">Syroup</option>
                                                <option value="Herbal">Herbal</option>
                                            </select><!-- End of form select tag -->
                                        </p>
                                    </div>
                                    <!-- End of "Form of Drug" paragraph -->

                                    <!-- Start of "Strength" paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="strength">Strength:</label><!-- label for Strength select tag -->
                                            <select name="strength_" id="strength" disabled>
                                                <!-- Select tag used to display predefined option values -->
                                                <option value="" disabled selected>e.g 500mg</option><!-- Disabled, selected option with empty value used as a placeholder -->
                                                <!-- Selectable options -->
                                                <option value="100mg">100mg</option>
                                                <option value="250mg">250mg</option>
                                                <option value="500mg">500mg</option>
                                                <option value="1000mg">1000mg</option>
                                                <option value="2000mg">2000mg</option>
                                            </select><!-- End of Strength select tag -->
                                        </p>
                                    </div>
                                    <!-- End of "Strength" paragraph -->

                                    <!-- Start of "Instructions for use" paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="instructions">Instructions for use:</label><!-- label for instructions textarea -->
                                            <!--Textarea that stores Instructions for use of Drug -->
                                            <textarea name="instructions" id="instructions" rows="7" cols="5" placeholder="e.g 500mg every 6 hours" disabled></textarea>
                                        </p>
                                    </div>
                                    <!-- Start of "Instructions for use" paragraph -->

                            </div>
                            <!--END OF FIRST COLUMN -->


                            <div class="column">
                                <!-- SECOND COLUMN -->

                                <!-- Start of "supplierName" paragraph -->
                                <div class="inputbox">
                                    <!--inputbox div used to style form fields -->
                                    <p>
                                        <label for="supplierName">Supplier Name:</label><!-- label for supplier ID -->
                                        <!-- input stores supplierID-->
                                        <?php include 'php/supplierName.php' ?>
                                    </p>
                                </div>
                                <!-- End of "supplierID" paragraph -->

                                <!-- Start of "Cost Price" paragraph -->
                                <div class="inputbox">
                                    <!--inputbox div used to style form fields -->
                                    <p>
                                        <label for="costPrice">Cost Price:</label> <!-- label for costPrice input tag -->
                                        <!-- input for costPrice of type "number" with 2 decimal places -->
                                        <input type="number" step=0.01 name="costPrice" id="costPrice" pattern="[0-9]+([.][0-9])" placeholder="e.g 10.99" min="0" disabled>
                                    </p>
                                </div>


                                <!-- Start of "Retail Price" paragraph -->
                                <div class="inputbox">
                                    <!--inputbox div used to style form fields -->
                                    <p>
                                        <label for="retailPrice">Retail Price:</label><!-- label for retailPrice input tag -->
                                        <!-- input tag for retailPrice of type "number" with 2 decimal places -->
                                        <input type="number" step=0.01 name="retailPrice" id="retailPrice" pattern="[0-9]+([.][0-9])" placeholder="e.g 4.99 " min="0" disabled>
                                    </p>
                                </div>
                                <!-- End of "Retail Price" paragraph -->

                                <p>
                                    <!-- Start of "reorderLevel" paragraph -->
                                    <div class="inputbox">
                                        <!--inputbox div used to style form fields -->
                                        <p>
                                            <label for="reorderLevel">Reorder Level:</label><!-- label for reorderLevel input tag -->
                                            <input type="number" name="reorderLevel" id="reorderLevel" placeholder="e.g 100" min="0" disabled><!-- input for reorderLevel of type "number" -->
                                        </p>
                                    </div>
                                    <!-- End of "reorderLevel" paragraph -->

                                    <p>
                                        <!-- Start of "reorderQuantity" paragraph -->
                                        <div class="inputbox">
                                            <!--inputbox div used to style form fields -->
                                            <p>
                                                <label for="reorderQuantity">Reorder Quantity:</label><!-- label for reorderQuantity input tag -->
                                                <!-- input tag for Reorder Quantity of Drug, of type "number" -->
                                                <input type="number" name="reorderQuantity" id="reorderQuantity" placeholder="e.g 50" min="0" disabled>
                                            </p>
                                        </div>
                                        <!-- End of "reorderQuantity" paragraph -->


                                        <div class="inputbox">
                                            <!--inputbox div used to style form fields -->
                                            <p>
                                                <!-- Start of "Side Effects" paragraph -->
                                                <label for="sideEffects">Side Effects:</label><!-- label for sideEffects textarea  -->
                                                <!--Textarea that stores side effects of a Drug -->
                                                <textarea name="sideEffects" id="sideEffects" rows="7" cols="5" placeholder="e.g low fever with nausea, stomach pain, and loss of appetite" disabled></textarea>
                                            </p>
                                        </div>
                                        <!-- End of "Side Effects" paragraph -->

                            </div>
                            <!--END OF SECOND COLUMN -->
                        </div>
                        <!--End of Row div -->
                    </form>
                    <!--End of Amend/View Drug form -->
                </div>
                <!--End of database div-->
                <div></div>
                <!--Empty div to push the buttons bellow-->


                <div id="actions">
                    <!-- div for form action buttons -->
                    <!--submits the form -->
                    <button type="submit" form="dispenseForm" onclick="sessionStorage.clear();" id="actions">Process
                        Prescription</button>
                    <!--Clears the form -->
                    <button type="reset" form="dispenseForm" id="actions">Clear Form</button>

                </div>
                <!--End of form action buttons div -->

            </div>
            <!--End of grid div-->
        </section>
        <!--End of section-->
    </div>
    <!--End of content-->


    <footer>
        <!--Start of footer-->
        <!--Paragraph with Names and student numbers of Developers-->
        <p>Website made by:<br /><br />
            <strong>Przemyslaw Twardowski: C00224251</strong><br />
            <strong>Michal Matusiewicz: C00231687</strong><br />
            <strong>Krzysztof Bas: C00238768</strong><br />
            <strong>Robert Binkowski: C00237917</strong><br /><br />
            <script>
                document.write(document.title)
            </script> 2019-
            <script>
                document.write(new Date().getFullYear())
            </script>. @ rights reserved
        </p>
    </footer>
    <!--End of footer-->
</body>
<!--End of body tag-->

</html>
<!--End of html tag-->