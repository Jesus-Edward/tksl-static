/* =====================================================
   ADMINPRO
   Main JavaScript
===================================================== */

document.addEventListener("DOMContentLoaded", function () {
  /* =================================================
       ELEMENTS
    ================================================= */

  const body = document.body;

  const sidebar = document.getElementById("sidebar");

  const desktopToggle = document.getElementById("desktopSidebarToggle");

  const collapseButton = document.getElementById("sidebarCollapseBtn");

  const mobileMenu = document.getElementById("mobileMenuBtn");

  const overlay = document.getElementById("sidebarOverlay");

  const sidebarLinks = document.querySelectorAll(".sidebar .nav-link");

  const pageSections = document.querySelectorAll(".page-section");

  /* =================================================
       SIDEBAR COLLAPSE
    ================================================= */

  const savedSidebarState = localStorage.getItem("adminSidebarCollapsed");

  if (savedSidebarState === "true") {
    body.classList.add("sidebar-collapsed");
  }

  updateSidebarIcons();

  /*
   * Toggle sidebar
   */

  function toggleSidebar() {
    body.classList.toggle("sidebar-collapsed");

    const isCollapsed = body.classList.contains("sidebar-collapsed");

    localStorage.setItem("adminSidebarCollapsed", isCollapsed);

    updateSidebarIcons();
  }

  /*
   * Desktop toggle
   */

  if (desktopToggle) {
    desktopToggle.addEventListener("click", toggleSidebar);
  }

  /*
   * Bottom collapse button
   */

  if (collapseButton) {
    collapseButton.addEventListener("click", toggleSidebar);
  }

  /*
   * Update icons
   */

  function updateSidebarIcons() {
    const isCollapsed = body.classList.contains("sidebar-collapsed");

    const desktopIcon = desktopToggle?.querySelector("i");

    const collapseIcon = collapseButton?.querySelector("i");

    if (isCollapsed) {
      if (desktopIcon) {
        desktopIcon.className = "bi bi-layout-sidebar-inset";
      }

      if (collapseIcon) {
        collapseIcon.className = "bi bi-chevron-right";
      }

      if (collapseButton) {
        collapseButton.title = "Expand sidebar";
      }
    } else {
      if (desktopIcon) {
        desktopIcon.className = "bi bi-layout-sidebar-inset-reverse";
      }

      if (collapseIcon) {
        collapseIcon.className = "bi bi-chevron-left";
      }

      if (collapseButton) {
        collapseButton.title = "Collapse sidebar";
      }
    }
  }

  /* =================================================
       MOBILE SIDEBAR
    ================================================= */

  /*
   * Open
   */

  if (mobileMenu) {
    mobileMenu.addEventListener("click", function () {
      sidebar.classList.add("open");

      overlay.classList.add("show");
    });
  }

  /*
   * Close
   */

  function closeMobileSidebar() {
    sidebar.classList.remove("open");

    overlay.classList.remove("show");
  }

  if (overlay) {
    overlay.addEventListener("click", closeMobileSidebar);
  }

  /* =================================================
       PAGE NAVIGATION
    ================================================= */

  /*
   * Page names
   */

  const pageNames = {
    dashboard: "Dashboard",

    customers: "Customers",

    orders: "Orders",

    analytics: "Analytics",

    products: "Products",

    payments: "Payments",

    settings: "Settings",

    notifications: "Notifications",
  };

  /*
   * Show page
   */

  // function showPage(page) {

  //     /*
  //      * Profile is a special page.
  //      */

  //     if (page === "profile") {

  //         showSection(
  //             "page-profile"
  //         );

  //         return;

  //     }

  //     /*
  //      * Dashboard
  //      */

  //     if (page === "dashboard") {

  //         showSection(
  //             "page-dashboard"
  //         );

  //         return;

  //     }

  //     /*
  //      * Everything else uses
  //      * the placeholder for now.
  //      */

  //     showSection(
  //         "page-placeholder"
  //     );

  //     const title =
  //         document.getElementById(
  //             "placeholderTitle"
  //         );

  //     const text =
  //         document.getElementById(
  //             "placeholderText"
  //         );

  //     if (title) {

  //         title.textContent =
  //             pageNames[page] ||
  //             "Page";

  //     }

  //     if (text) {

  //         text.textContent =
  //             "The " +
  //             (
  //                 pageNames[page] ||
  //                 "requested"
  //             ) +
  //             " section is ready for your content.";

  //     }

  // }

  /*
   * Show specific section
   */

  // function showSection(id) {

  //     pageSections.forEach(
  //         function (section) {

  //             section.classList.add(
  //                 "d-none"
  //             );

  //         }
  //     );

  //     const target =
  //         document.getElementById(id);

  //     if (target) {

  //         target.classList.remove(
  //             "d-none"
  //         );

  //     }

  //    }

  /*
   * Update active sidebar item
   */

  // function updateActiveLink(page) {

  //     sidebarLinks.forEach(
  //         function (link) {

  //             link.classList.remove(
  //                 "active"
  //             );

  //             if (
  //                 link.dataset.page === page
  //             ) {

  //                 link.classList.add(
  //                     "active"
  //                 );

  //             }

  //         }
  //     );

  // }

  var currentPath = window.location.pathname.replace(/\/+$/, "");

  $(".sidebar .sidebar-nav").removeClass("active");

  $(".sidebar .sidebar-nav a").each(function () {
    var $this = $(this);

    var linkPath = new URL(this.href, window.location.origin).pathname.replace(
      /\/+$/,
      "",
    );

    if (linkPath === currentPath) {
      $this.addClass("active");
    }
  });

//   const brand = document.querySelector(".brand");
//   const collapseBtn = document.getElementById("desktopSidebarToggle");

//   collapseBtn.addEventListener("click", function () {
//     body.classList.toggle("sidebar-collapsed");

//     brand.classList.toggle(
//       "brand-icon",
//       body.classList.contains("sidebar-collapsed"),
//     );
//   });

  /*
   * Navigate
   */

  // function navigateTo(page) {

  //     /*
  //      * Don't update sidebar active
  //      * state for profile/settings
  //      * when the profile dropdown
  //      * is being used.
  //      */

  //     updateActiveLink(page);

  //     showPage(page);

  //     closeMobileSidebar();

  //     /*
  //      * Update URL
  //      */

  //     if (
  //         window.location.hash !==
  //         "#" + page
  //     ) {

  //         history.pushState(
  //             {
  //                 page: page
  //             },
  //             "",
  //             "#" + page
  //         );

  //     }

  // }

  /*
   * Sidebar links
   */

  // sidebarLinks.forEach(
  //     function (link) {

  //         link.addEventListener(
  //             "click",
  //             function (event) {

  //                 event.preventDefault();

  //                 const page =
  //                     this.dataset.page;

  //                 navigateTo(page);

  //             }
  //         );

  //     }
  // );

  /*
   * Dropdown links
   */

  // const dropdownPageLinks =
  //     document.querySelectorAll(
  //         ".dropdown-item[data-page]"
  //     );

  // dropdownPageLinks.forEach(
  //     function (link) {

  //         link.addEventListener(
  //             "click",
  //             function (event) {

  //                 event.preventDefault();

  //                 const page =
  //                     this.dataset.page;

  //                 navigateTo(page);

  //             }
  //         );

  //     }
  // );

  /*
   * Back to dashboard
   */

  // const backToDashboard =
  //     document.getElementById(
  //         "backToDashboard"
  //     );

  // if (backToDashboard) {

  //     backToDashboard.addEventListener(
  //         "click",
  //         function () {

  //             navigateTo(
  //                 "dashboard"
  //             );

  //         }
  //     );

  // }

  /*
   * Browser back / forward
   */

  // window.addEventListener(
  //     "popstate",
  //     function () {

  //         loadPageFromHash();

  //     }
  // );

  // /*
  //  * Load current hash
  //  */

  // function loadPageFromHash() {

  //     let page =
  //         window.location.hash
  //             .replace("#", "")
  //             .trim();

  //     if (!page) {

  //         page =
  //             "dashboard";

  //     }

  //     showPage(page);

  //     /*
  //      * Only activate matching
  //      * sidebar link.
  //      */

  //     updateActiveLink(page);

  // }

  // loadPageFromHash();

  /* =================================================
       DATATABLE
    ================================================= */

  if (document.getElementById("customersTable")) {
    new DataTable("#customersTable", {
      pageLength: 10,

      lengthMenu: [
        [10, 25, 50, 100],

        [10, 25, 50, 100],
      ],

      order: [[6, "desc"]],

      columnDefs: [
        {
          orderable: false,
          targets: [7],
        },
      ],

      language: {
        search: "",

        searchPlaceholder: "Search customers...",
      },
    });
  }

  /* =================================================
       PASSWORD VISIBILITY
    ================================================= */

  const passwordToggles = document.querySelectorAll(".password-toggle");

  passwordToggles.forEach(function (button) {
    button.addEventListener("click", function () {
      const targetId = this.dataset.target;

      const input = document.getElementById(targetId);

      const icon = this.querySelector("i");

      if (!input) {
        return;
      }

      if (input.type === "password") {
        input.type = "text";

        icon.classList.remove("bi-eye");

        icon.classList.add("bi-eye-slash");
      } else {
        input.type = "password";

        icon.classList.remove("bi-eye-slash");

        icon.classList.add("bi-eye");
      }
    });
  });

  /* =================================================
       PASSWORD VALIDATION
    ================================================= */

  const newPassword = document.getElementById("newPassword");

  if (newPassword) {
    newPassword.addEventListener("input", function () {
      const password = this.value;

      updateRequirement("lengthRequirement", password.length >= 8);

      updateRequirement("uppercaseRequirement", /[A-Z]/.test(password));

      updateRequirement("numberRequirement", /[0-9]/.test(password));

      updateRequirement("specialRequirement", /[^A-Za-z0-9]/.test(password));
    });
  }

  function updateRequirement(id, valid) {
    const element = document.getElementById(id);

    if (!element) {
      return;
    }

    const icon = element.querySelector("i");

    if (valid) {
      element.classList.add("valid");

      if (icon) {
        icon.className = "bi bi-check-circle-fill";
      }
    } else {
      element.classList.remove("valid");

      if (icon) {
        icon.className = "bi bi-circle";
      }
    }
  }

  /* =================================================
       PASSWORD FORM
    ================================================= */

  // const passwordForm =
  //     document.getElementById(
  //         "passwordForm"
  //     );

  // if (passwordForm) {

  //     passwordForm.addEventListener(
  //         "submit",
  //         function (event) {

  //             event.preventDefault();

  //             const currentPassword =
  //                 document.getElementById(
  //                     "currentPassword"
  //                 ).value;

  //             const newPasswordValue =
  //                 document.getElementById(
  //                     "newPassword"
  //                 ).value;

  //             const confirmPassword =
  //                 document.getElementById(
  //                     "confirmPassword"
  //                 ).value;

  //             if (!currentPassword) {

  //                 alert(
  //                     "Please enter your current password."
  //                 );

  //                 return;

  //             }

  //             if (
  //                 newPasswordValue.length < 8
  //             ) {

  //                 alert(
  //                     "Your new password must contain at least 8 characters."
  //                 );

  //                 return;

  //             }

  //             if (
  //                 !/[A-Z]/.test(
  //                     newPasswordValue
  //                 )
  //             ) {

  //                 alert(
  //                     "Your new password must contain an uppercase letter."
  //                 );

  //                 return;

  //             }

  //             if (
  //                 !/[0-9]/.test(
  //                     newPasswordValue
  //                 )
  //             ) {

  //                 alert(
  //                     "Your new password must contain a number."
  //                 );

  //                 return;

  //             }

  //             if (
  //                 !/[^A-Za-z0-9]/.test(
  //                     newPasswordValue
  //                 )
  //             ) {

  //                 alert(
  //                     "Your new password must contain a special character."
  //                 );

  //                 return;

  //             }

  //             if (
  //                 newPasswordValue !==
  //                 confirmPassword
  //             ) {

  //                 alert(
  //                     "The new passwords do not match."
  //                 );

  //                 return;

  //             }

  //             /*
  //              * Replace this with your
  //              * backend/API request.
  //              *
  //              * Example:
  //              *
  //              * fetch('/admin/password/update', {
  //              *     method: 'POST',
  //              *     headers: {
  //              *         'Content-Type': 'application/json'
  //              *     },
  //              *     body: JSON.stringify({
  //              *         current_password:
  //              *             currentPassword,
  //              *         new_password:
  //              *             newPasswordValue
  //              *     })
  //              * });
  //              */

  //             alert(
  //                 "Password updated successfully."
  //             );

  //             passwordForm.reset();

  //             /*
  //              * Reset requirement indicators.
  //              */

  //             [
  //                 "lengthRequirement",
  //                 "uppercaseRequirement",
  //                 "numberRequirement",
  //                 "specialRequirement"
  //             ].forEach(
  //                 function (id) {

  //                     updateRequirement(
  //                         id,
  //                         false
  //                     );

  //                 }
  //             );

  //         }
  //     );

  // }

  /* =================================================
       PROFILE FORM
    ================================================= */

  // const profileForm =
  //     document.getElementById(
  //         "profileForm"
  //     );

  // if (profileForm) {

  //     profileForm.addEventListener(
  //         "submit",
  //         function (event) {

  //             event.preventDefault();

  //             /*
  //              * Replace this with your
  //              * actual API/backend request.
  //              *
  //              * Example:
  //              *
  //              * const formData =
  //              *     new FormData(profileForm);
  //              *
  //              * fetch('/admin/profile/update', {
  //              *     method: 'POST',
  //              *     body: formData
  //              * });
  //              */

  //             alert(
  //                 "Profile information updated successfully."
  //             );

  //         }
  //     );

  // }

  /* =================================================
       CANCEL PROFILE
    ================================================= */

  const cancelProfile = document.getElementById("cancelProfile");

  if (cancelProfile) {
    cancelProfile.addEventListener("click", function () {
      if (profileForm) {
        profileForm.reset();
      }
    });
  }

  /* =================================================
       CHANGE PROFILE PHOTO
    ================================================= */

  const changePhotoBtn = document.getElementById("changePhotoBtn");

  const changePhotoIcon = document.getElementById("changePhotoIcon");

  function changePhoto() {
    /*
     * Replace this with an actual
     * image upload modal/file input.
     */

    alert("Connect this button to your profile image upload.");
  }

  if (changePhotoBtn) {
    changePhotoBtn.addEventListener("click", changePhoto);
  }

  if (changePhotoIcon) {
    changePhotoIcon.addEventListener("click", changePhoto);
  }

  /* =================================================
       LOGOUT
    ================================================= */

  const logoutBtn = document.getElementById("logoutBtn");

  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (event) {
      event.preventDefault();

      const confirmed = confirm("Are you sure you want to logout?");

      if (!confirmed) {
        return;
      }

      /*
       * Replace with your actual
       * logout endpoint.
       *
       * Example:
       *
       * window.location.href =
       *     "/logout";
       */

      console.log("Logging out...");
    });
  }

  /* =================================================
       WINDOW RESIZE
    ================================================= */

  window.addEventListener("resize", function () {
    /*
     * When returning from mobile
     * to desktop, close the mobile
     * sidebar overlay.
     */

    if (window.innerWidth > 991) {
      closeMobileSidebar();
    }
  });
});
