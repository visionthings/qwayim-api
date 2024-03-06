// pre loader
document.addEventListener("DOMContentLoaded", function () {
    var spinnerloader = document.querySelector(".loader-container");
    spinnerloader.style.display = "none";
    document.body.style.overflowY = "auto";
});
// side bar resposive toggle
let sidebarOpen = true;
let notificationOpen = false;

const sidebar = document.querySelector('.side-menu');
const notification = document.querySelector('.notification');
const content = document.querySelector('.main');
const nav = document.querySelector('.nav');
const navhead = document.querySelector('#navhead');
function toggleSidebar() {
    if (window.innerWidth <= 767) {
        if (notificationOpen) {
            toggleNotification();
        }
        if (sidebarOpen) {
            sidebar.style.right = '-50vw';
            content.style.right = '0';
            content.classList.remove('black-and-white');
            nav.style.right = '0';
            navhead.style.display='inline-block';
        } else {
            sidebar.style.right = '0';
            content.style.right = '0';
            content.classList.add('black-and-white');
            nav.style.right = '50vw';
            navhead.style.display='none';
        }
    } else {
        if (sidebarOpen) {
            sidebar.style.right = '-20vw';
            content.style.right = '0';
            nav.style.right = '0';
        } else {
            sidebar.style.right = '0';
            content.style.right = '20vw';
            nav.style.right = '20vw';
        }
    }

    sidebarOpen = !sidebarOpen;
}

function toggleNotification() {
    if (window.innerWidth <= 767) {
        if (sidebarOpen) {
            toggleSidebar();
        }
        if (notificationOpen) {
            notification.style.left = '-40vw';
            content.style.left = '0';
            content.classList.remove('black-and-white');
            nav.style.left = '0';
            navhead.style.display='inline-block';
        } else {
            notification.style.left = '0';
            content.style.left = '0';
            content.classList.add('black-and-white');
            nav.style.left = '40vw';
            navhead.style.display='none';
        }
    } else {
        if (notificationOpen) {
            notification.style.left = '-17vw';
            content.style.left = '0';
            nav.style.left = '0';
        } else {
            notification.style.left = '0';
            content.style.left = '17vw';
            nav.style.left = '17vw';
        }
    }

    notificationOpen = !notificationOpen;
}

content.addEventListener('click', function() {
    if (sidebarOpen && window.innerWidth <= 767) {
        toggleSidebar();
    }
    
    if (notificationOpen && window.innerWidth <= 767) {
        toggleNotification();
    }
});




// Replace Latin numbers with Arabic numbers on page load
  window.onload = function () {
    var allTextNodes = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, null, false);
    var textNode;
  
    while (textNode = allTextNodes.nextNode()) {
      var text = textNode.nodeValue;
      var containsDigits = /\d/.test(text);
  
      if (containsDigits) {
        var arabicDigits = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        text = text.replace(/\d/g, function (match) {
          return arabicDigits[parseInt(match)];
        });
  
        textNode.nodeValue = text;
      }
    }
  };
  
// save toggle icon
function toggleBookmark(iconId, checkbox) {
    var icon = document.getElementById(iconId);
    var text = document.getElementById('bookmarkText');
    if (checkbox.checked) {
        icon.classList.remove('fa-regular');
        icon.classList.add('fas', 'fa-solid');
        text.textContent = 'حذف من المفضلة';
    } else {
        icon.classList.remove('fas', 'fa-solid');
        icon.classList.add('fa-regular');
        text.textContent = 'إضافة للمفضلة';
    }
}




// delete popups
const hintpop = document.querySelector('#delete-hintpop');
const userpop = document.querySelector('#delete-userpop');
const placepop = document.querySelector('#delete-placepop');
const adminpop = document.querySelector('#delete-adminpop');
const messagepop = document.querySelector('#delete-messagepop');

function showHintPop() {
    hintpop.style.display = 'flex';
}
function showUserPop() {
    userpop.style.display = 'flex';
}
function showPlacePop() {
    placepop.style.display = 'flex';
}
function showAdminPop() {
    adminpop.style.display = 'flex';
}
function showMessagePop() {
    messagepop.style.display = 'flex';
}


function hidePop() {
    const popups = document.querySelectorAll('.delete-popup');
    popups.forEach(function(popup) {
        popup.style.display = 'none';
    });
}