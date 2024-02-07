$(document).ready(() => {
  let images = [
      {
          id: 1,
          url: "./images/image-1.png",
          prevPos: { x: 105, y: 295 },
          currentPos: { x: 230, y: 110 },
          nextPos: { x: 540, y: 217 },
          description : 'Lorem ipsum dolor sit amet,consectetur adipiscing elit.Hendrerit purus orci nisl sit. Sed adipiscing.',
          active : false
      },
      {
          id: 2,
          url: "./images/image-2.png",
          prevPos: { x: 230, y: 110 },
          currentPos: { x: 540, y: 217 },
          nextPos: { x: 873, y: 110 },
          description: 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself.',
          active : true
      },
      {
          id: 3,
          url: "./images/image-3.png",
          prevPos: { x: 540, y: 217 },
          currentPos: { x: 873, y: 110 },
          nextPos: { x: 1025, y: 295 },
          description : 'purus orci nisl sit. Sed adipiscing consectetur adipiscing elit. Hendrerit',
          active : false
      },
      {
          id: 4,
          url: "./images/image-4.png",
          prevPos: { x: 873, y: 110 },
          currentPos: { x: 1025, y: 295 },
          nextPos: { x: 873, y: 475 },
          description : 'inventore incidunt culpa fugiat ullam aut? Neque dolorum consequuntur officiis dolor',
          active : false
      },
      {
          id: 5,
          url: "./images/image-5.png",
          prevPos: { x: 1025, y: 295 },
          currentPos: { x: 873, y: 475 }, 
          nextPos: { x: 230, y: 475 },
          description : 'Sem mimauris, faucibus nulla eros vestibulum a. Nulla adipiscing.',
          active : false
      },
      {
          id: 6,
          url: "./images/image-6.png",
          prevPos: { x: 873, y: 475 },
          currentPos: { x: 230, y: 475 },
          nextPos: { x: 105, y: 295 },
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet',
          active : false
      },
      {
          id: 7,
          url: "./images/image-6.png",
          prevPos: { x: 230, y: 475 },
          currentPos: { x: 105, y: 295 },
          nextPos: { x: 230, y: 110 },
          description: 'Hendrerit purus orci nisl sit. Sed adipiscing',
          active : false
      },
  ];

  let imageDivs = images.map((img) => {
      return `<div><img src='${img.url}' id="img-${img.id}" class="img"/></div> `;
  });

  $("#testimonials").append(imageDivs);
  
  // for the texts
 

  images.forEach((img) => {
      if(img.active){
          $('#testimonials-text .texts').text(img.description);
      }
      gsap.fromTo($(`#img-${img.id}`), { x: 0, y: 0 }, { x: img.currentPos.x, y: img.currentPos.y });
  });



  $("#previous").click(() => {

      let testimony = document.getElementsByClassName("texts");
     
      // for (texts of testimony) {
      //     texts.classList.add("active");
      //   }

      let imageObjCopy = [...images];

      let activeIndex = images.findIndex(img => img.active);
      images.forEach(img => img.active = false)
      activeIndex  < images.length - 6 ? images[6].active = true : images[activeIndex - 1].active = true;

      images.forEach((img, i) => {
          images[i] = {
              ...img,
              nextPos: img.currentPos,
              currentPos: img.prevPos,
              prevPos: i - 1 < 0  ? imageObjCopy[images.length - 1].prevPos : imageObjCopy[i - 1].prevPos,
          };

          
      if(img.active){
              $('#testimonials-text .texts').text(img.description);
          }

      });
      images.forEach((img) => {
          gsap.fromTo($(`#img-${img.id}`), 
          { x: img.currentPos.x, y: img.currentPos.y },
          { x: img.prevPos.x, y: img.prevPos.y });
      });
      
     
  });
  

  $("#next").click(() => {

      let testimony = document.getElementsByClassName("texts");
      for (texts of testimony) {
          texts.classList.remove("active");
        }
         
      let imageObjCopy = [...images];

      let activeIndex = images.findIndex(img => img.active);
      
      images.forEach(img => img.active = false)

      activeIndex + 1 > images.length - 1 ? images[0].active = true : images[activeIndex + 1].active = true;

      images.forEach((img, i) => {
          images[i] = {
              ...img,
              prevPos: img.currentPos,
              currentPos: img.nextPos,
              nextPos: i + 1 > images.length - 1 ? imageObjCopy[0].nextPos : imageObjCopy[i + 1].nextPos,
          };
          if(img.active){
              $('#testimonials-text .texts').text(img.description);
          }
        
      });

      images.forEach((img) => {
          gsap.fromTo($(`#img-${img.id}`), 
          { x: img.currentPos.x, y: img.currentPos.y },
          { x: img.nextPos.x, y: img.nextPos.y });
      });
  });
 
//    window.addEventListener('resize', ()=>{
//     const size = document.getElementsByClassName('body');
//     size.style.height =  window.innerHeight;
//     size.style.width =  window.innerWidth;



//     let heightt = window.innerHeight;
//     let widthh =  window.innerWidth;
//     console.log(heightt, widthh);
//    })
 let height = window.innerHeight;
  let width =  window.innerWidth;
  console.log(height, width);

  const size = document.getElementsByTagName('header');
  size[0].style.height =  window.innerHeight;
  size[0].style.width =  window.innerWidth;
});

//form validation for contact Us
const error = document.getElementById("error");
const form = document.getElementById("form");
const Fullname = document.getElementById("name");
const Phone = document.getElementById("phoneNumber");
const email = document.getElementById("email");
const Individual = document.getElementsByClassName("individuals-section");
var validRegex =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var regName = /^[ a-zA-Z\-\’]+$/;
// var allowedExtensions = /(\.jpg|\.docx|\.doc|\.pdf)$/i;

form.addEventListener("submit", (e) => {
  let messages = [];

  if (!Fullname.value.match(regName) && Fullname.value !== "") {
    messages.push("please enter a valid name!");
  }
  if (isNaN(Phone.value)) {
    messages.push("please enter a valid phone Number!");
  }
  if (!email.value.match(validRegex) && email.value !== "") {
    messages.push("please enter a valid email Adress!");
  }
  if (messages.length > 0) {
    e.preventDefault();
    error.innerHTML = messages.join(" <br>  ");
  }
});

//modal Individual
const modal = document.getElementById("modal");
const Fname = document.getElementById("Fname");
const LName = document.getElementById("Lname");
const phoneM = document.getElementById("phoneN");
const emailM = document.getElementById("emailM");
const fileInput = document.getElementById("upload");
const errorC = document.getElementById("errorC");
const companyName = document.getElementById("companyName");
const companyPhone = document.getElementById("companyPhone");
const companyEmail = document.getElementById("companyEmail");
const fileInput1 = document.getElementById("fileInput1");
const fileInput2 = document.getElementById("fileInput2");
const fileInput3 = document.getElementById("fileInput3");
const fileInput4 = document.getElementById("fileInput4");
const errFile1 = document.getElementById("errFile1");
const errFile2 = document.getElementById("errFile2");
const errFile3 = document.getElementById("errFile3");
const errFile4 = document.getElementById("errFile4");
const errorCname = document.getElementById("errorCname");
modal.addEventListener("submit", (e) => {
  let messages = [];
  let mess = [];
  if (!Fname.value.match(regName) && Fname.value !== "") {
    messages.push("please enter a valid name!");
  }
  if (!LName.value.match(regName) && LName.value !== "") {
    messages.push("please enter a valid name!");
  }
  if (isNaN(phoneM.value)) {
    messages.push("please enter a valid phone Number!");
  }
  if (!emailM.value.match(validRegex) && emailM.value !== "") {
    messages.push("please enter a valid email Adress!");
  }
  // if (!allowedExtensions.exec(fileInput.value) && fileInput.value !== "") {
  //   messages.push("Invalid file type !");
  // }
  if (messages.length > 0) {
    e.preventDefault();
    errorM.innerHTML = messages.join(" <br>  ");
  }
  //company
  if (!companyName.value.match(regName) && companyName.value !== "") {
    e.preventDefault();
    errorCname.innerHTML = "please enter a valid Name !";
  }
  if (isNaN(companyPhone.value)) {
    mess.push("please enter a valid phone Number!");
  }
  if (!companyEmail.value.match(validRegex) && companyEmail.value !== "") {
    mess.push("please enter a valid email Adress!");
  }
  if (!allowedExtensions.exec(fileInput1.value) && fileInput1.value !== "") {
    e.preventDefault();
    errFile1.innerHTML = "invalid file type! ";
  }
  if (!allowedExtensions.exec(fileInput2.value) && fileInput2.value !== "") {
    e.preventDefault();
    errFile2.innerHTML = "invalid file type! ";
  }
  if (!allowedExtensions.exec(fileInput3.value) && fileInput3.value !== "") {
    e.preventDefault();
    errFile3.innerHTML = "invalid file type! ";
  }
  if (!allowedExtensions.exec(fileInput4.value) && fileInput4.value !== "") {
    e.preventDefault();
    errFile4.innerHTML = "invalid file type! ";
  }
  if (mess.length > 0) {
    e.preventDefault();
    errorC.innerHTML = mess.join(" <br> <br> ");
  }
});

function ClearNameError() {
  errorCname.innerHTML = "";
}
function ClearFile1err() {
  errFile1.innerHTML = "";
}
function ClearFile2err() {
  errFile2.innerHTML = "";
}
function ClearFile3err() {
  errFile3.innerHTML = "";
}
function ClearFile1err() {
  errFile4.innerHTML = "";
}


//hamburger menu
const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".menu");
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  menu.classList.toggle("active");
});
document.querySelectorAll(".list").forEach((n) =>
  n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    menu.classList.remove("active");
  })
);
//testimonials
let testimony = document.getElementsByClassName("testimony1");
let pic = document.getElementsByClassName("user-pic");
function changeTestimony() {
  for (userpics of pic) {
    userpics.classList.remove("active-pic");
  }
  for (texts of testimony) {
    texts.classList.remove("active-text");
  }
  let i = Array.from(pic).indexOf(event.target); // get the index of the clicked image.
  pic[i].classList.add("active-pic"); //asign class active-pic to the index.
  testimony[i].classList.add("active-text");
}
//FAQ
const accordion = document.getElementsByClassName("contentBox");
for (i = 0; i < accordion.length; i++) {
  accordion[i].addEventListener("click", function () {
    this.classList.toggle("active");
  });
}

//modal
function hideCompany() {
  hideC = document.getElementsByClassName("individuals-section");
  if (document.getElementById("radioOne").checked) {
    hideC[0].style.display = "block";
    hideI[0].style.display = "none";
  } else {
  }
}

function hideIndividuals() {
  hideI = document.getElementsByClassName("Company-section");
  if (document.getElementById("radioTwo").checked) {
    hideI[0].style.display = "block";
    hideC[0].style.display = "none";
  } else {
  }
}
