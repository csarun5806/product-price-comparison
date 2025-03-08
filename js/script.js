document.addEventListener('DOMContentLoaded', function () {

    // Get filter and search inputs
    const searchInput = document.getElementById('search');
    const brandFilter = document.getElementById('brand-filter');
    const categoryFilter = document.getElementById('category-filter');
    const productCards = document.querySelectorAll('.product-card');

    // Function to filter products
    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
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
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Event listener for search input
    searchInput.addEventListener('input', filterProducts);

    // Event listener for brand filter
    brandFilter.addEventListener('change', filterProducts);

    // Event listener for category filter
    categoryFilter.addEventListener('change', filterProducts);

});
