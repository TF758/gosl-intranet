const savedTheme = localStorage.getItem("theme") || "light";

document.documentElement.setAttribute("data-theme", savedTheme);

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".theme-toggle").forEach(button => {
    button.addEventListener("click", () => {
      const currentTheme = document.documentElement.getAttribute("data-theme");

      const nextTheme = currentTheme === "light" ? "dark" : "light";

      document.documentElement.setAttribute("data-theme", nextTheme);

      localStorage.setItem("theme", nextTheme);
    });
  });
});
