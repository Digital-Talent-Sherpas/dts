// Create the observer
const observer = new IntersectionObserver(entries => {
  // Loop over the entries
  entries.forEach(entry => {
    //const viewWorkText = entry.target.querySelector('.view-work-text');
    // If the element is visible
      
    if (entry.isIntersecting) {
      // Add animation class
      //viewWorkText.classList.add('fadeInUp-animation');
      entry.target.classList.add('fadeInUp-animation');
      return; // if we added the class, exit function
    }

    // We're not intersecting, so remove class
    //viewWorkText.classList.remove('fadeInUp-animation');
    entry.target.classList.remove('fadeInUp-animation');
  });
});

// Tell the observer which elements to track
observer.observe(document.querySelector('.view-work-text'));