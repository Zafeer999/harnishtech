(function () {
    emailjs.init("qbYUAKwwsXVUf07z6");
  })();

  const contactForm = document.querySelector("#contactForm");
  const responseMessage = document.querySelector("#responseMessage");

  contactForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let templateParams = {
      from_name: document.querySelector("#from_name").value,
      reply_to: document.querySelector("#reply_to").value,
      message: document.querySelector("#message").value,
    };

    emailjs
      .send("servicbe_wfdajmu", "template_lneqyyu", templateParams)
      .then(
        function (response) {
          responseMessage.classList.remove("hidden");
          if (response.status === 200) {
            responseMessage.classList.add("text-b300");
            responseMessage.innerText =
              "Your message has sent successfully!";

              setTimeout(() => {
                responseMessage.classList.add("hidden")
            }, 3000);
          } else {
            responseMessage.classList.add("text-r300");
            responseMessage.innerText = "Something went wrong";
          }
        },
        function (error) {
          responseMessage.classList.add("text-r300");

          responseMessage.innerText = "Something went wrong";
        },
      );
    contactForm.reset();
  });