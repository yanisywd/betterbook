 const productContainers = [...document.querySelectorAll(".product-container")];
const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
const preBtn=[...document.querySelectorAll(".pre-btn")];
productContainers.forEach((item, i) => {
  let containerDimentions = item.getBoundingClinetRect();
  let containerWidth = containerDimentions.width;
  nxtBtn[i].addEventListener("click", () => {
    item.scrolleft += containerWidth;
  })

  preBtn[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth;
  })
})
