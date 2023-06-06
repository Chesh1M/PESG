/* Scroll transition to anchor */
$("a.toscroll").on('click',function(e) {
  var url = e.target.href;
  var hash = url.substring(url.indexOf("#")+1);

    $('html, body').animate({
      scrollTop: $('#'+hash).offset().top
    }, 800);
  
  return false;
});
/* Scroll transition to anchor */

/* RECAPTCHA */
function recaptcha_Callback() {
  const submitButton = document.getElementById("submit-button");
  submitButton.removeAttribute("disabled");
}
/* RECAPTCHA */

/* ANIMATIONS */
// Jumbotron text
const observer_jumbotron_text = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    const square = entry.target.querySelector('.jumbotron h1');

    if (entry.isIntersecting) {
      square.classList.add('animate__flash');
	  return; // if we added the class, exit the function
    }

    // We're not intersecting, so remove the class!
    square.classList.remove('animate__flash');
  });
});
// Contact us 
const observer_contact_us = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    const square = entry.target.querySelector('#contact-us h2');
  
    if (entry.isIntersecting) {
      square.classList.add('animate__heartBeat');
    return; // if we added the class, exit the function
    }
  
    // We're not intersecting, so remove the class!
    square.classList.remove('animate__heartBeat');
  });
});
// About us
const observer_about_us = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    const square = entry.target.querySelector('#about-us div div');
  
    if (entry.isIntersecting) {
      square.classList.add('animate__backInLeft');
    return; // if we added the class, exit the function
    }
  
    // We're not intersecting, so remove the class!
    square.classList.remove('animate__backInLeft');
  });
});
// About us
const observer_testimonial = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    const square = entry.target.querySelector('#testimonial h2');
  
    if (entry.isIntersecting) {
      square.classList.add('animate__bounce');
    return; // if we added the class, exit the function
    }
  
    // We're not intersecting, so remove the class!
    square.classList.remove('animate__bounce');
  });
});

observer_jumbotron_text.observe(document.querySelector('.jumbotron'));
observer_contact_us.observe(document.querySelector('#contact-us'));
observer_about_us.observe(document.querySelector('#about-us'));
observer_testimonial.observe(document.querySelector('#testimonial'));