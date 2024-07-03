const profileMenu = document.querySelector(".select-list")
    const btn1 = document.querySelector(".profile-btn3")
    const opt1 = document.querySelectorAll(".opt")
    opt1.forEach(opt =>{
    opt.addEventListener("click", ()=>{
      const selectedOption = opt.querySelector(".opt-text").innerHTML;
      profileMenu.classList.remove("active");
      })

    })

    btn1.addEventListener("click", () => profileMenu.classList.toggle("active"));

    function redirectToPostJob(){
        window.location.href = "postjob.php"
      }
      function redirectToPostEvent(){
        window.location.href = "postevent.php"
      }
      function redirectToPostLesson(){
        window.location.href = "postlesson.php"
      }


      window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window. scrollY > 0);
      })


    