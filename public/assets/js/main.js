(function () {
    "use strict";

    /**
    * Easy selector helper function
    */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }


    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    // ================[ navbar ]==================
    let navbar = document.querySelector('.navbar-mobile')
    document.querySelector('#menu-btn').onclick = () => {
        navbar.classList.toggle('active');
        loginRegisterMobile.classList.remove('active');
    }

    // ================[ login sub-menu ]==================
    let loginMenu = document.querySelector('.login-sub-menu')
    document.querySelector('#btn-login').onclick = () => {
        navbar.classList.remove('active');
        loginMenu.classList.toggle('active');
        inscriptionMenu.classList.remove('active');
        loginRegisterMobile.classList.remove('active');
    }

    // ================[ register sub-menu ]==================
    let inscriptionMenu = document.querySelector('.inscription-sub-menu')
    document.querySelector('#btn-inscription').onclick = () => {
        navbar.classList.remove('active');
        inscriptionMenu.classList.toggle('active');
        loginMenu.classList.remove('active');
        loginRegisterMobile.classList.remove('active');
    }

    // ================[ login/register mobile-menu ]==================
    let loginRegisterMobile = document.querySelector('.login-register-mobile-menu')
    document.querySelector('#login-btn').onclick = () => {
        navbar.classList.remove('active');
        inscriptionMenu.classList.remove('active');
        loginMenu.classList.remove('active');
        loginRegisterMobile.classList.toggle('active');
    }

    // ================[ FAQ Accordion ]==================
    // const accordionItems = document.querySelectorAll('.accordion-item')
    // accordionItems.forEach((item) => {
    //     const accrdionHeader = item.querySelector('.accordion-header')
    //     accrdionHeader.addEventListener('click', () => {

    //     })
    // })


    window.onscroll = () => {
        navbar.classList.remove('active');
        loginMenu.classList.remove('active');
        inscriptionMenu.classList.remove('active');
    }



})()



