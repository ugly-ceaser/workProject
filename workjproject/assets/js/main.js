$(document).ready(()=>{

    
 })


const selector = name => document.querySelector(name);
const selectors = name => document.querySelectorAll(name);

    let silverPackage = selector("#silverPackage");

    let goldPackage = selector("#goldPackage");

    let platiniumPackage = selector("#platiniumPackage");

    let formdiv = selector("#formdiv")

    let packages = selectors(".trasition")


const toggleDivs = (index) => {
    packages.forEach(package => {

        if (package.classList.contains("active")){
            package.classList.remove("active")
            package.classList.remove("col-lg-8")
        }

        package.classList.remove("col-lg-4")
        package.classList.add("col-lg-2")
    })


    packages[index].classList.add("active")
    packages[index].classList.add("col-lg-8")

}


packages.forEach((package, index) => {
    package.addEventListener("click", (e) => {
        e.stopPropagation()
        toggleDivs(index)
    })
})


window.addEventListener("click", () => {
    packages.forEach((package) => {
        if(package.classList.contains("active")) {
            package.classList.remove("active")
            package.classList.remove("col-lg-8")
        }
        package.classList.add("col-lg-4")

    })
})

