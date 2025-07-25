let cursor = document.querySelector("#cursor");


document.addEventListener("mousemove", (e) => {
  gsap.to(cursor, {
    x: e.clientX,
    y: e.clientY,
    duration: 0.2,
    ease: "power2.out"
  });
});


const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const showRegister = document.getElementById("showRegister");
const showLogin = document.getElementById("showLogin");

showRegister.addEventListener("click", () => {
  gsap.to(loginForm, {
    opacity: 0,
    scale: 0.5,
    duration: 0.4,
    onComplete: () => {
      loginForm.classList.remove("active");
      registerForm.classList.add("active");
      gsap.fromTo(registerForm, { opacity: 0, scale: 0.5 }, { opacity: 1, scale: 1, duration: 0.4 });
    }
  });
});

showLogin.addEventListener("click", () => {
  gsap.to(registerForm, {
    opacity: 0,
    scale: 0.5,
    duration: 0.4,
    onComplete: () => {
      registerForm.classList.remove("active");
      loginForm.classList.add("active");
      gsap.fromTo(loginForm, { opacity: 0, scale: 0.5 }, { opacity: 1, scale: 1, duration: 0.4 });
    }
  });
});


document.querySelectorAll("form").forEach(form => {
  form.addEventListener("mouseenter", () => {
    gsap.to(cursor, {
      scale: 8,
      backgroundColor: "rgba(0, 217, 255, 0.1)",
      duration: 1,
      ease: "expo.out"
    });
  });

  form.addEventListener("mouseleave", () => {
    gsap.to(cursor, {
      scale: 1,
      backgroundColor: "rgba(0, 217, 255, 0.3)",
      duration: 1,
      ease: "expo.out"
    });
  });
});
