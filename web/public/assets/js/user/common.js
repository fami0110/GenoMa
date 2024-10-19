// Initialize Isotope for filtering
document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
    let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
    let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
    let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";

    const itemsPerPage = 8;
    let currentPage = 1;

    const isotopeContainer = isotopeItem.querySelector(".isotope-container");
    let initIsotope;

    imagesLoaded(isotopeContainer, function () {
        initIsotope = new Isotope(isotopeContainer,
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

                let filterClass = this.getAttribute("data-filter");
                
                if (filterClass === "*") {
                    updatePagination("*");
                } else {
                    updatePagination((item) => item.classList.contains(filterClass));
                }

                checkEmptyResult();
            });
        });
        

        // Search functionality

        const searchButton = document.querySelector(".input-group button#button-addon2");
        const searchInput = document.querySelector('.input-group input[placeholder="Ketik di sini..."]');

        function executeSearch() {
            const searchText = searchInput.value.toLowerCase();

            updatePagination((searchText.length !== 0) ?
                (item) => {
                    const title = item.querySelector(".card-title").textContent.toLowerCase();
                    return title.includes(searchText);
                }  : "*"
            );

            checkEmptyResult();
        }

        searchButton.addEventListener("click", executeSearch);
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter") executeSearch();
        });


        // Pagination Functionality

        const isotopeItems = document.querySelectorAll('.isotope-item');
        const paginationNav = document.querySelector('.pagination');

        function updatePagination(itemFilter = (item) => item) {
            isotopeItems.forEach(item => {
                item.dataset.page = null;
            });

            let filteredItems = [];
            if (itemFilter === "*") {
                filteredItems = Array.from(isotopeItems);
            } else if (typeof itemFilter === "function") {
                filteredItems = Array.from(isotopeItems).filter(itemFilter);
            } else {
                filteredItems = Array.from(isotopeItems).filter(item => item.classList.contains(itemFilter));
            }

            let pagesAmount = 1;
            for (let i = 1; i < filteredItems.length; i++) {
                filteredItems[i-0].setAttribute('data-page', pagesAmount);
                if (i % itemsPerPage === 0) pagesAmount++;
            }

            // Update pagination nav

            paginationNav.innerHTML = "";
    
            for (let i = 1; i <= pagesAmount; i++) {
                btn = document.createElement("li");
                btn.classList.add("page-item");
                btn.style.cursor = "pointer";
                btn.setAttribute("data-page", i);
                btn.innerHTML = `<span class="page-link">${i}</span>`;
    
                paginationNav.append(btn);
            }

            paginationNav.children[0].classList.add('active');
            Array.from(paginationNav.children).forEach(nav => {
                nav.onclick = () => {
                    currentPage = parseInt(nav.getAttribute('data-page'));
                    arrange();
                };
            });

            // Reset current page number
            currentPage = 1;
            arrange();
        }

        function arrange() {
            initIsotope.arrange({
                filter: (item) => item.getAttribute('data-page') == currentPage,
            });
        }

        // Init Pagination Nav
        
        updatePagination("*");

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