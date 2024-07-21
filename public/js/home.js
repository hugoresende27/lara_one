

document.addEventListener('DOMContentLoaded', function () {
      

    const aboutButton = document.getElementById('about');
    const projectsButton = document.getElementById('projects');
    const resumeButton = document.getElementById('resume');
    const buildButton = document.getElementById('build');
    const contactButton = document.getElementById('contact');

    const infoBox = document.querySelector('.info-box');


  //FETCH CONTENT ------------------------------------------
  function fetchContent(url, button) {
    removeSelectedClassFromButtons();
    button.classList.add('selected');

    if (!url){
      return infoBox.innerHTML = '';
    }


    infoBox.innerHTML = '';
    const myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");

    const requestOptions = {
        method: "GET",
        headers: myHeaders,
        redirect: "follow"
    };

    fetch(url, requestOptions)
        .then(response => response.text())
        .then(result => {
            infoBox.innerHTML = result;
            infoBox.classList.remove('hidden');
        })
        .catch(error => console.error(error));
  }


  //CLEAR BUTTON CLASS SELECTED
  function removeSelectedClassFromButtons() {
    const buttons = document.querySelectorAll('a'); // Adjust selector if needed
    // console.log(buttons);
    buttons.forEach(button => {
      button.classList.remove('selected');
    });
  }
  

    
  //ABOUT ------------------------------------------
  aboutButton.addEventListener('click', () => {
    fetchContent("http://127.0.0.1:8000/api/about" , aboutButton);
  });


  //PROJECT -------------------------------------------
  projectsButton.addEventListener('click', () => {
    fetchContent('', projectsButton);
  });


  //RESUME -------------------------------------------
  resumeButton.addEventListener('click', () => {
    fetchContent('', resumeButton);

  });


  //BUILD -------------------------------------------
  buildButton.addEventListener('click', () => {
    fetchContent('', buildButton);

  });


  //CONTACT -------------------------------------------
  contactButton.addEventListener('click', () => {
    fetchContent('', contactButton);
  });



  //THEME CHANGE
  const themeCheckbox = document.getElementById('theme-toggle');
  themeCheckbox.addEventListener('change', () => {
    const body = document.getElementById('main');
    if (themeCheckbox.checked) {
      body.classList.remove('orange-theme');
      body.classList.add('blue-theme');
    } else {
      body.classList.remove('blue-theme');
      body.classList.add('orange-theme');
    }
  });

})