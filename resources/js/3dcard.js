document.querySelectorAll(".card-3d-container").forEach(container => {
    const card = container.querySelector(".card-3d");

    container.addEventListener("mousemove", (e) => {
        const rect = container.getBoundingClientRect();
        const xAxis = ((e.clientX - rect.left) / rect.width - 0.5) * 30;
        const yAxis = ((e.clientY - rect.top) / rect.height - 0.5) * -30;

        card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    });

    container.addEventListener("mouseenter", () => {
        card.style.transition = "none";
    });

    container.addEventListener("mouseleave", () => {
        card.style.transition = "transform 0.5s ease";
        card.style.transform = "rotateY(0deg) rotateX(0deg)";
    });
});
