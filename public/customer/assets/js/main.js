"use strict";

/*============================================ 
======== Table of JS Functions =========
# modal toggle function
# select item from modal
# Active menu color
# Active Submenu Color
# toggle password
# header position set
# Scroll to top functionality
# Mobile Menu Toggle
# Header Active Menu Color
# professional service slider
# Circle text
# Faq Toggle
# odometer in view function
# Location Modal 
# Services Modal 
# How it works steps
# find worker filter modal
# chat sidebar toggle
# comment reply
# Header Active Menu Color
# Header Profile Modal
# Header Notification Modal
# calendar
# Weekly Work Modal 
# Total Earning Modal 
# Show Hide Password
============================================*/

document.addEventListener("DOMContentLoaded", function () {

  /*
===============================================================
=> Reusable Functions Start
===============================================================
  */
// modal toggle function
function modalToggle(modalName,modalBox){

  modalName.addEventListener('click',()=>{

    if(modalBox.classList.contains('modalOpen')){
      modalBox.classList.remove('modalOpen')
      modalBox.classList.add('modalClose')
      document.removeEventListener("click", closeDropdownOutside);
    }else{
      modalBox.classList.add('modalOpen')
      modalBox.classList.remove('modalClose')
      document.addEventListener("click", closeDropdownOutside);
    }

    function closeDropdownOutside(event) {
      const isClickedInsideDropdown = modalBox.contains(event.target);
      const isClickedOnDropdownBtn = modalName.contains(event.target);
      
      if (!isClickedInsideDropdown && !isClickedOnDropdownBtn) {
        modalBox.classList.add("modalClose");
        modalBox.classList.remove("modalOpen");
        document.removeEventListener("click", closeDropdownOutside);
      }
    }
  })
}

//select item from modal
function selectItemFromModal(items,modalBox,slectText){
  items.forEach((e)=> e.addEventListener('click',()=> {
    modalBox.classList.remove('modalClose')
    modalBox.classList.add('modalOpen')
    slectText.innerHTML = e.textContent
    }))
}

// Active menu color
const path = location.pathname
function activeMenuColor(menuItems,activeClassName){
  menuItems.forEach((menuItem) => {
    const href = menuItem.getAttribute("href");
    
    // Extract base URL from href by removing './' and everything after the last '/'
    const newBaseUrl = href.replace("./", "").replace(/\/[^\/]*$/, "");
  
    if (path.endsWith(newBaseUrl)) {
      menuItem.classList.add(activeClassName);
    }
  });
}
// Active Submenu Color
function activeSubmenuColor(subMenuItems,subMenuTitle, activeSubmenuClass,activeSubmenuTitleClass){
  subMenuItems.forEach((subMenuItem) => {
    const href = subMenuItem.getAttribute("href");
    
    // Extract base URL from href by removing './' and everything after the last '/'
    const newBaseUrl = href.replace("./", "").replace(/\/[^\/]*$/, "");
  
    if (path.endsWith(newBaseUrl)) {
      subMenuItem.classList.add(activeSubmenuClass);
  
      const parentDiv = subMenuItem.closest("div")
  
      parentDiv.querySelector(subMenuTitle).classList.add(activeSubmenuTitleClass)
      
    }
  });
}


// toggle password
function togglePassoword(togglePass, togglePassButton ){
  togglePassButton.addEventListener('click',()=> {
    if(togglePass.type === 'password'){
      togglePass.type = 'text'
      togglePassButton.classList.remove('ph-eye-slash')
      togglePassButton.classList.add('ph-eye')
    }else{
      togglePass.type = 'password'
      togglePassButton.classList.add('ph-eye-slash')
      togglePassButton.classList.remove('ph-eye')
    }
  })
}


  /*
===============================================================
=> Reusable Functions End
===============================================================
  */

// header position set
const scrollButton = document.querySelector(".scrollButton")
window.addEventListener('scroll', function() {
    const mainHeader = document.querySelector(".header")
    if(mainHeader){
      if(window.scrollY > 100) {

        mainHeader.classList.add("headerFixed")
        mainHeader.classList.remove("headerAbsolute")
      }else {
        mainHeader.classList.add("headerAbsolute")
        mainHeader.classList.remove("headerFixed")
      }
    }

    if(scrollButton){
      if(window.scrollY > 200) {
        scrollButton.classList.remove("scrollButtonHide")
        scrollButton.classList.add("scrollButtonShow")
      }else {
        scrollButton.classList.remove("scrollButtonShow")
        scrollButton.classList.add("scrollButtonHide")
      }
    }
    
  });

  if(scrollButton){
    if(window.scrollY > 200) {
      scrollButton.classList.remove("scrollButtonHide")
      scrollButton.classList.add("scrollButtonShow")
    }else {
      scrollButton.classList.remove("scrollButtonShow")
      scrollButton.classList.add("scrollButtonHide")
    }
  }

  // Scroll to top functionality
scrollButton && scrollButton.addEventListener("click",()=> {
  window.scrollTo({ top: 0, behavior: "smooth" });
})

  // Mobile Menu Toggle
  const mobileMenuOpenButton = document.querySelector(".mobileMenuOpenButton")

  mobileMenuOpenButton && mobileMenuOpenButton.addEventListener("click", () => {
    const mobileMenuBg = document.querySelector(".mobileMenuBg")
    const mobileMenu = document.querySelector(".mobileMenu")

    mobileMenuBg.classList.add("mobileMenuBgOpen")
    mobileMenuBg.classList.remove("mobileMenuBgClose")

    mobileMenu.classList.add("mobileMenuOpen")
    mobileMenu.classList.remove("mobileMenuClose")

  })

  const mobileMenuCloseButton = document.querySelector(".mobileMenuCloseButton")

  mobileMenuCloseButton && mobileMenuCloseButton.addEventListener("click", () => {
    const mobileMenuBg = document.querySelector(".mobileMenuBg")
    const mobileMenu = document.querySelector(".mobileMenu")

    mobileMenuBg.classList.remove("mobileMenuBgOpen")
    mobileMenuBg.classList.add("mobileMenuBgClose")

    mobileMenu.classList.remove("mobileMenuOpen")
    mobileMenu.classList.add("mobileMenuClose")

  })

  const mobileSubMenu = document.querySelectorAll(".subMenuToggle")

  mobileSubMenu &&  mobileSubMenu.forEach((el)=> el.addEventListener("click", () => {
    const activeSubMenu = document.querySelector(".subMenuOpen")
    const toggleClass = el.querySelector(".subMenu")

    if(toggleClass.classList.contains("subMenuOpen")){
      toggleClass.classList.add("subMenuClose")
    toggleClass.classList.remove("subMenuOpen")
    }else{
      activeSubMenu?.classList.remove("subMenuOpen")
      activeSubMenu?.classList.add("subMenuClose")
      toggleClass.classList.remove("subMenuClose")
      toggleClass.classList.add("subMenuOpen")
    }
  }))

  //Header Active Menu Color
const menuList = document.querySelectorAll(".menuList");
const mobileMenuList = document.querySelectorAll(".mobileMenuList");
menuList && activeMenuColor(menuList,"activeHeaderMenu")

const subMenuTitle = document.querySelectorAll(".subMenuTitle")
const subMenuItem = document.querySelectorAll(".subMenuItem")
const mobileSubMenuTitle = document.querySelectorAll(".mobileSubMenuTitle")
const mobileSubMenuItem = document.querySelectorAll(".mobileSubMenuItem")


subMenuTitle && activeSubmenuColor(subMenuItem,'.subMenuTitle', 'text-y300','text-b300')

mobileSubMenuTitle && activeSubmenuColor(mobileSubMenuItem,'.mobileSubMenuTitle', 'underline','underline')



  // professional service slider
  const serviceSlider = document.querySelectorAll(".professionalService")
  const professionalServiceButton = document.querySelectorAll(".professionalServiceButton")

  professionalServiceButton && professionalServiceButton.forEach((el)=> el.addEventListener("click", ()=> {
    const existingActiveTab = document.querySelector(".professionalServiceActiveButton")

    if(el.classList.contains("professionalServiceActiveButton")){
      
    }else{
      existingActiveTab?.classList.remove("professionalServiceActiveButton")
      el.classList.add("professionalServiceActiveButton")
    }

const tabName = el.innerText.toLowerCase().replaceAll(" ","-")
const existingTab = document.querySelector(".activeTab")


if(tabName !== existingActiveTab.innerText.toLowerCase()){
 const tab = document.querySelector(`#${tabName}`)
 existingTab.classList.remove("activeTab")
 existingTab.classList.add("hiddenTab")

  tab.classList.remove("hiddenTab")
  tab.classList.add("activeTab")
}
  }))


  // Circle text
  const cirleText = document.querySelector(".circleText");
  if(cirleText !== null) {
    cirleText.innerHTML = cirleText.innerText
	.split("")
	.map(
		(char, i) => `<span class="absolute left-1/2 origin-[0_75px]" style="transform:rotate(${i * 12.3}deg)">${char}</span>`
	)
	.join("");
  }


//Faq Toggle

const faqItems = document.querySelectorAll(".faqItem")


faqItems && faqItems.forEach((el)=> el.addEventListener("click",()=> {
  const faqAnswer = el.querySelector(".faqAnswer")
  const faqIcon = el.querySelector(".faqIcon")
  //active faq item
  const activeFaqItem = document.querySelector(".faqItemOpen")
  const activeAnswer = document.querySelector(".faqOpen")
  const activeFaqIcon = document.querySelector(".faqIconRotate")

  if(el.classList.contains("faqItemOpen")){
    faqAnswer.classList.remove("faqOpen")
    faqAnswer.classList.add("faqClose")

    faqIcon.classList.remove("faqIconRotate")

    el.classList.remove("faqItemOpen")
  }else {
    activeFaqItem?.classList.remove("faqItemOpen")
    activeAnswer?.classList.remove("faqOpen")
    activeAnswer?.classList.add("faqClose")

    activeFaqIcon?.classList.remove("faqIconRotate")

    faqAnswer.classList.remove("faqClose")
    faqAnswer.classList.add("faqOpen")

    faqIcon.classList.add("faqIconRotate")
    el.classList.add("faqItemOpen")
  }
}))


//odometer in view function
const odometerElement = document.querySelectorAll(".odometer")

odometerElement && odometerElement.forEach((el) => {
  const odometerElementHeight = el.clientHeight
  
  document.addEventListener('scroll', odometerFunction)

  function inView() {
    const windowHeight = window.innerHeight;
    const scrollY = window.scrollY
    const scrollPosition = scrollY + windowHeight;
    // get element position (distance from the top of the page to the bottom of the element)
    const elementPosition = el.getBoundingClientRect().top + scrollY + odometerElementHeight;
    
    // is scroll position greater than element position? (is element in view?)
    if (scrollPosition > elementPosition) {
      return true;
    }
    return false;
  }

  function odometerFunction() {
    // is element in view?
    if (inView()) {
      el.textContent = el.getAttribute("data-odometer-final");
    }
  }
})


// Location Modal 
const locationModalOpenButton = document.querySelector('#locationModalOpenButton')
const locationModal = document.querySelector('#locationModal')
const locationItem = document.querySelectorAll('.locationItem')
const locationText = document.querySelector('.locationText')

locationModalOpenButton && modalToggle(locationModalOpenButton,locationModal)
locationItem && selectItemFromModal(locationItem,locationModal,locationText)

// Services Modal 
const servicesModalOpenButton = document.querySelector('#servicesModalOpenButton')
const servicesModal = document.querySelector('#servicesModal')
const serviceItem = document.querySelectorAll('.serviceItem')
const serviceText = document.querySelector('.serviceText')

servicesModalOpenButton && modalToggle(servicesModalOpenButton,servicesModal)
serviceItem && selectItemFromModal(serviceItem,servicesModal,serviceText)


  // How it works steps
const stepButtons = document.querySelectorAll('.stepsButton')

  const step1 = document.querySelector('#step1')
  const step2 = document.querySelector('#step2')
  const step3 = document.querySelector('#step3')

  const stepOneData = document.querySelector('#step_one_data')
  const stepTwoData = document.querySelector('#step_two_data')
  const stepThreeData = document.querySelector('#step_three_data')

 stepButtons && stepButtons.forEach((e)=> e.addEventListener('click', ()=> {
  const activeTab = document.querySelector('.activeTab')
  const activeTabButton = document.querySelector('.activeButton')

  activeTab?.classList.remove('activeTab')
      activeTab?.classList.add('hiddenTab')
      activeTabButton?.classList.remove('activeButton')
      activeTabButton?.classList.add('inActiveButton')

  if(e.id === 'step1'){
      stepOneData.classList.add('activeTab')
      stepOneData.classList.remove('hiddenTab')
      step1.classList.add('activeButton')
      step1.classList.remove('inActiveButton')
      
  }
  if(e.id === 'step2'){
    stepTwoData.classList.remove('hiddenTab')
    stepTwoData.classList.add('activeTab')
    step2.classList.add('activeButton')
    step2.classList.remove('inActiveButton')

  }

  if(e.id === 'step3'){
    stepThreeData.classList.remove('hiddenTab')
    stepThreeData.classList.add('activeTab')
    step3.classList.add('activeButton')
    step3.classList.remove('inActiveButton')
  }

}))

// find worker filter modal
const filterButton = document.querySelector('#filterButton')
const filterButtonClose = document.querySelector('#filterModalCloseButton')
const filterModalBg = document.querySelector('#filterModalBg')
const filterModal = document.querySelector('#filterModal')
 
filterButton && filterButton.addEventListener('click',() => {
filterModalBg.classList.remove('filterModalBgClose')
filterModalBg.classList.add('filterModalBgOpen')

filterModal.classList.remove('filterModalClose')
filterModal.classList.add('filterModalOpen')
})

filterModal && filterButtonClose.addEventListener('click',()=> {
  filterModalBg.classList.add('filterModalBgClose')
filterModalBg.classList.remove('filterModalBgOpen')

filterModal.classList.add('filterModalClose')
filterModal.classList.remove('filterModalOpen')
})

// chat sidebar toggle

const chatSidebar = document.querySelector('#chatSidebar')
const chatSidebarClose = document.querySelector('#chatSidebarClose')
const chatSidebarOpen = document.querySelector('#chatSidebarOpen')

chatSidebar && chatSidebarOpen.addEventListener('click',()=> {
  chatSidebar.classList.add('chatSidebarOpen')
  chatSidebar.classList.remove('chatSidebarClose')
})

chatSidebar && chatSidebarClose.addEventListener('click',()=> {
  chatSidebar.classList.remove('chatSidebarOpen')
  chatSidebar.classList.add('chatSidebarClose')
})


// comment reply
const replyButton1 = document.querySelector('#replyButton1')
const replyBox1 = document.querySelector('#replyBox1')

replyButton1 && replyButton1.addEventListener('click',()=> {
  if(replyBox1.classList.contains('closeReplyBox')){
    replyBox1.classList.add('openReplyBox')
  replyBox1.classList.remove('closeReplyBox')
  }else{
    replyBox1.classList.remove('openReplyBox')
  replyBox1.classList.add('closeReplyBox')
  }
})


const replyButton2 = document.querySelector('#replyButton2')
const replyBox2 = document.querySelector('#replyBox2')

replyButton2 && replyButton2.addEventListener('click',()=> {
  if(replyBox2.classList.contains('closeReplyBox')){
    replyBox2.classList.add('openReplyBox')
  replyBox2.classList.remove('closeReplyBox')
  }else{
    replyBox2.classList.remove('openReplyBox')
  replyBox2.classList.add('closeReplyBox')
  }
})

const replyButton3 = document.querySelector('#replyButton3')
const replyBox3 = document.querySelector('#replyBox3')

replyButton3 && replyButton3.addEventListener('click',()=> {
  if(replyBox3.classList.contains('closeReplyBox')){
    replyBox3.classList.add('openReplyBox')
  replyBox3.classList.remove('closeReplyBox')
  }else{
    replyBox3.classList.remove('openReplyBox')
  replyBox3.classList.add('closeReplyBox')
  }
})

/*
=====================================================
=> Dashborad Functionalities Start
=====================================================
*/

//Header Active Menu Color
const dashboradMenuList = document.querySelectorAll(".dashboardMenu");
const dashboradMobileMenuList = document.querySelectorAll(".dashboardMobileMenu");
dashboradMenuList && activeMenuColor(dashboradMenuList,"activeDashboardHeaderMenu")

dashboradMobileMenuList && activeMenuColor(dashboradMobileMenuList,"activeDashboardHeaderMobileMenu")

// Header Profile Modal
const profileIcon = document.querySelector('#profileIcon')
const profileModal = document.querySelector('#profileModal')

profileIcon && modalToggle(profileIcon,profileModal)

//Header Notification Modal
const notification = document.querySelector('#notification')
const notificationModal = document.querySelector('#notificationModal')

notification && modalToggle(notification,notificationModal)


// calendar
const daysTag = document.querySelector(".days");
const currentDate = document.querySelector(".current-date");
const prevNextIcon = document.querySelectorAll(".icons span");

let currYear = new Date().getFullYear();
let currMonth = new Date().getMonth();

 const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const renderCalendar = () => {
  const date = new Date(currYear, currMonth, 1);
  let firstDayofMonth = date.getDay();
  let lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate();
  let lastDayofMonth = new Date(
    currYear,
    currMonth,
    lastDateofMonth,
  ).getDay();
  let lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();

  let liTag = "";

  for (let i = firstDayofMonth; i > 0; i--) {
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) {
    let isToday =
      i === new Date().getDate() &&
      currMonth === new Date().getMonth() &&
      currYear === new Date().getFullYear()
        ? "active"
        : "";
    liTag += `<li class="${isToday}">${i}</li>`;
  }

  for (let i = lastDayofMonth; i < 6; i++) {
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
  }

  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;
};
 
currentDate && renderCalendar();

currentDate && prevNextIcon.forEach((icon) => {
  icon.addEventListener("click", () => {
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0 || currMonth > 11) {
      currYear = icon.id === "prev" ? currYear - 1 : currYear + 1;
      currMonth = currMonth < 0 ? 11 : 0;
    }

    renderCalendar();
  });
});


// Weekly Work Modal 
const monthModalButton1 = document.querySelector('#monthModalButton1')
const monthModal1 = document.querySelector('#monthModal1')
const month1 = document.querySelectorAll('.month1')
const selectMonth1 = document.querySelector('.selectMonth1')

monthModalButton1 && modalToggle(monthModalButton1,monthModal1)
month1 && selectItemFromModal(month1,monthModal1,selectMonth1)

// Total Earning Modal 
const monthModalButton2 = document.querySelector('#monthModalButton2')
const monthModal2 = document.querySelector('#monthModal2')
const month2 = document.querySelectorAll('.month2')
const selectMonth2 = document.querySelector('.selectMonth2')

monthModalButton1 && modalToggle(monthModalButton2,monthModal2)
month2 && selectItemFromModal(month2,monthModal2,selectMonth2)

// Show Hide Password
const oldPassword =  document.querySelector('#oldPassword')
const newPassword =  document.querySelector('#newPassword')
const confirmNewPassword =  document.querySelector('#confirmNewPassword')

const toggleOldPasswordButton = document.querySelector('#toggleOldPasswordButton')
const toggleNewPasswordButton = document.querySelector('#toggleNewPasswordButton')
const toggleConfirmNewPasswordButton = document.querySelector('#toggleConfirmNewPasswordButton')

toggleOldPasswordButton && togglePassoword(oldPassword, toggleOldPasswordButton)
toggleNewPasswordButton && togglePassoword(newPassword, toggleNewPasswordButton)
toggleConfirmNewPasswordButton && togglePassoword(confirmNewPassword, toggleConfirmNewPasswordButton)


});