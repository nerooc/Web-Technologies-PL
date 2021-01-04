function fn_save() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var city = document.getElementById("city").value;
  document.getElementById("data").style.display = "none";
  var json_data = "{\"fname\":\"" + fname + "\",\"lname\":\"" + lname + "\",\"city\":\"" + city + "\"}";
  var msg = "data=" + encodeURIComponent(json_data);
  var url = "index.php?sub=baza&action=saveRec";
  resp = function(response) {
      document.getElementById("response").innerHTML = response;
  }
  xmlhttpPost(url, msg, resp);
}

function fn_search() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var city = document.getElementById("city").value;
  document.getElementById("data").style.display = "none";
  var json_data = "{\"fname\":\"" + fname + "\",\"lname\":\"" + lname + "\",\"city\":\"" + city + "\"}";
  var msg = "data=" + encodeURIComponent(json_data);
  var url = "index.php?sub=baza&action=findRec";
  resp = function(response) {
      document.getElementById("response").innerHTML = response;
  }
  xmlhttpPost(url, msg, resp);
}

function fn_login() {
  var email = document.getElementById("email").value;
  var pass = document.getElementById("pass").value;
  document.getElementById("data").style.display = "none";
  var json_data = "{\"email\":\"" + email + "\",\"pass\":\"" + pass + "\"}";
  var msg = "data=" + encodeURIComponent(json_data);
  var url = "index.php?sub=access&action=login";
  resp = function(response) {
      document.getElementById("response").innerHTML = response  + `<br/> <a href="index.php" >Strona główna</a><br/>
      `;
  }
  xmlhttpPost(url, msg, resp);
}

function fn_register() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var pass = document.getElementById("pass").value;
  document.getElementById("data").style.display = "none";
  var json_data = "{\"fname\":\"" + fname + "\",\"lname\":\"" + lname + "\",\"email\":\"" + email + "\",\"pass\":\"" + pass + "\"}";
  var msg = "data=" + encodeURIComponent(json_data);
  var url = "index.php?sub=access&action=register";
  resp = function(response) {
      document.getElementById("response").innerHTML = response  + `<br/> <a href="index.php" >Strona główna</a><br/>
      `;
  }
  xmlhttpPost(url, msg, resp);
}

function xmlhttpPost(strURL, mess, respFunc) {
  var xmlHttpReq = false;
  var self = this;
  // Mozilla/Safari
  if (window.XMLHttpRequest) {
      self.xmlHttpReq = new XMLHttpRequest();
  }
  // IE
  else if (window.ActiveXObject) {
      self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
  }
  self.xmlHttpReq.onreadystatechange = function() {
      if (self.xmlHttpReq.readyState == 4) {
          // alert ( self.xmlHttpReq.status ) ;
          if (self.xmlHttpReq.status == 200) {
              // document.getElementById("data").innerHTML = http_request.responseText;
              respFunc(self.xmlHttpReq.responseText);
          } else if (self.xmlHttpReq.status == 401) {
              window.location.reload();
          }
      }
  }
  self.xmlHttpReq.open('POST', strURL);
  self.xmlHttpReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  self.xmlHttpReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; ");
  self.xmlHttpReq.setRequestHeader("Content-length", mess.length);
  self.xmlHttpReq.send(mess);
}