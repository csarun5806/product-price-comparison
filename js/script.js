document.addEventListener('DOMContentLoaded', function () {
<<<<<<< HEAD
    // Get filter and search inputs
    const searchInput = document.getElementById('search');
    const categoryFilter = document.getElementById('category-filter');
    const brandFilter = document.getElementById('brand-filter');
=======

    // Get filter and search inputs
    const searchInput = document.getElementById('search');
    const brandFilter = document.getElementById('brand-filter');
    const categoryFilter = document.getElementById('category-filter');
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
    const productCards = document.querySelectorAll('.product-card');

    // Function to filter products
    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
<<<<<<< HEAD
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
=======
        const selectedBrand = brandFilter.value;
        const selectedCategory = categoryFilter.value;

        productCards.forEach(function (card) {
            const productName = card.querySelector('.card-title').innerText.toLowerCase();
            const productBrand = card.getAttribute('data-brand');
            const productCategory = card.getAttribute('data-category');

            let matchesSearch = productName.includes(searchValue);
            let matchesBrand = selectedBrand === '' || productBrand === selectedBrand;
            let matchesCategory = selectedCategory === '' || productCategory === selectedCategory;

            // Show/hide product card based on conditions
            if (matchesSearch && matchesBrand && matchesCategory) {
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

<<<<<<< HEAD
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
=======
    // Event listener for search input
    searchInput.addEventListener('input', filterProducts);

    // Event listener for brand filter
    brandFilter.addEventListener('change', filterProducts);

    // Event listener for category filter
    categoryFilter.addEventListener('change', filterProducts);

>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
});
