// Mengecek apakah tampilan saat ini adalah tampilan mobile
function isMobileView() {
    return window.innerWidth <= 768; // Ubah ukuran sesuai dengan kebutuhan Anda
}

// Mengubah status navbar menjadi ditutup saat mengklik halaman
function closeNavbarOnPageClick() {
    if (isMobileView()) {
        var navbar = document.getElementById('navbar'); // Ganti 'navbar' dengan ID navbar Anda

        document.addEventListener('click', function (event) {
            var target = event.target;
            var isNavbarItem = target.closest('#navbar') !== null;

            if (!isNavbarItem) {
                // Klik di luar navbar, tutup navbar
                navbar.style.display = 'none';
            }
        });
    }
}

// Memanggil fungsi ketika halaman dimuat
window.onload = function () {
    closeNavbarOnPageClick();
};
