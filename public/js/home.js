

document.addEventListener('DOMContentLoaded', function () {
      

    const aboutButton = document.getElementById('about');
    const projectsButton = document.getElementById('projects');
    const resumeButton = document.getElementById('resume');
    const buildButton = document.getElementById('build');
    const contactButton = document.getElementById('contact');

    const infoBox = document.querySelector('.info-box');


  //FETCH CONTENT ------------------------------------------
  function fetchContent(url) {
    
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

    
  //ABOUT ------------------------------------------
  aboutButton.addEventListener('click', () => {
    fetchContent("http://127.0.0.1:8000/api/about");
  });


  //PROJECT -------------------------------------------
  projectsButton.addEventListener('click', () => {
    //fetchContent();
  });


  //RESUME -------------------------------------------
  resumeButton.addEventListener('click', () => {
    //fetchContent();

  });


  //BUILD -------------------------------------------
  buildButton.addEventListener('click', () => {
    //fetchContent();

  });


  //CONTACT -------------------------------------------
  contactButton.addEventListener('click', () => {
    //fetchContent();

  });


})