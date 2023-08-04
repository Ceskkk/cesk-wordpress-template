document.querySelectorAll(".carousel-animation").forEach((item) => {
  carouselAnimation(item);
});

/**
 * @carousel -> Dom Element with children
 * Sets an interval to DomElement to add/remove active class every X seconds
 */
function carouselAnimation(carousel) {
  let currentActive = 1;

  const changeCurrentActiveValue = (newValue) => {
    currentActive = newValue;
  };

  setInterval(
    () => handleCarousel(carousel, currentActive, changeCurrentActiveValue),
    4000
  );
}

function handleCarousel(carousel, currentActive, changeCurrentActiveValue) {
  const numOfChilds = carousel.childElementCount;

  if (currentActive !== numOfChilds) {
    carousel
      .querySelector(`*:nth-of-type(${currentActive})`)
      .classList.remove("active");
    carousel
      .querySelector(`*:nth-of-type(${currentActive + 1})`)
      .classList.add("active");

    changeCurrentActiveValue(currentActive + 1);
  } else {
    carousel
      .querySelector(`*:nth-of-type(${currentActive})`)
      .classList.remove("active");
    carousel.querySelector("*:nth-of-type(1)").classList.add("active");

    changeCurrentActiveValue(1);
  }
}
