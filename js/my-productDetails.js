import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myProductDetails extends HTMLElement{
    constructor(){
        super();
            document.adoptedStyleSheets.push(styles);
    }
    async components() {
        return await (await fetch("view/my-productDetails.html")).text();
    }
    sellection(e){
        let $ = e.target;
        if($.nodeName == "BUTTON"){
            let box = e.target.parentNode.parentNode;
            let inputs = box.querySelectorAll(`input`);
            if ($.innerHTML == "-") {
                inputs.forEach(element => {
                    if (element.name == "Acount" && element.value == 0) {
                        box.remove();
                    } else if (element.name == "Acount") {
                        element.value--;
                    }
                });
            }else if ($.innerHTML == "+") {
                inputs.forEach(element => {
                    if (element.name == "Acount") {
                        element.value++;
                    }

                });
            }
            else if($.innerHTML == "x"){
                inputs.forEach(element => {
                    if (element.name == "Acount") {
                        box.remove();
                    }
                });
            }
        }
    }
    connectedCallback(){
        this.components().then(html => {
            this.innerHTML = html;
            this.container = this.querySelector("#products");
            this.container.addEventListener("click", this.sellection);
        })
    }
}
customElements.define("my-product-details", myProductDetails);