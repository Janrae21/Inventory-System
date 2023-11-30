const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});
const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
});

const dropBtn = document.querySelector(".dropdown-btn"),
    dropdown = document.querySelectorAll(".drop-item");

dropBtn.addEventListener("click", () => {
    dropdown.forEach((drop) => {
        if (drop.classList.contains("show-item")) {
            drop.classList.remove("show-item");
        } else {
            drop.classList.add("show-item");
        }
    });
});
const stocksPurchasedInput = document.getElementById('stocksPurchased');
    const actualStocksInput = document.getElementById('actualStocks');
    const damageInput = document.getElementById('damage');
    const remainingStocksInput = document.getElementById('remainingStocks');

  
    stocksPurchasedInput.addEventListener('input', updateRemainingStocks);
    actualStocksInput.addEventListener('input', updateRemainingStocks);
	
    // Function to update the remaining stocks and damage
    function updateRemainingStocks() {
        const stocksPurchased = parseInt(stocksPurchasedInput.value) || 0;
        const actualStocks = parseInt(actualStocksInput.value) || 0;

        const damage = stocksPurchased - actualStocks;
        const remainingStocks = stocksPurchased - damage;

        damageInput.value = damage;
        remainingStocksInput.value = remainingStocks;
    }


