/***** Text Animation *****/

// Create the observer
const observer = new IntersectionObserver(entries => {
  // Loop over the entries
  entries.forEach(entry => {
    //const viewWorkText = entry.target.querySelector('.view-work-text');
    //console.log(viewWorkText);
    //console.log(entry.target);
    // If the element is visible
      
    if (entry.isIntersecting) {
      // Add animation class
      //viewWorkText.classList.add('fadeInUp-animation');
      entry.target.classList.add("fadeInUp-animation");
      return; // if we added the class, exit function
    }

    // We're not intersecting, so remove class
    //viewWorkText.classList.remove('fadeInUp-animation');
    entry.target.classList.remove("fadeInUp-animation");
  });
});

// Tell the observer which elements to track
observer.observe(document.querySelector(".view-work-text"));

/***** Pop Up Contact Window *****/

const btn1 = document.getElementById("btn1");
const btn2 = document.getElementById("btn2");
const btn3 = document.getElementById("btn3");
const dtsSubmitBtn = document.getElementById("dts-submit-btn");

function loadContactPopUp() {
  const popupOverlay = document.getElementById("popupOverlay");
  const popup = document.getElementById("popup");
  const closePopup = document.getElementById("closePopup");
  const emailInput = document.getElementById("emailInput");

  // Function to open the popup
  function openPopup() {
    popupOverlay.style.display = "block";
  }

  // Function to close the popup
  function closePopupFunc() {
    popupOverlay.style.display = "none";
  }

  // Function to submit the signup form
  /*function submitForm() {
    const email = emailInput.value;

    // Add your form submission logic here
    console.log(`Email submitted: ${email}`);
    closePopupFunc(); // Close the popup after form submission
  }*/

  // Event listeners

  // Trigger the popup to open (you can call this function on a button click or any other event)
  openPopup();

  // Close the popup when the close button is clicked
  closePopup.addEventListener("click", closePopupFunc);

  // Close the popup when clicking outside the popup content
  popupOverlay.addEventListener("click", function (event) {
    if (event.target === popupOverlay) {
      closePopupFunc();
    }
  });
}

btn1.addEventListener("click", loadContactPopUp);
btn2.addEventListener("click", loadContactPopUp);
btn3.addEventListener("click", loadContactPopUp);

dtsSubmitBtn.addEventListener("click", function() {
  document.getElementById("dts-form").submit();
});