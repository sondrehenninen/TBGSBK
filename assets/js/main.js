document.addEventListener("DOMContentLoaded", () => {
  const currentYearNodes = document.querySelectorAll("[data-current-year]");

  currentYearNodes.forEach((node) => {
    node.textContent = String(new Date().getFullYear());
  });
});
