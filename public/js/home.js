document.addEventListener('DOMContentLoaded', function () {
      

    //ABOUT ------------------------------------------
    const aboutMeButton = document.getElementById('about');
    const infoBox = document.querySelector('.info-box');

    aboutMeButton.addEventListener('click', () => {

      const myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");

      const requestOptions = {
        method: "GET",
        headers: myHeaders,
        redirect: "follow"
      };

      fetch("http://127.0.0.1:8000/api/about", requestOptions)
        .then((response) => response.text())
        .then((result) => {
          infoBox.innerHTML = result;
        })
        .catch((error) => console.error(error));

  
  });


})