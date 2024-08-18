<?php include("includes/head.php") ?>
<?php include("includes/header.php") ?>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/contact_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h1>admission</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">admission</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- ---------Admission form------------------ -->
<div class="form-container">
        <h1>ONLINE ADMISSION</h1>
        <form class="form">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Full name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFatherName">Father Name</label>
                    <input type="text" class="form-control" id="inputFatherName" placeholder="Enter Name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputMobile">Mobile No</label>
                    <input type="text" class="form-control" id="inputMobile" placeholder="Enter Number">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputMobile2">Alternate Mobile No</label>
                    <input type="text" class="form-control" id="inputMobile2" placeholder="Enter Number">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputdateofbirth">Date of Birth</label>
                    <input type="date" class="form-control" id="inputdateofbirth">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                    <select id="inputGender" class="form-control">
                        <option selected>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email id">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPancard">Pan Card No</label>
                    <input type="text" class="form-control" id="inputPancard" placeholder="Enter Pan Number">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPermanent">Permanent Address</label>
                    <input type="text" class="form-control" id="inputPermanent" placeholder="Enter Post Office">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Select state</option>
                        <option>Assam</option>
                        <option>Bihar</option>
                        <option>Chandigarh</option>
                        <option>Chhattisgarh</option>
                        <option>Dadar and Nagar Haveli</option>
                        <option>Daman and Diu</option>
                        <option>Delhi</option>
                        <option>Lakshadweep</option>
                        <option>Puducherry</option>
                        <option>Goa</option>
                        <option>Gujarat</option>
                        <option>Haryana</option>
                        <option>Himachal Pradesh</option>
                        <option>Jammu and Kashmir</option>
                        <option>Jharkhand</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Madhya Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Manipur</option>
                        <option>Meghalaya</option>
                        <option>Mizoram</option>
                        <option>Nagaland</option>
                        <option>Odisha</option>
                        <option>Punjab</option>
                        <option>Rajasthan</option>
                        <option>Sikkim</option>
                        <option>Tamil Nadu</option>
                        <option>Telangana</option>
                        <option>Tripura</option>
                        <option>Uttar Pradesh</option>
                        <option>Uttarakhand</option>
                        <option>West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputDistrict">District</label>
                    <input type="text" class="form-control" id="inputDistrict" placeholder="Enter District Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPincode">Pincode</label>
                    <input type="text" class="form-control" id="inputPincode" placeholder="Enter Pincode">
                </div>
            </div>
            <div class="form-group">
                <label for="inputQualification">Highest Qualification</label>
                <select id="inputQualification" class="form-control">
                    <option selected>Select Highest Qualification</option>
                    <option>10th</option>
                    <option>12th</option>
                    <option>Graduation</option>
                </select>
            </div>
            <p>UPLOAD DOCUMENTS</p>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputXdocument">10th</label>
                    <input type="file" class="form-control" id="inputXdocument">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputXIIdocument">12th</label>
                    <input type="file" class="form-control" id="inputXIIdocument">

                </div>
                <div class="form-group col-md-6">
                    <label for="inputGraduation">Graduation</label>
                    <input type="file" class="form-control" id="inputGraduation">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAadhar">Aadhar Card</label>
                    <input type="file" class="form-control" id="inputAadhar">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="inputCourse">Courses</label>
                <select id="inputCourse" class="form-control">
                    <option selected>Select Your Course</option>
                    <option>Hotel Management</option>
                    <option>Cabin Crew</option>
                    <option>Diploma in Air Hostess</option>
                    <option>Diploma in Airport Management</option>
                    <option>Diploma in Hotel Management</option>
                </select>
               </div>
               <div class="form-group col-md-6">
                <label for="inputFee">Fee Method</label>
                <select id="inputFee" class="form-control">
                    <option selected>Select</option>
                    <option>Installment</option>
                    <option>One Time</option>
                </select>
            </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        I have read and agree the <span>terms & conditions*</span>
                    </label>
                </div>
            </div>
           <center> <button type="submit" class="btn btn-primary">Submit</button></center>
        </form>
   </div>



<!-- ----------------footer------------------- -->
<?php include("includes/footer.php") ?>