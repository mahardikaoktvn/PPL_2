function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isVerifikasiOpen: false,
    toggleVerifikasiMenu() {
      this.isVerifikasiOpen = !this.isVerifikasiOpen
    },
    closeVerifikasi() {
      this.isVerifikasiOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    // Modal MOU
    isModalMOUOpen: false,
    trapCleanup: null,
    openModalMOU() {
      this.isModalMOUOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalMOU'))
    },
    closeModalMOU() {
      this.isModalMOUOpen = false
      this.trapCleanup()
    },
    // Modal Prediksi
    isModalPrediksiOpen: false,
    trapCleanup: null,
    openModalPrediksi() {
      this.isModalPrediksiOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalPrediksi'))
    },
    closeModalPrediksi() {
      this.isModalPrediksiOpen = false
      this.trapCleanup()
    },
    //Modal Bukti Pembayaran
    isModalBuktiPembayaranOpen: false,
    trapCleanup: null,
    openModalBuktiPembayaran() {
      this.isModalBuktiPembayaranOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalBuktiPembayaran'))
    },
    closeModalBuktiPembayaran() {
      this.isModalBuktiPembayaranOpen = false
      this.trapCleanup()
    },
  }
}
