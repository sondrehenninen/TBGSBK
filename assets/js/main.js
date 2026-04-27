document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".results-slider-wrap").forEach((wrap) => {
    const slider = wrap.querySelector(".results-slider");
    const prev = wrap.querySelector(".results-btn--prev");
    const next = wrap.querySelector(".results-btn--next");
    if (!slider || !prev || !next) return;

    const updateButtons = () => {
      prev.disabled = slider.scrollLeft <= 0;
      next.disabled = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 1;
    };

    prev.addEventListener("click", () => {
      slider.scrollBy({ left: -slider.clientWidth, behavior: "smooth" });
    });
    next.addEventListener("click", () => {
      slider.scrollBy({ left: slider.clientWidth, behavior: "smooth" });
    });
    slider.addEventListener("scroll", updateButtons, { passive: true });
    updateButtons();
  });


  const currentYearNodes = document.querySelectorAll("[data-current-year]");
  currentYearNodes.forEach((node) => {
    node.textContent = String(new Date().getFullYear());
  });

  document.querySelectorAll(".sponsor-marquee__track").forEach((track) => {
    const items = Array.from(track.children);
    if (!items.length) return;

    // Clone until track fills at least 2× the container width
    const container = track.parentElement;
    while (track.scrollWidth < container.offsetWidth * 2) {
      items.forEach((item) => track.appendChild(item.cloneNode(true)));
    }
    // Always add one final full clone to guarantee seamless wrap
    items.forEach((item) => track.appendChild(item.cloneNode(true)));

    // Tell CSS exactly how far to scroll (one original set)
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    const setWidth = items.reduce((sum, el) => sum + el.offsetWidth + gap, 0);
    track.style.setProperty("--set-width", setWidth + "px");
  });
});
