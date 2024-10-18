// Initialize Isotope for filtering
document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
    let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
    let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
    let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";
    
    const itemsPerPage = 8;
    let currentPage = 1;

    let initIsotope;

    const isotopeContainer = isotopeItem.querySelector(".isotope-container");

    imagesLoaded(isotopeContainer, function () {
        initIsotope = new Isotope(
            isotopeContainer,
            {
                itemSelector: ".isotope-item",
                layoutMode: layout,
                filter: filter,
                sortBy: sort,
                transitionDuration: "0.6s",
            }
        );

        const checkEmptyResult = () => {
            const itemsLength = initIsotope.filteredItems.length;
            const noDataMessage = isotopeItem.querySelector(".no-data-message");
            noDataMessage.style.display = (itemsLength === 0) ? "block" : "none";
        };

        checkEmptyResult();


        // Filter functionality

        isotopeItem.querySelectorAll(".isotope-filters li").forEach(filters => {
            filters.addEventListener("click", function() {
                isotopeItem.querySelector(".isotope-filters .filter-active").classList.remove("filter-active");

                this.classList.add("filter-active");

                initIsotope.arrange({
                    filter: this.getAttribute("data-filter"),
                });

                checkEmptyResult();
                updatePagination();
            });
        });


        // Pagination

        function updatePagination() {
            const totalItems = initIsotope.filteredItems.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationContainer = isotopeItem.querySelector(".pagination");
        
            paginationContainer.innerHTML = "";
        
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement("button");
                pageButton.textContent = i;
                pageButton.classList.add("page-button");
                
                pageButton.addEventListener("click", function () {
                    currentPage = i;
                    const startIndex = (currentPage - 1) * itemsPerPage;
                    const endIndex = startIndex + itemsPerPage;
                    
                    const itemsToShow = initIsotope.filteredItems.slice(startIndex, endIndex);
                    initIsotope.arrange({
                        filter: function (item) {
                            return itemsToShow.includes(item);
                        },
                    });
        
                    checkEmptyResult(); // Update no-data message
                });
        
                paginationContainer.appendChild(pageButton); // Add button to pagination container
            }
        
        }
        
        // Search functionality

        const searchButton = document.querySelector(".input-group button#button-addon2");
        const searchInput = document.querySelector('.input-group input[placeholder="Ketik di sini..."]');

        function executeSearch() {
            const searchText = searchInput.value.toLowerCase();

            initIsotope.arrange({
                filter: function (item) {
                    const title = item.querySelector(".card-title").textContent.toLowerCase();
                    return title.includes(searchText);
                },
            });

            if (searchText.length === 0) {
                initIsotope.arrange({ filter: "*" });
            }

            checkEmptyResult();
            currentPage = 1;
            updatePagination();
        }

        searchButton.addEventListener("click", executeSearch);

        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter") executeSearch();
        });

    });
});

// Nearest Place

const submitBtn = document.querySelector('#distance-submit');

if (submitBtn) {
    submitBtn.addEventListener("click", function () {
        const form = this.closest('form');

        navigator.geolocation.getCurrentPosition((position) => {
            document.querySelector('input#longitude').value = position.coords.longitude;
            document.querySelector('input#latitude').value = position.coords.latitude;
            
            form.submit();
        });

    });

}