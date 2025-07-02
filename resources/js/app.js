import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const cartBtn = document.querySelector(".header-cart-icon");
    const cartSidebar = document.getElementById("cartSidebar");
    const closeCartBtn = document.getElementById("closeCartBtn");
    const backdrop = document.getElementById("cartBackdrop");

    if (cartBtn && cartSidebar && closeCartBtn && backdrop) {
        cartBtn.addEventListener("click", function (e) {
            e.preventDefault();
            cartSidebar.classList.add("show");
            backdrop.classList.add("show");
        });

        closeCartBtn.addEventListener("click", function () {
            cartSidebar.classList.remove("show");
            backdrop.classList.remove("show");
        });

        backdrop.addEventListener("click", function () {
            cartSidebar.classList.remove("show");
            backdrop.classList.remove("show");
        });
    }

    // ✅ Restaurar posición del scroll si fue guardada antes
    const savedScroll = sessionStorage.getItem("scrollPosition");
    if (savedScroll) {
        window.scrollTo(0, parseInt(savedScroll));
        sessionStorage.removeItem("scrollPosition");
    }

    // ✅ Guardar scroll antes de enviar el formulario de carrito
    const forms = document.querySelectorAll("form.agregar-carrito-form");
    forms.forEach((form) => {
        form.addEventListener("submit", function () {
            sessionStorage.setItem("scrollPosition", window.scrollY);
        });
    });
});

// Eliminar producto del carrito desde el sidebar
document.body.addEventListener("click", function (e) {
    if (e.target.classList.contains("eliminar-producto-btn")) {
        const productoId = e.target.dataset.id;

        fetch(`/carrito/eliminar/${productoId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((res) =>
                res.ok
                    ? actualizarSidebarCarrito()
                    : console.error("Error eliminando")
            )
            .catch((err) => console.error("Error:", err));
    }
});
