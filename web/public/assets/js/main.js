(function () {
  "use strict";
  function toggleScrolled() {
    const selectBody = document.querySelector("body");
    const selectHeader = document.querySelector("#header");
    if (
      !selectHeader.classList.contains("scroll-up-sticky") &&
      !selectHeader.classList.contains("sticky-top") &&
      !selectHeader.classList.contains("fixed-top")
    )
      return;
    window.scrollY > 100
      ? selectBody.classList.add("scrolled")
      : selectBody.classList.remove("scrolled");
  }

  document.addEventListener("scroll", toggleScrolled);
  window.addEventListener("load", toggleScrolled);

  // Mobile nav toggle
  const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

  function mobileNavToogle() {
    document.querySelector("body").classList.toggle("mobile-nav-active");
    mobileNavToggleBtn.classList.toggle("bi-list");
    mobileNavToggleBtn.classList.toggle("bi-x");
  }
  mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

  // mobile nav on same-page/hash links
  document.querySelectorAll("#navmenu a").forEach((navmenu) => {
    navmenu.addEventListener("click", () => {
      if (document.querySelector(".mobile-nav-active")) {
        mobileNavToogle();
      }
    });
  });

  // Toggle mobile nav dropdowns
  document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
    navmenu.addEventListener("click", function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle("active");
      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
      e.stopImmediatePropagation();
    });
  });

  // Preloader
  const preloader = document.querySelector("#preloader");
  if (preloader) {
    window.addEventListener("load", () => {
      preloader.remove();
    });
  }

  // Scroll top button
  let scrollTop = document.querySelector(".scroll-top");

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100
        ? scrollTop.classList.add("active")
        : scrollTop.classList.remove("active");
    }
  }
  scrollTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  window.addEventListener("load", toggleScrollTop);
  document.addEventListener("scroll", toggleScrollTop);

  // Animation on scroll function and init
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: "ease-in-out",
      once: true,
      mirror: false,
    });
  }
  window.addEventListener("load", aosInit);

  // Initiate glightbox
  const glightbox = GLightbox({
    selector: ".glightbox",
  });

  // Frequently Asked Questions Toggle
  document
    .querySelectorAll(".faq-item h3, .faq-item .faq-toggle")
    .forEach((faqItem) => {
      faqItem.addEventListener("click", () => {
        faqItem.parentNode.classList.toggle("faq-active");
      });
    });

  // Init swiper sliders
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  // Correct scrolling position upon page load for URLs containing hash links.
  window.addEventListener("load", function (e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: "smooth",
          });
        }, 100);
      }
    }
  });

  // Navmenu Scrollspy
  let navmenulinks = document.querySelectorAll(".navmenu a");

  function navmenuScrollspy() {
    navmenulinks.forEach((navmenulink) => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        document
          .querySelectorAll(".navmenu a.active")
          .forEach((link) => link.classList.remove("active"));
        navmenulink.classList.add("active");
      } else {
        navmenulink.classList.remove("active");
      }
    });
  }
  window.addEventListener("load", navmenuScrollspy);
  document.addEventListener("scroll", navmenuScrollspy);
})();

// Initialize Isotope for filtering
document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
  let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
  let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
  let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";
  const itemsPerPage = 6; // Maximum cards per page
  let currentPage = 1;

  let initIsotope;
  imagesLoaded(isotopeItem.querySelector(".isotope-container"), function () {
    initIsotope = new Isotope(isotopeItem.querySelector(".isotope-container"), {
      itemSelector: ".isotope-item",
      layoutMode: layout,
      filter: filter,
      sortBy: sort,
      transitionDuration: "0.6s",
    });

    const checkEmptyResult = () => {
      const filteredItems = initIsotope.filteredItems.length;
      const noDataMessage = isotopeItem.querySelector(".no-data-message");
      if (filteredItems === 0) {
        noDataMessage.style.display = "block";
      } else {
        noDataMessage.style.display = "none";
      }
    };

    checkEmptyResult();

    // Filter functionality
    isotopeItem
      .querySelectorAll(".isotope-filters li")
      .forEach(function (filters) {
        filters.addEventListener(
          "click",
          function () {
            isotopeItem
              .querySelector(".isotope-filters .filter-active")
              .classList.remove("filter-active");
            this.classList.add("filter-active");
            initIsotope.arrange({
              filter: this.getAttribute("data-filter"),
            });

            if (typeof aosInit === "function") {
              aosInit();
            }

            checkEmptyResult();
            updatePagination();
          },
          false
        );
      });

    // Search functionality
    const searchButton = document.querySelector(
      ".input-group button#button-addon2"
    );
    const searchInput = document.querySelector(
      '.input-group input[placeholder="Type here..."]'
    );

    searchButton.addEventListener("click", function () {
      executeSearch();
    });

    searchInput.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {  
        executeSearch();
      }
    });

    function executeSearch() {
      const searchText = searchInput.value.toLowerCase();
      const items = initIsotope.getFilteredItemElements();

      initIsotope.arrange({
        filter: function (itemElem) {
          const title = itemElem
            .querySelector(".card-title")
            .textContent.toLowerCase();
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



  });
});
