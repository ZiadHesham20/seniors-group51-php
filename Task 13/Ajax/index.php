<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>

  </style>
</head>

<body>

  <div class="container mt-5">
    <h1 class="alert-info text-center mb-5 p-3">
      AJAX--PHP--JS & Bootstrap-5
    </h1>
    <div class="row">
      <form class="col-sm-5" id="myform">
        <h3 class="alert-warning text-center p-2">
          Add / Update Students
        </h3>
        <div>
          <input style="display:none;" value="" type="text" class="form-control" id="stuid">
          <label for="nameid" class="form-label">name</label>
          <input type="text" class="form-control" id="nameid">
        </div>
        <div>
          <label for="emailid" class="form-label">email</label>
          <input type="text" class="form-control" id="emailid">
        </div>
        <div>
          <label for="passwordid" class="form-label">password</label>
          <input type="text" class="form-control" id="passwordid">
        </div>
        <div class="mt-5">
          <button type="submit" class="btn btn-primary" id="btnadd">save</button>
        </div>
        <div id="msg"></div>
        
      </form>
      <div class="col-sm-7 text-center">
        <h3 class="alert-warning p-2">
          Show Student Infooo
        </h3>
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">PASSWORD</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody id="tbody">

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    document.querySelector('#btnadd').addEventListener('click',add_user);
    function add_user(e) {
      let stdIdinput = document.querySelector('#stuid').value;
      e.preventDefault();
      let name = document.querySelector('#nameid').value;
      let email = document.querySelector('#emailid').value;
      let password = document.querySelector('#passwordid').value;

      const nxhr = new XMLHttpRequest();
      nxhr.open('post','insert.php');
      
      nxhr.onload = function(){
        if (nxhr.status == 200) {
          console.log(nxhr.response);
          document.querySelector('#msg').innerHTML = `
          <div class="alert alert-info">${nxhr.response}</div>
          `
          document.querySelector('#myform').reset();
          showusers();
          stdIdinput = null
        }
        else{
          alert('please try again')
        }
      }
      let formData = {
        id: stdIdinput,
        name: name,
        email: email,
        password: password,
      }
      let FormTojason =JSON.stringify(formData);
      nxhr.send(FormTojason)
      
    }
    function showusers() {
      let tBody = document.querySelector('#tbody');

tBody.innerHTML = "";
      const nxhr = new XMLHttpRequest();
      nxhr.open('get','alldata.php');
      
      nxhr.onload = function(){
        if (nxhr.status == 200) {
          let myData =JSON.parse(nxhr.responseText);
        myData.forEach(element => {
          tBody.innerHTML += `
          <tr>
            <td> ${element.id} </td>
            <td> ${element.name} </td>
            <td> ${element.email} </td>
            <td> ${element.password} </td>
            <td>
              <button class='btn btn-success' data-flag='${element.id}' onclick='edt_std(this)' > edit</button> 
              <button class='btn btn-danger' data-flag='${element.id}' onclick='dlt_std(this)' > delete</button>
            </td>
          </tr>
              
          `
        });
        }
        else{
          console.log('error');
        }
      }
      nxhr.send();
    }
    function dlt_std(btn) {
      
      let studentId = btn.getAttribute('data-flag');
      
      const nxhr = new XMLHttpRequest();
      nxhr.open('post','delete.php');
      
      nxhr.onload = function(){
        if (nxhr.status == 200) {
          document.querySelector('#msg').innerHTML = `
          <div class="alert alert-info">${nxhr.response}</div>
          `;
          showusers();
        }
        else{
          console.log('error');
        }
        
      }
      let stdId = {
          id: studentId
        }
        let data =JSON.stringify(stdId);
        nxhr.send(data);
    }
    function edt_std(btn){
      let studentId = btn.getAttribute('data-flag');
      let stdIdinput = document.querySelector('#stuid');

      let name = document.querySelector('#nameid');
      let email = document.querySelector('#emailid');
      let password = document.querySelector('#passwordid');
      
      const nxhr = new XMLHttpRequest();
      nxhr.open('post','edit.php');
      
      nxhr.onload = function(){
        if (nxhr.status == 200) {
          let editdata = JSON.parse(nxhr.response)
          name.value =editdata.name
          email.value =editdata.email
          password.value =editdata.password
          
          stdIdinput.style.display = 'block';
          stdIdinput.value =editdata.id;
          stdIdinput.style.display = 'none';
          showusers();
        }
        else{
          console.log('error');
        }
        
      }
      let stdId = {
          id: studentId
        }
        let data =JSON.stringify(stdId);
        nxhr.send(data);
    }
    showusers();

  </script>


  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</body>

</html>