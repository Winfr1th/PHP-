document.addEventListener("DOMContentLoaded", function () {
    const jasaSelect = document.getElementById("jasa");
    const durasiSelect = document.getElementById("durasi");
    const totalPayment = document.querySelector("#total-payment");
    const totalPrice = document.querySelector("#total-price");
    // Function to calculate and display the total payment
    function calculateTotalPayment() {
        const selectedOptions = jasaSelect.options[jasaSelect.selectedIndex];
        const ratePerHour = parseFloat(
            selectedOptions.getAttribute("data-rate")
        );
        const durasiValue = parseFloat(durasiSelect.value);

        // Check if both jasa and durasi are selected
        if (ratePerHour && durasiValue) {
            const total = ratePerHour * durasiValue;
            totalPayment.textContent = `Total Pembayaran: Rp. ${total.toLocaleString(
                "en-US"
            )}`;
            totalPrice.value = total.toFixed(0);
        } else {
            totalPayment.textContent = `Total Pembayaran: Rp. 0.000`;
            totalPrice.value = "0";
        }
    }

    // Event listeners for the select inputs
    jasaSelect.addEventListener("change", calculateTotalPayment);
    durasiSelect.addEventListener("change", calculateTotalPayment);
});

function toggleDropdown() {
    var dropdownContent = document.querySelector(".hidden");
    dropdownContent.classList.toggle("show");
}

function orderRedirect() {
    window.location.href = `order.php`;
}

function submitContact(event) {
    event.preventDefault();

    const name = encodeURIComponent(document.querySelector(".name").value);
    const email = document.querySelector(".e-mail").value;
    const whatsapp = document.querySelector(".whatsapp").value;

    const contactToWhatsapp = `https://wa.me/62?text=Halo%20Saya%20tertarik%20dengan%20jasa%20anda%0ANama:%20${name}%0AEmail:%20${email}%0AWhatsapp:%20${whatsapp}`;
    window.location.href = contactToWhatsapp;
}

function showImage(img) {
    const modal = document.createElement("div");
    modal.classList.add("modal");

    const modalImg = document.createElement("img");
    modalImg.src = img.src;
    modalImg.classList.add("modal-content");

    modal.appendChild(modalImg);

    document.body.appendChild(modal);

    modal.addEventListener("click", function () {
        modal.remove();
    });
}
