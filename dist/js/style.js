function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  small.innerText = message;
  formControl.className = "col-md-12 col-sm-6 form-control2 error";
}
function setSuccessFor(input) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  small.innerText = "";
  formControl.className = "col-md-12 col-sm-6 form-control2 success";
}
function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
function setErrorForUpdate(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  small.innerText = message;
  formControl.className = "col-xs-12 col-sm-6 form-control2 error";
}
function setSuccessForUpdate(input) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  small.innerText = "";
  formControl.className = "col-xs-12 col-sm-6 form-control2 success";
}

// //my year picker

// const yearpicker = document.querySelectorAll(".yearpicker");
// console.log(yearpicker);
// const year_selected = document.querySelectorAll(".year-selected");
// // var year_element = document.querySelector(".year-selected .years .year");
// // const yr_element = document.querySelector('.year-selected .years .year .yr');

// const years_element = document.createElement("div");
// const prev_year_element = document.createElement("div");
// const next_year_element = document.createElement("div");
// var year_element = document.createElement("div");

// var date = new Date();
// let year = date.getFullYear();

// let selectedDate = "";
// let selectedYear = "";

// showElement();
// populateYears();

// //Event Listeners
// for (let i = 0; i < yearpicker.length; i++) {
//   yearpicker[i].addEventListener("click", toggleYearPicker);
//   console.log(yearpicker[i]);
// }
// next_year_element.addEventListener("click", goToNextYear);
// prev_year_element.addEventListener("click", goToPrevYear);

// //Functions
// function toggleYearPicker(e) {
//   for (let i = 0; i < year_selected.length; i++) {
//     if (!checkEventPathForClass(e.path, "year-selected")) {
//       year_selected[i].classList.toggle("active");
//     }
//   }
// }

// function showElement(e) {
//   for (let i = 0; i < yearpicker.length; i++) {
//     years_element.className = "years";
//     prev_year_element.className = "arrow prev-year";
//     next_year_element.className = "arrow next-year";
//     year_element.className = "year";

//     prev_year_element.textContent = "<";
//     next_year_element.textContent = ">";

//     years_element.append(prev_year_element, year_element, next_year_element);

//     year_selected[i].appendChild(years_element);
//   }
// }

// function populateYears() {
//   year_element.innerHTML = "";
//   for (let i = 0; i < 12; i++) {
//     const yr_element = document.createElement("div");
//     yr_element.className = "yr";

//     const year_value = i + year;

//     if (selectedYear == year_value) {
//       yr_element.classList.add("selected");
//     }

//     yr_element.addEventListener("click", function () {
//       selectedDate = new Date(year_value, 1, 1);
//       selectedYear = year_value;

//       for (let i = 0; i < yearpicker.length; i++) {
//         yearpicker[i].value = formatYear(selectedDate);
//       }
//       for (let i = 0; i < year_selected.length; i++) {
//         year_selected[i].classList.toggle("active");
//       }
//       populateYears();
//     });

//     yr_element.textContent = year_value;

//     year_element.appendChild(yr_element);
//   }
// }

// function goToNextYear(e) {
//   year += 12;
//   populateYears();
// }

// function goToPrevYear(e) {
//   year -= 12;
//   populateYears();
// }

// //Helper Functions
// function checkEventPathForClass(path, selector) {
//   for (let i = 0; i < path.length; i++) {
//     if (path[i].classList && path[i].classList.contains(selector)) {
//       return true;
//     }
//   }

//   return false;
// }

// function formatYear(d) {
//   let year = d.getFullYear();

//   return year;
// }
