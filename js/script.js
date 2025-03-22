document.addEventListener('DOMContentLoaded', function () {
    // Get filter and search inputs
    const searchInput = document.getElementById('search');
    const categoryFilter = document.getElementById('category-filter');
    const brandFilter = document.getElementById('brand-filter');
    const productCards = document.querySelectorAll('.product-card');

    // Function to filter products
    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;
        const selectedBrand = brandFilter.value;

        productCards.forEach(function (card) {
            const productName = card.querySelector('.card-title').textContent.toLowerCase();
            const productCategory = card.dataset.category;
            const productBrand = card.dataset.brand;

            // Check if the product matches the filters
            const matchesSearch = productName.includes(searchValue);
            const matchesCategory = selectedCategory === '' || productCategory === selectedCategory;
            const matchesBrand = selectedBrand === '' || productBrand === selectedBrand;

            // Show or hide product based on filters
            if (matchesSearch && matchesCategory && matchesBrand) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Add event listeners
    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
    brandFilter.addEventListener('change', filterProducts);
});

//login and signup
document.addEventListener('DOMContentLoaded', function () {
    const showSignup = document.getElementById('showSignup');
    const showLogin = document.getElementById('showLogin');
    const loginSection = document.querySelector('.col-md-6.bg-white');
    const signupSection = document.getElementById('signupSection');

    showSignup.addEventListener('click', function (e) {
        e.preventDefault();
        loginSection.classList.add('d-none');
        signupSection.classList.remove('d-none');
    });

    showLogin.addEventListener('click', function (e) {
        e.preventDefault();
        signupSection.classList.add('d-none');
        loginSection.classList.remove('d-none');
    });
});
