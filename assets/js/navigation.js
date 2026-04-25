document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  const toggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector(".site-nav");
  const navLinks = nav ? nav.querySelectorAll("a") : [];

  if (!toggle || !nav) {
    return;
  }

  const closeMenu = () => {
    toggle.setAttribute("aria-expanded", "false");
    nav.classList.remove("is-open");
  };

  toggle.addEventListener("click", () => {
    const expanded = toggle.getAttribute("aria-expanded") === "true";
    toggle.setAttribute("aria-expanded", String(!expanded));
    nav.classList.toggle("is-open");
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  // Hide on scroll down, show on scroll up
  if (header) {
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", () => {
      if (nav.classList.contains("is-open")) return;

      const currentScrollY = window.scrollY;
      if (currentScrollY < 80) {
        header.classList.remove("is-hidden");
      } else if (currentScrollY > lastScrollY) {
        header.classList.add("is-hidden");
      } else {
        header.classList.remove("is-hidden");
      }
      lastScrollY = currentScrollY;
    }, { passive: true });
  }
});
