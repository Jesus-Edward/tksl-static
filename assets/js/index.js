
document.querySelectorAll('#myNav .nav-link').forEach(link => {
    // console.log(link.href)
    console.log(window.location.href)
    if (link.href === window.location.href) {
        link.classList.add('active');
    } else {
        link.classList.remove('active');
    }
});

// document.querySelectorAll('.sidebar a').forEach(link => {
//   if (link.href === window.location.href) {
//     link.classList.add('active');
//   }
// });

