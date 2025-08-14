const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

const form = document.querySelector("form"),
  statusTXt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
  e.preventDefault();
  statusTXt.style.color = "white";
  statusTXt.style.display = "block";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "_message.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) { // if ajax response status 200 and rady atate is 4 means there is no error
      let response = xhr.response; //storing ajax response in variable
      if (response.indexOf("Email and Message field is required!") != -1 || response.indexOf("Enter a Valid Email Address") || response.indexOf("Sorry, Failed To send your Message!")) {
        statusTXt.style.color = "black";
      } else {
        form.reset();
        setTimeout(() => {
          statusTXt.style.display = "none";
        }, 3000);
      }
      statusTXt.innerText = response;
    }
  }
  let formData = new FormData(form); //creating new FormData obj. This is used to send form data
  xhr.send(formData); //sending form data 
}

function sendMail() {
  var params = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    phone: document.getElementById("phone").value,
    message: document.getElementById("message").value,
  };

  const serviceID = "service_mjznasf";
  const templateID = "template_bewpp5k";

  emailjs.send(serviceID, templateID, params).then(res => {
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("message").value = "";
    console.log(res);
    alert("Your Message sent Successfully");
  })
    .catch(err => console.log(err));
}

