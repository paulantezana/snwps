let SNMenu = (menuId, toggleButtonID, contextId='Site', toggleClass = "Menu-is-show") => {
    // Get Menu
    let menuEl = document.getElementById(menuId);
    if(!menuEl) return;

    // Sub menus dinamicos
    let items = menuEl.querySelectorAll('li'); // select all items
    for (let ele of items){
        if (ele.childElementCount === 2){ // if submenu
            let toggle = ele.firstElementChild; // First Element
            let content = ele.lastElementChild; // Second Element  

            // Creando un nuevo elemento e insertando justo despues del enlace
            let iconToggleEle = document.createElement('i');
            iconToggleEle.classList.add('icon-down');
            iconToggleEle.classList.add('Toggle');
            toggle.appendChild(iconToggleEle);

            // Escuchando los eventos click
            iconToggleEle.addEventListener('click',(e)=>{
                e.preventDefault();
                iconToggleEle.classList.toggle('icon-up'); // add Icon up
                content.classList.toggle('is-show');   // add class show menu
            });
        }
    }

    // Agregar la clase active en los enlaces
    const links = [...menuEl.querySelectorAll('a')];
    if(links){
        links.map( link => {
            const url = document.location.href;
            if(link.href === url || link.href === url.slice(0,-1)) link.classList.add('is-active');
        })
    }

    // Toggle Menu
    let button = document.getElementById(toggleButtonID);
    let context = document.getElementById(contextId);
    if(button && context){
        button.addEventListener('click',()=>{
            context.classList.toggle(toggleClass);
        });
    }
};

export default SNMenu;