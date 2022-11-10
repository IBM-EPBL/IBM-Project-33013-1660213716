<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style type="text/css">
      lable{
        font-family: Times, serif;
        font-size: 20px;
      }
      button{
        font-family: Times, serif;
      }
  </style>
</head>
<body>
    <div class="container-fluid">
<div style="background-image: url('images/db.jpg'); background-repeat: no-repeat;background-size: cover;">
<div class="row">
    <div class="col-md-3">
    </div>
<div class="col-md-6" style="opacity: 0.8;">
    <div class="card" style="border: none;">
        <div class="card-body" style="box-shadow: 0 26px 42px rgba(0, 0, 0, 0.1);;">
          <form action="/action_page.php" id="form">
            <div class="form-group">
                <h2 class="text-center" style="font-family: arial black; font-size: 40px; padding-left: 2%;padding-right: 2%;">Enter Your Details For Loan Prediction</h2><br><br>
                <lable>Gender</lable><br><br>
                <select id="Gender" class="form-control">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                </select><br>
                <lable>Married Status</lable><br><br>
                <select id="Married Status" class="form-control">
                    <option></option>
                    <option>Married</option>
                    <option>Unmarried</option>
                </select><br>
                <lable>Dependents</lable><br><br>
                <input type="text" id="Depandents" class="form-control"><br>
                <lable>Education</lable><br><br>
                <select id="Education" class="form-control">
                    <option></option>
                    <option>Graduate</option>
                    <option>Not Graduate</option>
                </select><br>
                <lable>Self employee</lable><br><br>
                <select id="Self Employee" class="form-control">
                    <option></option>
                    <option>Yes</option>
                    <option>No</option>
                </select><br>
                <lable>Applicant Income</lable><br><br>
                <input type="text" id="Applicant Income" class="form-control"><br>
                <lable>Co Applicant Income</lable><br><br>
                <input type="text" id="Co Applicant Income" class="form-control"><br>
                <lable>Loan Amount</lable><br><br>
                <input type="text" id="Loan Amount" class="form-control"><br>
                <lable>Loan Amount Term</lable><br><br>
                <input type="text" id="Loan Amount Term" class="form-control"><br>
                <lable>Credit History (yes means 1 and no means 0)</lable><br><br>
                <select id="Credit History" class="form-control">
                    <option></option>
                    <option>0</option>
                    <option>1</option>
                </select><br>
                <lable>Property Area</lable><br><br>
                <select id="Property Area" class="form-control">
                    <option></option>
                    <option>urban</option>
                    <option>Rural</option>
                    <option>semiurban</option>
                </select><br><br>
                <button class="btn-primary text-light form-control "><strong>Apply</strong></button>
            </div>
        </form>
    </div>
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
</body>
</html>

