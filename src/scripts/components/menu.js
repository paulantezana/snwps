let SNMenu = ({
    menuId = "Menu",
    toggleButtonID = "Menu-toggle",
    contextId = "Site",
    toggleClass = "Menu-is-show",
    parentClose = false,
    menuCloseID = ''
}) => {
    // Get Menu
    let menuEl = document.getElementById(menuId);
    if (!menuEl) return;

    // Sub menus dinamicos
    let items = menuEl.querySelectorAll("li"); // select all items
    for (let ele of items) {
        if (ele.childElementCount === 2) {
            // if submenu
            let toggle = ele.firstElementChild; // First Element
            let content = ele.lastElementChild; // Second Element

            // Creando un nuevo elemento e insertando justo despues del enlace
            let iconToggleEle = document.createElement("i");
            iconToggleEle.classList.add("icon-down");
            iconToggleEle.classList.add("Toggle");
            toggle.appendChild(iconToggleEle);
            toggle.classList.add('is-toggle')

            // Escuchando los eventos click
            iconToggleEle.addEventListener("click", e => {
                e.preventDefault();
                iconToggleEle.classList.toggle("icon-up"); // add Icon up
                content.classList.toggle("is-show"); // add class show menu
            });
        }
    }

    // Agregar la clase active en los enlaces
    const links = [...menuEl.querySelectorAll('a')];
    if (links) {
        links.map(link => {
            const url = document.location.href;
            if (link.href === url || link.href === url.slice(0, -1))
                link.parentNode.classList.add('is-active');
        });
    }

    // Toggle Menu
    let button = document.getElementById(toggleButtonID);
    let context = document.getElementById(contextId);
    if (button && context) {
        button.addEventListener("click", () => {
            context.classList.toggle(toggleClass);
        });
    }

    // Menu close quitar la clase
    if(menuCloseID!== ''){
        let menuClose = document.getElementById(menuCloseID);
        if (menuClose) {
            menuClose.addEventListener("click", () => {
                context.classList.remove(toggleClass);
            });
        }
    }

    // Hide menu by parent
    if(parentClose){
        menuEl.parentNode.addEventListener("click", e => {
            context.classList.remove(toggleClass);
        });
        menuEl.addEventListener('click',e=>{
            e.stopPropagation();
        })
    }
};

export default SNMenu;
