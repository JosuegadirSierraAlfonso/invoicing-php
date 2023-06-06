import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement{
    constructor(){
        super();
        this.count = 1;
        document.adoptedStyleSheets.push(styles);
    }
    async components(){
        return await (await fetch("view/my-body.html")).text();
    }
    async add(e){
        let $ = e.target;
        if ($.nodeName == "BUTTON") {
            this.plantilla = this.querySelector("#products").children;
            this.plantilla =  this.plantilla[ this.plantilla.length-1];
            this.plantilla =  this.plantilla.cloneNode(true);
            document.querySelector("#products").insertAdjacentElement("beforeend", this.plantilla);
        }
    }
    send(e){
        let input = document.querySelectorAll("input");
        let info = {}, producto = {}, lista = {}, data = {}, count = 0;
        producto.product = [];
        input.forEach((val, id) => {
            if (id <= 7) {
                info[val.name] = val.value;
            } else if (count <= 4) {
                lista[val.name] = val.value;
                count++;
                if (count == 4) {
                producto.product.push(lista);
                lista = {};
                count = 0;
                }
            }
        });
        data.info = info;
        data.producto = producto.product;
        console.log(producto);
    }
    connectedCallback(){
        this.components().then(html=>{
            this.innerHTML = html;
            this.add = this.querySelector("#Add").addEventListener("click", this.add.bind(this));
            this.send = this.querySelector("#Send").addEventListener("click", this.send.bind(this));
        })
    }
}
customElements.define('my-body',myBody);



/*
let $ = e.target;
        if ($.nodeName == "BUTTON") {
            let plantilla = await (await fetch("view/my-productDetails.html")).text();
            let render = new DOMParser().parseFromString(plantilla, "text/html")["body"];
            render.children[0].id="product_"+this.count;
            let buttons = render.querySelectorAll("button");
            buttons.forEach(element => {
                element.dataset.row = "product_"+this.count;
            });
            document.querySelector("#products").insertAdjacentElement("beforeend", render.children[0]);
            this.count++;
        }
 */