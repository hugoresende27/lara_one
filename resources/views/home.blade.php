<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
  <link rel="stylesheet" href="/assets/css/buttons.css">
  <link rel="stylesheet" href="/assets/css/main.css">
  <title>Hugo Resende</title>
</head>
<body class="container background-image my-element" id="main">





  <div class="row justify-content-center text-center" id="app" >


    <div class="card-body" v-if="showBox">
 

     
    </div>
  


    <a class="button col-md-3 col-sm-6 col-9" href="#" @click="changeBackground('about')" style="--color: #060606;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      About Me
    </a>
    <a class="button col-md-3 col-sm-6 col-9" href="#" @click="changeBackground('projects')"  style="--color: #060606;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Projects
      <i class="fas fa-briefcase"></i>
    </a>
    <a class="button col-md-3 col-sm-6 col-9" href="#" @click="changeBackground('resume')" style="--color: #060606;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Resume
    </a>
    <a class="button col-md-3 col-sm-6 col-9" href="#" @click="changeBackground('education')" style="--color: #060606;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Education
    </a>
    <a class="button col-md-3 col-sm-6 col-9" href="#" @click="changeBackground('contact')" style="--color: #060606;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Contact
    </a>
  </div>







</body>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>

  
  const { createApp, ref } = Vue

  createApp({
    setup() {
      const showBox = ref(false);
      const boxContent = ref(''); 
      const backgroundColor = ref('#fff');
      // const backgroundImages = {
      //   'about': 'url("assets/images/about.webp")',
      //   'projects': 'url("assets/images/projects.webp")',
      //   'resume': 'url("assets/images/resume.webp")',
      //   'education': 'url("assets/images/education.webp")',
      //   'contact': 'url("assets/images/contact.webp")',
      // };



      return {
        // backgroundImages,
        backgroundColor,
        showBox,
        boxContent
      };
    },

    methods: {
      changeBackground(buttonKey) {
        const main = document.getElementById('main');
      
        switch (buttonKey) {
          case 'about':
            main.style.backgroundColor = '#C5C5C5';
            break;
          case 'projects':
            main.style.backgroundColor = '#4C5B61';
            break;
          case 'resume':
            main.style.backgroundColor = '#829191';
            break;
          case 'education':
            main.style.backgroundColor = '#949B96';
            break;
          case 'contact':
            main.style.backgroundColor = '#2C423F';
            break;
      
        }

        // main.style.backgroundImage = this.backgroundImages[buttonKey];

        this.showBox = true; // Set showBox to true on click

        // Optional: Set box content based on buttonKey
        switch (buttonKey) {
          case 'about':
            
            this.boxContent = 'About Me content';
            break;
          case 'projects':
            this.boxContent = 'Projects content';
            break;
          case 'resume':
            this.boxContent = 'My CV';
            break;
          case 'education':
            this.boxContent = 'My education';
            break;
          case 'contact':
            this.boxContent = 'Contact Form';
            break;
        }
       
      }
    }
  }).mount('#app')



  
</script>


</html>

<style>

  /* FONTS */
  @import url('https://fonts.googleapis.com/css2?family=Lumanosimo&family=Montserrat:wght@300&family=Roboto+Condensed:wght@300&family=Sevillana&display=swap');

  /* BUTTONS */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');



.button {
  position: relative;
  padding: 16px 30px;
  font-size: 1.5rem;
  font-family: "Lumanosimo", cursive;
  font-weight: 400;
  font-style: normal;
  color: var(--color);
  border: 5px solid rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  text-shadow: 0 0 15px var(--color);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  transition: 0.5s;
  z-index: 1;
  margin: 10px;
}

.button:hover {
  color: #fff;
  border: 2px solid rgba(0, 0, 0, 0);
  box-shadow: 0 0 0px var(--color);
}

.button::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: var(--color);
  z-index: -1;
  transform: scale(0);
  transition: 0.5s;
}

.button:hover::before {
  transform: scale(1);
  transition-delay: 0.5s;
  box-shadow: 0 0 10px var(--color),
    0 0 30px var(--color),
    0 0 60px var(--color);
}

.button span {
  position: absolute;
  background: var(--color);
  pointer-events: none;
  border-radius: 2px;
  box-shadow: 0 0 10px var(--color),
    0 0 20px var(--color),
    0 0 30px var(--color),
    0 0 50px var(--color),
    0 0 100px var(--color);
  transition: 0.5s ease-in-out;
  transition-delay: 0.25s;
}

.button:hover span {
  opacity: 0;
  transition-delay: 0s;
}

.button span:nth-child(1),
.button span:nth-child(3) {
  width: 40px;
  height: 4px;
}

.button:hover span:nth-child(1),
.button:hover span:nth-child(3) {
  transform: translateX(0);
}

.button span:nth-child(2),
.button span:nth-child(4) {
  width: 4px;
  height: 40px;
}

.button:hover span:nth-child(1),
.button:hover span:nth-child(3) {
  transform: translateY(0);
}

.button span:nth-child(1) {
  top: calc(50% - 2px);
  left: -50px;
  transform-origin: left;
}

.button:hover span:nth-child(1) {
  left: 50%;
}

.button span:nth-child(3) {
  top: calc(50% - 2px);
  right: -50px;
  transform-origin: right;
}

.button:hover span:nth-child(3) {
  right: 50%;
}

.button span:nth-child(2) {
  left: calc(50% - 2px);
  top: -50px;
  transform-origin: top;
}

.button:hover span:nth-child(2) {
  top: 50%;
}

.button span:nth-child(4) {
  left: calc(50% - 2px);
  bottom: -50px;
  transform-origin: bottom;
}

.button:hover span:nth-child(4 ) {
  bottom: 50%;
}


  /* MAIN */
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.container {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 120px;
  background: #27282c;
}


.background-image {
  /* background-image: url('assets/images/bg.jpg');  */
  background-color: #F7F7F7;
  background-size: cover; /* Ensure image covers the container */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Prevent image repetition */
}


.card-body {
  /* background-color: #3B5998;  */
  background-image: url('assets/images/bg.jpg');
  color: #fff; /* White text */
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}



@media (max-width: 768px) {
  /* Styles for screens smaller than 768px */
  .my-element {
    font-size: 16px;
  }
}
</style>